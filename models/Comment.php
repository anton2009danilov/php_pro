<?php
namespace App\models;

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

