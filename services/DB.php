<?php
namespace App\services;

class DB implements IDB
{
    public function find(string $sql)
    {
        return $sql;
    }
    
    public function findAll(string $sql)
    {
        return $sql;
    }
    
    public function query()
    {
        
    }

}

