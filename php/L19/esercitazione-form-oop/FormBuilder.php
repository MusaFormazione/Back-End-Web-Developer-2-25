<?php

//la classe deve:
//Inizializzare un tag Form 
//Inserire al suo interno input su richiesta 
//Inserire al suo interno Select su richiesta. 
//Inserire al suo interno Textarea su richiesta. 
//Inserire al suo interno il bottone di invio del Form 
//Renderizzare il Form su richiesta 
class FormBuilder{
    
    protected $action;
    protected $method;
    protected $inputList = [];

    public function __construct(string $action, string $method){
        $this->action = $action;
        $this->method = $method;
    }

    /**
     * Aggiunge un campo al form
     */
    public function addInput(string $type = "text", string $name = "", string $placeholder = ""){
        $this->inputList[] = new InputElement($type, $name, $placeholder)->toHTML();
    }

    function render(){
        $inputString = implode('',$this->inputList);
        echo "<form action=\"{$this->action}\" method=\"{$this->method}\">
                $inputString

                <button>Invia</button>
                </form>";
    }

}

//serve un sistema per accettare solo type esistenti in html
class InputElement{
    protected $type;
    protected $name;
    protected $placeholder;
    protected $allowedTypes = [
        "text",
        "email",
        "password",
        "number",
        "tel",
        "search"
    ];

    public function __construct(string $type = "text", string $name = "", string $placeholder = ""){  
        $this->isAllowedType($type);  
        $this->type = $type;
        $this->name = $name;
        $this->placeholder = $placeholder;
    }

    protected function isAllowedType($type){
        if(!in_array($type, $this->allowedTypes)){
            $allowedString = implode(', ',$this->allowedTypes);
            throw new Exception("Tipo non valido. Tipi consentiti: $allowedString");
        }
    }

    public function toHTML(){
      $name = $this->name ? "name=\"{$this->name}\"" : '';
      $placeholder =  $this->placeholder ? "placeholder=\"{$this->placeholder}\"" : "";

      return "<input type=\"{$this->type}\" $name $placeholder>";
    }

}
