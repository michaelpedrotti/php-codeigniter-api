<?php namespace App\Controllers;
 
use CodeIgniter\API\ResponseTrait;
use App\Services\AuthenticationService as Service;


class AuthController extends \CodeIgniter\RESTful\BaseResource {
    
    use ResponseTrait;
    
    public function login() {

        $json = ['error' => false];
        
        try {
            
            $email = $this->request->getPost('email');
            $pass = $this->request->getPost('password');
            $service = Service::newInstance();
            
            $user = $service->authenticate($email, $pass);
            $token = $service->generate($user->id);
            
            $json['data'] = [
                'token' => $token
            ];
            
        }
        catch(\Exception $e) {
            
            $json['error'] = true;
            $json['message'] = $e->getMessage();
            $json['trace'] = $e->getTraceAsString();
            
        }
        
        return $this->respond($json);
    }
}