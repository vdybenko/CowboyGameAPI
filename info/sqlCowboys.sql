# --------------------------------------------------------
# Host:                         cowboyduel.c6algyr0odj4.eu-west-1.rds.amazonaws.com
# Server version:               5.5.20-log
# Server OS:                    Linux
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2012-12-06 16:22:56
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping structure for table duels_v201.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL,
  `password` varchar(60) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Dumping data for table duels_v201.admin: ~1 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
	(1, 'admin', 'admin@a.a', '74913f5cd5f61ec0bcfdb775414c2fb3d161b620');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;


# Dumping structure for table duels_v201.buyitemsstore
CREATE TABLE IF NOT EXISTS `buyitemsstore` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `authenUser` varchar(50) COLLATE utf8_bin NOT NULL,
  `itemIdStore` int(10) NOT NULL,
  `transactionsId` int(100) NOT NULL,
  `date` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Dumping data for table duels_v201.buyitemsstore: ~14 rows (approximately)
/*!40000 ALTER TABLE `buyitemsstore` DISABLE KEYS */;
INSERT INTO `buyitemsstore` (`id`, `authenUser`, `itemIdStore`, `transactionsId`, `date`) VALUES
	(5, 'F:697342138', 7, -1, 1354701386),
	(6, 'F:697342138', 4, -1, 1354701386),
	(7, 'F:697342137', 8, -1, 1354701386),
	(8, 'F:697342137', 6, -1, 1354701386),
	(9, 'F:697342136', 5, -1, 1354701386),
	(10, 'F:697342136', 3, -1, 1354701386),
	(11, 'F:697342134', 3, -1, 1354701386),
	(12, 'F:697342135', 7, -1, 1354701386),
	(19, 'F:537141553', 5, 3, 1354717589),
	(20, 'F:537141553', 8, -1, 1354717655),
	(21, 'F:537141553', 4, 7, 1354719446),
	(22, 'F:100000532245810', 5, 6, 1354720478),
	(23, 'F:100000532245810', 6, 6, 1354720504),
	(24, 'F:100002141165315', 5, 6, 1354754060);
/*!40000 ALTER TABLE `buyitemsstore` ENABLE KEYS */;


