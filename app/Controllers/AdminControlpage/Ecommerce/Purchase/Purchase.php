<?php

namespace App\Controllers\AdminControlpage\Ecommerce\Purchase;

use App\Controllers\BaseController;
use App\Models\ProductsModel;
use App\Models\ProductsStockModel;
use App\Models\ProductsPriceModel;
use App\Models\ProductsShowModel;
use App\Models\ProductsGroupModel;
use App\Models\ProductsCategoryModel;
use App\Models\ProductsImageModel;
use App\Models\PurchaseModel;
use App\Models\PurchaseDetailModel;
use App\Models\ListSupplierModel;
use App\Models\ListCategoryPurchaseModel;
use App\Models\ListNotificationModel;


class Purchase extends BaseController
{
    protected $db;
    protected $builder;
    protected $builder1;
    protected $purchaseModel;
    protected $purchaseDetailModel;
    protected $listSupplierModel;
    protected $listCategoryPurchaseModel;
    protected $productsModel;
    protected $productsstockModel;
    protected $productspriceModel;
    protected $productsshowModel;
    protected $productsgroupModel;
    protected $productscategoryModel;
    protected $productsimageModel;
    protected $listNotificationModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->purchaseModel = new PurchaseModel();
        $this->purchaseDetailModel = new PurchaseDetailModel();
        $this->listSupplierModel = new ListSupplierModel();
        $this->listCategoryPurchaseModel = new ListCategoryPurchaseModel();
        $this->productspriceModel = new ProductsPriceModel();
        $this->productsModel = new ProductsModel();
        $this->productsstockModel = new ProductsStockModel();
        $this->productsshowModel = new ProductsShowModel();
        $this->productsgroupModel = new ProductsGroupModel();
        $this->productscategoryModel = new ProductsCategoryModel();
        $this->productsimageModel = new ProductsImageModel();

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
            <script src="assets/js/pages/mypurchase.init.js"></script>
            <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
            <script src="assets/libs/imask/imask.min.js"></script>
            
