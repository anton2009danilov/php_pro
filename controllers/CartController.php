<?php
namespace App\controllers;

use App\models\Cart;

class CartController extends CRUD
{

    public function getClass()
    {
        return new Cart();
    }

    public function getView()
    {
        return 'carts';
    }

    public function getName()
    {
        return 'cart';
    }

    public function getTitle()
    {
        return 'Корзина';
    }

    public function getRepository()
    {}
}

