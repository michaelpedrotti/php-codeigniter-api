<?php namespace App\Models;

use App\Entities\ProfileEntity;

class ProfileModel extends \CodeIgniter\Model {
    
    protected $table = 'profile';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];
    protected $returnType = ProfileEntity::class;
    protected $useTimestamps = false;
}
