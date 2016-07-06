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

-- Дамп данных таблицы yii.migration: ~12 rows (приблизительно)
DELETE FROM `migration`;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1467375990),
	('m130524_201442_init', 1467376001),
	('m140209_132017_init', 1467725835),
	('m140403_174025_create_account_table', 1467725835),
	('m140504_113157_update_tables', 1467725837),
	('m140504_130429_create_token_table', 1467725837),
	('m140830_171933_fix_ip_field', 1467725837),
	('m140830_172703_change_account_table_name', 1467725837),
	('m141222_110026_update_ip_field', 1467725838),
	('m141222_135246_alter_username_length', 1467725838),
	('m150614_103145_update_social_account_table', 1467725839),
	('m150623_212711_fix_username_notnull', 1467725839);
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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii.photos: ~15 rows (приблизительно)
DELETE FROM `photos`;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` (`id`, `user_id`, `category_id`, `images`, `title`, `description`, `date`) VALUES
	(34, 1, 2, 'uploads/10de4d7565f0f3b1d275.jpg', '1', '1', '0000-00-00'),
	(35, 3, 1, 'uploads/37448f8c6199be74fa5b.jpg', '1', '2', '0000-00-00'),
	(36, 44, 1, 'uploads/6cc5f7500ea381f1b570.jpg', 'test', 'test', '0000-00-00'),
	(37, 44, 2, 'uploads/0fd9ec817c807db811d1.jpg', 'test2', 'test2', '2016-07-05'),
	(38, 44, 1, 'uploads/6cc5f7500ea381f1b570.jpg', 'Mauris blandit aliquet elit', 'Mauris blandit aliquet elit', '2016-07-05'),
	(39, 44, 2, 'uploads/f93e00997b9ad01abf87.jpg', 'Mauris blandit aliquet elit', 'Mauris blandit aliquet elit', '2016-07-05'),
	(40, 44, 1, 'uploads/fda2118cea738c754201.jpg', 'Mauris blandit aliquet elit', 'Mauris blandit aliquet elit', '2016-07-05'),
	(41, 44, 3, 'uploads/72f590d9d8955945b913.jpg', 'Mauris blandit aliquet elit', 'Mauris blandit aliquet elit', '2016-07-05'),
	(42, 44, 2, 'uploads/7e7e75c899998d061561.jpg', 'Mauris blandit aliquet elit', 'Mauris blandit aliquet elit', '2016-07-05'),
	(43, 44, 2, 'uploads/f3d086a122441034a6ca.jpg', 'Mauris blandit aliquet elit', 'Mauris blandit aliquet elit', '2016-07-05'),
	(44, 44, 2, 'uploads/d17b86ccc5422131d123.jpg', 'Mauris blandit aliquet elit', 'Mauris blandit aliquet elit', '2016-07-05'),
	(45, 44, 2, 'uploads/0dc9f787a388523dc06b.jpg', 'Mauris blandit aliquet elit', 'Mauris blandit aliquet elit', '2016-07-05'),
	(46, 44, 2, 'uploads/c7d0b8173a1f38bd266a.jpg', 'Mauris blandit aliquet elit', 'Mauris blandit aliquet elit', '2016-07-05'),
	(47, 44, 2, 'uploads/94e907c646f67b86067c.jpg', 'teeeee', 'test', '2016-07-05'),
	(48, 44, 1, 'uploads/881f0fd65767509dfddc.jpg', 'ttqwewq', 'ewqeqw', '2016-07-05');
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;


-- Дамп структуры для таблица yii.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` varchar(50) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `photo_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы yii.post: ~0 rows (приблизительно)
DELETE FROM `post`;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id`, `post`, `user_id`, `photo_id`) VALUES
	(1, 'test', 44, 37),
	(2, 'test 1', 44, 36),
	(3, '1', 44, 37),
	(4, '123', 44, 37),
	(5, '123', 44, 37),
	(6, '345', 44, 37),
	(7, '1', 44, 34),
	(8, '2', 44, 34),
	(9, '3', 44, 34),
	(10, 'test', 44, 34),
	(11, '123', 44, 34),
	(12, '22', 44, 34),
	(13, '33', 44, 34),
	(14, '44', 44, 34),
	(15, 'test', 44, 36),
	(16, 'test', 44, 34),
	(17, '213', 44, 36),
	(18, '123', 44, 34);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;


-- Дамп структуры для таблица yii.profile
CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы yii.profile: ~0 rows (приблизительно)
DELETE FROM `profile`;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`) VALUES
	(44, 'test', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '');
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;


-- Дамп структуры для таблица yii.social_account
CREATE TABLE IF NOT EXISTS `social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  UNIQUE KEY `account_unique_code` (`code`),
  KEY `fk_user_account` (`user_id`),
  CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы yii.social_account: ~0 rows (приблизительно)
DELETE FROM `social_account`;
/*!40000 ALTER TABLE `social_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_account` ENABLE KEYS */;


-- Дамп структуры для таблица yii.token
CREATE TABLE IF NOT EXISTS `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`),
  CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы yii.token: ~0 rows (приблизительно)
DELETE FROM `token`;
/*!40000 ALTER TABLE `token` DISABLE KEYS */;
/*!40000 ALTER TABLE `token` ENABLE KEYS */;


-- Дамп структуры для таблица yii.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_email` (`email`),
  UNIQUE KEY `user_unique_username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Дамп данных таблицы yii.user: ~0 rows (приблизительно)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`) VALUES
	(44, 'defacto', 'defacto@live.ru', '$2y$10$kLZ9bYDAKg73LFP0ulxBFeZFzPnEqkgs5BNNbz5VkpGOfUPPlwn6y', 'rk_ZcXoE8emErdKm-zXLJQSwMXTGv9Vs', 1467731415, NULL, NULL, '127.0.0.1', 1467728598, 1467728598, 0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
