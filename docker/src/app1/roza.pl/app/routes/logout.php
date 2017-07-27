<?php

$app->get('/logout', function() use($app){
    setcookie(session_name(), '', 100);
    session_unset();
    session_destroy();
    $_SESSION = array();
    $app->auth=false;
    $app->zelat=false;
    $app->wiad=false;
    $app->tajemnicaPrzypisana=false;
    $app->koloPrzypisane = false;
    $app->response->redirect($app->urlFor('home'));
})->name('logout');