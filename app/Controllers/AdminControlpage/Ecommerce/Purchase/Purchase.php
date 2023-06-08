<?php

namespace App\Controllers\AdminControlpage\Ecommerce\Purchase;

use App\Controllers\BaseController;

class Purchase extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Purchase',
            'tabshop' => $this->tabshop,
        );
        return view('pages_admin/adm_purchase', $datapage);
    }

    public function create()
    {
        $datapage = array(
            'titlepage' => 'Add New Purchase',
            'tabshop' => $this->tabshop,
        );
        return view('pages_admin/adm_purchase', $datapage);
    }
}
