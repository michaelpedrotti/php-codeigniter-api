<?php namespace App\Models;

use App\Entities\UserEntity;

class UserModel extends \CodeIgniter\Model {
    
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password', 'profile_id'];
    protected $returnType = UserEntity::class;
    protected $useTimestamps = true;
    protected $createdField  = 'createdAt';
    protected $updatedField  = 'updatedAt';
}
