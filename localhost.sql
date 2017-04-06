-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 04-Abr-2017 às 16:10
-- Versão do servidor: 10.0.29-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda`
--
CREATE DATABASE IF NOT EXISTS `agenda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `agenda`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `appointment`
--

CREATE TABLE `appointment` (
  `id_appointment` int(11) UNSIGNED NOT NULL,
  `descrition` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `medicoresponsavel` varchar(250) DEFAULT NULL,
  `medicamento` varchar(250) DEFAULT NULL,
  `observacaodehoje` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id`, `idcliente`, `medicoresponsavel`, `medicamento`, `observacaodehoje`) VALUES
(1, 1, 'Joanna B', 'Calminex', 'Não gosta do remédio.'),
(2, 2, 'Meiriane Wit', 'Alongamentos', 'Dores na coluna'),
(3, 3, 'Jose Med', 'Gel para as pernas', 'Reclama de tudo'),
(4, 4, '', '', ''),
(5, 5, 'Pedro Fol', 'Losartana', 'Problema cardíacos e diabetes'),
(6, 4, 'Pedro Fol', 'Losartana', 'diabetes e obesidade'),
(7, 6, 'Pedro Fol', 'Pó mágico', 'Acha que é fada'),
(8, 7, 'Pedro Fol', 'Bola mágica', 'Acha que é médico'),
(9, 8, 'Joana B', 'Papinhas', 'bebe muito fofa'),
(10, 9, 'Joana B', 'Bolinhas massagem', 'Risonha'),
(11, 10, 'Meiriane Wit', 'Aspirina', 'Gosta de balas'),
(12, 11, 'Meiriane Wit', 'Analgésicos', 'Alongamentos '),
(13, 12, 'Pedro Fol', 'nenhum', 'exercícios no barrel'),
(14, 13, 'Pedro Fol', 'Nenhum', 'Barrel'),
(15, 14, 'Meiriane Wit', 'Pomadas', 'Alogamentos e reforço'),
(16, 15, 'Joana B', 'Loratadina', 'Problemas com a fala'),
(17, 16, 'Joana B', 'Losartana', 'Pressão alta'),
(18, 17, 'Joana B', 'Ervas', 'acredita em ervas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `idade` int(11) NOT NULL,
  `endereco` varchar(250) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `sexo` varchar(250) DEFAULT NULL,
  `planosaude` varchar(250) DEFAULT NULL,
  `telefone` varchar(250) DEFAULT NULL,
  `responsavel` varchar(250) DEFAULT NULL,
  `especialidade` varchar(250) DEFAULT NULL,
  `datainiciotratamento` date DEFAULT NULL,
  `datadaavaliacao` date DEFAULT NULL,
  `medicoresponsavel` varchar(250) DEFAULT NULL,
  `qtdesessoesrealizadas` int(11) DEFAULT NULL,
  `atualizadoem` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `idade`, `endereco`, `datanascimento`, `sexo`, `planosaude`, `telefone`, `responsavel`, `especialidade`, `datainiciotratamento`, `datadaavaliacao`, `medicoresponsavel`, `qtdesessoesrealizadas`, `atualizadoem`) VALUES
(1, 'Ana Maria Bras', 6, 'Ruas das Amoras, 123', '2010-03-02', 'Feminino', 'SUS', '(42)3623-1234 ', 'José Maria Bras', 'Ortopedia', '2016-10-10', '2016-10-10', '', 10, '2016-11-15 14:29:06'),
(2, 'Jose Maria Bras', 36, 'Rua da Amoras', '1980-02-02', 'Masculino', 'SUS', '(42)3623-1234 ', 'Jose Maria Bras', 'Pilates', '2010-02-02', '2010-02-02', '', 100, '2016-11-15 14:30:46'),
(3, 'Joaquina Suarinha', 56, 'Rua das Lindas Flores, 23', '1960-10-10', 'Feminino', 'UNIMED', '(42)3623-5678 ', 'Joania Saurinha Filha', 'Ortopedia', '2015-05-01', '2015-05-01', '', 18, '2016-11-15 14:33:58'),
(4, 'Bet Boop', 76, 'Rua dos Cartoes, 57', '1940-01-01', 'Feminino', 'UNIMED', '(42)3623-5678 ', 'Betina Boop Neta', 'Neurologia', '1990-03-01', '1990-03-01', '', 100, '2016-11-15 14:35:59'),
(5, 'José Medo', 96, 'Rua dos Lindos, 98', '1920-03-01', 'Masculino', 'UNIMED', '(11)9912-2912 ', 'Josefina Medo Filha', 'Outros', '2010-02-01', '2010-03-01', '', 50, '2016-11-15 14:39:31'),
(6, 'Maria Alice das Fadas', 10, 'Rua dos contos s/n', '2006-10-10', 'Feminino', 'SUSINHA', '(42)3456-7899 ', 'Sabrina Alice das Fadas', 'Neurologia', '2015-01-01', '2015-01-02', '', 10, '2016-11-15 14:53:21'),
(7, 'Joao Sem Pé De Feijão', 22, 'Rua dos contos s/n', '1994-10-10', 'Masculino', 'Era uma vez', '(42)3623-1045 ', 'José Com Pé', 'Neurologia', '2015-10-10', '2015-10-10', '', 10, '2016-11-15 14:55:15'),
(8, 'Zuleika Zuzu', 2, 'Rua das Flores', '2014-02-02', 'Feminino', 'SUS', '(42)3623-1456 ', 'Sumira Zuzu', 'Outros', '2016-10-01', '2016-10-01', '', 10, '2016-11-15 15:13:03'),
(9, 'Belina B', 1, 'Rua das Nações', '2015-02-02', 'Feminino', 'Unimed', '(42)3623-1456 ', 'Beto B', 'Ortopedia', '2016-10-10', '2016-10-10', '', 10, '2016-11-15 15:14:18'),
(10, 'Carla Miriam Janeiro', 1, 'Rua das Carlas, 34', '2015-10-10', 'Feminino', 'UNIMED', '(42)3456-7890 ', 'Miriam Jan', 'Ortopedia', '2016-10-10', '2016-10-10', '', 10, '2016-11-15 15:18:33'),
(11, 'Danilo Dan Dan', 110, 'Rua das profissões, 3456', '1906-01-02', 'Masculino', 'UNIMAIS', '(43)9978-6758 ', 'Daniel Dan Neto', 'Pilates', '2010-04-03', '2010-04-03', '', 1000, '2016-11-15 15:21:03'),
(12, 'Emerson Professor', 20, 'Rua da utf', '1996-10-10', 'Masculino', 'UNIMDE', '(42)1234-5678 ', 'Emerson Pai', 'Pilates', '2015-10-10', '2015-10-10', '', 10, '2016-11-15 15:22:39'),
(13, 'Paulo Professor', 20, 'Rua da utf 45', '1996-03-02', 'Masculino', 'Unimed', '(42)3987-8999 ', 'Paulo Pai', 'Pilates', '2014-10-10', '2014-10-10', '', 100, '2016-11-15 15:24:23'),
(14, 'Fatima Dana', 10, 'Rua das mininas, 23', '2006-03-04', 'Feminino', 'Unimed', '(42)9998-1234 ', 'Pedor Dana', 'Ortopedia', '2010-05-03', '2010-05-03', '', 30, '2016-11-15 15:26:11'),
(15, 'Guilherme Lerme', 10, 'Rua das flores, 34', '2006-04-11', 'Masculino', 'SUSINHO', '(42)9998-6748 ', 'Maria Lerme', 'Neurologia', '2015-05-10', '2015-05-10', '', 50, '2016-11-15 15:27:55'),
(16, 'Hilma Hilaria', 100, 'Rua dos felizes,000', '1916-10-10', 'Feminino', 'SUSINHA', '(42)3490-9090 ', 'Joanna Hilaria', 'Pilates', '2013-10-10', '2013-10-10', '', 100, '2016-11-15 15:29:45'),
(17, 'Choise da Silwa Saura', 50, 'Rua das Rex, 34', '1966-04-02', 'Feminino', 'UNIMENDES', '(42)9999-99999', 'Man Choise Saura', 'Ortopedia', '2014-03-01', '2014-03-01', '', 100, '2016-11-15 15:31:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `email`
--

CREATE TABLE `email` (
  `id_email` int(10) UNSIGNED NOT NULL,
  `id_person` int(11) UNSIGNED NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `email`
--

INSERT INTO `email` (`id_email`, `id_person`, `email`) VALUES
(9, 7, 'marcus@gmail.com'),
(10, 7, 'marcus@gmail.com'),
(11, 7, 'marcus@gmail.com'),
(12, 7, 'marcus@gmail.com'),
(13, 7, 'marcusv@gmail.com'),
(14, 7, 'marcusv@gmail.com'),
(15, 7, 'marcusv@gmail.com'),
(16, 7, 'marcusv@gmail.com'),
(17, 7, 'marcusv@gmail.com'),
(18, 7, 'marcusv@gmail.com'),
(19, 7, 'marcusv@gmail.com'),
(20, 7, 'marcusv@gmail.com'),
(21, 7, 'marcusv@terra.com'),
(22, 7, 'marcusv@@terra.com'),
(23, 7, 'marcusv@@terra.com'),
(24, 7, 'marcusv@@terra.com'),
(25, 7, '@terra.com'),
(26, 7, '@terra.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `idade` int(11) DEFAULT NULL,
  `endereco` varchar(60) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `planosaude` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `idade`, `endereco`, `datanascimento`, `sexo`, `planosaude`, `telefone`) VALUES
(1, 'Pedro Fol', 36, 'Rua dos fofos, 123', '1980-10-10', 'Masculino', 'UNIMED', '(42)9956-7890 '),
(2, 'Jose Med', 50, 'Rua dos Fisioterapeutas', '1960-11-10', 'Masculino', 'Espertesa', '(34)9987-6790 '),
(3, 'Meiriane Wit', 36, 'Rua das Bruxas,56', '1980-02-01', 'Feminino', 'Certeza', '(42)9978-7989 '),
(4, 'Joana B', 30, 'Rua das Joannas', '1986-02-03', 'Feminino', 'US', '(42)9945-3434 '),
(5, 'Joanna B', 36, 'Rua das Joannas', '1980-03-10', 'Feminino', 'USS', '(42)9945-3434 ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `list_appointment`
--

CREATE TABLE `list_appointment` (
  `id_person` int(11) UNSIGNED NOT NULL,
  `id_appointment` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `person`
--

CREATE TABLE `person` (
  `id_person` int(11) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `person`
--

INSERT INTO `person` (`id_person`, `name`, `birthday`) VALUES
(7, 'Marcus', '1985-12-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tel`
--

CREATE TABLE `tel` (
  `id_tel` int(10) UNSIGNED NOT NULL,
  `id_person` int(11) UNSIGNED NOT NULL,
  `number` varchar(13) NOT NULL,
  `type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id_appointment`);

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id_email`),
  ADD KEY `fk_email_pessoa` (`id_person`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_appointment`
--
ALTER TABLE `list_appointment`
  ADD PRIMARY KEY (`id_person`,`id_appointment`),
  ADD KEY `fk_compromisso_tarefa` (`id_appointment`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id_person`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `tel`
--
ALTER TABLE `tel`
  ADD PRIMARY KEY (`id_tel`),
  ADD KEY `fk_telefone_pessoa` (`id_person`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id_email` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id_person` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tel`
--
ALTER TABLE `tel`
  MODIFY `id_tel` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `email`
--
ALTER TABLE `email`
  ADD CONSTRAINT `fk_email_pessoa` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `list_appointment`
--
ALTER TABLE `list_appointment`
  ADD CONSTRAINT `fk_compromisso_pessoa` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_compromisso_tarefa` FOREIGN KEY (`id_appointment`) REFERENCES `appointment` (`id_appointment`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `tel`
--
ALTER TABLE `tel`
  ADD CONSTRAINT `fk_telefone_pessoa` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`) ON DELETE CASCADE;
--
-- Database: `eleicao`
--
CREATE DATABASE IF NOT EXISTS `eleicao` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `eleicao`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidatos`
--

CREATE TABLE `candidatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idade` int(20) NOT NULL,
  `partido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `candidatos`
--

INSERT INTO `candidatos` (`id`, `nome`, `descricao`, `idade`, `partido`) VALUES
(1, 'nomeeeee', 'dodi', 10, 'dddd'),
(2, '', 'UUUUU', 0, '0'),
(4, 'este nao', 'tem mais sol', 0, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;--
-- Database: `looproject`
--
CREATE DATABASE IF NOT EXISTS `looproject` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `looproject`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id` int(11) NOT NULL,
  `idcliente` int(100) NOT NULL,
  `medicoresponsavel` varchar(250) DEFAULT NULL,
  `medicamento` varchar(250) DEFAULT NULL,
  `testesespecificos` mediumtext,
  `observacaodehoje` mediumtext,
  `dataavaliacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avaliadopor` varchar(100) NOT NULL,
  `editadoadmin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `avaliacao`
--

INSERT INTO `avaliacao` (`id`, `idcliente`, `medicoresponsavel`, `medicamento`, `testesespecificos`, `observacaodehoje`, `dataavaliacao`, `avaliadopor`, `editadoadmin`) VALUES
(1, 1, '', '', NULL, '', '2017-01-16 19:43:09', '', NULL),
(2, 2, '', '', NULL, '', '2017-01-18 09:35:53', '', NULL),
(3, 3, 'teste', 'teste', 'teste', 'teste', '2017-01-18 13:28:09', '', NULL),
(4, 4, '', '', NULL, '', '2017-01-18 13:35:20', '', NULL),
(5, 5, '', '', NULL, '', '2017-01-18 17:57:49', '', NULL),
(6, 6, '', '', NULL, '', '2017-01-23 10:08:32', '', NULL),
(7, 7, '', '', NULL, '', '2017-01-23 15:58:08', '', NULL),
(8, 8, '-', '-', NULL, 'Encurtamento de Isquiotibiais,( +23cm)\nRefere dor na região de tensor da fascia lata E durante corrida, \nTratamento com aparelho ortodôntico por 7 anos;\nUsa plamilha postural com indicação para discrepância de membros', '2017-02-01 09:08:07', '', NULL),
(9, 9, '', '', NULL, '', '2017-02-03 16:36:29', '', NULL),
(10, 10, '', '', NULL, '', '2017-02-09 10:32:09', '', NULL),
(11, 11, '', '', NULL, '', '2017-02-09 15:12:17', '', NULL),
(12, 12, '', '', NULL, '', '2017-02-09 15:17:45', '', NULL),
(13, 13, '', '', NULL, '', '2017-02-09 16:32:54', '', NULL),
(14, 14, '', '', NULL, '', '2017-02-10 08:29:45', '', NULL),
(15, 15, '', '', NULL, '', '2017-02-10 10:28:03', '', NULL),
(16, 3, 'teste', 'teste', 'teste', 'teste', '2017-02-15 15:55:25', '', NULL),
(17, 9, 'a', 'a', 'a', 'a', '2017-02-15 20:20:44', '', NULL),
(18, 1, 'teste', 'teste', 'teste', 'teste', '2017-02-15 20:22:52', '', NULL),
(19, 4, 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', NULL, 'jjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2017-02-15 20:24:10', '', NULL),
(20, 1, 'adsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdas', 'adsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdas', 'adsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdasadsasdasdasdas', 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', '2017-02-16 15:47:26', '', NULL),
(21, 1, 'anananananana', 'anananananana', 'ananananananaananananananaanananananana', 'ananananananaananananananaanananananana', '2017-02-16 16:37:58', '', NULL),
(22, 4, 'tstestestestes', 'tstestestestes', 'tstestestestes', 'tstestestestes', '2017-02-16 16:41:07', '', NULL),
(23, 11, 'testes', 'testes', 'testes', 'testes', '2017-02-16 16:43:30', '', NULL),
(24, 11, 'amamamama', 'amamamama', 'amamamama', 'amamamama', '2017-02-16 16:51:24', '', NULL),
(25, 9, 'aaaaa', 'aaaaa', 'aaaaa', 'aaaaa', '2017-02-16 16:53:09', '', NULL),
(26, 8, 'tttt', 'ttt', 'ttt', 'ttt', '2017-02-16 17:02:37', '', NULL),
(27, 7, 'Emanuele', 'Emanuele', 'Emanuele', 'casa', '2017-02-16 17:09:56', '', NULL),
(28, 9, 'adasd', 'adsad', 'adasd', 'asdasd', '2017-02-16 17:21:30', '', NULL),
(29, 7, 'adafasteste', 'aaaaaa', 'aaaaaa', 'aaaaaa', '2017-02-16 17:24:35', '', '2017-02-17 13:46:52'),
(30, 2, 'gggggggggggggggggggg', 'gggggggggggggggggggg', 'gggggggggggggggggggg', 'gggggggggggggggggggg', '2017-02-16 17:35:11', '', NULL),
(31, 1, 'aaaaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaaaaa', 'aaaaaaaaaaaaaaa', '2017-02-16 17:36:45', '', NULL),
(32, 2, 'fdgdr', 'fdgdr', 'fdgdr', 'fdgdr', '2017-02-16 18:46:56', '', NULL),
(33, 1, 'teste', 'teste', 'testetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\n', 'testetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\ntestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetestetesteteste\n', '2017-02-16 19:35:32', '', NULL),
(34, 3, 'teste', 'atualizar fake', 'atualizar fake', 'atualizar fake', '2017-02-17 13:57:44', 'ana', NULL),
(35, 16, '', '', '', '', '2017-02-19 14:03:26', 'adm', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidatos`
--

CREATE TABLE `candidatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(100) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `idade` int(11) NOT NULL,
  `endereco` varchar(250) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `sexo` varchar(250) DEFAULT NULL,
  `planosaude` varchar(250) DEFAULT NULL,
  `telefone` varchar(250) DEFAULT NULL,
  `responsavel` varchar(250) DEFAULT NULL,
  `especialidade` varchar(250) DEFAULT NULL,
  `datainiciotratamento` date DEFAULT NULL,
  `datadaavaliacao` date DEFAULT NULL,
  `medicoresponsavel` varchar(250) DEFAULT NULL,
  `qtdesessoesrealizadas` int(11) DEFAULT NULL,
  `objetivos` varchar(250) DEFAULT NULL,
  `condutas` varchar(250) DEFAULT NULL,
  `diagnostico` varchar(250) DEFAULT NULL,
  `atualizadoem` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `idade`, `endereco`, `datanascimento`, `sexo`, `planosaude`, `telefone`, `responsavel`, `especialidade`, `datainiciotratamento`, `datadaavaliacao`, `medicoresponsavel`, `qtdesessoesrealizadas`, `objetivos`, `condutas`, `diagnostico`, `atualizadoem`) VALUES
(1, 'Ester Campos', 36, 'Rua Izidoro', '1980-11-28', 'Feminino', 'Unimed', '(42)9912-46301', 'maemaemaemaemaemae', 'Pilates', '2015-04-01', '2015-04-01', '', 0, '', '', '', '2017-01-16 19:43:08'),
(2, 'Isabela Larenzeck', 1, 'Quintino de Bocaiúva ', '2015-12-26', 'Masculino', 'UNIMED', '(42)3304-1288 ', 'MARIA ELENA', 'Outros', '2017-01-18', '2017-01-18', '', 0, '', '', '', '2017-01-18 09:35:53'),
(3, 'Eliane Fatima Pereira Fogaça', 48, 'Rua Moara  335 São Cristovão', '1968-06-07', 'Masculino', 'unimed', '(42)3624-8936 ', '', 'Ortopedia', '2017-01-13', '2017-01-13', '', 0, 'teste', 'teste', 'teste', '2017-01-18 13:28:09'),
(4, 'isis Fritz de Almeida', 0, 'Rua João tonon 305 Vila Bela', '2016-06-18', 'Feminino', 'unimed', '(42)9933-3416 ', 'Pai Jeferson', 'Neurologia', '2017-01-16', '2017-01-16', '', 0, '', '', '', '2017-01-18 13:35:20'),
(5, 'Piettro Ribas', 0, 'Av Cesar Stange 335 Boqueirão', '2016-07-14', 'Masculino', 'unimed', '(42)3627-5541 ', 'Suellen', 'Neurologia', '2017-01-18', '2017-01-18', '', 0, '', '', '', '2017-01-18 17:57:49'),
(6, 'Rafaela Vitoria Kraiczyi', 1, 'Rua Paranaíba 136 santana', '2016-01-13', 'Feminino', 'particular', '(42)9981-5691 ', 'Giseli Ap Kraiczyi ( mãe)', 'Neurologia', '2017-01-23', '2017-01-23', '', 0, '', '', '', '2017-01-23 10:08:31'),
(7, 'Emanuele', 28, 'Rua Afonso Botelho 220 santana', '1988-05-14', 'Feminino', 'particular', '(16)9820-94608', '', '', '2017-01-23', '2017-01-23', '', 0, '', '', '', '2017-01-23 15:58:08'),
(8, 'Lucas Ferreira santos de Souza', 29, 'Rua São Jorge 69', '1987-11-28', 'Masculino', 'particular', '(42)9816-6263 ', '', 'Ortopedia', '2017-02-01', '2017-01-30', '', 0, 'Melhorar quadro álgico e melhorar função da ATM ', 'liberação articular TM, técnicas intrabucais, alongamento, liberação miofascial, tração cervical', 'DTM', '2017-02-01 09:08:07'),
(9, 'Flavia Cibele Gazzoni', 14, 'Rua Barão de Capanema 1941', '2002-04-11', 'Feminino', 'conteza', '(42)3623-8860 ', 'Dr Antenor', 'Ortopedia', '2017-02-03', '2017-02-03', '', 0, '', '', '', '2017-02-03 16:36:28'),
(10, 'MARIA JOSE BAHLS DE SOUZA ', 81, 'PEDRO DE SIQUEIRA   1201', '1935-04-03', 'Feminino', 'UNIMED', '(42)9985-13831', 'ANGELICA', 'Outros', '2017-02-10', '2017-02-09', '', 10, 'REEDUCAÇÃO DE CADEIA ESCRETORA  E DE MICÇÃO E RERDUCAÇÃO POSTURAL.', 'FORTALECIMENTO  E ALONGAMENTOS DA MUSCULARIA PELVICA, E POSTURAL. ', 'INCONTINENCIA URINARIA.', '2017-02-09 10:32:08'),
(11, 'José Ivonei dos Santos', 48, 'Rua Augusto Gomes de Oliveira 887', '1968-07-12', 'Masculino', 'unimed', '(42)9991-20046', 'Décio -  Elio Fisioterapeuta', 'Ortopedia', '2017-02-09', '2017-02-09', '', 0, '', '', '', '2017-02-09 15:12:17'),
(12, 'Maria Aparecida  de Moraes', 69, 'Rua Rocha Loures 585 - Bonsucesso', '1947-08-20', 'Feminino', 'CONTEZA', '(42)9991-20046', 'Dr Antenor', 'Ortopedia', '2017-02-09', '2017-02-09', '', 0, '', '', '', '2017-02-09 15:17:45'),
(13, 'Milena Demétrio', 22, '', '1995-07-26', 'Feminino', 'unimed', '(42)9925-3340 ', 'Dr Mauricio Kulka', 'Ortopedia', '2017-02-09', '2017-02-09', '', 0, '', '', '', '2017-02-09 16:32:54'),
(14, 'LARISSA VIER', 30, '', '1986-08-05', 'Feminino', 'UNIMED', '(42)9924-1455 ', 'mae', '', '2017-02-08', '2017-02-08', '', 0, 'casa', 'casa', 'DISCO PATIA', '2017-02-10 08:29:45'),
(15, 'Vitor Hugo Borba Miranda', 1, 'Expedicionario João Maria Batista  1210', '2015-04-28', 'Masculino', 'unimed', '(42)9998-35060', 'Maria Aparecida Borba', '', '2017-02-01', '2017-02-01', '', 0, '', 'estimular o desenvolvimento motor e cognitivo ', 'Sindrome de Dow', '2017-02-10 10:28:03'),
(16, 'teseeeeee', 10, '', '2006-10-10', ' ', '', '(  )    -     ', '', '', '2006-10-10', '2006-10-10', '', 0, '', '', '', '2017-02-19 14:03:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `idade` int(11) DEFAULT NULL,
  `endereco` varchar(60) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `planosaude` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `comboespecialiodade` varchar(20) DEFAULT NULL,
  `dataadmissao` date DEFAULT NULL,
  `crefito` varchar(110) DEFAULT NULL,
  `cadastradopor` varchar(20) DEFAULT NULL,
  `datacadastradopor` varchar(100) DEFAULT NULL,
  `atualizadopor` varchar(100) DEFAULT NULL,
  `dataatualizadopor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `idade`, `endereco`, `datanascimento`, `sexo`, `planosaude`, `telefone`, `comboespecialiodade`, `dataadmissao`, `crefito`, `cadastradopor`, `datacadastradopor`, `atualizadopor`, `dataatualizadopor`) VALUES
(1, 'testef', 10, 'testef', '2006-10-10', 'Feminino', 'uniiiii', '(32)3232-32323', 'Ortopedia', '2006-10-10', '222', NULL, NULL, NULL, '2017-02-20 22:09:44.0'),
(2, 'Juse da silva', 22, 'rua sem nome', '1994-09-09', 'Masculino', 'susa', '(  )    -     ', 'Ortopedia', NULL, '232323', 'adm', '2017-02-20 20:49:39.0', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(100) NOT NULL,
  `loginusuario` varchar(15) NOT NULL,
  `senhausuario` varchar(15) NOT NULL,
  `ultimologin` varchar(50) DEFAULT NULL,
  `logado` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `loginusuario`, `senhausuario`, `ultimologin`, `logado`) VALUES
(1, 'adm', 'adm', '2017-03-03 20:41:59.0', 0),
(2, 'ana', '123456', '2017-02-24 13:21:18.0', 0),
(3, 'cristiano', '123456', '2017-02-17 14:35:06.0', 0),
(4, 'thais', '123456', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Extraindo dados da tabela `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{"db":"looproject","table":"avaliacao"},{"db":"looproject","table":"funcionarios"},{"db":"looproject","table":"usuarios"},{"db":"agenda","table":"email"}]'),
('userjava', '[{"db":"eleicao","table":"candidatos"},{"db":"looproject","table":"usuarios"},{"db":"looproject","table":"funcionarios"},{"db":"looproject","table":"avaliacao"},{"db":"looproject","table":"clientes"}]'),
('web3', '[{"db":"pizzaria","table":"pedidos"}]');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Extraindo dados da tabela `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('userjava', 'looproject', 'avaliacao', '{"sorted_col":"`avaliacao`.`editadoadmin`  DESC"}', '2017-02-17 15:47:42'),
('userjava', 'looproject', 'clientes', '[]', '2017-02-15 17:38:28'),
('userjava', 'looproject', 'usuarios', '{"sorted_col":"`logado`  DESC"}', '2017-03-03 23:46:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Extraindo dados da tabela `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('phpmyadmin', '2016-11-24 11:12:14', '{"lang":"pt","collation_connection":"utf8mb4_unicode_ci"}'),
('root', '2016-11-24 11:15:35', '{"lang":"pt","collation_connection":"utf8mb4_unicode_ci"}'),
('userjava', '2017-01-10 20:11:22', '{"lang":"pt","collation_connection":"utf8mb4_unicode_ci"}'),
('web3', '2017-03-28 00:23:43', '{"lang":"pt","collation_connection":"utf8mb4_unicode_ci"}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;--
-- Database: `pizzaria`
--
CREATE DATABASE IF NOT EXISTS `pizzaria` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `pizzaria`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pizza_sabor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pizza_tamanho` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `cliente`, `pizza_sabor`, `pizza_tamanho`) VALUES
(16, 'Juca Oliveira Sorvete', 'otima', 'bem grande'),
(17, 'Jairo dos Galhos', 'mussarela', 'media'),
(18, 'Jairo dos Galhos', 'mussarela', 'grande');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
