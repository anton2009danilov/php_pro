<?php
namespace App\controllers;

// use App\models\Good;
use App\repositories\GoodRepository;
use App\services\renders\IRenderService;
use App\services\Request;


class GoodController extends CRUD
{

    protected $repository;

    public $params = [
        'id',
        'fio',
        'login',
        'password'
    ];

    public function __construct(IRenderService $renderer, Request $request)
    {
        parent::__construct($renderer, $request);
        $this->repository = new GoodRepository();
    }

    // public function getRepository() {
    // return new GoodRepository();
    // }
    public function getView()
    {
        return 'goods';
    }

    public function getName()
    {
        return 'good';
    }

    public function getTitle()
    {
        return 'Товары';
    }
}

