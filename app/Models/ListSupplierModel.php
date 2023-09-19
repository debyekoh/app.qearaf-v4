<?php

namespace App\Models;

use CodeIgniter\Model;

class ListSupplierModel extends Model
{
    protected $table      = 'list_supplier';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'id', 'type', 'name_supplier', 'address_supplier', 'phone_supplier',
    ];
}
