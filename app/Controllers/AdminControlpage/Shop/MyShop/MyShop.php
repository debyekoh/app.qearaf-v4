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
        return view('pages_admin/adm_shop', $datapage);
    }

    public function shops($id_shop)
    {
        $shop_name = $this->shopModel->asArray()->where('member_id', user()->member_id)->where('active', 1)->find($id_shop);
        if (!$shop_name) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $js_page =
            '
            <script src="' . base_url() . 'assets/js/pages/shop.init.js"></script>
            
            ';
        $countitem = array(
            'Process'       => count($this->salesModel->where('id_shop', $id_shop)->where('status', "Process")->findAll()),
            'Packaging'     => count($this->salesModel->where('id_shop', $id_shop)->where('status', "Packaging")->findAll()),
            'Ready'         => count($this->salesModel->where('id_shop', $id_shop)->where('status', "Ready")->findAll()),
            'Delivery'      => count($this->salesModel->where('id_shop', $id_shop)->where('status', "Delivery")->findAll()),
            'Received'      => count($this->salesModel->where('id_shop', $id_shop)->where('status', "Received")->findAll()),
            'Completed'     => count($this->salesModel->where('id_shop', $id_shop)->where('status', "Completed")->findAll()),
            'Return'        => count($this->salesModel->where('id_shop', $id_shop)->where('status', "Return")->findAll()),
            'Cancel'        => count($this->salesModel->where('id_shop', $id_shop)->where('status', "Cancel")->findAll()),
        );
        $datapage = array(
            'titlepage' => $shop_name['marketplace'] . ' - ' . $shop_name['name_shop'],
            'tabshop'   => $this->tabshop,
            'shop'      => base64_encode(base64_encode($id_shop)),
            'item'      => $countitem,
            'js_page'   => $js_page,
        );
        return view('pages_admin/adm_shop', $datapage);
    }
}
