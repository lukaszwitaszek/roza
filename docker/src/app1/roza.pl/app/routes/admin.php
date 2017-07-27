<?php

$app->get('/admin', function() use ($app){
    // obsługa widoku
    $title = $app->config->get('app.nazwa').' | Administracja';
    $navItems = $app->menu->giveAllItems();
    
    // opis koł
    $listaKol=$app->kolo->all();
    foreach($listaKol as $l){
        $listaKolZel[]=[
            'kolo' => $l,
            'zelator' => $app->uczestnik->where('id',$l['zelator_id'])->first(),
        ];
    }
    $listaZelat=$app->uczestnik->where('zelat',1)->get();
    $listaAdmin=$app->uczestnik->where('admin',1)->get();
    $app->view()->appendData([
        'kola' => $listaKolZel,
        'zelatorzy' => $listaZelat,
        'admini' => $listaAdmin,
    ]);
    
    //opis zelatorow
    
    
    $app->render('admin.php',[
        'siteTitle' => $title,
        'header' => true,
        'nav' => $navItems,
        'footer' => true,
    ]);
})->name('admin');



$app->post('/admin/kolo(/:nr_kola)', function($nr_kola=0) use ($app){
    // obsługa widoku
    $title = $app->config->get('app.nazwa').' | Administracja';
    $navItems = $app->menu->giveAllItems();
    echo 'Dodwawanie koła';
})->name('admin.kolo.post');