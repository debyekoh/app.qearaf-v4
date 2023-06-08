<?php

namespace App\Controllers\AdminControlpage\Finance;

use App\Controllers\BaseController;

class IncomeProfit extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Income & Profit',
            'tabshop' => $this->tabshop,
        );
        return view('pages_admin/adm_finance', $datapage);
    }
}
