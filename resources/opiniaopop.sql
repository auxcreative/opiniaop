-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tempo de Geração: 26/05/2017 às 09:26
-- Versão do servidor: 5.6.35-cll-lve
-- Versão do PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `opiniaopop`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `opn_cliente`
--

CREATE TABLE IF NOT EXISTS `opn_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(1) DEFAULT NULL,
  `nome` varchar(145) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `fone` varchar(11) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `id_plano` int(11) NOT NULL,
  `ddd` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `fone` (`fone`),
  KEY `fk_plano_clienye_idx` (`id_plano`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Fazendo dump de dados para tabela `opn_cliente`
--

INSERT INTO `opn_cliente` (`id`, `status`, `nome`, `email`, `fone`, `senha`, `id_plano`, `ddd`) VALUES
(1, 'a', 'Yuri Torres Oliveira ', 'yuri154@yahoo.com.br', '982395033', '7a038bc6c195ad273c358686bb3a3e8551ced7b2', 1, '098'),
(6, 'a', 'Elesbao Pinto', 'elesbaopinto@gmail.com', '999883373', '8546203a5ce8def47e2356f6bfeab8f16eb73854', 1, '098'),
(7, 'a', 'Erick Macgregor Santos Lima', 'macgregortnt@outlook.com', '982742296', '92297ce6306ede4ceb8acba2acaabd49f9fc66fc', 1, '098'),
(8, 'a', 'Bruno de Luca Costa Oliveira', 'brunodeluca1717@gmail.com', '982172065', 'fc1290d3e1c8f653b11682895cba71c4d1f5ee4b', 1, '098'),
(9, 'a', 'Fernando AG', 'ag001fernando@gmail.com', '982163349', 'f89bf24ce011e059fd2f1d7dda3ff474bf4c0cde', 1, '098'),
(10, 'a', 'Yuri Oliveira Torres', 'yuri154@yahoo.com', '999999999', '6753f0841d07bbd2b4614d362460078ff1a213a8', 1, '796');

-- --------------------------------------------------------

--
-- Estrutura para tabela `opn_enquete`
--

CREATE TABLE IF NOT EXISTS `opn_enquete` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(1) DEFAULT NULL,
  `titulo` tinytext,
  `qtd_amostragem` smallint(4) DEFAULT NULL,
  `data_abertura` date DEFAULT NULL,
  `data_fechamento` date DEFAULT NULL,
  `id_tipo` int(2) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tipo_enquente_idx` (`id_tipo`),
  KEY `fk_cliente_enquet_idx` (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `opn_enquete`
--

INSERT INTO `opn_enquete` (`id`, `status`, `titulo`, `qtd_amostragem`, `data_abertura`, `data_fechamento`, `id_tipo`, `id_cliente`) VALUES
(1, 'a', 'O QUE ACHA DO BITCOIN', 75, '2017-05-24', '2017-05-27', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `opn_participante`
--

CREATE TABLE IF NOT EXISTS `opn_participante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(1) DEFAULT NULL,
  `sexo` varchar(1) DEFAULT NULL,
  `fone` varchar(11) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `sessao_code` varchar(60) DEFAULT NULL,
  `geolocalizacao` varchar(145) DEFAULT NULL,
  `ip_unico` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `opn_participante`
--

INSERT INTO `opn_participante` (`id`, `status`, `sexo`, `fone`, `email`, `sessao_code`, `geolocalizacao`, `ip_unico`) VALUES
(1, 'a', 'M', '98982395033', 'yurioliveiray@gmail.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `opn_plano`
--

CREATE TABLE IF NOT EXISTS `opn_plano` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(1) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `qtd_amostragem` smallint(4) DEFAULT NULL,
  `liberacao` varchar(3) DEFAULT NULL,
  `recomendado` varchar(1) DEFAULT NULL,
  `qtd_tempo` int(2) DEFAULT NULL,
  `acesso` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `opn_plano`
--

INSERT INTO `opn_plano` (`id`, `status`, `nome`, `valor`, `qtd_amostragem`, `liberacao`, `recomendado`, `qtd_tempo`, `acesso`) VALUES
(1, 'a', 'Free', '0.00', 100, 'fre', 'r', NULL, 'Bloqueio do segundo voto via autenticação de dois fatores (email), Exportação do resultado (PDF), Votação Pública.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `opn_resposta`
--

CREATE TABLE IF NOT EXISTS `opn_resposta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(1) DEFAULT NULL,
  `texto` tinytext,
  `id_enquete` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_enquee_questionario_idx` (`id_enquete`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `opn_resposta`
--

INSERT INTO `opn_resposta` (`id`, `status`, `texto`, `id_enquete`) VALUES
(2, 'a', 'RUIM', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `opn_tipo`
--

CREATE TABLE IF NOT EXISTS `opn_tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(1) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `opn_tipo`
--

INSERT INTO `opn_tipo` (`id`, `status`, `nome`) VALUES
(1, 'A', 'Acadêmica');

-- --------------------------------------------------------

--
-- Estrutura para tabela `opn_votacao`
--

CREATE TABLE IF NOT EXISTS `opn_votacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(1) DEFAULT NULL,
  `data` timestamp NULL DEFAULT NULL,
  `code_autenticador` varchar(40) DEFAULT NULL,
  `id_participante` int(11) DEFAULT NULL,
  `id_enquete` int(11) NOT NULL,
  `id_resposta` int(11) NOT NULL,
  `sessao_code` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_votacao_enquete_idx` (`id_enquete`),
  KEY `fk_votacao_questao_idx` (`id_resposta`),
  KEY `fk_votacao_votante_idx` (`id_participante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `opn_cliente`
--
ALTER TABLE `opn_cliente`
  ADD CONSTRAINT `fk_cliente_plano` FOREIGN KEY (`id_plano`) REFERENCES `opn_plano` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Restrições para tabelas `opn_enquete`
--
ALTER TABLE `opn_enquete`
  ADD CONSTRAINT `fk_cliente_enquete` FOREIGN KEY (`id_cliente`) REFERENCES `opn_cliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tipo_enquente` FOREIGN KEY (`id_tipo`) REFERENCES `opn_tipo` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Restrições para tabelas `opn_resposta`
--
ALTER TABLE `opn_resposta`
  ADD CONSTRAINT `fk_enquee_questionario` FOREIGN KEY (`id_enquete`) REFERENCES `opn_enquete` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Restrições para tabelas `opn_votacao`
--
ALTER TABLE `opn_votacao`
  ADD CONSTRAINT `fk_votacao_enquete` FOREIGN KEY (`id_enquete`) REFERENCES `opn_enquete` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_votacao_questao` FOREIGN KEY (`id_resposta`) REFERENCES `opn_resposta` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_votacao_votante` FOREIGN KEY (`id_participante`) REFERENCES `opn_participante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
