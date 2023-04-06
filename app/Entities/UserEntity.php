<?php namespace App\Entities;

use CodeIgniter\Entity\Entity;

class UserEntity extends Entity {
    
    protected $casts = [
        'id' => 'int',
        'profile_id' => 'int'
    ];
}