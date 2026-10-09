<?php


class Pizza
{

    private $gusto;
    protected $prezzo;

    public function __construct($gusto, $prezzo)
    {
        $this->gusto = $gusto;
        $this->prezzo = $prezzo;
    }

    //Gestisce l'accesso a proprietà inaccessibili (non definite o private)
    public function __get($nomeProprietà)
    {
        if (!property_exists($this, $nomeProprietà)) {
            echo "Proprietà $nomeProprietà inesistente";
        } else {
            //qui posso lanciare un errore per avvisare che esiste un metodo per fare output sicuro del prezzo, oppure come in questo caso adoperare quel metodo per provocare l'output reale del prezzo
            return $this->getPrezzo();
        }
    }

    //Gestisce l'assegnazione a proprietà inaccessibili.
    public function __isset($nomeProprietà)
    {
    }

    public function getPrezzo()
    {
        return ($this->prezzo * 1.22) . "€";
    }

}

$diavola = new Pizza("Diavola", 1);

echo $diavola->prezzo;


// var_dump($diavola);

//property_exists(oggetto, proprietà) permette di verificare se una determinata proprietà esiste in un oggetto
var_dump(property_exists($diavola,"prova"));