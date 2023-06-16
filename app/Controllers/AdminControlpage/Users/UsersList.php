<?php

namespace App\Controllers\AdminControlpage\Users;

use App\Controllers\BaseController;

class UsersList extends BaseController
{
    protected $db, $builder;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }



    public function index()
    {
        $this->builder->select('users.id as usersid, member_id, users.email as usersemail, description');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $head_page =
            '
                <!--+++ DataTables css -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
            ';
        $js_page =
            '
                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
                <script src="assets/js/pages/listuser.init.js"></script>
            ';
        $datapage = array(
            'titlepage' => 'User List',
            'tabshop' => $this->tabshop,
            'head_page' => $head_page,
            'js_page' => $js_page,
            'datausers' => $query->getResult()
        );
        return view('pages_admin/adm_userlist', $datapage);
    }

    public function detail($id)
    {
        $this->builder->select('users.id as usersid, member_id, users.email as usersemail, description');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.member_id', $id);
        $query = $this->builder->get();

        $head_page =
            '
                <!--+++ DataTables css -->
                <link href="http://localhost/app.qearaf-v4/public/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
                <link href="http://localhost/app.qearaf-v4/public/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
            ';

        $datapage = array(
            'titlepage' => 'User View',
            // 'head_page' => $head_page,
            'tabshop' => $this->tabshop,
            'datauser' => $query->getRow()
        );

        return view('pages_admin/adm_userview', $datapage);
    }
}
