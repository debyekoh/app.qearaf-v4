<?php

namespace App\Controllers\AdminControlpage\Ecommerce\Purchase;

use App\Models\PurchaseModel;
use App\Models\PurchaseDetailModel;
use App\Models\SupplierModel;
use App\Models\ProductsPriceModel;
use App\Models\ListNotificationModel;

use App\Controllers\BaseController;

class Purchase extends BaseController
{
    protected $db;
    protected $builder;
    protected $purchaseModel;
    protected $purchaseDetailModel;
    protected $supplierModel;
    protected $productspriceModel;
    protected $listNotificationModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->purchaseModel = new PurchaseModel();
        $this->purchaseDetailModel = new PurchaseDetailModel();
        $this->supplierModel = new SupplierModel();
        $this->productspriceModel = new ProductsPriceModel();
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

            ';

        // if (in_groups('1') == true || in_groups('2') == true) {
        //     $datashop = $this->shopModel->findAll();
        // } else {
        //     $datashop = $this->shopModel->asArray()->where('member_id', user()->member_id)->orderBy('marketplace', 'asc')->findAll();
        // }
        $datapage = array(
            'titlepage' => 'Add New Purchase',
            'tabshop' => $this->tabshop,
            'head_page' => $head_page,
            'js_page' => $js_page,
            'listdeliveryservices' => $this->ListDeliveryServicesModel->findAll(),
            // 'datashop' => $this->shopModel->asArray()->where('member_id', user()->member_id)->orderBy('marketplace', 'asc')->findAll(),
            'datasupplier' => $this->supplierModel->findAll(),
        );
        return view('pages_admin/adm_purchase_add_new_purchase', $datapage);
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
            $paymentvalue = $this->request->getVar('grtotval');
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
        $supplierid = $this->request->getVar('supplier');
        $suppliername = $this->supplierModel->where('id', $supplierid)->find()[0]['name_supplier'];
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
                'type_notif'            => "Purchase Product",
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

        // dd($this->request->getVar(), $dataPurchaseDetail, $dataPurchase, $dataNotification);

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
