<?php

namespace App\Models;

use CodeIgniter\Model;

class PurchaseDetailModel extends Model
{
    protected $table      = 'purchase_detail';
    protected $primaryKey = 'no_purchase';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'no_purchase_detail', 'no_purchase', 'date_purchase', 'pro_id', 'pro_img', 'pro_price', 'pro_price_basic', 'pro_qty', 'status',
    ];
}
