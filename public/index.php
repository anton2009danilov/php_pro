<?php
use App\services\Autoload;
use App\models\User;
use App\models\Good;

include dirname(__DIR__) . "/services/Autoload.php";
spl_autoload_register([new Autoload(), 'loadClass']);

$user = new User();

$user->fio = 'Иванов И.И.';
$user->login = 'Ivan2059';
$user->password = 'VaLeNki32841';

var_dump($user->getOne(1));
var_dump($user->getAll());

// $user->insert();
// $user->update(3);
// $user->save();

// $user->fio = 'Иванов П.П.';
// $user->login = 'Piter2059';
// $user->password = 'VaLeNki32841';
// $user->save();

// $user->delete(4);

// $user->getProperties();
// $user->fio = 'Иванов И.И.';
// $user->fio = 'Иванов И.И.';
// $good = new Good();
// var_dump(DB::getInstance());
// var_dump($good);
// var_dump($good->getOne(1));

