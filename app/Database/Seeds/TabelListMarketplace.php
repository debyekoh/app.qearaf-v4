<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TabelListMarketplace extends Seeder
{
    public function run()
    {
        $data_category = [
            [
                'name_marketplace'      => 'Lazada',
            ],
            [
                'name_marketplace'      => 'Shopee',
            ],
            [
                'name_marketplace'      => 'Tokopedia',
            ],
            [
                'name_marketplace'      => 'Tiktok',
            ],
            [
                'name_marketplace'      => 'Other',
            ],
        ];

        $this->db->table('list_marketplace')->insertBatch($data_category);
    }
}
