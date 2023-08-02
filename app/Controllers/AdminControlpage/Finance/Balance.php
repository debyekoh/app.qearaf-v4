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
            // $row = [
            //     "no" => $no++,
            //     "idpro" => $i->productspro_id,
            //     "name" => $i->pro_name,
            //     "model" => $i->pro_model,
            //     "skuno" => $i->pro_part_no,
            //     "price" => $i->pro_price_seller,
            //     "current_stock" => $i->pro_current_stock,
            //     "statusproduct" => $i->pro_active,
            //     "editable" => $editable,
            //     "deletable" => $deletable,
            //     "image" => isset($this->productsimageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($i->productspro_id)['pro_image_name']) ? $this->productsimageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($i->productspro_id)['pro_image_name'] : 'no_image.png',
            // ];
            // $data[] = $row;
        }


        $datapage = array(
            'titlepage' => 'Balance',
            'tabshop' => $this->tabshop,
            'databalanceaccount' => $this->ballanceAccount->find(user_id()),
            'databalanceewallet' => $queryballance->getResult(),
        );
        return view('pages_admin/adm_finance_ballance', $datapage);
    }
}
