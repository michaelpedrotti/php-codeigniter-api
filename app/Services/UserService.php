<?php namespace App\Services;

use App\Entities\UserEntity as Entity;

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
    
    public function find($id = 0, bool $includes = false): Entity {
        
        $entity = $this->model->find($id);
        
        if(empty($entity)){
            
            throw new \Exception('User was not found');
        }
        
        if($includes !== false){
            
            $entity->profile = ProfileService::newInstance(model('ProfileModel'))->find($entity->profile_id, $includes);
        }
        
        unset($entity->password);
                
        return $entity;
    }
    
    public function create($data = []): array {
        
        [ $password, $encrypt ] = password_generator();
        
        $data['password'] = $encrypt;
        
        $entity = new Entity($data);
        
        $this->model->save($entity);
             
        $entity->id = $this->model->getInsertID();
        
        unset($entity->password);
                
        return [ $entity, $password ];
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