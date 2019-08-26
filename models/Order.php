<?php
namespace App\models;

class Order extends Model
{
    
    public $id;
    public $item_id;
    public $user_id;
    public $quantity;
    
    public function getTableName(): string
    {
        return 'orders';
    }
}

