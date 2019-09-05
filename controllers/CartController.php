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
        
//         var_dump($item, $item_id, $session); die;
        
        if(!empty($item)) {
            $newObject = $this->repository->getItem($item_id, $session)[0];
            $quantity = $newObject->getQuantity() + 1;
            $newObject->setQuantity($quantity);
            
        } else {
            $entityClass = $this->repository->getEntityClass();
            $newObject = new $entityClass();
            $newObject->setItem_id($item_id);
            $newObject->setSession($session);
            $newObject->setQuantity(1);
//             var_dump($newObject);die;
        }
        
        $this->repository->save($newObject);
        $name = $this->getName();
        header("Location: /{$name}");
        
    }
    
    public function deleteFromCartAction() {
        $item_id = $this->getId();
        $session = session_id();

        $item = $this->repository->getItem($item_id, $session);
        
        if(!empty($item)) {
            $newObject = $this->repository->getItem($item_id, $session)[0];
            $quantity = $newObject->getQuantity() - 1;
            $newObject->setQuantity($quantity);
            
        } else {
            $entityClass = $this->repository->getEntityClass();
            $newObject = new $entityClass();
            $newObject->setItem_id($item_id);
            $newObject->setSession($session);
            $newObject->setQuantity(1);
        }

        if($newObject->getQuantity() == 0) {
            $this->repository->delete($newObject);
        } else {
            $this->repository->save($newObject);
            
        }
        
        
        $name = $this->getName();
        header("Location: /{$name}");
        
    }

}

