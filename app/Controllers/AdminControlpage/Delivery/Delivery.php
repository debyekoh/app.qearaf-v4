<?php

namespace App\Controllers\AdminControlpage\Delivery;

use App\Controllers\BaseController;

class Delivery extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Delivery',
            'tabshop' => $this->tabshop,
        );
        return view('pages_admin/adm_delivery', $datapage);
    }
}
