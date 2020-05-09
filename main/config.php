<?php
return [
    'name' => 'Магазин',
    'defaultNameController' => 'good',
    'components' => [
        'db' => [
            'class' => \App\services\DB::class,
            'config' => [
                'driver' => 'mysql',
                'host' => 'localhost',
                'dbname' => 'store',
                'charset' => 'UTF8',
                'userName' => 'root',
                'password' => ''
            ]
        ],
        'renderer' => [
            'class' => \App\services\renders\TwigRenderService::class
        ],
        'request' => [
            'class' => \App\services\Request::class
        ]
        
    ]
];