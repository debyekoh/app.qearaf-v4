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
}
