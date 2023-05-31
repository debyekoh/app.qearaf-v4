<?php

namespace App\Controllers\AdminControlpage\Users;

use App\Controllers\BaseController;

class UsersAccountSetting extends BaseController
{
    protected $db, $builder;

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
        $query = $this->builder->get();

        $head_page =
            '
                <!--+++ DataTables css -->
                <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
                <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" />
            ';

        $js_page =
            '
                <script src="..\assets/libs/flatpickr/flatpickr.min.js"></script>
                <script src="..\assets/js/pages/form-update-account.init.js"></script>
            ';
        $datapage = array(
            'titlepage' => 'Update Account',
            // 'head_page' => $head_page,
            'js_page' => $js_page,
            'datausers' => $query->getResult()
        );
        return view('pages_admin/adm_useraccountsetting_update', $datapage);
    }

    public function update()
    {
    }
}
