<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProductBundling extends Migration
{
    public function up()
    {
        $fields = [
            'id_pro_bundling'       => ['type' => 'varchar', 'constraint' => 20, 'null' => false],
            'id_bundling'           => ['type' => 'varchar', 'constraint' => 20, 'null' => false],
            'pro_id_bundling_item'  => ['type' => 'varchar', 'constraint' => 20, 'null' => false],
            'created_at'            => ['type' => 'datetime', 'null' => true],
            'updated_at'            => ['type' => 'datetime', 'null' => true],
            'deleted_at'            => ['type' => 'datetime', 'null' => true],
        ];
        $this->forge->addField($fields);
        $this->forge->addUniqueKey('id_pro_bundling');
        $this->forge->addForeignKey('pro_id_bundling_item', 'products', 'pro_id', '', 'CASCADE');
        $this->forge->createTable('products_bundling', TRUE);
    }

    public function down()
    {
        //
    }
}
