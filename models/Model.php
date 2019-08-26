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
    
    public function getProperties() {
        $data = [];
        foreach ($this as $property => $propertyValue) {
            if ($property != "id" && $property != "db") {
                $data ["{$property}"] = $propertyValue;
            }
        }
        
        return $data;
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
        $sql = "DELETE FROM `{$this->getTableName()}` WHERE id = :id";
        $this->db->find($sql, [':id' => $id]);
    }
    
    public function save() {
        if (empty($this->id)) {
            $this->insert();
        } else {
            $this->update($this->id);
        }
    }
    
    public function insert() {
        $data = $this->getProperties();
        $params = [];
        $values = [];
        
        foreach ($data as $key => $val) {
            $params[] = "`{$key}`";
            $values[] = "'{$val}'";
        }
        
        $params = implode(',', $params);
        $values = implode(',', $values);
        
        $sql = "INSERT INTO `{$this->getTableName()}` ({$params}) VALUES ({$values})";
        $this->db->execute($sql);
        $this->id = $this->db->getLastId();
    }
    
    public function update($id) {
        $data = $this->getProperties();
        $params = [];
        
        foreach ($data as $param => $value) {
            $str = "`{$param}` = '{$value}'";
            $params[] = $str;
        }
        
        $params = implode(',', $params);
        
        $sql = "UPDATE `{$this->getTableName()}` SET {$params} WHERE id = :id";
        $this->db->execute($sql, [':id' => $id]);
        
    }
    
}

