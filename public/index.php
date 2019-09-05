<?php
use App\services\Autoload;
use App\models\User;
use App\models\Good;
use App\controllers\GoodController;
use App\services\renders\TmplRenderService;
use App\services\renders\TwigRenderService;

include dirname(__DIR__) . "/vendor/autoload.php";

$controllerName = $_GET['c'] ?: 'user';
$actionName = $_GET['a'] ?: '';

$controllerClass = 'App\\controllers\\' . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)) {
    /**
     * @var $controller \App\controllers\UserController
     */
    $controller = new $controllerClass(new TwigRenderService());
    $controller->run($actionName);
    
} else {
    echo '404 c';
}