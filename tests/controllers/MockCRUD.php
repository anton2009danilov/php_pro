<?php
namespace App\tests\controllers;

use App\controllers\CRUD;
use App\controllers\Controller;
use App\repositories\Repository;

class MockCRUD extends CRUD
{
    protected $repository;
    
    public function setRepository($repository){
        $this->repository = $repository;
    }
    
    protected function getRepository(): Repository {
        return $this->repository;
    }
    
    public function getTitle(){
        return 'test';
    }
    public function getName(){}
    public function getView(){
        return 'tests';
    }
    
}

