<?php
namespace App\entities;

/**
 * Class Order
 *@package App\entities
 *
 */
class Order extends Entity
{
    private $id;
    private $name;
    private $email;
    private $session;
    private $status;
    
    public $params = [
        'id',
        'name',
        'email',
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
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
    public function getStatus()
    {
        return $this->status;
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
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $session
     */
    public function setSession($session)
    {
        $this->session = $session;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @param multitype:string  $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    public function getTableName(): string
    {
        return 'orders';
    }
    
   

}

