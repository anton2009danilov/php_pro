<?php
include dirname(__DIR__) . "/vendor/autoload.php";

$config = include dirname(__DIR__) . "/main/config.php";
(new \App\main\App())->run($config);