<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsPriceModel extends Model
{
    protected $table      = 'products_price';
    protected $primaryKey = 'pro_id';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'pro_id_price', 'pro_id', 'pro_price_basic', 'pro_price_reseler', 'pro_price_seller',
    ];
}
