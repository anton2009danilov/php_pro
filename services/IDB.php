<?php
namespace App\services;

interface IDB
{
    /**
     * 
     * @param string $sql
     */
    public function find(string $sql);
    
    /**
     * 
     * @param string $sql
     */
    public function findAll(string $sql);
    
    public function query();

}

