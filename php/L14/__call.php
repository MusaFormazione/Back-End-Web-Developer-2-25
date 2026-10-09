<?php

class Call{

    //Si invoca da solo quando viene invocato un metodo che non esiste
    public function __call($methodName, $args){
        $className = __CLASS__;
        echo "Il metodo <b>$methodName</b> non esiste nella classe $className, argomenti forniti: </br>";
        var_dump($args);
    }

}

$obj = new Call();

$obj->metodoInesistente("argomento stringa");