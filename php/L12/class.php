<?php

class Pizza{

    public $gusto;
    public $prezzo;

    public function __construct($gusto, $prezzo){
        $this->gusto = $gusto;
        $this->prezzo = $prezzo;
    }

}

$margherita = new Pizza("Margherita",5);
$diavola = new Pizza("Diavola",1);

var_dump( $margherita );
var_dump( $diavola );



