<?php
use App\services\Autoload;
use App\models\User;
use App\models\Good;

include dirname(__DIR__) . "/services/Autoload.php";
spl_autoload_register([new Autoload(), 'loadClass']);

$controllerName = $_GET['c'] ?: 'user';
$actionName = $_GET['a'] ?: '';

$controllerClass = 'App\\controllers\\' . ucfirst($controllerName) . 'Controller';

// if (class_exists($controllerClass)) {
//     /**
//      * @var $controller \App\controllers\UserController
//      */
//     $controller = new $controllerClass;
//     $controller->run($actionName);
    
// } else {
//     echo '404 c';
// }



$user1 = new User;

$user1->fio = 'Петров М.Д.';
$user1->login = 'Danila4000';
$user1->password = 'ElKi';

// $user1->insert();
$user1->save();

var_dump($user1);

