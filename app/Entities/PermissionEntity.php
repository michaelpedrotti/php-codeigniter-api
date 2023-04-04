<?php namespace App\Entities;

use CodeIgniter\Entity\Entity;

/**
 * @link https://codeigniter4.github.io/userguide/models/entities.html
 */
class PermissionEntity extends Entity {
    
    protected $casts = [
        'id' => 'int',
        'profile_id' => 'int',
        'actions' => 'json-array',
    ];
}