# Dumping structure for table duels_v201.duels
CREATE TABLE IF NOT EXISTS `duels` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `opponent` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rate_fire` varchar(255) CHARACTER SET utf8 NOT NULL,
  `device_name` varchar(25) CHARACTER SET utf8 NOT NULL,
  `app_ver` varchar(10) CHARACTER SET utf8 NOT NULL,
  `authen` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date` varchar(20) CHARACTER SET utf8 NOT NULL,
  `system_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `system_version` varchar(50) CHARACTER SET utf8 NOT NULL,
  `unique_identifier` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lat` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lon` varchar(255) CHARACTER SET utf8 NOT NULL,
  `GPS` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Dumping data for table duels_v201.duels: 0 rows
/*!40000 ALTER TABLE `duels` DISABLE KEYS */;
/*!40000 ALTER TABLE `duels` ENABLE KEYS */;


# Dumping structure for table duels_v201.online
CREATE TABLE IF NOT EXISTS `online` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `authen` varchar(50) CHARACTER SET utf8 NOT NULL,
  `online` int(1) NOT NULL,
  `enterTime` varchar(12) CHARACTER SET latin1 NOT NULL,
  `exitTime` varchar(12) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Dumping data for table duels_v201.online: 12 rows
/*!40000 ALTER TABLE `online` DISABLE KEYS */;
INSERT INTO `online` (`id`, `authen`, `online`, `enterTime`, `exitTime`) VALUES
	(1, 'F:100002141165315', 1, '1354803577', '0'),
	(2, 'A:6e70744811', 1, '1354720077', '0'),
	(3, 'A:be56be4e39', 1, '1354716297', '0'),
	(4, 'A:0000000000', 1, '1354803773', '0'),
	(5, 'F:100001785186331', 1, '1354716613', '0'),
	(6, 'F:537141553', 1, '1354801184', '0'),
	(7, 'F:100004072748849', 1, '1354801909', '0'),
	(8, 'F:100000532245810', 1, '1354720887', '0'),
	(9, 'A:f306b82768', 1, '1354720970', '0'),
	(10, 'A:36b980dd27', 1, '1354736656', '0'),
	(11, 'A:4bb24acc21', 1, '1354737024', '0'),
	(12, 'A:b19976b9a4', 1, '1354799327', '0');
/*!40000 ALTER TABLE `online` ENABLE KEYS */;


# Dumping structure for table duels_v201.rank
CREATE TABLE IF NOT EXISTS `rank` (
  `level` int(11) NOT NULL,
  `rank_name` varchar(20) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`level`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Dumping data for table duels_v201.rank: 10 rows
/*!40000 ALTER TABLE `rank` DISABLE KEYS */;
INSERT INTO `rank` (`level`, `rank_name`) VALUES
	(1, 'Junior'),
	(2, 'Citizen'),
	(3, 'Street fighter'),
	(4, 'Mercenary'),
	(5, 'Duelist'),
	(6, 'Killer'),
	(7, 'Head Hunter'),
	(8, 'Hero of Duels'),
	(9, 'Grave-digger'),
	(10, 'Angel of Death');
/*!40000 ALTER TABLE `rank` ENABLE KEYS */;


# Dumping structure for table duels_v201.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  `value` varchar(11) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Dumping data for table duels_v201.settings: 4 rows
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `name`, `value`) VALUES
	(1, 'refresh_content', '1'),
	(2, 'timeLastRefresh', '1354802703'),
	(3, 'versionListOfStoreItems', '1'),
	(4, 'program_version', '2.2');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;


# Dumping structure for table duels_v201.store
CREATE TABLE IF NOT EXISTS `store` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) COLLATE utf8_bin NOT NULL DEFAULT '',
  `title` varchar(50) COLLATE utf8_bin DEFAULT '',
  `damageOrDefense` int(10) DEFAULT '0',
  `levelLock` int(10) DEFAULT '0',
  `golds` int(11) DEFAULT '0',
  `inAppId` varchar(40) COLLATE utf8_bin DEFAULT '0',
  `thumb` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `thumbRetina` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `img` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `imgRetina` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `sound` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `bigImg` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `bigImgRetina` varchar(70) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_bin DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Dumping data for table duels_v201.store: ~6 rows (approximately)
/*!40000 ALTER TABLE `store` DISABLE KEYS */;
INSERT INTO `store` (`id`, `type`, `title`, `damageOrDefense`, `levelLock`, `golds`, `inAppId`, `thumb`, `thumbRetina`, `img`, `imgRetina`, `sound`, `bigImg`, `bigImgRetina`, `description`) VALUES
	(3, 'defenses', 'Jacket', 5, 6, 80, ' ', 'http://bidoncd.s3.amazonaws.com/store/IconJacket.png', 'http://bidoncd.s3.amazonaws.com/store/IconJacket%402x.png', '', '', '', '', ' ', 'Safe your life'),
	(4, 'defenses', 'Metal Jacket', 3, 3, 60, '0', 'http://bidoncd.s3.amazonaws.com/store/IconJacketMetal.png', 'http://bidoncd.s3.amazonaws.com/store/IconJacketMetal%402x.png', '', '', '', '', ' ', 'Safe your life'),
	(5, 'weapons', 'Colt', 6, 2, 100, '0', 'http://bidoncd.s3.amazonaws.com/store/IconColt.png', 'http://bidoncd.s3.amazonaws.com/store/IconColt%402x.png', 'http://bidoncd.s3.amazonaws.com/store/ImgColt.png', 'http://bidoncd.s3.amazonaws.com/store/ImgColt%402x.png', 'http://bidoncd.s3.amazonaws.com/store/pig4.mp3', 'http://bidoncd.s3.amazonaws.com/store/GunColt.png', 'http://bidoncd.s3.amazonaws.com/store/GunColt%402x.png', 'Increase your attack'),
	(6, 'weapons', 'Navy', 3, 4, 200, '0', 'http://bidoncd.s3.amazonaws.com/store/IconNavy.png', 'http://bidoncd.s3.amazonaws.com/store/IconNavy%402x.png', 'http://bidoncd.s3.amazonaws.com/store/ImgNavy.png', 'http://bidoncd.s3.amazonaws.com/store/ImgNavy%402x.png', 'http://bidoncd.s3.amazonaws.com/store/cow1.mp3', 'http://bidoncd.s3.amazonaws.com/store/GunNavy.png', 'http://bidoncd.s3.amazonaws.com/store/GunNavy%402x.png', 'Increase your attack'),
	(7, 'weapons', 'Gold Peacemaker', 10, 1, 0, 'com.webkate.cowboyduels.weapons01', 'http://bidoncd.s3.amazonaws.com/store/IconPeacemaker.png', 'http://bidoncd.s3.amazonaws.com/store/IconPeacemaker%402x.png', 'http://bidoncd.s3.amazonaws.com/store/ImgPeacemaker.png', 'http://bidoncd.s3.amazonaws.com/store/ImgPeacemaker%402x.png', 'http://bidoncd.s3.amazonaws.com/store/dog5.mp3', 'http://bidoncd.s3.amazonaws.com/store/GunPeacemaker.png', 'http://bidoncd.s3.amazonaws.com/store/GunPeacemaker%402x.png', 'Increase your attack'),
	(8, 'defenses', 'Amulet mutton', 10, 1, 0, 'com.webkate.cowboyduels.defense', 'http://bidoncd.s3.amazonaws.com/store/IconLopatka.png', 'http://bidoncd.s3.amazonaws.com/store/IconLopatka%402x.png', '', '', '', '', '', 'Safe your life');
/*!40000 ALTER TABLE `store` ENABLE KEYS */;


# Dumping structure for table duels_v201.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `authen` varchar(255) CHARACTER SET utf8 NOT NULL,
  `value` int(100) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date` varchar(15) CHARACTER SET utf8 NOT NULL,
  `opponent_authen` varchar(255) COLLATE utf8_bin NOT NULL,
  `local_id` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Dumping data for table duels_v201.transactions: 94 rows
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` (`id`, `authen`, `value`, `description`, `date`, `opponent_authen`, `local_id`) VALUES
	(1, 'F:537141553', -20, 'Duel', '1354698944', 'A:be56be4tyte39', 1),
	(2, 'F:537141553', -18, 'Duel', '1354698988', 'A:be56be4tyte39', 2),
	(3, 'F:100002141165315', -20, 'Duel', '1354699444', 'ttyrtyeryerty', 1),
	(4, 'F:100002141165315', 76, 'Duel', '1354699558', 'ttyrtyeryerty', 2),
	(5, 'F:100002141165315', 65, 'Duel', '1354699895', 'A:342343tyty23', 3),
	(6, 'F:100002141165315', -8, 'BuyProductWeapon', '1354699980', '', 4),
	(7, 'F:100002141165315', 65, 'Duel', '1354699981', 'A:342343tyty23', 5),
	(8, 'F:100002141165315', 76, 'Duel', '1354700101', 'ttyrtyeryerty', 6),
	(9, 'F:100002141165315', 65, 'Duel', '1354700314', 'A:342343tyty23', 7),
	(10, 'F:100002141165315', -9, 'BuyProductWeapon', '1354700467', '', 8),
	(11, 'F:100002141165315', 76, 'Duel', '1354700467', 'ttyrtyeryerty', 9),
	(12, 'F:100002141165315', 68, 'Duel', '1354700494', 'ttyrtyeryerty', 10),
	(13, 'F:100002141165315', 76, 'Duel', '1354700580', 'ttyrtyeryerty', 11),
	(14, 'F:100002141165315', 65, 'Duel', '1354700815', 'A:342343tyty23', 12),
	(15, 'F:100002141165315', 132, 'Duel', '1354701026', 'A:be56be4tyte39', 1),
	(16, 'F:100002141165315', -10, 'BuyProductWeapon', '1354701435', '', 2),
	(17, 'F:100002141165315', 76, 'Duel', '1354701435', 'ttyrtyeryerty', 3),
	(18, 'F:100002141165315', -99, 'Duel', '1354701690', 'ttyrtyeryerty', 4),
	(19, 'F:100002141165315', -89, 'Duel', '1354702632', 'ttyrtyeryerty', 5),
	(20, 'A:0000000000', 10, 'Daily money', '1354707049', '', 4),
	(21, 'F:100002141165315', -80, 'Duel', '1354707180', 'F:697342137', 6),
	(22, 'F:697342137', 80, 'Duel', '1354707182', 'F:100002141165315', -1),
	(23, 'F:697342138', -94, 'Duel', '1354709229', 'F:100002141165315', -1),
	(24, 'F:100002141165315', 94, 'Duel', '1354709233', 'F:697342138', 7),
	(25, 'F:100002141165315', 16, 'Duel', '1354709484', 'F:537141553', 8),
	(26, 'F:537141553', -16, 'Duel', '1354709484', 'F:100002141165315', 1),
	(27, 'F:697342138', -84, 'Duel', '1354711425', 'F:537141553', -1),
	(28, 'F:537141553', 84, 'Duel', '1354711431', 'F:697342138', 1),
	(29, 'F:537141553', -100, 'BuyProductWeapon', '1354711445', '', 2),
	(30, 'F:697342138', 81, 'Duel', '1354711569', 'F:100002141165315', -1),
	(31, 'F:100002141165315', -81, 'Duel', '1354711576', 'F:697342138', 2),
	(32, 'F:537141553', -100, 'BuyProductWeapon', '1354711653', '', 2),
	(33, 'F:537141553', 76, 'Duel', '1354711654', 'F:697342138', 3),
	(34, 'F:697342138', -76, 'Duel', '1354711655', 'F:537141553', -1),
	(35, 'F:537141553', 75, 'Duel', '1354711711', 'F:100002141165315', 4),
	(36, 'F:100002141165315', -75, 'Duel', '1354711712', 'F:537141553', 3),
	(37, 'F:697342135', -81, 'Duel', '1354711843', 'F:537141553', -1),
	(38, 'F:537141553', 81, 'Duel', '1354711847', 'F:697342135', 5),
	(39, 'F:537141553', -20, 'BuyProductWeapon', '1354711864', '', 6),
	(40, 'F:537141553', -20, 'BuyProductWeapon', '1354711902', '', 6),
	(41, 'F:537141553', 73, 'Duel', '1354711903', 'F:697342135', 7),
	(42, 'F:697342135', -73, 'Duel', '1354711904', 'F:537141553', -1),
	(43, 'F:537141553', -200, 'BuyProductWeapon', '1354712174', '', 8),
	(44, 'F:537141553', -20, 'BuyProductWeapon', '1354713371', '', 1),
	(45, 'F:697342138', -77, 'Duel', '1354715593', 'F:537141553', -1),
	(46, 'F:537141553', 77, 'Duel', '1354715597', 'F:697342138', 1),
	(47, 'F:537141553', 77, 'Duel', '1354715636', 'F:697342138', 2),
	(48, 'F:697342138', -77, 'Duel', '1354715637', 'F:537141553', -1),
	(49, 'F:697342138', 22, 'Duel', '1354715689', 'F:537141553', -1),
	(50, 'F:537141553', -22, 'Duel', '1354715693', 'F:697342138', 3),
	(51, 'F:697342138', -61, 'Duel', '1354715733', 'F:537141553', -1),
	(52, 'F:537141553', 61, 'Duel', '1354715737', 'F:697342138', 4),
	(53, 'F:697342138', -57, 'Duel', '1354717491', 'F:537141553', -1),
	(54, 'F:537141553', 57, 'Duel', '1354717495', 'F:697342138', 1),
	(55, 'F:537141553', -25, 'Duel', '1354717523', 'F:697342138', 2),
	(56, 'F:697342138', 25, 'Duel', '1354717524', 'F:537141553', -1),
	(57, 'F:100002141165315', -20, 'Duel', '1354717580', 'F:537141553', 1),
	(58, 'F:537141553', 20, 'Duel', '1354717580', 'F:100002141165315', 3),
	(59, 'F:537141553', -100, 'BuyProductWeapon', '1354717591', '', 4),
	(60, 'F:537141553', -100, 'BuyProductWeapon', '1354717620', '', 4),
	(61, 'F:537141553', 18, 'Duel', '1354717620', 'F:100002141165315', 5),
	(62, 'F:100002141165315', -18, 'Duel', '1354717621', 'F:537141553', 2),
	(63, 'F:537141553', 16, 'Duel', '1354717699', 'F:100002141165315', 6),
	(64, 'F:100002141165315', -16, 'Duel', '1354717699', 'F:537141553', 3),
	(65, 'F:697342135', -66, 'Duel', '1354717725', 'F:537141553', -1),
	(66, 'F:537141553', 66, 'Duel', '1354717731', 'F:697342135', 7),
	(67, 'F:537141553', -60, 'BuyProductWinDefense', '1354719449', '', 8),
	(68, 'F:100000532245810', 10, 'Daily money', '1354719878', '', 1),
	(69, 'F:100000532245810', 20, 'Duel', '1354720269', 'F:537141553', 2),
	(70, 'F:100000532245810', -23, 'Duel', '1354720375', 'F:537141553', 3),
	(71, 'F:537141553', 23, 'Duel', '1354720376', 'F:100000532245810', 1),
	(72, 'F:100000532245810', 59, 'Duel', '1354720419', 'F:697342135', 4),
	(73, 'F:697342135', -59, 'Duel', '1354720422', 'F:100000532245810', -1),
	(74, 'F:100000532245810', 54, 'Duel', '1354720464', 'F:697342138', 5),
	(75, 'F:697342138', -54, 'Duel', '1354720466', 'F:100000532245810', -1),
	(76, 'F:100000532245810', -100, 'BuyProductWin', '1354720480', '', 6),
	(77, 'F:100000532245810', -200, 'BuyProductWeapon', '1354720507', '', 7),
	(78, 'F:697342134', -73, 'Duel', '1354720558', 'F:100000532245810', -1),
	(79, 'F:100000532245810', -200, 'BuyProductWeapon', '1354720564', '', 7),
	(80, 'F:100000532245810', 73, 'Duel', '1354720565', 'F:697342134', 8),
	(81, 'F:100000532245810', 11, 'Duel', '1354720631', 'F:537141553', 9),
	(82, 'F:537141553', -11, 'Duel', '1354720632', 'F:100000532245810', 2),
	(83, 'F:100000532245810', 10, 'Duel', '1354720644', 'F:537141553', 10),
	(84, 'F:100000532245810', 14, 'Duel', '1354720726', 'F:100002141165315', 11),
	(85, 'F:100002141165315', -14, 'Duel', '1354720727', 'F:100000532245810', 4),
	(86, 'F:100002141165315', -13, 'Duel', '1354720794', 'F:537141553', 5),
	(87, 'F:537141553', 13, 'Duel', '1354720794', 'F:100002141165315', 3),
	(88, 'F:537141553', 53, 'Duel', '1354738984', 'F:697342135', 4),
	(89, 'F:537141553', 66, 'Duel', '1354738985', 'F:697342134', 5),
	(90, 'F:697342134', -66, 'Duel', '1354738986', 'F:537141553', -1),
	(91, 'F:537141553', -23, 'Duel', '1354739113', 'F:697342135', 6),
	(92, 'F:697342135', 23, 'Duel', '1354739115', 'F:537141553', -1),
	(93, 'F:697342138', -49, 'Duel', '1354790589', 'F:100002141165315', -1),
	(94, 'F:100002141165315', 49, 'Duel', '1354790593', 'F:697342138', 8),
	(95, 'F:697342135', 20, 'Duel', '1354802583', 'A:0000000000', -1),
	(96, 'A:0000000000', -20, 'Duel', '1354802587', 'F:697342135', 1),
	(97, 'F:697342134', 18, 'Duel', '1354802835', 'A:0000000000', -1),
	(98, 'A:0000000000', -18, 'Duel', '1354802839', 'F:697342134', 2);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;


# Dumping structure for table duels_v201.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `authen` varchar(50) CHARACTER SET utf8 NOT NULL,
  `nickname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `device_name` varchar(10) CHARACTER SET utf8 NOT NULL,
  `snetwork` char(1) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `last_login` int(10) NOT NULL,
  `first_login` int(10) NOT NULL,
  `type` varchar(10) CHARACTER SET utf8 NOT NULL,
  `region` varchar(255) CHARACTER SET utf8 NOT NULL,
  `current_language` varchar(255) CHARACTER SET utf8 NOT NULL,
  `os` varchar(10) CHARACTER SET utf8 NOT NULL,
  `app_ver` varchar(10) CHARACTER SET utf8 NOT NULL,
  `device_token` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date` int(11) NOT NULL,
  `money` int(255) NOT NULL,
  `session_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL DEFAULT '0',
  `duels_win` int(11) NOT NULL DEFAULT '0',
  `duels_lost` int(11) NOT NULL DEFAULT '0',
  `bigest_win` int(11) NOT NULL DEFAULT '0',
  `remove_ads` int(11) NOT NULL DEFAULT '0',
  `avatar` text CHARACTER SET utf8 NOT NULL,
  `age` date NOT NULL,
  `home_town` varchar(256) CHARACTER SET utf8 NOT NULL,
  `friends` int(11) NOT NULL,
  `identifier` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `nickname` (`nickname`),
  KEY `authen` (`authen`),
  KEY `money` (`money`),
  KEY `Snetwork` (`snetwork`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Dumping data for table duels_v201.users: 12 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `authen`, `nickname`, `device_name`, `snetwork`, `last_login`, `first_login`, `type`, `region`, `current_language`, `os`, `app_ver`, `device_token`, `date`, `money`, `session_id`, `level`, `points`, `duels_win`, `duels_lost`, `bigest_win`, `remove_ads`, `avatar`, `age`, `home_town`, `friends`, `identifier`) VALUES
	(14, 'F:100000532245810', 'Игорь Ильченко', 'iPad2', 'F', 1354719876, 1354719876, '0', 'ru_UA', 'ru', '6.0.1', '2.2', '', 0, -72, '50bf67092a858', 9, 1586, 7, 1, 73, 0, 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash4/211323_100000532245810_2129975069_q.jpg', '0000-00-00', 'Cherkassy, Cherkas\'Ka Oblast\', Ukraine', 116, 'F:100000532245810'),
	(3, 'F:697342133', 'leperdant', 'iPod4', 'B', 0, 0, '', '', '', '6.1', '2.1', '', 0, 345, 'ghgyd3', 2, 100, 12, 5, 40, 0, 'https://s3.amazonaws.com/bidoncd/avatars/539501_10151134590778159_692243691_n.jpg', '0000-00-00', '', 0, ''),
	(4, 'F:697342134', 'police shooter', 'iPod4', 'B', 0, 0, '', '', '', '6.1', '2.1', '', 0, 613, 'dsad83j', 3, 0, 21, 0, 0, 0, 'https://s3.amazonaws.com/bidoncd/avatars/425355_2806254082522_1194585908_n.jpg', '0000-00-00', '', 0, ''),
	(5, 'F:697342135', 'rangershoot9000', 'iPod4', 'B', 0, 0, '', '', '', '6.1', '2.1', '', 0, 579, 'kklj34e', 4, 0, 34, 0, 0, 0, 'https://s3.amazonaws.com/bidoncd/avatars/315959_257702987608826_1493735409_n.jpg', '0000-00-00', '', 0, ''),
	(6, 'F:697342138', 'Jacob Riddle', 'iPod4', 'B', 0, 0, '', '', '', '6.1', '2.1', '', 0, 442, 'kjkf84d', 5, 0, 38, 0, 0, 0, 'https://s3.amazonaws.com/bidoncd/avatars/222521_10151340781757275_1683854820_n.jpg', '0000-00-00', '', 0, ''),
	(7, 'F:697342136', 'Jarrod', 'iPod4', 'B', 0, 0, '', '', '', '6.1', '2.1', '', 0, 1027, 'sdkj5g', 6, 450, 41, 13, 112, 0, 'https://s3.amazonaws.com/bidoncd/avatars/197896_10152325624135383_1076212472_n.jpg', '0000-00-00', '', 0, ''),
	(8, 'F:697342137', 'TonyTheTiger', 'iPod4', 'B', 0, 0, '', '', '', '6.1', '2.1', '', 0, 1592, 'khhid95', 7, 0, 52, 0, 0, 0, 'https://s3.amazonaws.com/bidoncd/avatars/189676_10150113914460872_5859475_n.jpg', '0000-00-00', '', 0, ''),
	(15, 'F:100003855788662', 'wasntm3_05', 'iPhone5GSM', 'F', 1354736658, 1354736658, '0', 'en_US', 'en', '6.0.1', '2.1', '', 0, 200, '50bfa4118c205', 0, 0, 0, 0, 0, 0, 'https://fbcdn-profile-a.akamaihd.net/static-ak/rsrc.php/v2/y9/r/IB7NOFmPw2a.gif', '0000-00-00', '', 3, 'F:100003855788662'),
	(11, 'F:100002141165315', 'Sergij Sobol', 'iPod3', 'F', 1354716326, 1354716326, '0', 'ru_UA', 'ru', '5.1.1', '2.2', '', 0, 168, '50c0a978397e7', 3, 61, 1, 5, 49, 0, 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn1/173799_100002141165315_762894279_q.jpg', '0000-00-00', '', 0, 'F:100002141165315'),
	(12, 'F:537141553', 'Vladimir Dybenko', 'iPhone4', 'F', 1354716594, 1354716594, '0', 'ru_UA', 'en', '6.0.1', '2.2', '', 0, 213, '50c0a01f5f68c', 4, 146, 2, 2, 66, 0, 'http://profile.ak.fbcdn.net/hprofile-ak-ash4/186254_537141553_500747899_q.jpg', '0000-00-00', 'Cherkassy, Cherkas\'Ka Oblast\', Ukraine', 296, 'F:537141553'),
	(13, 'F:100004072748849', 'John  Newbie', 'x86_64', 'F', 1354717227, 1354717227, '0', 'en_US', 'en', '6.0', '2.2', '', 0, 200, '50c0a2f4d2bae', 0, 0, 0, 0, 0, 0, 'http://profile.ak.fbcdn.net/hprofile-ak-ash3/624017_100004072748849_788191727_q.jpg', '0000-00-00', '', 2, 'F:100004072748849'),
	(16, 'F:583113312', 'Matthew Dixon', 'iPhone4S', 'F', 1354799329, 1354799329, '0', 'en_GB', 'en-GB', '6.0.1', '2.2', '', 0, 200, '50c098e080330', 0, 0, 0, 0, 0, 0, 'http://profile.ak.fbcdn.net/hprofile-ak-prn1/48686_583113312_1154091046_q.jpg', '0000-00-00', 'Stockholm, Sweden', 0, 'F:583113312'),
	(17, 'A:0000000000', 'Anonymous', 'x86_64', '0', 1354802487, 1354802487, '0', 'en_US', 'en', '6.0', '2.2', '', 0, 162, '50c0aa3c9dcf8', 1, 8, 0, 2, 0, 0, '', '0000-00-00', '', 0, 'A:0000000000');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


# Dumping structure for table duels_v201.users_favorites
CREATE TABLE IF NOT EXISTS `users_favorites` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL,
  `user_favorite` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Dumping data for table duels_v201.users_favorites: 0 rows
/*!40000 ALTER TABLE `users_favorites` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_favorites` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
