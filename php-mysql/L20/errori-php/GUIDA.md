## Cos'è un `custom.ini`?

PHP legge la sua configurazione principale da un file chiamato `php.ini`.
Questo file definisce moltissime impostazioni: quanta memoria può usare uno
script, quanto può essere grande un file caricato, se mostrare gli errori a
schermo, il fuso orario di default, ecc.

Invece di modificare il `php.ini` "ufficiale" dentro l'immagine Docker (cosa
scomoda, perché è dentro il container e si perderebbe ad ogni rebuild), PHP
permette di aggiungere file di configurazione extra in una cartella apposita
(`conf.d`). Questi file:

- vengono letti **dopo** il `php.ini` principale;
- possono quindi **sovrascrivere** i valori di default;
- si chiamano convenzionalmente `custom.ini`, ma il nome non è obbligatorio
  (basta che finisca in `.ini`).

Nel nostro caso il file si trova in [`php/custom.ini`](php/custom.ini) ed è
collegato al container tramite questa riga nel `docker-compose.yaml`:

```yaml
volumes:
  - ./php/custom.ini:/usr/local/etc/php/conf.d/custom.ini
```

In pratica: il file che modifichi sul tuo computer (`php/custom.ini`) viene
"montato" dentro il container, nella cartella dove PHP cerca le
configurazioni aggiuntive (`/usr/local/etc/php/conf.d/`).

## Come aggiungere/modificare un'opzione

1. Apri il file [`php/custom.ini`](php/custom.ini).
2. Aggiungi o modifica una riga nel formato:

   ```ini
   nome_opzione = valore
   ```

   Esempio: per alzare il limite di memoria a 512M:

   ```ini
   memory_limit = 512M
   ```

3. Riavvia il container per applicare la modifica:

   ```bash
   docker compose restart php
   ```

## Xdebug (debug passo-passo)

Il container include anche **Xdebug**, un'estensione PHP che permette di
mettere breakpoint nel codice dal proprio editor (VS Code, PhpStorm, ecc.) e
fermare l'esecuzione dello script in quel punto per ispezionare variabili e
stack delle chiamate — molto più comodo di riempire il codice di `echo`/`var_dump`.

La sua configurazione è nel file separato
[`php/xdebug.ini`](php/xdebug.ini), collegato al container in modo analogo a
`custom.ini`:

```yaml
volumes:
  - ./php/xdebug.ini:/usr/local/etc/php/conf.d/xdebug.ini
```

È tenuto separato da `custom.ini` per chiarezza didattica: `custom.ini`
contiene le impostazioni "generali" di PHP, `xdebug.ini` è dedicato solo al
debugger.

### Configurare VS Code

1. Installa l'estensione **PHP Debug** (di Xdebug/DEVSENSE) in VS Code.
2. Crea un file `.vscode/launch.json` con:

   ```json
   {
     "version": "0.2.0",
     "configurations": [
       {
         "name": "Ascolta Xdebug",
         "type": "php",
         "request": "launch",
         "port": 9003,
         "pathMappings": {
           "/var/www/html": "${workspaceFolder}"
         }
       }
     ]
   }
   ```

   `pathMappings` dice a VS Code come far corrispondere i file DENTRO il
   container (`/var/www/html`, il webroot) ai file sul tuo computer
   (`${workspaceFolder}`, questa cartella).

3. Avvia il debug in VS Code (F5) e poi apri una pagina del sito nel
   browser: l'esecuzione si fermerà sui breakpoint che hai impostato.

### Disattivare Xdebug quando non serve

Xdebug rallenta leggermente PHP. Se non ti serve il debug per un po', puoi
commentare la riga `xdebug.start_with_request = yes` in
[`php/xdebug.ini`](php/xdebug.ini) (mettendo `;` davanti) e riavviare il
container con `docker compose restart php`.

## Dove trovare tutte le opzioni disponibili

L'elenco completo delle direttive PHP (con spiegazione) è nella
documentazione ufficiale:
<https://www.php.net/manual/en/ini.list.php>
