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
    // protected $db1;
    protected $builder;
    protected $builder1;
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
        // $this->db1      = \Config\Database::connect();
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

        $this->builder = $this->db->table('sales');
        $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
        $this->builder->like('member_id', user()->member_id);
        $data_tab = array(
            'All'           => $this->builder->get()->getNumRows(),
            'Process'       => $this->builder->where('status', 'Process')->get()->getNumRows(),
            'Packaging'     => $this->builder->where('status', 'Packaging')->get()->getNumRows(),
            'Ready'         => $this->builder->where('status', 'Ready')->get()->getNumRows(),
            'Delivery'      => $this->builder->where('status', 'Delivery')->get()->getNumRows(),
            'Received'      => $this->builder->where('status', 'Received')->get()->getNumRows(),
            'Completed'     => $this->builder->where('status', 'Completed')->get()->getNumRows(),
            'Cancel'        => $this->builder->where('status', 'Cancel')->get()->getNumRows(),
            'Return'        => $this->builder->where('status', 'Return')->get()->getNumRows(),
        );

        $datapage = array(
            'titlepage'     => 'Sales',
            'tabshop'       => $this->tabshop,
            'head_page'     => $head_page,
            'js_page'       => $js_page,
            'tabnotif'      => $data_tab,
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

    public function selectedPckg()
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

    public function countSales()
    {
        $date = $this->request->getVar('date');
        $count_data = count($this->salesModel->where('date_sales', $date)->orderBy('id_sales', 'desc')->limit(1)->find());
        $last_no = isset($this->salesModel->where('date_sales', $date)->orderBy('id_sales', 'desc')->limit(1)->find()[0]['id_sales']) ? number_format(substr($this->salesModel->where('date_sales', $date)->orderBy('id_sales', 'desc')->limit(1)->find()[0]['id_sales'], 9, 2)) : 0;
        if ($count_data != null) {
            if ($last_no < 9) {
                $no = 1 + $last_no;
                $set_no = "0" . $no;
            } else {
                $set_no = substr($this->salesModel->where('date_sales', $date)->orderBy('id_sales', 'desc')->limit(1)->find()[0]['id_sales'], 9, 2) + 1;
            }
        } else {
            $set_no = '01';
        }
        // }

        return $this->response->setJSON([
            'status' => 'success',
            'date' => $this->request->getVar('date'),
            'set_no' => $set_no,
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

        $dataSalesDetail = array();
        $priceArray = array();
        for ($a = 0; $a < count($this->request->getVar('proid')); $a++) {
            $dataSalesDetail[] = array(
                'id_sales_detail'       => strtoupper($this->request->getVar('id_sales')) . '/' . $a,
                'no_sales'              => strtoupper($this->request->getVar('no_sales')),
                'date_sales'            => $this->request->getVar('date_sales'),
                'pro_id'                => $this->request->getVar('proid')[$a],
                'pro_img'               => $this->request->getVar('proimg')[$a],
                'pro_price_basic'       => $this->productspriceModel->find($this->request->getVar('proid')[$a])['pro_price_basic'],
                'pro_price'             => $this->request->getVar('price')[$a],
                'pro_qty'               => $this->request->getVar('qty')[$a],
            );

            $priceArray[] = $this->request->getVar('price')[$a] * $this->request->getVar('qty')[$a];
        }

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
            'packaging_charge'      => $this->request->getVar('pckgval'),
            'bill'                  => array_sum($priceArray),
            'payment'               => $this->request->getVar('grtotval'),
            'paymethod'             => $this->request->getVar('paymethod'),
            'status'                => "Process",
        );
        // dd($dataSalesDetail, $dataSales);
        $this->salesModel->insert($dataSales);
        $this->salesdetailModel->insertBatch($dataSalesDetail);
        if ($this->salesModel->db->affectedRows() > 0 && $this->salesdetailModel->db->affectedRows() > 0) {
            $msg = $this->request->getVar('no_sales') . ' Berhasil di Tambahkan';
            session()->setFlashdata('success', $msg);
            return redirect()->to('/sales');
        }
    }

    public function show($tab = null, $find = null)
    {

        $this->builder = $this->db->table('sales');
        if ($tab == "All") {
            // $this->builder->where('status', null);
        } else {
            $this->builder->where('status', $tab);
        }
        $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
        $this->builder->join('list_delivery_services', 'list_delivery_services.id = sales.deliveryservices');
        $this->builder->join('list_pay_methode', 'list_pay_methode.id= sales.paymethod');
        $this->builder->like('member_id', user()->member_id);
        $this->builder->orderBy('date_sales', 'DESC');
        $this->builder->orderBy('id_sales', 'DESC');
        $query = $this->builder->get();

        // if($id != null) {
        //     $this->db->where('id_std_dies', $id);
        // }
        // dd($query->getResult());

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
        // $hasil_rupiah = "Rp " . number_format($angka,2,',','.');

        foreach ($query->getResult() as $i) {
            $dataProductDetail = array();
            $salesArray = array();
            for ($a = 0; $a < count($this->salesdetailModel->where('no_sales', $i->no_sales)->orderBy('id_sales_detail', 'asc')->findAll()); $a++) {
                $pro_id = $this->salesdetailModel->where('no_sales', $i->no_sales)->orderBy('id_sales_detail', 'asc')->findAll()[$a]['pro_id'];
                $dataProductDetail[] = array(
                    'pro_id'        => $pro_id,
                    'pro_name'      => $this->productsModel->find($pro_id)['pro_name'] . '-' . $this->productsModel->find($pro_id)['pro_model'],
                    'pro_sku'       => $this->productsModel->find($pro_id)['pro_part_no'],
                    'pro_img'       => $this->salesdetailModel->where('no_sales', $i->no_sales)->orderBy('id_sales_detail', 'asc')->findAll()[$a]['pro_img'],
                    'pro_price'     => $this->salesdetailModel->where('no_sales', $i->no_sales)->orderBy('id_sales_detail', 'asc')->findAll()[$a]['pro_price'],
                    'pro_qty'       => $this->salesdetailModel->where('no_sales', $i->no_sales)->orderBy('id_sales_detail', 'asc')->findAll()[$a]['pro_qty'],
                );
                $salesArray[] = $this->salesdetailModel->where('no_sales', $i->no_sales)->orderBy('id_sales_detail', 'asc')->findAll()[$a]['pro_price'];
            }
            if ($this->salesModel->find($i->id_sales)['status'] == "Process") {
                $next_status = "Packaging";
            } else if ($this->salesModel->find($i->id_sales)['status'] == "Packaging") {
                $next_status = "Ready";
            } else if ($this->salesModel->find($i->id_sales)['status'] == "Ready") {
                $next_status = "Delivery";
            } else if ($this->salesModel->find($i->id_sales)['status'] == "Delivery") {
                $next_status = "Received";
            } else if ($this->salesModel->find($i->id_sales)['status'] == "Received") {
                $next_status = "Completed";
            } else if ($this->salesModel->find($i->id_sales)['status'] == "Completed") {
                $next_status = null;
            } else if ($this->salesModel->find($i->id_sales)['status'] == "Cancel") {
                $next_status = null;
            } else if ($this->salesModel->find($i->id_sales)['status'] == "Return") {
                $next_status = null;
            }
            $row = [
                "no" => $no++,
                "item_detail"       => $dataProductDetail,
                "item_count"        => count($this->salesdetailModel->where('no_sales', $i->no_sales)->findAll()),
                "id_sales"          => $i->id_sales,
                "id_sales_noslash"  => str_replace('/', '', $i->id_sales),
                "no_sales"          => $i->no_sales,
                "date_sales"        => $i->date_sales,
                "delivery_services" => $i->image_services,
                "no_resi"           => $i->resi,
                "packaging"         => $i->packaging,
                "bill"              => "Rp " . number_format($i->bill, 0, ',', '.'),
                "paymethode"        => $i->paymethod,
                "statussales"       => ucwords($i->status),
                "nextstatus"        => $next_status,
                "editable"          => $editable,
                "deletable"         => $deletable,
            ];
            $data[] = $row;
        }
        // dd($data, $query->getResult());

        return $this->response->setJSON([
            'status' => true,
            'response' => 'Success show data',
            // 'results' => $this->productsModel->findAll(),
            // 'results' => $query->getResult(),
            'results' => $data,
        ]);
    }

    public function nextto()
    {
        $id_sales = $this->request->getVar('id');
        $status_sales = $this->request->getVar('name');
        if ($this->salesModel->find($id_sales) != null) {
            $dataSales = array(
                'status'      => $status_sales,
            );
            $this->salesModel->update(['id_sales' => $id_sales], $dataSales);
            //
            $this->builder = $this->db->table('sales');
            $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
            $this->builder->like('member_id', user()->member_id);
            $data_tab = array(
                'All'           => $this->builder->get()->getNumRows(),
                'Process'       => $this->builder->where('status', 'Process')->get()->getNumRows(),
                'Packaging'     => $this->builder->where('status', 'Packaging')->get()->getNumRows(),
                'Ready'         => $this->builder->where('status', 'Ready')->get()->getNumRows(),
                'Delivery'      => $this->builder->where('status', 'Delivery')->get()->getNumRows(),
                'Received'      => $this->builder->where('status', 'Received')->get()->getNumRows(),
                'Completed'     => $this->builder->where('status', 'Completed')->get()->getNumRows(),
                'Cancel'        => $this->builder->where('status', 'Cancel')->get()->getNumRows(),
                'Return'        => $this->builder->where('status', 'Return')->get()->getNumRows(),
            );
            //
            $status = "success";
        } else {
            $status = "error";
        }

        return $this->response->setJSON([
            'status' => $status,
            'datatab' => $data_tab,
            'id' => $id_sales,
            'name' => $status_sales,
        ]);
    }

    public function detail()
    {
        $id_sales = $this->request->getVar('id');
        $no_sales = $this->salesModel->find($id_sales)['no_sales'];
        $this->builder = $this->db->table('sales');
        $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
        $this->builder->join('list_delivery_services', 'list_delivery_services.id = sales.deliveryservices');
        $this->builder->join('list_pay_methode', 'list_pay_methode.id= sales.paymethod');
        // $this->builder->like('member_id', user()->member_id);
        // $this->builder->orderBy('date_sales', 'DESC');
        // $this->builder->orderBy('id_sales', 'DESC');
        $query = $this->builder->getWhere(['id_sales' => $id_sales]);

        $this->builder1 = $this->db->table('sales_detail');
        $this->builder1->join('products', 'products.pro_id= sales_detail.pro_id');
        $query1 = $this->builder1->getWhere(['no_sales' => $no_sales]);

        // $info_sales = $this->salesModel->find($id_sales);
        $data_sales_detail = $this->salesdetailModel->where('no_sales', $no_sales)->findAll();
        $data_detail = array(
            // 'test'           => $query1->getResult(),                // 'INFO SALES' 
            'ifs'           => $query->getRow(),                // 'INFO SALES' 
            'dsl'           => $query1->getResult(),         // 'DETAIL SALES'
        );

        return $this->response->setJSON([
            'status' => 'success',
            'detail' => $data_detail
        ]);
    }
}
