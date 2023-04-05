<?php namespace App\Validators;

/**
 * 
 * @link https://codeigniter4.github.io/CodeIgniter4/libraries/validation.html
 */
class UserValidator {
    
    static public $rules = [
        
        'name' => 'required',
        'email' => 'required|valid_email',
    ];
    
    static public $messages = [
        
        'nome' => [
            'required' => 'Name is required',
        ],
        'email' => [
          'valid_email' => 'E-mail {field} is invalid'  
        ]
    ];
}