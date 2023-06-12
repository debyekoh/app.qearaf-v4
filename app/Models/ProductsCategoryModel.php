<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsCategoryModel extends Model
{
    protected $table      = 'products_category';
    protected $primaryKey = 'pro_name_category';
    protected $useTimestamps = true;
    // protected $allowedFields  = [
    //     'pro_name_category',
    // ];
}
