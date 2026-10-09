# Compito delle vacanze: Mari & Malaffari

Ahoy, sviluppatori!

Durante le vacanze dovrete continuare il sito PHP iniziato in classe e trasformarlo nel portale ufficiale di **Mari & Malaffari**, la più affidabile agenzia di arrembaggi dei sette mari.

Il progetto contiene già una Home, una pagina dedicata alla ciurma, un modulo per inviare messaggi e alcuni componenti condivisi. Il vostro compito è completarlo utilizzando ciò che abbiamo studiato fino a questo momento.

## 1. Completare il sito

Dovrete:

- completare la pagina `chi-siamo.php`;
- presentare la ciurma con titoli, testi e almeno un'immagine;
- organizzare i contenuti utilizzando i componenti e le classi di Bootstrap;
- mantenere lo stesso stile grafico in tutte le pagine;
- controllare che non ci siano tag HTML aperti o chiusi nel posto sbagliato.

Potete inventare liberamente nomi, ruoli e descrizioni dei membri della ciurma.

## 2. Header, logo e navigazione

Nella cartella `assets` trovate il logo piratesco di Mari & Malaffari:

```text
assets/logo-mari-malaffari.png
```

Dovrete:

- sostituire il nome testuale presente nella navbar con il logo;
- rendere il logo cliccabile e collegarlo alla Home;
- assegnare all'immagine un testo alternativo(alt) appropriato;
- scegliere dimensioni adatte alla navbar senza deformare il logo;
- controllare tutti i collegamenti presenti nell'header e nel footer;
- verificare che il menu Bootstrap funzioni anche nella visualizzazione mobile.

## 3. Il messaggio in bottiglia

Completate il modulo presente in `contatti.php` e correggete la sua elaborazione in `invia-mail.php`.

Il modulo deve contenere:

- e-mail del mittente;
- oggetto;
- messaggio.

Quando il modulo viene inviato, PHP deve verificare che ogni campo:

- esista;
- non sia vuoto.

Se manca almeno un dato, l'utente deve essere riportato alla pagina Contatti con un messaggio di errore. Se tutti i dati sono presenti, deve essere mostrato un messaggio di conferma.

Mostrate il risultato con un alert Bootstrap. Quando stampate nella pagina un dato inserito dall'utente, utilizzate `htmlspecialchars()`.

Controllate con attenzione che i nomi utilizzati negli attributi `name` del form corrispondano alle chiavi lette in `$_POST`.

## 4. Funzioni

Nel progetto trovate il file `functions.php`, che contiene già la funzione necessaria per gestire il registro degli arrembaggi. Includete questo file nelle pagine che ne hanno bisogno.

Aggiungete in `functions.php` almeno queste funzioni:

Realizzate almeno queste funzioni:

### `redirect($pagina, $feedback)`

Deve:

- ricevere la pagina di destinazione;
- ricevere un messaggio o un codice di feedback;
- costruire l'indirizzo della pagina;
- eseguire il redirect con `header()`;
- se richiesto interrompere lo script con `die` oppure `exit`.

### `campoCompilato($dati, $nomeCampo)`

Deve restituire `true` soltanto quando il campo indicato esiste nell'array ricevuto e non è vuoto.

Utilizzate queste funzioni sia per il messaggio in bottiglia sia per il nuovo modulo di prenotazione.

## 5. Prenota un arrembaggio

Create una nuova pagina chiamata `prenota-arrembaggio.php` e aggiungetela alla navbar.

Il modulo deve permettere di inserire:

- nome della ciurma;
- e-mail del capitano;
- nome della nave;
- porto di partenza;
- numero di pirati;
- obiettivo dell'arrembaggio;
- bottino desiderato;
- grido di battaglia o richieste particolari.

Per l'obiettivo dell'arrembaggio utilizzate un elemento `select`. Potete proporre, ad esempio:

- galeone carico d'oro;
- nave mercantile;
- flotta reale;
- isola del tesoro;
- nave fantasma.

Scegliete quali campi rendere obbligatori. Per ciascuno di essi controllate con PHP che il campo esista e non sia vuoto.

In caso di errore, riportate l'utente al modulo. In caso di successo, mostrate un messaggio come:

> Arrembaggio prenotato! La ciurma salperà appena il vento sarà favorevole.

