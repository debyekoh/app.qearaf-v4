<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEwalet extends Migration
{
    public function up()
    {
        $fields = [
            'ewallet_shopid'    => ['type' => 'varchar', 'constraint' => 20, 'null' => false],
            'value_ewallet'     => ['type' => 'float', 'null' => false],
            'active'            => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ];
        $this->forge->addField($fields);
        $this->forge->addUniqueKey('ewallet_shopid');
        $this->forge->addForeignKey('ewallet_shopid', 'shop', 'id_shop', '', 'CASCADE');
        $this->forge->createTable('balance_ewallet', true);
    }

    public function down()
    {
    }
}
