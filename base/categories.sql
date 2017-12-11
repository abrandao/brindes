-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,  
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Bolsas Térmicas'),
(2, 'Casa'),
(3, 'Chaveiros'),
(4, 'Cortiça'),
(5, 'Escrita'),
(6, 'Escrita de Plástico e Lápis'),
(7, 'Escrita de Metal e Estojos'),
(8, 'Escritório'),
(9, 'Esporte e Lazer'),
(10, 'Kids e Escolar'),
(11, 'Mochilas e Malas'),
(12, 'Pastas'),
(13, 'Portas Cartões'),
(14, 'Sacolas'),
(15, 'Sol e Chuva'),
(16, 'Tecnologia'),
(17, 'Uso Pessoal e Viagens');