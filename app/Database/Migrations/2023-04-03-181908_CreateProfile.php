<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use Config\Database;

class CreateProfile extends Migration {
    
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
                'constraint' => '100',
                'null' => false
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
        $this->forge->addKey('id', true, keyName:'pk_642b22346570b');
        $this->forge->createTable('profile');
        
        Database::seeder()->call('ProfileSeed');
    }

    public function down() {
       
        $this->forge->dropTable('profile');
    }
}
