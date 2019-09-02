<?php
namespace App\controllers;

abstract class CRUD extends Controller
{
    public function allAction() {
        
        $params = [
            $this->getView() => $this->getClass()->getAll(),
            'title' => $this->getTitle(),
            'get' => $_GET['id'],
            'value' => 'Данные из базы'
        ];
        
        echo $this->render($this->getView(), $params);
    }
    
    public function oneAction() {
        var_dump($_POST);
        var_dump($this->getClass()->getOne($_GET['id']));
    }
    
    public function addAction() {
        $newObject= $this->getClass();
        $input = $_POST;
        foreach($input as $key => $value) {
            $newObject->$key = $value;
        }
        $newObject->save();
        $name = $this->getName();
        header("Location: /?c={$name}");
    }
    
    //     public function deleteAction() {
    //         $newObject= $this->getClass();
    //         $id = $_GET['id'];
    //         $newObject->getOne($id)->delete();
    //         header("Location: /?c=good");
    //     }
    
    public function updateAction() {
        $id = $_GET['id'];
        $this->id = $id;
        $updateObject = $this->getClass()->getOne($id);
        $params = $_POST;
        foreach ($params as $key => $value) {
            if($value) {
                $updateObject->$key = $value;
            }
        }
        $updateObject->save();
        $name = $this->getName();
        header("Location: /?c={$name}");
    }
}

