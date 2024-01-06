<?php

namespace App\Controllers\AdminControlpage\Dashboards;

use App\Controllers\BaseController;
use App\Models\SalesModel;
use App\Models\ListNotificationModel;

class Dashboards extends BaseController
{
    protected $db;
    protected $builder;
    protected $salesModel;
    protected $listNotificationModel;
    // protected $client;
    // protected $posts_data;
    // protected $urlHost;
    // protected $partnerId;
    // protected $partnerKey;
    // protected $code;
    // protected $shop_id;
    // protected $access_token;
    // protected $refresh_token;
    // {"refresh_token":"794b44516c44585357436b6c687a504e",
    // "access_token":"557a485641465342694962674b565966",
    // "expire_in":14311,"request_id":"99118c0d4f55691efa739cec0e032520","error":"","message":""}
    public function __construct()
    {
        helper(['form', 'url', 'array']);
        $this->salesModel = new SalesModel();
        $this->listNotificationModel = new ListNotificationModel();
        $this->db      = \Config\Database::connect();
        // $this->urlHost = "https://partner.test-stable.shopeemobile.com";
        // $this->partnerId = 1056329;
        // $this->partnerKey = "675359486f4f6c6c556e687763446b527179724474447877767649714659435a";
        // $this->code = "59626c4b634941455a6f487168555055";
        // $this->shop_id = 89782;
        // $this->access_token = "557a485641465342694962674b565966";
        // $this->refresh_token = "794b44516c44585357436b6c687a504e";
    }
    public function index()
    {
        $head_page =
            '
            <link href="' . base_url() . 'assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />
            ';
        $js_page =
            '
            <script src="' . base_url() . 'assets/libs/apexcharts/apexcharts.min.js"></script>
            <script src="' . base_url() . 'assets/js/pages/shop.init.js"></script>
            
            <!-- Include Required Prerequisites -->
            <script src="' . base_url() . 'assets/libs/jquery/jquery-1.10.0.js"></script>
            <script src="' . base_url() . 'assets/libs/moment/min/moment.min.js"></script>
            
            <!-- Include Date Range Picker -->
            <script type="text/javascript" src="' . base_url() . 'assets/libs/daterangepicker/daterangepicker.js"></script>
            <link rel="stylesheet" type="text/css" href="' . base_url() . 'assets/libs/daterangepicker/daterangepicker.css" />
            
            ';

        $countitem = array(
            'Process'       => count($this->salesModel->where('status', "Process")->findAll()),
            'Packaging'     => count($this->salesModel->where('status', "Packaging")->findAll()),
            'Ready'         => count($this->salesModel->where('status', "Ready")->findAll()),
            'Delivery'      => count($this->salesModel->where('status', "Delivery")->findAll()),
            'Received'      => count($this->salesModel->where('status', "Received")->findAll()),
            'Completed'     => count($this->salesModel->where('status', "Completed")->findAll()),
            'Return'        => count($this->salesModel->where('status', "Return")->findAll()),
            'Cancel'        => count($this->salesModel->where('status', "Cancel")->findAll()),
        );

        // $this->builder = $this->db->table('sales');
        // $this->builder->join('shop', 'shop.id_shop= sales.id_shop');
        // if (in_groups('3') == true || in_groups('4') == true) {
        //     $this->builder->like('member_id', user()->member_id);
        // }
        // $QueryAll = $this->builder->get();


        if (in_groups('1') == true || in_groups('2') == true) {
            $datapage = array(
                'titlepage' => "Dashboard",
                'tabshop'   => $this->tabshop,
                'shop'      => base64_encode(base64_encode("dashboards")),
                'item'      => $countitem,
                // 'head_page' => $head_page,
                'js_page'   => $js_page,
                // 'topseller'      => $this->getTopSeller(),
            );
            return view('pages_admin/adm_dashboard', $datapage);
        } else {
            $datapage = array(
                'titlepage' => "Dashboard",
                'tabshop'   => $this->tabshop,
                // 'item'      => $countitem,
            );
            return view('pages_admin/adm_blankpage', $datapage);
        }
    }


    public function getTopSeller()
    {
        $totalSales = "SELECT sales_detail.pro_id AS salesproid,pro_name,pro_model,pro_part_no,pro_image_name,pro_price_seller, sum(pro_qty) as total_qty 
                    FROM sales_detail 
                    JOIN products ON products.pro_id=sales_detail.pro_id
                    JOIN products_price ON products_price.pro_id=sales_detail.pro_id
                    JOIN products_image ON products_image.pro_id=sales_detail.pro_id
                    GROUP BY salesproid 
                    ORDER BY total_qty DESC
                    LIMIT 10";
        $this->builder = $this->db->query($totalSales);
        $result = $this->builder;
        return $result->getResult();
    }






    // public function shopinfo()
    // {
    //     function shopinformation($partnerId, $partnerKey, $access_token,  $shopId)
    //     {
    //         $host = "https://partner.test-stable.shopeemobile.com";
    //         $path = "/api/v2/shop/get_shop_info";

    //         $timest = time();
    //         // $body = array("partner_id" => $partnerId,  "shop_id" => $shopId, "partner_id" => $partnerId);
    //         // $body = array("token" => $token,  "shop_id" => $shopId, "partner_id" => $partnerId);
    //         // partner_id, api path, timestamp, access_token, shop_id and partner_key
    //         $baseString = sprintf("%s%s%s%s%s", $partnerId, $path, $timest, $access_token, $shopId);
    //         // print_r($baseString);
    //         // print_r("<br>");
    //         $sign = hash_hmac('sha256', $baseString, $partnerKey);
    //         print_r($sign);
    //         print_r("<br>");
    //         $url = sprintf("%s%s?access_token=%s&partner_id=%s&timestamp=%s&sign=%s", $host, $path, $access_token, $partnerId, $timest, $sign);
    //         echo $url;
    //         print_r("<br>");
    //         // Shop API: partner_id, api path, timestamp, access_token, shop_id
    //         // print_r('https://partner.test-stable.shopeemobile.com/api/v2/shop/get_shop_info?access_token=access_token&partner_id=partner_id&shop_id=shop_id&sign=sign&timestamp=timestamp');

