<?php

namespace Wwd\Middleware;
use Slim\Middleware;

class BeforeMiddleware extends Middleware
{
    public function call(){
        $this->app->hook('slim.before', [$this,'run']);
        $this->next->call();
    }
    
    public function run(){
        if (isset($_SESSION[$this->app->config->get('sesja.identyfikator')])){
            $this->app->auth = $this->app->uczestnik->where('id',$_SESSION[$this->app->config->get('sesja.identyfikator')])->first();
            $this->app->tajemnicaPrzypisana = $this->app->auth->tajemnica->first();
            $this->app->koloPrzypisane = $this->app->auth->kolo->first();
            $this->app->zelat=$this->app->koloPrzypisane->zelator->first();
            $this->app->wiad=$this->app->koloPrzypisane->wiadomosc->all();
        }
        $this->app->view()->appendData([
            'auth' => $this->app->auth,
            'tajemnica' => $this->app->tajemnicaPrzypisana,
            'kolo' => $this->app->koloPrzypisane,
            'zelator' => $this->app->zelat,
            'wiadomosc' => $this->app->wiad,
        ]);
    }
}