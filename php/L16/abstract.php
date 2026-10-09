<?php

abstract class Veicolo{

    public $marca;
    public $nRuote;
    public $vel = 0;
    public $velMax;

    public function __construct($marca, $nRuote, $velMax)  {
        $this->marca = $marca;
        $this->nRuote = $nRuote;
        $this->velMax = $velMax;
    }

    public abstract function accelera(int $n):void;
    public abstract function frena():void;

    public function stop(){
        $this->vel = 0;
    }

    public function getInfo() {
        return "Marca: {$this->marca}, Velocità: {$this->vel}, Velocità Massima: {$this->velMax}, Numero Ruote: {$this->nRuote}";
    }

}

// $test = new Veicolo("",0,0); non si può fare

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

    public function getInfo()
    {
        $haRotelle = $this->haRotelle ? "si" : "no";
        return parent::getInfo() . ", Monta le rotelle: {$haRotelle}";
    }

    public function accelera(int $n):void{
      $this->vel += $n;
    }

    public function frena():void{
        $this->vel--;
    }

}

$bici = new Bicicletta('Bianchi', false);
$bici->accelera(1);
$bici->montaSmontaRotelle();
var_dump($bici);

echo "<hr>";

echo $bici->getInfo();
