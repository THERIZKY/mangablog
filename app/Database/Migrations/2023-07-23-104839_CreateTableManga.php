<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableManga extends Migration
{
    public function up()
    {
        // Table manga
        $this->forge->addField([
            'mangaId' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'mangaTitle' => [
                'type' => 'VARCHAR',
                'constraint' => '144',
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'cover' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'deskripsi' => [
                'type' => 'TEXT',
            ],
            'rilis' => [
                'type' => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('mangaId', true);
        $this->forge->createTable('manga');


        // Table chapter
        $this->forge->addField([
            'idChapter' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'idManga' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'chapter' => [
                'type' => 'INT',
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => '144',
            ],
            'image' => [
                'type' => 'LONGTEXT',
            ],
        ]);
        $this->forge->addKey('idChapter', true);
        $this->forge->addForeignKey('idManga', 'manga', 'mangaId');
        $this->forge->createTable('chapter');


        // Table blog
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'blogTitle' => [
                'type' => 'VARCHAR',
                'constraint' => '144',
            ],
            'konten' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'rilis' => [
                'type' => 'DATETIME',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('blog');
    }

    public function down()
    {
        // Drop tables
        $this->forge->dropTable('manga');
        $this->forge->dropTable('chapter');
        $this->forge->dropTable('blog');
    }
}
