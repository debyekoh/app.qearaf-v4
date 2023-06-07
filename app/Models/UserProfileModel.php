<?php

namespace App\Models;

use CodeIgniter\Model;

class UserProfileModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'member_id';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'email', 'username', 'fullname', 'phone', 'address',
    ];
}
