-- Importare in MySQL o phpMyAdmin prima di aprire index.php.
-- Il nome del database coincide con quello usato nella connessione PHP.
CREATE DATABASE IF NOT EXISTS esercitazione_l22 CHARACTER SET utf8mb4;
USE esercitazione_l22;

-- Eseguire su un database che non contiene ancora la tabella utenti.
CREATE TABLE utenti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50),
    eta INT,
    citta VARCHAR(50),
    email VARCHAR(100)
);

-- Alcune citta si ripetono per esercitarsi con la select e array_unique().
INSERT INTO utenti (nome, eta, citta, email) VALUES
('Mario Rossi', 35, 'Roma', 'mario.rossi@example.com'),
('Luisa Bianchi', 28, 'Milano', 'luisa.bianchi@example.com'),
('Paolo Verdi', 42, 'Napoli', 'paolo.verdi@example.com'),
('Anna Neri', 25, 'Roma', 'anna.neri@example.com'),
('Giulia Blu', 30, 'Firenze', 'giulia.blu@example.com'),
('Marco Gialli', 45, 'Milano', 'marco.gialli@example.com');


