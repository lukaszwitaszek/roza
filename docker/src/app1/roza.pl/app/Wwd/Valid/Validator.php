<?php

namespace Wwd\Valid;

use Violin\Violin;
use Wdd\Mod\Uczestnik;

class Validator extends Violin 
{
    
    public function __construct()
    {
        $this->addFieldMessages([
            'email' => [
                'required' => 'proszę podać adres email.'
            ],
            'email' => [
                'email' => 'proszę podać prawiłdowy adres email.'
            ],
            'password' => [
                'required' => 'proszę podać hasło'
            ],
        ]);
    }
}