<?php
class Pizza{

    public $gusto;
    public $prezzo;

    public function __construct($gusto, $prezzo){
        $this->gusto = $gusto;
        $this->prezzo = $prezzo;
    }

    public function mostraInfo(){
        var_dump($this->gusto, $this->prezzo);
        echo "<br>";
    }

    public function sconto10(){
        $this->prezzo *= 0.9;
    }

}

$diavola = new Pizza("Diavola",1);


echo $diavola->gusto . '<br>';

$diavola->mostraInfo();

$diavola->sconto10();

$diavola->mostraInfo();
