<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeed extends Seeder {
    
    public function run() {
        
        $now = date('Y-m-d H:i:s');
        
        $this->db->table('user')->insertBatch([
            
            [
                "id" => 1,
                "name"  => "Administrator",
                "email"  => "admin@xyz.io",
                "password"  => password_hash("admin", PASSWORD_BCRYPT),
                "profile_id"  => 1,
                "createdAt"  => $now,
                "updatedAt"  => $now
            ],
            [
                "id" => 2,
                "name"  => "Reader",
                "email"  => "reader@xyz.io",
                "password"  => password_hash("reader", PASSWORD_BCRYPT),
                "profile_id"  => 2,
                "createdAt"  => $now,
                "updatedAt"  => $now
            ]
        ]);
    }
}
