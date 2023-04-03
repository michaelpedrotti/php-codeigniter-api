<?php namespace App\Services;

class ProfileService {
    
    public function paginate(){}
    
    public function find($id = 0){}
    
    public function create($data = []){}
    
    public function update($data = [], $id = 0){}
    
    public function delete($id = 0){}
    
    static public function newInstance(): static {
        return new static();
    }
}