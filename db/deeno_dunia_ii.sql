-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2014 at 06:21 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `deenoduniya`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `username`, `password`, `email`) VALUES
(1, 'Waheed Mazhar', 'hamid', '37fff357c237d67f2365eab6706bc898', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `cat_id`, `slug`, `title_en`, `description_en`, `title_ur`, `description_ur`, `publish_on`, `is_active`, `is_featured`, `is_home`, `video_url`, `display_order`, `created_by`, `modified_by`, `created_on`, `modified_on`) VALUES
(2, 7, 'kdsfdsfjkdsj.html', 'kdsfdsfjkdsj', 'asjdkfjdskfjkdsk', 'dksjfkdsfj', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '2014-10-10', 1, 1, 1, '', NULL, 1, 1, '2014-12-09 23:06:37', '2014-11-24 01:27:04'),
(3, 7, 'alif_bey_.html', 'Alif bey ', 'alif bey pey', 'alif', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s,', '2014-12-04', 1, 1, 0, '', NULL, 1, 1, '2014-12-10 22:47:51', '2014-12-03 23:53:05');

-- --------------------------------------------------------

--
-- Table structure for table `article_image`
--

CREATE TABLE IF NOT EXISTS `article_image` (
  `article_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) DEFAULT NULL,
  `title_ur` varchar(128) DEFAULT NULL,
  `title_en` varchar(128) DEFAULT NULL,
  `uri_original_name` varchar(64) DEFAULT NULL,
  `uri` varchar(255) DEFAULT NULL,
  `thumb_original_name` varchar(64) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `slider_thumbnail` varchar(255) NOT NULL,
  `slider_full_img` varchar(255) NOT NULL,
  `display_order` int(11) DEFAULT '0',
  `is_active` tinyint(1) DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`article_image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `article_image`
--

INSERT INTO `article_image` (`article_image_id`, `article_id`, `title_ur`, `title_en`, `uri_original_name`, `uri`, `thumb_original_name`, `thumb`, `slider_thumbnail`, `slider_full_img`, `display_order`, `is_active`, `created_by`, `modified_by`, `created_on`, `modified_on`) VALUES
(1, 2, 'urdu image', 'english image', 'images/lt1.png', 'images/lt1.png', 'images/lt1.png', 'images/lt1.png', 'images/kaba.png', 'images/kaba.png', 1, 1, 1, 1, '2014-11-24 11:35:30', NULL),
(2, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'images/kaba.png', 'images/kaba.png', 0, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE IF NOT EXISTS `banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `description` text,
  `image` varchar(62) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `banner`
--


-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(64) DEFAULT NULL,
  `title_en` varchar(255) DEFAULT NULL,
  `title_ur` varchar(255) DEFAULT NULL,
  `parent_category_id` int(11) DEFAULT NULL,
  `show_as_menu` tinyint(1) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `cat_img` varchar(255) NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `modified_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `slug`, `title_en`, `title_ur`, `parent_category_id`, `show_as_menu`, `icon`, `cat_img`, `is_active`, `display_order`, `created_by`, `modified_by`, `created_on`, `modified_on`) VALUES
(1, 'islam', 'Islam', 'Islam', 0, 1, 'images/islam.png', '', 1, NULL, 1, 1, '2014-12-07 12:07:47', '2014-11-29 11:43:37'),
(2, 'adab.html', 'Adab', 'Adab', NULL, 1, 'images/news.png', '', 1, NULL, 1, 1, '2014-12-07 12:05:34', '2014-11-29 11:43:54'),
(3, 'column', 'Column', 'Column', 0, 1, 'images/column.png', '', 1, NULL, 1, 1, '2014-12-07 12:05:46', '2014-11-29 11:44:06'),
(4, 'women.html', 'Women', '?????', 0, 0, 'images/women.png', '', 0, NULL, 1, 1, '2014-12-07 12:05:18', '2014-11-29 11:44:19'),
(5, 'aalim', 'Aalim', 'Aalim', 0, 1, 'images/teacher.png', '', 1, NULL, 1, 1, '2014-12-07 12:05:54', '2014-11-29 11:44:58'),
(7, 'news.html', 'News', 'News', NULL, 0, NULL, 'images/ftr_news.png', 1, NULL, 1, 1, '2014-12-07 12:19:16', '2014-12-07 12:15:01'),
(8, 'online_teachers.html', 'Online Teachers', 'Online Teachers', NULL, 0, NULL, 'images/teachers.png', 1, NULL, 1, 1, '2014-12-09 22:59:02', '2014-12-09 22:57:54'),
(9, 'politeness.html', 'Politeness', 'Politeness', NULL, 0, NULL, 'images/lit_ftr_img.png', 1, NULL, 1, 1, '2014-12-09 23:04:01', '2014-12-09 22:59:58'),
(10, 'library.html', 'Library', 'Library', NULL, 0, NULL, 'images/library.png', 1, NULL, 1, 1, '2014-12-09 23:03:52', '2014-12-09 23:00:18'),
(11, 'aalim_online.html', 'Aalim Online', 'Aalim Online', NULL, 0, NULL, 'images/alim.png', 1, NULL, 1, 1, '2014-12-09 23:04:07', '2014-12-09 23:00:50'),
(12, 'women_section.html', 'Women Section', 'Women Section', NULL, 0, NULL, 'images/womens.png', 1, NULL, 1, 1, '2014-12-09 23:04:12', '2014-12-09 23:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `daily_image`
--

CREATE TABLE IF NOT EXISTS `daily_image` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `daily_image`
--


-- --------------------------------------------------------

--
-- Table structure for table `golden_word`
--

CREATE TABLE IF NOT EXISTS `golden_word` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `golden_word`
--

INSERT INTO `golden_word` (`golden_word_id`, `publish_on`, `ayat_ur`, `hadith_ur`, `quote_ur`, `ayat_en`, `hadith_en`, `quote_en`, `created_by`, `modified_by`, `created_on`, `modified_on`) VALUES
(2, '2014-12-04', 'ayat', 'hadith_ur', 'quote', '', '', '', '1', '1', '2014-12-04 13:46:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `static_page`
--

CREATE TABLE IF NOT EXISTS `static_page` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `static_page`
--

INSERT INTO `static_page` (`page_id`, `slug`, `title_en`, `description_en`, `title_ur`, `description_ur`, `is_active`, `created_by`, `modified_by`, `created_on`, `modified_on`) VALUES
(2, 'privacy_policy.html', 'Privacy Policy', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.Lorem Ipsum is simply dummy text of the printing  and typesetting industry.Lorem Ipsum is simply dummy text of the  printing and typesetting industry.Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<p><strong>Lorem Ipsum</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<h4><strong>Lorem Ipsum</strong></h4>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>', 'Privacy Policy', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.Lorem Ipsum is simply dummy text of the printing  and typesetting industry.Lorem Ipsum is simply dummy text of the  printing and typesetting industry.Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<p><strong>Lorem Ipsum</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<h4><strong>Lorem Ipsum</strong></h4>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>', 1, 0, 1, NULL, NULL),
(5, 'terms_of_service.html', 'Terms of Service', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.Lorem Ipsum is simply dummy text of the printing  and typesetting industry.Lorem Ipsum is simply dummy text of the  printing and typesetting industry.Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<p><strong>Lorem Ipsum</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<h4><strong>Lorem Ipsum</strong></h4>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>', 'Terms of Service', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.Lorem Ipsum is simply dummy text of the printing  and typesetting industry.Lorem Ipsum is simply dummy text of the  printing and typesetting industry.Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<p><strong>Lorem Ipsum</strong></p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting industry.</p>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.Lorem Ipsum is  simply dummy text of the printing and typesetting industry.Lorem Ipsum  is simply dummy text of the printing and typesetting industry.Lorem  Ipsum is simply dummy text of the printing and typesetting  industry.Lorem Ipsum is simply dummy text of the printing and  typesetting industry.</p>\r\n<h4><strong>Lorem Ipsum</strong></h4>\r\n<p>Lorem Ipsum is simply dummy text of  the printing and typesetting industry.Lorem Ipsum is simply dummy text  of the printing and typesetting industry.Lorem Ipsum is simply dummy  text of the printing and typesetting industry.Lorem Ipsum is simply  dummy text of the printing and typesetting industry.</p>', 1, 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_url` varchar(255) DEFAULT NULL,
  `video_keyword` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `modified_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `video`
--

