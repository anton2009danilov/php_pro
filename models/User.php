<?php
namespace App\models;

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
    
    public function getProperties() {
        foreach ($this as $property => $propertyValue) {
            if ($property != "id")
                echo "$property => $propertyValue <br>";
        }
    }
    
}


