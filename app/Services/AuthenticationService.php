<?php namespace App\Services;

class AuthenticationService {
    
    
    public function hasPermission($resource = 'user', $action = 'read', $userId = 0){
        
        
    }
    
    static public function newInstance(): static {
        return new static();
    }
}