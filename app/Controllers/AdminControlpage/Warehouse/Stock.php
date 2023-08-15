<?php

namespace App\Controllers\AdminControlpage\Warehouse;

use App\Controllers\BaseController;
use App\Models\ProductsModel;
use App\Models\ProductsStockModel;
use App\Models\ProductsPriceModel;
use App\Models\ProductsShowModel;
use App\Models\ProductsGroupModel;
use App\Models\ProductsCategoryModel;
use App\Models\ProductsImageModel;
use App\Models\ListNotificationModel;
use App\Models\ProductsStockLogModel;

class Stock extends BaseController
{
    protected $db;
    protected $builder;
    protected $productsModel;
    protected $productsStockModel;
    protected $productsStockLogModel;
    protected $productspriceModel;
    protected $productsshowModel;
    protected $productsgroupModel;
    protected $productscategoryModel;
    protected $productsimageModel;
    protected $listNotificationModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->productsModel = new ProductsModel();
        $this->productsStockModel = new ProductsStockModel();
        $this->productsStockLogModel = new ProductsStockLogModel();
        // $this->productspriceModel = new ProductsPriceModel();
        // $this->productsshowModel = new ProductsShowModel();
        // $this->productsgroupModel = new ProductsGroupModel();
        // $this->productscategoryModel = new ProductsCategoryModel();
        $this->productsimageModel = new ProductsImageModel();
        // $this->listNotificationModel = new ListNotificationModel();
        $this->db      = \Config\Database::connect();
    }

    public function index()
    {
        $head_page =
            '
            <link href="assets/libs/gridjs/theme/mermaid.min.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="assets/libs/sweetalert2/sweetalert2.min.css">
	
            ';
        $js_page =
            '
            <script src="assets/libs/gridjs/gridjs.umd.js"></script>
            <script src="assets/js/pages/mywarehouse.init.js"></script>
            <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
            
            ';
        $datapage = array(
            'titlepage' => 'Stock',
            'tabshop' => $this->tabshop,
            'head_page' => $head_page,
            'js_page' => $js_page,
        );
        return view('pages_admin/adm_warehouse_stock', $datapage);
    }

    public function show($group_product)
    {
        $this->builder = $this->db->table('products');
        $this->builder->select('products.pro_id as productspro_id, pro_part_no, pro_name, pro_model, pro_price_seller, pro_active, pro_current_stock , pro_min_stock , pro_max_stock');
        $this->builder->join('products_price', 'products_price.pro_id = products.pro_id');
        $this->builder->join('products_stock', 'products_stock.pro_id = products.pro_id');
        if ($group_product == "NotConsumable") {
            $this->builder->notLike('pro_group', 'Consumable');
        }
        if ($group_product == "Consumable") {
            $this->builder->like('pro_group', 'Consumable');
            $this->builder->notLike('pro_name', 'Iklan');
        }
        $this->builder->notLike('pro_bundling', '1');
        $query = $this->builder->get();
        // dd($query->getResult());


        if (in_groups('1') == true || in_groups('2') == true) {
            $editable = true;
        } else {
            $editable = false;
        }
        if (in_groups('1') == true) {
            $deletable = true;
        } else {
            $deletable = false;
        }

        $data = array();
        $row = array();
        $no = 0;

        foreach ($query->getResult() as $i) {
            $row = [
                "no" => $no++,
                "idpro" => $i->productspro_id,
                "name" => $i->pro_name,
                "model" => $i->pro_model,
                "skuno" => $i->pro_part_no,
                "price" => $i->pro_price_seller,
                "stock" => $i->pro_current_stock,
                "minstock" => $i->pro_min_stock,
                "maxstock" => $i->pro_max_stock,
                "statusproduct" => $i->pro_active,
                "editable" => $editable,
                "deletable" => $deletable,
                "image" => isset($this->productsimageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($i->productspro_id)['pro_image_name']) ? $this->productsimageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($i->productspro_id)['pro_image_name'] : 'no_image.png',
            ];
            $data[] = $row;
        }


        return $this->response->setJSON([
            'status' => true,
            'response' => 'Success show data',
            'results' => $data,
        ]);
    }

    public function get_current_stock($id_product)
    {
        return $this->response->setJSON([
            'a' => $this->productsModel->find($id_product)['pro_name'] . " " . $this->productsModel->find($id_product)['pro_model'],
            'b' => $this->productsStockModel->find($id_product)['pro_current_stock'],
        ]);
    }

    public function update_current_stock($id_product)
    {
        $valstock = $this->request->getVar('valstock');

        if (!$this->productsStockModel->find($id_product)) {
            $this->response->setStatusCode(404);
        } else {
            $current_stock = $this->productsStockModel->find($id_product)['pro_current_stock'];
            $new_stock = $valstock;
            $trans_stock = $new_stock - $current_stock;
            $productsStockLog = array(
                'products_stock_log_proid'  => $id_product,
                'log_key'                   => date("ymd") . "/CHANGE-STOCK/" . sprintf("%04d", count($this->productsStockLogModel->like('log_key', date("ymd") . "/CHANGE-STOCK/")->findAll()) + 1),
                'log_code'                  => "CHANGE-STOCK",
                'log_description'           => "Change Stock " . $id_product,
                'link'                      => 'product/' . $this->productsModel->find($id_product)['pro_part_no'],
                'last_value'                => $current_stock,
                'trans_value'               => $trans_stock,
                'new_value'                 => $new_stock,
            );


            $this->db->transBegin();
            $this->productsStockModel->update(['pro_id' => $id_product], ['pro_current_stock' => $valstock]);
            $this->productsStockLogModel->insert($productsStockLog);
            // $this->ballanceEWalletLog->insert($dataewalletlog);
            // $this->ballanceAccount->update(['balance_userid' => user_id()], $dataebalaccount);
            // $this->listNotificationModel->insertBatch($dataNotification);

            if ($this->db->transStatus() === false) {
                $this->db->transRollback();
                return $this->response->setStatusCode(404);
            } else {
                $this->db->transCommit();
                return $this->response->setJSON(['status' => 'success']);
            }
        }
    }
}
