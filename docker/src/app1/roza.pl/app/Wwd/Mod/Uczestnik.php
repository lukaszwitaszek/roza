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
        'admin',
        'zelat',
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
    
    public function wiadomosc(){
        return $this->hasMany('Wwd\Mod\Wiadomosc','autor_id','id');
    }
        
}