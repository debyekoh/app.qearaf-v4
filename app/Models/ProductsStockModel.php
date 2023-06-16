<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsStockModel extends Model
{
    protected $table      = 'products_stock';
    protected $primaryKey = 'pro_id_stock';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'pro_id_stock', 'pro_id', 'pro_current_stock', 'pro_min_stock', 'pro_max_stock',
    ];
}
