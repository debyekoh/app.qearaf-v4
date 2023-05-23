<?php

namespace App\Controllers\AdminControlpage\Finance;

use App\Controllers\BaseController;

class Ewallet extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'E-Wallet'
        );
        return view('pages_admin/adm_finance', $datapage);
    }
}
