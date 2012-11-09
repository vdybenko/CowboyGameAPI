# --------------------------------------------------------
# Host:                         cowboyduel.c6algyr0odj4.eu-west-1.rds.amazonaws.com
# Server version:               5.5.20-log
# Server OS:                    Linux
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2012-11-09 14:25:35
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Dumping data for table duels_v201.buyitemsstore: ~10 rows (approximately)
/*!40000 ALTER TABLE `buyitemsstore` DISABLE KEYS */;
INSERT INTO `buyitemsstore` (`id`, `authenUser`, `itemIdStore`, `transactionsId`, `date`) VALUES
	(1, 'F:1667761963', 1, 0, 1351439523),
	(3, 'F:100004072748849', 2, 0, 10),
	(4, 'F:100004072748849', 1, 3201, 200),
	(5, 'F:100004072748849', 2, 3201, 1350995941),
	(6, 'F:100004072748849', 1, 3201, 1350995948),
	(7, 'F:100004072748849', 1, 3201, 1351000482),
	(8, 'F:100004072748849', 4, 4234, 1351612323),
	(9, 'A:de76bac288', 3, 45, 1351698723),
	(30, 'F:100004072748849', 33, 33, 1352454523),
	(31, 'A:00000000-0', 34, 1234, 1352454665);
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
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Dumping data for table duels_v201.duels: 18 rows
/*!40000 ALTER TABLE `duels` DISABLE KEYS */;
INSERT INTO `duels` (`id`, `opponent`, `rate_fire`, `device_name`, `app_ver`, `authen`, `date`, `system_name`, `system_version`, `unique_identifier`, `lat`, `lon`, `GPS`) VALUES
	(7, 'F:12312342', '9', 'iphone', '', 'T:1153984783', '	1351257745', '', '', '', '12.1234123', '65.345345', 'on'),
	(8, 'F:12312342', '9', 'iphone', '', 'T:1153984783', '1232143321', '', '', '', '12.1234123', '65.345345', 'on'),
	(9, 'F:12312342', '9', 'iphone', '', 'T:1153984783', '1232143321', '', '', '', '12.1234123', '65.345345', 'on'),
	(10, 'F:12312342', '9', 'iphone', '', 'T:1153984783', '1232143321', '', '', '', '12.1234123', '65.345345', 'on'),
	(11, 'F:12312342', '9', 'iphone', '', 'T:1153984783', '1232143321', '', '', '', '12.1234123', '65.345345', 'on'),
	(12, 'F:12312342', '9', 'iphone', '', 'T:1153984783', '1232143321', '', '', '', '12.1234123', '65.345345', 'on'),
	(13, 'F:12312342', '9', 'iphone', '', 'T:1153984783', '1232143321', '', '', '', '12.1234123', '65.345345', 'on'),
	(14, 'F:12312342', '9', 'iphone', '', 'T:1153984783', '1232143321', '', '', '', '12.1234123', '65.345345', 'on'),
	(15, 'F:12312342', '9', 'iphone', '', 'T:1153984783', '	1351257000', '', '', '', '12.1234123', '65.345345', 'on'),
	(16, 'F:12312342', '9', 'iphone', '', 'T:1153984783', '1232143321', '', '', '', '12.1234123', '65.345345', 'on'),
	(17, 'F:12312342', '9', 'iphone', '', 'T:1153984783', '1232143321', '', '', '', '12.1234123', '65.345345', 'on'),
	(18, 'F:12312342', '9', 'iphone', '', 'T:1153984783', '1232143321', '', '', '', '12.1234123', '65.345345', 'on'),
	(19, 'F:12312342', '9', 'iphone', '', 'T:1153984783', '1232143321', '', '', '', '12.1234123', '65.345345', 'on'),
	(20, 'F:12312342', '9', 'iphone', '', 'T:1153984783', '1232143321', '', '', '', '12.1234123', '65.345345', 'on'),
	(21, 'F:12312342', '9', 'iphone', '', 'T:1153984783', '1232143321', '', '', '', '12.1234123', '65.345345', 'on'),
	(22, 'F:12312342', '9', 'iphone', '', 'T:1153984783', '1232143321', '', '', '', '12.1234123', '65.345345', 'on'),
	(23, 'F:12312342', '9', 'iphone', '', 'T:1153984783', '1350897595', '', '', '', '12.1234123', '65.345345', 'on'),
	(24, 'F:12312342', '9', 'iphone', '', 'T:1153984783', '1232143321', '', '', '', '12.1234123', '65.345345', 'on');
