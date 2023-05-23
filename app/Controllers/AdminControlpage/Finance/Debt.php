<?php

namespace App\Controllers\AdminControlpage\Finance;

use App\Controllers\BaseController;

class Debt extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Debt'
        );
        return view('pages_admin/adm_finance', $datapage);
    }
}
