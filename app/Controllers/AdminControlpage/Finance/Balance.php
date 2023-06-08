<?php

namespace App\Controllers\AdminControlpage\Finance;

use App\Controllers\BaseController;

class Balance extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Balance',
            'tabshop' => $this->tabshop,
        );
        return view('pages_admin/adm_finance', $datapage);
    }
}
