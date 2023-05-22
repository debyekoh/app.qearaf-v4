<?php

namespace App\Controllers\AdminControlpage\Purchase;

use App\Controllers\BaseController;

class Purchase extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Purchase'
        );
        return view('pages_admin/adm_purchase', $datapage);
    }
}
