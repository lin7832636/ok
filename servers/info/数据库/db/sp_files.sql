-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-06-14 06:58:28
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pokpets`
--

-- --------------------------------------------------------

--
-- 表的结构 `sp_files`
--

CREATE TABLE IF NOT EXISTS `sp_files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `key` char(64) NOT NULL DEFAULT '' COMMENT 'KEY',
  `path` char(32) NOT NULL DEFAULT '' COMMENT '文件路径(项目/功能)',
  `size` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '文件大小',
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `type` char(10) NOT NULL DEFAULT '' COMMENT '文件类型(''jpg'', ''gif'', ''png'', ''jpeg'')',
  `utype` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '用户类型(0:暂无，1前台，2后台)',
  `time` int(11) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `key` (`key`),
  KEY `uid` (`uid`),
  KEY `type` (`type`),
  KEY `time` (`time`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='文件表' AUTO_INCREMENT=8117 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
