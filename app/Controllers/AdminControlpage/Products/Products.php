<?php

namespace App\Controllers\AdminControlpage\Products;

use App\Controllers\BaseController;

class Products extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Products',
            'tabshop' => $this->tabshop,
        );
        return view('pages_admin/adm_products', $datapage);
    }

    public function create()
    {
        $datapage = array(
            'titlepage' => 'Create',
            'tabshop' => $this->tabshop,
        );
        return view('pages_admin/adm_products', $datapage);
    }
}
