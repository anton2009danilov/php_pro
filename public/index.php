<?php
use App\services\Autoload;
use App\models\User;
use App\models\Good;
use App\controllers\GoodController;
use App\services\renders\TmplRenderService;
use App\services\renders\TwigRenderService;

// include dirname(__DIR__) . "/services/Autoload.php";
include dirname(__DIR__) . "/vendor/autoload.php";

// $loader = new \Twig\Loader\ArrayLoader([
//     'index' => 'Hello {{ name }}!',
// ]);
// $twig = new \Twig\Environment($loader);

// echo $twig->render('index', ['name' => 'Fabien']);


// $loader = new \Twig\Loader\FilesystemLoader(['../views/', '../views/layouts/']);
// $twig = new \Twig\Environment($loader);
// $template = $twig->load('new.html');
// echo $twig->render('new.html', ['Title' => 'Товары', 'go' => 'here']);
// die;


// spl_autoload_register([new Autoload(), 'loadClass']);

$controllerName = $_GET['c'] ?: 'user';
$actionName = $_GET['a'] ?: '';

$controllerClass = 'App\\controllers\\' . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)) {
    /**
     * @var $controller \App\controllers\UserController
     */
//     $controller = new $controllerClass(new TmplRenderService());
    $controller = new $controllerClass(new TwigRenderService());
    $controller->run($actionName);
    
} else {
    echo '404 c';
}