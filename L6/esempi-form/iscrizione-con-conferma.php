<?php

// isset() => Restituisce True se una chiave esiste (anche se il valore è vuoto, quindi farebbe passare una eventuale stringa vuota)
// empty => Restituisce true se una chiave non esiste oppure se il suo valore è vuoto. 
// Attenzione: restituisce true anche se chiave e valore esistono ma il valore è convertibile in booleano false. esempio: 0, "0", false, [], null restituiscono true (in questi casi usa prima isset e poi empty).  

    if(
        empty($_POST['nome']) || 
        empty($_POST['cognome']) || 
        empty($_POST['email']) ||
        empty($_POST['password'])
    ){
        //Se l'utente è finito in questa pagina senza inviare i dati del Form oppure non ha compilato uno dei dati richiesti dal Form, allora verrà ridirezionato verso index.php
        header('Location:index.php');
        die;//blocco l'esecuzione del resto dello script (IL REDIRECT NON BASTA)
    }
    
    // var_dump($_POST);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISCRIZIONE CON CONFERMA</title>
</head>
<body>

    <h1>Iscrizione avvenuta con successo!</h1>

    <h2>Ecco i dati del tuo account:</h2>

    <ul>
        <li>Nome: <?=$_POST['nome']?></li>
        <li>Cognome: <?=$_POST['cognome']?></li>
        <li>Email: <?=$_POST['email']?></li>
        <li>Password: <?=$_POST['password']?></li>
    </ul>

</body>
</html>