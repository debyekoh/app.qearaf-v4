<?php

namespace App\Controllers\AdminControlpage\Finance;

use App\Controllers\BaseController;
use App\Models\DebtAccount;

class Debt extends BaseController
{
    protected $db;
    protected $builder;
    protected $debtAccount;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->debtAccount = new DebtAccount();
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
            <script src="' . base_url() . 'assets/js/pages/mydebtlog.init.js"></script>
            <script src="' . base_url() . 'assets/libs/sweetalert2/sweetalert2.min.js"></script>
            <script src="' . base_url() . 'assets/libs/imask/imask.min.js"></script>
            
            ';

        $datapage = array(
            'titlepage'         => 'Debt',
            'tabshop'           => $this->tabshop,
            'head_page'         => $head_page,
            'js_page'           => $js_page,
            'datadebtaccount'   => $this->debtAccount->find(user_id()),
        );
        return view('pages_admin/adm_finance_debt', $datapage);
    }

    public function list()
    {
        $head_page =
            '
            <link href="' . base_url() . 'assets/libs/gridjs/theme/mermaid.min.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="' . base_url() . 'assets/libs/sweetalert2/sweetalert2.min.css">
	
            ';
        $js_page =
            '
            <script src="' . base_url() . 'assets/libs/gridjs/gridjs.umd.js"></script>
            <script src="' . base_url() . 'assets/js/pages/mydebtlistdetail.init.js"></script>
            <script src="' . base_url() . 'assets/libs/sweetalert2/sweetalert2.min.js"></script>
            <script src="' . base_url() . 'assets/libs/imask/imask.min.js"></script>
            
            ';

        $datapage = array(
            'titlepage'         => 'Debt',
            'tabshop'           => $this->tabshop,
            'head_page'         => $head_page,
            'js_page'           => $js_page,
            'datadebtaccount'   => $this->debtAccount->find(user_id()),
        );
        return view('pages_admin/adm_finance_debt_list', $datapage);
    }

    public function log_show()
    {
        $this->builder = $this->db->table('debt_account_log');
        if (!in_groups('1') && !in_groups('2')) {
            $this->builder->where('balance_userid_log', user_id());
        }
        $this->builder->orderBy('created_at', 'DESC');
        $query = $this->builder->get();

        $data = array();
        $row = array();
        $no = 0;

        foreach ($query->getResult() as $i) {
            if ($i->log_code == "TOP-DEB") {
                $log_transaction = substr($i->log_description, 9);
            };
            if ($i->log_code == "OUT-PAYDEBT") {
                $log_transaction = substr($i->log_description, 12);
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
}
