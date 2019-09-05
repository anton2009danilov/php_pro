<?php
namespace App\controllers;

abstract class CRUD extends Controller
{

    public function allAction()
    {
        $params = [
            // $this->getView() => $this->getRepository()->getAll(),
            $this->getView() => $this->repository->getAll(),
            'title' => $this->getTitle(),
            'get' => $this->getId(),
            'value' => 'Данные из базы'
        ];

        echo $this->render($this->getView(), $params);
    }

    public function oneAction()
    {
//         var_dump($_POST);
        $id = $this->getId();
        var_dump($this->repository->getOne($id));
    }

    public function addAction()
    {
        // $entityClass = $this->getRepository()->getEntityClass();
        $entityClass = $this->repository->getEntityClass();
        $newObject = new $entityClass();
        $input = $_POST;
        foreach ($input as $key => $value) {
            $setProperty = 'set' . ucfirst($key);
            $newObject->$setProperty($value);
        }
        // $this->getRepository()->save($newObject);
        $this->repository->save($newObject);
        $name = $this->getName();
        header("Location: /{$name}");
    }

    public function deleteAction()
    {
        $id = $this->get('id');
        $entity = $this->repository->getOne($id);
        $this->repository->delete($entity);
        $name = $this->getName();
        header("Location: /{$name}");
    }

    public function updateAction()
    {
        $id = $this->getId();
        $updateObject = $this->repository->getOne($id);
        $params = $_POST;
        foreach ($params as $key => $value) {
            if ($value) {
                $setProperty = "set" . ucfirst($key);
                $updateObject->$setProperty($value);
            }
        }
        // $this->getRepository()->save($updateObject);
        $this->repository->save($updateObject);
        $name = $this->getName();
        header("Location: /{$name}");
    }
}

