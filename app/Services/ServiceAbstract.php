<?php
namespace App\Services;

use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Model;


abstract class ServiceAbstract{

    protected $db;

    abstract protected function makeEntity():Model;

    function __construct(DatabaseManager $db)
    {
        $this->db = $db;
        $this->entity = $this->makeEntity();
    }

    public function __call($method, $arguments)
    {
        if(method_exists($this, $method)) return call_user_func_array([$this, $method], $arguments);
        return call_user_func_array([$this->entity, $method], $arguments);
    }

    public function all(){
        return $this->entity->all();
    }

    public function create(array $data){

        try{
            $this->db->beginTransaction();
            $entity = $this->entity->create($data);
            $this->db->commit();
        }catch (\Exception $e){
            $this->db->rollback();
            throw $e;
        }

        return $entity;

    }

    public function update(array $data, $id){
        try{
            $this->db->beginTransaction();
            $this->entity->find($id)->update($data);
            $this->db->commit();
            return $this->entity->find($id);
        }catch (\Exception $e){
            $this->db->rollback();
            throw $e;
        }
    }

    public function destroy($id){
        try{
            $this->db->beginTransaction();
            $this->entity->destroy($id);
            $this->db->commit();
        }catch (\Exception $e){
            $this->db->rollback();
            throw $e;
        }
    }

}