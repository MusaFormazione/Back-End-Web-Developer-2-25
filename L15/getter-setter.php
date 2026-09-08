<?php


class Prodotto{

    protected $nome;
    protected $prezzo;

    /**
     * Crea un prodotto con il nome e il prezzo indicati.
     *
     * @param string $nome Nome del prodotto.
     * @param int|float $prezzo Prezzo del prodotto, IVA esclusa.
     */
    public function __construct(string $nome, int|float $prezzo){
        $this->nome = $nome;
        $this->prezzo = $prezzo;
    }

    /**
     * Aggiorna il prezzo del prodotto, ignorando i valori negativi.
     *
     * @param int|float $prezzo Nuovo prezzo, IVA esclusa.
     * @return void
     */
    public function setPrezzo(int|float $prezzo): void{
        if($prezzo < 0) return;

        $this->prezzo = $prezzo;
    }

    /**
     * Restituisce il prezzo comprensivo di IVA al 22% con il simbolo dell'euro.
     *
     * @return string Prezzo con IVA seguito dal simbolo dell'euro.
     */
    public function getPrezzo():string {
        $conIva = $this->prezzo * 1.22;
        return $conIva . '€';
    }

}


$smartphone = new Prodotto('Samsung Galaxy S10 5G', 500);

echo $smartphone->getPrezzo();
echo "<hr>";
echo $smartphone->setPrezzo(1000);

echo $smartphone->getPrezzo();