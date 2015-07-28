-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Host: db431572766.db.1and1.com
-- Generation Time: Jul 16, 2015 at 10:21 AM
-- Server version: 5.1.73-log
-- PHP Version: 5.4.41-0+deb7u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db431572766`
--

-- --------------------------------------------------------

--
-- Table structure for table `accidents`
--

CREATE TABLE IF NOT EXISTS `accidents` (
  `accident_id` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `truck_id` int(32) DEFAULT NULL,
  `company_id` int(32) DEFAULT NULL,
  `driver_id` int(32) DEFAULT NULL,
  `occured` date DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `notes` text,
  `photo` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`accident_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `accidents`
--

INSERT INTO `accidents` (`accident_id`, `truck_id`, `company_id`, `driver_id`, `occured`, `reference`, `notes`, `photo`, `date_created`) VALUES
(1, 10, 2, 11, '2012-02-10', '_REFERENCE_', 'sddsd', '', '2012-02-21 10:10:09'),
(2, 10, 2, 14, '2011-08-04', '6666', 'sddsd rere', '', '2012-08-23 06:12:10'),
(3, 10, 2, 12, '2007-03-05', '6767', 'this', '', '2012-01-28 07:38:33'),
(16, 10, 2, 15, '2000-10-24', 'opp', '<b>this is wen </b> ', '', '2012-08-18 23:18:55'),
(5, 10, 2, 17, '2011-06-18', '3443', 'sddsd', '', '2012-08-27 02:45:32'),
(10, 10, 2, 12, '0000-00-00', 'that is our God', 'jijk', '', '2012-08-21 05:49:17'),
(7, 10, 2, 16, '1998-02-18', '3443', 'sddsd', '', '2012-01-28 06:43:29'),
(8, 10, 2, 17, '2011-01-18', '35464', 'bad bad accident ', '', '2012-08-18 23:33:20'),
(39, 189, 0, 6, '0000-00-00', 'NOT SET', 'NOT SET', '', '2012-08-31 02:20:50'),
(12, 11, 2, 14, '2012-01-03', '3445', 'Bad accident', '', '2012-01-29 01:18:36'),
(17, 14, 2, 35, '2009-03-04', '345', 'very', '', '2012-02-20 03:49:35'),
(14, 10, 2, 37, '2012-01-01', '111', 'Accident on above date', '', '2012-02-01 19:46:00'),
(18, 16, 2, 11, '2007-03-03', '_REFERENCE_', 'dsd', '', '2012-03-21 06:29:27'),
(19, 11, 2, 13, '2009-03-05', '456', '', '', '2012-03-21 07:39:45'),
(21, 10, 2, 13, '2010-05-04', 'hhm', 'He was caught Drunk. bad', '', '2012-08-21 06:27:41'),
(22, 101, 2, 12, '2012-02-03', '76', '', '', '2012-06-30 22:46:53'),
(23, 78, 2, 11, '2012-03-06', '988090', 'this', '', '2012-07-16 01:14:51'),
(24, 15, 2, 11, '2011-02-03', '7676', '676', '', '2012-07-16 01:15:33'),
(38, 189, 0, 5, '0000-00-00', '0yy', '0 ', '', '2012-08-31 02:20:40'),
(25, 0, 0, 0, '0000-00-00', 'jhjhjjj', 'ggggggggg', '', '2012-08-18 23:43:22'),
(26, 0, 0, 0, '0000-00-00', 'asasd', 'aeasdsasd', '', '2012-08-18 23:45:30'),
(40, 10, 0, 1, '2011-02-01', '5433', 'thiu', '', '2012-09-05 02:15:58'),
(29, 67, 0, 6, '0000-00-00', '345', '34343', '', '2012-08-19 23:51:38'),
(30, 67, 0, 6, '0000-00-00', 'ghgh77', 'david', '', '2012-08-19 23:52:34'),
(37, 189, 0, 2, '0000-00-00', '0', '0', '', '2012-08-31 02:11:59'),
(33, 10, 0, 38, '2008-06-11', '44566', 'This id', '', '2012-08-21 06:05:03'),
(34, 2, 0, 7, '2009-05-07', 'tytyt', 'tytyy ', '', '2012-08-23 03:19:43'),
(35, 169, 0, 7, '2004-06-15', '', 'THIS', '', '2012-08-23 08:42:28'),
(36, 10, 0, 38, '1996-02-18', '44449', '4444 33', '', '2012-09-05 02:20:44'),
(41, 10, 0, 17, '2011-02-05', '67', 'ghg', '', '2012-09-05 02:19:01'),
(42, 178, 0, 2, '0000-00-00', 'sdafsa', 'safadsfasfs', '', '2012-09-11 06:37:42'),
(43, 201, 4, 17, '2012-02-02', '66', 'erer 666', '', '2012-09-11 10:23:56'),
(44, 205, 7, 28, '2011-02-02', '43565', 'Bad so find', '1352187981.jpg', '2012-11-06 09:46:21'),
(46, 199, 1, 3, '2006-02-03', 'mml l', 'klm', '1352216204.jpg', '2012-11-06 15:36:44'),
(47, 213, 1, 34, '2008-01-02', 'SDF434', 'Overspeeding', '1352380034.jpg', '2012-11-08 13:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `audittrail`
--

CREATE TABLE IF NOT EXISTS `audittrail` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `CompanyID` bigint(20) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Loggedin` varchar(10) NOT NULL,
  `DateIn` varchar(50) NOT NULL,
  `Level` varchar(50) NOT NULL,
  `IPAddress` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=169 ;

--
-- Dumping data for table `audittrail`
--

INSERT INTO `audittrail` (`ID`, `CompanyID`, `Username`, `Loggedin`, `DateIn`, `Level`, `IPAddress`) VALUES
(5, 1, 'AC_tnet', 'FALSE', '2012-11-14 05:00:16', 'Administrator', '196.0.21.52'),
(6, 1, 'AC_tnet', 'TRUE', '2012-11-14 05:01:25', 'Administrator', '196.0.21.52'),
(7, 1, 'nattie', 'TRUE', '2012-11-14 05:06:53', 'Data Entry', '196.0.21.52'),
(8, 15, 'AC_rexpress', 'TRUE', '2012-11-14 05:07:52', 'Administrator', '196.0.21.52'),
(9, 1, 'AC_tnet', 'TRUE', '2012-11-15 08:17:00', 'Administrator', '196.0.21.52'),
(10, 1, 'AC_tnet', 'TRUE', '2012-11-16 03:21:30', 'Administrator', '196.0.21.52'),
(12, 1, 'AC_tnet', 'TRUE', '2012-11-21 07:56:58', 'Administrator', '196.0.21.52'),
(13, 1, 'AC_tnet', 'TRUE', '2012-11-21 08:12:16', 'Administrator', '196.0.21.52'),
(14, 1, 'nattie', 'TRUE', '2012-11-27 02:08:06', 'Data Entry', '196.0.21.52'),
(15, 1, 'AC_tnet', 'TRUE', '2012-11-27 02:09:21', 'Administrator', '196.0.21.52'),
(16, 18, 'omar', 'TRUE', '2012-11-27 02:14:16', 'Administrator', '196.0.21.52'),
(17, 0, 'admin', 'FALSE', '2012-11-28 00:18:23', 'Data Entry', '41.202.240.13'),
(18, 0, 'admin', 'FALSE', '2012-11-28 00:18:56', 'Data Entry', '41.202.240.13'),
(19, 0, 'admin', 'FALSE', '2012-11-28 00:19:16', 'Data Entry', '41.202.240.13'),
(20, 15, 'AC_rexpress', 'TRUE', '2012-11-29 01:58:25', 'Administrator', '196.0.21.52'),
(21, 1, 'AC_tnet', 'TRUE', '2012-11-29 02:40:06', 'Administrator', '196.0.21.52'),
(22, 1, 'AC_tnet', 'TRUE', '2012-11-30 04:03:56', 'Administrator', '196.0.21.52'),
(23, 1, 'AC_tnet', 'TRUE', '2012-12-05 01:25:25', 'Administrator', '196.0.21.52'),
(24, 1, 'AC_tnet', 'TRUE', '2012-12-06 03:55:02', 'Administrator', '196.0.21.52'),
(25, 15, 'AC_rexpress', 'TRUE', '2012-12-06 12:20:47', 'Administrator', '196.0.21.52'),
(26, 0, 'AC_tnet', 'FALSE', '2012-12-10 01:18:17', 'Data Entry', '196.0.21.52'),
(27, 1, 'AC_tnet', 'TRUE', '2012-12-10 01:18:29', 'Administrator', '196.0.21.52'),
(28, 15, 'AC_rexpress', 'TRUE', '2012-12-10 10:26:06', 'Administrator', '196.0.21.52'),
(29, 1, 'nattie', 'TRUE', '2012-12-11 04:39:37', 'Data Entry', '196.0.21.52'),
(30, 1, 'AC_tnet', 'TRUE', '2012-12-11 04:44:55', 'Administrator', '196.0.21.52'),
(31, 15, 'AC_rexpress', 'TRUE', '2012-12-13 07:50:24', 'Administrator', '196.0.21.52'),
(32, 1, 'AC_tnet', 'TRUE', '2013-01-07 03:31:53', 'Administrator', '196.0.21.52'),
(33, 1, 'AC_tnet', 'TRUE', '2013-01-07 03:47:14', 'Administrator', '196.0.21.52'),
(34, 0, 'AC4352672', 'FALSE', '2013-01-08 06:04:01', 'Data Entry', '196.0.21.52'),
(35, 15, 'AC_rexpress', 'TRUE', '2013-01-08 06:04:17', 'Administrator', '196.0.21.52'),
(36, 1, 'AC_tnet', 'TRUE', '2013-01-24 05:49:37', 'Administrator', '196.0.21.52'),
(37, 1, 'AC_tnet', 'TRUE', '2013-01-24 06:04:53', 'Administrator', '196.0.21.52'),
(38, 0, 'admin', 'FALSE', '2013-01-24 07:02:52', 'Data Entry', '196.0.21.52'),
(39, 0, 'admin', 'FALSE', '2013-01-24 07:03:07', 'Data Entry', '196.0.21.52'),
(40, 20, 'AC_j', 'TRUE', '2013-02-08 07:46:30', 'Administrator', '41.190.198.182'),
(41, 0, 'AC-tnet', 'FALSE', '2013-02-20 00:35:36', 'Data Entry', '196.0.21.52'),
(42, 1, 'AC_tnet', 'TRUE', '2013-02-20 00:37:43', 'Administrator', '196.0.21.52'),
(43, 15, 'AC_rexpress', 'TRUE', '2013-02-22 02:56:32', 'Administrator', '196.0.21.52'),
(44, 0, '', 'FALSE', '2013-02-26 14:50:46', 'Data Entry', '173.199.116.235'),
(45, 0, '', 'FALSE', '2013-03-02 03:21:15', 'Data Entry', '173.199.115.163'),
(46, 0, '', 'FALSE', '2013-03-04 11:36:07', 'Data Entry', '173.199.115.171'),
(47, 0, '', 'FALSE', '2013-03-09 03:11:50', 'Data Entry', '173.199.120.107'),
(48, 0, '', 'FALSE', '2013-03-10 21:55:19', 'Data Entry', '173.199.120.91'),
(49, 0, '', 'FALSE', '2013-03-13 06:38:50', 'Data Entry', '173.199.114.219'),
(50, 0, '', 'FALSE', '2013-03-17 13:21:23', 'Data Entry', '173.199.119.35'),
(51, 0, '', 'FALSE', '2013-03-18 01:30:44', 'Data Entry', '173.199.120.99'),
(52, 15, 'AC_rexpress', 'TRUE', '2013-03-28 13:25:37', 'Administrator', '196.0.21.52'),
(53, 0, '', 'FALSE', '2013-04-01 14:43:36', 'Data Entry', '173.199.117.243'),
(54, 1, 'AC_tnet', 'TRUE', '2013-04-09 09:53:50', 'Administrator', '196.0.21.52'),
(55, 0, 'omar', 'FALSE', '2013-04-09 09:55:10', 'Data Entry', '196.0.21.52'),
(56, 18, 'omar', 'TRUE', '2013-04-09 09:55:24', 'Administrator', '196.0.21.52'),
(57, 18, 'omar', 'TRUE', '2013-04-09 09:57:57', 'Administrator', '196.0.21.52'),
(58, 0, '', 'FALSE', '2013-04-16 01:37:20', 'Data Entry', '173.199.115.35'),
(59, 0, 'nwiblo', 'FALSE', '2013-04-19 09:55:50', 'Data Entry', '37.221.174.111'),
(60, 0, '', 'FALSE', '2013-04-21 10:55:34', 'Data Entry', '173.199.120.83'),
(61, 0, '', 'FALSE', '2013-04-30 15:53:11', 'Data Entry', '173.199.119.43'),
(62, 0, '', 'FALSE', '2013-05-18 16:57:44', 'Data Entry', '173.199.116.59'),
(63, 0, '', 'FALSE', '2013-05-23 14:05:29', 'Data Entry', '173.199.115.131'),
(64, 0, '', 'FALSE', '2013-05-26 19:37:39', 'Data Entry', '173.199.115.35'),
(65, 1, 'AC_tnet', 'TRUE', '2013-05-29 09:19:18', 'Administrator', '41.202.240.6'),
(66, 0, '', 'FALSE', '2013-05-29 09:36:24', 'Data Entry', '173.199.115.75'),
(67, 0, 'Ac-tnet', 'FALSE', '2013-05-31 02:24:34', 'Data Entry', '196.0.21.52'),
(68, 0, 'AC-tnet', 'FALSE', '2013-05-31 02:25:15', 'Data Entry', '196.0.21.52'),
(69, 0, 'ac-tnet', 'FALSE', '2013-05-31 02:26:01', 'Data Entry', '196.0.21.52'),
(70, 1, 'AC_tnet', 'TRUE', '2013-05-31 02:27:26', 'Administrator', '196.0.21.52'),
(71, 1, 'AC_tnet', 'TRUE', '2013-05-31 02:47:06', 'Administrator', '196.0.21.52'),
(72, 1, 'AC_tnet', 'TRUE', '2013-05-31 02:47:13', 'Administrator', '196.0.21.52'),
(73, 1, 'AC_tnet', 'TRUE', '2013-05-31 03:07:13', 'Administrator', '196.0.21.52'),
(74, 1, 'AC_tnet', 'TRUE', '2013-05-31 03:23:22', 'Administrator', '196.0.21.52'),
(75, 1, 'AC_tnet', 'TRUE', '2013-05-31 03:31:37', 'Administrator', '196.0.21.52'),
(76, 1, 'AC_tnet', 'TRUE', '2013-05-31 04:19:50', 'Administrator', '196.0.21.52'),
(77, 1, 'AC_tnet', 'TRUE', '2013-05-31 05:15:15', 'Administrator', '196.0.21.52'),
(78, 1, 'AC_tnet', 'TRUE', '2013-05-31 07:17:02', 'Administrator', '196.43.132.123'),
(79, 1, 'AC_tnet', 'TRUE', '2013-05-31 07:56:23', 'Administrator', '196.43.132.123'),
(80, 0, '', 'FALSE', '2013-05-31 21:33:03', 'Data Entry', '208.167.230.11'),
(81, 0, 'AC_tnet', 'FALSE', '2013-06-02 18:54:25', 'Data Entry', '41.202.233.190'),
(82, 1, 'AC_tnet', 'TRUE', '2013-06-02 18:55:06', 'Administrator', '41.202.233.190'),
(83, 1, 'AC_tnet', 'TRUE', '2013-06-04 03:07:30', 'Administrator', '196.0.21.52'),
(84, 1, 'AC_tnet', 'TRUE', '2013-06-04 04:09:41', 'Administrator', '196.0.21.52'),
(85, 1, 'AC_tnet', 'TRUE', '2013-06-05 01:11:19', 'Administrator', '212.88.118.190'),
(86, 1, 'AC_tnet', 'TRUE', '2013-06-05 02:40:43', 'Administrator', '196.0.21.52'),
(87, 1, 'AC_tnet', 'TRUE', '2013-06-05 02:47:35', 'Administrator', '196.0.21.52'),
(88, 1, 'AC_tnet', 'TRUE', '2013-06-05 03:08:18', 'Administrator', '196.0.21.52'),
(89, 0, 'AC_tnet', 'FALSE', '2013-06-05 05:08:48', 'Data Entry', '212.88.118.190'),
(90, 1, 'AC_tnet', 'TRUE', '2013-06-05 05:12:24', 'Administrator', '212.88.118.190'),
(91, 0, '', 'FALSE', '2013-06-05 19:57:57', 'Data Entry', '173.199.116.211'),
(92, 1, 'AC_tnet', 'TRUE', '2013-06-14 03:59:20', 'Administrator', '196.0.21.52'),
(93, 1, 'AC_tnet', 'TRUE', '2013-06-14 05:08:55', 'Administrator', '196.0.21.52'),
(94, 1, 'AC_tnet', 'TRUE', '2013-06-17 04:10:02', 'Administrator', '196.0.21.52'),
(95, 1, 'AC_tnet', 'TRUE', '2013-06-17 05:08:39', 'Administrator', '196.0.21.52'),
(96, 0, '', 'FALSE', '2013-06-19 05:39:06', 'Data Entry', '173.199.115.91'),
(97, 1, 'AC_tnet', 'TRUE', '2013-06-21 03:11:55', 'Administrator', '196.0.21.52'),
(98, 1, 'AC_tnet', 'TRUE', '2013-06-21 03:53:17', 'Administrator', '196.0.21.52'),
(99, 0, '', 'FALSE', '2013-06-27 18:05:12', 'Data Entry', '173.199.116.179'),
(100, 0, '', 'FALSE', '2013-07-01 20:14:58', 'Data Entry', '173.199.115.91'),
(101, 0, '', 'FALSE', '2013-07-04 00:58:05', 'Data Entry', '173.199.119.147'),
(102, 0, '', 'FALSE', '2013-07-09 15:28:43', 'Data Entry', '173.199.116.91'),
(103, 0, '', 'FALSE', '2013-07-12 14:59:56', 'Data Entry', '208.167.230.27'),
(104, 0, 'AC_tnet', 'FALSE', '2013-07-18 05:30:52', 'Data Entry', '41.190.200.201'),
(105, 0, 'Ac_tnet', 'FALSE', '2013-07-18 05:31:11', 'Data Entry', '41.190.200.201'),
(106, 1, 'AC_tnet', 'TRUE', '2013-07-18 05:43:03', 'Administrator', '41.190.200.201'),
(107, 1, 'AC_tnet', 'TRUE', '2013-07-18 06:37:27', 'Administrator', '41.190.200.201'),
(108, 1, 'AC_tnet', 'TRUE', '2013-07-18 08:11:11', 'Administrator', '41.190.200.201'),
(109, 0, 'AC_tnet', 'FALSE', '2013-07-23 05:07:58', 'Data Entry', '41.190.198.181'),
(110, 1, 'AC_tnet', 'TRUE', '2013-07-23 05:08:37', 'Administrator', '41.190.198.181'),
(111, 0, '', 'FALSE', '2013-07-25 00:51:04', 'Data Entry', '173.199.116.171'),
(112, 1, 'AC_tnet', 'TRUE', '2013-07-25 07:09:13', 'Administrator', '41.190.200.230'),
(113, 0, '', 'FALSE', '2013-07-29 04:21:09', 'Data Entry', '173.199.115.187'),
(114, 18, 'omar', 'TRUE', '2013-09-09 04:25:21', 'Administrator', '41.190.196.225'),
(115, 0, 'AC_tnet', 'FALSE', '2013-09-19 03:08:45', 'Data Entry', '41.190.198.88'),
(116, 1, 'AC_tnet', 'TRUE', '2013-09-19 03:08:54', 'Administrator', '41.190.198.88'),
(117, 18, 'omar', 'TRUE', '2013-09-19 03:10:39', 'Administrator', '41.190.198.88'),
(118, 1, 'AC_tnet', 'TRUE', '2013-09-19 03:23:34', 'Administrator', '41.190.198.88'),
(119, 18, 'omar', 'TRUE', '2013-09-19 03:24:17', 'Administrator', '41.190.198.88'),
(120, 18, 'omar', 'TRUE', '2013-09-19 03:35:31', 'Administrator', '41.190.198.88'),
(121, 0, 'Omar', 'FALSE', '2013-09-19 06:02:02', 'Data Entry', '41.190.198.88'),
(122, 0, 'omar', 'FALSE', '2013-09-19 06:03:13', 'Data Entry', '41.190.198.88'),
(123, 0, 'omar', 'FALSE', '2013-09-19 06:29:30', 'Data Entry', '41.190.198.88'),
(124, 0, 'omar', 'FALSE', '2013-09-19 08:05:57', 'Data Entry', '41.190.198.88'),
(125, 0, 'admin', 'FALSE', '2013-09-19 08:13:48', 'Data Entry', '41.190.198.88'),
(126, 18, 'omar', 'TRUE', '2013-09-20 02:01:19', 'Administrator', '41.190.200.73'),
(129, 18, 'omar', 'TRUE', '2013-09-30 04:16:25', 'Administrator', '41.202.233.184'),
(130, 0, 'mgtoyv', 'FALSE', '2014-02-16 20:13:41', 'Data Entry', '216.152.251.72'),
(131, 0, 'vwdjwcqd', 'FALSE', '2014-06-27 16:29:43', 'Data Entry', '162.244.13.18'),
(132, 0, '', 'FALSE', '2014-09-06 19:52:40', 'Data Entry', '88.198.160.52'),
(133, 0, 'ywwnythmt', 'FALSE', '2014-10-01 10:24:59', 'Data Entry', '193.150.120.16'),
(134, 0, '', 'FALSE', '2014-10-24 03:19:01', 'Data Entry', '212.224.119.140'),
(135, 0, '', 'FALSE', '2014-12-23 18:55:40', 'Data Entry', '212.224.119.183'),
(136, 0, '', 'FALSE', '2015-01-07 01:42:43', 'Data Entry', '88.198.247.167'),
(137, 0, 'luidji', 'FALSE', '2015-01-10 10:14:11', 'Data Entry', '62.210.167.213'),
(138, 18, 'omar', 'TRUE', '2015-01-22 06:34:36', 'Administrator', '197.239.1.74'),
(139, 0, 'moverr@gmail.com', 'FALSE', '2015-02-01 01:53:54', 'Data Entry', '41.138.212.38'),
(140, 0, '', 'FALSE', '2015-02-05 01:24:41', 'Data Entry', '212.224.119.142'),
(141, 0, '', 'FALSE', '2015-02-17 14:35:30', 'Data Entry', '46.229.164.113'),
(142, 0, 'admin', 'FALSE', '2015-03-24 12:37:46', 'Data Entry', '154.73.12.88'),
(143, 0, 'Admin', 'FALSE', '2015-03-24 12:37:53', 'Data Entry', '154.73.12.88'),
(144, 15, 'AC_rexpress', 'TRUE', '2015-05-11 07:58:57', 'Administrator', '41.210.154.89'),
(145, 15, 'AC_rexpress', 'TRUE', '2015-05-18 09:06:28', 'Administrator', '41.210.159.43'),
(146, 15, 'AC_rexpress', 'TRUE', '2015-05-18 09:06:30', 'Administrator', '41.210.159.43'),
(147, 0, 'Mabledage', 'FALSE', '2015-06-09 12:40:19', 'Data Entry', '46.161.59.33'),
(148, 0, 'Mabledage', 'FALSE', '2015-06-13 16:10:03', 'Data Entry', '91.200.81.189'),
(149, 0, 'Mabledage', 'FALSE', '2015-06-17 04:59:51', 'Data Entry', '5.189.203.102'),
(150, 0, 'Mabledage', 'FALSE', '2015-06-22 02:34:27', 'Data Entry', '46.161.63.35'),
(151, 0, 'r_express', 'FALSE', '2015-06-29 02:27:20', 'Data Entry', '154.73.12.85'),
(152, 15, 'AC_rexpress', 'TRUE', '2015-06-29 02:38:36', 'Administrator', '154.73.12.85'),
(153, 15, 'AC_rexpress', 'TRUE', '2015-06-29 05:02:22', 'Administrator', '154.73.12.85'),
(154, 15, 'AC_rexpress', 'TRUE', '2015-06-29 06:24:25', 'Administrator', '154.73.12.85'),
(155, 15, 'AC_rexpress', 'TRUE', '2015-06-29 06:27:22', 'Administrator', '154.73.12.85'),
(156, 15, 'AC_rexpress', 'TRUE', '2015-06-29 07:57:47', 'Administrator', '154.73.12.85'),
(157, 15, 'AC_rexpress', 'TRUE', '2015-06-30 05:21:02', 'Administrator', '154.73.12.66'),
(158, 0, '', 'FALSE', '2015-06-30 12:20:42', 'Data Entry', '46.229.164.102'),
(159, 15, 'AC_rexpress', 'TRUE', '2015-07-06 05:54:59', 'Administrator', '154.73.15.63'),
(160, 15, 'AC_rexpress', 'TRUE', '2015-07-06 06:51:05', 'Administrator', '154.73.15.63'),
(161, 15, 'AC_rexpress', 'TRUE', '2015-07-08 05:35:49', 'Administrator', '154.73.12.78'),
(162, 15, 'AC_rexpress', 'TRUE', '2015-07-08 07:09:59', 'Administrator', '154.73.12.123'),
(163, 15, 'AC_rexpress', 'TRUE', '2015-07-09 09:01:12', 'Administrator', '154.73.12.76'),
(164, 15, 'AC_rexpress', 'TRUE', '2015-07-09 09:17:23', 'Administrator', '154.73.12.76'),
(165, 0, '', 'FALSE', '2015-07-12 17:56:10', 'Data Entry', '151.80.31.150'),
(166, 15, 'AC_rexpress', 'TRUE', '2015-07-14 08:06:48', 'Administrator', '154.73.15.47'),
(167, 15, 'AC_rexpress', 'TRUE', '2015-07-16 10:05:31', 'Administrator', '154.73.12.115'),
(168, 15, 'AC_rexpress', 'TRUE', '2015-07-16 11:13:02', 'Administrator', '154.73.12.115');

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE IF NOT EXISTS `bids` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `CompanyID` bigint(20) NOT NULL,
  `BidOwner` bigint(20) NOT NULL,
  `JobID` bigint(20) NOT NULL,
  `BidAmount` varchar(20) NOT NULL,
  `Details` text NOT NULL,
  `DateIn` varchar(20) NOT NULL,
  `Receipt` varchar(100) NOT NULL,
  `Response` text,
  `BidWinner` enum('Bid winner','Loser','Pending') NOT NULL DEFAULT 'Pending',
  `ResponseDate` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`ID`, `CompanyID`, `BidOwner`, `JobID`, `BidAmount`, `Details`, `DateIn`, `Receipt`, `Response`, `BidWinner`, `ResponseDate`) VALUES
(1, 5, 1, 5, '1700000', 'ssadgfdsghsdfgsdfgdfs                        	\r\n                        ', '2012-10-18 18:39:17', 'Transportation_of_medical_equipmentd22d8ce7c455b51be23eb2809728b384.pdf', 'Presentable company profile and cost effective.', 'Bid winner', '2012-10-25 10:16:30'),
(2, 4, 1, 5, '2000000', 'gdsgasdfadsfasfasdf                        	\r\n                        ', '2012-10-18 18:40:11', 'Transportation_of_medical_equipmenta15cb5b7414a814bb5f11b9c930c1920.pdf', 'Lost bid', 'Loser', '2012-10-25 10:16:30'),
(6, 2, 1, 8, '3000000', 'We have done lots of such work.                        	\r\n                        ', '2012-10-29 10:22:38', 'Transportation_of_cargo_container4140da1b8c664178419904c1bede7e46.xps', 'Lost bid', 'Loser', '2012-11-01 08:33:17'),
(7, 10, 1, 8, '200 000 000', 'Give me that Job or your life ends NOW!!!                	\r\n                        ', '2012-10-31 00:47:59', 'Transportation_of_cargo_containerc9cd9ebc359810c9c28dd869bd6394e0.txt', 'Lower chage', 'Bid winner', '2012-11-01 08:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `bid_requests`
--

CREATE TABLE IF NOT EXISTS `bid_requests` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `DateIn` varchar(20) NOT NULL,
  `CompanyID` bigint(20) NOT NULL,
  `CargoID` bigint(20) DEFAULT NULL,
  `JobTitle` varchar(255) NOT NULL,
  `BidSecurity` varchar(50) NOT NULL,
  `CloseDate` varchar(20) NOT NULL,
  `PickDate` varchar(20) NOT NULL,
  `DeliveryDate` varchar(20) NOT NULL,
  `CPPrefix` varchar(20) NOT NULL,
  `CPFname` varchar(40) NOT NULL,
  `CPLname` varchar(40) NOT NULL,
  `CPTitle` varchar(40) NOT NULL,
  `CPTel` varchar(20) NOT NULL,
  `SpecialRequirements` text NOT NULL,
  `Status` enum('Open','Closed') NOT NULL DEFAULT 'Open',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `bid_requests`
--

INSERT INTO `bid_requests` (`ID`, `DateIn`, `CompanyID`, `CargoID`, `JobTitle`, `BidSecurity`, `CloseDate`, `PickDate`, `DeliveryDate`, `CPPrefix`, `CPFname`, `CPLname`, `CPTitle`, `CPTel`, `SpecialRequirements`, `Status`) VALUES
(2, '2012-10-17 14:42:53', 2, 30, 'Transporation of the assigned goods to Kampala', '1000000', '10 November, 2012', '15 November, 2012', '22 November, 2012', 'Miss.', 'Doreen', 'Akanjuna', 'Administrator', '+256754234433', 'Delivery must be on the time given.', 'Open'),
(3, '2012-10-17 14:44:20', 2, 31, 'Transporation of valuable goods to Kampala', '1200000', '31 October, 2012', '2 November, 2012', '9 November, 2012', 'Mr.', 'Abraham', 'T Bens', 'Director', '+256757262171', 'Handle with maximum care and drive carefully.', 'Open'),
(4, '2012-10-17 16:46:16', 1, 29, 'Transit of goods to Kampala', '2000000', '31 October, 2012', '5 November, 2012', '12 November, 2012', 'Mr.', 'Abraham', 'Bens', 'Director', '+256757262171', 'Special care of the goods wanted.', 'Open'),
(5, '2012-10-18 16:48:38', 1, 24, 'Transportation of medical equipment', '500000', '30 October, 2012', '2 November, 2012', '4 November, 2012', 'Mr.', 'Yoram', 'Yamanya', 'Lab technician', '+256708490555', 'No exposure to heat and delicate handling required.', 'Closed'),
(8, '2012-10-29 09:38:28', 1, NULL, 'Transportation of cargo container', '1000000', '1 November, 2012', '5 November, 2012', '7 November, 2012', 'Mr.', 'Abson', 'Agaba', 'Technician', '+256779098987', 'Needs a quick and delicate handled delivery.', 'Closed'),
(9, '2015-07-06 07:11:04', 15, NULL, 'driver', 'laptop', '9 July, 2015', '9 July, 2015', '24 July, 2015', 'mr', 'samuel', 'andrew', 'agent', '+256784474481', 'very fragile cargo', 'Open'),
(10, '2015-07-06 07:13:51', 15, NULL, 'acrav', 'pills', '7 July, 2015', '9 July, 2015', '17 July, 2015', 'dr', 'samuel', 'andrewz', 'agent', '+2567844474481', 'ljasbdljsabfljabljfabsl', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `DateIn` varchar(20) NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `Lastname` varchar(30) NOT NULL,
  `Username` varchar(50) NOT NULL DEFAULT '0',
  `Password` varchar(50) NOT NULL DEFAULT '0',
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Roles` text NOT NULL,
  `Status` set('1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`ID`, `DateIn`, `Firstname`, `Lastname`, `Username`, `Password`, `Name`, `Email`, `Roles`, `Status`) VALUES
(1, '2012-08-13 22:26:13', 'Abraham', 'Taremwa', 'AC_tnet', 'ac72124977f949c824da18008e6098e3', 'Tab Net Media', 'tabnetmedia@gmail.com', 'Submit work for sub-contractors,Bid for work,Fleet Management,Emergency Assistance,Advertise', '2'),
(2, '2012-08-29 10:26:36', 'John', 'Mujuni', 'AC_mltd', '4124bc0a9335c27f086f24ba207a4912', 'Maj-Indocom Ltd', 'taremwaabraham@gmail.com', 'Submit work for sub-contractors,Bid for work,Fleet Management,Emergency Assistance,Advertise', '2'),
(4, '2012-09-11 11:59:26', 'Buwembo', 'David', 'AC_pinvestments', '4124bc0a9335c27f086f24ba207a4912', 'PHIONABATANZI INVESTMENTS', 'buwian12@gmail.com', 'Submit work for sub-contractors,Bid for work,Fleet Management,Emergency Assistance,Advertise', '2'),
(5, '2012-09-11 16:15:46', 'Victor', 'Otim', 'AC_o', '26f729e0c08972ee8c0ad4cbdc29e447', 'Otim12', 'Otim@gmail.com', 'Submit work for sub-contractors,Bid for work,Fleet Management,Emergency Assistance,Advertise', '2'),
(8, '2012-09-12 05:21:58', 'Ash', 'Luwambo', 'AC_a', '99b70ff26fe75eea78b1927958c52dd0', 'ASHCOM', 'aluwambo@gmail.com', 'Submit work for sub-contractors,Bid for work,Fleet Management,,', '2'),
(9, '2012-09-12 06:43:24', 'Victor', 'Otim', 'AC_sentertainment', '79b27a9f3559d019e9550d488eb87407', 'SILO Entertainment', 'sirotim@gmail.com', 'Submit work for sub-contractors,Bid for work,,,', '2'),
(10, '2012-09-12 06:59:25', 'Buwembo', 'David', 'david', '6b4d2d29271e81eba5f86a5b7bf918b7', 'NABATANZIPHIPHI INVEST', 'buwian12@gmail.com', 'Submit work for sub-contractors,Bid for work,Fleet Management,Emergency Assistance,Advertise', '2'),
(11, '2012-09-12 07:42:24', 'Natalie', 'Basemera', 'AC_n', 'c2059ba3804d93e89a0899ec8165be22', 'Nat', 'nbasemera@gmail.com', ',,Fleet Management,,', '2'),
(14, '2012-09-15 01:40:42', 'MUKHWANA', 'LUKA', 'AC_euganda', '9762d7a7cfcceb273ec5436e681a6530', 'EPSILON UGANDA LIMITED', 'LUKAMUKHWANA@EPSILON.CO.UG', ',,Fleet Management,,', '2'),
(15, '2012-09-21 07:58:46', 'Ramadhan', 'Ismael', 'AC_rexpress', '02dc8a6f8a1a990afc7a1164865dc59d', 'Rays Express Limted', 'kuboismael@gmail.com', ',,Fleet Management,,', '2'),
(17, '2012-09-24 09:36:11', 'kenneth', 'wamanga', 'AC_wtailers', 'd271c9241aff8bbc70cbc0f1f72cd006', 'wangle tailers uganda ltd', 'kennethwamanga@wangle.co.ug', ',,Fleet Management,,', '2'),
(18, '2012-09-26 00:53:57', 'Omar', 'Mayanja', 'omar', 'aab462671b59e0a7b3ab16b7b581a352', 'GlobeTrotters', 'globetrotten12@gmail.com', 'Submit work for sub-contractors,Bid for work,Fleet Management,Emergency Assistance,Advertise', '2'),
(19, '2012-10-02 06:45:34', 'Omar', 'Mayanja', 'AC_a', '2f3d86c1bbae7a35417859ff618d3e10', 'Amtullah', 'omarmayanja@gmail.com', 'Submit work for sub-contractors,Bid for work,Fleet Management,Emergency Assistance,Advertise', '2'),
(20, '2013-02-08 07:11:04', 'Peter', 'Muchora', 'AC_j', 'f7e00d6f16b6ad27e971beffa64ebb56', 'JU', 'muchora@gmail.com', ',Bid for work,,,', '2'),
(21, '2014-05-09 11:03:50', 'William', 'Ssenyondo', '0', '0', 'New Wave Technologies', 'wssenyondo@newwavetech.co.ug', 'Submit work for sub-contractors,Bid for work,Fleet Management,Emergency Assistance,', '1'),
(22, '2015-02-01 01:53:27', 'Muyinda', 'Rogers', '0', '0', 'Newwave', 'moverr@gmail.com', 'Submit work for sub-contractors,Bid for work,Fleet Management,Emergency Assistance,Advertise', '1'),
(23, '2015-06-23 10:10:01', 'Ismail', 'Kamyuka', '0', '0', 'Elsl', 'iskamyuka@gmail.com', ',,,,Advertise', '1'),
(24, '2015-06-27 18:27:38', 'eymoyerhaze', 'eymoyerhaze', '0', '0', 'eymoyerhaze', 'keliikoabur@sohu.com', 'Submit work for sub-contractors,Bid for work,Fleet Management,Emergency Assistance,Advertise', '1'),
(25, '2015-06-29 07:41:20', 'samuel', 'haze', '0', '0', 'appsman', 'myandrewz@gmail.com', ',Bid for work,,,', '1'),
(26, '2015-07-06 06:48:53', 'samuel', 'andrew', '0', '0', 'mine', 'myandrewz@gmail.com', 'Submit work for sub-contractors,,,,', '1');

-- --------------------------------------------------------

--
-- Table structure for table `companyclients`
--

CREATE TABLE IF NOT EXISTS `companyclients` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `CompanyID` bigint(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `companyclients`
--

INSERT INTO `companyclients` (`ID`, `CompanyID`, `Name`, `Phone`, `Email`, `Address`) VALUES
(1, 1, 'BB Logistics Limited', '+256390232333', 'bbll@gmail.com', 'Plot 45 Kanjokya Street, Kamwokya'),
(2, 1, 'All Transit limited', '+255799843849', 'info@alltransit.com', 'Arusha, Tanzania'),
(3, 1, 'hopesy ltd', '+256712820434', 'muteesa2001@yahoo.com', 'p.o box 23'),
(4, 18, 'GTL', '+256757262171', 'gtl@gtl.com', 'Kumba, Uganda');

-- --------------------------------------------------------

--
-- Table structure for table `companydrivers`
--

CREATE TABLE IF NOT EXISTS `companydrivers` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `CompanyID` bigint(20) NOT NULL,
  `Firstname` varchar(32) NOT NULL,
  `Lastname` varchar(32) NOT NULL,
  `Logo` varchar(50) NOT NULL,
  `TruckID` bigint(20) DEFAULT NULL,
  `Dob` varchar(20) NOT NULL,
  `Phone` varchar(32) NOT NULL,
  `DPermit` varchar(50) NOT NULL,
  `Passport` varchar(50) NOT NULL,
  `Experience` text NOT NULL,
  `Endorsements` text NOT NULL,
  `Actingas` varchar(32) NOT NULL,
  `assigned` enum('Y','N') NOT NULL DEFAULT 'N',
  `DateIn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `companydrivers`
--

INSERT INTO `companydrivers` (`ID`, `CompanyID`, `Firstname`, `Lastname`, `Logo`, `TruckID`, `Dob`, `Phone`, `DPermit`, `Passport`, `Experience`, `Endorsements`, `Actingas`, `assigned`, `DateIn`) VALUES
(1, 1, 'Barekye', 'Julius', '1353489523.jpg', NULL, '7 August, 2012', '+256757262171  ', '', '', 'asd        ', '', 'Driver', 'N', '2012-08-16 16:18:15'),
(34, 1, 'Robert', 'Tumusiime', 'abra_1352379233.jpg', NULL, '6 November, 2006', '+256789845434', '58DHJFF', '9409DD', 'Four years', 'He is good', 'Driver', 'Y', '2012-11-08 12:53:18'),
(12, 1, 'Themboa', 'Lamia', '1353503891.jpg', NULL, '30 August, 2012', '+256757262171      ', '67348J', 'SDIU32', 'good        ', 'NIL', 'Driver', 'Y', '2012-08-29 10:16:57'),
(15, 4, 'Buwembo', 'David', '5ba23a88b8d87b04cb696af17fc5dfba.jpg', NULL, '19 September, 2012', '+256757262171', '', '', '      zsdsd  ', '', 'Driver', 'N', '2012-09-11 13:03:31'),
(16, 4, 'Ash', 'Aluwambo', 'c45257cf574b776059c53207243d7f5c.jpg', NULL, '20 September, 2012', '+256757262171', '', '', 'wqewqer        ', '', 'Turnboy', 'N', '2012-09-11 13:04:41'),
(17, 4, 'Irene', 'Namugga', '87a081da2280f28e993e1fedd8bdea84.jpg', NULL, '20 September, 2012', '+256757262171', '', '', 'sfsdff        ', '', 'Driver', 'N', '2012-09-11 13:05:23'),
(22, 8, 'Ash', 'Luwambo', '0cfab492ba2acfbe780e93d2468f6b6b.jpg', NULL, '13 September, 1990', '+256784000808', '', '', '5 Years', '', 'Driver', 'N', '2012-09-12 10:09:29'),
(23, 10, 'Nabatanzi', 'Phiona', '01ace706bc347eb06e1429952a357fa2.jpg', NULL, '21 September, 2012', '+256757262171', '', '', 'Exellent        ', '', 'Driver', 'N', '2012-09-12 11:20:11'),
(24, 10, 'Buwembo', 'Micheal', '11a501ea99b52574c2d209b23f5ed758.jpg', NULL, '25 September, 2012', '+256757262171', '', '', '        ', '', 'Driver', 'N', '2012-09-12 11:22:44'),
(26, 8, 'Salma', 'Luwambo', 'e4f2ae3feaef830ab00c7a7ebb6fff14.png', NULL, '3 September, 1990', '+256784000808', '', '', '3 years', '', 'Turnboy', 'N', '2012-09-13 09:28:28'),
(27, 18, 'Onek', 'Andrew', '71887926809d19daf903e2316f5d8294.jpg', NULL, '4 September, 2012', '+256757262171', '', '', '20 years', '', 'Driver', 'Y', '2012-09-26 05:18:32'),
(29, 18, 'Haruna', 'Musisi', 'a4e9815db4ea42b3cb41d166a9fb4c45.jpg', NULL, '4 November, 1968', '+256772464399', '1098062', 'B5734562', 'B - 1988\r\nCM- 1990\r\nCH - 1992\r\nDL - 1994\r\n\r\n', 'DUI - 1999\r\nLCC - 2001', 'Driver', 'Y', '2012-11-07 12:42:53'),
(30, 15, 'Zubair', 'Musisi', 'f20c55e7dbb31b02839df280a4e910be.jpg', NULL, '1 November, 1979', '+256784000808', '4632632632', 'WEW3453453', '5 years', 'Was allowed to do UNFPA alone', 'Driver', 'Y', '2012-11-07 14:15:21'),
(31, 2, 'Joseph', 'Kato', '8b33bff653064cbd96ff09da525c8236.jpg', NULL, '7 November, 2006', '+256757262171', 'DSF3453', '435FERT', 'Good', 'NIL', 'Driver', 'Y', '2012-11-08 07:49:41'),
(32, 2, 'James', 'Latu', 'a97231d5e0f8b79cacf7e01040ea52a8.jpg', NULL, '12 November, 2008', '+256757262179', 'GSF3454', '535FESDGS', 'Good', 'NIL', 'Driver', 'Y', '2012-11-08 07:50:52'),
(33, 1, 'Otim', 'Victor', '1353496048.jpg', NULL, '30 October, 2012', '+256757262178', '3F3453', '43533243', 'GOOD', 'NIL', 'Driver', 'N', '2012-11-08 10:45:00'),
(35, 1, 'Tim', 'Mukasa', '0292b26101ea7f2ef04c99b903f46954.jpg', NULL, '06/03/85', '+256712820434', 'u/078', 'B076767', '4 years', 'good', 'Driver', 'N', '2013-02-20 06:06:44');

-- --------------------------------------------------------

--
-- Table structure for table `companyprofile`
--

CREATE TABLE IF NOT EXISTS `companyprofile` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `CompanyID` bigint(20) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Website` varchar(40) NOT NULL,
  `DateEstablished` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Logo` varchar(100) NOT NULL DEFAULT 'defaultlogo.gif',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `companyprofile`
--

INSERT INTO `companyprofile` (`ID`, `CompanyID`, `Phone`, `Website`, `DateEstablished`, `Address`, `Country`, `Logo`) VALUES
(1, 1, '+256757262171', 'www.tabnetmedia.co.ug', '2012-04-21', 'P.O Box 4, Kampala', 'Uganda', '10_1348131146.jpg'),
(3, 2, '+256757262171', 'www.majindocom.co.ug', '3 August, 2009', 'Kampala, Uganda', 'Uganda', 'lighthouse_1346235535.jpg'),
(4, 4, '+256757262171', 'www.newwavetech.com', '5 September, 2012', 'usfyugsdhfjk', 'uganda', 'index_1347370655.jpg'),
(5, 9, '+256782452985', 'www.facebook.com/victorotim', '12 September, 2012', 'KAMPALA RD, P.O BOX 123 KAMPALA', 'Uganda', '9d6120facf24dd909d4c5ba8323cb175.jpg'),
(6, 10, '+256757262171', 'www.newwavetech.com', '11 october, 1912', 'Jinja opp shell', 'uganda', '3140520586f61d525c3c1824e4b6e665.jpg'),
(7, 8, '+256784000808', 'www.ash.co.ug', '3 September, 2008', '30 Jinja Road', 'Uganda', 'ash_1348040027.jpg'),
(8, 19, '+256718005491', 'www.amtullah.com', '12/01/2006', '1264 Mbogo road, Najeera, Kampala', 'Uganda', 'eb12a0be04c6c3136cdb369bc5858652.jpg'),
(9, 18, '+256 312 370 177', 'www.globetrottersltd.co.ug', '12/01/2006', '13 Norfolk Road, Kyambogo\r\nP.O.Box 7733\r\nKampala, ', 'Uganda', '22cd4c25354ab3f15370389d660f2d23.jpg'),
(10, 15, '+256784000808', 'www.rays.co.ug', '3 October, 2005', 'Plot 1 Mbubi Road\r\nLungujja,\r\nWakaliga \r\nKampala ', 'Uganda', 'dfec88ceaacd04cf76b475fb73df6d6b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `companytrackers`
--

CREATE TABLE IF NOT EXISTS `companytrackers` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `CompanyID` bigint(20) NOT NULL,
  `TrackerID` bigint(20) NOT NULL,
  `DateIn` varchar(20) NOT NULL,
  `Status` enum('Available','Not available') NOT NULL,
  `AI` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `companytrackers`
--

INSERT INTO `companytrackers` (`ID`, `CompanyID`, `TrackerID`, `DateIn`, `Status`, `AI`) VALUES
(2, 1, 3, '2012-09-16 14:22:42', 'Available', 'Active'),
(3, 15, 1, '2012-09-21 08:12:09', 'Not available', 'Active'),
(4, 15, 10, '2012-09-21 08:12:09', 'Not available', 'Active'),
(5, 18, 11, '2012-09-26 01:01:53', 'Not available', 'Active'),
(6, 18, 12, '2013-09-19 03:22:14', 'Not available', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `companyusers`
--

CREATE TABLE IF NOT EXISTS `companyusers` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `CompanyID` bigint(20) NOT NULL,
  `Salutation` varchar(20) NOT NULL,
  `FirstName` varchar(40) NOT NULL,
  `MiddleName` varchar(40) NOT NULL DEFAULT 'NIL',
  `LastName` varchar(40) NOT NULL,
  `Gender` set('Male','Female') NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `JobTitle` varchar(50) NOT NULL,
  `AccountExpiry` varchar(20) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Permissions` set('Company Administrator','Data Entry') NOT NULL DEFAULT 'Data Entry',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `companyusers`
--

INSERT INTO `companyusers` (`ID`, `CompanyID`, `Salutation`, `FirstName`, `MiddleName`, `LastName`, `Gender`, `Phone`, `Email`, `JobTitle`, `AccountExpiry`, `Username`, `Password`, `Permissions`) VALUES
(1, 1, 'Mrs.', 'Natalie', 'Cherrie', 'Basemera', 'Female', '+256779814133', 'nbasemera@gmail.com', 'Manager', '2012-08-13 22:26:13', 'nattie', '4124bc0a9335c27f086f24ba207a4912', 'Data Entry'),
(2, 1, 'Mr.', 'Mujuni ', 'Bwana', 'John', 'Male', '+256757688564', 'mujunijohn@ymail.com', 'Clearing Officer', '2012-08-13 22:26:13', 'bwana', '4124bc0a9335c27f086f24ba207a4912', 'Data Entry'),
(10, 1, 'Ms.', 'Nahabwe', 'Catu', 'Dianah', 'Female', '+256776243450', 'ndiana@yahoo.com', 'Cashier', '30 August, 2012', 'ndianah', 'ab50065d1466f0653dcaf4375689a291', 'Data Entry'),
(11, 2, 'Mr.', 'Twine', 'R', 'John', 'Male', '+256707264345', 'tjohn@ymail.com', 'Transport manager', '30 August, 2012', 'tjohn', 'b414c25c4d9a4f5eec02316fc9ed014a', 'Company Administrator'),
(20, 10, 'Mrs.', 'Nabatanzi', 'PHIONAH', 'BUWEMBO', 'Female', '+256757262171', 'dolut@gmail.com', 'Manager', '21 September, 2012', 'nbuwembo', '71af4c276651861c6251ce9f32390656', 'Company Administrator'),
(21, 8, 'Ms.', 'Jalila', '', 'Kalila', 'Female', '+256784000808', 'aluwambo@outlook.com', 'Receptionist', '28 September, 2012', 'jkalila', '8303501b5d29d090889da51004116bd5', 'Data Entry'),
(22, 18, 'Mr.', 'James', 'B', 'Badiida', 'Male', '+256778939980', 'omarmayanja@gmail.com', 'Logistics Coordinator', '7 November, 2013', 'jbadiida', '78253501c248aac68a64658c79a656c6', 'Data Entry'),
(23, 15, 'Mr.', 'Yassin', 'Ismail', 'Ramathan', 'Male', '+256784000808', 'yassin@rays.co.ug', 'COO', '30 November, 2012', 'yramathan', 'bb2eec2c7ed18159aba9ee09fbc765cc', 'Data Entry'),
(24, 1, 'Mr.', 'Edwin', 'Tumusiime', 'Twesigye', 'Male', '+2567052415263', 'edwint@gmail.com', 'Fleet Manager', '5 November, 2014', 'etwesigye', 'c7e1353f574f6104efe980924cbf55fb', 'Company Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `containers`
--

CREATE TABLE IF NOT EXISTS `containers` (
  `container_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ShipmentID` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `URARef` varchar(50) NOT NULL,
  `Exemption` varchar(50) NOT NULL,
  `cargoweight` bigint(32) NOT NULL,
  `routeinfo` text NOT NULL,
  `containernumber` varchar(32) NOT NULL,
  `status` enum('Pending','Scheduled for loading','Cargo in transit','Delivered') NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`container_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `containers`
--

INSERT INTO `containers` (`container_id`, `ShipmentID`, `company_id`, `URARef`, `Exemption`, `cargoweight`, `routeinfo`, `containernumber`, `status`) VALUES
(1, 1, 1, 'SFLJIO0320', 'NIL', 10, 'Mombasa, Malaba, Kampala', '342SDFAS', 'Scheduled for loading'),
(2, 1, 1, '009390', 'NIL', 12, 'Mombasa, Malaba, Kampala', '4R2F323', 'Scheduled for loading'),
(3, 1, 1, 'SDF345', 'NIL', 9, 'Mombasa, Malaba, Kampala', '234DS00', 'Scheduled for loading'),
(4, 4, 18, 'ura908', 'GOSS809', 14, '', 'Chassis 7189', 'Cargo in transit'),
(5, 3, 2, '768', '344', 50, '', 'CTN23', 'Scheduled for loading'),
(6, 5, 2, '09877', '34', 100, '', 'CTN30', 'Scheduled for loading'),
(7, 6, 1, 'DSFG4444', 'NIL', 100, '', '2324DSFDS', 'Scheduled for loading'),
(8, 6, 1, 'FDWE444', 'NIL', 120, '', '242DD555', 'Scheduled for loading'),
(9, 7, 1, 'REF00989', 'NIL', 200, '', 'CONT001', 'Scheduled for loading'),
(10, 7, 1, 'UR09390', 'NIL', 10, '', 'CONT002', 'Pending'),
(11, 9, 18, 'DAVID BENS', 'XXX', 40000, 'Mombasa, Malaba, Jinja, Kampala, Bukoto', 'C90832', 'Scheduled for loading');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `docID` int(32) NOT NULL AUTO_INCREMENT,
  `companyID` int(32) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `description` text,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`docID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`docID`, `companyID`, `name`, `type`, `description`, `date_created`) VALUES
(6, 1, 'Curriculum Vitae', 'Transaction repor285.pdf', 'CVs of our key staff', '2012-10-29 02:12:46'),
(8, 1, 'Accounts of the year', 'sc317.csv', 'Legal company document.', '2012-10-29 02:12:44'),
(9, 2, 'URA Tax clearence', 'Transaction repor469.pdf', 'Legal company document on tax. ', '2012-10-17 15:51:39'),
(10, 2, 'Curriculum Vitae', 'loan arrear478.pdf', 'CVs of key staff', '2012-10-17 15:53:08'),
(11, 4, 'URA Tax clearence', 'Transactio586.pdf', 'Legal company document.', '2012-10-17 16:11:05'),
(12, 4, 'Curriculum Vitae', 'loan arrear588.pdf', 'CVs of our key staff', '2012-10-18 11:20:47'),
(13, 5, 'Tax clearence form', 'Transactio691.pdf', 'Valid form till 2015 ', '2012-10-18 11:55:13'),
(14, 5, 'Vat classification', 'Outbox-ticket696.pdf', 'Obtained last month. to run for 12 months.', '2012-10-18 11:56:01'),
(15, 10, 'Finances', 'ASSET%20VALUATION%20SERVICE639.pdf', 'This is for asset', '2012-10-30 14:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `driver_assigments`
--

CREATE TABLE IF NOT EXISTS `driver_assigments` (
  `assign_id` int(32) NOT NULL AUTO_INCREMENT,
  `driver_id` int(32) NOT NULL,
  `truck_id` int(32) NOT NULL,
  `date_of_assignment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`assign_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `driver_assigments`
--

INSERT INTO `driver_assigments` (`assign_id`, `driver_id`, `truck_id`, `date_of_assignment`) VALUES
(1, 11, 13, '2012-01-18 15:59:22'),
(3, 13, 16, '2012-01-18 16:01:05'),
(4, 14, 10, '2012-01-18 16:11:57'),
(5, 11, 10, '2012-01-18 16:12:39'),
(6, 11, 16, '2012-01-18 16:14:12'),
(7, 11, 16, '2012-01-18 16:21:14'),
(8, 11, 11, '2012-01-18 16:24:44'),
(9, 11, 11, '2012-01-18 16:25:52'),
(10, 11, 11, '2012-01-18 16:26:39'),
(11, 11, 11, '2012-01-18 16:26:55'),
(12, 11, 11, '2012-01-18 16:27:03'),
(13, 12, 13, '2012-01-18 16:28:08'),
(14, 14, 15, '2012-01-18 16:32:26'),
(15, 12, 20, '2012-01-18 16:33:50'),
(16, 13, 21, '2012-01-18 16:34:13'),
(17, 12, 65, '2012-01-18 16:36:46'),
(18, 12, 11, '2012-01-18 16:49:26'),
(19, 16, 22, '2012-01-20 10:11:41'),
(20, 17, 67, '2012-01-23 19:13:43'),
(21, 15, 10, '2012-01-24 11:38:04'),
(22, 12, 74, '2012-01-27 16:26:54'),
(23, 13, 69, '2012-01-29 10:41:51'),
(24, 16, 66, '2012-01-29 10:42:58'),
(25, 15, 78, '2012-01-29 10:47:23'),
(26, 11, 70, '2012-01-29 10:47:39'),
(27, 11, 10, '2012-02-01 04:04:51'),
(28, 37, 10, '2012-02-01 04:17:58'),
(29, 37, 10, '2012-02-20 17:05:04'),
(30, 37, 10, '2012-02-20 17:06:54'),
(31, 16, 94, '2012-02-20 17:07:49'),
(32, 25, 88, '2012-02-20 17:08:49'),
(33, 37, 10, '2012-02-20 17:11:56'),
(34, 23, 10, '2012-02-20 17:14:28'),
(35, 23, 10, '2012-02-20 17:16:16'),
(36, 38, 10, '2012-03-21 17:54:56'),
(37, 0, 89, '2012-03-22 14:40:11'),
(38, 12, 10, '2012-03-22 15:27:35'),
(39, 12, 10, '2012-03-22 15:27:49'),
(40, 12, 10, '2012-03-22 15:28:05'),
(41, 36, 101, '2012-07-01 07:51:21'),
(42, 0, 20, '2012-08-24 12:00:58'),
(43, 11, 20, '2012-08-24 12:02:10'),
(44, 39, 159, '2012-08-24 12:29:05'),
(45, 5, 169, '2012-08-24 15:05:40'),
(46, 13, 169, '2012-08-24 15:06:11'),
(47, 2, 88, '2012-08-24 15:07:46'),
(48, 17, 88, '2012-08-24 15:08:15'),
(49, 11, 167, '2012-08-24 16:11:43'),
(50, 11, 173, '2012-08-27 12:16:14'),
(51, 1, 88, '2012-08-30 10:26:40'),
(52, 1, 94, '2012-09-11 10:33:11'),
(53, 2, 94, '2012-09-11 10:34:30'),
(54, 1, 94, '2012-09-11 10:53:05'),
(55, 5, 11, '2012-09-11 10:53:33'),
(56, 2, 94, '2012-09-11 10:55:35'),
(57, 1, 94, '2012-09-11 11:19:57'),
(58, 6, 94, '2012-09-11 11:44:21'),
(59, 1, 94, '2012-09-11 12:11:00'),
(60, 2, 194, '2012-09-11 12:12:08'),
(61, 5, 94, '2012-09-11 12:43:21'),
(62, 15, 200, '2012-09-11 15:31:39'),
(63, 16, 200, '2012-09-11 15:43:11'),
(64, 17, 199, '2012-09-11 15:50:25'),
(65, 18, 201, '2012-09-11 17:31:56'),
(66, 19, 201, '2012-09-11 17:32:58'),
(67, 1, 202, '2012-09-12 07:20:00'),
(68, 0, 202, '2012-09-12 08:33:00'),
(69, 0, 202, '2012-09-12 08:33:50'),
(70, 0, 203, '2012-09-12 08:35:13'),
(71, 1, 203, '2012-09-12 08:35:23'),
(72, 3, 202, '2012-09-12 08:35:42'),
(73, 22, 204, '2012-09-12 10:36:46'),
(74, 23, 205, '2012-09-12 11:27:55'),
(75, 24, 206, '2012-09-12 11:31:03'),
(76, 27, 210, '2012-09-26 05:21:49'),
(77, 3, 201, '2012-11-01 16:48:59'),
(78, 1, 199, '2012-11-06 15:26:44'),
(79, 3, 202, '2012-11-06 15:26:57'),
(80, 12, 201, '2012-11-06 15:27:11'),
(81, 3, 202, '2012-11-06 15:27:28'),
(82, 3, 199, '2012-11-06 15:28:08'),
(83, 1, 202, '2012-11-06 15:28:18'),
(84, 29, 210, '2012-11-07 12:50:11'),
(85, 30, 208, '2012-11-07 14:36:17'),
(86, 31, 94, '2012-11-08 07:51:12'),
(87, 32, 173, '2012-11-08 07:51:28'),
(88, 33, 199, '2012-11-08 10:45:46'),
(89, 33, 199, '2012-11-08 10:49:59'),
(90, 12, 212, '2012-11-08 11:09:11'),
(91, 1, 202, '2012-11-08 11:26:16'),
(92, 33, 212, '2012-11-08 11:27:54'),
(93, 12, 212, '2012-11-08 11:28:16'),
(94, 34, 213, '2012-11-08 13:17:47'),
(95, 34, 213, '2012-11-08 13:19:07'),
(96, 27, 214, '2013-09-19 07:29:21'),
(97, 0, 209, '2015-07-06 11:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `file_id` int(32) NOT NULL AUTO_INCREMENT,
  `truck_id` int(32) NOT NULL,
  `file` varchar(255) NOT NULL,
  `companyid` int(32) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `truck_id`, `file`, `companyid`) VALUES
(1, 10, '1345697010.xls', 0),
(2, 10, '1345698564.docx', 0),
(3, 10, '1345699739.docx', 0),
(4, 10, '1345699771.docx', 0),
(5, 10, '1345699927.pdf', 0),
(6, 10, '1345700217.xls', 0),
(7, 94, '1345700964.xls', 0),
(8, 10, '1345701219.xls', 0),
(9, 94, '1345701848.txt', 0),
(10, 159, '1345702499.xls', 0),
(11, 156, '1345702549.xls', 0),
(12, 10, '1345703736.docx', 0),
(13, 94, '1345704151.pdf', 0),
(14, 163, '1345704464.xls', 0),
(15, 9, '1345704522.doc', 0),
(16, 13, '1345706531.pdf', 0),
(17, 2, '1345709681.pdf', 0),
(18, 2, '1345709931.docx', 0),
(19, 94, '1345729096.txt', 0),
(20, 169, '1345789350.doc', 0),
(21, 10, 'First DOWNLOA894.pdf', 0),
(22, 10, 'drupal_image_gallery936.docx', 0),
(23, 10, 'httpurldata941.docx', 0),
(24, 0, '134569701132.xls', 0),
(25, 178, 'Monitoring_Evaluation_Basic169.pdf', 0),
(26, 197, 'MoFPED_Membership_Database_Proposal_MAY201047.doc', 0),
(27, 197, 'MoFPED_Membership_Database_Proposal_MAY201113.doc', 0),
(28, 197, 'Proposal_WebsiteRedesign_CAA_AL_12JULY201127.doc', 0),
(29, 197, 'Project Backups155.docx', 0),
(30, 201, 'Project Backups524.docx', 4),
(31, 199, 'Project Backups848.docx', 4),
(32, 199, 'passwor069.txt', 4),
(33, 202, 'tes613.txt', 1),
(34, 205, 'drupal_image_gallery865.docx', 10),
(35, 205, '1345698564070.docx', 10),
(36, 205, '134569701072.xls', 10),
(37, 206, '134569701156.xls', 10),
(38, 199, 'Ash Luwambo849.docx', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE IF NOT EXISTS `fuel` (
  `fuel_id` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `truck_id` int(32) DEFAULT NULL,
  `company_id` int(32) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `cost_qty` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `vendor` varchar(255) DEFAULT NULL,
  `startodo` int(32) DEFAULT NULL,
  `endodo` int(32) DEFAULT NULL,
  `notes` text,
  `reference` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`fuel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `fuel`
--

INSERT INTO `fuel` (`fuel_id`, `truck_id`, `company_id`, `qty`, `cost_qty`, `total`, `vendor`, `startodo`, `endodo`, `notes`, `reference`, `date_created`) VALUES
(1, 10, 2, 32.45, 6.234, 40.0433, 'shell carz', 200, 300, 'typing 123', '9999', '2012-08-22 08:38:13'),
(2, 10, 2, 23.456, 1.908, 44.754048, 'Gapikol', 200, 300, 'typing 123', 'david', '2012-01-28 09:50:55'),
(7, 13, 2, 34, 4500, 153000, '', 0, 0, '', '', '2012-02-15 16:08:50'),
(15, 101, 2, 8, 9000, 72000, '0988', 776, 988, '_NOTES_', '87', '2012-07-01 04:48:26'),
(8, 10, 2, 451, 55000, 2475000, '', 0, 0, 'fggf', '', '2012-08-19 06:48:37'),
(23, 189, 0, 0, 0, 0, 'NOT SET', 0, 0, '', 'NOT SET', '2012-08-31 08:38:09'),
(12, 14, 2, 56, 7500, 420000, 'shell carz', 400, 500, '_NOTES_', '123', '2012-02-20 09:41:29'),
(13, 11, 2, 56, 70000, 3920000, 'SHELL BUGOLOBBI', 600, 800, '_NOTES_', '567', '2012-03-21 13:57:01'),
(14, 11, 2, 56, 70000, 3920000, 'SHELL BUGOLOBBI', 600, 800, '_NOTES_', '567', '2012-03-21 13:58:13'),
(16, 10, 0, 555, 560, 0, 'sds', 555, 0, '', 'sdsdsd', '2012-08-22 08:40:24'),
(17, 67, 0, 45, 4545, 0, '4545', 455, 4545, '', '55', '2012-08-20 05:53:18'),
(18, 67, 0, 4545, 545, 0, '54', 4545, 455, '', '5454', '2012-08-20 05:53:34'),
(24, 10, 0, 5454, 45, 0, '454', 45, 5545, '4545', '4545', '2012-09-05 08:31:04'),
(20, 10, 0, 8000, 45500, 0, 'shell', 800, 900, '', '4567', '2012-08-22 08:35:16'),
(22, 189, 0, 0, 0, 0, 'NOT SET', 0, 0, '', 'NOT SET', '2012-08-31 08:17:04'),
(25, 178, 0, 2, 2, 0, '2', 2, 2, 'dfhrfdgf', '2', '2012-09-11 12:32:51'),
(26, 201, 0, 56, 55, 0, '55', 55, 55, '55', '55', '2012-09-11 15:53:28'),
(27, 201, 4, 45, 454, 0, '45', 45, 45, '45', '45', '2012-09-11 15:57:40'),
(28, 201, 4, 66, 66, 0, '66', 66, 66, '66', '66', '2012-09-11 15:58:06'),
(29, 202, 1, 50, 3690, 0, 'Total UG', 18900, 20000, 'Added with oil filter.', 'TA', '2012-09-12 07:29:15'),
(30, 205, 10, 556, 6790000, 0, '66666', 66, 666, '666', '66', '2012-09-12 11:53:34'),
(32, 199, 1, 700, 3400, 0, 'City oil', 30000, 32100, 'Good', 'David', '2012-11-06 15:11:18'),
(33, 212, 1, 12, 2300, 0, 'City Oil', 10000, 10048, 'fgh', 'DDR444', '2012-11-08 11:50:28'),
(34, 213, 1, 200, 3600, 0, 'City oil', 4000, 4800, 'aaaa', 'REF0001', '2012-11-08 13:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `img_id` int(32) NOT NULL AUTO_INCREMENT,
  `truck_id` int(32) NOT NULL,
  `image` varchar(255) NOT NULL,
  `companyid` int(32) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `truck_id`, `image`, `companyid`) VALUES
(4, 94, '1345656386.jpg', 0),
(5, 94, '1345656417.jpg', 0),
(6, 94, '1345656445.jpg', 0),
(7, 94, '1345656612.jpg', 0),
(8, 10, '1345656835.jpg', 0),
(9, 10, '1345656843.JPG', 0),
(10, 10, '1345656853.jpg', 0),
(11, 2, '1345657579.JPG', 0),
(12, 2, '1345657596.jpg', 0),
(13, 94, '1345659069.jpg', 0),
(14, 94, '1345659484.JPG', 0),
(15, 10, '1345659934.jpg', 0),
(16, 10, '1345661068.jpg', 0),
(17, 10, '1345661074.jpg', 0),
(18, 10, '1345698535.JPG', 0),
(19, 10, '1345700048.jpg', 0),
(20, 163, '1345704452.jpg', 0),
(21, 9, '1345704729.jpg', 0),
(22, 9, '1345704988.JPG', 0),
(23, 13, '1345706609.jpg', 0),
(24, 169, '1345729192.jpg', 0),
(25, 173, '1346314635.jpg', 0),
(26, 178, '1347351790.jpg', 0),
(27, 178, '1347352859.jpg', 0),
(28, 197, '1347361334.jpg', 0),
(29, 197, '1347361619.jpg', 0),
(30, 201, '1347365304.jpg', 0),
(31, 201, '1347365319.jpg', 0),
(32, 201, '1347365373.jpg', 4),
(33, 199, '1347368525.jpg', 4),
(34, 202, '1347434771.jpg', 1),
(35, 205, '1347448606.jpg', 10),
(36, 206, '1347449662.jpg', 10),
(37, 213, '1352380557.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loadingplaces`
--

CREATE TABLE IF NOT EXISTS `loadingplaces` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `CompanyID` bigint(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `DateIn` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `loadingplaces`
--

INSERT INTO `loadingplaces` (`ID`, `CompanyID`, `Name`, `DateIn`) VALUES
(1, 1, 'Mwanza port', '2012-11-15 11:32:40'),
(2, 1, 'Malaba', '2012-11-15 11:43:28'),
(3, 1, 'Kamwokya, Kampala', '2012-11-15 08:23:52'),
(4, 18, 'KIN Chambers', '2013-09-19 03:42:10');

-- --------------------------------------------------------

--
-- Table structure for table `loadingschedules`
--

CREATE TABLE IF NOT EXISTS `loadingschedules` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `CompanyID` bigint(20) NOT NULL,
  `ContainerID` bigint(20) NOT NULL,
  `TruckID` bigint(20) NOT NULL,
  `Place` varchar(20) NOT NULL,
  `DateOfLoading` varchar(20) NOT NULL,
  `URARef` varchar(50) DEFAULT NULL,
  `Exemption` varchar(50) DEFAULT NULL,
  `FuelOrder` varchar(50) NOT NULL,
  `Fuel` varchar(50) NOT NULL,
  `OExpenditures` varchar(100) NOT NULL,
  `Amount` varchar(50) NOT NULL,
  `DateIn` varchar(20) NOT NULL,
  `Status` enum('Done','Pending') NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `loadingschedules`
--

INSERT INTO `loadingschedules` (`ID`, `CompanyID`, `ContainerID`, `TruckID`, `Place`, `DateOfLoading`, `URARef`, `Exemption`, `FuelOrder`, `Fuel`, `OExpenditures`, `Amount`, `DateIn`, `Status`) VALUES
(1, 1, 1, 199, 'Mwanza', '20 November, 2012', 'SFLJIO0320', 'NIL', '34U0FD', '300', 'Road Toll', '20009', '2012-11-08 00:55:29', 'Pending'),
(2, 1, 2, 201, 'Mwanza', '20 November, 2012', '009390', 'NIL', 'SADAD', '200', 'Road Toll', '3000', '2012-11-08 02:18:21', 'Pending'),
(3, 1, 3, 199, 'Mwanza', '14 November, 2012', 'NIL', 'NIL', 'SDSGHHJ', '100', 'Road Toll', '1000', '2012-11-08 08:28:04', 'Pending'),
(4, 2, 5, 94, 'Kampala', '9 November, 2012', 'NIL', 'NIL', '2344', 'Diesel', 'Tracker airtime', '45000', '2012-11-08 03:15:41', 'Pending'),
(5, 18, 4, 210, 'KICD', '10 November, 2012', 'NIL', 'NIL', '9988', '400', '3344', '295', '2012-11-08 03:19:48', 'Done'),
(6, 2, 6, 173, 'Lubumbashi', '15 November, 2012', 'NIL', 'NIL', '23456', 'Diesel', '5677', '20000', '2012-11-08 03:31:11', 'Pending'),
(7, 1, 7, 212, 'KAMPALA', '13 November, 2012', 'NIL', 'NIL', 'R343454', '200L', 'Q32RDEW', '200000', '2012-11-08 06:39:01', 'Pending'),
(8, 1, 8, 212, 'KAMPALA', '6 November, 2012', 'NIL', 'NIL', 'R34345466', '200L', 'Q32RDEW', '200000', '2012-11-08 06:39:47', 'Pending'),
(9, 1, 9, 199, 'Kigali', '9 November, 2012', 'NIL', 'NIL', 'FOR001', '100L', 'REF002', '200000', '2012-11-08 08:46:19', 'Pending'),
(10, 18, 11, 214, 'KIN Chambers', '18/09/2013', 'NIL', 'NIL', 'DORA AKA', '2000', 'DOKO DIBI', '300000 UGX', '2013-09-19 03:42:57', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(128) NOT NULL AUTO_INCREMENT,
  `phone` varchar(50) NOT NULL,
  `message` varchar(110) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `phone`, `message`, `date_added`) VALUES
(1, '+256750383775', 'ATGPS,$GPRMC,124612.336,A,0018.3539,N,03232.8707,E,0.56,0.00,210912,,*00,DC', '2012-09-21 17:46:10'),
(2, '+256750383775', 'ATGPS,$GPRMC,124556.000,A,0018.3171,N,03232.8593,E,0.00,250.97,210912,,*08,AUTO', '2012-09-21 12:46:07'),
(3, '+256750383775', 'ATGPS,$GPRMC,124556.000,A,0018.3171,N,03232.8593,E,0.00,250.97,210912,,*08,AUTO', '2012-09-21 12:46:14'),
(5, '+256750383775', 'ATGPS,$GPRMC,124551.000,A,0018.3176,N,03232.8595,E,0.00,250.97,210912,,*0E,AUTO', '2012-09-21 17:45:49'),
(6, '3333333333', '333333333333333333333333333333', '2012-09-21 17:59:48'),
(7, '44444444444', '4444444444444444444444444444444444', '2012-09-21 17:59:48'),
(8, '145', 'Celebrate 50 years of ugandas independence with Warid Voicechat this weekend. Dail 145, chat with your freinds', '2012-09-23 17:27:41'),
(9, 'WaridJoy', 'Its always a brand new day! Subscribe to PAKA DABO NOW & share your love with friends & family. Send DABO to 1', '2012-09-24 05:57:49'),
(10, 'WaridJoy', 'Cherish every moment in life with your friends & family! Subscribe to PAKALAST & Enjoy 45Mins of W2W CONVERSAT', '2012-09-24 05:57:56'),
(11, 'WaridJoy', 'Talk all night & make sleep beg for mercy at ONLY Ugx 750! Send NITE to 149 NOW and get FREE Warid calls from ', '2012-09-24 17:17:53'),
(12, '+256701141363', 'globetrotters,$GPRMC,123607.986,V,0019.0121,N,03235.5201,E,0.00,0.00,250912,,*14,AUTO', '2012-09-25 12:36:19'),
(13, '+256701141363', 'globetrotters,$GPRMC,124119.896,V,0019.0121,N,03235.5201,E,0.00,0.00,250912,,*1B,VIBRATION', '2012-09-25 12:41:39'),
(14, '+256701141363', 'globetrotters,$GPRMC,124219.896,V,0019.0121,N,03235.5201,E,0.00,0.00,250912,,*18,VIBRATION', '2012-09-25 12:42:30'),
(15, '+256701141363', 'globetrotters,$GPRMC,124319.870,V,0019.0121,N,03235.5201,E,0.00,0.00,250912,,*11,VIBRATION', '2012-09-25 12:43:31'),
(16, '+256701141363', 'globetrotters,$GPRMC,124419.870,V,0019.0121,N,03235.5201,E,0.00,0.00,250912,,*16,VIBRATION', '2012-09-25 12:44:30'),
(17, '+256701141363', 'globetrotters,$GPRMC,124519.894,V,0019.0121,N,03235.5201,E,0.00,0.00,250912,,*1D,VIBRATION', '2012-09-25 12:45:33'),
(18, '+256701141363', 'globetrotters,$GPRMC,124618.894,A,0021.9613,N,03237.4992,E,0.62,315.61,250912,,*0A,VIBRATION', '2012-09-25 12:46:30'),
(19, '+256701141363', 'globetrotters,$GPRMC,124718.877,V,0021.9613,N,03237.4992,E,0.62,315.61,250912,,*11,VIBRATION', '2012-09-25 12:47:30'),
(20, '+256701141363', 'globetrotters,$GPRMC,124818.000,A,0021.9704,N,03237.4972,E,2.23,116.84,250912,,*05,VIBRATION', '2012-09-25 12:48:31'),
(21, '+256701141363', 'globetrotters,$GPRMC,124918.889,V,0021.9704,N,03237.4972,E,2.23,116.84,250912,,*1A,VIBRATION', '2012-09-25 12:49:32'),
(22, '+256701141363', 'globetrotters,$GPRMC,133150.000,A,0021.9706,N,03237.4939,E,0.00,0.00,250912,,*02,VIBRATION', '2012-09-25 13:32:03'),
(23, '+256701141363', 'globetrotters,$GPRMC,133956.000,A,0021.9694,N,03237.4954,E,1.89,228.94,250912,,*08,SOS', '2012-09-25 13:40:10'),
(24, '+256701141363', 'globetrotters,$GPRMC,134122.018,A,0021.9650,N,03237.4947,E,0.00,0.00,250912,,*02,AUTO', '2012-09-25 13:41:33'),
(25, '+256701141363', 'globetrotters,$GPRMC,134242.821,A,0021.9750,N,03237.4897,E,0.00,0.00,250912,,*08,VIBRATION', '2012-09-25 13:43:12'),
(26, '+256701141363', 'globetrotters,$GPRMC,134342.000,A,0021.9703,N,03237.4920,E,0.00,0.00,250912,,*09,VIBRATION', '2012-09-25 13:43:53'),
(27, '+256701141363', 'globetrotters,$GPRMC,134442.000,A,0021.9706,N,03237.4940,E,0.00,0.00,250912,,*0D,VIBRATION', '2012-09-25 13:44:54'),
(28, 'WaridJoy', 'Keep the bond alive with Pakalast at only Ushs. 1,000. Send PAKA to 149 OR Dial *100*4*1# & Enjoy 45Mins of W2', '2012-10-01 08:29:01'),
(29, 'Warid', 'Please call me back on 0704221576.Thank you.', '2012-10-04 10:37:01'),
(30, 'FrobishaKFC', 'Pls Join Frobisha(KFC-Nsambya)&Anne 2day Thur 4th,5pm at Boston Restuarant(opp.CPS) 4 their Wedding Mtng.Frobi', '2012-10-04 11:08:06'),
(31, 'WaridJoy', 'GET INTO A DRAW 2 WIN a Ticket to KONSHENs Concert this wkend! JUST TYPE DOWNLOAD 3651461 & send to 157 to get', '2012-10-04 12:02:05'),
(32, 'FrobishaKFC', 'Join Frobisha(KFC-Nsambya)&Anne 2de Thur 4th,5pm at Boston View Restnt(opp.CPS) 4their Wedding Mtng.RSVP:Frobi', '2012-10-04 13:00:48'),
(33, '+256700313326', 'EMGPS,$GPRMC,065921.220,V,0018.3264,N,03232.8672,E,0.00,0.00,111012,,*1E,AUTO', '2012-10-11 06:59:43'),
(34, '+256700313326', 'EMGPS,$GPRMC,075921.094,A,0020.2713,N,03234.6372,E,0.57,0.00,111012,,*05,AUTO', '2012-10-11 07:59:31'),
(35, '+256700313326', 'EMGPS,$GPRMC,085921.000,A,0018.9304,N,03235.4757,E,0.00,0.00,111012,,*07,AUTO', '2012-10-11 08:59:37'),
(36, 'SsesangaKFC', 'Join Frobisha(KFC-Nsambya)&Anne 4their Wedding Mtng TODAY Thur 11th, 5pm at Boston View Restnt(opp.CPS). Frobi', '2012-10-11 11:55:10'),
(37, '+256700313326', 'EMGPS,$GPRMC,174532.591,V,0018.9328,N,03235.4760,E,0.00,0.00,111012,,*16,AUTO', '2012-10-11 17:45:42'),
(38, '+256700313326', 'EMGPS,$GPRMC,062516.000,A,0018.9903,N,03235.5528,E,0.00,0.00,121012,,*03,AUTO', '2012-10-12 06:25:27'),
(39, '+256700313326', 'EMGPS,$GPRMC,062553.000,A,0018.9868,N,03235.5544,E,0.00,0.00,121012,,*04,AUTO', '2012-10-12 06:26:05'),
(40, '+256700313326', 'EMGPS,$GPRMC,063053.000,A,0018.9884,N,03235.5558,E,0.00,0.00,121012,,*0F,AUTO', '2012-10-12 06:31:04'),
(41, '+256700313326', 'EMGPS,$GPRMC,063553.344,V,0018.9933,N,03235.5603,E,0.76,226.07,121012,,*1E,AUTO', '2012-10-12 06:36:05'),
(42, '+256700313326', 'EMGPS,$GPRMC,064053.360,V,0018.9887,N,03235.5809,E,4.01,72.49,121012,,*2D,AUTO', '2012-10-12 06:41:04'),
(43, '+256700313326', 'EMGPS,$GPRMC,064832.000,A,0018.9851,N,03235.5562,E,0.00,10.54,121012,,*36,AUTO', '2012-10-12 06:48:43'),
(44, '+256752886106', 'Boss return my call u fone is 2biz, can''t get Amina2 my Net is faulty pliz.', '2012-10-12 11:28:55'),
(45, '+256772492774', 'Nkubirako kati', '2012-10-13 17:07:47'),
(46, '178', 'Are you looking for drama on how to make your friends laugh out loud by changing your voice! Just Subscribe to', '2012-10-15 11:24:28'),
(47, '+256700313326', 'EMGPS,$GPRMC,053403.628,V,0018.9915,N,03235.5566,E,0.95,0.00,161012,,*1A,AUTO', '2012-10-16 05:34:16'),
(48, '+256700313326', 'EMGPS,$GPRMC,053903.000,A,0018.9668,N,03232.9804,E,15.09,25.41,161012,,*08,AUTO', '2012-10-16 05:39:14'),
(49, '+256700313326', 'EMGPS,$GPRMC,054403.000,A,0019.4419,N,03233.6116,E,1.54,13.06,161012,,*35,AUTO', '2012-10-16 05:44:13'),
(50, '+256700313326', 'EMGPS,$GPRMC,054903.000,A,0019.6660,N,03234.0585,E,16.47,84.24,161012,,*03,AUTO', '2012-10-16 05:49:14'),
(51, '+256700313326', 'EMGPS,$GPRMC,055403.000,A,0019.8776,N,03234.5809,E,7.75,102.36,161012,,*06,AUTO', '2012-10-16 05:54:13'),
(52, '+256700313326', 'EMGPS,$GPRMC,055903.000,A,0019.1616,N,03235.2747,E,21.54,131.83,161012,,*3F,AUTO', '2012-10-16 05:59:14'),
(53, '+256700313326', 'EMGPS,$GPRMC,060403.484,V,0019.1616,N,03235.2747,E,21.54,131.83,161012,,*2B,AUTO', '2012-10-16 06:04:15'),
(54, '145', 'Love is all about finding the right person and creating a right relationship. Dial 145, and enjoy.', '2012-10-16 07:01:10'),
(55, '+256700313326', 'EMGPS,$GPRMC,184341.402,V,0019.1616,N,03235.2747,E,21.54,131.83,161012,,*2F,AUTO', '2012-10-16 18:43:52'),
(56, '+256700313326', 'EMGPS,$GPRMC,184841.000,A,0019.9905,N,03234.6659,E,25.21,305.33,161012,,*33,AUTO', '2012-10-16 18:48:51'),
(57, '+256700313326', 'EMGPS,$GPRMC,185341.000,A,0019.6956,N,03234.2173,E,6.54,245.48,161012,,*01,AUTO', '2012-10-16 18:53:52'),
(58, '+256700313326', 'EMGPS,$GPRMC,185841.000,A,0019.0793,N,03233.4587,E,13.83,178.35,161012,,*3C,AUTO', '2012-10-16 18:58:51'),
(59, '+256700313326', 'EMGPS,$GPRMC,190341.000,A,0018.6052,N,03233.4678,E,10.11,234.36,161012,,*3D,AUTO', '2012-10-16 19:03:52'),
(60, '+256700313326', 'EMGPS,$GPRMC,190841.000,A,0018.7087,N,03232.2000,E,12.79,281.80,161012,,*3E,AUTO', '2012-10-16 19:08:53'),
(61, '+256700313326', 'EMGPS,$GPRMC,052416.716,V,0018.7412,N,03232.4501,E,38.65,260.74,171012,,*22,AUTO', '2012-10-17 05:24:27'),
(62, '+256700313326', 'EMGPS,$GPRMC,052916.000,A,0018.7963,N,03232.8413,E,2.99,63.62,171012,,*31,AUTO', '2012-10-17 05:29:28'),
(63, '+256700313326', 'EMGPS,$GPRMC,053416.536,A,0019.4198,N,03233.5965,E,1.30,76.13,171012,,*31,AUTO', '2012-10-17 05:34:27'),
(64, '+256700313326', 'EMGPS,$GPRMC,053916.000,A,0019.4715,N,03233.6258,E,0.00,37.51,171012,,*38,AUTO', '2012-10-17 05:39:28'),
(65, '+256700313326', 'EMGPS,$GPRMC,054416.000,A,0019.7679,N,03234.3526,E,11.29,65.12,171012,,*0D,AUTO', '2012-10-17 05:44:27'),
(66, '+256700313326', 'EMGPS,$GPRMC,054916.000,A,0019.5618,N,03235.0175,E,7.00,123.02,171012,,*0B,AUTO', '2012-10-17 05:49:26'),
(67, '+256700313326', 'EMGPS,$GPRMC,055416.000,A,0018.9277,N,03235.3974,E,9.94,58.77,171012,,*31,AUTO', '2012-10-17 05:54:27'),
(68, 'SsesangaKFC', 'Join Frobisha(KFC-Nsambya)&Anne 4their Wedding Mtng 2moro Thur 18th, 5pm at Boston View Restnt(opp.CPS). Frobi', '2012-10-17 13:49:04'),
(69, '145', 'Tired of the USUAL? Add a little spice in your life with Warid Voice Chat. Dial 145 and chat with interesting ', '2012-10-18 08:09:06'),
(70, 'SsesangaKFC', 'Join Frobisha(KFC-Nsambya)&Anne 4their Wedding Mtng TODAY Thur 18th, 5pm at Boston View Restnt(opp.CPS). Ssesa', '2012-10-18 12:02:58'),
(71, 'KAJUMBA', 'Dear u are invited 2 be part of the preparation meeting for Ms Elizabeth Kajumba 2moro Friday 19th/10/12 at Ro', '2012-10-18 12:17:55'),
(72, '178', 'A smile on your face can keep you young and fresh. Subscribe now to Warid voice magic by dialing 178 and enjoy', '2012-10-19 06:25:22'),
(73, '406', 'Hi, you have received a voice sms from +256752692502. To Listen, dial *0*(free call)or 0406001. To Listen agai', '2012-10-19 07:10:45'),
(74, '406', '* followed by the number.', '2012-10-19 07:10:52'),
(75, 'KAJUMBA', 'The family of Mr Basaija K Abel invites u 2 be part of Ms Kajumba Elizabeth introduction preps at Rock Gardens', '2012-10-19 11:25:37'),
(76, '+256703767313', 'Hey,hope u r good?do me a favour jst incase someone calls askin abt my workin wit NWT plz do me e honour,lovli', '2012-10-22 06:57:49'),
(77, '+256703767313', 'Oh Ash, ths is Annie btw,jst to b sure,gd day', '2012-10-22 07:25:07'),
(78, '', '', '2012-10-30 07:59:03'),
(79, 'KAJUMBA', 'The family of Mr.Basaija K Abel invites u 2 be part of Ms Kajumba Elizabeth''s introduction preps at Rock Garde', '2012-11-02 12:01:59'),
(80, 'WaridJoy', 'Get MORE TIME to talk with PAKA MORE! Dial *100*4*2# OR Send MORE to 149 & get 75Mins of Warid calls at Ugx 15', '2012-11-06 07:31:10'),
(81, 'KAJUMBA', 'The family of Mr.Basaija K Abel invites u 2 be part of Ms Kajumba Elizabeth''s introduction preps at Rock Garde', '2012-11-07 12:18:15'),
(82, 'KAJUMBA', 'The family of Mr.Basaija K Abel invites u 2 be part of Ms Kajumba Elizabeth''s introduction preps at Rock Garde', '2012-11-09 13:01:10'),
(83, 'WaridJoy', 'What can 200/- do for you on your mobile? 100 things and more. Dial *100*2*5# for 100 On net SMSs at just 200/', '2012-11-13 13:55:10'),
(84, 'KAJUMBA', 'The family of Mr.Basaija K Abel invites u 2 b part of Ms Kajumba Elizabeth''s last introduction meeting @ Rock ', '2012-11-14 13:54:43'),
(85, 'WaridJoy', 'What can 200/- do for you on your mobile? 100 things and more. Dial *100*2*5# for 100 On net SMSs at just 200/', '2012-11-21 13:14:15'),
(86, 'KAJUMBA', 'The family of Mr.Basaija K Abel invites u 2 b part of Ms Kajumba Elizabeth''s last introduction meeting @ Rock ', '2012-11-22 10:16:29'),
(87, '+256703860344', 'why is it dat no one wants 2 listen &trust mi anymore shd l say am all alone. luv u bro plz understand', '2012-11-23 15:30:20'),
(88, '145', 'Dial 145, celebrate this weekend with your cool freinds and have fun at 240Ugx. Your Number is Our Secret.', '2012-11-26 17:32:56'),
(89, '176', 'Amuse your friends with Magic Voice. Speak to your friends in a cartoon or ghost voice, dial 176 followed by m', '2012-11-30 08:40:43'),
(90, '145', 'Chat anonymously and freely express yourself with Warid Voice Chat. Dial 145 at just 240/- a minute.', '2012-11-30 10:15:20'),
(91, 'VICKIE', 'Simon and Vickie kindly invite you for their third last wedding meeting to day at Boston view Restaurant oppos', '2012-12-01 07:04:43'),
(92, 'WaridJoy', 'Tell it like it is with Warid Voice chat. Dial 145 to chat freely without revealing your identity. At 240/- pe', '2012-12-06 13:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `msg_archive`
--

CREATE TABLE IF NOT EXISTS `msg_archive` (
  `id` bigint(128) NOT NULL AUTO_INCREMENT,
  `CompanyID` bigint(20) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `message` varchar(110) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `service_id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `duenext` date DEFAULT NULL,
  `lastdate` date DEFAULT NULL,
  `truck_id` int(32) DEFAULT NULL,
  `company_id` int(32) DEFAULT NULL,
  `regnsd` enum('Y','N') DEFAULT 'N',
  `rpday` int(11) DEFAULT NULL,
  `rpdays` varchar(25) DEFAULT NULL,
  `rpkm` int(25) DEFAULT NULL,
  `rmkm` int(22) DEFAULT NULL,
  `rmdays` varchar(25) DEFAULT NULL,
  `rmday` int(11) DEFAULT NULL,
  `rming` int(32) DEFAULT NULL,
  `past` int(32) DEFAULT NULL,
  `cur_odo` int(32) DEFAULT NULL,
  `propsd_odo` int(32) DEFAULT NULL,
  `set_odo` int(32) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `name`, `duenext`, `lastdate`, `truck_id`, `company_id`, `regnsd`, `rpday`, `rpdays`, `rpkm`, `rmkm`, `rmdays`, `rmday`, `rming`, `past`, `cur_odo`, `propsd_odo`, `set_odo`, `date_created`) VALUES
(2, 'Check windshield warsher level', '2012-02-01', '2012-01-31', 10, 2, 'N', 1, 'days', 500, 700, 'day', 1, 0, 0, 2000, 2500, 1800, '2012-01-31 16:37:59'),
(7, 'Check oil', '2012-02-07', '2012-02-07', 10, 2, 'Y', 1, 'weeks', 0, 0, 'Months', 0, 0, 0, 0, 0, 0, '2012-08-18 19:01:38'),
(12, 'Check wiper blades', '1970-01-01', '0000-00-00', 10, 0, 'Y', 0, 'weeks', 0, 0, 'Months', 0, 0, 0, 0, 0, 0, '2012-08-18 09:48:30'),
(18, 'Check and replace rust spot on body', '2012-01-28', '2012-01-27', 16, 2, 'N', 2, 'days', 600, 5, 'days', 1, 0, 0, 0, 0, 0, '2012-01-26 16:32:45'),
(19, 'Check coolant', '2009-03-05', '0000-00-00', 16, 2, 'Y', 2, 'years', 400, 100, 'days', 300, 0, 0, 0, 0, 0, '2012-01-26 16:38:33'),
(20, 'Replace spark plugs', '2012-01-28', '0000-00-00', 67, 2, 'N', 2, 'days', 0, 2, 'days', 0, 0, 0, 0, 0, 0, '2012-01-26 13:59:50'),
(21, 'Check oil', '2009-03-05', '0000-00-00', 67, 2, 'N', 2, 'days', 0, 2, 'days', 0, 0, 0, 0, 0, 0, '2012-01-26 15:19:15'),
(22, 'Check wiper blades', '2014-01-26', '0000-00-00', 67, 2, 'N', 2, 'year', 0, 0, 'N/D', 0, 0, 0, 0, 0, 0, '2012-01-26 15:18:37'),
(23, 'Replace air filter', '2012-01-29', '2011-12-29', 13, 2, 'N', 3, 'day', 500, 1000, 'month', 1, 0, 0, 0, 0, 0, '2012-01-26 16:16:11'),
(24, 'Check brakes', '2012-01-30', '2012-01-29', 13, 2, 'N', 4, 'day', 0, 1, 'day', 1, 0, 0, 0, 0, 0, '2012-01-26 16:14:02'),
(25, 'Check transmission fluid', '2012-01-28', '2012-01-27', 66, 2, 'N', 1, 'day', 0, 1, 'day', 1, 0, 0, 0, 0, 0, '2012-01-27 14:06:08'),
(26, 'Check and replace rust spot on body', '2012-01-30', '2012-01-29', 11, 2, 'N', 1, 'day', 0, 1, 'day', 1, 0, 0, 0, 0, 0, '2012-01-29 07:26:41'),
(27, 'Replace air filter', '2012-01-30', '0000-00-00', 11, 2, 'N', 1, 'day', 0, 1, 'month', 0, 0, 0, 0, 0, 0, '2012-01-29 07:27:04'),
(28, 'Check brakes', '2012-01-30', '0000-00-00', 11, 2, 'N', 1, 'day', 0, 0, 'day', 1, 0, 0, 0, 0, 0, '2012-01-29 07:30:05'),
(29, 'Check windshield warsher level', '2012-01-30', '0000-00-00', 79, 9, 'N', 1, 'day', 0, 0, 'day', 1, 0, 0, 0, 0, 0, '2012-01-29 08:00:04'),
(32, 'Replace air filter', '2012-03-02', '0000-00-00', 10, 2, 'N', 1, 'month', 0, 0, 'month', 1, 0, 0, 0, 0, 0, '2012-01-31 14:42:39'),
(33, '', '2012-03-02', '0000-00-00', 10, 2, 'N', 1, 'month', 0, 0, 'month', 1, 0, 0, 0, 0, 0, '2012-01-31 14:43:14'),
(35, 'Rotate tires', '2012-03-02', '0000-00-00', 10, 2, 'N', 1, 'month', 0, 0, 'month', 1, 0, 0, 0, 0, 0, '2012-01-31 14:46:35'),
(36, 'Check timing belt', '2012-03-31', '0000-00-00', 10, 2, 'N', 2, 'month', 0, 0, 'month', 1, 0, 0, 0, 0, 0, '2012-08-18 09:49:01'),
(37, 'Check suspension', '2012-03-02', '0000-00-00', 10, 2, 'N', 1, 'month', 0, 0, 'month', 1, 0, 0, 0, 0, 0, '2012-01-31 14:48:54'),
(38, 'Check wiper blades', '2012-03-02', '0000-00-00', 10, 2, 'Y', 1, 'month', 0, 0, 'month', 1, 0, 0, 2000, 0, 0, '2012-08-31 09:17:58'),
(39, 'Check timing belt', '2012-02-01', '0000-00-00', 10, 2, 'Y', 1, 'day', 600, 200, 'day', 1, 0, 0, 2000, 2600, 2400, '2012-08-18 09:48:21'),
(42, 'Replace air filter', '0000-00-00', '0000-00-00', 0, 0, 'N', 1, '', 4545, 4545, 'day', 1, 0, 0, 0, 0, 0, '2012-08-18 09:08:42'),
(43, 'Rotate tires', '0000-00-00', '0000-00-00', 0, 0, 'N', 1, '', 4545, 4545, 'day', 1, 0, 0, 0, 0, 0, '2012-08-18 09:09:57'),
(44, 'Rotate tires', '0000-00-00', '0000-00-00', 0, 0, 'N', 1, '', 4545, 4545, 'day', 1, 0, 0, 0, 0, 0, '2012-08-18 09:12:13'),
(45, 'Check oil', '0000-00-00', '0000-00-00', 0, 0, 'N', 1, '', 4545, 4545, 'day', 1, 0, 0, 0, 0, 0, '2012-08-18 09:12:59'),
(47, 'Check windshield warsher level', '0000-00-00', '0000-00-00', 10, 0, 'Y', 1, '', 0, 0, 'day', 1, 0, 0, 0, 0, 0, '2012-08-18 19:22:21'),
(48, 'Check tire inflation', '0000-00-00', '0000-00-00', 10, 0, 'N', 1, 'year', 0, 0, 'weeks', 1, 0, 0, 0, 0, 0, '2012-08-22 08:00:33'),
(49, 'Check tire inflation', '0000-00-00', '0000-00-00', 88, 0, 'N', 1, '', 0, 0, 'month', 1, 0, 0, 0, 0, 0, '2012-08-18 19:24:51'),
(50, 'Replace spark plugs', '0000-00-00', '0000-00-00', 88, 0, 'Y', 1, '', 0, 0, 'N/D', 1, 0, 0, 0, 0, 0, '2012-08-18 19:33:35'),
(51, 'Check tire inflation', '0000-00-00', '0000-00-00', 88, 0, 'Y', 1, '', 0, 0, 'N/D', 1, 0, 0, 0, 0, 0, '2012-08-21 08:46:14'),
(52, 'Check timing belt', '0000-00-00', '0000-00-00', 88, 0, 'Y', 1, '', 0, 0, 'month', 1, 0, 0, 0, 0, 0, '2012-08-21 08:46:18'),
(53, 'Check timing belt', '0000-00-00', '0000-00-00', 9, 0, 'N', 1, '', 0, 0, 'day', 1, 0, 0, 0, 0, 0, '2012-08-18 19:35:23'),
(54, 'Replace spark plugs', '0000-00-00', '0000-00-00', 9, 0, 'N', 1, '', 0, 0, 'weeks', 1, 0, 0, 0, 0, 0, '2012-08-18 19:37:12'),
(55, 'Check timing belt', '0000-00-00', '0000-00-00', 10, 0, 'N', 19, 'day', 788, 699, 'month', 14, 0, 0, 0, 0, 0, '2012-08-21 10:00:29'),
(56, 'Check tire inflation', '0000-00-00', '0000-00-00', 10, 0, 'N', 1, 'day', 0, 0, 'day', 1, 0, 0, 0, 0, 0, '2012-08-21 11:44:52'),
(57, 'Check tire inflation', '0000-00-00', '0000-00-00', 10, 0, 'N', 1, 'day', 0, 0, 'day', 1, 0, 0, 0, 0, 0, '2012-08-21 11:46:23'),
(58, 'Check wiper blades', '0000-00-00', '0000-00-00', 156, 0, 'N', 57, 'year', 78, 66, 'month', 5, 0, 0, 0, 0, 0, '2012-08-21 14:05:40'),
(59, 'Replace air filter', '0000-00-00', '0000-00-00', 156, 0, 'N', 15, 'month', 44, 55, 'month', 1, 0, 0, 0, 0, 0, '2012-08-21 14:06:09'),
(60, 'Check tire inflation', '0000-00-00', '0000-00-00', 94, 0, 'N', 1, 'day', 990, 0, 'day', 1, 0, 0, 0, 0, 0, '2012-08-24 14:20:58'),
(61, 'Check oil', '0000-00-00', '0000-00-00', 169, 0, 'N', 11, 'day', 0, 0, 'month', 14, 0, 0, 0, 0, 0, '2012-08-23 14:41:27'),
(63, 'Replace air filter', '2012-10-09', '2012-08-25', 173, 2, 'N', 0, '', 0, 0, '', 0, 0, 0, 0, 0, 0, '2012-08-25 10:27:49'),
(64, 'Check tire inflation', '0000-00-00', '0000-00-00', 189, 0, 'N', 0, '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, '2012-08-31 08:04:59'),
(65, 'Rotate tires', '0000-00-00', '0000-00-00', 189, 0, 'Y', 0, '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, '2012-08-31 08:09:06'),
(66, 'Check windshield warsher level', '1998-06-15', '1997-01-17', 10, 0, 'N', 0, '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, '2012-09-04 17:42:16'),
(67, 'Check windshield warsher level', '1998-06-15', '1997-01-17', 10, 0, 'N', 0, '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, '2012-09-04 17:43:13'),
(68, 'Replace spark plugs', '2002-02-13', '1996-02-16', 10, 0, 'N', 0, '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, '2012-09-05 07:51:47'),
(70, 'Check windshield warsher level', '2012-02-02', '2011-02-02', 10, 0, 'N', 0, '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, '2012-09-05 07:55:37'),
(71, 'Check tire inflation', '1999-03-14', '1996-03-18', 10, 0, 'N', 0, '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, '2012-09-05 08:02:29'),
(72, 'Check oil', '2012-09-10', '2012-09-08', 10, 0, 'N', 0, '0', 0, 0, '0', 0, 0, 0, 0, 0, 0, '2012-09-05 08:04:13'),
(76, 'Check tire inflation', '2012-09-05', '2012-02-09', 201, 4, 'N', 0, '0', 0, 0, '0', 0, NULL, NULL, 0, 0, 0, '2012-09-11 16:38:46'),
(77, 'Replace spark plugs', '2012-11-12', '2012-06-11', 205, 10, 'N', 0, '0', 0, 0, '0', 0, NULL, NULL, 0, 0, 0, '2012-09-12 11:15:35'),
(78, 'Check windshield warsher level', '2012-12-10', '2012-02-15', 206, 10, 'N', 0, '0', 0, 0, '0', 0, NULL, NULL, 0, 0, 0, '2012-09-12 11:36:12'),
(79, 'Check the tires', '1998-10-15', '2002-12-16', 199, 1, 'N', 0, '0', 0, 0, '0', 0, NULL, NULL, 0, 0, 0, '2012-11-06 15:35:04'),
(80, 'Checking the oil filters', '2011-02-01', '2011-02-04', 213, 1, 'N', 0, '0', 0, 0, '0', 0, NULL, NULL, 0, 0, 0, '2012-11-08 13:05:02');

-- --------------------------------------------------------

--
-- Table structure for table `service_list`
--

CREATE TABLE IF NOT EXISTS `service_list` (
  `serv_id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `companyID` int(32) DEFAULT NULL,
  PRIMARY KEY (`serv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `service_list`
--

INSERT INTO `service_list` (`serv_id`, `name`, `date_added`, `companyID`) VALUES
(1, 'Check tire inflation', '2012-11-05 09:47:34', 0),
(2, 'Check windshield warsher level', '2012-11-05 09:47:41', 0),
(3, 'asdd', '2012-11-05 10:36:23', 7),
(4, 'Check Oil', '2012-11-05 10:37:48', 7),
(5, 'Check Air Filter', '2012-11-05 12:25:26', 7),
(6, 'Check Suspender', '2012-11-05 12:29:28', 7),
(7, 'Check Shock Absobers', '2012-11-05 12:41:29', 7),
(8, 'check oil filter', '2012-11-05 14:41:27', 7),
(10, 'Check the tires', '2012-11-06 15:34:29', 1),
(11, 'Checking the oil filters', '2012-11-08 13:04:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipmentcurrency`
--

CREATE TABLE IF NOT EXISTS `shipmentcurrency` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `CompanyID` bigint(20) NOT NULL,
  `Currency` varchar(20) NOT NULL,
  `DateIn` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `shipmentcurrency`
--

INSERT INTO `shipmentcurrency` (`ID`, `CompanyID`, `Currency`, `DateIn`) VALUES
(1, 1, 'UGX', '2012-11-15 14:11:01'),
(2, 1, 'USD', '2012-11-15 14:11:15'),
(3, 1, 'JPY', '2012-11-15 08:18:51'),
(4, 18, 'USD', '2013-09-19 03:37:38'),
(5, 18, 'UGX', '2013-09-19 03:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE IF NOT EXISTS `shipments` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `CompanyID` bigint(20) NOT NULL,
  `SID` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `ShiperRef` varchar(50) NOT NULL,
  `CarrierRef` varchar(50) NOT NULL,
  `Origin` varchar(100) NOT NULL,
  `Destination` varchar(100) NOT NULL,
  `ETL` varchar(100) NOT NULL,
  `Units` varchar(50) NOT NULL,
  `NOU` varchar(20) NOT NULL,
  `Shiper` varchar(255) NOT NULL,
  `Rate` varchar(100) NOT NULL,
  `RateCurrency` varchar(20) NOT NULL,
  `CDescription` text NOT NULL,
  `Contact` varchar(50) NOT NULL,
  `Consignee` varchar(50) NOT NULL,
  `SpecialInstructions` text NOT NULL,
  `TotalWeight` varchar(100) NOT NULL,
  `UnitLength` varchar(20) NOT NULL,
  `UnitWidth` varchar(20) NOT NULL,
  `UnitHeight` varchar(20) NOT NULL,
  `DateIn` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`ID`, `CompanyID`, `SID`, `Type`, `ShiperRef`, `CarrierRef`, `Origin`, `Destination`, `ETL`, `Units`, `NOU`, `Shiper`, `Rate`, `RateCurrency`, `CDescription`, `Contact`, `Consignee`, `SpecialInstructions`, `TotalWeight`, `UnitLength`, `UnitWidth`, `UnitHeight`, `DateIn`) VALUES
(1, 1, 'ACSP001', 'Import', 'David Bubu', 'Victor Otiti', 'Mombasa', 'Kampala', '12 November, 2012', 'Container', '10', '1', '10000000', 'UGX', 'Bicycles for business', '0757262171', 'Abra Transit Limited', 'Safe driving needed', '50', '12', '2', '2', '2012-11-07 22:09:55'),
(2, 1, 'ACSP002', 'Export', 'Dora Aka', 'Jean Eddie', 'Kampala', 'Juba', '16 November, 2012', 'Bags', '5', '2', '3000000', 'UGX', 'Bags of Cement', '0771412809', 'AKO Transin', 'No water to get in contact', '33', '12', '2', '2', '2012-11-07 23:06:01'),
(3, 2, 'AS3423002', 'Export', '12345', '23456', 'Uganda', 'Kenya', '11 November, 2012', 'tonnes', '', 'Deneza Int', 'Dollars', '', 'For an individual', '0779814133', 'Natalie B', 'Handle with care', '50', '', '', '', '2012-11-08 02:52:39'),
(4, 18, '90001', 'Export', '888999', '2315', 'Mombasa', 'Juba', '9 November, 2012', 'vehicles', 'tractors', '', '101,500', '', 'Construction/Earth moving equipment', 'Daniel Yakushima', 'UNMISS Southern Sudan, JubaJohn Michikawa', 'lashing, exit at Nimule, no weekend departures', '190', '6', '2.5', '2', '2012-11-08 03:09:34'),
(5, 2, 'A2222', 'Import', '56789', '54678', 'DRC', 'Uganda', '22 November, 2012', 'kgs', '', 'Deneza Int', 'Euros', '', 'For a company', '0700313326', 'Basemera N', 'Care pliz!!!', '200', '', '', '', '2012-11-08 03:28:27'),
(6, 1, 'ACSP003', 'Export', 'Natalie Basemera', 'Abraham Taremwa', 'Kampala', 'Kigali', '20 November, 2012', 'Containers', '10', '2', '25000', 'USD', 'Posho', '0757262171', 'Abraham Taremwa', 'No contact with water', '800', '12', '2', '2', '2012-11-08 06:32:29'),
(7, 1, 'ACSP004', 'Import', 'F001', 'D001', 'DRC Congo', 'Kampala', '10 November, 2012', 'Containers', '10', '2', '3000', 'USD', 'Bags of Cement', '0757262171', 'Ash Luwambo', 'Careful driving needed', '1000', '12', '2', '2', '2012-11-08 08:30:02'),
(8, 1, '2323', 'Export', 'gg', '34555', 'kenya', 'uganda', '10:00am', 'Containers', '1', '3', '2600', 'UGX', 'udhneiuded', '256712820434', 'hdnkedjhdned', 'jndhiendeduende', '200', '35', '7', '5', '2013-02-20 01:22:34'),
(9, 18, 'SHIP0321', 'Import', 'ROBERT TUMUSIIME', 'VICTOR ABRAHAM', 'MOMBASA, KENYA', 'BUKOTO, UGANDA', '10:20AM', 'Bags', '2000', '4', '3000', 'USD', 'Bags of cement', 'ABRAHAM BEN', 'SPEDAG INTERFREIGHT', 'No contact with water', '40000', '450', '230', '450', '2013-09-19 03:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `shipmentunits`
--

CREATE TABLE IF NOT EXISTS `shipmentunits` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `CompanyID` bigint(20) NOT NULL,
  `Sunit` varchar(100) NOT NULL,
  `DateIn` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `shipmentunits`
--

INSERT INTO `shipmentunits` (`ID`, `CompanyID`, `Sunit`, `DateIn`) VALUES
(1, 1, 'Containers', '2012-11-15 11:01:24'),
(2, 1, 'Bags', '2012-11-15 11:01:57'),
(3, 1, 'Free', '2012-11-15 08:18:35'),
(4, 18, 'Bags', '2013-09-19 03:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `tct_archive`
--

CREATE TABLE IF NOT EXISTS `tct_archive` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TruckRegNo` varchar(32) NOT NULL,
  `TrackerNo` varchar(20) NOT NULL,
  `CompanyID` int(32) DEFAULT NULL,
  `ContainerNo` varchar(32) DEFAULT NULL,
  `DateLastSeen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateIn` varchar(32) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tires`
--

CREATE TABLE IF NOT EXISTS `tires` (
  `tire_id` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `truck_id` int(32) DEFAULT NULL,
  `make` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `odometer` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `storage` varchar(255) DEFAULT NULL,
  `qty` int(32) DEFAULT NULL,
  `serialnumber` varchar(50) NOT NULL,
  `datebought` date DEFAULT NULL,
  `total` int(32) DEFAULT NULL,
  `vendor` varchar(255) DEFAULT NULL,
  `notes` text,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `company_id` int(32) NOT NULL,
  PRIMARY KEY (`tire_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tires`
--

INSERT INTO `tires` (`tire_id`, `truck_id`, `make`, `model`, `odometer`, `reference`, `storage`, `qty`, `serialnumber`, `datebought`, `total`, `vendor`, `notes`, `date_created`, `company_id`) VALUES
(1, 10, 'chine', 'doct', '', '123', '_STORAGE_', 40, '', '2012-02-04', 40000, 'lulelu', 'good 1sa', '2012-01-28 14:56:27', 0),
(5, 10, 'dave', '', '345', '', '_STORAGE_', 23, '', '1998-03-16', 700000, '', '', '2012-08-27 11:46:24', 0),
(19, 10, '343', '434', '', '4343', 'Not Set', 434, '', '2010-03-05', 433, '343', '343', '2012-09-05 08:28:05', 0),
(4, 11, '', '', '', 'Tom tires', '_STORAGE_', 4, '', '2012-05-05', 300000, 'Spear motors', '', '2012-01-29 07:18:06', 0),
(6, 10, 'tough', 'jose', '', '', '_STORAGE_', 23000, '', '2010-04-01', 670004, '', 'wer', '2012-08-23 08:45:14', 0),
(7, 14, '', '', '', '', '_STORAGE_', 0, '', '1970-01-01', 8000, '', '', '2012-02-20 09:32:21', 0),
(8, 14, '', '', '', '', '_STORAGE_', 0, '', '1970-01-01', 8000, '', '', '2012-02-20 09:32:56', 0),
(18, 189, '0', '0', '', '0', 'Not Set', 0, '', '0000-00-00', 0, 'NOT SET', '0', '2012-08-31 08:14:36', 0),
(14, 101, 'china', 'babyprdct7', '', 'hhm', '_STORAGE_', 4, '', '2012-01-01', 7890000, 'SHELL BUGOLOBBI', '', '2012-07-01 04:47:27', 0),
(11, 11, 'china', 'Bulaya', '', '123', '_STORAGE_', 4, '', '2012-02-04', 7890000, 'SHELL KADENGE', '', '2012-03-21 13:44:25', 0),
(12, 11, 'china', 'Bulaya', '', '123', '_STORAGE_', 4, '', '2012-02-04', 7890000, 'SHELL KADENGE', '', '2012-03-21 13:44:52', 0),
(15, 10, 'sdsdsd', 'sdsdsd', '', 'sds', '', 450, '', '0000-00-00', 340, 'dsdsd', 'sdsdsdsd', '2012-08-19 06:21:35', 0),
(16, 9, '43', '34', '', '677', '', 444, '', '0000-00-00', 4343, '43', '34343', '2012-08-23 09:03:37', 0),
(17, 9, 'rt', 'rtr', '', 'r', '', 0, '', '2008-04-06', 0, 'tr', 'rtrt', '2012-08-23 09:10:51', 0),
(20, 178, 'fsdfas', 'sdfsad', NULL, '2', 'Not Set', 2, '', '0000-00-00', 2, 'sadfads', 'sadfass', '2012-09-11 12:29:21', 0),
(21, 178, 'fasdfa', 'afdasf', NULL, '2', 'Not Set', 2, '', '0000-00-00', 2, '2', 'wefaesddfads', '2012-09-11 12:33:29', 0),
(22, 201, '343', '434', NULL, 'sds', 'Not Set', 343, '', '2011-02-02', 3434, '3434', '434', '2012-09-11 15:58:47', 0),
(23, 201, '3434', '343', NULL, '988090', 'Not Set', 343, '', '2010-02-03', 3434, '3434', 'w4545', '2012-09-11 16:00:35', 4),
(24, 199, 'Truck tire', '2008', '20000', 'DSKJFIOE', 'Not Set', 2, 'dfsfdafadfsafa', '2011-02-01', 800000, 'City tires', 'werqwerqwe', '2012-11-15 13:25:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trackers`
--

CREATE TABLE IF NOT EXISTS `trackers` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `SimNo` varchar(20) NOT NULL,
  `SerialNo` varchar(50) NOT NULL,
  `DateIn` varchar(50) NOT NULL,
  `Status` enum('Available','Not available') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `trackers`
--

INSERT INTO `trackers` (`ID`, `SimNo`, `SerialNo`, `DateIn`, `Status`) VALUES
(1, '+256750383775', '350009676534', '2012-09-16 09:11:33', 'Not available'),
(3, '+256772712899', '760009676538', '2012-09-16 09:31:52', 'Not available'),
(4, '+256704148363', '034543870538', '2012-09-16 09:32:19', 'Available'),
(6, '+256716262565', '503953003453', '2012-09-16 14:08:00', 'Available'),
(7, '+256755814555', '332524543524', '2012-09-16 14:08:22', 'Available'),
(8, '+256757262171', '832409928932', '2012-09-16 15:11:33', 'Available'),
(9, '+256771412809', '983034899034', '2012-09-16 10:15:16', 'Available'),
(10, '+256700313326', '987867547865', '2012-09-21 08:11:47', 'Not available'),
(11, '+256701141363', '76788765546', '2012-09-26 01:01:08', 'Not available'),
(12, '+256704148363', '00002031', '2013-09-19 03:18:44', 'Not available');

-- --------------------------------------------------------

--
-- Table structure for table `truckcargotraker`
--

CREATE TABLE IF NOT EXISTS `truckcargotraker` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TruckID` int(32) NOT NULL,
  `TrackerID` bigint(20) NOT NULL,
  `CompanyID` int(32) DEFAULT NULL,
  `ContainerID` varchar(32) DEFAULT NULL,
  `DateLastSeen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `truckcargotraker`
--

INSERT INTO `truckcargotraker` (`ID`, `TruckID`, `TrackerID`, `CompanyID`, `ContainerID`, `DateLastSeen`) VALUES
(3, 208, 3, 15, '0', '2012-11-01 13:39:56'),
(4, 209, 4, 15, '0', '2012-11-01 13:39:56'),
(5, 210, 5, 18, '0', '2012-11-01 13:39:56'),
(6, 214, 6, 18, '0', '2013-09-19 07:44:41');

-- --------------------------------------------------------

--
-- Table structure for table `trucks`
--

CREATE TABLE IF NOT EXISTS `trucks` (
  `truck_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `driver_id` int(255) NOT NULL DEFAULT '0',
  `trackerId` int(11) NOT NULL,
  `regnumber` varchar(32) DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL,
  `Status` enum('Available','Not available') NOT NULL DEFAULT 'Available',
  `enginenumber` varchar(255) DEFAULT NULL,
  `datebought` date DEFAULT NULL,
  `datesold` date DEFAULT NULL,
  `allowedcargo` text,
  `description` text,
  `systemstatus` varchar(32) DEFAULT NULL,
  `make` varchar(30) DEFAULT NULL,
  `colour` varchar(50) NOT NULL,
  `country` varchar(255) DEFAULT NULL,
  `sellcomm` text,
  `soldto` varchar(255) DEFAULT NULL,
  `tlength` varchar(255) DEFAULT NULL,
  `wheelbase` varchar(255) DEFAULT NULL,
  `permit` date DEFAULT NULL,
  `theight` varchar(25) DEFAULT NULL,
  `twidth` varchar(25) DEFAULT NULL,
  `chasisno` varchar(255) DEFAULT NULL,
  `tyresize` varchar(255) DEFAULT NULL,
  `tyreno` varchar(255) DEFAULT NULL,
  `maint` varchar(255) DEFAULT NULL,
  `curmileage` varchar(255) DEFAULT NULL,
  `survinterval` varchar(255) DEFAULT NULL,
  `odometer` varchar(255) DEFAULT NULL,
  `gsweight` varchar(255) DEFAULT NULL,
  `driver` varchar(46) DEFAULT NULL,
  `location` varchar(25) DEFAULT NULL,
  `model` varchar(25) DEFAULT NULL,
  `engsize` varchar(30) DEFAULT NULL,
  `cylinder` varchar(35) DEFAULT NULL,
  `trans` varchar(35) DEFAULT NULL,
  `fueltype` varchar(35) DEFAULT NULL,
  `notes` text,
  `fuelfil` varchar(35) DEFAULT NULL,
  `airfilt` varchar(35) DEFAULT NULL,
  `transfil` varchar(35) DEFAULT NULL,
  `transoil` varchar(35) DEFAULT NULL,
  `gweight` varchar(23) DEFAULT NULL,
  `durable` varchar(35) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `type` varchar(70) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `regdate` date DEFAULT NULL,
  `state` varchar(70) DEFAULT NULL,
  `mileage` varchar(45) DEFAULT NULL,
  `dealer` varchar(45) DEFAULT NULL,
  `odoqui` varchar(255) DEFAULT NULL,
  `purchasecomment` varchar(45) DEFAULT NULL,
  `licerefer` varchar(25) DEFAULT NULL,
  `licenote` text,
  `ownership` varchar(100) DEFAULT NULL,
  `cargoweight` varchar(32) DEFAULT NULL,
  `cargolength` varchar(32) DEFAULT NULL,
  `cargowidth` varchar(32) DEFAULT NULL,
  `cargoheight` varchar(32) DEFAULT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `inscompany` varchar(50) DEFAULT NULL,
  `insurer` varchar(255) DEFAULT NULL,
  `show_ins_on` date DEFAULT NULL,
  `insnum` varchar(32) DEFAULT NULL,
  `insday` varchar(32) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `deductible` varchar(255) DEFAULT NULL,
  `insrefer` varchar(35) DEFAULT NULL,
  `policy` varchar(50) DEFAULT NULL,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `puchdate` date DEFAULT NULL,
  `puchfrom` varchar(255) DEFAULT NULL,
  `warrdate` date DEFAULT NULL,
  `endlicedate` date DEFAULT NULL,
  `licedate` date DEFAULT NULL,
  `show_lice_on` date DEFAULT NULL,
  `liceno` varchar(32) DEFAULT NULL,
  `nums` int(30) DEFAULT NULL,
  `liceday` varchar(255) DEFAULT NULL,
  `insnotes` text,
  PRIMARY KEY (`truck_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=215 ;

--
-- Dumping data for table `trucks`
--

INSERT INTO `trucks` (`truck_id`, `driver_id`, `trackerId`, `regnumber`, `company_id`, `Status`, `enginenumber`, `datebought`, `datesold`, `allowedcargo`, `description`, `systemstatus`, `make`, `colour`, `country`, `sellcomm`, `soldto`, `tlength`, `wheelbase`, `permit`, `theight`, `twidth`, `chasisno`, `tyresize`, `tyreno`, `maint`, `curmileage`, `survinterval`, `odometer`, `gsweight`, `driver`, `location`, `model`, `engsize`, `cylinder`, `trans`, `fueltype`, `notes`, `fuelfil`, `airfilt`, `transfil`, `transoil`, `gweight`, `durable`, `price`, `type`, `file`, `image2`, `image`, `regdate`, `state`, `mileage`, `dealer`, `odoqui`, `purchasecomment`, `licerefer`, `licenote`, `ownership`, `cargoweight`, `cargolength`, `cargowidth`, `cargoheight`, `datecreated`, `inscompany`, `insurer`, `show_ins_on`, `insnum`, `insday`, `payment`, `deductible`, `insrefer`, `policy`, `startdate`, `enddate`, `puchdate`, `puchfrom`, `warrdate`, `endlicedate`, `licedate`, `show_lice_on`, `liceno`, `nums`, `liceday`, `insnotes`) VALUES
(189, 39, 0, 'UAP 0001P                       ', 0, 'Available', 'dsd', '0000-00-00', '0000-00-00', 'NOT SET', '', 'Inactive', 'sds', 'NOT SET', '', '', '', '', '', '0000-00-00', '', '', 'sd', 'sdsd', 'sdsd', '', '', '', '', '', '0', 'NOT SET', 'sds', 'sdds', '', '', 'Diesel', '', '', '', '', '', '', '', 'NOT SET', 'Police Car', '', '', '1346396172.JPG', '0000-00-00', '', '', '', '0', '', 'NOT SET', '', 'NOT SET', '0', '0', '0', '0', '2012-09-10 13:07:38', 'NOT SET', 'NOT SET', '0000-00-00', '0', 'NOT SET', '', '', 'NOT SET', '', '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0', 0, 'NOT SET', 'NOT SET'),
(178, 36, 0, 'QER 678Y', 0, 'Available', 'sdf', '2012-01-02', '0000-00-00', '', 'hggfghjgh', '', 'sfds', '', '', '', '', '', '', '0000-00-00', '', '', 'dfsd', 'sdfdf', 'fdsfs', '', '', '', '', '', '', '', 'vxdfg', 'sdfs', '', '', 'Petrol', '', '', '', '', '', '', '', '', 'Truck', '', '', '1347352871.jpg', '0000-00-00', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '2012-09-11 12:41:11', '', '', '0000-00-00', '0', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0', 0, '', ''),
(212, 12, 0, 'UAN 894M', 1, 'Not available', 'SVG50-56884433', '2010-05-10', '0000-00-00', 'Array', '', 'Active', 'VISTA', 'SILVER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'V35677', '16', '4', NULL, NULL, NULL, NULL, NULL, '0', 'NOT SET', '2000', '2000CC', NULL, NULL, 'Petrol', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT SET', 'Service Vechicle', NULL, NULL, '1352372091.jpg', NULL, NULL, NULL, NULL, 'NOT SET', 'NOT SET', 'NOT SET', '', 'NOT SET', 'NOT SET', 'NOT SET', 'NOT SET', 'NOT SET', '2012-11-08 11:39:01', 'NOT SET', 'NOT SET', '0000-00-00', 'NOT SET', 'NOT SET', NULL, NULL, 'NOT SET', NULL, '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', NULL, 'NOT SET', 'NOT SET'),
(213, 34, 0, 'UAR 208P                        ', 1, 'Not available', 'WO9999', '2008-01-10', '0000-00-00', 'NOT SET', 'Heavy load carrier', 'Active', 'Mercedes Benz', 'White', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'CH5555', '14', '26', NULL, '23000', NULL, NULL, NULL, '0', 'NOT SET', '2000', '3700', NULL, NULL, 'Petrol', NULL, NULL, NULL, NULL, NULL, '1800', NULL, 'NOT SET', 'Truck', NULL, NULL, '1352379521.jpg', NULL, NULL, NULL, NULL, 'NOT SET', 'NOT SET', 'NOT SET', '', 'Company', 'NOT SET', 'NOT SET', 'NOT SET', 'NOT SET', '2012-11-08 13:46:19', 'NOT SET', 'NOT SET', '0000-00-00', 'NOT SET', 'NOT SET', NULL, NULL, 'NOT SET', NULL, '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', NULL, 'NOT SET', 'NOT SET'),
(187, 2, 0, 'QWER 65789Y', 0, 'Available', 'df', '0000-00-00', '0000-00-00', 'NOT SET', '', 'Active', 'sfdf', 'NOT SET', '', '', '', '', '', '0000-00-00', '', '', 'df', 'df', 'sdf', '', '', '', '', '', '0', 'NOT SET', 'e43', 'dsf', '', '', 'Diesel', '', '', '', '', '', '', '', 'NOT SET', 'Truck', '', '', '', '0000-00-00', '', '', '', '0', '', 'NOT SET', '', 'NOT SET', '0', '0', '0', '0', '2012-09-05 08:55:46', 'NOT SET', 'NOT SET', '0000-00-00', '0', 'NOT SET', '', '', 'NOT SET', '', '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0', 0, 'NOT SET', 'NOT SET'),
(94, 31, 0, 'AAH 545G                        ', 2, 'Not available', '434599                                     ', '2003-05-30', '0000-00-00', 'Pil', 'that and', 'Active', '', '', '', '', 'Abraham', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '_DRIVER_', '_LOCATION_', 'model 34                 ', 'cddd', '', '', 'Petrol', '', '', '', '', '', '', '', '300 000 000', 'Limousine', '', '', '1345467301.JPG', '0000-00-00', '', '', '', '0', '                                  ', '', '', 'Mine', '50', '70', '40', '10', '2012-11-08 08:15:41', '', 'WBS', '1969-12-31', '12', 'week', '', '', '', '', '1970-01-01', '2010-09-03', '1970-01-01', '', '1970-01-01', '1970-01-01', '1970-01-01', '1969-12-31', '15', 0, 'year', ''),
(158, 0, 0, 'UQQ 4567', 0, 'Available', '', '2009-02-02', '0000-00-00', '', '', 'Inactive', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '343', '', '', '', 'Diesel', '', '', '', '', '', '', '', '', 'N/D', '', '', 'Truck_2d10f60e35e2e5825ae7ff1d77b5f55a.JPG', '0000-00-00', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '2012-11-08 11:26:45', '', '', '0000-00-00', '1', 'day', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '1', 0, 'day', ''),
(173, 32, 0, 'LOT 4567', 2, 'Not available', '', '2012-01-02', '0000-00-00', '', '', 'Active', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Petrol', '', '', '', '', '', '', '', '', 'Truck', '', '', '1345886673.jpg', '0000-00-00', '', '', '', '0', '', '', '', '', '0', '0', '0', '0', '2012-11-08 08:31:11', '', '', '2012-08-25', '0', '', '', '', '', '', '0000-00-00', '2012-12-18', '0000-00-00', '', '0000-00-00', '2012-12-19', '1997-02-17', '2012-08-25', '0', 0, '', ''),
(200, 16, 0, 'QER 678Y', 4, 'Available', '3', '2012-01-03', '0000-00-00', 'NOT SET', '', 'Active', '3434', 'blue', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '343', '4343', '444', NULL, NULL, NULL, NULL, NULL, '0', 'NOT SET', '343', '3434', NULL, NULL, 'Petrol', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT SET', 'Truck', NULL, NULL, '1347362515.jpg', NULL, NULL, NULL, NULL, 'NOT SET', '', 'NOT SET', '', 'NOT SET', 'NOT SET', 'NOT SET', 'NOT SET', 'NOT SET', '2012-09-11 15:50:58', 'NOT SET', 'NOT SET', '0000-00-00', 'NOT SET', 'NOT SET', NULL, NULL, 'NOT SET', NULL, '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', NULL, 'NOT SET', 'NOT SET'),
(199, 33, 0, 'UAM 111T', 1, 'Not available', '23412SF', '2011-02-02', '0000-00-00', 'NOT SET', 'thats \r\n', 'Active', '3434', 'blue', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dfsd', '4343', 'fdsfs', NULL, NULL, NULL, NULL, NULL, '0', 'NOT SET', '343', '3434', NULL, NULL, 'Petrol', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT SET', 'Truck', NULL, NULL, '1347362684.jpg', NULL, NULL, NULL, NULL, 'NOT SET', '', 'NOT SET', '', 'NOT SET', 'NOT SET', 'NOT SET', 'NOT SET', 'NOT SET', '2013-02-20 06:29:17', 'NOT SET', 'NOT SET', '0000-00-00', 'NOT SET', 'NOT SET', NULL, NULL, 'NOT SET', NULL, '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', NULL, 'NOT SET', 'NOT SET'),
(201, 0, 0, 'UAR 567P', 1, 'Available', '43243WF', '2012-01-02', '0000-00-00', 'NOT SET', '', 'Active', '3434', 'blue', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '343', '4343', '444', NULL, NULL, NULL, NULL, NULL, '0', 'NOT SET', '343', '3434', NULL, NULL, 'Petrol', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT SET', 'Trailer Van', NULL, NULL, '1347362661.jpg', NULL, NULL, NULL, NULL, 'NOT SET', '', 'NOT SET', '', 'NOT SET', '56', '78', 'NOT SET', 'NOT SET', '2012-11-08 11:26:45', 'NOT SET', 'NOT SET', '0000-00-00', 'NOT SET', 'NOT SET', NULL, NULL, 'NOT SET', NULL, '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', NULL, 'NOT SET', 'NOT SET'),
(202, 0, 1, 'UAP 200T', 1, 'Available', '79DJkd90', '2012-05-10', '0000-00-00', 'NOT SET', 'Heavy duty machine for goods transit', 'Active', 'Mercedes Benz', 'Gray', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3JD8L', '36', '24', NULL, NULL, NULL, NULL, NULL, '0', 'NOT SET', '2000', '4000', NULL, NULL, 'Petrol', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT SET', 'Truck', NULL, NULL, '1347434345.JPG', NULL, NULL, NULL, NULL, 'NOT SET', '', 'NOT SET', '', 'TAB NET MEDIA', 'NOT SET', 'NOT SET', 'NOT SET', 'NOT SET', '2013-02-20 06:12:28', 'NOT SET', 'NOT SET', '0000-00-00', 'NOT SET', 'NOT SET', NULL, NULL, 'NOT SET', NULL, '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', NULL, 'NOT SET', 'NOT SET'),
(204, 22, 0, 'UAN 894M', 8, 'Available', '123454', '2010-05-05', '0000-00-00', 'NOT SET', 'Very Nice Car. I love it.', 'Active', 'Toyota', 'Silver', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6635747', '23', '4', NULL, NULL, NULL, NULL, NULL, '0', 'NOT SET', 'Vista', '2000cc', NULL, NULL, 'Petrol', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT SET', 'Service Vechicle', NULL, NULL, '1347442584.jpg', NULL, NULL, NULL, NULL, 'NOT SET', '', 'NOT SET', '', 'Personal', 'NOT SET', 'NOT SET', 'NOT SET', 'NOT SET', '2012-09-12 10:36:46', 'NIC', 'NIC', '0000-00-00', 'NOT SET', 'NOT SET', NULL, NULL, '12345', NULL, '2012-03-12', '2012-11-10', '0000-00-00', 'NOT SET', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', NULL, 'NOT SET', 'To be paid'),
(205, 23, 0, 'UPQ 674P', 10, 'Available', '45454455', '1997-04-18', '0000-00-00', 'NOT SET', '', 'Active', 'china', 'Red', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '454545', '43', '45', NULL, NULL, NULL, NULL, NULL, '0', 'NOT SET', '343', '23234', NULL, NULL, 'Petrol', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT SET', 'Trailer Van', NULL, NULL, '1347447973.JPG', NULL, NULL, NULL, NULL, 'NOT SET', '', 'NOT SET', '', 'NOT SET', '78', '77', '54', '66', '2012-09-13 04:46:50', 'NOT SET', 'NOT SET', '0000-00-00', 'NOT SET', 'NOT SET', NULL, NULL, 'NOT SET', NULL, '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', NULL, 'NOT SET', 'NOT SET'),
(206, 24, 0, 'UAE PW748', 10, 'Available', '4332', '1999-03-18', '0000-00-00', 'NOT SET', '', 'Active', 'Germany', 'Greenish', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '43', '45', '33', NULL, NULL, NULL, NULL, NULL, '0', 'NOT SET', '333 JIO', '4333', NULL, NULL, 'Diesel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT SET', 'Truck', NULL, NULL, '1347449536.jpg', NULL, NULL, NULL, NULL, 'NOT SET', '', 'NOT SET', '', 'NOT SET', 'NOT SET', 'NOT SET', 'NOT SET', 'NOT SET', '2012-09-13 04:44:17', 'NOT SET', 'NOT SET', '0000-00-00', 'NOT SET', 'NOT SET', NULL, NULL, 'NOT SET', NULL, '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', NULL, 'NOT SET', 'NOT SET'),
(207, 0, 0, 'UAS 456L', 8, 'Available', '123454', '2002-04-15', '0000-00-00', 'NOT SET', '', 'Inactive', 'Lincoln', 'White', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6635747', '23', '4', NULL, NULL, NULL, NULL, NULL, '0', 'NOT SET', 'V8', '2000cc', NULL, NULL, 'Diesel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT SET', 'Limousine', NULL, NULL, '1347528180.jpg', NULL, NULL, NULL, NULL, 'NOT SET', '', 'NOT SET', '', 'Company', 'NOT SET', 'NOT SET', 'NOT SET', 'NOT SET', '2012-09-13 09:23:00', 'NOT SET', 'NOT SET', '0000-00-00', 'NOT SET', 'NOT SET', NULL, NULL, 'NOT SET', NULL, '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', NULL, 'NOT SET', 'NOT SET'),
(208, 30, 3, 'CE 705A', 15, 'Not available', '6D40', '0000-00-00', '0000-00-00', 'NOT SET', 'Silver body', 'NOT SET', 'Mitsubishi', 'Maroon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FU41', '12R22.5', '10', NULL, NULL, NULL, NULL, NULL, '0', 'NOT SET', '1997', '34000CC', NULL, NULL, 'Diesel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT SET', 'Truck', NULL, NULL, '1348229780.jpg', NULL, NULL, NULL, NULL, 'NOT SET', '', 'NOT SET', '', 'NOT SET', 'NOT SET', 'NOT SET', 'NOT SET', 'NOT SET', '2012-11-07 14:36:17', 'NOT SET', 'NOT SET', '0000-00-00', 'NOT SET', 'NOT SET', NULL, NULL, 'NOT SET', NULL, '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', NULL, 'NOT SET', 'NOT SET'),
(209, 0, 4, 'CGO', 15, 'Available', '6D24', '0000-00-00', '0000-00-00', 'NOT SET', 'Maroon box body', 'NOT SET', 'Mitsubishi', 'Maroon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FU41', '12R22.5', '10', NULL, NULL, NULL, NULL, NULL, '0', 'NOT SET', '1997', '34000CC', NULL, NULL, 'Diesel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT SET', 'Truck', NULL, NULL, '1348229865.jpg', NULL, NULL, NULL, NULL, 'NOT SET', '', 'NOT SET', '', 'NOT SET', 'NOT SET', 'NOT SET', 'NOT SET', 'NOT SET', '2012-09-21 12:19:24', 'NOT SET', 'NOT SET', '0000-00-00', 'NOT SET', 'NOT SET', NULL, NULL, 'NOT SET', NULL, '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', NULL, 'NOT SET', 'NOT SET'),
(210, 29, 5, 'UAP 973L', 18, 'Not available', '34566', '2003-02-17', '0000-00-00', 'sugar, petroleum products', '', 'Active', 'Japan', 'White', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '332', '24', '33', NULL, NULL, NULL, NULL, NULL, '0', 'NOT SET', 'X95049M', '23456', NULL, NULL, 'Diesel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT SET', 'Truck', NULL, NULL, '1348643837.jpg', NULL, NULL, NULL, NULL, 'NOT SET', '', 'NOT SET', '', 'NOT SET', '23,000', 'NOT SET', 'NOT SET', 'NOT SET', '2012-11-08 08:19:48', 'NOT SET', 'NOT SET', '0000-00-00', 'NOT SET', 'NOT SET', NULL, NULL, 'NOT SET', NULL, '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', NULL, 'NOT SET', 'NOT SET'),
(214, 27, 6, 'UAT 014V', 18, 'Not available', 'DSX43334', '2013-06-17', '0000-00-00', 'NOT SET', 'Good truck on the road.', 'Active', 'Mercedes Benz', 'White', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'EFS32432', '18', '26', NULL, NULL, NULL, NULL, NULL, '0', 'NOT SET', '2004', '4000', NULL, NULL, 'Diesel', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'NOT SET', 'Truck', NULL, NULL, '1379575686.jpg', NULL, NULL, NULL, NULL, 'NOT SET', 'NOT SET', 'SDFF233', 'xxx', 'Abraham Taremwa', '30', '30', '30', '30', '2013-09-19 07:44:41', 'NOT SET', 'NOT SET', '0000-00-00', 'NOT SET', 'NOT SET', NULL, NULL, 'NOT SET', NULL, '0000-00-00', '0000-00-00', '0000-00-00', 'NOT SET', '0000-00-00', '2013-05-14', '2011-02-18', '0000-00-00', 'NOT SET', NULL, 'NOT SET', 'NOT SET');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Level` set('1','2','3') NOT NULL DEFAULT '2',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `FirstName`, `LastName`, `Phone`, `Email`, `Username`, `Password`, `Level`) VALUES
(1, 'Taremwa', 'Abraham', '+256757262171', 'taremwaabraham@gmail.com', 'admin', '704b037a97fa9b25522b7c014c300f8a', '1'),
(2, 'Basemera', 'Natalie', '+256779814133', 'nbasemera@gmail.com', 'nattie', '4124bc0a9335c27f086f24ba207a4912', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
