<?php

class App{

    protected $db;
    protected $sql;
    protected $rows;
    protected $cityArr = [];

    public function __construct() {
        $this->connect();
    }

    protected function connect():void{
        try{

            $this->db = new PDO('mysql:host=mysql;dbname=esercitazione_l22;','user','password');

        }catch(PDOException $e){
            die("Error: " . $e->getMessage());
        }   
    }

    protected function setQuery():void{
        $citta = $_GET['citta'] ?? "";
        if(empty($citta)){
            $this->sql = "SELECT citta FROM utenti";
        }else{
            $this->sql = "SELECT citta FROM utenti WHERE citta = '$citta'";
        }
    }

    protected function executeQuery(){

    }

    protected function renderCityFilter(){
        //renderizza la select?>
            <form action="/" method="GET">

                <select name="citta">
                    <option value="">--scegli città--</option>
                    <?php foreach($this->cityArr as $citta):?>
                        <option value="<?=$citta?>"><?=$citta?></option>
                    <?php endforeach;?>
                </select>

                <button>Cerca</button>        
            </form>

        <?php
    }

}