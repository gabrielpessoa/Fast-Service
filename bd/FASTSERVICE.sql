-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: FASTSERVICE
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

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
-- Table structure for table `AVALIACOES`
--

DROP TABLE IF EXISTS `AVALIACOES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AVALIACOES` (
  `AVL_ID` int(11) NOT NULL AUTO_INCREMENT,
  `AVL_SRV_ID` int(11) NOT NULL,
  `AVL_USER_ID` int(11) NOT NULL,
  `AVL_QTD_ESTRELAS` int(11) DEFAULT NULL,
  PRIMARY KEY (`AVL_ID`),
  KEY `AVL_SRV_ID` (`AVL_SRV_ID`),
  KEY `AVL_USER_ID` (`AVL_USER_ID`),
  CONSTRAINT `AVALIACOES_ibfk_1` FOREIGN KEY (`AVL_SRV_ID`) REFERENCES `SERVICOS` (`SRV_ID`),
  CONSTRAINT `AVALIACOES_ibfk_2` FOREIGN KEY (`AVL_USER_ID`) REFERENCES `USUARIOS` (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AVALIACOES`
--

LOCK TABLES `AVALIACOES` WRITE;
/*!40000 ALTER TABLE `AVALIACOES` DISABLE KEYS */;
INSERT INTO `AVALIACOES` VALUES (18,4,6,1),(19,4,7,5);
/*!40000 ALTER TABLE `AVALIACOES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CATEGORIAS`
--

DROP TABLE IF EXISTS `CATEGORIAS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CATEGORIAS` (
  `CTG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CTG_NOME` varchar(40) NOT NULL,
  PRIMARY KEY (`CTG_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CATEGORIAS`
--

LOCK TABLES `CATEGORIAS` WRITE;
/*!40000 ALTER TABLE `CATEGORIAS` DISABLE KEYS */;
INSERT INTO `CATEGORIAS` VALUES (4,'Moda e beleza'),(7,'Esportes e lazer'),(8,'Culinária'),(10,'Músicas e hobbies');
/*!40000 ALTER TABLE `CATEGORIAS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `COMENTARIOS`
--

DROP TABLE IF EXISTS `COMENTARIOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `COMENTARIOS` (
  `CMT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CMT_COMENTARIO` varchar(255) NOT NULL,
  `CMT_USER_ID` int(11) NOT NULL,
  `CMT_SRV_ID` int(11) NOT NULL,
  PRIMARY KEY (`CMT_ID`),
  KEY `CMT_USER_ID` (`CMT_USER_ID`),
  KEY `CMT_SRV_ID` (`CMT_SRV_ID`),
  CONSTRAINT `COMENTARIOS_ibfk_1` FOREIGN KEY (`CMT_USER_ID`) REFERENCES `USUARIOS` (`USER_ID`),
  CONSTRAINT `COMENTARIOS_ibfk_2` FOREIGN KEY (`CMT_SRV_ID`) REFERENCES `SERVICOS` (`SRV_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `COMENTARIOS`
--

LOCK TABLES `COMENTARIOS` WRITE;
/*!40000 ALTER TABLE `COMENTARIOS` DISABLE KEYS */;
INSERT INTO `COMENTARIOS` VALUES (1,'ewrwerw',6,4);
/*!40000 ALTER TABLE `COMENTARIOS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FAVORITOS`
--

DROP TABLE IF EXISTS `FAVORITOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FAVORITOS` (
  `FVR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FVR_USER_ID` int(11) NOT NULL,
  `FVR_SRV_ID` int(11) NOT NULL,
  PRIMARY KEY (`FVR_ID`),
  KEY `FVR_USER_ID` (`FVR_USER_ID`),
  KEY `FVR_SRV_ID` (`FVR_SRV_ID`),
  CONSTRAINT `FAVORITOS_ibfk_1` FOREIGN KEY (`FVR_USER_ID`) REFERENCES `USUARIOS` (`USER_ID`),
  CONSTRAINT `FAVORITOS_ibfk_2` FOREIGN KEY (`FVR_SRV_ID`) REFERENCES `SERVICOS` (`SRV_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FAVORITOS`
--

LOCK TABLES `FAVORITOS` WRITE;
/*!40000 ALTER TABLE `FAVORITOS` DISABLE KEYS */;
INSERT INTO `FAVORITOS` VALUES (1,6,4);
/*!40000 ALTER TABLE `FAVORITOS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `IMAGENS`
--

DROP TABLE IF EXISTS `IMAGENS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `IMAGENS` (
  `IMG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `IMG_NOME` varchar(50) NOT NULL,
  `IMG_SRV_ID` int(11) NOT NULL,
  PRIMARY KEY (`IMG_ID`),
  KEY `IMG_SRV_ID` (`IMG_SRV_ID`),
  CONSTRAINT `IMAGENS_ibfk_1` FOREIGN KEY (`IMG_SRV_ID`) REFERENCES `SERVICOS` (`SRV_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `IMAGENS`
--

LOCK TABLES `IMAGENS` WRITE;
/*!40000 ALTER TABLE `IMAGENS` DISABLE KEYS */;
INSERT INTO `IMAGENS` VALUES (2,'../produtos/img/1671564734.jpeg',4),(3,'../produtos/img/1072762690.jpg',4),(4,'../produtos/img/833092697.jpg',4),(7,'../produtos/img/128838886.jpg',4),(15,'../produtos/img/1484133873.jpeg',10),(16,'../produtos/img/1398118571.jpg',11);
/*!40000 ALTER TABLE `IMAGENS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MEDIA_AVALIACOES`
--

DROP TABLE IF EXISTS `MEDIA_AVALIACOES`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `MEDIA_AVALIACOES` (
  `MDAV_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MDAV_SRV_ID` int(11) NOT NULL,
  `MDAV_TOTAL_PESSOAS` int(11) DEFAULT NULL,
  `MDAV_QTD_ESTRELAS` int(11) DEFAULT NULL,
  `MDAV_MEDIA` double DEFAULT NULL,
  PRIMARY KEY (`MDAV_ID`),
  KEY `MDAV_SRV_ID` (`MDAV_SRV_ID`),
  CONSTRAINT `MEDIA_AVALIACOES_ibfk_1` FOREIGN KEY (`MDAV_SRV_ID`) REFERENCES `SERVICOS` (`SRV_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MEDIA_AVALIACOES`
--

LOCK TABLES `MEDIA_AVALIACOES` WRITE;
/*!40000 ALTER TABLE `MEDIA_AVALIACOES` DISABLE KEYS */;
INSERT INTO `MEDIA_AVALIACOES` VALUES (7,4,2,6,3),(8,11,0,0,0);
/*!40000 ALTER TABLE `MEDIA_AVALIACOES` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SERVICOS`
--

DROP TABLE IF EXISTS `SERVICOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SERVICOS` (
  `SRV_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SRV_NOME` varchar(40) DEFAULT NULL,
  `SRV_CATEGORIA` int(11) NOT NULL,
  `SRV_DESCRICAO` varchar(255) DEFAULT NULL,
  `SRV_LOCALIZACAO` varchar(255) DEFAULT NULL,
  `SRV_PRECO` varchar(40) DEFAULT NULL,
  `SRV_USER_ID` int(11) NOT NULL,
  `SRV_SUBCATEGORIA` int(11) DEFAULT NULL,
  PRIMARY KEY (`SRV_ID`),
  KEY `SRV_CATEGORIA` (`SRV_CATEGORIA`),
  KEY `SRV_USER_ID` (`SRV_USER_ID`),
  KEY `SRV_SUBCATEGORIA` (`SRV_SUBCATEGORIA`),
  CONSTRAINT `SERVICOS_ibfk_1` FOREIGN KEY (`SRV_CATEGORIA`) REFERENCES `CATEGORIAS` (`CTG_ID`),
  CONSTRAINT `SERVICOS_ibfk_2` FOREIGN KEY (`SRV_USER_ID`) REFERENCES `USUARIOS` (`USER_ID`),
  CONSTRAINT `SERVICOS_ibfk_3` FOREIGN KEY (`SRV_SUBCATEGORIA`) REFERENCES `SUBCATEGORIAS` (`SCTG_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SERVICOS`
--

LOCK TABLES `SERVICOS` WRITE;
/*!40000 ALTER TABLE `SERVICOS` DISABLE KEYS */;
INSERT INTO `SERVICOS` VALUES (4,'Pizza',10,'SNASFJFNASASIOFHAOSOAFOASJFBOAF','IGARASSU','20',6,NULL),(10,'Sala 01',4,'eererwer','Igarassu','20',6,1),(11,'Bicicleta',7,'asafsregggffg','Igarassu','700',6,5);
/*!40000 ALTER TABLE `SERVICOS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SUBCATEGORIAS`
--

DROP TABLE IF EXISTS `SUBCATEGORIAS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SUBCATEGORIAS` (
  `SCTG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SCTG_NOME` varchar(50) NOT NULL,
  `SCTG_CTG_ID` int(11) NOT NULL,
  PRIMARY KEY (`SCTG_ID`),
  KEY `SCTG_CTG_ID` (`SCTG_CTG_ID`),
  CONSTRAINT `SUBCATEGORIAS_ibfk_1` FOREIGN KEY (`SCTG_CTG_ID`) REFERENCES `CATEGORIAS` (`CTG_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SUBCATEGORIAS`
--

LOCK TABLES `SUBCATEGORIAS` WRITE;
/*!40000 ALTER TABLE `SUBCATEGORIAS` DISABLE KEYS */;
INSERT INTO `SUBCATEGORIAS` VALUES (1,'Roupas e calçados',4),(2,'Bolsas, malas e mochilas',4),(3,'Beleza e saúde',4),(4,'Bijouterias, relógios e acessórios',4),(5,'Ciclismo',7),(6,'Esportes e ginástica',7),(7,'Hobbies e coleções',10),(8,'Instrumentos musicais',10);
/*!40000 ALTER TABLE `SUBCATEGORIAS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USUARIOS`
--

DROP TABLE IF EXISTS `USUARIOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USUARIOS` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_NOME` varchar(40) NOT NULL,
  `USER_USUARIO` varchar(40) NOT NULL,
  `USER_SENHA` varchar(40) NOT NULL,
  `USER_EMAIL` varchar(40) DEFAULT NULL,
  `USER_TELEFONE` varchar(40) DEFAULT NULL,
  `USER_IMAGEM` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USUARIOS`
--

LOCK TABLES `USUARIOS` WRITE;
/*!40000 ALTER TABLE `USUARIOS` DISABLE KEYS */;
INSERT INTO `USUARIOS` VALUES (6,'Alessandro JosÃ©','Alessandro','202cb962ac59075b964b07152d234b70','alessandrosilva325@gmail.com','81992931694','../img/usuarios/1173345430.png'),(7,'Fastservice','Alessandro0325','202cb962ac59075b964b07152d234b70','thiagomoura86@live.com','81992931694',NULL),(8,'','','d41d8cd98f00b204e9800998ecf8427e','','',NULL);
/*!40000 ALTER TABLE `USUARIOS` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-21 20:25:48
