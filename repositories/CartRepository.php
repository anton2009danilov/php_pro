<?php
namespace App\repositories;

use App\entities\Cart;
use App\repositories\Repository;

class CartRepository extends Repository
{
    private $id;
    private $item_id;
    private $user_id;
    private $session;
    private $quantity;
    
    public $params = [
        'id',
        'item_id',
        'user_id',
        'session',
        'quantity',
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
    
    public function getItem($item_id, $session) {
            $sql = "SELECT * FROM `carts` WHERE item_id = $item_id AND session = '{$session}'";
            return $this->getDb()->queryObjects($sql, $this->getEntityClass());
    }
    

}

