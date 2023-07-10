<?php

namespace App\Models;

use CodeIgniter\Model;

class SalesModel extends Model
{
    protected $table      = 'sales';
    protected $primaryKey = 'id_sales';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'id_sales', 'no_sales', 'date_sales', 'id_shop', 'deliveryservices', 'marketplace', 'resi', 'note', 'packaging', 'packaging', 'paymethod', 'status',
    ];
}
