<?php
namespace App\models;

use App\services\DB;

/**
 * Class Model
 * @package App\models
 *
 * @property int $id
 */
abstract class Model
{
    /**
     * 
     * @var DB
     */
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
        return $this->db->queryObject($sql, get_called_class(),[':id' => $id]);
    }
    
    public  function getAll()
    {   
        $sql = "SELECT * FROM `{$this->getTableName()}`";
        return $this->db->queryObjects($sql, static::class);
    }
    
    public function delete() {
        $sql = "DELETE FROM `{$this->getTableName()}` WHERE id = :id";
        $this->db->execute($sql, [':id' => $this->id]);
    }
    
    public function save() {
        if (empty($this->id)) {
            $this->insert();
        } else {
            $this->update($this->id);
        }
    }
    
    private function insert() {
        $columns = [];
        $params = [];
        
        foreach ($this as $key => $value) {
            if ($key == 'db' ) {
                continue;
            }
            
                $columns[] = $key;
                $params[":{$key}"] = $value;
        }
        
        $columnsString = implode(', ', $columns);
        $placeholders = implode(', ', array_keys($params));
        
        $sql = "INSERT INTO `{$this->getTableName()}` ($columnsString) VALUES ($placeholders)";
        $this->db->execute($sql, $params);
        $this->id = $this->db->lastInsertId();
    }
    
    private function update() {
        
        $columns = [];
        $params = [];
        
        foreach ($this as $key => $value) {
            if ($key == 'db' ) {
                continue;
            }
            
            $columns[] = $key;
            $params[":{$key}"] = $value;
        }
        
        $values = [];
        $i = 0;
        foreach ($params as $key => $value) {
            
            if($key != ':id' && $i < count($params)) {
                    $values[] = "`$columns[$i]` = $key";
            }

            $i++;
            
        }
        
        $placeholders = implode(', ', $values);
        $sql = "UPDATE `{$this->getTableName()}` SET {$placeholders} WHERE id = :id";
        $this->db->execute($sql, $params);
    }
    
}

