<?php
namespace App\services;

class Autoload
{

    public function loadClass($className) {
//         var_dump($className);
//         var_dump(substr_replace($className, '', 0, 4));
        $str = substr_replace($className, '', 0, 4);
//         var_dump(dirname(__DIR__));
//         $file = dirname(__DIR__) . "/{$className}.php";
        $file = dirname(__DIR__) . "/{$str}.php";
        include $file;
    }
    
}

