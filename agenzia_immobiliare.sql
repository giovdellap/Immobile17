-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 24, 2020 alle 19:26
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
-- Database: `agenzia_immobiliare`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `agente_immobiliare`
--

CREATE TABLE `agente_immobiliare` (
  `id` varchar(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `datanascita` date NOT NULL,
  `iscrizione` datetime NOT NULL,
  `verifica` tinyint(1) NOT NULL,
  `id_agenzia` varchar(10) NOT NULL
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

-- --------------------------------------------------------

--
-- Struttura della tabella `amministratore`
--

CREATE TABLE `amministratore` (
  `id` varchar(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `datanascita` date NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_agenzia` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `appuntamento`
--

CREATE TABLE `appuntamento` (
  `id` varchar(10) NOT NULL,
  `data` date NOT NULL,
  `ora_inizio` time NOT NULL,
  `ora_fine` time NOT NULL,
  `id_cliente` varchar(10) NOT NULL,
  `id_agenteimm` varchar(10) NOT NULL,
  `id_immobile` varchar(10) NOT NULL
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
  `password` varchar(20) NOT NULL,
  `iscrizione` datetime NOT NULL,
  `verifica` tinyint(1) NOT NULL,
  `id_agenzia` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `immobile`
--

CREATE TABLE `immobile` (
  `id` varchar(10) NOT NULL,
  `CAP` int(5) NOT NULL,
  `citta` varchar(50) NOT NULL,
  `indirizzo` varchar(50) NOT NULL,
  `tipologia` varchar(50) NOT NULL,
  `dimensione` varchar(15) NOT NULL,
  `descrizione` varchar(5000) NOT NULL,
  `prezzo` varchar(20) NOT NULL,
  `attivo` tinyint(1) NOT NULL,
  `id_agenzia` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `media_admin`
--

CREATE TABLE `media_admin` (
  `id` varchar(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `immagine` blob NOT NULL,
  `id_admin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `media_agenteimm`
--

CREATE TABLE `media_agenteimm` (
  `id` varchar(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `immagine` blob NOT NULL,
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
  `immagine` blob NOT NULL,
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
  `immagine` blob NOT NULL,
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
  `immagine` blob NOT NULL,
  `id_immobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `agente_immobiliare`
--
ALTER TABLE `agente_immobiliare`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_agenzia` (`id_agenzia`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_agenzia` (`id_agenzia`);

--
-- Indici per le tabelle `immobile`
--
ALTER TABLE `immobile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_agenzia` (`id_agenzia`);

--
-- Indici per le tabelle `media_admin`
--
ALTER TABLE `media_admin`
  ADD KEY `id_admin` (`id_admin`);

--
-- Indici per le tabelle `media_agenteimm`
--
ALTER TABLE `media_agenteimm`
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
-- Limiti per la tabella `agente_immobiliare`
--
ALTER TABLE `agente_immobiliare`
  ADD CONSTRAINT `agente_immobiliare_ibfk_1` FOREIGN KEY (`id_agenzia`) REFERENCES `agenzia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Limiti per la tabella `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_agenzia`) REFERENCES `agenzia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `immobile`
--
ALTER TABLE `immobile`
  ADD CONSTRAINT `immobile_ibfk_1` FOREIGN KEY (`id_agenzia`) REFERENCES `agenzia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `media_admin`
--
ALTER TABLE `media_admin`
  ADD CONSTRAINT `media_admin_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `amministratore` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `media_agenteimm`
--
ALTER TABLE `media_agenteimm`
  ADD CONSTRAINT `media_agenteimm_ibfk_1` FOREIGN KEY (`id_agenteimm`) REFERENCES `agente_immobiliare` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `media_agenzia`
--
ALTER TABLE `media_agenzia`
  ADD CONSTRAINT `media_agenzia_ibfk_1` FOREIGN KEY (`id_agenzia`) REFERENCES `agenzia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
