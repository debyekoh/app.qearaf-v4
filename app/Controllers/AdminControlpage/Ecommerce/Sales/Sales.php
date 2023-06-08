<?php

namespace App\Controllers\AdminControlpage\Ecommerce\Sales;

use App\Controllers\BaseController;

class Sales extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Sales',
            'tabshop' => $this->tabshop,
        );
        return view('pages_admin/adm_sales', $datapage);
    }

    public function create()
    {
        $datapage = array(
            'titlepage' => 'Add New Sales',
            'tabshop' => $this->tabshop,
        );
        return view('pages_admin/adm_sales', $datapage);
    }
}
