<?php

return [
    'app'=>[
        'url'=>'http://auth.docker.dev:8080',
        'hash' => [
            'algo' => PASSWORD_BCRYPT,
            'cost' => 10
        ]
    ],
    'db' => [
        'driver' => 'mysql',
        'host' => 'db',
        'database' => 'site',
        'username' => 'siteRoot',
        'password' => 'siteRootPass',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' =>''
    ],
    'auth' => [
        'session' => 'user_id',
        'remember' => 'user_r'
    ],
    
/*    'mail' => [
        'smtp_auth' => true,
        'smptp_secure' => 'tls',
        'host' => 'mail.witaszki.pl',
        'from' => 'automat@witaszki.pl',
        'fromName' => 'Automat Mailowy',
        'username' => 'automat@witaszki.pl',
        'password' => 'automatPasswd',
        'port' => 587,
        'html' => true
    ],
*/
    
  'mail' => [
        'smtp_auth' => true,
        'smptp_secure' => 'ssl',
        'host' => 'smtp.gmail.com',
        'from' => 'lukasz.witaszek@gmail.com',
        'fromName' => 'Automat Mailowy',
        'username' => 'lukasz.witaszek@gmail.com',
        'password' => '',
        'port' => 465,
        'html' => true
    ],    

    

    
    'twig' => [
        'debug' => true
    ],
    'csrf' => [
        'session' => 'csrf_token'
    ]
]

?>