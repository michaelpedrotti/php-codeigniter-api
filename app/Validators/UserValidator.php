<?php namespace App\Validators;

/**
 * 
 * @link https://codeigniter4.github.io/CodeIgniter4/libraries/validation.html
 */
class UserValidator {
    
    static public $rules = [
        
        'name' => 'required|max_length[255]',
        'email' => 'required|max_length[255]|valid_email|is_unique[user.email,id,{id}]',
        'profile_id' => 'required|integer'
    ];
    
    static public $messages = [
        
        'name' => [
            'required' => 'Name is required',
        ],
        'email' => [
            'required' => 'E-mail is required',
            'valid_email' => 'E-mail {field} is invalid',
            'is_unique' => 'E-mail is already in use'
        ]
    ];
}