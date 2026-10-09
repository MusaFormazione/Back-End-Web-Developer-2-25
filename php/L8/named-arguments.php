<?php

function creaProfilo($nome, $cognome, $ruolo = "admin", $attivo = true){
    echo "Nome: $nome<br>";
    echo "Cognome: $cognome<br>";
    echo "Ruolo: $ruolo<br>";
    echo "Attivo: $attivo<br>";
}

creaProfilo("Mario","Rossi","customer",false);

creaProfilo(cognome:"Rossi",nome:"Mario",attivo:false);