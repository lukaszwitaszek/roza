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
            $this->app->tajemnicaPrzypisana = $this->app->auth->tajemnica($this->app->auth,$this->app->tajemnica);
            $this->app->koloPrzypisane = $this->app->auth->kolo($this->app->auth,$this->app->kolo);
            $this->app->zelat=$this->app->koloPrzypisane->zelator($this->app->uczestnik);
            $this->app->wiad=$this->app->koloPrzypisane->wiadomosc->all();
        }
        if (isset($_SESSION[$this->app->config->get('identyfikator_uprzywilejowany')])){
            $this->app->superAuth=$this->app->hasz->where('id', $_SESSION[$this->app->config->get('identyfikator_uprzywilejowany')])->first();
        }
        $this->app->view()->appendData([
            'superAuth' => $this->app->superAuth,
            'auth' => $this->app->auth,
            'tajemnica' => $this->app->tajemnicaPrzypisana,
            'kolo' => $this->app->koloPrzypisane,
            'zelator' => $this->app->zelat,
            'wiadomosc' => $this->app->wiad,
        ]);
    }
}