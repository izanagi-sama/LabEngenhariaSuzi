-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2016 at 03:02 PM
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
CREATE DATABASE IF NOT EXISTS `mporn` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `mporn`;

-- --------------------------------------------------------

--
-- Cria um usuario de acordo com config.php e garante o usuario completo acesso ao DB
--

GRANT ALL PRIVILEGES ON `mporn` . * TO 'mporn'@'localhost';
FLUSH PRIVILEGES;

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(10) unsigned NOT NULL,
  `nome` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `cpfcnpj` varchar(11) NOT NULL,
  `senha` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `especialidade`
--

CREATE TABLE IF NOT EXISTS `especialidade` (
  `id` int(10) unsigned NOT NULL,
  `nome` varchar(40) NOT NULL,
  `descricao` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `freelancer`
--

CREATE TABLE IF NOT EXISTS `freelancer` (
  `id` int(10) unsigned NOT NULL,
  `nome` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `cpfcnpj` varchar(11) NOT NULL,
  `senha` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_especialidade`
--

CREATE TABLE IF NOT EXISTS `freelancer_especialidade` (
  `id_freelancer` int(10) unsigned NOT NULL,
  `id_especialidade` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `planos`
--

CREATE TABLE IF NOT EXISTS `planos` (
`id` int(11) NOT NULL,
  `nome` varchar(64) NOT NULL,
  `descricaocurta` varchar(256) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `especialidade`
--
ALTER TABLE `especialidade`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer`
--
ALTER TABLE `freelancer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer_especialidade`
--
ALTER TABLE `freelancer_especialidade`
 ADD PRIMARY KEY (`id_freelancer`,`id_especialidade`),
 ADD KEY `id_especialidade` (`id_especialidade`),
 ADD KEY `id_freelancer` (`id_freelancer`);

--
-- Indexes for table `planos`
--
ALTER TABLE `planos`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `especialidade`
--
ALTER TABLE `especialidade`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `freelancer`
--
ALTER TABLE `freelancer`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `planos`
--
ALTER TABLE `planos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `freelancer_especialidade`
--
ALTER TABLE `freelancer_especialidade`
ADD CONSTRAINT `freelancer_especialidade_ibfk_2` FOREIGN KEY (`id_especialidade`) REFERENCES `especialidade` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `freelancer_especialidade_ibfk_1` FOREIGN KEY (`id_freelancer`) REFERENCES `freelancer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Dumping data for table `especialidade`
--

INSERT INTO `especialidade` (`nome`, `descricao`) VALUES
('CSS', ''),
('HTML', ''),
('PHP', ''),
('SysAdmin', '');

--
-- Dumping data for table `planos`
--

INSERT INTO `planos` (`nome`, `descricaocurta`, `valor`) VALUES
('Site Avançado', 'Criação de sites estaticos', 1500),
('Site Intermediario', 'Criação de sites com tecnologia JS, JQuery', 2000),
('Site Avançado', 'Criação de sites com tecnologia JS, JQuery e PHP', 3000);


-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
