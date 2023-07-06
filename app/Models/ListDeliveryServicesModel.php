<?php

namespace App\Models;

use CodeIgniter\Model;

class ListDeliveryServicesModel extends Model
{
    protected $table      = 'list_delivery_services';
    protected $primaryKey = 'name_delivery_services';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'name_delivery_services',
    ];
}
