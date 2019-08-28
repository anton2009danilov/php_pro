<?php
namespace App\controllers;
use App\models\Comment;

class CommentController extends Controller
{
    public function getClass() {
        return new Comment();
    }
    
    public function getView() {
        return 'comments';
    }
}

