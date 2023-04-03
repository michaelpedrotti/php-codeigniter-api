<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
 
abstract class AbstractController extends ResourceController {
    
    use ResponseTrait;

    public function index() {

        return $this->respond(['error' => true, 'message' => 'index was not implemented']);
    }
 
    public function show($id = 0)  {
        
        return $this->respond(['error' => true, 'message' => 'show was not implemented']);
    }
 
    /**
     * 
     * alias create
     */
    public function new() {
        
        return $this->respond(['error' => true, 'message' => 'create was not implemented']);
    }
    
    public function create() {
        
        return $this->fail(lang('RESTful.notImplemented', ['create']), 501);
    }
    
    public function edit($id = null) {
        
        return $this->fail(lang('RESTful.notImplemented', ['edit']), 501);
    }


    public function update($id = 0) {
        
        return $this->respond(['error' => true, 'message' => 'update was not implemented']);
    }
 
    public function delete($id = 0) {
        
        return $this->respond(['error' => true, 'message' => 'delete was not implemented']);
    }
}