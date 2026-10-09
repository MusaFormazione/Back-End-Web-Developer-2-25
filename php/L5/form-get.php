<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <!-- 

    action => Decide a quale pagina inviare i dati per l'elaborazione (Attenzione provoca anche lo spostamento della navigazione verso la pagina di destinazione. ). 
    Se non definito I dati vengono inviati alla pagina attuale 

    method="" => Se method non è definito, allora verrà considerato in automatico un method="get"

    -->

    <form action="destinazione.php" method="GET">
        <input type="text" name="nome" placeholder="Il tuo nome">        
        <input type="text" name="cognome" placeholder="Il tuo cognome">        
        <input type="password" name="password" placeholder="La tua password">
        <button>Invia</button>
    </form>

    <!-- Anche attraverso l'utilizzo di un semplice link, potete inviare dei valori in get  -->
    <a href="./destinazione.php?id=5&password=dfkszjhgfsdkju">Test invio dati con link</a>
    
</body>
</html>