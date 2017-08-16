<?php

namespace Wwd\Valid;

use Violin\Violin;
use Wdd\Mod\Uczestnik;

class Validator extends Violin 
{
    protected $app;
    
    public function __construct($app){
        $this->app=$app;
        
        $this->addFieldMessages([
            'email' => [
                'required' => 'proszę podać adres email',
                'email' => 'proszę podać prawiłdowy adres email',
                'uniqueEmail' => 'podany adres jest już zarejestrowany',
            ],
            //'email' => [
            //    'email' => 'proszę podać prawiłdowy adres email.'
            //],
            'password' => [
                'required' => 'proszę podać hasło',
                'min' => 'hasło zbyt krotkie',
            ],
            'password_confirm' => [
                'required' => 'wymagane potwierdzenie hasła',
                'matches' => 'hasło i potwierdzenie nie są zgodne',
            ],
            'telefon' => [
                'min' => 'proszę podać nr (9-11cyfr)',
                'max' =>'proszę podać nr (9-11cyfr)',
            ],
            'imie' => [
                'required' => 'proszę podać imię',
                'alnum' => 'nieprawidłowe znaki w polu imię',
                'max' => 'imię zbyt długie',
            ],
            'nazwisko' => [
                'required' => 'proszę podać nazwisko',
                'alnumDash' => 'nieprawidłowe znaki w polu nazwisko',
                'max' => 'nazwisko zbyt długie',
            ],
        ]);
    }
    
    public function validate_uniqueEmail($value,$input,$args){
        $user = $this->app->uczestnik->where('email',$value);
        return ! (bool) $user->count();
    }
}