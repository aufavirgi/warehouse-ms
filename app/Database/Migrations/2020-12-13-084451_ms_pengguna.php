<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MsPengguna extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'pen_npk'          => [
					'type'           => 'VARCHAR',
					'constraint'     => '16',
			],
			'pen_nama'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '50',
			],
			'pen_role' => [
					'type'           => 'VARCHAR',
					'constraint'     => '11',
			],
			'pen_password'          => [
					'type'           => 'varchar',
					'constraint'     => '16',
			],
			'pen_status'          => [
					'type'           => 'INT',
					'constraint'     => 11,
			],
		]);
		$this->forge->addKey('pen_npk', TRUE);
		$this->forge->createTable('ms_pengguna');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}