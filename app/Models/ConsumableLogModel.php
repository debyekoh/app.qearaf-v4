<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsumableLogModel extends Model
{
    protected $table      = 'consumable_log';
    protected $primaryKey = 'id_sales_consum';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'id_consumable', 'date', 'procon_id', 'id_sales_consum', 'consum_qty', 'consum_price',
    ];
}
