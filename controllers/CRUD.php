<?php
namespace App\controllers;

abstract class CRUD extends Controller
{

    public function allAction()
    {
        $name = $this->getName();
        $params = [
            $this->getView() => $this->db->$name->getAll(),
            'title' => $this->getTitle(),
            'get' => $this->getId(),
            'session' => session_id(),
        ];
        
        if($_GET['update'] == true) {
            echo $this->render($this->getUpdateView(), $params);
        } else if($_GET['create'] == true) {
            echo $this->render($this->getCreateView(), $params);
        }
        else {
            echo $this->render($this->getView(), $params);
        }
        
    }

    public function oneAction()
    {   
        $name = $this->getName();
        $id = $this->getId();
        var_dump($this->db->$name->getOne($id));
    }

    public function addAction()
    {
        $name = $this->getName();
        $entityClass = $this->db->$name->getEntityClass();
        $newObject = new $entityClass();
        $input = $_POST;
        foreach ($input as $key => $value) {
            $setProperty = 'set' . ucfirst($key);
            $newObject->$setProperty($value);
        }
        $this->db->$name->save($newObject);
        $name = $this->getName();
        $this->redirect();
    }

    public function deleteAction()
    {
        $name = $this->getName();
        $id = $this->get('id');
        $entity = $this->db->$name->getOne($id);
        $this->db->$name->delete($entity);
        $name = $this->getName();
        $this->redirect();
    }

    public function updateAction()
    {   
        $name = $this->getName();
        $id = $this->getId();
        $updateObject = $this->db->$name->getOne($id);
        $params = $_POST;
        foreach ($params as $key => $value) {
            if ($value) {
                $setProperty = "set" . ucfirst($key);
                $updateObject->$setProperty($value);
            }
        }
        $this->db->$name->save($updateObject);
        $name = $this->getName();
        $this->redirect("/");
        
    }
}

