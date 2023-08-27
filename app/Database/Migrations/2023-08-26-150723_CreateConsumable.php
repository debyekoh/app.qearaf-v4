<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateConsumable extends Migration
{
    public function up()
    {
        $fields = [
            'id_consumable'      => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'date'               => ['type' => 'date', 'null' => false],
            'procon_id'          => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'id_sales_consum'    => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'consum_qty'         => ['type' => 'float', 'null' => false],
            'consum_price'       => ['type' => 'float', 'null' => false],
            'created_at'         => ['type' => 'datetime', 'null' => true],
            'updated_at'         => ['type' => 'datetime', 'null' => true],
            'deleted_at'         => ['type' => 'datetime', 'null' => true],
        ];
        $this->forge->addField($fields);
        $this->forge->addUniqueKey('id_consumable');
        $this->forge->addForeignKey('procon_id', 'products', 'pro_id', '', 'CASCADE');
        $this->forge->addForeignKey('id_sales_consum', 'sales', 'id_sales', '', 'CASCADE');
        $this->forge->createTable('consumable_log', true);
    }

    public function down()
    {
        //
    }
}
