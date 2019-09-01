<?php
namespace App\controllers;
use App\models\User;

class UserController extends CRUD
{
    public function getClass() {
        return new User();
    }
    
    public function getView() {
        return 'users';
    }
    
    public function getName() {
        return 'user';
    }
    
    public function getTitle() {
        return 'Пользователи';
    }
    
}

