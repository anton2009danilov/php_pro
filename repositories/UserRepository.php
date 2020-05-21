<?php
namespace App\repositories;


use App\entities\User;
use App\repositories\Repository;

/**
 * Class UserRepository
 *@package namespace App\repositories;
 
 *
 *@method self getOne($id)
 *@method User[] getAll()
 *
 */
class UserRepository extends Repository
{
    public function getTableName():string
    {
        return 'users';
    }
    
    public function getEntityClass(): string {
        return User::class;
    }
    
}


