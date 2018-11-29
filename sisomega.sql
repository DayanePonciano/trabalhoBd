-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 29-Nov-2018 às 15:22
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisomega`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
  `idarea` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idarea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `area`
--

INSERT INTO `area` (`idarea`, `nome`) VALUES
(12, 'Ciências');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `email`, `senha`, `tipo`, `nome`) VALUES
(1, 'sanderhs@hotmail.com', '123456', 1, 'Sander');

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes`
--

DROP TABLE IF EXISTS `questoes`;
CREATE TABLE IF NOT EXISTS `questoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` longtext NOT NULL,
  `answer` char(1) NOT NULL,
  `option1` longtext,
  `option2` longtext,
  `option3` longtext,
  `option4` longtext,
  `simulados_idmocks` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_questoes_simulados1_idx` (`simulados_idmocks`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `questoes`
--

INSERT INTO `questoes` (`id`, `question`, `answer`, `option1`, `option2`, `option3`, `option4`, `simulados_idmocks`) VALUES
(8, 'cxzc\\c', '1', 'cx\\cz', 'cc\\z', 'cxzc', 'czcx', 2),
(9, 'asdda', '3', 'asddas', 'saddas', 'adsdsa', 'saddas', 1),
(10, 'addsa', '4', 'dsadas', 'dassda', 'sdasda', 'sdasdasad', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `simulados`
--

DROP TABLE IF EXISTS `simulados`;
CREATE TABLE IF NOT EXISTS `simulados` (
  `idmocks` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `area_idarea` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  PRIMARY KEY (`idmocks`),
  KEY `fk_simulados_area1_idx` (`area_idarea`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `simulados`
--

INSERT INTO `simulados` (`idmocks`, `name`, `area_idarea`, `data`) VALUES
(1, 'Prova', 12, '2018-11-08 00:00:00'),
(2, 'Sander Henrique Santos', 12, '2018-11-15 00:00:00'),
(3, 'far', 12, '2018-11-07 00:00:00'),
(4, '1', 12, '2018-11-10 00:00:00'),
(5, 'punk', 12, '2018-01-30 00:00:00'),
(6, 'leticia', 12, '2018-12-31 00:00:00'),
(7, 'saddsa', 12, '2018-11-03 00:00:00'),
(8, 'sdasdsda', 12, '2018-11-09 00:00:00'),
(9, 'sadffsd', 12, '2018-11-03 00:00:00'),
(10, 'Ciências', 12, '2018-11-09 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `questoes`
--
ALTER TABLE `questoes`
  ADD CONSTRAINT `fk_questoes_simulados1` FOREIGN KEY (`simulados_idmocks`) REFERENCES `simulados` (`idmocks`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `simulados`
--
ALTER TABLE `simulados`
  ADD CONSTRAINT `fk_simulados_area1` FOREIGN KEY (`area_idarea`) REFERENCES `area` (`idarea`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
