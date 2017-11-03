-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `arquivos`;
CREATE TABLE `arquivos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` int(5) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `tag_main` varchar(20) DEFAULT NULL,
  `tag_category` varchar(20) DEFAULT NULL,
  `filename` varchar(240) DEFAULT NULL,
  `quantity_A` int(5) DEFAULT NULL,
  `quantity_B` int(5) DEFAULT NULL,
  `quantity_C` int(5) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `size` varchar(80) DEFAULT NULL,
  `printing` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `arquivos` (`id`, `code`, `title`, `tag_main`, 
`tag_category`, `filename`, `quantity_A`, `quantity_B`, 
`quantity_C`, `description`, `size`, `printing`) VALUES
(2,	321,	'sw',	'sw',	'sw',	'683.png',	21,	
21,	17,	'21',	'swsw',	'12121');

-- 2017-11-03 21:02:27
