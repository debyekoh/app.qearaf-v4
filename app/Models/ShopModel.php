<?php

namespace App\Models;

use CodeIgniter\Model;

class ShopModel extends Model
{
    protected $table      = 'shop';
    protected $primaryKey = 'id_shop';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'id_shop', 'member_id', 'name_shop', 'marketplace', 'phone', 'active', 'address_shop',
    ];
}
