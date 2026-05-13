-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 29, 2026 alle 09:43
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fastercom`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `classi`
--

CREATE TABLE `classi` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `anno` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `classi`
--

INSERT INTO `classi` (`id`, `nome`, `anno`) VALUES
(1, '3ina', '2026'),
(2, '5ina', '2026');

-- --------------------------------------------------------

--
-- Struttura della tabella `docenti`
--

CREATE TABLE `docenti` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `utente_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `docenti`
--

INSERT INTO `docenti` (`id`, `nome`, `cognome`, `utente_id`) VALUES
(1, 'docente', 'prova', 4),
(2, 'docente', 'prova2', 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `insegnamenti`
--

CREATE TABLE `insegnamenti` (
  `id` int(11) NOT NULL,
  `docente_id` int(11) DEFAULT NULL,
  `materia_id` int(11) DEFAULT NULL,
  `classe_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `insegnamenti`
--

INSERT INTO `insegnamenti` (`id`, `docente_id`, `materia_id`, `classe_id`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1),
(4, 1, 1, 2),
(7, 1, 3, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `materie`
--

CREATE TABLE `materie` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `materie`
--

INSERT INTO `materie` (`id`, `nome`) VALUES
(1, 'matematica'),
(2, 'italiano'),
(3, 'informatica'),
(4, 'tpsit'),
(5, 'sistemi e reti'),
(6, 'storia'),
(7, 'gpoi'),
(8, 'inglese'),
(9, 'fovnite');

-- --------------------------------------------------------

--
-- Struttura della tabella `studenti`
--

CREATE TABLE `studenti` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `data_nascita` date NOT NULL,
  `codice_fiscale` varchar(16) NOT NULL,
  `utente_id` int(11) DEFAULT NULL,
  `classe_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `studenti`
--

INSERT INTO `studenti` (`id`, `nome`, `cognome`, `data_nascita`, `codice_fiscale`, `utente_id`, `classe_id`) VALUES
(1, 'studente', 'prova', '1902-02-02', 'PRVSDN02B02L378Q', 3, 1),
(2, 'studente2', 'prova', '1902-02-02', 'PRVSDN02B02L378Q', 3, 1),
(3, 'studente3', 'prova', '1902-02-02', 'PRVSDN02B02L378Q', 3, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password_hash` varchar(100) NOT NULL,
  `ruolo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `email`, `password_hash`, `ruolo`) VALUES
(1, 'matteo.pompilio@buonarroti.tn.it', '$2a$12$qOEH5rQu12fqPXOwYz1YJuJwL0IKBDzuD2a7m75JlNV4imFRmr3A6', 'admin'),
(2, 'luca.tamanini@buonarroti.tn.it', '$2a$12$qOEH5rQu12fqPXOwYz1YJuJwL0IKBDzuD2a7m75JlNV4imFRmr3A6', 'admin'),
(3, 'studente@gmail.com', '$2a$12$KLhU2HgvC6RchB/o0PoLoeSPfpl6MdaT67qxwqQznKyFCTK5O7dW6', 'studente'),
(4, 'docente@gmail.com', '$2a$12$kwu8y1D/Mg0KRlNuI9d//OsliVq9.uszuB6ZT8QfXy8a02S7ei7i.', 'docente'),
(5, 'docente2@gmail.com', '$2a$12$kwu8y1D/Mg0KRlNuI9d//OsliVq9.uszuB6ZT8QfXy8a02S7ei7i.', 'docente'),
(6, 'admin@gmail.com', '$2y$10$h4uKttwdLqbyIgFF8eYvaeoiFZuaalG6F5ExenoWSwiiGZDa9s0aG', 'admin');

-- --------------------------------------------------------

--
-- Struttura della tabella `voti`
--

CREATE TABLE `voti` (
  `id` int(11) NOT NULL,
  `valore` decimal(10,0) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp(),
  `nota` varchar(100) DEFAULT NULL,
  `insegnamento_id` int(11) DEFAULT NULL,
  `studente_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `classi`
--
ALTER TABLE `classi`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `docenti`
--
ALTER TABLE `docenti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utente_id` (`utente_id`);

--
-- Indici per le tabelle `insegnamenti`
--
ALTER TABLE `insegnamenti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `docente_id` (`docente_id`),
  ADD KEY `materia_id` (`materia_id`),
  ADD KEY `classe_id` (`classe_id`);

--
-- Indici per le tabelle `materie`
--
ALTER TABLE `materie`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utente_id` (`utente_id`),
  ADD KEY `classe_id` (`classe_id`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `voti`
--
ALTER TABLE `voti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `insegnamento_id` (`insegnamento_id`),
  ADD KEY `studente_id` (`studente_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `classi`
--
ALTER TABLE `classi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `docenti`
--
ALTER TABLE `docenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `insegnamenti`
--
ALTER TABLE `insegnamenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT per la tabella `materie`
--
ALTER TABLE `materie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `studenti`
--
ALTER TABLE `studenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `voti`
--
ALTER TABLE `voti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `docenti`
--
ALTER TABLE `docenti`
  ADD CONSTRAINT `docenti_ibfk_1` FOREIGN KEY (`utente_id`) REFERENCES `utenti` (`id`);

--
-- Limiti per la tabella `insegnamenti`
--
ALTER TABLE `insegnamenti`
  ADD CONSTRAINT `insegnamenti_ibfk_1` FOREIGN KEY (`docente_id`) REFERENCES `docenti` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `insegnamenti_ibfk_2` FOREIGN KEY (`materia_id`) REFERENCES `materie` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `insegnamenti_ibfk_3` FOREIGN KEY (`classe_id`) REFERENCES `classi` (`id`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `studenti`
--
ALTER TABLE `studenti`
  ADD CONSTRAINT `studenti_ibfk_1` FOREIGN KEY (`utente_id`) REFERENCES `utenti` (`id`),
  ADD CONSTRAINT `studenti_ibfk_2` FOREIGN KEY (`classe_id`) REFERENCES `classi` (`id`);

--
-- Limiti per la tabella `voti`
--
ALTER TABLE `voti`
  ADD CONSTRAINT `voti_ibfk_1` FOREIGN KEY (`insegnamento_id`) REFERENCES `insegnamenti` (`id`),
  ADD CONSTRAINT `voti_ibfk_2` FOREIGN KEY (`studente_id`) REFERENCES `studenti` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
