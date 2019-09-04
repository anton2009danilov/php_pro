<?php
namespace App\controllers;

abstract class CRUD extends Controller
{
    public function allAction() {
        
        $params = [
            $this->getView() => $this->getRepository()->getAll(),
            'title' => $this->getTitle(),
            'get' => $_GET['id'],
            'value' => 'Данные из базы'
        ];
        
        echo $this->render($this->getView(), $params);
    }
    
    public function oneAction() {
        var_dump($_POST);
        var_dump($this->getRepository()->getOne($_GET['id']));
    }
    
    public function addAction() {
        $entityClass = $this->getRepository()->getEntityClass();
//         $newObject= $this->getRepository();
        $newObject= new $entityClass;
        $input = $_POST;
        foreach($input as $key => $value) {
            $setProperty = 'set' . ucfirst($key);
            $newObject->$setProperty($value);
        }
        $this->getRepository()->save($newObject);
        $name = $this->getName();
        header("Location: /?c={$name}");
    }
    
        public function deleteAction() {
            $repository= $this->getRepository();
            $id = $_GET['id'];
            $entity = $repository->getOne($id);
            $repository->delete($entity);
            header("Location: /?c=good");
        }
    
    public function updateAction() {
        $id = $_GET['id'];
        $this->id = $id;
        $updateObject = $this->getRepository()->getOne($id);
        $params = $_POST;
        foreach ($params as $key => $value) {
            if($value) {
                $setProperty = "set". ucfirst($key);
                $updateObject->$setProperty($value);
            }
        }
        $this->getRepository()->save($updateObject);
        $name = $this->getName();
        header("Location: /?c={$name}");
    }
}

