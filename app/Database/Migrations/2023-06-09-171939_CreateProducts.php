<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProducts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'pro_id'            => ['type' => 'varchar', 'constraint' => 11, 'null' => false],
            'pro_part_no'       => ['type' => 'varchar', 'constraint' => 35, 'null' => false],
            'pro_name'          => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'pro_model'         => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'pro_group'         => ['type' => 'varchar', 'constraint' => 25, 'null' => true],
            'pro_kategori'      => ['type' => 'varchar', 'constraint' => 25, 'null' => true],
            'pro_role'          => ['type' => 'varchar', 'constraint' => 25, 'null' => true],
            'pro_active'        => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
            'pro_bundling'      => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
            'pro_description'   => ['type' => 'text', 'null' => true],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('pro_id', TRUE);
        $this->forge->addUniqueKey('pro_id');
        $this->forge->addUniqueKey('pro_part_no');
        $this->forge->createTable('products', TRUE);

        $this->forge->addField([
            'pro_id_image'      => ['type' => 'varchar', 'constraint' => 20, 'null' => false],
            'pro_id'            => ['type' => 'varchar', 'constraint' => 20, 'null' => false],
            'pro_image_no'      => ['type' => 'varchar', 'constraint' => 20, 'null' => false],
            'pro_image_name'    => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('pro_id_image', TRUE);
        $this->forge->addUniqueKey('pro_id_image');
        $this->forge->addForeignKey('pro_id', 'products', 'pro_id', '', 'CASCADE');
        $this->forge->createTable('products_image', TRUE);

        $this->forge->addField([
            'pro_id_price'      => ['type' => 'varchar', 'constraint' => 20, 'null' => false],
            'pro_id'            => ['type' => 'varchar', 'constraint' => 20, 'null' => false],
            'pro_price_basic'   => ['type' => 'float', 'null' => false],
            'pro_price_reseler' => ['type' => 'float', 'null' => false],
            'pro_price_seller'  => ['type' => 'float', 'null' => false],
            'pro_price_active'  => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('pro_id_price', TRUE);
        $this->forge->addUniqueKey('pro_id_price');
        $this->forge->addForeignKey('pro_id', 'products', 'pro_id', '', 'CASCADE');
        $this->forge->createTable('products_price', TRUE);

        $this->forge->addField([
            'pro_id_stock'      => ['type' => 'varchar', 'constraint' => 20, 'null' => false],
            'pro_id'            => ['type' => 'varchar', 'constraint' => 20, 'null' => false],
            'pro_current_stock' => ['type' => 'int', 'null' => true],
            'pro_min_stock'     => ['type' => 'float', 'null' => true],
            'pro_mmax_stock'    => ['type' => 'float', 'null' => true],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('pro_id_stock', TRUE);
        $this->forge->addUniqueKey('pro_id_stock');
        $this->forge->addForeignKey('pro_id', 'products', 'pro_id', '', 'CASCADE');
        $this->forge->createTable('products_stock', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('products');
        $this->forge->dropTable('products_image');
        $this->forge->dropTable('products_price');
        $this->forge->dropTable('products_stock');
    }
}
