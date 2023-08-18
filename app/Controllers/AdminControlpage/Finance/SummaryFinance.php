<?php

namespace App\Controllers\AdminControlpage\Finance;

use App\Controllers\BaseController;
use App\Models\BallanceAccount;
use App\Models\BallanceEWallet;
use App\Models\DebtAccount;

class SummaryFinance extends BaseController
{
    protected $db;
    protected $builder;
    protected $ballanceAccount;
    protected $ballanceEWallet;
    protected $debtAccount;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->ballanceAccount = new BallanceAccount();
        $this->debtAccount = new DebtAccount();
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
        $ewallet_a = array();
        $row = array();
        $no = 0;

        foreach ($queryballance->getResult() as $i) {
            $ewallet_a[] = $this->ballanceEWallet->find($i->id_shop)['value_ewallet'];
        }


        $this->builder = $this->db->table('products');
        $this->builder->select('products.pro_id as productspro_id, pro_part_no, pro_name, pro_model, pro_bundling, pro_price_basic,  pro_price_seller, pro_active, pro_current_stock , pro_min_stock , pro_max_stock');
        $this->builder->join('products_price', 'products_price.pro_id = products.pro_id');
        $this->builder->join('products_stock', 'products_stock.pro_id = products.pro_id');
        $query = $this->builder->get();


        $inventory = array();
        foreach ($query->getResult() as $g) {
            $inventory[] = $g->pro_price_basic * $g->pro_current_stock;
        }




        $datapage = array(
            'titlepage' => 'Summary Finance',
            'tabshop'   => $this->tabshop,
            'balance'   => $this->ballanceAccount->find(user_id())['value_account'],
            'ewallet'   => array_sum($ewallet_a),
            'inventory' => array_sum($inventory),
            'debt'      => $this->debtAccount->find(user_id())['value_debt'],
            // 'dds'       => array_sum($inventory),


        );
        return view('pages_admin/adm_finance_summary', $datapage);
    }
}
