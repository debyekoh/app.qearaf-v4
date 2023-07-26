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
        $datapage = array(
            'titlepage' => 'Purchase',
            'tabshop' => $this->tabshop,
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
        $this->builder->select('products.pro_id as productspro_id, pro_part_no, pro_name, pro_model, pro_price_seller, pro_show, pro_active, pro_current_stock');
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

        if ($this->request->getVar('paymethod') == 1) {
            $statuspurchase = "Lunas";
            $paymentvalue = $this->request->getVar('paymentval');
        } else {
            $statuspurchase = "Belum Lunas";
            $paymentvalue = 0;
        }

        $dataPurchase = array(
            // 'id_purchase'           => strtoupper($this->request->getVar('id_purchase')),
            'no_purchase'           => strtoupper($this->request->getVar('no_purchase')),
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

        dd($this->request->getVar(), $dataPurchaseDetail, $dataPurchase, $dataNotification, $purchcategoryname);

        $this->purchaseModel->insert($dataPurchase);
        $this->purchaseDetailModel->insertBatch($dataPurchaseDetail);
        // $this->setNotif();
        $this->listNotificationModel->insertBatch($dataNotification);
        if ($this->purchaseModel->db->affectedRows() > 0 && $this->purchaseDetailModel->db->affectedRows() > 0) {
            $msg = strtoupper($this->request->getVar('no_purchase')) . ' Berhasil di Tambahkan';
            session()->setFlashdata('success', $msg);
            return redirect()->to('/purchase');
        }
    }
}
