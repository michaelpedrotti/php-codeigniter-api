<?php namespace App\Controllers;
 
use App\Models\ProfileModel as Model;
use App\Services\ProfileService as Service;

class ProfileController extends AbstractController {
    
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
    
    public function new() {
        
        return $this->respond([
            'error' => false,
            'form' => (object)[]
        ]); 
    }
    
    public function create() {
        
        [ $data, $password ] = Service::newInstance($this->model)->create($this->request->getPost());
        
        return $this->respond(['error' => false, 'data' => $data, 'password' => $password]); 
    }
    
    public function show($id = 0) {
        
        $data = Service::newInstance($this->model)->find($id);
        
        return $this->respond([
            'error' => false, 
            'data' => $data
        ]); 
    }
    
    public function edit($id = null) {
        
        $data = Service::newInstance($this->model)->find($id);
        
        return $this->respond([
            'error' => false,
            'data' => $data,
            'form' => (object)[]
        ]); 
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