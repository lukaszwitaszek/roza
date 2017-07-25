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
            $this->app->tajemnicaPrzypisana = $this->app->tajemnica->where('nr_tajemnicy', $this->app->auth->nr_tajemnicy)->first();
            $this->app->koloPrzypisane = $this->app->kolo->where('id', $this->app->auth->kolo_id)->first();
            $this->app->admin = $this->app->auth->admin;
            $this->app->zelat = $this->app->auth->zelat;
        }
        $this->app->view()->appendData([
            'auth' => $this->app->auth, 
        ]);
    }
}