-- MySQL dump 10.13  Distrib 5.5.50, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: mporn
-- ------------------------------------------------------
-- Server version	5.5.50-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE IF NOT EXISTS `mporn` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `mporn`;

--
-- Cria um usuario de acordo com config.php e garante o usuario completo acesso ao DB
--

GRANT ALL PRIVILEGES ON `mporn` . * TO 'mporn'@'localhost';
FLUSH PRIVILEGES;


--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `cpfcnpj` varchar(11) NOT NULL,
  `senha` varchar(65) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES 
(1,'Cliente1','cliente1@gmail.com','49290365501','fbfb386efea67e816f2dda0a8c94a98eb203757aebb3f55f183755a192d44467'), /*senha 123qwe*/
(2,'Cliente2','cliente2@gmail.com','64219804811','fbfb386efea67e816f2dda0a8c94a98eb203757aebb3f55f183755a192d44467'), /*senha 123qwe*/
(3,'Cliente3','cliente3@gmail.com','02931147141','fbfb386efea67e816f2dda0a8c94a98eb203757aebb3f55f183755a192d44467'), /*senha 123qwe*/
(4,'Cliente4','cliente4@gmail.com','53803843820','fbfb386efea67e816f2dda0a8c94a98eb203757aebb3f55f183755a192d44467'); /*senha 123qwe*/
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidade`
--

DROP TABLE IF EXISTS `especialidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialidade` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `descricao` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidade`
--

LOCK TABLES `especialidade` WRITE;
/*!40000 ALTER TABLE `especialidade` DISABLE KEYS */;
INSERT INTO `especialidade` VALUES 
(1,'CSS','Folha de Estilos'),
(2,'HTML','Linguagem de marcação básica'),
(3,'PHP','Linguagem de programação back-end'),
(4,'SysAdmin',''),
(5,'JS,JQuery','Linguagem de programação Front-End');
/*!40000 ALTER TABLE `especialidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `freelancer`
--

DROP TABLE IF EXISTS `freelancer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `freelancer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `cpfcnpj` varchar(11) NOT NULL,
  `senha` varchar(65) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `freelancer`
--

LOCK TABLES `freelancer` WRITE;
/*!40000 ALTER TABLE `freelancer` DISABLE KEYS */;
INSERT INTO `freelancer` VALUES 
(1,'Freelancer1','freelancer1@gmail.com','10355547988','fbfb386efea67e816f2dda0a8c94a98eb203757aebb3f55f183755a192d44467'), /*senha 123qwe*/
(2,'Freelancer2','freelancer2@dipcorp.com.br','12490167898','fbfb386efea67e816f2dda0a8c94a98eb203757aebb3f55f183755a192d44467'); /*senha 123qwe*/
/*!40000 ALTER TABLE `freelancer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `freelancer_especialidade`
--

DROP TABLE IF EXISTS `freelancer_especialidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `freelancer_especialidade` (
  `id_freelancer` int(10) unsigned NOT NULL,
  `id_especialidade` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_freelancer`,`id_especialidade`),
  KEY `id_especialidade` (`id_especialidade`),
  KEY `id_freelancer` (`id_freelancer`),
  CONSTRAINT `freelancer_especialidade_ibfk_1` FOREIGN KEY (`id_freelancer`) REFERENCES `freelancer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `freelancer_especialidade_ibfk_2` FOREIGN KEY (`id_especialidade`) REFERENCES `especialidade` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `freelancer_especialidade`
--

LOCK TABLES `freelancer_especialidade` WRITE;
/*!40000 ALTER TABLE `freelancer_especialidade` DISABLE KEYS */;
INSERT INTO `freelancer_especialidade` VALUES (1,1),(2,1),(1,2),(2,2),(1,3),(2,3),(1,5),(2,5);
/*!40000 ALTER TABLE `freelancer_especialidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plano_especialidade`
--

DROP TABLE IF EXISTS `plano_especialidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plano_especialidade` (
  `id_plano` int(10) unsigned NOT NULL,
  `id_especialidade` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plano_especialidade`
--

LOCK TABLES `plano_especialidade` WRITE;
/*!40000 ALTER TABLE `plano_especialidade` DISABLE KEYS */;
INSERT INTO `plano_especialidade` VALUES (1,1),(1,2),(2,1),(2,2),(2,5),(3,1),(3,2),(3,3),(3,5);
/*!40000 ALTER TABLE `plano_especialidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planos`
--

DROP TABLE IF EXISTS `planos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `planos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(64) NOT NULL,
  `descricaocurta` varchar(256) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planos`
--

LOCK TABLES `planos` WRITE;
/*!40000 ALTER TABLE `planos` DISABLE KEYS */;
INSERT INTO `planos` VALUES 
(1,'Site Estatico','Criação de sites estaticos',150),
(2,'Site Intermediario','Criação de sites com tecnologia JS, JQuery',200),
(3,'Site Avançado','Criação de sites com tecnologia JS, JQuery e PHP',300);
/*!40000 ALTER TABLE `planos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabalho`
--

DROP TABLE IF EXISTS `trabalho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabalho` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `plano` int(10) unsigned NOT NULL,
  `descricao` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_freelancer` int(11) DEFAULT NULL,
  `situacao` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_freelancer` (`id_freelancer`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabalho`
--

LOCK TABLES `trabalho` WRITE;
/*!40000 ALTER TABLE `trabalho` DISABLE KEYS */;
INSERT INTO `trabalho` VALUES 
(1,'Bracomal Pneus',1,'Apresentação da Empresa',1,NULL,0),
(2,'Site de Loja de Tecnologia',1,'Apresentação da Empresa',2,NULL,0),
(3,'E-commerce',3,'Loja de Vendas ONline',3,NULL,0),
(4,'Luiza Alimentos',1,'Site para apresentar a empresa',1,1,1),
(6,'Site Fui Feito',2,'Site que já foi feito',2,1,2),
(7,'Site Já feito Também',1,'Outro site já feito',3,1,2);
/*!40000 ALTER TABLE `trabalho` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-19  5:44:43
