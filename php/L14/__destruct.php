<?php

class Destruct{

    public function __destruct(){
        //Per orepazioni di pulizia/chiusura connessioni quando l'oggetto viene distrutto
        echo "Oggetto distrutto";
    }

}

$obj = new Destruct();

unset($obj);