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
        // <script src="https://unpkg.com/jquery/dist/jquery.min.js"></script>
        // <script src="https://unpkg.com/gridjs-jquery/dist/gridjs.production.min.js"></script>
        // <link rel="stylesheet" type="text/css" href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" />
        $head_page =
            '
            <link href="assets/libs/gridjs/theme/mermaid.min.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="assets/libs/sweetalert2/sweetalert2.min.css">
	
            ';
        $js_page =
            '
            <script src="assets/libs/gridjs/gridjs.umd.js"></script>
            <script src="assets/js/pages/myproduct.init.js"></script>
            <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
            
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
        $no = 0;

        foreach ($query->getResult() as $i) {
            $row = [
                "no" => $no++,
                "idpro" => $i->productspro_id,
                "name" => $i->pro_name,
                "model" => $i->pro_model,
                "skuno" => $i->pro_part_no,
                "price" => $i->pro_price_seller,
                "statusproduct" => $i->pro_active,
                "image" => isset($this->ProductsImageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($i->productspro_id)['pro_image_name']) ? $this->ProductsImageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($i->productspro_id)['pro_image_name'] : 'no_image.png',
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
        return view('pages_admin/test', $datapage);
    }


    // public function save()
    // {

    //     $rules = [
    //         'pro_id' => [
    //             'rules'  => 'required',
    //             'errors' => [
    //                 'required' => 'Reload This Page',
    //             ],
    //         ],
    //         'productname' => [
    //             'rules'  => 'required',
    //             'errors' => [
    //                 'required' => 'You must fill a Product Name.',
    //             ],
    //         ],
    //         'productmodel' => [
    //             'rules'  => 'required',
    //             'errors' => [
    //                 'required' => 'You must fill a Product Model.',
    //             ],
    //         ],
    //         'skunumber' => [
    //             'rules'  => 'required|is_unique[products.pro_part_no]',
    //             'errors' => [
    //                 'required'  => 'You must fill a SKU No.',
    //                 'is_unique' => 'SKU No. Already Exist',
    //             ],
    //         ],
    //         'choicesproductgroup' => [
    //             'rules'  => 'required',
    //             'errors' => [
    //                 'required' => 'You must choose a Product Group.',
    //             ],
    //         ],
    //         'choicesproductcategory' => [
    //             'rules'  => 'required',
    //             'errors' => [
    //                 'required' => 'You must choose a Product Category.',
    //             ],
    //         ],
    //         'choicesproductshow' => [
    //             'rules'  => 'required',
    //             'errors' => [
    //                 'required' => 'You must choose a Product Show.',
    //             ],
    //         ],
    //         'basicprice' => [
    //             'rules'  => 'required',
    //             'errors' => [
    //                 'required' => 'You must fill a Basic Price.',
    //             ],
    //         ],
    //         'resellerprice' => [
    //             'rules'  => 'required',
    //             'errors' => [
    //                 'required' => 'You must fill a Reseller Price.',
    //             ],
    //         ],
    //         'sellingprice' => [
    //             'rules'  => 'required',
    //             'errors' => [
    //                 'required' => 'You must choose a You must fill a Selling Price.',
    //             ],
    //         ]
    //     ];

    //     // if (!$this->request->getVar('bundingproduct')) {
    //     //     session()->setFlashdata('failed', 'Perubahan Tidak Berhasil di Simpan..!!!');
    //     //     return redirect()->back()->withInput();
    //     // }

    //     if (!$this->validate($rules)) {
    //         session()->setFlashdata('failed', 'Perubahan Tidak Berhasil di Simpan..!!!');
    //         return redirect()->back()->withInput();
    //     }


    //     // $name_product = $this->request->getVar();
    //     $dataProduct = array(
    //         'pro_id'            => $this->request->getVar('pro_id'),
    //         'pro_name'          => $this->request->getGetPost('productname'),
    //         'pro_model'         => $this->request->getVar('productmodel'),
    //         'pro_part_no'       => $this->request->getVar('skunumber'),
    //         'pro_group'         => $this->request->getVar('choicesproductgroup'),
    //         'pro_category'      => $this->request->getVar('choicesproductcategory'),
    //         'pro_show'          => $this->request->getVar('choicesproductshow'),
    //         'pro_brand'         => $this->request->getVar('brandproduct'),
    //         'pro_spec'          => $this->request->getVar('spesification'),
    //         'pro_bundling'      => $this->request->getGetPost('bundingproduct'),
    //         'pro_description'   => $this->request->getVar('productdesc'),
    //     );
    //     $dataPrice = array(
    //         'pro_id_price'      => $this->request->getVar('pro_id') . '-P-' . str_replace(' ', '', $this->request->getVar('skunumber')),
    //         'pro_id'            => $this->request->getVar('pro_id'),
    //         'pro_price_basic'   => $this->request->getVar('basicprice'),
    //         'pro_price_reseler' => $this->request->getVar('resellerprice'),
    //         'pro_price_seller'  => $this->request->getVar('sellingprice'),
    //     );
    //     $dataStock = array(
    //         'pro_id_stock'      => $this->request->getVar('pro_id') . '-S-' . str_replace(' ', '', $this->request->getVar('skunumber')),
    //         'pro_id'            => $this->request->getVar('pro_id'),
    //         'pro_current_stock' => $this->request->getVar('currentstock'),
    //         'pro_min_stock'     => $this->request->getVar('minstock'),
    //         'pro_max_stock'     => $this->request->getVar('maxstock'),
    //     );
    //     $namepic1 = $this->request->getVar('pro_id') . '-picture.jpg';
    //     $propic1 = $this->request->getFile('propic1');
    //     $propic1->move('assets/images/product', $namepic1);
    //     $dataImage = array(
    //         'pro_id_image'      => $this->request->getVar('pro_id') . '-I-' . str_replace(' ', '', $this->request->getVar('skunumber')),
    //         'pro_id'            => $this->request->getVar('pro_id'),
    //         'pro_image_no'      => "1",
    //         'pro_image_name'     => $namepic1,
    //     );

    //     // dd($dataStock);

    //     $this->productsModel->insert($dataProduct);
    //     $this->productspriceModel->insert($dataPrice);
    //     $this->productsstockModel->insert($dataStock);
    //     if ($this->shopModel->affectedRows() > 0 && $this->productspriceModel->affectedRows()) {
    //         $msg = $this->request->getVar('productname') . ' Berhasil di Tambahkan';
    //         session()->setFlashdata('success', $msg);
    //         return redirect()->to('/myproducts');
    //     }

    //     // return $this->response->setJSON([
    //     //     'status' => true,
    //     //     'response' => 'Success create data ' . $name_product['pro_id'],
    //     //     'data' => $data,
    //     // ]);
    // }

    public function save()
    {
        // $namepic1 = $this->request->getVar('pro_id') . '-picture.jpg';
        // $propic1 = $this->request->getFile('propic1');
        // $propic1->move('assets/images/product', $namepic1);
        // $dataImage = array(
        //     'pro_id_image'      => $this->request->getVar('pro_id') . '-I-' . str_replace(' ', '', $this->request->getVar('skunumber')),
        //     'pro_id'            => $this->request->getVar('pro_id'),
        //     'pro_image_no'      => "1",
        //     'pro_image_name'     => $namepic1,
        // );
        $imagefile = $this->request->getFileMultiple('propic');
        $no = 1;
        $no_a = 1;
        // $no_b = 1;
        foreach ($imagefile as $img) {
            $newName = $this->request->getVar('pro_id') . '-picture-' . $no++ . '.avif';
            $no_image = $no_a++;
            // $pro_id_image = $this->request->getVar('pro_id') . $no_b++ . '-I-' . str_replace(' ', '', $this->request->getVar('skunumber'));
            $img->move('assets/images/product', $newName);
            $dataImage = array(
                // 'pro_id_image'      => $pro_id_image,
                'pro_id'            => $this->request->getVar('pro_id'),
                'pro_image_no'      => $no_image,
                'pro_image_name'     => $newName,
            );
            $this->ProductsImageModel->insert($dataImage);
        }
        dd($imagefile);
        // if ($imagefile = $this->request->getFileMultiple()) {
        //     foreach ($imagefile['propic'] as $img) {
        //         if ($img->isValid() && !$img->hasMoved()) {
        //             $newName = $img->getRandomName();
        //             $img->move('assets/images/product', $newName);
        //             dd($newName);
        //         }
        //     }
        // }
    }

    public function edit()
    {
        $skuno = $this->request->getVar('_var');
        $proid = $this->productsModel->where('pro_part_no', $skuno)->find()[0]['pro_id'];
        if ($this->productsModel->where('pro_part_no', $skuno)->find() == null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
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

            $test = $this->productsModel->get();
            $dataProduct = array(
                'pro_id'            => $this->productsModel->where('pro_part_no', $skuno)->find()[0]['pro_id'],
                'pro_name'          => $this->productsModel->where('pro_part_no', $skuno)->find()[0]['pro_name'],
                'pro_model'         => $this->productsModel->where('pro_part_no', $skuno)->find()[0]['pro_model'],
                'pro_part_no'       => $this->productsModel->where('pro_part_no', $skuno)->find()[0]['pro_part_no'],
                'pro_group'         => $this->productsModel->where('pro_part_no', $skuno)->find()[0]['pro_group'],
                'pro_category'      => $this->productsModel->where('pro_part_no', $skuno)->find()[0]['pro_category'],
                'pro_show'          => $this->productsModel->where('pro_part_no', $skuno)->find()[0]['pro_show'],
                'pro_name_show'     => $this->productsshowModel->find($this->productsModel->where('pro_part_no', $skuno)->find()[0]['pro_show'])['pro_name_show'],
                'pro_brand'         => $this->productsModel->where('pro_part_no', $skuno)->find()[0]['pro_brand'],
                'pro_spec'          => $this->productsModel->where('pro_part_no', $skuno)->find()[0]['pro_spec'],
                'pro_bundling'      => $this->productsModel->where('pro_part_no', $skuno)->find()[0]['pro_bundling'],
                'pro_description'   => $this->productsModel->where('pro_part_no', $skuno)->find()[0]['pro_description'],
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



            $datapage = array(
                'titlepage' => 'Edit',
                'tabshop' => $this->tabshop,
                'head_page' => $head_page,
                'js_page' => $js_page,
                'DataEdit' => $test,
                'DataProduct' => $dataProduct,
                'ProductsCategory' => $this->productscategoryModel->findAll(),
                'ProductsGroup' => $this->productsgroupModel->findAll(),
                'ProductsShow' => $this->productsshowModel->orderBy('pro_id_show', 'asc')->findAll(),
                'validation' => \Config\Services::validation()
            );
            return view('pages_admin/adm_products_edit', $datapage);
        }
    }

    public function copy($skuno)
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
            'titlepage' => 'Duplicate',
            'tabshop' => $this->tabshop,
            'head_page' => $head_page,
            'js_page' => $js_page,
            'ProductsCategory' => $this->productscategoryModel->findAll(),
            'ProductsGroup' => $this->productsgroupModel->findAll(),
            'ProductsShow' => $this->productsshowModel->orderBy('pro_id_show', 'asc')->findAll(),
            'validation' => \Config\Services::validation()
        );
        return view('pages_admin/adm_products_copy', $datapage);
    }

    public function delete()
    {
        $skuno = $this->request->getVar('d');
        $pro_id = $this->productsModel->where('pro_part_no', $skuno)->find()[0]['pro_id'];
        // $users = $userModel->where('active', 1)->findAll();
        // dd($pro_id);
        // $this->shopModel->asArray()->where('member_id', user()->member_id)->orderBy('marketplace', 'asc')->findAll(),


        $PostresponeGET = $this->request->getVar('getResp');
        $responeGET = array(
            'name_shop'   => $this->productsModel->find($pro_id)['pro_name'] . ' ' . $this->productsModel->find($pro_id)['pro_model'],
            'respone'     => 'success',
        );
        $responePOST = array(
            'name_shop'   => $this->productsModel->find($pro_id)['pro_name'] . ' ' . $this->productsModel->find($pro_id)['pro_model'],
            'respone'     => 'deleted',
        );
        if ($pro_id != null && $PostresponeGET == null) {
            echo json_encode($responeGET);
        }
        if ($pro_id != null && $PostresponeGET != null) {
            $this->productsModel->delete($pro_id);
            if ($this->productsModel->affectedRows() > 0) {
                echo json_encode($responePOST);
            }
        }
    }
}
