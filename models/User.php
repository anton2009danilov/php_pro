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
    public $id;
    public $fio;
    public $login;
    public $password;
    
    public function getTableName():string
    {
        return 'users';
    }
    
}


