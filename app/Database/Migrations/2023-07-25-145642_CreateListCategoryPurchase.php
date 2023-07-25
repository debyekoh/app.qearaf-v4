<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateListCategoryPurchase extends Migration
{
    public function up()
    {
        $fields = [
            'id'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'category_name'        => ['type' => 'varchar', 'constraint' => 255],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('id', true);
        $this->forge->createTable('list_category_purchase', true);
    }

    public function down()
    {
        //
    }
}
