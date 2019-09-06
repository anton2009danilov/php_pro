<?php
namespace App\services;

class Request
{
    protected $requestString;
    protected $controllerName;
    protected $actionName;
    protected $params;
    
    public function __construct() {
        session_start();
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
    }
    
    protected function parseRequest() {
        $pattern = "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui";
        if (preg_match_all($pattern, $this->requestString, $matches)) {
            $this->controllerName = $matches['controller']['0'];
            $this->actionName = $matches['action']['0'];
            $this->params = [
                'post' => $_POST,
                'get' => $_GET,
            ];
            
        }
    }
    
    public function get($val = '') {
        if (empty($val)){
            return $this->params['get'];
        }
    
        if (isset($this->params['get'][$val])) {
            return $this->params['get'][$val];
        }
        
        return null;
    }
    
    
    
    /**
     * @return mixed
     */
    public function getRequestString()
    {
        return $this->requestString;
    }

    /**
     * @return mixed
     */
    public function getControllerName()
    {
        return $this->controllerName;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->actionName;
    }

    /**
     * @return multitype:unknown 
     */
    public function getParams()
    {
        return $this->params;
    }
    
//     public function getSession($key = null) {
//         if (empty($key)){
//             return $_SESSION;
//         }
        
//         return !empty($_SESSION['key'])
//             ? $_SESSION['key']
//             : [];
//     }
    
//     public function setSession ($key, $value) {
//         $_SESSION['key'] = $value;
//     }
    
    public function redirect($path = null) {
        if (empty($path)) {
            $path = $_SERVER['HTTP_REFERER'];
        }
        
        header('Location: ' . $path);
    }

}