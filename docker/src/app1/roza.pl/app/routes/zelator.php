<?php

$app->get('/zelator', function() use($app){
    if (!$app->superAuth){
        $title = $app->config->get('app.nazwa').' | Logowanie zelatora';
        $navItems = $app->menu->giveAllItems();
        $app->render('azLoginForm.php',[
            'action' => $app->urlFor('zelator.post'),
            'siteTitle' => $title,
            'header' => true,
            'nav' => $navItems,
            'footer' => true,
        ]); 
    } else {
        $title = $app->config->get('app.nazwa').' | Zelatorowanie';
        $navItems = $app->menu->giveAllItems();
        // opis koła
        $kolo=$app->kolo->where('id',$app->auth->kolo_id)->first();
        $daneKola=[
            'kolo' => $kolo,
            'czlonkowie' => $app->uczestnik->where('kolo_id',$kolo['id'])->get(),
            'wiadomosci' => $kolo->wiadomosc->all(),
        ];
        
        $app->view()->appendData([
            'daneKola' => $daneKola,
        ]);
        
        $app->render('zelator.php',[
            'siteTitle' => $title,
            'header' => true,
            'nav' => $navItems,
            'footer' => true,
        ]);
    }
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
            $haszRekord=$app->hasz->where('id', $app->auth->email)->first();
            if ($app->hash->passwordCheck($password,$haszRekord->haszHasla)){
                $_SESSION[$app->config->get('identyfikator_uprzywilejowany')]=$app->auth->email;
                $app->superAuth=true;
                $title = $app->config->get('app.nazwa').' | Zelatorowanie';
                $navItems = $app->menu->giveAllItems();
                // opis koła
                $kolo=$app->kolo->where('id',$app->auth->kolo_id)->first();
                $daneKola=[
                    'kolo' => $kolo,
                    'czlonkowie' => $app->uczestnik->where('kolo_id',$kolo['id'])->get(),
                    'wiadomosci' => $kolo->wiadomosc->all(),
                ];
                
                $app->view()->appendData([
                    'kola' => $daneKola,
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

