CREATE DATABASE  IF NOT EXISTS `deenoduniya` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `deenoduniya`;
-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (i686)
--
-- Host: 127.0.0.1    Database: deenoduniya
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
-- Table structure for table `static_page`
--

DROP TABLE IF EXISTS `static_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `static_page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(64) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `description_en` text,
  `title_ur` varchar(255) DEFAULT NULL,
  `description_ur` text,
  `is_active` tinyint(4) DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `modified_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `static_page`
--

LOCK TABLES `static_page` WRITE;
/*!40000 ALTER TABLE `static_page` DISABLE KEYS */;
INSERT INTO `static_page` VALUES (2,NULL,'Privacy Policy','<p>Lorem Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.Lorem Ipsum is simply dummy text of the printing  and typesetting industry.Lorem Ipsum is simply dummy text of the  printing and typesetting industry.Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<p><strong>Lorem Ipsum</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<h4><strong>Lorem Ipsum</strong></h4>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>',NULL,NULL,1,0,1,NULL,NULL),(5,NULL,'Terms of Service','<p>Lorem Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.Lorem Ipsum is simply dummy text of the printing  and typesetting industry.Lorem Ipsum is simply dummy text of the  printing and typesetting industry.Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<p><strong>Lorem Ipsum</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<h4><strong>Lorem Ipsum</strong></h4>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>',NULL,NULL,1,0,1,NULL,NULL);
/*!40000 ALTER TABLE `static_page` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-26 15:46:18
