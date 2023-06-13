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

    public function save()
    {
        $name_product = $this->request->getVar();
        $data = array(
            'pro_id'            => $this->request->getVar('pro_id'),
            'pro_name'          => $this->request->getVar('productname'),
            'pro_model'         => $this->request->getVar('productmodel'),
            'pro_part_no'       => $this->request->getVar('skunumber'),
            'pro_group'         => $this->request->getVar('choicesproductgroup'),
            'pro_category'      => $this->request->getVar('choicesproductcategory'),
            'pro_show'          => $this->request->getVar('choicesproductshow'),
            'pro_current_stock' => $this->request->getVar('currentstock'),
            'pro_min_stock'     => $this->request->getVar('minstock'),
            'pro_max_stock'     => $this->request->getVar('maxstock'),
            'pro_price_basic'   => $this->request->getVar('basicprice'),
            'pro_price_reseler' => $this->request->getVar('resellerprice'),
            'pro_price_seller'  => $this->request->getVar('sellingprice'),
            'pro_brand'         => $this->request->getVar('brandproduct'),
            'pro_spec'          => $this->request->getVar('spesification'),
            'pro_bundling'      => $this->request->getVar('bundingproduct'),
            'pro_description'   => $this->request->getVar('productdesc'),
        );

        return $this->response->setJSON([
            'status' => true,
            'response' => 'Success create data ' . $name_product['pro_id'],
            'data' => $data,
        ]);
    }
}
