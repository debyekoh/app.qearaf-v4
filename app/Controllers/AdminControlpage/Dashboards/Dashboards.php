<?php

namespace App\Controllers\AdminControlpage\Dashboards;

use App\Controllers\BaseController;

class Dashboards extends BaseController
{
    public function index()
    {
        return view('adm_dashboard');
    }
}
