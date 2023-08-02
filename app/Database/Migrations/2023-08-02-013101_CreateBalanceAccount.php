<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBalanceAccount extends Migration
{
    public function up()
    {
        $fields = [
            'balance_userid'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'value_account'     => ['type' => 'float', 'null' => false],
            'active'            => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ];
        $this->forge->addField($fields);
        $this->forge->addUniqueKey('balance_userid');
        $this->forge->addForeignKey('balance_userid', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable('balance_account', true);
    }

    public function down()
    {
        // $this->forge->dropTable('balance_account');
    }
}
