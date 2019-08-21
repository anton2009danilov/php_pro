<?php
namespace App\models;
use App\services\IDB;

abstract class Model
{
    private $db;
    
    /**
     * Описание метода 
     * 
     * @return string 
     */
    abstract public function getTableName():string;
    
    public function __construct(IDB $db)
    {
        $this->db = $db;
    }
    
    public  function getOne($id)
    {
        $sql = "SELECT * FROM `{$this->getTableName()}` WHERE id = {$id}";
        return $this->db->find($sql);
    }
    
    public  function getAll()
    {
        $sql = "SELECT * FROM `{$this->getTableName()}`";
        return $this->db->findAll($sql);
    }
}

