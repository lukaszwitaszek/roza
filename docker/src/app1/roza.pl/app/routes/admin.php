<?php

$app->get('/admin', function() use($app){
    $title = $app->config->get('app.nazwa').' | Logowanie administratora';
    $navItems = $app->menu->giveAllItems();
    $app->render('azLoginForm.php',[
        'action' => $app->urlFor('admin.post'),
        'siteTitle' => $title,
        'header' => true,
        'nav' => $navItems,
        'footer' => true,
    ]);
})->name('admin');


$app->post('/admin', function() use ($app){
    
    $request = $app->request;
    $password = $request->post('password');
    $v = $app->walidacja;
    $v->validate([
        'password' => [$password,'required'],
    ]);
    
    if ($v->passes()){
        
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
            
            // lista administratorów
    $listaAdmin=$app->uczestnik->where('admin',1)->get();
            
            
            $app->view()->appendData([
                'kola' => $listaKolZel,
                'admini' => $listaAdmin,
            ]);
        
           $app->render('admin.php',[
               'siteTitle' => $title,
               'header' => true,
               'nav' => $navItems,
               'footer' => true,
           ]);
})->name('admin.post');



$app->post('/admin/kolo(/:nr_kola)', function($nr_kola=0) use ($app){
    // obsługa widoku
    $title = $app->config->get('app.nazwa').' | Administracja';
    $navItems = $app->menu->giveAllItems();
    echo 'Dodwawanie koła';
})->name('admin.kolo.post');