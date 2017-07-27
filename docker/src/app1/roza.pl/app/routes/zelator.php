<?php

$app->get('/zelator', function() use ($app){
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
})->name('zelator');