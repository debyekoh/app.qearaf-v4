<?php

namespace App\Controllers\AdminControlpage\Dashboards;

use App\Controllers\BaseController;

class Dashboards extends BaseController
{
    // protected $client;
    // protected $posts_data;
    protected $urlHost;
    protected $partnerId;
    protected $partnerKey;
    protected $code;
    protected $shop_id;
    public function __construct()
    {
        $this->urlHost = "https://partner.test-stable.shopeemobile.com";
        $this->partnerId = 1056329;
        $this->partnerKey = "675359486f4f6c6c556e687763446b527179724474447877767649714659435a";
        $this->code = "67497a6c77647a4a63715158456b7555";
        $this->shop_id = 89782;
    }
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Dashboards',
            'tabshop' => $this->tabshop,
            // 'datashop' => $this->shopModel->findAll(),

        );
        return view('pages_admin/adm_dashboard', $datapage);
    }

    public function shopinfo()
    {
        function shopinformation($token, $partnerId, $partnerKey, $shopId)
        {
            $host = "https://partner.test-stable.shopeemobile.com";
            $path = "/api/v2/shop/get_shop_info";

            $timest = time();
            // $body = array("token" => $token,  "shop_id" => $shopId, "partner_id" => $partnerId);
            $baseString = sprintf("%s%s%s", $partnerId, $path, $timest);
            $sign = hash_hmac('sha256', $baseString, $partnerKey);
            $url = sprintf("%s%s?access_token=%s&partner_id=%s&timestamp=%s&sign=%s", $host, $path, $token, $partnerId, $timest, $sign);
            echo $url;
            // Shop API: partner_id, api path, timestamp, access_token, shop_id
            // CURLOPT_URL => 'https://partner.test-stable.shopeemobile.com/api/v2/shop/get_shop_info?access_token=4479424942796c434b446252454f7669&partner_id=1056329&shop_id=89782&sign=sign&timestamp=timestamp',

            $c = curl_init($url);
            curl_setopt($c, CURLOPT_POST, 1);
            // curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($body));
            curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
            $resp = curl_exec($c);
            echo "raw result: $resp";

            // $ret = json_decode($resp, true);
            // $accessToken = $ret["access_token"];
            // $newRefreshToken = $ret["refresh_token"];
            // echo "\naccess_token: $accessToken, refresh_token: $newRefreshToken raw: $ret" . "\n";
            // return $ret;
        }

        $host = "https://partner.shopeemobile.com";

        $partnerId = $this->partnerId;
        $partnerKey = $this->partnerKey;
        $token = '7a614d666c6157704751445a58684866';
        $shopId = $this->shop_id;
        print_r(shopinformation($token, $partnerId, $partnerKey, $shopId));
    }

    public function token_apishopee()
    {
        function getTokenShopLevel($code, $partnerId, $partnerKey, $shopId)
        {
            $host = "https://partner.test-stable.shopeemobile.com";
            $path = "/api/v2/auth/token/get";

            $timest = time();
            $body = array("code" => $code,  "shop_id" => $shopId, "partner_id" => $partnerId);
            $baseString = sprintf("%s%s%s", $partnerId, $path, $timest);
            $sign = hash_hmac('sha256', $baseString, $partnerKey);
            $url = sprintf("%s%s?partner_id=%s&timestamp=%s&sign=%s", $host, $path, $partnerId, $timest, $sign);


            $c = curl_init($url);
            curl_setopt($c, CURLOPT_POST, 1);
            curl_setopt($c, CURLOPT_POSTFIELDS, json_encode($body));
            curl_setopt($c, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
            curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
            $resp = curl_exec($c);
            echo "raw result: $resp";

            $ret = json_decode($resp, true);
            $accessToken = $ret["access_token"];
            $newRefreshToken = $ret["refresh_token"];
            echo "\naccess_token: $accessToken, refresh_token: $newRefreshToken raw: $ret" . "\n";
            return $ret;
        }

        $host = "https://partner.shopeemobile.com";

        $partnerId = $this->partnerId;
        $partnerKey = $this->partnerKey;
        $code = $this->code;
        $shopId = $this->shop_id;
        print_r(getTokenShopLevel($code, $partnerId, $partnerKey, $shopId));
    }

    public function code_apishopee()
    {

        // $url = "";
        function authShop($partnerId, $partnerKey)
        {
            $host = "https://partner.test-stable.shopeemobile.com";
            $path = "/api/v2/shop/auth_partner";
            $redirectUrl = base_url() . "dashboard";

            $timest = time();
            $baseString = sprintf("%s%s%s", $partnerId, $path, $timest);
            $sign = hash_hmac('sha256', $baseString, $partnerKey);
            $url = sprintf("%s%s?partner_id=%s&timestamp=%s&sign=%s&redirect=%s", $host, $path, $partnerId, $timest, $sign, $redirectUrl);
            return $url;
        }


        $partnerId = $this->partnerId;
        $partnerKey = $this->partnerKey;
        $curl = \Config\Services::curlrequest();

        $posts_data = $curl->request("get", authShop($partnerId, $partnerKey));

        // echo "<pre>";
        print_r(authShop($partnerId, $partnerKey));
        // echo "<pre>";
        // print_r($posts_data->getBody());
        // print_r($posts_data->header('location'));
        // print_r($posts_data->getHeaderLine('location'));
        $urlconfr = $posts_data->getHeaderLine('location');
        // echo "<pre>";
        // print_r($urlconfr);
        // // print_r($posts_data);
        // echo "<pre>";
        // echo "<pre>";
        // // print_r('https: //open.test-stable.shopee.com/authorize?auth_shop=true&id=1056329&random=4ed064eb43ca24cf');
        // echo "<pre>";
        $host1 = "https://open.test-stable.shopee.com";
        $path1 = "/authorize";
        $auth = "true";
        $getrandomstring = parse_str($urlconfr, $parameters);
        $randomkey = $parameters['random'];
        $urlconfrim =  sprintf("%s%s?auth_shop=%s&id=%s&random=%s", $host1, $path1, $auth, $this->partnerId, $randomkey);
        // $posts_dataconfrim = $curl->request("get", $urlconfrim);
        // return $urlconfrim;
        // header("Location: http://example.com");
        // print_r($posts_dataconfrim);
        // echo "<pre>";
        // echo $urlconfrim;
        // echo $query;
        return redirect()->to($urlconfrim);
        // return redirect()->to($urlconfrim);
        // $curl1 = \Config\Services::curlrequest();

        // $posts_dataconfirm = $curl1->request("get", $urlconfrim);


        // print_r($posts_dataconfirm);
        // 7a614d666c6157704751445a58684866
    }
}
