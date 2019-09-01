<?php
namespace App\controllers;

abstract class CRUD
{
    public function addAction() {
        $newObject= $this->getClass();
        $input = $_POST;
        foreach($input as $key => $value) {
            $newObject->$key = $value;
        }
        $newObject->save();
        header("Location: /?c=good");
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
        header("Location: /?c=good");
    }
}

