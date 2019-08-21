<?php
namespace App\models;

use App\services\CalcRows;

// use App\services\DB;
// use App\models\Model;

class Good extends Model
{
    use CalcRows;
    
    public function getTableName(): string
    {
        return 'goods';
    }

    public function getCount($array)
    {
        return $this->calc($array);
    }
    
}

