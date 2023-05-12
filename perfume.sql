-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour perfume
CREATE DATABASE IF NOT EXISTS `perfume` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `perfume`;

-- Listage de la structure de la table perfume. doctrine_migration_versions
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- Listage des données de la table perfume.doctrine_migration_versions : ~1 rows (environ)
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20230512120405', '2023-05-12 12:38:45', 981);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;

-- Listage de la structure de la table perfume. marque
CREATE TABLE IF NOT EXISTS `marque` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table perfume.marque : ~6 rows (environ)
/*!40000 ALTER TABLE `marque` DISABLE KEYS */;
INSERT INTO `marque` (`id`, `nom`) VALUES
	(1, 'Dior'),
	(2, 'Chanel'),
	(3, 'Dolce&Gabbana'),
	(4, 'Zara'),
	(5, 'Narciso Rodriguez'),
	(7, 'Yves Saint Laurent');
/*!40000 ALTER TABLE `marque` ENABLE KEYS */;

-- Listage de la structure de la table perfume. note_de_coeur
CREATE TABLE IF NOT EXISTS `note_de_coeur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table perfume.note_de_coeur : ~22 rows (environ)
/*!40000 ALTER TABLE `note_de_coeur` DISABLE KEYS */;
INSERT INTO `note_de_coeur` (`id`, `nom`, `description`) VALUES
	(1, 'Rose de Damas', NULL),
	(2, 'Poivre rose', NULL),
	(3, 'Musc', NULL),
	(4, 'Ambre', NULL),
	(7, 'Violette', NULL),
	(8, 'Menthe', NULL),
	(9, 'Basilic', NULL),
	(10, 'Myrrhe', NULL),
	(11, 'Patchouli', NULL),
	(12, 'Iris', NULL),
	(13, 'Jasmin', NULL),
	(14, 'Rose', NULL),
	(15, 'Muguet', NULL),
	(16, 'Rose de Turquie', NULL),
	(17, 'Mimosa', NULL),
	(18, 'Ylang Ylang', NULL),
	(19, 'Fruits Rouges', NULL),
	(20, 'Lavande', NULL),
	(21, 'Fleur d\'oranger de Tunisie', NULL),
	(22, 'Jasmin Sambae', NULL),
	(23, 'Orchidee', NULL),
	(24, 'Fleur d\'oranger', NULL);
/*!40000 ALTER TABLE `note_de_coeur` ENABLE KEYS */;

-- Listage de la structure de la table perfume. note_de_fond
CREATE TABLE IF NOT EXISTS `note_de_fond` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table perfume.note_de_fond : ~17 rows (environ)
/*!40000 ALTER TABLE `note_de_fond` DISABLE KEYS */;
INSERT INTO `note_de_fond` (`id`, `nom`, `description`) VALUES
	(1, 'Ambre gris', NULL),
	(2, 'Gaiac', NULL),
	(3, 'Cedre', NULL),
	(4, 'Patchouli', NULL),
	(5, 'Bois de Santal', NULL),
	(6, 'Cuir', NULL),
	(7, 'Vetivier', NULL),
	(8, 'Miel', NULL),
	(9, 'Vanille', NULL),
	(10, 'Ambre', NULL),
	(11, 'Resine', NULL),
	(12, 'Musc', NULL),
	(14, 'Mousse de Chene', NULL),
	(15, 'Musc Blanc', NULL),
	(16, 'Feve Tonka', NULL),
	(17, 'Opoponax', NULL),
	(18, 'Vanille de Madagascar', NULL);
/*!40000 ALTER TABLE `note_de_fond` ENABLE KEYS */;

-- Listage de la structure de la table perfume. note_de_tete
CREATE TABLE IF NOT EXISTS `note_de_tete` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table perfume.note_de_tete : ~17 rows (environ)
/*!40000 ALTER TABLE `note_de_tete` DISABLE KEYS */;
INSERT INTO `note_de_tete` (`id`, `nom`, `description`) VALUES
	(1, 'Bergamote', NULL),
	(2, 'Pamplemousse', NULL),
	(3, 'Rose', NULL),
	(4, 'Peche', NULL),
	(5, 'Mandarine', NULL),
	(6, 'Iris', NULL),
	(7, 'Cypres', NULL),
	(8, 'Baies de genevrier', NULL),
	(9, 'Aldehydes', NULL),
	(10, 'Ylang Ylang', NULL),
	(11, 'Neroli', NULL),
	(12, 'Canelle', NULL),
	(13, 'Cumin', NULL),
	(14, 'Orange', NULL),
	(15, 'Fleur d\'oranger', NULL),
	(16, 'Poire', NULL),
	(17, 'Lavande', NULL);
/*!40000 ALTER TABLE `note_de_tete` ENABLE KEYS */;

-- Listage de la structure de la table perfume. parfum
CREATE TABLE IF NOT EXISTS `parfum` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenance` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix` int DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avis` longtext COLLATE utf8mb4_unicode_ci,
  `note` int DEFAULT NULL,
  `marque_id` int DEFAULT NULL,
  `utilisateur_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F295BD4C4827B9B2` (`marque_id`),
  KEY `IDX_F295BD4CFB88E14F` (`utilisateur_id`),
  CONSTRAINT `FK_F295BD4C4827B9B2` FOREIGN KEY (`marque_id`) REFERENCES `marque` (`id`),
  CONSTRAINT `FK_F295BD4CFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table perfume.parfum : ~10 rows (environ)
/*!40000 ALTER TABLE `parfum` DISABLE KEYS */;
INSERT INTO `parfum` (`id`, `nom`, `contenance`, `prix`, `description`, `image`, `avis`, `note`, `marque_id`, `utilisateur_id`) VALUES
	(1, 'Ambre Nuit', '40', 130, NULL, NULL, NULL, NULL, 1, NULL),
	(2, 'Aqua Fahrenheit', '100', 109, NULL, NULL, NULL, NULL, 1, NULL),
	(3, 'Bois d\'Argent', '40', 130, NULL, NULL, NULL, NULL, 1, NULL),
	(4, 'N°5', '100', 157, NULL, NULL, NULL, NULL, 2, NULL),
	(5, 'Bright Rose', '100', 11, NULL, NULL, NULL, NULL, 4, NULL),
	(6, 'Coco Mademoiselle', '100', 157, NULL, NULL, NULL, NULL, 2, NULL),
	(7, 'For Her', '150', 182, NULL, NULL, NULL, NULL, 5, NULL),
	(8, 'Wonder Rose', '180', 16, NULL, NULL, NULL, NULL, 4, NULL),
	(9, 'Libre Intense', '100', 136, NULL, NULL, NULL, NULL, 7, NULL),
	(10, 'Golden Decade', '100', 18, NULL, NULL, NULL, NULL, 4, NULL);
/*!40000 ALTER TABLE `parfum` ENABLE KEYS */;

-- Listage de la structure de la table perfume. parfum_note_de_coeur
CREATE TABLE IF NOT EXISTS `parfum_note_de_coeur` (
  `parfum_id` int NOT NULL,
  `note_de_coeur_id` int NOT NULL,
  PRIMARY KEY (`parfum_id`,`note_de_coeur_id`),
  KEY `IDX_1BF6AF63CECF0658` (`parfum_id`),
  KEY `IDX_1BF6AF6325B19C77` (`note_de_coeur_id`),
  CONSTRAINT `FK_1BF6AF6325B19C77` FOREIGN KEY (`note_de_coeur_id`) REFERENCES `note_de_coeur` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_1BF6AF63CECF0658` FOREIGN KEY (`parfum_id`) REFERENCES `parfum` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table perfume.parfum_note_de_coeur : ~0 rows (environ)
