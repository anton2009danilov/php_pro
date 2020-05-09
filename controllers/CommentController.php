<?php
namespace App\controllers;

use App\models\Comment;

class CommentController extends CRUD
{

    public function getView()
    {
        return 'comments';
    }
    
    public function getName()
    {
        return 'comment';
    }
    
    public function getTitle()
    {
        return 'Отзывы';
    }
}

