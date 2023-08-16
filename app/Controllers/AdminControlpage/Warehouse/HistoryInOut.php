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

class HistoryInOut extends BaseController
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
            <script src="assets/js/pages/mywarehouselog.init.js"></script>
            <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
            
            ';
        $datapage = array(
            'titlepage' => 'History InOut',
            'tabshop' => $this->tabshop,
            'head_page' => $head_page,
            'js_page' => $js_page,
        );
        return view('pages_admin/adm_warehouse_history_inout', $datapage);
    }

    public function historyLog()
    {
        $this->builder = $this->db->table('products_stock_log');
        // if (!in_groups('1') && !in_groups('2')) {
        //     $this->builder->where('balance_userid_log', user_id());
        // }
        $this->builder->orderBy('created_at', 'DESC');
        $this->builder->orderBy('log_code', 'DESC');
        $query = $this->builder->get();

        $data = array();
        $row = array();
        $no = 0;

        foreach ($query->getResult() as $i) {
            if ($i->log_code == "CHANGE-STOCK") {
                $idpro = $i->products_stock_log_proid;
                $no_transaction = null;
                // $log_transaction = $this->productsModel->find($idpro)['pro_name'] . " " . $this->productsModel->find($idpro)['pro_model'];
            };
            if ($i->log_code == "PURCHASE") {
                $idpro = $i->products_stock_log_proid;
                $no_transaction = substr($i->log_description, 9);
                // $log_transaction = $this->productsModel->find($idpro)['pro_name'] . " " . $this->productsModel->find($idpro)['pro_model'];
            };
            if ($i->log_code == "SALES") {
                $idpro = $i->products_stock_log_proid;
                $no_transaction = substr($i->log_description, 6);
                // $log_transaction = $this->productsModel->find($idpro)['pro_name'] . " " . $this->productsModel->find($idpro)['pro_model'];
            };
            if ($i->log_code == "CANCEL-SALES") {
                $idpro = $i->products_stock_log_proid;
                $no_transaction = substr($i->log_description, 7);
                // $log_transaction = $this->productsModel->find($idpro)['pro_name'] . " " . $this->productsModel->find($idpro)['pro_model'];
            };
            if ($i->log_code == "RETURN-SALES") {
                $idpro = $i->products_stock_log_proid;
                $no_transaction = substr($i->log_description, 7);
            };
            if ($i->log_code == "EDIT-SALES-LAST") {
                $idpro = $i->products_stock_log_proid;
                $no_transaction = substr($i->log_description, 15);
            };
            if ($i->log_code == "EDIT-SALES-NEW") {
                $idpro = $i->products_stock_log_proid;
                $no_transaction = substr($i->log_description, 15);
            };
            $log_transaction = $this->productsModel->find($idpro)['pro_name'] . " " . $this->productsModel->find($idpro)['pro_model'];



            $row = [
                "no"                    => $no++,
                "no_transaction"        => $no_transaction,
                "log_code"              => $i->log_code,
                "log_transaction"       => $log_transaction,
                "link"                  => $i->link,
                'last_value'            => $i->last_value,
                'trans_value'           => $i->trans_value,
                'new_value'             => $i->new_value,
                'date'                  => $i->created_at
            ];
            $data[] = $row;
        }

        // dd($data);
        return $this->response->setJSON([
            'results' => $data,
        ]);
    }
}
