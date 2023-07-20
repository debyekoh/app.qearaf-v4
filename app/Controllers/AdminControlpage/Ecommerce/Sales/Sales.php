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
use App\Models\ShopModel;
use App\Models\UserProfileModel;

class Sales extends BaseController
{
    protected $db;
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
    protected $shopModel;
    protected $userProfileModel;

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
        $this->shopModel = new ShopModel();
        $this->userProfileModel = new UserProfileModel();
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

        //Query All//
        $this->builder = $this->db->table('sales');
        $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
        if (in_groups('3') == true || in_groups('4') == true) {
            $this->builder->like('member_id', user()->member_id);
        }
        $QueryAll = $this->builder->get();
        // $All = $QueryAll->getNumRows();

        //Query Proces//
        $this->builder = $this->db->table('sales');
        $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
        if (in_groups('3') == true || in_groups('4') == true) {
            $this->builder->like('member_id', user()->member_id);
        }
        $QueryProcess = $this->builder->where('status', 'Process')->get();
        // $Process = $QueryProcess->getNumRows();

        //Query Packaging//
        $this->builder = $this->db->table('sales');
        $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
        if (in_groups('3') == true || in_groups('4') == true) {
            $this->builder->like('member_id', user()->member_id);
        }
        $QueryPackaging = $this->builder->where('status', 'Packaging')->get();
        // $Packaging = $QueryPackaging->getResult();

        //Query Ready//
        $this->builder = $this->db->table('sales');
        $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
        if (in_groups('3') == true || in_groups('4') == true) {
            $this->builder->like('member_id', user()->member_id);
        }
        $QueryReady = $this->builder->where('status', 'Ready')->get();
        // $Ready = $QueryReady->getResult();

        //Query Delivery//
        $this->builder = $this->db->table('sales');
        $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
        if (in_groups('3') == true || in_groups('4') == true) {
            $this->builder->like('member_id', user()->member_id);
        }
        $QueryDelivery = $this->builder->where('status', 'Delivery')->get();
        // $Delivery = $QueryDelivery->getResult();

        //Query Received//
        $this->builder = $this->db->table('sales');
        $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
        if (in_groups('3') == true || in_groups('4') == true) {
            $this->builder->like('member_id', user()->member_id);
        }
        $QueryReceived = $this->builder->where('status', 'Received')->get();
        // $Received = $QueryReceived->getResult();

        //Query Completed//
        $this->builder = $this->db->table('sales');
        $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
        if (in_groups('3') == true || in_groups('4') == true) {
            $this->builder->like('member_id', user()->member_id);
        }
        $QueryCompleted = $this->builder->where('status', 'Completed')->get();
        // $Completed = $QueryCompleted->getResult();

        //Query Cancel//
        $this->builder = $this->db->table('sales');
        $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
        if (in_groups('3') == true || in_groups('4') == true) {
            $this->builder->like('member_id', user()->member_id);
        }
        $QueryCancel = $this->builder->where('status', 'Cancel')->get();
        // $Cancel = $QueryCancel->getResult();

        //Query Return//
        $this->builder = $this->db->table('sales');
        $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
        if (in_groups('3') == true || in_groups('4') == true) {
            $this->builder->like('member_id', user()->member_id);
        }
        $QueryReturn = $this->builder->where('status', 'Return')->get();
        // $Return = $QueryReturn->getResult();


