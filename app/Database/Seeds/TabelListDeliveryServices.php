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
                'image_services'              => 'Service_ANTERAJA.png',
            ],
            [
                'name_delivery_services'      => 'Gosend',
                'image_services'              => 'Service_GOSEND.png',
            ],
            [
                'name_delivery_services'      => 'Grab',
                'image_services'              => 'Service_Grab.png',
            ],
            [
                'name_delivery_services'      => 'J&T Express',
                'image_services'              => 'Service_J&T.png',
            ],
            [
                'name_delivery_services'      => 'JNE Express',
                'image_services'              => 'Service_JNE.png',
            ],
            [
                'name_delivery_services'      => 'Lion Parcel',
                'image_services'              => 'Service_LIONPARCEL.png',
            ],
            [
                'name_delivery_services'      => 'Ninja Xpress',
                'image_services'              => 'Service_NINJA.png',
            ],
            [
                'name_delivery_services'      => 'Paxel',
                'image_services'              => 'Service_PAXEL.png',
            ],
            [
                'name_delivery_services'      => 'SiCepat',
                'image_services'              => 'Service_SICEPAT.png',
            ],
            [
                'name_delivery_services'      => 'Shopee Xpress',
                'image_services'              => 'Service_SHOPEEXPRESS.png',
            ],
            [
                'name_delivery_services'      => 'Other',
                'image_services'              => 'picture-img.png',
            ],
        ];

        $this->db->table('list_delivery_services')->insertBatch($data_category);
    }
}
