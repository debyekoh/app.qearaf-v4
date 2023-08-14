<?php

namespace App\Controllers\AdminControlpage\Ecommerce\Sales;

use App\Controllers\BaseController;
use App\Models\ProductsModel;
use App\Models\ProductsStockModel;
use App\Models\ProductsStockLogModel;
use App\Models\ProductsPriceModel;
use App\Models\ProductsShowModel;
use App\Models\ProductsGroupModel;
use App\Models\ProductsCategoryModel;
use App\Models\ProductsImageModel;
use App\Models\SalesModel;
use App\Models\SalesDetailModel;
use App\Models\ShopModel;
use App\Models\UserProfileModel;
use App\Models\ListNotificationModel;

class Sales extends BaseController
{
    protected $db;
    protected $builder;
    protected $builder1;
    protected $productsModel;
    protected $productsstockModel;
    protected $productsstockLogModel;
    protected $productspriceModel;
    protected $productsshowModel;
    protected $productsgroupModel;
    protected $productscategoryModel;
    protected $productsimageModel;
    protected $salesModel;
    protected $salesdetailModel;
    protected $shopModel;
    protected $userProfileModel;
    protected $listNotificationModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->productsModel = new ProductsModel();
        $this->productsstockModel = new ProductsStockModel();
        $this->productsstockLogModel = new ProductsStockLogModel();
        $this->productspriceModel = new ProductsPriceModel();
        $this->productsshowModel = new ProductsShowModel();
        $this->productsgroupModel = new ProductsGroupModel();
        $this->productscategoryModel = new ProductsCategoryModel();
        $this->productsimageModel = new ProductsImageModel();
        $this->salesModel = new SalesModel();
        $this->salesdetailModel = new SalesDetailModel();
        $this->shopModel = new ShopModel();
        $this->userProfileModel = new UserProfileModel();
        $this->listNotificationModel = new ListNotificationModel();
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
            <script src="assets/libs/imask/imask.min.js"></script>
            
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
        $this->builder->select('products.pro_id as productspro_id, pro_part_no, pro_name, pro_model,pro_price_reseler, pro_price_seller, pro_show, pro_active, pro_current_stock');
        $this->builder->join('products_price', 'products_price.pro_id = products.pro_id');
        $this->builder->join('products_stock', 'products_stock.pro_id = products.pro_id');
        $this->builder->notLike('pro_group', 'Consumable');
        $query = $this->builder->get();

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
            'results' => $data,
        ]);
    }

    public function selectedP()
    {
        $skuno = $this->request->getVar('sku');
        $status_shop = $this->request->getVar('sshop');
        $pro_id = $this->productsModel->where('pro_part_no', $skuno)->find()[0]['pro_id'];
        if ($status_shop == "Reseller") {
            $pricegroup = $this->productspriceModel->find($pro_id)['pro_price_reseler'];
        }
        if ($status_shop == "NotReseller") {
            $pricegroup = $this->productspriceModel->find($pro_id)['pro_price_seller'];
        }
        $dataselect = array(
            'proid' => $this->productsModel->where('pro_part_no', $skuno)->find()[0]['pro_id'],
            'image' => isset($this->productsimageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($pro_id)['pro_image_name']) ? $this->productsimageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($pro_id)['pro_image_name'] : 'no_image.png',
            'name' => $this->productsModel->find($pro_id)['pro_name'] . ' ' . $this->productsModel->find($pro_id)['pro_model'],
            'price' => $pricegroup,
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
        $datastockUpdate = array();
        $productsStockLog = array();
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

            $currentstock = $this->productsstockModel->find($this->request->getVar('proid')[$a])['pro_current_stock'];
            $trans_stock = $this->request->getVar('qty')[$a];
            $new_stock = $currentstock - $this->request->getVar('qty')[$a];

            $datastockUpdate[] = array(
                'pro_id'                => $this->request->getVar('proid')[$a],
                'pro_current_stock'     => $currentstock - $this->request->getVar('qty')[$a],
            );

            $productsStockLog[] = array(
                'products_stock_log_proid'  => $this->request->getVar('proid')[$a],
                'log_key'                   => date("ymd") . "/SALES/" . sprintf("%04d", count($this->productsstockLogModel->like('log_key', date("ymd") . "/SALES/")->findAll()) + 1 + $a),
                'log_code'                  => "SALES",
                'log_description'           => "SALES " . strtoupper($this->request->getVar('id_sales')),
                'link'                      => "detail/view/" . substr(strtoupper($this->request->getVar('id_sales')), 0, 6) .  substr(strtoupper($this->request->getVar('id_sales')), 7, 1) .  substr(strtoupper($this->request->getVar('id_sales')), 9, 2) .  substr(strtoupper($this->request->getVar('id_sales')), 12),
                'last_value'                => $currentstock,
                'trans_value'               => $trans_stock,
                'new_value'                 => $new_stock,
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

        /// Parameter Notification

        $id_shop = $this->request->getVar('shop');
        $member_id_ownershop = $this->shopModel->where('id_shop', $id_shop)->find()[0]['member_id'];
        $shopname = $this->shopModel->where('id_shop', $id_shop)->find()[0]['name_shop'] . " " . $this->shopModel->where('id_shop', $id_shop)->find()[0]['marketplace'];
        $names = ['SuAdmin', 'Admin'];
        $this->builder = $this->db->table('auth_groups_users');
        $this->builder->select('member_id, fullname');
        $this->builder->join('auth_groups', 'auth_groups.id= auth_groups_users.group_id');
        $this->builder->join('users', 'users.id= auth_groups_users.user_id');
        $this->builder->Where('member_id', $member_id_ownershop);
        $this->builder->orWhereIn('name', $names);
        $targetgroup = $this->builder->get();
        $title_notif = strtoupper($this->request->getVar('no_sales'));
        $notification = "from " . $shopname . " Confirmed";
        $id_sales = strtoupper($this->request->getVar('id_sales'));
        $key_sales = substr($id_sales, 0, 6) .  substr($id_sales, 7, 1) .  substr($id_sales, 9, 2) .  substr($id_sales, 12);
        $dataNotification = array();
        for ($a = 0; $a < $targetgroup->getNumRows(); $a++) {
            $dataNotification[] = array(
                'path_notif'            => "detail/view/" . $key_sales,
                'type_notif'            => "New Sales",
                'title_notif'           => $title_notif,
                'to_member_id'          => $targetgroup->getResult()[$a]->member_id,
                'to_fullname'           => $targetgroup->getResult()[$a]->fullname,
                'to_user_image'         => null,
                'from_member_id'        => user()->member_id,
                'from_fullname'         => user()->fullname,
                'from_user_image'       => user()->user_image,
                'notification'          => $notification,
                'notification_image'    => '',
                'read_status'           => 1,
            );
        }

        // dd($productsStockLog, $datastockUpdate, $dataSalesDetail, $dataSales, $member_id_ownershop, $dataNotification, $targetgroup->getResult());


        $this->db->transBegin();
        $this->salesModel->insert($dataSales);
        $this->salesdetailModel->insertBatch($dataSalesDetail);
        $this->productsstockLogModel->insertBatch($productsStockLog);
        $this->productsstockModel->updateBatch($datastockUpdate, 'pro_id');
        $this->listNotificationModel->insertBatch($dataNotification);

        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
            $msg = strtoupper($this->request->getVar('no_sales')) . ' Gagal di Tambahkan';
            session()->setFlashdata('error', $msg);
            return redirect()->to('/sales');
        } else {
            $this->db->transCommit();
            $msg = strtoupper($this->request->getVar('no_sales')) . ' Berhasil di Tambahkan';
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
                "payment"           => "Rp " . number_format($i->payment, 0, ',', '.'),
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
        $payment_value = $this->request->getVar('paymval');
        // dd($id_sales, $status_sales, $payment_value);
        if ($this->salesModel->find($id_sales) != null) {
            $dataSales = array(
                'status'      => $status_sales,
            );

            // dd($id_sales);

            $this->db->transBegin();

            $this->salesModel->update(['id_sales' => $id_sales], $dataSales);


            if ($payment_value > 0 && $status_sales == "Received") {
                $this->salesModel->update(['id_sales' => $id_sales], ['payment' => $payment_value]);
            }

            if ($status_sales == "Completed") {
                $key_sales = substr($id_sales, 0, 6) .  substr($id_sales, 7, 1) .  substr($id_sales, 9, 2) .  substr($id_sales, 12);
                $id_shop = $this->salesModel->find($id_sales)['id_shop'];
                $cur_ewallet = intval($this->ballanceEWallet->find($id_shop)['value_ewallet']);
                $payment = intval($this->salesModel->find($id_sales)['payment']);
                $new_ewallet = $cur_ewallet + $payment;
                $dataewalletlog = array(
                    'balance_userid_log'        => user_id(),   // for "balance_account_log"
                    'ewallet_shopid_log'        => $id_shop,    // for "balance_ewallet_log"
                    'debt_userid_log'           => null,        // for "debt_account_log"
                    'log_key'                   => date("ymd") . "/IN/" . sprintf("%04d", count($this->ballanceEWalletLog->like('log_key', date("ymd") . "/IN/")->findAll()) + 1),
                    'log_code'                  => "IN-SALES",
                    'log_description'           => "Payment Sales " . $id_sales,
                    'link'                      => "detail/view/" . $key_sales,
                    'last_value'                => $cur_ewallet,
                    'trans_value'               => $payment,
                    'new_value'                 => $new_ewallet,
                );


                // $this->db->transBegin();
                $this->ballanceEWallet->update(['ewallet_shopid' => $id_shop], ['value_ewallet' => $new_ewallet]);
                $this->ballanceEWalletLog->insert($dataewalletlog);
                // if ($this->db->transStatus() === false) {
                //     $this->db->transRollback();
                // } else {
                //     $this->db->transCommit();
                // }
            }

            if ($status_sales == "Cancel" || $status_sales == "Return") {

                $no_sales = $this->salesModel->find($id_sales)['no_sales'];

                $datastockUpdate = array();
                $productsStockLog = array();
                for ($a = 0; $a < count($this->salesdetailModel->where('no_sales', $no_sales)->orderBy('id_sales_detail', 'asc')->findAll()); $a++) {
                    $pro_id = $this->salesdetailModel->where('no_sales', $no_sales)->orderBy('id_sales_detail', 'asc')->findAll()[$a]['pro_id'];
                    $currentstock = $this->productsstockModel->find($pro_id)['pro_current_stock'];
                    $trans_stock = $this->salesdetailModel->where('no_sales', $no_sales)->orderBy('id_sales_detail', 'asc')->findAll()[$a]['pro_qty'];
                    $new_stock = $currentstock + $trans_stock;

                    $datastockUpdate[] = array(
                        'pro_id'                => $pro_id,
                        'pro_current_stock'     => $new_stock,
                    );

                    $productsStockLog[] = array(
                        'products_stock_log_proid'  => $pro_id,
                        'log_key'                   => date("ymd") . "/" . strtoupper($status_sales) . "-SALES/" . sprintf("%04d", count($this->productsstockLogModel->like('log_key', date("ymd") . "/" . strtoupper($status_sales) . "-SALES/")->findAll()) + 1 + $a),
                        'log_code'                  => strtoupper($status_sales) . "-SALES",
                        'log_description'           => strtoupper($status_sales) . " " . $id_sales,
                        'link'                      => "detail/view/" . substr($id_sales, 0, 6) .  substr($id_sales, 7, 1) .  substr($id_sales, 9, 2) .  substr($id_sales, 12),
                        'last_value'                => $currentstock,
                        'trans_value'               => $trans_stock,
                        'new_value'                 => $new_stock,
                    );

                    // $dataProductDetail[] = array(
                    //     'pro_id'        => $pro_id,
                    //     'pro_name'      => $this->productsModel->find($pro_id)['pro_name'] . ' ' . $this->productsModel->find($pro_id)['pro_model'],
                    //     'pro_sku'       => $this->productsModel->find($pro_id)['pro_part_no'],
                    //     'pro_img'       => $this->salesdetailModel->where('no_sales', $i->no_sales)->orderBy('id_sales_detail', 'asc')->findAll()[$a]['pro_img'],
                    //     'pro_price'     => $this->salesdetailModel->where('no_sales', $i->no_sales)->orderBy('id_sales_detail', 'asc')->findAll()[$a]['pro_price'],
                    //     'pro_qty'       => $this->salesdetailModel->where('no_sales', $i->no_sales)->orderBy('id_sales_detail', 'asc')->findAll()[$a]['pro_qty'],
                    // );
                    // $salesArray[] = $this->salesdetailModel->where('no_sales', $i->no_sales)->orderBy('id_sales_detail', 'asc')->findAll()[$a]['pro_price'];
                }

                $this->salesModel->update(['id_sales' => $id_sales], ['payment' => 0]);
                $this->productsstockLogModel->insertBatch($productsStockLog);
                $this->productsstockModel->updateBatch($datastockUpdate, 'pro_id');
            }




            /// Parameter Notification
            $dataNotification = array();
            if ($status_sales == "Cancel" || $status_sales == "Return" || $status_sales == "Received" || $status_sales == "Completed") {

                $id_shop = $this->salesModel->find($id_sales)['id_shop'];
                $member_id_ownershop = $this->shopModel->where('id_shop', $id_shop)->find()[0]['member_id'];
                $shopname = $this->shopModel->where('id_shop', $id_shop)->find()[0]['name_shop'] . " " . $this->shopModel->where('id_shop', $id_shop)->find()[0]['marketplace'];
                $names = ['SuAdmin', 'Admin'];
                $this->builder = $this->db->table('auth_groups_users');
                $this->builder->select('member_id, fullname');
                $this->builder->join('auth_groups', 'auth_groups.id= auth_groups_users.group_id');
                $this->builder->join('users', 'users.id= auth_groups_users.user_id');
                $this->builder->Where('member_id', $member_id_ownershop);
                $this->builder->orWhereIn('name', $names);
                $targetgroup = $this->builder->get();
                $title_notif = strtoupper($this->salesModel->find($id_sales)['no_sales']);
                $notification = "from " . $shopname . " " . $status_sales;
                // $id_sales = strtoupper($this->request->getVar('id_sales'));
                $key_sales = substr($id_sales, 0, 6) .  substr($id_sales, 7, 1) .  substr($id_sales, 9, 2) .  substr($id_sales, 12);
                // $dataNotification = array();
                for ($a = 0; $a < $targetgroup->getNumRows(); $a++) {
                    $dataNotification[] = array(
                        'path_notif'            => "detail/view/" . $key_sales,
                        'type_notif'            => "Sales " . $status_sales,
                        'title_notif'           => $title_notif,
                        'to_member_id'          => $targetgroup->getResult()[$a]->member_id,
                        'to_fullname'           => $targetgroup->getResult()[$a]->fullname,
                        'to_user_image'         => null,
                        'from_member_id'        => user()->member_id,
                        'from_fullname'         => user()->fullname,
                        'from_user_image'       => user()->user_image,
                        'notification'          => $notification,
                        'notification_image'    => '',
                        'read_status'           => 1,
                    );
                }
                $this->listNotificationModel->insertBatch($dataNotification);
            }











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

            if ($this->db->transStatus() === false) {
                $this->db->transRollback();
            } else {
                $this->db->transCommit();
            }
        } else {
            $status = "error";
        }


        $dataNotif = array(
            'status'      => $status_sales,
        );



        return $this->response->setJSON([
            'status' => $status,
            'datatab' => $data_tab,
            'id' => $id_sales,
            'name' => $status_sales,
            'test' => $dataNotification,
        ]);
    }

    public function detailview($idsales)
    {
        $id_sales = substr($idsales, 0, 6) . "/" . substr($idsales, 6, 1) . "/" . substr($idsales, 7, 2) . "/" . substr($idsales, 9);
        if ($this->salesModel->find($id_sales) == null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            $no_sales = $this->salesModel->find($id_sales)['no_sales'];
            $this->builder = $this->db->table('sales');
            $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
            $this->builder->join('list_delivery_services', 'list_delivery_services.id = sales.deliveryservices');
            $this->builder->join('list_pay_methode', 'list_pay_methode.id= sales.paymethod');
            $this->builder->join('list_packaging', 'list_packaging.id_packaging= sales.packaging');
            // $this->builder->like('member_id', user()->member_id);
            // $this->builder->orderBy('date_sales', 'DESC');
            // $this->builder->orderBy('id_sales', 'DESC');
            $query = $this->builder->getWhere(['id_sales' => $id_sales]);

            $this->builder1 = $this->db->table('sales_detail');
            $this->builder1->join('products', 'products.pro_id= sales_detail.pro_id');
            $query1 = $this->builder1->getWhere(['no_sales' => $no_sales]);

            // $info_sales = $this->salesModel->find($id_sales);
            // $data_sales_detail = $this->salesdetailModel->where('no_sales', $no_sales)->findAll();
            $data_detail = array(
                // 'test'           => $query1->getResult(),                // 'INFO SALES' 
                'ifs'           => $query->getRow(),                // 'INFO SALES' 
                'dsl'           => $query1->getResult(),         // 'DETAIL SALES'
            );

            $datapage = array(
                'titlepage' => 'Detail Sales #' . $id_sales,
                'tabshop' => $this->tabshop,
                'datadetail' => $data_detail,
            );
            return view('pages_admin/adm_sales_detailview', $datapage);
        }
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
                $statusshop = "Reseller";
            } else {
                $reseller_status = "false";
                $statusshop = "NotReseller";
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
                'statusshop'            => $statusshop,
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
        $IDSalestoDelete = $this->salesModel->where('no_sales', $this->request->getVar('no_sales'))->find()[0]['id_sales'];
        $NoSalestoDelete = $this->request->getVar('no_sales');
        $dataLaststockUpdate = array();
        $productsLastStockLog = array();

        $this->db->transBegin();

        // dd(count($this->salesdetailModel->where('no_sales', $NoSalestoDelete)->findAll()));
        for ($a = 0; $a < count($this->salesdetailModel->where('no_sales', $NoSalestoDelete)->findAll()); $a++) {
            $pro_idLast = $this->salesdetailModel->where('no_sales', $NoSalestoDelete)->findAll()[$a]['pro_id'];
            $currentstockLast = $this->productsstockModel->find($pro_idLast)['pro_current_stock'];
            $trans_stockLast = $this->salesdetailModel->where('no_sales', $NoSalestoDelete)->findAll()[$a]['pro_qty'];
            $new_stockLast = $currentstockLast + $trans_stockLast;

            $dataLaststockUpdate[] = array(
                'pro_id'                => $pro_idLast,
                'pro_current_stock'     => $currentstockLast + $this->salesdetailModel->where('no_sales', $NoSalestoDelete)->findAll()[$a]['pro_qty'],
            );

            $productsLastStockLog[] = array(
                'products_stock_log_proid'  => $pro_idLast,
                'log_key'                   => date("ymd") . "/EDIT-SALES-LAST/" . sprintf("%04d", count($this->productsstockLogModel->like('log_key', date("ymd") . "/EDIT-SALES-LAST/")->findAll()) + 1 + $a),
                'log_code'                  => "EDIT-SALES-LAST",
                'log_description'           => "EDIT-SALES-LAST " . $IDSalestoDelete,
                'link'                      => "detail/view/" . substr($IDSalestoDelete, 0, 6) .  substr($IDSalestoDelete, 7, 1) .  substr($IDSalestoDelete, 9, 2) .  substr($IDSalestoDelete, 12),
                'last_value'                => $currentstockLast,
                'trans_value'               => $trans_stockLast,
                'new_value'                 => $new_stockLast,
            );
        }

        // dd($dataLaststockUpdate, $productsLastStockLog);

        $this->productsstockLogModel->insertBatch($productsLastStockLog);
        $this->productsstockModel->updateBatch($dataLaststockUpdate, 'pro_id');
        $this->salesdetailModel->delete($NoSalestoDelete);

        $dataNewSalesDetail = array();
        $datastockUpdateNew = array();
        $productsStockLogNew = array();
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

            $currentstockNew = $this->productsstockModel->find($this->request->getVar('proid')[$b])['pro_current_stock'];
            $trans_stockNew = $this->request->getVar('qty')[$b];
            $new_stockNew = $currentstockNew - $this->request->getVar('qty')[$b];
            $datastockUpdateNew[] = array(
                'pro_id'                => $this->request->getVar('proid')[$b],
                'pro_current_stock'     => $currentstockNew - $this->request->getVar('qty')[$b],
            );

            $productsStockLogNew[] = array(
                'products_stock_log_proid'  => $this->request->getVar('proid')[$b],
                'log_key'                   => date("ymd") . "/EDIT-SALES-NEW/" . sprintf("%04d", count($this->productsstockLogModel->like('log_key', date("ymd") . "/EDIT-SALES-NEW/")->findAll()) + 1 + $b),
                'log_code'                  => "EDIT-SALES-NEW",
                'log_description'           => "EDIT-SALES-NEW " . strtoupper($this->request->getVar('idsales')),
                'link'                      => "detail/view/" . substr(strtoupper($this->request->getVar('idsales')), 0, 6) .  substr(strtoupper($this->request->getVar('idsales')), 7, 1) .  substr(strtoupper($this->request->getVar('idsales')), 9, 2) .  substr(strtoupper($this->request->getVar('idsales')), 12),
                'last_value'                => $currentstockNew,
                'trans_value'               => $trans_stockNew,
                'new_value'                 => $new_stockNew,
            );

            $priceArray[] = $this->request->getVar('price')[$b] * $this->request->getVar('qty')[$b];
        }

        $this->productsstockLogModel->insertBatch($productsStockLogNew);
        $this->productsstockModel->updateBatch($datastockUpdateNew, 'pro_id');

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


        $this->salesdetailModel->insertBatch($dataNewSalesDetail);
        $this->salesModel->update(['id_sales' => $this->request->getVar('idsales')], $dataSales);

        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
            $msg = strtoupper($this->request->getVar('no_sales')) . ' Gagal di Tambahkan';
            session()->setFlashdata('error', $msg);
            return redirect()->to('/sales');
        } else {
            $this->db->transCommit();
            $msg = strtoupper($this->request->getVar('no_sales')) . ' Berhasil di Tambahkan';
            session()->setFlashdata('success', $msg);
            return redirect()->to('/sales');
        }

        /* if ($this->db->affectedRows() > 0) {
            $msg = 'No Sales ' . $this->request->getVar('no_sales') . ' Berhasil di Perbarui';
            session()->setFlashdata('success', $msg);
            return redirect()->to('/sales');
        } */
    }


    //Notiffunction
    public function setNotif()
    {
        $id_shop = $this->request->getVar('shop');
        $member_id_ownershop = $this->shopModel->where('id_shop', $id_shop)->find()[0]['member_id'];
        $shopname = $this->shopModel->where('id_shop', $id_shop)->find()[0]['name_shop'] . " " . $this->shopModel->where('id_shop', $id_shop)->find()[0]['marketplace'];
        $names = ['SuAdmin', 'Admin'];
        $this->builder = $this->db->table('auth_groups_users');
        $this->builder->select('member_id, fullname');
        $this->builder->join('auth_groups', 'auth_groups.id= auth_groups_users.group_id');
        $this->builder->join('users', 'users.id= auth_groups_users.user_id');
        $this->builder->Where('member_id', $member_id_ownershop);
        $this->builder->orWhereIn('name', $names);
        $targetgroup = $this->builder->get();
        $title_notif = strtoupper($this->request->getVar('no_sales'));
        $notification = "from " . $shopname . " Confirmed";
        $id_sales = strtoupper($this->request->getVar('id_sales'));
        $key_sales = substr($id_sales, 0, 6) .  substr($id_sales, 7, 1) .  substr($id_sales, 9, 2) .  substr($id_sales, 12);
        $dataNotification = array();
        for ($a = 0; $a < $targetgroup->getNumRows(); $a++) {
            $dataNotification[] = array(
                'path_notif'            => "detail/view/" . $key_sales,
                'type_notif'            => "New Sales",
                'title_notif'           => $title_notif,
                'to_member_id'          => $targetgroup->getResult()[$a]->member_id,
                'to_fullname'           => $targetgroup->getResult()[$a]->fullname,
                'to_user_image'         => null,
                'from_member_id'        => user()->member_id,
                'from_fullname'         => user()->fullname,
                'from_user_image'       => user()->user_image,
                'notification'          => $notification,
                'notification_image'    => '',
                'read_status'           => 1,
            );
        }

        // dd($dataNotification);
        $this->listNotificationModel->insertBatch($dataNotification);
    }
}
