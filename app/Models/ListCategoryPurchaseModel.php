<?php

namespace App\Models;

use CodeIgniter\Model;

class ListCategoryPurchaseModel extends Model
{
    protected $table      = 'list_category_purchase';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields  = [
        'id', 'category_name',
    ];
}
