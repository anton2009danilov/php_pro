<?php
namespace App\repositories;

use App\entities\Cart;
use App\repositories\Repository;

class CartRepository extends Repository
{
    public function getEntityClass(): string {
        return Cart::class;
    }
    
    public function getTableName(): string
    {
        return 'carts';
    }
    
    public  function getAll()
    {
        $sql = "
            SELECT `carts`.`id`, `item_id`, `user_id`, `session`, `quantity`, `item_name`, `price`
            FROM `carts`
            LEFT JOIN `goods`
            ON carts.item_id = goods.id;
    ";
        return $this->getDb()->queryObjects($sql, $this->getEntityClass());
    }
    
    public  function getAllWhere($param, $value)
    {
        
        $sql = "
            SELECT `carts`.`id`, `item_id`, `user_id`, `session`, `quantity`, `item_name`, `price`
            FROM `carts`
            LEFT JOIN `goods`
            ON carts.item_id = goods.id
            WHERE `$param` = '$value'
    ";
        return $this->getDb()->queryObjects($sql, $this->getEntityClass());
    }
    
    public function getItem($item_id, $session) {
        $sql = "SELECT * FROM `carts` WHERE item_id = $item_id AND session = '$session'";
//         $sql = "SELECT * FROM `carts` WHERE item_id = :$item_id AND session = ':$session'";
//         var_dump($sql); die;
        return $this->getDb()->queryObjects($sql, $this->getEntityClass());
    }
    

}

