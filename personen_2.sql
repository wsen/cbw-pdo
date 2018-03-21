-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 21. Mrz 2018 um 13:30
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `test`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `personen_2`
--

CREATE TABLE `personen_2` (
  `uid` int(6) UNSIGNED NOT NULL,
  `nachname` varchar(150) NOT NULL,
  `vorname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `abtlg` varchar(50) NOT NULL,
  `chef` int(6) NOT NULL,
  `last_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `personen_2`
--

INSERT INTO `personen_2` (`uid`, `nachname`, `vorname`, `email`, `abtlg`, `chef`, `last_upd`) VALUES
(1, '27', '10', 'i.ins_nachname@inin.de', '3', 0, '2018-03-21 10:57:18'),
(2, 'Eiter', 'Gisela', 'i.ins_nachname@inin.de', 'Personal', 0, '2018-03-21 11:05:05'),
(3, 'Thäle', 'Ernst-Dieter', 'i.ins_nachname@inin.de', 'Kantine', 0, '2018-03-21 11:05:06'),
(4, 'Bödeker-Trifonov', 'Thorsten', 'i.ins_nachname@inin.de', 'Verkauf', 0, '2018-03-21 11:05:10'),
(5, 'Burschey', 'Angela', 'i.ins_nachname@inin.de', 'Kantine', 0, '2018-03-21 11:07:08'),
(6, 'App', 'Dirk', 'i.ins_nachname@inin.de', 'Personal', 0, '2018-03-21 11:09:00'),
(7, 'Döpner', 'Andre', 'i.ins_nachname@inin.de', 'Kantine', 0, '2018-03-21 11:10:16'),
(8, 'Döpner', 'Thorsten', 'i.ins_nachname@inin.de', 'Einkauf', 0, '2018-03-21 11:11:09'),
(9, 'Eiter', 'Ilona', 'i.ins_nachname@inin.de', 'Personal', 0, '2018-03-21 11:13:51'),
(10, 'Dahlmanns', 'Karsten', 'i.ins_nachname@inin.de', 'Buchhaltung', 0, '2018-03-21 11:14:31'),
(11, 'Anthony', 'Thorsten', 't.anthony@than.de', 'Einkauf', 0, '2018-03-21 11:15:47'),
(12, 'Ackermann', 'Angela', 'a.ackermann@anac.de', 'Kantine', 0, '2018-03-21 11:16:51'),
(13, 'Keßler', 'Ilona', 'i.ke??ler@ilke.de', 'Personal', 0, '2018-03-21 11:16:51'),
(14, 'Brunner', 'Dirk', 'd.brunner@dibr.de', 'Kantine', 0, '2018-03-21 11:16:51'),
(15, 'Büsing', 'Ernst-Dieter', 'e.b??sing@erb?.de', 'Verkauf', 0, '2018-03-21 11:16:52'),
(16, 'Anthes', 'Andre', 'a.anthes@anan.de', 'Verkauf', 0, '2018-03-21 11:16:52'),
(17, 'Post', 'Gertrud', 'g.post@gepo.de', 'Buchhaltung', 0, '2018-03-21 11:16:52'),
(18, 'Bohlen', 'Mario', 'm.bohlen@mabo.de', 'Buchhaltung', 0, '2018-03-21 11:16:52'),
(19, 'Brand', 'Thorsten', 't.brand@thbr.de', 'Personal', 0, '2018-03-21 11:16:52'),
(20, 'König', 'Karsten', 'k.k??nig@kak?.de', 'Buchhaltung', 0, '2018-03-21 11:16:52'),
(21, 'Christophers', 'Karsten', 'k.christophers@kach.de', 'Buchhaltung', 0, '2018-03-21 11:16:53'),
(22, 'Kotke', 'Ernst-Dieter', 'e.kotke@erko.de', 'Versand', 0, '2018-03-21 11:16:53'),
(23, 'Post', 'Helga', 'h.post@hepo.de', 'Buchhaltung', 0, '2018-03-21 11:16:53'),
(24, 'Christophers', 'Dirk', 'd.christophers@dich.de', 'Kantine', 0, '2018-03-21 11:16:53');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `personen_2`
--
ALTER TABLE `personen_2`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `nachname` (`nachname`,`vorname`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `personen_2`
--
ALTER TABLE `personen_2`
  MODIFY `uid` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
