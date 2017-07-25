<?php

namespace Wwd\Mod;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Wiadomosc extends Eloquent
{
    protected $table = 'wiadomosci';
    
    protected $fillable = [
        'naglowek',
        'tresc',
        'kolo_id',
        'autor_id',
    ];
    
    
}