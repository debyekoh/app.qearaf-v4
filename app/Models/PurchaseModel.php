<?php

namespace App\Models;

use CodeIgniter\Model;

class PurchaseModel extends Model
{
    protected $table      = 'purchase';
    protected $primaryKey = 'no_purchase';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'no_purchase', 'purch_category', 'supplier_id', 'date_purchase', 'note', 'bill', 'payment', 'paymethod', 'status',
    ];
}
