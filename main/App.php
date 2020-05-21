<?php
namespace App\main;
use App\services\renders\TwigRenderService;
use App\traits\TSingleton;

/**
 * Class App 
 * $package App/main
 * 
 * @property DB db
 * @property TwigRenderService renderer
 * @property Request request
 */
class App
{
    use TSingleton;
    
    private $config;
    private $components = [];
    
    static public function call(): App {
        return static::getInstance();
    }

    public function run(array $config)
    {
        $this->config = $config;
        $this->runController();
    }
    
    private function runController()
    {
        $request = App::call()->request;
        $controllerName = $request->getControllerName() ?: $this->config['defaultNameController'];
        $actionName = $request->getActionName() ?: '';
        $controllerClass = 'App\\controllers\\' . ucfirst($controllerName) . 'Controller';
        
        if (class_exists($controllerClass)) {
            /**
             * @var $controller \App\controllers\UserController
             */
            $controller = new $controllerClass(
                App::call()->renderer,
                $request,
                App::call()->db
                );
            $controller->run($actionName);
            
        } else {
            echo '404 c';
        }
    }
    
    public function __get(string $name) {
        if (array_key_exists($name, $this->components)) {
            return $this->components[$name];
        }
        
        if (!array_key_exists($name, $this->config['components'] )) {
            return null;
        }
        
        $class = $this->config['components'][$name]['class'];
        if(!class_exists($class)){
            return null;
        }
        
        if (array_key_exists('config', $this->config['components'][$name])) {
            $config = $this->config['components'][$name]['config'];
            $component = new $class($config);
        } else {
            $component =  new $class();
        }
        
        $this->components[$name] = $component;
        return $component;
        
    }
}

