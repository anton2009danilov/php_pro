<?php
namespace App\controllers;

use App\models\Good;

class GoodController extends CRUD
{
    public function getClass() {
        return new Good();
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

