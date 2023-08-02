<?php

namespace App\Models;

use CodeIgniter\Model;

class BallanceAccount extends Model
{
    protected $table      = 'balance_account';
    protected $primaryKey = 'balance_userid';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'balance_userid', 'value_account', 'active',
    ];
}
