<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TabelListSupplier extends Seeder
{
    public function run()
    {
        $data_category = [
            [
                'name_supplier'      => 'Menara Terus Makmur (METEMA)',
            ],
            [
                'name_supplier'      => 'Online Shop',
            ],
        ];

        $this->db->table('list_supplier')->insertBatch($data_category);
    }
}
