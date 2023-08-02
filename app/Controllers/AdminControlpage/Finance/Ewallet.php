<?php

namespace App\Controllers\AdminControlpage\Finance;

use App\Controllers\BaseController;
use App\Models\BallanceAccount;
use App\Models\BallanceEWallet;

class Ewallet extends BaseController
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


        $datapage = array(
            'titlepage' => 'E-Wallet',
            'tabshop' => $this->tabshop,
            'databalanceaccount' => $this->ballanceAccount->find(user_id()),
            'databalanceewallet' => $queryballance->getResult(),
        );
        return view('pages_admin/adm_finance_ewallet', $datapage);
    }
}
