<?php

namespace Wwd\Mod;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Uczestnik extends Eloquent
{
    protected $table = 'uczestnicy';
    
    protected $fillable = [
        'imie',
        'nazwisko',
        'email',
        'telefon',
        'ostatnia_wizyta',
        'admin',
        'upraw',
        'kolo_id',
        'nr_tajemnicy',
        'ostatnia_wiadomosc',
    ];
    
    public function kolo(){
        return $this->belongsTo('Wwd\Mod\Kolo','kolo_id');
    }
        
}