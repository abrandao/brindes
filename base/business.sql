DROP TABLE IF EXISTS `business`;
CREATE TABLE `business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cnpj` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel1` varchar(15) DEFAULT NULL,
  `tel2` varchar(15) DEFAULT NULL,
  `tel3` varchar(15) DEFAULT NULL,
  `email1` varchar(50) DEFAULT NULL,
  `email2` varchar(50) DEFAULT NULL,
  `email3` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `business` (`id`, `cnpj`, `address`, `tel1`, `tel2`, `tel3`, `email1`, `email2`, `email3`) VALUES (1, '00.000.000/0000-00', 'Rua xxxxx, xx. Xxxx-XX', '(12) 3942-8089', '(12) 97402-8774', '(XX) XXXX-XXXX', 'vendas@epontual.com.br', 'xxxx@epontual.com.br', 'xxxx@epontual.com.br');