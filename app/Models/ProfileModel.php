<?php namespace App\Models;

class ProfileModel extends \CodeIgniter\Model {
    
    protected $table = 'profile';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];
    protected $useTimestamps = false;
}
