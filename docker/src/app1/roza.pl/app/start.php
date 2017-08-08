<?php

// głowny plik inicjalizujący aplikację

session_start();

// wyświetlanie błędów dla potrzeb DEV
ini_set('display_errors','On');


use Slim\Slim;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

use Noodlehaus\Config;

use Wwd\Mod\Tajemnica;
use Wwd\Mod\Uczestnik;
use Wwd\Mod\Kolo;
use Wwd\Mod\Wiadomosc;
use Wwd\Mod\Hasz;
use Wwd\Menus\Menus;

use Wwd\Valid\Validator;
use Wwd\Middleware\BeforeMiddleware;
use Wwd\helpers\Hash;

// bazowy folder do dołączanych plików
define('INC_ROOT', dirname(__DIR__));
require INC_ROOT.'/vendor/autoload.php';

// tworzenie aplikacji SLIM
$app = new Slim([
    'mode' => file_get_contents(INC_ROOT.'/mode.php'),
    'view' => new Twig(),
    'templates.path' => INC_ROOT.'/app/views'
]);

// udostępnienie konfiguracji
$app->configureMode($app->config('mode'), function() use($app){
   $app->config = Config::load (INC_ROOT . "/app/config/{$app->mode}.php");
});

// inicjalizacja widoków
$view = $app->view();
$view->parseOptions = [
    'debug' => $app->config->get('twig.debug')
];
$view->parserExtensions =[
    new TwigExtension
];

// dołączenie tras
require 'routes.php';

// definicje połączenia z bazą danych
require 'config/database.php';

// dołączenie funkcjonalności klasy Tajemnica
$app->container->set('tajemnica', function(){
    return new Tajemnica;
});

// dołączenie funkcjonalności klasy Uczestnik
$app->container->set('uczestnik', function(){
    return new Uczestnik;
});

// dołączenie funkcjonalności klasy Hasze (model)
$app->container->set('hasz', function(){
    return new Hasz;
});

// dołączenie funkcjonalności haszowania
$app->container->singleton('hash', function() use($app){
    return new Hash($app->config);
});

// dołączenie funkcjonalności klasy Kolo
$app->container->set('kolo', function(){
    return new Kolo;
});

// dołączenie funkcjonalności klasy Wiadomość
$app->container->set('wiadomosc', function(){
    return new Wiadomosc;
});

// walidacja
$app->container->singleton('walidacja', function() use($app){
    return new Validator;
});

// budowanie menu
$app->container->set('menu', function(){
    return new Menus(INC_ROOT.'/app/menuItemsFile.php');
});

// obsługa sesyjności
$app->auth=false;
$app->zelat=false;
$app->wiad=false;
$app->tajemnicaPrzypisana=false;
$app->koloPrzypisane = false;

// middleware dla mechanizmu sesji
$app->add(new BeforeMiddleware);
