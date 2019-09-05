<?php
namespace App\controllers;

use App\repositories\UserRepository;
use App\services\renders\IRenderService;
use App\services\Request;

class UserController extends CRUD
{

    protected $repository;

    public function __construct(IRenderService $renderer, Request $request)
    {
        parent::__construct($renderer, $request);
        $this->repository = new UserRepository();
    }

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

