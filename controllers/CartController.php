<?php
namespace App\controllers;


use App\repositories\CartRepository;
use App\services\renders\IRenderService;
use App\services\Request;
use App\services\DB;


class CartController extends CRUD
{
    
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
    

    public function allAction()
    {
        $name = $this->getName();
        $params = [
            $this->getView() => $this->db->$name->getAllWhere('session', session_id()),
            'title' => $this->getTitle(),
            'get' => $this->getId(),
            'session' => session_id(),
        ];
        if($_GET['update'] == true) {
            echo $this->render($this->getUpdateView(), $params);
        } else {
            echo $this->render($this->getView(), $params);
        }
        
    }
    
    public function oneAction()
    {
        $name = $this->getName();
        $session = $_GET['session'];
        
        $params = [
            $this->getView() => $this->db->$name->getAllWhere('session', $session),
            'title' => $this->getTitle(),
        ];
        
        echo $this->render($this->getView(), $params);
    }
    
    
    public function addToCartAction() {
        $item_id = $this->getId();
        
        if(empty($item_id)) {
            return $this->redirect('/');
        }
        
        $session = session_id();
        
        $name = $this->getName();
        $item = $this->db->$name->getItem($item_id, $session);

        
        if(!empty($item)) {
            $newObject = $this->db->$name->getItem($item_id, $session)[0];
            $quantity = $newObject->getQuantity() + 1;
            $newObject->setQuantity($quantity);
            
        } else {
            $entityClass = $this->db->$name->getEntityClass();
            $newObject = new $entityClass();
            $newObject->setItem_id($item_id);
            $newObject->setSession($session);
            $newObject->setQuantity(1);
        }
        
        $this->db->$name->save($newObject);
        
        return $this->redirect();
        
    }
    
    public function deleteFromCartAction() {
        $item_id = $this->getId();
        $session = session_id();
        $name = $this->getName();
        $item = $this->db->$name->getItem($item_id, $session);
        
        if(!empty($item)) {
            $newObject = $this->db->$name->getItem($item_id, $session)[0];
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
            $this->db->$name->delete($newObject);
        } else {
            $this->db->$name->save($newObject);
            
        }
        
        return $this->redirect();
        
    }
    
    

}

