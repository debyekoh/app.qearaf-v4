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

    public function withdraw($pass, $idshop)
    {
        $login    = user()->username;
        $password = base64_decode($pass);
        $remember = null;


        $type = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Try to log them in...
        if (!$this->auth->attempt([$type => $login, 'password' => $password], $remember)) {
            $this->response->setStatusCode(404, "Password Wrong");
        } else {
            return $this->response->setJSON([
                'shop'      => base64_encode($idshop),
                'shopdesc'  => $this->shopModel->find($idshop)['name_shop'] . " " . $this->shopModel->find($idshop)['marketplace'],
                'ewal'      => number_format($this->ballanceEWallet->find($idshop)['value_ewallet'], 0, ",", ".") . ",-",
            ]);
        }




        // return $this->response->setJSON([
        //     'status' => 'success',
        //     'data' => $type,
        //     'pass' => user()->password_hash,
        // ]);
    }

    public function withdrawnow($idshop)
    {
        $id_shop    = base64_decode(base64_decode($idshop));

        if (!$this->ballanceEWallet->find($id_shop)) {
            $this->response->setStatusCode(404);
        } else {
            $ewcurval = $this->ballanceEWallet->find($id_shop)['value_ewallet'];
            $bacurval = $this->ballanceAccount->find(user_id())['value_account'];

            $dataewallet = array(
                'ewallet_shopid'     => 'E-Wallet',
                'value_ewallet'       => $this->ballanceEWallet->find($id_shop)['value_ewallet'] - $ewcurval,
            );
            $dataewalletlog = array(
                'balance_userid_log'        => user_id(),   // for "balance_account_log"
                'ewallet_shopid_log'        => $id_shop,    // for "balance_ewallet_log"
                'debt_userid_log'           => null,        // for "debt_account_log"
                'log_key'                   => date("ymd") . "/WD/" . sprintf("%04d", count($this->ballanceEWalletLog->like('log_key', date("ymd") . "/WD/")->findAll()) + 1),
                'log_code'                  => "WDTOBAL",
                'log_description'           => "Withdraw",
                'link'                      => "ewallet",
                'last_value'                => $this->ballanceEWallet->find($id_shop)['value_ewallet'],
                'trans_value'               => $ewcurval,
                'new_value'                 => $this->ballanceEWallet->find($id_shop)['value_ewallet'] - $ewcurval,
            );
            $dataebalaccount = array(
                'balance_userid'     => 'E-Wallet',
                'value_account'       => $bacurval + $ewcurval,
            );
            $dataebalaccountlog = array(
                'balance_userid_log'        => user_id(),   // for "balance_account_log"
                'ewallet_shopid_log'        => $id_shop,    // for "balance_ewallet_log"
                'debt_userid_log'           => null,        // for "debt_account_log"
                'log_key'                   => date("ymd") . "/WD/" . sprintf("%04d", count($this->ballanceEWalletLog->like('log_key', date("ymd") . "/WD/")->findAll()) + 1),
                'log_code'                  => "WDFWAL",
                'log_description'           => "Withdraw From " . $id_shop,
                'link'                      => "balance",
                'last_value'                => $bacurval,
                'trans_value'               => $ewcurval,
                'new_value'                 => $bacurval + $ewcurval,
            );



            return $this->response->setJSON([
                'status' => 'success',
                'data'  => [$dataewallet, $dataewalletlog, $dataebalaccount],
                'datalog'  => [$dataewalletlog, $dataebalaccountlog]
            ]);
        }




        // return $this->response->setJSON([
        //     'status' => 'success',
        //     'data' => $type,
        //     'pass' => user()->password_hash,
        // ]);
    }
}
