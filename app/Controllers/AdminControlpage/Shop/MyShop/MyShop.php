<?php

namespace App\Controllers\AdminControlpage\Shop\Myshop;

use App\Controllers\BaseController;
use App\Models\SalesModel;
use App\Models\ListNotificationModel;

class MyShop extends BaseController
{
    protected $db;
    protected $builder;
    protected $salesModel;
    protected $listNotificationModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->salesModel = new SalesModel();
        $this->listNotificationModel = new ListNotificationModel();
        $this->db      = \Config\Database::connect();
    }

    public function index()
    {
        $datapage = array(
            'titlepage' => 'MyShop',
            'tabshop' => $this->tabshop,
        );
        return view('pages_admin/adm_blankpage', $datapage);
    }

    public function shops($id_shop)
    {
        $head_page =
            '
            <link href="' . base_url() . 'assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />
            ';
        $js_page =
            '
            <script src="' . base_url() . 'assets/libs/apexcharts/apexcharts.min.js"></script>
            <script src="' . base_url() . 'assets/js/pages/shop.init.js"></script>
            
            ';

        // dd("AA");
        $shop_group = array();
        if (base64_decode(base64_decode($id_shop)) == 'reseller') {
            $idshop = $id_shop;
            $shop_name = "Reseller";
            $this->builder = $this->db->table('users');
            $this->builder->join('auth_groups_users', 'auth_groups_users.user_id= users.id');
            $this->builder->join('shop', 'shop.member_id= users.member_id');
            $this->builder->where('group_id', '3');
            $query = $this->builder->get();
            if ($query->getResult() != null) {
                $shop_reselerArray = array();
                foreach ($query->getResult() as $i) {
                    array_push($shop_reselerArray, $i->id_shop);
                };
                $shop_group = $shop_reselerArray;
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } elseif (!$this->shopModel->asArray()->where('member_id', user()->member_id)->where('active', 1)->find($id_shop)) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $idshop = base64_encode(base64_encode($id_shop));
            $shop_name = $this->shopModel->asArray()->where('member_id', user()->member_id)->where('active', 1)->find($id_shop)['marketplace'] . ' - ' . $this->shopModel->asArray()->where('member_id', user()->member_id)->where('active', 1)->find($id_shop)['name_shop'];
            $shop_group = [$id_shop];
        }
        $countitem = array(
            'Process'       => count($this->salesModel->whereIn('id_shop', $shop_group)->where('status', "Process")->findAll()),
            'Packaging'     => count($this->salesModel->whereIn('id_shop', $shop_group)->where('status', "Packaging")->findAll()),
            'Ready'         => count($this->salesModel->whereIn('id_shop', $shop_group)->where('status', "Ready")->findAll()),
            'Delivery'      => count($this->salesModel->whereIn('id_shop', $shop_group)->where('status', "Delivery")->findAll()),
            'Received'      => count($this->salesModel->whereIn('id_shop', $shop_group)->where('status', "Received")->findAll()),
            'Completed'     => count($this->salesModel->whereIn('id_shop', $shop_group)->where('status', "Completed")->findAll()),
            'Return'        => count($this->salesModel->whereIn('id_shop', $shop_group)->where('status', "Return")->findAll()),
            'Cancel'        => count($this->salesModel->whereIn('id_shop', $shop_group)->where('status', "Cancel")->findAll()),
        );
        $datapage = array(
            'titlepage' => $shop_name,
            'tabshop'   => $this->tabshop,
            'shop'      => $idshop,
            'item'      => $countitem,
            // 'head_page' => $head_page,
            'js_page'   => $js_page,
            // 'test'      => $test,
        );
        return view('pages_admin/adm_shop', $datapage);
    }
}
