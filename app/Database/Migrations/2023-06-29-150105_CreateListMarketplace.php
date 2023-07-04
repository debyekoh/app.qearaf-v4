<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateListMarketplace extends Migration
{
    public function up()
    {
        $fields = [
            'id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name_marketplace'        => ['type' => 'varchar', 'constraint' => 255],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('list_marketplace', true);
    }

    public function down()
    {
        $this->forge->dropTable('shop');
    }
}
