<?php

namespace App\Controllers\AdminControlpage\Ecommerce\Sales;

use App\Controllers\BaseController;
use App\Models\ProductsModel;
use App\Models\ProductsBundlingModel;
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
use App\Models\ListPackagingModel;
use App\Models\PurchaseModel;
use App\Models\PurchaseDetailModel;
use App\Models\ConsumableLogModel;
use App\Models\ListNotificationModel;

class Sales extends BaseController
{
    protected $db;
    protected $builder;
    protected $builder1;
    protected $productsModel;
    protected $productsBundlingModel;
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
    protected $listPackagingModel;
    protected $purchaseModel;
    protected $purchaseDetailModel;
    protected $consumableLogModel;
    protected $listNotificationModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->productsModel = new ProductsModel();
        $this->productsstockModel = new ProductsStockModel();
        $this->productsBundlingModel = new ProductsBundlingModel();
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
        $this->listPackagingModel = new ListPackagingModel();
        $this->purchaseModel = new PurchaseModel();
        $this->purchaseDetailModel = new PurchaseDetailModel();
        $this->listNotificationModel = new ListNotificationModel();
        $this->consumableLogModel = new ConsumableLogModel();
        $this->db      = \Config\Database::connect();
    }

    public function index()
    {

        $head_page =
            '
            <link href="' . base_url() . 'assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css">
            <link href="' . base_url() . 'assets/libs/gridjs/theme/mermaid.min.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="' . base_url() . 'assets/libs/sweetalert2/sweetalert2.min.css">

	
            ';
        $js_page =
            '
            <script src="' . base_url() . 'assets/libs/flatpickr/flatpickr.min.js"></script>
            <script src="' . base_url() . 'assets/libs/gridjs/gridjs.umd.js"></script>
            <script src="' . base_url() . 'assets/js/pages/mysales.init.js"></script>
            <script src="' . base_url() . 'assets/js/pages/shop.init.js"></script>
            <script src="' . base_url() . 'assets/libs/sweetalert2/sweetalert2.min.js"></script>
            <script src="' . base_url() . 'assets/libs/imask/imask.min.js"></script>
            
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
        $this->builder->select('products.pro_id as productspro_id, pro_part_no, pro_name, pro_model, pro_bundling, pro_price_reseler, pro_price_seller, pro_show, pro_active, pro_current_stock , pro_min_stock , pro_max_stock');
        $this->builder->join('products_price', 'products_price.pro_id = products.pro_id');
        $this->builder->join('products_stock', 'products_stock.pro_id = products.pro_id');
        $this->builder->notLike('pro_group', 'Consumable');
        $this->builder->orderBy('pro_group', 'ASC');
        $this->builder->orderBy('pro_name', 'ASC');
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
            if ($i->pro_bundling == 1) {
                $countitembundling = count($this->productsBundlingModel->where('id_bundling', $i->productspro_id)->findAll());
                $curstockArr = array();
                $minstockArr = array();
                $maxstockArr = array();
                for ($a = 0; $a < $countitembundling; $a++) {
                    $pro_id         = $this->productsBundlingModel->where('id_bundling', $i->productspro_id)->findAll()[$a]['pro_id_bundling_item'];
                    $curstockArr[]  = $this->productsstockModel->find($pro_id)['pro_current_stock'];
                    $minstockArr[]  = $this->productsstockModel->find($pro_id)['pro_min_stock'];
                    $maxstockArr[]  = $this->productsstockModel->find($pro_id)['pro_max_stock'];
                }
                $curstock = min($curstockArr);
                $minstock = min($minstockArr);
                $maxstock = max($maxstockArr);
            } else {
                $curstock = $i->pro_current_stock;
                $minstock = $i->pro_min_stock;
                $maxstock = $i->pro_max_stock;
            };

            $row = [
                "no"            => $no++,
                "idpro"         => $i->productspro_id,
                "name"          => $i->pro_name,
                "model"         => $i->pro_model,
                "skuno"         => $i->pro_part_no,
                "current_stock" => $curstock,
                "min_stock"     => $minstock,
                "max_stock"     => $maxstock,
                "statusproduct" => $i->pro_active,
                "editable"      => $editable,
                "deletable"     => $deletable,
                "image"         => isset($this->productsimageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($i->productspro_id)['pro_image_name']) ? $this->productsimageModel->orderBy('pro_image_no', 'asc')->limit(1)->find($i->productspro_id)['pro_image_name'] : 'no_image.png',
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
        $productsStockLogLast = array();
        $dataPackaging = array();
        $proidArray = array();
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

            $proidArray[] = $this->request->getVar('proid')[$a];

            $currentstock = $this->productsstockModel->find($this->request->getVar('proid')[$a])['pro_current_stock'];
            $trans_stock = $this->request->getVar('qty')[$a];
            $new_stock = $currentstock - $this->request->getVar('qty')[$a];

            if ($this->productsModel->find($this->request->getVar('proid')[$a])['pro_bundling'] == 0) {
                $rowstock = array(
                    'pro_id'                => $this->request->getVar('proid')[$a],
                    'pro_current_stock'     => $currentstock,
                    'trans_value'           => $trans_stock,
                );
                array_push($datastockUpdate, $rowstock);

                $rowstockLog = array(
                    'products_stock_log_proid'  => $this->request->getVar('proid')[$a],
                    'log_key'                   => date("ymd") . "/SALES/" . sprintf("%04d", count($this->productsstockLogModel->like('log_key', date("ymd") . "/SALES/")->findAll()) + 1 + $a),
                    'log_code'                  => "SALES",
                    'log_description'           => "SALES " . strtoupper($this->request->getVar('id_sales')),
                    'link'                      => "detail/view/" . substr(strtoupper($this->request->getVar('id_sales')), 0, 6) .  substr(strtoupper($this->request->getVar('id_sales')), 7, 1) .  substr(strtoupper($this->request->getVar('id_sales')), 9, 2) .  substr(strtoupper($this->request->getVar('id_sales')), 12),
                    'last_value'                => $currentstock,
                    'trans_value'               => $trans_stock,
                    'new_value'                 => $new_stock,
                );

                array_push($productsStockLog, $rowstockLog);
            } else {
                $id_bundling =  $this->productsBundlingModel->where('id_bundling', $this->request->getVar('proid')[$a])->findAll();
                $this->productsBundlingModel->where('id_bundling', $this->request->getVar('proid')[$a])->findAll();
                for ($aa = 0; $aa < count($id_bundling); $aa++) {
                    $rowstock = array(
                        'pro_id'                => $id_bundling[$aa]['pro_id_bundling_item'],
                        // 'pro_last_stock'        => $this->productsstockModel->find($id_bundling[$aa]['pro_id_bundling_item'])['pro_current_stock'],
                        'pro_current_stock'     => $this->productsstockModel->find($id_bundling[$aa]['pro_id_bundling_item'])['pro_current_stock'],
                        'trans_value'           => $trans_stock,
                    );
                    array_push($datastockUpdate, $rowstock);

                    $rowstockLog = array(
                        'products_stock_log_proid'  => $id_bundling[$aa]['pro_id_bundling_item'],
                        'log_key'                   => date("ymd") . "/SALES/" . sprintf("%04d", count($this->productsstockLogModel->like('log_key', date("ymd") . "/SALES/")->findAll()) + 1 + $a),
                        'log_code'                  => "SALES",
                        'log_description'           => "SALES " . strtoupper($this->request->getVar('id_sales')),
                        'link'                      => "detail/view/" . substr(strtoupper($this->request->getVar('id_sales')), 0, 6) .  substr(strtoupper($this->request->getVar('id_sales')), 7, 1) .  substr(strtoupper($this->request->getVar('id_sales')), 9, 2) .  substr(strtoupper($this->request->getVar('id_sales')), 12),
                        'last_value'                => $this->productsstockModel->find($id_bundling[$aa]['pro_id_bundling_item'])['pro_current_stock'],
                        'trans_value'               => $trans_stock,
                        'new_value'                 => $this->productsstockModel->find($id_bundling[$aa]['pro_id_bundling_item'])['pro_current_stock'] - $trans_stock,
                    );

                    array_push($productsStockLog, $rowstockLog);
                };
            }

            $productsStockLogLast[] = array(
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



        // dd($datastockUpdate);

        function unique_multidim_arraynew($datastockUpdate, $key, $addedKey)
        {
            $temp_array_a = [];
            $key_array_a = [];
            $ia = 0;

            foreach ($datastockUpdate as $val) {
                if (!in_array($val[$key], $key_array_a)) {
                    $key_array_a[$ia] = $val[$key];
                    $temp_array_a[$ia] = $val;
                } else {
                    $pkey = array_search($val[$key], $key_array_a);
                    $temp_array_a[$pkey][$addedKey] += $val[$addedKey];
                    // die;
                }
                $ia++;
            }
            return $temp_array_a;
        }
        $datastockUpdateUnique = unique_multidim_arraynew($datastockUpdate, "pro_id", "trans_value");   //menjumlahkan item yang sama
        $datastockUpdateNew = array();
        $rowdatastockUpdateNew = array();
        foreach ($datastockUpdateUnique as $il) {                                                       //mengurai curren stock dengan transaction value
            $rowdatastockUpdateNew = [
                'pro_id'                => $il['pro_id'],
                'pro_current_stock'     => $il['pro_current_stock'] - $il['trans_value'],
            ];
            $datastockUpdateNew[] = $rowdatastockUpdateNew;
        }

        $productsStockLogNew = array();
        $rowproductsStockLogNew = array();
        $cn = 0;                                              //mengurai curren stock dengan transaction value
        foreach ($datastockUpdateUnique as $il) {
            $rowproductsStockLogNew = [
                'products_stock_log_proid'  => $il['pro_id'],
                'date_log'                  => $this->request->getVar('date_sales'),
                'log_key'                   => date("ymd") . "/SALES/" . sprintf("%04d", count($this->productsstockLogModel->like('log_key', date("ymd") . "/SALES/")->findAll()) + 1 + $cn++),
                'log_code'                  => "SALES",
                'log_description'           => "SALES " . strtoupper($this->request->getVar('id_sales')),
                'link'                      => "detail/view/" . substr(strtoupper($this->request->getVar('id_sales')), 0, 6) .  substr(strtoupper($this->request->getVar('id_sales')), 7, 1) .  substr(strtoupper($this->request->getVar('id_sales')), 9, 2) .  substr(strtoupper($this->request->getVar('id_sales')), 12),
                'last_value'                => $il['pro_current_stock'],
                'trans_value'               => $il['trans_value'],
                'new_value'                 => $il['pro_current_stock'] - $il['trans_value'],
            ];
            $productsStockLogNew[] = $rowproductsStockLogNew;
        }

        if ($this->request->getVar('packagingmethod') != 0) {
            $pckg = $this->request->getVar('packagingmethod');
            $pckgid = $this->listPackagingModel->find($pckg)['proid_pck'];
            $rowstockpackaging = array(
                'pro_id'                => $pckgid,
                'pro_current_stock'     => $this->productsstockModel->find($this->listPackagingModel->find($pckg)['proid_pck'])['pro_current_stock'] - 1
            );
            array_push($datastockUpdateNew, $rowstockpackaging);

            $rowproductsStockLogPck = [
                'products_stock_log_proid'  => $this->listPackagingModel->find($pckg)['proid_pck'],
                'date_log'                  => $this->request->getVar('date_sales'),
                'log_key'                   => date("ymd") . "/SALES/" . sprintf("%04d", count($this->productsstockLogModel->like('log_key', date("ymd") . "/SALES/")->findAll()) + 1 + $cn++),
                'log_code'                  => "SALES",
                'log_description'           => "SALES " . strtoupper($this->request->getVar('id_sales')),
                'link'                      => "detail/view/" . substr(strtoupper($this->request->getVar('id_sales')), 0, 6) .  substr(strtoupper($this->request->getVar('id_sales')), 7, 1) .  substr(strtoupper($this->request->getVar('id_sales')), 9, 2) .  substr(strtoupper($this->request->getVar('id_sales')), 12),
                'last_value'                => $this->productsstockModel->find($this->listPackagingModel->find($pckg)['proid_pck'])['pro_current_stock'],
                'trans_value'               => 1,
                'new_value'                 => $this->productsstockModel->find($this->listPackagingModel->find($pckg)['proid_pck'])['pro_current_stock'] - 1,
            ];
            array_push($productsStockLogNew, $rowproductsStockLogPck);

            $dataPackaging = [
                'date'                      => $this->request->getVar('date_sales'),
                'procon_id'                 => $this->listPackagingModel->find($pckg)['proid_pck'],
                'id_sales_consum'           => strtoupper($this->request->getVar('id_sales')),
                'consum_qty'                => 1,
                'consum_price'              => $this->productspriceModel->find($pckgid)['pro_price_basic'],
            ];
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

        // dd($this->request->getVar(), $productsStockLog, $datastockUpdate, $dataSalesDetail, $dataSales, $member_id_ownershop, $dataNotification, $targetgroup->getResult());
        // dd($dataSales, $dataSalesDetail, $productsStockLogNew, $datastockUpdateNew, $dataPackaging, $dataNotification);

        $this->db->transBegin();
        $this->salesModel->insert($dataSales);
        $this->salesdetailModel->insertBatch($dataSalesDetail);
        $this->productsstockLogModel->insertBatch($productsStockLogNew);
        $this->productsstockModel->updateBatch($datastockUpdateNew, 'pro_id');
        $this->listNotificationModel->insertBatch($dataNotification);
        if ($this->request->getVar('packagingmethod') != 0) {
            $this->consumableLogModel->insert($dataPackaging);
        }


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

    public function show($tab = null, $date = null, $shop = null)
    {
        $shop_group = array();
        if (base64_decode(base64_decode($shop)) != "reseller") {
            $shop_group = [base64_decode(base64_decode($shop))];
        } else {
            $this->builder = $this->db->table('users');
            $this->builder->join('auth_groups_users', 'auth_groups_users.user_id= users.id');
            $this->builder->join('shop', 'shop.member_id= users.member_id');
            $this->builder->where('group_id', '3');
            $query = $this->builder->get();
            $shop_reselerArray = array();
            foreach ($query->getResult() as $i) {
                array_push($shop_reselerArray, $i->id_shop);
            };
            $shop_group = $shop_reselerArray;
        }


        $this->builder = $this->db->table('sales');
        if ($tab == "All") {
            // $this->builder->where('status', null);
        } else {
            $this->builder->where('status', $tab);
        }
        $string = null;
        if ($date != '1') {
            $string = base64_decode(base64_decode($date));
            if (strlen($string) < 9) {
                $indate = substr($string, 0, 4) . "/" . substr($string, 4, 2) . "/" . substr($string, 6, 2);
                $this->builder->where('date_sales', $indate);
            } else {
                $start = substr($string, 0, 4) . "/" . substr($string, 4, 2) . "/" . substr($string, 6, 2);
                $end = substr($string, 8, 4) . "/" . substr($string, 12, 2) . "/" . substr($string, 14, 2);
                $this->builder->where('date_sales >=', $start);
                $this->builder->where('date_sales <=', $end);
            }
        };


        if ($shop != '1') {
            $this->builder->whereIn('sales.id_shop', $shop_group);
        };
        $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
        $this->builder->join('list_delivery_services', 'list_delivery_services.id = sales.deliveryservices');
        $this->builder->join('list_pay_methode', 'list_pay_methode.id= sales.paymethod');
        // $this->builder->join('auth_groups', 'auth_groups.id= auth_groups_users.group_id');









        if (in_groups('3') == true || in_groups('4') == true) {
            $this->builder->like('member_id', user()->member_id);
        };
        $this->builder->orderBy('date_sales', 'DESC');
        $this->builder->orderBy('id_sales', 'DESC');
        $query = $this->builder->get();

        // dd($query->getResult());

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
        $idshopstring = base64_decode(base64_decode($shop));
        if ($idshopstring != '1') {
            $shpid = $idshopstring;
        } else {
            $shpid = '';
        }
        $data_tab = array(
            // 'All'           => $QueryAll->getNumRows(),
            'Process'       => count($this->salesModel->where('status', 'Process')->like('id_shop', $shpid)->findAll()),
            'Packaging'     => count($this->salesModel->where('status', 'Packaging')->like('id_shop', $shpid)->findAll()),
            'Ready'         => count($this->salesModel->where('status', 'Ready')->like('id_shop', $shpid)->findAll()),
            'Delivery'      => count($this->salesModel->where('status', 'Delivery')->like('id_shop', $shpid)->findAll()),
            'Received'      => count($this->salesModel->where('status', 'Received')->like('id_shop', $shpid)->findAll()),
            'Completed'     => count($this->salesModel->where('status', 'Completed')->like('id_shop', $shpid)->findAll()),
            'Cancel'        => count($this->salesModel->where('status', 'Cancel')->like('id_shop', $shpid)->findAll()),
            'Return'        => count($this->salesModel->where('status', 'Return')->like('id_shop', $shpid)->findAll()),
        );

        return $this->response->setJSON([
            'status' => true,
            'response' => 'Success show data',
            // 'results1' => $sds,
            'tabbadge' => $data_tab,
            'results' => $data,
        ]);
    }

    public function tabbadge()
    {
        $date = $this->request->getVar('date');
        $shop = $this->request->getVar('name');
        $idshopstring = base64_decode(base64_decode($shop));
        if ($idshopstring != '1') {
            $shpid = $idshopstring;
        } else {
            $shpid = '';
        }
        $data_tab = array(
            // 'All'           => $QueryAll->getNumRows(),
            'Process'       => count($this->salesModel->where('status', 'Process')->like('id_shop', $shpid)->findAll()),
            'Packaging'     => count($this->salesModel->where('status', 'Packaging')->like('id_shop', $shpid)->findAll()),
            'Ready'         => count($this->salesModel->where('status', 'Ready')->like('id_shop', $shpid)->findAll()),
            'Delivery'      => count($this->salesModel->where('status', 'Delivery')->like('id_shop', $shpid)->findAll()),
            'Received'      => count($this->salesModel->where('status', 'Received')->like('id_shop', $shpid)->findAll()),
            'Completed'     => count($this->salesModel->where('status', 'Completed')->like('id_shop', $shpid)->findAll()),
            'Cancel'        => count($this->salesModel->where('status', 'Cancel')->like('id_shop', $shpid)->findAll()),
            'Return'        => count($this->salesModel->where('status', 'Return')->like('id_shop', $shpid)->findAll()),
        );

        return $this->response->setJSON([
            'tabbadge' => $data_tab,
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
                // $productsStockLog = array();
                for ($a = 0; $a < count($this->salesdetailModel->where('no_sales', $no_sales)->orderBy('id_sales_detail', 'asc')->findAll()); $a++) {
                    $pro_id = $this->salesdetailModel->where('no_sales', $no_sales)->orderBy('id_sales_detail', 'asc')->findAll()[$a]['pro_id'];
                    $currentstock = $this->productsstockModel->find($pro_id)['pro_current_stock'];
                    $trans_stock = $this->salesdetailModel->where('no_sales', $no_sales)->orderBy('id_sales_detail', 'asc')->findAll()[$a]['pro_qty'];
                    $new_stock = $currentstock + $trans_stock;

                    if ($this->productsModel->find($pro_id)['pro_bundling'] == 0) {
                        $rowstock = array(
                            'pro_id'                => $pro_id,
                            'pro_current_stock'     => $currentstock,
                            'trans_value'           => $trans_stock,
                        );
                        array_push($datastockUpdate, $rowstock);
                    } else {
                        $id_bundling =  $this->productsBundlingModel->where('id_bundling', $pro_id)->findAll();
                        $this->productsBundlingModel->where('id_bundling', $pro_id)->findAll();
                        for ($aa = 0; $aa < count($id_bundling); $aa++) {
                            $rowstock = array(
                                'pro_id'                => $id_bundling[$aa]['pro_id_bundling_item'],
                                'pro_current_stock'     => $this->productsstockModel->find($id_bundling[$aa]['pro_id_bundling_item'])['pro_current_stock'],
                                'trans_value'           => $trans_stock,
                            );
                            array_push($datastockUpdate, $rowstock);
                        };
                    }
                }



                function unique_multidim_array_cr($datastockUpdate, $key, $addedKey)
                {
                    $temp_array_a = [];
                    $key_array_a = [];
                    $ia = 0;

                    foreach ($datastockUpdate as $val) {
                        if (!in_array($val[$key], $key_array_a)) {
                            $key_array_a[$ia] = $val[$key];
                            $temp_array_a[$ia] = $val;
                        } else {
                            $pkey = array_search($val[$key], $key_array_a);
                            $temp_array_a[$pkey][$addedKey] += $val[$addedKey];
                            // die;
                        }
                        $ia++;
                    }
                    return $temp_array_a;
                }
                $datastockUpdateUnique = unique_multidim_array_cr($datastockUpdate, "pro_id", "trans_value");   //menjumlahkan item yang sama

                // dd($datastockUpdateUnique);
                $datastockUpdateNew = array();
                $rowdatastockUpdateNew = array();
                $productsStockLogNew = array();
                $rowproductsStockLogNew = array();
                $cn = 0;                                              //mengurai curren stock dengan transaction value
                foreach ($datastockUpdateUnique as $il) {                                                       //mengurai curren stock dengan transaction value
                    $rowdatastockUpdateNew = [
                        'pro_id'                => $il['pro_id'],
                        'pro_current_stock'     => $il['pro_current_stock'] + $il['trans_value'],
                    ];
                    $datastockUpdateNew[] = $rowdatastockUpdateNew;
                    // }
                    // foreach ($datastockUpdateUnique_edit as $il) {
                    $rowproductsStockLogNew = [
                        'products_stock_log_proid'  => $il['pro_id'],
                        'log_key'                   => date("ymd") . "/" . strtoupper($status_sales) . "-SALES/" . sprintf("%04d", count($this->productsstockLogModel->like('log_key', date("ymd") . "/" . strtoupper($status_sales) . "-SALES/")->findAll()) + 1 + $cn++),
                        'log_code'                  => strtoupper($status_sales) . "-SALES",
                        'log_description'           => strtoupper($status_sales) . " " . $id_sales,
                        'link'                      => "detail/view/" . substr($id_sales, 0, 6) .  substr($id_sales, 7, 1) .  substr($id_sales, 9, 2) .  substr($id_sales, 12),
                        'last_value'                => $il['pro_current_stock'],
                        'trans_value'               => $il['trans_value'],
                        'new_value'                 => $il['pro_current_stock'] + $il['trans_value'],
                    ];
                    $productsStockLogNew[] = $rowproductsStockLogNew;
                }

                $this->salesModel->update(['id_sales' => $id_sales], ['payment' => 0]);
                $this->productsstockLogModel->insertBatch($productsStockLogNew);
                $this->productsstockModel->updateBatch($datastockUpdateNew, 'pro_id');
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

            if ($this->productsModel->find($pro_idLast)['pro_bundling'] == 0) {
                $rowstock = array(
                    'pro_id'                => $pro_idLast,
                    'pro_current_stock'     => $currentstockLast,
                    'trans_value'           => $this->salesdetailModel->where('no_sales', $NoSalestoDelete)->findAll()[$a]['pro_qty'],
                );
                array_push($dataLaststockUpdate, $rowstock);

                $rowstockLog = array(
                    'products_stock_log_proid'  => $pro_idLast,
                    'log_key'                   => date("ymd") . "/EDIT-SALES-LAST/" . sprintf("%04d", count($this->productsstockLogModel->like('log_key', date("ymd") . "/EDIT-SALES-LAST/")->findAll()) + 1 + $a),
                    'log_code'                  => "EDIT-SALES-LAST",
                    'log_description'           => "EDIT-SALES-LAST " . $IDSalestoDelete,
                    'link'                      => "detail/view/" . substr($IDSalestoDelete, 0, 6) .  substr($IDSalestoDelete, 7, 1) .  substr($IDSalestoDelete, 9, 2) .  substr($IDSalestoDelete, 12),
                    'last_value'                => $currentstockLast,
                    'trans_value'               => $trans_stockLast,
                    'new_value'                 => $new_stockLast,
                );

                array_push($productsLastStockLog, $rowstockLog);
            } else {
                $id_bundling =  $this->productsBundlingModel->where('id_bundling', $pro_idLast)->findAll();
                $this->productsBundlingModel->where('id_bundling', $pro_idLast)->findAll();
                for ($aa = 0; $aa < count($id_bundling); $aa++) {
                    $rowstock = array(
                        'pro_id'                => $id_bundling[$aa]['pro_id_bundling_item'],
                        'pro_current_stock'     => $this->productsstockModel->find($id_bundling[$aa]['pro_id_bundling_item'])['pro_current_stock'],
                        'trans_value'           => $this->salesdetailModel->where('no_sales', $NoSalestoDelete)->findAll()[$a]['pro_qty'],
                    );
                    array_push($dataLaststockUpdate, $rowstock);

                    $rowstockLog = array(
                        'products_stock_log_proid'  => $id_bundling[$aa]['pro_id_bundling_item'],
                        'log_key'                   => date("ymd") . "/EDIT-SALES-LAST/" . sprintf("%04d", count($this->productsstockLogModel->like('log_key', date("ymd") . "/EDIT-SALES-LAST/")->findAll()) + 1 + $a),
                        'log_code'                  => "EDIT-SALES-LAST",
                        'log_description'           => "EDIT-SALES-LAST " . $IDSalestoDelete,
                        'link'                      => "detail/view/" . substr($IDSalestoDelete, 0, 6) .  substr($IDSalestoDelete, 7, 1) .  substr($IDSalestoDelete, 9, 2) .  substr($IDSalestoDelete, 12),
                        'last_value'                => $this->productsstockModel->find($id_bundling[$aa]['pro_id_bundling_item'])['pro_current_stock'],
                        'trans_value'               => $trans_stockLast,
                        'new_value'                 => $this->productsstockModel->find($id_bundling[$aa]['pro_id_bundling_item'])['pro_current_stock'] + $trans_stockLast,
                    );

                    array_push($productsLastStockLog, $rowstockLog);
                };
            }
        }

        function unique_multidim_arraylast_edit($dataLaststockUpdate, $key, $addedKey)
        {
            $temp_array_a = [];
            $key_array_a = [];
            $ia = 0;

            foreach ($dataLaststockUpdate as $val) {
                if (!in_array($val[$key], $key_array_a)) {
                    $key_array_a[$ia] = $val[$key];
                    $temp_array_a[$ia] = $val;
                } else {
                    $pkey = array_search($val[$key], $key_array_a);
                    $temp_array_a[$pkey][$addedKey] += $val[$addedKey];
                    // die;
                }
                $ia++;
            }
            return $temp_array_a;
        }
        $datastockUpdateUnique_edit = unique_multidim_arraylast_edit($dataLaststockUpdate, "pro_id", "trans_value");   //menjumlahkan item yang sama
        $dataLaststockUpdateNew = array();
        $rowdataLaststockUpdateNew = array();
        $productsLastStockLogNew = array();
        $rowproductsLastStockLogNew = array();
        $cn = 0;                                              //mengurai curren stock dengan transaction value
        foreach ($datastockUpdateUnique_edit as $il) {                                                       //mengurai curren stock dengan transaction value
            $rowdataLaststockUpdateNew = [
                'pro_id'                => $il['pro_id'],
                'pro_current_stock'     => $il['pro_current_stock'] + $il['trans_value'],
            ];
            $dataLaststockUpdateNew[] = $rowdataLaststockUpdateNew;
            // }
            // foreach ($datastockUpdateUnique_edit as $il) {
            $rowproductsLastStockLogNew = [
                'products_stock_log_proid'  => $il['pro_id'],
                'log_key'                   => date("ymd") . "/EDIT-SALES-LAST/" . sprintf("%04d", count($this->productsstockLogModel->like('log_key', date("ymd") . "/EDIT-SALES-LAST/")->findAll()) + 1 + $cn++),
                'log_code'                  => "EDIT-SALES-LAST",
                'log_description'           => "EDIT-SALES-LAST " . $IDSalestoDelete,
                'link'                      => "detail/view/" . substr($IDSalestoDelete, 0, 6) .  substr($IDSalestoDelete, 7, 1) .  substr($IDSalestoDelete, 9, 2) .  substr($IDSalestoDelete, 12),
                'last_value'                => $il['pro_current_stock'],
                'trans_value'               => $il['trans_value'],
                'new_value'                 => $il['pro_current_stock'] + $il['trans_value'],
            ];
            $productsLastStockLogNew[] = $rowproductsLastStockLogNew;
        }

        // dd($dataLaststockUpdate, $dataLaststockUpdateNew, $productsLastStockLog, $datastockUpdateUnique_edit);
        // dd($dataLaststockUpdateNew, $productsLastStockLogNew);

        $this->productsstockLogModel->insertBatch($productsLastStockLogNew);                 //OK
        $this->productsstockModel->updateBatch($dataLaststockUpdateNew, 'pro_id');           //OK
        $this->salesdetailModel->delete($NoSalestoDelete);                                   //OK


        // --------//

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

            if ($this->productsModel->find($this->request->getVar('proid')[$b])['pro_bundling'] == 0) {
                $rowstock = array(
                    'pro_id'                => $this->request->getVar('proid')[$b],
                    'pro_current_stock'     => $currentstockNew,
                    'trans_value'           => $this->request->getVar('qty')[$b],
                );
                array_push($datastockUpdateNew, $rowstock);

                $rowstockLog = array(
                    'products_stock_log_proid'  => $this->request->getVar('proid')[$b],
                    'log_key'                   => date("ymd") . "/EDIT-SALES-NEW/" . sprintf("%04d", count($this->productsstockLogModel->like('log_key', date("ymd") . "/EDIT-SALES-NEW/")->findAll()) + 1 + $b),
                    'log_code'                  => "EDIT-SALES-NEW",
                    // 'log_description'           => "EDIT-SALES-NEW " . strtoupper($this->request->getVar('idsales')),
                    // 'link'                      => "detail/view/" . substr(strtoupper($this->request->getVar('id_sales')), 0, 6) .  substr(strtoupper($this->request->getVar('id_sales')), 7, 1) .  substr(strtoupper($this->request->getVar('id_sales')), 9, 2) .  substr(strtoupper($this->request->getVar('id_sales')), 12),
                    'log_description'           => "EDIT-SALES-NEW " . $IDSalestoDelete,
                    'link'                      => "detail/view/" . substr($IDSalestoDelete, 0, 6) .  substr($IDSalestoDelete, 7, 1) .  substr($IDSalestoDelete, 9, 2) .  substr($IDSalestoDelete, 12),
                    'last_value'                => $currentstockNew,
                    'trans_value'               => $trans_stockNew,
                    'new_value'                 => $new_stockNew,
                );

                array_push($productsStockLogNew, $rowstockLog);
            } else {
                $id_bundling =  $this->productsBundlingModel->where('id_bundling', $this->request->getVar('proid')[$b])->findAll();
                $this->productsBundlingModel->where('id_bundling', $this->request->getVar('proid')[$b])->findAll();
                for ($aa = 0; $aa < count($id_bundling); $aa++) {
                    $rowstock = array(
                        'pro_id'                => $id_bundling[$aa]['pro_id_bundling_item'],
                        // 'pro_last_stock'        => $this->productsstockModel->find($id_bundling[$aa]['pro_id_bundling_item'])['pro_current_stock'],
                        'pro_current_stock'     => $this->productsstockModel->find($id_bundling[$aa]['pro_id_bundling_item'])['pro_current_stock'],
                        'trans_value'           => $trans_stockNew,
                    );
                    array_push($datastockUpdateNew, $rowstock);

                    $rowstockLog = array(
                        'products_stock_log_proid'  => $id_bundling[$aa]['pro_id_bundling_item'],
                        'log_key'                   => date("ymd") . "/EDIT-SALES-NEW/" . sprintf("%04d", count($this->productsstockLogModel->like('log_key', date("ymd") . "/EDIT-SALES-NEW/")->findAll()) + 1 + $aa),
                        'log_code'                  => "EDIT-SALES-NEW",
                        // 'log_description'           => "EDIT-SALES-NEW " . strtoupper($this->request->getVar('idsales')),
                        // 'link'                      => "detail/view/" . substr(strtoupper($this->request->getVar('id_sales')), 0, 6) .  substr(strtoupper($this->request->getVar('id_sales')), 7, 1) .  substr(strtoupper($this->request->getVar('id_sales')), 9, 2) .  substr(strtoupper($this->request->getVar('id_sales')), 12),
                        'log_description'           => "EDIT-SALES-NEW " . $IDSalestoDelete,
                        'link'                      => "detail/view/" . substr($IDSalestoDelete, 0, 6) .  substr($IDSalestoDelete, 7, 1) .  substr($IDSalestoDelete, 9, 2) .  substr($IDSalestoDelete, 12),
                        'last_value'                => $this->productsstockModel->find($id_bundling[$aa]['pro_id_bundling_item'])['pro_current_stock'],
                        'trans_value'               => $trans_stockNew,
                        'new_value'                 => $this->productsstockModel->find($id_bundling[$aa]['pro_id_bundling_item'])['pro_current_stock'] - $trans_stockNew,
                    );

                    array_push($productsStockLogNew, $rowstockLog);
                };
            }



            $priceArray[] = $this->request->getVar('price')[$b] * $this->request->getVar('qty')[$b];
        }

        function unique_multidim_arraynew_edit($datastockUpdateNew, $key, $addedKey)
        {
            $temp_array_a = [];
            $key_array_a = [];
            $ia = 0;

            foreach ($datastockUpdateNew as $val) {
                if (!in_array($val[$key], $key_array_a)) {
                    $key_array_a[$ia] = $val[$key];
                    $temp_array_a[$ia] = $val;
                } else {
                    $pkey = array_search($val[$key], $key_array_a);
                    $temp_array_a[$pkey][$addedKey] += $val[$addedKey];
                    // die;
                }
                $ia++;
            }
            return $temp_array_a;
        }
        $datastockUpdateNewUnique_edit = unique_multidim_arraynew_edit($datastockUpdateNew, "pro_id", "trans_value");   //menjumlahkan item yang sama
        $datastockNewUpdateNew = array();
        $rowdatastocNewkUpdateNew = array();
        $productsStockNewLogNew = array();
        $rowproductsStockNewLogNew = array();
        $ct = 0;                                              //mengurai curren stock dengan transaction value
        foreach ($datastockUpdateNewUnique_edit as $il) {                                                       //mengurai curren stock dengan transaction value
            $rowdatastocNewkUpdateNew = [
                'pro_id'                => $il['pro_id'],
                'pro_current_stock'     => $il['pro_current_stock'] - $il['trans_value'],
            ];
            $datastockNewUpdateNew[] = $rowdatastocNewkUpdateNew;
            // }
            // foreach ($datastockUpdateNewUnique_edit as $il) {
            $rowproductsStockNewLogNew = [
                'products_stock_log_proid'  => $il['pro_id'],
                'log_key'                   => date("ymd") . "/EDIT-SALES-NEW/" . sprintf("%04d", count($this->productsstockLogModel->like('log_key', date("ymd") . "/EDIT-SALES-NEW/")->findAll()) + 1 + $ct),
                'log_code'                  => "EDIT-SALES-NEW",
                // 'log_description'           => "EDIT-SALES-NEW " . strtoupper($this->request->getVar('idsales')),
                // 'link'                      => "detail/view/" . substr(strtoupper($this->request->getVar('id_sales')), 0, 6) .  substr(strtoupper($this->request->getVar('id_sales')), 7, 1) .  substr(strtoupper($this->request->getVar('id_sales')), 9, 2) .  substr(strtoupper($this->request->getVar('id_sales')), 12),
                'log_description'           => "EDIT-SALES-NEW " . $IDSalestoDelete,
                'link'                      => "detail/view/" . substr($IDSalestoDelete, 0, 6) .  substr($IDSalestoDelete, 7, 1) .  substr($IDSalestoDelete, 9, 2) .  substr($IDSalestoDelete, 12),
                'last_value'                => $il['pro_current_stock'],
                'trans_value'               => $il['trans_value'],
                'new_value'                 => $il['pro_current_stock'] - $il['trans_value'],
            ];
            $productsStockNewLogNew[] = $rowproductsStockNewLogNew;
        }










        // dd($datastockUpdateNew, $productsStockLogNew, $datastockUpdateNewUnique_edit, $datastockNewUpdateNew, $productsStockNewLogNew);

        $this->productsstockLogModel->insertBatch($productsStockNewLogNew);
        $this->productsstockModel->updateBatch($datastockNewUpdateNew, 'pro_id');

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
        $notification = "from " . $shopname . " Change Detail";
        $id_sales = strtoupper($this->request->getVar('idsales'));
        $key_sales = substr($id_sales, 0, 6) .  substr($id_sales, 7, 1) .  substr($id_sales, 9, 2) .  substr($id_sales, 12);
        $dataNotification = array();
        for ($a = 0; $a < $targetgroup->getNumRows(); $a++) {
            $dataNotification[] = array(
                'path_notif'            => "detail/view/" . $key_sales,
                'type_notif'            => "Change Sales",
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


        $this->salesdetailModel->insertBatch($dataNewSalesDetail);
        $this->salesModel->update(['id_sales' => $this->request->getVar('idsales')], $dataSales);
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
                'type_notif'            => "Change Sales",
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

    public function seriessales($idshop = null, $range = null)
    {
        $id_shop = base64_decode(base64_decode($idshop));
        $shop_group = array();
        if ($id_shop == "reseller" || $id_shop == "dashboards") {
            $this->builder = $this->db->table('users');
            $this->builder->join('auth_groups_users', 'auth_groups_users.user_id= users.id');
            $this->builder->join('shop', 'shop.member_id= users.member_id');
            if ($id_shop != "dashboards") {
                $this->builder->where('group_id', '3');
            }
            $query = $this->builder->get();

            $shop_reselerArray = array();
            foreach ($query->getResult() as $i) {
                array_push($shop_reselerArray, $i->id_shop);
            };
            $shop_group = $shop_reselerArray;
            // dd("reseller/dashboards");
        } else {
            $shop_group = [$id_shop];
            // dd("shop_group");
        }




        $day = date("d");
        if ($range == 'tmonth') {
            $month = date("m");
        } else if ($range == 'lmonth') {
            $month = date("m") - 1;
        } else {
            $month = date("m");
        }

        $years = date("Y");
        $count = cal_days_in_month(CAL_GREGORIAN, $month, $years);
        $row = array();
        $series = array();

        $monday = strtotime("last monday");
        $monday = date('w', $monday) == date('w') ? $monday + 7 * 86400 : $monday;
        $sunday = strtotime(date("Y-m-d", $monday) . " +6 days");
        $this_week_start = date("d", $monday);
        $this_week_start_fulldate = date("Y-m-d", $monday);
        $this_week_end = date("d", $sunday);
        if ($range == 'today') {
            $count = 1;
        };
        if ($range == 'tweek') {
            $count = 7;
        };
        if ($range == 'lweek') {
            $count = 7;
        };
        if ($range == 'tyears') {
            $count = 12;
        };

        $sd = $years . "-" . sprintf("%02d", $month) . "-" . sprintf("%02d", 1);
        $m = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
        for ($a = 0; $a < $count; $a++) {
            $no = 1;
            if ($range == 'today') {
                $no = $day;
                $sd = date("Y-m-d");
            };
            if ($range == 'tweek') {
                $no = $this_week_start;
                $sd = date("Y-m-d", $monday);
            };
            if ($range == 'lweek') {
                $no = $this_week_start - 7;
                $sd = date("Y-m-d", strtotime("-7 day", strtotime(date("Y-m-d", $monday))));
            };
            // $date = $years . "-" . $month . "-" . sprintf("%02d", $a + $no);
            $date = date("Y-m-d", strtotime("+" . $a . " day", strtotime($sd)));
            // $datetocategory = sprintf("%02d", $a + $no);
            $datetocategory = date("d", strtotime("+" . $a . " day", strtotime($sd)));
            $date_for_like = $years . "-" . sprintf("%02d", $a + $no);

            if ($range == 'tyears') {
                $row = [
                    "x"    => $m[$a],
                    "y"    => count($this->salesModel->whereIn('id_shop', $shop_group)->like('date_sales', $date_for_like)->havingNotIn('status', ['Return', 'Cancel'])->findAll()),
                ];
                $series[] = $row;
            } else if ($range == 'today') {
                $row = array(
                    [
                        "x"    => date("d", strtotime("-1 day", strtotime($sd))),
                        "y"    => 0,
                    ],
                    [
                        "x"    => $datetocategory,
                        "y"    => count($this->salesModel->whereIn('id_shop', $shop_group)->where('date_sales', $date)->havingNotIn('status', ['Return', 'Cancel'])->findAll()),
                    ],
                    [
                        "x"    => date("d", strtotime("+1 day", strtotime($sd))),
                        "y"    => 0,
                    ],
                );
                $series = $row;
            } else {
                $row = [
                    "x"    => $datetocategory,
                    "y"    => count($this->salesModel->whereIn('id_shop', $shop_group)->where('date_sales', $date)->havingNotIn('status', ['Return', 'Cancel'])->findAll()),
                ];
                $series[] = $row;
            }
            $arraydate[] = $date;
        };



        if ($range == null) {
            $title = "";
        };
        if ($range == "today") {
            $title = "by Today";
        };
        if ($range == "tweek") {
            $title = "by Weeks";
        };
        if ($range == "tmonth") {
            $title = "by Months";
        };
        if ($range == "tyears") {
            $title = "by Years";
        };
        if ($range == "lweek") {
            $title = "by Last Weeks";
        };
        if ($range == "lmonth") {
            $title = "by Last Months";
        };




        $t = 7;

        // Total Sales & Order ------------------------------------------------------------------------------------------------------------------------------------------------ 
        $groups = ['Return', 'Cancel'];
        $groups1 = ['Received', 'Completed'];
        $groups2 = array();
        $groups3 = ['Return', 'Cancel', 'Completed'];
        for ($a = 0; $a < count($this->listPackagingModel->notLike('id_packaging', "0")->findAll()); $a++) {
            array_push($groups2, $this->listPackagingModel->notLike('id_packaging', "0")->findAll()[$a]['proid_pck']);
        }
        // $tesdate = $years . "-" . sprintf("%02d", $month) . "-" . sprintf("%02d", 1);
        // $teddate = $years . "-" . sprintf("%02d", $month) . "-" . sprintf("%02d", $day);
        // $lesdate = $years . "-" . sprintf("%02d", $month - 1) . "-" . sprintf("%02d", 1);
        // $leddate = $years . "-" . sprintf("%02d", $month - 1) . "-" . sprintf("%02d", $day);
        $tesdate = $years . "-" . sprintf("%02d", $month) . "-" . sprintf("%02d", $day);
        $teddate = $years . "-" . sprintf("%02d", $month) . "-" . sprintf("%02d", $day);
        $lesdate = date("Y-m-d", strtotime("-1 day", strtotime($tesdate)));
        $leddate = date("Y-m-d", strtotime("-1 day", strtotime($tesdate)));
        if ($range == "today") {
            $tesdate = $years . "-" . sprintf("%02d", $month) . "-" . sprintf("%02d", $day);
            $teddate = $years . "-" . sprintf("%02d", $month) . "-" . sprintf("%02d", $day);
            $lesdate = date("Y-m-d", strtotime("-1 day", strtotime($tesdate)));
            $leddate = date("Y-m-d", strtotime("-1 day", strtotime($tesdate)));
        };
        if ($range == "tweek") {
            $tesdate = $years . "-" . sprintf("%02d", $month) . "-" . sprintf("%02d", $this_week_start);
            $teddate = date("Y-m-d", strtotime("+6 day", strtotime($tesdate)));
            $lesdate = date("Y-m-d", strtotime("-7 day", strtotime($tesdate)));
            $leddate = date("Y-m-d", strtotime("-1 day", strtotime($tesdate)));
        };
        if ($range == "tmonth") {
            $tesdate = $years . "-" . sprintf("%02d", $month) . "-" . sprintf("%02d", 1);
            $teddate = $years . "-" . sprintf("%02d", $month) . "-" . sprintf("%02d", $day);
            $lesdate = $years . "-" . sprintf("%02d", $month - 1) . "-" . sprintf("%02d", 1);
            $leddate = $years . "-" . sprintf("%02d", $month - 1) . "-" . sprintf("%02d", $day);
        };
        if ($range == "lweek") {
            $tesdate = date("Y-m-d", strtotime("-7 day", strtotime(date("Y-m-d", $monday))));
            $teddate = date("Y-m-d", strtotime("+6 day", strtotime($tesdate)));
            $lesdate = date("Y-m-d", strtotime("-7 day", strtotime($tesdate)));
            $leddate = date("Y-m-d", strtotime("-1 day", strtotime($tesdate)));
        };
        $tsalesArray = array();
        $torderArray = array();
        $tallpaymentArray = array();
        $tallpriceBasicArray = array();
        $tpricepckg = array();
        $taddsArray = array();
        $lsalesArray = array();
        $lorderArray = array();
        $lallpaymentArray = array();
        $lallpriceBasicArray = array();
        $lpricepckg = array();
        $laddsArray = array();

        if ($range == "tyears") {
            for ($a = 0; $a < count($this->salesModel->whereIn('id_shop', $shop_group)->like('date_sales', $years)->havingNotIn('status', $groups)->findAll()); $a++) {
                $tsalesArray[] = $this->salesModel->whereIn('id_shop', $shop_group)->like('date_sales', $years)->havingNotIn('status', $groups)->findAll()[$a]['payment'];
                $torderArray[] = $this->salesModel->whereIn('id_shop', $shop_group)->like('date_sales', $years)->havingNotIn('status', $groups)->findAll()[$a]['bill'];

                $idsl = $this->salesModel->whereIn('id_shop', $shop_group)->like('date_sales', $years)->havingNotIn('status', $groups)->findAll()[$a]['id_sales'];
                $tpricepckg[] = $this->consumableLogModel->find($idsl)['consum_price'];
            }
            for ($a = 0; $a < count($this->purchaseModel->whereIn('supplier_id', $shop_group)->like('date_purchase', $years)->findAll()); $a++) {
                $taddsArray[] = $this->purchaseModel->whereIn('supplier_id', $shop_group)->like('date_purchase', $years)->findAll()[$a]['payment'];
            }
            for ($a = 0; $a < count($this->salesModel->whereIn('id_shop', $shop_group)->like('date_sales', $years - 1)->havingNotIn('status', $groups)->findAll()); $a++) {
                $lsalesArray[] = $this->salesModel->whereIn('id_shop', $shop_group)->like('date_sales', $years - 1)->havingNotIn('status', $groups)->findAll()[$a]['payment'];
                $lorderArray[] = $this->salesModel->whereIn('id_shop', $shop_group)->like('date_sales', $years - 1)->havingNotIn('status', $groups)->findAll()[$a]['bill'];

                $idsl = $this->salesModel->whereIn('id_shop', $shop_group)->like('date_sales', $years - 1)->havingNotIn('status', $groups)->findAll()[$a]['id_sales'];
                $lpricepckg[] = $this->consumableLogModel->find($idsl)['consum_price'];
            }
            for ($a = 0; $a < count($this->purchaseModel->whereIn('supplier_id', $shop_group)->like('date_purchase', $years - 1)->findAll()); $a++) {
                $laddsArray[] = $this->purchaseModel->whereIn('supplier_id', $shop_group)->like('date_purchase', $years - 1)->findAll()[$a]['payment'];
            }
            for ($a = 0; $a < count($this->salesModel->whereIn('id_shop', $shop_group)->like('date_sales', $years)->whereIn('status', $groups1)->findAll()); $a++) {
                $tallpaymentArray[] = $this->salesModel->whereIn('id_shop', $shop_group)->like('date_sales', $years)->whereIn('status', $groups1)->findAll()[$a]['payment'];
                $no_sales = $this->salesModel->whereIn('id_shop', $shop_group)->like('date_sales', $years)->whereIn('status', $groups1)->findAll()[$a]['no_sales'];
                $rowbasic = array();
                for ($b = 0; $b < count($this->salesdetailModel->where('no_sales', $no_sales)->findAll()); $b++) {
                    $rowbasicdata = $this->salesdetailModel->where('no_sales', $no_sales)->findAll()[$b]['pro_qty'] * $this->salesdetailModel->where('no_sales', $no_sales)->findAll()[$b]['pro_price_basic'];
                    $rowbasic[] = $rowbasicdata;
                }
                $tallpriceBasicArray[] = array_sum($rowbasic) + $this->salesModel->whereIn('id_shop', $shop_group)->like('date_sales', $years)->whereIn('status', $groups1)->findAll()[$a]['packaging_charge'];
            }
            for ($a = 0; $a < count($this->salesModel->whereIn('id_shop', $shop_group)->like('date_sales', $years - 1)->whereIn('status', $groups1)->findAll()); $a++) {
                $lallpaymentArray[] = $this->salesModel->whereIn('id_shop', $shop_group)->like('date_sales', $years - 1)->whereIn('status', $groups1)->findAll()[$a]['payment'];
                $no_sales = $this->salesModel->whereIn('id_shop', $shop_group)->like('date_sales', $years)->whereIn('status', $groups1)->findAll()[$a]['no_sales'];
                $rowbasic = array();
                for ($b = 0; $b < count($this->salesdetailModel->where('no_sales', $no_sales)->findAll()); $b++) {
                    $rowbasicdata = $this->salesdetailModel->where('no_sales', $no_sales)->findAll()[$b]['pro_qty'] * $this->salesdetailModel->where('no_sales', $no_sales)->findAll()[$b]['pro_price_basic'];
                    $rowbasic[] = $rowbasicdata;
                }
                $lallpriceBasicArray[] = array_sum($rowbasic) + $this->salesModel->whereIn('id_shop', $shop_group)->like('date_sales', $years - 1)->whereIn('status', $groups1)->findAll()[$a]['packaging_charge'];
            }
            $totalpackage = count($this->salesModel->whereIn('id_shop', $shop_group)->like('date_sales', $years)->havingNotIn('status', $groups)->findAll());
            $totalinprocess = count($this->salesModel->whereIn('id_shop', $shop_group)->like('date_sales', $years)->havingNotIn('status', $groups3)->findAll());
            $totalcompleted = count($this->salesModel->whereIn('id_shop', $shop_group)->like('date_sales', $years)->where('status', 'Completed')->findAll());
        } else {
            for ($a = 0; $a < count($this->salesModel->whereIn('id_shop', $shop_group)->where('date_sales >=', $tesdate)->where('date_sales <=', $teddate)->havingNotIn('status', $groups)->findAll()); $a++) {
                $tsalesArray[] = $this->salesModel->whereIn('id_shop', $shop_group)->where('date_sales >=', $tesdate)->where('date_sales <=', $teddate)->havingNotIn('status', $groups)->findAll()[$a]['payment'];
                $torderArray[] = $this->salesModel->whereIn('id_shop', $shop_group)->where('date_sales >=', $tesdate)->where('date_sales <=', $teddate)->havingNotIn('status', $groups)->findAll()[$a]['bill'];

                $idsl = $this->salesModel->whereIn('id_shop', $shop_group)->where('date_sales >=', $tesdate)->where('date_sales <=', $teddate)->havingNotIn('status', $groups)->findAll()[$a]['id_sales'];

                $tpricepckg[] = $this->consumableLogModel->find($idsl)['consum_price'];
            }
            for ($a = 0; $a < count($this->purchaseModel->whereIn('supplier_id', $shop_group)->where('date_purchase >=', $tesdate)->where('date_purchase <=', $teddate)->findAll()); $a++) {
                $taddsArray[] = $this->purchaseModel->whereIn('supplier_id', $shop_group)->where('date_purchase >=', $tesdate)->where('date_purchase <=', $teddate)->findAll()[$a]['payment'];
            }
            for ($a = 0; $a < count($this->salesModel->whereIn('id_shop', $shop_group)->where('date_sales >=', $lesdate)->where('date_sales <=', $leddate)->havingNotIn('status', $groups)->findAll()); $a++) {
                $lsalesArray[] = $this->salesModel->whereIn('id_shop', $shop_group)->where('date_sales >=', $lesdate)->where('date_sales <=', $leddate)->havingNotIn('status', $groups)->findAll()[$a]['payment'];
                $lorderArray[] = $this->salesModel->whereIn('id_shop', $shop_group)->where('date_sales >=', $lesdate)->where('date_sales <=', $leddate)->havingNotIn('status', $groups)->findAll()[$a]['bill'];

                $idsl = $this->salesModel->whereIn('id_shop', $shop_group)->where('date_sales >=', $lesdate)->where('date_sales <=', $leddate)->havingNotIn('status', $groups)->findAll()[$a]['id_sales'];
                $lpricepckg[] = $this->consumableLogModel->find($idsl)['consum_price'];
            }
            for ($a = 0; $a < count($this->purchaseModel->whereIn('supplier_id', $shop_group)->where('date_purchase >=', $lesdate)->where('date_purchase <=', $leddate)->findAll()); $a++) {
                $laddsArray[] = $this->purchaseModel->whereIn('supplier_id', $shop_group)->where('date_purchase >=', $lesdate)->where('date_purchase <=', $leddate)->findAll()[$a]['payment'];
            }
            for ($a = 0; $a < count($this->salesModel->whereIn('id_shop', $shop_group)->where('date_sales >=', $tesdate)->where('date_sales <=', $teddate)->whereIn('status', $groups1)->findAll()); $a++) {
                $tallpaymentArray[] = $this->salesModel->whereIn('id_shop', $shop_group)->where('date_sales >=', $tesdate)->where('date_sales <=', $teddate)->whereIn('status', $groups1)->findAll()[$a]['payment'];
                $no_sales = $this->salesModel->whereIn('id_shop', $shop_group)->where('date_sales >=', $tesdate)->where('date_sales <=', $teddate)->whereIn('status', $groups1)->findAll()[$a]['no_sales'];
                $rowbasic = array();
                for ($b = 0; $b < count($this->salesdetailModel->where('no_sales', $no_sales)->findAll()); $b++) {
                    $rowbasicdata = $this->salesdetailModel->where('no_sales', $no_sales)->findAll()[$b]['pro_qty'] * $this->salesdetailModel->where('no_sales', $no_sales)->findAll()[$b]['pro_price_basic'];
                    $rowbasic[] = $rowbasicdata;
                }
                $tallpriceBasicArray[] = array_sum($rowbasic) + $this->salesModel->whereIn('id_shop', $shop_group)->where('date_sales >=', $tesdate)->where('date_sales <=', $teddate)->whereIn('status', $groups1)->findAll()[$a]['packaging_charge'];
            }
            for ($a = 0; $a < count($this->salesModel->whereIn('id_shop', $shop_group)->where('date_sales >=', $lesdate)->where('date_sales <=', $leddate)->whereIn('status', $groups1)->findAll()); $a++) {
                $lallpaymentArray[] = $this->salesModel->whereIn('id_shop', $shop_group)->where('date_sales >=', $lesdate)->where('date_sales <=', $leddate)->whereIn('status', $groups1)->findAll()[$a]['payment'];
                $no_sales = $this->salesModel->whereIn('id_shop', $shop_group)->where('date_sales >=', $lesdate)->where('date_sales <=', $leddate)->whereIn('status', $groups1)->findAll()[$a]['no_sales'];
                $rowbasic = array();
                for ($b = 0; $b < count($this->salesdetailModel->where('no_sales', $no_sales)->findAll()); $b++) {
                    $rowbasicdata = $this->salesdetailModel->where('no_sales', $no_sales)->findAll()[$b]['pro_qty'] * $this->salesdetailModel->where('no_sales', $no_sales)->findAll()[$b]['pro_price_basic'];
                    $rowbasic[] = $rowbasicdata;
                }
                $lallpriceBasicArray[] = array_sum($rowbasic) + $this->salesModel->whereIn('id_shop', $shop_group)->where('date_sales >=', $lesdate)->where('date_sales <=', $leddate)->whereIn('status', $groups1)->findAll()[$a]['packaging_charge'];
            }
            $totalpackage = count($this->salesModel->whereIn('id_shop', $shop_group)->where('date_sales >=', $tesdate)->where('date_sales <=', $teddate)->havingNotIn('status', $groups)->findAll());
            $totalinprocess = count($this->salesModel->whereIn('id_shop', $shop_group)->where('date_sales >=', $tesdate)->where('date_sales <=', $teddate)->havingNotIn('status', $groups3)->findAll());
            $totalcompleted = count($this->salesModel->whereIn('id_shop', $shop_group)->where('date_sales >=', $tesdate)->where('date_sales <=', $teddate)->where('status', "Completed")->findAll());
        }

        $data_report = array(
            'title'             => $title,
            'totalpackage'      => $totalpackage,
            'totalinprocess'     => $totalinprocess,
            'totalcompleted'     => $totalcompleted,
        );

        $salespcg = 0;
        $salesval_this = array_sum($tsalesArray);
        $salesval_last = array_sum($lsalesArray);
        if ($salesval_this >= $salesval_last) {  // SALES  Jika jumlah Sales Sekarang >= jumlah Sales yang lalu
            $salesval      = $salesval_this;
            $saleskey      = "success";
            $salessym      = "up";
            if ($salesval_this != 0) {
                $salespcg  = ($salesval_this - $salesval_last) / $salesval_this * 100;
            }
        } else {
            $salesval  = $salesval_this;
            $saleskey  = "danger";
            $salessym  = "down";
            if ($salesval_last != 0) {
                $salespcg  = ($salesval_last - $salesval_this) / $salesval_last * 100;
            }
        }

        $orderpcg = 0;
        $orderval_this = array_sum($torderArray);
        $orderval_last = array_sum($lorderArray);
        if ($orderval_this >= $orderval_last) {  // ORDER
            $orderval  = $orderval_this;
            $orderkey  = "success";
            $ordersym  = "up";
            if ($orderval_this != 0) {
                $orderpcg  = ($orderval_this - $orderval_last) / $orderval_this * 100;
            }
        } else {
            $orderval  = array_sum($torderArray);
            $orderkey  = "danger";
            $ordersym  = "down";
            if ($orderval_last != 0) {
                $orderpcg  = ($orderval_last - $orderval_this) / $orderval_last * 100;
            }
        }

        $consumpcg = 0;
        $consum_this = array_sum($tpricepckg);
        $consum_last = array_sum($lpricepckg);
        if ($consum_this >= $consum_last) {  // CONSUMABLE
            $consumval  = $consum_this;
            $consumkey  = "danger";
            $consumsym  = "up";
            if ($consum_this != 0) {
                $consumpcg  = ($consum_this - $consum_last) / $consum_this * 100;
            }
        } else {
            $consumval  = $consum_this;
            $consumkey  = "success";
            $consumsym  = "down";
            if ($consum_last != 0) {
                $consumpcg  = ($consum_last - $consum_this) / $consum_last * 100;
            }
        }

        $adspcg = 0;
        $ads_this = array_sum($taddsArray);
        $ads_last = array_sum($laddsArray);
        if ($ads_this >= $ads_last) {  // ADS(IKLAN)
            $adsval  = $ads_this;
            $adskey  = "danger";
            $adssym  = "up";
            if ($ads_this != 0) {
                $adspcg  = ($ads_this - $ads_last) / $ads_this * 100;
            }
        } else {
            $adsval  = $ads_this;
            $adskey  = "success";
            $adssym  = "down";
            if ($ads_last != 0) {
                $adspcg  = ($ads_last - $ads_this) / $ads_last * 100;
            }
        }

        $exppcg = 0;
        $exp_this = $consum_this + $ads_this;
        $exp_last = $consum_last + $ads_last;
        if ($exp_this >= $exp_last) {  // EXPENSE(PENGELUARAN)
            $expval  = $exp_this;
            $expkey  = "danger";
            $expsym  = "up";
            if ($exp_this != 0) {
                $exppcg  = ($exp_this - $exp_last) / $exp_this * 100;
            }
        } else {
            $expval  = $exp_this;
            $expkey  = "success";
            $expsym  = "down";
            if ($exp_last != 0) {
                $exppcg  = ($exp_last - $exp_this) / $exp_last * 100;
            }
        }




        $profitpcg = 0;
        $profitval_this = array_sum($tallpaymentArray) - array_sum($tallpriceBasicArray) - $consum_this - $ads_this;
        $profitval_last = array_sum($lallpaymentArray) - array_sum($lallpriceBasicArray) - $consum_last - $ads_last;
        if ($profitval_this >= $profitval_last) {  // PROFIT
            $profitval  = $profitval_this;
            $profitkey  = "success";
            $profitsym  = "up";
            if ($profitval_this != 0) {
                $profitpcg  = ($profitval_this - $profitval_last) / $profitval_this * 100;
            }
        } else {
            $profitval  = $profitval_this;
            $profitkey  = "danger";
            $profitsym  = "down";
            if ($profitval_last != 0) {
                $profitpcg  = ($profitval_last - $profitval_this) / $profitval_last * 100;
            }
        }


        $total_sales = array(
            'tkey'       => $saleskey,
            'tsym'       => $salessym,
            'tvalue'     => $salesval,
            'tpcg'       => number_format($salespcg, 0),
            // 'thisvalue'  => $salesval_this,
            // 'lastvalue'  => $salesval_last,
            'thisvalue'  => $tsalesArray,
            'lastvalue'  => $lsalesArray,

        );
        $total_order = array(
            'tkey'       => $orderkey,
            'tsym'       => $ordersym,
            'tvalue'     => $orderval,
            'tpcg'       => number_format($orderpcg, 0),
            'thisvalue'  => $orderval_this,
            'lastvalue'  => $orderval_last,
        );
        $total_consum = array(
            'tkey'       => $consumkey,
            'tsym'       => $consumsym,
            'tvalue'     => $consumval,
            'tpcg'       => number_format($consumpcg, 0),
            'thisvalue'  => $consum_this,
            'lastvalue'  => $consum_last,
        );
        $total_ads = array(
            'tkey'       => $adskey,
            'tsym'       => $adssym,
            'tvalue'     => $adsval,
            'tpcg'       => number_format($adspcg, 0),
            'thisvalue'  => $ads_this,
            'lastvalue'  => $ads_last,
        );
        $total_expense = array(
            'tkey'       => $expkey,
            'tsym'       => $expsym,
            'tvalue'     => $expval,
            'tpcg'       => number_format($exppcg, 0),
            'thisvalue'  => $exp_this,
            'lastvalue'  => $exp_last,
        );
        $total_profit = array(
            'tkey'       => $profitkey,
            'tsym'       => $profitsym,
            'tvalue'     => $profitval,
            'tpcg'       => number_format($profitpcg, 0),
            'thisvalue'  => $profitval_this,
            'lastvalue'  => $profitval_last,
        );


        // Total Sales & Order ------------------------------------------------------------------------------------------------------------------------------------------------

        return $this->response->setJSON([
            'data_series'       => $series,
            'data_report'       => $data_report,
            'data_sort'         => $title,
            'tesdate'           => $tesdate,
            'teddate'           => $teddate,
            'lesdate'           => $lesdate,
            'leddate'           => $leddate,
            'total_sales'       => $total_sales,
            'total_order'       => $total_order,
            'total_consum'      => $total_consum,
            'total_ads'         => $total_ads,
            'total_expense'     => $total_expense,
            'total_profit'      => $total_profit,
            // 'this_ADS'           => $taddsArray,
            // 'last_ADS'           => $laddsArray,
            // 'this_Consum'        => $tpricepckg,
            // 'last_Consum'        => $lpricepckg,
            'test'        => $idshop,
            'test1'        => $id_shop,
            'test2'        => $shop_group,
            'sd'    => $sd,
            'arraydate' => $arraydate,
            'range' => $range,
            'tsalesArray' => $tsalesArray,
            'lsalesArray' => $lsalesArray,
            'this_week_start_fulldate' => $this_week_start_fulldate,
            // 'tstart'           => count($this->salesModel->where('id_shop', $id_shop)->where('date_sales >=', $tesdate)->where('date_sales <=', $teddate)->havingNotIn('status', $groups)->findAll()),
            // 'tend'           => count($this->salesModel->where('id_shop', $id_shop)->where('date_sales >=', $lesdate)->where('date_sales <=', $leddate)->havingNotIn('status', $groups)->findAll()),
        ]);
    }
}
