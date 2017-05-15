-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 20-Abr-2017 às 14:30
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camara`
--
CREATE DATABASE IF NOT EXISTS `camara` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `camara`;
--
-- Database: `casa_do_codigo`
--
CREATE DATABASE IF NOT EXISTS `casa_do_codigo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `casa_do_codigo`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` tinytext NOT NULL,
  `preco` decimal(9,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id`, `titulo`, `descricao`, `preco`) VALUES
(1, 'começando node', 'livro sobre node', '89.50'),
(2, 'Começando com Javascript', 'livro sobre javascript', '93.01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;--
-- Database: `coelhoneto`
--
CREATE DATABASE IF NOT EXISTS `coelhoneto` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `coelhoneto`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `xon_agenda`
--

CREATE TABLE `xon_agenda` (
  `id` int(11) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `evento` tinytext,
  `data` date DEFAULT NULL,
  `horaInicio` time DEFAULT NULL,
  `horaTermino` time DEFAULT NULL,
  `id_evento` int(2) DEFAULT NULL,
  `local` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `xon_agenda`
--

INSERT INTO `xon_agenda` (`id`, `status`, `evento`, `data`, `horaInicio`, `horaTermino`, `id_evento`, `local`) VALUES
(1, 'A', 'Sessão Extraordinária', '2017-02-12', '19:40:00', '23:17:00', 2, NULL),
(2, 'A', 'Sessão Extraordinária', '2017-02-23', '19:30:00', '20:50:00', 4, 'camara'),
(3, 'A', 'Sessão Extraordinária', '2017-02-15', '07:00:00', '09:00:00', 5, NULL),
(4, 'A', 'Sessão Extraordinária', '2017-02-21', '09:00:00', '23:31:00', 1, 'Prefeitura'),
(5, 'A', 'Assuntos internos', '2017-02-21', '12:00:00', '13:00:00', 1, 'Câmara'),
(6, 'A', 'Vereador Junior Santos, para', '2017-02-21', '19:00:00', '22:00:00', 1, 'CÂMARA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xon_atividade`
--

CREATE TABLE `xon_atividade` (
  `id` int(11) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `data_inc` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_vereador` int(11) NOT NULL,
  `texto` text,
  `ag_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `xon_banco_de_imagem`
--

CREATE TABLE `xon_banco_de_imagem` (
  `id` int(11) NOT NULL,
  `url` varchar(105) DEFAULT NULL,
  `code` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `xon_banco_de_imagem`
--

INSERT INTO `xon_banco_de_imagem` (`id`, `url`, `code`) VALUES
(1, 'rodoviaria1.jpg', 'CH9IU3Q'),
(2, 'michel1.jpg', 'CH9IU3Q'),
(3, 'coelhoneto1.jpg', 'CH9IU3Q'),
(4, 'michel11.jpg', ''),
(5, 'coelhoneto11.jpg', 'WK4ZJ2N'),
(6, 'rodoviaria2.jpg', 'WK4ZJ2N'),
(7, 'michel2.jpg', 'WK4ZJ2N'),
(8, 'coelhoneto111.jpg', ''),
(9, 'rodoviaria3.jpg', 'EFLD6Y4'),
(10, 'rodoviaria4.jpg', 'EFLD6Y4'),
(11, 'michel12.jpg', 'EFLD6Y4'),
(12, 'coelhoneto112.jpg', 'EFLD6Y4'),
(13, 'michel3.jpg', 'EFLD6Y4'),
(14, 'rodoviaria41.jpg', 'EFLD6Y4'),
(15, 'IMG_5592.jpg', 'EFLD6Y4'),
(16, 'IMG_55921.jpg', 'EFLD6Y4'),
(17, 'IMG_55922.jpg', 'WK4ZJ2N'),
(18, 'IMG_5656.jpg', 'WK4ZJ2N'),
(19, 'junior_santos.jpg', 'CH9IU3Q');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xon_cargos`
--

CREATE TABLE `xon_cargos` (
  `id` int(11) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `xon_cargos`
--

INSERT INTO `xon_cargos` (`id`, `cargo`, `status`) VALUES
(1, 'Assitente Administrativo', '1'),
(2, 'Contator', '1'),
(3, 'Vigilante', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xon_evento`
--

CREATE TABLE `xon_evento` (
  `id` int(11) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `nome` varchar(105) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `xon_evento`
--

INSERT INTO `xon_evento` (`id`, `status`, `nome`) VALUES
(1, 'A', 'Ordem do Dia'),
(2, 'A', 'Sessão Ordinária'),
(3, 'A', 'Audiência Pública'),
(4, 'A', 'Encontro com o Executivo'),
(5, 'A', 'Seminário'),
(6, 'A', 'Sessão Extra-ordinária'),
(7, 'A', 'Reunião Interna');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xon_frequencia`
--

CREATE TABLE `xon_frequencia` (
  `id` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `id_vereador` int(11) DEFAULT NULL,
  `id_sessao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `xon_frequencia`
--

INSERT INTO `xon_frequencia` (`id`, `status`, `id_vereador`, `id_sessao`) VALUES
(1, 0, 5, 2),
(2, 0, 6, 2),
(3, 0, 8, 2),
(4, 0, 9, 2),
(5, 0, 10, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `xon_item_transparencia`
--

CREATE TABLE `xon_item_transparencia` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `xon_item_transparencia`
--

INSERT INTO `xon_item_transparencia` (`id`, `nome`, `status`) VALUES
(1, 'Prestação de contas', 'A'),
(2, 'Oramentos e finanças', 'A'),
(3, 'Licitações e contratos', 'A'),
(4, 'Recursos humanos', 'A'),
(5, 'Atos administrativos', 'A'),
(6, 'Prestação de contas vereadores', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xon_lei`
--

CREATE TABLE `xon_lei` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `numero` varchar(45) NOT NULL,
  `ano` varchar(4) NOT NULL,
  `ementa` text NOT NULL,
  `autor` tinytext NOT NULL,
  `arquivo` tinytext NOT NULL,
  `publicacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `xon_lei`
--

INSERT INTO `xon_lei` (`id`, `titulo`, `numero`, `ano`, `ementa`, `autor`, `arquivo`, `publicacao`) VALUES
(2, 'LEI 17/2017', '19', '2017', 'EMENTA', 'LEI 2017\r\n', 'compras.xlsx', '2019-01-10'),
(3, 'LEI 17.000/2017', '17000', '2017', 'LEI', 'ELESBAO', 'IMG_55921.jpg', '2017-02-11'),
(4, 'LEI 10000/10', '10000', '2010', 'TESTE', 'Elesbão', 'transparencia-icone.png', '2010-01-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xon_menu`
--

CREATE TABLE `xon_menu` (
  `id` int(11) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `icone` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `xon_menu`
--

INSERT INTO `xon_menu` (`id`, `status`, `nome`, `icone`) VALUES
(3, 's', 'certificados', 'certificate'),
(7, 's', 'tarefas', 'tasks'),
(8, 's', 'tarefas', 'tasks'),
(9, 's', 'tarefas', 'tasks'),
(10, 's', 'tarefas', 'tasks'),
(11, 's', 'tarefas', 'tasks'),
(12, 's', 'tarefas', 'tasks'),
(13, 'k', 'teste', 'teste icone'),
(14, NULL, 'teste', 'teste icone'),
(15, NULL, 'teste', NULL),
(16, NULL, 'teste', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `xon_mesa_diretora`
--

CREATE TABLE `xon_mesa_diretora` (
  `id` int(11) NOT NULL,
  `bienio` varchar(9) NOT NULL,
  `funcao` varchar(60) NOT NULL,
  `status` varchar(1) NOT NULL,
  `id_vereador` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `xon_mesa_diretora`
--

INSERT INTO `xon_mesa_diretora` (`id`, `bienio`, `funcao`, `status`, `id_vereador`) VALUES
(1, '2017-2018', 'Presidente', 'a', 5),
(3, '2017-2018', '1º Secretário', 'a', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `xon_noticias`
--

CREATE TABLE `xon_noticias` (
  `id` int(11) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `titulo` tinytext,
  `texto` text,
  `data_inc` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `slug` tinytext,
  `data_postagem` date DEFAULT NULL,
  `code` varchar(7) DEFAULT NULL,
  `resumo` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `xon_noticias`
--

INSERT INTO `xon_noticias` (`id`, `status`, `titulo`, `texto`, `data_inc`, `slug`, `data_postagem`, `code`, `resumo`) VALUES
(15, 'p', 'Planejamento estratégico de Converção de caracteres ASCII para entities', '<p><img src="../uploads/noticias/junior_santos.jpg" alt="junior santos" width="431" height="323" />Converts ASCII values to character entities, including high ASCII and MS Word characters that can cause problems when used in a web page, so that they can be shown consistently regardless of browser settings or stored reliably in a database. There is some dependence on your server&rsquo;s supported character sets, so it may not be 100% reliable in all cases, but for the most part it should correctly identify characters outside the normal range (like accented characters).</p>', '2017-02-13 02:54:01', 'Planejamento-estrategico-de-Convercao-de-caracteres-ASCII-para-entities', '2017-01-07', 'CH9IU3Q', 'Texto com o resumo da materia em questao																						'),
(16, 'p', 'PLANEJAMENTO ESTRATÉGICO DE TRABALHO DA CÂMARA FOI ELABORADO DE FORMA COMPARTILHADA', '<h1 style="text-align: left;"><img style="display: block; margin-left: auto; margin-right: auto;" src="../../../uploads/noticias/rodoviaria2.jpg" alt="" width="500" height="375" />Teste de cadastro de m&aacute;tria</h1>', '2017-02-13 03:35:56', 'PLANEJAMENTO-ESTRATEGICO-DE-TRABALHO-DA-CAMARA-FOI-ELABORADO-DE-FORMA-COMPARTILHADA', NULL, 'WK4ZJ2N', 'Resumo de texto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xon_partido`
--

CREATE TABLE `xon_partido` (
  `id` int(2) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `nome_partido` varchar(45) DEFAULT NULL,
  `sigla` varchar(5) DEFAULT NULL,
  `imagem` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `xon_partido`
--

INSERT INTO `xon_partido` (`id`, `status`, `nome_partido`, `sigla`, `imagem`) VALUES
(0, 'C', 'Câmara', 'CSA', NULL),
(5, 'A', 'Democratas', 'DEM', 'dem1.jpg'),
(6, 'A', 'Partido Comunista do Brasil', 'PCdoB', 'PCdoB1.gif'),
(7, 'A', 'Partido dos Trabalhadores', 'PT', 'logo_pt1.gif'),
(8, 'A', 'Partido do Movimento Democrático Brasileiro', 'PMDB', 'pmdb1.png'),
(9, 'A', 'Partido Socia Domocrático', 'PSD', 'logo_psd1.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xon_perfil`
--

CREATE TABLE `xon_perfil` (
  `id` int(11) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `cadastrar` int(1) DEFAULT NULL,
  `editar` int(1) DEFAULT NULL,
  `deletar` int(1) DEFAULT NULL,
  `liberar` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `xon_perfil`
--

INSERT INTO `xon_perfil` (`id`, `status`, `nome`, `cadastrar`, `editar`, `deletar`, `liberar`) VALUES
(1, 'A', 'administrador', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `xon_servidor_publico`
--

CREATE TABLE `xon_servidor_publico` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `rg` varchar(25) NOT NULL,
  `data_nascimento` varchar(10) NOT NULL,
  `email` varchar(60) NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `salario` varchar(10) NOT NULL,
  `id_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `xon_servidor_publico`
--

INSERT INTO `xon_servidor_publico` (`id`, `nome`, `cpf`, `telefone`, `rg`, `data_nascimento`, `email`, `logradouro`, `salario`, `id_cargo`) VALUES
(11, 'ELESBÃO PINTO MAGALHÃES FILHO', '94046670304', '9834733482', '1389262120005', '15/07/1082', 'elesbaopinto@gmail.com', 'RUA VICENTE CORREIA LIMA, 2019, CENTRO - COELHO NETO - MA', '200,00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `xon_sessao`
--

CREATE TABLE `xon_sessao` (
  `id` int(11) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `semana` int(1) DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `descricao` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `xon_sessao`
--

INSERT INTO `xon_sessao` (`id`, `status`, `data`, `semana`, `hora`, `descricao`) VALUES
(1, NULL, '2017-02-12', NULL, '10:00:59', 'Sessão ordinária da câmara municipal'),
(2, NULL, '2017-02-15', NULL, '11:00:00', 'sessão plenária'),
(3, NULL, '2017-04-20', NULL, '19:00:00', 'Sessão ordinária');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xon_tipo`
--

CREATE TABLE `xon_tipo` (
  `id` int(2) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `xon_tipo`
--

INSERT INTO `xon_tipo` (`id`, `status`, `nome`) VALUES
(1, 'A', 'MESA DIRETORA'),
(2, 'A', 'VEREADOR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xon_transparencia`
--

CREATE TABLE `xon_transparencia` (
  `id` int(11) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `data_inc` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_item` int(11) DEFAULT NULL,
  `url` tinytext,
  `texto` text,
  `ano` varchar(4) DEFAULT NULL,
  `mes` varchar(2) DEFAULT NULL,
  `id_destino` int(11) DEFAULT NULL,
  `arquivo` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `xon_transparencia`
--

INSERT INTO `xon_transparencia` (`id`, `status`, `data_inc`, `id_item`, `url`, `texto`, `ano`, `mes`, `id_destino`, `arquivo`) VALUES
(1, NULL, '2017-02-17 16:13:48', 5, 'casa', 'casas', '2017', '02', 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `xon_usuario`
--

CREATE TABLE `xon_usuario` (
  `id` int(11) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `nome` varchar(245) DEFAULT NULL,
  `login` varchar(40) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `id_perfil` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `xon_usuario`
--

INSERT INTO `xon_usuario` (`id`, `status`, `nome`, `login`, `senha`, `id_perfil`) VALUES
(1, 'A', 'gerson', 'gersonjames', 'bab7ad157e07cabd31687294cacdd16a78f8cc6b', 1),
(2, 'A', 'Elesbão Pinto', 'elesbaopinto', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `xon_vereador`
--

CREATE TABLE `xon_vereador` (
  `id` int(11) NOT NULL,
  `status` varchar(1) NOT NULL,
  `nome` varchar(245) NOT NULL,
  `id_partido` int(2) NOT NULL,
  `biografia` text NOT NULL,
  `imagem` varchar(245) DEFAULT NULL,
  `lideranca_partido` varchar(1) DEFAULT NULL,
  `legislatura` tinytext NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `telefone_fixo` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `site` varchar(45) DEFAULT NULL,
  `logradouro` tinytext,
  `cidade` varchar(105) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `xon_vereador`
--

INSERT INTO `xon_vereador` (`id`, `status`, `nome`, `id_partido`, `biografia`, `imagem`, `lideranca_partido`, `legislatura`, `email`, `telefone_fixo`, `celular`, `site`, `logradouro`, `cidade`, `cep`) VALUES
(0, 'C', 'Casa', 0, '', NULL, 's', '', '', '2344555', '', '', NULL, NULL, NULL),
(5, 'A', 'OSMAR AGUIA DOS SANTOS', 7, 'Nascido em Duque Bacelar em 1975 e cidadão coelhonetense desde 1980, quando veio com sua família atrás de melhores condições de vida, Osmar Aguiar, jovem comprometido com os ideais democráticos, participou do Movimento Estudantil no Centro Cívico da Escola Municipal Benedito Duarte em 1993 e no Grêmio Estudantil do Centro de Ensino José Sarney em 1996, representando dignamente os alunos seus companheiros. \r\nComeçou a ajudar a família no ganha-pão diário aos 11 anos de idade, com a venda de picolé, percorrendo as principais ruas da cidade com disposição e persistência, apesar dos percalços sofridos com essa atividade. Ainda adolescente trabalhou como tratorista, pintor, soldador, ajudante de pedreiro para sustentar sua mãe e seus irmãos. Esteve presente no Movimento Sindical desde 1997, quando foi aprovado em Concurso Público da Prefeitura Municipal de Coelho Neto para o cargo de vigia, trabalhando nessa função até ser aprovado em outro Concurso Público da mesma cidade em 2001, para o cargo de Professor. Participou ativamente de todos os movimentos de luta de classe dos servidores municipais, como prova da sua postura aguerrida em prol dos direitos dos companheiros. E nesse mister foi sempre firme, responsável, irredutível em seu ideal de justiça. \r\nÉ formado em Licenciatura Plena em Geografia, pela Universidade Estadual do Piauí, (UESPI); Pós-graduado em Proteção Ambiental pela Universidade Federal do Piauí (UFPI). Participou da equipe de elaboração do Plano de Cargos, Carreira e Salário, para o Magistério Público Municipal em 2008. Foi apresentador do programa A VOZ DA CIDADE, tendo sido ameaçado de morte por denunciar com veemência as mazelas de Coelho Neto, cumprindo sempre com fidelidade, seu ideal em defesa dos direitos do povo desta terra.\r\nPresidiu o SINTASP/MCN de 2009 a 2012, coordenando dois movimentos grevistas como presidente da referida instituição. Presidiu a Assembleia Geral de comemoração dos 23 anos do Sindicalismo dos Servidores Municipais em Coelho Neto e foi testemunha ocular da invasão do prédio do sindicato pelo prefeito municipal.\r\nEm forma de reconhecimento, lealdade e capacidade de liderança para com os servidores municipais de Coelho Neto foi eleito presidente da Federação dos Trabalhadores do Serviço Público do Estado do Maranhão (FETRAM/MA) no período de 2012 a 2016, e reconduzido para o quadriênio 2016 a 2020. \r\nConcorreu ao cargo de vereador nas eleições de 2012, tendo sido eleito com 891 votos. Essa vitória foi prova da sua luta pelos direitos do trabalhador, da sua competência como homem honrado, dinâmico, sério, que em nenhum momento temeu represálias e demonstrou ininterruptamente sua coragem e seu espírito democrático.\r\nÉ vereador atuante em defesa do trabalhador e dos menos favorecidos, denunciando incansavelmente as injustiças sociais. \r\nNo biênio 2013/2014 assumiu o cargo Vice-Presidente da Comissão de Finanças e Orçamento e Vice-presidente da Comissão de Obras, Educação, Saúde e Assistência no biênio 2015/2016.\r\nAlgumas de suas proposições na Câmara Municipal:\r\n•	Indicação Nº 012/2013(assinada também pelos demais Vereadores), que sejam tomadas as seguintes providências ao Poder Executivo em relação aos agentes aos Agentes Municipais de saúde e endemias, conforme especificação abaixo:\r\nAgentes de Endemias:\r\n1.	Que a Prefeitura pague os 40% do salário base a título de Gratificação de Função, de acordo com o parágrafo único do artigo 8º da lei municipal 611/2012;\r\n2.	Regularização da data-base de pagamento.\r\nAgentes de Saúde:\r\n1.	Que seja paga a Gratificação de Insalubridade de 20% do salário base, de acordo com o parágrafo único do artigo 1º da lei municipal 559, de 03 de novembro de 2008;\r\n2.	Que seja regularizada a data do pagamento do terço de férias para os ACSs;\r\n3.	Regularizar a data-base.\r\n•	 Indicação nº 02/2013- De sua iniciativa e dos demais colegas Cristiane Bacelar e Rafael Cruz, referente melhorias para as Ruas:\r\n•	Rua Deusadete Barros:\r\n01.Melhoria da infra-infraestrutura da referida rua (limpeza pública, recuperação de meio fio do calçamento, coleta de lixo, que não está sendo realizada há mais de duas semanas, bem como manutenção da iluminação pública);\r\n02.Melhorias no fornecimento de água. (a água não tem pressão nas torneiras);\r\n03.Construção de uma galeria para facilitar o escoamento da água;\r\n•	Rua Rui Barbosa:\r\nRecuperação do asfaltamento (trecho da padaria Moderna até o final da referido rua);\r\n•	 Indicação nº 010/2013 – Encaminha ao Poder Executiva minuta do Projeto de Lei referente criação da Lei de acesso à informação, em atendimento ao disposto no inciso XXXIII do art. 5º e art. 37 da Constituição Federal (caput , inciso II do §3º); \r\n•	Indicação verbal (Sessão Ordinária 04.02.2013) – Solicita do Governo Municipal o aluguel de uma residência em São Luís, destinada aos estudantes de Coelho Neto que fazem Curso Superior em São Luís;\r\n•	Indicação verbal( Sessão Ordinária 07.02.2013) -Solicita reposição dos gelos baianos da Avenida Marechal Cordeiros de Farias após a realização das festividades, como carnaval, festa junina, festa de Nossa Senhora Santana, para melhor trafegabilidade dos alunos;\r\n\r\n•	Indicação verbal (Sessão Ordinária 07. 02. 2013) – Criação da Guarda Municipal, conforme dispõe a Lei Orgânica Municipal;\r\n•	Indicação verbal (Sessão Ordinária 14.02.2013) - Que sejam tomadas as providências necessárias em relação às Ruas:  \r\n           São Silvestre, - recuperação da referida rua, que recebeu calçamento de bloquete e hoje não existe mais;\r\nRua José Alves de Sousa - retirada do lixo acumulado e concluído o reparo do calçamento que iniciou em 2010;\r\n Rua Maranhão, recuperação do calçamento, que está bastante esburacado, comprometendo a trafegabilidade dos veículos e pedestres; \r\n•	Indicação verbal (Sessão Ordinária 18. 02 2013) - Que seja encaminhada à Câmara Municipal:\r\n1.	O valor do saldo bancário do Instituto Municipal de Previdência;\r\n2.	O número de servidores aposentados e pensionistas:\r\n3.	O valor do gasto do instituto com essas pessoas;\r\n•	Indicação nº 019(28.02.2013) - Melhorias nas seguintes Ruas:\r\nRua da Diplomacia (Bairro Mutirão) Que seja feito o calçamento para melhorar a locomoção dos moradores;  Coleta regular do lixo; \r\nRua da Cortesia (Bairro Mutirão) - recuperação do calçamento da referida rua, pois apesar de ser um calçamento feito recentemente, já existem vários buracos; construção de uma galeria no cruzamento da Rua da Cortesia com a Rua Diplomacia, pois a cratera lá existente está causado muitos transtorno aos moradores;  \r\n•	Indicação Verbal (Sessão Ordinária 11.03.2013) - Instalação de um Posto Policial próximo à quadra de esportes do Bairro Sarney, a fim de prevenir a ação de traficantes de drogas junto às crianças que por ali trafegam;\r\n•	Indicação nº 025/2013 – Melhorias para o Cemitério do Itapirema: limpeza e iluminação pública;\r\n•	Indicação nº 026/2013 – Realização de serviços de terraplanagem e instalação de postes oficiais da CEMAR nas Ruas da Autonomia e Cortesia, no Bairro Olho D’Aguinha;\r\n•	Indicação verbal(Sessão Ordinária 14.03.2013) -Iluminação Pública e melhoria da infraestrutura da Rua Justino da Silva Bastos, no trecho próximo à Feirinha, Bairro Quiabos, tendo em vista grandes transtornos pelos quais os moradores estão enfrentando;\r\n•	Indicação verbal (25.03.2013) – Criação da Guarda Municipal;\r\n•	Requerimento nº 009/2013 – Que o Prefeito envie à Câmara Municipal a Prestação de Contas da Prefeitura Municipal, dos exercícios financeiros de 2011 e 2012, devidamente acompanhadas de todos os documentos que as instruem (folhas de pagamento, empenhos, processos licitatórios, notas fiscais, recibos, etc., tudo na forma da legislação em vigor;\r\n•	Indicação Verbal (Sessão Ordinária 20.05.2013) – Regularização do abastecimento de água da Rua X, Bairro Sarney;\r\n•	Indicações verbais (Sessão Ordinária 03.06.2013) - Construção de uma galeria passando pelas  Ruas C, E, G, Bairro Sarney, até chegar à Av. Coelho Neto, para escoamento da água que fica acumulada nesse trecho; Regularização do abastecimento de água nas Ruas C e G, tendo em vista a grande dificuldade que os moradores estão enfrentando para conseguir água; Regularização da iluminação pública das Ruas Padre Alfredo Bacelar e Dr. Luís Raimundo; Que seja averiguada a constante queima de detritos no lixão, pois a fumaça tem incomodado bastante os moradores daquelas proximidades;\r\n•	Indicação nº 037/2013 – (assinado também pelos demais vereadores) - Circulação de transporte coletivo aos alunos do Ensino Fundamental II e Médio, residentes nos bairros distantes do centro da cidade; \r\n•	Indicações verbais(Sessão Ordinária de 24.06.2013) -  Regularização do abastecimento de água na Rua Maranhão (Bairro Quiabos) e Bairro Mutirão; Limpeza das galerias, principalmente do centro da cidade;\r\n•	Indicação nº 046/2013 – Solicita do Poder Executivo que encaminhe a esta Casa Projeto de Lei, conforme minuta anexa, que disciplina a nomeação para cargos em comissão no âmbito dos órgãos do Poder Executivo e Legislativo Municipal;\r\n•	Indicação Verbal:(Sessão Ordinária 07.11.2013)\r\n1.	Iluminação adequada para o quadra de esporte localizada no Estádio Tancredo Neves;\r\n2.	Melhoria das condições da passarela do Estádio Tancredo Neves e também do gramado, pois ambos estão com ondulações, dificultando a prática do futebol e das caminhadas;\r\n3.	Avaliação e melhorada as condições de escoamento da água da valeta construída ao redor do Estádio Tancredo Neves; \r\n4.	Conclusão dos serviços das creches, tendo em vista a aproximação do ano vindouro;\r\n5.	Valorização da mão de obra local nos serviços de construção das creches, pois foi observado que os trabalhadores são de Chapadinha;\r\n6.	Que seja enviado à Câmara o contrato de serviço com a empresa responsável pelo construção das creches;\r\n7.	Que seja colocada placa de identificação nas obras creches, especificando, dentre outros detalhes, a empresa responsável pela obra;\r\n\r\n•	Indicações verbais (Sessão Ordinária 13.03.2014) – Iluminação pública das Ruas Maria Lima Couto, Estevão de Moraes e Raimundo Sérvulo; Limpeza das margens das estradas vicinais;\r\n\r\n•	Indicações verbais (Sessão Ordinária 17.03.2014) – Recuperação das Ruas Humberto Aranha Alves e Travessa Santa Clara (Bairro Santana);\r\n\r\n•	Indicação verbal (Sessão Ordinária 24.03.2014) – Solicita do Prefeito Municipal pagamento dos caçambeiros referente ao mês de julho/2013;\r\n•	Indicações verbais (Sessão Ordinária 31.03.2014) – Recuperação da ponte do povoado Santa Maria; Regularização do abastecimento de água do povoado Baixa Fria; Iluminação pública com posteamento para a Rua próxima à Escola Moacyr Bacelar; Patrolamento das ruas próximas à Rua da Ecologia, no Mutirão; \r\n\r\n•	Requerimento nº 002(03.04.2014) – Informações da Secretária de Educação sobre:\r\n1.	O critério utilizado para a seleção dos monitores do projeto acima Ciranda Pedagógica;\r\n2.	Relação nominal de todos os monitores do projeto acima citado, com suas respectivas formações;\r\n3.	Cópia integral do referido projeto aplicado no ano de 2014;\r\n\r\n•	Indicação verbal (Sessão Ordinária 10.04.2014) – Iluminação pública e melhoria da infraestrutura da Rua Justino da Silva Bastos, Bairro Quiabos (próximo à Feirinha);\r\n•	Indicação verbal (Sessão Ordinária 07.04.2014) - Que seja informado a esta Casa, através de oficio, a forma de contrato dos trabalhadores que estão construindo a UPA de Coelho Neto, pois segundo denúncias apresentadas no gabinete do vereador Osmar Aguiar, esses trabalhadores estão prestado serviço sem carteira assinada;\r\n\r\n•	Indicação nº 010/14 – Recuperação da iluminação pública da Travessa Leonildes com a Rua Santa Maria, Bairro Anil;\r\n\r\n•	Indicação Verbal ( Sessão Ordinária 28.04.2014) – Solicitou do Sr. Prefeito a solução do problema dos empréstimos consignados de servidores municipais;\r\n\r\n•	Indicação verbal (Sessão Ordinária 12.05.2014) – Providências da Senhora Secretária de Educação  no sentido de encontrar urgente solução para o abastecimento de combustível nos ônibus escolares, pois há informações de que não está havendo fornecimento no posto Santana, onde os ônibus são abastecidos; \r\n•	Indicação verbal (Sessão Ordinária 11.08.2014) - Que sejam envidados esforços para a realização de uma campanha de sensibilização sabre a hanseníase em nosso Município, tendo em vista os vários casa detectados e a necessidade de amplo esclarecimento à população sobre o referido problema de saúde pública. Sabe-se ainda que a maioria dos nossos munícipes não tem conhecimento efetivo sobre a doença e por isso, os diagnósticos são tardios;\r\n•	\r\n•	Indicação nº001 (05.04.2015) - Que a Prefeitura Municipal envie a esta Casa mensagem, descrevendo as políticas públicas voltadas para as mulheres, que estão sendo desenvolvidas atualmente pela administração Municipal; Análise da possibilidade de criação da Secretaria Municipal da Mulher;\r\n•	Requerimento nº 003(05.04.2015) - Que o Prefeito Municipal de Coelho Neto, envie à Câmara Municipal de Coelho Neto, a Prestação de Contas da Prefeitura, referente ao exercício 2014, devidamente acompanhada de todos os documentos que as instruem, tais como: folhas de pagamento, empenhas, processos licitatórios, notas fiscais, recibos, etc., tudo na forma de legislação em vigor; \r\n\r\n•	Indicações verbais (Sessão Ordinária 13.04.2015): \r\n1.	Realização de um levantamento da necessidade de carteiras para as Escolas José Barreto e Benedito Duarte;\r\n2.	Disponibilização de ônibus escolar para transportar os alunos da Zona Urbana que estudam nas Escolas Beneditos Duarte e José Sarney e que moram nos Bairros Santana, Bonsucesso, Mutirão, Sarney e Quiabos, pois a distância dificulta o acesso tanto no inverno quanto no verão;\r\n3.	Que seja providenciada merenda escolar para da região do Pindaré e Bananalzinho;\r\n\r\n•	Indicação (Sessão Ordinária 08.04.2015) – Pedido de informação ao Senhor Secretário de Saúde sobre o atraso de dois meses no pagamento do salário dos agentes de saúde e de endemias;\r\n\r\n•	Indicação verbal (Sessão Ordinária 17.04.2015) - Que seja providenciada iluminação pública na Rua Vicente Corrêa Lima, próxima à Escola Benedito Duarte;\r\n\r\n•	Indicação verbal (Sessão Ordinária 27.04.2015) - -Que seja encaminhada a esta casa informação sobre a real situação de todos o maquinário do PAC, tanto alugados quanto próprios, que estão sem manutenção; \r\n\r\n•	Indicação verbal (Sessão Ordinária 04.05.2015) – Recuperação do ônibus que faz linha para o povoado Taboca dos Bois e Lagoa dos Cavalos; Recuperação da Rua Getúlio Vargas;\r\n\r\n•	Indicações verbais (Sessão Ordinária 14.05.2015):\r\n1.	Calçamento da Rua 31 de Outubro, que se encontra intrafegável, causando muitos transtornos. Caso     não seja possível fazer o calçamento a curto prazo, que seja feito pelo menos o patrolamento;\r\n2.	Fiscalização junto aos donos de terrenos baldios no Bairro Anil, que limpem e cerquem seus terrenos, atendendo a legislação em vigor;\r\n\r\n•	Indicações verbais(Sessão Ordinária 14.05.2015) : \r\n1.	Que volte a circular o ônibus que estava transportando os alunos da Escola Diego Bacelar, os quais foram matriculados na Escola Municipal da Av. Santana. Esses alunos precisam de um transporte, tendo em vista residirem em bairro distantes, como o Quiabos e José Reinaldo;\r\n2.	Que seja disponibilizado ônibus escolar para circular nas Avenidas Santana, Coelho Neto e José Silva, com a finalidade de transportar os alunos que estudam nas Escola Benedito Duarte, José Sarney, pois o trajeto que esses alunos fazem a pé é muito grande;\r\n\r\n•	Indicação nº002 (2015) - Reposição das lâmpadas dos postes e limpeza da Rua Deusadete Barros, centro, assim como no cruzamento das Ruas Castro Alves e São Raimundo, Bairro Santana;\r\n\r\n•	Indicação verbal (Sessão Ordinária 19.05.2015) Que seja providenciado posteamento no final da Rua da Democracia, Bairro Mutirão;\r\n\r\n•	Indicação verbal (Sessão Ordinária 21.05.2015) - Que sejam tomadas providências para colocar em funcionamento o portal da transparência da Câmara Municipal, cumprindo, assim, a legislação em vigor;\r\n\r\n•	Indicação verbal (Sessão Ordinária 22.05.2015) -  Que seja intensificada a ronda policial do Bairro D’aguinha, nas proximidades do estádio, tendo em vista tratar-se de um local onde há grande a incidência do consumo de drogas e violência;\r\n\r\n•	Indicação (Sessão Ordinária 22.05.2015) – Pedido de informações à Senhora Secretaria de Educação sobre os encaminhamentos que estão sendo feitos para a realização das eleições diretas para gestores das escolas municipais;\r\n\r\n•	Indicações verbais ( Sessão Ordinária 22.05.2015) :\r\n1.	Que seja melhorada a infraestrutura do Bairro D ‘Aguinha, com as seguintes providências: Iluminação pública, com reposição de lâmpada nos postes que ficam próximos ao estádio; Coleta regular do lixo, pois os moradores são obrigados a queimar o lixo por falta de recolhimento e terminar prejudicando a saúde dos idosos e crianças;\r\n2.	Iluminação pública da Rua 7 Setembro, próxima à residência do Sr. Jademil Gedeon;\r\n3.	Que seja informado a esta Casa o valor que a Prefeitura Municipal repassa aos caçambeiros por carrada;\r\n4.	Intensificação de ronda policial no Bairro Olho D´Aguinha, nas proximidades do estádio;  \r\n\r\n•	Indicações verbais (Sessão Ordinária 08.06.2015) :\r\n1.	Iluminação pública na Rua das Virtudes e ruas adjacentes, no Bairro Santana;\r\n2.	Patrolamento das ruas do Bairro Santana, em difícil condição de trafegabilidade;\r\n3.	Construção de espaço de lazer no Bairro Santana; \r\n \r\n•	Indicação (22.06.2015) – 01.Pintura de faixa de pedestre em frente à Escola Chapeuzinho Vermelho; \r\n02.Melhoria do transporte da merenda escolar para a zona rural; \r\n\r\n•	Indicação verbal (Sessão Ordinária 06.08.2015) - Que sejam envidados esforços para a implantação de uma brigada de incêndio em Coelho Neto, levando em conta os vários incêndios que já aconteceram e que prejudicaram muitas famílias;\r\n\r\n•	Indicação verbal (Sessão Ordinária 20.08.2015) - Conclusão do calçamento nas Ruas do Bairro Santana;\r\n\r\n•	Indicação verbal (Sessão Ordinária 01.10.2015) - Que sejam tomadas providências para a realização de concurso público municipal, para suprir as necessidades dos cargos efetivos;\r\n\r\n•	Indicação verbal (Sessão Ordinária 29.10.2015) - Que seja solucionado o problema do transporte escolar dos alunos do povoado São José dos Teles;\r\n\r\n•	Indicação nº 020 (2015) - Que seja solucionado o problema do sistema de distribuição de água no Bairro Bela Vista, conforme abaixo-assinado dos moradores;\r\n\r\n•	Indicação verbal (Sessão Ordinária 05.11.2015) - Que seja providenciado o conserto urgente do  SEMÁFORO desta cidade, pois se encontra com problemas, podendo causar acidentes; Que seja providenciado o conserto dos banheiros e bebedouros da Quadra de Esporte Uiran Sousa;\r\n\r\n•	Indicação verbal (Sessão Ordinária 26.11.2015) - Que seja solucionado o problema da iluminação Pública do Bairro Anil II e Parque Amazonas;\r\n\r\n•	Indicação verbal (Sessão Ordinária 01.12.2015) - Que seja providenciada a Iluminação pública da Av. Santana, no trecho próximo ao Conjunto Guanabara;\r\n\r\n•	Indicação verbal (Sessão Ordinária 03.03.2016) - Que seja providenciada a contratação de mais plantonistas para a Casa de Saúde e Maternidade de Coelho Neto, tendo em vista a impossibilidade de um só medico fazer todo o procedimento no plantão;\r\n\r\n•	Indicação verbal (Sessão Ordinária 28.03.2016) - Limpeza das galerias e a realização urgente de um mutirão de limpeza no centro da cidade, para evitar a proliferação do mosquito aedes aegypti; \r\n\r\n\r\n•	Indicação verbal (Sessão Ordinária 25.04.2016) - Que seja providenciado o serviço de instalação das placas indicativas das ruas do Bairro Bonsucesso, conforme a lei 607/2012, anexo, pois até o momento não foi cumprida a referida lei; \r\n\r\n•	Indicação nº 002/2016 (Sessão Ordinária 28.04.2016) - Que seja providenciado um carro para o transporte dos pacientes do CAPS;\r\n\r\n•	Indicação nº 009/2016 – Solução do problema de abastecimento de água para os moradores do povoado Santa Maria;\r\n\r\n•	Indicação verbal (Sessão Ordinária 28.04.2016) - Regularização do transporte dos alunos dos povoados Macaúba, Bonfim e Adjacências, pois o que se sabe é que por falta de manutenção os ônibus estão há quatro dias sem fazer o transporte desses alunos;\r\n\r\n•	Indicação verbal (Sessão Ordinária 12.05.2016) - Que sejam tomadas providências urgentes para a realização do tratamento fisioterápico pós – operatório do Sr. Rogério Lima. Esclareça-se que esse é um apelo ao Sr. Secretário de Saúde, pois esse tratamento vem sendo protelado e o paciente já não suporta mais esperar; \r\n\r\n•	Indicação verbal (Sessão Ordinária 12.05.2016) - Atualização do pagamento dos voluntários das escolas municipais;\r\n\r\n•	Indicação verbal (Sessão Ordinária 12.05.2016- Antes da expedição de alvará, que seja analisada, em conformidade com o código de posturas, a construção de um possível abatedouro de frango na rua Duque de Caxias, Bairro Bonsucesso, pelo Sr. Brasileirão. Esclareça-se que o local do possível abatedouro ficará próximo a residências e os moradores estão preocupados, pois ficarão expostos à insalubridade;\r\n\r\n•	Indicação verbal (Sessão Ordinária dia 30.05.2016) – Providências para a proibição de animais soltos nas ruas da cidade.\r\n', 'osmar_aguiar1.jpg', NULL, '2010, 2011, 2012, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020', 'osmar@vereador.com', '99212121212', '99656565656', 'vereador.com/osmar', 'Rua Raimundo Servolo de Lima, SN, Centro', 'Coelho Neto (MA)', '65620-000'),
(6, 'A', 'JOSÉ RIBAMAR DOS SANTOS ALVES JÚNIOR', 8, 'José Ribamar dos Santos Alves Júnior nasceu no dia 22 de janeiro de 1984, em Coelho Neto-MA. É filho de José Ribamar dos Santos Alves Júnior e Telma Maria Viana dos Santos. Reside no Bairro Duartão. Desde criança demonstrou ser bom filho, de personalidade firme, espírito de decisão e liderança entre os colegas. Essa postura foi delineando o seu caráter irreprovável também na juventude, e até hoje, como homem público que é. Casou-se com Kelly Patrícia Machado Passos, união da qual nasceu o tão esperado  primogênito José Guilherme Passos dos Santos. Concluiu o Ensino Médio no Centro de Ensino Médio José Sarney. Foi estudante engajado e vitorioso.\r\nExerceu durante 04 anos o cargo de professor de Informática das Escolas Municipais José Barreto e José Sarney, contribuindo, sobremaneira, para a educação deste Município. \r\nFoi também Presidente do Rotaract Clube, tendo realizado um excelente trabalho em prol das causas sociais, juntamente com seus companheiros. \r\nPor ter uma postura de jovem aguerrido, destemido, de boa conduta, desenvolveu ao longo de sua juventude uma consciência política comprometida com os interesses populares. E para realizar o sonho de lutar pelo povo desta terra, por uma juventude emancipada e com futuro promissor, disputou uma cadeira no Legislativo Municipal nas eleições de 2012, contando com o apoio de vários amigos jovens deste Município, que o ajudaram a fazer uma campanha memorável, dinâmica e vitoriosa. Foram 951 votos conquistados com perseverança, trabalho, propostas desafiadoras e muita competência de lidar com o eleitorado.\r\nNo biênio 2013/2014 foi eleito 2º Secretário da Mesa Diretora do Poder Legislativo. \r\nAssume o cargo de Relator da Comissão de Finanças e Orçamento da Câmara Municipal em dois biênios: 2013/2015 e 2015/2016.\r\nPara fazer jus aos votos recebidos é um Vereador atuante, que verifica in loco os anseios da comunidade e traz para a tribuna da Câmara Municipal proposições que traduzem a vontade popular.\r\nEis o registro de algumas proposições apresentadas na Câmara Municipal:\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 04.02.2016) – Reparo na ponte do povoado São Lourenço, próxima à Belágua;\r\nINDICAÇÃO Nº 015/2013 – Implantação do calendário esportivo municipal;\r\nINDICAÇÃO Nº 017/2013 – Recuperação do calçamento da Rua Santa Maria com a Rua Mariquinha, Bairro Anil; Limpeza da galeria da Rua Juscelino Kubistchek com a Rua 14 de Abril; \r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 18.02.2016) – Limpeza da galeria da Av. Santana, próxima ao comércio do Sr. Zé Dias;\r\nINDICAÇÃO Nº 23/2013 – Limpeza e manutenção do Cemitério São Judas Tadeu;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 25.03.2013) – Construção de quebra-molas na Avenida Coelho Neto;\r\nINICIATIVA DO REQUERIMENTO Nº 011/2013, COM ASSINATURA DOS DEMAIS VEREADORES – Recuperação do asfaltamento da MA-034, que liga Coelho Neto ao Descanso;\r\nINDICAÇÃO Nº 035/2013 – Instalação de parque infantil (playgroud) na Praça João Santos;\r\nINDICAÇÃO Nº 36/2013 (DE SUA INICIATIVA COM ASSINATURAS DOS DEMAIS VEREADORES) – Recuperação das Ruas Socorro Lima (Bairro Duartão), Pau Brasil (Parque Amazonas) e Pedro Vaz (Conjunto José Reinaldo);\r\nINDICAÇÃO VERBAL(SESSÃO ORDINÁRIA 19.08.13) – Ligação do cano geral de abastecimento de água, passando pela Rua Eliza Lopes, a fim de beneficiar onze famílias;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 19.08.2013) – Iluminação pública para a Rua Eliza Lopes e Rua Francisco de Assis Medeiros (Bairro Novo Astro); Recuperação do Estádio Gonçalão;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 19.08.2013) – Envio do Calendário Esportivo para a Câmara de Vereadores, para que se tenha conhecimento dos eventos esportivos;\r\nPROJETO DE DECRETO Nº 002/2013 – concedendo o título de cidadania honorária coelhonetense à Primeira Dama, Mara Suely Almeida e Silva;\r\nINDICAÇÃO Nº 65/13 – Construção de quebra-molas ao longo da Av. Coelho Neto;\r\nINDICAÇÃO Nº 072/13 – Pedido para a municipalização do trânsito em Coelho Neto, começando pela sinalização das vias urbanas;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 07.10.2013) - Manutenção, conservação e limpeza do Cemitério São Judas Tadeu, bem como iluminação pública, recuperação das passarelas, reabertura do da entrada do portão da antiga entrada; \r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 03.10.13) – Patrolamento da Rua Pau D`arco, Parque Amazonas;\r\nINDICAÇÃO Nº 072/2013 – Pedido de municipalização do trânsito, começando pela sinalização das vias urbanas;\r\nINDICAÇÃO Nº 82/2013 – Manutenção da pintura dos meio fios e limpeza das Ruas Demétria de Sousa e 31 de Outubro, Bairro Anil II, assim como a recuperação da subida da Rua 31 de Outubro;\r\nINDICAÇÃO Nº 084/2013 – Recuperação do calçamento da  Rua da Cidadania, cruzamento com  a Rua da Cortesia, Bairro Mutirão;\r\nPROJETO DE DECRETO LEGISLATIVO Nº 008/2013 – Concede título de cidadania honorária coelhonetense à Juíza da 2ª Vara de Coelho Neto, Dra. Karla Jeane Matos de Carvalho;\r\nINDICAÇÃO Nº 004/2014 – Banheiros químicos para a Praça Getúlio Vargas, durante o período carnavalesco;\r\nINDICAÇÃO Nº 005/2014 – Substituição de lâmpadas nos postes da Rua Castro Alves, Bairro Santana;\r\nINDICAÇÃO VERBAL(SESSÃO ORDINÁRIA 24.03.2014) – Limpeza geral das Ruas 31 de Outubro e 25 de Dezembro, Bairro Anil II;\r\nINDICAÇÃO Nº 008/2014 – Propondo ao Prefeito o encaminhamento de Projeto de Lei criando a Secretaria Municipal de Juventude ou reestruturação da Coordenação, já criada;\r\nINDICAÇÃO Nº 015/2014 – Denomina de FERNANDO ANTONIO ANDRADE DE ARAÚJO o Mercado Público Municipal e de IVONETE PEREIRA LIMA  a nova base do SAMU;\r\nINDICAÇÃO VERBAL (SESSÃO 05.06.2014 ) – Que a Secretaria de Esporte, Lazer e Turismo informasse à Câmara a programação prevista para a reforma dos estádios dos Bairros Novo Astro e Olho D ´Aguinha e Quadra de Esporte do Bairro Anil (próximo à APAE);\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 28.08.2015 ) – Serviço de calçamento na Rua das Virtudes;\r\nOfício à gerente do Banco do Brasil local, pedindo posicionamento a respeito da falta de dinheiro nos caixas eletrônicos nos finais de semana;\r\nINDICAÇÕES VERBAIS (SESSÃO ORDINÁRIA 13.10.14) – Melhoria da eletrificação e instalação de postes na Rua da Ecologia, Bairro Mutirão, próximo à Escola Moacyr Bacelar; Limpeza dos bueiros, principalmente o que fica localizado no início da Rua das Virtudes;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 05.03.15) – Reposição de lâmpadas nos povoados Pimenteiras, Curupati, Mulatas e Santo Inácio;\r\nINDICAÇÃO nº 002/15- Reposição de lâmpadas nos postes e limpeza da Rua Deusadete Barros, assim como no cruzamento das Ruas Castro Alves e São Raimundo, Bairro Santana;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 26.03.15) – Limpeza  da Rua São Braz, Bairro Subestação;\r\nINDICAÇÕES VERBAIS – (SESSÃO ORDINÁRIA 06.04.15) – Patrolamento da Rua I, Bairro Sarney; Instalação de bueiros na Rua E, Bairro Sarney;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 16.04.2015) – Reposição de lâmpadas na Pimenteiras;\r\nINDICAÇÃO Nº 007/2015 – Serviço de capina na Rua Demétria de Sousa, Bairro Anil II; Limpeza do calçadão do Bairro Anil II; Serviço de tapa-buracos no acesso Coelho Neto a Pimenteiras;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 14.05.15) – Bebedouro para a Quadra de Esporte Uiran Sousa e pedido de informação sobre reforma do Estádio Gonzalão;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 19.05.2015) – Patrolamento da Rua da Democracia; Revitalização do campo do Conjunto Novo Tempo;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 08.06.2015) – Aquisição de Equipamentos de Proteção Individual para os garis de Coelho Neto; Iluminação pública no povoado São José dos Teles;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 08.06.2015) – Realização de treinamento  para os garis, com o objetivo de aprenderem a manusear o lixo e o uso dos equipamentos de segurança;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 11.06.2015) – Mutirão de limpeza no Bairro Anil II, com capina e desobstrução das sarjetas;\r\nREQUERIMENTO Nº 004/2015 – Recuperação da MA-034, trecho Coelho Neto ao Descanso;\r\nINDICAÇÃO Nº 009/2015 – Recuperação da Rua Pau Brasil, Parque Amazonas;\r\nINDICAÇÕES VERBAIS (SESSÃO 10.08.2015) – Iluminação pública povoado São José dos Teles; Limpeza da Rua Deusadete Barros;\r\nINDICAÇÃO VERBAL (SESSÃO 06.08.2015) – Limpeza do Cemitério do Itapirema;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 13.08.2015) – Patrolamento das Ruas Eliza Lopes e Francisco de Assis Medeiros, Bairro Novo Astro;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 1º.10.2015) – Reativação do chafariz da Praça João Santos;\r\nINDICAÇÃO Nº 015/2015 – Construção de rampas de acessibilidade para pessoas portadoras de deficiência ou mobilidade reduzida em todas as praças públicas e nas calçadas da Av. Dr. Afonso Bacelar, conforme Lei 10.098/2000;\r\nINDICAÇÃO VERBAL (Sessão Ordinária 1º.12.2015) – Iluminação pública do povoado Santa Maria;\r\nINDICAÇÃO Nº 004/2016 – Serviço de capina na Praça Tonico Couto; Serviço de limpeza em toda a extensão da Rua das Virtudes; \r\nINDICAÇÃO VERBAL (Sessão Ordinária 18.02.16) – Capina urgente na Praça Tonico Couto e Farol da Educação;\r\nINDICAÇÃO VERBAL (Sessão Ordinária 17.03.2016) – Sejam tomadas providências para a Quadra de Esportes Uiran Sousa: redes para as traves, reposição de lâmpadas, bebedouros e retirada de goteiras;\r\nINDICAÇÃO VERBAL (Sessão Ordinária 07.04.2016) – Serviço de capina na praça do Bairro Bela Vista e canteiro central da Av. José Silva; \r\nINDICAÇÃO VERBAL (Sessão Ordinária 25.04.2016) – Pedido da planilha de serviços da CITLUZ, que realiza serviços de iluminação pública;\r\nINDICAÇÃO VERBAL (Sessão Ordinária 28.03.2016) – Que a Secretaria de Infraestrutura encaminhasse a esta Casa um cronograma de limpeza das galerias e reposição de lâmpada na Av. José Silva;\r\nINDICAÇÃO VERBAL (Sessão Ordinária 12.05.2016) :\r\n01.	Realização de uma campanha enfática contra o mosquito aedes aegypti;\r\n02.	Realização de visita ao Hospital Municipal e Postos de saúde para verificação das condições de funcionamento.\r\n', 'junior_santos2.jpg', 'N', '2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020', 'juniorsantos_rtc@hotmail.com', '(98)3473-1262', '39873545', 'www.vereadorjuuniorsantos.com.br', 'Rua Capitão Antonio Bastos, SN, Duartão', 'Coelho Neto (MA)', '65620-000'),
(7, 'N', 'REGINALDO JANSE', 8, 'De origem cigana, Reginaldo Janse nasceu no dia 13 de novembro de 1975, na cidade de Codó-MA. Filho de Raimundo Nonato Benício Janse e Neuza da Silva. Logo após seu nascimento a família mudou-se para Aldeias Altas-MA, onde foi registrado. Lá viveu a adolescência e estudou na Escola Teófilo Dias até a 8ª série, onde, desde cedo demonstrou espírito de liderança e firmeza de ideais. É casado e tem dois filhos do primeiro casamento: Tainá e Renê.\r\nDepois de algum tempo mudou-se com seus pais para a localidade Crioli,  interior de Aldeias Altas e trabalhou como arrendatário da referida propriedade dos 20 aos 25 anos. Essa experiência lhe deu grande suporte para se tornar empreendedor. Aos 25 anos de idade mudou-se para Codó-MA, lá permanecendo por um período de dois anos.\r\nJá trabalhou como mototaxista, cobrador de lojas, mas sempre alimentando a esperança de ter seu próprio negócio. E sem desviar-se dessa expectativa veio embora para Coelho Neto no dia 24 de março de 2005, onde cresceu bastante, tornando-se produtor rural e vereador para o mandato de 2013 a 2016. \r\nEssa é a história de quem nasceu e cresceu no seio de uma família honrada, que lhe ensinou a ser um homem de bem, decidido, sincero, firme nas convicções e até hoje continua sua trajetória com o coração puro e pleno da fé que tem em Deus. \r\nComo Vereador, posiciona-se com a firmeza de caráter que sempre lhe foi peculiar, defendendo as causas sociais com responsabilidade e compromisso, fazendo, portanto, jus aos votos recebidos para bem representar o povo de Coelho Neto. É Presidente da Comissão de Obras, Educação, Saúde e Assistência e Vice-Presidente da Comissão de Finanças do Poder Legislativo Municipal.\r\nÉ Corregedor da Câmara Municipal, função da mais alta responsabilidade, que entre outras competências, zela pelo Código de Ética e Decoro Parlamentar.\r\nA seguir, o registro de algumas das proposições que apresentou na Câmara de Vereadores:\r\nINDICAÇÃO Nº 013/2013, que solicita a construção de banheiros públicos na Praça do Balão e Mercado Público;\r\nINDICAÇÃO VERBAL (Sessão Ordinária do dia 18.02.2013), propõe limpeza e melhoria da galeria localizada em frente ao comércio do Sr. Deusdete Ferreira, na Feirinha;\r\nINDICAÇÃO Nº 021/2013, que solicita serviços de melhoria na estrutura da galeria no Bairro Bonsucesso;\r\nINDICAÇÃO Nº 027/2013, que propõe a organização da numeração das residências da Rua G, Bairro Sarney;\r\nINDICAÇÃO Nº 052/2013, que solicita a construção de um Posto de Saúde no Povoado Olho D’Água do Zaca;\r\nINDICAÇÃO Nº 063/2013, que propõe doação de uma área para construção de um Parque de Vaquejada;\r\nINDICAÇÃO Nº 086/2013, que solicita substituição dos postes de madeira por postes de concreto no Povoado Taboca dos Leitões;\r\nINDICAÇÃO VERBAL (Sessão Ordinária do dia 13.10.2014), que solicita patrolamento da estrada do Povoado da Santa Maria ao Cocal, pois os moradores ainda não foram contemplados com esse serviço, e também a reconstrução da ponte do referido Povoado;\r\nINDICAÇÃO VERBAL (Sessão Ordinária do dia 22.06.2015), que propõe a construção do Matadouro Público Municipal, a fim de oferecer melhores condições para o abatimento de animais.\r\nINDICAÇÃO VERBAL (Sessão Ordinária do dia 10.08.2015), que solicita a recuperação da estrada vicinal do Povoado São Pedro, que está intrafegável e também precisando de lâmpadas nos postes;\r\nINDICAÇÃO VERBAL (Sessão Ordinária do dia 29.03.2016), que solicita reposição de lâmpadas na Travessa Duque de Caxias e Rua Projetada.\r\n', 'reginaldo_janse.jpg', 'n', '2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'A', 'RAFAEL OLIVEIRA CRUZ', 8, 'Rafael Oliveira Cruz, conhecido somente como Rafael Cruz, nasceu aos 26 dias do mês de julho do ano de 1990, na cidade de Coelho Neto - MA. Filho de Antonio de Sousa Cruz, ex-vereador, ex-prefeito de Coelho Neto, e de Pastora Oliveira Cruz, professora da rede estadual de ensino. Tem dois irmãos: Bruno Cruz e Ana Luiza Cruz. Também é pai de dois filhos (João Davi e Danilo José). Iniciou seus estudos na Escola Chapeuzinho Vermelho, transferindo-se depois para a Escola Maria Regueira dos Santos, onde estudou até a 3ª série do Ensino Fundamental.\r\nEm 2001 foi morar em Teresina com seu irmão Bruno Oliveira Cruz, que é 6 anos mais velho. Desde então teve que aprender a se virar muito cedo, pois os pais moravam em Coelho Neto, onde trabalhavam para mantê-lo em boas escolas e tentar garantir-lhe um futuro melhor. Essa experiência lhe ensinou a ter autonomia pessoal e a ser um jovem determinado e destemido diante das dificuldades. \r\nRafael estudou na capital do Piauí até terminar o Ensino Médio em 2008, não dando, assim, continuidade aos estudos, pois tinha que voltar para Coelho Neto, a fim de trabalhar e buscar melhorar de vida, retornando a Teresina apenas no ano de 2015, quando resolveu iniciar sua vida acadêmica no curso de Direito. \r\nA primeira forma de trabalho que Rafael encontrou no retorno para Coelho Neto foi numa caçamba de seu pai, prestando serviço na empresa ITAJUBARA. Daí começou a se sustentar como motorista por quase um ano. \r\nDesde muito novo sempre demonstrou o afã de lutar por um trabalho digno e assim, ganhar a vida com seu próprio suor. Findado o contrato com a empresa Itajubara, Rafael se viu mais uma vez sem ter como trabalhar. Foi quando seu irmão, Bruno, lhe propôs sociedade numa distribuidora de bebidas. Para poder investir nesse novo negócio vendeu a caçamba, começando então uma vida empresarial. Como sempre muito participativo tinha o papel de vendedor, entregador e cobrador da empresa, dividindo tarefas com o irmão mais velho. Nesse período, Rafael fez muitas amizades por toda a cidade, coisa rara por ter morado muitos anos em Teresina.\r\nDesde muito novo não teve uma infância regada a brincadeiras com colegas e amigos. Sua maior diversão era acompanhar o pai nas caminhadas políticas e reuniões partidárias. Assim, já se delineava nesse decidido e aguerrido jovem uma aptidão especial para a política, o que se confirmou quando pediu ajuda ao pai para que pudesse se candidatar ao cargo de vereador na cidade vizinha de Duque Bacelar. Mas foi aconselhado a desistir, mesmo com a candidatura registrada, para que futuramente viesse a ser candidato em Coelho Neto, terra onde nasceu.  \r\nEm meio a tudo isso Rafael nunca se afastou da política, sua maior motivação, como ele mesmo diz. A prova contundente foi sua participação ativa no processo político das eleições de 2010 para deputados estaduais, federais, senadores, governadores e presidente. Nessa época, com apenas 20 anos de idade atuou coordenador de campanha no comitê montado pelo seu pai Cruz, que sempre se destacou como um dos maiores líderes políticos de Coelho Neto. \r\nRespaldado nos conselhos do pai, no intuito primeiro de lutar pela melhoria da qualidade de vida de sua gente, realizou o sonho de se candidatar a Vereador nas eleições de 2012. Com o apoio da maioria dos familiares e amigos, numa campanha difícil, sem recursos, amparado pela vontade popular, faltando dois meses para completar seus 22 anos, Rafael Cruz foi eleito, no dia 05 de outubro, pelo Partido Progressista (PP), com 450 votos, o vereador mais jovem da história de Coelho Neto, iniciando assim, uma nova fase da sua vida, e finalmente fazendo o que realmente sempre sonhou.\r\nDe atuação parlamentar sempre muito ativa, presente nas comunidades, Rafael vai cumprindo, na íntegra, seu dever de representante popular, buscando a cada dia o melhor para a sociedade. É bastante presente em seu gabinete e nas sessões, estando, portanto, sempre a par das situações mais difíceis, para que possa resolvê-las in loco, com a brevidade necessária, junto aos órgãos competentes. \r\nApós dois anos de mandato, Rafael conquistou a confiança do povo e do seu grupo político. Assim, no ano de 2015, conquistou a vaga de 1º Secretário da Mesa Diretora da Câmara, cargo de extrema confiança do Poder Legislativo.  Foi Vice-Presidente da Comissão de Obras, Educação, Saúde e Assistência da Câmara Municipal nos biênios 2011/2012 e 2013/2014.\r\nPassou a integrar o Partido do Movimento Democrático Brasileiro (PMDB) no ano de 2016, contando sempre com o apoio da companheira Lilyan Naryele, do pai, que coordena seus trabalhos,  dos demais membros da família, dos seus aliados, recebendo de todos o suporte necessário para cumprir sua trajetória de homem público, sério e compromissado com a justiça social. Conta, notadamente, com o povo, que lhe deu a oportunidade de ocupar uma cadeira no Legislativo Municipal e de quem recebe a cada dia o estímulo necessário para construir uma nova candidatura para as eleições deste ano de 2016.\r\nDas várias indicações que Rafael já deu entrada na Câmara Municipal, a maioria delas foi atendida pelo Executivo. Por isso, se diz satisfeito com o trabalho que vem fazendo em sua cidade. \r\nRegistre-se algumas das proposições apresentadas no parlamento municipal: \r\n\r\n•	INDICAÇÃO Nº 003/2013 – Solicita da Secretaria de Infraestrutura a desobstrução do aterro sanitário, uma vez que não oferece mais condições para o descarregamento do lixo;\r\n\r\n•	INDICAÇÃO VERBAL (Sessão Ordinária do dia 28.01.13) - Reposição da bomba do poço que abastece o Bairro Anil II, pois os moradores estão enfrentando sérios transtornos com a falta de água encanada, em decorrência da queima da bomba;\r\n\r\n•	INDICAÇAO Nº 009/2013, propõe que sejam tomadas providências urgentes para a Rua Manoel Olímpio, Bairro Morada dos Astros, a saber:\r\na)	Pavimentação, incluindo a construção de um bueiro ou pontilhão;\r\nb)	Reparos na iluminação pública;\r\n\r\n•	INDICAÇAO Nº 011/2013, que sejam tomadas providências urgentes para a reforma do Posto de Saúde do Povoado Santa Maria;\r\n\r\n•	INDICAÇAO Nº 020/2013, propõe abertura com trator das Ruas Pedro Vaz e Benedito Machado, permitindo, assim, o acesso da Rua Getúlio para a Rua Doraci Paixão e vice-versa, no Bairro Quiabos. E ainda, que as Ruas sejam incluídas no projeto de calçamento;\r\n\r\n•	 INDICAÇAO Nº 022/2013, que solicita a reforma do mercado público municipal, hoje conhecido como shopping, situado na Avenida Marechal Cordeiro de Farias;\r\n\r\n•	INDICAÇAO Nº 044/2013, que solicita a construção de um posto de saúde no povoado Santana Velha;\r\n\r\n•	INDICAÇAO Nº 054/2013, propõe que seja incluída no programa municipal de abertura e recuperação de estradas, a estrada vicinal que liga o povoado Santana Velha ao povoado Salobro, com uma extensão de 04(quatro) quilômetros, passando pelos povoados Pentieiro e Rodagem, com benefícios diretos para 20(vinte) famílias;\r\n\r\n•	INDICAÇAO Nº 056/2013, solicita que o povoado São Domingos seja incluído no roteiro do transporte escolar;\r\n\r\n•	INDICAÇAO Nº 061/2013 - propõe urgentes providências no sentido de realizar serviço de patrolamento na Rua Pau Brasil, Bairro Parque Amazonas; Inclusão da referida Rua em projeto de calçamento que venha ser executado no município.\r\n\r\n•	INDICAÇAO Nº 067/2013 – solicita rede de distribuição de água com as respectivas ligações domiciliares, em todas as unidades habitacionais do povoado Mulatas;\r\n\r\n•	INDICAÇAO Nº 071/2013 - construção de um poço no povoado São Domingos;\r\n\r\n•	INDICAÇAO Nº 075/2013, que seja restabelecida a iluminação pública do Povoado Mulatas;\r\n\r\n•	INDICAÇAO Nº 087/2013, propõe que seja implantado 01(um) sistema de abastecimento de água com poço artesiano, reservatório de distribuição, com as respectivas ligações domiciliares, no povoado Porto das Matas, neste Município;\r\n\r\n•	MOÇAO DE PESAR Nº 002/2014, pelo falecimento do saudoso FERNANDO ANTONIO ANDRADE DE ARAÚJO, filho do Sr. Severino Pereira de Andrade e Sra. Marlene Andrade de Araújo, ocorrido dia 07 de março de 2014;\r\n\r\n•	INDICAÇAO VERBAL (Sessão Ordinária do dia 24.04.2014), que solicita a construção de um campo de futebol no povoado São Pedro, com a infraestrutura necessária, para atender também as crianças das localidades vizinhas. \r\n\r\n•	INDICAÇAO Nº 005/2015 – Instalação de 01(uma), uma caixa d’água, com as respectivas ligações domiciliares, no povoado Deserto, neste município;\r\n\r\n•	INDICAÇAO VERBAL (Sessão Ordinária do dia 28 de abril de 2015 - Iluminação pública urgente no povoado Olha D’Água Grande;\r\n\r\n•	INDICAÇAO 008/2015 – Implantação de um sistema de abastecimento de água com poço artesiano, reservatório de distribuição, com as respectivas ligações domiciliares no povoado São Domingos do Balduíno;\r\n\r\n•	INDICAÇAO 016/2015 - Reposição urgente de lâmpadas no povoado Santo Inácio;\r\n\r\n•	INDICAÇAO VERBAL (Sessão Ordinária do dia 16.05.2016) - Limpeza da estrada Cafundó, tendo em vista as más condições de trafegabilidade;\r\n\r\n•	INDICAÇAO 086/2015 - Reposição da caixa d’água do Povoado Mulatas, pois os moradores ainda estão aguardando; Instalação de caixa d’água no Povoado Deserto, tendo em vista já ter sido instalado o sistema de distribuição de canos e torneiras nas casas, e só falta a caixa d’água para ser concluído o sistema;\r\n\r\n•	INDICAÇÃO VERBAL (Sessão Ordinária do dia 12.05.2016), solicita limpeza da estrada Cafundó;\r\n\r\n•	Indicação nº 010/2016 (Sessão Ordinária 30.05.2016) – Revitalização completa da estrada da estrada do povoado Clemente;\r\n\r\n•	Pedido de congratulações ao novo Secretário Municipal de Esporte, Lazer e Turismo, Sr. Maciel Santos.  \r\n', 'Rafael_cruz1.jpg', 'S', '2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020', 'rafaelcruz@coelhoneto.ma.leg.br', '09890', '096799089687', '', 'Rua 13 de maio', 'Coelho Neto (MA)', '65620-000');
INSERT INTO `xon_vereador` (`id`, `status`, `nome`, `id_partido`, `biografia`, `imagem`, `lideranca_partido`, `legislatura`, `email`, `telefone_fixo`, `celular`, `site`, `logradouro`, `cidade`, `cep`) VALUES
(9, 'A', 'SILAS ALEXANDRE CARDOSO RODRIGUES', 8, 'Sillas Alexandre Cardoso Rodrigues nasceu em Coelho Neto-MA, no dia 22 de Fevereiro de 1990. É filho de Raimundo Nonato Rodrigues Filho (Louro) e de Hélia Maria Mesquita Cardoso.\r\nPassou a maior parte da infância com seus avós e tios. O avô era cabeleireiro e sempre o levava para visitar os parentes de sua família Cardoso no interior, onde adorava desfrutar dos encantos da natureza e das brincadeiras criativas com os amigos que conquistou ao longo tempo. Teve realmente uma infância feliz, e lembra com carinho do grande apego que tinha com sua avó e o quanto gostava de estar ao lado dela, ouvindo palavras de afeto e conselhos que até hoje segue. \r\nSua mãe e seus tios Hélio e Heliano trabalhavam na Itapagé e sempre o apoiaram e o guiaram no caminho do bem.  Seu pai, conhecido como Louro, bom pai de família, homem trabalhador, tornou-se um dos maiores empresários de Coelho Neto, lhe servindo de exemplo para que mais tarde também trilhasse o caminho do empreendedorismo. \r\nCursou até a 7ª série na Escola Maria Regueira dos Santos, concluindo os estudos nas escolas Santa Úrsula, Sarney e CEM, onde conheceu vários alunos da Zona Rural  e constantemente se comovia com as dificuldades enfrentadas por esses colegas de turma. Nesse período fez amigos e aprendeu que através dos estudos conquista-se muitas vitórias na vida.\r\nDesde a adolescência ajudava no crescimento das empresas do seu pai, começando a trabalhar aos 14 anos como entregador de gás. Logo depois, aos 15 anos, passou a dirigir caminhões no setor de entrega da loja de material de construção da família. Aos 17 anos, já tendo concluído o Ensino Médio e percebendo que só através dos estudos poderia ter sua tão sonhada realização pessoal, foi aprovado em Administração de Empresas, Engenharia de Produção e também Direito. Mas decidiu cursar Administração em Teresina, no período  de 2007 a 2011.  Depois da formatura fez curso de inglês durante seis meses. Mas como era grande a saudade da sua querida terra e de sua família resolveu voltar de vez para Coelho Neto.\r\n\r\nMuito apreciador e amante do esporte, participou de várias competições do RALLY PIOCERÁ, sempre representando sua cidade com muito orgulho.\r\nLogo que retornou para Coelho Neto em junho de 2011, foi bem recebido pelos vários amigos que conquistou durante os tempos de escola  e viu que aqui era seu lugar e que aqui poderia, de alguma forma, contribuir para o desenvolvimento do Município  e para a melhoria da qualidade de vida população. Foi aí que abraçou com coragem e otimismo o desafio que se propôs em conseguir uma vaga na Câmara de Vereadores. Colocou sua juventude, suas ideias e seu espírito solidário a serviço da causa popular. Percebeu que através da sua luta e dos seus conhecimentos poderia ajudar sua terra. Com o apoio do pai, dos amigos e do eleitorado que conquistou, elegeu-se Vereador para o mandato de 2013 a 2016, com 620 votos, consagrando-se então como o primeiro político da família, tanto do lado do pai quanto da mãe. \r\nNa sua atuação parlamentar foi sempre ardoroso defensor de uma sociedade mais igualitária, com a geração de emprego e renda, e de um Município mais próspero.  Fez parte da Comissão de Legislação e Justiça da Câmara Municipal(biênio 2013/2014). Em 2014 foi eleito pelos colegas vereadores o 2º Vice-Presidente para o biênio 2015/2016.\r\n Continuando a acreditar que a aquisição do conhecimento é fundamental para uma plena realização pessoal, em 2015 fez pós-graduação em Gestão Pessoal e Empresarial na faculdade UNICEUMA, em São Luís-MA.\r\nRegistre-se algumas das proposições apresentadas nas sessões da Câmara Municipal:\r\nINDICAÇÃO Nº 062/2013 – Construção de uma praça no Bairro Quiabos – na divisa da Av. Carlos Freire, com as Ruas Maria Inês e Paulo Machado;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 16.09.2013) – Recuperação do calçamento da Rua São José;\r\nINDICAÇÃO VERBAL(SESSÃO ORDINÁRIA 24.03.2014) – Recuperação do calçamento da Rua José Alves de Sousa;\r\nINDICAÇÕES VERBAIS (SESSÃO ORDINÁRIA 07.04.2014) – Recuperação da Rua Presidente Médici; Recuperação da Rua Reginaldo R. Nascimento, que termina na Rua Presidente Costa e Silva; Grade de proteção na galeria da Rua 14 de Abril, próximo ao Sindicato dos Trabalhadores Rurais;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 29.05.2014) – Pavimentação da Rua C, Bairro Sarney;\r\nINDICAÇÕES VERBAIS (SESSÃO ORDINÁRIA 11.05.2015) – Tampa para os bueiros da Rua Afonso Bacelar e 14 de Abril; Recuperação urgente da Rua Santa Maria; Recuperação dos redutores de velocidade na Rua Juscelino Kubistchek, no trecho próximo à Assembleia de Deus; Iluminação pública da Rua Estevão de Morais.\r\n', 'silas_alexandre1.jpg', NULL, '2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020', '', '0987659', '', '', '', '', ''),
(10, 'A', 'LUIS RAMOS DA SILVA', 9, 'Luiz Ramos da Silva nasceu no povoado Mata-Pasto, neste Município, no dia 09 de março de 1973. Filho de Otávio José Gaspar e Maria Ramos da Silva, Luiz Ramos foi sempre, durante toda sua vida, uma pessoa determinada, otimista, que nunca temeu os desafios que a vida lhe impôs.\r\nVeio morar na sede do Município em 1980. Fez a alfabetização, 1ª e 2ª séries na Escola Professor Walter Emmanoel Brito(FEC). Na Unidade Escolar Coelho Neto fez a 3ª e a 4ª séries. O ginásio, estudou na Escola José Barreto, sempre obtendo aprovação, assim como nas séries anteriores, pelo compromisso com o próprio futuro. \r\nCasou-se em 1992 com Francisca Antonia Santana, união da qual nasceram os filhos Vanessa Santana da Silva, Vanária Santana Silva e Luiz Ramos da Silva Filho. A família sempre foi seu bem maior, razão da sua vida. \r\nConcluiu o Ensino Médio na Escola Municipal José Sarney, em 1999. E como jovem estudante, inserido na sociedade do conhecimento, começou a descobrir sua veia política e sentir que poderia dar uma grande contribuição para o desenvolvimento deste Município e para a formação de uma sociedade mais justa. Foi então que em 2000, munido com as armas da esperança, do trabalho e da perseverança, candidatou-se ao cargo de vereador pelo PFL, obtendo 88 votos. \r\nSensível às causas sociais, fundou em 2002, juntamente com alguns amigos, a ONG AMIGOS SOLIDÁRIOS, através da qual tem dado sua parcela de contribuição para a melhoria da vida dos menos favorecidos.\r\nEm 2004 candidatou-se novamente a vereador. Desta vez, obteve 220 votos, pelo PPS. Mas não desistiu, porque os obstáculos, sempre os considerou como a força impulsionadora da vitória.  E a prova foi sua eleição  pelo PPS em 2008, com 632 votos. \r\nComo prova da sua competência parlamentar, do seu poder de articulação, da sua visão de futuro e da sua peculiar perseverança, conquistou novamente uma cadeira na Câmara de Vereadores em 2012, com 609 votos, pelo  PSD.\r\nÉ acadêmico do Curso Superior de Serviço Social, pela FACAM, em face de sua identificação com essa área, que tem contribuído sobremaneira para sua formação de homem público, que luta por uma sociedade mais igualitária. \r\nNo biênio 2011/2012 assumiu a Presidência da Comissão de Finanças e Orçamento da Câmara Municipal. É atualmente 1º Vice-Presidente da Mesa Diretora do Legislativo Municipal(2015/2016).\r\nFoi eleito para os seguintes cargos da Mesa Diretora da Câmara Municipal: Vice-Presidente(biênio 2009/2010); 1º Secretário(biênio 2013/2014), e Vice-Presidente (biênio 2015/2016). \r\nComo Vereador, tem sido atuante e incansável batalhador pelo bem desta terra e do seu povo, apresentando várias proposições de grande interesse popular. Considera seu projeto mais importante, o de nº 011/2011, de reciclagem do lixo urbano. Mas outras proposições que apresentou ao longo dos seus mandatos, também traduzem o anseio popular: \r\nINDICAÇÃO Nº 27/2009 – Mudança do posteamento da Rua Justino da Silva Bastos, Travessa com a Avenida Carlos Freire/ Trecho: Balão (da Feirinha até à residência do Sr. Márcio, no sentido da Escola Isabel Café, lado esquerdo e direito da referida rua, e ainda, da Av. Carlos Freire/ Trecho: Rua Maria Inês até a subida do Bairro Mutirão;\r\nINDICAÇÃO Nº 39/2009 – Otimização dos serviços de coleta de lixo, com envio à Câmara do cronograma de trabalho de coleta por setor, com os respectivos nomes dos responsáveis pelos carros;\r\nREQUERIMENTO Nº 26/2009 – Instalação de um telefone público na Escola José Estevão de Morais, povoado Pimentas;\r\nREQUERIMENTO Nº 42/2009 – Construção de um posto médico e telefone público no povoado São Pedro; \r\nINDICAÇÕES VERBAIS (SESSÃO ORDINÁRIA 24.05.2010) – Recuperação do calçamento da Rua José Barreto, Bairro Quiabos, no trecho do cruzamento da Rua Joaquina Pereira Dutra; Raspagem das Ruas Joaquina Pereira Dutra, Joana Paixão, Vicentinho, Justino da Silva Bastos, trecho da subida do Conjunto Novo Tempo, até a chegada do calçamento;\r\nINDICAÇÃO Nº 016/2011 – Melhoria do terminal rodoviário Joaquim José do Rego;\r\nPROJETO DE LEI Nº 11/2011 – Dispõe sobre a coleta seletiva e reciclagem do lixo no Município de Coelho Neto;\r\nMOÇÃO DE PESAR à família do Sr. LUIZ GONZAGA GASPAR, falecido no dia 15 de abril de 2012;\r\nMOÇÃO DE PESAR à família de CARLENE LEÃO DE OLIVEIRA, falecida em 15 de abril de 2012;\r\nREQUERIMENTO Nº 012/2013 – Pedido de esclarecimento ao Prefeito Soliney acerca da citação do nome dele na lista de prefeitos maranhenses que desviaram recursos públicos para pagamento de agiotas; \r\nREQUERIMENTO Nº 015/2013- requer providências da administração municipal, para que fizesse cumprir a lei do código de posturas no que diz respeito à proibição de animais soltos nas ruas;\r\nINDICAÇÃO VERBAL / AGOSTO 2013 – Recuperação eficiente do calçamento da Avenida Carlos Freire;\r\nREQUERIMENTO Nº 28/2013 – Construção do Matadouro Público Municipal;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 16.09.2013) – Posteamento da Avenida Carlos Freire;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 22.05.2014) – Recuperação do trecho da Rua Humberto Aranha, na passagem da galeria;\r\nPROJETO DE DECRETO Nº 004/2014- que concede título de cidadania honorária coelhonetense ao Dr. Adão da Silva Ramos;\r\nMOÇÃO DE PESAR Nº 005/2014, à família do jovem Antoniel Medeiros da Silva(Beto), que faleceu dia 29.06.2014;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 22.06.2015) – Redutores de velocidade na Rua Hermínio Lustosa, Bairro Quiabos;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 06.08.15) – Pedido para solução do problema de abastecimento de água do Bairro Novo Bonsucesso;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 06.08.15) – Iluminação pública para o Bairro NOVO BONSUCESSO;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 10.08.2015) – Desobstrução da Rua Olegário Alves, Bairro Duartão;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 06.08.2015) - 	Contratação de coveiros para o Cemitério;\r\nINDICAÇÃO Nº 010/2015 – solicitou do Prefeito doação dos lotes de terreno do Bairro Bonsucesso às pessoas que comprovadamente necessitassem construir casas próprias;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 26.10.2015) – Solução do problema da falta de água na Rua Joaquim Nunes de Carvalho, Bairro Bela Vista;\r\nMOÇÃO DE PESAR 001/2015 – pelo falecimento do saudoso Benedito de Assunção Couto, ocorrido no dia 06.03.2015;\r\nMOÇÃO DE PESAR 006/2015 – pelo falecimento da saudosa Sra. Ivanira Pinto Machado, ocorrido dia 25.10.2015;\r\nREQUERIMENTO Nº 007/2015 – Convocação do Secretário de Saúde para que prestasse esclarecimentos sobre assuntos relativos à saúde deste Município; \r\nINDICAÇÕES VERBAIS (SESSÃO ORDINÁRIA 09.11.2015) – Patrolamento das ruas que se encontravam intrafegáveis; cobrança do patrolamento da Rua São Gabriel, que dá acesso à Rua Presidente Costa e Silva; \r\nINDICAÇÕES VERBAIS (SESSÃO ORDINÁRIA 23.11.2015) – Iluminação pública nas Ruas Santa Maria e Bom Jesus; Patrolamento das Ruas do Bairro Anil II, Novo Astro e Bonsucesso; Limpeza das galerias dos bairros Quiabos, Mutirão, Novo tempo, Sarney, Santana e Bonsucesso; \r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 09.11.2015) – Cobrança para a solução do problema da água do poço do Bairro Bonsucesso;\r\nREQUERIMENTO AO PROMOTOR DE JUSTIÇA , requerendo providências para a solução do problema dos empréstimos consignados dos funcionários da Prefeitura Municipal;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 18.02.2016) – Limpeza urgente das galerias, em virtude do acúmulo de lixo n inverno;\r\nMOÇÃO DE PESAR /ABRIL/2016 – pelo falecimento do Sr. Francisco das Chagas da Rocha, Dr. Cigano, ocorrido no dia 23 de abril de 2016;\r\nINDICAÇÃO VERBAL (SESSÃO ORDINÁRIA 28.04.2016) – Patrolamento das ruas do Bairro Novo Astro.\r\n', 'luis_ramos.jpg', NULL, '2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020', '', 't098605809685', '5456565656', '', '', '', ''),
(11, 'A', 'João Paulo Gomes Diolindo', 8, '', 'joao_paulo.jpg', 'N', '', '', '0977', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `xon_agenda`
--
ALTER TABLE `xon_agenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_evento_idx` (`id_evento`);

--
-- Indexes for table `xon_atividade`
--
ALTER TABLE `xon_atividade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vereador_idx` (`ag_id_fk`);

--
-- Indexes for table `xon_banco_de_imagem`
--
ALTER TABLE `xon_banco_de_imagem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xon_cargos`
--
ALTER TABLE `xon_cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xon_evento`
--
ALTER TABLE `xon_evento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xon_frequencia`
--
ALTER TABLE `xon_frequencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_frequencia_idx` (`id_sessao`);

--
-- Indexes for table `xon_item_transparencia`
--
ALTER TABLE `xon_item_transparencia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xon_lei`
--
ALTER TABLE `xon_lei`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xon_menu`
--
ALTER TABLE `xon_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xon_mesa_diretora`
--
ALTER TABLE `xon_mesa_diretora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_xon_composicao_mesa_1_idx` (`id_vereador`);

--
-- Indexes for table `xon_noticias`
--
ALTER TABLE `xon_noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xon_partido`
--
ALTER TABLE `xon_partido`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xon_perfil`
--
ALTER TABLE `xon_perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xon_servidor_publico`
--
ALTER TABLE `xon_servidor_publico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_xon_servidor_publico_1_idx` (`id_cargo`);

--
-- Indexes for table `xon_sessao`
--
ALTER TABLE `xon_sessao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xon_tipo`
--
ALTER TABLE `xon_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xon_transparencia`
--
ALTER TABLE `xon_transparencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_xon_transparencia_2_idx` (`id_item`);

--
-- Indexes for table `xon_usuario`
--
ALTER TABLE `xon_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_perfil_idx` (`id_perfil`);

--
-- Indexes for table `xon_vereador`
--
ALTER TABLE `xon_vereador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_partido_idx` (`id_partido`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `xon_agenda`
--
ALTER TABLE `xon_agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `xon_atividade`
--
ALTER TABLE `xon_atividade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `xon_banco_de_imagem`
--
ALTER TABLE `xon_banco_de_imagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `xon_cargos`
--
ALTER TABLE `xon_cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `xon_evento`
--
ALTER TABLE `xon_evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `xon_frequencia`
--
ALTER TABLE `xon_frequencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `xon_item_transparencia`
--
ALTER TABLE `xon_item_transparencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `xon_lei`
--
ALTER TABLE `xon_lei`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `xon_menu`
--
ALTER TABLE `xon_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `xon_mesa_diretora`
--
ALTER TABLE `xon_mesa_diretora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `xon_noticias`
--
ALTER TABLE `xon_noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `xon_partido`
--
ALTER TABLE `xon_partido`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `xon_perfil`
--
ALTER TABLE `xon_perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `xon_servidor_publico`
--
ALTER TABLE `xon_servidor_publico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `xon_sessao`
--
ALTER TABLE `xon_sessao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `xon_tipo`
--
ALTER TABLE `xon_tipo`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `xon_transparencia`
--
ALTER TABLE `xon_transparencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `xon_usuario`
--
ALTER TABLE `xon_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `xon_vereador`
--
ALTER TABLE `xon_vereador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `xon_agenda`
--
ALTER TABLE `xon_agenda`
  ADD CONSTRAINT `fk_evento` FOREIGN KEY (`id_evento`) REFERENCES `xon_evento` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `xon_atividade`
--
ALTER TABLE `xon_atividade`
  ADD CONSTRAINT `fk_vereador` FOREIGN KEY (`ag_id_fk`) REFERENCES `xon_agenda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `xon_frequencia`
--
ALTER TABLE `xon_frequencia`
  ADD CONSTRAINT `fk_frequencia` FOREIGN KEY (`id_sessao`) REFERENCES `xon_sessao` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `xon_mesa_diretora`
--
ALTER TABLE `xon_mesa_diretora`
  ADD CONSTRAINT `fk_xon_composicao_mesa_1` FOREIGN KEY (`id_vereador`) REFERENCES `xon_vereador` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `xon_servidor_publico`
--
ALTER TABLE `xon_servidor_publico`
  ADD CONSTRAINT `fk_xon_servidor_publico_1` FOREIGN KEY (`id_cargo`) REFERENCES `xon_cargos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `xon_transparencia`
--
ALTER TABLE `xon_transparencia`
  ADD CONSTRAINT `fk_xon_transparencia_2` FOREIGN KEY (`id_item`) REFERENCES `xon_item_transparencia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `xon_usuario`
--
ALTER TABLE `xon_usuario`
  ADD CONSTRAINT `fk_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `xon_perfil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `xon_vereador`
--
ALTER TABLE `xon_vereador`
  ADD CONSTRAINT `fk_partido` FOREIGN KEY (`id_partido`) REFERENCES `xon_partido` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
--
-- Database: `opn_pop`
--
CREATE DATABASE IF NOT EXISTS `opn_pop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `opn_pop`;

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
  `senha` varchar(45) DEFAULT NULL,
  `id_plano` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `liberacao` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `opn_questionario`
--

CREATE TABLE `opn_questionario` (
  `id` int(11) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `texto` tinytext,
  `id_enquete` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `opn_tema`
--

CREATE TABLE `opn_tema` (
  `id` int(11) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `nome` varchar(145) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `opn_tipo`
--

CREATE TABLE `opn_tipo` (
  `id` int(11) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `opn_votante`
--

CREATE TABLE `opn_votante` (
  `id` int(11) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  `fone` varchar(11) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `sessao_code` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `opn_enquete`
--
ALTER TABLE `opn_enquete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `opn_plano`
--
ALTER TABLE `opn_plano`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `opn_questionario`
--
ALTER TABLE `opn_questionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `opn_tema`
--
ALTER TABLE `opn_tema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `opn_tipo`
--
ALTER TABLE `opn_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `opn_votacao`
--
ALTER TABLE `opn_votacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `opn_votante`
--
ALTER TABLE `opn_votante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
