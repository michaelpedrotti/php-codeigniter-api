<?php namespace App\Services;

class AuthorizationService {
    
    public function authenticate($email = '', $password = '') {
        
        
    }
    
    public function generate($userId = 0){}
    
    public function verify($token = '') {}
    
    public function expires($token = ''){
        
        
    }
    
    
    static public function newInstance(): static {
        return new static();
    }
}