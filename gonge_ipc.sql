-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-05-20 12:02:48
-- 服务器版本： 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gonge_ipc`
--

-- --------------------------------------------------------

--
-- 表的结构 `ipc_auth_node`
--

CREATE TABLE `ipc_auth_node` (
  `node_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) NOT NULL DEFAULT '0',
  `rgt` int(11) NOT NULL DEFAULT '0',
  `lvl` smallint(5) NOT NULL DEFAULT '0',
  `name` varchar(60) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `icon_type` tinyint(1) NOT NULL DEFAULT '1',
  `mode` enum('menu','role','permission') NOT NULL DEFAULT 'menu',
  `is_root` tinyint(4) NOT NULL DEFAULT '0',
  `path` varchar(128) DEFAULT NULL COMMENT '主路径或标识符',
  `rule` varchar(64) DEFAULT NULL COMMENT '规则',
  `rule_param` text COMMENT '规则参数',
  `sets` text COMMENT '子集',
  `remark` text,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `selected` tinyint(1) NOT NULL DEFAULT '0',
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  `readonly` tinyint(1) NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  `collapsed` tinyint(1) NOT NULL DEFAULT '0',
  `movable_u` tinyint(1) NOT NULL DEFAULT '1',
  `movable_d` tinyint(1) NOT NULL DEFAULT '1',
  `movable_l` tinyint(1) NOT NULL DEFAULT '1',
  `movable_r` tinyint(1) NOT NULL DEFAULT '1',
  `removable` tinyint(1) NOT NULL DEFAULT '1',
  `removable_all` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ipc_auth_node`
--

INSERT INTO `ipc_auth_node` (`node_id`, `parent_id`, `lft`, `rgt`, `lvl`, `name`, `icon`, `icon_type`, `mode`, `is_root`, `path`, `rule`, `rule_param`, `sets`, `remark`, `active`, `selected`, `disabled`, `readonly`, `visible`, `collapsed`, `movable_u`, `movable_d`, `movable_l`, `movable_r`, `removable`, `removable_all`) VALUES
(1, 1, 1, 2, 0, '客户管理', 'fa fa-users', 1, 'menu', 0, 'customer', '', 's:0:"";', '31,32,33,34', '', 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(2, 2, 1, 16, 0, '信贷业务', 'fa fa-cubes', 1, 'menu', 0, '', '', 's:0:"";', '35,36,37,38,39,40,41,42,43,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63', '', 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(3, 2, 2, 3, 1, '客户申请', 'fa fa-envelope', 1, 'menu', 0, 'project/apply', '', 's:0:"";', '36,37,38,39,40', '', 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(4, 2, 4, 5, 1, '调查评估', 'fa fa-binoculars', 1, 'menu', 0, 'project/assess', '', 's:0:"";', '41,42,43,47', '', 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(5, 2, 6, 7, 1, '评审签批', 'fa fa-edit', 1, 'menu', 0, 'project/sign', '', 's:0:"";', '48,49,50,51', '', 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(6, 2, 8, 9, 1, '审查核实', 'fa fa-check-square', 1, 'menu', 0, 'project/check', '', 's:0:"";', '52,53,54,55', '', 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(7, 2, 10, 11, 1, '项目审批', 'fa fa-gavel', 1, 'menu', 0, 'project/approve', '', 's:0:"";', '56,57,58,59', '', 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(8, 2, 12, 13, 1, '信贷发布', 'fa fa-book', 1, 'menu', 0, 'project/publish', '', 's:0:"";', '60,61,62,63', '', 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(9, 2, 14, 15, 1, '贷后管理', 'fa fa-tree', 1, 'menu', 0, 'project/manage', NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(10, 10, 1, 10, 0, '用户与菜单', 'fa fa-sitemap', 1, 'menu', 0, '', '', 's:0:"";', '24,25,26,27,28,29,30', '', 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(11, 10, 2, 3, 1, '员工列表', 'fa fa-user', 1, 'menu', 0, 'user', '', 's:0:"";', '24,25,26,27', '', 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(12, 10, 4, 5, 1, '部门管理', 'fa fa-bank', 1, 'menu', 0, 'auth/role', '', 's:0:"";', '28', '', 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(13, 10, 6, 7, 1, '菜单配置', 'fa fa-list-ol', 1, 'menu', 0, 'auth/menu', '', 's:0:"";', '29', '', 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(14, 10, 8, 9, 1, '权限节点', 'fa fa-key', 1, 'menu', 0, 'auth/permission', '', 's:0:"";', '30', '', 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(15, 15, 1, 6, 0, '工具', 'fa fa-cogs', 1, 'menu', 0, '', '', 's:0:"";', '', '', 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(16, 15, 2, 3, 1, '数据备份', 'fa fa-database', 1, 'menu', 0, 'tool/backup', NULL, NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(17, 15, 4, 5, 1, '数据恢复', 'fa fa-recycle', 1, 'menu', 0, 'tool/recycle', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(18, 18, 1, 2, 0, '根', '', 1, 'role', 1, 'root', '', 's:0:"";', '', '系统', 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 0, 0),
(19, 19, 1, 2, 0, '技术运营', '', 1, 'role', 0, 'developer', '', NULL, NULL, '技术运营部，为方便测试整个系统，开放全部权限，应配置为根用户组，无需分配其他权限', 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(20, 20, 1, 2, 0, '信贷部', '', 1, 'role', 0, 'credit', '', 's:0:"";', '31,32,33,34,36,37,38,39,40,42,49,53,57,64', '', 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(21, 21, 1, 2, 0, '风控部', '', 1, 'role', 0, 'risk', '', 's:0:"";', '41,42,43', '', 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(22, 22, 1, 2, 0, '财务部', '', 1, 'role', 0, 'accounting', '', NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(23, 23, 1, 2, 0, '信贷评审委员会', '', 1, 'role', 0, 'committee', '', 's:0:"";', '35,36,37,38,39,40,41,42,43,47,48,49,50,51,52,53,54,55,56,57,58,59,64,60,61,62,63', '', 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(24, 24, 1, 8, 0, '员工管理', '', 1, 'permission', 0, 'user', '', NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(25, 24, 2, 3, 1, '员工列表', '', 1, 'permission', 0, 'user/index', '', NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(26, 24, 4, 5, 1, '添加员工', '', 1, 'permission', 0, 'user/create', '', NULL, NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(27, 24, 6, 7, 1, '编辑员工[修改-删除]', '', 1, 'permission', 0, 'user/view', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(28, 28, 1, 2, 0, '部门管理', '', 1, 'permission', 0, 'auth/role', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(29, 29, 1, 2, 0, '菜单管理', '', 1, 'permission', 0, 'auth/menu', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(30, 30, 1, 2, 0, '权限节点', '', 1, 'permission', 0, 'auth/permission', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(31, 31, 1, 8, 0, '客户管理', '', 1, 'permission', 0, 'customer', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(32, 31, 2, 3, 1, '客户列表', '', 1, 'permission', 0, 'customer/index', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(33, 31, 4, 5, 1, '添加客户', '', 1, 'permission', 0, 'customer/create', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(34, 31, 6, 7, 1, '编辑客户[修改-删除]', '', 1, 'permission', 0, 'customer/view', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(35, 35, 1, 54, 0, '信贷业务', '', 1, 'permission', 0, 'project', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(36, 35, 2, 11, 1, '客户申请', '', 1, 'permission', 0, 'project/apply', '', 's:0:"";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(37, 35, 3, 4, 2, '申请列表', '', 1, 'permission', 0, 'project/apply/index', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(38, 35, 5, 6, 2, '新增申请', '', 1, 'permission', 0, 'project/apply/create', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(39, 35, 7, 8, 2, '修改申请', '', 1, 'permission', 0, 'project/apply/update', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(40, 35, 9, 10, 2, '认定申请', '', 1, 'permission', 0, 'project/apply/confirm', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(41, 35, 12, 19, 1, '调查评估', '', 1, 'permission', 0, 'assess', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(42, 35, 13, 14, 2, '列表', '', 1, 'permission', 0, 'project/assess', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(43, 35, 15, 16, 2, '提交资料', '', 1, 'permission', 0, 'project/assess/save', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(44, 44, 1, 4, 0, '信贷参数配置', '', 1, 'permission', 0, 'project-config', '', 's:0:"";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(45, 44, 2, 3, 1, '控制台', '', 1, 'permission', 0, 'site/index', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(46, 46, 1, 2, 0, '控制台', 'fa fa-dashboard', 1, 'menu', 0, '', '', 's:7:"s:0:"";";', '44,45', '', 0, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(47, 35, 17, 18, 2, '驳回项目', '', 1, 'permission', 0, 'project/assess/reject', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(48, 35, 20, 27, 1, '评审签批', '', 1, 'permission', 0, 'sign', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(49, 35, 21, 22, 2, '列表', '', 1, 'permission', 0, 'project/sign', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(50, 35, 23, 24, 2, '提交资料', '', 1, 'permission', 0, 'project/sign/save', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(51, 35, 25, 26, 2, '驳回项目', '', 1, 'permission', 0, 'project/sign/reject', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(52, 35, 28, 35, 1, '审查核实', '', 1, 'permission', 0, 'check', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(53, 35, 29, 30, 2, '列表', '', 1, 'permission', 0, 'project/check', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(54, 35, 31, 32, 2, '提交资料', '', 1, 'permission', 0, 'project/check/save', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(55, 35, 33, 34, 2, '驳回项目', '', 1, 'permission', 0, 'project/check/reject', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(56, 35, 36, 45, 1, '项目审批', '', 1, 'permission', 0, 'approve', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(57, 35, 37, 38, 2, '列表', '', 1, 'permission', 0, 'project/approve', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(58, 35, 39, 40, 2, '提交资料', '', 1, 'permission', 0, 'project/approve/save', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(59, 35, 41, 42, 2, '驳回项目', '', 1, 'permission', 0, 'project/approve/reject', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(60, 35, 46, 53, 1, '项目发布', '', 1, 'permission', 0, 'publish', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(61, 35, 47, 48, 2, '列表', '', 1, 'permission', 0, 'project/publish', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(62, 35, 49, 50, 2, '驳回项目', '', 1, 'permission', 0, 'project/publish/reject', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(63, 35, 51, 52, 2, '确认项目', '', 1, 'permission', 0, 'project/publish/save', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(64, 35, 43, 44, 2, '项目确认', '', 1, 'permission', 0, 'project/approve/commit', '', 's:7:"s:0:"";";', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(65, 65, 1, 2, 0, '董事长', '', 1, 'role', 0, 'chairman', '', 's:7:"s:0:"";";', '63', '', 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_auth_rule`
--

