<?php

namespace App\Controllers\AdminControlpage\Users;

use App\Controllers\BaseController;
// use App\Models\UserModel;
use App\Models\UserProfileModel;
// use App\Models\ShopModel;


class UsersAccountSetting extends BaseController
{
    protected $helpers = ['form'];
    protected $userProfileModel;

    public function __construct()
    {
        $this->userProfileModel = new userProfileModel();
    }

    public function index()
    {
        $head_page =
            '
            <link rel="stylesheet" href="assets/libs/sweetalert2/sweetalert2.min.css">
            ';
        $js_page =
            '
            <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
            ';

        $datapage = array(
            'titlepage' => 'Account Setting',
            'tabshop' => $this->tabshop,
            'head_page' => $head_page,
            'js_page' => $js_page,
            'datashop' => $this->shopModel->asArray()->where('member_id', user()->member_id)->orderBy('marketplace', 'asc')->findAll(),
        );
        return view('pages_admin/adm_useraccountsetting', $datapage);
    }

    public function edit()
    {
        // helper(['form', 'text']);
        // $session = session();
        // $query = $this->builder->get();
        // $head_page =
        //     '
        //         <!--+++ DataTables css -->
        //         <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        //         <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" />
        //     ';

        $js_page =
            '
                <script src="..\assets/js/pages/form-update-account.init.js"></script>
            ';
        $datapage = array(
            'titlepage' => 'Update Account',
            'tabshop' => $this->tabshop,
            // 'head_page' => $head_page,
            'js_page' => $js_page,
            'validation' => \Config\Services::validation()

            // 'datausers' => $query->getResult()
        );
        return view('pages_admin/adm_useraccountsetting_update', $datapage);
    }

    public function update($id, $member_id)
    {
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
            // 'member_id' => $this->request->getVar('member_id'),
            'username'  => $this->request->getVar('username'),
            'fullname'  => $this->request->getVar('fullname'),
            'phone'     => $this->request->getVar('phone'),
            'email'     => $this->request->getVar('email'),
            'address'   => $this->request->getVar('address'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        $this->userProfileModel->update(['member_id' => $member_id], $data);

        if ($this->userProfileModel->affectedRows() > 0) {
            session()->setFlashdata('success', 'Perubahan Berhasil di Simpan');
        }
        session()->setFlashdata('info', 'Tidak Ada Perubahan yang di Simpan');
        return redirect()->to('/setting_account');
    }

    public function addshop($member_id)
    {

        $member_id_form_hidden = $this->request->getVar('member_id');
        if ($member_id != $member_id_form_hidden) {
            session()->setFlashdata('info', 'Tidak Ada Perubahan yang di Simpan');
            return redirect()->to('/setting_account');
        }
        if ($this->request->getVar('marketpace') == "Select Marketplace") {
            session()->setFlashdata('error', 'Gagal Menambahkan Toko, Pastikan memilih Marketplace yang di inginkan..');
            return redirect()->to('/setting_account');
        }

        $data = array(
            'id_shop'       => $this->request->getVar('id_shop'),
            'member_id'     => $this->request->getVar('member_id'),
            'name_shop'     => $this->request->getVar('name_shop'),
            'marketplace'   => $this->request->getVar('marketplace'),
            'phone'         => $this->request->getVar('phone'),
            'address_shop'  => $this->request->getVar('address_shop'),
        );

        $this->shopModel->insert($data);
        if ($this->shopModel->affectedRows() > 0) {
            $msg = $this->request->getVar('name_shop') . ' Berhasil di Tambahkan';
            session()->setFlashdata('success', $msg);
            return redirect()->to('/setting_account');
        }
    }

    public function editshop()
    {
        $id_shop = $this->request->getPost('d');
        $data = array(
            'id_shop'       => $this->request->getPost('d'),
            'name_shop'     => $this->shopModel->find($id_shop)['name_shop'],
            'marketplace'   => $this->shopModel->find($id_shop)['marketplace'],
            'phone'         => $this->shopModel->find($id_shop)['phone'],
            'address_shop'  => $this->shopModel->find($id_shop)['address_shop'],
        );
        $response = array(
            'status'        => 'success',
            'data'          => $data,
        );
        echo json_encode($response);
    }

    public function updateshop()
    {
        $id_shop = $this->request->getVar('id_shop');
        $data = array(
            // 'id_shop'       => $this->request->getVar('id_shop'),
            'name_shop'     => $this->request->getVar('name_shop'),
            'marketplace'   => $this->request->getVar('marketplace'),
            'phone'         => $this->request->getVar('phone'),
            'address_shop'  => $this->request->getVar('address_shop'),
        );

        $this->shopModel->update(['id_shop' => $id_shop], $data);

        if ($this->shopModel->affectedRows() > 0) {
            session()->setFlashdata('success', 'Perubahan Berhasil di Simpan');
        }
        session()->setFlashdata('info', 'Tidak Ada Perubahan yang di Simpan');
        return redirect()->to('/setting_account');
    }

    public function deleteshop()
    {

        $id_shop = $this->request->getVar('d');
        $PostresponeGET = $this->request->getVar('getResp');
        $responeGET = array(
            'name_shop'   => $this->shopModel->find($id_shop)['marketplace'] . ' ' . $this->shopModel->find($id_shop)['name_shop'],
            'respone'     => 'success',
        );
        $responePOST = array(
            'name_shop'   => $this->shopModel->find($id_shop)['marketplace'] . ' ' . $this->shopModel->find($id_shop)['name_shop'],
            'respone'     => 'deleted',
        );
        if ($id_shop != null && $PostresponeGET == null) {
            echo json_encode($responeGET);
        }
        if ($id_shop != null && $PostresponeGET != null) {
            $this->shopModel->delete($id_shop);
            if ($this->shopModel->affectedRows() > 0) {
                echo json_encode($responePOST);
            }
        }
    }

    public function changeshopstatus()
    {
        $id_shop = $this->request->getPost('d');
        $new_status = $this->request->getPost('ss');
        if ($new_status == 1) {
            $msg = $this->request->getVar('ns') . ' Berhasil di Aktifkan';
        } else {
            $msg = $this->request->getVar('ns') . ' Berhasil di Non Aktifkan';
        }
        $data = array(
            'active' => $new_status,
        );
        $this->shopModel->update(['id_shop' => $id_shop], $data);
        if ($this->shopModel->affectedRows() > 0) {
            session()->setFlashdata('info', $msg);
            echo json_encode(array("status" => TRUE));
        }
    }
}
