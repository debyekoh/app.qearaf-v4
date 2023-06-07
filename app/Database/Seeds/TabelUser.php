<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TabelUser extends Seeder
{
    public function run()
    {
        $data_user = [
            [
                'member_id'      => '4c1249d3',
                'email'          => 'rf.otomotive@gmail.com',
                'username'       => 'qearafowner',
                'fullname'       => 'Deby Eko Hidayat',
                'phone'          => '085716387955',
                'address'        => 'Jl. Beruang IX No.86 Perum Cikarang Baru - Desa Jayamukti',
                'user_image'     => 'Avatar.webp',
                'password_hash'  => '$2y$10$bsjEMtkZm.r36u46hr5z6.R04cs7Txyc14GSpnvGOgvosuo6Q6yi.',
                'username'       => 'qearafowner',
                'active'         => '1'

            ]
        ];

        $this->db->table('users')->insertBatch($data_user);

        // --------------------------------------------------------------------*----------

        $data_auth_groups = [
            [
                'name'           => 'SuAdmin',
                'description'    => 'Super Admin',
            ],
            [
                'name'           => 'Admin',
                'description'    => 'Admin',
            ],
            [
                'name'           => 'Reseller',
                'description'    => 'Reseller',
            ],
            [
                'name'           => 'User',
                'description'    => 'User',
            ]
        ];

        $this->db->table('auth_groups')->insertBatch($data_auth_groups);

        // --------------------------------------------------------------------*----------

        $data_auth_groups_users = [
            [
                'group_id'   => '1',
                'user_id'    => '1',
            ]
        ];

        $this->db->table('auth_groups_users')->insertBatch($data_auth_groups_users);

        // --------------------------------------------------------------------*----------

        $data_auth_permissions = [
            [
                'name'           => 'Create',
                'description'    => 'Create',
            ],
            [
                'name'           => 'Update',
                'description'    => 'Update',
            ],
            [
                'name'           => 'Delete',
                'description'    => 'Delete',
            ],
            [
                'name'           => 'Read',
                'description'    => 'Read',
            ]
        ];

        $this->db->table('auth_permissions')->insertBatch($data_auth_permissions);

        // --------------------------------------------------------------------*----------

        $data_auth_groups_permissions = [
            [
                'group_id'         => '1',
                'permission_id'    => '1',
            ],
            [
                'group_id'         => '1',
                'permission_id'    => '2',
            ],
            [
                'group_id'         => '1',
                'permission_id'    => '3',
            ],
            [
                'group_id'         => '1',
                'permission_id'    => '4',
            ]
        ];

        $this->db->table('auth_groups_permissions')->insertBatch($data_auth_groups_permissions);
    }
}
