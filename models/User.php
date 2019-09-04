<?php
namespace App\models;

/**
 * Class User
 *@package App\models
 *
 *@method self getOne()
 *@method self[] getAll()
 */
class User extends Model
{
    private $id;
    private $fio;
    private $login;
    private $password;
    
    public $params = [
        'id',
        'fio',
        'login',
        'password',
    ];
    
    /**
     * @return number
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFio()
    {
        return $this->fio;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $fio
     */
    public function setFio($fio)
    {
        $this->fio = $fio;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getTableName():string
    {
        return 'users';
    }
    
}


