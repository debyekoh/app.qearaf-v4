<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDebt extends Migration
{
    public function up()
    {
        $fields = [
            'debt_userid'       => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'value_debt'        => ['type' => 'float', 'null' => false],
            'active'            => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],
        ];
        $this->forge->addField($fields);
        $this->forge->addUniqueKey('debt_userid');
        $this->forge->addForeignKey('debt_userid', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable('debt_account', true);

        $fields = [
            'debt_userid_log'       => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
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
        $this->forge->addKey('debt_userid_log', true);
        $this->forge->addForeignKey('debt_userid_log', 'debt_account', 'debt_userid', '', 'CASCADE');
        $this->forge->createTable('debt_account_log', true);
    }

    public function down()
    {
        //
    }
}
