<?php
namespace App\models;

use App\services\DB;

abstract class Model
{
    private $db;
    
    abstract public function getTableName():string;
    
    public function __construct()
    {
        $this->db = DB::getInstance();
    }
    
    public  function getOne($id)
    {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE id = :id";
        return $this->db->find($sql, [':id' => $id]);
    }
    
    public  function getAll()
    {   
        $sql = "SELECT * FROM `{$this->getTableName()}`";
        return $this->db->findAll($sql);
    }
    
    public function delete($id) {
       
    }
    
    public function save() {
        
    }
    
    public function insert() {

    }
    
    public function update() {

    }
    
}

