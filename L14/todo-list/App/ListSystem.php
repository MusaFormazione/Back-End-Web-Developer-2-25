<?php

class ListSystem{

    public $name;
    public $folder;
    public $slug;
    public $file;
    public $todos = [];

    public function __construct(string $name, string $folder = 'todo-list-files'){

        $this->name = $name;
        $this->folder = $folder;

        $this->slug = str_replace(" ","-",$name);
        $this->file = "$folder/$this->slug.json";

        $this->setupFolder();
        $this->getExistingTodos();


    }

    public function renderForm(){
         $fileName = str_replace(" ","-",$this->slug);
        ?>
        
         <h1><?=$this->name?></h1>

        <h2>Aggiungi qualcosa alla lista</h2>
        <form method="POST">

            <input type="text" name="todo_<?=$this->slug?>" class="form-control mb-3" placeholder="Scrivi Qualcosa...">

            <button class="btn btn-primary">Salva</button>

        </form>

        <?php
    }
    
    public function renderList(){
        foreach($this->todos as $todo):?>
        <div class="alert alert-success"><?=$todo?></div>
        <?php endforeach;
    }

    public function setupFolder(){
        if(!is_dir($this->folder)){//se non c'è la cartella in cui voglio scrivere
            mkdir($this->folder);//la creo
        }
    }

    public function getExistingTodos(){
        if(file_exists($this->file)){
            $data = file_get_contents($this->file);

            $this->todos = json_decode($data);
        }
    }

    public function addNewTodo(string $newTodo){
    
        if(!empty($newTodo)){//controllo che non sia vuoto

            $this->todos[] = $newTodo;//aggiungo il todo alla lista dei todo

            $jsonTodo = json_encode($this->todos);//converto l'array dei todo in json

            file_put_contents($this->file, $jsonTodo);//scrivo il contenuto nel file db.json
        }

    }

}