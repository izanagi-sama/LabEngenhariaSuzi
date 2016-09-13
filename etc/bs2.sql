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

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id_cliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `cpfcnpj` varchar(11) NOT NULL,
  `senha` varchar(65) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidade`
--

DROP TABLE IF EXISTS `especialidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialidade` (
  `id_especialidade` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `descricao` varchar(128) NOT NULL,
  PRIMARY KEY (`id_especialidade`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidade`
--

LOCK TABLES `especialidade` WRITE;
/*!40000 ALTER TABLE `especialidade` DISABLE KEYS */;
INSERT INTO `especialidade` VALUES (1,'CSS',''),(2,'HTML',''),(3,'PHP',''),(7,'SysAdmin','');
/*!40000 ALTER TABLE `especialidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `freelancer`
--

DROP TABLE IF EXISTS `freelancer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `freelancer` (
  `id_freelancer` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `cpfcnpj` varchar(11) NOT NULL,
  `senha` varchar(65) NOT NULL,
  PRIMARY KEY (`id_freelancer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `freelancer`
--

LOCK TABLES `freelancer` WRITE;
/*!40000 ALTER TABLE `freelancer` DISABLE KEYS */;
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
  CONSTRAINT `freelancer_especialidade_ibfk_2` FOREIGN KEY (`id_especialidade`) REFERENCES `especialidade` (`id_especialidade`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `freelancer_especialidade_ibfk_1` FOREIGN KEY (`id_freelancer`) REFERENCES `freelancer` (`id_freelancer`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `freelancer_especialidade`
--

LOCK TABLES `freelancer_especialidade` WRITE;
/*!40000 ALTER TABLE `freelancer_especialidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `freelancer_especialidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `planos`
--

DROP TABLE IF EXISTS `planos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `planos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `descricaocurta` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `valor` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `planos`
--

LOCK TABLES `planos` WRITE;
/*!40000 ALTER TABLE `planos` DISABLE KEYS */;
INSERT INTO `planos` VALUES (1,'Site Avançado','Criação de sites estaticos',1500),(2,'Site Intermediario','Criação de sites com tecnologia JS, JQuery',2000),(3,'Site Avançado','Criação de sites com tecnologia JS, JQuery e PHP',3000);
/*!40000 ALTER TABLE `planos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-13 14:42:09
