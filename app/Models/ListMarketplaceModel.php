<?php

namespace App\Models;

use CodeIgniter\Model;

class ListMarketplaceModel extends Model
{
    protected $table      = 'list_marketplace';
    protected $primaryKey = 'name_marketplace';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'name_marketplace',
    ];
}
