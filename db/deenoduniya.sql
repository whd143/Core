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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Waheed Mazhar','hamid','d8578edf8458ce06fbc5bb76a58c5ca4','admin@gmail.com');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(64) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `description_en` text,
  `title_ur` varchar(255) DEFAULT NULL,
  `description_ur` text,
  `publish_on` date DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `is_featured` tinyint(1) DEFAULT '0',
  `is_home` tinyint(1) DEFAULT '0',
  `video_url` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `modified_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (2,'sfskdfkjII','kdsfdsfjkdsj','asjdkfjdskfjkdsk','dksjfkdsfj','kjdkljsdkfj','2014-10-10',1,1,1,'',NULL,1,1,'2014-11-23 20:27:04','2014-11-23 20:27:04'),(3,'alif_bey_.html','Alif bey ','alif bey pey','alif','alif bey pey','2014-12-04',1,0,0,'',NULL,1,1,'2014-12-03 18:53:05','2014-12-03 18:53:05');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_image`
--

DROP TABLE IF EXISTS `article_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_image` (
  `article_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) DEFAULT NULL,
  `title_ur` varchar(128) DEFAULT NULL,
  `title_en` varchar(128) DEFAULT NULL,
  `uri_original_name` varchar(64) DEFAULT NULL,
  `uri` varchar(255) DEFAULT NULL,
  `thumb_original_name` varchar(64) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`article_image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_image`
--

LOCK TABLES `article_image` WRITE;
/*!40000 ALTER TABLE `article_image` DISABLE KEYS */;
INSERT INTO `article_image` VALUES (1,2,'urdu image','english image','img_01.png','http://angular.local/public/images/2/1416862100.png','img_03.png','http://angular.local/public/images/2/1416862100.png',1,1,1,1,'2014-11-24 11:35:30',NULL);
/*!40000 ALTER TABLE `article_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `description` text,
  `image` varchar(62) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner`
--

LOCK TABLES `banner` WRITE;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(64) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_ur` varchar(255) DEFAULT NULL,
  `parent_category_id` int(11) DEFAULT NULL,
  `show_as_menu` tinyint(1) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `modified_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'islam','Islam','Islam',0,1,'http://angular.local/images/islam.png',1,NULL,1,1,'2014-11-29 06:43:37','2014-11-29 06:43:37'),(2,'adab.html','Adab','Adab',NULL,1,'http://angular.local/images/news.png',1,NULL,1,1,'2014-11-29 06:43:54','2014-11-29 06:43:54'),(3,'column','Column','Column',0,1,'http://angular.local/images/column.png',1,NULL,1,1,'2014-11-29 06:44:06','2014-11-29 06:44:06'),(4,'women.html','Women','?????',0,0,'http://angular.local/images/women.png',0,NULL,1,1,'2014-11-29 06:44:19','2014-11-29 06:44:19'),(5,'aalim','Aalim','Aalim',0,1,'http://angular.local/images/teacher.png',1,NULL,1,1,'2014-11-29 06:44:58','2014-11-29 06:44:58');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `daily_image`
--

DROP TABLE IF EXISTS `daily_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `daily_image` (
  `daily_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `publish_on` date DEFAULT NULL,
  `uri_original_name` varchar(64) DEFAULT NULL,
  `uri` varchar(255) DEFAULT NULL,
  `thumb_original_name` varchar(64) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`daily_image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daily_image`
--

LOCK TABLES `daily_image` WRITE;
/*!40000 ALTER TABLE `daily_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `daily_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `golden_word`
--

DROP TABLE IF EXISTS `golden_word`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `golden_word` (
  `golden_word_id` int(11) NOT NULL AUTO_INCREMENT,
  `publish_on` date DEFAULT NULL,
  `ayat_ur` text,
  `hadith_ur` text,
  `quote_ur` text,
  `ayat_en` text,
  `hadith_en` text,
  `quote_en` varchar(45) DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `modified_by` varchar(45) DEFAULT NULL,
  `created_on` varchar(45) DEFAULT NULL,
  `modified_on` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`golden_word_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `golden_word`
--

LOCK TABLES `golden_word` WRITE;
/*!40000 ALTER TABLE `golden_word` DISABLE KEYS */;
INSERT INTO `golden_word` VALUES (2,'2014-12-04','ayat','hadith_ur','quote','','','','1','1','2014-12-04 13:46:41',NULL);
/*!40000 ALTER TABLE `golden_word` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `static_page` VALUES (2,'privacy_policy.html','Privacy Policy','<p>Lorem Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.Lorem Ipsum is simply dummy text of the printing  and typesetting industry.Lorem Ipsum is simply dummy text of the  printing and typesetting industry.Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<p><strong>Lorem Ipsum</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<h4><strong>Lorem Ipsum</strong></h4>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>','Privacy Policy','<p>Lorem Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.Lorem Ipsum is simply dummy text of the printing  and typesetting industry.Lorem Ipsum is simply dummy text of the  printing and typesetting industry.Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<p><strong>Lorem Ipsum</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<h4><strong>Lorem Ipsum</strong></h4>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>',1,0,1,NULL,NULL),(5,'terms_of_service.html','Terms of Service','<p>Lorem Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.Lorem Ipsum is simply dummy text of the printing  and typesetting industry.Lorem Ipsum is simply dummy text of the  printing and typesetting industry.Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<p><strong>Lorem Ipsum</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<h4><strong>Lorem Ipsum</strong></h4>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>','Terms of Service','<p>Lorem Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.Lorem Ipsum is simply dummy text of the printing  and typesetting industry.Lorem Ipsum is simply dummy text of the  printing and typesetting industry.Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<p><strong>Lorem Ipsum</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<h4><strong>Lorem Ipsum</strong></h4>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>',1,0,1,NULL,NULL);
/*!40000 ALTER TABLE `static_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_url` varchar(255) DEFAULT NULL,
  `video_keyword` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `modified_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-04 15:17:35
