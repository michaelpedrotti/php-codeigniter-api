<?php namespace App\Models;

class PermissionModel extends \CodeIgniter\Model {
    
    protected $table = 'permission';
    protected $primaryKey = 'id';
    protected $allowedFields = ['resource', 'actions', 'profile_id'];
    protected $useTimestamps = false;
}
