<?php

namespace App\Controllers\AdminControlpage\Products;

use App\Controllers\BaseController;

class Products extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Products'
        );
        return view('pages_admin/adm_products', $datapage);
    }
}
