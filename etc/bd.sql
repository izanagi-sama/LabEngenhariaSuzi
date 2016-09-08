-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 06, 2016 at 09:04 PM
-- Server version: 5.5.50-0+deb8u1
-- PHP Version: 5.6.24-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mporn`
--
CREATE DATABASE IF NOT EXISTS `mporn` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mporn`;

-- --------------------------------------------------------

--
-- Cria um usuario de acordo com config.php e garante o usuario completo acesso ao DB
--

GRANT ALL PRIVILEGES ON `mporn` . * TO 'mporn'@'localhost';
FLUSH PRIVILEGES;

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_especialidade`
--

DROP TABLE IF EXISTS `freelancer_especialidade`;
CREATE TABLE IF NOT EXISTS `freelancer_especialidade` (
  `id_freelancer` int(10) unsigned NOT NULL,
  `id_especialidade` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `especialidade`
--

DROP TABLE IF EXISTS `especialidade`;
CREATE TABLE IF NOT EXISTS `especialidade` (
`id_especialidade` int(10) unsigned NOT NULL,
  `nome` varchar(40) NOT NULL,
  `descricao` varchar(128) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `especialidade`
--

INSERT INTO `especialidade` (`id_especialidade`, `nome`, `descricao`) VALUES
(1, 'CSS', ''),
(2, 'HTML', ''),
(3, 'PHP', ''),
(7, 'SysAdmin', '');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer`
--

DROP TABLE IF EXISTS `freelancer`;
CREATE TABLE IF NOT EXISTS `freelancer` (
`id_freelancer` int(10) unsigned NOT NULL,
  `nome` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `cpfcnpj` varchar(11) NOT NULL,
  `senha` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
`id_cliente` int(10) unsigned NOT NULL,
  `nome` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `cpfcnpj` varchar(11) NOT NULL,
  `senha` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `especialidade`
--
ALTER TABLE `especialidade`
 ADD PRIMARY KEY (`id_especialidade`);

--
-- Indexes for table `freelancer`
--
ALTER TABLE `freelancer`
 ADD PRIMARY KEY (`id_freelancer`);
 
--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `freelancer_especialidade`
--
ALTER TABLE `freelancer_especialidade`
 ADD PRIMARY KEY (`id_freelancer`,`id_especialidade`), ADD KEY `id_especialidade` (`id_especialidade`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `especialidade`
--
ALTER TABLE `especialidade`
MODIFY `id_especialidade` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `freelancer`
--
ALTER TABLE `freelancer`
MODIFY `id_freelancer` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `freelancer`
--
ALTER TABLE `cliente`
MODIFY `id_cliente` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `freelancer_especialidade`
--
ALTER TABLE `freelancer_especialidade`
ADD CONSTRAINT `freelancer_especialidade_ibfk_2` FOREIGN KEY (`id_especialidade`) REFERENCES `especialidade` (`id_especialidade`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `freelancer_especialidade_ibfk_1` FOREIGN KEY (`id_freelancer`) REFERENCES `freelancer` (`id_freelancer`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
