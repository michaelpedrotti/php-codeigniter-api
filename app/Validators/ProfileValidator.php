<?php namespace App\Validators;

/**
 * 
 * @link https://codeigniter4.github.io/CodeIgniter4/libraries/validation.html
 */
class ProfileValidator {
    
    static public $rules = [
        
        'name' => 'required',
    ];
    
    static public $messages = [
        
        'name' => [
            'required' => 'Name is required',
        ]
    ];
}