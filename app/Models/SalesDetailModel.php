<?php

namespace App\Models;

use CodeIgniter\Model;

class SalesDetailModel extends Model
{
    protected $table      = 'sales_detail';
    protected $primaryKey = 'no_sales';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'id_sales_detail', 'no_sales', 'pro_id', 'date_sales', 'pro_img', 'pro_price', 'pro_price_basic', 'pro_qty', 'status',
    ];
}
