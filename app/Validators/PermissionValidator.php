<?php namespace App\Validators;

/**
 * 
 * @link https://codeigniter4.github.io/CodeIgniter4/libraries/validation.html
 */
class PermissionValidator {
    
    static public $rules = [ 
        'resource' => 'required',
        'actions' => 'required',
    ];
    
    static public $messages = [
        'resource' => [
            'required' => 'Resource is required',
        ],
        'actions' => [
            'required' => 'Actions are required'  
        ]
    ];
}