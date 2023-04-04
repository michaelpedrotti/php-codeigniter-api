<?php namespace App\Models;

use App\Entities\PermissionEntity;

class PermissionModel extends \CodeIgniter\Model {
    
    protected $table = 'permission';
    protected $primaryKey = 'id';
    protected $allowedFields = ['resource', 'actions', 'profile_id'];
    protected $returnType = PermissionEntity::class;
    protected $useTimestamps = false;
}
