<?php

namespace App\Controllers\AdminControlpage\Products;

use App\Controllers\BaseController;
use App\Models\ProductsModel;
use App\Models\ProductsStockModel;
use App\Models\ProductsPriceModel;
use App\Models\ProductsShowModel;
use App\Models\ProductsGroupModel;
use App\Models\ProductsCategoryModel;
use App\Models\ProductsImageModel;

class Products extends BaseController
{
    protected $db;
    protected $builder;
    protected $productsModel;
    protected $productsstockModel;
    protected $productspriceModel;
    protected $productsshowModel;
    protected $productsgroupModel;
    protected $productscategoryModel;
    protected $ProductsImageModel;


    public function __construct()
    {
        $this->productsModel = new ProductsModel();
        $this->productsstockModel = new ProductsStockModel();
        $this->productspriceModel = new ProductsPriceModel();
        $this->productsshowModel = new ProductsShowModel();
        $this->productsgroupModel = new ProductsGroupModel();
        $this->productscategoryModel = new ProductsCategoryModel();
        $this->ProductsImageModel = new ProductsImageModel();
        $this->db      = \Config\Database::connect();
    }

    public function index()
    {
        $head_page =
            '
            <link href="http://localhost/app.qearaf-v4/public/assets/libs/gridjs/theme/mermaid.min.css" rel="stylesheet" type="text/css">
	
            ';
        $js_page =
            '
            <script src="http://localhost/app.qearaf-v4/public/assets/libs/gridjs/gridjs.umd.js"></script>
            <script src="http://localhost/app.qearaf-v4/public/assets/js/pages/myproduct.init.js"></script>
            
            ';
        $datapage = array(
            'titlepage' => 'Products',
            'tabshop' => $this->tabshop,
            'head_page' => $head_page,
            'js_page' => $js_page,
        );
        return view('pages_admin/adm_products', $datapage);
    }

    public function show()
    {
        $this->builder = $this->db->table('products');
        $this->builder->select('products.pro_id as productspro_id, pro_part_no, pro_name, pro_model, pro_price_seller, pro_active, pro_current_stock');
        $this->builder->join('products_price', 'products_price.pro_id = products.pro_id');
        $this->builder->join('products_stock', 'products_stock.pro_id = products.pro_id');
        $query = $this->builder->get();
        // dd($query->getResult());



        $datapage = array(
            'myproduct' => $this->productsModel->findAll(),
        );

        $dataarray = array(
            'productname' => $this->productsModel->findAll(),
        );

        $data = array();
        $row = array();
        // $no = 0;

        foreach ($query->getResult() as $i) {
            $row = [
                "no" => '',
                "name" => $i->pro_name,
                "model" => $i->pro_model,
                "price" => $i->pro_price_seller,
                "statusproduct" => $i->pro_active,
                "image" => $this->ProductsImageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($i->productspro_id)['pro_image_name']
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
        //     $row[] = $this->ProductsImageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($i->productspro_id)['pro_image_name'];
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
            <link href="http://localhost/app.qearaf-v4/public/assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css">
	
            ';
        $js_page =
            '
            <script src="http://localhost/app.qearaf-v4/public/assets/js/pages/form-createproduct.init.js"></script>
            <script src="http://localhost/app.qearaf-v4/public/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
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
            'pro_id' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Reload This Page',
                ],
            ],
            'productname' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must fill a Product Name.',
                ],
            ],
            'productmodel' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must fill a Product Model.',
                ],
            ],
            'skunumber' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must fill a SKU No.',
                ],
            ],
            'choicesproductgroup' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a Product Group.',
                ],
            ],
            'choicesproductcategory' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a Product Category.',
                ],
            ],
            'choicesproductshow' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a Product Show.',
                ],
            ],
            'basicprice' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must fill a Basic Price.',
                ],
            ],
            'resellerprice' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must fill a Reseller Price.',
                ],
            ],
            'sellingprice' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'You must choose a You must fill a Selling Price.',
                ],
            ]
        ];

        // if (!$this->request->getVar('bundingproduct')) {
        //     session()->setFlashdata('failed', 'Perubahan Tidak Berhasil di Simpan..!!!');
        //     return redirect()->back()->withInput();
        // }

        if (!$this->validate($rules)) {
            session()->setFlashdata('failed', 'Perubahan Tidak Berhasil di Simpan..!!!');
            return redirect()->back()->withInput();
        }


        // $name_product = $this->request->getVar();
        $dataProduct = array(
            'pro_id'            => $this->request->getVar('pro_id'),
            'pro_name'          => $this->request->getGetPost('productname'),
            'pro_model'         => $this->request->getVar('productmodel'),
            'pro_part_no'       => $this->request->getVar('skunumber'),
            'pro_group'         => $this->request->getVar('choicesproductgroup'),
            'pro_category'      => $this->request->getVar('choicesproductcategory'),
            'pro_show'          => $this->request->getVar('choicesproductshow'),
            'pro_brand'         => $this->request->getVar('brandproduct'),
            'pro_spec'          => $this->request->getVar('spesification'),
            'pro_bundling'      => $this->request->getGetPost('bundingproduct'),
            'pro_description'   => $this->request->getVar('productdesc'),
        );
        $dataPrice = array(
            'pro_id_price'      => $this->request->getVar('pro_id') . '-P-' . str_replace(' ', '', $this->request->getVar('skunumber')),
            'pro_id'            => $this->request->getVar('pro_id'),
            'pro_price_basic'   => $this->request->getVar('basicprice'),
            'pro_price_reseler' => $this->request->getVar('resellerprice'),
            'pro_price_seller'  => $this->request->getVar('sellingprice'),
        );
        $dataStock = array(
            'pro_id_stock'      => $this->request->getVar('pro_id') . '-S-' . str_replace(' ', '', $this->request->getVar('skunumber')),
            'pro_id'            => $this->request->getVar('pro_id'),
            'pro_current_stock' => $this->request->getVar('currentstock'),
            'pro_min_stock'     => $this->request->getVar('minstock'),
            'pro_max_stock'     => $this->request->getVar('maxstock'),
        );

        // dd($dataStock);

        $this->productsModel->insert($dataProduct);
        $this->productspriceModel->insert($dataPrice);
        $this->productsstockModel->insert($dataStock);
        if ($this->shopModel->affectedRows() > 0 && $this->productspriceModel->affectedRows()) {
            $msg = $this->request->getVar('productname') . ' Berhasil di Tambahkan';
            session()->setFlashdata('success', $msg);
            return redirect()->to('/myproducts');
        }

        // return $this->response->setJSON([
        //     'status' => true,
        //     'response' => 'Success create data ' . $name_product['pro_id'],
        //     'data' => $data,
        // ]);
    }
}
