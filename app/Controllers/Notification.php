<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ListNotificationModel;

class Notification extends BaseController
{
    protected $db;
    protected $builder;
    protected $notificationModel;

    public function __construct()
    {
        $this->notificationModel = new ListNotificationModel();
        $this->db      = \Config\Database::connect();
    }
    public function index()
    {
        $this->builder = $this->db->table('list_notification');
        $this->builder->where('to_member_id', user()->member_id);
        $this->builder->orderBy('created_at', 'desc');
        $this->builder->limit(6);
        $query = $this->builder->get();

        $data = array();
        $row = array();
        foreach ($query->getResult() as $i) {
            $row = [
                'id_notif'              => $i->id_notif,
                'type_notif'            => $i->type_notif,
                'path_notif'            => $i->path_notif,
                'title_notif'           => $i->title_notif,
                'to_member_id'          => $i->to_member_id,
                'to_fullname'           => $i->to_fullname,
                'to_user_image'         => $i->to_user_image,
                'from_member_id'        => $i->from_member_id,
                'from_fullname'         => $i->from_fullname,
                'from_user_image'       => $i->from_user_image,
                'notification'          => $i->notification,
                'notification_image'    => $i->notification_image,
                'read_status'           => $i->read_status,
                'created_at'            => $i->created_at,
            ];
            $data[] = $row;
        };

        // dd($data);
        // $this->builder = $this->db->table('list_notification');
        // $this->builder->where('to_member_id', user()->member_id);
        // $this->builder->where('read_status', 1);
        // $query1 = $this->builder->get();
        return $this->response->setJSON([
            'status' => true,
            'results' => $data,
            'pill'    => count($this->notificationModel->where('to_member_id', user()->member_id)->where('read_status', '1')->findAll()),
        ]);

        // $datapage = array(
        //     'titlepage' => 'Notification',
        //     'tabshop' => $this->tabshop,
        // );
        // return view('pages_admin/adm_purchase', $datapage);
    }

    public function read()
    {
        $this->builder = $this->db->table('list_notification');
        $this->builder->where('to_member_id', user()->member_id);
        if ($this->request->getVar('data') != "all") {
            $this->builder->where('id_notif', $this->request->getVar('data'));
        }
        $query = $this->builder->get();

        // $data = array();
        // $row = array();
        $id_notif = array();
        foreach ($query->getResult() as $i) {
            $id_notif[] = $i->id_notif;
        };

        $this->notificationModel->whereIn('id_notif', $id_notif)->set(['read_status' => 0])->update();

        return $this->response->setJSON([
            'status' => "Success",
            'data'   => $id_notif
        ]);
    }

    public function allnotification()
    {
        $head_page =
            '
                <!--+++ DataTables css -->
                <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
            ';
        $js_page =
            '
                <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
                <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
                <script src="assets/js/pages/allnotification.init.js"></script>
            ';

        $this->builder = $this->db->table('list_notification');
        $this->builder->where('to_member_id', user()->member_id);
        $this->builder->orderBy('created_at', 'desc');
        $this->builder->limit(6);
        $query = $this->builder->get();

        $data = array();
        $row = array();
        foreach ($query->getResult() as $i) {
            $row = [
                'id_notif'              => $i->id_notif,
                'type_notif'            => $i->type_notif,
                'path_notif'            => $i->path_notif,
                'title_notif'           => $i->title_notif,
                'to_member_id'          => $i->to_member_id,
                'to_fullname'           => $i->to_fullname,
                'to_user_image'         => $i->to_user_image,
                'from_member_id'        => $i->from_member_id,
                'from_fullname'         => $i->from_fullname,
                'from_user_image'       => $i->from_user_image,
                'notification'          => $i->notification,
                'notification_image'    => $i->notification_image,
                'read_status'           => $i->read_status,
                'created_at'            => $i->created_at,
            ];
            $data[] = $row;
        };

        $dataresult = array(
            'sales'           => $this->list('sales'),
            'purchase'        => $data,
            'product'         => $data,
            'finance'         => $data,
        );

        $datapage = array(
            'titlepage'     => 'All Notification',
            'tabshop'       => $this->tabshop,
            'result'         => $dataresult,
            'head_page'     => $head_page,
            'js_page'       => $js_page,
        );
        return view('pages_admin/adm_allnotification', $datapage);
    }

    public function list($get_list)
    {
        $this->builder = $this->db->table('list_notification');
        $this->builder->where('to_member_id', user()->member_id);
        $this->builder->orderBy('created_at', 'desc');
        // $this->builder->limit(6);
        $query = $this->builder->get();

        $data = array();
        $row = array();
        foreach ($query->getResult() as $i) {
            $row = [
                'id_notif'              => $i->id_notif,
                'type_notif'            => $i->type_notif,
                'path_notif'            => $i->path_notif,
                'title_notif'           => $i->title_notif,
                'to_member_id'          => $i->to_member_id,
                'to_fullname'           => $i->to_fullname,
                'to_user_image'         => $i->to_user_image,
                'from_member_id'        => $i->from_member_id,
                'from_fullname'         => $i->from_fullname,
                'from_user_image'       => $i->from_user_image,
                'notification'          => $i->notification,
                'notification_image'    => $i->notification_image,
                'read_status'           => $i->read_status,
                'created_at'            => $i->created_at,
            ];
            $data[] = $row;
        };

        // dd($data);
        // $this->builder = $this->db->table('list_notification');
        // $this->builder->where('to_member_id', user()->member_id);
        // $this->builder->where('read_status', 1);
        // $query1 = $this->builder->get();
        return $data;
        // return $this->response->setJSON([
        //     'status' => true,
        //     'results' => $data,
        //     'pill'    => count($this->notificationModel->where('to_member_id', user()->member_id)->where('read_status', '1')->findAll()),
        // ]);
    }
}
