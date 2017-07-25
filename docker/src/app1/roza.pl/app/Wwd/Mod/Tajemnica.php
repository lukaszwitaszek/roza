<?php

namespace Wwd\Mod;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Tajemnica extends Eloquent
{
    protected $table = 'tajemnice';
    
    protected $fillable = [
        'nazwa',
        'opis',
        'modyfikacja',
        'nr_tajemnicy',
    ];
    
    
}