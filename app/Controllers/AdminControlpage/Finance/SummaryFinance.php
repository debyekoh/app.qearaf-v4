<?php

namespace App\Controllers\AdminControlpage\Finance;

use App\Controllers\BaseController;

class SummaryFinance extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Summary Finance',
            'tabshop' => $this->tabshop,
        );
        return view('pages_admin/adm_finance', $datapage);
    }
}
