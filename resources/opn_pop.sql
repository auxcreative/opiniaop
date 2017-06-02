-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Maio-2017 às 02:02
-- Versão do servidor: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opn_pop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `opn_cliente`
--

CREATE TABLE `opn_cliente` (
  `id` int(11) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `nome` varchar(145) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `fone` varchar(11) DEFAULT NULL,
  `senha` varchar(40) DEFAULT NULL,
  `id_plano` int(11) DEFAULT NULL,
  `geolocalizacao` tinytext,
  `ip` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `opn_cliente`
--

INSERT INTO `opn_cliente` (`id`, `status`, `nome`, `email`, `fone`, `senha`, `id_plano`, `geolocalizacao`, `ip`) VALUES
(1, 'i', 'Yuri', 'yurioliveiray@gmail.com', '98982395033', '6753f0841d07bbd2b4614d362460078ff1a213a8', 0, NULL, NULL),
(2, 'a', 'ELESBAO PINTO', 'elesbaopinto@gmail.com', '98989988337', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `opn_enquete`
--

CREATE TABLE `opn_enquete` (
  `id` int(11) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `titulo` tinytext,
  `qtd_amostragem` smallint(4) DEFAULT NULL,
  `data_abertura` date DEFAULT NULL,
  `data_fechamento` date DEFAULT NULL,
  `id_tipo` int(2) DEFAULT NULL,
  `id_tema` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `opn_enquete`
--

INSERT INTO `opn_enquete` (`id`, `status`, `titulo`, `qtd_amostragem`, `data_abertura`, `data_fechamento`, `id_tipo`, `id_tema`) VALUES
(1, 'A', 'Aborto:Sim ou não?', 100, '2017-05-24', '2017-05-31', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `opn_extras`
--

CREATE TABLE `opn_extras` (
  `id` int(2) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `servico` tinytext,
  `valor` decimal(10,2) DEFAULT NULL,
  `acesso` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `opn_extras`
--

INSERT INTO `opn_extras` (`id`, `status`, `servico`, `valor`, `acesso`) VALUES
(1, 'a', 'compartilhamento por sms', '0.19', 'c_sms'),
(3, 'a', 'serviço de geolocalização', '125.00', 's_geo'),
(2, 'a', 'acompanhamento em tempo real via sms', '0.19', 'a_sms');

-- --------------------------------------------------------

--
-- Estrutura da tabela `opn_plano`
--

CREATE TABLE `opn_plano` (
  `id` int(11) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `qtd_amostragem` smallint(4) DEFAULT NULL,
  `liberacao` varchar(3) DEFAULT NULL,
  `acessos` tinytext,
  `qtd_questoes` int(3) DEFAULT NULL,
  `qtd_tempo` int(2) NOT NULL,
  `recomendado` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `opn_plano`
--

INSERT INTO `opn_plano` (`id`, `status`, `nome`, `valor`, `qtd_amostragem`, `liberacao`, `acessos`, `qtd_questoes`, `qtd_tempo`, `recomendado`) VALUES
(0, 'a', 'Free', '0.00', 75, 'fre', 'Criação de enquetes, Criação de pesquisas de mercado, Criação de relatórios simples, votação, compartilhamento de enquetes, ', 4, 0, 'r'),
(2, 'i', 'Begin', '100.00', 100, 'beg', 'Criação de enquetes, Criação de pesquisas de mercado, Criação de relatórios simples, votação, Compartilhamento de enquetes, acompanhamento em tempo real via e-mail, ', 30, 3, ''),
(3, 'i', 'Pro', '170.00', 200, 'pro', 'Criação de enquetes, Criação de pesquisas de mercado, Criação de relatórios simples, Criação de relatórios detalhados, votação, compartilhamento de enquetes, acompanhamento em tempo real via e-mail,', 40, 3, ''),
(4, 'i', 'Expert ', '250.00', 0, 'exp', 'Criação de enquetes no modo público e privado, Criação de pesquisas de mercado no modo público e privado, Criação de relatórios detalhados, acompanhamento em tempo real via e-mail, geolocalização, ', 0, 3, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `opn_questionario`
--

CREATE TABLE `opn_questionario` (
  `id` int(11) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `texto` tinytext,
  `id_enquete` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `opn_questionario`
--

INSERT INTO `opn_questionario` (`id`, `status`, `texto`, `id_enquete`) VALUES
(1, 'a', 'SIM', 1),
(2, 'a', 'NÃO', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `opn_tema`
--

CREATE TABLE `opn_tema` (
  `id` int(11) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `nome` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `opn_tema`
--

INSERT INTO `opn_tema` (`id`, `status`, `nome`) VALUES
(1, 'a', 'a');

-- --------------------------------------------------------

--
-- Estrutura da tabela `opn_tipo`
--

CREATE TABLE `opn_tipo` (
  `id` int(11) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `opn_tipo`
--

INSERT INTO `opn_tipo` (`id`, `status`, `nome`) VALUES
(1, 'a', 'Educação'),
(2, 'a', 'Educação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `opn_votacao`
--

CREATE TABLE `opn_votacao` (
  `id` int(11) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `data` timestamp NULL DEFAULT NULL,
  `code_autenticador` varchar(5) DEFAULT NULL,
  `id_votante` int(11) DEFAULT NULL,
  `id_enquete` int(11) DEFAULT NULL,
  `id_questao_votada` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `sessao_code` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `opn_votacao`
--

INSERT INTO `opn_votacao` (`id`, `status`, `data`, `code_autenticador`, `id_votante`, `id_enquete`, `id_questao_votada`, `id_cliente`, `sessao_code`) VALUES
(1, 'a', '2017-05-16 03:00:00', NULL, 1, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `opn_votante`
--

CREATE TABLE `opn_votante` (
  `id` int(11) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `fone` varchar(11) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `sessao_code` varchar(60) DEFAULT NULL,
  `nome` varchar(200) NOT NULL,
  `sexo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `opn_votante`
--

INSERT INTO `opn_votante` (`id`, `status`, `fone`, `email`, `sessao_code`, `nome`, `sexo`) VALUES
(1, 'a', '9999', 'yuri', NULL, 'Yuri', 'Masculino');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `opn_cliente`
--
ALTER TABLE `opn_cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_plano_clienye_idx` (`id_plano`);

--
-- Indexes for table `opn_enquete`
--
ALTER TABLE `opn_enquete`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tipo_enquente_idx` (`id_tipo`),
  ADD KEY `fk_tema_enqute_idx` (`id_tema`);

--
-- Indexes for table `opn_extras`
--
ALTER TABLE `opn_extras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opn_plano`
--
ALTER TABLE `opn_plano`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opn_questionario`
--
ALTER TABLE `opn_questionario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_enquee_questionario_idx` (`id_enquete`);

--
-- Indexes for table `opn_tema`
--
ALTER TABLE `opn_tema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opn_tipo`
--
ALTER TABLE `opn_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opn_votacao`
--
ALTER TABLE `opn_votacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_votacao_enquete_idx` (`id_enquete`),
  ADD KEY `fk_votacao_questao_idx` (`id_questao_votada`),
  ADD KEY `fk_cliente_idx` (`id_cliente`),
  ADD KEY `fk_votacao_votante_idx` (`id_votante`);

--
-- Indexes for table `opn_votante`
--
ALTER TABLE `opn_votante`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `opn_cliente`
--
ALTER TABLE `opn_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `opn_enquete`
--
ALTER TABLE `opn_enquete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `opn_extras`
--
ALTER TABLE `opn_extras`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `opn_plano`
--
ALTER TABLE `opn_plano`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `opn_questionario`
--
ALTER TABLE `opn_questionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `opn_tema`
--
ALTER TABLE `opn_tema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `opn_tipo`
--
ALTER TABLE `opn_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `opn_votacao`
--
ALTER TABLE `opn_votacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `opn_votante`
--
ALTER TABLE `opn_votante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `opn_cliente`
--
ALTER TABLE `opn_cliente`
  ADD CONSTRAINT `fk_plano_clienye` FOREIGN KEY (`id_plano`) REFERENCES `opn_plano` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `opn_enquete`
--
ALTER TABLE `opn_enquete`
  ADD CONSTRAINT `fk_tema_enqute` FOREIGN KEY (`id_tema`) REFERENCES `opn_tema` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tipo_enquente` FOREIGN KEY (`id_tipo`) REFERENCES `opn_tipo` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `opn_questionario`
--
ALTER TABLE `opn_questionario`
  ADD CONSTRAINT `fk_enquee_questionario` FOREIGN KEY (`id_enquete`) REFERENCES `opn_enquete` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `opn_votacao`
--
ALTER TABLE `opn_votacao`
  ADD CONSTRAINT `fk_votacao_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `opn_cliente` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_votacao_enquete` FOREIGN KEY (`id_enquete`) REFERENCES `opn_enquete` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_votacao_questao` FOREIGN KEY (`id_questao_votada`) REFERENCES `opn_questionario` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_votacao_votante` FOREIGN KEY (`id_votante`) REFERENCES `opn_votante` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
