<?php


$app->get('/tajemnica(/:nr_tajemnicy)', function($nr_tajemnicy=0) use($app){
    $nr_tajemnicy=intval($nr_tajemnicy);
    $nr_tajemnicy = ($nr_tajemnicy > 20) ? 0 : $nr_tajemnicy;
    $title = $app->config->get('app.nazwa').' | Opis Tajemnic Różańcowych';
    $navItems = $app->menu->giveAllItems();
    $tabelaTajemnic = [];
    $tajemnice = $app->tajemnica->all();
    foreach ($tajemnice as $tajemnica) {
        $tabelaTajemnic[] = [
            'nr_tajemnicy'  => $tajemnica->nr_tajemnicy,
            'nazwa'         => $tajemnica->nazwa,
            'opis'          => $tajemnica->opis,
            'modyfikacja'   => $tajemnica->updated_at,
        ];
    }
    
    $app->render('tajemnice.php',[
        'siteTitle' => $title,
        'header' => true,
        'nav' => $navItems,
        'tablicaTajemnic' => $tabelaTajemnic,
        'nrTajemnicy' => $nr_tajemnicy,
        'footer' => true,
        'siteContent' => '',
    ]);
})->name('tajemnice.get');