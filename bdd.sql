-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
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


-- Listage de la structure de la base pour cinema
CREATE DATABASE IF NOT EXISTS `cinema` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cinema`;

-- Listage de la structure de table cinema. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `prenom` varchar(255) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `sexe` varchar(50) COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `date_naissance` date NOT NULL,
  PRIMARY KEY (`id_acteur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Listage des données de la table cinema.acteur : ~5 rows (environ)
INSERT INTO `acteur` (`id_acteur`, `nom`, `prenom`, `sexe`, `date_naissance`) VALUES
	(1, 'Pattinson', 'Robert', 'Homme', '1986-05-13'),
	(2, 'Kravitz', 'Zoe', 'Femme', '1988-12-01'),
	(3, 'Clooney', 'Georges', 'Homme', '1961-05-06'),
	(4, 'Thurman', 'Uma', 'Femme', '1970-04-29'),
	(5, 'Tarantino', 'Quentin', 'Homme', '1963-03-27');

-- Listage de la structure de table cinema. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `film_id` int NOT NULL,
  `acteur_id` int NOT NULL,
  `role_id` int NOT NULL,
  PRIMARY KEY (`film_id`,`acteur_id`,`role_id`),
  KEY `FK_casting_acteur` (`acteur_id`),
  KEY `FK_casting_role` (`role_id`),
  CONSTRAINT `FK_casting_acteur` FOREIGN KEY (`acteur_id`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `FK_casting_cinema.film` FOREIGN KEY (`film_id`) REFERENCES `film` (`id_film`),
  CONSTRAINT `FK_casting_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Listage des données de la table cinema.casting : ~7 rows (environ)
INSERT INTO `casting` (`film_id`, `acteur_id`, `role_id`) VALUES
	(1, 1, 1),
	(2, 1, 3),
	(3, 2, 1),
	(1, 4, 2),
	(2, 4, 2),
	(2, 4, 3),
	(3, 4, 2);

-- Listage de la structure de table cinema. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `synopsis` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin,
  `duree` time DEFAULT NULL,
  `note` int DEFAULT NULL,
  `realisateur_id` int NOT NULL,
  `genre_id` int NOT NULL,
  `date_sortie` year DEFAULT NULL,
  PRIMARY KEY (`id_film`),
  KEY `FK_film_realisateur` (`realisateur_id`),
  KEY `FK_genre_id` (`genre_id`) USING BTREE,
  CONSTRAINT `FK2_film_genre` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id_genre`),
  CONSTRAINT `FK_film_realisateur` FOREIGN KEY (`realisateur_id`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Listage des données de la table cinema.film : ~3 rows (environ)
INSERT INTO `film` (`id_film`, `titre`, `synopsis`, `duree`, `note`, `realisateur_id`, `genre_id`, `date_sortie`) VALUES
	(1, 'The Batman', 'blabla', '02:56:47', 5, 1, 1, '2022'),
	(2, 'Batman & Robin', 'blablabis', '02:06:47', 4, 3, 2, '1996'),
	(3, 'The dark knight', NULL, NULL, NULL, 2, 1, '2023');

-- Listage de la structure de table cinema. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL,
  `libelle` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Listage des données de la table cinema.genre : ~0 rows (environ)
INSERT INTO `genre` (`id_genre`, `libelle`) VALUES
	(1, 'Action'),
	(2, 'Aventure');

-- Listage de la structure de table cinema. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Listage des données de la table cinema.realisateur : ~0 rows (environ)
INSERT INTO `realisateur` (`id_realisateur`, `nom`, `prenom`) VALUES
	(1, 'Reeves', 'Matt'),
	(2, 'Schumacher', 'Joel'),
	(3, 'Tarantino', 'Quentin');

-- Listage de la structure de table cinema. role
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;

-- Listage des données de la table cinema.role : ~2 rows (environ)
INSERT INTO `role` (`id_role`, `nom`) VALUES
	(1, 'Batman'),
	(2, 'Catwoman'),
	(3, 'Poison Ivy');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
