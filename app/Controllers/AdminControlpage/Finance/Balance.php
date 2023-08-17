<?php

namespace App\Controllers\AdminControlpage\Finance;

use App\Controllers\BaseController;
use App\Models\BallanceAccount;
use App\Models\BallanceEWallet;

class Balance extends BaseController
{
    protected $db;
    protected $builder;
    protected $ballanceAccount;
    protected $ballanceEWallet;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->ballanceAccount = new BallanceAccount();
        $this->ballanceEWallet = new BallanceEWallet();
        $this->db      = \Config\Database::connect();
    }

    public function index()
    {

        $head_page =
            '
            <link href="' . base_url() . 'assets/libs/gridjs/theme/mermaid.min.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="' . base_url() . 'assets/libs/sweetalert2/sweetalert2.min.css">
	
            ';
        $js_page =
            '
            <script src="' . base_url() . 'assets/libs/gridjs/gridjs.umd.js"></script>
            <script src="' . base_url() . 'assets/js/pages/mybalancelog.init.js"></script>
            <script src="' . base_url() . 'assets/libs/sweetalert2/sweetalert2.min.js"></script>
            <script src="' . base_url() . 'assets/libs/imask/imask.min.js"></script>
            
            ';

        $datapage = array(
            'titlepage'          => 'Balance',
            'tabshop'            => $this->tabshop,
            'head_page'          => $head_page,
            'js_page'            => $js_page,
            'databalanceaccount' => $this->ballanceAccount->find(user_id()),
        );
        return view('pages_admin/adm_finance_ballance', $datapage);
    }

    public function log_show()
    {
        $this->builder = $this->db->table('balance_account_log');
        if (!in_groups('1') && !in_groups('2')) {
            $this->builder->where('balance_userid_log', user_id());
        }
        $this->builder->orderBy('created_at', 'DESC');
        $query = $this->builder->get();

        $data = array();
        $row = array();
        $no = 0;

        foreach ($query->getResult() as $i) {
            if ($i->log_code == "IN-FEWAL") {
                $idshop = substr($i->log_description, 14);
                $shopname = $this->shopModel->find($idshop)['name_shop'] . " " . $this->shopModel->find($idshop)['marketplace'];
                $log_transaction = $shopname;
            };
            if ($i->log_code == "OP-BALA") {
                $log_transaction = substr($i->log_description, 9);
            };

            $row = [
                "no"                => $no++,
                "log_code"          => $i->log_code,
                "log_transaction"   => $log_transaction,
                "link"              => $i->link,
                'last_value'        => number_format($i->last_value, 0, ",", ".") . ",-",
                'trans_value'       => number_format($i->trans_value, 0, ",", ".") . ",-",
                'new_value'         => number_format($i->new_value, 0, ",", ".") . ",-",
                'date'              => $i->created_at
            ];
            $data[] = $row;
        }

        // dd($data);
        return $this->response->setJSON([
            'results' => $data,
        ]);
    }

    public function paymentTOP()
    {
        $nopurchase     = base64_decode(base64_decode(base64_decode($this->request->getVar('np'))));
        $valpayment     = base64_decode(base64_decode($this->request->getVar('vl')));
        $currentbalance = $this->ballanceAccount->find(user_id())['value_account'];

        if ($currentbalance >= $valpayment) {
            return $this->response->setJSON([
                'status'        => "Success",
                // 'nopurchase'    => $nopurchase,
                // 'valpayment'    => $valpayment,
                // 'balance'       => $currentbalance,
            ]);
        } else {
            return $this->response->setJSON([
                'status'        => "Error",
                'message'      => "You have Insufficient funds in your account..",
                // 'valpayment'    => $valpayment,
                // 'balance'       => $currentbalance,
            ]);
        }
    }
}
