DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,  
  `alt` varchar(255) DEFAULT NULL,  
  `link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `slider` (`id`, `title`, `alt`, `link`) VALUES
(1, 'título do slide', 'Essa é uma descrição de exemplo', 'https://www.google.com.br'),
(2, 'título do slide', 'Essa é uma descrição de exemplo', 'https://www.google.com.br')