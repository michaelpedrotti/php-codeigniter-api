<?php namespace App\Services;

class PermissionService extends AbstractService  {
    
    public function paginate($filter = [], $columns = ['id', 'resource', 'actions']){

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
            
            throw new \Exception('Permission was not found');
        }
                
        return $row;
    }
    
    public function create($row = []){
                
        $row['id'] = $this->model->insert($row);
        

        return $row;
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