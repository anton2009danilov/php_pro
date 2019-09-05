<?php
namespace App\models;

/**
 * Class Good
 *@package App\models
 *
 *@method self getOne()
 *@method self[] getAll()
 */
class Good extends Model
{
    public $id;
    public $file_name;
    public $views;
    public $likes;
    public $description;
    public $item_name;
    public $price;
    
    public function getTableName(): string
    {
        return 'goods';
    }

}

