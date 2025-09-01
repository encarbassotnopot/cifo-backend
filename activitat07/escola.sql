-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: db:3306
-- Temps de generació: 01-09-2025 a les 17:41:32
-- Versió del servidor: 10.11.14-MariaDB-ubu2204
-- Versió de PHP: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `cifo`
--
CREATE DATABASE IF NOT EXISTS `cifo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cifo`;

-- --------------------------------------------------------

--
-- Estructura de la taula `Alumne`
--

DROP TABLE IF EXISTS `Alumne`;
CREATE TABLE `Alumne` (
  `NIF` varchar(9) NOT NULL,
  `Nom` varchar(40) NOT NULL,
  `Cognoms` varchar(80) NOT NULL,
  `Adreca` varchar(255) NOT NULL,
  `Mail_Alum` varchar(255) DEFAULT NULL,
  `Telefon_Alum` varchar(20) DEFAULT NULL,
  `Nom_Tutor` varchar(120) NOT NULL,
  `Email_Tutor` varchar(255) NOT NULL,
  `Curs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `Assignatura`
--

DROP TABLE IF EXISTS `Assignatura`;
CREATE TABLE `Assignatura` (
  `Codi` varchar(5) NOT NULL,
  `Nom` varchar(40) NOT NULL,
  `Descripcio` varchar(255) NOT NULL,
  `Curs` int(11) NOT NULL,
  `NIF_Professor` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `Assistencia`
--

DROP TABLE IF EXISTS `Assistencia`;
CREATE TABLE `Assistencia` (
  `NIF_Alumne` varchar(9) NOT NULL,
  `Codi_Classe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `Classe`
--

DROP TABLE IF EXISTS `Classe`;
CREATE TABLE `Classe` (
  `ID_Classe` int(11) NOT NULL,
  `Codi_Assignatura` varchar(5) NOT NULL,
  `Dia_Classe` date NOT NULL,
  `Hora_Inici` time NOT NULL,
  `Durada_Minuts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `Matricula`
--

DROP TABLE IF EXISTS `Matricula`;
CREATE TABLE `Matricula` (
  `NIF_Alumne` varchar(9) NOT NULL,
  `Codi_Assignatura` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `Professor`
--

DROP TABLE IF EXISTS `Professor`;
CREATE TABLE `Professor` (
  `NIF` varchar(9) NOT NULL,
  `Nom` varchar(40) NOT NULL,
  `Cognoms` varchar(80) NOT NULL,
  `Adreca` varchar(255) NOT NULL,
  `Telefon` varchar(20) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Usuari` varchar(20) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `Alumne`
--
ALTER TABLE `Alumne`
  ADD PRIMARY KEY (`NIF`),
  ADD UNIQUE KEY `Mail_Alum` (`Mail_Alum`);

--
-- Índexs per a la taula `Assignatura`
--
ALTER TABLE `Assignatura`
  ADD PRIMARY KEY (`Codi`),
  ADD KEY `NIF_Professor` (`NIF_Professor`);

--
-- Índexs per a la taula `Assistencia`
--
ALTER TABLE `Assistencia`
  ADD PRIMARY KEY (`NIF_Alumne`,`Codi_Classe`),
  ADD KEY `Codi_Classe` (`Codi_Classe`);

--
-- Índexs per a la taula `Classe`
--
ALTER TABLE `Classe`
  ADD PRIMARY KEY (`ID_Classe`),
  ADD KEY `Codi_Assignatura` (`Codi_Assignatura`);

--
-- Índexs per a la taula `Matricula`
--
ALTER TABLE `Matricula`
  ADD PRIMARY KEY (`NIF_Alumne`,`Codi_Assignatura`),
  ADD KEY `Codi_Assignatura` (`Codi_Assignatura`);

--
-- Índexs per a la taula `Professor`
--
ALTER TABLE `Professor`
  ADD PRIMARY KEY (`NIF`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `Alumne`
--
ALTER TABLE `Alumne`
  ADD CONSTRAINT `Alumne_ibfk_1` FOREIGN KEY (`NIF`) REFERENCES `Matricula` (`NIF_Alumne`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriccions per a la taula `Assignatura`
--
ALTER TABLE `Assignatura`
  ADD CONSTRAINT `Assignatura_ibfk_1` FOREIGN KEY (`NIF_Professor`) REFERENCES `Professor` (`NIF`) ON UPDATE CASCADE;

--
-- Restriccions per a la taula `Assistencia`
--
ALTER TABLE `Assistencia`
  ADD CONSTRAINT `Assistencia_ibfk_1` FOREIGN KEY (`Codi_Classe`) REFERENCES `Classe` (`ID_Classe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Assistencia_ibfk_2` FOREIGN KEY (`NIF_Alumne`) REFERENCES `Alumne` (`NIF`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restriccions per a la taula `Classe`
--
ALTER TABLE `Classe`
  ADD CONSTRAINT `Classe_ibfk_1` FOREIGN KEY (`Codi_Assignatura`) REFERENCES `Assignatura` (`Codi`) ON UPDATE CASCADE;

--
-- Restriccions per a la taula `Matricula`
--
ALTER TABLE `Matricula`
  ADD CONSTRAINT `Matricula_ibfk_1` FOREIGN KEY (`Codi_Assignatura`) REFERENCES `Classe` (`Codi_Assignatura`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
