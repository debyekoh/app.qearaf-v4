<?php

namespace App\Controllers\AdminControlpage\Finance;

use App\Controllers\BaseController;

class Ewallet extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'E-Wallet',
            'tabshop' => $this->tabshop,
        );
        return view('pages_admin/adm_finance', $datapage);
    }
}