## 6. Il registro degli arrembaggi

Ogni prenotazione valida deve essere salvata nel file:

```text
dati/prenotazioni.txt
```

Non abbiamo ancora studiato la gestione dei file. Per questa parte utilizzate direttamente la funzione `gestisciFile()` già presente in `functions.php`, senza modificarla.

La funzione accetta tre argomenti:

- il nome del file;
- l'azione da eseguire: `aggiungi`, `sovrascrivi` oppure `leggi`;
- il contenuto da salvare, quando necessario.

### Breve guida a `gestisciFile()`

Prima di utilizzare la funzione, includete il file che la contiene.
Per aggiungere una nuova prenotazione alla fine del registro:

```php
$prenotazione = 'Barbanera|pirata@example.com|Perla Nera|Tortuga|12';

gestisciFile('./dati/prenotazioni.txt', 'aggiungi', $prenotazione);
```

L'azione `aggiungi` non cancella le prenotazioni già presenti e inserisce automaticamente un ritorno a capo.

Per leggere tutte le prenotazioni:

```php
$contenuto = gestisciFile('./dati/prenotazioni.txt', 'leggi');
```

In questo caso il terzo argomento non è necessario. Se il file non esiste ancora, la funzione restituisce una stringa vuota.

Per sostituire tutto il contenuto del registro:

```php
gestisciFile('./dati/prenotazioni.txt', 'sovrascrivi', $nuovoContenuto);
```

Usate `sovrascrivi` con attenzione: le informazioni precedenti vengono sostituite. Questa azione servirà soprattutto per l'eventuale missione bonus di annullamento di una prenotazione.

Prima di chiamare la funzione, unite i dati di una prenotazione in un'unica stringa. Separate i diversi valori con il carattere `|`.

Esempio del formato da salvare:

```text
Barbanera|pirata@example.com|Perla Nera|Tortuga|12|Galeone carico d'oro|Dobloni|All'arrembaggio!
```

Salvate una prenotazione per ogni riga del file.

## 7. Consultare gli arrembaggi

Create una pagina chiamata `arrembaggi.php`.

La pagina deve:

- leggere il contenuto di `dati/prenotazioni.txt` con `gestisciFile()`;
- separare le diverse righe;
- separare i dati presenti in ogni riga utilizzando il carattere `|`;
- mostrare le prenotazioni in una tabella Bootstrap;
- utilizzare `htmlspecialchars()` per stampare i valori;
- mostrare un messaggio appropriato se non esistono prenotazioni.

## 8. Accesso del quartiermastro

La pagina con il registro degli arrembaggi deve essere protetta da una semplice parola d'ordine.

Create un file `config.php` contenente una variabile con la password del quartiermastro. Includete il file nella pagina `arrembaggi.php` e confrontate la password ricevuta da un piccolo form con quella presente nella configurazione.

Se la password è corretta, mostrate il registro. In caso contrario, mostrate un messaggio di errore.

Non è richiesto utilizzare le sessioni. Questa protezione è solamente un esercizio didattico e non rappresenta un sistema da utilizzare in un sito reale.

## 9. Missioni bonus

Dopo aver completato tutte le parti obbligatorie, potete aggiungere una o più funzionalità:

- mostrare il numero totale degli arrembaggi prenotati;
- calcolare quanti pirati partiranno complessivamente;
- evidenziare con un colore diverso le ciurme con più di dieci pirati;
- contare quanti arrembaggi sono stati richiesti per ciascun obiettivo;
- consentire l'annullamento di una prenotazione e aggiornare il file usando l'azione `sovrascrivi`;
- aggiungere nuovi obiettivi o nuovi tipi di bottino;
- personalizzare ulteriormente il sito con colori, icone e testi pirateschi.

## 10. Prima della consegna

Controllate che:

- tutte le pagine siano raggiungibili dalla navbar;
- i form mostrino un messaggio chiaro in caso di errore;
- i dati validi vengano salvati correttamente;
- il registro mostri tutte le prenotazioni;
- header e footer siano inclusi correttamente;
- il sito sia leggibile sia da computer sia da smartphone;
- non siano presenti errori o avvisi PHP durante il normale utilizzo.

Buon lavoro, ciurma.