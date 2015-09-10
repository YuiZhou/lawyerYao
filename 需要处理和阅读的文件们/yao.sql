-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-07-31 23:11:27
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yao`
--
CREATE DATABASE IF NOT EXISTS `yao` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `yao`;

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `for_news` int(11) DEFAULT NULL,
  `for_comment` int(11) DEFAULT NULL,
  `author` varchar(16) CHARACTER SET gb2312 NOT NULL,
  `mail` varchar(32) NOT NULL,
  `content` text CHARACTER SET gb2312 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `comment_fk` (`for_news`),
  KEY `fk_comment` (`for_comment`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- 触发器 `comment`
--
DROP TRIGGER IF EXISTS `add_notification_triger`;
DELIMITER //
CREATE TRIGGER `add_notification_triger` AFTER INSERT ON `comment`
 FOR EACH ROW INSERT INTO `yao`.`notification` (`comment_id`, `user_id`) VALUES  (NEW.id, 'BigYao'), (NEW.id, 'littleyao')
//
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `link`
--

DROP TABLE IF EXISTS `link`;
CREATE TABLE IF NOT EXISTS `link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `for_news` int(11) NOT NULL,
  `title` varchar(64) CHARACTER SET gb2312 NOT NULL,
  `uri` text NOT NULL,
  `type` varchar(16) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `link_type` (`type`),
  KEY `news_link_fk` (`for_news`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- 表的结构 `link_type`
--

DROP TABLE IF EXISTS `link_type`;
CREATE TABLE IF NOT EXISTS `link_type` (
  `name` varchar(16) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) CHARACTER SET gb2312 NOT NULL,
  `content` text CHARACTER SET gb2312 NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `view` int(11) NOT NULL DEFAULT '0',
  `author` varchar(16) NOT NULL,
  `type` varchar(32) NOT NULL,
  `thumb` text,
  PRIMARY KEY (`id`),
  KEY `author_fk` (`author`),
  KEY `news_type_fk` (`type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- 表的结构 `news_type`
--

DROP TABLE IF EXISTS `news_type`;
CREATE TABLE IF NOT EXISTS `news_type` (
  `type` varchar(32) NOT NULL,
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `comment_id` int(11) NOT NULL,
  `user_id` varchar(16) NOT NULL,
  PRIMARY KEY (`comment_id`,`user_id`),
  KEY `user_notification_fk` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `portfolio_image`
--

DROP TABLE IF EXISTS `portfolio_image`;
CREATE TABLE IF NOT EXISTS `portfolio_image` (
  `url` text NOT NULL,
  `type` int(11) NOT NULL,
  KEY `image_fk` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `portfolio_type`
--

DROP TABLE IF EXISTS `portfolio_type`;
CREATE TABLE IF NOT EXISTS `portfolio_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET gb2312 NOT NULL,
  `description` text CHARACTER SET gb2312,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `name` varchar(8) CHARACTER SET gb2312 NOT NULL,
  `mail` varchar(32) DEFAULT NULL,
  `icon` varchar(128) NOT NULL DEFAULT './default.png',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 限制导出的表
--

--
-- 限制表 `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`for_news`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `fk_comment` FOREIGN KEY (`for_comment`) REFERENCES `comment` (`id`);

--
-- 限制表 `link`
--
ALTER TABLE `link`
  ADD CONSTRAINT `news_link_fk` FOREIGN KEY (`for_news`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `link_type` FOREIGN KEY (`type`) REFERENCES `link_type` (`name`);

--
-- 限制表 `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `news_type_fk` FOREIGN KEY (`type`) REFERENCES `news_type` (`type`);

--
-- 限制表 `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `comment_notification_fk` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`id`),
  ADD CONSTRAINT `user_notification_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`username`);

--
-- 限制表 `portfolio_image`
--
ALTER TABLE `portfolio_image`
  ADD CONSTRAINT `image_fk` FOREIGN KEY (`type`) REFERENCES `portfolio_type` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
