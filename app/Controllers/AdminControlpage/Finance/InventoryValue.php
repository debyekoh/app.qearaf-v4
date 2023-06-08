<?php

namespace App\Controllers\AdminControlpage\Finance;

use App\Controllers\BaseController;

class InventoryValue extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Inventory Value',
            'tabshop' => $this->tabshop,
        );
        return view('pages_admin/adm_finance', $datapage);
    }
}
