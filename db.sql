-- --------------------------------------------------------
-- Хост:                         localhost
-- Версия сервера:               5.6.26 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных karazin
CREATE DATABASE IF NOT EXISTS `karazin` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `karazin`;


-- Дамп структуры для таблица karazin.baner
CREATE TABLE IF NOT EXISTS `baner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `img` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы karazin.baner: ~9 rows (приблизительно)
/*!40000 ALTER TABLE `baner` DISABLE KEYS */;
INSERT INTO `baner` (`id`, `title`, `status`, `img`, `url`) VALUES
	(1, '1asd', 1, 'uploads/2fdbdf0ff2b230a6a051.jpg', '123'),
	(2, '2', 1, 'uploads/e40a0faa92001777024c.jpg', '2'),
	(3, '3', 1, 'uploads/9543abac0f2cbdb11b89.jpg', '3'),
	(4, '4', 1, 'uploads/73443c4c926b162b4465.jpg', '4'),
	(5, '5', 1, 'uploads/36e7c3c221c7dd26dc7b.jpg', '5'),
	(6, '6', 1, 'uploads/e9175615b7e83395aed4.jpg', '6'),
	(7, '7', 1, 'uploads/95e1144a75055390354d.jpg', '7'),
	(8, '8', 1, 'uploads/27a341bcf3917beb868f.jpg', '8'),
	(9, '9', 1, 'uploads/167de689341f4026dff9.jpg', '9'),
	(11, '213', 0, 'uploads/5e1e88b57447e0f66aa8.jpg', '213'),
	(12, 'Test', 1, 'uploads/7cf084bfbaa02e430ea2.jpg', 'http://asd.net');
/*!40000 ALTER TABLE `baner` ENABLE KEYS */;


-- Дамп структуры для таблица karazin.config
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL,
  `limit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы karazin.config: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` (`id`, `limit`) VALUES
	(0, 5);
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
