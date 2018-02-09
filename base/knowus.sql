-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `knowus`;
CREATE TABLE `knowus` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL, 
  `article` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- 2018-02-09 11:59:30