/*!40000 ALTER TABLE `duels` ENABLE KEYS */;


# Dumping structure for table duels_v201.online
CREATE TABLE IF NOT EXISTS `online` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `authen` varchar(50) CHARACTER SET utf8 NOT NULL,
  `online` int(1) NOT NULL,
  `enterTime` varchar(12) CHARACTER SET latin1 NOT NULL,
  `exitTime` varchar(12) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Dumping data for table duels_v201.online: 28 rows
/*!40000 ALTER TABLE `online` DISABLE KEYS */;
INSERT INTO `online` (`id`, `authen`, `online`, `enterTime`, `exitTime`) VALUES
	(1, 'F:537141553', 0, '1349953425', '1349953513'),
	(2, 'F:100001785186331', 1, '1349787186', '0'),
	(3, 'F:100004072748849', 1, '1351235018', '0'),
	(4, 'A:951059A5-3', 1, '1349789821', '0'),
	(5, 'A:be56be4e39', 0, '1349939100', '1349940389'),
	(6, 'F:100001850844084', 1, '1349958778', '0'),
	(7, 'A:00000000-0', 1, '1350304854', '0'),
	(8, 'A:6e70744811', 1, '1348635243', '0'),
	(9, 'A:6b03703d44', 1, '1348728224', '0'),
	(10, 'A:b19976b9a4', 1, '1344863089', '0'),
	(11, 'F:583113312', 0, '1345887464', '1345887590'),
	(12, 'A:8ab36f7461', 0, '1344964877', '1344965135'),
	(13, 'A:11630265df', 1, '1347723111', '0'),
	(14, 'F:1667761963', 0, '1347723172', '1347723346'),
	(22, 'A:f306b82768', 1, '1346424500', '0'),
	(15, 'A:de76bac288', 0, '1349795167', '1349795172'),
	(16, 'F:697342199', 0, '1345569285', '1345569411'),
	(17, 'F:100002141165315', 0, '1346403791', '1346404223'),
	(18, 'A:f0d23ff457', 0, '1345478715', '1345478755'),
	(19, 'A:79a7a438ad', 1, '1350292904', '0'),
	(20, 'F:100000589834862', 0, '1346156417', '1346156427'),
	(21, 'A:d66eb203ed', 1, '1345993504', ''),
	(23, 'F:100000532245810', 0, '1346441436', '1346441491'),
	(24, 'A:67851e4c55', 0, '1348258077', '1348258278'),
	(25, 'A:bc0f35c120', 0, '1349205178', '1349205250'),
	(26, '1', 1, '1349956976', ''),
	(29, '6', 1, '1350305046', '0'),
	(30, 'F:9030943201', 1, '1350563253', '0');
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
	(2, 'timeLastRefresh', '1352214756'),
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
  `thumb` varchar(60) COLLATE utf8_bin DEFAULT '',
  `thumbRetina` varchar(60) COLLATE utf8_bin DEFAULT '',
  `img` varchar(60) COLLATE utf8_bin DEFAULT '',
  `imgRetina` varchar(60) COLLATE utf8_bin DEFAULT '',
  `sound` varchar(50) COLLATE utf8_bin DEFAULT '',
  `bigImg` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `bigImgRetina` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `description` varchar(100) COLLATE utf8_bin DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Dumping data for table duels_v201.store: ~4 rows (approximately)
