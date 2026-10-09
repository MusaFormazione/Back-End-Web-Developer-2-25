<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <select>
            <option value="it">Italiano</option>
            <option value="en">English</option>
        </select>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="chi-siamo.php">Chi Siamo</a></li>
                <li><a href="contatti.php">Contatti</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-12">

                <h1>Contattaci!</h1>

                <form action="/">
                    <input type="text" name="nome" placeholder="Il tuo nome">
                    <input type="text" name="cognome" placeholder="Il tuo cognome">
                    <textarea name="messaggio" placeholder="Messaggio..."></textarea>
                </form>

            </div>
        </div>
    </div>

</body>

</html>