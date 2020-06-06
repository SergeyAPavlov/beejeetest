-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.37 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица beejeetest.statuses
CREATE TABLE IF NOT EXISTS `statuses` (
                                          `id` int(11) NOT NULL AUTO_INCREMENT,
                                          `name` text,
                                          PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы beejeetest.statuses: ~1 rows (приблизительно)
DELETE FROM `statuses`;
/*!40000 ALTER TABLE `statuses` DISABLE KEYS */;
INSERT INTO `statuses` (`id`, `name`) VALUES
(0, 'создано'),
(1, 'выполнено');
/*!40000 ALTER TABLE `statuses` ENABLE KEYS */;

-- Дамп структуры для таблица beejeetest.tasks
CREATE TABLE IF NOT EXISTS `tasks` (
                                       `id` int(11) NOT NULL AUTO_INCREMENT,
                                       `username` text,
                                       `email` text,
                                       `text` text,
                                       `status_id` int(11) DEFAULT NULL,
                                       `edited` tinyint(1) unsigned zerofill NOT NULL DEFAULT '0',
                                       PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы beejeetest.tasks: ~7 rows (приблизительно)
DELETE FROM `tasks`;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` (`id`, `username`, `email`, `text`, `status_id`, `edited`) VALUES
(1, 'u1', 'u1@u2', 'ctest1', 0, 0),
(2, 'u3', 'eu3@u2', 'btest2', 1, 0),
(3, 'u2', 'u3@u2', 'atest36789ast36789', 1, 1);

/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;

-- Дамп структуры для таблица beejeetest.users
CREATE TABLE IF NOT EXISTS `users` (
                                       `id` int(11) NOT NULL AUTO_INCREMENT,
                                       `name` text,
                                       `email` text,
                                       `password` text,
                                       `role` tinyint(4) DEFAULT NULL,
                                       PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы beejeetest.users: ~0 rows (приблизительно)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'admin', NULL, '123', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
