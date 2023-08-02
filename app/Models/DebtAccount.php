<?php

namespace App\Models;

use CodeIgniter\Model;

class DebtAccount extends Model
{
    protected $table      = 'debt_account';
    protected $primaryKey = 'debt_userid';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'debt_userid', 'value_debt', 'active',
    ];
}
