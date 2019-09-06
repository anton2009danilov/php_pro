<?php
use App\services\renders\TwigRenderService;
include dirname(__DIR__) . "/vendor/autoload.php";

// try {
//     $request = new \App\services\Request();
// } catch (\Exception $exception) {
//     var_dump($exception->getMessage());
// }
$request = new \App\services\Request();
$controllerName = $request->getControllerName() ?: 'user';
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
