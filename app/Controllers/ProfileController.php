<?php namespace App\Controllers;
 
use App\Models\ProfileModel as Model;
use App\Services\ProfileService as Service;
use App\Validators\ProfileValidator as Validator;

class ProfileController extends AbstractController {
    
    protected $modelName = Model::class;
    
    public function index() {
          
        $result = Service::newInstance($this->model)->paginate($this->request->getGet());
        
        return $this->respond($result); 
    }
    
    public function new() {
        
        return $this->respond([
            'error' => false,
            'form' => (object)[]
        ]); 
    }
    
    public function create() {
        
        if(!$this->validate(Validator::$rules, Validator::$messages)){
                        
            return $this->respondBadRequest();
        }
                
        $data = Service::newInstance($this->model)->create($this->getBody());
        
        return $this->respond([
            'error' => false, 
            'data' => $data
        ], $this->codes['created']); 
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
        
        if(!$this->validate(Validator::$rules, Validator::$messages)){
                        
            return $this->respondBadRequest();
        }
        
        $data = Service::newInstance($this->model)->update($this->getBody(), $id);
        
        return $this->respond(['error' => false, 'data' => $data]); 
    }
    
    public function delete($id = 0) {
        
        $data = Service::newInstance($this->model)->delete($id);
        
        return $this->respond(['error' => false, 'data' => $data]); 
    }
}