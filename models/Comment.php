<?php
namespace App\models;

class Comment extends Model
{
    public function getTableName(): string
    {
        return 'comments';
    }
}

