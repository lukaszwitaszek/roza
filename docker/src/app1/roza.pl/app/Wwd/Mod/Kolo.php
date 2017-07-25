<?php

namespace Wwd\Mod;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Kolo extends Eloquent
{
    protected $table = 'kolo';
    
    protected $fillable = [
        'nazwa',
        'zelator',
        'rolowanie',
    ];
}