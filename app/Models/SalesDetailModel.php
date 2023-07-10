<?php

namespace App\Models;

use CodeIgniter\Model;

class SalesDetailModel extends Model
{
    protected $table      = 'sales_detail';
    protected $primaryKey = 'id_sales_detail';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'id_sales_detail', 'no_sales', 'pro_id', 'pro_price', 'pro_qty', 'status',
    ];
}
