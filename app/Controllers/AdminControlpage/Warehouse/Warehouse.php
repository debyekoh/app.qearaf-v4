<?php

namespace App\Controllers\AdminControlpage\Warehouse;

use App\Controllers\BaseController;

class Warehouse extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Warehouse'
        );
        return view('pages_admin/adm_warehouse', $datapage);
    }
}
