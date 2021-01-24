<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pages extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
					'type'           => 'INT',
					'constraint'     => 5,
					'unsigned'       => true,
					'auto_increment' => true,
			],
			'name'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
			],
			'description'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '300',
			],
			'github'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '150',
			],
			'website'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '150',
			],
				'image'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '150',
			],


	]);
	$this->forge->addKey('id', true);
	$this->forge->createTable('pages');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('pages');
	}
}
