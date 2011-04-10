-- phpMyAdmin SQL Dump
-- version 3.3.7deb5build0.10.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2011 at 07:23 PM
-- Server version: 5.1.49
-- PHP Version: 5.3.3-1ubuntu9.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pragyan`
--

-- --------------------------------------------------------

--
-- Table structure for table `pragyanV3_global`
--

CREATE TABLE IF NOT EXISTS `pragyanV2_global` (
  `attribute` varchar(50) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`attribute`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pragyanV2_global`
--

INSERT INTO `pragyanV2_global` (`attribute`, `value`) VALUES
('cms_title', 'Pragyan CMS'),
('cms_desc', 'Pragyan CMS'),
('cms_keywords', 'Pragyan CMS'),
('cms_email', 'no-reply@pragyan.org'),
('allow_pagespecific_header', '0'),
('allow_pagespecific_template', '0'),
('default_template', 'trinity'),
('upload_limit', '50000000'),
('default_user_activate', '0'),
('default_mail_verify', '0'),
('breadcrumb_submenu', '0'),
('reindex_frequency', '2'),
('censor_words', ''),
('recaptcha', '0'),
('recaptcha_public', ''),
('recaptcha_private', ''),
('deadline_notify', '0'),
('url_rewrite', 'false'),
('allow_login', '1'),
('cms_footer', 'Â© 2010 - powered by <a href="http://sourceforge.net/projects/pragyan" title="Praygan CMS">Pragyan CMS v3.0</a>'),
('openid_enabled', 'false');
