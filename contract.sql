CREATE TABLE IF NOT EXISTS `diyou_users_card` (
  `ic_serial` char(8) NOT NULL,
  `number` varchar(32) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  KEY `ic_serial` (`ic_serial`),
  KEY `number` (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `diyou_users` ADD `ic_serial` CHAR(8) NULL AFTER `edit_status`;

ALTER TABLE `diyou_users` ADD INDEX(`ic_serial`);