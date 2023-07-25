<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TabelListCategoryPurchase extends Seeder
{
    public function run()
    {
        $data_category = [
            [
                'category_name'      => 'Product',
            ],
            [
                'category_name'      => 'ADS (Iklan)',
            ],
            [
                'category_name'      => 'Consumable',
            ],
        ];

        $this->db->table('list_category_purchase')->insertBatch($data_category);
    }
}
