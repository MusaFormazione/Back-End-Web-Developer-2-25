<?php

//VERSIONE ALTERNATIVA, SENZA METODO ADDINPUT
//IL COSTRUTTORE VUOLE UN ARRAY CONTENENTE ARRAY ASSOCIATIVI CON QUESTO FORMATO:
/**
 * [
 *    "type" => [VALORE],
 *    "name" => [VALORE],
 *    "placeholder" => [VALORE]   
 * ]
 * 
 * OGNI ARRAY ASSOCIATIVO INSERITO IN QUESTO ARRAY DIVENTA UN CAMPO CHE VIENE RENDERIZZATO
 */

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

    public function __construct(string $action, string $method, array $fieldsData = []){
        $this->action = $action;
        $this->method = $method;
        $this->buildInputList($fieldsData);
    }

    protected function buildInputList(array $fields){
        foreach($fields as $f){

            $children = [];
            [
                "type" => $type,
                "name" => $name,
                "placeholder" => $placeholder,
            ] = $f;

            $children = array_key_exists('children',$f) ? $f['children'] : [];

            if($type !== 'select'){
                $field = new InputElement($type, $name, $placeholder);
            }else{
                $field = new SelectElement($name, $children);
            }
            $this->inputList[] = $field->toHTML();
        }
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

class SelectElement{
    protected $name;
    protected $children;


    public function __construct(string $name = "", array $children = []){  
        $this->name = $name;
        $this->children = $children;
    }

    public function toHTML(){
      $name = $this->name ? "name=\"{$this->name}\"" : '';

      $selectHTML = "<select $name>";
        foreach($this->children as $label => $value){
            $label = ucfirst($label);
            $selectHTML .= "<option value=\"$value\">$label</option>";
        }
      $selectHTML .= "</select>";
      return $selectHTML;
    }

}
