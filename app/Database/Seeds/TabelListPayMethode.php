<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TabelListPayMethode extends Seeder
{
    public function run()
    {
        $data_category = [
            [
                'pay_methode'      => 'OnlinePay',
            ],
            [
                'pay_methode'      => 'COD',
            ],
            [
                'pay_methode'      => 'TOP',
            ],
            [
                'pay_methode'      => 'Ewalet',
            ],
            [
                'pay_methode'      => 'Other',
            ],
        ];

        $this->db->table('list_pay_methode')->insertBatch($data_category);
    }
}
