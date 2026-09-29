<?php

//su docker host=mysql in base al nome del container
//su xampp/mampp o online di solito è host=localhost

try{
    $db = new PDO('mysql:host=mysql;dbname=basi_mysql',"user","password");
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}
