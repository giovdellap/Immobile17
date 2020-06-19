-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 19, 2020 alle 16:31
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
  `datanascita` date NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `iscrizione` date NOT NULL,
  `verifica` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `agente_immobiliare`
--

INSERT INTO `agente_immobiliare` (`id`, `nome`, `cognome`, `datanascita`, `mail`, `password`, `iscrizione`, `verifica`) VALUES
('AG1', 'Aldo', 'Rossi', '1975-12-25', 'aldorossi@info.it', 'pippo', '2020-06-11', 1),
('AG2', 'Gabriele', 'Gatti', '1985-05-01', 'gabrielegatti@info.it', 'topolino', '2020-03-09', 1),
('AG3', 'Vanessa', 'Marchesani', '1987-03-16', 'vanessamarchesani@info.it', 'paperino', '2020-06-15', 1);

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
('AZ1', 'Immobile17', 'L\'Aquila', 67100, 'AQ', 'Via Enrico De Nicola 17'),
('AZ2', 'Prova1', 'Aquila', 67100, 'AQ', 'via dei matti 3');

-- --------------------------------------------------------

--
-- Struttura della tabella `amministratore`
--

CREATE TABLE `amministratore` (
  `id` varchar(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_agenzia` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `amministratore`
--

INSERT INTO `amministratore` (`id`, `nome`, `cognome`, `mail`, `password`, `id_agenzia`) VALUES
('AM1', 'Admin', 'Istrator', 'admin@admin.it', 'Ciro', 'AZ1');

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

--
-- Dump dei dati per la tabella `appuntamento`
--

INSERT INTO `appuntamento` (`id`, `data`, `ora_inizio`, `ora_fine`, `id_cliente`, `id_agenteimm`, `id_immobile`) VALUES
('AP1', '2020-07-27', 11.3, 12, 'CL2', 'AG2', 'IM2'),
('AP2', '2020-07-31', 10.3, 11, 'CL1', 'AG1', 'IM1');

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
  `iscrizione` date NOT NULL,
  `verifica` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `cognome`, `datanascita`, `mail`, `password`, `iscrizione`, `verifica`) VALUES
('CL1', 'Giordano', 'Bruno', '1548-02-17', 'vadoafuoco@hotmail.com', 'campodeifiori', '1568-11-01', 1),
('CL2', 'Marco ', 'Di Domenica', '1998-07-07', 'marcodido@hotmail.com', 'sabato', '2020-06-01', 1),
('CL3', 'Gabriele', 'Foderà', '1998-08-19', 'gifold@gmail.com', 'hodor', '2020-06-01', 1),
('CL4', 'Giovanni Nicola', 'Della Pelle', '1997-01-10', 'giovdellap@gmail.com', 'macchia', '2020-06-01', 1),
('CL5', 'Eustachio', 'Popovich', '1948-03-16', 'facciolapopovich@hotmail.com', 'CartaIgienica777', '2020-06-15', 1),
('CL6', 'Eustachio', 'Popovich', '1948-03-16', 'facciolapopovich@hotmail.com', 'CartaIgienica777', '2020-06-15', 1);

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
  `dimensione` varchar(15) NOT NULL,
  `descrizione` varchar(5000) NOT NULL,
  `tipo_annuncio` varchar(50) NOT NULL,
  `prezzo` float NOT NULL,
  `attivo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `immobile`
--

INSERT INTO `immobile` (`id`, `nome`, `citta`, `indirizzo`, `tipologia`, `dimensione`, `descrizione`, `tipo_annuncio`, `prezzo`, `attivo`) VALUES
('IM1', 'casa1', 'L\'Aquila', 'Via Roma 1', 'Monolocale', '500', 'spaziosa e accogliente', 'Vendita', 80000, 1),
('IM2', 'casa2', 'L\'Aquila', 'via Cardinale Mazzarino 53', 'Bilocale', '5000', 'Casa molto carina, senza soffitto, senza cucina, senza pavimento. Ma è bella, bella davvero', 'Vendita', 2, 1),
('IM3', 'casa3', 'L\'Aquila', 'Viale Corrado IV 41', 'monolocale', '150', 'bellino, adatto a studenti', 'Affitto', 850, 1),
('IM4', 'casa4', 'L\'Aquila', 'Viale Corrado IV 71', 'bilocale', '300', 'spaziosa, adatta a famiglie', 'Vendita', 100000, 1),
('IM5', 'casamonica', 'Coppito', 'Via Vetoio 3', 'monolocale', '50', 'grazioso monolocale, vicino al polo universitario di Coppito. Adatto a studenti.', 'Affitto', 350, 1),
('IM6', 'casablanca', 'L\'Aquila', 'Via Aldo Moro 7', 'Appartamento', '100', 'Grazioso Appartamento a pochi minuti dal centro storico al terzo piano di una palazzina in cortina composto da:\r\n- salone con camino;\r\n- cucina abitabile;\r\n- 2 camere da letto\r\n- 1 bagno;\r\n- 1 ripostiglio;\r\n- 3 balconi.\r\nL\'Appartamento in parte arredato, ristrutturato e abitabile offre anche una vista spettacolare.\r\n', 'Vendita', 50000, 1);

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