CREATE TABLE `ipc_auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ipc_config`
--

CREATE TABLE `ipc_config` (
  `config_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `code` varchar(32) NOT NULL,
  `type` varchar(32) NOT NULL,
  `store_range` varchar(255) DEFAULT NULL,
  `store_dir` varchar(255) DEFAULT NULL,
  `value` text,
  `sort_order` int(11) NOT NULL DEFAULT '50'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ipc_config`
--

INSERT INTO `ipc_config` (`config_id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES
(11, 0, 'info', 'group', '', '', '', 50),
(21, 0, 'basic', 'group', '', '', '', 50),
(31, 0, 'smtp', 'group', '', '', '', 50),
(1111, 11, 'siteName', 'text', '', '', '信贷管理系统', 50),
(1112, 11, 'siteTitle', 'text', '', '', '信贷管理', 50),
(1113, 11, 'siteKeyword', 'text', '', '', '12321321', 50),
(1114, 11, 'chairman', 'select', '', '', '12321321', 50),
(2111, 21, 'timezone', 'select', '-12,-11,-10,-9,-8,-7,-6,-5,-4,-3.5,-3,-2,-1,0,1,2,3,3.5,4,4.5,5,5.5,5.75,6,6.5,7,8,9,9.5,10,11,12', '', '8', 50),
(2112, 21, 'commentCheck', 'select', '0,1', '', '1', 50),
(3111, 31, 'smtpHost', 'text', '', '', 'localhost', 50),
(3112, 31, 'smtpPort', 'text', '', '', '', 50),
(3113, 31, 'smtpUser', 'text', '', '', 'zhujingxiu@hotmail.com', 50),
(3114, 31, 'smtpPassword', 'password', '', '', '123456', 50),
(3115, 31, 'smtpMail', 'text', '', '', '', 50);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_config_check`
--

CREATE TABLE `ipc_config_check` (
  `check_id` int(11) NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remark` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `ipc_config_check`
--

INSERT INTO `ipc_config_check` (`check_id`, `title`, `code`, `status`, `remark`) VALUES
(1, 'A.合规调查', 'compliance', 1, NULL),
(2, 'B.一般调查', 'common', 1, NULL),
(3, 'C.标准调查', 'standard', 1, NULL),
(4, 'D.深入调查', 'deepin', 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_config_fee`
--

CREATE TABLE `ipc_config_fee` (
  `fee_id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL COMMENT '标识名',
  `title` varchar(50) NOT NULL COMMENT '费用',
  `status` int(11) NOT NULL COMMENT '状态',
  `user_type` varchar(100) NOT NULL COMMENT '操作用户',
  `borrow_types` varchar(200) NOT NULL COMMENT '借款方式',
  `borrow_styles` varchar(250) NOT NULL,
  `account_scale_vip` varchar(50) NOT NULL COMMENT 'vip资金的类型',
  `account_scale_all` varchar(50) NOT NULL COMMENT '普通会员的类型',
  `account_scales_vip` varchar(50) NOT NULL,
  `account_scales_all` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL COMMENT '类型',
  `order` int(11) NOT NULL,
  `fee_type` int(2) NOT NULL COMMENT '费用类型',
  `pay_tender` int(2) NOT NULL COMMENT '是否垫付给投资人',
  `pay_tender_scale` varchar(10) NOT NULL COMMENT '垫付投资人的比例',
  `vip_rank` int(2) NOT NULL COMMENT 'vip积分等级比例',
  `all_rank` int(2) NOT NULL COMMENT '积分等级比例',
  `vip_period` int(2) NOT NULL COMMENT 'vip的期数',
  `all_period` int(2) NOT NULL COMMENT '普通会员的期数',
  `vip_borrow_scale` decimal(11,2) NOT NULL COMMENT 'vip借款本金比例',
  `all_borrow_scale` decimal(11,2) NOT NULL COMMENT '会员借款本金比例',
  `vip_borrow_scale_type` varchar(50) NOT NULL COMMENT 'vip借款比例类型',
  `all_borrow_scale_type` varchar(50) NOT NULL COMMENT '会员借款比例类型',
  `vip_borrow_scales` decimal(11,2) NOT NULL COMMENT 'vip借款比例方式',
  `vip_borrow_scales_month` int(11) NOT NULL COMMENT 'vip会员比例的月数',
  `vip_borrow_scales_scale` decimal(11,2) NOT NULL COMMENT 'vip会员借款本金月数的比例',
  `vip_borrow_scales_max` decimal(11,2) NOT NULL COMMENT 'vip借款的比例最大值',
  `all_borrow_scales` decimal(11,2) NOT NULL COMMENT '普通会员借款比例方式',
  `all_borrow_scales_month` int(11) NOT NULL COMMENT '普通会员借款比例方式的月数',
  `all_borrow_scales_scale` decimal(11,2) NOT NULL COMMENT '普通会员借款方式月数的比例',
  `all_borrow_scales_max` decimal(11,2) NOT NULL COMMENT '普通会员最高的利率'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='费用说明';

--
-- 转存表中的数据 `ipc_config_fee`
--

INSERT INTO `ipc_config_fee` (`fee_id`, `code`, `title`, `status`, `user_type`, `borrow_types`, `borrow_styles`, `account_scale_vip`, `account_scale_all`, `account_scales_vip`, `account_scales_all`, `type`, `order`, `fee_type`, `pay_tender`, `pay_tender_scale`, `vip_rank`, `all_rank`, `vip_period`, `all_period`, `vip_borrow_scale`, `all_borrow_scale`, `vip_borrow_scale_type`, `all_borrow_scale_type`, `vip_borrow_scales`, `vip_borrow_scales_month`, `vip_borrow_scales_scale`, `vip_borrow_scales_max`, `all_borrow_scales`, `all_borrow_scales_month`, `all_borrow_scales_scale`, `all_borrow_scales_max`) VALUES
(1, 'credit', '信用管理费', 0, 'borrow', 'credit,worth', 'month,season,end,endmonth,endday', 'capital', 'capital', '', '', 'borrow_success', 1, 1, 0, '', 1, 1, 0, 0, '8.00', '10.00', 'capital', 'account', '1.00', 2, '3.00', '4.00', '10.00', 2, '3.00', '4.00'),
(4, 'advance', '提前还款罚息', 1, 'borrow', 'credit,worth', 'month,season,end,endmonth,endday', 'capital', 'capital', '', '', 'borrow_repay_advance', 4, 1, 1, '', 0, 0, 0, 0, '1.00', '1.00', 'account', 'account', '0.00', 0, '0.00', '0.00', '0.00', 0, '0.00', '0.00'),
(5, 'service', '投资利息服务', 0, 'tender', 'credit,worth', 'month,season,end,endmonth,endday', 'interest', 'interest', '', '', 'borrow_repay', 5, 1, 0, '', 0, 0, 0, 0, '5.00', '10.00', '', '', '0.00', 0, '0.00', '0.00', '0.00', 0, '0.00', '0.00'),
(6, 'lates', '逾期罚金（垫付前）', 1, 'borrow', 'credit,worth', 'month,season,end,endmonth,endday', 'account', 'account', '', '', 'borrow_repay_late', 9, 1, 1, '', 0, 0, 0, 0, '0.40', '0.50', 'account', 'account', '0.00', 0, '0.00', '0.00', '0.00', 0, '0.00', '0.00'),
(7, 'reminder', '逾期管理费（垫付前）', 0, 'borrow', 'credit,worth', '', 'account', 'account', '', '', 'borrow_repay_late', 9, 1, 0, '', 0, 0, 0, 0, '0.50', '0.70', 'account', 'account', '0.00', 0, '0.00', '0.00', '0.00', 0, '0.00', '0.00'),
(11, 'lates_advance', '逾期罚金（垫付后）', 1, 'borrow', 'credit,worth', '', 'account', 'account', '', '', 'borrow_repay_late_remind', 10, 1, 0, '', 0, 0, 0, 0, '0.50', '0.50', 'account', 'account', '0.00', 0, '0.00', '0.00', '0.00', 0, '0.00', '0.00'),
(18, 'reminder_advance', '逾期管理费（垫付后）', 0, 'borrow', 'credit,worth', '', 'account', 'account', '', '', 'borrow_repay_late_remind', 10, 1, 0, '', 0, 0, 0, 0, '0.10', '0.20', 'account', 'account', '0.00', 0, '0.00', '0.00', '0.00', 0, '0.00', '0.00'),
(21, 'manage', '借款管理费', 0, 'borrow', 'credit,worth', 'month', 'capital', 'capital', '', '', 'borrow_repay', 12, 1, 0, '', 0, 0, 0, 0, '2.00', '3.00', 'account', 'account', '0.00', 0, '0.00', '0.00', '0.00', 0, '0.00', '0.00');

-- --------------------------------------------------------

--
-- 表的结构 `ipc_config_handle`
--

CREATE TABLE `ipc_config_handle` (
  `handle_id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL COMMENT '标识名',
  `title` varchar(50) NOT NULL COMMENT '费用',
  `status` int(11) NOT NULL COMMENT '状态',
  `remark` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='处理动作';

--
-- 转存表中的数据 `ipc_config_handle`
--

INSERT INTO `ipc_config_handle` (`handle_id`, `code`, `title`, `status`, `remark`) VALUES
(1, 'borrow_success', '借款成功 ', 1, '借款成功时扣除费用'),
(2, 'borrow_repay', '正常还款 ', 1, ''),
(3, 'borrow_repay_advance', '提前还款 ', 1, ''),
(4, 'borrow_repay_late', '逾期还款（垫付前）', 1, ''),
(5, 'borrow_repay_late_remind', '逾期还款（垫付后）', 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `ipc_config_prove`
--

CREATE TABLE `ipc_config_prove` (
  `prove_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL COMMENT '名称',
  `code` varchar(100) NOT NULL COMMENT '标识名',
  `remark` varchar(200) NOT NULL COMMENT '简介',
  `addtime` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='证明分类';

--
-- 转存表中的数据 `ipc_config_prove`
--

INSERT INTO `ipc_config_prove` (`prove_id`, `title`, `code`, `remark`, `addtime`, `user_id`) VALUES
(1, '申请受理意向表', 'apply', '您的工作状况是我们评估您信用状况的主要依据。请您上传真实可靠的公司信息。\n认证说明:&lt;br/&gt;\n请同时提交下面两项资料：&lt;br/&gt;\na) 通过年检且注册满1年的营业执照。查看示例&lt;br/&gt;\nb) 经营场地租赁合同＋90天内的租金发票或水电单据。', 1339564936, 0),
(2, '项目审批表', 'approve', '您的收入证明是我们评估您信用状况的主要依据。请您上传真实可靠的相关信息。&lt;br /&gt;\n建议文件大小在2M以内。', 1345173034, 0),
(3, '服务协议书', 'service', '您的住址证明是我们评估您信用状况的主要依据。请您上传真实可靠的相关信息。&lt;br /&gt;\n建议文件大小在2M以内。', 1345173056, 0),
(4, '借款协议书', 'borrower', '您的信用报告是我们评估您信用状况的主要依据。请您上传真实可靠的信用报告信息。&lt;br /&gt;\n建议文件大小在2M以内。', 1345173076, 0),
(5, '委托担保合同', 'entrust', '您的社保信息是我们评估您信用状况的主要依据。请您上传真实可靠的相关信息。&lt;br /&gt;\n建议文件大小在2M以内。', 1345173127, 0),
(6, '保证担保函', 'assure', '您的资产证明是我们评估您信用状况的主要依据。请您上传真实可靠的相关信息。&lt;br /&gt;\n建议文件大小在2M以内。', 1345173241, 0),
(7, '调查报告', 'report', '调查报告', 1406515122, 0),
(8, '签名确认表', 'signature', '审核内容', 1409041481, 0),
(9, '申请人身份证', 'applicant', '您的资质认证是我们评估您信用状况的主要依据。请您上传真实可靠的资质证书。&lt;br /&gt;\n建议文件大小在2M以内。', 1409042548, 0),
(10, '担保人身份证', 'guarantor', '您的资质认证是我们评估您信用状况的主要依据。请您上传真实可靠的资质证书。&lt;br /&gt;\r\n建议文件大小在2M以内。', 1409042548, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_config_repayment`
--

CREATE TABLE `ipc_config_repayment` (
  `repayment_id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL COMMENT '标示名',
  `status` int(11) NOT NULL COMMENT '是否启用',
  `title` varchar(50) NOT NULL COMMENT '名称，可改',
  `contents` longtext NOT NULL COMMENT '算法公式',
  `remark` longtext NOT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='还款方式';

--
-- 转存表中的数据 `ipc_config_repayment`
--

INSERT INTO `ipc_config_repayment` (`repayment_id`, `code`, `status`, `title`, `contents`, `remark`) VALUES
(1, 'month', 1, '等额本息', '月还款本息=贷款本金×月利率×（1 月利率）还款月数/[（1 月利率）还款月数-1]', ''),
(2, 'endmonth', 1, '按月付息，到期利随本清', '按月付息到期还本息', ''),
(3, 'interest', 1, '返还收益', '月还利息，不需要还本金', '');

-- --------------------------------------------------------

--
-- 表的结构 `ipc_config_status`
--

CREATE TABLE `ipc_config_status` (
  `status_id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `code` varchar(32) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remark` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='业务流程状态';

--
-- 转存表中的数据 `ipc_config_status`
--

INSERT INTO `ipc_config_status` (`status_id`, `title`, `code`, `status`, `remark`) VALUES
(1, '排队中', 'queuing', 1, ''),
(2, '已认定', 'confirmed', 1, ''),
(3, '已评估', 'assessed', 1, ''),
(4, '调查中', 'checking', 1, ''),
(5, '已审批', 'approved', 1, ''),
(6, '已签订', 'signed', 1, ''),
(7, '已完结', 'finished', 1, ''),
(8, '缺件', 'lacking', 1, ''),
(9, '已拒绝', 'rejected', 1, ''),
(10, '已终止', 'terminated', 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `ipc_config_tender`
--

CREATE TABLE `ipc_config_tender` (
  `tender_id` int(11) NOT NULL COMMENT 'id',
  `code` varchar(50) NOT NULL COMMENT '类型标识名',
  `status` int(11) NOT NULL COMMENT '状态',
  `title` varchar(50) NOT NULL COMMENT '名称',
  `remark` varchar(250) NOT NULL COMMENT '描述',
  `account_multiple` int(11) NOT NULL COMMENT '借款金额的倍数',
  `password_status` int(2) NOT NULL COMMENT '是否启用借款密码',
  `amount_type` varchar(50) NOT NULL COMMENT '借款额度类型',
  `amount_first` int(11) NOT NULL COMMENT '最低借款额度',
  `amount_end` int(11) NOT NULL COMMENT '最高借款额度',
  `frost_scale_vip` decimal(15,6) NOT NULL COMMENT 'vip冻结比例',
  `admin_status` int(2) NOT NULL DEFAULT '0' COMMENT '是否管理员可以发布',
  `apr_first` decimal(15,6) NOT NULL COMMENT '开始年利率',
  `apr_end` decimal(15,6) NOT NULL COMMENT '结束年利率',
  `check_first` int(11) NOT NULL COMMENT '审核最短时间',
  `check_end` int(11) NOT NULL COMMENT '审核最长时间',
  `tender_account_min` varchar(200) NOT NULL COMMENT '最低投标金额',
  `tender_account_max` varchar(200) NOT NULL COMMENT '最高投标金额',
  `period_first` int(11) NOT NULL COMMENT '开始有效期',
  `period_end` int(11) NOT NULL COMMENT '开始结束期',
  `validate_first` int(11) NOT NULL COMMENT '开始有效期',
  `validate_end` int(11) NOT NULL COMMENT '结束有效期',
  `award_status` int(2) NOT NULL COMMENT '是否启用奖励',
  `award_scale_first` decimal(15,6) NOT NULL COMMENT '奖励的最小值',
  `award_scale_end` decimal(15,6) NOT NULL COMMENT '奖励的最大值',
  `award_account_first` decimal(15,6) NOT NULL COMMENT '不能小于此奖励金额',
  `award_account_end` decimal(15,6) NOT NULL COMMENT '不能大于此奖励金额',
  `award_false_status` int(2) NOT NULL COMMENT '是否启用奖励失败也进行奖励',
  `verify_auto_status` int(2) NOT NULL COMMENT '初审自动通过',
  `verify_auto_remark` varchar(250) NOT NULL COMMENT '初审自动通过备注',
  `styles` varchar(200) NOT NULL COMMENT '还款方式',
  `frost_scale` decimal(15,6) NOT NULL COMMENT '冻结保证金比例',
  `late_days` int(11) NOT NULL COMMENT '多久开始进行垫付',
  `vip_late_scale` decimal(15,6) NOT NULL COMMENT 'vip逾期垫付本息比例',
  `all_late_scale` decimal(15,6) NOT NULL COMMENT '普通会员垫付本金比例',
  `part_status` int(2) NOT NULL COMMENT '是否启用部分借款',
  `system_borrow_full_status` int(11) NOT NULL COMMENT '系统满标审核',
  `system_borrow_repay_status` int(11) NOT NULL COMMENT '系统用户还款',
  `system_web_repay_status` int(11) NOT NULL COMMENT '系统逾期自动垫付',
  `diamond_late_scale` decimal(15,6) NOT NULL COMMENT '砖石客户',
  `gold_repay_type` varchar(50) NOT NULL,
  `silver_repay_type` varchar(50) NOT NULL,
  `all_repay_type` varchar(50) NOT NULL,
  `gold_late_scale` decimal(15,6) NOT NULL,
  `silver_late_scale` decimal(15,6) NOT NULL,
  `diamond_repay_type` varchar(50) NOT NULL,
  `fixed_repay_day` int(11) NOT NULL COMMENT '固定还款日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='标的种类';

--
-- 转存表中的数据 `ipc_config_tender`
--

INSERT INTO `ipc_config_tender` (`tender_id`, `code`, `status`, `title`, `remark`, `account_multiple`, `password_status`, `amount_type`, `amount_first`, `amount_end`, `frost_scale_vip`, `admin_status`, `apr_first`, `apr_end`, `check_first`, `check_end`, `tender_account_min`, `tender_account_max`, `period_first`, `period_end`, `validate_first`, `validate_end`, `award_status`, `award_scale_first`, `award_scale_end`, `award_account_first`, `award_account_end`, `award_false_status`, `verify_auto_status`, `verify_auto_remark`, `styles`, `frost_scale`, `late_days`, `vip_late_scale`, `all_late_scale`, `part_status`, `system_borrow_full_status`, `system_borrow_repay_status`, `system_web_repay_status`, `diamond_late_scale`, `gold_repay_type`, `silver_repay_type`, `all_repay_type`, `gold_late_scale`, `silver_late_scale`, `diamond_repay_type`, `fixed_repay_day`) VALUES
(1, 'credit', 0, '工艺通', '●从事工艺类个体工商户，公司&lt;br/&gt;						●个人征信，银行流水&lt;br/&gt;\n●申请更高额度需要资产抵押&lt;br/&gt;', 50, 0, 'credit', 30000, 3000000, '0.000000', 0, '8.000000', '20.000000', 1, 5, '100,150,200,300,500,1000,1500,200000', '0,50,150,200,300,500,1000,2000,3000,5000,10000,1000000', 1, 12, 1, 15, 1, '1.000000', '12.000000', '0.000000', '5.000000', 0, 0, '', 'month,endmonth', '0.000000', 15, '0.000000', '100.000000', 1, 0, 0, 0, '100.000000', 'account', 'account', 'account', '100.000000', '100.000000', 'account', 0),
(2, 'worth', 0, '电商通', '●通过认证的网店卖家&lt;br/&gt;			●商城经营超过六个月淘宝两钻以上&lt;br/&gt;					●申请更高额度需要资产抵押', 50, 1, 'worth', 3000, 300000, '0.000000', 0, '12.000000', '20.000000', 1, 3, '50,100,150,200,300,500,1000', '0,50,150,200,300,500,1000,2000,3000,5000', 1, 6, 1, 15, 0, '0.010000', '2.000000', '1.000000', '10.000000', 0, 0, '', 'month,endmonth', '0.000000', 15, '0.000000', '50.000000', 1, 0, 0, 0, '50.000000', 'account', 'account', 'account', '50.000000', '50.000000', 'account', 0),
(3, 'day', 0, '天标', '快借标，通过网站的资信审查获得信用额度。', 0, 0, 'credit', 10, 200000, '0.000000', 0, '12.000000', '20.000000', 1, 3, '0,50,100,150,200,300,500,1000', '0,50,150,200,300,500,1000,2000,3000,5000', 1, 15, 1, 9, 0, '0.010000', '2.000000', '1.000000', '10.000000', 0, 0, '', '', '0.000000', 15, '0.000000', '50.000000', 1, 0, 0, 0, '0.000000', 'none', 'none', 'account', '0.000000', '0.000000', 'none', 0),
(4, 'vouch', 1, '担保标', '网站做为第三方担保，通过网站的资信审查获得担保额度。', 100, 0, 'vouch', 1000, 200000, '0.000000', 0, '8.000000', '24.000000', 1, 3, '50,100,150,200,300,500,1000', '0,50,150,200,300,500,1000,2000,3000,5000', 1, 12, 1, 9, 0, '0.010000', '2.000000', '1.000000', '10.000000', 0, 0, '', 'month,season,end,endmonths', '0.000000', 15, '90.000000', '90.000000', 1, 0, 0, 0, '0.000000', '', '', '', '0.000000', '0.000000', '', 0),
(5, 'pawn', 1, '抵押标', '通过网站的资信审查获得抵押额度。', 0, 0, 'pawn', 100, 500000, '0.000000', 0, '8.000000', '24.000000', 1, 3, '50,100,150,200,300,500,1000', '0,50,150,200,300,500,1000,2000,3000,5000', 1, 24, 1, 9, 0, '0.010000', '2.000000', '1.000000', '10.000000', 0, 0, '', 'month,endmonth', '0.000000', 1, '0.000000', '100.000000', 1, 0, 0, 0, '0.000000', 'none', 'none', 'none', '0.000000', '0.000000', 'none', 0),
(6, 'zhuoyin', 1, '卓银贷', '●从事工艺类个体工商户，公司&lt;br/&gt;						●个人征信，银行流水&lt;br/&gt;\n●申请更高额度需要资产抵押&lt;br/&gt;', 0, 0, '', 3000, 3000000, '0.000000', 0, '12.000000', '28.000000', 1, 3, '100,150,200,300,500,1000', '0,50,150,200,300,500,1000,2000,3000,5000', 1, 12, 1, 15, 0, '0.010000', '2.000000', '1.000000', '10.000000', 0, 0, '', 'month,endmonth', '0.000000', 15, '0.000000', '100.000000', 1, 0, 0, 0, '100.000000', 'account', 'account', 'account', '100.000000', '100.000000', 'account', 0),
(7, 'roam', 0, '通通赚', '通过网站的资信审查获得流转额度。', 50, 0, 'vest', 3000, 3000000, '0.000000', 0, '10.000000', '20.000000', 1, 9, '100,150,200,300,500,1000', '0,500,1000,2000,3000,5000,10000,50000', 1, 12, 0, 15, 0, '0.500000', '2.000000', '5.000000', '50.000000', 0, 0, '', '', '0.000000', 15, '0.000000', '100.000000', 0, 0, 0, 0, '100.000000', 'account', 'account', 'account', '100.000000', '100.000000', 'account', 0),
(11, 'huinong', 1, '惠农货', '是面向三农的贷款，即农村、农业、农户的贷款，在核定的额度和期限内向农户发放的信用、保证类贷款', 100, 0, '', 10000, 3000000, '0.000000', 0, '12.000000', '20.000000', 1, 5, '100,150,200,300,500,1000,1500,200000', '0,50,150,200,300,500,1000,2000,3000,5000,10000,1000000', 1, 12, 1, 15, 0, '1.000000', '12.000000', '0.000000', '0.000000', 0, 0, '', 'endmonth', '0.000000', 15, '0.000000', '100.000000', 1, 0, 0, 0, '100.000000', 'account', 'account', 'account', '100.000000', '100.000000', 'account', 0),
(12, 'qingchuang', 1, '青创贷', '青创贷是指具有一定生产经营能力或已经从事生产经营的青年，因创业或再创业提出资金需求申请，经我司认可有效担保后而发放的一种专项贷款', 100, 0, '', 10000, 3000000, '0.000000', 0, '12.000000', '20.000000', 1, 5, '100,150,200,300,500,1000,1500,200000', '0,50,150,200,300,500,1000,2000,3000,5000,10000,1000000', 1, 12, 1, 15, 0, '1.000000', '12.000000', '0.000000', '0.000000', 0, 0, '', 'endmonth', '0.000000', 15, '0.000000', '100.000000', 1, 0, 0, 0, '100.000000', 'account', 'account', 'account', '100.000000', '100.000000', 'account', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_customer`
--

CREATE TABLE `ipc_customer` (
  `customer_id` int(11) NOT NULL,
  `realname` varchar(64) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `gender` enum('male','female','unkonwn') NOT NULL DEFAULT 'unkonwn',
  `birthday` date DEFAULT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT '0',
  `vip` tinyint(4) NOT NULL DEFAULT '0',
  `idnumber` varchar(32) DEFAULT NULL,
  `addtime` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ipc_customer`
--

INSERT INTO `ipc_customer` (`customer_id`, `realname`, `phone`, `email`, `gender`, `birthday`, `approved`, `vip`, `idnumber`, `addtime`, `status`) VALUES
(1, '张三', '13245654321', 'a@b.c', 'male', '2009-07-24', 1, 1, '3211237178432874', 1438797986, 1),
(2, '李四', '', '67868723-sadas', 'unkonwn', NULL, 0, 0, '6531237178432874', 1438797986, 1),
(3, '王五', '', '', 'unkonwn', NULL, 0, 0, '3211325646687998', 1458199841, 0),
(4, '哈哈', '', '', 'unkonwn', NULL, 0, 0, '878964661323213', 1458200313, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_customer_company`
--

CREATE TABLE `ipc_customer_company` (
  `company_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `coperate` varchar(64) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `address` varchar(128) NOT NULL,
  `product` varchar(256) NOT NULL,
  `bussiness` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `addtime` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='客户公司单位';

-- --------------------------------------------------------

--
-- 表的结构 `ipc_customer_history`
--

CREATE TABLE `ipc_customer_history` (
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

CREATE TABLE `ipc_filemanager_mediafile` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `alt` text COLLATE utf8_unicode_ci,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `thumbs` text COLLATE utf8_unicode_ci,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `ipc_filemanager_mediafile`
--

INSERT INTO `ipc_filemanager_mediafile` (`id`, `filename`, `type`, `url`, `alt`, `size`, `description`, `thumbs`, `created_at`, `updated_at`) VALUES
(1, 'avatar2.png', 'image/png', '/uploads/2016/04/avatar2.png', NULL, '8836', NULL, 'a:3:{s:5:"small";s:36:"/uploads/2016/04/avatar2-100x100.png";s:6:"medium";s:36:"/uploads/2016/04/avatar2-300x200.png";s:5:"large";s:36:"/uploads/2016/04/avatar2-500x400.png";}', 1460986245, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_filemanager_owners`
--

CREATE TABLE `ipc_filemanager_owners` (
  `mediafile_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner_attribute` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `ipc_migration`
--

CREATE TABLE `ipc_migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `ipc_migration`
--

INSERT INTO `ipc_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1460824979),
('m141129_130551_create_filemanager_mediafile_table', 1460985485),
('m141203_173402_create_filemanager_owners_table', 1460985485),
('m141203_175538_add_filemanager_owners_ref_mediafile_fk', 1460985485),
('m151008_162401_create_notification_table', 1461749817);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_notification`
--

CREATE TABLE `ipc_notification` (
  `id` int(11) NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `key_id` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `ipc_notification`
--

INSERT INTO `ipc_notification` (`id`, `key`, `key_id`, `type`, `user_id`, `seen`, `created_at`) VALUES
(1, 'no_disk_space', NULL, 'error', 1, 1, '2016-04-28 09:12:12'),
(2, 'meeting_reminder', 2, 'default', 1, 1, '2016-04-28 10:17:25'),
(3, 'new_message', 3, 'success', 1, 1, '2016-04-28 10:18:35'),
(4, 'new_message', 3, 'success', 2, 0, '2016-04-29 13:34:16'),
(5, 'new_message', 3, 'success', 2, 1, '2016-04-29 13:34:16');

-- --------------------------------------------------------

--
-- 表的结构 `ipc_project`
--

CREATE TABLE `ipc_project` (
  `project_id` int(11) NOT NULL,
  `project_sn` varchar(32) NOT NULL,
  `borrower` varchar(64) NOT NULL,
  `corporator` varchar(64) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `company` varchar(128) NOT NULL,
  `address` varchar(128) DEFAULT NULL,
  `product` varchar(128) DEFAULT NULL,
  `bussiness` varchar(128) DEFAULT NULL,
  `text` text,
  `amount` decimal(15,4) NOT NULL,
  `due` smallint(6) NOT NULL,
  `tender` smallint(6) NOT NULL,
  `repayment` smallint(6) NOT NULL,
  `agent_a` int(11) NOT NULL DEFAULT '0',
  `agent_b` int(11) NOT NULL DEFAULT '0',
  `intent` text COMMENT '资金用途',
  `source` text COMMENT '还贷来源及计划',
  `ensure` text COMMENT '保证措施',
  `addtime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `level` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `edittime` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='项目';

--
-- 转存表中的数据 `ipc_project`
--

INSERT INTO `ipc_project` (`project_id`, `project_sn`, `borrower`, `corporator`, `phone`, `company`, `address`, `product`, `bussiness`, `text`, `amount`, `due`, `tender`, `repayment`, `agent_a`, `agent_b`, `intent`, `source`, `ensure`, `addtime`, `status`, `level`, `user_id`, `edittime`) VALUES
(3, '0056', '曾国藩', '曾国藩456456', '', '湘军', '湘军sssss', '湘军4654645', '湘军', 'sdasdasdsadsassssssss', '200.0000', 36, 5, 1, 2, 3, '剿匪', '打败长毛贼，攻破天京城', '苛捐杂税', 1463477491, 4, 4, 1, 1463477491),
(4, '0059', '李鸿章', '李鸿章', '', '淮军', '淮军', '淮军', '淮军', 'ewrewrewdsadsadsa', '200.0000', 36, 5, 1, 2, 3, '剿灭长毛', '慈禧太后封赏', '苛捐杂税', 1462332389, 1, 0, 1, 1462865471),
(15, '0052', '左宗棠', '左宗棠', '', '楚军', '楚军', '楚军', '楚军', 'sadsadsadsa', '300.0000', 24, 4, 2, 2, 3, '', '', '', 1462334374, 2, 4, 1, 1463364101),
(16, '0562', '朱景修', '朱景修', '', '珠宝公司', '珠宝公司珠宝公司珠宝公司', '珠宝', '珠宝批发零售', 'sadsa', '200.0000', 12, 5, 2, 2, 3, '', '', '', 1462610168, 9, 5, 1, 1463134004),
(17, '0058', '许一城', '许一城', '', '五眼梅花', '老北京', '古玩鉴定', '古玩批发零售', 'sadasdasdsa', '250.0000', 12, 5, 3, 3, 2, '', '', '', 1463134994, 4, 4, 1, 1463134994),
(18, '0060', '庄睿', '庄睿', '', '典当行', '中海市', '典当行', '典当行', 'asdsa', '130.0000', 18, 5, 2, 3, 2, '', '', '', 1463363204, 4, 4, 1, 1463363204),
(19, '0062', '药慎行', '药慎行', '', '药慎行', '药慎行', '药慎行', '药慎行药慎行', '药慎行药慎行', '100.0000', 12, 5, 3, 3, 2, '', '', '', 1463364152, 6, 5, 1, 1463364152),
(20, '0063', '夏洛特', '夏洛特', '', '英国侦探社', '伦敦贝克街', '私人侦探', '私人侦探', 'sadsadsasasadasdas', '300.0000', 12, 5, 2, 1, 2, '97879', '', '', 1462777259, 3, 5, 1, 1463109329),
(22, '0068', '林建清', '林建清', '', '东峤一典一珠宝', '珠宝公司珠宝公司珠宝公司', '金镶玉', '珠宝批发零售', '', '300.0000', 12, 5, 2, 1, 2, '', '', '', 1463712329, 5, 5, 9, 1463712329),
(24, '0069', '某某某', '某某某', '', '某某某', '某某某', '某某某', '某某某', '某某某', '200.0000', 36, 4, 2, 2, 1, '', '', '', 1463475741, 4, 5, 1, 1463475741);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_project_attach`
--

CREATE TABLE `ipc_project_attach` (
  `attach_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `prove_id` int(11) NOT NULL,
  `file` text COLLATE utf8_unicode_ci,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  `sort` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `ipc_project_attach`
--

INSERT INTO `ipc_project_attach` (`attach_id`, `project_id`, `prove_id`, `file`, `title`, `remark`, `status`, `user_id`, `addtime`, `sort`) VALUES
(1, 16, 7, '["[{\\"name\\":\\"copydireactory.jpg\\",\\"path\\":\\"/uploads/2016/05/0562-13175335-a090af.jpg\\",\\"type\\":\\"image/jpeg\\"}]","[{\\"name\\":\\"icreader.png\\",\\"path\\":\\"/uploads/2016/05/0562-13175335-ad2623.png\\",\\"type\\":\\"image/png\\"}]"]', 'sasssss', 'sssss', 1, 0, 0, 1),
(2, 18, 7, '[{"name":"icreader.png","path":"/uploads/2016/05/16094637-54acfc.png","type":"image/png"}]', '3213123123123', '', 1, 0, 0, 1),
(3, 17, 7, '[{"name":"icreader.png","path":"/uploads/2016/05/16094637-54acfc.png","type":"image/png"}]', 'sasssss', 'sssss', 1, 6, 0, 1),
(4, 24, 7, '[{"name":"photo4.jpg","path":"/uploads/2016/05/17170214-432a05.jpg","type":"image/jpeg"},{"name":"photo3.jpg","path":"/uploads/2016/05/17170213-ea1a4f.jpg","type":"image/jpeg"},{"name":"photo1.png","path":"/uploads/2016/05/17170212-06d903.png","type":"image/png"}]', 'sadsadsa', 'dasdsadsasa', 0, 0, 0, 1),
(6, 3, 7, '[{"name":"调查报告.docx","path":"/uploads/2016/05/17173124-8e8d6d.docx","type":"application/octet-stream"}]', '565454', '566', 0, 0, 0, 1),
(7, 22, 7, '[{"name":"IMG_20160519_150745.jpg","path":"/uploads/2016/05/19150712-7dff83.jpg","type":"image/jpeg"}]', '关于林建清100万授信的调查报告', '', 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_project_audit`
--

CREATE TABLE `ipc_project_audit` (
  `audit_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `audit_sn` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `borrower` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `contract_sn` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(13,2) NOT NULL,
  `tender` smallint(6) NOT NULL,
  `ensure` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `due` int(11) NOT NULL,
  `prebid` date NOT NULL,
  `operator` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `addtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `ipc_project_comment`
--

CREATE TABLE `ipc_project_comment` (
  `comment_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `mode` enum('undertake','credit','risk','committee') NOT NULL DEFAULT 'undertake',
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `addtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='项目担保人';

--
-- 转存表中的数据 `ipc_project_comment`
--

INSERT INTO `ipc_project_comment` (`comment_id`, `project_id`, `mode`, `content`, `user_id`, `status`, `addtime`) VALUES
(4, 24, 'undertake', '', 1, 1, 0),
(5, 21, 'credit', '', 1, 1, 0),
(6, 24, 'credit', '信贷部意', 1, 1, 1463563665),
(7, 24, 'risk', '风控合规部', 1, 1, 1463563720),
(8, 17, 'credit', '', 1, 1, 1463628701),
(9, 17, 'committee', '', 8, 1, 1463628701),
(10, 17, 'undertake', '', 2, 1, 1463651279),
(11, 18, 'committee', 'sadsads', 8, 1, 1463710744),
(12, 18, 'committee', 'sadsads', 8, 1, 1463710852),
(13, 3, 'committee', '', 8, 1, 1463710874),
(14, 24, 'committee', '', 8, 1, 1463710894),
(15, 22, 'committee', '', 8, 1, 1463710901),
(16, 17, 'committee', '', 9, 1, 1463711032),
(28, 22, 'committee', '', 9, 1, 1463712329);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_project_history`
--

CREATE TABLE `ipc_project_history` (
  `history_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `note` text,
  `addtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='项目状态变更';

--
-- 转存表中的数据 `ipc_project_history`
--

INSERT INTO `ipc_project_history` (`history_id`, `project_id`, `status`, `user_id`, `note`, `addtime`) VALUES
(1, 10, 0, 1, NULL, 1462333250),
(2, 11, 0, 1, NULL, 1462333267),
(5, 15, 0, 1, NULL, 1462334374),
(6, 20, 0, 1, NULL, 1462871074),
(7, 24, 0, 1, NULL, 1462871118),
(9, 19, 8, 1, 'ssss', 1462936980),
(10, 3, 8, 1, '12321321', 1462937078),
(11, 20, 8, 1, 'sadsa', 1462937270),
(12, 22, 8, 1, 'sadsads', 1462937625),
(13, 24, 8, 1, 'asdsad', 1462937800),
(14, 24, 2, 1, NULL, 1462939392),
(15, 24, 8, 1, '2132131', 1462950099),
(16, 24, 2, 1, NULL, 1462950157),
(17, 22, 2, 1, NULL, 1462950167),
(18, 20, 2, 1, NULL, 1462950181),
(19, 24, 3, 1, '', 1462953337),
(20, 18, 3, 1, '<p>sadsadsadsadsadsa</p>', 1462953448),
(21, 16, 2, 1, NULL, 1462953475),
(22, 19, 2, 1, NULL, 1462953509),
(23, 24, 4, 1, 'ewqewqewqewq', 1463039683),
(24, 18, 4, 1, '12321321', 1463043744),
(25, 24, 9, 1, '221312', 1463044125),
(26, 18, 9, 1, '12321321', 1463044138),
(27, 18, 2, 1, NULL, 1463044149),
(28, 24, 2, 1, NULL, 1463044155),
(29, 17, 2, 1, NULL, 1463044161),
(30, 17, 3, 1, '<p>qwewqewqewqeqwe</p>', 1463044175),
(31, 19, 3, 1, '<p>qwewqewqewq</p>', 1463044182),
(32, 18, 3, 1, '<p>21312321</p>', 1463044189),
(33, 16, 3, 1, '<p>12321321321</p>', 1463044195),
(34, 17, 4, 1, '12321321', 1463044218),
(35, 19, 4, 1, 'asdsadsad', 1463044265),
(36, 18, 4, 1, 'erewrw', 1463044322),
(37, 16, 4, 1, 'asdsadsa', 1463044872),
(38, 17, 9, 1, '321321', 1463045074),
(39, 19, 9, 1, '123213', 1463045082),
(40, 18, 9, 1, '12321321', 1463045087),
(41, 18, 2, 1, NULL, 1463109283),
(42, 17, 2, 1, NULL, 1463109293),
(43, 19, 2, 1, NULL, 1463109299),
(44, 17, 3, 1, '<p>21342143432432</p>', 1463109313),
(45, 24, 3, 1, '<p>23432432432432</p>', 1463109321),
(46, 20, 3, 1, '<p>23423432432</p>', 1463109329),
(47, 18, 3, 1, '<p>543543543</p>', 1463109362),
(48, 24, 4, 1, 'asdsadsadsa', 1463109394),
(49, 16, 4, 1, 'sssss', 1463134004),
(50, 17, 4, 1, '654654', 1463134994),
(51, 18, 6, 1, '21313', 1463135159),
(52, 18, 4, 1, '', 1463136025),
(53, 18, 4, 1, '', 1463363204),
(54, 15, 2, 1, NULL, 1463364101),
(55, 19, 3, 1, '<p>8777997798</p>', 1463364116),
(56, 22, 3, 1, '<p>899797897</p>', 1463364126),
(57, 19, 6, 1, '79978789978', 1463364152),
(58, 22, 6, 1, '97946651', 1463364163),
(59, 24, 6, 1, '12312321', 1463475707),
(60, 24, 4, 1, 'dasdsadsasa', 1463475741),
(61, 3, 2, 1, NULL, 1463476665),
(62, 3, 3, 1, '<p class="MsoNormal"><span style="font-family: ''微软雅黑'',''sans-serif''; mso-ascii-font-family: Tahoma; mso-hansi-font-family: Tahoma;">该客户由</span><span lang="EN-US">XX</span><span style="font-family: ''微软雅黑'',''sans-serif''; mso-ascii-font-family: Tahoma; mso-hansi-font-family: Tahoma;">担保公司</span><span lang="EN-US">XXX</span><span style="font-family: ''微软雅黑'',''sans-serif''; mso-ascii-font-family: Tahoma; mso-hansi-font-family: Tahoma;">介绍至我公司。客观化</span><span lang="EN-US">sadsa</span><span style="font-family: ''微软雅黑'',''sans-serif''; mso-ascii-font-family: Tahoma; mso-hansi-font-family: Tahoma;">按时回家汇款后看见爱是会尽快的还是卡件号地块</span> <span style="font-family: ''微软雅黑'',''sans-serif''; mso-ascii-font-family: Tahoma; mso-hansi-font-family: Tahoma;">看哈撒空间的海口市安徽的卡仕达撒的空间会撒娇看好的空间会撒娇看哈撒烤菊花贷款哈萨克的凯撒和的卡号撒看好的卡萨好看的花洒空间号地块萨地区为婆婆是泼妇是假的</span> <span style="font-family: ''微软雅黑'',''sans-serif''; mso-ascii-font-family: Tahoma; mso-hansi-font-family: Tahoma;">几乎是立刻答复还是贷款恢复</span></p>\r\n<p>&nbsp;</p>\r\n<p class="MsoNormal"><em><span lang="EN-US" style="font-family: ''Tahoma'',''sans-serif''; mso-bidi-font-family: ''Times New Roman''; mso-bidi-theme-font: minor-bidi;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></em><strong><em><span style="font-family: ''微软雅黑'',''sans-serif''; mso-ascii-font-family: Tahoma; mso-hansi-font-family: Tahoma; mso-bidi-font-family: ''Times New Roman''; mso-bidi-theme-font: minor-bidi;">客户资产情况：a</span></em></strong></p>\r\n<p class="MsoNormal"><strong><em><span style="font-family: ''微软雅黑'',''sans-serif''; mso-ascii-font-family: Tahoma; mso-hansi-font-family: Tahoma; mso-bidi-font-family: ''Times New Roman''; mso-bidi-theme-font: minor-bidi;">asdsadsad</span></em></strong><em><span style="font-family: ''微软雅黑'',''sans-serif''; mso-ascii-font-family: Tahoma; mso-hansi-font-family: Tahoma; mso-bidi-font-family: ''Times New Roman''; mso-bidi-theme-font: minor-bidi;">asdsadsadsa sadsads没得撒娇啊看见借款dlk</span></em></p>', 1463476922),
(63, 3, 6, 1, 'asdsa', 1463477267),
(64, 3, 4, 1, '', 1463477328),
(65, 3, 6, 1, '564654', 1463477463),
(66, 3, 4, 1, '566', 1463477491),
(67, 22, 4, 1, '', 1463641647),
(68, 22, 5, 9, NULL, 1463712329);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_project_investigate`
--

CREATE TABLE `ipc_project_investigate` (
  `investigate_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `level` tinyint(4) NOT NULL COMMENT '调查等级',
  `officer` int(11) NOT NULL COMMENT '风险官',
  `remark` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `addtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `ipc_project_investigate`
--

INSERT INTO `ipc_project_investigate` (`investigate_id`, `project_id`, `level`, `officer`, `remark`, `status`, `user_id`, `addtime`) VALUES
(1, 16, 3, 6, 'asdsadsa', 1, 1, 1463044872),
(2, 24, 4, 6, 'asdsadsadsa', 1, 1, 1463109394),
(3, 17, 2, 6, '654654', 1, 1, 1463134994),
(4, 18, 3, 6, '21313', 1, 1, 1463135159),
(5, 19, 3, 6, '79978789978', 1, 1, 1463364151),
(6, 22, 3, 6, '97946651', 1, 1, 1463364163),
(7, 24, 2, 7, '12312321', 1, 1, 1463475707),
(8, 3, 3, 7, 'asdsa', 1, 1, 1463477267),
(9, 3, 3, 7, '564654', 1, 1, 1463477463);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_project_order`
--

CREATE TABLE `ipc_project_order` (
  `order_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `income` decimal(5,2) NOT NULL,
  `fee` decimal(5,2) NOT NULL,
  `prebid` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `addtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `ipc_project_order`
--

INSERT INTO `ipc_project_order` (`order_id`, `project_id`, `income`, `fee`, `prebid`, `user_id`, `status`, `addtime`) VALUES
(1, 22, '10.30', '8.90', '2016-07-09', 1, 1, 1463714909);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_project_publish`
--

CREATE TABLE `ipc_project_publish` (
  `publish_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `mode` enum('undertake','risk','contract','chairman') NOT NULL DEFAULT 'undertake',
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `addtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='项目担保人';

--
-- 转存表中的数据 `ipc_project_publish`
--

INSERT INTO `ipc_project_publish` (`publish_id`, `project_id`, `mode`, `content`, `user_id`, `status`, `addtime`) VALUES
(1, 22, 'undertake', '', 1, 1, 1463730669),
(2, 22, 'risk', 'sadsada', 1, 1, 1463730738),
(3, 22, 'contract', 'sadsadsa', 1, 1, 1463730842);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_user`
--

CREATE TABLE `ipc_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `realname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_root` tinyint(4) NOT NULL DEFAULT '0',
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `ipc_user`
--

INSERT INTO `ipc_user` (`user_id`, `username`, `realname`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `is_root`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '管理员', 'TOL_4sICqCHD4n1UOYE0ZAaAgkCnlEWD', '$2y$13$DHvK27g4EpqJ5eoOk.hHkeCPKb2mcwCrsjm6lLQ/8lUdCk5Beq9ei', '', 'admin@demo.com', 1, '18,20,21', 1, 1460626630, 1463560891),
(2, 'zhujingxiu', '朱景修', 'ePx45s5O34IH8b6JLP4tXCd8yTE-_5Xj', '$2y$13$cSy0Q/SBoCqLB7bAEVv26eyWUjEX0g5IwdRG11xj0y8W0cmygOsQC', 'tBuqUrt-7s5AW7cHtE59zsdvhiAgBwKD_1460704462', 'a@b.c', 0, '20', 1, 1460704461, 1461744037),
(3, 'demo', '测试ssssss', 'u9YYoa_465SfLOyrwpjHkklNAG5gKnTM', '$2y$13$d6rmH9jBlEYH28qX1kuGHeeR.JDD5a4OXzqU3HVA68IA1L8zQ7Dny', 'nm_bCQH2XeCT6iFfHNQYBxfw8VTBZSrX_1460724094', 'demo@demo.c', 0, '21', 1, 1460724092, 1463705651),
(4, 'xinyan111', '李百度', 'Cs_ABHE-C3AnQzm1dQUX8QpVfISXaBhQ', '$2y$13$nzmlFHpjU516nFF7FQvEAOn/rWvq1XVl0eqHQ1gTwh.Igh9dSiWq.', 'zMSId3YZcqJufEsNBqQouXJx8zbaHt1p_1463013872', 'a@baidu.c', 0, '20', 1, 1463013872, 1463013872),
(5, 'xinyan222', '马腾讯', 'dpXTlD8b_2RPlQZaRWGOB1wp4ogN7t_o', '$2y$13$cdweCjOIkpVWgD/Dri7Lo.hHfnmcbh3cEe3sphx12wnpHfAQgFPoa', '-BogDn5Mh0I8x2V3eTYJxN_cAOyjfICZ_1463014029', 'a@qq.com', 0, '20', 1, 1463014028, 1463014028),
(6, 'xinyan333', '马阿狸', 'MgRzb_AvNhmrVRN7YXU-cEk2DtTjh5M6', '$2y$13$WchGxvGmsmoBo5CKwSzOn.0SAUewhEcyW2OO45jJMqV4hnOA2l/62', 'QAErW1lhP2OlvVisBJN5MHV7gR75tO1v_1463014122', 'a@taobao.c', 0, '21', 1, 1463014122, 1463014122),
(7, 'xinyan444', '刘京东', 'WYXmpt5TYbW6Xo-Lk9mZ7oTFWEmKbiYF', '$2y$13$MM/Mdhh2SBbN3gMeEGnxtulvwLbYSiG5iK5RRhCOv1PGGubc1sS12', 'NKeW7w7xxNh07At5AKqWVg245SXbiyPe_1463014208', 'a@jd.c', 0, '21', 1, 1463014208, 1463014208),
(8, 'xinyan888', '赵公明', 'uCMdbf3TUFkIU00_3H6sCuyhIADb60k5', '$2y$13$BUP1gkhTTDJpbd/b94Lkk.mCV0lJYouGf.hNPpreWpR/39w201/cm', 'LtICtjWsfDixs2iDOdIRd4lZ1TylP5vF_1463014964', 'a@caishen.c', 0, '23,65', 1, 1463014964, 1463731079),
(9, 'xinyan999', '沈万三', 'jf8W0dMxnzoxK5f_SRjKKwJdF405jMpF', '$2y$13$UY4npSIzBKRQAvyzd59.4ubYq3IYxqFIJUByYv9UEpa0m7M2q5RrW', '9fZMYkWjeU0T5og8FzetUaOGlP5RlbCK_1463451526', '1@xinyan.c', 0, '23', 1, 1463451525, 1463451525);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ipc_auth_node`
--
ALTER TABLE `ipc_auth_node`
  ADD PRIMARY KEY (`node_id`),
  ADD KEY `ipc_node_NK1` (`parent_id`),
  ADD KEY `ipc_node_NK2` (`lft`),
  ADD KEY `ipc_node_NK3` (`rgt`),
  ADD KEY `ipc_node_NK4` (`lvl`),
  ADD KEY `ipc_node_NK5` (`active`);

--
-- Indexes for table `ipc_auth_rule`
--
ALTER TABLE `ipc_auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `ipc_config`
--
ALTER TABLE `ipc_config`
  ADD PRIMARY KEY (`config_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `code` (`code`),
  ADD KEY `sort_order` (`sort_order`);

--
-- Indexes for table `ipc_config_check`
--
ALTER TABLE `ipc_config_check`
  ADD PRIMARY KEY (`check_id`);

--
-- Indexes for table `ipc_config_fee`
--
ALTER TABLE `ipc_config_fee`
  ADD PRIMARY KEY (`fee_id`),
  ADD KEY `nid` (`code`),
  ADD KEY `status` (`status`),
  ADD KEY `borrow_styles` (`borrow_styles`),
  ADD KEY `user_type` (`user_type`),
  ADD KEY `borrow_types` (`borrow_types`),
  ADD KEY `nid_2` (`code`,`status`),
  ADD KEY `user_type_2` (`user_type`,`borrow_types`);

--
-- Indexes for table `ipc_config_handle`
--
ALTER TABLE `ipc_config_handle`
  ADD PRIMARY KEY (`handle_id`),
  ADD KEY `nid` (`code`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `ipc_config_prove`
--
ALTER TABLE `ipc_config_prove`
  ADD PRIMARY KEY (`prove_id`),
  ADD KEY `nid` (`code`);

--
-- Indexes for table `ipc_config_repayment`
--
ALTER TABLE `ipc_config_repayment`
  ADD PRIMARY KEY (`repayment_id`),
  ADD KEY `nid` (`code`),
  ADD KEY `status` (`status`),
  ADD KEY `nid_2` (`code`,`status`);

--
-- Indexes for table `ipc_config_status`
--
ALTER TABLE `ipc_config_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `ipc_config_tender`
--
ALTER TABLE `ipc_config_tender`
  ADD PRIMARY KEY (`tender_id`),
  ADD KEY `nid` (`code`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `ipc_customer`
--
ALTER TABLE `ipc_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `ipc_customer_company`
--
ALTER TABLE `ipc_customer_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `ipc_filemanager_mediafile`
--
ALTER TABLE `ipc_filemanager_mediafile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipc_filemanager_owners`
--
ALTER TABLE `ipc_filemanager_owners`
  ADD PRIMARY KEY (`mediafile_id`,`owner_id`,`owner`,`owner_attribute`);

--
-- Indexes for table `ipc_migration`
--
ALTER TABLE `ipc_migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `ipc_notification`
--
ALTER TABLE `ipc_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipc_project`
--
ALTER TABLE `ipc_project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `ipc_project_attach`
--
ALTER TABLE `ipc_project_attach`
  ADD PRIMARY KEY (`attach_id`);

--
-- Indexes for table `ipc_project_audit`
--
ALTER TABLE `ipc_project_audit`
  ADD PRIMARY KEY (`audit_id`);

--
-- Indexes for table `ipc_project_comment`
--
ALTER TABLE `ipc_project_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `ipc_project_history`
--
ALTER TABLE `ipc_project_history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `ipc_project_investigate`
--
ALTER TABLE `ipc_project_investigate`
  ADD PRIMARY KEY (`investigate_id`);

--
-- Indexes for table `ipc_project_order`
--
ALTER TABLE `ipc_project_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `ipc_project_publish`
--
ALTER TABLE `ipc_project_publish`
  ADD PRIMARY KEY (`publish_id`);

--
-- Indexes for table `ipc_user`
--
ALTER TABLE `ipc_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `status` (`status`),
  ADD KEY `created_at` (`created_at`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `ipc_auth_node`
--
ALTER TABLE `ipc_auth_node`
  MODIFY `node_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- 使用表AUTO_INCREMENT `ipc_config`
--
ALTER TABLE `ipc_config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3117;
--
-- 使用表AUTO_INCREMENT `ipc_config_check`
--
ALTER TABLE `ipc_config_check`
  MODIFY `check_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `ipc_config_fee`
--
ALTER TABLE `ipc_config_fee`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- 使用表AUTO_INCREMENT `ipc_config_handle`
--
ALTER TABLE `ipc_config_handle`
  MODIFY `handle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `ipc_config_prove`
--
ALTER TABLE `ipc_config_prove`
  MODIFY `prove_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- 使用表AUTO_INCREMENT `ipc_config_repayment`
--
ALTER TABLE `ipc_config_repayment`
  MODIFY `repayment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `ipc_config_status`
--
ALTER TABLE `ipc_config_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `ipc_config_tender`
--
ALTER TABLE `ipc_config_tender`
  MODIFY `tender_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `ipc_customer`
--
ALTER TABLE `ipc_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `ipc_customer_company`
--
ALTER TABLE `ipc_customer_company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `ipc_filemanager_mediafile`
--
ALTER TABLE `ipc_filemanager_mediafile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `ipc_notification`
--
ALTER TABLE `ipc_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `ipc_project`
--
ALTER TABLE `ipc_project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- 使用表AUTO_INCREMENT `ipc_project_attach`
--
ALTER TABLE `ipc_project_attach`
  MODIFY `attach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `ipc_project_audit`
--
ALTER TABLE `ipc_project_audit`
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `ipc_project_comment`
--
ALTER TABLE `ipc_project_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- 使用表AUTO_INCREMENT `ipc_project_history`
--
ALTER TABLE `ipc_project_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- 使用表AUTO_INCREMENT `ipc_project_investigate`
--
ALTER TABLE `ipc_project_investigate`
  MODIFY `investigate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `ipc_project_order`
--
ALTER TABLE `ipc_project_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `ipc_project_publish`
--
ALTER TABLE `ipc_project_publish`
  MODIFY `publish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- 使用表AUTO_INCREMENT `ipc_user`
--
ALTER TABLE `ipc_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 限制导出的表
--

--
-- 限制表 `ipc_filemanager_owners`
--
ALTER TABLE `ipc_filemanager_owners`
  ADD CONSTRAINT `filemanager_owners_ref_mediafile` FOREIGN KEY (`mediafile_id`) REFERENCES `ipc_filemanager_mediafile` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
