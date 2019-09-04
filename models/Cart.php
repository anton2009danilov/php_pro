<?php
namespace App\models;

/**
 * Class Cart
 *@package App\models
 *
 *@method self getOne()
 *@method self[] getAll()
 */
class Cart extends Model
{
    public $id;
    public $user_id;
    public $session;
    public $quantity;
    
    public $params = [
        'id',
        'user_id',
        'session',
        'quantity',
    ];
    
    public function getTableName(): string
    {
        return 'carts';
    }
}

