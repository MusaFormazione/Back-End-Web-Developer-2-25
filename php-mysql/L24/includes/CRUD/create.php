<?php

require "../connection.php";
require "../functions.php";

if(!isset($_POST['gusto']) || !isset($_POST['prezzo']) || !isset($_POST['disponibile'])){

redirectToHome();//se l'utente naviga in questa pagina senza inviare i dati richiesti viene rimandato alla home senza spiegazioni, dato l'utilizzo anomalo

}

if(empty($_POST['gusto']) || empty($_POST['prezzo'])){
//in questo caso posso evitare di verificare se $_POST['disponibile'] è vuoto in quanto il dato arriva da una select che invia sempre valori 0 o 1

//converto 0 o 1 inviati in post stringa in true o false booleani siccome redirectTo() è fatta per ricevere booleani veri
$isError = boolval($_POST['disponibile']);
// die;
redirectTo(BASE_URL ."/create-form.php","devi compilare tutti i campi",$isError);

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
        redirectToHome("Pizza $gusto(ID: $id) inserita");
    }else{
        //il fallimento di execute() non genera eccezioni quindi dobbiamo gestire anche questo errore
        redirectTo(BASE_URL ."/create-form.php","Errore nell'inserimento della pizza, riprova più tardi",true);
    }

}catch(PDOExpection $e){
   redirectTo(BASE_URL ."/create-form.php","Errore nell'inserimento della pizza, riprova più tardi",true);
}