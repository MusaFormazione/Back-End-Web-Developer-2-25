<?php

class Veicolo
{

    public $marca;
    public $nRuote;
    public $vel = 0;

    public $velMax;

    public function __construct($marca, $nRuote, $velMax)
    {
        $this->marca = $marca;
        $this->nRuote = $nRuote;
        $this->velMax = $velMax;
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

$bici = new Bicicletta('Bianchi', false);
$bici->accelera(1);
$bici->montaSmontaRotelle();
var_dump($bici);

echo "<hr>";

echo $bici->getInfo();
