<?php
namespace App\repositories;

use App\services\DB;
use App\entities\Entity;

/**
 * Class Repository
 * @package App\repositories
 */
abstract class Repository
{
    /**
     * 
     * @var DB
     */
    private $db;
    
    abstract public function getTableName():string;
    abstract public function getEntityClass():string;
    
    public function __construct()
    {
        $this->db = DB::getInstance();
    }
    
    public function getDb() {
        return  $this->db;
    }
    
    /**
     * @param $id
     * @return null|Entity
     */
    public  function getOne($id)
    {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE id = :id";
//         var_dump($this->getEntityClass());die;
        return $this->db->queryObject($sql, $this->getEntityClass(),[':id' => $id]);
    }
    
    public  function getAll()
    {   
        $sql = "SELECT * FROM `{$this->getTableName()}`";
        return $this->db->queryObjects($sql, $this->getEntityClass());
    }
    
    public function delete(Entity $entity) {
        $sql = "DELETE FROM `{$this->getTableName()}` WHERE id = :id";
        $this->db->execute($sql, [':id' =>  $entity->getId()]);
    }
    
    public function save($entity) {
        if (empty($entity->getId())) {
            $this->insert($entity);
        } else {
            $this->update($entity);
        }
    }
    
    private function insert($entity) {
        $columns = [];
        $params = [];
        foreach ($entity->params as $key => $value) {
            $getProperty = "get" . ucfirst($value);
            $columns[] = $value;
            $params[":{$value}"] = $entity->$getProperty();
        }
        
        $columnsString = implode(', ', $columns);
        $placeholders = implode(', ', array_keys($params));
        
        $sql = "INSERT INTO `{$this->getTableName()}` ($columnsString) VALUES ($placeholders)";
        $this->db->execute($sql, $params);
        $entity->setId($this->db->lastInsertId());
    }
    
    private function update($entity) {
        $columns = [];
        $params = [];

        foreach ($entity->params as $key => $value) {
            
            $getProperty = "get" . ucfirst($value);
            $columns[] = $value;
            $params[":{$value}"] = $entity->$getProperty();
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

