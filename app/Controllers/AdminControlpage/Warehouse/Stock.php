<?php

namespace App\Controllers\AdminControlpage\Warehouse;

use App\Controllers\BaseController;

class Stock extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Stock',
            'tabshop' => $this->tabshop,
        );
        return view('pages_admin/adm_warehouse', $datapage);
    }
}
