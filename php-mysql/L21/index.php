<?php require_once './connection.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="create.php" method="POST">

        <input type="text" name="gusto" placeholder="Gusto">
        <input type="number" name="prezzo" placeholder="Prezzo">
        <select name="disponibile">
            <option value="0">Si</option>
            <option value="1">No</option>
        </select>

        <button>Invia</button>

    </form>
    
</body>
</html>