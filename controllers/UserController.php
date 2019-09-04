<?php
namespace App\controllers;
use App\models\User;
use App\repositories\UserRepository;

class UserController extends CRUD
{
    public function getRepository() {
        return new UserRepository();
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

