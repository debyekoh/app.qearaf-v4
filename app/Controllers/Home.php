<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Registration'
        );
        return view('auth/app_registration', $datapage);
    }
}
