<?php

namespace Wwd\Menus;

// klasa do obsługi dynamicznej zawartości menu

// wymaga:
//    1. pliku z definicją pozycji menu z zawartością wg wzoru:
//        $items = 
//        ['text' => '_tekst linku_', 'anchor' => '_nazwa_trasy!!!_', 'id' => '_unikalne id_'],
//        ...
        
class Menus {
    
    private $path;              // ścieżka do pliku z elementami menu
    private $items;             // tablica elementów menu, (pobrana z pliku na ścieżce $path)
    private $initiated = false; // czy udało się wczytać zawartość menu z pliku
    
    function __construct($path){
        $this->path = $path;
        $this->initiated = ( include($path) ) ? true : false;
        $this->items=$items;
    }
    
    function giveAllItems(){
        return ( $this->initiated ) ? $this->items : 'Błąd inicjalizacji zawartości menu.';
    }
    
    function giveItems($exludeItems){
        if (!$this->initiated) return 'Błąd inicjalizacji zawartości menu.';
        $itemsToBRet=[];
        foreach ( $this->items as $item ){
            foreach ($exludeItems as $excl){
                if ($item['id']!=$excl) $itemsToBRet[]=$item;
            }
        }
        return $itemsToBRet;
    }
}