    //         $curl = curl_init();

    //         curl_setopt_array($curl, array(
    //             CURLOPT_URL => $url,
    //             CURLOPT_RETURNTRANSFER => true,
    //             CURLOPT_ENCODING => '',
    //             CURLOPT_MAXREDIRS => 10,
    //             CURLOPT_TIMEOUT => 0,
    //             CURLOPT_FOLLOWLOCATION => true,
    //             CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //             CURLOPT_CUSTOMREQUEST => 'GET',
    //             CURLOPT_HTTPHEADER => array(
    //                 'Content-Type: application/json'
    //             ),
    //         ));

    //         $response = curl_exec($curl);

    //         curl_close($curl);
    //         echo $response;
    //     }

    //     $host = "https://partner.shopeemobile.com";

    //     $partnerId = $this->partnerId;
    //     $partnerKey = $this->partnerKey;
    //     $access_token = $this->access_token;
    //     $shopId = $this->shop_id;
    //     print_r(shopinformation($partnerId, $partnerKey, $access_token,  $shopId));
    // }

    // public function token_apishopee()
    // {
    //     function getTokenShopLevel($code, $partnerId, $partnerKey, $shopId)
    //     {
    //         $host = "https://partner.test-stable.shopeemobile.com";
    //         $path = "/api/v2/auth/token/get";

    //         $timest = time();
    //         $body = array("code" => $code,  "shop_id" => $shopId, "partner_id" => $partnerId);
    //         $baseString = sprintf("%s%s%s", $partnerId, $path, $timest);
    //         $sign = hash_hmac('sha256', $baseString, $partnerKey);
    //         $url = sprintf("%s%s?partner_id=%s&timestamp=%s&sign=%s", $host, $path, $partnerId, $timest, $sign);


    //         $c = curl_init($url);
    //         curl_setopt($c, CURLOPT_POST, 1);
    //         curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($body));
    //         curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    //         curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    //         $resp = curl_exec($c);
    //         echo "raw result: $resp";

    //         $ret = json_decode($resp, true);
    //         $accessToken = $ret["access_token"];
    //         $newRefreshToken = $ret["refresh_token"];
    //         echo "\naccess_token: $accessToken, refresh_token: $newRefreshToken raw: $ret" . "\n";
    //         return $ret;
    //     }

    //     $host = "https://partner.shopeemobile.com";

    //     $partnerId = $this->partnerId;
    //     $partnerKey = $this->partnerKey;
    //     $code = $this->code;
    //     $shopId = $this->shop_id;
    //     print_r(getTokenShopLevel($code, $partnerId, $partnerKey, $shopId));
    // }

    // public function code_apishopee()
    // {

    //     // $url = "";
    //     function authShop($partnerId, $partnerKey)
    //     {
    //         $host = "https://partner.test-stable.shopeemobile.com";
    //         $path = "/api/v2/shop/auth_partner";
    //         $redirectUrl = base_url() . "dashboard";

    //         $timest = time();
    //         $baseString = sprintf("%s%s%s", $partnerId, $path, $timest);
    //         $sign = hash_hmac('sha256', $baseString, $partnerKey);
    //         $url = sprintf("%s%s?partner_id=%s&timestamp=%s&sign=%s&redirect=%s", $host, $path, $partnerId, $timest, $sign, $redirectUrl);
    //         return $url;
    //     }


    //     $partnerId = $this->partnerId;
    //     $partnerKey = $this->partnerKey;
    //     $curl = \Config\Services::curlrequest();

    //     $posts_data = $curl->request("get", authShop($partnerId, $partnerKey));

    //     // echo "<pre>";
    //     print_r(authShop($partnerId, $partnerKey));
    //     // echo "<pre>";
    //     // print_r($posts_data->getBody());
    //     // print_r($posts_data->header('location'));
    //     // print_r($posts_data->getHeaderLine('location'));
    //     $urlconfr = $posts_data->getHeaderLine('location');
    //     // echo "<pre>";
    //     // print_r($urlconfr);
    //     // // print_r($posts_data);
    //     // echo "<pre>";
    //     // echo "<pre>";
    //     // // print_r('https: //open.test-stable.shopee.com/authorize?auth_shop=true&id=1056329&random=4ed064eb43ca24cf');
    //     // echo "<pre>";
    //     $host1 = "https://open.test-stable.shopee.com";
    //     $path1 = "/authorize";
    //     $auth = "true";
    //     $getrandomstring = parse_str($urlconfr, $parameters);
    //     $randomkey = $parameters['random'];
    //     $urlconfrim =  sprintf("%s%s?auth_shop=%s&id=%s&random=%s", $host1, $path1, $auth, $this->partnerId, $randomkey);
    //     // $posts_dataconfrim = $curl->request("get", $urlconfrim);
    //     // return $urlconfrim;
    //     // header("Location: http://example.com");
    //     // print_r($posts_dataconfrim);
    //     // echo "<pre>";
    //     // echo $urlconfrim;
    //     // echo $query;
    //     return redirect()->to($urlconfrim);
    //     // return redirect()->to($urlconfrim);
    //     // $curl1 = \Config\Services::curlrequest();

    //     // $posts_dataconfirm = $curl1->request("get", $urlconfrim);


    //     // print_r($posts_dataconfirm);
    //     // 7a614d666c6157704751445a58684866
    // }
}
