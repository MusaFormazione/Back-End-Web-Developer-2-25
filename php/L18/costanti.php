<?php

//definizione di costanti
//accettano 3 tipi di dato
define('COSTANTE_ARRAY',[]);//array
define('COSTANTE_NUMERO',1);//numero
define('COSTANTE_STRINGA','');//stringa

//lettura di costanti
echo COSTANTE_NUMERO;


function provaDefine(){
    define('COSTANTE_INTERNA_A_FUNZIONE', 'Valore');
}

// echo COSTANTE_INTERNA_A_FUNZIONE;//Inaccessibile fuori dalla funzione

const COSTANTE_CONST_NUMERO = 2;
const COSTANTE_CONST_STRING = "Hello World";

class TestCostanti{
    //all'interno di una classe non posso adoperare define perchè è una funzione, si usa const
    public const COSTANTE_DENTRO_CLASSE = 5;
}
echo "<br>";
echo TestCostanti::COSTANTE_DENTRO_CLASSE;

