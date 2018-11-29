-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 29-Nov-2018 às 02:03
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
-- Estrutura da tabela `averages`
--

DROP TABLE IF EXISTS `averages`;
CREATE TABLE IF NOT EXISTS `averages` (
  `idAverages` int(11) NOT NULL AUTO_INCREMENT,
  `hits` int(11) NOT NULL,
  `mocks_idmocks` int(11) NOT NULL,
  `students_id` int(11) NOT NULL,
  PRIMARY KEY (`idAverages`,`mocks_idmocks`,`students_id`),
  KEY `fk_Averages_mocks1_idx` (`mocks_idmocks`),
  KEY `fk_averages_students1_idx` (`students_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `idlogin` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  PRIMARY KEY (`idlogin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mocks`
--

DROP TABLE IF EXISTS `mocks`;
CREATE TABLE IF NOT EXISTS `mocks` (
  `idmocks` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `questionQuantity` tinyint(4) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `answerQuantity` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`idmocks`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professors`
--

DROP TABLE IF EXISTS `professors`;
CREATE TABLE IF NOT EXISTS `professors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(145) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `login_idlogin` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_professors_login1_idx` (`login_idlogin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` longtext NOT NULL,
  `answer` char(1) NOT NULL,
  `option1` longtext NOT NULL,
  `option2` longtext NOT NULL,
  `option3` longtext,
  `option4` longtext,
  `option5` longtext,
  `subareas_idsubareas` int(11) NOT NULL,
  `subareas_mocks_idmocks` int(11) NOT NULL,
  PRIMARY KEY (`id`,`subareas_idsubareas`,`subareas_mocks_idmocks`),
  KEY `fk_questions_subareas1_idx` (`subareas_idsubareas`,`subareas_mocks_idmocks`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL,
  `name` varchar(145) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `login_idlogin` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_students_login1_idx` (`login_idlogin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `subareas`
--

DROP TABLE IF EXISTS `subareas`;
CREATE TABLE IF NOT EXISTS `subareas` (
  `idsubareas` int(11) NOT NULL AUTO_INCREMENT,
  `mocks_idmocks` int(11) NOT NULL,
  `professors_id` int(11) NOT NULL,
  PRIMARY KEY (`idsubareas`,`mocks_idmocks`,`professors_id`),
  KEY `fk_subareas_mocks1_idx` (`mocks_idmocks`),
  KEY `fk_subareas_professors1_idx` (`professors_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `averages`
--
ALTER TABLE `averages`
  ADD CONSTRAINT `fk_Averages_mocks1` FOREIGN KEY (`mocks_idmocks`) REFERENCES `mocks` (`idmocks`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_averages_students1` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `professors`
--
ALTER TABLE `professors`
  ADD CONSTRAINT `fk_professors_login1` FOREIGN KEY (`login_idlogin`) REFERENCES `login` (`idlogin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_questions_subareas1` FOREIGN KEY (`subareas_idsubareas`,`subareas_mocks_idmocks`) REFERENCES `subareas` (`idsubareas`, `mocks_idmocks`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_students_login1` FOREIGN KEY (`login_idlogin`) REFERENCES `login` (`idlogin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `subareas`
--
ALTER TABLE `subareas`
  ADD CONSTRAINT `fk_subareas_mocks1` FOREIGN KEY (`mocks_idmocks`) REFERENCES `mocks` (`idmocks`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_subareas_professors1` FOREIGN KEY (`professors_id`) REFERENCES `professors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
