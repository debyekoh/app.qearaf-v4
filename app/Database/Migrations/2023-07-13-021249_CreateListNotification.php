<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateListNotification extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_notif'              => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'path_notif'            => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'type_notif'            => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'title_notif'           => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'to_member_id'          => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'to_fullname'           => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'to_user_image'         => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'from_member_id'        => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'from_fullname'         => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'from_user_image'       => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'notification'          => ['type' => 'varchar', 'constraint' => 1000, 'null' => false],
            'notification_image'    => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'read_status'           => ['type' => 'int', 'constraint' => 20, 'null' => true],
            'created_at'            => ['type' => 'datetime', 'null' => true],
            'updated_at'            => ['type' => 'datetime', 'null' => true],
            'deleted_at'            => ['type' => 'datetime', 'null' => true],
        ]);

        // Membuat primary key
        $this->forge->addKey('id_notif', TRUE);

        // Membuat Unique key
        $this->forge->addUniqueKey('id_notif');

        // Membuat tabel news
        $this->forge->createTable('list_notification', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('list_notification');
    }
}
