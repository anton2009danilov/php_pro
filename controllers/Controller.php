<?php
namespace App\controllers;

use App\services\renders\IRenderService;

abstract class Controller
{
    
    protected  $defaultAction = 'all';
    protected $action;
    protected $renderer;
    
    abstract public function getClass();
    abstract public function getView();
    abstract public function getName();
    abstract public function getTitle();
    
    public function __construct(IRenderService $renderer) {
        $this->renderer = $renderer;
    }
        
    public function run($actionName) {
        $this->action = $actionName ?: $this->defaultAction;
        $method = $this->action . 'Action';
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo '404 a';
        }
    }
    
    public function render($template, $params = []){
        return $this->renderer->render($template, $params);
    }
}

