-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 20. Nov 2020 um 21:09
-- Server-Version: 10.4.14-MariaDB
-- PHP-Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_mark_petadoption`
--
CREATE DATABASE IF NOT EXISTS `cr11_mark_petadoption` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr11_mark_petadoption`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animals`
--

CREATE TABLE `animals` (
  `animalID` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `hobbies` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `size` enum('small','large') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `animals`
--

INSERT INTO `animals` (`animalID`, `image`, `name`, `description`, `hobbies`, `location`, `age`, `size`) VALUES
(1, 'https://upload.wikimedia.org/wikipedia/commons/2/20/Pipin_Pomeranian.jpg', 'Mrs. Fluffy', 'A tiny, fluffy pomeranian who wants to be taken serious', 'sleeping, eating, being cuddled', 'Kettenbrückengasse 23 / 2 / 12, 1050 Wien', 3, 'small'),
(2, 'https://upload.wikimedia.org/wikipedia/commons/9/9e/VMNH_megalodon.jpg', 'Mr. Nibble', 'Why are you screaming? I only want to play...', 'eating sushi, whales and boats', 'Ocean avenue 1, 123 Atlantis', 3600000, 'large'),
(4, 'https://upload.wikimedia.org/wikipedia/commons/9/93/Golden_Retriever_Carlos_%2810581910556%29.jpg', 'Mr. Wuff', 'Who is a good boy? I am a good boy!', 'barking, fetching tennis balls', 'Kettenbrückengasse 23 / 2 / 12, 1050 Wien', 7, 'large'),
(10, 'https://upload.wikimedia.org/wikipedia/commons/d/dc/Grumpy_Cat_%2814556024763%29_%28cropped%29.jpg', 'Grumpy Cat', 'Leave me alone!', 'being a meme', 'Morristown, Arizona, USA', 7, 'small'),
(11, 'https://upload.wikimedia.org/wikipedia/en/d/df/Sam_dog.jpg', 'Sam', 'Beauty is on the inside', 'scaring little children', 'Santa Barbara, California, USA', 15, 'small'),
(12, 'https://www.meme-arsenal.com/memes/49ae97404b9f83430312f683ef43858a.jpg', 'Mr. Asshole', 'Why would you want to adopt this stupid thing?', 'scratching pople, peeing on the floor, licking their balls', 'Kettenbrückengasse 23 / 2 / 12, 1050 Wien', 10, 'large'),
(13, 'https://upload.wikimedia.org/wikipedia/commons/f/fc/Two_Adult_Guinea_Pigs_%28cropped%29.jpg', 'Alice', 'Some generic guinea pig', 'eating, sleeping', 'Kettenbrückengasse 23 / 2 / 12, 1050 Wien', 4, 'small'),
(14, 'https://upload.wikimedia.org/wikipedia/commons/3/37/African_Bush_Elephant.jpg', 'Peter', 'An African savanna elephant, is the largest living terrestrial animal so you better have some space in your living room.', 'elephant stuff', 'Somewhere in Africa', 30, 'large');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userPass` varchar(255) DEFAULT NULL,
  `userType` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userID`, `userName`, `userEmail`, `userPass`, `userType`) VALUES
(1, 'Erika', 'Erika@Mustermann.at', '481f6cc0511143ccdd7e2d1b1b94faf0a700a8b49cd13922a70b5ae28acaa8c5', 'admin'),
(2, 'Max', 'Max@Mustermann.at', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animalID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `animals`
--
ALTER TABLE `animals`
  MODIFY `animalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
