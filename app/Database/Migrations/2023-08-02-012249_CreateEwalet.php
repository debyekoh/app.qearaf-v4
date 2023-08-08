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

        $fields = [
            'ewallet_shopid_log'    => ['type' => 'varchar', 'constraint' => 20, 'null' => false],
            'log_key'               => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'log_code'              => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'log_description'       => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'link'                  => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'last_value'            => ['type' => 'float', 'null' => false],
            'trans_value'           => ['type' => 'float', 'null' => false],
            'new_value'             => ['type' => 'float', 'null' => false],
            'created_at'            => ['type' => 'datetime', 'null' => true],
            'updated_at'            => ['type' => 'datetime', 'null' => true],
            'deleted_at'            => ['type' => 'datetime', 'null' => true],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('ewallet_shopid_log', true);
        $this->forge->addForeignKey('ewallet_shopid_log', 'balance_ewallet', 'ewallet_shopid', '', 'CASCADE');
        $this->forge->createTable('balance_ewallet_log', true);
    }

    public function down()
    {
    }
}
