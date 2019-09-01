<?php
namespace App\controllers;

use App\models\Good;

class GoodController extends Controller
{
    public function getClass() {
        return new Good();
    }
    
    public function getView() {
        return 'goods';
    }
}

