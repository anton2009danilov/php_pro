<?php
namespace App\controllers;

use App\models\Order;

class OrderController extends CRUD
{

    public function getView()
    {
        return 'orders';
    }
    
    public function getUpdateView()
    {
        return 'order_update';
    }
    
    public function getCreateView()
    {
        return 'order_create';
    }

    public function getName()
    {
        return 'order';
    }

    public function getTitle()
    {
        return 'Заказы';
    }
    
    public function createAction() {
        $session = session_id();
        $name = $this->request->post('name');
        $email= $this->request->post('email');
        
        $className = $this->getName();
//         $entityClass = $this->db->{$this->getName()}->getEntityClass();
        $entityClass = $this->db->$className->getEntityClass();
        $newObject = new $entityClass();
        $newObject->setName($name);
        $newObject->setSession($session);
        $newObject->setEmail($email);
        $this->db->$className->save($newObject);
        $name = $this->getName();
        
        header("Location: /{$name}");
        session_regenerate_id(true);
        
    }
    
    public function allAction()
    {
        
        $name = $this->getName();
        $params = [
            $this->getView() => $this->db->$name->getAll(),
            'title' => $this->getTitle(),
            'get' => $this->getId(),
            'session' => session_id(),
        ];
        
        if($this->request->get('update') == true) {
            echo $this->render($this->getUpdateView(), $params);
        } else if($this->request->get('create') == true) {
            echo $this->render($this->getCreateView(), $params);
        }
        else {
            echo $this->render($this->getView(), $params);
        }
    }
    
}

