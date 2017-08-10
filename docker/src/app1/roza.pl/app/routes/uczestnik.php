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
        $usInfo = array();
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
    $req = $app->request;
    if ($req->post('add')){
        $adm = ($req->post('admin'))? 1 : 0;
        $zel = ($req->post('zelat'))? 1 : 0;
        $wiad = $app->wiadomosc->where('kolo_id',$req->post('kolo'))->get()->last()->id;
        if ($tempU = $app->uczestnik->where('kolo_id',$req->post('kolo'))->get()->last()){
            $ostTaj = $tempU->nr_tajemnicy;
        } else $ostTaj = 0;
        $taj = ($ostTaj<20)? $ostTaj+1 : 1;
        
        $app->uczestnik->create([
            'imie' => $req->post('imie'),
            'nazwisko' => $req->post('nazwisko'),
            'email' => $req->post('email'),
            'telefon' => $req->post('telefon'),
            'admin' => $adm,
            'zelat' => $zel,
            'kolo_id'  => $req->post('kolo'),
            'nr_tajemnicy' => $taj,
            'ostatnia_wiadomosc' => $wiad,
        ]);
        if ($adm || $zel){
            $app->hasz->create([
                'id' => $app->hash->password($req->post('email')),
                'haszHasla' => $app->hash->password($req->post('password')),
            ]);
        }
        $app->flash('global','Dodano nowego uczestnika.');
        $app->response->redirect($app->urlFor('uczestnik'));
        
    } else {
        $post=$req->post();
        foreach ($post as $reqArgKey => $reqArgVal){
            if ($reqArgVal=='del') {
                $tempU = $app->uczestnik->where('id', $reqArgKey)->first();
                var_dump($tempU);
                if ($tempU->admin||$tempU->zelat) $hToBDel[]=$app->hash->password($tempU->email);
                $uToBDel[]=$reqArgKey;
            }
        }
        $app->uczestnik->destroy($uToBDel);
        $app->hasz->destroy($hToBDel);
        
        $app->flash('global','Usunięto uczestnik(a/ow): ('.count($uToBDel).').');
        $app->response->redirect($app->urlFor('uczestnik'));
    }
    
})->name('uczestnik.post');