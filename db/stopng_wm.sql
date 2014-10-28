/*
SQLyog Ultimate v8.55 
MySQL - 5.6.16 : Database - stopng
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`stopng` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `stopng`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`admin_id`,`name`,`username`,`password`,`email`) values (1,'Waheed Mazhar','admin','21232f297a57a5a743894a0e4a801fc3','admin@gmail.com');

/*Table structure for table `banner` */

DROP TABLE IF EXISTS `banner`;

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

/*Data for the table `banner` */

/*Table structure for table `city` */

DROP TABLE IF EXISTS `city`;

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`city_id`),
  KEY `FK_state_city` (`state_id`),
  CONSTRAINT `FK_state_city` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `city` */

/*Table structure for table `info_pages` */

DROP TABLE IF EXISTS `info_pages`;

CREATE TABLE `info_pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `info_pages` */

insert  into `info_pages`(`page_id`,`name`,`description`,`created_by`,`modified_by`,`created_on`,`modified_on`) values (1,'','<p>Groundout Gloves is located in Louisville, KY and is a family owned business where each member of our family is involved and plays a valuable part to ensure you love your new glove. We have a passion for baseball and softball and are dedicated to providing players of all ages the best equipment to help them be successful on the field. Our niche is custom baseball gloves that provide the quality that players demand. For a glove to meet our standards, it must perform as well as any major league baseball player would expect and must be able to withstand the rigors of preseason, regular season, and post season for years to come.</p>\r\n<p><strong>What Makes a Glove from Ground Out Gloves Different?</strong></p>\r\n<p>Ground Out Gloves has partnered with Rolin Gloves in Mexico. We have taken their standard glove and redesigned it based on feedback from professional players. This is no ordinary glove as each glove is handmade and we only using the best leather for our gloves. That makes us different than the competition.</p>\r\n<p>Each glove must meet the standard of pro grade 100% steerhide or \'best of the bull\' leathers. The quality of the leather makes our gloves more durable and it will not get floppy like other brands. Each glove has strong reinforcement in the thumb and pinky and you have the option of adding reinforced palm padding for extra comfort. We also use high quality laces that are much thicker than the competition.</p>\r\n<p>Another feature that makes us different is that each glove is fully customized. This means you are in the driver\'s seat and can choose your colors, embroidery, and even your favorite flag. We will also custom fit the glove to you. Therefore, when placing an order, we will need to get a measurement of your wrist and length of your middle finger. The standard glove order includes your choice of glove and colors. You will have many other options such as embroidery and custom logo\'s if you choose.</p>\r\n<h2>Refund Policy</h2>\r\n<p>We strive to provide the highest quality with every product. &nbsp;Customized gloves are not refundable. &nbsp;If you should find a flaw in the design of the glove we will gradly make the appropriate corrections and get the glove back to you as soon as possible.</p>\r\n<p>Should you have questions or concerns about a glove you have recieved please contact us at 800-555-1234</p>',2147483647,1,NULL,NULL),(2,'Privacy Policy','<p>Lorem Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.Lorem Ipsum is simply dummy text of the printing  and typesetting industry.Lorem Ipsum is simply dummy text of the  printing and typesetting industry.Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<p><strong>Lorem Ipsum</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<h4><strong>Lorem Ipsum</strong></h4>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>',0,1,NULL,NULL),(5,'Terms of Service','<p>Lorem Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.Lorem Ipsum is simply dummy text of the printing  and typesetting industry.Lorem Ipsum is simply dummy text of the  printing and typesetting industry.Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<p><strong>Lorem Ipsum</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<h4><strong>Lorem Ipsum</strong></h4>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>',0,1,NULL,NULL),(6,'New page','<p>a quick brown fox jumps over the lazy dog.</p>',2147483647,1,NULL,NULL),(7,'New page11','<p>a quick brown fox jumps over the lazy dog.</p>',2147483647,1,NULL,NULL),(8,'','',2147483647,1,NULL,NULL);

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `description` text,
  `product_type` enum('service','product') DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `product` */

/*Table structure for table `review` */

DROP TABLE IF EXISTS `review`;

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `rating` tinyint(1) DEFAULT NULL,
  `user_feedback` text,
  `is_active` tinyint(1) DEFAULT '1',
  `created_on` datetime DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`review_id`),
  KEY `FK_user_reveiw` (`user_id`),
  KEY `FK_vendor_review` (`vendor_id`),
  CONSTRAINT `FK_user_reveiw` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL,
  CONSTRAINT `FK_vendor_review` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `review` */

/*Table structure for table `state` */

DROP TABLE IF EXISTS `state`;

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `state` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(64) DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `token` varchar(32) DEFAULT NULL COMMENT 'Used to activate account and   for password recovery',
  `is_active` tinyint(1) DEFAULT '0',
  `created_on` datetime DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

/*Table structure for table `vendor` */

DROP TABLE IF EXISTS `vendor`;

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `description` text,
  `email` varchar(32) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `vendor_type` enum('service_provider','product_seller') DEFAULT NULL,
  `website` varchar(128) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '1',
  `created_on` datetime DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`vendor_id`),
  KEY `FK_vendor_product` (`product_id`),
  CONSTRAINT `FK_vendor_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `vendor` */

/*Table structure for table `vendor_city` */

DROP TABLE IF EXISTS `vendor_city`;

CREATE TABLE `vendor_city` (
  `vendor_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  PRIMARY KEY (`vendor_id`,`city_id`),
  KEY `FK_vendor_city` (`city_id`),
  CONSTRAINT `FK_vendor_city` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE,
  CONSTRAINT `FK_vendor_city_vendor` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `vendor_city` */

/*Table structure for table `vendor_image` */

DROP TABLE IF EXISTS `vendor_image`;

CREATE TABLE `vendor_image` (
  `vendor_image_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `image` varchar(32) DEFAULT NULL,
  KEY `FK_vendor_image` (`vendor_id`),
  CONSTRAINT `FK_vendor_image` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`vendor_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `vendor_image` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
