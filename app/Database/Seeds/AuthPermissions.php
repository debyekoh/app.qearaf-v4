<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthPermissions extends Seeder
{
    public function run()
    {
        $data = [
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

        // // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('auth_permissions')->insertBatch($data);
    }
}
