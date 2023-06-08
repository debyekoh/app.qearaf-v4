<?php

namespace App\Controllers\AdminControlpage\Ecommerce\Invoice;

use App\Controllers\BaseController;

class Invoice extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Invoice',
            'tabshop' => $this->tabshop,
        );
        return view('pages_admin/adm_invoice', $datapage);
    }
}
