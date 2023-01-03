<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'name'       => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'email'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
			'password' => [
				'type'           => 'VARCHAR',
				'constraint'	 =>	255,
			],
			'phone' => [
				'type'           => 'VARCHAR',
				'constraint'	 =>	255,
				'null'           => true,
			],
			'role'      => [
				'type'           => 'ENUM',
				'constraint'     => ['admin', 'operator'],
			],
			'profile_image'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
				'null'			 => true,
				'default'		 => '/images/_profile/default.jpg',
			],
			'create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
		]);

		$this->forge->addKey('id', TRUE);
		$this->forge->createTable('tbl_users', TRUE);
    }

    public function down()
    {
        //
    }
}
