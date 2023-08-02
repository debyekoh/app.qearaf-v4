<?php

namespace App\Models;

use CodeIgniter\Model;

class BallanceEWallet extends Model
{
    protected $table      = 'balance_ewallet';
    protected $primaryKey = 'ewallet_shopid';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'ewallet_shopid', 'value_ewallet', 'active',
    ];
}
