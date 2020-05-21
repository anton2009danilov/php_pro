<?php

class MyClass {
    function __set($name, $value) {
        echo "property: {$name} {$value} \n";
    }
}


$m = new MyClass();
 
echo $m->a;

// class MyClass {
    
//     public static function names(array $names) {
        
//         foreach ($names as $name) {
            
//             $res .= "<p>{$name}</p>";
        
//         }
        
//         return $res;
//     }
    
    
// }


// $names = "Anton Danilov";

// echo MyClass::names($names);


