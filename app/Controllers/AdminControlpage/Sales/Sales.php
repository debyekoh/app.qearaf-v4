<?php

namespace App\Controllers\AdminControlpage\Sales;

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
}
