<?php
namespace App\models;

class User extends Model
{

    public function getTableName(): string
    {
        return 'users';
    }
    
}

