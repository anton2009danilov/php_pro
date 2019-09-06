<?php
namespace App\controllers;

use App\repositories\GoodRepository;
use App\services\renders\IRenderService;
use App\services\Request;
use App\services\DB;


class GoodController extends CRUD
{

    public $params = [
        'id',
        'fio',
        'login',
        'password'
    ];


    public function getView()
    {
        return 'goods';
    }
    
    public function getUpdateView()
    {
        return 'good_update';
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

