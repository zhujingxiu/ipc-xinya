-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-04-26 11:56:27
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
-- 表的结构 `ipc_auth_assignment`
--

CREATE TABLE `ipc_auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
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

CREATE TABLE `ipc_auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ipc_auth_item`
--

INSERT INTO `ipc_auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, '管理员', NULL, 's:0:"";', 1460626630, 1461041554),
('customer', 2, '客户列表', NULL, 's:0:"";', 1460969444, 1461041519),
('guest', 1, '访客', NULL, 's:0:"";', 1460626630, 1460971235),
('service', 2, '业务模块', NULL, 's:0:"";', 1460890319, 1460972531),
('setting', 2, '系统设置', NULL, '', 1460887939, 1460887939),
('user', 1, '员工', NULL, 's:0:"";', 1460626630, 1460972573);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_auth_item_child`
--

CREATE TABLE `ipc_auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ipc_auth_item_child`
--

INSERT INTO `ipc_auth_item_child` (`parent`, `child`) VALUES
('admin', 'customer'),
('admin', 'service'),
('admin', 'setting'),
('user', 'service');

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
  `path` varchar(128) DEFAULT NULL,
  `rule` varchar(64) DEFAULT NULL,
  `rule_param` text,
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

INSERT INTO `ipc_auth_node` (`node_id`, `parent_id`, `lft`, `rgt`, `lvl`, `name`, `icon`, `icon_type`, `mode`, `path`, `rule`, `rule_param`, `active`, `selected`, `disabled`, `readonly`, `visible`, `collapsed`, `movable_u`, `movable_d`, `movable_l`, `movable_r`, `removable`, `removable_all`) VALUES
(1, 1, 1, 2, 0, '客户管理', 'fa fa-users', 1, 'menu', 'customer', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(2, 2, 1, 16, 0, '信贷业务', 'fa fa-cubes', 1, 'menu', '', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(3, 2, 2, 3, 1, '客户申请', 'fa fa-envelope', 1, 'menu', 'project/apply', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(4, 2, 4, 5, 1, '调查评估', 'fa fa-binoculars', 1, 'menu', 'project/assess', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(5, 2, 6, 7, 1, '审查核实', 'fa fa-check-square', 1, 'menu', 'project/check', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(6, 2, 8, 9, 1, '项目审批', 'fa fa-gavel', 1, 'menu', 'project/approve', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(7, 2, 10, 11, 1, '签订合同', 'fa fa-book', 1, 'menu', 'project/sign', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(8, 2, 12, 13, 1, '发放贷款', 'fa fa-tags', 1, 'menu', 'project/borrowing', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(9, 2, 14, 15, 1, '贷后管理', 'fa fa-tree', 1, 'menu', 'project/manage', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(10, 10, 1, 16, 0, '用户与菜单', 'fa fa-sitemap', 1, 'menu', '', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(11, 10, 2, 3, 1, '员工列表', 'fa fa-user', 1, 'menu', 'user', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(12, 10, 4, 5, 1, '部门管理', 'fa fa-bank', 1, 'menu', 'auth/role', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(13, 10, 6, 7, 1, '菜单配置', 'fa fa-list-ol', 1, 'menu', 'auth/menu', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(14, 10, 8, 9, 1, '权限节点', 'fa fa-key', 1, 'menu', 'auth/permission', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(15, 10, 10, 15, 1, '其他配置', 'fa fa-cogs', 1, 'menu', '', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(16, 10, 11, 12, 2, '数据备份', 'fa fa-database', 1, 'menu', 'tool/backup', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(17, 10, 13, 14, 2, '数据恢复', 'fa fa-recycle', 1, 'menu', 'tool/recycle', NULL, NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(18, 18, 1, 2, 0, '开发部', '', 1, 'role', NULL, '', NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(19, 19, 1, 2, 0, '技术运营', '', 1, 'role', NULL, '', NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(20, 20, 1, 2, 0, '信贷部', '', 1, 'role', NULL, '', NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(21, 21, 1, 2, 0, '风控部', '', 1, 'role', NULL, '', NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(22, 22, 1, 2, 0, '财务部', '', 1, 'role', NULL, '', NULL, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0),
(23, 23, 1, 2, 0, '信贷评审委员会', '', 1, 'role', NULL, '', '', 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0);

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
(2111, 21, 'timezone', 'select', '-12,-11,-10,-9,-8,-7,-6,-5,-4,-3.5,-3,-2,-1,0,1,2,3,3.5,4,4.5,5,5.5,5.75,6,6.5,7,8,9,9.5,10,11,12', '', '8', 50),
(2112, 21, 'commentCheck', 'select', '0,1', '', '1', 50),
(3111, 31, 'smtpHost', 'text', '', '', 'localhost', 50),
(3112, 31, 'smtpPort', 'text', '', '', '', 50),
(3113, 31, 'smtpUser', 'text', '', '', 'zhujingxiu@hotmail.com', 50),
(3114, 31, 'smtpPassword', 'password', '', '', '123456', 50),
(3115, 31, 'smtpMail', 'text', '', '', '', 50);

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
-- 表的结构 `ipc_config_loan`
--

CREATE TABLE `ipc_config_loan` (
  `loan_id` int(11) NOT NULL COMMENT 'id',
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
-- 转存表中的数据 `ipc_config_loan`
--

INSERT INTO `ipc_config_loan` (`loan_id`, `code`, `status`, `title`, `remark`, `account_multiple`, `password_status`, `amount_type`, `amount_first`, `amount_end`, `frost_scale_vip`, `admin_status`, `apr_first`, `apr_end`, `check_first`, `check_end`, `tender_account_min`, `tender_account_max`, `period_first`, `period_end`, `validate_first`, `validate_end`, `award_status`, `award_scale_first`, `award_scale_end`, `award_account_first`, `award_account_end`, `award_false_status`, `verify_auto_status`, `verify_auto_remark`, `styles`, `frost_scale`, `late_days`, `vip_late_scale`, `all_late_scale`, `part_status`, `system_borrow_full_status`, `system_borrow_repay_status`, `system_web_repay_status`, `diamond_late_scale`, `gold_repay_type`, `silver_repay_type`, `all_repay_type`, `gold_late_scale`, `silver_late_scale`, `diamond_repay_type`, `fixed_repay_day`) VALUES
(1, 'credit', 1, '工艺通', '●从事工艺类个体工商户，公司&lt;br/&gt;						●个人征信，银行流水&lt;br/&gt;\n●申请更高额度需要资产抵押&lt;br/&gt;', 50, 0, 'credit', 30000, 3000000, '0.000000', 0, '8.000000', '20.000000', 1, 5, '100,150,200,300,500,1000,1500,200000', '0,50,150,200,300,500,1000,2000,3000,5000,10000,1000000', 1, 12, 1, 15, 1, '1.000000', '12.000000', '0.000000', '5.000000', 0, 0, '', 'month,endmonth', '0.000000', 15, '0.000000', '100.000000', 1, 0, 0, 0, '100.000000', 'account', 'account', 'account', '100.000000', '100.000000', 'account', 0),
(2, 'worth', 0, '电商通', '●通过认证的网店卖家&lt;br/&gt;			●商城经营超过六个月淘宝两钻以上&lt;br/&gt;					●申请更高额度需要资产抵押', 50, 1, 'worth', 3000, 300000, '0.000000', 0, '12.000000', '20.000000', 1, 3, '50,100,150,200,300,500,1000', '0,50,150,200,300,500,1000,2000,3000,5000', 1, 6, 1, 15, 0, '0.010000', '2.000000', '1.000000', '10.000000', 0, 0, '', 'month,endmonth', '0.000000', 15, '0.000000', '50.000000', 1, 0, 0, 0, '50.000000', 'account', 'account', 'account', '50.000000', '50.000000', 'account', 0),
(3, 'day', 0, '天标', '快借标，通过网站的资信审查获得信用额度。', 0, 0, 'credit', 10, 200000, '0.000000', 0, '12.000000', '20.000000', 1, 3, '0,50,100,150,200,300,500,1000', '0,50,150,200,300,500,1000,2000,3000,5000', 1, 15, 1, 9, 0, '0.010000', '2.000000', '1.000000', '10.000000', 0, 0, '', '', '0.000000', 15, '0.000000', '50.000000', 1, 0, 0, 0, '0.000000', 'none', 'none', 'account', '0.000000', '0.000000', 'none', 0),
(4, 'vouch', 0, '担保标', '网站做为第三方担保，通过网站的资信审查获得担保额度。', 100, 0, 'vouch', 1000, 200000, '0.000000', 0, '8.000000', '24.000000', 1, 3, '50,100,150,200,300,500,1000', '0,50,150,200,300,500,1000,2000,3000,5000', 1, 12, 1, 9, 0, '0.010000', '2.000000', '1.000000', '10.000000', 0, 0, '', 'month,season,end,endmonths', '0.000000', 15, '90.000000', '90.000000', 1, 0, 0, 0, '0.000000', '', '', '', '0.000000', '0.000000', '', 0),
(5, 'pawn', 0, '抵押标', '通过网站的资信审查获得抵押额度。', 0, 0, 'pawn', 100, 500000, '0.000000', 0, '8.000000', '24.000000', 1, 3, '50,100,150,200,300,500,1000', '0,50,150,200,300,500,1000,2000,3000,5000', 1, 24, 1, 9, 0, '0.010000', '2.000000', '1.000000', '10.000000', 0, 0, '', 'month,endmonth', '0.000000', 1, '0.000000', '100.000000', 1, 0, 0, 0, '0.000000', 'none', 'none', 'none', '0.000000', '0.000000', 'none', 0),
(6, 'zhuoyin', 1, '卓银贷', '●从事工艺类个体工商户，公司&lt;br/&gt;						●个人征信，银行流水&lt;br/&gt;\n●申请更高额度需要资产抵押&lt;br/&gt;', 0, 0, '', 3000, 3000000, '0.000000', 0, '12.000000', '28.000000', 1, 3, '100,150,200,300,500,1000', '0,50,150,200,300,500,1000,2000,3000,5000', 1, 12, 1, 15, 0, '0.010000', '2.000000', '1.000000', '10.000000', 0, 0, '', 'month,endmonth', '0.000000', 15, '0.000000', '100.000000', 1, 0, 0, 0, '100.000000', 'account', 'account', 'account', '100.000000', '100.000000', 'account', 0),
(7, 'roam', 0, '通通赚', '通过网站的资信审查获得流转额度。', 50, 0, 'vest', 3000, 3000000, '0.000000', 0, '10.000000', '20.000000', 1, 9, '100,150,200,300,500,1000', '0,500,1000,2000,3000,5000,10000,50000', 1, 12, 0, 15, 0, '0.500000', '2.000000', '5.000000', '50.000000', 0, 0, '', '', '0.000000', 15, '0.000000', '100.000000', 0, 0, 0, 0, '100.000000', 'account', 'account', 'account', '100.000000', '100.000000', 'account', 0),
(9, 'experience', 0, '体验标', '无需额度', 0, 1, '', 200, 200000, '0.000000', 1, '8.000000', '24.000000', 0, 0, '50,150,200,300,500,1000,1500', '0,50,150,200,300,500,1000,2000,3000,6000', 1, 24, 1, 15, 1, '1.000000', '12.000000', '0.000000', '5.000000', 1, 0, '', '', '0.000000', 10, '0.000000', '90.000000', 0, 0, 0, 0, '0.000000', 'none', 'none', 'none', '0.000000', '0.000000', 'none', 0),
(10, 'newbiao', 1, '通通赚', '通通赚', 50, 0, 'vest', 3000, 1000000, '0.000000', 0, '12.000000', '22.000000', 1, 9, '100,150,200,300,500,1000', '0,500,1000,2000,3000,5000,10000,50000', 1, 12, 1, 15, 0, '0.000000', '0.000000', '0.000000', '0.000000', 0, 0, '', 'endmonth', '0.000000', 10, '0.000000', '80.000000', 0, 0, 0, 0, '95.000000', 'account', 'account', 'account', '90.000000', '85.000000', 'account', 0),
(11, 'huinong', 1, '惠农货', '是面向三农的贷款，即农村、农业、农户的贷款，在核定的额度和期限内向农户发放的信用、保证类贷款', 100, 0, '', 10000, 3000000, '0.000000', 0, '12.000000', '20.000000', 1, 5, '100,150,200,300,500,1000,1500,200000', '0,50,150,200,300,500,1000,2000,3000,5000,10000,1000000', 1, 12, 1, 15, 0, '1.000000', '12.000000', '0.000000', '0.000000', 0, 0, '', 'endmonth', '0.000000', 15, '0.000000', '100.000000', 1, 0, 0, 0, '100.000000', 'account', 'account', 'account', '100.000000', '100.000000', 'account', 0),
(12, 'qingchuang', 1, '青创贷', '青创贷是指具有一定生产经营能力或已经从事生产经营的青年，因创业或再创业提出资金需求申请，经我司认可有效担保后而发放的一种专项贷款', 100, 0, '', 10000, 3000000, '0.000000', 0, '12.000000', '20.000000', 1, 5, '100,150,200,300,500,1000,1500,200000', '0,50,150,200,300,500,1000,2000,3000,5000,10000,1000000', 1, 12, 1, 15, 0, '1.000000', '12.000000', '0.000000', '0.000000', 0, 0, '', 'endmonth', '0.000000', 15, '0.000000', '100.000000', 1, 0, 0, 0, '100.000000', 'account', 'account', 'account', '100.000000', '100.000000', 'account', 0),
(13, 'experience', 1, '体验标', '无需额度', 0, 1, '', 200, 200000, '8.000000', 1, '5.000000', '24.000000', 0, 0, '50,150,200,300,500,1000,1500', '0,50,150,200,300,500,1000,2000,3000,6000', 1, 30, 1, 15, 1, '1.000000', '12.000000', '0.000000', '5.000000', 1, 0, '体验标无问题，可通过审核', 'interest', '10.000000', 10, '80.000000', '90.000000', 0, 0, 0, 0, '0.000000', '', '', '', '0.000000', '0.000000', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_config_prove`
--

