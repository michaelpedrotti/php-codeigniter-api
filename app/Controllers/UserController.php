<?php namespace App\Controllers;

use App\Models\UserModel as Model;
use App\Services\UserService as Service;

class UserController extends AbstractController {

    protected $modelName = Model::class;
    
    public function index() {
          
        try {
        
            $result = Service::newInstance($this->model)->paginate($this->request->getGet());
        
            return $this->respond($result); 
        }
        catch(\Exception $e){
            
            return $this->fail($e->getMessage(), $e->getCode(), __FUNCTION__);
        } 
    }
    
    public function create() {
        
        [ $data, $password ] = Service::newInstance($this->model)->create($this->request->getPost());
        
        return $this->respond(['error' => false, 'data' => $data, 'password' => $password]); 
    }
    
    public function update($id = 0) {
        
        $data = Service::newInstance($this->model)->update($this->request->getRawInput(), $id);
        
        return $this->respond(['error' => false, 'data' => $data]); 
    }
    
    public function delete($id = 0) {
        
        $data = Service::newInstance($this->model)->delete($id);
        
        return $this->respond(['error' => false, 'data' => $data]); 
    }
}