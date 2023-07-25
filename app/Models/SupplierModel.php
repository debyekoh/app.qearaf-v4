<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table      = 'list_supplier';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'id', 'name_supplier',
    ];
}
