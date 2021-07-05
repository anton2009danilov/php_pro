<?php
namespace App\controllers;


use App\repositories\CartRepository;
use App\services\renders\IRenderService;
use App\services\Request;


class CartController extends CRUD
{
    protected $repository;
    
    public $params = [
        'id',
        'item_id',
        'user_id',
        'session',
        'quantity',
    ];
    
    public function __construct(IRenderService $renderer, Request $request)
    {
        parent::__construct($renderer, $request);
        $this->repository = new CartRepository();
    }
    
    public function getView()
    {
        return 'cart';
    }
    
    public function getName()
    {
        return 'cart';
    }
    
    public function getTitle()
    {
        return 'Корзина';
    }
    
    public function addToCartAction() {
        $item_id = $this->getId();
        $session = session_id();
//         $cart = $this->repository->getAll();
        $item = $this->repository->getItem($item_id, $session);
//         var_dump($this->repository->getItem($item_id, $session));die;
//             var_dump($item); die;
        
        if(!empty($item)) {
            $newObject = $this->repository->getItem($item_id, $session)[0];
            $quantity = $newObject->getQuantity() + 1;
            $newObject->setQuantity($quantity);
        } else {
            $entityClass = $this->repository->getEntityClass();
            $newObject = new $entityClass();
            $newObject->setItem_id($id);
            $newObject->setSession($session);
            $newObject->setQuantity(1);
        }
        
        $this->repository->save($newObject);
        $name = $this->getName();
        header("Location: /{$name}");
        
    }

}

