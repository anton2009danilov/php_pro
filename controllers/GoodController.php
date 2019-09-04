<?php
namespace App\controllers;

// use App\models\Good;
use App\repositories\GoodRepository;

class GoodController extends CRUD
{
    public function getRepository() {
        return new GoodRepository();
    }
    
    public function getView() {
        return 'goods';
    }
    
    public function getName() {
        return 'good';
    }
    
    public function getTitle() {
        return 'Товары';
    }
    
}

