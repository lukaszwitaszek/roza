<?php

$app->get('/kontakt', function() use($app){
    
    $title = $app->config->get('app.nazwa').' | kontakt';
    $navItems = $app->menu->giveAllItems();
    
    $app->render('kontakt.php',[
        'siteTitle' => $title,
        'header' => true,
        'nav' => $navItems,
        'navHorizontal' => false,
        'footer' => true,
    ]);
})->name('kontakt');