-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: tnewsv3
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.16.04.1

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','admin@gmail.com','t123news'),(2,'reporter','reporter@news.com','reporter');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `advertisements`
--

DROP TABLE IF EXISTS `advertisements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advertisements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertisements`
--

LOCK TABLES `advertisements` WRITE;
/*!40000 ALTER TABLE `advertisements` DISABLE KEYS */;
INSERT INTO `advertisements` VALUES (9,'à°¹à°°à±€à°·à± à°…à°¨à±à°¨ à°•à± à°¶à±à°­à°¾à°•à°¾à°‚à°•à±à°·à°²à±',',image_search_1535269486865.jpg');
/*!40000 ALTER TABLE `advertisements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `breaking_news`
--

DROP TABLE IF EXISTS `breaking_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `breaking_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `breaking_news` varchar(256) NOT NULL,
  `reporter` tinyint(4) NOT NULL,
  `reporter_name` varchar(250) DEFAULT NULL,
  `category_type` int(225) NOT NULL,
  `content` varchar(2500) NOT NULL,
  `news_length` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `image` mediumtext,
  `location` varchar(225) NOT NULL,
  `language` int(11) NOT NULL,
  `user_name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `breaking_news`
--

LOCK TABLES `breaking_news` WRITE;
/*!40000 ALTER TABLE `breaking_news` DISABLE KEYS */;
INSERT INTO `breaking_news` VALUES (10,'à°¬à±†à°‚à°—à°¾à°²à±â€Œà°¨à± à°¤à°¾à°•à°¿à°¨ à°«à±Šà°¨à°¿..90à°•à°¿.à°®à±€ à°µà±‡à°—à°‚à°¤à±‹ à°—à°¾à°²à±à°²à±',0,NULL,54,'à°’à°¡à°¿à°¶à°¾à°¨à± à°…à°¤à°²à°¾à°•à±à°¤à°²à°‚ à°šà±‡à°¸à°¿à°¨ à°«à±Šà°¨à°¿ à°…à°¤à°¿ à°¤à±€à°µà±à°°à°¤à±à°ªà°¾à°¨à± à°•à±à°°à°®à°‚à°—à°¾ à°¬à°²à°¹à±€à°¨à°ªà°¡à°¿ à°ªà°¶à±à°šà°¿à°®à±â€Œà°¬à°‚à°—à°¾à°¨à± à°¤à°¾à°•à°¿à°‚à°¦à°¿. à°¶à±à°•à±à°°à°µà°¾à°°à°‚ à°‰à°¦à°¯à°‚ 8.45 à°¸à°®à°¯à°‚à°²à±‹  à°ªà±‚à°°à±€à°•à°¿ à°¦à°•à±à°·à°¿à°£à°‚à°—à°¾ à°µà°¦à±à°¦ à°¤à±€à°°à°‚ à°¦à°¾à°Ÿà°¿à°¨ à°«à±Šà°¨à°¿ à°¤à±à°ªà°¾à°¨à±â€Œ à°ˆà°¶à°¾à°¨à±à°¯ à°¦à°¿à°¶à°—à°¾ à°ªà±à°°à°¯à°¾à°£à°¿à°‚à°šà°¿ à°ˆ à°°à±‹à°œà± à°‰à°¦à°¯à°‚ à°¬à±†à°‚à°—à°¾à°²à±â€Œà°²à±‹à°•à°¿ à°ªà±à°°à°µà±‡à°¶à°¿à°‚à°šà°¿à°‚à°¦à°¿. à°—à°‚à°Ÿà°•à± 90 à°•à°¿à°²à±‹à°®à±€à°Ÿà°°à±à°² à°µà±‡à°—à°‚à°¤à±‹ à°—à°¾à°²à±à°²à± à°µà±€à°¸à±à°¤à±à°¨à±à°¨à°¾à°¯à°¿. à°¶à±à°•à±à°°à°µà°¾à°°à°‚ à°‰à°¦à°¯à°‚ à°¤à±€à°°à°¾à°¨à±à°¨à°¿ à°¦à°¾à°Ÿà±‡ à°•à±à°°à°®à°‚à°²à±‹ 230 à°•à°¿à°²à±‹à°®à±€à°Ÿà°°à±à°² à°µà±‡à°—à°‚à°¤à±‹ à°µà±€à°šà°¿à°¨ à°­à±€à°•à°° à°—à°¾à°²à±à°²à± à°ªà±à°°à°œà°²à°¨à± à°­à°¯à°¾à°‚à°¦à±‹à°³à°¨à°•à± à°—à±à°°à°¿à°šà±‡à°¶à°¾à°¯à°¿.','Short News','Image&Content',',3.jpg','55,57',1,NULL),(11,'à°¸à°µà°¾à°³à±à°²à± à°µà°¿à°¸à°°à°¨à°¿ à°¬à±†à°‚à°—à°³à±‚à°°à± à°µà°¿à°«à°² à°—à°¾à°¥',0,NULL,60,'à°µà°¿à°¶à°¾à°–: à°°à°¾à°·à±à°Ÿà±à°°à°‚à°²à±‹ à°œà°¨à°¸à±‡à°¨ à°ªà±à°°à°­à°¾à°µà°‚ à°ªà±†à°¦à±à°¦à°—à°¾ à°à°®à±€ à°²à±‡à°¦à°¨à°¿, à°† à°ªà°¾à°°à±à°Ÿà±€à°•à°¿ à°šà°¾à°²à°¾ à°¸à±à°µà°²à±à°ªà°‚à°—à°¾ à°®à°¾à°¤à±à°°à°®à±‡ à°¸à±€à°Ÿà±à°²à± à°µà°¸à±à°¤à°¾à°¯à°‚à°Ÿà±‹à°¨à±à°¨ à°ªà°²à± à°¸à°‚à°¸à±à°¥à°² à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°…à°‚à°šà°¨à°¾à°²à°ªà±ˆ à°œà°¨à°¸à±‡à°¨ à°µà°¿à°¶à°¾à°– à°²à±‹à°•à±â€Œà°¸à°­ à°…à°­à±à°¯à°°à±à°¥à°¿, à°¸à±€à°¬à±€à° à°®à°¾à°œà±€ à°œà±‡à°¡à±€ à°µà±€à°µà±€ à°²à°•à±à°·à±à°®à±€à°¨à°¾à°°à°¾à°¯à°£ à°¸à±à°ªà°‚à°¦à°¿à°‚à°šà°¾à°°à±. à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œà°¨à± à°¤à°¾à°¨à± à°ªà°Ÿà±à°Ÿà°¿à°‚à°šà±à°•à±‹à°¨à°¨à±à°¨à°¾à°°à±. à°Žà°¨à±à°¨à°¿à°•à°²à±à°²à±‹ à°—à±†à°²à°¿à°šà°¿à°¨à°¾, à°“à°¡à°¿à°¨à°¾ à°¨à°¿à°¤à±à°¯à°‚ à°ªà±à°°à°œà°¾à°¸à±‡à°µà°²à±‹à°¨à±‡ à°‰à°‚à°Ÿà°¾à°¨à°¨à°¿ à°¸à±à°ªà°·à±à°Ÿà°‚à°šà±‡à°¶à°¾à°°à±. à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°…à°‚à°šà°¨à°¾à°²à°¨à± à°šà±‚à°¸à°¿ à°†à°‚à°¦à±‹à°³à°¨ à°šà±†à°‚à°¦à°•à±à°‚à°¡à°¾ à°ˆ à°¨à±†à°² 23à°µà°°à°•à± à°µà±‡à°šà°¿ à°šà±‚à°¡à°¾à°²à°¨à°¿ à°†à°¯à°¨ à°ªà±à°°à°œà°²à°•à± à°¸à±‚à°šà°¿à°‚à°šà°¾à°°à±.  à°µà°¿à°¶à°¾à°– à°µà°¨à±â€Œà°Ÿà±Œà°¨à±â€Œà°²à±‹ à°°à°‚à°œà°¾à°¨à±â€Œ à°¤à±‹à°«à°¾ à°ªà°‚à°ªà°¿à°£à±€ à°•à°¾à°°à±à°¯à°•à±à°°à°®à°‚à°²à±‹ à°ªà°¾à°²à±à°—à±Šà°¨à±à°¨ à°¸à°‚à°¦à°°à±à°­à°‚à°—à°¾ à°†à°¯à°¨ à°®à±€à°¡à°¿à°¯à°¾à°¤à±‹ à°®à°¾à°Ÿà±à°²à°¾à°¡à±à°¤à±‚.. â€˜â€˜à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œà°¤à±‹ à°®à°¾à°•à±‡à°®à±€ à°†à°‚à°¦à±‹à°³à°¨ à°²à±‡à°¦à±. à°…à°¨à°µà°¸à°°à°‚à°—à°¾ à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°‡à°šà±à°šà°¿ à°ªà±à°°à°œà°²à±à°²à±‹ à°®à°°à°¿à°‚à°¤ à°‰à°¤à±à°•à°‚à°  à°•à°²à±à°—à°¿à°¸à±à°¤à±à°¨à±à°¨à°¾à°°à±. à°“à°ªà°¿à°•à°¤à±‹ à°‰à°‚à°Ÿà±‡ à°ˆ à°¨à±†à°² 23à°¨ à°…à°¸à°²à± à°«à°²à°¿à°¤à°®à±‡ à°µà°šà±à°šà±‡à°¸à±à°¤à±à°‚à°¦à°¿. à° à°«à°²à°¿à°¤à°‚ à°µà°šà±à°šà°¿à°¨à°¾ à°ªà±à°°à°œà°¾ à°¸à°®à°¸à±à°¯à°²à°ªà±ˆ à°ªà±‹à°°à°¾à°¡à°¾à°²à°¨à°¿ à°®à°¾ à°ªà°¾à°°à±à°Ÿà±€ à°¨à°¿à°°à±à°£à°¯à°¿à°‚à°šà°¿à°‚à°¦à°¿. à°—à±†à°²à±à°ªà±‹à°Ÿà°®à±à°²à± à°¸à°¹à°œà°‚. à°ªà±à°°à°œà°² à°•à±‹à°¸à°‚ à°ªà°¨à°¿à°šà±‡à°¯à°¾à°²à°¨à±à°¨ à°­à°¾à°µà°¨à°¤à±‹ à°®à±‡à°‚ à°®à±à°‚à°¦à±à°•à±†à°³à±à°¤à±à°¨à±à°¨à°¾à°‚. à°…à°‚à°¦à±à°µà°²à±à°² à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°µà°²à±à°² à°•à°²à°¿à°—à±‡ à°ªà±à°°à°­à°¾à°µà°‚ à°®à°¾à°ªà±ˆ à°à°®à±€ à°•à°¨à°¬à°¡à°Ÿà°‚à°²à±‡à°¦à±â€™â€™ à°…à°¨à±à°¨à°¾à°°à±.','Long News','Image&Content',',5.jpg','65',1,NULL),(12,'à°µà°¿à°µà°¾à°¹à°¬à°‚à°§à°‚',0,NULL,62,'à°µà°¿à°¶à°¾à°–: à°°à°¾à°·à±à°Ÿà±à°°à°‚à°²à±‹ à°œà°¨à°¸à±‡à°¨ à°ªà±à°°à°­à°¾à°µà°‚ à°ªà±†à°¦à±à°¦à°—à°¾ à°à°®à±€ à°²à±‡à°¦à°¨à°¿, à°† à°ªà°¾à°°à±à°Ÿà±€à°•à°¿ à°šà°¾à°²à°¾ à°¸à±à°µà°²à±à°ªà°‚à°—à°¾ à°®à°¾à°¤à±à°°à°®à±‡ à°¸à±€à°Ÿà±à°²à± à°µà°¸à±à°¤à°¾à°¯à°‚à°Ÿà±‹à°¨à±à°¨ à°ªà°²à± à°¸à°‚à°¸à±à°¥à°² à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°…à°‚à°šà°¨à°¾à°²à°ªà±ˆ à°œà°¨à°¸à±‡à°¨ à°µà°¿à°¶à°¾à°– à°²à±‹à°•à±â€Œà°¸à°­ à°…à°­à±à°¯à°°à±à°¥à°¿, à°¸à±€à°¬à±€à° à°®à°¾à°œà±€ à°œà±‡à°¡à±€ à°µà±€à°µà±€ à°²à°•à±à°·à±à°®à±€à°¨à°¾à°°à°¾à°¯à°£ à°¸à±à°ªà°‚à°¦à°¿à°‚à°šà°¾à°°à±. à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œà°¨à± à°¤à°¾à°¨à± à°ªà°Ÿà±à°Ÿà°¿à°‚à°šà±à°•à±‹à°¨à°¨à±à°¨à°¾à°°à±. à°Žà°¨à±à°¨à°¿à°•à°²à±à°²à±‹ à°—à±†à°²à°¿à°šà°¿à°¨à°¾, à°“à°¡à°¿à°¨à°¾ à°¨à°¿à°¤à±à°¯à°‚ à°ªà±à°°à°œà°¾à°¸à±‡à°µà°²à±‹à°¨à±‡ à°‰à°‚à°Ÿà°¾à°¨à°¨à°¿ à°¸à±à°ªà°·à±à°Ÿà°‚à°šà±‡à°¶à°¾à°°à±. à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°…à°‚à°šà°¨à°¾à°²à°¨à± à°šà±‚à°¸à°¿ à°†à°‚à°¦à±‹à°³à°¨ à°šà±†à°‚à°¦à°•à±à°‚à°¡à°¾ à°ˆ à°¨à±†à°² 23à°µà°°à°•à± à°µà±‡à°šà°¿ à°šà±‚à°¡à°¾à°²à°¨à°¿ à°†à°¯à°¨ à°ªà±à°°à°œà°²à°•à± à°¸à±‚à°šà°¿à°‚à°šà°¾à°°à±.  à°µà°¿à°¶à°¾à°– à°µà°¨à±â€Œà°Ÿà±Œà°¨à±â€Œà°²à±‹ à°°à°‚à°œà°¾à°¨à±â€Œ à°¤à±‹à°«à°¾ à°ªà°‚à°ªà°¿à°£à±€ à°•à°¾à°°à±à°¯à°•à±à°°à°®à°‚à°²à±‹ à°ªà°¾à°²à±à°—à±Šà°¨à±à°¨ à°¸à°‚à°¦à°°à±à°­à°‚à°—à°¾ à°†à°¯à°¨ à°®à±€à°¡à°¿à°¯à°¾à°¤à±‹ à°®à°¾à°Ÿà±à°²à°¾à°¡à±à°¤à±‚.. â€˜â€˜à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œà°¤à±‹ à°®à°¾à°•à±‡à°®à±€ à°†à°‚à°¦à±‹à°³à°¨ à°²à±‡à°¦à±. à°…à°¨à°µà°¸à°°à°‚à°—à°¾ à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°‡à°šà±à°šà°¿ à°ªà±à°°à°œà°²à±à°²à±‹ à°®à°°à°¿à°‚à°¤ à°‰à°¤à±à°•à°‚à°  à°•à°²à±à°—à°¿à°¸à±à°¤à±à°¨à±à°¨à°¾à°°à±. à°“à°ªà°¿à°•à°¤à±‹ à°‰à°‚à°Ÿà±‡ à°ˆ à°¨à±†à°² 23à°¨ à°…à°¸à°²à± à°«à°²à°¿à°¤à°®à±‡ à°µà°šà±à°šà±‡à°¸à±à°¤à±à°‚à°¦à°¿. à° à°«à°²à°¿à°¤à°‚ à°µà°šà±à°šà°¿à°¨à°¾ à°ªà±à°°à°œà°¾ à°¸à°®à°¸à±à°¯à°²à°ªà±ˆ à°ªà±‹à°°à°¾à°¡à°¾à°²à°¨à°¿ à°®à°¾ à°ªà°¾à°°à±à°Ÿà±€ à°¨à°¿à°°à±à°£à°¯à°¿à°‚à°šà°¿à°‚à°¦à°¿. à°—à±†à°²à±à°ªà±‹à°Ÿà°®à±à°²à± à°¸à°¹à°œà°‚. à°ªà±à°°à°œà°² à°•à±‹à°¸à°‚ à°ªà°¨à°¿à°šà±‡à°¯à°¾à°²à°¨à±à°¨ à°­à°¾à°µà°¨à°¤à±‹ à°®à±‡à°‚ à°®à±à°‚à°¦à±à°•à±†à°³à±à°¤à±à°¨à±à°¨à°¾à°‚. à°…à°‚à°¦à±à°µà°²à±à°² à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°µà°²à±à°² à°•à°²à°¿à°—à±‡ à°ªà±à°°à°­à°¾à°µà°‚ à°®à°¾à°ªà±ˆ à°à°®à±€ à°•à°¨à°¬à°¡à°Ÿà°‚à°²à±‡à°¦à±â€™â€™ à°…à°¨à±à°¨à°¾à°°à±.','Long News','Image&Content',',6.jpg,15.jpg','52',1,NULL),(14,'Breaking News',0,NULL,54,'à°µà°¿à°¶à°¾à°–: à°°à°¾à°·à±à°Ÿà±à°°à°‚à°²à±‹ à°œà°¨à°¸à±‡à°¨ à°ªà±à°°à°­à°¾à°µà°‚ à°ªà±†à°¦à±à°¦à°—à°¾ à°à°®à±€ à°²à±‡à°¦à°¨à°¿, à°† à°ªà°¾à°°à±à°Ÿà±€à°•à°¿ à°šà°¾à°²à°¾ à°¸à±à°µà°²à±à°ªà°‚à°—à°¾ à°®à°¾à°¤à±à°°à°®à±‡ à°¸à±€à°Ÿà±à°²à± à°µà°¸à±à°¤à°¾à°¯à°‚à°Ÿà±‹à°¨à±à°¨ à°ªà°²à± à°¸à°‚à°¸à±à°¥à°² à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°…à°‚à°šà°¨à°¾à°²à°ªà±ˆ à°œà°¨à°¸à±‡à°¨ à°µà°¿à°¶à°¾à°– à°²à±‹à°•à±â€Œà°¸à°­ à°…à°­à±à°¯à°°à±à°¥à°¿, à°¸à±€à°¬à±€à° à°®à°¾à°œà±€ à°œà±‡à°¡à±€ à°µà±€à°µà±€ à°²à°•à±à°·à±à°®à±€à°¨à°¾à°°à°¾à°¯à°£ à°¸à±à°ªà°‚à°¦à°¿à°‚à°šà°¾à°°à±. à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œà°¨à± à°¤à°¾à°¨à± à°ªà°Ÿà±à°Ÿà°¿à°‚à°šà±à°•à±‹à°¨à°¨à±à°¨à°¾à°°à±. à°Žà°¨à±à°¨à°¿à°•à°²à±à°²à±‹ à°—à±†à°²à°¿à°šà°¿à°¨à°¾, à°“à°¡à°¿à°¨à°¾ à°¨à°¿à°¤à±à°¯à°‚ à°ªà±à°°à°œà°¾à°¸à±‡à°µà°²à±‹à°¨à±‡ à°‰à°‚à°Ÿà°¾à°¨à°¨à°¿ à°¸à±à°ªà°·à±à°Ÿà°‚à°šà±‡à°¶à°¾à°°à±. à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°…à°‚à°šà°¨à°¾à°²à°¨à± à°šà±‚à°¸à°¿ à°†à°‚à°¦à±‹à°³à°¨ à°šà±†à°‚à°¦à°•à±à°‚à°¡à°¾ à°ˆ à°¨à±†à°² 23à°µà°°à°•à± à°µà±‡à°šà°¿ à°šà±‚à°¡à°¾à°²à°¨à°¿ à°†à°¯à°¨ à°ªà±à°°à°œà°²à°•à± à°¸à±‚à°šà°¿à°‚à°šà°¾à°°à±.  à°µà°¿à°¶à°¾à°– à°µà°¨à±â€Œà°Ÿà±Œà°¨à±â€Œà°²à±‹ à°°à°‚à°œà°¾à°¨à±â€Œ à°¤à±‹à°«à°¾ à°ªà°‚à°ªà°¿à°£à±€ à°•à°¾à°°à±à°¯à°•à±à°°à°®à°‚à°²à±‹ à°ªà°¾à°²à±à°—à±Šà°¨à±à°¨ à°¸à°‚à°¦à°°à±à°­à°‚à°—à°¾ à°†à°¯à°¨ à°®à±€à°¡à°¿à°¯à°¾à°¤à±‹ à°®à°¾à°Ÿà±à°²à°¾à°¡à±à°¤à±‚.. â€˜â€˜à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œà°¤à±‹ à°®à°¾à°•à±‡à°®à±€ à°†à°‚à°¦à±‹à°³à°¨ à°²à±‡à°¦à±. à°…à°¨à°µà°¸à°°à°‚à°—à°¾ à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°‡à°šà±à°šà°¿ à°ªà±à°°à°œà°²à±à°²à±‹ à°®à°°à°¿à°‚à°¤ à°‰à°¤à±à°•à°‚à°  à°•à°²à±à°—à°¿à°¸à±à°¤à±à°¨à±à°¨à°¾à°°à±. à°“à°ªà°¿à°•à°¤à±‹ à°‰à°‚à°Ÿà±‡ à°ˆ à°¨à±†à°² 23à°¨ à°…à°¸à°²à± à°«à°²à°¿à°¤à°®à±‡ à°µà°šà±à°šà±‡à°¸à±à°¤à±à°‚à°¦à°¿. à° à°«à°²à°¿à°¤à°‚ à°µà°šà±à°šà°¿à°¨à°¾ à°ªà±à°°à°œà°¾ à°¸à°®à°¸à±à°¯à°²à°ªà±ˆ à°ªà±‹à°°à°¾à°¡à°¾à°²à°¨à°¿ à°®à°¾ à°ªà°¾à°°à±à°Ÿà±€ à°¨à°¿à°°à±à°£à°¯à°¿à°‚à°šà°¿à°‚à°¦à°¿. à°—à±†à°²à±à°ªà±‹à°Ÿà°®à±à°²à± à°¸à°¹à°œà°‚. à°ªà±à°°à°œà°² à°•à±‹à°¸à°‚ à°ªà°¨à°¿à°šà±‡à°¯à°¾à°²à°¨à±à°¨ à°­à°¾à°µà°¨à°¤à±‹ à°®à±‡à°‚ à°®à±à°‚à°¦à±à°•à±†à°³à±à°¤à±à°¨à±à°¨à°¾à°‚. à°…à°‚à°¦à±à°µà°²à±à°² à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°µà°²à±à°² à°•à°²à°¿à°—à±‡ à°ªà±à°°à°­à°¾à°µà°‚ à°®à°¾à°ªà±ˆ à°à°®à±€ à°•à°¨à°¬à°¡à°Ÿà°‚à°²à±‡à°¦à±â€™â€™ à°…à°¨à±à°¨à°¾à°°à±.\r\n','Short News','Image&Content',',1.jpg','54',1,NULL),(16,'Image News1',0,NULL,60,'','','image',',corevalue.jpg','48,50',1,NULL),(17,'Breaking News112',0,NULL,61,'à°µà°¿à°¶à°¾à°–: à°°à°¾à°·à±à°Ÿà±à°°à°‚à°²à±‹ à°œà°¨à°¸à±‡à°¨ à°ªà±à°°à°­à°¾à°µà°‚ à°ªà±†à°¦à±à°¦à°—à°¾ à°à°®à±€ à°²à±‡à°¦à°¨à°¿, à°† à°ªà°¾à°°à±à°Ÿà±€à°•à°¿ à°šà°¾à°²à°¾ à°¸à±à°µà°²à±à°ªà°‚à°—à°¾ à°®à°¾à°¤à±à°°à°®à±‡ à°¸à±€à°Ÿà±à°²à± à°µà°¸à±à°¤à°¾à°¯à°‚à°Ÿà±‹à°¨à±à°¨ à°ªà°²à± à°¸à°‚à°¸à±à°¥à°² à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°…à°‚à°šà°¨à°¾à°²à°ªà±ˆ à°œà°¨à°¸à±‡à°¨ à°µà°¿à°¶à°¾à°– à°²à±‹à°•à±â€Œà°¸à°­ à°…à°­à±à°¯à°°à±à°¥à°¿, à°¸à±€à°¬à±€à° à°®à°¾à°œà±€ à°œà±‡à°¡à±€ à°µà±€à°µà±€ à°²à°•à±à°·à±à°®à±€à°¨à°¾à°°à°¾à°¯à°£ à°¸à±à°ªà°‚à°¦à°¿à°‚à°šà°¾à°°à±. à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œà°¨à± à°¤à°¾à°¨à± à°ªà°Ÿà±à°Ÿà°¿à°‚à°šà±à°•à±‹à°¨à°¨à±à°¨à°¾à°°à±. à°Žà°¨à±à°¨à°¿à°•à°²à±à°²à±‹ à°—à±†à°²à°¿à°šà°¿à°¨à°¾, à°“à°¡à°¿à°¨à°¾ à°¨à°¿à°¤à±à°¯à°‚ à°ªà±à°°à°œà°¾à°¸à±‡à°µà°²à±‹à°¨à±‡ à°‰à°‚à°Ÿà°¾à°¨à°¨à°¿ à°¸à±à°ªà°·à±à°Ÿà°‚à°šà±‡à°¶à°¾à°°à±. à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°…à°‚à°šà°¨à°¾à°²à°¨à± à°šà±‚à°¸à°¿ à°†à°‚à°¦à±‹à°³à°¨ à°šà±†à°‚à°¦à°•à±à°‚à°¡à°¾ à°ˆ à°¨à±†à°² 23à°µà°°à°•à± à°µà±‡à°šà°¿ à°šà±‚à°¡à°¾à°²à°¨à°¿ à°†à°¯à°¨ à°ªà±à°°à°œà°²à°•à± à°¸à±‚à°šà°¿à°‚à°šà°¾à°°à±.  à°µà°¿à°¶à°¾à°– à°µà°¨à±â€Œà°Ÿà±Œà°¨à±â€Œà°²à±‹ à°°à°‚à°œà°¾à°¨à±â€Œ à°¤à±‹à°«à°¾ à°ªà°‚à°ªà°¿à°£à±€ à°•à°¾à°°à±à°¯à°•à±à°°à°®à°‚à°²à±‹ à°ªà°¾à°²à±à°—à±Šà°¨à±à°¨ à°¸à°‚à°¦à°°à±à°­à°‚à°—à°¾ à°†à°¯à°¨ à°®à±€à°¡à°¿à°¯à°¾à°¤à±‹ à°®à°¾à°Ÿà±à°²à°¾à°¡à±à°¤à±‚.. â€˜â€˜à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œà°¤à±‹ à°®à°¾à°•à±‡à°®à±€ à°†à°‚à°¦à±‹à°³à°¨ à°²à±‡à°¦à±. à°…à°¨à°µà°¸à°°à°‚à°—à°¾ à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°‡à°šà±à°šà°¿ à°ªà±à°°à°œà°²à±à°²à±‹ à°®à°°à°¿à°‚à°¤ à°‰à°¤à±à°•à°‚à°  à°•à°²à±à°—à°¿à°¸à±à°¤à±à°¨à±à°¨à°¾à°°à±. à°“à°ªà°¿à°•à°¤à±‹ à°‰à°‚à°Ÿà±‡ à°ˆ à°¨à±†à°² 23à°¨ à°…à°¸à°²à± à°«à°²à°¿à°¤à°®à±‡ à°µà°šà±à°šà±‡à°¸à±à°¤à±à°‚à°¦à°¿. à° à°«à°²à°¿à°¤à°‚ à°µà°šà±à°šà°¿à°¨à°¾ à°ªà±à°°à°œà°¾ à°¸à°®à°¸à±à°¯à°²à°ªà±ˆ à°ªà±‹à°°à°¾à°¡à°¾à°²à°¨à°¿ à°®à°¾ à°ªà°¾à°°à±à°Ÿà±€ à°¨à°¿à°°à±à°£à°¯à°¿à°‚à°šà°¿à°‚à°¦à°¿. à°—à±†à°²à±à°ªà±‹à°Ÿà°®à±à°²à± à°¸à°¹à°œà°‚. à°ªà±à°°à°œà°² à°•à±‹à°¸à°‚ à°ªà°¨à°¿à°šà±‡à°¯à°¾à°²à°¨à±à°¨ à°­à°¾à°µà°¨à°¤à±‹ à°®à±‡à°‚ à°®à±à°‚à°¦à±à°•à±†à°³à±à°¤à±à°¨à±à°¨à°¾à°‚. à°…à°‚à°¦à±à°µà°²à±à°² à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°µà°²à±à°² à°•à°²à°¿à°—à±‡ à°ªà±à°°à°­à°¾à°µà°‚ à°®à°¾à°ªà±ˆ à°à°®à±€ à°•à°¨à°¬à°¡à°Ÿà°‚à°²à±‡à°¦à±â€™â€™ à°…à°¨à±à°¨à°¾à°°à±. ','Short News','Image&Content',',logo.png','52',1,NULL),(20,'Content News',0,NULL,60,'à°µà°¿à°¶à°¾à°–: à°°à°¾à°·à±à°Ÿà±à°°à°‚à°²à±‹ à°œà°¨à°¸à±‡à°¨ à°ªà±à°°à°­à°¾à°µà°‚ à°ªà±†à°¦à±à°¦à°—à°¾ à°à°®à±€ à°²à±‡à°¦à°¨à°¿, à°† à°ªà°¾à°°à±à°Ÿà±€à°•à°¿ à°šà°¾à°²à°¾ à°¸à±à°µà°²à±à°ªà°‚à°—à°¾ à°®à°¾à°¤à±à°°à°®à±‡ à°¸à±€à°Ÿà±à°²à± à°µà°¸à±à°¤à°¾à°¯à°‚à°Ÿà±‹à°¨à±à°¨ à°ªà°²à± à°¸à°‚à°¸à±à°¥à°² à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°…à°‚à°šà°¨à°¾à°²à°ªà±ˆ à°œà°¨à°¸à±‡à°¨ à°µà°¿à°¶à°¾à°– à°²à±‹à°•à±â€Œà°¸à°­ à°…à°­à±à°¯à°°à±à°¥à°¿, à°¸à±€à°¬à±€à° à°®à°¾à°œà±€ à°œà±‡à°¡à±€ à°µà±€à°µà±€ à°²à°•à±à°·à±à°®à±€à°¨à°¾à°°à°¾à°¯à°£ à°¸à±à°ªà°‚à°¦à°¿à°‚à°šà°¾à°°à±. à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œà°¨à± à°¤à°¾à°¨à± à°ªà°Ÿà±à°Ÿà°¿à°‚à°šà±à°•à±‹à°¨à°¨à±à°¨à°¾à°°à±. à°Žà°¨à±à°¨à°¿à°•à°²à±à°²à±‹ à°—à±†à°²à°¿à°šà°¿à°¨à°¾, à°“à°¡à°¿à°¨à°¾ à°¨à°¿à°¤à±à°¯à°‚ à°ªà±à°°à°œà°¾à°¸à±‡à°µà°²à±‹à°¨à±‡ à°‰à°‚à°Ÿà°¾à°¨à°¨à°¿ à°¸à±à°ªà°·à±à°Ÿà°‚à°šà±‡à°¶à°¾à°°à±. à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°…à°‚à°šà°¨à°¾à°²à°¨à± à°šà±‚à°¸à°¿ à°†à°‚à°¦à±‹à°³à°¨ à°šà±†à°‚à°¦à°•à±à°‚à°¡à°¾ à°ˆ à°¨à±†à°² 23à°µà°°à°•à± à°µà±‡à°šà°¿ à°šà±‚à°¡à°¾à°²à°¨à°¿ à°†à°¯à°¨ à°ªà±à°°à°œà°²à°•à± à°¸à±‚à°šà°¿à°‚à°šà°¾à°°à±.  à°µà°¿à°¶à°¾à°– à°µà°¨à±â€Œà°Ÿà±Œà°¨à±â€Œà°²à±‹ à°°à°‚à°œà°¾à°¨à±â€Œ à°¤à±‹à°«à°¾ à°ªà°‚à°ªà°¿à°£à±€ à°•à°¾à°°à±à°¯à°•à±à°°à°®à°‚à°²à±‹ à°ªà°¾à°²à±à°—à±Šà°¨à±à°¨ à°¸à°‚à°¦à°°à±à°­à°‚à°—à°¾ à°†à°¯à°¨ à°®à±€à°¡à°¿à°¯à°¾à°¤à±‹ à°®à°¾à°Ÿà±à°²à°¾à°¡à±à°¤à±‚.. â€˜â€˜à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œà°¤à±‹ à°®à°¾à°•à±‡à°®à±€ à°†à°‚à°¦à±‹à°³à°¨ à°²à±‡à°¦à±. à°…à°¨à°µà°¸à°°à°‚à°—à°¾ à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°‡à°šà±à°šà°¿ à°ªà±à°°à°œà°²à±à°²à±‹ à°®à°°à°¿à°‚à°¤ à°‰à°¤à±à°•à°‚à°  à°•à°²à±à°—à°¿à°¸à±à°¤à±à°¨à±à°¨à°¾à°°à±. à°“à°ªà°¿à°•à°¤à±‹ à°‰à°‚à°Ÿà±‡ à°ˆ à°¨à±†à°² 23à°¨ à°…à°¸à°²à± à°«à°²à°¿à°¤à°®à±‡ à°µà°šà±à°šà±‡à°¸à±à°¤à±à°‚à°¦à°¿. à° à°«à°²à°¿à°¤à°‚ à°µà°šà±à°šà°¿à°¨à°¾ à°ªà±à°°à°œà°¾ à°¸à°®à°¸à±à°¯à°²à°ªà±ˆ à°ªà±‹à°°à°¾à°¡à°¾à°²à°¨à°¿ à°®à°¾ à°ªà°¾à°°à±à°Ÿà±€ à°¨à°¿à°°à±à°£à°¯à°¿à°‚à°šà°¿à°‚à°¦à°¿. à°—à±†à°²à±à°ªà±‹à°Ÿà°®à±à°²à± à°¸à°¹à°œà°‚. à°ªà±à°°à°œà°² à°•à±‹à°¸à°‚ à°ªà°¨à°¿à°šà±‡à°¯à°¾à°²à°¨à±à°¨ à°­à°¾à°µà°¨à°¤à±‹ à°®à±‡à°‚ à°®à±à°‚à°¦à±à°•à±†à°³à±à°¤à±à°¨à±à°¨à°¾à°‚. à°…à°‚à°¦à±à°µà°²à±à°² à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°µà°²à±à°² à°•à°²à°¿à°—à±‡ à°ªà±à°°à°­à°¾à°µà°‚ à°®à°¾à°ªà±ˆ à°à°®à±€ à°•à°¨à°¬à°¡à°Ÿà°‚à°²à±‡à°¦à±â€™â€™ à°…à°¨à±à°¨à°¾à°°à±.','Long News','Image&Content',',1.jpg','58',1,NULL),(22,'Image with Content1',1,'Nethranandni',60,'à°µà°¿à°¶à°¾à°–: à°°à°¾à°·à±à°Ÿà±à°°à°‚à°²à±‹ à°œà°¨à°¸à±‡à°¨ à°ªà±à°°à°­à°¾à°µà°‚ à°ªà±†à°¦à±à°¦à°—à°¾ à°à°®à±€ à°²à±‡à°¦à°¨à°¿, à°† à°ªà°¾à°°à±à°Ÿà±€à°•à°¿ à°šà°¾à°²à°¾ à°¸à±à°µà°²à±à°ªà°‚à°—à°¾ à°®à°¾à°¤à±à°°à°®à±‡ à°¸à±€à°Ÿà±à°²à± à°µà°¸à±à°¤à°¾à°¯à°‚à°Ÿà±‹à°¨à±à°¨ à°ªà°²à± à°¸à°‚à°¸à±à°¥à°² à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°…à°‚à°šà°¨à°¾à°²à°ªà±ˆ à°œà°¨à°¸à±‡à°¨ à°µà°¿à°¶à°¾à°– à°²à±‹à°•à±â€Œà°¸à°­ à°…à°­à±à°¯à°°à±à°¥à°¿, à°¸à±€à°¬à±€à° à°®à°¾à°œà±€ à°œà±‡à°¡à±€ à°µà±€à°µà±€ à°²à°•à±à°·à±à°®à±€à°¨à°¾à°°à°¾à°¯à°£ à°¸à±à°ªà°‚à°¦à°¿à°‚à°šà°¾à°°à±. à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œà°¨à± à°¤à°¾à°¨à± à°ªà°Ÿà±à°Ÿà°¿à°‚à°šà±à°•à±‹à°¨à°¨à±à°¨à°¾à°°à±. à°Žà°¨à±à°¨à°¿à°•à°²à±à°²à±‹ à°—à±†à°²à°¿à°šà°¿à°¨à°¾, à°“à°¡à°¿à°¨à°¾ à°¨à°¿à°¤à±à°¯à°‚ à°ªà±à°°à°œà°¾à°¸à±‡à°µà°²à±‹à°¨à±‡ à°‰à°‚à°Ÿà°¾à°¨à°¨à°¿ à°¸à±à°ªà°·à±à°Ÿà°‚à°šà±‡à°¶à°¾à°°à±. à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°…à°‚à°šà°ªà±‹à°²à±à°¸à±â€Œ à°…à°‚à°šà°ªà±‹à°²à±à°¸à±â€Œ à°…à°‚à°š','Long News','Image&Content',',1.jpg','60',1,NULL);
/*!40000 ALTER TABLE `breaking_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_type`
--

DROP TABLE IF EXISTS `category_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_type` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `category_type` varchar(225) NOT NULL,
  `language` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_type`
--

LOCK TABLES `category_type` WRITE;
/*!40000 ALTER TABLE `category_type` DISABLE KEYS */;
INSERT INTO `category_type` VALUES (54,'à°¸à°¿à°¨à°¿à°®à°¾',1,'cupload/images.jpg'),(60,'à°°à°¾à°œà°•à±€à°¯à°‚',1,'cupload/flagsnew-kdQD--621x414@LiveMint.jpg'),(61,'à°—à°¾à°¸à°¿à°ªà±à°¸à± ',1,'cupload/Gossips-logo-our-wines-1.jpg'),(62,'à°¸à±à°ªà±‹à°°à±à°Ÿà±à°¸à± ',1,'cupload/sports.jpg'),(63,'à°†à°°à±‹à°—à±à°¯à°‚ ',1,'cupload/lady-doctor-png-1.png');
/*!40000 ALTER TABLE `category_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) DEFAULT NULL,
  `category_type` int(225) NOT NULL,
  `content` varchar(9500) DEFAULT NULL,
  `news_length` varchar(250) DEFAULT NULL,
  `type` varchar(250) NOT NULL,
  `image` mediumtext,
  `video_link` varchar(225) DEFAULT NULL,
  `video_thumbnail_image` mediumtext,
  `location` varchar(225) NOT NULL,
  `question` varchar(250) DEFAULT NULL,
  `opt_a` varchar(250) DEFAULT NULL,
  `opt_b` varchar(250) DEFAULT NULL,
  `opt_c` varchar(250) DEFAULT NULL,
  `opt_d` varchar(250) DEFAULT NULL,
  `reporter` tinyint(4) DEFAULT NULL,
  `user` tinyint(4) DEFAULT NULL,
  `approval_status` int(10) DEFAULT NULL,
  `reporter_name` varchar(250) DEFAULT NULL,
  `user_name` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `youtube_link` varchar(200) DEFAULT NULL,
  `language` int(11) NOT NULL,
  `status` varchar(40) DEFAULT NULL,
  `thumbnail_image` mediumtext,
  `user_mobile` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `news_ibfk_1` (`video_link`),
  KEY `category_type` (`category_type`),
  KEY `location` (`location`),
  CONSTRAINT `news_ibfk_3` FOREIGN KEY (`category_type`) REFERENCES `category_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=213 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (105,'SPIDER-MAN: FAR FROM HOME - Official Trailer1',54,'','','youtube','','','','65','','','','','',0,NULL,1,NULL,NULL,'2019-05-07 13:31:32','WB-srGyNWts',1,NULL,'',NULL),(115,'Maharshi 1',54,'','','image',',asda.jpg','','','63','','','','','',0,NULL,1,NULL,NULL,'2019-05-09 09:57:56','',1,NULL,',News1.jpg',NULL),(131,'à°šà±‚à°¡à°Ÿà°¾à°¨à°¿à°•à°¿ à°¬à°¾à°—à±‹à°•à°ªà±‹à°¯à°¿à°¨à°¾ à°¨à°¨à±à°¨à± à°¸à±à°µà±€à°•à°°à°¿à°‚à°šà°¾à°°à±',54,' â€˜à°šà±‚à°¡à°Ÿà°¾à°¨à°¿à°•à°¿ à°…à°‚à°¤à°—à°¾ à°¬à°¾à°—à±‹à°•à°ªà±‹à°¯à°¿à°¨à°¾ à°¨à°¨à±à°¨à± à°¨à°Ÿà±à°¡à°¿à°—à°¾ à°¸à±à°µà±€à°•à°°à°¿à°‚à°šà°¿à°¨à°‚à°¦à±à°•à± à°§à°¨à±à°¯à°µà°¾à°¦à°¾à°²à±â€™ à°…à°‚à°Ÿà±à°¨à±à°¨à°¾à°°à± à°¸à°¿à°¨à±€ à°¨à°Ÿà±à°¡à± â€˜à°…à°²à±à°²à°°à°¿â€™ à°¨à°°à±‡à°¶à±â€Œ. à°ˆ à°®à°§à±à°¯à°•à°¾à°²à°‚à°²à±‹ à°¨à°°à±‡à°¶à± à°¨à°Ÿà°¿à°‚à°šà°¿à°¨ à°¸à°¿à°¨à°¿à°®à°¾à°²à± à°…à°‚à°¤à°—à°¾ à°ªà±à°°à±‡à°•à±à°·à°•à±à°²à°¨à± à°†à°•à°Ÿà±à°Ÿà±à°•à±‹à°²à±‡à°¦à±. à°…à°²à°¾à°‚à°Ÿà°¿ à°¸à°®à°¯à°‚à°²à±‹ à°†à°¯à°¨ â€˜à°®à°¹à°°à±à°·à°¿â€™ à°¸à°¿à°¨à°¿à°®à°¾à°¤à±‹ à°®à°³à±à°²à±€ à°ªà±à°°à±‡à°•à±à°·à°•à±à°² à°®à°¨à°¸à±à°¨à± à°¦à±‹à°šà±à°•à±à°¨à±à°¨à°¾à°°à±. à°—à±à°°à±à°µà°¾à°°à°‚ à°ªà±à°°à±‡à°•à±à°·à°•à±à°² à°®à±à°‚à°¦à±à°•à± à°µà°šà±à°šà°¿à°¨ â€˜à°®à°¹à°°à±à°·à°¿â€™ à°šà°¿à°¤à±à°°à°‚ à°®à°‚à°šà°¿ à°Ÿà°¾à°•à±â€Œ à°…à°‚à°¦à±à°•à±à°‚à°Ÿà±‹à°‚à°¦à°¿. ','Short News','content','','','','61','','','','','',0,NULL,1,NULL,NULL,'2019-05-10 07:33:41','',1,NULL,'',NULL),(132,'â€˜à°…à°¯à±‹à°§à±à°¯â€™ à°ªà°°à°¿à°·à±à°•à°¾à°°à°¾à°¨à°¿à°•à°¿ à°®à°°à°¿à°‚à°¤ à°—à°¡à±à°µà±',60,'à°°à°¾à°® à°œà°¨à±à°®à°­à±‚à°®à°¿-à°¬à°¾à°¬à±à°°à±€ à°®à°¸à±€à°¦à± à°­à±‚ à°µà°¿à°µà°¾à°¦à°‚ à°¸à°®à°¸à±à°¯ à°¸à°¾à°®à°°à°¸à±à°¯ à°ªà°°à°¿à°·à±à°•à°¾à°°à°¾à°¨à°¿à°•à°¿ à°—à°¾à°¨à±‚ à°®à°§à±à°¯à°µà°°à±à°¤à°¿à°¤à±à°µ à°•à°®à°¿à°Ÿà±€à°•à°¿ à°¸à±à°ªà±à°°à±€à°‚à°•à±‹à°°à±à°Ÿà± à°®à°°à°¿à°‚à°¤ à°—à°¡à±à°µà± à°‡à°šà±à°šà°¿à°‚à°¦à°¿. à°ˆ à°µà±à°¯à°µà°¹à°¾à°°à°‚à°²à±‹ à°®à°§à±à°¯à°‚à°¤à°° à°¨à°¿à°µà±‡à°¦à°¿à°•à°¨à± à°•à°®à°¿à°Ÿà±€ à°‡à°Ÿà±€à°µà°² à°¨à±à°¯à°¾à°¯à°¸à±à°¥à°¾à°¨à°¾à°¨à°¿à°•à°¿ à°¸à°®à°°à±à°ªà°¿à°‚à°šà°¿à°‚à°¦à°¿. à°…à°¯à°¿à°¤à±‡ à°¸à°¾à°®à°°à°¸à±à°¯, à°…à°‚à°¦à°°à°¿à°•à±€ à°†à°®à±‹à°¦à°¯à±‹à°—à±à°¯à°®à±ˆà°¨ à°ªà°°à°¿à°·à±à°•à°¾à°°à°¾à°¨à±à°¨à°¿ à°•à°¨à±à°—à±Šà°¨à±‡à°‚à°¦à±à°•à± à°¤à°®à°•à± à°®à°°à°¿à°‚à°¤ à°¸à°®à°¯à°‚ à°•à°¾à°µà°¾à°²à°¨à°¿ à°®à°§à±à°¯à°µà°°à±à°¤à°¿à°¤à±à°µ à°•à°®à°¿à°Ÿà±€ à°•à±‹à°°à±à°Ÿà±à°¨à± à°•à±‹à°°à°¿à°‚à°¦à°¿. à°‡à°‚à°¦à±à°•à± à°ªà±à°°à°§à°¾à°¨ à°¨à±à°¯à°¾à°¯à°®à±‚à°°à±à°¤à°¿ à°œà°¸à±à°Ÿà°¿à°¸à±â€Œ à°°à°‚à°œà°¨à±â€Œ à°—à±Šà°—à±Šà°¯à±â€Œ à°¨à±‡à°¤à±ƒà°¤à±à°µà°‚à°²à±‹à°¨à°¿ à°§à°°à±à°®à°¾à°¸à°¨à°‚ à°…à°‚à°—à±€à°•à°°à°¿à°‚à°šà°¿à°‚à°¦à°¿.12','Short News','Image&Content',',Jaipur-HD-wallpapers-1.jpg','','','60','','','','','',0,NULL,1,NULL,NULL,'2019-05-10 07:36:35','',1,NULL,',imagewithcontnt.jpg',NULL),(133,'Ad1',61,'','','Advertisements',',20180226194421-GettyImages-874077528.jpeg','','','59','','','','','',0,NULL,1,NULL,NULL,'2019-05-10 08:00:06','',1,NULL,',preethi001.jpg',NULL),(139,' à°µà°¿à°µà°¾à°¦à°¾à°²à°•à± à°•à±‡à°‚à°¦à±à°° à°¬à°¿à°‚à°¦à±à°µà±à°—à°¾ à°‰à°‚à°¡à±‡ à°ªà°¾à°•à°¿à°¸à±à°¥à°¾à°¨à±â€Œ à°®à°¾à°œà±€ à°•à±à°°à°¿à°•à±†à°Ÿà°°à±â€Œ à°·à°¾à°¹à°¿à°¦à±€ à°…à°«à±à°°à°¿à°¦à°¿ à°ˆ à°®à°§à±à°¯ à°¤à°°à°šà±‚ à°µà°¾à°°à±à°¤à°²à±à°²à±‹ à°¨à°¿à°²à±à°¸à±à°¤à±à°¨à±à°¨à°¾à°¡à±.',60,'','','image',',image news.jpg','','','58','','','','','',0,NULL,1,NULL,NULL,'2019-05-10 13:57:08','',1,NULL,',News1.jpg',NULL),(148,'Kanchana3',61,'','','video','','',',Video 1.jpg','57','','','','','',0,NULL,1,NULL,NULL,'2019-05-11 11:52:45','',1,NULL,'',NULL),(163,'In India, Paper Currency first started in the year?',54,'','','Polling','','','','56','In India, Paper Currency first started in the year?','a','b','c','d',0,NULL,1,NULL,NULL,'2019-05-14 08:33:51','',1,NULL,'',NULL),(164,'Image News N1',60,'','','image',',3-512.png','','','55','','','','','',0,NULL,1,NULL,NULL,'2019-05-17 11:30:41','',1,NULL,',1_1548667978_178666075.jpeg',NULL),(165,'Image & Content News N',60,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','Long News','Image&Content',',estudiantes.jpg','','','54','','','','','',0,NULL,1,NULL,NULL,'2019-05-17 11:31:25','',1,NULL,',canva-student.jpg',NULL),(168,'Test',54,'','','video','','',',News1.jpg','53,65','','','','','',0,NULL,1,NULL,NULL,'2019-05-17 12:17:22','',1,NULL,'',NULL),(169,'Nuvvani Idhi Needani Lyrical || Maharshi Songs || MaheshBabu',54,'','','youtube','','','','52','','','','','',0,NULL,1,NULL,NULL,'2019-05-17 12:53:42','Q_dj4LbWAJw',1,NULL,'',NULL),(196,'Image $ content',60,'à°µà°¿à°¶à°¾à°–: à°°à°¾à°·à±à°Ÿà±à°°à°‚à°²à±‹ à°œà°¨à°¸à±‡à°¨ à°ªà±à°°à°­à°¾à°µà°‚ à°ªà±†à°¦à±à°¦à°—à°¾ à°à°®à±€ à°²à±‡à°¦à°¨à°¿, à°† à°ªà°¾à°°à±à°Ÿà±€à°•à°¿ à°šà°¾à°²à°¾ à°¸à±à°µà°²à±à°ªà°‚à°—à°¾ à°®à°¾à°¤à±à°°à°®à±‡ à°¸à±€à°Ÿà±à°²à± à°µà°¸à±à°¤à°¾à°¯à°‚à°Ÿà±‹à°¨à±à°¨ à°ªà°²à± à°¸à°‚à°¸à±à°¥à°² à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œ à°…à°‚à°šà°¨à°¾à°²à°ªà±ˆ à°œà°¨à°¸à±‡à°¨ à°µà°¿à°¶à°¾à°– à°²à±‹à°•à±â€Œà°¸à°­ à°…à°­à±à°¯à°°à±à°¥à°¿, à°¸à±€à°¬à±€à° à°®à°¾à°œà±€ à°œà±‡à°¡à±€ à°µà±€à°µà±€ à°²à°•à±à°·à±à°®à±€à°¨à°¾à°°à°¾à°¯à°£ à°¸à±à°ªà°‚à°¦à°¿à°‚à°šà°¾à°°à±. à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œà°¨à± à°¤à°¾à°¨à± à°ªà°Ÿà±à°Ÿà°¿à°‚à°šà±à°•à±‹à°¨à°¨à±à°¨à°¾à°°à±. à°Žà°¨à±à°¨à°¿à°•à°²à±à°²à±‹ à°—à±†à°²à°¿à°šà°¿à°¨à°¾à°¯à°£ à°¸à±à°ªà°‚à°¦à°¿à°‚à°šà°¾à°°à±. à°Žà°—à±à°œà°¿à°Ÿà±â€Œ à°ªà±‹à°²à±à°¸à±â€Œà°¨à± à°¤à°¾à°¨à± à°ªà°Ÿà±à°Ÿà°¿à°‚à°šà±à°•à±‹à°¨à°¨à±à°¨à°¾à°°à±. .  à°¤à°¾à°¨à± à°ªà°Ÿà±à°Ÿà°¿à°‚à°šà±à°•à±‹à°¨à°¨à±à°¨à°¾à°°à±. . ','Long News','Image&Content',',estudiantes.jpg','','','59,62','','','','','',0,NULL,1,NULL,NULL,'2019-05-21 05:40:54','',1,NULL,',corevalue.jpg',NULL),(200,'test poll',54,'','','Polling','','','','52,53','test poll','A','B','C','D',0,NULL,1,NULL,NULL,'2019-05-21 10:08:08','',1,NULL,'',NULL),(202,'Jagan Is Next CM of AP',60,'congrats jagan garu.','Short News','content',',','',NULL,'à°•à°¾à°®à°¾à°°à±†à°¡à±à°¡à°¿',NULL,NULL,NULL,NULL,NULL,NULL,1,1,NULL,'','2019-05-24 19:22:35',NULL,1,NULL,NULL,''),(203,'JAGAN IS CM OF AP',61,'CONGRATS JAGAN GARU','Short News','Image&Content',',file1558725843379.jpg','',NULL,'à°•à°°à±€à°‚à°¨à°—à°°à±',NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,'','2019-05-24 19:24:06',NULL,1,NULL,NULL,''),(204,'Test new App',61,'test content app','Short News','content',',','',NULL,'â€‹à°¨à°¿à°œà°¾à°®à°¾à°¬à°¾à°¦à± ',NULL,NULL,NULL,NULL,NULL,NULL,1,1,NULL,'','2019-05-25 06:01:11',NULL,1,NULL,NULL,''),(205,'Andhra Pradesh Polling Results Out Now',60,'Jagan is the upcoming CM of Andhra Pradesh.','Short News','content',',','',NULL,'à°•à°°à±€à°‚à°¨à°—à°°à±',NULL,NULL,NULL,NULL,NULL,NULL,1,1,NULL,'','2019-05-26 10:30:19',NULL,1,NULL,NULL,''),(206,'Andhra Pradesh Polling Results Out Now',61,'Jagan is the upcoming cm of ap','Short News','content',',','',NULL,'à°•à°°à±€à°‚à°¨à°—à°°à±',NULL,NULL,NULL,NULL,NULL,NULL,1,1,NULL,'','2019-05-26 10:32:14',NULL,1,NULL,NULL,''),(207,'Test Header',60,'Test content hi how r you','Short News','content',',','',NULL,'à°¨à°²à±à°²à°—à±Šà°‚à°¡',NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,'','2019-05-26 16:49:34',NULL,1,NULL,NULL,''),(208,'Polling News',61,'','','Polling','','','','60,64','CM Yevaru ?','Babu','Jagan','Palvan','KA Paul',0,NULL,1,NULL,NULL,'2019-05-27 11:57:50','',1,NULL,'',NULL),(209,'Poll',60,'','','Polling','','','','52,54,60,63','What is the Best Product ?','Fair & Lovely','Patanjali','Lakme','Nourish',0,NULL,1,NULL,NULL,'2019-05-27 11:58:59','',1,NULL,'',NULL),(210,'Pollllllling',60,'','','Polling','','','','53,59,64','Question1','optiona','optionb','optionc','optiond',0,NULL,1,NULL,NULL,'2019-05-27 12:19:27','',1,NULL,'',NULL),(211,'Test Header Ramesh',61,'Test corrections ramesh I will be in a little bit to get a new job and I am','Short News','content',',','',NULL,'à°•à°¾à°®à°¾à°°à±†à°¡à±à°¡à°¿',NULL,NULL,NULL,NULL,NULL,NULL,1,1,NULL,'','2019-05-29 07:11:07',NULL,1,NULL,NULL,''),(212,'Notification Test News',60,'','','image',',logo.png','','','52,53,54,55,56,57,58,59,60,61,62,63,64,65,66','','','','','',0,NULL,1,NULL,NULL,'2019-05-31 05:02:15','',1,NULL,',photo-1531482615713-2afd69097998.jpg',NULL);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_location`
--

DROP TABLE IF EXISTS `news_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_location` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `location` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_location`
--

LOCK TABLES `news_location` WRITE;
/*!40000 ALTER TABLE `news_location` DISABLE KEYS */;
INSERT INTO `news_location` VALUES (52,'à°†à°¦à°¿à°²à°¾à°¬à°¾à°¦à±'),(53,'à°•à°°à±€à°‚à°¨à°—à°°à±'),(54,'à°•à°¾à°®à°¾à°°à±†à°¡à±à°¡à°¿'),(55,'à°–à°®à±à°®à°‚'),(56,'à°¨à°²à±à°²à°—à±Šà°‚à°¡'),(57,'â€‹à°¨à°¿à°œà°¾à°®à°¾à°¬à°¾à°¦à± '),(58,'à°­à°¦à±à°°à°¾à°¦à±à°°à°¿ '),(59,'â€‹ à°®à°¹à°¬à±‚à°¬à± à°¨à°—à°°à±'),(60,'â€‹ à°®à±†à°¦à°•à±'),(61,'à°®à±‡à°¡à±à°šà°²à± '),(62,'à°°à°‚à°—à°¾à°°à±†à°¡à±à°¡à°¿ '),(63,'à°µà°°à°‚à°—à°²à± '),(64,'à°µà°¿à°•à°¾à°°à°¾à°¬à°¾à°¦à±'),(65,'à°¹à±ˆà°¦à°°à°¾à°¬à°¾à°¦à±'),(66,'â€‹à°°à°¾à°®à°—à±à°‚à°¡à°‚ â€‹  ');
/*!40000 ALTER TABLE `news_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gcm_id` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (1,'f9ghirDQBtY:APA91bEnI7qTVsTTTf3l3fWAlt57_lFqBRIcInCPYHH0olEqzZUZMbyFRIGrCCG2eGDwnagfv6HlQyM769hV_hBFwBKd996yIDnr55Vp8-5W6m8jsfA7m59FMWbj3RALTCr7L7yoH22U'),(2,'dZ6G97p-M7E:APA91bGQdfJBoZ3nA5tiArSbVlI79eksIYSqbFNIc1_niAM1oNbuRoHenUaaL8aKKvv2SP2bqHW88Xhds-CWZFX8UyzHwZkXgKuS0-jPUydRX9jLudcT0-Fxd9azjTdiTaidL7l2A8Uk'),(3,'d4WCWGfI-Uc:APA91bFuTbG25xNism_yIy7jOSF9x_EkfDXp0vOfTB1njtv0n4ZwOqFdB98JYGZxNPaWspUUNHHYGwYBOqwQhW8N-shbq70RtEvcfENWxcHtbWQikQ6FUrfdxOt10efFwTw0sb77_s7N'),(4,'drL9fSFZork:APA91bH9RIkPa0IYfJrxkB1v00O8PeO578HH-6TgJpK-nC08m74zCeO3FscF4N5hQeq_8alkPkg9LaAlKoysbPPRA3jOvaF_oJbGa8TuU8RBgaQkZ6Gxp9ROMwR8d_Yzm4QnWd-30g9A'),(5,'emyCvy8sW6s:APA91bH3lxC7CPNR7G7nH7fZBVM7PboLYdGhvflT_Y4ZIipYC8CNpKzGCP1X6JBh_EKHU6QpJBgFivKSUZMPM_PYEbJAiNsUlyz36kKoGpvrD5F9vz-RMpWXRYDCI-4jF-js9bQZkVrs'),(6,'fivjkOp0NLc:APA91bFgxRWK4OORM_MuRoglCUxbXjMLkBAWTxlETziUz3EfWwpUzIGwXdxKXU8JiJXWMZch4W8r5IdUkBaTCxiI9LZJcCoCoDFpk8Dv6iv722PXGKpfM-hNhgCX2I79votX0q1DIrrS'),(7,'egJDWZKwJG8:APA91bEEUPGDoM8lSSGikd8qp_WWRrPkEq1722TcdxV5hbtRe_adERCufCDAz23w5Uv2aS-sWObVIo1hOJmL7irLeHKeo00qETBlUkhXglwMUH4cm6q8LzHp7X9D-_dMp-unuvGsExjU'),(8,'cZhO-RRKSvQ:APA91bE8nFJCGTCQcRV9TGzhPD2h5O-W7faWc0elpOdtzMx2rn6D95XWZBwqh5QCwei2AHjOV9he-hNQ6V_p5ejaoNocM7ywrZjwBiZjaju_8BIDJppK8SS1Dsm5DSVz5VXWKKQME3dS'),(9,'fO8ExuJm5iA:APA91bFGgFxg5ZpVpGWeGvVJWfd84B83i70SUNpPrsdJ71XBj0MdLSgg_K7SjnuOy_5DWjnicNTGzNVpeDlMasSLgisfkB76zoNLLaq8SQLvNsTE_mqK-gA_xXPw1j_CXPxATp0LAYat'),(10,'dLQniHhJmYw:APA91bFiGKOBl7nCI3Y9Yz-Se3VA0fRKw04BTGrokP8xYHovQI4CJuN90gXhisg1Jkea5xEv5HZRkIY5V_jhlNmF1xwkmdRuEv8AfGKt4X0AoRxSa39nvOAafawOPfCYrV3WfOYPSrnk'),(11,'eCIZ7N-aggI:APA91bG414KkMgniCw1u6oGcIuVEMPCeC0PtKE5MRFN0EQdRAkwJSKELw8jtdyAw_L7seIaFKqUocC9JUUoct8lom8YdvkIHZc18Fq2oymJnlYe3Wz3bj9uccqtHvbmpMMllpzHxbSmu'),(12,'dqmr7QwBkAw:APA91bFIyXPHUu7_AC_u7nlbfViYrtYCcw-msLCieZ_GOyJRGkTSIVQEyRmqCeVT8WHcnDMi1UjdB1mO2drj3AQTgRY0DA4BJS_ncrIBInw7q5pD4-ev1H1c1qVCKTPPgswJWJrsQkYJ'),(13,'fATtDFGEtnw:APA91bHL0Z7bDVZCxZlJWxbDT54Yva1t9mzHStkJcgw0cGueGQdH6ve_ciSZSLqchlI0735wcaUs-TjEFW1wuD9nz0VCYDTrNvsYq9aRPMimBbcDOj3jE0U84F5v318hHXe_rixIo6aU'),(14,'fQ9IRM9tW-Q:APA91bHbTAP8-tWAlOi600loHJx5uzMzeeAF_YYSsajbbNDWfdCRze7aG3CmnBRr7QYN9Lkkp_XEN9HCWTryCeRIQTcg7VQbMZB2tJ0UC2-qHFdlY50exv0shYAfiH6dI0T4VE8KQHT0'),(15,'eHEe-GjQW2A:APA91bGbyxTTd8bJ11X4Yv-Ur2e60pqs6Z-MXO95LR1wvLjFY4C6KhxDMm9kSn04reoqNKCj34xaBP8XI-MBP_OCjqTU2k4ograCTWjyMbxmhW-Nacr_CCyPizNqeatyAGFFugOq7blL'),(16,'e7mmVPW23P0:APA91bFCYCA2stJ76CPT4lwYAoG_6wOP0DK6vHUPXr7c4WrZ2I-Z6MGxQyXgTUH7QJZ16eFOXt79ODe74NJHPjI5YCdRWYv173umk98LOJuw3xyIuowgvrPC3odCk6ET71CsRsjHXpq1'),(17,'c5jND34lalc:APA91bFEae-frG9KMtPqw9JOcabF0Tsg1z0N6z_cTV_8Vy4XG9BxBoAbyJcoYbhv8wCaEa0eo8T-MhLIVXi5x65jj9iQMeU1apeLVh665h9NHbsh63sAK219ETk9S44YpVpcPVf4-cvP'),(18,'dJvThw7_4-4:APA91bE77EyrAPB4WUQyLfnV1DrKwNOfTmAcLmeqgoZYMYQjSWccEP--wzxRRM-E6wR-1aCR4zDXtXnV5hsedoDVTyGYvD1706PZYSxGMxBFbmJc0NLPcD4xV4XzuXLeyTa4g3anQgxU'),(19,'dU2YNwu_EqM:APA91bHNEXyJWMm16vNoCb-uMvmt8dS6s2U7paGI_bK77pLTaEqEAEAkliK45QCBV3xhR1ALJ3WggXGsYQXC9tnYPQj30HO_iqL-2opZe2u8M8H3cWWa_82nc43peB7hq_aCnw7NLA2E'),(20,'dTg16A6tE_M:APA91bH9tGKLnWhK4_jd3Frio86UQ0a6jpZRQ-ui-KVE8b4zIfdsYCxUZ3yBUP5V0DwDgdOZ1sHGdcGX3g2ex5L8xyL0r-ytxJTtuw1kQM3hYUR0ijOkmL6uWv-tjo2ZgMNnVSa_TC5t'),(21,'f_onVUziBk4:APA91bE8hVmnIF8zX9VAPAK4oUqtC60TTHkvCQ8aZXuW8T0yr70SOWRS7Q7eTTmBAUE0fGGo2dzeItOW9ejUXV3DNAyVy1ODAa5avUiAe5VKQ1BgexuQqqiV3_x3WbH8Wwy373QTlAxz'),(22,'d8Aq63q6E78:APA91bGm3vVjRcinbw6ZXqq7N2fwHJOzhf_wkhFPcxT4Fq6iNGamRcKjNs39I9FDs7LK9IMfFSVbHj8oPPvVzCncRFOBWFyWTeRZE_k5bIG0rc_EsnRdNc4NhJKShe8Wrp9FbEBvHwKf'),(23,'APA91bHPRgkF3JUikC4ENAHEeMrd41Zxv3hVZjC9KtT8OvPVGJ-hQMRKRrZuJAEcl7B338qju59zJMjw2DELjzEvxwYv7hH5Ynpc1ODQ0aT4U4OFEeco8ohsN5PjL1iC2dNtk2BAokeMCg2ZXKqpc8FXKmhX94kIxQ');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poling_answers`
--

DROP TABLE IF EXISTS `poling_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poling_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_num` varchar(250) NOT NULL,
  `pl_id` int(11) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `location` int(255) NOT NULL,
  `submitted` varchar(250) DEFAULT NULL,
  `usr_name` varchar(251) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poling_answers`
--

LOCK TABLES `poling_answers` WRITE;
/*!40000 ALTER TABLE `poling_answers` DISABLE KEYS */;
INSERT INTO `poling_answers` VALUES (1,'9177824689',1,'a',34,'yes',''),(2,'9177824681',1,'b',34,'yes',''),(3,'',40,'Male',60,'yes',''),(4,'9177824624',2,'a',34,'yes',''),(5,'',45,'A',34,'yes',''),(6,'',46,'sd',34,'yes',''),(7,'',47,'D',34,'yes',''),(8,'',48,'a',34,'yes',''),(9,'',49,'ASEF`',34,'yes',''),(10,'',50,'F',34,'yes',''),(11,'NULL',56,'d',34,'yes',''),(12,'NULL',2,'a ',34,'yes',''),(13,'NULL',68,'a ',34,'yes',''),(14,'kartheeki',51,'GHG',34,'yes',''),(15,'kartheeki',60,'b',34,'yes',''),(16,'kartheeki',61,'n',46,'yes',''),(17,'kartheeki',62,'b',41,'yes',''),(18,'kartheeki',63,'h',41,'yes',''),(19,'kartheeki',64,'gh ',44,'yes',''),(20,'kartheeki',65,'dg',42,'yes',''),(21,'kartheeki',66,'A',34,'yes',''),(22,'kartheeki',67,'a',41,'yes',''),(23,'kartheeki',68,'b',41,'yes',''),(24,'NULL',69,'a',48,'yes',''),(25,'kartheeki',70,'a',41,'yes',''),(26,'kartheeki',71,'a',48,'yes',''),(27,'kartheeki',69,'s',48,'yes',''),(28,'',82,'Prabhas',34,'yes',''),(29,'kartheeki',82,'Prabhas',48,'yes',''),(30,'',104,'a',34,'yes',''),(31,'kartheeki',104,'a',48,'yes',''),(32,'kartheeki',103,'A',48,'yes',''),(33,'kartheeki',106,'à°šà±†à°¨à±à°¨à±ˆ',48,'yes',''),(34,'kartheeki',107,'à°¸à°¾à°²à±à°®à°¨à±‡à°²à±à°²à±‹à°¸à°¿à°¸à±',48,'yes',''),(35,'kartheeki',154,'a',49,'yes',''),(36,'kartheeki',157,'Punjab ',48,'yes',''),(37,'kartheeki',156,' Ramayana ',49,'yes',''),(38,'kartheeki',158,'Jataka ',50,'yes',''),(39,'9177824624',159,'a',62,'yes',''),(40,'Ramesh',160,'a',51,'yes',''),(41,'suresh',160,'a',51,'yes',''),(42,'karthiki',160,'b',51,'yes',''),(43,'Nani',160,'c',51,'yes',''),(44,'kartheeki',160,'7',48,'yes',''),(45,'kartheeki',162,'c',49,'yes',''),(46,'kartheeki',161,'2',48,'yes',''),(47,'kartheeki',163,'a',51,'yes',''),(48,'9177824684',1,'b',44,'yes',''),(49,'',1,'b',44,'yes',''),(50,'',2,'b',44,'yes',''),(51,'',163,'c',51,'yes',''),(52,'',178,'a',52,'yes',''),(53,'9177824685',163,'a',56,'yes','nethra'),(54,'9177824684',163,'b',56,'yes','nethra'),(55,'9177824683',163,'b',56,'yes','nethra'),(56,'8885449451',163,'a',58,'yes',''),(57,'9059920470',163,'a',53,'yes',''),(58,'9059920470',200,'A',52,'yes',''),(59,'9652459929',200,'D',52,'yes',''),(60,'kartheeki',200,'B',49,'yes',''),(61,'8885449451',200,'B',52,'yes',''),(62,'7865438760',164,'d',56,'yes','vinod'),(63,'7865438761',164,'a',56,'yes','jayesh'),(64,'7865438761',209,'a',60,'yes','naresh'),(65,'7865438762',209,'b',60,'yes','nethra'),(66,'7865438763',209,'b',64,'yes','lavanya'),(67,'7865438764',209,'c',64,'yes','shravani'),(68,'7865438765',210,'c',60,'yes','surya'),(69,'7865438766',210,'d',54,'yes','Vinod'),(70,'7865438767',209,'d',64,'yes','Rana'),(71,'7865438768',209,'a',54,'yes','Kiran'),(72,'7865438769',209,'b',54,'yes','Raheem'),(73,'7865438760',211,'b',59,'yes','saroja'),(74,'7865438712',211,'b',59,'yes','malli'),(75,'7865438711',211,'c',53,'yes','swamy'),(76,'7865438713',211,'a',53,'yes','viswa'),(77,'7865438714',211,'a',64,'yes','narean'),(78,'7865438715',211,'a',53,'yes','hema'),(79,'7865438716',209,'a',54,'yes','sunny'),(80,'7865438717',210,'a',54,'yes','sharath'),(81,'kartheeki',208,'Babu',49,'yes',''),(82,'kartheeki',210,'optiona',49,'yes','');
/*!40000 ALTER TABLE `poling_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usr_adds`
--

DROP TABLE IF EXISTS `usr_adds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usr_adds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_num` bigint(20) NOT NULL,
  `ad_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usr_adds`
--

LOCK TABLES `usr_adds` WRITE;
/*!40000 ALTER TABLE `usr_adds` DISABLE KEYS */;
/*!40000 ALTER TABLE `usr_adds` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-01 15:12:15
