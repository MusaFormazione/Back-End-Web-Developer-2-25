<?php

//la classe deve:
//Inizializzare un tag Form 
//Inserire al suo interno input su richiesta 
//Inserire al suo interno Select su richiesta. 
//Inserire al suo interno il bottone di invio del Form 
//Renderizzare il Form su richiesta 
class FormBuilder{
    
    protected $action;
    protected $method;

    public function __construct(string $action, string $method){
        $this->action = $action;
        $this->method = $method;
    }

    public function addInput(){
       new InputElement('email','email','Scrivi la tua email')->toHTML();
    }

    function render(){
        echo "<form action=\"{$this->action}\" method=\"{$this->method}\"></form>";
    }

}


class InputElement{
    protected $type;
    protected $name;
    protected $placeholder;

    public function __construct(string $type = "text", string $name = "", string $placeholder = ""){
        $this->$type = $type;
        $this->$name = $name;
        $this->$placeholder = $placeholder;
    }

    public function toHTML(){
      $name = !$this->name ? "name=\"{$this->name}\"" : '';
      $placeholder =  !$this->placeholder ? "placeholder=\"{$this->placeholder}\"" : "";

      return "<input type="{$this->type}" $name $placeholder>";
    }

}

