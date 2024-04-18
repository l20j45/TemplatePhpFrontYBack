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
DROP DATABASE IF EXISTS `minisiiau`;
CREATE DATABASE IF NOT EXISTS `minisiiau` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci */;
USE `minisiiau`;

-- Dumping structure for table minisiiau.materia
DROP TABLE IF EXISTS `materia`;
CREATE TABLE IF NOT EXISTS `materia` (
  `codigoMateria` int(11) NOT NULL AUTO_INCREMENT,
  `nombreMateria` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codigoMateria`),
  UNIQUE KEY `NRC` (`codigoMateria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Dumping data for table minisiiau.materia: ~2 rows (approximately)
DELETE FROM `materia`;
INSERT INTO `materia` (`codigoMateria`, `nombreMateria`) VALUES
	(3, 'Excel'),
	(4, 'Plataformas');

-- Dumping structure for table minisiiau.profesor
DROP TABLE IF EXISTS `profesor`;
CREATE TABLE IF NOT EXISTS `profesor` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellidoPaterno` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `apellidoMaterno` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `gradoAcademico` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Dumping data for table minisiiau.profesor: ~100 rows (approximately)
DELETE FROM `profesor`;
INSERT INTO `profesor` (`codigo`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `gradoAcademico`) VALUES
	(4, 'Aviva', 'Hugnin', 'Texton', 'DIOS'),
	(5, 'Eudora', 'Edes', 'Marven', 'DIOS'),
	(6, 'Carling', 'Caser', 'Hendrikse', 'doctor'),
	(7, 'Willie', 'O\'Neal', 'Hars', 'doctor'),
	(8, 'Jarrett', 'Misson', 'Luety', 'profesor'),
	(9, 'Merle', 'Waltho', 'Barthorpe', 'maestro'),
	(10, 'Rosemarie', 'McCaster', 'Ivery', 'DIOS'),
	(11, 'Jonah', 'Vasichev', 'Peat', 'maestro'),
	(12, 'Lavinie', 'Shank', 'Skeldon', 'maestro'),
	(13, 'Margarette', 'Spawforth', 'Zupo', 'doctor'),
	(14, 'Freddi', 'Rainsdon', 'Josovich', 'maestro'),
	(15, 'Barnie', 'Cardinal', 'Downey', 'DIOS'),
	(16, 'Audy', 'Orth', 'Hamilton', 'DIOS'),
	(17, 'Brenden', 'Audsley', 'Yakob', 'maestro'),
	(18, 'Mireielle', 'Couser', 'Dene', 'profesor'),
	(19, 'Raimund', 'Madgwick', 'Renfrew', 'DIOS'),
	(20, 'Ive', 'Elgey', 'Provest', 'maestro'),
	(21, 'Upton', 'Skentelbury', 'Brizell', 'profesor'),
	(22, 'Auria', 'Jochanany', 'Amar', 'profesor'),
	(23, 'Ancell', 'Purchon', 'Bateup', 'maestro'),
	(24, 'Karna', 'Gorring', 'Gauler', 'profesor'),
	(25, 'Nil', 'Koppen', 'Scoggan', 'DIOS'),
	(26, 'Ashla', 'Jacquot', 'Loft', 'profesor'),
	(27, 'Suellen', 'Frankish', 'Glassman', 'DIOS'),
	(28, 'Peggi', 'Mailey', 'Honniebal', 'maestro'),
	(29, 'Cristine', 'Possek', 'Nehl', 'doctor'),
	(30, 'Kary', 'Branton', 'Berthot', 'profesor'),
	(31, 'De', 'Gilpin', 'Gainsford', 'profesor'),
	(32, 'Crissie', 'Minogue', 'Hadwen', 'maestro'),
	(33, 'Jessy', 'Littell', 'Romanet', 'DIOS'),
	(34, 'Mabel', 'Heintze', 'Beaford', 'profesor'),
	(35, 'Lanae', 'Crisford', 'Vine', 'doctor'),
	(36, 'Padgett', 'Goldfinch', 'Hogbourne', 'doctor'),
	(37, 'Gerhardine', 'Casey', 'Stathor', 'doctor'),
	(38, 'George', 'Pozer', 'McDool', 'profesor'),
	(39, 'Alyss', 'Cheeney', 'Tenman', 'DIOS'),
	(40, 'Cull', 'Alf', 'Saer', 'DIOS'),
	(41, 'Reggie', 'Lermit', 'O\'Hallihane', 'DIOS'),
	(42, 'Truda', 'Tumbelty', 'Gooble', 'DIOS'),
	(43, 'Flynn', 'Mays', 'Baggaley', 'doctor'),
	(44, 'Bradan', 'Sagar', 'Brave', 'maestro'),
	(45, 'Farrell', 'Dowker', 'Jiranek', 'maestro'),
	(46, 'Melisande', 'Jolland', 'Curtis', 'maestro'),
	(47, 'Mae', 'Hayton', 'Brunton', 'profesor'),
	(48, 'Shermie', 'Hilldrup', 'Caldes', 'profesor'),
	(49, 'Xenia', 'Melbourne', 'Le - Count', 'doctor'),
	(50, 'Brnaba', 'Aird', 'Spondley', 'DIOS'),
	(51, 'Alexi', 'Burras', 'Hassewell', 'profesor'),
	(52, 'Kayley', 'O\'Tierney', 'Linforth', 'profesor'),
	(53, 'Pernell', 'Allonby', 'Selwin', 'profesor'),
	(54, 'Celina', 'Jago', 'Doylend', 'DIOS'),
	(55, 'Ned', 'Blincko', 'Veart', 'DIOS'),
	(56, 'Vaclav', 'Greatbatch', 'Loughlan', 'maestro'),
	(57, 'Judd', 'Potes', 'Silley', 'DIOS'),
	(58, 'Evita', 'Gloyens', 'Garrioch', 'DIOS'),
	(59, 'Ferdinanda', 'Le Estut', 'Faussett', 'profesor'),
	(60, 'Garrett', 'Radband', 'Dade', 'doctor'),
	(61, 'Barby', 'Hatter', 'Lingner', 'DIOS'),
	(62, 'Cob', 'Hallowes', 'Olivie', 'DIOS'),
	(63, 'Gaston', 'Hanigan', 'Tethacot', 'maestro'),
	(64, 'Reeva', 'Saltsberg', 'Boulds', 'maestro'),
	(65, 'Patric', 'Butchart', 'Bortol', 'maestro'),
	(66, 'Bent', 'Sanja', 'Matisoff', 'DIOS'),
	(67, 'Darelle', 'Ceyssen', 'Bucknall', 'profesor'),
	(68, 'Malvin', 'Hallbird', 'McDuffy', 'profesor'),
	(69, 'Agata', 'Oller', 'Northway', 'maestro'),
	(70, 'Sherye', 'Redwin', 'Haysham', 'profesor'),
	(71, 'Craggy', 'Arboin', 'Duro', 'profesor'),
	(72, 'Bruce', 'Ezzell', 'Rosenberger', 'doctor'),
	(73, 'Gerik', 'Mattis', 'Ozanne', 'DIOS'),
	(74, 'Marielle', 'Hayley', 'Pywell', 'doctor'),
	(75, 'Phillida', 'Hanscombe', 'Trevear', 'maestro'),
	(76, 'Ilario', 'Witsey', 'Vernall', 'DIOS'),
	(77, 'Hamid', 'Bowness', 'Sussex', 'maestro'),
	(78, 'Obed', 'Mulvenna', 'Brockie', 'profesor'),
	(79, 'Lucia', 'Penhaleurack', 'Jakeman', 'DIOS'),
	(80, 'Boycie', 'Wooldridge', 'Pietasch', 'maestro'),
	(81, 'Cliff', 'Bazek', 'Palia', 'DIOS'),
	(82, 'Ronda', 'Thurston', 'Somes', 'doctor'),
	(83, 'Samson', 'Moggie', 'Stodart', 'maestro'),
	(84, 'Emmery', 'Thorn', 'Davers', 'doctor'),
	(85, 'Jolee', 'Gally', 'Elsworth', 'doctor'),
	(86, 'Orelle', 'Shinfield', 'Bruckman', 'DIOS'),
	(87, 'Gerard', 'Sealove', 'Rintoul', 'DIOS'),
	(88, 'Corly', 'Buckie', 'Tift', 'doctor'),
	(89, 'Gilligan', 'Pitfield', 'O\'Shaughnessy', 'DIOS'),
	(90, 'Roslyn', 'Jahns', 'Bryden', 'doctor'),
	(91, 'Akim', 'Leschelle', 'Burrows', 'profesor'),
	(92, 'Dolli', 'Stickney', 'Parkey', 'profesor'),
	(93, 'Meier', 'Cumberlidge', 'Loughnan', 'profesor'),
	(94, 'Dom', 'Pinilla', 'Bartleman', 'doctor'),
	(95, 'Rhiamon', 'Drains', 'Thomazet', 'maestro'),
	(96, 'Caralie', 'Kobel', 'Barkaway', 'profesor'),
	(97, 'Davina', 'Woolen', 'Pedler', 'doctor'),
	(98, 'Liesa', 'Coughtrey', 'Cox', 'doctor'),
	(99, 'Laurice', 'Quantrill', 'Meatcher', 'maestro'),
	(100, 'Sheri', 'Exley', 'Andreotti', 'maestro'),
	(101, 'daniel', 'daniel', 'daniel', 'DIOS'),
	(102, 'test', 'test', 'test', 'test'),
	(103, 'test', 'test', 'test', 'test');

-- Dumping structure for table minisiiau.profesormateria
DROP TABLE IF EXISTS `profesormateria`;
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

-- Dumping data for table minisiiau.profesormateria: ~3 rows (approximately)
DELETE FROM `profesormateria`;
INSERT INTO `profesormateria` (`nrc`, `codigoMateria`, `codigoProfesor`, `Horario`, `Dia1`, `Dia2`) VALUES
	(451, 3, 51, '17', 'martes', 'miercoles'),
	(597, 4, 9, '17:59 a 19:59', 'martes', 'jueves'),
	(666, 3, 4, '1756', 'martes', 'vieres');

-- Dumping structure for table minisiiau.usuario
DROP TABLE IF EXISTS `usuario`;
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
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `codigo` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Dumping data for table minisiiau.usuario: ~100 rows (approximately)
DELETE FROM `usuario`;
INSERT INTO `usuario` (`codigo`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `edad`, `carrera`, `colorFondo`, `usuario`, `password`) VALUES
	(4, 'Brandon', 'Wem', 'Bruckner', '31', 'falso', '#b300b2', 'bbruckner3', 'tP9,c'),
	(5, 'Marylin', 'Boyton', 'Curm', '61', 'conta', '#2ae553', 'mcurm4', 'eB6@uB?l'),
	(6, 'Regan', 'Ghio', 'Carlin', '43', 'leyes', '#3c204b', 'rcarlin5', 'uC9}'),
	(11, 'Klaus', 'Edon', 'Battleson', '61', 'falso', '#2626cd', 'kbattlesona', 'kV9+'),
	(12, 'Latrena', 'Murton', 'Halle', '56', 'conta', '#7edd86', 'lhalleb', 'aV6(p'),
	(13, 'Brew', 'Guillot', 'Clues', '23', 'falso', '#d5b419', 'bcluesc', 'cV1\'>I~'),
	(14, 'Fifine', 'Jumont', 'Belford', '20', 'tecno', '#20cb6a', 'fbelfordd', 'vI2"'),
	(15, 'Bond', 'Eich', 'Linkin', '35', 'conta', '#e53641', 'blinkine', 'iY7!<\''),
	(16, 'Rab', 'MacGuffog', 'Bester', '63', 'leyes', '#35bd93', 'rbesterf', 'zO9%xRG'),
	(17, 'Nerti', 'Keson', 'Winterflood', '64', 'falso', '#67ac9c', 'nwinterfloodg', 'gB5#R'),
	(18, 'Anica', 'Dorber', 'Macia', '80', 'falso', '#d7a7a3', 'amaciah', 'gQ0*0`F|'),
	(19, 'Pyotr', 'MacFarlan', 'Petyt', '25', 'leyes', '#713844', 'ppetyti', 'dB1,'),
	(20, 'Ursala', 'Berrane', 'Stepto', '19', 'conta', '#da8e64', 'usteptoj', 'uS5&{/Z'),
	(21, 'Noell', 'Guirardin', 'Miliffe', '44', 'tecno', '#043c1b', 'nmiliffek', 'tZ8,{JuS'),
	(22, 'Chandra', 'Theurer', 'Bellson', '58', 'leyes', '#6cd980', 'cbellsonl', 'qW7"4xb)'),
	(23, 'Artus', 'Cassedy', 'Beardshall', '21', 'conta', '#400440', 'abeardshallm', 'jF5{'),
	(24, 'Giusto', 'Vittery', 'Norquoy', '38', 'falso', '#4e87ca', 'gnorquoyn', 'mI9`'),
	(25, 'Chick', 'Taberner', 'Aidler', '72', 'falso', '#e5d196', 'caidlero', 'tZ4%"'),
	(26, 'Erick', 'Leaman', 'Ley', '51', 'leyes', '#13dfb6', 'eleyp', 'jE0\'A4'),
	(27, 'Donielle', 'Bridell', 'Fould', '49', 'leyes', '#5dbda1', 'dfouldq', 'qI8|G7'),
	(28, 'Etheline', 'Merrison', 'O\'Leary', '46', 'leyes', '#49b1ac', 'eolearyr', 'kF7{wGX'),
	(29, 'Alanah', 'O\'Growgane', 'Tunaclift', '37', 'falso', '#222bff', 'atunaclifts', 'eR8%`=Cc'),
	(30, 'Celeste', 'Tod', 'Ruddle', '42', 'conta', '#a27914', 'cruddlet', 'oO1,tGf'),
	(31, 'Amata', 'Olive', 'Brightie', '67', 'tecno', '#7f3d71', 'abrightieu', 'xO9\'o9h'),
	(32, 'Ana', 'Shaves', 'Pourveer', '75', 'leyes', '#3b91c9', 'apourveerv', 'eY2<?>G$'),
	(33, 'Chrystal', 'Pollett', 'Nern', '50', 'conta', '#a072a6', 'cnernw', 'wB4+{JUS'),
	(34, 'Patty', 'Langforth', 'Stobbie', '71', 'leyes', '#46280b', 'pstobbiex', 'fY9*x'),
	(35, 'Merla', 'Bartusek', 'Ivanikhin', '40', 'conta', '#3d9bd3', 'mivanikhiny', 'rY8#Pc0'),
	(36, 'Dean', 'Blackborow', 'Kirtley', '79', 'tecno', '#6166af', 'dkirtleyz', 'uV8&&?'),
	(37, 'Rudd', 'Elgy', 'Esslement', '51', 'conta', '#fe087d', 'resslement10', 'aY4$|.d*'),
	(38, 'Aurora', 'Tatteshall', 'Onele', '26', 'tecno', '#e99627', 'aonele11', 'hG7%W/wz'),
	(39, 'Serena', 'Readett', 'Domange', '50', 'falso', '#4bb343', 'sdomange12', 'vX6h'),
	(40, 'Leontine', 'Swateridge', 'Ferras', '30', 'leyes', '#161238', 'lferras13', 'hI4}H'),
	(41, 'Zed', 'Beedell', 'Bretland', '23', 'conta', '#3d2577', 'zbretland14', 'kP0@9q.&'),
	(42, 'Ivar', 'Von Der Empten', 'Mainland', '60', 'falso', '#dee92f', 'imainland15', 'fM6#V'),
	(43, 'Clementia', 'Trustey', 'Feldhuhn', '78', 'tecno', '#0faa4b', 'cfeldhuhn16', 'pI1(AJ>'),
	(44, 'Trumaine', 'Burdekin', 'Tregenna', '77', 'conta', '#e97a88', 'ttregenna17', 'eT8>9'),
	(45, 'Jaymie', 'Duckham', 'Androli', '50', 'leyes', '#25bf32', 'jandroli18', 'mO0@(!|5'),
	(46, 'Innis', 'Fibbings', 'Perview', '23', 'tecno', '#d71428', 'iperview19', 'wC2}I__.'),
	(47, 'Hill', 'Redolfi', 'Gaishson', '22', 'leyes', '#6f8b2d', 'hgaishson1a', 'tE3'),
	(48, 'Kathryne', 'Guerriero', 'Lukacs', '71', 'conta', '#0b42ea', 'klukacs1b', 'oD4=h'),
	(49, 'Reynard', 'Maylam', 'Slemmonds', '43', 'falso', '#ad4a93', 'rslemmonds1c', 'yU0#U{?3'),
	(50, 'Suzie', 'Ewing', 'Prestland', '25', 'falso', '#c22ed8', 'sprestland1d', 'bE2/eKDo'),
	(51, 'Melisenda', 'Denson', 'Elmore', '56', 'falso', '#0f663e', 'melmore1e', 'gT5_Z'),
	(52, 'Nora', 'Nielson', 'Hanselmann', '72', 'leyes', '#2c2ca2', 'nhanselmann1f', 'wW6"i'),
	(53, 'Nessy', 'Coules', 'Castanos', '67', 'conta', '#a2e8c9', 'ncastanos1g', 'nA2`#K'),
	(54, 'Allix', 'Cromley', 'Reisk', '43', 'falso', '#5653dd', 'areisk1h', 'uO7{(Ku'),
	(55, 'Abbeytest', 'Corbishleytest', 'Childerhousetest', '2', 'falso', '#299ff6', 'achilderhouse1itest', 'eC2/BN#'),
	(56, 'Elwood', 'MacKnockiter', 'Cayet', '26', 'falso', '#fad996', 'ecayet1j', 'eN3,`3'),
	(57, 'Rosemary', 'McLucas', 'Kember', '43', 'conta', '#214937', 'rkember1k', 'eO0{'),
	(58, 'Kimberly', 'Gloves', 'Sansom', '46', 'falso', '#3314ad', 'ksansom1l', 'tR7`0'),
	(59, 'Renee', 'Gallety', 'Glidden', '45', 'falso', '#3c2268', 'rglidden1m', 'pI0#~zNu'),
	(60, 'Bobbi', 'Shakespear', 'Bagshawe', '65', 'tecno', '#de356a', 'bbagshawe1n', 'uG5_#!K='),
	(61, 'Dehlia', 'Sousa', 'Cottel', '73', 'leyes', '#cf077a', 'dcottel1o', 'tZ6\'z'),
	(62, 'Wallie', 'Urch', 'Mathie', '28', 'falso', '#6f1a7a', 'wmathie1p', 'xM3%'),
	(63, 'Dante', 'Rosina', 'Newburn', '29', 'tecno', '#b53704', 'dnewburn1q', 'hG6)AB/'),
	(64, 'Ayn', 'Goring', 'Culp', '53', 'leyes', '#157268', 'aculp1r', 'cB4?x4'),
	(65, 'Evelin', 'Farbrace', 'Morgon', '45', 'tecno', '#38b8e5', 'emorgon1s', 'fQ2?>.'),
	(66, 'Morty', 'Paolino', 'McAlroy', '31', 'falso', '#bd08fd', 'mmcalroy1t', 'hG2$0<'),
	(67, 'Teador', 'Beiderbecke', 'De Hailes', '54', 'conta', '#d1955f', 'tdehailes1u', 'sN3{vhT'),
	(68, 'Lonny', 'Dungay', 'Dyne', '34', 'tecno', '#c080c9', 'ldyne1v', 'kK3@'),
	(69, 'Irena', 'Wayte', 'Fortune', '63', 'conta', '#b8e75a', 'ifortune1w', 'uD9|'),
	(70, 'Dasha', 'Abrahams', 'Sheen', '63', 'tecno', '#fe3aed', 'dsheen1x', 'qR2%n6V2'),
	(71, 'Vivianne', 'McCarlie', 'Sherrard', '80', 'tecno', '#aadc3f', 'vsherrard1y', 'lJ1$'),
	(72, 'Ara', 'Spinello', 'Try', '65', 'conta', '#3ca68a', 'atry1z', 'jS5%~uF'),
	(73, 'Debera', 'Ferrick', 'Denge', '57', 'tecno', '#1ea743', 'ddenge20', 'yG8?mLx'),
	(74, 'Sharia', 'Rhymer', 'Ledwitch', '18', 'conta', '#860c86', 'sledwitch21', 'oA1*'),
	(75, 'Carson', 'Elcoat', 'Milkeham', '62', 'conta', '#91dbae', 'cmilkeham22', 'tW2){'),
	(76, 'Giavani', 'Edgeler', 'Southernwood', '31', 'tecno', '#0a335a', 'gsouthernwood23', 'rJ6_l'),
	(77, 'Naomi', 'Deeming', 'Tansly', '30', 'leyes', '#2ffe3d', 'ntansly24', 'kW0}NuNP'),
	(78, 'Silvana', 'Valentim', 'Kincla', '73', 'falso', '#e8680c', 'skincla25', 'yP1/y7MK'),
	(79, 'Jacquelynn', 'Durnill', 'Ashington', '49', 'tecno', '#025854', 'jashington26', 'lX4)'),
	(80, 'Ilsa', 'Overlow', 'Hallibone', '63', 'leyes', '#819e1c', 'ihallibone27', 'vJ8)`q'),
	(81, 'Gennie', 'Janku', 'Burthom', '52', 'tecno', '#c9596d', 'gburthom28', 'dG4!2Q_M'),
	(82, 'Jerry', 'Biddell', 'Cribbin', '66', 'leyes', '#42098b', 'jcribbin29', 'pI3.`'),
	(83, 'Kathryn', 'Czadla', 'Duferie', '73', 'tecno', '#83beff', 'kduferie2a', 'wX3.i3'),
	(84, 'Katlin', 'Waycott', 'McKerlie', '79', 'tecno', '#24549e', 'kmckerlie2b', 'kK5$g5'),
	(85, 'Orland', 'Borges', 'Coyne', '34', 'tecno', '#4b6449', 'ocoyne2c', 'hX1*'),
	(86, 'Esdras', 'Leibold', 'Joll', '54', 'leyes', '#8a6484', 'ejoll2d', 'mP8.'),
	(87, 'Amaleta', 'MacCombe', 'Filippi', '37', 'falso', '#e5897f', 'afilippi2e', 'iX0?r<'),
	(88, 'Heddi', 'Farady', 'Faye', '60', 'falso', '#de8953', 'hfaye2f', 'sA2?A6X'),
	(89, 'Shawnee', 'Cufley', 'Halfhyde', '70', 'tecno', '#fda3af', 'shalfhyde2g', 'uC4>'),
	(90, 'Caroline', 'Ison', 'Shine', '20', 'leyes', '#943a56', 'cshine2h', 'aV5(L@K`'),
	(91, 'Flossie', 'Pearne', 'Giacomazzo', '51', 'falso', '#4c34e8', 'fgiacomazzo2i', 'xI6|!'),
	(92, 'Jefferson', 'Toderini', 'Youings', '58', 'tecno', '#9007f3', 'jyouings2j', 'rR4,*,i'),
	(93, 'Burtie', 'Cartman', 'Amthor', '75', 'falso', '#db5817', 'bamthor2k', 'kF3)$%'),
	(94, 'Anabel', 'Armsden', 'Purselowe', '67', 'leyes', '#139f5a', 'apurselowe2l', 'zG6?HZ'),
	(95, 'Doralyn', 'Commins', 'Cazalet', '61', 'falso', '#a86c5a', 'dcazalet2m', 'rH3`'),
	(96, 'Ronny', 'Newey', 'Seivwright', '58', 'tecno', '#b9d7fd', 'rseivwright2n', 'kN1&ZjBc'),
	(97, 'Tiebold', 'Vasnetsov', 'Figure', '68', 'tecno', '#e9302a', 'tfigure2o', 'qY6`j&/O'),
	(98, 'Catha', 'Benedit', 'Saffle', '79', 'tecno', '#813404', 'csaffle2p', 'vN8(O'),
	(99, 'Donal', 'Bathoe', 'Gummoe', '54', 'conta', '#3bf9f6', 'dgummoe2q', 'xT9}fQ'),
	(100, 'Brewer', 'Kersley', 'Degan', '66', 'conta', '#02266d', 'bdegan2r', 'iO8>B+,'),
	(101, 'daniel', 'daniel', 'daniel', '30', 'daniel', 'daniel', 'daniel', 'daniel');

-- Dumping structure for table minisiiau.usuariomateria
DROP TABLE IF EXISTS `usuariomateria`;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- Dumping data for table minisiiau.usuariomateria: ~1 rows (approximately)
DELETE FROM `usuariomateria`;
INSERT INTO `usuariomateria` (`id`, `codigoUsuario`, `nrcMateria`) VALUES
	(2, 101, 597),
	(3, 101, 451);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
