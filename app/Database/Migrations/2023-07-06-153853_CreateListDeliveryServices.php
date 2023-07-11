<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateListDeliveryServices extends Migration
{
    public function up()
    {
        $fields = [
            'id'                         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name_delivery_services'     => ['type' => 'varchar', 'constraint' => 255],
            'image_services'             => ['type' => 'varchar', 'constraint' => 255],


        ];

        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('list_delivery_services', true);
    }

    public function down()
    {
        $this->forge->dropTable('list_delivery_services');
    }
}
