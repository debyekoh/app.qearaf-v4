<?php

namespace App\Controllers\AdminControlpage\Ecommerce\Sales;

use App\Controllers\BaseController;
use App\Models\ProductsModel;
use App\Models\ProductsStockModel;
use App\Models\ProductsPriceModel;
use App\Models\ProductsShowModel;
use App\Models\ProductsGroupModel;
use App\Models\ProductsCategoryModel;
use App\Models\ProductsImageModel;

class Sales extends BaseController
{
    protected $db;
    protected $builder;
    protected $productsModel;
    protected $productsstockModel;
    protected $productspriceModel;
    protected $productsshowModel;
    protected $productsgroupModel;
    protected $productscategoryModel;
    protected $productsimageModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->productsModel = new ProductsModel();
        $this->productsstockModel = new ProductsStockModel();
        $this->productspriceModel = new ProductsPriceModel();
        $this->productsshowModel = new ProductsShowModel();
        $this->productsgroupModel = new ProductsGroupModel();
        $this->productscategoryModel = new ProductsCategoryModel();
        $this->productsimageModel = new ProductsImageModel();
        $this->db      = \Config\Database::connect();
    }

    public function index()
    {
        $datapage = array(
            'titlepage' => 'Sales',
            'tabshop' => $this->tabshop,
        );
        return view('pages_admin/adm_sales', $datapage);
    }

    public function list()
    {
        $this->builder = $this->db->table('products');
        $this->builder->select('products.pro_id as productspro_id, pro_part_no, pro_name, pro_model, pro_price_seller, pro_show, pro_active, pro_current_stock');
        $this->builder->join('products_price', 'products_price.pro_id = products.pro_id');
        $this->builder->join('products_stock', 'products_stock.pro_id = products.pro_id');
        $query = $this->builder->get();



        $datapage = array(
            'myproduct' => $this->productsModel->findAll(),
        );

        $dataarray = array(
            'productname' => $this->productsModel->findAll(),
        );

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
                "current_stock" => $i->pro_current_stock,
                "statusproduct" => $i->pro_active,
                "editable" => $editable,
                "deletable" => $deletable,
                "image" => isset($this->productsimageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($i->productspro_id)['pro_image_name']) ? $this->productsimageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($i->productspro_id)['pro_image_name'] : 'no_image.png',
            ];
            $data[] = $row;
        }

        // foreach ($query->getResult() as $i) {
        //     $row[] = $i->pro_model;
        //     $row[] = $i->pro_price_seller;
        //     $row[] = $i->pro_price_seller;
        //     $row[] = $i->pro_price_seller;
        //     $row[] = $i->pro_price_seller;
        //     $row[] = $i->pro_price_seller;
        //     $row[] = $this->productsimageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($i->productspro_id)['pro_image_name'];
        //     $data[] = $row;
        // }

        return $this->response->setJSON([
            'status' => true,
            'response' => 'Success show data',
            // 'results' => $this->productsModel->findAll(),
            // 'results' => $query->getResult(),
            'results' => $data,
        ]);
    }

    public function create()
    {
        $head_page =
            '
            <link href="' . base_url() . 'assets/libs/gridjs/theme/mermaid.min.css" rel="stylesheet" type="text/css">

            ';
        $js_page =
            '
            <script src="' . base_url() . 'assets/libs/gridjs/gridjs.umd.js"></script>
            <script src="' . base_url() . 'assets/js/pages/form-addnewsales.init.js"></script>

            ';
        $datapage = array(
            'titlepage' => 'Add New Sales',
            'tabshop' => $this->tabshop,
            'head_page' => $head_page,
            'js_page' => $js_page,
            'datashop' => $this->shopModel->asArray()->where('member_id', user()->member_id)->orderBy('marketplace', 'asc')->findAll(),
        );
        return view('pages_admin/adm_sales_add_new_sales', $datapage);
    }
}
