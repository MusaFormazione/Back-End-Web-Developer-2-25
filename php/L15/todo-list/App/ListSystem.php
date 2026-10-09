<?php

class ListSystem{

    public $name;
    protected $folder;
    protected $slug;//trsformazione di un titolo in una stringa url like (Lista della spesa -> lista-della-spesa)
    protected $file;//nome del filke in cui si salvano i todo di questa lista
    protected $todos = [];//lista dei todo di questa lista

    /**
     * Inizializza la lista, prepara la cartella e carica gli elementi salvati.
     * Il nome della lista determina il nome del file JSON, sostituendo gli spazi con trattini.
     *
     * @param string $name Nome della lista.
     * @param string $folder Cartella dei file JSON, predefinita a "todo-list-files".
     */
    public function __construct(string $name, string $folder = 'todo-list-files'){

        $this->name = $name;
        $this->folder = $folder;

        $this->slug = str_replace(" ","-",strtolower($name));
        $this->file = "$folder/$this->slug.json";

        $this->setupFolder();
        $this->getExistingTodos();


    }

    /**
     * Stampa il titolo della lista e il modulo HTML per aggiungere un elemento tramite POST.
     *
     * @return void
     */
    public function renderForm(){
        ?>
        
         <h1><?=$this->name?></h1>

        <h2>Aggiungi qualcosa alla lista</h2>
        <form method="POST">

            <input type="text" name="todo_<?=$this->slug?>" class="form-control mb-3" placeholder="Scrivi Qualcosa...">

            <button class="btn btn-primary">Salva</button>

        </form>

        <?php
    }
    
    /**
     * Stampa gli elementi della lista in blocchi HTML con le classi Bootstrap per gli avvisi.
     *
     * @return void
     */
    public function renderList(){
        foreach($this->todos as $todo):?>
        <div class="alert alert-success"><?=$todo?></div>
        <?php endforeach;
    }

    /**
     * Crea la cartella destinata ai file delle liste se non esiste.
     *
     * @return void
     */
    protected function setupFolder(){
        if(!is_dir($this->folder)){//se non c'è la cartella in cui voglio scrivere
            mkdir($this->folder);//la creo
        }
    }

    /**
     * Carica gli elementi dal file JSON della lista, se presente, nella proprietà todos.
     *
     * @return void
     */
    protected function getExistingTodos(){
        if(file_exists($this->file)){
            $data = file_get_contents($this->file);

            $this->todos = json_decode($data);
        }
    }

    /**
     * Aggiunge un elemento alla lista e salva l'intera lista nel file JSON.
     * Ignora i valori considerati vuoti da empty(), inclusa la stringa "0".
     *
     * @return void
     */
    public function addNewTodo(){
    
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $newTodo = $_POST["todo_{$this->slug}"] ?? '';
            if(!empty($newTodo)){//controllo che non sia vuoto

                $this->todos[] = $newTodo;//aggiungo il todo alla lista dei todo

                $jsonTodo = json_encode($this->todos);//converto l'array dei todo in json

                file_put_contents($this->file, $jsonTodo);//scrivo il contenuto nel file db.json
            }
        }

    }

}
