<?php

use Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

use Noodlehaus\Config;

use Codecourse\User\User;
use Codecourse\Helpers\Hash;
use Codecourse\Validation\Validator;
use Codecourse\Middleware\BeforeMiddleware;
use Codecourse\Mail\Mailer;

session_cache_limiter(false);
session_start();

ini_set('display_errors','On');

define('INC_ROOT', dirname (__DIR__));

require INC_ROOT . '/vendor/autoload.php';

$app = new Slim([
    'mode' => file_get_contents(INC_ROOT . '/mode.php'),
    'view' => new Twig(),
    'templates.path' => INC_ROOT . '/app/views'
]);
    
$app->configureMode($app->config('mode'), function() use($app){
   $app->config = Config::load (INC_ROOT . "/app/config/{$app->mode}.php"); 
});

$app->add(new BeforeMiddleware);

$app->auth=false;

require 'database.php';
require 'routes.php';

$app->container->set('user', function(){
   return new User; 
});
$app->container->singleton('hash', function() use($app){
    return new Hash($app->config);
});
$app->container->singleton('validation', function() use($app){
    return new Validator($app->user);
});

$app->container->singleton('mail',function() use ($app){
    $mailer = new PHPMailer(true);
    $mailer->IsSMTP();
    $mailer->Host = $app->config->get('mail.host');
    $mailer->SMTPAuth = $app->config->get('mail.smtp.auth');
    $mailer->SMTPSecure = $app->config->get('mail.smtp_secure');
    $mailer->Port = $app->config->get('mail.port');    
    $mailer->SetFrom($app->config->get('mail.from'), $app->config->get('mail.fromName'));
    $mailer->Username = $app->config->get('mail.username');
    $mailer->Password = $app->config->get('mail.password');
    
    $mailer->isHTML($app->config->get('mail.html'));
    $mailer->SMTPDebug = 1;
    return new Mailer($app->view, $mailer);
});

$view = $app->view();
$view->parseOptions = [
    'debug' => $app->config->get('twig.debug')
];

$view->parserExtensions =[
    new TwigExtension
];


$app->get('/', function() use ($app){
    $app->render('home.php');
});

$app->get('/test', function(){
    echo 'test route';
});

?>