<?php
require "../functions.php";
require INCLUDES_PATH . "/connection.php";

$id = $_GET['id'] ?? '';

if(empty($id)){
redirectToHome("GENERIC_ERROR", true);
}

try{


    $sql = "DELETE FROM pizzas WHERE id = :id";

    $query = $db->prepare($sql);

    $query->bindParam(':id', $id, PDO::PARAM_INT);

    if($query->execute()){
        redirectToHome("DELETE_SUCCESS",false);
    }else{
        redirectToHome("DELETE_ERROR",true);        
    }

}catch(PDOExpection $e){
   redirectToHome("DELETE_ERROR",true);   
}
