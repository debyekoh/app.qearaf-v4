<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsGroupModel extends Model
{
    protected $table      = 'products_group';
    protected $primaryKey = 'pro_name_group';
    protected $useTimestamps = true;
    // protected $allowedFields  = [
    //     'pro_name_category',
    // ];
}
