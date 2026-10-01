<?php require_once './connection.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
    //recuperiamo solo la città di ogni utente
    $res = $db->query("SELECT citta FROM utenti");

    //se la query ha problemi fermiamo lo script
    if(!$res) die('Impossibile caricare gli utenti');

    //otteniamo un array contenente i dati richiesti (array pieno di array associativi)
    $rows = $res->fetchAll(PDO::FETCH_ASSOC);

    //PROBLEMA: possono esserci più utenti per ogni città, questo provoca l'esistenza nel nostro array di città duplicate, quindi dobbiamo ottenere le voci uniche prima di procedere

    //pulizia dell'array dai duplicati:

    //step 1: preparo array accumulatore
    $lista_citta = [];

    //ciclo l'array contenente gli array associativi ricevuti dal db
    /**
     * Ha questa struttura:
     * 
     * [
     *      [
     *          "citta" => "Roma"
     *      ],
     *      [
     *          "citta" => "Milano"
     *      ]
     * ]
     */
    foreach($rows as $utente){
        //metto la città nell'array accumulatore
        $lista_citta[] = $utente['citta'];
    }
    //aquesto punto abbiamo la lista di città contenente potenziali duplicati

    //procedo a rimuovere i duplicati
    $lista_citta = array_unique($lista_citta);
?>



    <form action="/" method="GET">

        <select name="citta">
            <option value="">--scegli città--</option>
            <?php foreach($lista_citta as $citta):?>
                <option value="<?=$citta?>"><?=$citta?></option>
            <?php endforeach;?>
        </select>

        <button>Cerca</button>        
    </form>

    <?php if(isset($_GET['citta'])): 
        $citta = $_GET['citta'];
        
        ?>
    <div>
        <h1>Ecco gli utenti nella città: <?=$citta?></h1>

        <?php

            $res = $db->query("SELECT * FROM utenti WHERE citta = '$citta'");

            $rows = $res->fetchAll(PDO::FETCH_ASSOC);

            $campi = array_keys($rows[0]);
    
        ?>
    </div>

    <table>
        <thead>
            <tr>
                <?php foreach($campi as $c):?>
                    <th><?=$c?></th>
                <?php endforeach;?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rows as $utente):
                [
                    "id" => $id,
                    "nome" => $nome,
                    "eta" => $eta,
                    "citta" => $citta,
                    "email" => $email,
                ] = $utente;
                ?>
            <tr>
                <td><?=$id?></td>
                <td><?=$nome?></td>
                <td><?=$eta?></td>
                <td><?=$citta?></td>
                <td><?=$email?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>


    <?php endif;?>
    
    
</body>
</html>