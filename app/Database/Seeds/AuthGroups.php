<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthGroups extends Seeder
{
    public function run()
    {
        $data = [
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

        // // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('auth_groups')->insertBatch($data);
    }
}
