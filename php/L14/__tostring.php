<?php

class ToString{

    public $nome;

    public function __construct($nome){
        $this->nome = $nome;
    }

    //invocato automaticamente quando si fa echo dell'oggetto
    public function __tostring(){
        //in genere è utilizzato per mostrare le proprietà e rispettivi valori dell'oggetto
        return "nome: $this->nome";
    }

}

$obj = new ToString("Mario");

echo $obj;