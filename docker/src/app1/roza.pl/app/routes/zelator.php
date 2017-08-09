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
    $request = $app->request;
    $password = $request->post('password');
    $v = $app->walidacja;
    $v->validate([
      'password' => [$password,'required'],
    ]);
    
    if ($v->passes()){
        if($app->auth){
            $privIndex = $app->hash->password($app->auth->email);
            $passHashed= $app->hash->password($password);
            if ($app->hasz->where('id',$privIndex)->first()->hasz==$passHashed){
                $_SESSION[$app->config->get('identyfikator_uprzywilejowany')]=$privIndex;
                $title = $app->config->get('app.nazwa').' | Zelatorowanie';
                $navItems = $app->menu->giveAllItems();
                // opis koła
                $listaKol=$app->kolo->where('zelator_id',$app->auth->id)->all();
                foreach($listaKol as $l){
                    $listaKolZel[]=[
                    'kolo' => $l,
                    'czlonkowie' => $app->uczestnik->where('kolo_id',$l['id'])->all(),
                    'wiadomosci' => $l->wiadomosc->all(),
                    ];
                }
                $app->view()->appendData([
                    'kola' => $listaKolZel,
                ]);
                
                $app->render('zelator.php',[
                    'siteTitle' => $title,
                    'header' => true,
                    'nav' => $navItems,
                    'footer' => true,
                ]);
            } else {
                $app->flash('global','Nie udało się zalogować zelatora.');
                $app->response->redirect($app->urlFor('zelator'));
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
})->name('zelator.post');

