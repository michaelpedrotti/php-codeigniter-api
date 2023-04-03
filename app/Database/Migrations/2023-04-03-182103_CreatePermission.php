<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use Config\Database;

class CreatePermission extends Migration {
    
    public function up() {
        
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'profile_id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true
            ],
            'resource' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => false
            ],
            'actions' => [
                'type' => 'JSON',
                'null' => false
            ],
        ]);
        $this->forge->addKey('id', true, keyName:'pk_642b22865fe96');
        $this->forge->addForeignKey('profile_id', 'profile', 'id', onUpdate: 'NO ACTION', onDelete: 'CASCADE', fkName:'fk_642b24fe9cf19');
        $this->forge->createTable('permission');  
        
        Database::seeder()->call('PermissionSeed');
    }

    public function down() {
        
        $this->forge->dropTable('permission');
    }
}
