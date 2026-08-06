<?php

if(
    empty($_POST["email"]) || 
    empty($_POST["oggetto"]) ||
    empty($_POST["messaggio"])
    ){
        header("Location: ./contatti.php");
        die;
    }

    $to = "miamail@gmail.com";
    $subject = $_POST["oggetto"];
    $message = $_POST["message"];

    $feedback = mail($to, $subject, $message) ? "success" : "error";

    header("Location: ./contatti.php?feedback=$feedback");