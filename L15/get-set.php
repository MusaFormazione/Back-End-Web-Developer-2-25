<?php


class Prodotto{
    protected $nome;
    protected $prezzo;

    public function __construct(string $nome, int|float $prezzo){
        $this->nome = $nome;
        $this->prezzo = $prezzo;
    }

    public function __set($property, $value){

        //Potrebbe essere stata richiamata una proprietà che non esiste, quindi è necessario controllare la sua esistenza ed in caso contrario lanciare un'eccezione 
        if(property_exists($this, $property)){

            $this->checkName($property, $value);
            $this->checkPrice($property, $value);

        }else{
            throw new Exception("La proprietà $property non esiste");
        }
    }

    /**
     * Controlla e aggiorna il prezzo se la proprietà indicata è "prezzo".
     *
     * @param string $property Nome della proprietà da controllare.
     * @param int|float $value Nuovo prezzo, IVA esclusa.
     * @return void
     * @throws Exception Se il prezzo è negativo.
     */
    protected function checkPrice($property, $value){
        if($property === 'prezzo'){
            if($value < 0) throw new Exception('Il prezzo non può essere negativo');

            $this->prezzo = $value;
        }
    }

    /**
     * Controlla e aggiorna il nome se la proprietà indicata è "nome".
     *
     * @param string $property Nome della proprietà da controllare.
     * @param string $value Nuovo nome del prodotto, lungo almeno tre byte.
     * @return void
     * @throws Exception Se la lunghezza del nome è inferiore o uguale a due byte.
     */
    protected function checkName($property, $value){
        if($property === 'nome'){
            if(strlen($value) <= 2) throw new Exception('Il Nome è troppo breve');

            $this->nome = $value;
        }
    }


    public function __get($property){

        if(property_exists($this, $property)){

            $this->getPrice($property);

            if($property === 'nome'){
                return  ucfirst($this->$property);
            }
            
        }else{
            throw new Exception("La proprietà $property non esiste");
        }
    }

    /**
     * Tenta il calcolo del prezzo con IVA al 22% per la proprietà "prezzo".
     * Il calcolo attuale usa il nome della proprietà anziché il suo valore.
     *
     * @param string $property Nome della proprietà richiesta.
     * @return float|null Risultato del calcolo, oppure null per altre proprietà.
     * @throws TypeError Se tenta di moltiplicare la stringa "prezzo" per un numero.
     */
    protected function getPrice($property){
        if($property === 'prezzo'){
            $conIva = $property * 1.22;
            return $conIva;
        }
    }

}

$smartphone = new Prodotto('samsung galaxy S10 5G', 500);

try{
    $smartphone->nome = "samsung galaxy S22 5G";
    echo $smartphone->nome;
}catch(Exception $e){
    echo $e->getMessage();
}