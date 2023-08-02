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
    }

    public function down()
    {
        //
    }
}
