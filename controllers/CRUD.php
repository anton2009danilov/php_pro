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
            'value' => 'Данные из базы'
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
        header("Location: /{$name}");
    }

    public function deleteAction()
    {
        $name = $this->getName();
        $id = $this->get('id');
        $entity = $this->db->$name->getOne($id);
        $this->db->$name->delete($entity);
        $name = $this->getName();
        header("Location: /{$name}");
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
        // $this->getRepository()->save($updateObject);
        $this->db->$name->save($updateObject);
        $name = $this->getName();
        header("Location: /{$name}");
    }
}

