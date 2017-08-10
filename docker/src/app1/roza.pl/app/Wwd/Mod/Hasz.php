<?php

namespace Wwd\Mod;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Hasz extends Eloquent
{
    protected $table = 'hasze';

    protected $fillable = [
        'id',
        'haszHasla',
    ];


}
