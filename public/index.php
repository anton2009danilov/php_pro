<?php
use App\services\Autoload;
use App\models\User;
use App\models\Good;

include dirname(__DIR__) . "/services/Autoload.php";
spl_autoload_register([new Autoload(), 'loadClass']);

$controllerName = $_GET['c'] ?: 'user';
$actionName = $_GET['a'] ?: '';

$controllerClass = 'App\\controllers\\' . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)) {
    /**
     * @var $controller \App\controllers\UserController
     */
    $controller = new $controllerClass;
    $controller->run($actionName);
    
} else {
    echo '404 c';
}

// $good = new Good();
// $user1 = (new User)->getOne(1);
// $user2 = new User;

// $user2->fio = 'Петров М.Д.';
// $user2->login = 'Danila4000';
// $user2->password = 'ElKi';

// $user1->save();
// $user2->save();

// var_dump($user1);
// var_dump($user2);

