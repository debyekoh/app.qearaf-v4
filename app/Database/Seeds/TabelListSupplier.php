<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TabelListSupplier extends Seeder
{
    public function run()
    {
        $data_category = [
            [
                'type'               => 'Product',
                'name_supplier'      => 'Menara Terus Makmur (METEMA)',
            ],
            [
                'type'               => 'Other',
                'name_supplier'      => 'Online Shop',
            ],
        ];

        $this->db->table('list_supplier')->insertBatch($data_category);
    }
}
