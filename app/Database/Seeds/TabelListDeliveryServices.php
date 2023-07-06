<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TabelListDeliveryServices extends Seeder
{
    public function run()
    {
        $data_category = [
            [
                'name_delivery_services'      => 'Anteraja',
            ],
            [
                'name_delivery_services'      => 'Gosend',
            ],
            [
                'name_delivery_services'      => 'Grab',
            ],
            [
                'name_delivery_services'      => 'J&T Express',
            ],
            [
                'name_delivery_services'      => 'JNE Express',
            ],
            [
                'name_delivery_services'      => 'Lion Parcel',
            ],
            [
                'name_delivery_services'      => 'Ninja Xpress',
            ],
            [
                'name_delivery_services'      => 'Paxel',
            ],
            [
                'name_delivery_services'      => 'SiCepat',
            ],
            [
                'name_delivery_services'      => 'Shopee Xpress',
            ],
            [
                'name_delivery_services'      => 'Other',
            ],
        ];

        $this->db->table('list_delivery_services')->insertBatch($data_category);
    }
}
