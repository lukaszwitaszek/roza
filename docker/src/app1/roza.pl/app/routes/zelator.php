<?php

$app->get('/zelator', function() use($app){
    $title = $app->config->get('app.nazwa').' | Logowanie zelatora';
    $navItems = $app->menu->giveAllItems();
    $app->render('azLoginForm.php',[
        'action' => $app->urlFor('zelator.post'),
        'siteTitle' => $title,
        'header' => true,
        'nav' => $navItems,
        'footer' => true,
    ]);
})->name('zelator');


$app->post('/zelator', function() use ($app){
    // obsługa widoku
    $title = $app->config->get('app.nazwa').' | Zelator';
    $navItems = $app->menu->giveAllItems();
    $app->render('zelator.php',[
        'siteTitle' => $title,
        'header' => true,
        'nav' => $navItems,
        'navHorizontal' => false,
        'footer' => true,
    ]);
})->name('zelator.post');