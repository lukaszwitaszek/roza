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
    
    public function kolo($uczObj,$kolObj){
        return $kolObj->where('id',$uczObj['kolo_id'])->first();
    }
    
    public function tajemnica($uczObj,$tajObj){
        return $tajObj->where('nr_tajemnicy',$uczObj['nr_tajemnicy'])->first();
    }
        
}