<?php
// use models\User;
use App\services\Autoload;
use App\models\User;
use App\models\Good;
use App\services\DB;

include dirname(__DIR__) . "/services/Autoload.php";
spl_autoload_register([new Autoload(), 'loadClass']);


$user = new User(new DB());
var_dump($user);
// var_dump($user->getOne(12));

$good = new Good(new DB());
var_dump($good);
// var_dump($good->getOne(12));
var_dump($good->getCount([1,4,2,13]));
var_dump($good->calc([1,4,2,13]));

