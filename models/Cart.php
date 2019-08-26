<?php
namespace App\models;

class Cart extends Model
{
    public $id;
    public $user_id;
    public $session;
    public $quantity;
    
    
    public function getTableName(): string
    {
        return 'carts';
    }
}

