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
        $shopdesc   = $this->shopModel->find($id_shop)['name_shop'] . " " . $this->shopModel->find($id_shop)['marketplace'];

        if (!$this->ballanceEWallet->find($id_shop)) {
            $this->response->setStatusCode(404);
        } else {
            $ewcurval = $this->ballanceEWallet->find($id_shop)['value_ewallet'];
            $newcurval = $this->ballanceAccount->find(user_id())['value_account'] - $ewcurval;
            $bacurval = $this->ballanceAccount->find(user_id())['value_account'];
            if ($ewcurval == 0) {
                return $this->response->setStatusCode(404);
            }
            $dataewallet = array(
                'ewallet_shopid'            => $id_shop,
                'value_ewallet'             => $this->ballanceEWallet->find($id_shop)['value_ewallet'] - $ewcurval,
            );
            $dataewalletlog = array(
                'balance_userid_log'        => user_id(),   // for "balance_account_log"
                'ewallet_shopid_log'        => $id_shop,    // for "balance_ewallet_log"
                'debt_userid_log'           => null,        // for "debt_account_log"
                'log_key'                   => date("ymd") . "/OUT/" . sprintf("%04d", count($this->ballanceEWalletLog->like('log_key', date("ymd") . "/OUT/")->findAll()) + 1),
                'log_code'                  => "OUT-EWAL",
                'log_description'           => "Withdraw",
                'link'                      => "ewallet",
                'last_value'                => $this->ballanceEWallet->find($id_shop)['value_ewallet'],
                'trans_value'               => $ewcurval,
                'new_value'                 => $this->ballanceEWallet->find($id_shop)['value_ewallet'] - $ewcurval,
            );
            $dataebalaccount = array(
                'balance_userid'            => user_id(),
                'value_account'             => $bacurval + $ewcurval,
            );
            $dataebalaccountlog = array(
                'balance_userid_log'        => user_id(),   // for "balance_account_log"
                'ewallet_shopid_log'        => $id_shop,    // for "balance_ewallet_log"
                'debt_userid_log'           => null,        // for "debt_account_log"
                'log_key'                   => date("ymd") . "/IN/" . sprintf("%04d", count($this->ballanceAccountLog->like('log_key', date("ymd") . "/IN/")->findAll()) + 1),
                'log_code'                  => "IN-FEWAL",
                'log_description'           => "Withdraw From " . $id_shop,
                'link'                      => "balance",
                'last_value'                => $bacurval,
                'trans_value'               => $ewcurval,
                'new_value'                 => $bacurval + $ewcurval,
            );

            $names = ['SuAdmin', 'Admin'];
            $this->builder = $this->db->table('auth_groups_users');
            $this->builder->select('member_id, fullname');
            $this->builder->join('auth_groups', 'auth_groups.id= auth_groups_users.group_id');
            $this->builder->join('users', 'users.id= auth_groups_users.user_id');
            // $this->builder->Where('member_id', $member_id_ownershop);
            $this->builder->orWhereIn('name', $names);
            $targetgroup = $this->builder->get();
            $title_notif = "Your Balance";
            $notification = "will increase Rp " . number_format($ewcurval, 0, ",", ".") . ",-" . " to " . number_format($bacurval + $ewcurval, 0, ",", ".") . ",-";
            // $id_sales = strtoupper($this->request->getVar('id_sales'));
            $key_sales = substr($title_notif, 0, 6) .  substr($title_notif, 7, 1) .  substr($title_notif, 9, 2) .  substr($title_notif, 12);
            // $dataNotification = array();
            for ($a = 0; $a < $targetgroup->getNumRows(); $a++) {
                $dataNotification[] = array(
                    'path_notif'            => "balance",
                    'type_notif'            => "Withdraw E-Wallet",
                    'title_notif'           => $title_notif,
                    'to_member_id'          => $targetgroup->getResult()[$a]->member_id,
                    'to_fullname'           => $targetgroup->getResult()[$a]->fullname,
                    'to_user_image'         => null,
                    'from_member_id'        => user()->member_id,
                    'from_fullname'         => user()->fullname,
                    'from_user_image'       => user()->user_image,
                    'notification'          => $notification,
                    'notification_image'    => '',
                    'read_status'           => 1,
                );
            }

            // dd($dataebalaccountlog);

            $this->db->transBegin();
            $this->ballanceEWallet->update(['ewallet_shopid' => $id_shop], $dataewallet);
            $this->ballanceEWalletLog->insert($dataewalletlog);
            $this->ballanceAccount->update(['balance_userid' => user_id()], $dataebalaccount);
            $this->ballanceAccountLog->insert($dataebalaccountlog);
            $this->listNotificationModel->insertBatch($dataNotification);

            if ($this->db->transStatus() === false) {
                // $msg = "Withdraw " . $shopdesc . " Failed";
                // session()->setFlashdata('error', $msg);
                $this->db->transRollback();
                return $this->response->setStatusCode(404);
            } else {
                $this->db->transCommit();
                // $msg = "Withdraw " . $shopdesc . " Success";
                // session()->setFlashdata('success', $msg);
                return $this->response->setJSON([
                    'status' => 'success',
                    'id'     => base64_encode(base64_encode($id_shop)),
                    'value' => "Rp " . number_format($this->ballanceEWallet->find($id_shop)['value_ewallet'], 0, ",", ".") . ",-",
                ]);
            }

            // return $this->response->setJSON([
            //     'dataewallet' => $dataewallet,
            //     'dataewalletlog' => $dataewalletlog,
            //     'dataebalaccount' => $dataebalaccount,
            //     'dataebalaccountlog' => $dataebalaccountlog,
            //     'dataNotification' => $dataNotification,
            //     // 'dataewalletlog' => $dataewalletlog,
            //     // 'dataewalletlog' => $dataewalletlog,
            // ]);
        }




        // return $this->response->setJSON([
        //     'status' => 'success',
        //     'data' => $type,
        //     'pass' => user()->password_hash,
        // ]);
    }

    public function ewalet_shop($idshop)
    {
        $id_shop    = base64_decode(base64_decode($idshop));
        if ($this->shopModel->find($id_shop) == null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $shopdesc   = $this->shopModel->find($id_shop)['name_shop'] . " " . $this->shopModel->find($id_shop)['marketplace'];

            $head_page =
                '
            <link href="' . base_url() . 'assets/libs/gridjs/theme/mermaid.min.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="' . base_url() . 'assets/libs/sweetalert2/sweetalert2.min.css">
	
            ';
            $js_page =
                '
            <script src="' . base_url() . 'assets/libs/gridjs/gridjs.umd.js"></script>
            <script src="' . base_url() . 'assets/js/pages/myewalletshop.init.js"></script>
            <script src="' . base_url() . 'assets/libs/sweetalert2/sweetalert2.min.js"></script>
            <script src="' . base_url() . 'assets/libs/imask/imask.min.js"></script>
            
            ';

            $datapage = array(
                'titlepage'         => 'E-Wallet',
                'subtitlepageid'    => $id_shop,
                'subtitlepage'      => $shopdesc,
                'tabshop'           => $this->tabshop,
                'head_page'         => $head_page,
                'js_page'           => $js_page,
                // 'databalanceaccount' => $this->ballanceAccount->find(user_id()),
                // 'databalanceewallet' => $queryballance->getResult(),
            );
            return view('pages_admin/adm_finance_ewallet_shop', $datapage);
        }
    }

    public function ewalet_shop_list($idshop)
    {
        $id_shop    = base64_decode(base64_decode($idshop));
        if ($this->shopModel->find($id_shop) == null) {
            $this->response->setStatusCode(404, "Data Not Found");
        } else {
            $this->builder = $this->db->table('balance_ewallet_log');
            $this->builder->where('ewallet_shopid_log', $id_shop);
            $this->builder->orderBy('created_at', 'DESC');
            $query = $this->builder->get();

            // dd($query->getResult());

            $data = array();
            $row = array();
            $no = 0;

            foreach ($query->getResult() as $i) {
                $row = [
                    "no"                => $no++,
                    "log_code"          => $i->log_code,
                    "log_transaction"   => substr($i->log_description, 14),
                    "link"              => $i->link,
                    'last_value'        => number_format($i->last_value, 0, ",", ".") . ",-",
                    'trans_value'       => number_format($i->trans_value, 0, ",", ".") . ",-",
                    'new_value'         => number_format($i->new_value, 0, ",", ".") . ",-",
                    'date'              => $i->created_at
                ];
                $data[] = $row;
            }

            return $this->response->setJSON([
                // 'status' => true,
                // 'response' => 'Success show data',
                // 'results' => $this->productsModel->findAll(),
                // 'results' => $query->getResult(),
                'results' => $data,
                // 'test' => $query->getResult()
            ]);
        }
    }
}