/*!40000 ALTER TABLE `store` DISABLE KEYS */;
INSERT INTO `store` (`id`, `type`, `title`, `damageOrDefense`, `levelLock`, `golds`, `inAppId`, `thumb`, `thumbRetina`, `img`, `imgRetina`, `sound`, `bigImg`, `bigImgRetina`, `description`) VALUES
	(1, 'weapons', 'Револьвер М60', 10, 4, 0, '', 'http://artdiz.at.ua/_nw/0/s23977883.jpg', '', 'http://artdiz.at.ua/_nw/0/s23977883.jpg', '', 'http://bidoncd.s3.amazonaws.com/Test.mp3', 'http://artdiz.at.ua/_nw/0/s23977883.jpg', NULL, 'description gun'),
	(2, 'weapons', 'Револьвер П8', 54, 10, 100, '0', '', '', '', '', '', '', NULL, ''),
	(3, 'defenses', 'Кімано', 10, 10, 0, '45', '', '', '', '', '', '', NULL, ''),
	(4, 'defenses', 'Шапка ушанка', 7, 6, 99, '0', '', '', '', '', '', '', NULL, 'іва');
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
) ENGINE=MyISAM AUTO_INCREMENT=129381 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Dumping data for table duels_v201.transactions: 6 rows
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` (`id`, `authen`, `value`, `description`, `date`, `opponent_authen`, `local_id`) VALUES
	(3997, 'A:de76bac288', 10, 'Daily money', '1313537114', '', 0),
	(4004, 'F:100001850844084', 10, 'Duel', '1351439523', 'F:100001337965647', 0),
	(4033, 'F:100001850844084', 50, 'Duel', '1351439523', 'A:67851e4c55', 0),
	(4123, 'A:de76bac288', 100, 'Daily money', '	1351427480', '', 0),
	(4979, 'A:de76bac288', 20, 'Daily money', '1351168280', '', 0),
	(129380, 'F:100001850844084', 22, 'Duel', '1351439523', 'F:100001337965647', 0);
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
  `age` text CHARACTER SET utf8 NOT NULL,
  `home_town` varchar(256) CHARACTER SET utf8 NOT NULL,
  `friends` int(11) NOT NULL,
  `identifier` varchar(30) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `nickname` (`nickname`),
  KEY `authen` (`authen`),
  KEY `money` (`money`),
  KEY `Snetwork` (`snetwork`)
) ENGINE=MyISAM AUTO_INCREMENT=145933 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Dumping data for table duels_v201.users: 54 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `authen`, `nickname`, `device_name`, `snetwork`, `last_login`, `first_login`, `type`, `region`, `current_language`, `os`, `app_ver`, `device_token`, `date`, `money`, `session_id`, `level`, `points`, `duels_win`, `duels_lost`, `bigest_win`, `remove_ads`, `avatar`, `age`, `home_town`, `friends`, `identifier`) VALUES
	(145925, 'F:100001850844084', 'Тарас Кошмар123', 'x86_64', 'F', 1349772450, 1348728319, '0', 'en_US', 'ru', '5.0', '1.4', '', 0, 300, '507bc2a61e572', 3, 46, 2, 1, 352, 0, 'Тарас Кошмар', '02/01/1990', 'Cherkasy', 45, 'Тарас Кокшаров'),
	(145922, 'A:de76bac288', 'iphone', 'iPhone3G', '0', 1349794640, 1347737232, '0', 'uk_UA', 'ru', '4.2.1', '1.4', '', 0, 138, 'c', 3, 46, 5, 9, 21, 0, 'iphone', '', '', 0, ''),
	(145923, 'A:67851e4c55', 'Anonymous', 'iPad2GSM', '0', 1351514676, 1348149579, '0', 'es_ES', 'es', '5.1.1', '1.4', '', 0, 200, '505cc91de9a30', 0, 0, 0, 0, 0, 0, '0', '', '', 0, ''),
	(145915, 'A:11630265df', 'Anonymous', 'iPhone4S', '0', 0, 1351513880, '0', 'ru_UA', 'ru', '5.1.1', '1.4', '', 0, 200, '50549f67bec08', 0, 0, 0, 0, 0, 0, '0', '', '', 0, ''),
	(145916, 'F:1667761963', 'Olya Dybenko', 'iPhone4S', 'F', 1351514676, 1346421279, '0', 'ru_UA', 'ru', '5.1.1', '1.4', '', 0, 197, '50549fa45c09f', 1, 12, 2, 7, 30, 0, 'http://profile.ak.fbcdn.net/hprofile-ak-ash2/371491_1667761963_203212700_q.jpg', '02/22/1983', 'Cherkasy', 230, 'Olya Dybenko'),
	(145817, 'F:100002568717288', 'Joelle Campbell', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'http://profile.ak.fbcdn.net/hprofile-ak-ash2/565219_100002568717288_1411977225_q.jpg', '1996-30-07', '', 13, 'Joelle Campbell'),
	(145929, 'A:951059A5-3', 'Anonymous', 'x86_64', '0', 0, 1349770083, '0', 'en_US', 'en', '4.3.2', '1.4', '', 0, 200, '5074287d60bc3', 0, 0, 0, 0, 0, 0, '0', '0', '0', 0, '0'),
	(145845, 'F:100003377230107', 'Jay Macaspac', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/195288_100003377230107_289931950_q.jpg', '1993-01-11', '', 395, 'Jay Macaspac'),
	(145843, 'F:89156000001487', 'Elizabeth Yangstein', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '5078300a74aac', 1, 0, 0, 0, 0, 0, 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v2/y9/r/IB7NOFmPw2a.gif', '1980-22-03', '', 8, 'Elizabeth Yangstein'),
	(145844, 'F:1058865100', 'Sergio Netavsky', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '507bba84c10b3', 1, 0, 0, 0, 0, 0, 'http://profile.ak.fbcdn.net/hprofile-ak-ash2/48900_1058865100_803177_q.jpg', '1984-19-02', 'Augsburg, Germany', 274, 'Sergio Netavsky'),
	(45755, 'F:100003963310974', 'Alexander Shevchuk', '', 'E', 0, 0, '', '', '', '', '', '', 0, 200, '', 1, 0, 0, 0, 0, 0, 'https://graph.facebook.com/100003963310974/picture?type=large', '0000-00-00', '', 0, ''),
	(45758, 'F:100003956230861', 'Sasha Chernov', '', 'F', 0, 0, '', '', '', '', '', '', 0, 0, '', 1, 0, 0, 0, 0, 0, 'https://graph.facebook.com/100003308531413/picture?type=large', '0000-00-00', '', 0, ''),
	(45769, 'F:100000828016792', 'Olya Dzigora', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'https://graph.facebook.com/100000828016792/picture?type=large', '0000-00-00', '', 0, ''),
	(145772, 'F:100001337965647', 'Pavel Kovalenko', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'https://graph.facebook.com/100001337965647/picture?type=large', '0000-00-00', '', 0, ''),
	(145773, 'F:100000383244084', 'Serhio Pascale', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 130, 0, 0, 0, 0, 'https://graph.facebook.com/100000383244084/picture?type=large', '0000-00-00', '', 0, ''),
	(145774, 'F:100002824481021', 'Matěj Hostina', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'https://graph.facebook.com/100003308531413/picture?type=large', '0000-00-00', '', 0, ''),
	(145775, 'F:100002765971179', 'Paulo Sebastian', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'https://graph.facebook.com/100002765971179/picture?type=large', '0000-00-00', '', 0, ''),
	(145780, 'F:100003796341366', 'Gabe Dehaven', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'https://graph.facebook.com/100003796341366/picture?type=large', '0000-00-00', '', 24, 'Gabe Dehaven'),
	(145781, 'F:100000225395633', 'Colby Young', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'https://graph.facebook.com/100000225395633/picture?type=large', '0000-00-00', 'Nashville, Tennessee', 144, 'Colby Young'),
	(145782, 'F:100001374756365', 'Pedro Perochin', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'https://graph.facebook.com/100001374756365/picture?type=large', '0000-00-00', 'Caxias, Rio Grande Do Sul, Bra', 91, 'Pedro Perochin'),
	(145783, 'F:100002042127853', 'Павел Токарев', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'https://graph.facebook.com/100002042127853/picture?type=large', '0000-00-00', 'Samara, Russia', 91, 'Павел Токарев'),
	(145784, 'F:100003953445072', 'Aan Nurhan', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'https://graph.facebook.com/100003953445072/picture?type=large', '1998-23-12', '', 29, 'Aan Nurhan'),
	(145785, 'F:100003658750025', 'Ulises Moralez', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'https://graph.facebook.com/100003658750025/picture?type=large', '1992-22-04', 'Resistencia, Chaco', 168, 'Ulises Moralez'),
	(145794, 'F:100001917054999', 'Димон Тепаленко', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/369579_100001917054999_2002869871_q.jpg', '', '', 38, 'Димон Тепаленко'),
	(145796, 'F:1070146897', 'Viktor Dziuban', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'https://fbcdn-profile-a.akamaihd.net/static-ak/rsrc.php/v2/yo/r/UlIqmHJn-SK.gif', '1986-12-01', 'Cherkassy, Cherkas\'Ka Oblast\', Ukraine', 48, 'Viktor Dziuban'),
	(145797, 'F:100002094398621', 'Норвежский Лесной', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/161595_100002094398621_2474008_q.jpg', '1976-06-12', '', 14, 'Норвежский Лесной'),
	(145846, 'F:100003008419251', 'Apera Mathews-deer', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'http://profile.ak.fbcdn.net/hprofile-ak-ash2/274094_100003008419251_1936561972_q.jpg', '1998-26-04', '', 102, 'Apera Mathews-deer'),
	(145801, 'F:100003308531413', 'Димон Тепаленко', 'test', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v2/yo/r/UlIqmHJn-SK.gif', '1987-03-07', 'Cherkasy', 3, 'Димон Тепаленко'),
	(145924, 'A:6b03703d44', 'Anonymous', 'iPod2', '0', 0, 1348728224, '0', 'ru_UA', 'ru', '4.2.1', '1.4', '', 0, 200, '5063f5a027eeb', 0, 0, 0, 0, 0, 0, '0', '', '', 0, ''),
	(145802, 'F:100003849163320', 'Koba Kvekveskiri', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'http://profile.ak.fbcdn.net/hprofile-ak-ash2/371881_100003849163320_184950537_q.jpg', '1994-01-06', '', 14, 'Koba Kvekveskiri'),
	(145803, 'F:100002240700067', 'Guilherme Farias', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'http://profile.ak.fbcdn.net/hprofile-ak-ash2/565205_100002240700067_741084567_q.jpg', '1993-07-06', '', 463, 'Guilherme Farias'),
	(145804, 'F:100002225935396', 'Takis Tromeros', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/187169_100002225935396_1252164_q.jpg', '1966-19-12', '', 13, 'Takis Tromeros'),
	(145805, 'F:100000181129810', 'Nate Smith', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash2/368981_100000181129810_2043574013_q.jpg', '1996-16-01', 'Layton, Utah', 407, 'Nate Smith'),
	(145806, 'F:1618653436', 'Fabrice Lepaillier', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/273336_1618653436_961106247_q.jpg', '1982-04-12', '', 104, 'Fabrice Lepaillier'),
	(145809, 'F:100002955888560', 'Mike Zheglov', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/261045_100002955888560_1541903782_q.jpg', '1987-15-02', '', 4, 'Mike Zheglov'),
	(145807, 'F:100002947490531', 'Dmitry Snetsar', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v2/yo/r/UlIqmHJn-SK.gif', '1983-28-12', '', 7, 'Dmitry Snetsar'),
	(145808, 'F:89176000000634', 'Margaret Sadanson', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'http://profile.ak.fbcdn.net/static-ak/rsrc.php/v2/y9/r/IB7NOFmPw2a.gif', '1980-26-09', '', 8, 'Margaret Sadanson'),
	(145810, 'F:100003986713021', 'ZiDan Crew', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/372270_100003986713021_308316069_q.jpg', '1980-10-01', 'Malang', 241, 'ZiDan Crew'),
	(145811, 'F:100000267383200', 'Олег Напрасный', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'http://profile.ak.fbcdn.net/hprofile-ak-ash2/23185_100000267383200_6389_q.jpg', '1975-12-01', 'Kyiv, Ukraine', 609, 'Олег Напрасный'),
	(145812, 'F:100002993499003', 'Austin Kindle', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'https://fbcdn-profile-a.akamaihd.net/hprofile-ak-snc4/187354_100002993499003_2118180781_q.jpg', '1990-18-10', 'Harrod, Ohio', 309, 'Austin Kindle'),
	(145813, 'F:100003825983743', 'Hugo Gana', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/187316_100003825983743_1090117352_q.jpg', '1987-27-11', '', 39, 'Hugo Gana'),
	(145814, 'F:100003804058651', 'Quang Minh', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/370252_100003804058651_1443939224_q.jpg', '1993-20-08', '', 158, 'Quang Minh'),
	(145815, 'F:100003443034588', 'Andrey Fedirko', '', 'F', 0, 0, '', '', '', '', '', '', 0, 100, '', 1, 0, 0, 0, 0, 0, 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/49541_100003443034588_461883270_q.jpg', '1976-15-09', '', 41, 'Andrey Fedirko'),
	(145928, 'F:100004072748849', 'Q', 'x86_64', 'F', 1349364404, 1349348039, '0', 'en_US', 'en', '5.1', '1.4', '', 0, 146, '508a35ca33ecd', 2, 29, 0, 3, 0, 0, '', '07/01/1990', '', 2, 'John  Newbie'),
	(145927, 'A:00000000-0', 'Q', 'x86_64', 'B', 1349939590, 1349347995, '0', 'en_US', 'en', '5.1', '1.4', '', 0, 482, '507c04563d136', 3, 44, 8, 1, 26, 0, 'Q', '', '', 0, ''),
	(145926, 'A:bc0f35c120', 'Anonymous', 'iPad3,3', 'B', 0, 1349205178, '0', 'en_US', 'en', '6.0', '1.4', '', 0, 200, '', 0, 0, 0, 0, 0, 0, '0', '', '', 0, ''),
	(145917, 'A:6e70744811', 'Anonymous', 'iPhone4', '0', 0, 1346421347, '0', 'ru_UA', 'en', '6.0', '1.4', '', 0, 200, '50628a6b8a26a', 0, 0, 0, 0, 0, 0, '0', '', '', 0, ''),
	(145918, 'F:537141553', 'Vladimir Dybenko', 'iPhone4', 'F', 1349952545, 1346421369, '0', 'ru_UA', 'en', '6.0', '1.4', '', 0, 775, '5076a7919dd25', 2, 21, 6, 0, 40, 0, 'http://profile.ak.fbcdn.net/hprofile-ak-ash4/273737_537141553_45330813_q.jpg', '06/29/1981', 'Cherkassy, Cherkas\'Ka Oblast\', Ukraine', 0, 'Vladimir Dybenko'),
	(145919, 'A:be56be4e39', 'Anonymous', 'iPod3', 'B', 1349939590, 1346423403, '0', 'ru_UA', 'ru', '5.1.1', '1.4', '', 0, 214, '50766f9c995c8', 3, 44, 4, 4, 53, 0, 'Anonymous', '', '', 0, ''),
	(145920, 'A:f306b82768', 'Anonymous', 'iPad2', '0', 0, 1346424484, '0', 'ru_UA', 'ru', '6.0', '1.4', '', 0, 200, '5040ceb439a5c', 0, 0, 0, 0, 0, 0, '0', '', '', 0, ''),
	(145921, 'F:100000532245810', 'Игорь Ильченко', 'iPad2', 'F', 1346441436, 1346424500, '0', 'ru_UA', 'ru', '6.0', '1.4', '', 0, 234, '504110dc1939f', 1, 6, 1, 2, 25, 0, 'http://profile.ak.fbcdn.net/hprofile-ak-snc4/211323_100000532245810_2129975069_q.jpg', '09/17/1985', '', 108, 'Игорь Ильченко'),
	(145930, 'fgfh', 'df', 'ejjjj', 'F', 0, 1350310995, '0', '456', 'ed', 'qw', '345jhgj', '', 0, 200, '', 345, 0, 0, 0, 0, 56, 'fg', 'dfgdfgdf', 'gd', 345, '345'),
	(145931, 'sdf', '234', '32', 'B', 0, 1350312438, '0', '423', '234', '23423', '434', '', 0, 200, '', 34, 0, 0, 0, 0, 3, '23', '423', '42', 4, '34'),
	(145932, 'kjkh', 'sad', 'asdasd', 'B', 0, 1350391731, '0', 'asd', 'asd', '1', '1', '', 0, 200, '', 3, 0, 0, 0, 0, 3, 'asd', 'asd', 'asd', 2, '3');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


# Dumping structure for table duels_v201.users_favorites
CREATE TABLE IF NOT EXISTS `users_favorites` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user_id` int(8) NOT NULL,
  `user_favorite` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=391 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

