<?php

namespace App\Models;

class Bevanda{
    public $nome;
    protected $prezzo;

    public function __construct(string $nome, int|float $prezzo){
        $this->nome = $nome;
        $this->prezzo = $prezzo;
    }

    public function getPrezzo(){
        return $this->prezzo;
    }
}