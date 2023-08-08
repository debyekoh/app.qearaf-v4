<?php

namespace App\Models;

use CodeIgniter\Model;

class BallanceEWalletLog extends Model
{
    protected $table      = 'balance_ewallet_log';
    protected $primaryKey = 'ewallet_shopid_log';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'ewallet_shopid_log', 'log_key', 'log_code', 'log_description', 'link', 'last_value', 'trans_value', 'new_value',
    ];
}
