<?php namespace App\Services;

use App\Entities\ProfileEntity as Entity;

class ProfileService extends AbstractService {
    
    public function paginate($filter = [], $columns = ['id', 'name']){

        $builder = $this->_builder($columns);
        
        $this->_filter($builder, $filter);
        
        return [
            'rows' => $builder->get()->getResultArray(),
            'total' => $this->_foundRows(),
        ];
    }
    
    public function find($id = 0, bool $includes = false): Entity {
        
        $entity = $this->model->find($id);
        
        if(empty($entity)){
            
            throw new \Exception('Profile was not found');
        }
        
        if($includes !== false){
            
            $entity->permissions = PermissionService::newInstance(model('PermissionModel'))->find($entity->id);
        }
                
        return $entity;
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