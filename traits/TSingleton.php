<?php
namespace App\traits;

trait TSingleton
{
    private static $items;
    
    protected function __construct() {}
    protected function __wakeup() {}
    protected function __clone() {}
    
    public static function getInstance() {
        if (empty(static::$items)) {
            static::$items = new static();
        }
        
        return static::$items;
    }
}

