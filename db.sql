-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.31 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win64
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных yii
CREATE DATABASE IF NOT EXISTS `yii` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `yii`;


-- Дамп структуры для таблица yii.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii.categories: ~3 rows (приблизительно)
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `title`) VALUES
	(1, 'test'),
	(2, '2'),
	(3, '3');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Дамп структуры для таблица yii.migration
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii.migration: ~2 rows (приблизительно)
DELETE FROM `migration`;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1467375990),
	('m130524_201442_init', 1467376001);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;


-- Дамп структуры для таблица yii.photos
CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `images` varchar(150) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '0',
  `description` varchar(50) NOT NULL DEFAULT '0',
  `date` varchar(50) NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii.photos: ~1 rows (приблизительно)
DELETE FROM `photos`;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` (`id`, `user_id`, `category_id`, `images`, `title`, `description`, `date`) VALUES
	(34, 1, 2, 'uploads/10de4d7565f0f3b1d275.jpg', '1', '1', '0000-00-00'),
	(35, 3, 1, 'uploads/37448f8c6199be74fa5b.jpg', '1', '2', '0000-00-00');
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;


-- Дамп структуры для таблица yii.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы yii.user: ~0 rows (приблизительно)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'i8tB8O9qrELsGePMgCYfCi4Yc2KLy6l0', '$2y$13$4dnzGBWt5cIB0crBMeqfneIBthfQ72hrBflxHp7nTKLoBkd51K3i.', NULL, 'test@test.test', 10, 1467378644, 1467378644);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