# Dumping data for table duels_v201.users_favorites: 162 rows
/*!40000 ALTER TABLE `users_favorites` DISABLE KEYS */;
INSERT INTO `users_favorites` (`id`, `user_id`, `user_favorite`) VALUES
	(1, 45459, 45169),
	(2, 45459, 36929),
	(3, 45459, 43095),
	(4, 45459, 38043),
	(5, 45668, 45666),
	(6, 45668, 45666),
	(7, 45668, 45667),
	(8, 45668, 45666),
	(9, 45668, 45666),
	(10, 45668, 45666),
	(11, 45668, 45667),
	(12, 45667, 45668),
	(13, 45667, 45666),
	(14, 45667, 45666),
	(15, 45667, 45666),
	(16, 45667, 45668),
	(17, 45668, 45666),
	(18, 45668, 45667),
	(19, 45668, 45667),
	(20, 45668, 45666),
	(21, 45667, 45668),
	(22, 45667, 45666),
	(23, 45667, 45666),
	(24, 45667, 45668),
	(25, 45667, 45666),
	(26, 45667, 45668),
	(27, 45667, 45669),
	(28, 45667, 45668),
	(29, 45667, 45669),
	(30, 45667, 45666),
	(31, 45667, 45668),
	(32, 45667, 45668),
	(33, 45667, 45666),
	(34, 45667, 45666),
	(35, 45667, 45669),
	(36, 45667, 45669),
	(37, 45667, 45669),
	(38, 45667, 45669),
	(39, 45667, 45668),
	(40, 45667, 45668),
	(41, 45667, 45668),
	(42, 45667, 45668),
	(43, 45667, 45668),
	(44, 45667, 45668),
	(45, 45667, 45668),
	(46, 45667, 45666),
	(47, 45667, 45669),
	(48, 45667, 45668),
	(49, 45667, 45668),
	(50, 45667, 45666),
	(51, 45667, 45668),
	(52, 45667, 45666),
	(53, 45668, 45666),
	(54, 45671, 45664),
	(55, 45671, 45665),
	(56, 45671, 45666),
	(57, 45667, 45668),
	(58, 45667, 45668),
	(59, 45667, 45668),
	(60, 45667, 45668),
	(61, 45667, 45668),
	(62, 45668, 45669),
	(63, 45668, 45669),
	(64, 45668, 45669),
	(65, 45667, 45668),
	(66, 45668, 45669),
	(67, 45668, 45669),
	(68, 45668, 45669),
	(69, 45668, 45669),
	(70, 45668, 45669),
	(71, 45668, 45666),
	(72, 45668, 45666),
	(73, 45668, 45666),
	(74, 45668, 45667),
	(75, 45668, 45667),
	(76, 45668, 45667),
	(77, 45668, 45667),
	(78, 45668, 45667),
	(79, 45668, 45667),
	(80, 45668, 45669),
	(81, 45668, 45669),
	(82, 45668, 45666),
	(83, 45668, 45666),
	(84, 45668, 45666),
	(85, 45668, 45666),
	(86, 45668, 45667),
	(87, 45668, 45667),
	(88, 45667, 45668),
	(89, 45667, 45668),
	(90, 45667, 45668),
	(91, 45667, 45668),
	(92, 45667, 45668),
	(93, 45667, 45668),
	(94, 45667, 45668),
	(95, 45667, 45668),
	(96, 45667, 45668),
	(97, 45667, 45668),
	(98, 45667, 45668),
	(99, 45667, 45668),
	(100, 45667, 45668),
	(101, 45667, 45668),
	(102, 45667, 45668),
	(103, 45667, 45668),
	(104, 45667, 45668),
	(105, 45667, 12),
	(106, 45667, 12),
	(107, 45667, 45668),
	(108, 45667, 45668),
	(109, 45667, 45668),
	(110, 45668, 45669),
	(111, 45668, 45666),
	(344, 36929, 45587),
	(167, 45746, 45656),
	(270, 36929, 36929),
	(273, 36929, 45734),
	(176, 45745, 45745),
	(225, 45755, 45755),
	(299, 45758, 45758),
	(333, 36929, 145781),
	(163, 45746, 45665),
	(162, 45746, 45659),
	(178, 45745, 45746),
	(158, 45746, 45746),
	(166, 45746, 36929),
	(342, 145779, 45770),
	(209, 36929, 45754),
	(375, 145895, 145842),
	(329, 36929, 145778),
	(328, 36929, 145775),
	(325, 45770, 36929),
	(298, 45758, 45762),
	(324, 45771, 45770),
	(306, 45764, 45764),
	(307, 45765, 45765),
	(320, 45771, 45771),
	(318, 45769, 36929),
	(343, 145773, 145773),
	(345, 145794, 38043),
	(346, 45600, 45600),
	(372, 45600, 45734),
	(348, 145797, 36929),
	(349, 145797, 45587),
	(350, 145797, 45600),
	(351, 145797, 38043),
	(352, 145796, 145797),
	(353, 145796, 145796),
	(363, 38043, 38043),
	(366, 45769, 45769),
	(388, 145918, 145921),
	(373, 45734, 45734),
	(370, 145794, 145785),
	(374, 45734, 45600),
	(376, 145895, 145879),
	(378, 145801, 145882),
	(377, 145801, 145836),
	(380, 145801, 145842),
	(381, 145801, 145836),
	(382, 145801, 145801),
	(384, 145801, 45769),
	(385, 145801, 145772),
	(389, 145918, 145918),
	(390, 145918, 145844);
/*!40000 ALTER TABLE `users_favorites` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
