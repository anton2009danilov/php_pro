<?php
namespace App\tests\controllers;

use PHPUnit\Framework\TestCase;
use App\services\renders\TwigRenderService;
use App\services\Request;
use App\services\DB;
use App\repositories\UserRepository;

class CRUDTest extends TestCase
{
    public function testAllAction() {
        
        $renderer = $this->getMockBuilder(TwigRenderService::class)
        ->disableOriginalConstructor()
        ->getMock();
        
        $request = $this->getMockBuilder(Request::class)
        ->disableOriginalConstructor()
        ->getMock();
        
        $db = $this->getMockBuilder(DB::class)
        ->disableOriginalConstructor()
        ->getMock();
        //         $renderer, Request $request, DB $db
        $CRUD = new MockCRUD($renderer, $request, $db);
        
        $userMockRepository = $this->getMockBuilder(UserRepository::class)
        ->disableOriginalConstructor()
        ->getMock();
        
        $CRUD->setRepository($userMockRepository);
        
        $this->assertEquals($CRUD->allAction(), null);
//         $CRUD->allAction();
    }
}

