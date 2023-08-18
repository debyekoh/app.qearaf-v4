<?php

namespace App\Controllers\AdminControlpage\Finance;

use App\Controllers\BaseController;
use App\Models\BallanceAccount;
use App\Models\BallanceEWallet;
use App\Models\DebtAccount;
use App\Models\DebtAccountLog;
use App\Models\PurchaseModel;
use App\Models\ListNotificationModel;

class Balance extends BaseController
{
    protected $db;
    protected $builder;
    protected $ballanceAccount;
    protected $ballanceEWallet;
    protected $debtAccount;
    protected $debtAccountLog;
    protected $purchaseModel;
    protected $listNotificationModel;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->ballanceAccount = new BallanceAccount();
        $this->ballanceEWallet = new BallanceEWallet();
        $this->debtAccount = new DebtAccount();
        $this->debtAccountLog = new DebtAccountLog();
        $this->purchaseModel = new PurchaseModel();
        $this->listNotificationModel = new ListNotificationModel();
        $this->db      = \Config\Database::connect();
    }

    public function index()
    {

        $head_page =
            '
            <link href="' . base_url() . 'assets/libs/gridjs/theme/mermaid.min.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="' . base_url() . 'assets/libs/sweetalert2/sweetalert2.min.css">
	
            ';
        $js_page =
            '
            <script src="' . base_url() . 'assets/libs/gridjs/gridjs.umd.js"></script>
            <script src="' . base_url() . 'assets/js/pages/mybalancelog.init.js"></script>
            <script src="' . base_url() . 'assets/libs/sweetalert2/sweetalert2.min.js"></script>
            <script src="' . base_url() . 'assets/libs/imask/imask.min.js"></script>
            
            ';

        $datapage = array(
            'titlepage'          => 'Balance',
            'tabshop'            => $this->tabshop,
            'head_page'          => $head_page,
            'js_page'            => $js_page,
            'databalanceaccount' => $this->ballanceAccount->find(user_id()),
        );
        return view('pages_admin/adm_finance_ballance', $datapage);
    }

    public function log_show()
    {
        $this->builder = $this->db->table('balance_account_log');
        if (!in_groups('1') && !in_groups('2')) {
            $this->builder->where('balance_userid_log', user_id());
        }
        $this->builder->orderBy('created_at', 'DESC');
        $query = $this->builder->get();

        $data = array();
        $row = array();
        $no = 0;

        foreach ($query->getResult() as $i) {
            if ($i->log_code == "IN-FEWAL") {
                $idshop = substr($i->log_description, 14);
                $shopname = $this->shopModel->find($idshop)['name_shop'] . " " . $this->shopModel->find($idshop)['marketplace'];
                $log_transaction = $shopname;
            };
            if ($i->log_code == "OP-BALA") {
                $log_transaction = substr($i->log_description, 9);
            };
            if ($i->log_code == "OUT-PAYDEBT") {
                $log_transaction = substr($i->log_description, 12);
            };

            $row = [
                "no"                => $no++,
                "log_code"          => $i->log_code,
                "log_transaction"   => $log_transaction,
                "link"              => $i->link,
                'last_value'        => number_format($i->last_value, 0, ",", ".") . ",-",
                'trans_value'       => number_format($i->trans_value, 0, ",", ".") . ",-",
                'new_value'         => number_format($i->new_value, 0, ",", ".") . ",-",
                'date'              => $i->created_at
            ];
            $data[] = $row;
        }

        // dd($data);
        return $this->response->setJSON([
            'results' => $data,
        ]);
    }

    public function paymentTOP()
    {
        $nopurchase     = base64_decode(base64_decode(base64_decode($this->request->getVar('np'))));
        $valpayment     = base64_decode(base64_decode($this->request->getVar('vl')));
        $billvalue      = base64_decode(base64_decode($this->request->getVar('bv')));
        $currentbalance = $this->ballanceAccount->find(user_id())['value_account'];
        $newbalance        = $currentbalance - $valpayment;
        $currentdebt    = $this->debtAccount->find(user_id())['value_debt'];
        $newdebt        = $currentdebt - $valpayment;

        if ($currentbalance >= $valpayment) {
            if ($valpayment == $billvalue) {
                if ($this->purchaseModel->find($nopurchase) == null) {
                    throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
                } else {
                    $datapayment = array(
                        'no_purchase'           => $nopurchase,
                        'payment'               => $valpayment,
                        'status'                => "Lunas",
                    );
                    $dataLogTransDebt = array(
                        'balance_userid_log'        => user_id(),   // for "balance_account_log"
                        // 'ewallet_shopid_log'        => $id_shop,    // for "balance_ewallet_log"
                        'debt_userid_log'           => user_id(),        // for "debt_account_log"
                        'log_key'                   => date("ymd") . "/OUT/" . sprintf("%04d", count($this->ballanceAccountLog->like('log_key', date("ymd") . "/OUT/")->findAll()) + 1),
                        'log_code'                  => "OUT-PAYDEBT",
                        'log_description'           => "Payment Debt " . $nopurchase,
                        'link'                      => "detail/purchaseview/" . substr($nopurchase, 0, 6) .  substr($nopurchase, 7, 1) .  substr($nopurchase, 9, 2) .  substr($nopurchase, 12),
                        'last_value'                => $currentdebt,
                        'trans_value'               => $valpayment,
                        'new_value'                 => $newdebt,
                    );

                    $dataLogTransBalance = array(
                        'balance_userid_log'        => user_id(),   // for "balance_account_log"
                        // 'ewallet_shopid_log'        => $id_shop,    // for "balance_ewallet_log"
                        'debt_userid_log'           => user_id(),        // for "debt_account_log"
                        'log_key'                   => date("ymd") . "/OUT/" . sprintf("%04d", count($this->ballanceAccountLog->like('log_key', date("ymd") . "/OUT/")->findAll()) + 1),
                        'log_code'                  => "OUT-PAYDEBT",
                        'log_description'           => "Payment Debt " . $nopurchase,
                        'link'                      => "detail/purchaseview/" . substr($nopurchase, 0, 6) .  substr($nopurchase, 7, 1) .  substr($nopurchase, 9, 2) .  substr($nopurchase, 12),
                        'last_value'                => $currentbalance,
                        'trans_value'               => $valpayment,
                        'new_value'                 => $newbalance,
                    );

                    $names = ['SuAdmin', 'Admin'];
                    $this->builder = $this->db->table('auth_groups_users');
                    $this->builder->select('member_id, fullname');
                    $this->builder->join('auth_groups', 'auth_groups.id= auth_groups_users.group_id');
                    $this->builder->join('users', 'users.id= auth_groups_users.user_id');
                    $this->builder->orWhereIn('name', $names);
                    $targetgroup = $this->builder->get();
                    $title_notif = "Payment #" . $nopurchase;
                    $notification = "Paid Off";
                    $key_sales = substr($nopurchase, 0, 6) .  substr($nopurchase, 7, 1) .  substr($nopurchase, 9, 2) .  substr($nopurchase, 12);
                    for ($a = 0; $a < $targetgroup->getNumRows(); $a++) {
                        $dataNotification[] = array(
                            'path_notif'            => "detail/purchaseview/" . $key_sales,
                            'type_notif'            => "Payment Debt",
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

                    $this->db->transBegin();
                    $this->purchaseModel->update(['no_purchase' => $nopurchase], $datapayment);
                    $this->debtAccount->update(['debt_userid' => user_id()], ['value_debt' => $newdebt]);
                    $this->debtAccountLog->insert($dataLogTransDebt);
                    $this->ballanceAccount->update(['balance_userid' => user_id()], ['value_account' => $newbalance]);
                    $this->ballanceAccountLog->insert($dataLogTransBalance);
                    $this->listNotificationModel->insertBatch($dataNotification);

                    if ($this->db->transStatus() === false) {
                        $this->db->transRollback();
                        return $this->response->setJSON([
                            'status'        => "Error",
                            'message'       => "Database NotFound",
                        ]);
                    } else {
                        $this->db->transCommit();
                        return $this->response->setJSON([
                            'status'  => "Success",
                        ]);
                    }
                }
            } else {
                return $this->response->setJSON([
                    'status'        => "Error",
                    'message'      => "You Payment not match the Bill..",
                ]);
            }
        } else {
            return $this->response->setJSON([
                'status'        => "Error",
                'message'      => "You have Insufficient funds in your account..",
                // 'valpayment'    => $valpayment,
                // 'balance'       => $currentbalance,
            ]);
        }
    }
}