/*!40000 ALTER TABLE `parfum_note_de_coeur` DISABLE KEYS */;
/*!40000 ALTER TABLE `parfum_note_de_coeur` ENABLE KEYS */;

-- Listage de la structure de la table perfume. parfum_note_de_fond
CREATE TABLE IF NOT EXISTS `parfum_note_de_fond` (
  `parfum_id` int NOT NULL,
  `note_de_fond_id` int NOT NULL,
  PRIMARY KEY (`parfum_id`,`note_de_fond_id`),
  KEY `IDX_46FA610ACECF0658` (`parfum_id`),
  KEY `IDX_46FA610ADB51B1C7` (`note_de_fond_id`),
  CONSTRAINT `FK_46FA610ACECF0658` FOREIGN KEY (`parfum_id`) REFERENCES `parfum` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_46FA610ADB51B1C7` FOREIGN KEY (`note_de_fond_id`) REFERENCES `note_de_fond` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table perfume.parfum_note_de_fond : ~0 rows (environ)
/*!40000 ALTER TABLE `parfum_note_de_fond` DISABLE KEYS */;
/*!40000 ALTER TABLE `parfum_note_de_fond` ENABLE KEYS */;

-- Listage de la structure de la table perfume. parfum_note_de_tete
CREATE TABLE IF NOT EXISTS `parfum_note_de_tete` (
  `parfum_id` int NOT NULL,
  `note_de_tete_id` int NOT NULL,
  PRIMARY KEY (`parfum_id`,`note_de_tete_id`),
  KEY `IDX_7657B185CECF0658` (`parfum_id`),
  KEY `IDX_7657B1851867F700` (`note_de_tete_id`),
  CONSTRAINT `FK_7657B1851867F700` FOREIGN KEY (`note_de_tete_id`) REFERENCES `note_de_tete` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_7657B185CECF0658` FOREIGN KEY (`parfum_id`) REFERENCES `parfum` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table perfume.parfum_note_de_tete : ~0 rows (environ)
/*!40000 ALTER TABLE `parfum_note_de_tete` DISABLE KEYS */;
/*!40000 ALTER TABLE `parfum_note_de_tete` ENABLE KEYS */;

-- Listage de la structure de la table perfume. parfum_parfum
CREATE TABLE IF NOT EXISTS `parfum_parfum` (
  `parfum_source` int NOT NULL,
  `parfum_target` int NOT NULL,
  PRIMARY KEY (`parfum_source`,`parfum_target`),
  KEY `IDX_1BD03325B6CFF11A` (`parfum_source`),
  KEY `IDX_1BD03325AF2AA195` (`parfum_target`),
  CONSTRAINT `FK_1BD03325AF2AA195` FOREIGN KEY (`parfum_target`) REFERENCES `parfum` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_1BD03325B6CFF11A` FOREIGN KEY (`parfum_source`) REFERENCES `parfum` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table perfume.parfum_parfum : ~0 rows (environ)
/*!40000 ALTER TABLE `parfum_parfum` DISABLE KEYS */;
/*!40000 ALTER TABLE `parfum_parfum` ENABLE KEYS */;

-- Listage de la structure de la table perfume. utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surnom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table perfume.utilisateur : ~0 rows (environ)
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;

-- Listage de la structure de la table perfume. utilisateur_parfum
CREATE TABLE IF NOT EXISTS `utilisateur_parfum` (
  `utilisateur_id` int NOT NULL,
  `parfum_id` int NOT NULL,
  PRIMARY KEY (`utilisateur_id`,`parfum_id`),
  KEY `IDX_933887C7FB88E14F` (`utilisateur_id`),
  KEY `IDX_933887C7CECF0658` (`parfum_id`),
  CONSTRAINT `FK_933887C7CECF0658` FOREIGN KEY (`parfum_id`) REFERENCES `parfum` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_933887C7FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table perfume.utilisateur_parfum : ~0 rows (environ)
/*!40000 ALTER TABLE `utilisateur_parfum` DISABLE KEYS */;
/*!40000 ALTER TABLE `utilisateur_parfum` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
