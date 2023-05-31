<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AlterPhone1 extends Migration
{
    public function up()
    {
        $fields = [
            'address' => ['type' => 'TEXT', 'after' => 'phone'],
        ];
        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
    }
}
