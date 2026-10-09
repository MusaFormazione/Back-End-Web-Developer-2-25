<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h2>Iscrizione con pagina di conferma (finta)</h2>
    <form action="./iscrizione-con-conferma.php" method="POST">
        <input type="text" name="nome" placeholder="Il tuo nome">
        <input type="text" name="cognome" placeholder="Il tuo cognome">
        <input type="email" name="email" placeholder="La tua email">
        <input type="password" name="password" placeholder="La tua password">
        <button>Iscriviti</button>
    </form>

    <?php
    
    if(isset($_GET['sent-email'])){

        $status = $_GET['sent-email'];

        if($status === "success"){
            echo "<p>Messaggio inviato con successo</p>";
        }else{
            echo "<p>Errore nell'invio del messaggio</p>";
        }

    }

    ?>
    <h2>Invia email</h2>
    <form action="invia-mail.php">

        <input type="email" name="email" placeholder="La tua email">
        <input type="text" name="oggetto" placeholder="Oggetto">
        <textarea name="messaggio"></textarea>
        <button>Contattaci</button>
    </form>
</body>
</html>