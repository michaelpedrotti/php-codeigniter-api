<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PermissionSeed extends Seeder {
    
    public function run() {
        
        $resources = ['user', 'profile', 'permission'];
        $rows = [];
        
        foreach($resources as $resource){
            
            $rows[] = [
                'profile_id' => 1, 
                'resource' => $resource, 
                'actions' => json_encode(['C', 'R', 'U', 'D'])
            ];
        }
        
        foreach($resources as $resource){
            
            $rows[] = [
                'profile_id' => 2, 
                'resource' => $resource, 
                'actions' => json_encode(['R'])
            ];
        }   
        
        $this->db->table('permission')->insertBatch($rows);
    }
}
