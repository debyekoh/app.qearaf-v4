<?php

namespace App\Controllers\AdminControlpage\Products;

use App\Controllers\BaseController;

class Products extends BaseController
{
    public function index()
    {
        $datapage = array(
            'titlepage' => 'Products',
            'tabshop' => $this->tabshop,
        );
        return view('pages_admin/adm_products', $datapage);
    }

    public function create()
    {
        $head_page =
            '
            <link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

		
            ';
        $js_page =
            '
            <script src="assets/js/pages/form-fileuploads.init.js"></script>
            <script src="assets/libs/dropzone/min/dropzone.min.js"></script>
            <script src="assets/js/pages/ecommerce-choices.init.js"></script>
            
            ';
        $datapage = array(
            'titlepage' => 'Create',
            'tabshop' => $this->tabshop,
            'head_page' => $head_page,
            'js_page' => $js_page,
        );
        return view('pages_admin/adm_products_create', $datapage);
    }
}
