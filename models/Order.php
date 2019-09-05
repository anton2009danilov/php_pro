<?php
namespace App\models;

/**
 * Class Order
 *@package App\models
 *
 *@method self getOne()
 *@method self[] getAll()
 */
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

