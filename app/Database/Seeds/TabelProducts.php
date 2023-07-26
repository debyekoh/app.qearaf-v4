<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TabelProducts extends Seeder
{
    public function run()
    {
        $data_category = [
            [
                'pro_name_category'      => 'Toolkit',
                'created_at'         => date('Y-m-d H:i:s')
            ],
            [
                'pro_name_category'      => 'Tire Wrench',
                'created_at'         => date('Y-m-d H:i:s')
            ],
            [
                'pro_name_category'      => 'Jack',
                'created_at'         => date('Y-m-d H:i:s')
            ],
            [
                'pro_name_category'      => 'Soap',
                'created_at'         => date('Y-m-d H:i:s')
            ],
            [
                'pro_name_category'      => 'Plastic',
                'created_at'         => date('Y-m-d H:i:s')
            ],
            [
                'pro_name_category'      => 'Packaging',
                'created_at'         => date('Y-m-d H:i:s')
            ],
            [
                'pro_name_category'      => 'IklanAds',
                'created_at'         => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('products_category')->insertBatch($data_category);

        // --------------------------------------------------------------------*----------

        $data_group = [
            [
                'pro_name_group'      => 'Otomotive',
                'created_at'         => date('Y-m-d H:i:s')
            ],
            [
                'pro_name_group'      => 'Sanitation',
                'created_at'         => date('Y-m-d H:i:s')
            ],
            [
                'pro_name_group'      => 'Consumable',
                'created_at'         => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('products_group')->insertBatch($data_group);

        // --------------------------------------------------------------------*----------

        $data_show = [
            [
                'pro_name_show'      => 'SuAdmin',
                'created_at'         => date('Y-m-d H:i:s')
            ],
            [
                'pro_name_show'      => 'Admin',
                'created_at'         => date('Y-m-d H:i:s')
            ],
            [
                'pro_name_show'      => 'Reseller',
                'created_at'         => date('Y-m-d H:i:s')
            ],
            [
                'pro_name_show'      => 'User',
                'created_at'         => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('products_show')->insertBatch($data_show);
    }
}
