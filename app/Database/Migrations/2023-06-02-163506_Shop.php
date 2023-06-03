<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Shop extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_shop'          => ['type' => 'varchar', 'constraint' => 20, 'null' => false],
            'member_id'        => ['type' => 'varchar', 'constraint' => 20, 'null' => false],
            'name_shop'        => ['type' => 'varchar', 'constraint' => 255],
            'marketplace'      => ['type' => 'varchar', 'constraint' => 30, 'null' => true],
            'phone'            => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'address_shop'     => ['type' => 'varchar', 'constraint' => 20, 'null' => true],
            'active'           => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);

        // Membuat primary key
        $this->forge->addKey('id_shop', TRUE);

        // Membuat Unique key
        $this->forge->addUniqueKey('id_shop');
        $this->forge->addUniqueKey('member_id');
        $this->forge->addUniqueKey('name_shop');

        // Membuat tabel news
        $this->forge->createTable('shop', TRUE);
    }

    public function down()
    {
        // menghapus tabel shop
        $this->forge->dropTable('shop');
    }
}
