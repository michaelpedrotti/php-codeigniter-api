<?php namespace App\Entities;

use CodeIgniter\Entity\Entity;

class ProfileEntity extends Entity {
    
    protected $attributes = [
        'id' => null,
        'name' => null,   
    ];
    
    protected $casts = [
        'id' => 'int'
    ];
}
