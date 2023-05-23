<?php

namespace App\Controllers\AdminControlpage\Ecommerce\Sales;

use App\Controllers\BaseController;

class Sales extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Sales'
        );
        return view('pages_admin/adm_sales', $datapage);
    }

    public function create()
    {
        $datapage = array(
            'titlepage' => 'Add New Sales'
        );
        return view('pages_admin/adm_sales', $datapage);
    }
}
