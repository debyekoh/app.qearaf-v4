<?php

namespace App\Controllers\AdminControlpage\Products;

use App\Controllers\BaseController;
use App\Models\ProductsCategoryModel;
use App\Models\ProductsGroupModel;
use App\Models\ProductsShowModel;

class Products extends BaseController
{
    protected $productscategoryModel;
    protected $productsgroupModel;
    protected $productsshowModel;

    public function __construct()
    {
        $this->productscategoryModel = new ProductsCategoryModel();
        $this->productsgroupModel = new ProductsGroupModel();
        $this->productsshowModel = new ProductsShowModel();
    }

    public function index()
    {
        $datapage = array(
            'titlepage' => 'Products',
            'tabshop' => $this->tabshop,
        );
        return view('pages_admin/adm_products', $datapage);
    }

    public function create()
    {
        $head_page =
            '
            <link href="assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css">

		
            ';
        $js_page =
            '
            <script src="assets/js/pages/ecommerce-choices.init.js"></script>
            <script src="assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
            
            ';
        $datapage = array(
            'titlepage' => 'Create',
            'tabshop' => $this->tabshop,
            'head_page' => $head_page,
            'js_page' => $js_page,
            'ProductsCategory' => $this->productscategoryModel->findAll(),
            'ProductsGroup' => $this->productsgroupModel->findAll(),
            'ProductsShow' => $this->productsshowModel->orderBy('pro_id_show', 'asc')->findAll(),
        );
        return view('pages_admin/adm_products_create', $datapage);
    }
}
