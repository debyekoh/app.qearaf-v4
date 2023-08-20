<?php

namespace App\Controllers\AdminControlpage\Finance;

use App\Controllers\BaseController;
use App\Models\ProductsImageModel;

class InventoryValue extends BaseController
{
    protected $db;
    protected $builder;
    protected $productsimageModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->productsimageModel = new ProductsImageModel();
        $this->db      = \Config\Database::connect();
    }

    public function index()
    {
        $head_page =
            '
            <link href="assets/libs/gridjs/theme/mermaid.min.css" rel="stylesheet" type="text/css">
            ';
        $js_page =
            '
            <script src="assets/libs/gridjs/gridjs.umd.js"></script>
            <script src="assets/js/pages/myinventory.init.js"></script>
            
            ';

        $this->builder = $this->db->table('products');
        $this->builder->select('products.pro_id as productspro_id, pro_part_no, pro_name, pro_model,pro_price_basic, pro_price_seller, pro_active, pro_current_stock , pro_min_stock , pro_max_stock');
        $this->builder->join('products_price', 'products_price.pro_id = products.pro_id');
        $this->builder->join('products_stock', 'products_stock.pro_id = products.pro_id');
        $this->builder->notLike('pro_name', 'Iklan');
        $this->builder->notLike('pro_bundling', '1');
        $query = $this->builder->get();

        $inventory = array();
        foreach ($query->getResult() as $g) {
            $inventory[] = $g->pro_price_basic * $g->pro_current_stock;
        }

        $datapage = array(
            'titlepage' => 'Inventory Value',
            'tabshop' => $this->tabshop,
            'head_page' => $head_page,
            'js_page' => $js_page,
            'invvalue' => array_sum($inventory),
        );
        return view('pages_admin/adm_finance_inventory', $datapage);
    }

    public function show()
    {
        $this->builder = $this->db->table('products');
        $this->builder->select('products.pro_id as productspro_id, pro_part_no, pro_name, pro_model,pro_price_basic, pro_price_seller, pro_active, pro_current_stock , pro_min_stock , pro_max_stock');
        $this->builder->join('products_price', 'products_price.pro_id = products.pro_id');
        $this->builder->join('products_stock', 'products_stock.pro_id = products.pro_id');
        $this->builder->notLike('pro_name', 'Iklan');
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
                "name" => $i->pro_name,
                "model" => $i->pro_model,
                "skuno" => $i->pro_part_no,
                "stock" => $i->pro_current_stock,
                "valinv" => number_format($i->pro_current_stock * $i->pro_price_basic, 0, ",", ".") . ",-",
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
}
