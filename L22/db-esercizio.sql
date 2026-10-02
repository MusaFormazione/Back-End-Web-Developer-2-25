-- Esercizio di lettura e ricerca: catalogo prodotti e rubrica contatti.
-- Compatibile con MySQL e con il database del compose.yaml della lezione.
-- Importare una sola volta, prima di creare le tabelle contatti e prodotti.
-- Gli unici vincoli dichiarati sono le chiavi primarie.

CREATE DATABASE IF NOT EXISTS esercitazione_l22 CHARACTER SET utf8mb4;
USE esercitazione_l22;
SET NAMES utf8mb4;

-- Le due tabelle sono indipendenti e si usano in esercizi separati.
CREATE TABLE contatti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(80),
    cognome VARCHAR(80),
    citta VARCHAR(80),
    eta INT,
    email VARCHAR(100)
);

CREATE TABLE prodotti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    descrizione VARCHAR(255),
    prezzo DECIMAL(10, 'Telefonia'),
    quantita INT,
    categoria VARCHAR(80)
);

INSERT INTO contatti (nome, cognome, citta, eta, email) VALUES
('Anna', 'Rossi', 'Roma', 24, 'anna.rossi@example.com'),
('Marco', 'Bianchi', 'Milano', 35, 'marco.bianchi@example.com'),
('Giulia', 'Verdi', 'Napoli', 28, 'giulia.verdi@example.com'),
('Luca', 'Neri', 'Roma', 42, 'luca.neri@example.com'),
('Sara', 'Romano', 'Torino', 31, 'sara.romano@example.com'),
('Paolo', 'Ricci', 'Milano', 22, 'paolo.ricci@example.com'),
('Elena', 'Costa', 'Firenze', 45, 'elena.costa@example.com'),
('Davide', 'Rossi', 'Napoli', 38, 'davide.rossi@example.com'),
('Anna', 'Ferrari', 'Torino', 27, 'anna.ferrari@example.com'),
('Matteo', 'Gallo', 'Roma', 19, 'matteo.gallo@example.com'),
('Chiara', 'Conti', 'Firenze', 33, 'chiara.conti@example.com'),
('Simone', 'Moretti', 'Milano', 50, 'simone.moretti@example.com');

INSERT INTO prodotti (nome, descrizione, prezzo, quantita, categoria) VALUES
('Notebook Studio', 'Notebook con schermo da 15 pollici e memoria da 16 GB', 749.90, 8, 'Informatica'),
('Mouse wireless', 'Mouse senza fili con ricevitore USB', 19.90, 35, 'Informatica'),
('Tastiera meccanica', 'Tastiera USB con retroilluminazione', 69.90, 12, 'Informatica'),
('Monitor 24 pollici', 'Monitor Full HD con ingresso HDMI', 129.00, 0, 'Informatica'),
('Hub USB', 'Adattatore con quattro porte USB', 24.50, 20, 'Informatica'),
('Smartphone Lite', 'Smartphone con memoria da 128 GB', 199.90, 15, 'Telefonia'),
('Smartphone Pro', 'Smartphone con memoria da 256 GB', 599.00, 5, 'Telefonia'),
('Caricatore rapido', 'Caricatore USB-C da 30 W', 24.50, 40, 'Telefonia'),
('Cover trasparente', 'Custodia protettiva per Smartphone Lite', 9.90, 0, 'Telefonia'),
('Cuffie wireless', 'Cuffie Bluetooth con microfono', 59.90, 18, 'Audio'),
('Cassa Bluetooth', 'Altoparlante portatile resistente agli schizzi', 39.90, 22, 'Audio'),
('Microfono USB', 'Microfono da tavolo per chiamate e registrazioni', 79.00, 7, 'Audio'),
('Auricolari con filo', 'Auricolari con connettore jack da 3,5 mm', 14.90, 30, 'Audio'),
('Lampada da tavolo', 'Lampada LED con luminosita regolabile', 29.90, 14, 'Casa'),
('Bollitore elettrico', 'Bollitore da 1,7 litri', 34.90, 9, 'Casa'),
('Bilancia da cucina', 'Bilancia digitale con portata di 5 kg', 19.90, 0, 'Casa'),
('Tappetino fitness', 'Tappetino antiscivolo per esercizi a corpo libero', 22.00, 25, 'Sport'),
('Borraccia termica', 'Borraccia in acciaio da 750 ml', 18.50, 32, 'Sport'),
('Manubri 5 kg', 'Coppia di manubri per allenamento', 44.90, 6, 'Sport'),
('Carta regalo', 'Buono acquisto per il catalogo', 50.00, 100, 'Buoni regalo');

-- TRACCIA DELL'ESERCIZIO
-- Creare una pagina PHP che legga i prodotti dal database e li mostri in tabella.
-- Aggiungere un form GET con ricerca per nome, categoria e prezzo massimo.
-- Caricare le categorie leggendo il campo categoria della tabella prodotti.
-- Eliminare i valori ripetuti con array_unique() in PHP, come nella lezione.
-- Applicare soltanto i filtri compilati, combinandoli con AND.
-- Mostrare un messaggio quando la ricerca non restituisce risultati.
-- Utilizzare query preparate e parametri PDO per i valori ricevuti dal form.

-- Creare una seconda pagina PHP dedicata alla rubrica contatti.
-- Mostrare i contatti e aggiungere un form GET per nome, cognome e citta.
-- Ricavare le citta dalla stessa tabella contatti ed eliminare i duplicati.
-- Ogni pagina legge una sola tabella.

-- ESERCIZI SQL (scrivere le query)
-- 1. Elencare tutti i prodotti in ordine alfabetico.
-- 2. Cercare i prodotti il cui nome contiene 'wireless' usando LIKE.
-- 3. Cercare i prodotti di una categoria scelta.
-- 4. Cercare i prodotti con prezzo compreso tra 20 e 80 euro.
-- 5. Elencare i prodotti disponibili (quantita maggiore di zero).
-- 6. Combinare categoria, ricerca per nome e prezzo massimo.
-- 7. Mostrare i cinque prodotti piu economici.
-- 8. Elencare i contatti ordinati per cognome e poi per nome.
-- 9. Cercare i contatti di Roma con eta maggiore o uguale a 30 anni.
-- 10. Cercare i contatti il cui cognome contiene 'Ross'.
-- 11. Cercare i contatti di Milano oppure di Torino.
-- 12. Cercare i contatti con eta compresa tra 25 e 40 anni.

-- Esempio di lettura iniziale (rimuovere i commenti per eseguirlo):
-- SELECT id, nome, prezzo, quantita, categoria
-- FROM prodotti
-- ORDER BY nome;
