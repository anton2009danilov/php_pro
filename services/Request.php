<?php
namespace App\services;

class Request
{
    protected $requestString;
    protected $controllerName;
    protected $actionName;
    protected $params;
    
    public function __construct() {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
        

//         try {
//             throw new \Exception('Новая');
//         } catch (ExQuery $exception) {
//             var_dump($exception->getMessage());
//         } catch (ExConnect $exception) {
//             var_dump($exception->getMessage());
//         } catch (\Exception $exception) {
//             var_dump($exception->getMessage());
//         } finally {
//             echo 'Ok';
//         }
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

}


// class Ex extends \Exception {
//     public function get() {
//       echo "Новая ошибка";
//     }
     
// }
// class ExConnect extends \Exception {
//     public function get() {
//       echo "ошибка ExConnect";
//     }
     
// }
// class ExQuery extends \Exception {
//     public function get() {
//       echo "ошибка ExQuery";
//     }
     
// }
