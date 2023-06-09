<?php

namespace App\Controllers\AdminControlpage\Shop\Myshop;

use App\Controllers\BaseController;

class MyShop extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'MyShop',
            'tabshop' => $this->tabshop,
        );
        return view('pages_admin/adm_dashboard', $datapage);
    }

    public function shops($id_shop)
    {
        $shop_name = $this->shopModel->asArray()->where('member_id', user()->member_id)->where('active', 1)->find($id_shop);
        if (!$shop_name) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $datapage = array(
            'titlepage' => $shop_name['marketplace'] . ' - ' . $shop_name['name_shop'],
            'tabshop' => $this->tabshop,
        );
        return view('pages_admin/adm_dashboard', $datapage);
    }
}
