CREATE DATABASE if not EXISTS `locadora`;

USE `locadora`;

CREATE TABLE if not exists `cidade` (
  `id` int(11) NOT null primary key AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cidade` (`nome`, `descricao`) VALUES
('Ceilândia', 'Ceilândia, DF, Brasil'),
('Taguatinga', 'Taguatinga, DF, Brasil'),
('Samabaia', 'Samabaia, DF, Brasil'),
('Brasília', 'Brasília, DF, Brasil'),
('Planaltina', 'Planaltina, DF, Brasil'),
('Recanto das Emas', 'Recanto das Emas, DF, Brasil'),
('Águas Claras', 'Águas Claras, DF, Brasil'),
('Gama', 'Gama, DF, Brasil'),
('Guará', 'Guará, DF, Brasil'),
('Santa Maria', 'Santa Maria, DF, Brasil');
