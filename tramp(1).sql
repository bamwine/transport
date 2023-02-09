-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2017 at 05:43 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tramp`
--
CREATE DATABASE IF NOT EXISTS `tramp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tramp`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adm_id` int(100) NOT NULL AUTO_INCREMENT,
  `adm_name` varchar(100) NOT NULL,
  `adm_pass` varchar(100) NOT NULL,
  `user_nad` varchar(100) NOT NULL DEFAULT 'Admin',
  `adm_email` varchar(100) NOT NULL,
  `adm_phone` varchar(100) NOT NULL,
  `adm_loca` varchar(100) NOT NULL,
  `adm_lev` int(100) NOT NULL,
  PRIMARY KEY (`adm_id`),
  KEY `adm_lev` (`adm_lev`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `adm_name`, `adm_pass`, `user_nad`, `adm_email`, `adm_phone`, `adm_loca`, `adm_lev`) VALUES
(1, 'tumwesigye', 'bams', 'Admin', 'tumwesigye@gmail.com', '0789105998', 'Ndejje', 8);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `cl_id` int(100) NOT NULL AUTO_INCREMENT,
  `cl_nam` varchar(100) NOT NULL,
  `cl_tep` varchar(100) NOT NULL,
  `cl_stag` int(100) NOT NULL,
  `cl_paswd` varchar(100) NOT NULL,
  `cl_usna` varchar(100) NOT NULL,
  `cl_leve` int(100) NOT NULL,
  `cl_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cl_car_no` varchar(100) NOT NULL DEFAULT 'NONE',
  PRIMARY KEY (`cl_id`),
  UNIQUE KEY `cl_id_2` (`cl_id`),
  KEY `cl_leve` (`cl_leve`),
  KEY `cl_stag` (`cl_stag`),
  KEY `cl_leve_2` (`cl_leve`),
  KEY `cl_id` (`cl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`cl_id`, `cl_nam`, `cl_tep`, `cl_stag`, `cl_paswd`, `cl_usna`, `cl_leve`, `cl_date`, `cl_car_no`) VALUES
(6, 'NNN', '08089', 2, 'VVVV', 'HHH', 7, '2017-03-20 11:34:02', ''),
(7, 'XX', 'XX', 2, 'XX', 'XXX', 6, '2017-03-22 18:52:12', ''),
(8, 'SEWANYANA DERRICK', '0781657478', 2, 'BBB', 'BBB', 7, '2017-03-25 08:26:12', 'none'),
(9, 'VVV', '6777', 2, 'VVV', 'VV', 6, '2017-03-28 11:30:55', 'UGSDD'),
(10, 'BAMS', 'BAMS', 3, 'BAMS', 'BAMS', 6, '2017-03-28 12:21:05', ' 89000'),
(11, 'STRTOUPPER', 'STRTOUPPER', 3, 'STRTOUPPER', 'STRTOUPPER', 6, '2017-03-28 12:25:36', ' STRTOUPPER'),
(12, 'STAGES', 'STAGES', 3, 'STAGES', 'STAGES', 6, '2017-03-28 12:42:40', ' STAGES');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
  `com_id` int(100) NOT NULL AUTO_INCREMENT,
  `com_user` int(100) NOT NULL,
  `com_quest` varchar(100) NOT NULL,
  `com_type` int(100) NOT NULL,
  `com_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `com_status` varchar(100) DEFAULT 'NO',
  PRIMARY KEY (`com_id`),
  KEY `com_type` (`com_type`),
  KEY `com_user` (`com_user`),
  KEY `com_user_2` (`com_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`com_id`, `com_user`, `com_quest`, `com_type`, `com_date`, `com_status`) VALUES
(1, 6, 'JJJJ', 1, '2017-03-21 21:37:33', 'YES'),
(2, 6, 'NNN', 1, '2017-03-24 08:19:48', 'NO'),
(8, 6, 'BAMWUNEv', 1, '2017-03-24 16:54:11', 'YES'),
(9, 6, 'BBB', 1, '2017-03-24 17:01:08', 'NO'),
(10, 6, 'THEY STOLE MY MONEY FROM HERE', 2, '2017-03-25 11:28:22', 'YES'),
(11, 7, ' WE LACK GOOD ROADS', 1, '2017-03-25 11:56:24', 'YES'),
(12, 12, 'VVVV', 1, '2017-03-28 16:01:30', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `complain_types`
--

CREATE TABLE IF NOT EXISTS `complain_types` (
  `cop_id` int(100) NOT NULL AUTO_INCREMENT,
  `cop_type` varchar(100) NOT NULL,
  PRIMARY KEY (`cop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `complain_types`
--

INSERT INTO `complain_types` (`cop_id`, `cop_type`) VALUES
(1, 'ROADS'),
(2, 'THEFTY');

-- --------------------------------------------------------

--
-- Table structure for table `com_response`
--

CREATE TABLE IF NOT EXISTS `com_response` (
  `com_rid` int(100) NOT NULL AUTO_INCREMENT,
  `com_cop_id` int(100) NOT NULL,
  `com_rans` varchar(100) NOT NULL,
  `com_rdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`com_rid`),
  KEY `com_user` (`com_cop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `com_response`
--

INSERT INTO `com_response` (`com_rid`, `com_cop_id`, `com_rans`, `com_rdate`) VALUES
(2, 1, 'FFF', '2017-03-23 19:04:53'),
(3, 1, 'VVV', '2017-03-23 19:05:22'),
(4, 1, 'FFFF', '2017-03-23 19:08:55'),
(5, 8, 'GGGG', '2017-03-24 14:53:26'),
(6, 10, 'BY WHICH TAXI REGISTRATION NUMBER AND FROM WHICH ROAD AND PLACE', '2017-03-25 08:31:10'),
(7, 11, 'WE SHALL COME AND INSPECT', '2017-03-25 09:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE IF NOT EXISTS `stages` (
  `st_id` int(100) NOT NULL AUTO_INCREMENT,
  `st_name` varchar(100) NOT NULL,
  PRIMARY KEY (`st_id`),
  UNIQUE KEY `st_name` (`st_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `stages`
--

INSERT INTO `stages` (`st_id`, `st_name`) VALUES
(3, 'bams'),
(2, 'NDEJJE');

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE IF NOT EXISTS `suggestion` (
  `sgg_id` int(100) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `sgg_user` int(100) NOT NULL,
  `sgg_quest` varchar(100) NOT NULL,
  `sgg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sgg_status` varchar(100) DEFAULT 'NOT YET',
  PRIMARY KEY (`sgg_id`),
  KEY `com_user` (`sgg_user`),
  KEY `com_user_2` (`sgg_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`sgg_id`, `sgg_user`, `sgg_quest`, `sgg_date`, `sgg_status`) VALUES
(2, 6, 'I WOULD LIKEk', '2017-03-21 22:41:36', 'NOT YET'),
(3, 7, 'THEY SHOULD PUT FOR US HUMPS ON THIS ROAD', '2017-03-25 11:57:23', 'NOT YET');

-- --------------------------------------------------------

--
-- Table structure for table `user_levels`
--

CREATE TABLE IF NOT EXISTS `user_levels` (
  `usr_id` int(100) NOT NULL AUTO_INCREMENT,
  `usr_leve` varchar(100) NOT NULL DEFAULT 'LOWER',
  PRIMARY KEY (`usr_id`),
  UNIQUE KEY `usr_leve` (`usr_leve`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `user_levels`
--

INSERT INTO `user_levels` (`usr_id`, `usr_leve`) VALUES
(8, 'KOTSA'),
(6, 'LOWER'),
(7, 'STAGE GUIDE');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`adm_lev`) REFERENCES `user_levels` (`usr_id`) ON UPDATE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`cl_leve`) REFERENCES `user_levels` (`usr_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `clients_ibfk_2` FOREIGN KEY (`cl_stag`) REFERENCES `stages` (`st_id`) ON UPDATE CASCADE;

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`com_user`) REFERENCES `clients` (`cl_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `complaints_ibfk_2` FOREIGN KEY (`com_type`) REFERENCES `complain_types` (`cop_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `com_response`
--
ALTER TABLE `com_response`
  ADD CONSTRAINT `com_response_ibfk_1` FOREIGN KEY (`com_cop_id`) REFERENCES `complaints` (`com_id`) ON UPDATE CASCADE;

--
-- Constraints for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD CONSTRAINT `suggestion_ibfk_1` FOREIGN KEY (`sgg_user`) REFERENCES `clients` (`cl_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
