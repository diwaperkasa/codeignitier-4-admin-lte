<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFinance extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 5,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],
            'berita' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255
            ],
            'jumlah' => [
                'type'              => 'INT',
                'unsigned'          => true,
            ],
            'tipe' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('finance');
    }

    public function down()
    {
        $this->forge->dropTable('finance');
    }
}