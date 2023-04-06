<?php namespace App\Controllers;
 
use CodeIgniter\API\ResponseTrait;
use App\Services\{ AuthenticationService as Service, UserService };


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
    
    public function edit(){

        $data = UserService::newInstance(model('UserModel'))->find($this->request->user);
        
        unset($data->profile_id);
        
        return $this->respond([
            'error' => false, 
            'data' => $data
        ]);
    }
    
    public function update(){
        
        $data = [];
        
        $name = $this->request->getPost('name');
        if(!empty($name)){
            $data['name'] = $name;
        }
        
        $email = $this->request->getPost('email');
        if(!empty($email)){
            $data['email'] = $email;
        }
        
        $pass = $this->request->getPost('password');
        if(!empty($pass)){
            $data['password'] = $pass;
        }
        
        if(empty($data)){
            
            return $this->respond([
                'error' => true,
                'message' => 'Notting was changed',
            ]);
        }
        else {
            
            $data = UserService::newInstance(model('UserModel'))->update($data, $this->request->user);
            
            return $this->respond([
                'error' => false,
                'message' => 'Settings were updated',
                'data' => $data
            ]);
        }
    }
    
    public function verify(){
        
        $json = ['error' => false, 'status' => 200];
        
        try {
            
            Service::newInstance()->verify($this->request->getPost('token'));
            
            $json['message'] = 'Token was verified';  
        } 
        catch (\Exception $e) {

            $json['error'] = true;
            $json['status'] = 500;
            $json['message'] = $e->getMessage();
        }
        
        return $this->respond($json, $json['status']);
    }
    
    public function me(){
        
        $data = UserService::newInstance(model('UserModel'))->find($this->request->user, true);
        
        unset($data->profile_id);
        
        foreach($data->profile->permissions as &$permission){
            
            unset($permission->profile_id);
        }
        
        
        return $this->respond([
            'error' => false, 
            'data' => $data
        ]);
    }
}