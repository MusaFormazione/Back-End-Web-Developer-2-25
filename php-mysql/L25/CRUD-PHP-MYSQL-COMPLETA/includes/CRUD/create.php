<?php

require "../functions.php";
require INCLUDES_PATH . "/connection.php";

if(!isset($_POST['gusto']) || !isset($_POST['prezzo']) || !isset($_POST['disponibile'])){

redirectToHome();//se l'utente naviga in questa pagina senza inviare i dati richiesti viene rimandato alla home senza spiegazioni, dato l'utilizzo anomalo

}

if(empty($_POST['gusto']) || empty($_POST['prezzo'])){
//in questo caso posso evitare di verificare se $_POST['disponibile'] è vuoto in quanto il dato arriva da una select che invia sempre valori 0 o 1

// die;
redirectTo(BASE_URL ."/create-form.php","EMPTY_FIELDS",true);

}

try{

    [
        "gusto" => $gusto,
        "prezzo" => $prezzo,
        "disponibile" => $disponibile
    ] = $_POST;
        

    $sql = "INSERT INTO pizzas (gusto, prezzo, disponibile) VALUE (:gusto, :prezzo, :disponibile)";

    $query = $db->prepare($sql);

    $query->bindParam(':gusto',$gusto);
    $query->bindParam(':prezzo',$prezzo);
    $query->bindParam(':disponibile',$disponibile);

    
    if($query->execute()){
        $id = $db->lastInsertId();//la pizza è stata inserita e possiamo recuperare l'id che le è stato assegnato
        redirectToHome("INSERT_SUCCESS",false);
    }else{
        //il fallimento di execute() non genera eccezioni quindi dobbiamo gestire anche questo errore
        redirectTo(BASE_URL ."/create-form.php","INSERT_ERROR",true);
    }

}catch(PDOExpection $e){
   redirectTo(BASE_URL ."/create-form.php","INSERT_ERROR",true);
}