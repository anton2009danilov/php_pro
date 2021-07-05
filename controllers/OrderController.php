<?php
namespace App\controllers;

use App\models\Order;

class OrderController extends CRUD
{

    public function getClass()
    {
        return new Order();
    }

    public function getView()
    {
        return 'orders';
    }

    public function getName()
    {
        return 'order';
    }

    public function getTitle()
    {
        return 'Заказы';
    }

    public function getRepository()
    {}
}

