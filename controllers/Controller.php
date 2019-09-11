<?php
namespace App\controllers;

use App\services\renders\IRenderService;
use App\services\Request;
use App\services\DB;
use App\main\App;

abstract class Controller
{

    protected $defaultAction = 'all';
    protected $action;
    protected $renderer;
    protected $request;
    protected $db;

    // abstract public function getClass();
    // abstract public function getRepository();
    abstract public function getView();

    abstract public function getName();

    abstract public function getTitle();

    public function __construct(IRenderService $renderer, Request $request, DB $db)
    {
        $this->renderer = $renderer;
        $this->request = $request;
        $this->db = $db;
        
//         App::call()->db->getRepository('Good');
    }

    public function run($actionName)
    {
        $this->action = $actionName ?: $this->defaultAction;
        $method = $this->action . 'Action';
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo '404 a';
        }
        
    }

    public function render($template, $params = [])
    {   
        return $this->renderer->render($template, $params);
    }
    
    public function get($value = '') {
        return $this->request->get($value);
    }
    
    public function getId() {
        return (int) $this->request->get('id');
    }
    
    public function getSession() {
        return (int) $this->request->get('session');
    }
    
    public function redirect($path = null) {
        $this->request->redirect($path);
    }
    
    
}

