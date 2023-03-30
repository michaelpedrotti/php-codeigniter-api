<?php namespace App\Services;

use App\Models\UserModel as Model;
use Firebase\JWT\JWT;

class AuthenticationService {
     
    public function authenticate($email = '', $password = '') {
        
        $model = (new Model())->where('email', $email)->get()->getRow();
        
        if(empty($model)){
            
            throw new \Exception('E-mail was not found');
        }

        if(!password_verify($password, $model->password)){
            
            throw new \Exception('E-mail or Password were wrong');
        }
       
        unset($model->password);
        
        return $model;
    }
    
    public function generate($userId = 0){
        
        $key = getenv('JWT_SECRET');
        $iat = time();
        $exp = $iat + 3600;
 
        $payload = array(
            "iss" => "Issuer of the JWT",
            "aud" => "Audience that the JWT",
            "sub" => "Subject of the JWT",
            "iat" => $iat,
            "exp" => $exp,
            "id" => $userId,
        );
         
        return JWT::encode($payload, $key, 'HS256');
    }
    
    public function verify($token = '') {
        
        $key = getenv('JWT_SECRET');
        
        return JWT::decode($token, new Key($key, 'HS256'));
    }
    
    public function expires($token = ''){
        
        
    }
    
    
    static public function newInstance(): static {
        return new static();
    }
}