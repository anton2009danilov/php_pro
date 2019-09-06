<?php
namespace App\controllers;

use App\repositories\UserRepository;
use App\services\renders\IRenderService;
use App\services\Request;
use App\services\DB;

class UserController extends CRUD
{

    public function getRepository()
    {
        return new UserRepository();
    }

    public function getView()
    {
        return 'users';
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

