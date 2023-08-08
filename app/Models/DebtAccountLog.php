<?php

namespace App\Models;

use CodeIgniter\Model;

class DebtAccountLog extends Model
{
    protected $table      = 'debt_account_log';
    protected $primaryKey = 'debt_userid_log';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'debt_userid_log', 'log_key', 'log_code', 'log_description', 'link', 'last_value', 'trans_value', 'new_value',
    ];
}
