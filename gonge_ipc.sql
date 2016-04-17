-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-04-17 17:25:02
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gonge_ipc`
--

-- --------------------------------------------------------

--
-- 表的结构 `ipc_auth_assignment`
--

CREATE TABLE IF NOT EXISTS `ipc_auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ipc_auth_assignment`
--

INSERT INTO `ipc_auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1460789919),
('user', '2', 1460732172);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_auth_item`
--

CREATE TABLE IF NOT EXISTS `ipc_auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ipc_auth_item`
--

INSERT INTO `ipc_auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1460626630, 1460906038),
('guest', 1, NULL, NULL, NULL, 1460626630, 1460898133),
('service', 2, 'sss', NULL, '', 1460890319, 1460890342),
('setting', 2, '系统设置', NULL, '', 1460887939, 1460887939),
('user', 1, NULL, NULL, NULL, 1460626630, 1460906241);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_auth_item_child`
--

CREATE TABLE IF NOT EXISTS `ipc_auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ipc_auth_item_child`
--

INSERT INTO `ipc_auth_item_child` (`parent`, `child`) VALUES
('admin', 'service'),
('user', 'service'),
('admin', 'setting'),
('guest', 'setting');

-- --------------------------------------------------------

--
-- 表的结构 `ipc_auth_rule`
--

CREATE TABLE IF NOT EXISTS `ipc_auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ipc_migration`
--

CREATE TABLE IF NOT EXISTS `ipc_migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `ipc_migration`
--

INSERT INTO `ipc_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1460824979);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_setting`
--

CREATE TABLE IF NOT EXISTS `ipc_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `code` varchar(32) NOT NULL,
  `type` varchar(32) NOT NULL,
  `store_range` varchar(255) DEFAULT NULL,
  `store_dir` varchar(255) DEFAULT NULL,
  `value` text,
  `sort_order` int(11) NOT NULL DEFAULT '50',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  KEY `code` (`code`),
  KEY `sort_order` (`sort_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3116 ;

--
-- 转存表中的数据 `ipc_setting`
--

INSERT INTO `ipc_setting` (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES
(11, 0, 'info', 'group', '', '', '', 50),
(21, 0, 'basic', 'group', '', '', '', 50),
(31, 0, 'smtp', 'group', '', '', '', 50),
(1111, 11, 'siteName', 'text', '', '', '信贷管理系统', 50),
(1112, 11, 'siteTitle', 'text', '', '', '信贷管理', 50),
(1113, 11, 'siteKeyword', 'text', '', '', '12321321', 50),
(2111, 21, 'timezone', 'select', '-12,-11,-10,-9,-8,-7,-6,-5,-4,-3.5,-3,-2,-1,0,1,2,3,3.5,4,4.5,5,5.5,5.75,6,6.5,7,8,9,9.5,10,11,12', '', '8', 50),
(2112, 21, 'commentCheck', 'select', '0,1', '', '1', 50),
(3111, 31, 'smtpHost', 'text', '', '', 'localhost', 50),
(3112, 31, 'smtpPort', 'text', '', '', '', 50),
(3113, 31, 'smtpUser', 'text', '', '', 'zhujingxiu@hotmail.com', 50),
(3114, 31, 'smtpPassword', 'password', '', '', '123456', 50),
(3115, 31, 'smtpMail', 'text', '', '', '', 50);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_user`
--

CREATE TABLE IF NOT EXISTS `ipc_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  KEY `status` (`status`),
  KEY `created_at` (`created_at`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `ipc_user`
--

INSERT INTO `ipc_user` (`user_id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'TOL_4sICqCHD4n1UOYE0ZAaAgkCnlEWD', '$2y$13$DHvK27g4EpqJ5eoOk.hHkeCPKb2mcwCrsjm6lLQ/8lUdCk5Beq9ei', '', 'admin@demo.com', 'admin', 1, 1460626630, 1460789919),
(2, 'zhujingxiu', 'ePx45s5O34IH8b6JLP4tXCd8yTE-_5Xj', '$2y$13$cSy0Q/SBoCqLB7bAEVv26eyWUjEX0g5IwdRG11xj0y8W0cmygOsQC', 'tBuqUrt-7s5AW7cHtE59zsdvhiAgBwKD_1460704462', 'a@b.c', 'user', 1, 1460704461, 1460732172),
(3, 'demo', 'u9YYoa_465SfLOyrwpjHkklNAG5gKnTM', '$2y$13$d6rmH9jBlEYH28qX1kuGHeeR.JDD5a4OXzqU3HVA68IA1L8zQ7Dny', 'nm_bCQH2XeCT6iFfHNQYBxfw8VTBZSrX_1460724094', 'demo@demo.c', 'guest', 1, 1460724092, 1460794910);

--
-- 限制导出的表
--

--
-- 限制表 `ipc_auth_assignment`
--
ALTER TABLE `ipc_auth_assignment`
  ADD CONSTRAINT `ipc_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `ipc_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `ipc_auth_item`
--
ALTER TABLE `ipc_auth_item`
  ADD CONSTRAINT `ipc_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `ipc_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- 限制表 `ipc_auth_item_child`
--
ALTER TABLE `ipc_auth_item_child`
  ADD CONSTRAINT `ipc_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `ipc_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ipc_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `ipc_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
