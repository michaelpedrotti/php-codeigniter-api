<?php namespace App\Services;

/**
 * @link https://codeigniter4.github.io/api/classes/CodeIgniter-Database-MySQLi-Result.html
 */
class AuthorizationService {
    
    public function hasPermission($resource = 'user', $action = 'read', $userId = 0): bool{
        
        $db = db_connect();
        
        $action = getattr(config('Config\Authz')->permissions, $action, $action);

        $query = "SELECT 
                COUNT(*) as total 
            FROM user 
            INNER JOIN profile ON(user.profile_id = profile.id) 
            INNER JOIN permission ON(profile.id = permission.profile_id) 
            WHERE user.id = $userId   
            AND permission.resource = '$resource' 
            AND JSON_CONTAINS(permission.actions, json_quote('$action')) > 0";
        
        $row = $db->query($query)->getFirstRow();
        
        return $row->total > 0;
    }
    
    public function __construct() {
        
        helper('attribute');
    }
    
    static public function newInstance(): static {
        return new static();
    }
}