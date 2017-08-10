<?php

namespace Wwd\Mod;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hasz extends Eloquent
{
    use SoftDeletes;
    protected $table = 'hasze';

    protected $fillable = [
        'id',
        'haszHasla',
    ];
    
    protected $dates = ['deleted_at'];
}
