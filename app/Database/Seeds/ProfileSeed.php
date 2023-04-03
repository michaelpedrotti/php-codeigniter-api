<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProfileSeed extends Seeder {
    
    public function run() {
        
        $now = date('Y-m-d H:i:s');
        
        $this->db->table('profile')->insertBatch([
            
            [
                "id" => 1,
                "name"  => "Administrator",
                "createdAt"  => $now,
                "updatedAt"  => $now
            ],
            [
                "id" => 2,
                "name"  => "Reader",
                "createdAt"  => $now,
                "updatedAt"  => $now
            ]
        ]);
    }
}
