<?php
namespace App\repositories;

use App\entities\Order;
use App\repositories\Repository;

class OrderRepository extends Repository
{
    private $id;
    private $name;
    private $email;
    private $session;
    private $status;
    
    public $params = [
        'id',
        '$name',
        '$email',
        'session',
        'status',
    ];
    

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getItem_id()
    {
        return $this->item_id;
    }

    /**
     * @return mixed
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return multitype:string 
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $item_id
     */
    public function setItem_id($item_id)
    {
        $this->item_id = $item_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @param multitype:string  $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    /**
     * @param mixed $session
     */
    public function setSession($session)
    {
        $this->session = $session;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    
    
    
    public function getEntityClass(): string {
        return Order::class;
    }
    
    public function getTableName(): string
    {
        return 'orders';
    }
    
    public  function getAll()
    {
        $sql = "
            SELECT `orders`.`id`, `orders`.`name`, `email`, `orders`.`session`, `status`, `carts`.`id` as `cart_id`
            FROM `orders`
            LEFT JOIN `carts`
            ON orders.session = carts.session;
    "; 
        return $this->getDb()->queryObjects($sql, $this->getEntityClass());
    }
    
    public  function getAllWhere($param, $value)
    {
        $sql = "
            SELECT `orders`.`id`, `orders`.`name`, `email`, `orders`.`session`, `status`, `carts`.`id` as `cart_id`
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

