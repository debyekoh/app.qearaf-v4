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

        $fields = [
            'balance_userid_log'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'log_key'               => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'log_code'              => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'log_description'       => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'link'                  => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'last_value'            => ['type' => 'float', 'null' => false],
            'trans_value'           => ['type' => 'float', 'null' => false],
            'new_value'             => ['type' => 'float', 'null' => false],
            'created_at'            => ['type' => 'datetime', 'null' => true],
            'updated_at'            => ['type' => 'datetime', 'null' => true],
            'deleted_at'            => ['type' => 'datetime', 'null' => true],
        ];
        $this->forge->addField($fields);
        $this->forge->addKey('balance_userid_log', true);
        $this->forge->addForeignKey('balance_userid_log', 'balance_account', 'balance_userid', '', 'CASCADE');
        $this->forge->createTable('balance_account_log', true);
    }

    public function down()
    {
        // $this->forge->dropTable('balance_account');
    }
}
