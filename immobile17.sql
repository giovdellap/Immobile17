-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 11, 2020 alle 10:31
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `immobile17`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `agente_immobiliare`
--

CREATE TABLE `agente_immobiliare` (
  `id` varchar(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `datanascita` date NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `iscrizione` date NOT NULL,
  `verifica` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `agenzia`
--

CREATE TABLE `agenzia` (
  `id` varchar(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `citta` varchar(50) NOT NULL,
  `CAP` int(5) NOT NULL,
  `provincia` varchar(2) NOT NULL,
  `indirizzo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `agenzia`
--

INSERT INTO `agenzia` (`id`, `nome`, `citta`, `CAP`, `provincia`, `indirizzo`) VALUES
('AZ1', 'Immobile17', 'L\'Aquila', 67100, 'AQ', 'Via Enrico De Nicola 17');

-- --------------------------------------------------------

--
-- Struttura della tabella `amministratore`
--

CREATE TABLE `amministratore` (
  `id` varchar(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `id_agenzia` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `amministratore`
--

INSERT INTO `amministratore` (`id`, `nome`, `cognome`, `mail`, `password`, `id_agenzia`) VALUES
('AM1', 'Admin', 'Istrator', 'admin@admin.it', '$2y$10$WiKL8YBhVYZKIgsU6/rxMeMgDihL68GBhepJrGLNGdVFQHh3T/rbS', 'AZ1');

-- --------------------------------------------------------

--
-- Struttura della tabella `appuntamento`
--

CREATE TABLE `appuntamento` (
  `id` varchar(10) NOT NULL,
  `data` date NOT NULL,
  `ora_inizio` float NOT NULL,
  `ora_fine` float NOT NULL,
  `id_cliente` varchar(10) NOT NULL,
  `id_agenteimm` varchar(10) NOT NULL,
  `id_immobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `token_login`
--

CREATE TABLE `token_login` (
                               `id_utente` varchar(10) NOT NULL,
                               `token` varchar(81) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `token_cookie`
--

CREATE TABLE `token_cookie` (
                               `id_utente` varchar(10) NOT NULL,
                               `token` varchar(81) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `cliente`
--

CREATE TABLE `cliente` (
  `id` varchar(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `datanascita` date NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `iscrizione` date NOT NULL,
  `verifica` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `conferma_email`
--

CREATE TABLE `conferma_email` (
  `id_cliente` varchar(10) NOT NULL,
  `codice` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `immobile`
--

CREATE TABLE `immobile` (
  `id` varchar(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `citta` varchar(50) NOT NULL,
  `indirizzo` varchar(50) NOT NULL,
  `tipologia` varchar(50) NOT NULL,
  `dimensione` float NOT NULL,
  `descrizione` varchar(5000) NOT NULL,
  `tipo_annuncio` varchar(50) NOT NULL,
  `prezzo` float NOT NULL,
  `attivo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `media_agenteimm`
--

CREATE TABLE `media_agenteimm` (
  `id` varchar(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `immagine` longblob NOT NULL,
  `id_agenteimm` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `media_agenzia`
--

CREATE TABLE `media_agenzia` (
  `id` varchar(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `immagine` longblob NOT NULL,
  `id_agenzia` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `media_cliente`
--

CREATE TABLE `media_cliente` (
  `id` varchar(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `immagine` longblob NOT NULL,
  `id_cliente` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `media_immobile`
--

CREATE TABLE `media_immobile` (
  `id` varchar(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `immagine` longblob NOT NULL,
  `id_immobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `agente_immobiliare`
--
ALTER TABLE `agente_immobiliare`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `agenzia`
--
ALTER TABLE `agenzia`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `amministratore`
--
ALTER TABLE `amministratore`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_agenzia` (`id_agenzia`);

--
-- Indici per le tabelle `appuntamento`
--
ALTER TABLE `appuntamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_agenteimm` (`id_agenteimm`),
  ADD KEY `id_immobile` (`id_immobile`);

--
-- Indici per le tabelle `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `conferma_email`
--
ALTER TABLE `conferma_email`
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indici per le tabelle `immobile`
--
ALTER TABLE `immobile`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `media_agenteimm`
--
ALTER TABLE `media_agenteimm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_agenteimm` (`id_agenteimm`);

--
-- Indici per le tabelle `media_agenzia`
--
ALTER TABLE `media_agenzia`
  ADD KEY `id_agenzia` (`id_agenzia`);

--
-- Indici per le tabelle `media_cliente`
--
ALTER TABLE `media_cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indici per le tabelle `media_immobile`
--
ALTER TABLE `media_immobile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_immobile` (`id_immobile`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `amministratore`
--
ALTER TABLE `amministratore`
  ADD CONSTRAINT `amministratore_ibfk_1` FOREIGN KEY (`id_agenzia`) REFERENCES `agenzia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `appuntamento`
--
ALTER TABLE `appuntamento`
  ADD CONSTRAINT `appuntamento_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appuntamento_ibfk_2` FOREIGN KEY (`id_agenteimm`) REFERENCES `agente_immobiliare` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appuntamento_ibfk_3` FOREIGN KEY (`id_immobile`) REFERENCES `immobile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Indici per le tabelle `token_login`
--
ALTER TABLE `token_login`
    ADD PRIMARY KEY (`id_utente`);

--
-- Indici per le tabelle `token_cookie`
--
ALTER TABLE `token_cookie`
    ADD PRIMARY KEY (`id_utente`);

--
-- Limiti per la tabella `conferma_email`
--
ALTER TABLE `conferma_email`
  ADD CONSTRAINT `conferma_email_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `media_agenteimm`
--
ALTER TABLE `media_agenteimm`
  ADD CONSTRAINT `media_agenteimm_ibfk_1` FOREIGN KEY (`id_agenteimm`) REFERENCES `agente_immobiliare` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `media_agenzia`
--
ALTER TABLE `media_agenzia`
  ADD CONSTRAINT `media_agenzia_ibfk_1` FOREIGN KEY (`id_agenzia`) REFERENCES `agenzia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `media_agenzia_ibfk_2` FOREIGN KEY (`id_agenzia`) REFERENCES `agenzia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `media_agenzia_ibfk_3` FOREIGN KEY (`id_agenzia`) REFERENCES `agenzia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `media_cliente`
--
ALTER TABLE `media_cliente`
  ADD CONSTRAINT `media_cliente_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `media_immobile`
--
ALTER TABLE `media_immobile`
  ADD CONSTRAINT `media_immobile_ibfk_1` FOREIGN KEY (`id_immobile`) REFERENCES `immobile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
