<?php

require_once INCLUDES_PATH . "/connection.php";


try{

    $sql = "SELECT * FROM pizzas WHERE id = :id";

    $query = $db->prepare($sql);

    $query->bindParam(':id',$id, PDO::PARAM_INT);
    
    if(!$query->execute()){
        redirectToHome("PIZZA_NOT_FOUND",true);
    }
         
    $pizza = $query->fetchAll(PDO::FETCH_ASSOC);

}catch(PDOException $e){
    echo $e->getMessage();
}