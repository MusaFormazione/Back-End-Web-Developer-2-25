# Laboratorio PHP e MySQL

Un solo ambiente Docker Compose per tutte le mini applicazioni nella cartella:
PHP 8.4 con Apache, estensioni PDO MySQL e mysqli, Xdebug, MySQL 8.4 e phpMyAdmin.
Configurazione per lo sviluppo locale, con credenziali condivise e permessi per
creare database. Le porte web sono accessibili solo dal computer locale.

## Avvio

Avvia Docker Desktop ed esegui dalla cartella che contiene questo README:

```powershell
docker compose up -d --build
```

- Applicazioni e indice delle cartelle: http://localhost:8080/
- Esempio: http://localhost:8080/L21/
- Esempio annidato: http://localhost:8080/L22/select-dinamica/
- phpMyAdmin: http://localhost:8081/ — utente `user`, password `password`.

Aggiungi liberamente cartelle e file PHP: sono disponibili subito, senza rebuild.
Avvia soltanto il Compose nella cartella principale. I Compose nelle sottocartelle
non sono usati da questo ambiente. Se la porta 8080 o 8081 e gia occupata,
modifica il numero a sinistra nella relativa voce `ports` di `compose.yaml`.

Ogni applicazione vive sotto il proprio percorso URL. Link come `/style.css`
puntano alla radice comune: usa percorsi relativi o includi il percorso
dell'applicazione. Per applicazioni con una cartella `public`, apri quel percorso.

## Database per ogni applicazione

In phpMyAdmin, accedi con `user` / `password`, apri **Database**, inserisci
il nome desiderato (per esempio `mini_shop`) e crea il database usando
`utf8mb4_0900_ai_ci`. Se hai un file SQL, seleziona il database e usa **Importa**.
Non occorre modificare Compose o riavviare i container per ogni database.

Dal codice PHP:

```php
<?php
$db = new PDO(
    'mysql:host=mysql;port=3306;dbname=mini_shop;charset=utf8mb4',
    'user',
    'password',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
```

L'host e `mysql`, la porta interna e `3306`. MySQL non espone una porta sul
computer: le applicazioni e phpMyAdmin lo raggiungono nella rete Docker.
L'account amministratore e `root` / `rootpassword`.

Per le applicazioni gia presenti, crea/importa i database richiesti dai rispettivi
file di connessione (per esempio `basi_mysql` ed `esercitazione_l22`). Questo
ambiente usa un volume nuovo e non importa i dati dei precedenti ambienti Docker.

## Xdebug e var_dump

Usa normalmente `var_dump($variabile);` nel codice e apri la pagina nel browser:
Xdebug in modalita `develop` produce dump HTML formattati e stack trace dettagliati.
Non servono estensioni del browser o un debugger collegato all'editor.
I dump sono limitati a 10 livelli, 256 elementi per livello e 4096 byte per stringa;
puoi modificare questi valori in `docker/php/development.ini`.

Esempio da inserire in una pagina PHP:

```php
<?php
var_dump(['messaggio' => 'Xdebug attivo', 'numeri' => [1, 2, 3]]);
```

Dopo modifiche ai file in `docker/php`, esegui `docker compose up -d --build`.
Riferimento: [Xdebug Development Helpers](https://xdebug.org/docs/develop).

## Comandi utili

```powershell
docker compose ps
docker compose logs -f php
docker compose exec php php -v
docker compose exec mysql mysql -uuser -ppassword
docker compose stop
docker compose start
docker compose down
```

I database restano nel volume `mysql_data` anche dopo `docker compose down`.
**`docker compose down -v` cancella i database di questo ambiente.**
Lo script `docker/mysql/init.sql` viene eseguito solo all'inizializzazione di un
volume vuoto; modificare lo script o le credenziali in Compose non aggiorna
automaticamente un database gia inizializzato.
