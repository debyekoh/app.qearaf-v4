<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePurchase extends Migration
{
    public function up()
    {
        $this->forge->addField([
            // 'id_purchase'       => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'no_purchase'       => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'purch_category'    => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'supplier_id'          => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'date_purchase'     => ['type' => 'date', 'null' => false],
            'note'              => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'bill'              => ['type' => 'float', 'null' => false],
            'payment'           => ['type' => 'float', 'null' => false],
            'paymethod'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'status'            => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('no_purchase', true);
        $this->forge->addUniqueKey('no_purchase');
        $this->forge->createTable('purchase', true);

        $this->forge->addField([
            // 'id_purchase_detail'   => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'no_purchase_detail'    => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'no_purchase'           => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'date_purchase'         => ['type' => 'date', 'null' => false],
            'pro_id'                => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'pro_img'               => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'pro_price_basic'       => ['type' => 'float', 'null' => false],
            'pro_price'             => ['type' => 'float', 'null' => false],
            'pro_qty'               => ['type' => 'float', 'null' => false],
            'status'                => ['type' => 'varchar', 'constraint' => 50, 'null' => false],
            'created_at'            => ['type' => 'datetime', 'null' => true],
            'updated_at'            => ['type' => 'datetime', 'null' => true],
            'deleted_at'            => ['type' => 'datetime', 'null' => true],
        ]);

        $this->forge->addKey('no_purchase_detail', true);
        $this->forge->addUniqueKey('no_purchase_detail');
        $this->forge->createTable('purchase_detail', true);
    }

    public function down()
    {
        //
    }
}
