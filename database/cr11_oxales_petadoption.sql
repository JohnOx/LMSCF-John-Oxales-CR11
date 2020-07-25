-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Jul 2020 um 14:38
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_oxales_petadoption`
--
CREATE DATABASE IF NOT EXISTS `cr11_oxales_petadoption` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr11_oxales_petadoption`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `adoption`
--

CREATE TABLE `adoption` (
  `adoptionID` int(11) NOT NULL,
  `adoptionDate` date DEFAULT NULL,
  `fk_userID` int(11) DEFAULT NULL,
  `fk_animalsID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animals`
--

CREATE TABLE `animals` (
  `animalsID` int(11) NOT NULL,
  `animalName` varchar(80) DEFAULT NULL,
  `animalAge` int(11) DEFAULT NULL,
  `animalType` enum('small','big') DEFAULT NULL,
  `Breed` varchar(55) NOT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `hobbies` text DEFAULT NULL,
  `adopted` enum('yes','no') DEFAULT NULL,
  `name` varchar(55) NOT NULL,
  `address` varchar(120) NOT NULL,
  `City` varchar(55) NOT NULL,
  `zipCode` int(11) NOT NULL,
  `fk_adoptionID` int(11) DEFAULT NULL,
  `fk_locationID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `animals`
--

INSERT INTO `animals` (`animalsID`, `animalName`, `animalAge`, `animalType`, `Breed`, `description`, `image`, `hobbies`, `adopted`, `name`, `address`, `City`, `zipCode`, `fk_adoptionID`, `fk_locationID`) VALUES
(1, 'Joshua', 4, 'small', 'Dog', 'friendly Chihuahua', 'https://cdn.pixabay.com/photo/2019/03/09/08/49/chihuahua-4043838_960_720.jpg', 'eating', 'no', 'Steven Donut', 'Dunkin Str 256', 'New York City', 558899, NULL, NULL),
(3, 'Capri', 23, 'big', 'capricorn', 'stubborn', 'https://cdn.pixabay.com/photo/2019/08/24/10/09/capricorn-4427336_960_720.jpg', 'climbing', 'no', 'Jason Stubbourne', '1234 MountainRd', 'Nebraska', 775589, NULL, NULL),
(5, 'Puggy', 8, 'small', 'doggy', 'calm, friendly', 'https://cdn.pixabay.com/photo/2015/06/08/15/02/pug-801826_960_720.jpg', 'sleeping', 'no', 'Peter Ugg', '123 pug street', 'milan', 12345, NULL, NULL),
(6, 'Doggy', 4, 'small', 'dog', 'sleepy, friendly', 'https://cdn.pixabay.com/photo/2017/09/25/13/12/dog-2785074_960_720.jpg', 'sleeping', 'yes', 'Doris Oggo', '456 dog road', 'mexiko', 34512, NULL, NULL),
(7, 'Cathy', 2, 'small', 'cat', 'wild, friendly', 'https://cdn.pixabay.com/photo/2020/03/23/08/45/cat-4959941_960_720.jpg', 'stalking', 'no', 'Catwoman', '123 cat street', 'Bali', 145, NULL, NULL),
(8, 'Elrond', 15, 'big', 'elephant', 'calm, protective', 'https://cdn.pixabay.com/photo/2017/10/20/10/58/elephant-2870777_960_720.jpg', 'swimming', 'no', 'Frank Elemen', 'cuban street 45', 'cuba', 345345, NULL, NULL),
(9, 'Fallow', 10, 'big', 'deer', 'friendly', 'https://cdn.pixabay.com/photo/2015/10/12/15/46/fallow-deer-984573_960_720.jpg', 'eating', 'no', 'Forest Whitaker', 'Sherwood Forrest 14', 'london', 1345, NULL, NULL),
(10, 'Tiggrah', 9, 'big', 'tiger', 'wild but friendly', 'https://cdn.pixabay.com/photo/2017/07/24/19/57/tiger-2535888_960_720.jpg', 'bathing', 'no', 'Doris Day', 'Jungle Bush', 'Delhi', 121212, NULL, NULL),
(11, 'Puppy', 1, 'small', 'dog', 'very young', 'https://cdn.pixabay.com/photo/2020/06/30/22/34/dog-5357794_960_720.jpg', 'sleeping,eating', 'no', 'Peter Ugg', '123 pug street', 'milan', 12345, NULL, NULL),
(12, 'Senior Doggo', 13, 'big', 'dog', 'old,calm, friendly', 'https://cdn.pixabay.com/photo/2018/03/31/06/31/dog-3277416_960_720.jpg', 'dancing', 'no', 'Pablo Rodrigo', 'Cuban Drive 15', 'cuba', 189, NULL, NULL),
(13, 'Horst', 5, 'big', 'horse', 'calm, friendly', 'https://cdn.pixabay.com/photo/2016/04/15/10/35/horse-1330690_960_720.jpg', 'sleeping', 'no', 'Horst Pferd', 'Stall 31', 'wien', 1230, NULL, NULL),
(14, 'Debrah', 6, 'big', 'zebra', 'striped', 'https://cdn.pixabay.com/photo/2013/07/16/18/26/south-africa-163052_960_720.jpg', 'playing', 'no', 'Deborah King', '123 kingstreet', 'london', 6645, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `locations`
--

CREATE TABLE `locations` (
  `locationsID` int(11) NOT NULL,
  `locationName` varchar(80) DEFAULT NULL,
  `address` varchar(120) DEFAULT NULL,
  `zipCode` int(11) DEFAULT NULL,
  `city` varchar(55) DEFAULT NULL,
  `fk_animalsID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `userStatus` enum('admin','customer','super') NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userID`, `userName`, `email`, `password`, `userStatus`) VALUES
(2, 'beastmode', 'beast@mode.at', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'customer'),
(4, 'Testo', 'test@test.at', 'e0bc60c82713f64ef8a57c0c40d02ce24fd0141d5cc3086259c19b1e62a62bea', 'customer'),
(5, 'admin', 'admin@admin.at', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'admin'),
(6, 'Superadmin', 'super@admin.at', '937377f056160fc4b15e0b770c67136a5f03c15205b4d3bf918268fefa2c6d0a', 'super');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `adoption`
--
ALTER TABLE `adoption`
  ADD PRIMARY KEY (`adoptionID`),
  ADD KEY `fk_userID` (`fk_userID`),
  ADD KEY `fk_animalsID` (`fk_animalsID`);

--
-- Indizes für die Tabelle `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animalsID`),
  ADD KEY `fk_locationID` (`fk_locationID`),
  ADD KEY `fk_adoptionID` (`fk_adoptionID`);

--
-- Indizes für die Tabelle `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`locationsID`),
  ADD KEY `fk_animalsID` (`fk_animalsID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `adoption`
--
ALTER TABLE `adoption`
  MODIFY `adoptionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `animals`
--
ALTER TABLE `animals`
  MODIFY `animalsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT für Tabelle `locations`
--
ALTER TABLE `locations`
  MODIFY `locationsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `adoption`
--
ALTER TABLE `adoption`
  ADD CONSTRAINT `adoption_ibfk_1` FOREIGN KEY (`fk_userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `adoption_ibfk_2` FOREIGN KEY (`fk_animalsID`) REFERENCES `animals` (`animalsID`);

--
-- Constraints der Tabelle `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ibfk_1` FOREIGN KEY (`fk_locationID`) REFERENCES `locations` (`locationsID`),
  ADD CONSTRAINT `animals_ibfk_2` FOREIGN KEY (`fk_adoptionID`) REFERENCES `adoption` (`adoptionID`);

--
-- Constraints der Tabelle `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`fk_animalsID`) REFERENCES `animals` (`animalsID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
