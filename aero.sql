-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for aero
CREATE DATABASE IF NOT EXISTS `aero` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `aero`;

-- Dumping structure for table aero.letovi
CREATE TABLE IF NOT EXISTS `letovi` (
  `let_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `let_od` char(200) DEFAULT NULL,
  `let_preku` char(200) DEFAULT NULL,
  `let_do` char(200) DEFAULT NULL,
  `klasa` char(50) DEFAULT NULL,
  PRIMARY KEY (`let_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table aero.letovi: ~4 rows (approximately)
/*!40000 ALTER TABLE `letovi` DISABLE KEYS */;
INSERT INTO `letovi` (`let_id`, `let_od`, `let_preku`, `let_do`, `klasa`) VALUES
	(1, 'Skopje', 'Frankfurt', 'Melbourne', 'Economy'),
	(3, 'Sofia', 'Barcelona', 'Rio de Janeiro', 'Busines'),
	(4, 'Moskva', 'Pariz', 'Vasington', 'Business'),
	(7, 'Zagreb', '', 'Chikago', 'Economy'),
	(8, 'Solun', 'Dubai', 'Sidney', 'Economy');
/*!40000 ALTER TABLE `letovi` ENABLE KEYS */;

-- Dumping structure for table aero.patnici
CREATE TABLE IF NOT EXISTS `patnici` (
  `patnik_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `ime` char(250) NOT NULL DEFAULT '0',
  `adresa` char(250) NOT NULL DEFAULT '0',
  `vozrast` char(50) NOT NULL DEFAULT '',
  `email` char(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`patnik_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table aero.patnici: ~3 rows (approximately)
/*!40000 ALTER TABLE `patnici` DISABLE KEYS */;
INSERT INTO `patnici` (`patnik_id`, `ime`, `adresa`, `vozrast`, `email`) VALUES
	(2, 'Mile Panika', 'Krivogastani', '0-12 years', '0'),
	(3, 'Mali Djokica', 'Bitola', 'under 2', '0'),
	(4, 'Cacko', 'Car Samoil 91', 'vozrasen', 'mile@panika.com');
/*!40000 ALTER TABLE `patnici` ENABLE KEYS */;

-- Dumping structure for table aero.rezervacii
CREATE TABLE IF NOT EXISTS `rezervacii` (
  `rezervacija_id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `let_id` int(3) unsigned NOT NULL,
  `patnik_id` int(3) unsigned NOT NULL,
  `broj_patnici` int(3) unsigned NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`rezervacija_id`),
  KEY `FK1_let` (`let_id`),
  KEY `FK2_patnik` (`patnik_id`),
  CONSTRAINT `FK1_let` FOREIGN KEY (`let_id`) REFERENCES `letovi` (`let_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK2_patnik` FOREIGN KEY (`patnik_id`) REFERENCES `patnici` (`patnik_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table aero.rezervacii: ~4 rows (approximately)
/*!40000 ALTER TABLE `rezervacii` DISABLE KEYS */;
INSERT INTO `rezervacii` (`rezervacija_id`, `let_id`, `patnik_id`, `broj_patnici`, `data`) VALUES
	(1, 1, 2, 1, '2020-02-10 10:11:00'),
	(2, 3, 3, 1, '2020-06-10 17:13:38'),
	(3, 4, 4, 1, '2019-11-21 00:00:00'),
	(6, 7, 3, 2, '2019-12-25 00:00:00'),
	(7, 1, 4, 1, '2020-12-25 00:00:00');
/*!40000 ALTER TABLE `rezervacii` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
