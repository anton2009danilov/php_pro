<?php
namespace App\models;

// use App\services\DB;
// use App\models\Model;

class User extends Model
{

    public function getTableName(): string
    {
        return 'users';
    }
    
}


