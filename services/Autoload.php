<?php
namespace App\services;

class Autoload
{

    public function loadClass($className) {
//         var_dump(explode('\\', $className, 2));
        $directory = explode('\\', $className, 2)[0];
        if ($directory == 'App') {
            $name = substr_replace($className, '', 0, 4);
//             var_dump($name);
        }
            $file = dirname(__DIR__) . "/{$name}.php";
//         $file = dirname(__DIR__) . "/{$className}.php";
        include $file;
    }
    
}

