<?php
namespace App\models;

class Order extends Model
{
    public function getTableName(): string
    {
        return 'orders';
    }
}

