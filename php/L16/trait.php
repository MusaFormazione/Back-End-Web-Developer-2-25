<?php

trait MovimentoVeicolo{
    public $vel = 0;

    public function accelera($n):void{
        $this->vel += $n;
    }

    public function frena(){
        $this->vel--;
    }
}

class Bicicletta{
    use MovimentoVeicolo;
}

class Automobile{
    use MovimentoVeicolo;
}


$bici = new Bicicletta();
$auto = new Automobile();

$bici->accelera(1);
$auto->accelera(20);

echo "<pre>";
var_dump($bici);
echo "<hr>";
var_dump($auto);
echo "</pre>";