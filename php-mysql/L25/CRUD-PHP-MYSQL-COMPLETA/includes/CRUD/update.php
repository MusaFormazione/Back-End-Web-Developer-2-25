<?php

require "../functions.php";
require INCLUDES_PATH . "/connection.php";

$id = $_GET['id'] ?? '';

if(empty($id)){
redirectToHome('Errore!', true);
}

if(!isset($_POST['gusto']) || !isset($_POST['prezzo']) || !isset($_POST['disponibile'])){

redirectToHome();//se l'utente naviga in questa pagina senza inviare i dati richiesti viene rimandato alla home senza spiegazioni, dato l'utilizzo anomalo

}

if(empty($_POST['gusto']) || empty($_POST['prezzo'])){
//in questo caso posso evitare di verificare se $_POST['disponibile'] è vuoto in quanto il dato arriva da una select che invia sempre valori 0 o 1

// die;

// "EMPTY_FIELDS" è una chiave che identifica un errore che trovi nella costante messages nel file functions.php, è un meccanismo che consente di inviare in get il nome del messaggio, anzichè il messaggio(che sarebbe facilmente manomissibile aprendo ad attacchi xss)
redirectTo(BASE_URL ."/edit-form.php","EMPTY_FIELDS",true);

}

try{

    [
        "gusto" => $gusto,
        "prezzo" => $prezzo,
        "disponibile" => $disponibile
    ] = $_POST;
        

    $sql = "UPDATE pizzas
    SET gusto = :gusto, prezzo = :prezzo, disponibile = :disponibile
    WHERE id = :id";

    $query = $db->prepare($sql);

    $query->bindParam(':id',$id);
    $query->bindParam(':gusto',$gusto);
    $query->bindParam(':prezzo',$prezzo);
    $query->bindParam(':disponibile',$disponibile);

    
    if($query->execute()){
       
        redirectToHome("UPDATE_SUCCESS",false);
    }else{
        //il fallimento di execute() non genera eccezioni quindi dobbiamo gestire anche questo errore
        redirectTo(BASE_URL ."/edit-form.php","UPDATE_ERROR",true);
    }

}catch(PDOExpection $e){
   redirectTo(BASE_URL ."/edit-form.php","UPDATE_ERROR",true);
}