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
    
    public function kolo(){
        return $this->belongsTo('Wwd\Mod\Kolo', 'id', 'kolo_id');
    }
    
    public function autor(){
        return $this->belongsTo('Wwd\Mod\Uczestnik', 'id', 'autor_id');
    }
}