-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 08 jun 2023 kl 12:54
-- Serverversion: 10.4.28-MariaDB
-- PHP-version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `retro_reborn`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `clothes`
--

CREATE TABLE `clothes` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `SubmissionDate` date DEFAULT NULL,
  `Sold` tinyint(1) DEFAULT 0,
  `SoldDate` date DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Seller_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `clothes`
--

INSERT INTO `clothes` (`ID`, `Name`, `SubmissionDate`, `Sold`, `SoldDate`, `Price`, `Seller_ID`) VALUES
(1, 'T-shirt', '2023-05-15', 1, '2023-05-20', 19.99, 1),
(2, 'Jeans', '2023-05-20', 1, '2023-06-07', 39.99, 1),
(3, 'Dress', '2023-05-10', 1, '2023-05-12', 49.99, 2),
(4, 'Långärmad tröja', '2023-06-07', 1, '2023-06-07', 199.99, 2),
(5, 'Stickad tröja', '2023-06-07', 1, '2023-06-07', 399.00, 2),
(6, 'Långärmad tröja', '2023-06-07', 1, '2023-06-08', 899.00, 3),
(7, 'Stickad tröja', '2023-06-08', 1, '2023-06-08', 399.00, 1),
(9, 'Mjukisbyxor', '2023-06-08', 0, NULL, 399.00, 5);

-- --------------------------------------------------------

--
-- Tabellstruktur `sellers`
--

CREATE TABLE `sellers` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `sellers`
--

INSERT INTO `sellers` (`ID`, `FirstName`, `LastName`) VALUES
(1, 'John', 'Doe'),
(2, 'Jane', 'Smith'),
(3, 'Gustav', 'Ehnvik'),
(4, 'Maisah', 'Juevesano'),
(5, 'Daniel', 'Ehnvik');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `clothes`
--
ALTER TABLE `clothes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Seller_ID` (`Seller_ID`);

--
-- Index för tabell `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `clothes`
--
ALTER TABLE `clothes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT för tabell `sellers`
--
ALTER TABLE `sellers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `clothes`
--
ALTER TABLE `clothes`
  ADD CONSTRAINT `clothes_ibfk_1` FOREIGN KEY (`Seller_ID`) REFERENCES `sellers` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
