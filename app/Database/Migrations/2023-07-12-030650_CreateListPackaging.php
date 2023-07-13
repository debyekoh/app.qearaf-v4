<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateListPackaging extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_packaging'     => ['type' => 'varchar', 'constraint' => 20, 'null' => false],
            'name_packaging'   => ['type' => 'varchar', 'constraint' => 20, 'null' => false],
            'price_packaging'  => ['type' => 'float', 'null' => false],
            'stock_packaging'  => ['type' => 'int', 'constraint' => 20, 'null' => true],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        // Membuat primary key
        $this->forge->addKey('id_packaging', TRUE);

        // Membuat Unique key
        $this->forge->addUniqueKey('id_packaging');

        // Membuat tabel news
        $this->forge->createTable('list_packaging', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('list_packaging');
    }
}
