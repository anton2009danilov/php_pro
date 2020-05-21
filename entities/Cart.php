<?php
namespace App\entities;

/**
 * Class Cart
 *@package App\entities
 *
 */
class Cart extends Entity
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

    public function getTableName(): string
    {
        return 'carts';
    }
    
}

