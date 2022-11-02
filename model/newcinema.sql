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

-- Dumping data for table newcinema.acteur: ~6 rows (approximately)
DELETE FROM `acteur`;
INSERT INTO `acteur` (`id_acteur`, `id_personne`) VALUES
	(3, 1),
	(4, 2),
	(1, 3),
	(2, 4),
	(6, 6),
	(5, 7);

-- Dumping data for table newcinema.asso_genre: ~6 rows (approximately)
DELETE FROM `asso_genre`;
INSERT INTO `asso_genre` (`id_film`, `id_genre`) VALUES
	(3, 1),
	(1, 3),
	(2, 3),
	(3, 4),
	(3, 5),
	(2, 6);

-- Dumping data for table newcinema.casting: ~9 rows (approximately)
DELETE FROM `casting`;
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

-- Dumping data for table newcinema.film: ~6 rows (approximately)
DELETE FROM `film`;
INSERT INTO `film` (`id_film`, `titre_film`, `createAt_film`, `lieu_film`, `duree_film`, `description_film`, `rating`, `id_realisateur`) VALUES
	(1, 'Flash', '2020-06-20', 'France', '00:55:00', 'the momeon', 4.50, 1),
	(2, 'Come Back', '2019-06-10', 'France', '01:18:50', 'the momeon', 3.20, 2),
	(3, 'Black Adam', '2022-03-27', 'France', '00:09:00', 'the momeon', 5.00, 1),
	(4, 'Bullet Train', '2022-02-15', 'France', '00:06:00', 'the momeon', 2.00, 2),
	(5, 'James Bond', '2018-07-20', 'France', '00:05:00', 'the momeon', 4.60, 2),
	(6, 'Spy Kid', '2002-04-23', 'France', '00:06:00', 'the momeon', 1.00, 1);

-- Dumping data for table newcinema.genre: ~6 rows (approximately)
DELETE FROM `genre`;
INSERT INTO `genre` (`id_genre`, `nom_genre`) VALUES
	(1, 'comedie'),
	(2, 'Science Fiction'),
	(3, 'Action'),
	(4, 'Drama'),
	(5, 'Fantasy'),
	(6, 'Romance');

-- Dumping data for table newcinema.personnage: ~5 rows (approximately)
DELETE FROM `personnage`;
INSERT INTO `personnage` (`id_personnage`, `nom_personnage`) VALUES
	(1, 'Edna Mode'),
	(2, 'Randle McMurphy'),
	(3, 'Optimus Prime'),
	(4, 'Norman Bates'),
	(5, 'The Minions');

-- Dumping data for table newcinema.personne: ~6 rows (approximately)
DELETE FROM `personne`;
INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `date_naissance`, `sexe`) VALUES
	(1, 'Bud', ' Abbott', '1993-07-20', 'male'),
	(2, 'George ', 'Abbott', '2012-01-10', 'male'),
	(3, 'Jack', ' Albertson', '2013-10-17', 'female'),
	(4, 'Ralph', 'Bellamy', '1933-01-10', 'female'),
	(5, 'John', 'Nicholson', '1943-10-11', 'male'),
	(6, 'Katharine', 'Houghton', '1943-04-11', 'female'),
	(7, 'Mary ', 'Louise', '1963-04-22', 'female');

-- Dumping data for table newcinema.realisateur: ~4 rows (approximately)
DELETE FROM `realisateur`;
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
