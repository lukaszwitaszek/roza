<?php

// nazwa pliku musi odpowiadać zawartości
// pliku mode.php

return [
    'app' => [
        'nazwa' => 'Aplikacja KŻR',
        'url' => 'http://roza.pl.docker.dev:8080',
        'hash' => [
          'algo' => PASSWORD_BCRYPT,
          'cost' => 10
        ],
    ],
    'sesja' => [
        'identyfikator' => 'user_id',
        'identyfikator_uprzywilejowany' => 'sUser_id',
    ],
    'twig' => [
        'debug' => true
    ],
    'mail' => [
        'debug' => true
    ],
    'db' => [
        'driver' => 'mysql',
        'host' => 'db',
        'database' => 'db_main',
        'username' => 'dbRoot',
        'password' => 'dbRootPass',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' =>''
    ],
];
