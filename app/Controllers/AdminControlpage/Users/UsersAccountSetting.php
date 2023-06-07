<?php

namespace App\Controllers\AdminControlpage\Users;

use App\Controllers\BaseController;
use App\Models\ShopModel;


class UsersAccountSetting extends BaseController
{
    protected $db, $builder;
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    public function index()
    {
        $datapage = array(
            'titlepage' => 'Account Setting'
        );
        return view('pages_admin/adm_useraccountsetting', $datapage);
    }

    public function edit()
    {
        helper(['form', 'text']);
        $session = session();
        $query = $this->builder->get();
        $head_page =
            '
                <!--+++ DataTables css -->
                <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
                <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" />
            ';

        $js_page =
            '
                <script src="..\assets/js/pages/form-update-account.init.js"></script>
            ';
        $datapage = array(
            'titlepage' => 'Update Account',
            // 'head_page' => $head_page,
            'js_page' => $js_page,
            'validation' => \Config\Services::validation()
            // 'datausers' => $query->getResult()
        );
        return view('pages_admin/adm_useraccountsetting_update', $datapage);
    }

    public function update($id, $member_id)
    {
        session();
        $id_form_hidden = $this->request->getVar('user_id');
        $member_id_form_hidden = $this->request->getVar('member_id');
        if ($id != $id_form_hidden && $member_id != $member_id_form_hidden) {
            return redirect()->to('/dashboards');
        }
        $rules = [
            'username' => 'required|min_length[8]',
            'fullname' => 'required|min_length[5]',
            'phone' => 'required|min_length[10]',
            'email' => 'valid_email',
            'address' => 'required|min_length[10]',
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('failed', 'Perubahan Tidak Berhasil di Simpan..!!!');
            return redirect()->back()->withInput();
        }
        // d($id_form_hidden);
        // d($member_id_form_hidden);
        // d($this->request->getVar());

        $data = array(
            'username'  => $this->request->getVar('username'),
            'fullname'  => $this->request->getVar('fullname'),
            'phone'     => $this->request->getVar('phone'),
            'email'     => $this->request->getVar('email'),
            'address'   => $this->request->getVar('address'),
        );

        $this->builder->where('member_id', $member_id);
        $this->builder->update($data);

        if ($this->db->affectedRows() > 0) {
            session()->setFlashdata('success', 'Perubahan Berhasil di Simpan');
        }
        session()->setFlashdata('info', 'Tidak Ada Perubahan yang di Simpan');
        return redirect()->to('/setting_account');
    }

    public function addshop($member_id)
    {
        session();
        $member_id_form_hidden = $this->request->getVar('member_id');
        if ($member_id != $member_id_form_hidden) {
            session()->setFlashdata('info', 'Tidak Ada Perubahan yang di Simpan');
            return redirect()->to('/setting_account');
        }
        if ($this->request->getVar('marketpace') == "Select Marketplace") {
            session()->setFlashdata('error', 'Gagal Menambahkan Toko, Pastikan memilih Marketplace yang di inginkan..');
            return redirect()->to('/setting_account');
        }

        $rules = [
            'id_shop' => 'required|min_length[20]',
            'member_id' => 'required|min_length[10]',
            'name_shop' => 'required|min_length[10]',
            'marketplace' => 'required|min_length[10]',
            'phone' => 'required|min_length[10]',
            'address_shop' => 'required|min_length[10]',
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('failed', 'Perubahan Tidak Berhasil di Simpan..!!!');
            return redirect()->to('/setting_account')->withInput();
        }

        $data = array(
            'id_shop'       => $this->request->getVar('id_shop'),
            'member_id'     => $this->request->getVar('member_id'),
            'name_shop'     => $this->request->getVar('name_shop'),
            'marketplace'   => $this->request->getVar('marketplace'),
            'phone'         => $this->request->getVar('phone'),
            'address_shop'  => $this->request->getVar('address_shop'),
        );

        // dd($data);

        $shopModel = new ShopModel();
        $shopModel->insert($data);
        if ($this->db->affectedRows() > 0) {
            $msg = $this->request->getVar('name_shop') . ' Berhasil di Simpan';
            session()->setFlashdata('success', $msg);
            return redirect()->to('/setting_account');
        }
        session()->setFlashdata('info', 'Tidak Ada Perubahan yang di Simpan');
        return redirect()->to('/setting_account');

        // $this->builder->where('member_id', $member_id);
        // $this->builder->update($data);

        // if ($this->db->affectedRows() > 0) {
        //     session()->setFlashdata('success', 'Perubahan Berhasil di Simpan');
        // }
        // session()->setFlashdata('info', 'Tidak Ada Perubahan yang di Simpan');
        // return redirect()->to('/setting_account');
    }
}
