<?php

namespace Wwd\Mod;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kolo extends Eloquent
{
    protected $table = 'kolo';
    
    protected $fillable = [
        'nazwa',
        'rolowanie',
    ];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function uczestnik(){
        return $this->hasMany('Wwd\Mod\Uczestnik','kolo_id');
    }
    
    public function wiadomosc(){
        return $this->hasMany('Wwd\Mod\Wiadomosc');
    }
    
    public function zelator($ucz){
        return $ucz->where([
            'zelat' => 1,
            'kolo_id' => $this->id,
        ])->get();
    }
}