<?php namespace App\Services;

abstract class AbstractService {
    
    /**
     * @var \CodeIgniter\Model
     */
    protected $model;
    
    protected $helpers = [];
    
    protected function _foundRows(){
        
        return \Config\Database::connect()->query('SELECT FOUND_ROWS() AS total')->getFirstRow()->total;
    }
    
    /**
     * @param \CodeIgniter\Model $builder
     */
    protected function _filter(\CodeIgniter\Model $builder, $params): void {
        
        $builder->offset(0)->limit(10); 
    }
    
    protected function _builder($columns = ['*']){
        
        return $this->model->select('SQL_CALC_FOUND_ROWS '.implode(',', $columns), false);
    }

    public function find($id = 0) {
        
        return [];
    }
    
    public function create($data = []) {
        
        return [];
    }
    
    public function update($data = [], $id = 0){
        
        return [];
    }
    
    public function delete($id = 0){
        
        return [];
    }
    
    public function __construct(\CodeIgniter\Model $model) {
        
        foreach($this->helpers as $helper){
            
            helper($helper);
        }
        
        $this->model = $model;
    }
    
    static public function newInstance(\CodeIgniter\Model $model): static {
        return new static($model);
    }
}