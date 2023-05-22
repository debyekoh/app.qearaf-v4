<?php

namespace App\Controllers\AdminControlpage\Finance;

use App\Controllers\BaseController;

class Finance extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Finance'
        );
        return view('pages_admin/adm_finance', $datapage);
    }
}
