<?php
namespace App\controllers;

use App\services\renders\IRenderService;
use App\services\Request;
use App\services\DB;

class UserController extends CRUD
{

    public function getView()
    {
        return 'users';
    }
    
    public function getUpdateView()
    {
        return 'user_update';
    }

    public function getName()
    {
        return 'user';
    }

    public function getTitle()
    {
        return 'Пользователи';
    }
}

