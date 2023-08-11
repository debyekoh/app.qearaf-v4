<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsStockLogModel extends Model
{
    protected $table      = 'products_stock_log';
    protected $primaryKey = 'products_stock_log_proid';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'products_stock_log_proid', 'log_key', 'log_code', 'log_description', 'link', 'last_value', 'trans_value', 'new_value',
    ];
}
