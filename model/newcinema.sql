-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for newcinema
CREATE DATABASE IF NOT EXISTS `newcinema` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `newcinema`;

-- Dumping structure for table newcinema.acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int NOT NULL,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_acteur`),
  UNIQUE KEY `id_personne` (`id_personne`),
  CONSTRAINT `acteur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table newcinema.acteur: ~6 rows (approximately)
INSERT INTO `acteur` (`id_acteur`, `id_personne`) VALUES
	(3, 1),
	(4, 2),
	(1, 3),
	(2, 4),
	(6, 6),
	(5, 7);

-- Dumping structure for table newcinema.asso_genre
CREATE TABLE IF NOT EXISTS `asso_genre` (
  `id_film` int NOT NULL,
  `id_genre` int NOT NULL,
  PRIMARY KEY (`id_film`,`id_genre`),
  KEY `id_genre` (`id_genre`),
  CONSTRAINT `asso_genre_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `asso_genre_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table newcinema.asso_genre: ~6 rows (approximately)
INSERT INTO `asso_genre` (`id_film`, `id_genre`) VALUES
	(3, 1),
	(1, 3),
	(2, 3),
	(3, 4),
	(3, 5),
	(2, 6);

-- Dumping structure for table newcinema.casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int NOT NULL,
  `id_acteur` int NOT NULL,
  `id_personnage` int NOT NULL,
  PRIMARY KEY (`id_film`,`id_acteur`,`id_personnage`),
  KEY `id_acteur` (`id_acteur`),
  KEY `id_personnage` (`id_personnage`),
  CONSTRAINT `casting_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `casting_ibfk_2` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `casting_ibfk_3` FOREIGN KEY (`id_personnage`) REFERENCES `personnage` (`id_personnage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table newcinema.casting: ~9 rows (approximately)
INSERT INTO `casting` (`id_film`, `id_acteur`, `id_personnage`) VALUES
	(1, 1, 2),
	(5, 1, 3),
	(1, 2, 4),
	(2, 2, 2),
	(2, 2, 4),
	(3, 2, 2),
	(4, 2, 3),
	(4, 3, 3),
	(5, 3, 5);

-- Dumping structure for table newcinema.film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL,
  `titre_film` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `createAt_film` date NOT NULL,
  `lieu_film` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `duree_film` time NOT NULL,
  `description_film` text COLLATE utf8mb4_bin NOT NULL,
  `rating` decimal(15,2) DEFAULT NULL,
  `id_realisateur` int NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `id_realisateur` (`id_realisateur`),
  CONSTRAINT `film_ibfk_1` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table newcinema.film: ~6 rows (approximately)
INSERT INTO `film` (`id_film`, `titre_film`, `createAt_film`, `lieu_film`, `duree_film`, `description_film`, `rating`, `id_realisateur`) VALUES
	(1, 'Flash', '2020-06-20', 'France', '00:55:00', 'the momeon', 4.50, 1),
	(2, 'Come Back', '2019-06-10', 'France', '01:18:50', 'the momeon', 3.20, 2),
	(3, 'Black Adam', '2022-03-27', 'France', '00:09:00', 'the momeon', 5.00, 1),
	(4, 'Bullet Train', '2022-02-15', 'France', '00:06:00', 'the momeon', 2.00, 2),
	(5, 'James Bond', '2018-07-20', 'France', '00:05:00', 'the momeon', 4.60, 2),
	(6, 'Spy Kid', '2002-04-23', 'France', '00:06:00', 'the momeon', 1.00, 1);

-- Dumping structure for table newcinema.genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL,
  `nom_genre` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table newcinema.genre: ~6 rows (approximately)
INSERT INTO `genre` (`id_genre`, `nom_genre`) VALUES
	(1, 'comedie'),
	(2, 'Science Fiction'),
	(3, 'Action'),
	(4, 'Drama'),
	(5, 'Fantasy'),
	(6, 'Romance');

-- Dumping structure for table newcinema.personnage
CREATE TABLE IF NOT EXISTS `personnage` (
  `id_personnage` int NOT NULL,
  `nom_personnage` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_personnage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table newcinema.personnage: ~5 rows (approximately)
INSERT INTO `personnage` (`id_personnage`, `nom_personnage`) VALUES
	(1, 'Edna Mode'),
	(2, 'Randle McMurphy'),
	(3, 'Optimus Prime'),
	(4, 'Norman Bates'),
	(5, 'The Minions');

-- Dumping structure for table newcinema.personne
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `date_naissance` date NOT NULL,
  `sexe` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table newcinema.personne: ~6 rows (approximately)
INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `date_naissance`, `sexe`) VALUES
	(1, 'Bud', ' Abbott', '1993-07-20', 'male'),
	(2, 'George ', 'Abbott', '2012-01-10', 'male'),
	(3, 'Jack', ' Albertson', '2013-10-17', 'female'),
	(4, 'Ralph', 'Bellamy', '1933-01-10', 'female'),
	(5, 'John', 'Nicholson', '1943-10-11', 'male'),
	(6, 'Katharine', 'Houghton', '1943-04-11', 'female'),
	(7, 'Mary ', 'Louise', '1963-04-22', 'female');

-- Dumping structure for table newcinema.realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int NOT NULL,
  `id_personne` int NOT NULL,
  PRIMARY KEY (`id_realisateur`),
  UNIQUE KEY `id_personne` (`id_personne`),
  CONSTRAINT `realisateur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table newcinema.realisateur: ~4 rows (approximately)
INSERT INTO `realisateur` (`id_realisateur`, `id_personne`) VALUES
	(1, 1),
	(2, 4),
	(4, 5),
	(3, 6);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
