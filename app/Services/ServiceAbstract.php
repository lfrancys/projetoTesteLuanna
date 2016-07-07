<?php
namespace App\Services;

use App\Entities\Produtos;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


abstract class ServiceAbstract{

    protected $db;
    protected $entity;

    abstract protected function makeEntity();

    function __construct(DatabaseManager $db)
    {
        $this->db = $db;
        $this->entity = app($this->makeEntity());
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
            /*$this->entity = app($this->makeEntity())->find($id);
            DB::enableQueryLog();
            $this->entity->update($data);
            //$updated->update($data);
            dd(app($this->makeEntity())->find($id));*/

            $produto = Produtos::find(37);
            $produto['nome'] = 'MERDA';
            $produto->save();

            die(print_r($produto));

            $this->db->commit();

        }catch (\Exception $e){
            $this->db->rollback();
            throw $e;

            //die(print_r(DB::getQueryLog()));
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

     public function __call($method, $arguments)
     {

         if(method_exists($this, $method)) return call_user_func_array([$this, $method], $arguments);
         return call_user_func_array([$this->entity, $method], $arguments);
     }
}