<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TabelListPackaging extends Seeder
{
    public function run()
    {
        $data_category = [
            [
                'id_packaging'          => '0',
                'name_packaging'        => 'No Packaging',
                'price_packaging'       => '500',
                'stock_packaging'       => '0',
            ],
            [
                'id_packaging'          => '1',
                'name_packaging'        => 'Small 17x9x6cm',
                'price_packaging'       => '2000',
                'stock_packaging'       => '500',
            ],
            [
                'id_packaging'          => '2',
                'name_packaging'        => 'Long 8x8x30cm',
                'price_packaging'       => '2000',
                'stock_packaging'       => '500',
            ],
        ];

        $this->db->table('list_packaging')->insertBatch($data_category);
    }
}
