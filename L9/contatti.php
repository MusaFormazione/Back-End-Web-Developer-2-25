
    <?php include_once "./includes/header.php"?>

    <form action="./invia-mail.php" method="POST">
        <input class="form-control" type="email" placeholder="La tua email" name="email">
        <input class="form-control" type="text" placeholder="Oggetto..." name="oggetto">
        <textarea class="form-control" type="text" placeholder="Il tuo messaggio..." name="messaggio"></textarea>
        <button class="btn btn-info">INVIA</button>
    </form>





    <?php include_once "./includes/footer.php"?>
</body>
</html>