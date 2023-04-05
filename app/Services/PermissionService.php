<?php namespace App\Services;

use App\Entities\PermissionEntity as Entity;

class PermissionService extends AbstractService  {
    
    public function paginate($filter = [], $columns = ['id', 'resource', 'actions']){

        $builder = $this->_builder($columns);
        
        $this->_filter($builder, $filter);
        
        return [
            'rows' => $builder->get()->getResultArray(),
            'total' => $this->_foundRows(),
        ];
    }
    
    public function find($id = 0): Entity {
        
        $row = $this->model->find($id);
        
        if(empty($row)){
            
            throw new \Exception('Permission was not found');
        }
                
        return $row;
    }
    
    public function create($data = []): Entity {
                
        $entity = new Entity($data);
             
        $this->model->save($entity);
        
        $entity->id = $this->model->getInsertID();
        
        return $entity;
    }
    
    public function update($data = [], $id = 0): Entity {
        
        $entity = $this->find($id);
        $entity->fill($data);
        
        $this->model->save($entity);

        return $entity;
    }
    
    public function delete($id = 0): Entity {
        
        $entity = $this->find($id);        
        
        $this->model->delete($entity->id);

        return $entity;
    }
}