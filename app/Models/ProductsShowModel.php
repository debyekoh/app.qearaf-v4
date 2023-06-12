<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsShowModel extends Model
{
    protected $table      = 'products_show';
    protected $primaryKey = 'pro_id_show';
    protected $useTimestamps = true;
    // protected $allowedFields  = [
    //     'pro_name_category',
    // ];
}
