-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for minisiiau
CREATE DATABASE IF NOT EXISTS `minisiiau` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;
USE `minisiiau`;

-- Dumping structure for table minisiiau.materia
CREATE TABLE IF NOT EXISTS `materia` (
  `codigoMateria` int(11) NOT NULL AUTO_INCREMENT,
  `nombreMateria` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codigoMateria`),
  UNIQUE KEY `NRC` (`codigoMateria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Dumping data for table minisiiau.materia: ~0 rows (approximately)
DELETE FROM `materia`;

-- Dumping structure for table minisiiau.profesor
CREATE TABLE IF NOT EXISTS `profesor` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellidoPaterno` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellidoMaterno` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `gradoAcademico` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Dumping data for table minisiiau.profesor: ~0 rows (approximately)
DELETE FROM `profesor`;

-- Dumping structure for table minisiiau.profesormateria
CREATE TABLE IF NOT EXISTS `profesormateria` (
  `nrc` int(11) NOT NULL AUTO_INCREMENT,
  `codigoMateria` int(11) DEFAULT NULL,
  `codigoProfesor` int(11) DEFAULT NULL,
  `Horario` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Dia1` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Dia2` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`nrc`),
  KEY `FK_profesormateria_materia` (`codigoMateria`),
  KEY `FK_profesormateria_profesor` (`codigoProfesor`),
  KEY `NRC` (`nrc`),
  CONSTRAINT `FK_profesormateria_materia` FOREIGN KEY (`codigoMateria`) REFERENCES `materia` (`codigoMateria`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_profesormateria_profesor` FOREIGN KEY (`codigoProfesor`) REFERENCES `profesor` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=667 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Dumping data for table minisiiau.profesormateria: ~0 rows (approximately)
DELETE FROM `profesormateria`;

-- Dumping structure for table minisiiau.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellidoPaterno` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellidoMaterno` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `edad` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `carrera` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `colorFondo` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `esAdmin` bit(1) DEFAULT NULL,
  `imagen` longblob,
  PRIMARY KEY (`codigo`),
  KEY `codigo` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Dumping data for table minisiiau.usuario: ~0 rows (approximately)
DELETE FROM `usuario`;

-- Dumping structure for table minisiiau.usuariomateria
CREATE TABLE IF NOT EXISTS `usuariomateria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigoUsuario` int(11) DEFAULT NULL,
  `nrcMateria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `FK__usuario` (`codigoUsuario`),
  KEY `FK__profesormateria` (`nrcMateria`),
  CONSTRAINT `FK__profesormateria` FOREIGN KEY (`nrcMateria`) REFERENCES `profesormateria` (`nrc`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__usuario` FOREIGN KEY (`codigoUsuario`) REFERENCES `usuario` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Dumping data for table minisiiau.usuariomateria: ~0 rows (approximately)
DELETE FROM `usuariomateria`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
