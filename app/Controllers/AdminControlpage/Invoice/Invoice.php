<?php

namespace App\Controllers\AdminControlpage\Invoice;

use App\Controllers\BaseController;

class Invoice extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Invoice'
        );
        return view('pages_admin/adm_invoice', $datapage);
    }
}
