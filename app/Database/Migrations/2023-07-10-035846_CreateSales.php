<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSales extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_sales'          => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'no_sales'          => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'date_sales'        => ['type' => 'date', 'null' => false],
            'id_shop'           => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'deliveryservices'  => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'marketplace'       => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'resi'              => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'note'              => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'packaging'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'packaging_charge'  => ['type' => 'float', 'null' => false],
            'bill'              => ['type' => 'float', 'null' => false],
            'payment'           => ['type' => 'float', 'null' => false],
            'paymethod'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'status'            => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id_sales', true);
        $this->forge->addUniqueKey('no_sales');
        $this->forge->createTable('sales', true);

        $this->forge->addField([
            'id_sales_detail'   => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'no_sales'          => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'date_sales'        => ['type' => 'date', 'null' => false],
            'pro_id'            => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'pro_img'           => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'pro_price_basic'   => ['type' => 'float', 'null' => false],
            'pro_price'         => ['type' => 'float', 'null' => false],
            'pro_qty'           => ['type' => 'float', 'null' => false],
            'status'            => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('id_sales_detail', true);
        $this->forge->addUniqueKey('id_sales_detail');
        $this->forge->createTable('sales_detail', true);
    }

    public function down()
    {
        //
    }
}
