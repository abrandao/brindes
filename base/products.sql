-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `code` int(5) DEFAULT NULL,  
  `tag` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `upfile` varchar(240) DEFAULT NULL,
  `qtd_min` int(5) DEFAULT NULL,
  `qtd1` int(5) DEFAULT NULL,
  `qtd2` int(5) DEFAULT NULL,
  `qtd3` int(5) DEFAULT NULL,  
  `size` varchar(80) DEFAULT NULL,
  `printing` varchar(80) DEFAULT NULL,
  `print_type` varchar(80) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `products` (`id`, `title`, `code`, `tag`, `category`, `description`, `upfile`, `qtd_min`, `qtd1`, `qtd2`,
 `qtd3`, `size`, `printing`, `print_type`, `comments`)
VALUES (1, "caneta esferográfica", 00354, "escolar", "canetas", "caneta azul BIC", "caneta", 100, 100, 200, 300,
"normal", "lateral", "silk", "caneta para escola"),
(2, "Lápis", 10466, "escolar", "lápis", "lápis preto Faber Castell", "lápis", 100, 100, 200, 300, "normal", "lateral",
 "gravação", "lápis para escola");