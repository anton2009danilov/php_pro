<?php
namespace App\main;
use App\services\renders\TwigRenderService;

class App
{
    private $config;

    public function run(array $config)
    {
        $this->config = $config;
        $this->runController();
    }

    private function runController()
    {
        $request = new \App\services\Request();
        $controllerName = $request->getControllerName() ?: $this->config['defaultNameController'];
        $actionName = $request->getActionName() ?: '';
        
        $controllerClass = 'App\\controllers\\' . ucfirst($controllerName) . 'Controller';
        
        if (class_exists($controllerClass)) {
            /**
             * @var $controller \App\controllers\UserController
             */
            $controller = new $controllerClass(new TwigRenderService(), $request);
            $controller->run($actionName);
            
        } else {
            echo '404 c';
        }
    }
}

