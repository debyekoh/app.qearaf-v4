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
use App\Models\SalesModel;
use App\Models\SalesDetailModel;

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
    protected $salesModel;
    protected $salesdetailModel;

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
        $this->salesModel = new SalesModel();
        $this->salesdetailModel = new SalesDetailModel();
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
            <script src="assets/js/pages/mysales.init.js"></script>
            <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
            
            ';
        $datapage = array(
            'titlepage' => 'Sales',
            'tabshop' => $this->tabshop,
            'head_page' => $head_page,
            'js_page' => $js_page,
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

        return $this->response->setJSON([
            'status' => true,
            'response' => 'Success show data',
            // 'results' => $this->productsModel->findAll(),
            // 'results' => $query->getResult(),
            'results' => $data,
        ]);
    }

    public function selectedP()
    {
        $skuno = $this->request->getVar('sku');
        $pro_id = $this->productsModel->where('pro_part_no', $skuno)->find()[0]['pro_id'];
        $dataselect = array(
            'proid' => $this->productsModel->where('pro_part_no', $skuno)->find()[0]['pro_id'],
            'image' => isset($this->productsimageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($pro_id)['pro_image_name']) ? $this->productsimageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($pro_id)['pro_image_name'] : 'no_image.png',
            'name' => $this->productsModel->find($pro_id)['pro_name'] . ' ' . $this->productsModel->find($pro_id)['pro_model'],
            'price' => $this->productspriceModel->find($pro_id)['pro_price_seller'],
        );

        return $this->response->setJSON([
            'status' => true,
            'response' => 'Success',
            // 'results' => $this->productsModel->findAll(),
            // 'results' => $query->getResult(),
            'results' => $dataselect,
        ]);
    }

    public function checkNoSales()
    {
        $nosales = $this->request->getVar('nosales');
        if ($this->salesModel->where('no_sales', $nosales)->findAll() != null) {
            $status = "error";
        } else {
            $status = "success";
        }

        return $this->response->setJSON([
            'status' => $status,
        ]);
    }


    public function create()
    {
        $head_page =
            '
            <link href="' . base_url() . 'assets/libs/gridjs/theme/mermaid.min.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="' . base_url() . 'assets/libs/sweetalert2/sweetalert2.min.css">

            ';
        $js_page =
            '
            <script src="' . base_url() . 'assets/libs/gridjs/gridjs.umd.js"></script>
            <script src="' . base_url() . 'assets/js/pages/form-addnewsales.init.js"></script>
            <script src="' . base_url() . 'assets/libs/sweetalert2/sweetalert2.min.js"></script>

            ';
        $datapage = array(
            'titlepage' => 'Add New Sales',
            'tabshop' => $this->tabshop,
            'head_page' => $head_page,
            'js_page' => $js_page,
            'listdeliveryservices' => $this->ListDeliveryServicesModel->findAll(),
            'datashop' => $this->shopModel->asArray()->where('member_id', user()->member_id)->orderBy('marketplace', 'asc')->findAll(),
        );
        return view('pages_admin/adm_sales_add_new_sales', $datapage);
    }

    public function save()
    {
        // dd($this->request->getVar());
        $dataSales = array(
            'id_sales'              => strtoupper($this->request->getVar('id_sales')),
            'no_sales'              => strtoupper($this->request->getVar('no_sales')),
            'date_sales'            => $this->request->getVar('date_sales'),
            'id_shop'               => $this->request->getVar('shop'),
            'deliveryservices'      => $this->request->getVar('deliveryservices'),
            'marketplace'           => $this->request->getVar('shop'),
            'resi'                  => strtoupper($this->request->getVar('no_resi')),
            'note'                  => $this->request->getVar('notes'),
            'packaging'             => $this->request->getVar('packagingmethod'),
            'paymethod'             => $this->request->getVar('paymethod'),
            'status'                => "process",
        );

        $dataSalesDetail = array();
        for ($a = 0; $a < count($this->request->getVar('proid')); $a++) {
            $dataSalesDetail[] = array(
                'id_sales_detail'       => strtoupper($this->request->getVar('id_sales')) . '/' . $a,
                'no_sales'              => strtoupper($this->request->getVar('no_sales')),
                'date_sales'            => $this->request->getVar('date_sales'),
                'pro_id'                => $this->request->getVar('proid')[$a],
                'pro_img'               => $this->request->getVar('proimg')[$a],
                'pro_price'             => $this->request->getVar('price')[$a],
                'pro_qty'               => $this->request->getVar('qty')[$a],
            );
        }

        // dd($dataSalesDetail, $dataSales);
        $this->salesModel->insert($dataSales);
        $this->salesdetailModel->insertBatch($dataSalesDetail);
        if ($this->salesModel->db->affectedRows() > 0 && $this->salesdetailModel->db->affectedRows() > 0) {
            $msg = $this->request->getVar('no_sales') . ' Berhasil di Tambahkan';
            session()->setFlashdata('success', $msg);
            return redirect()->to('/sales');
        }
    }

    public function show($tab)
    {
        $this->builder = $this->db->table('sales');
        // $this->builder->select('id_sales , no_sales , date_sales , name_delivery_services , name_shop as shopname , shop.marketplace as shopmarketplace , status');
        // $this->builder->join('sales_detail', 'sales_detail.no_sales= sales.no_sales');
        $this->builder->join('list_delivery_services', 'list_delivery_services.id = sales.packaging');
        $this->builder->join('list_pay_methode', 'list_pay_methode.id= sales.paymethod');
        $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
        $query = $this->builder->get();
        // dd($query->getResult());



        $datapage = array(
            'myproduct' => $this->productsModel->findAll(),
        );

        $dataarray = array(
            'productname' => $this->productsModel->findAll(),
        );

        if (in_groups('4') == true) {
            $editable = false;
        } else {
            $editable = true;
        }
        if (in_groups('4') == true) {
            $deletable = false;
        } else {
            $deletable = true;
        }

        $data = array();
        $row = array();
        $imgdata = array();
        $no = 0;
        $noa = 0;

        foreach ($query->getResult() as $i) {
            $row = [
                "no" => $no++,
                // "img_sales"     => $this->productsimageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($this->salesdetailModel->where('no_sales', $i->no_sales)->orderBy('id_sales_detail', 'asc')->find()[0]['pro_id'])['pro_image_name'],
                // "img_sales"     => $imgdata,
                "item_detail"   => $this->salesdetailModel->where('no_sales', $i->no_sales)->orderBy('id_sales_detail', 'asc')->findAll(),
                "item_count"    => count($this->salesdetailModel->where('no_sales', $i->no_sales)->findAll()),
                "id_sales"      => $i->id_sales,
                "no_sales"      => $i->no_sales,
                "date_sales"    => $i->date_sales,
                "sales"         => $this->salesdetailModel->find($i->no_sales)['pro_price'],
                "statussales"   => $i->status,
                // "model" => $i->pro_model,
                // "skuno" => $i->pro_part_no,
                // "price" => $i->pro_price_seller,
                // "statusproduct" => $i->pro_active,
                // "test" => $test,
                "editable" => $editable,
                "deletable" => $deletable,
                // "image" => isset($this->productsimageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($i->productspro_id)['pro_image_name']) ? $this->productsimageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($i->productspro_id)['pro_image_name'] : 'no_image.png',
            ];
            $data[] = $row;
        }
        // dd($data);

        return $this->response->setJSON([
            'status' => true,
            'response' => 'Success show data',
            // 'results' => $this->productsModel->findAll(),
            // 'results' => $query->getResult(),
            'results' => $data,
        ]);
    }
}
