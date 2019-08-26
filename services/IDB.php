<?php
namespace App\services;

interface IDB
{
    /**
     * 
     * @param string $sql
     */
    public function find(string $sql, ?array $params = []);
    
    /**
     * 
     * @param string $sql
     */
    public function findAll(string $sql, ?array $params = []);
    
}

