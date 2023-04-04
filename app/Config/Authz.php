<?php namespace Config;

class Authz extends \CodeIgniter\Config\BaseConfig {
    
    public $permissions = [
        'create' => 'C',
        'read' => 'R',
        'update' => 'U',
        'delete' => 'D'
    ];
    
    public $actions = [
        'index' => 'read',
        'show' => 'read',
        'new' => 'create',
        'create' => 'create',
        'edit' => 'update',
        'update' => 'update',
        'delete' => 'delete',  
    ];
}