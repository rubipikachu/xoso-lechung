-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.0.51b-community-nt - MySQL Community Edition (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4073
-- Date/time:                    2014-07-29 02:33:15
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table xoso.album
DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `image_represent` varchar(255) default NULL,
  `link` varchar(50) default NULL,
  `status` int(11) default NULL,
  `created` int(11) default NULL,
  `tmp` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table xoso.album: 0 rows
/*!40000 ALTER TABLE `album` DISABLE KEYS */;
/*!40000 ALTER TABLE `album` ENABLE KEYS */;


-- Dumping structure for table xoso.albumdetail
DROP TABLE IF EXISTS `albumdetail`;
CREATE TABLE IF NOT EXISTS `albumdetail` (
  `id` int(11) NOT NULL auto_increment,
  `albumid` int(11) default NULL,
  `name` varchar(50) default NULL,
  `image` varchar(255) default NULL,
  `status` int(11) default NULL,
  `countvisited` int(11) default NULL,
  `create` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table xoso.albumdetail: ~0 rows (approximately)
/*!40000 ALTER TABLE `albumdetail` DISABLE KEYS */;
/*!40000 ALTER TABLE `albumdetail` ENABLE KEYS */;


-- Dumping structure for table xoso.calendar
DROP TABLE IF EXISTS `calendar`;
CREATE TABLE IF NOT EXISTS `calendar` (
  `id` int(10) NOT NULL auto_increment,
  `thu` varchar(200) default NULL,
  `nam` varchar(200) default NULL,
  `trung` varchar(200) default NULL,
  `bac` varchar(200) default NULL,
  PRIMARY KEY  (`id`),
  KEY `thu` (`thu`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table xoso.calendar: ~7 rows (approximately)
/*!40000 ALTER TABLE `calendar` DISABLE KEYS */;
INSERT INTO `calendar` (`id`, `thu`, `nam`, `trung`, `bac`) VALUES
	(1, 'Monday', '7,11,17', '35,40', '22'),
	(2, 'Tuesday', '2,3,20', '29,37', '25'),
	(3, 'Wednesday', '8,10,15', '28,32', '21'),
	(4, 'Thursday', '1,6,16', '27,36,39', '22'),
	(5, 'Friday', '4,18,19', '31,34', '23'),
	(6, 'Saturday', '5,12,14,17', '28,30,38', '24'),
	(7, 'Sunday', '9,13', '32,33', '26');
/*!40000 ALTER TABLE `calendar` ENABLE KEYS */;


-- Dumping structure for table xoso.category
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `type` int(2) NOT NULL COMMENT '0:uncate 1:post 2:product',
  `desc` mediumtext NOT NULL,
  `parentid` int(10) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table xoso.category: 1 rows
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`, `type`, `desc`, `parentid`) VALUES
	(1, 'Tin Tức Xổ Số', 1, '<p>Danh mục tin tức xổ số</p>\r\n', 0);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;


-- Dumping structure for table xoso.kqxs_bac
DROP TABLE IF EXISTS `kqxs_bac`;
CREATE TABLE IF NOT EXISTS `kqxs_bac` (
  `id` int(11) NOT NULL auto_increment,
  `date` varchar(50) NOT NULL,
  `provice` int(10) NOT NULL,
  `loaive` varchar(50) default NULL,
  `image` varchar(255) default NULL,
  `db` varchar(10) default NULL,
  `nhat` varchar(10) default NULL,
  `nhi1` varchar(10) default NULL,
  `nhi2` varchar(10) default NULL,
  `ba1` varchar(10) default NULL,
  `ba2` varchar(10) default NULL,
  `ba3` varchar(10) default NULL,
  `ba4` varchar(10) default NULL,
  `ba5` varchar(10) default NULL,
  `ba6` varchar(10) default NULL,
  `tu1` varchar(10) default NULL,
  `tu2` varchar(10) default NULL,
  `tu3` varchar(10) default NULL,
  `tu4` varchar(10) default NULL,
  `nam1` varchar(10) default NULL,
  `nam2` varchar(10) default NULL,
  `nam3` varchar(10) default NULL,
  `nam4` varchar(10) default NULL,
  `nam5` varchar(10) default NULL,
  `nam6` varchar(10) default NULL,
  `sau1` varchar(10) default NULL,
  `sau2` varchar(10) default NULL,
  `sau3` varchar(10) default NULL,
  `bay1` varchar(10) default NULL,
  `bay2` varchar(10) default NULL,
  `bay3` varchar(10) default NULL,
  `bay4` varchar(10) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `date_provice` (`date`,`provice`),
  KEY `provice` (`provice`),
  KEY `date` (`date`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table xoso.kqxs_bac: ~1 rows (approximately)
/*!40000 ALTER TABLE `kqxs_bac` DISABLE KEYS */;
INSERT INTO `kqxs_bac` (`id`, `date`, `provice`, `loaive`, `image`, `db`, `nhat`, `nhi1`, `nhi2`, `ba1`, `ba2`, `ba3`, `ba4`, `ba5`, `ba6`, `tu1`, `tu2`, `tu3`, `tu4`, `nam1`, `nam2`, `nam3`, `nam4`, `nam5`, `nam6`, `sau1`, `sau2`, `sau3`, `bay1`, `bay2`, `bay3`, `bay4`) VALUES
	(1, '28-07-2014', 22, NULL, 'upload/20140726/bt_22-07-2014.png', '32143', '77938', '78932', '80200', '2683', '98418', '17023', '59997', '4677', '75213', '9839', '8224', '5164', '3092', '193', '6889', '5329', '2499', '5318', '2850', '254', '07', '427', '12', '81', '04', '74');
/*!40000 ALTER TABLE `kqxs_bac` ENABLE KEYS */;


-- Dumping structure for table xoso.kqxs_nam
DROP TABLE IF EXISTS `kqxs_nam`;
CREATE TABLE IF NOT EXISTS `kqxs_nam` (
  `id` int(11) NOT NULL auto_increment,
  `date` varchar(50) default NULL,
  `provice` int(10) default NULL,
  `loaive` varchar(50) default NULL,
  `image` varchar(255) default NULL,
  `db` varchar(10) default NULL,
  `nhat` varchar(10) default NULL,
  `nhi` varchar(10) default NULL,
  `ba1` varchar(10) default NULL,
  `ba2` varchar(10) default NULL,
  `tu1` varchar(10) default NULL,
  `tu2` varchar(10) default NULL,
  `tu3` varchar(10) default NULL,
  `tu4` varchar(10) default NULL,
  `tu7` varchar(10) default NULL,
  `tu5` varchar(10) default NULL,
  `tu6` varchar(10) default NULL,
  `nam` varchar(10) default NULL,
  `sau1` varchar(10) default NULL,
  `sau2` varchar(10) default NULL,
  `sau3` varchar(10) default NULL,
  `bay` varchar(10) default NULL,
  `tam` varchar(10) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `date_provice` (`date`,`provice`),
  KEY `date` (`date`),
  KEY `provice` (`provice`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table xoso.kqxs_nam: ~4 rows (approximately)
/*!40000 ALTER TABLE `kqxs_nam` DISABLE KEYS */;
INSERT INTO `kqxs_nam` (`id`, `date`, `provice`, `loaive`, `image`, `db`, `nhat`, `nhi`, `ba1`, `ba2`, `tu1`, `tu2`, `tu3`, `tu4`, `tu7`, `tu5`, `tu6`, `nam`, `sau1`, `sau2`, `sau3`, `bay`, `tam`) VALUES
	(1, '28-07-2014', 7, NULL, '', '185860', '47889', '88113', '65503', '16759', '30566', '80183', '74052', '43785', '46838', '56152', '87145', '5048', '6754', '9233', '9676', '623', '33'),
	(2, '28-07-2014', 11, NULL, '', '831669', '38363', '16668', '11811', '11478', '29115', '96076', '36477', '68223', '84480', '73182', '90274', '3323', '6754', '4543', '9676', '992', '55'),
	(3, '26-07-2014', 14, NULL, '', '352255', '25398', '49723', '52889', '11478', '95364', '34158', '40686', '35786', '90891', '73182', '46762', '4517', '6754', '6754', '7237', '949', '20'),
	(6, '28-07-2014', 17, '7D7', '', '433526', '25398', '49723', '52889', '11478', '24780', '34158', '74052', '35786', '45820', '07178', '28293', '5048', '6754', '9233', '9676', '949', '20');
/*!40000 ALTER TABLE `kqxs_nam` ENABLE KEYS */;


-- Dumping structure for table xoso.kqxs_trung
DROP TABLE IF EXISTS `kqxs_trung`;
CREATE TABLE IF NOT EXISTS `kqxs_trung` (
  `id` int(11) NOT NULL auto_increment,
  `date` varchar(50) default NULL,
  `provice` int(10) default NULL,
  `loaive` varchar(50) default NULL,
  `image` varchar(255) default NULL,
  `db` varchar(10) default NULL,
  `nhat` varchar(10) default NULL,
  `nhi` varchar(10) default NULL,
  `ba1` varchar(10) default NULL,
  `ba2` varchar(10) default NULL,
  `tu1` varchar(10) default NULL,
  `tu2` varchar(10) default NULL,
  `tu3` varchar(10) default NULL,
  `tu4` varchar(10) default NULL,
  `tu7` varchar(10) default NULL,
  `tu5` varchar(10) default NULL,
  `tu6` varchar(10) default NULL,
  `nam` varchar(10) default NULL,
  `sau1` varchar(10) default NULL,
  `sau2` varchar(10) default NULL,
  `sau3` varchar(10) default NULL,
  `bay` varchar(10) default NULL,
  `tam` varchar(10) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `date_provice` (`date`,`provice`),
  KEY `date` (`date`),
  KEY `provice` (`provice`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table xoso.kqxs_trung: ~3 rows (approximately)
/*!40000 ALTER TABLE `kqxs_trung` DISABLE KEYS */;
INSERT INTO `kqxs_trung` (`id`, `date`, `provice`, `loaive`, `image`, `db`, `nhat`, `nhi`, `ba1`, `ba2`, `tu1`, `tu2`, `tu3`, `tu4`, `tu7`, `tu5`, `tu6`, `nam`, `sau1`, `sau2`, `sau3`, `bay`, `tam`) VALUES
	(1, '26-07-2014', 28, NULL, '', '352255', '25398', '49723', '52889', '11478', '95364', '34158', '40686', '35786', '90891', '73182', '46762', '4517', '6754', '6754', '7237', '949', '20'),
	(2, '28-07-2014', 35, NULL, '', '352255', '25398', '49723', '52889', '11478', '95364', '34158', '40686', '35786', '90891', '73182', '46762', '4517', '6754', '6754', '7237', '949', '20'),
	(3, '28-07-2014', 40, NULL, '', '352255', '25398', '49723', '52889', '11478', '95364', '34158', '40686', '35786', '90891', '73182', '46762', '4517', '6754', '6754', '7237', '949', '20');
/*!40000 ALTER TABLE `kqxs_trung` ENABLE KEYS */;


-- Dumping structure for table xoso.permission
DROP TABLE IF EXISTS `permission`;
CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `description` text,
  `module` varchar(100) default NULL,
  `controller` varchar(100) default NULL,
  `action` varchar(100) default NULL,
  `actived` tinyint(4) default '1',
  `created` bigint(20) default NULL,
  PRIMARY KEY  (`id`),
  KEY `module` (`module`),
  KEY `controller` (`controller`),
  KEY `action` (`action`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- Dumping data for table xoso.permission: ~22 rows (approximately)
/*!40000 ALTER TABLE `permission` DISABLE KEYS */;
INSERT INTO `permission` (`id`, `name`, `description`, `module`, `controller`, `action`, `actived`, `created`) VALUES
	(1, 'Đăng nhập', 'login', 'adminuser', 'DefaultController', 'login', 1, 1404748186),
	(2, 'Đăng ký', 'logout', 'adminuser', 'DefaultController', 'logout', 1, 1404748186),
	(3, 'DS người dùng', 'user management', 'adminuser', 'DefaultController', 'index', 1, 1404748186),
	(4, 'Dashboard', 'Dashboard', 'admincp', 'DashboardController', 'index', 1, 1404748186),
	(5, 'Xem user', 'View user', 'adminuser', 'DefaultController', 'viewuser', 1, 1404748186),
	(6, 'Thêm user', 'Add user', 'adminuser', 'DefaultController', 'adduser', 1, 1404748186),
	(7, 'Xóa user', 'Delete user', 'adminuser', 'DefaultController', 'deleteuser', 1, 1404748186),
	(8, 'Cập nhật user', 'Update user', 'adminuser', 'DefaultController', 'updateuser', 1, 1404748186),
	(9, 'Cấp quyền', 'Grand permission', 'adminuser', 'DefaultController', 'grandpermission', 1, 1404748186),
	(10, 'DS quyền', 'permission management', 'adminuser', 'DefaultController', 'permission', 1, 1404748186),
	(11, 'Xem quyền', 'view permission', 'adminuser', 'DefaultController', 'viewpermission', 1, 1404748186),
	(12, 'Thêm quyền', 'add permission', 'adminuser', 'DefaultController', 'createpermission', 1, 1404748186),
	(13, 'Cập nhật quyền', 'update permission', 'adminuser', 'DefaultController', 'updatepermission', 1, 1404748186),
	(14, 'Xóa quyền', 'delete permission', 'adminuser', 'DefaultController', 'deletepermission', 1, 1404877715),
	(15, 'DM bài viết', 'post category', 'adminpost', 'CategoryController', 'index', 1, 1404880245),
	(16, 'Thêm DM bài viết', 'add post category', 'adminpost', 'CategoryController', 'create', 1, 1404880245),
	(17, 'Xem DM bài viết', 'view post category', 'adminpost', 'CategoryController', 'view', 1, 1404889784),
	(18, 'cập nhật bài viết', 'update post category', 'adminpost', 'CategoryController', 'update', 1, 1404880245),
	(19, 'Danh sách bài viết', 'Danh sách bài viết', 'adminpost', 'DefaultController', 'index', 1, 1404913635),
	(20, 'cập nhật bài viết', 'cập nhật bài viết', 'adminpost', 'DefaultController', 'update', 1, 1404913635),
	(21, 'Thêm bài viết', 'Thêm bài viết', 'adminpost', 'DefaultController', 'create', 1, 1404913635),
	(22, 'xem bài viết', 'xem bài viết', 'adminpost', 'DefaultController', 'view', 1, 1404913635);
/*!40000 ALTER TABLE `permission` ENABLE KEYS */;


-- Dumping structure for table xoso.post
DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `catid` int(11) unsigned default '0',
  `title` varchar(255) NOT NULL default '',
  `introtext` mediumtext,
  `fulltext` longtext,
  `images` varchar(255) default NULL,
  `created` int(11) default '0',
  `modified` int(11) default '0',
  `status` tinyint(3) default '1',
  `hot` int(2) NOT NULL default '0',
  `new` int(2) NOT NULL default '0',
  `countvisited` int(11) NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `metadesc` tinytext,
  `metakeyword` tinytext,
  PRIMARY KEY  (`id`),
  KEY `status` (`status`),
  KEY `catid` (`catid`),
  KEY `hot` (`hot`),
  KEY `new` (`new`)
) ENGINE=MyISAM AUTO_INCREMENT=138 DEFAULT CHARSET=utf8;

-- Dumping data for table xoso.post: 1 rows
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id`, `catid`, `title`, `introtext`, `fulltext`, `images`, `created`, `modified`, `status`, `hot`, `new`, `countvisited`, `ordering`, `metadesc`, `metakeyword`) VALUES
	(137, 1, 'tiêu đề', '<p>m&ocirc; tả</p>\r\n', '<p>nội dung</p>\r\n', 'upload/20140714/1387770904-giam-beo-an-toan-don-tet-giap-ngo--1-.jpg', 0, 1405343960, 1, 0, 0, 0, 0, '', '');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;


-- Dumping structure for table xoso.tinh
DROP TABLE IF EXISTS `tinh`;
CREATE TABLE IF NOT EXISTS `tinh` (
  `id` int(10) NOT NULL auto_increment,
  `mien` int(10) NOT NULL COMMENT '1:nam 2:trung 3:bac',
  `tinh` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- Dumping data for table xoso.tinh: ~40 rows (approximately)
/*!40000 ALTER TABLE `tinh` DISABLE KEYS */;
INSERT INTO `tinh` (`id`, `mien`, `tinh`) VALUES
	(1, 1, 'Xổ Số An Giang'),
	(2, 1, 'Xổ Số Bạc Liêu'),
	(3, 1, 'Xổ Số Bến Tre'),
	(4, 1, 'Xổ Số Bình Dương'),
	(5, 1, 'Xổ Số Bình Phước'),
	(6, 1, 'Xổ Số Bình Thuận'),
	(7, 1, 'Xổ Số Cà Mau'),
	(8, 1, 'Xổ Số Cần Thơ'),
	(9, 1, 'Xổ Số Đà Lạt'),
	(10, 1, 'Xổ Số Đồng Nai'),
	(11, 1, 'Xổ Số Đồng Tháp'),
	(12, 1, 'Xổ Số Hậu Giang'),
	(13, 1, 'Xổ Số Kiên Giang'),
	(14, 1, 'Xổ Số Long An'),
	(15, 1, 'Xổ Số Sóc Trăng'),
	(16, 1, 'Xổ Số Tây Ninh'),
	(17, 1, 'Xổ Số TP HCM'),
	(18, 1, 'Xổ Số Trà Vinh'),
	(19, 1, 'Xổ Số Vĩnh Long'),
	(20, 1, 'Xổ Số Vũng Tàu'),
	(21, 3, 'Xổ Số Bắc Ninh'),
	(22, 3, 'Xổ Số Hà Nội'),
	(23, 3, 'Xổ Số Hải Phòng'),
	(24, 3, 'Xổ Số Nam Định'),
	(25, 3, 'Xổ Số Quảng Ninh'),
	(26, 3, 'Xổ Số Thái Bình'),
	(27, 2, 'Xổ Số Bình Định'),
	(28, 2, 'Xổ Số Đà Nẵng'),
	(29, 2, 'Xổ Số Đắk Lắk'),
	(30, 2, 'Xổ Số Đắk Nông'),
	(31, 2, 'Xổ Số Gia Lai'),
	(32, 2, 'Xổ Số Khánh Hòa'),
	(33, 2, 'Xổ Số Kon Tum'),
	(34, 2, 'Xổ Số Ninh Thuận'),
	(35, 2, 'Xổ Số Phú Yên'),
	(36, 2, 'Xổ Số Quảng Bình'),
	(37, 2, 'Xổ Số Quảng Nam'),
	(38, 2, 'Xổ Số Quảng Ngãi'),
	(39, 2, 'Xổ Số Quảng Trị'),
	(40, 2, 'Xổ Số Thừa T Huế');
/*!40000 ALTER TABLE `tinh` ENABLE KEYS */;


-- Dumping structure for table xoso.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL auto_increment,
  `level` int(2) default NULL COMMENT '1: user 2:admin',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) default NULL,
  `email` varchar(200) default NULL,
  `address` tinytext,
  `phone` varchar(50) default NULL,
  `sex` int(2) default NULL,
  `created` bigint(20) default NULL,
  `lastvisit` bigint(20) default NULL,
  `activation_code` varchar(50) default NULL,
  `actived` tinyint(4) default NULL,
  `note` tinytext,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `level` (`level`),
  KEY `email` (`email`),
  KEY `actived` (`actived`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table xoso.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `level`, `username`, `password`, `fullname`, `email`, `address`, `phone`, `sex`, `created`, `lastvisit`, `activation_code`, `actived`, `note`) VALUES
	(1, 2, 'admin', 'e03829689a9d837e678f0646d630322f:BVAgD2yc7FMkt', 'TONYLE', 'tonyle.microsoft@gmail.com', '999 Alexando, quận 1, TP Hồ Chí Minh', '0909 999 999', 1, 1404748186, 1404748186, 'BVAgD2yc7FMkt', 1, ''),
	(2, 2, 'admin1', '8f20a2ccda3e4c06a6b3e44e1a87e14f:1BturkNyhf9pA', 'tonyle', 'huonglx@fpt.com', '', '', NULL, 1404845123, 0, NULL, NULL, '');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table xoso.user_permissions
DROP TABLE IF EXISTS `user_permissions`;
CREATE TABLE IF NOT EXISTS `user_permissions` (
  `userid` bigint(20) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY  (`userid`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table xoso.user_permissions: ~26 rows (approximately)
/*!40000 ALTER TABLE `user_permissions` DISABLE KEYS */;
INSERT INTO `user_permissions` (`userid`, `permission_id`) VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(1, 4),
	(1, 5),
	(1, 6),
	(1, 7),
	(1, 8),
	(1, 9),
	(1, 10),
	(1, 11),
	(1, 12),
	(1, 13),
	(1, 14),
	(1, 15),
	(1, 16),
	(1, 17),
	(1, 18),
	(1, 19),
	(1, 20),
	(1, 21),
	(1, 22),
	(2, 1),
	(2, 2),
	(2, 3),
	(2, 4);
/*!40000 ALTER TABLE `user_permissions` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
