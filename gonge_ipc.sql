-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-04-18 17:05:16
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
('admin', 1, '管理员', NULL, 's:0:"";', 1460626630, 1460971209),
('customerList', 2, '客户列表', NULL, 's:0:"";', 1460969444, 1460972627),
('guest', 1, '访客', NULL, 's:0:"";', 1460626630, 1460971235),
('service', 2, '业务模块', NULL, 's:0:"";', 1460890319, 1460972531),
('setting', 2, '系统设置', NULL, '', 1460887939, 1460887939),
('user', 1, '员工', NULL, 's:0:"";', 1460626630, 1460972573);

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
('user', 'service'),
('admin', 'setting');

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
-- 表的结构 `ipc_company`
--

CREATE TABLE IF NOT EXISTS `ipc_company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `coperate` varchar(64) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `address` varchar(128) NOT NULL,
  `product` varchar(256) NOT NULL,
  `bussiness` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `addtime` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ipc_customer`
--

CREATE TABLE IF NOT EXISTS `ipc_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `realname` varchar(64) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `ic_sernum` varchar(32) NOT NULL,
  `identition` varchar(32) NOT NULL,
  `addtime` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `ipc_customer`
--

INSERT INTO `ipc_customer` (`customer_id`, `realname`, `phone`, `ic_sernum`, `identition`, `addtime`, `status`) VALUES
(1, '张三', '', '9EA36785', '6531237178432874', 1438797986, 1438797986),
(2, '李四', '', '67868723-sadas', '6531237178432874', 1438797986, 1438797986),
(3, '王五', '', '', '3211325646687998', 1458199841, 0),
(4, '哈哈', '', '', '878964661323213', 1458200313, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_customer_history`
--

CREATE TABLE IF NOT EXISTS `ipc_customer_history` (
  `history_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `action` varchar(128) NOT NULL,
  `data` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `addtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ipc_filemanager_mediafile`
--

CREATE TABLE IF NOT EXISTS `ipc_filemanager_mediafile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `alt` text COLLATE utf8_unicode_ci,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `thumbs` text COLLATE utf8_unicode_ci,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ipc_filemanager_mediafile`
--

INSERT INTO `ipc_filemanager_mediafile` (`id`, `filename`, `type`, `url`, `alt`, `size`, `description`, `thumbs`, `created_at`, `updated_at`) VALUES
(1, 'avatar2.png', 'image/png', '/uploads/2016/04/avatar2.png', NULL, '8836', NULL, 'a:3:{s:5:"small";s:36:"/uploads/2016/04/avatar2-100x100.png";s:6:"medium";s:36:"/uploads/2016/04/avatar2-300x200.png";s:5:"large";s:36:"/uploads/2016/04/avatar2-500x400.png";}', 1460986245, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_filemanager_owners`
--

CREATE TABLE IF NOT EXISTS `ipc_filemanager_owners` (
  `mediafile_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner_attribute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`mediafile_id`,`owner_id`,`owner`,`owner_attribute`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
('m000000_000000_base', 1460824979),
('m141129_130551_create_filemanager_mediafile_table', 1460985485),
('m141203_173402_create_filemanager_owners_table', 1460985485),
('m141203_175538_add_filemanager_owners_ref_mediafile_fk', 1460985485);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_project`
--

CREATE TABLE IF NOT EXISTS `ipc_project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_sn` int(11) NOT NULL,
  `borrower` varchar(64) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `company` varchar(128) NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `due` int(11) NOT NULL,
  `tender` int(11) NOT NULL,
  `income` decimal(5,2) NOT NULL,
  `fee` decimal(5,2) NOT NULL,
  `repayment` int(11) NOT NULL,
  `prebidding` date NOT NULL,
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ipc_project_attach`
--

CREATE TABLE IF NOT EXISTS `ipc_project_attach` (
  `attach_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `mode` enum('apply','process','investigation') NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`attach_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ipc_project_guarantor`
--

CREATE TABLE IF NOT EXISTS `ipc_project_guarantor` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ipc_project_history`
--

CREATE TABLE IF NOT EXISTS `ipc_project_history` (
  `history_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`history_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ipc_project_repayment`
--

CREATE TABLE IF NOT EXISTS `ipc_project_repayment` (
  `repayment_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `code` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`repayment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ipc_project_status`
--

CREATE TABLE IF NOT EXISTS `ipc_project_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `code` varchar(32) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ipc_project_tender`
--

CREATE TABLE IF NOT EXISTS `ipc_project_tender` (
  `tender_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL,
  `code` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`tender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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

--
-- 限制表 `ipc_filemanager_owners`
--
ALTER TABLE `ipc_filemanager_owners`
  ADD CONSTRAINT `filemanager_owners_ref_mediafile` FOREIGN KEY (`mediafile_id`) REFERENCES `ipc_filemanager_mediafile` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
