<?php
namespace App\controllers;
use App\models\User;

class UserController
{
    
    private $defaultAction = 'all';
    private $action;

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
            'users' => (new User)->getAll(),
            'title' => 'Моя страница'
        ];
        
        echo $this->render('users', $params);
//         echo $a;
    }
    
    public function oneAction() {
        var_dump((new User)->getOne($_GET['id']));
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

