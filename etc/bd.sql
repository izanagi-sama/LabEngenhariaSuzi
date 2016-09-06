-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 29/08/2016 às 13:45
-- Versão do servidor: 5.5.50-0+deb8u1
-- Versão do PHP: 5.6.24-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `mporn`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `especialidade`
--

CREATE TABLE IF NOT EXISTS `especialidade` (
`id_especialidade` int(10) unsigned NOT NULL,
  `nome` varchar(40) NOT NULL,
  `descricao` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `freelancer`
--

CREATE TABLE IF NOT EXISTS `freelancer` (
`id_freelancer` int(10) unsigned NOT NULL,
  `nome` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `freelancer_especialidade`
--

CREATE TABLE IF NOT EXISTS `freelancer_especialidade` (
  `id_freelancer` int(10) unsigned NOT NULL,
  `id_especialidade` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `especialidade`
--
ALTER TABLE `especialidade`
 ADD PRIMARY KEY (`id_especialidade`);

--
-- Índices de tabela `freelancer`
--
ALTER TABLE `freelancer`
 ADD PRIMARY KEY (`id_freelancer`);

--
-- Índices de tabela `freelancer_especialidade`
--
ALTER TABLE `freelancer_especialidade`
 ADD PRIMARY KEY (`id_freelancer`,`id_especialidade`), ADD KEY `id_especialidade` (`id_especialidade`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `especialidade`
--
ALTER TABLE `especialidade`
MODIFY `id_especialidade` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `freelancer`
--
ALTER TABLE `freelancer`
MODIFY `id_freelancer` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `freelancer_especialidade`
--
ALTER TABLE `freelancer_especialidade`
ADD CONSTRAINT `freelancer_especialidade_ibfk_2` FOREIGN KEY (`id_especialidade`) REFERENCES `especialidade` (`id_especialidade`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `freelancer_especialidade_ibfk_1` FOREIGN KEY (`id_freelancer`) REFERENCES `freelancer` (`id_freelancer`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
