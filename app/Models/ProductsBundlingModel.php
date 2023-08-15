<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsBundlingModel extends Model
{
    protected $table      = 'products_bundling';
    protected $primaryKey = 'id_bundling';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'id_pro_bundling', 'id_bundling', 'pro_id_bundling_item',
    ];
}
