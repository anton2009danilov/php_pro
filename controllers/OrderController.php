<?php
namespace App\controllers;
use App\models\Order;

class OrderController extends Controller
{
    public function getClass() {
        return new Order();
    }
    
    public function getView() {
        return 'orders';
    }
}

