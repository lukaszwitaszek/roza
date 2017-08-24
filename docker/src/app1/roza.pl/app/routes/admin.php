<?php

$app->get('/admin', function() use($app){
    if(!$app->superAuth){
        $title = $app->config->get('app.nazwa').' | Logowanie administratora';
        $navItems = $app->menu->giveAllItems();
        $app->render('azLoginForm.php',[
            'superAuth' => $app->superAuth,
            'action' => $app->urlFor('admin.post'),
            'siteTitle' => $title,
            'header' => true,
            'nav' => $navItems,
            'footer' => true,
        ]);    
    } else {
         $title = $app->config->get('app.nazwa').' | Administrator';
                $navItems = $app->menu->giveAllItems();
                // opis koł
                $listaKol=$app->kolo->all();
                foreach($listaKol as $l){
                    $listaKolZel[]=[
                    'kolo' => $l,
                    'zelator' => $app->uczestnik->where([
                        'kolo_id' => $l['id'],
                        'zelat' => 1,
                        ])->get(),
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
    }
})->name('admin');


$app->post('/admin', function() use ($app){
    $request = $app->request;
    $password = $request->post('password');
    $v = $app->walidacja;
    $v->validate([
      'password' => [$password,'required'],
    ]);
    
    if ($v->passes()){
        if($app->auth){
            $haszRekord=$app->hasz->where('id', $app->auth->email)->first();
            if ($app->hash->passwordCheck($password,$haszRekord->haszHasla)){
                $_SESSION[$app->config->get('identyfikator_uprzywilejowany')]=$app->auth->email;
                $app->superAuth=true;
                $title = $app->config->get('app.nazwa').' | Administrator';
                $navItems = $app->menu->giveAllItems();
                // opis koł
                $listaKol=$app->kolo->all();
                foreach($listaKol as $l){
                    $listaKolZel[]=[
                    'kolo' => $l,
                    'zelator' => $app->uczestnik->where([
                        'kolo_id' => $l['id'],
                        'zelat' => 1,
                        ])->get(),
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
            } else {
                $app->flash('global','Błędne hasło');
                $app->response->redirect($app->urlFor('admin'));
            }        
        } else {
            $app->flash('global','Brak uprawnień do logowania do wybranej sekcji.');
            $app->response->redirect($app->urlFor('home'));
        } 
    } else {
        $title = $app->config->get('app.nazwa').' | Logowanie';
        $navItems = $navItems = $app->menu->giveAllItems();
        $app->render('azLoginForm.php', [
            'errors' => $v->errors(),
            'request'=> $request,
            'header' => true,
            'nav' => $navItems,
            'footer' => true,
        ]);
    }
})->name('admin.post');


$app->post('/admin/kolo(/:nr_kola)', function($nr_kola=0) use ($app){
    // obsługa widoku
    $title = $app->config->get('app.nazwa').' | Administracja';
    $navItems = $app->menu->giveAllItems();
    echo 'Dodwawanie koła';
})->name('admin.kolo.post');
