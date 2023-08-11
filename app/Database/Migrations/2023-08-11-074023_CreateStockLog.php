<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStockLog extends Migration
{
    public function up()
    {
        $fields = [
            'products_stock_log_proid'      => ['type' => 'varchar', 'constraint' => 20, 'null' => false],
            'log_key'                       => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'log_code'                      => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'log_description'               => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'link'                          => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'last_value'                    => ['type' => 'float', 'null' => false],
            'trans_value'                   => ['type' => 'float', 'null' => false],
            'new_value'                     => ['type' => 'float', 'null' => false],
            'created_at'                    => ['type' => 'datetime', 'null' => true],
            'updated_at'                    => ['type' => 'datetime', 'null' => true],
            'deleted_at'                    => ['type' => 'datetime', 'null' => true],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('products_stock_log_proid', true);
        $this->forge->addForeignKey('products_stock_log_proid', 'products', 'pro_id', '', 'CASCADE');
        $this->forge->createTable('products_stock_log', true);
    }

    public function down()
    {
        //
    }
}
