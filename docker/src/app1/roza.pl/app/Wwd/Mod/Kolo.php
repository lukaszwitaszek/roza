<?php

namespace Wwd\Mod;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Kolo extends Eloquent
{
    protected $table = 'kolo';
    
    protected $fillable = [
        'nazwa',
        'zelator_id',
        'rolowanie',
    ];
    
    public function uczestnik(){
        return $this->hasMany('Wwd\Mod\Uczestnik','kolo_id');
    }
    
    public function wiadomosc(){
        return $this->hasMany('Wwd\Mod\Wiadomosc');
    }
    
    public function zelator($uczObj,$kolObj){
        return $uczObj->where('id',$kolObj['zelator_id'])->first();
    }
}