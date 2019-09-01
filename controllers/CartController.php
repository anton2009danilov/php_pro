<?php
namespace App\controllers;
use App\models\Cart;

class CartController extends Controller
{
    public function getClass() {
        return new Cart();
    }
    
    public function getView() {
        return 'carts';
    }
}

