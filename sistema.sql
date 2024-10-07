-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02-Ago-2021 às 01:36
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_contador`
--

DROP TABLE IF EXISTS `tb_contador`;
CREATE TABLE IF NOT EXISTS `tb_contador` (
  `con_id` int NOT NULL AUTO_INCREMENT,
  `con_numero` int NOT NULL,
  `con_ano` int NOT NULL,
  PRIMARY KEY (`con_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_departamento`
--

DROP TABLE IF EXISTS `tb_departamento`;
CREATE TABLE IF NOT EXISTS `tb_departamento` (
  `dep_id` int NOT NULL AUTO_INCREMENT,
  `dep_nome` varchar(100) NOT NULL,
  PRIMARY KEY (`dep_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tb_departamento`
--

INSERT INTO `tb_departamento` (`dep_id`, `dep_nome`) VALUES
(1, 'Municipal'),
(2, 'Estadual'),
(3, 'Federal'),
(4, 'Privado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_disciplina`
--

DROP TABLE IF EXISTS `tb_disciplina`;
CREATE TABLE IF NOT EXISTS `tb_disciplina` (
  `dis_id` int NOT NULL AUTO_INCREMENT,
  `dis_nome` varchar(100) NOT NULL,
  PRIMARY KEY (`dis_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_escola`
--

DROP TABLE IF EXISTS `tb_escola`;
CREATE TABLE IF NOT EXISTS `tb_escola` (
  `esc_id` int NOT NULL AUTO_INCREMENT,
  `esc_nome` varchar(100) NOT NULL,
  `mun_id` int NOT NULL,
  `dep_id` int NOT NULL,
  `mod_id` int NOT NULL,
  PRIMARY KEY (`esc_id`),
  KEY `mun_id` (`mun_id`),
  KEY `dep_id` (`dep_id`),
  KEY `mod_id` (`mod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_modalidade`
--

DROP TABLE IF EXISTS `tb_modalidade`;
CREATE TABLE IF NOT EXISTS `tb_modalidade` (
  `mod_id` int NOT NULL AUTO_INCREMENT,
  `mod_nome` varchar(100) NOT NULL,
  PRIMARY KEY (`mod_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tb_modalidade`
--

INSERT INTO `tb_modalidade` (`mod_id`, `mod_nome`) VALUES
(1, 'Fundamental'),
(2, 'Médio'),
(3, 'Superior'),
(4, 'EJA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_municipio`
--

DROP TABLE IF EXISTS `tb_municipio`;
CREATE TABLE IF NOT EXISTS `tb_municipio` (
  `mun_id` int NOT NULL AUTO_INCREMENT,
  `mun_nome` varchar(100) NOT NULL,
  PRIMARY KEY (`mun_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tb_municipio`
--

INSERT INTO `tb_municipio` (`mun_id`, `mun_nome`) VALUES
(1, 'Canindé'),
(2, 'Caridade'),
(3, 'Paramoti'),
(4, 'General Sampaio'),
(5, 'Itatíra'),
(6, 'Santa Quitéria');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_professor`
--

DROP TABLE IF EXISTS `tb_professor`;
CREATE TABLE IF NOT EXISTS `tb_professor` (
  `prof_id` int NOT NULL AUTO_INCREMENT,
  `prof_nome` varchar(100) NOT NULL,
  `prof_cpf` varchar(30) NOT NULL,
  `prof_rg` int NOT NULL,
  PRIMARY KEY (`prof_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
