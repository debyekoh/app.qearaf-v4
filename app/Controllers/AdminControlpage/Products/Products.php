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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
            
            ';
        $datapage = array(
            'titlepage' => 'Create',
            'tabshop' => $this->tabshop,
            'head_page' => $head_page,
            'js_page' => $js_page,
            'ProductsCategory' => $this->productscategoryModel->findAll(),
            'ProductsGroup' => $this->productsgroupModel->findAll(),
            'ProductsShow' => $this->productsshowModel->orderBy('pro_id_show', 'asc')->findAll(),
            'validation' => \Config\Services::validation()
        );
        return view('pages_admin/adm_products_create', $datapage);
    }


    public function save()
    {

        $rules = [
            'pro_id' => 'required|min_length[8]',
            'productname' => 'required|min_length[5]',
            'productmodel' => 'required|min_length[10]',
            'skunumber' => 'required|min_length[10]',
            'choicesproductgroup' => 'required|min_length[10]',
            'choicesproductcategory' => 'required|min_length[10]',
            'choicesproductshow' => 'required|min_length[10]',
            'basicprice' => 'required|min_length[10]',
            'resellerprice' => 'required|min_length[10]',
            'sellingprice' => 'required|min_length[10]',
        ];

        if (!$this->validate($rules)) {
            session()->setFlashdata('failed', 'Perubahan Tidak Berhasil di Simpan..!!!');
            return redirect()->back()->withInput();
        }


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
