<?php

namespace App\Controllers\AdminControlpage\Finance;

use App\Controllers\BaseController;
use App\Models\BallanceAccount;
use App\Models\BallanceEWallet;

// namespace Myth\Auth\Controllers;

// use CodeIgniter\Controller;
// use CodeIgniter\HTTP\CLIRequest;
// use CodeIgniter\HTTP\IncomingRequest;
// use CodeIgniter\HTTP\RedirectResponse;
// use CodeIgniter\Session\Session;
// use Myth\Auth\Config\Auth as AuthConfig;
// use Myth\Auth\Entities\User;
// use Myth\Auth\Models\UserModel;



class Ewallet extends BaseController
{
    protected $db;
    protected $builder;
    protected $ballanceAccount;
    protected $ballanceEWallet;
    protected $auth;
    // protected $config;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->ballanceAccount = new BallanceAccount();
        $this->ballanceEWallet = new BallanceEWallet();
        $this->db      = \Config\Database::connect();

        // $this->session = service('session');
        // $this->config = config('Auth');
        $this->auth   = service('authentication');
    }



    public function index()
    {
        $this->builder = $this->db->table('shop');
        $this->builder->join('balance_ewallet', 'balance_ewallet.ewallet_shopid = shop.id_shop');
        if (in_groups('1') == true || in_groups('2') == true) {
            $queryballance = $this->builder->get();
        } else {
            $this->builder->Where('member_id', user()->member_id);
            $this->builder->orderBy('marketplace', 'asc');
            $queryballance = $this->builder->get();
        }

        // $test = $this->builder->get();
        $data = array();
        $row = array();
        $no = 0;

        foreach ($queryballance->getResult() as $i) {
            $data[] = $this->ballanceEWallet->find($i->id_shop);
        }

        $head_page =
            '
            <link href="assets/libs/gridjs/theme/mermaid.min.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="assets/libs/sweetalert2/sweetalert2.min.css">
	
            ';
        $js_page =
            '
            <script src="assets/libs/gridjs/gridjs.umd.js"></script>
            <script src="assets/js/pages/myewallet.init.js"></script>
            <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
            <script src="assets/libs/imask/imask.min.js"></script>
            
            ';

        $datapage = array(
            'titlepage'     => 'E-Wallet',
            'tabshop'       => $this->tabshop,
            'head_page'     => $head_page,
            'js_page'       => $js_page,
            'databalanceaccount' => $this->ballanceAccount->find(user_id()),
            'databalanceewallet' => $queryballance->getResult(),
        );
        return view('pages_admin/adm_finance_ewallet', $datapage);
    }

    public function whitdrawnow($pass)
    {
        // if()
        // if (!password_verify(base64_encode(hash('sha384', service('request')->getPost('newPasswords'), true)), $pass)) {
        //     echo 'password not match';
        // } else {
        //     echo 'password matched';
        // }
        // base64_encode(hash('sha384', $password, true));


        // $this->response->setStatusCode(404);
        $login    = user()->username;
        $password = $pass;
        $remember = null;

        $type = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Try to log them in...
        if (!$this->auth->attempt([$type => $login, 'password' => $password], $remember)) {
            $this->response->setStatusCode(404, "Password Wrong");
        } else {
            return $this->response->setJSON([
                'status' => 'success',
            ]);
        }




        // return $this->response->setJSON([
        //     'status' => 'success',
        //     'data' => $type,
        //     'pass' => user()->password_hash,
        // ]);
    }
}
