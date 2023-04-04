<?php namespace App\Entities;

use CodeIgniter\Entity\Entity;

/**
 * @link https://codeigniter4.github.io/userguide/models/entities.html
 */
class PermissionEntity extends Entity {
    
    protected $attributes = [
        'id' => 0,
        'resource' => '',
        'profile_id' => 0,
        'actions' => []       
    ];
    
    protected $casts = [
        'id' => 'int',
        'profile_id' => 'int',
        'actions' => 'json-array',
    ];
}