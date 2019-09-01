<?php
namespace App\controllers;

abstract class Controller extends CRUD
{
    
    private $defaultAction = 'all';
    private $action;
    abstract public function getClass();
    abstract public function getView();
    
    
    public function run($actionName) {
        $this->action = $actionName ?: $this->defaultAction;
        $method = $this->action . 'Action';
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo '404 a';
        }
    }
    
    public function allAction() {
        
        $params = [
            $this->getView() => $this->getClass()->getAll(),
            'title' => 'Моя страница',
            'value' => 'Данные из базы'
        ];
        
        echo $this->render($this->getView(), $params);
        //         echo $a;
    }
    
    public function oneAction() {
        var_dump($_POST);
        var_dump($this->getClass()->getOne($_GET['id']));
    }
    
    public function render($template, $params = []){
        $content = $this->renderTmpl($template, $params);
        return $this->renderTmpl('layouts/main', ['content' => $content]);
    }
    
    public function renderTmpl($template, $params = []) {
        ob_start();
        extract($params);
        include dirname(__DIR__) . '/views/' . $template . '.php';
        return ob_get_clean();
    }
}

