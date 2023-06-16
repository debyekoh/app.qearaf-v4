<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'pro_id';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'pro_id', 'pro_name', 'pro_model', 'pro_part_no', 'pro_group', 'pro_category', 'pro_show',
        'pro_brand', 'pro_spec', 'pro_bundling', 'pro_description',
    ];
}
