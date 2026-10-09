<?php

if(
        empty($_POST['email']) ||
        empty($_POST['oggetto']) || 
        empty($_POST['messaggio']) 
){
    header('Location:index.php');
    die;
}

$to = "admin@miosito.it";//destinatario
$subject = $_POST['oggetto'];
$message = "
    Hai ricevuto un nuovo messaggio dal tuo sito.

    Email del mittente: {$_POST['email']}

    Messaggio: {$_POST['messaggio']}
";
$headers = "From: noreply@miosito.it\r\n";
$headers .= "CC: socio@miosito.it";

if(mail($to, $subject, $message, $headers)){
    header('Location: index.php?sent-email=success');
}else{
    header('Location: index.php?sent-email=error');
}