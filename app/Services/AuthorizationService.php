<?php namespace App\Services;


class AuthorizationService {
    
    public function hasPermission($resource = 'user', $action = 'read', $userId = 0): bool{
        
        return true;
    }
    
    static public function newInstance(): static {
        return new static();
    }
}