<?php
use App\services\Autoload;
use App\models\User;
use App\models\Good;

include dirname(__DIR__) . "/services/Autoload.php";
spl_autoload_register([new Autoload(), 'loadClass']);

$user = new User();
var_dump($user->getAll());
var_dump($user->getOne(1));

$user->fio = 'Иванов И.И.';
$user->login = 'Ivan2049';
$user->password = 'VaLeNki3841';


// $user->insert();
// $user->update();
// $user->save();
// $user->delete();

$user->getProperties();
// $user->fio = 'Иванов И.И.';
// $user->fio = 'Иванов И.И.';
// $good = new Good();
// var_dump(DB::getInstance());
// var_dump($good);
// var_dump($good->getOne(1));

