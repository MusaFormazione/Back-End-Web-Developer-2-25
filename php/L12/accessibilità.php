<?php

class Pizza{

    public $gusto;
    protected $prezzo;

    public function __construct($gusto, $prezzo){
        $this->gusto = $gusto;
        $this->prezzo = $prezzo;
    }

    public function mostraInfo(){
        var_dump($this->gusto, $this->prezzo);
        echo "<br>";
    }

    public function mostraPrezzo(){
        //aggiungo il 4% di iva e mostro il prezzo
        echo ($this->prezzo * 1.04) . "€";
    }

}

$diavola = new Pizza("Diavola",589);

echo "Il gusto è $diavola->gusto<br>";
// echo "Il prezzo è $diavola->prezzo<br>"; //Fatal error -> il prezzo è privato
$diavola->mostraPrezzo();