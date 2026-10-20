<?php
include_once './connection.php';

/**
 * Calcola i dati e genera i link per la paginazione di una tabella database.
 */
class Pagination{

    /** @var int Numero massimo di elementi visualizzati in una pagina. */
    private $elementiPerPagina;
    /** @var int Numero totale di righe presenti nella tabella. */
    private $totaleRighe;
    /** @var int Numero totale di pagine disponibili. */
    private $nPagine;
    /** @var int Numero della pagina corrente. */
    private $pagina;
    /** @var int Numero di righe da saltare nella query paginata. */
    private $offset;
    /** @var string Nome della tabella da paginare. */
    private $table; 

    /**
     * Inizializza la paginazione per una tabella.
     *
     * @param string $table Nome della tabella da paginare.
     * @param int $elementiPerPagina Numero di elementi per pagina.
     */
    public function __construct(string $table, int $elementiPerPagina = 10){
        $this->elementiPerPagina = $elementiPerPagina;
        $this->table = $table;
        $this->init();
    }

    /**
     * Legge la pagina richiesta e calcola l'offset per la query.
     *
     * @return void
     */
    private function init(){
        $this->getItemNumber();
        $this->pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
        if(!filter_var($this->pagina, FILTER_VALIDATE_INT)) die('Errore nell\'ottenere la pagina');
        $this->offset = ($this->pagina - 1) * $this->elementiPerPagina;
    }

    /**
     * Recupera il numero totale di righe e calcola il numero di pagine.
     *
     * @return void
     */
    private function getItemNumber(){
        GLOBAL $db;
        $sql = "SELECT count(*) FROM {$this->table}";
        $query = $db->query($sql);

        if(!$query) die('Errore di paginazione');

        $this->totaleRighe = $query->fetchColumn();
        $this->nPagine = ceil($this->totaleRighe / $this->elementiPerPagina);
    }

    /**
     * Restituisce i parametri necessari per eseguire una query paginata.
     *
     * @return array{per_page: int, page: int, rows: int, page_count: int, offset: int}
     */
    public function getPaginationData():array{
        return [
            'per_page' => $this->elementiPerPagina,
            'page' => $this->pagina,
            'row_count' => $this->totaleRighe,
            'page_count' => $this->nPagine,
            'offset' => $this->offset
        ];
    }

    /**
     * Stampa i link HTML della paginazione, inclusi precedente e successivo.
     *
     * @return void
     */
    public function renderPaginationLinks(){
        $paginaPrecedente = $this->pagina - 1;
        $paginaSuccessiva = $this->pagina + 1;

        if($this->pagina > 1):?>
            <li class="page-item"><a class="page-link" href="?pagina=<?=$paginaPrecedente?>">Previous</a></li>
        <?php endif;?>
    
        <?php for($i = 1; $i <= $this->nPagine; $i++ ):?>
            <li class="page-item"><a class="page-link" href="?pagina=<?=$i?>"><?=$i?></a></li>
        <?php endfor;?>
                
        <?php if($this->pagina < $this->nPagine):?>
            <li class="page-item"><a class="page-link" href="?pagina=<?=$paginaSuccessiva?>">Next</a></li>
        <?php endif;
    }
}
