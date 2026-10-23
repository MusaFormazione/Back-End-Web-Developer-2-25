<?php
/*
 * ESEMPIO DIDATTICO: COOKIE
 * Un cookie e' un piccolo dato conservato nel browser. Il browser lo invia
 * automaticamente al server nelle richieste successive compatibili con le sue opzioni.
 * setcookie() deve essere chiamata prima di produrre HTML, perche' invia un header HTTP.
 */

$durata = 3600;//scadenza in 1 ora


setCookie("nome", "Luca", [
    'expires' => time() + $durata,
    'path' => '/',

    //ALTRE OPZIONI FACOLTATIVE DA USARE SOLO SE SERVONO
    // 'path': URL per cui il cookie e' disponibile; '/' significa tutto il sito.
    'path' => '/',
    // 'domain': dominio autorizzato. Se omesso, vale soltanto per il dominio corrente.
    // 'domain' => 'esempio.it',
    // 'secure': con true il cookie viene inviato solo tramite HTTPS.
    'secure' => false, // In produzione, se il sito usa HTTPS, impostare true.
    // 'httponly': con true JavaScript non puo' leggere il cookie; utile per dati sensibili.
    'httponly' => true,
    // 'samesite': limita l'invio da altri siti: Strict, Lax oppure None.
    // Lax e' una scelta adatta nella maggior parte dei casi; None richiede secure => true.
    'samesite' => 'Lax',
]);


var_dump($_COOKIE);

// Il cookie sara' disponibile in $_COOKIE dalla richiesta successiva. Se e' assente,
// il valore predefinito evita l'avviso PHP nella prima apertura della pagina.
$valoreCookie = $_COOKIE["nome"] ?? 'Non disponibile';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?=htmlspecialchars($valoreCookie, ENT_QUOTES, 'UTF-8') ?>

</body>
</html>