<?php

$app->get('/uczestnik(/:id)', function($id=0) use($app){
    $id=intval($id);
    $id = ($id < 0) ? 0 : $id;
    $title = $app->config->get('app.nazwa').' | Uczestnik';
    $navItems = $app->menu->giveAllItems();
    $listaKol=$app->kolo->all();
    
    if ($u = $app->uczestnik->where('id',$id)->first()){
        $k = $app->kolo->where('id',$u['kolo_id'])->get();
        $w = $u->wiadomosc->all();
        $uInfo = [
            'uczestnik' => $u,
            'kolo' => $k,
            'wiadomosci' =>$w,
        ];
        $app->render('uczestnik.php',[
            'siteTitle' => $title,
            'header' => true,
            'nav' => $navItems,
            'footer' => true,
            'uInfo' => $uInfo,
            'kola' => $listaKol,
        ]);
        
    } else {
        $us = $app->uczestnik->all();
        foreach ($us as $u){
            $usInfo[]=[
                'uczestnik' => $u,
                'kolo' => $app->kolo->where('id',$u['kolo_id'])->get(),
            ];
        }
        $app->render('uczestnik.php',[
            'siteTitle' => $title,
            'header' => true,
            'nav' => $navItems,
            'footer' => true,
            'usInfo' =>$usInfo,
            'kola' => $listaKol,
        ]);
    }
    
})->name('uczestnik');

$app->post('/uczestnik(/:id)', function($id=0) use($app){
    var_dump($app->request->post());
    
})->name('uczestnik.post');