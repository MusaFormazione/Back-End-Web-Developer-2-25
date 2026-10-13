<?php

require_once INCLUDES_PATH . "/connection.php";


try{

    $sql = "SELECT * FROM pizzas ORDER BY gusto ASC";
    
    $query = $db->query($sql);
    
    if(!$query){
        redirectToHome("PIZZAS_NOT_FOUND",true);
        die;
    }
         
    $pizze = $query->fetchAll(PDO::FETCH_ASSOC);

}catch(PDOException $e){
    echo $e->getMessage();
}