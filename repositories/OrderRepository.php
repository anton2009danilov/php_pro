<?php
namespace App\repositories;

use App\entities\Order;
use App\repositories\Repository;

class OrderRepository extends Repository
{

    public function getEntityClass(): string {
        return Order::class;
    }
    
    public function getTableName(): string
    {
        return 'orders';
    }
    
    public  function getAllWhere($param, $value)
    {
        $sql = "
            SELECT `orders`.`id`, `orders`.`name`, `email`, `orders`.`session`, `status` 
            FROM `orders`
            LEFT JOIN `carts`
            ON orders.session = carts.session;
    ";
        return $this->getDb()->queryObjects($sql, $this->getEntityClass());
    }
    
    public function getItem($item_id, $session) {
            $sql = "SELECT * FROM `carts` WHERE item_id = $item_id AND session = '{$session}'";
            return $this->getDb()->queryObjects($sql, $this->getEntityClass());
    }
    

}

