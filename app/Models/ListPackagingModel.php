<?php

namespace App\Models;

use CodeIgniter\Model;

class ListPackagingModel extends Model
{
    protected $table      = 'list_packaging';
    protected $primaryKey = 'id_packaging';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'id_packaging', 'proid_pck', 'name_packaging', 'price_packaging', 'stock_packaging',
    ];
}
