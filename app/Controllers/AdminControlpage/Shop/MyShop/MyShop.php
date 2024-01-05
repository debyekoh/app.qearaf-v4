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

            <!-- Include Required Prerequisites -->
            <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
            <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
            
            <!-- Include Date Range Picker -->
            <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
            <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
            
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
            'topseller'      => $this->getTopSeller(base64_decode(base64_decode($idshop))),
        );
        // return view('pages_admin/adm_shop', $datapage);
        return view('pages_admin/adm_dashboard', $datapage);
    }

    public function getTopSeller($idshop)
    {
        // $month = date("Y-m");
        $month = "2023-09";
        $totalSales = "SELECT   sales_detail.pro_id AS salesproid,
                                pro_name,
                                pro_model,
                                pro_part_no,
                                pro_image_name,
                                pro_price_seller, 
                                -- sales.status AS salesstatus,
                                -- sales.id_shop AS id_shop,
                                sum(pro_qty) as total_qty 
                    FROM sales_detail
                    JOIN sales ON sales.no_sales=sales_detail.no_sales 
                    JOIN products ON products.pro_id=sales_detail.pro_id
                    JOIN products_price ON products_price.pro_id=sales_detail.pro_id
                    JOIN products_image ON products_image.pro_id=sales_detail.pro_id
                    WHERE (sales.id_shop='$idshop') 
                    OR (sales.date_sales LIKE '$month')
                    -- AND (sales.status NOT LIKE 'Delivery')
                    -- AND (sales.status NOT LIKE 'Ready')
                    GROUP BY salesproid 
                    ORDER BY total_qty DESC
                    LIMIT 5";
        $this->builder = $this->db->query($totalSales);
        $result = $this->builder;
        return $result->getResult();
    }
}
