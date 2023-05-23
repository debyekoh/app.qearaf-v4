<?php

namespace App\Controllers\AdminControlpage\Finance;

use App\Controllers\BaseController;

class SummaryFinance extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Summary Finance'
        );
        return view('pages_admin/adm_finance', $datapage);
    }
}
