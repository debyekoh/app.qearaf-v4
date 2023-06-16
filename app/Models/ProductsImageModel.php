<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsImageModel extends Model
{
    protected $table      = 'products_image';
    protected $primaryKey = 'pro_id';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'pro_id_image', 'pro_id', 'pro_image_no', 'pro_image_name',
    ];
}
