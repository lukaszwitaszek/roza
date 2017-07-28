<?php

$app->get('/', function() use($app){
    
    // obsługa widoku
    $title = $app->config->get('app.nazwa').' | główna';
    $navItems = $app->menu->giveAllItems();
    $app->render('home.php',[
        'siteTitle' => $title,
        'header' => true,
        'nav' => $navItems,
        'navHorizontal' => false,
        'footer' => true,
    ]);
})->name('home');

$app->post('/', function() use($app){
        
    $request = $app->request;
    $email = $request->post('email');
    
    $v = $app->walidacja;
    $v->validate([
        'email' => [$email,'required|email'],
    ]);
    if ($v->passes()){
        $uczestnik = $app->uczestnik->where('email',$email)->first();
        if ($uczestnik){
            // zmiana modelu
            $_SESSION[$app->config->get('sesja.identyfikator')]=$uczestnik->id;
            
            // przygotowanie widoku
            $title = $app->config->get('app.nazwa').' | Zalogowany';
            
            // dane uczestnika
            $app->auth=$uczestnik;
            $app->tajemnicaPrzypisana = $app->auth->tajemnica($app->auth,$app->tajemnica);
            //$app->tajemnicaPrzypisana = $uczestnik->tajemnica->first();
            $app->koloPrzypisane = $app->auth->kolo($app->auth,$app->kolo);
            //$app->koloPrzypisane = $uczestnik->kolo->first();
            $app->zelat=$app->koloPrzypisane->zelator($app->auth,$app->koloPrzypisane);
            //$app->zelat=$app->koloPrzypisane->zelator->first();
            $app->wiad=$app->koloPrzypisane->wiadomosc->all();
            
            $app->view()->appendData([
                'auth' => $app->auth,
                'tajemnica' => $app->tajemnicaPrzypisana,
                'kolo' => $app->koloPrzypisane,
                'zelator' => $app->zelat,
                'wiadomosc' => $app->wiad,
            ]);
            
            // nawigacja dla trasy
            $navItems = $app->menu->giveAllItems();
            
            $app->render('home.php',[
                'siteTitle' => $title,
                'header' => true,
                'nav' => $navItems,
                'footer' => true,
            ]);
            
        } else {
            $app->flash('global','Nie udało się zalogować.');
            $app->response->redirect($app->urlFor('home'));
        }
    } else {
        $title = $app->config->get('app.nazwa').' | główna';
        $navItems = $navItems = $app->menu->giveAllItems();
        $app->render('home.php', [
            'errors' => $v->errors(),
            'request'=> $request,
            'header' => true,
            'nav' => $navItems,
            'footer' => true,
        ]);    
    }
})->name('home.post');