        // $this->builder->like('member_id', user()->member_id);
        // if (in_groups('3') == true || in_groups('4') == true) {
        //     $this->builder->like('member_id', user()->member_id);
        // }
        // $All = $this->builder->get()->getNumRows();
        $data_tab = array(
            'All'           => $QueryAll->getNumRows(),
            'Process'       => $QueryProcess->getNumRows(),
            'Packaging'     => $QueryPackaging->getNumRows(),
            'Ready'         => $QueryReady->getNumRows(),
            'Delivery'      => $QueryDelivery->getNumRows(),
            'Received'      => $QueryReceived->getNumRows(),
            'Completed'     => $QueryCompleted->getNumRows(),
            'Cancel'        => $QueryCancel->getNumRows(),
            'Return'        => $QueryReturn->getNumRows(),
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

    public function checkGroupShop()
    {
        $id_shop = $this->request->getVar('s');
        $member_id_owner = $this->shopModel->where('id_shop', $id_shop)->find()[0]['member_id'];
        $id_owner = $this->userProfileModel->where('member_id', $member_id_owner)->find()[0]['id'];
        $this->builder = $this->db->table('auth_groups_users');
        $this->builder->join('auth_groups', 'auth_groups.id= auth_groups_users.group_id');
        $query = $this->builder->where('user_id', $id_owner)->get();
        return $this->response->setJSON([
            'status' => $query->getRow()->name,
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

        if (in_groups('1') == true || in_groups('2') == true) {
            $datashop = $this->shopModel->findAll();
        } else {
            $datashop = $this->shopModel->asArray()->where('member_id', user()->member_id)->orderBy('marketplace', 'asc')->findAll();
        }
        $datapage = array(
            'titlepage' => 'Add New Sales',
            'tabshop' => $this->tabshop,
            'head_page' => $head_page,
            'js_page' => $js_page,
            'listdeliveryservices' => $this->ListDeliveryServicesModel->findAll(),
            // 'datashop' => $this->shopModel->asArray()->where('member_id', user()->member_id)->orderBy('marketplace', 'asc')->findAll(),
            'datashop' => $datashop,
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
        // $this->builder->join('auth_groups', 'auth_groups.id= auth_groups_users.group_id');
        if (in_groups('3') == true || in_groups('4') == true) {
            $this->builder->like('member_id', user()->member_id);
        }
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
                    'pro_name'      => $this->productsModel->find($pro_id)['pro_name'] . ' ' . $this->productsModel->find($pro_id)['pro_model'],
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

            //shop_group//
            $id_shop = $this->salesModel->find($i->id_sales)['id_shop'];
            $member_id_owner = $this->shopModel->where('id_shop', $id_shop)->find()[0]['member_id'];
            $id_owner = $this->userProfileModel->where('member_id', $member_id_owner)->find()[0]['id'];
            $this->builder = $this->db->table('auth_groups_users');
            $this->builder->join('auth_groups', 'auth_groups.id= auth_groups_users.group_id');
            $query1 = $this->builder->where('user_id', $id_owner)->get();
            $name_shop = $query1->getRow()->name;
            if ($name_shop == "Reseller") {
                $shop_detail = $name_shop . " (" . $i->name_shop . " " . $i->marketplace . ")";
            } else {
                $shop_detail = $i->name_shop . " " . $i->marketplace;
            };

            $row = [
                "no" => $no++,
                "shop_detail"       => $shop_detail,
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
            // $this->builder = $this->db->table('sales');
            // $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
            // $this->builder->like('member_id', user()->member_id);

            //Query All//
            $this->builder = $this->db->table('sales');
            $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
            if (in_groups('3') == true || in_groups('4') == true) {
                $this->builder->like('member_id', user()->member_id);
            }
            $QueryAll = $this->builder->get();
            // $All = $QueryAll->getNumRows();

            //Query Proces//
            $this->builder = $this->db->table('sales');
            $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
            if (in_groups('3') == true || in_groups('4') == true) {
                $this->builder->like('member_id', user()->member_id);
            }
            $QueryProcess = $this->builder->where('status', 'Process')->get();
            // $Process = $QueryProcess->getNumRows();

            //Query Packaging//
            $this->builder = $this->db->table('sales');
            $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
            if (in_groups('3') == true || in_groups('4') == true) {
                $this->builder->like('member_id', user()->member_id);
            }
            $QueryPackaging = $this->builder->where('status', 'Packaging')->get();
            // $Packaging = $QueryPackaging->getResult();

            //Query Ready//
            $this->builder = $this->db->table('sales');
            $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
            if (in_groups('3') == true || in_groups('4') == true) {
                $this->builder->like('member_id', user()->member_id);
            }
            $QueryReady = $this->builder->where('status', 'Ready')->get();
            // $Ready = $QueryReady->getResult();

            //Query Delivery//
            $this->builder = $this->db->table('sales');
            $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
            if (in_groups('3') == true || in_groups('4') == true) {
                $this->builder->like('member_id', user()->member_id);
            }
            $QueryDelivery = $this->builder->where('status', 'Delivery')->get();
            // $Delivery = $QueryDelivery->getResult();

            //Query Received//
            $this->builder = $this->db->table('sales');
            $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
            if (in_groups('3') == true || in_groups('4') == true) {
                $this->builder->like('member_id', user()->member_id);
            }
            $QueryReceived = $this->builder->where('status', 'Received')->get();
            // $Received = $QueryReceived->getResult();

            //Query Completed//
            $this->builder = $this->db->table('sales');
            $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
            if (in_groups('3') == true || in_groups('4') == true) {
                $this->builder->like('member_id', user()->member_id);
            }
            $QueryCompleted = $this->builder->where('status', 'Completed')->get();
            // $Completed = $QueryCompleted->getResult();

            //Query Cancel//
            $this->builder = $this->db->table('sales');
            $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
            if (in_groups('3') == true || in_groups('4') == true) {
                $this->builder->like('member_id', user()->member_id);
            }
            $QueryCancel = $this->builder->where('status', 'Cancel')->get();
            // $Cancel = $QueryCancel->getResult();

            //Query Return//
            $this->builder = $this->db->table('sales');
            $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
            if (in_groups('3') == true || in_groups('4') == true) {
                $this->builder->like('member_id', user()->member_id);
            }
            $QueryReturn = $this->builder->where('status', 'Return')->get();
            // $Return = $QueryReturn->getResult();


            $data_tab = array(
                'All'           => $QueryAll->getNumRows(),
                'Process'       => $QueryProcess->getNumRows(),
                'Packaging'     => $QueryPackaging->getNumRows(),
                'Ready'         => $QueryReady->getNumRows(),
                'Delivery'      => $QueryDelivery->getNumRows(),
                'Received'      => $QueryReceived->getNumRows(),
                'Completed'     => $QueryCompleted->getNumRows(),
                'Cancel'        => $QueryCancel->getNumRows(),
                'Return'        => $QueryReturn->getNumRows(),
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

    public function edit($idsales)
    {
        $id_sales = substr($idsales, 0, 6) . "/" . substr($idsales, 6, 1) . "/" . substr($idsales, 7, 2) . "/" . substr($idsales, 9);
        if ($this->salesModel->find($id_sales) == null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
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

            $itemsales = $this->salesdetailModel->where('no_sales', $this->salesModel->find($id_sales)['no_sales'])->orderBy('id_sales_detail', 'asc')->findAll();
            $dataSalesDetail = array();
            // $priceArray = array();
            for ($a = 0; $a < count($itemsales); $a++) {
                $proid = $itemsales[$a]['pro_id'];
                $dataSalesDetail[] = array(
                    'id_sales_detail'       => $itemsales[$a]['id_sales_detail'],
                    'pro_id'                => $proid,
                    'pro_part_no'           => $this->productsModel->find($proid)['pro_part_no'],
                    'pro_img'               => $this->productsimageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($proid) !== null ? $this->productsimageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($proid)['pro_image_name'] : 'no_image.png',
                    'pro_name'              => $this->productsModel->find($proid)['pro_name'] . ' ' . $this->productsModel->find($proid)['pro_model'],
                    'pro_price'             => $itemsales[$a]['pro_price'],
                    'pro_qty'               => $itemsales[$a]['pro_qty'],
                    // 'no_sales'              => strtoupper($this->request->getVar('no_sales')),
                    // 'date_sales'            => $this->request->getVar('date_sales'),
                    // 'pro_price_basic'       => $this->productspriceModel->find($this->request->getVar('proid')[$a])['pro_price_basic'],
                );

                // $priceArray[] = $this->request->getVar('price')[$a] * $this->request->getVar('qty')[$a];
            }
            $this->builder = $this->db->table('sales');
            $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
            $this->builder->join('list_delivery_services', 'list_delivery_services.id = sales.deliveryservices');
            $this->builder->join('list_pay_methode', 'list_pay_methode.id= sales.paymethod');
            $this->builder->join('list_packaging', 'list_packaging.id_packaging= sales.packaging');
            $query = $this->builder->getWhere(['id_sales' => $id_sales]);

            //shop_group//
            $id_shop = $this->salesModel->find($id_sales)['id_shop'];
            $member_id_owner = $this->shopModel->where('id_shop', $id_shop)->find()[0]['member_id'];
            $id_owner = $this->userProfileModel->where('member_id', $member_id_owner)->find()[0]['id'];
            $this->builder = $this->db->table('auth_groups_users');
            $this->builder->join('auth_groups', 'auth_groups.id= auth_groups_users.group_id');
            $query1 = $this->builder->where('user_id', $id_owner)->get();
            $name_shop = $query1->getRow()->name;
            if ($name_shop == "Reseller") {
                $reseller_status = "true";
            } else {
                $reseller_status = "false";
            };
            $dataSales = array(
                'id_sales'              => $id_sales,
                'no_sales'              => $this->salesModel->find($id_sales)['no_sales'],
                'date_sales'            => $this->salesModel->find($id_sales)['date_sales'],
                'id_shop'               => $this->salesModel->find($id_sales)['id_shop'],
                'id_deliveryservices'   => $query->getRow()->deliveryservices,
                'name_deliveryservices' => $query->getRow()->name_delivery_services,
                'name_shop'             => $this->shopModel->find($this->salesModel->find($id_sales)['id_shop'])['name_shop'],
                'marketplace'           => $this->shopModel->find($this->salesModel->find($id_sales)['id_shop'])['marketplace'],
                'reseller_status'       => $reseller_status,
                'resi'                  => $this->salesModel->find($id_sales)['resi'],
                'note'                  => $this->salesModel->find($id_sales)['note'],
                'packaging'             => $this->salesModel->find($id_sales)['packaging'],
                'name_packaging'        => $query->getRow()->name_packaging,
                'packaging_charge'      => $this->salesModel->find($id_sales)['packaging_charge'],
                'bill'                  => $this->salesModel->find($id_sales)['bill'],
                'payment'               => $this->salesModel->find($id_sales)['payment'],
                'paymethod'             => $this->salesModel->find($id_sales)['paymethod'],
                'itemsales'             => $this->salesdetailModel->where('no_sales', $this->salesModel->find($id_sales)['no_sales'])->orderBy('id_sales_detail', 'asc')->findAll(),
                'dataSalesDetail'       => $dataSalesDetail,
                // 'status'                => "Process",
            );

            if (in_groups('1') == true || in_groups('2') == true) {
                $datashop = $this->shopModel->findAll();
            } else {
                $datashop = $this->shopModel->asArray()->where('member_id', user()->member_id)->orderBy('marketplace', 'asc')->findAll();
            }
            $datapage = array(
                'titlepage' => 'Edit Sales',
                'tabshop' => $this->tabshop,
                'head_page' => $head_page,
                'js_page' => $js_page,
                'dataSales' => $dataSales,
                'listdeliveryservices' => $this->ListDeliveryServicesModel->findAll(),
                'datashop' => $datashop,
                // 'datashop' => $this->shopModel->asArray()->where('member_id', user()->member_id)->orderBy('marketplace', 'asc')->findAll(),
            );
            return view('pages_admin/adm_sales_edit_sales', $datapage);
        }
    }

    public function update($idsales)
    {
        // dd($this->request->getVar());
        // for ($a = 0; $a < count($this->salesdetailModel->where('no_sales', $this->request->getVar('no_sales'))->findAll()); $a++) {
        //     $dataLastSalesDetail[] = $this->salesdetailModel->where('no_sales', $this->request->getVar('no_sales'))->find()[$a];
        // }

        // $dataLastSalesDetail = $this->salesdetailModel->where('no_sales', $this->request->getVar('no_sales')))->findAll();
        $NoSalestoDelete = $this->request->getVar('no_sales');

        $dataNewSalesDetail = array();
        $priceArray = array();
        for ($b = 0; $b < count($this->request->getVar('proid')); $b++) {
            $dataNewSalesDetail[] = array(
                'id_sales_detail'       => strtoupper($this->request->getVar('idsales')) . '/' . $b,
                'no_sales'              => strtoupper($this->request->getVar('no_sales')),
                'date_sales'            => $this->request->getVar('date_sales'),
                'pro_id'                => $this->request->getVar('proid')[$b],
                'pro_img'               => $this->request->getVar('proimg')[$b],
                'pro_price_basic'       => $this->productspriceModel->find($this->request->getVar('proid')[$b])['pro_price_basic'],
                'pro_price'             => $this->request->getVar('price')[$b],
                'pro_qty'               => $this->request->getVar('qty')[$b],
            );
            $priceArray[] = $this->request->getVar('price')[$b] * $this->request->getVar('qty')[$b];
        }

        $dataSales = array(
            'id_sales'              => strtoupper($this->request->getVar('idsales')),
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
            // 'status'                => "Process",
        );
        // dd($dataNewSalesDetail, $dataSales);

        $this->salesdetailModel->delete($NoSalestoDelete);
        $this->salesdetailModel->insertBatch($dataNewSalesDetail);
        $this->salesModel->update(['id_sales' => $this->request->getVar('idsales')], $dataSales);


        if ($this->db->affectedRows() > 0) {
            $msg = 'No Sales ' . $this->request->getVar('no_sales') . ' Berhasil di Perbarui';
            session()->setFlashdata('success', $msg);
            return redirect()->to('/sales');
        }
        // $this->db->transStart();
        // $this->db->query('AN SQL QUERY...');
        // $this->db->query('ANOTHER QUERY...');
        // $this->db->transComplete();

        // if ($this->db->transStatus() === false) {
        //     // generate an error... or use the log_message() function to log your error
        // }
    }
}
