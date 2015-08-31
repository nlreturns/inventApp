-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 25 mei 2015 om 21:19
-- Serverversie: 5.6.20
-- PHP-versie: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `invent`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int(11) NOT NULL,
  `client_company` varchar(1024) DEFAULT NULL,
  `client_name` varchar(1024) DEFAULT NULL,
  `client_address` varchar(1024) DEFAULT NULL,
  `client_postal` varchar(1024) DEFAULT NULL,
  `client_city` varchar(1024) DEFAULT NULL,
  `client_phone` varchar(1024) DEFAULT NULL,
  `client_email` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `material_id` int(11) NOT NULL,
  `material_number` int(10) DEFAULT NULL,
  `material_desc` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `stopwatch`
--

CREATE TABLE IF NOT EXISTS `stopwatch` (
  `stopwatch_id` int(11) NOT NULL,
  `stopwatch_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `stopwatch_stop` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(1024) DEFAULT NULL,
  `user_password` varchar(1024) DEFAULT NULL,
  `user_email` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `worksheet`
--

CREATE TABLE IF NOT EXISTS `worksheet` (
  `worksheet_id` int(11) NOT NULL,
  `worksheet_notes` varchar(1024) DEFAULT NULL,
  `worksheet_date` date DEFAULT NULL,
  `worksheet_expenses` int(10) DEFAULT NULL,
  `CRM` varchar(64) DEFAULT NULL,
  `CRM_date` date DEFAULT NULL,
  `worksheet_signature` int(1) DEFAULT NULL,
  `client_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `worksheet_material`
--

CREATE TABLE IF NOT EXISTS `worksheet_material` (
  `worksheet_id` int(10) NOT NULL,
  `amount` int(10) DEFAULT NULL,
  `material_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `worksheet_stopwatch`
--

CREATE TABLE IF NOT EXISTS `worksheet_stopwatch` (
  `worksheet_id` int(10) NOT NULL,
  `stopwatch_id` int(10) NOT NULL,
  `worksheet_stopwatch_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `client`
--
ALTER TABLE `client`
 ADD PRIMARY KEY (`client_id`);

--
-- Indexen voor tabel `material`
--
ALTER TABLE `material`
 ADD PRIMARY KEY (`material_id`);

--
-- Indexen voor tabel `stopwatch`
--
ALTER TABLE `stopwatch`
 ADD PRIMARY KEY (`stopwatch_id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexen voor tabel `worksheet`
--
ALTER TABLE `worksheet`
 ADD PRIMARY KEY (`worksheet_id`);

--
-- Indexen voor tabel `worksheet_material`
--
ALTER TABLE `worksheet_material`
 ADD PRIMARY KEY (`worksheet_id`,`material_id`);

--
-- Indexen voor tabel `worksheet_stopwatch`
--
ALTER TABLE `worksheet_stopwatch`
 ADD PRIMARY KEY (`worksheet_id`,`stopwatch_id`,`worksheet_stopwatch_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
