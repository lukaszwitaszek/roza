<?php

namespace Wwd\Mod;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tajemnica extends Eloquent
{
    protected $table = 'tajemnice';
    
    protected $fillable = [
        'nazwa',
        'opis',
        'modyfikacja',
        'nr_tajemnicy',
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
}