<?php

class Veicolo
{

    public $marca;
    public $nRuote;
    protected $vel = 0;//la proprietà è protetta perchè pensata solo per uso interno alla classe

    public $velMax;
    public function __construct($marca, $nRuote, $velMax)
    {
        $this->marca = $marca;
        $this->nRuote = $nRuote;
        $this->velMax = $velMax;
    }


    private $esempioPrivate = 0;//privata, quindi non è accessibile all'esterno, ma non è accessibile nemmeno alle classi estese(figlie)

    public function modificaEsempioPrivate(){
        //il genitore (questa classe in questo caso) può predisporre metodi come questo che permettano alle classi estese la modifica dei valori, secondo le logiche definite dal genitore
        $this->esempioPrivate++;
    }


    public function  accelera($n){
        if ($this->vel + $n <= $this->velMax) {
            $this->vel += $n;
        }
    }

    public function frena()
    {
        $this->vel--;
    }

    public function stop()
    {
        $this->vel = 0;
    }
    

    public function getInfo(){
        return "Marca: {$this->marca}, Velocità: {$this->vel}, Velocità Massima: {$this->velMax}, Numero Ruote: {$this->nRuote}";
    }

}


class Bicicletta extends Veicolo
{
    public $haRotelle;

    public function __construct($marca, $haRotelle = false)
    {
        parent::__construct($marca, 2, 40);
        $this->haRotelle = $haRotelle;
    }

    public function montaSmontaRotelle()
    {
        $this->haRotelle = !$this->haRotelle;
    }

    public function getInfo(){
        $haRotelle = $this->haRotelle ? "si" : "no";
        return parent::getInfo() . ", Monta le rotelle: {$haRotelle}";
    }

}


$bici = new Bicicletta("Bianchi", true);

var_dump($bici);