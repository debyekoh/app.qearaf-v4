<?php

namespace App\Controllers\AdminControlpage\Dashboards;

use App\Controllers\BaseController;

class Dashboards extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Dashboards',
            'tabshop' => $this->tabshop,
            // 'datashop' => $this->shopModel->findAll(),

        );
        return view('pages_admin/adm_dashboard', $datapage);
    }
}
