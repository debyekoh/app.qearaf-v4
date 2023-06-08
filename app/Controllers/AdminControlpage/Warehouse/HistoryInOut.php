<?php

namespace App\Controllers\AdminControlpage\Warehouse;

use App\Controllers\BaseController;

class HistoryInOut extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'History InOut',
            'tabshop' => $this->tabshop,
        );
        return view('pages_admin/adm_warehouse', $datapage);
    }
}
