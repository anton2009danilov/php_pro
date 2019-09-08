<?php
namespace App\controllers;

use App\models\Order;

class OrderController extends CRUD
{

    public function getView()
    {
        return 'orders';
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
    
    public function createOrderAction() {
        $session = session_id();
        $name = $_POST['name'];
        $email= $_POST['email'];
        
        $className = $this->getName();
        $entityClass = $this->db->$className->getEntityClass();
        $newObject = new $entityClass();
        $newObject->setName($name);
        $newObject->setSession($session);
        $newObject->setEmail($email);
        $this->db->$className->save($newObject);
        $name = $this->getName();
        header("Location: /{$name}");
        
        session_regenerate_id(true);
        $session = session_id();
        
    }
    
    public function allAction()
    {
        $name = $this->getName();
        $params = [
            $this->getView() => $this->db->$name->getAllWhere('session', session_id()),
            'title' => $this->getTitle(),
            'get' => $this->getId(),
            'session' => session_id(),
            'value' => 'Данные из базы'
        ];
//         var_dump($params);die;
        if($_GET['update'] == true) {
            echo $this->render($this->getUpdateView(), $params);
        } else {
            echo $this->render($this->getView(), $params);
        }
    }
}

