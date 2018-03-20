-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Sep 2017 um 15:56
-- Server-Version: 10.1.25-MariaDB
-- PHP-Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `busunternehmen`
--
CREATE DATABASE IF NOT EXISTS `busunternehmen` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `busunternehmen`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `bus`
--

DROP TABLE IF EXISTS `bus`;
CREATE TABLE `bus` (
  `busNr` int(11) NOT NULL,
  `hersteller` varchar(45) DEFAULT NULL,
  `anzahlPlaetze` int(11) DEFAULT NULL,
  `polKz` varchar(45) DEFAULT NULL,
  `Erstzulassung` date DEFAULT NULL,
  `Anschaffungspreis` double DEFAULT NULL,
  `verbrauch` decimal(4,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `bus`
--

INSERT INTO `bus` (`busNr`, `hersteller`, `anzahlPlaetze`, `polKz`, `Erstzulassung`, `Anschaffungspreis`, `verbrauch`) VALUES
(1, 'Mercedes-Benz', 50, 'XYZ-A 123', '2014-04-12', 111273, '19.0'),
(2, 'Mercedes-Benz', 75, 'ABC-Z 987', '2016-03-17', 101813, '14.5');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fahrer`
--

DROP TABLE IF EXISTS `fahrer`;
CREATE TABLE `fahrer` (
  `fahrerNr` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `vorname` varchar(45) DEFAULT NULL,
  `plz` varchar(45) DEFAULT NULL,
  `wohnort` varchar(45) DEFAULT NULL,
  `strasse` varchar(45) DEFAULT NULL,
  `hnr` varchar(45) DEFAULT NULL,
  `gehalt` double DEFAULT NULL,
  `telefon` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `fahrer`
--

INSERT INTO `fahrer` (`fahrerNr`, `name`, `vorname`, `plz`, `wohnort`, `strasse`, `hnr`, `gehalt`, `telefon`) VALUES
(1, 'Meier', 'Max', '04372', 'Waldberg', 'Waldstr.', '3', 2500, '0379/3232145'),
(2, 'Schneider', 'Jan', '62842', 'Schönberg', 'Hauptstr.', '13', 2900, '0518/7294623'),
(3, 'Kaiser', 'Hans', '27590', 'Neustadt', 'Weinberg', '34', 2800, '0243/23424');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fahrt`
--

DROP TABLE IF EXISTS `fahrt`;
CREATE TABLE `fahrt` (
  `fahrtNr` int(11) NOT NULL,
  `busNr` int(11) DEFAULT NULL,
  `fahrerNr` int(11) DEFAULT NULL,
  `abfahrtzeit` time DEFAULT NULL,
  `fahrtzielNr` int(11) DEFAULT NULL,
  `fahrtdatum` date DEFAULT NULL,
  `gebuchtePlaetze` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `fahrt`
--

INSERT INTO `fahrt` (`fahrtNr`, `busNr`, `fahrerNr`, `abfahrtzeit`, `fahrtzielNr`, `fahrtdatum`, `gebuchtePlaetze`) VALUES
(1, 1, 1, '07:00:00', 1, '2017-03-15', 50),
(2, 1, 2, '17:00:00', 1, '2017-04-17', 45),
(3, 2, 3, '13:00:00', 2, '2017-03-15', 63),
(4, 2, 1, '08:00:00', 2, '2017-04-18', 75);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fahrtziele`
--

DROP TABLE IF EXISTS `fahrtziele`;
CREATE TABLE `fahrtziele` (
  `fahrtzielNr` int(11) NOT NULL,
  `fahrtziel` varchar(45) DEFAULT NULL,
  `fahrtzeit` varchar(45) DEFAULT NULL,
  `fahrpreis` decimal(6,2) NOT NULL,
  `distanz` smallint(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `fahrtziele`
--

INSERT INTO `fahrtziele` (`fahrtzielNr`, `fahrtziel`, `fahrtzeit`, `fahrpreis`, `distanz`) VALUES
(1, 'Rom', '14:51', '125.50', 1658),
(2, 'Nizza', '10:45', '135.00', 1418);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`busNr`);

--
-- Indizes für die Tabelle `fahrer`
--
ALTER TABLE `fahrer`
  ADD PRIMARY KEY (`fahrerNr`);

--
-- Indizes für die Tabelle `fahrt`
--
ALTER TABLE `fahrt`
  ADD PRIMARY KEY (`fahrtNr`);

--
-- Indizes für die Tabelle `fahrtziele`
--
ALTER TABLE `fahrtziele`
  ADD PRIMARY KEY (`fahrtzielNr`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `bus`
--
ALTER TABLE `bus`
  MODIFY `busNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `fahrer`
--
ALTER TABLE `fahrer`
  MODIFY `fahrerNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `fahrt`
--
ALTER TABLE `fahrt`
  MODIFY `fahrtNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `fahrtziele`
--
ALTER TABLE `fahrtziele`
  MODIFY `fahrtzielNr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
