<?php
namespace App\models;

/**
 * Class Comment
 *@package App\models
 *
 *@method self getOne()
 *@method self[] getAll()
 */
class Comment extends Model
{
    public $id;
    public $item_id;
    public $name;
    public $comment;
    
    public function getTableName(): string
    {
        return 'comments';
    }
}

