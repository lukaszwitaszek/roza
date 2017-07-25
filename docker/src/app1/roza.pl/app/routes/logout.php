<?php

$app->get('/logout', function() use($app){
    setcookie(session_name(), '', 100);
    session_unset();
    session_destroy();
    $_SESSION = array();
    $app->auth=false;
    $app->response->redirect($app->urlFor('home'));
})->name('logout');