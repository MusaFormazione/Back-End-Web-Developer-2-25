
    <?php include_once "./includes/header.php"?>

    <main class="container py-5">
        <h1>Invia un messaggio in bottiglia</h1>
        <p>Hai una domanda per il capitano? Affida il tuo messaggio alle correnti!</p>

        <form action="./invia-mail.php" method="POST">
            <input class="form-control" type="email" placeholder="La tua email di bordo" name="email">
            <input class="form-control" type="text" placeholder="Oggetto del messaggio..." name="oggetto">
            <textarea class="form-control" type="text" placeholder="Scrivi qui il tuo messaggio per la ciurma..." name="messaggio"></textarea>
            <button class="btn btn-info">LANCIA LA BOTTIGLIA</button>
        </form>
    </main>





    <?php include_once "./includes/footer.php"?>
</body>
</html>