            ';
        $datapage = array(
            'titlepage'     => 'Purchase',
            'tabshop'       => $this->tabshop,
            'head_page'     => $head_page,
            'js_page'       => $js_page,
            'tabpurchase'   => $this->listCategoryPurchaseModel->findAll(),
        );
        return view('pages_admin/adm_purchase', $datapage);
    }

    public function countPurchase()
    {
        $date = $this->request->getVar('date');
        $count_data = count($this->purchaseModel->where('date_purchase', $date)->orderBy('no_purchase', 'desc')->limit(1)->find());
        $last_no = isset($this->purchaseModel->where('date_purchase', $date)->orderBy('no_purchase', 'desc')->limit(1)->find()[0]['no_purchase']) ? number_format(substr($this->purchaseModel->where('date_purchase', $date)->orderBy('no_purchase', 'desc')->limit(1)->find()[0]['no_purchase'], 9, 2)) : 0;
        if ($count_data != null) {
            if ($last_no < 9) {
                $no = 1 + $last_no;
                $set_no = "0" . $no;
            } else {
                $set_no = substr($this->purchaseModel->where('date_purchase', $date)->orderBy('no_purchase', 'desc')->limit(1)->find()[0]['no_purchase'], 9, 2) + 1;
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

    public function checkNoPurchase()
    {
        $nopurchase = $this->request->getVar('nopurchase');
        if ($this->purchaseModel->where('no_purchase', $nopurchase)->findAll() != null) {
            $status = "error";
        } else {
            $status = "success";
        }

        return $this->response->setJSON([
            'status' => $status,
        ]);
    }

    public function listmarketplace()
    {
        // $nopurchase = $this->request->getVar('nopurchase');
        // if ($this->purchaseModel->where('no_purchase', $nopurchase)->findAll() != null) {
        //     $status = "error";
        // } else {
        //     $status = "success";
        // }

        $this->builder = $this->db->table('shop');
        $this->builder->where('member_id', user()->member_id);
        $this->builder->orderBy('marketplace', 'asc');
        $query = $this->builder->get();

        return $this->response->setJSON([
            'l' => $query->getResult(),
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
            'price' => $this->productspriceModel->find($pro_id)['pro_price_basic'],
        );

        return $this->response->setJSON([
            'status' => true,
            'response' => 'Success',
            // 'results' => $this->productsModel->findAll(),
            // 'results' => $query->getResult(),
            'results' => $dataselect,
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
            <script src="' . base_url() . 'assets/js/pages/form-addnewpurchase.init.js"></script>
            <script src="' . base_url() . 'assets/libs/sweetalert2/sweetalert2.min.js"></script>
            <script src="assets/libs/imask/imask.min.js"></script>

            ';

        // if (in_groups('1') == true || in_groups('2') == true) {
        //     $datashop = $this->shopModel->findAll();
        // } else {
        //     $datashop = $this->shopModel->asArray()->where('member_id', user()->member_id)->orderBy('marketplace', 'asc')->findAll();
        // }

        // $this->builder = $this->db->table('products');
        // $this->builder->select('products.pro_id as productspro_id, pro_part_no, pro_name, pro_model, pro_price_seller, pro_active, pro_current_stock , pro_min_stock , pro_max_stock');
        // $this->builder->join('products_price', 'products_price.pro_id = products.pro_id');
        // $this->builder->join('products_stock', 'products_stock.pro_id = products.pro_id');
        // $pro_group = ['Consumable'];
        // $this->builder->orWhereIn('pro_group', $pro_group);
        // $consumable = $this->builder->get();


        if (in_groups('1') == true || in_groups('2') == true) {
            $datashop = $this->shopModel->findAll();
        } else {
            $datashop = $this->shopModel->asArray()->where('member_id', user()->member_id)->orderBy('marketplace', 'asc')->findAll();
        }
        $datapage = array(
            'titlepage' => 'Add New Purchase',
            'tabshop' => $this->tabshop,
            'head_page' => $head_page,
            'js_page' => $js_page,
            'listdeliveryservices' => $this->ListDeliveryServicesModel->findAll(),
            'datashop' => $datashop,
            'datasupplier' => $this->listSupplierModel->findAll(),
            'dataconsumable' => $this->listSupplierModel->whereIn('type', ['Other', 'Consumable'])->findAll(),
            'datacategory' => $this->listCategoryPurchaseModel->findAll(),
        );
        return view('pages_admin/adm_purchase_add_new_purchase', $datapage);
    }

    public function list($params)
    {
        $this->builder = $this->db->table('products');
        $this->builder->select('products.pro_id as productspro_id, pro_part_no, pro_name, pro_model, pro_price_seller, pro_price_basic , pro_show, pro_active, pro_current_stock');
        $this->builder->join('products_price', 'products_price.pro_id = products.pro_id');
        $this->builder->join('products_stock', 'products_stock.pro_id = products.pro_id');
        if ($params == 1) {
            $key = ['Consumable'];
            $this->builder->whereNotIn('pro_group', $key);
        }
        if ($params == 2) {
            $key = ['IklanAds'];
            $this->builder->whereIn('pro_category', $key);
        }
        if ($params == 3) {
            $key0 = ['Consumable'];
            $this->builder->whereIn('pro_group', $key0);
            $key1 = ['IklanAds'];
            $this->builder->whereNotIn('pro_category', $key1);
        }
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
                "price" => $i->pro_price_basic,
                // "price" => $i->pro_price_seller,
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
            'test' => $params,
            'results' => $data,
        ]);
    }

    public function save()
    {
        $dataPurchaseDetail = array();
        $priceArray = array();
        for ($a = 0; $a < count($this->request->getVar('proid')); $a++) {
            $dataPurchaseDetail[] = array(
                'no_purchase_detail'    => strtoupper($this->request->getVar('no_purchase')) . '/' . $a,
                'no_purchase'           => strtoupper($this->request->getVar('no_purchase')),
                'date_purchase'         => $this->request->getVar('date_purchase'),
                'pro_id'                => $this->request->getVar('proid')[$a],
                'pro_img'               => $this->request->getVar('proimg')[$a],
                'pro_price_basic'       => $this->productspriceModel->find($this->request->getVar('proid')[$a])['pro_price_basic'],
                'pro_price'             => $this->request->getVar('price')[$a],
                'pro_qty'               => $this->request->getVar('qty')[$a],
            );

            $priceArray[] = $this->request->getVar('price')[$a] * $this->request->getVar('qty')[$a];
        }

        if ($this->request->getVar('paymethod') == 1) {                         //ONLINE PAYMENT
            $statuspurchase = "Lunas";
            $paymentvalue = $this->request->getVar('paymentval');
            $paymentvaluetrue = $this->request->getVar('paymentval');
            if ($this->request->getVar('paysource') == "ewallet") {
                //ONLINE PAYMENT -> By: E-Wallet
                $payCode = "OP-EWAL";
                $idpayCode  = $this->request->getVar('ewalletmarketplace');
                $valuelast  = intval($this->ballanceEWallet->find($idpayCode)['value_ewallet']);
                $valuetoupdate  = intval($this->ballanceEWallet->find($idpayCode)['value_ewallet']) - intval($paymentvalue);
            }
            if ($this->request->getVar('paysource') == "balanceaccount") {
                //ONLINE PAYMENT -> By: Balance Account
                $payCode    = "OP-BALA";
                $idpayCode  = user_id();
                $valuelast  = intval($this->ballanceAccount->find($idpayCode)['value_account']);
                $valuetoupdate  = intval($this->ballanceAccount->find($idpayCode)['value_account']) - intval($paymentvalue);
            }
        } else {                                                                //TERM OF PAYMENT
            $statuspurchase = "Belum Lunas";
            $paymentvalue = 0;
            $paymentvaluetrue = $this->request->getVar('paymentval');
            $payCode = "TOP-DEB";
            $idpayCode  = user_id();
            $valuelast  = intval($this->debtAccount->find($idpayCode)['value_debt']);
            $valuetoupdate  = intval($this->debtAccount->find($idpayCode)['value_debt']) + intval($paymentvaluetrue);
        }

        $dataLogTrans = array(
            'balance_userid_log'        => $idpayCode,   // for "balance_account_log"
            'ewallet_shopid_log'        => $idpayCode,   // for "balance_ewallet_log"
            'debt_userid_log'           => $idpayCode,   // for "debt_account_log"
            'log_key'                   => strtoupper($this->request->getVar('no_purchase')),
            'log_code'                  => $payCode,
            'log_description'           => "Purchase " . strtoupper($this->request->getVar('no_purchase')),
            'link'                      => "detail/purchaseview/" . substr(strtoupper($this->request->getVar('no_purchase')), 0, 6) .  substr(strtoupper($this->request->getVar('no_purchase')), 7, 1) .  substr(strtoupper($this->request->getVar('no_purchase')), 9, 2) .  substr(strtoupper($this->request->getVar('no_purchase')), 12),
            'last_value'                => $valuelast,
            'trans_value'               => $paymentvaluetrue,
            'new_value'                 => $valuetoupdate,
        );

        // $paymethod = $this->request->getVar('paysource');
        // $paysource = $this->request->getVar('paysource');
        // $payval = $this->request->getVar('paymentval');

        $dataPurchase = array(
            // 'id_purchase'           => strtoupper($this->request->getVar('id_purchase')),
            'no_purchase'           => strtoupper($this->request->getVar('no_purchase')),
            'purch_category'        => $this->request->getVar('purch_category'),
            'supplier_id'           => $this->request->getVar('supplier'),
            'date_purchase'         => $this->request->getVar('date_purchase'),
            // 'id_shop'               => $this->request->getVar('shop'),
            // 'deliveryservices'      => $this->request->getVar('deliveryservices'),
            'supplier'              => $this->request->getVar('supplier'),
            // 'resi'                  => strtoupper($this->request->getVar('no_resi')),
            'note'                  => $this->request->getVar('notes'),
            // 'packaging'             => $this->request->getVar('packagingmethod'),
            // 'packaging_charge'      => $this->request->getVar('pckgval'),
            'bill'                  => array_sum($priceArray),
            'payment'               => $paymentvalue,
            'paymethod'             => $this->request->getVar('paymethod'),
            'status'                => $statuspurchase,
        );

        // $id_shop = strtoupper($this->request->getVar('no_purchase'));
        $purchcategory = $this->request->getVar('purch_category');
        $supplierid = $this->request->getVar('supplier');
        $purchcategoryname = $this->listCategoryPurchaseModel->find($purchcategory)['category_name'];
        if ($purchcategory == 2) {
            $suppliername = $this->shopModel->find($supplierid)['name_shop'] . " " . $this->shopModel->find($supplierid)['marketplace'];
        } else {
            $suppliername = $this->listSupplierModel->where('id', $supplierid)->find()[0]['name_supplier'];
        }
        // dd($purchcategory, $supplierid, $suppliername);
        $names = ['SuAdmin', 'Admin'];
        $this->builder = $this->db->table('auth_groups_users');
        $this->builder->select('member_id, fullname');
        $this->builder->join('auth_groups', 'auth_groups.id= auth_groups_users.group_id');
        $this->builder->join('users', 'users.id= auth_groups_users.user_id');
        // $this->builder->Where('member_id', $member_id_ownershop);
        $this->builder->orWhereIn('name', $names);
        $targetgroup = $this->builder->get();
        $title_notif = strtoupper($this->request->getVar('no_purchase'));
        $notification = "from " . $suppliername;
        // $id_sales = strtoupper($this->request->getVar('id_sales'));
        $key_sales = substr($title_notif, 0, 6) .  substr($title_notif, 7, 1) .  substr($title_notif, 9, 2) .  substr($title_notif, 12);
        // $dataNotification = array();
        for ($a = 0; $a < $targetgroup->getNumRows(); $a++) {
            $dataNotification[] = array(
                'path_notif'            => "detail/purchaseview/" . $key_sales,
                'type_notif'            => "Purchase " . $purchcategoryname,
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




        // dd($this->request->getVar(), $dataPurchaseDetail, $dataPurchase, $dataNotification, $purchcategoryname, $paymentvalue,  $idpayCode, $valuetoupdate, $dataLogTrans);

        $this->db->transBegin();
        $this->purchaseModel->insert($dataPurchase);
        $this->purchaseDetailModel->insertBatch($dataPurchaseDetail);

        if ($payCode == "OP-EWAL") {            //ONLINE PAYMENT -> By: E-Wallet
            $this->ballanceEWallet->update(['ewallet_shopid' => $idpayCode], ['value_ewallet' => $valuetoupdate]);
            $this->ballanceEWalletLog->insert($dataLogTrans);
        } else if ($payCode == "OP-BALA") {     //ONLINE PAYMENT -> By: Balance Account
            $this->ballanceAccount->update(['balance_userid' => $idpayCode], ['value_account' => $valuetoupdate]);
            $this->ballanceAccountLog->insert($dataLogTrans);
        } else if ($payCode == "TOP-DEB") {     //TERM OFPAYMENT -> By: Debt
            $this->debtAccount->update(['debt_userid' => $idpayCode], ['value_debt' => $valuetoupdate]);
            $this->debtAccountLog->insert($dataLogTrans);
        } else {
            $this->db->transRollback();
        }

        $this->listNotificationModel->insertBatch($dataNotification);

        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
            $msg = strtoupper($this->request->getVar('no_purchase')) . ' Gagal di Tambahkan';
            session()->setFlashdata('error', $msg);
            return redirect()->to('/purchase');
        } else {
            $this->db->transCommit();
            $msg = strtoupper($this->request->getVar('no_purchase')) . ' Berhasil di Tambahkan';
            session()->setFlashdata('success', $msg);
            return redirect()->to('/purchase');
        }

        // $this->purchaseModel->insert($dataPurchase);
        // $this->purchaseDetailModel->insertBatch($dataPurchaseDetail);
        // // $this->setNotif();
        // $this->listNotificationModel->insertBatch($dataNotification);
        // if ($this->purchaseModel->db->affectedRows() > 0 && $this->purchaseDetailModel->db->affectedRows() > 0) {
        //     $msg = strtoupper($this->request->getVar('no_purchase')) . ' Berhasil di Tambahkan';
        //     session()->setFlashdata('success', $msg);
        //     return redirect()->to('/purchase');
        // }
    }

    public function detailview($nopurchase)
    {
        $no_purchase = substr($nopurchase, 0, 6) . "/" . substr($nopurchase, 6, 1) . "/" . substr($nopurchase, 7, 2) . "/" . substr($nopurchase, 9);
        if ($this->purchaseModel->find($no_purchase) == null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            // $no_sales = $this->salesModel->find($id_sales)['no_sales'];
            $purchcategory = $this->purchaseModel->find($no_purchase)['purch_category'];
            $this->builder = $this->db->table('purchase');
            if ($purchcategory == 2) {
                $this->builder->join('shop', 'shop.id_shop= purchase.supplier_id');
            } else {
                $this->builder->join('list_supplier', 'list_supplier.id= purchase.supplier_id');
            }

            // $this->builder->join('list_delivery_services', 'list_delivery_services.id = sales.deliveryservices');
            // $this->builder->join('list_pay_methode', 'list_pay_methode.id= sales.paymethod');
            // $this->builder->join('list_packaging', 'list_packaging.id_packaging= sales.packaging');
            // // $this->builder->like('member_id', user()->member_id);
            // // $this->builder->orderBy('date_sales', 'DESC');
            // // $this->builder->orderBy('id_sales', 'DESC');
            $query = $this->builder->getWhere(['no_purchase' => $no_purchase]);

            $this->builder1 = $this->db->table('purchase_detail');
            $this->builder1->join('products', 'products.pro_id= purchase_detail.pro_id');
            $query1 = $this->builder1->getWhere(['no_purchase' => $no_purchase]);

            // $info_sales = $this->salesModel->find($id_sales);
            // $data_sales_detail = $this->salesdetailModel->where('no_sales', $no_sales)->findAll();
            $data_detail = array(
                'test'           => $this->purchaseModel->find($no_purchase)['purch_category'],                // 'INFO PURCHASE' 
                'ifp'           => $query->getRow(),               // 'INFO PURCHASE' 
                'dpl'           => $query1->getResult(),         // 'DETAIL PURCHASE'
            );

            // dd($data_detail);

            $datapage = array(
                'titlepage' => 'Detail Purchase #' . $no_purchase,
                'tabshop' => $this->tabshop,
                'datadetail' => $data_detail,
            );
            return view('pages_admin/adm_purchase_detailview', $datapage);
        }




        // $datapage = array(
        //     'titlepage' => 'Purchase',
        //     'tabshop' => $this->tabshop,
        // );
        // // return view('pages_admin/adm_purchase', $datapage);
        // return view('pages_admin/adm_purchase_detailview', $datapage);
    }

    public function show($tab = null, $find = null)
    {

        $this->builder = $this->db->table('purchase');
        if ($tab == "All") {
        } else {
            $this->builder->join('list_category_purchase', 'list_category_purchase.id = purchase.purch_category');
            if ($tab == "ADSIklan") {
                $this->builder->like('category_name', 'Iklan');
            } else {
                $this->builder->like('category_name', $tab);
            }
        }
        $query = $this->builder->get();

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
            $dataProductDetail = array();
            $purchaseArray = array();
            for ($a = 0; $a < count($this->purchaseDetailModel->where('no_purchase', $i->no_purchase)->orderBy('no_purchase_detail', 'asc')->findAll()); $a++) {
                $pro_id = $this->purchaseDetailModel->where('no_purchase', $i->no_purchase)->orderBy('no_purchase_detail', 'asc')->findAll()[$a]['pro_id'];
                $dataProductDetail[] = array(
                    'pro_id'        => $pro_id,
                    'pro_name'      => $this->productsModel->find($pro_id)['pro_name'] . ' ' . $this->productsModel->find($pro_id)['pro_model'],
                    'pro_sku'       => $this->productsModel->find($pro_id)['pro_part_no'],
                    'pro_img'       => $this->purchaseDetailModel->where('no_purchase', $i->no_purchase)->orderBy('no_purchase_detail', 'asc')->findAll()[$a]['pro_img'],
                    'pro_price'     => $this->purchaseDetailModel->where('no_purchase', $i->no_purchase)->orderBy('no_purchase_detail', 'asc')->findAll()[$a]['pro_price'],
                    'pro_qty'       => $this->purchaseDetailModel->where('no_purchase', $i->no_purchase)->orderBy('no_purchase_detail', 'asc')->findAll()[$a]['pro_qty'],
                );
                $purchaseArray[] = $this->purchaseDetailModel->where('no_purchase', $i->no_purchase)->orderBy('no_purchase_detail', 'asc')->findAll()[$a]['pro_price'];
            }


            if ($this->listSupplierModel->find($i->supplier_id) != null) {
                $suppliername = $this->listSupplierModel->find($i->supplier_id)['name_supplier'];
            } else {
                $suppliername = $this->shopModel->find($i->supplier_id)['name_shop'] . " " . $this->shopModel->find($i->supplier_id)['marketplace'];
            }

            $row = [
                "no" => $no++,
                // "shop_detail"       => $shop_detail,
                "supplier_detail"       => $suppliername,
                "item_detail"       => $dataProductDetail,
                "item_count"        => count($this->purchaseDetailModel->where('no_purchase', $i->no_purchase)->findAll()),
                "no_purchase"       => $i->no_purchase,
                "id_sales_noslash"  => str_replace('/', '', $i->no_purchase),
                "bill"              => "Rp " . number_format($i->bill, 0, ',', '.'),
                "payment"           => "Rp " . number_format($i->payment, 0, ',', '.'),
                "paymethode"        => $i->paymethod,
                "statuspurchase"       => ucwords($i->status),
                "editable"          => $editable,
                "deletable"         => $deletable,
                // "no_sales"          => $i->no_purchase,
                // "date_purchase"        => $i->date_purchase,
                // "delivery_services" => "picture-img.png",
                // "no_resi"           => "RESI",
                // "packaging"         => "PACKAGING",
                // "nextstatus"        => $next_status,
                // "nextstatus"        => "AA",
            ];
            $data[] = $row;
        }
        // dd($data, $query->getResult(), $this->listCategoryPurchaseModel->like('category_name', "ads")->find());

        return $this->response->setJSON([
            'status' => true,
            'response' => 'Success show data',
            // 'results' => $this->productsModel->findAll(),
            // 'results' => $query->getResult(),
            'results' => $data,
        ]);
    }

    public function detail()
    {
        $no_purchase = $this->request->getVar('id');
        if ($this->purchaseModel->find($no_purchase) == null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        } else {
            // $no_sales = $this->salesModel->find($id_sales)['no_sales'];
            $purchcategory = $this->purchaseModel->find($no_purchase)['purch_category'];
            $this->builder = $this->db->table('purchase');
            if ($purchcategory == 2) {
                $this->builder->join('shop', 'shop.id_shop= purchase.supplier_id');
            } else {
                $this->builder->join('list_supplier', 'list_supplier.id= purchase.supplier_id');
            }

            // $this->builder->join('list_delivery_services', 'list_delivery_services.id = sales.deliveryservices');
            // $this->builder->join('list_pay_methode', 'list_pay_methode.id= sales.paymethod');
            // $this->builder->join('list_packaging', 'list_packaging.id_packaging= sales.packaging');
            // // $this->builder->like('member_id', user()->member_id);
            // // $this->builder->orderBy('date_sales', 'DESC');
            // // $this->builder->orderBy('id_sales', 'DESC');
            $query = $this->builder->getWhere(['no_purchase' => $no_purchase]);

            $this->builder1 = $this->db->table('purchase_detail');
            $this->builder1->join('products', 'products.pro_id= purchase_detail.pro_id');
            $query1 = $this->builder1->getWhere(['no_purchase' => $no_purchase]);

            // $info_sales = $this->salesModel->find($id_sales);
            // $data_sales_detail = $this->salesdetailModel->where('no_sales', $no_sales)->findAll();
            $data_detail = array(
                'test'           => $this->purchaseModel->find($no_purchase)['purch_category'],                // 'INFO PURCHASE' 
                'ifp'           => $query->getRow(),               // 'INFO PURCHASE' 
                'dpl'           => $query1->getResult(),         // 'DETAIL PURCHASE'
            );

            // dd($data_detail);
            return $this->response->setJSON([
                'status' => 'success',
                'detail' => $data_detail
            ]);

            // $datapage = array(
            //     'titlepage' => 'Detail Purchase #' . $no_purchase,
            //     'tabshop' => $this->tabshop,
            //     'datadetail' => $data_detail,
            // );
            // return view('pages_admin/adm_purchase_detailview', $datapage);
        }
    }

    // public function detail()
    // {
    //     $no_purchase = $this->request->getVar('id');
    //     // $no_sales = $this->purchaseModel->find($id_sales)['no_purchase'];
    //     $this->builder = $this->db->table('sales');
    //     $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
    //     $this->builder->join('list_delivery_services', 'list_delivery_services.id = sales.deliveryservices');
    //     $this->builder->join('list_pay_methode', 'list_pay_methode.id= sales.paymethod');
    //     // $this->builder->like('member_id', user()->member_id);
    //     // $this->builder->orderBy('date_sales', 'DESC');
    //     // $this->builder->orderBy('id_sales', 'DESC');
    //     $query = $this->builder->getWhere(['id_sales' => $id_sales]);

    //     $this->builder1 = $this->db->table('sales_detail');
    //     $this->builder1->join('products', 'products.pro_id= sales_detail.pro_id');
    //     $query1 = $this->builder1->getWhere(['no_sales' => $no_sales]);

    //     // $info_sales = $this->salesModel->find($id_sales);
    //     $data_sales_detail = $this->salesdetailModel->where('no_sales', $no_sales)->findAll();
    //     $data_detail = array(
    //         // 'test'           => $query1->getResult(),                // 'INFO SALES' 
    //         'ifs'           => $query->getRow(),                // 'INFO SALES' 
    //         'dsl'           => $query1->getResult(),         // 'DETAIL SALES'
    //     );

    //     return $this->response->setJSON([
    //         'status' => 'success',
    //         'detail' => $data_detail
    //     ]);
    // }
}
