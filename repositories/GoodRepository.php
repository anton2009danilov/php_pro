<?php
namespace App\repositories;

use App\entities\Good;
use App\repositories\Repository;

class GoodRepository extends Repository
{
    
    public function getEntityClass(): string {
        return Good::class;
    }
    
    public function getTableName(): string
    {
        return 'goods';
    }
    
}