CREATE TABLE `ipc_config_prove` (
  `prove_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL COMMENT '名称',
  `code` varchar(100) NOT NULL COMMENT '标识名',
  `order` int(11) NOT NULL COMMENT '排序',
  `credit` int(11) NOT NULL COMMENT '最大积分',
  `remark` varchar(200) NOT NULL COMMENT '简介',
  `validity` int(11) NOT NULL COMMENT '有效期',
  `addtime` int(11) NOT NULL DEFAULT '0',
  `addip` varchar(30) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='证明分类';

--
-- 转存表中的数据 `ipc_config_prove`
--

INSERT INTO `ipc_config_prove` (`prove_id`, `title`, `code`, `order`, `credit`, `remark`, `validity`, `addtime`, `addip`, `user_id`) VALUES
(1, '身份证明', 'work', 10, 5, '您的工作状况是我们评估您信用状况的主要依据。请您上传真实可靠的公司信息。\n认证说明:&lt;br/&gt;\n请同时提交下面两项资料：&lt;br/&gt;\na) 通过年检且注册满1年的营业执照。查看示例&lt;br/&gt;\nb) 经营场地租赁合同＋90天内的租金发票或水电单据。', 0, 1339564936, '127.0.0.1', 0),
(2, '收入认证', 'income', 10, 5, '您的收入证明是我们评估您信用状况的主要依据。请您上传真实可靠的相关信息。&lt;br /&gt;\n建议文件大小在2M以内。', 0, 1345173034, '125.77.162.60', 0),
(3, '住址证明', 'gongzi', 10, 10, '您的住址证明是我们评估您信用状况的主要依据。请您上传真实可靠的相关信息。&lt;br /&gt;\n建议文件大小在2M以内。', 0, 1345173056, '125.77.162.60', 0),
(4, '信用报告', 'xinyong', 10, 10, '您的信用报告是我们评估您信用状况的主要依据。请您上传真实可靠的信用报告信息。&lt;br /&gt;\n建议文件大小在2M以内。', 0, 1345173076, '125.77.162.60', 0),
(6, '社保卡', 'shebao', 10, 1, '您的社保信息是我们评估您信用状况的主要依据。请您上传真实可靠的相关信息。&lt;br /&gt;\n建议文件大小在2M以内。', 0, 1345173127, '125.77.162.60', 0),
(11, '资产证明', 'otherzc', 10, 1, '您的资产证明是我们评估您信用状况的主要依据。请您上传真实可靠的相关信息。&lt;br /&gt;\n建议文件大小在2M以内。', 0, 1345173241, '125.77.162.60', 0),
(14, '户口本', 'hukou', 10, 5, '您的户口证明是我们评估您信用状况的主要依据。请您上传真实可靠的户口本信息。&lt;br /&gt;\n建议文件大小在2M以内。', 0, 1345173336, '125.77.162.60', 0),
(17, '结婚证', 'marry', 10, 5, '您的结婚证明是我们评估您信用状况的主要依据。请您上传真实可靠的结婚证信息。&lt;br /&gt;\n建议文件大小在2M以内。', 0, 1345173405, '125.77.162.60', 0),
(21, '营业执照', 'zhizhao', 1, 10, '您的营业执照证明是我们评估您信用状况的主要依据。请您上传真实可靠的营业执照信息。&lt;br /&gt;\n建议文件大小在2M以内。', 0, 1345173484, '125.77.162.60', 0),
(25, '学历认证', 'edu', 10, 1, '您的学历认证是我们评估您信用状况的主要依据。请您上传真实可靠的学历信息。&lt;br /&gt;\n建议文件大小在2M以内。', 0, 1353050719, '125.77.172.10', 0),
(41, '数据评估', 'evaluate', 10, 50, '数据评估', 0, 1406515122, '59.57.220.47', 0),
(42, '实地经营照片', 'jingying', 10, 5, '您的实地经营认证是我们评估您信用状况的主要依据。请您上传真实可靠的实地经营照片。&lt;br /&gt;\n建议文件大小在2M以内。', 0, 1409041481, '110.80.62.196', 0),
(43, '资质证书', 'zhengshu', 10, 2, '您的资质认证是我们评估您信用状况的主要依据。请您上传真实可靠的资质证书。&lt;br /&gt;\n建议文件大小在2M以内。', 0, 1409042548, '110.80.62.196', 0),
(44, '个税缴税凭证或交金记录', 'geshui', 10, 5, '您的个税缴税凭证或交金记录是我们评估您信用状况的主要依据。请您上传真实可靠的个税缴税凭证或交金记录。&lt;br /&gt;\n建议文件大小在2M以内。', 0, 1409042609, '110.80.62.196', 0),
(45, '线下资产抵押', 'diya', 10, 10, '您的线下资产认证是我们评估您信用状况的主要依据。请您上传真实可靠的线下资产信息。&lt;br /&gt;\n建议文件大小在2M以内。', 0, 1409042900, '110.80.62.196', 0),
(46, '知名品牌授权经营相关证明', 'shouquan', 10, 5, '知名品牌授权经营的相关证明&lt;br /&gt;\n建议文件大小在2M以内。', 0, 1409043037, '110.80.62.196', 0),
(47, '自有品牌注册证明', 'ziyou', 10, 5, '您的自有品牌证明是我们评估您信用状况的主要依据。请您上传真实可靠的相关信息。&lt;br /&gt;\n建议文件大小在2M以内。', 0, 1409043082, '110.80.62.196', 0),
(48, '淘宝近三月交易明细', 'taobao', 10, 5, '您的淘宝/支付宝近三月的交易明细是我们评估您信用状况的主要依据。请您上传真实可靠的相关信息。&lt;br /&gt;\n建议文件大小在2M以内。', 0, 1409104888, '220.160.188.208', 0);

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
(4, 'endmonth', 1, '按月付息', '按月付息到期还本息', ''),
(5, 'interest', 1, '返还收益', '月还利息，不需要还本金', '');

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
(3, '调查中', 'checking', 1, ''),
(4, '已审批', 'approve', 1, ''),
(5, '已签订', 'signed', 1, ''),
(6, '已完结', 'finished', 1, ''),
(7, '缺件', 'lacking', 1, ''),
(8, '已拒绝', 'refused', 1, ''),
(9, '已终止', 'terminated', 1, '');

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
('m141203_175538_add_filemanager_owners_ref_mediafile_fk', 1460985485);

-- --------------------------------------------------------

--
-- 表的结构 `ipc_project`
--

CREATE TABLE `ipc_project` (
  `project_id` int(11) NOT NULL,
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
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `edittime` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ipc_project_attach`
--

CREATE TABLE `ipc_project_attach` (
  `attach_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `mode` enum('apply','process','investigation') NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ipc_project_guarantor`
--

CREATE TABLE `ipc_project_guarantor` (
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ipc_project_history`
--

CREATE TABLE `ipc_project_history` (
  `history_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `addtime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `role` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `ipc_user`
--

INSERT INTO `ipc_user` (`user_id`, `username`, `realname`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '管理员', 'TOL_4sICqCHD4n1UOYE0ZAaAgkCnlEWD', '$2y$13$DHvK27g4EpqJ5eoOk.hHkeCPKb2mcwCrsjm6lLQ/8lUdCk5Beq9ei', '', 'admin@demo.com', '18', 1, 1460626630, 1460789919),
(2, 'zhujingxiu', '朱景修', 'ePx45s5O34IH8b6JLP4tXCd8yTE-_5Xj', '$2y$13$cSy0Q/SBoCqLB7bAEVv26eyWUjEX0g5IwdRG11xj0y8W0cmygOsQC', 'tBuqUrt-7s5AW7cHtE59zsdvhiAgBwKD_1460704462', 'a@b.c', '19', 1, 1460704461, 1460732172),
(3, 'demo', '测试ssssss', 'u9YYoa_465SfLOyrwpjHkklNAG5gKnTM', '$2y$13$d6rmH9jBlEYH28qX1kuGHeeR.JDD5a4OXzqU3HVA68IA1L8zQ7Dny', 'nm_bCQH2XeCT6iFfHNQYBxfw8VTBZSrX_1460724094', 'demo@demo.c', '18,19,20', 1, 1460724092, 1461663114);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ipc_auth_assignment`
--
ALTER TABLE `ipc_auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `ipc_auth_item`
--
ALTER TABLE `ipc_auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `ipc_auth_item_child`
--
ALTER TABLE `ipc_auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

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
-- Indexes for table `ipc_config_loan`
--
ALTER TABLE `ipc_config_loan`
  ADD PRIMARY KEY (`loan_id`),
  ADD KEY `nid` (`code`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `ipc_config_prove`
--
ALTER TABLE `ipc_config_prove`
  ADD PRIMARY KEY (`prove_id`),
  ADD KEY `nid` (`code`),
  ADD KEY `order` (`order`);

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
-- Indexes for table `ipc_project_guarantor`
--
ALTER TABLE `ipc_project_guarantor`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `ipc_project_history`
--
ALTER TABLE `ipc_project_history`
  ADD PRIMARY KEY (`history_id`);

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
  MODIFY `node_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- 使用表AUTO_INCREMENT `ipc_config`
--
ALTER TABLE `ipc_config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3116;
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
-- 使用表AUTO_INCREMENT `ipc_config_loan`
--
ALTER TABLE `ipc_config_loan`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `ipc_config_prove`
--
ALTER TABLE `ipc_config_prove`
  MODIFY `prove_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- 使用表AUTO_INCREMENT `ipc_config_repayment`
--
ALTER TABLE `ipc_config_repayment`
  MODIFY `repayment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `ipc_config_status`
--
ALTER TABLE `ipc_config_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
-- 使用表AUTO_INCREMENT `ipc_project`
--
ALTER TABLE `ipc_project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `ipc_project_attach`
--
ALTER TABLE `ipc_project_attach`
  MODIFY `attach_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `ipc_project_guarantor`
--
ALTER TABLE `ipc_project_guarantor`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `ipc_project_history`
--
ALTER TABLE `ipc_project_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `ipc_user`
--
ALTER TABLE `ipc_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
