<?php namespace App\Services;

use App\Models\UserModel as Model;

class UserService extends AbstractService {
    
    protected $helpers = ['password'];
    
    public function paginate($filter = [], $columns = ['id', 'name', 'email', 'createdAt', 'updatedAt']){

        $builder = $this->_builder($columns);
        
        $this->_filter($builder, $filter);
        
        return [
            'rows' => $builder->get()->getResultArray(),
            'total' => $this->_foundRows(),
        ];
    }
    
    public function find($id = 0) {
        
        $row = $this->model->find($id);
        
        if(empty($row)){
            
            throw new \Exception();
        }
        
        unset($row['password']);
                
        return $row;
    }
    
    public function create($row = []){
                
        [ $password, $encrypt ] = password_generator();
        
        $row['password'] = $encrypt;

        $row['id'] = $this->model->insert($row);
        
        unset($row['password']);
        
        return [ $row, $password ];
    }
    
    public function update($data = [], $id = 0){
        
        $row = $this->find($id);

        $this->model->update($row['id'], $row);

        return $row;
    }
    
    public function delete($id = 0){
        
        $row = $this->find($id);
        
        $this->model->delete($row['id']);
        
        return $row;
    }
}