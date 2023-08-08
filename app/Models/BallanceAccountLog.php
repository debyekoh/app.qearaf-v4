<?php

namespace App\Models;

use CodeIgniter\Model;

class BallanceAccountLog extends Model
{
    protected $table      = 'balance_account_log';
    protected $primaryKey = 'balance_userid_log';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'balance_userid_log', 'log_key', 'log_code', 'log_description', 'link', 'last_value', 'trans_value', 'new_value',
    ];
}
