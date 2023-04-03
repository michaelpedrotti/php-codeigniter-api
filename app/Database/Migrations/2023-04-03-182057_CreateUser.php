<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use Config\Database;

class CreateUser extends Migration {
    
    public function up() {
        
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => false
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => false
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => false
            ],
            'profile_id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true
            ],
            'createdAt' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updatedAt' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', primary: true, keyName:'pk_642b227a942b7');
        $this->forge->addKey('email', unique: true, keyName:'uk_642b239c742e4');
        $this->forge->addForeignKey('profile_id', 'profile', 'id', onUpdate: 'NO ACTION', onDelete: 'CASCADE', fkName:'fk_642b24a7313d4');
        $this->forge->createTable('user');
        
        Database::seeder()->call('UserSeed');
    }

    public function down() {
        
        $this->forge->dropTable('user');
    }
}
