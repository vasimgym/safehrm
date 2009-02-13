-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 13, 2009 at 02:37 PM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `duplacement`
--

-- --------------------------------------------------------

--
-- Table structure for table `dup_admin`
--

CREATE TABLE IF NOT EXISTS `dup_admin` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) NOT NULL,
  `user_pass` varchar(60) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_class` varchar(60) NOT NULL,
  `user_permission` varchar(60) NOT NULL,
  `user_created` date NOT NULL,
  `user_mobile` varchar(30) NOT NULL DEFAULT 'NO',
  `user_status` char(10) NOT NULL DEFAULT 'active',
  `expirytime` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `dup_admin`
--

INSERT INTO `dup_admin` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_class`, `user_permission`, `user_created`, `user_mobile`, `user_status`, `expirytime`) VALUES
(72, 'superadmin', 'superadmin', 'superadmin@sdfs.com', 'superadmin', '', '2008-06-06', '', 'active', '2009-01-09'),
(93, '', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(94, '', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(95, '', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(96, '', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(97, '', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(98, 'aa', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(99, 'admin', 'admin', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(100, '', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(101, '', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(102, '', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(103, '', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(104, '', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(105, '', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(106, '', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(107, '', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(108, '', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(109, '', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(110, '', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(111, '', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(112, '', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(113, '', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(114, '', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `dup_coursetypes`
--

CREATE TABLE IF NOT EXISTS `dup_coursetypes` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `coursename` varchar(40) NOT NULL DEFAULT '',
  `pid` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `dup_coursetypes`
--

INSERT INTO `dup_coursetypes` (`id`, `coursename`, `pid`) VALUES
(1, 'ugcourses', 0),
(2, 'pgcourses', 0),
(3, 'postpgcourses', 0),
(5, 'C.S', 2),
(6, 'MPHIL', 3),
(7, 'B.A', 1),
(11, 'B. Sc.', 1),
(12, 'CA', 2),
(14, 'PHD', 3),
(15, 'Ph. D/Doctrate', 3),
(16, 'B.Arch', 1),
(17, 'BCA', 1),
(18, 'B.B.A', 1),
(19, 'B.Com', 1),
(20, 'B.Ed', 1),
(21, 'BDS', 1),
(22, 'BHM', 1),
(23, 'B.Pharma', 1),
(24, 'B.Tech/B.E.', 1),
(25, 'LLB', 1),
(26, 'MBBS', 1),
(27, 'Diploma', 1),
(28, 'BVSC', 1),
(29, 'Other', 1),
(30, 'ICWA', 2),
(31, 'Integrated PG', 2),
(32, 'LLM', 2),
(33, 'M.A', 2),
(34, 'M.Arch', 2),
(35, 'M.Com', 2),
(36, 'M.Ed', 2),
(37, 'M.Pharma', 2),
(38, 'M.Sc', 2),
(39, 'M.Tech', 2),
(40, 'MBA/PGDM', 2),
(41, 'MCA', 2),
(42, 'MS', 2),
(43, 'PG Diploma', 2),
(44, 'MVSC', 2),
(45, 'MCM', 2),
(46, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dup_industry`
--

CREATE TABLE IF NOT EXISTS `dup_industry` (
  `industryid` int(11) NOT NULL AUTO_INCREMENT,
  `industryname` varchar(150) NOT NULL,
  `industrystatus` varchar(10) NOT NULL,
  PRIMARY KEY (`industryid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dup_industry`
--

INSERT INTO `dup_industry` (`industryid`, `industryname`, `industrystatus`) VALUES
(2, 'Accounting/Taxation', 'inactive'),
(3, 'Accounting/Taxationtest', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `dup_location`
--

CREATE TABLE IF NOT EXISTS `dup_location` (
  `locationid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `locationstatus` varchar(11) NOT NULL,
  PRIMARY KEY (`locationid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dup_location`
--

INSERT INTO `dup_location` (`locationid`, `name`, `locationstatus`) VALUES
(3, 'Delhi', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `dup_packages`
--

CREATE TABLE IF NOT EXISTS `dup_packages` (
  `pack_id` int(11) NOT NULL AUTO_INCREMENT,
  `pack_name` varchar(30) NOT NULL DEFAULT '',
  `pack_price` tinyint(4) NOT NULL DEFAULT '0',
  `pack_duration` tinyint(4) NOT NULL DEFAULT '0',
  `pack_allow_number` tinyint(4) NOT NULL DEFAULT '0',
  `pack_status` varchar(10) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`pack_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dup_packages`
--

INSERT INTO `dup_packages` (`pack_id`, `pack_name`, `pack_price`, `pack_duration`, `pack_allow_number`, `pack_status`) VALUES
(1, 'Bonus Scheme Resume', 124, 15, 125, 'active'),
(2, 'yuiyu', 65, 30, 127, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `dup_studentexp`
--

CREATE TABLE IF NOT EXISTS `dup_studentexp` (
  `ex_id` int(11) NOT NULL AUTO_INCREMENT,
  `ex_st_id` int(11) NOT NULL,
  `ex_number` int(11) NOT NULL,
  `ex_duration` varchar(100) NOT NULL,
  `ex_function` varchar(100) NOT NULL,
  `ex_industry` varchar(100) NOT NULL,
  `ex_remuneration` varchar(100) NOT NULL,
  PRIMARY KEY (`ex_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `dup_studentexp`
--


-- --------------------------------------------------------

--
-- Table structure for table `dup_students`
--

CREATE TABLE IF NOT EXISTS `dup_students` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `st_username` varchar(60) NOT NULL,
  `st_pass` varchar(60) NOT NULL,
  `st_email` varchar(60) NOT NULL,
  `st_name` varchar(60) NOT NULL,
  `st_location` varchar(60) NOT NULL,
  `st_created` date NOT NULL,
  `st_mobile` varchar(30) NOT NULL DEFAULT 'NO',
  `st_status` char(10) NOT NULL DEFAULT 'active',
  `modified` date NOT NULL,
  `st_keyskills` text NOT NULL,
  `st_resumeheadline` varchar(255) NOT NULL,
  `st_resumepath` varchar(255) NOT NULL,
  `st_textresume` text NOT NULL,
  `st_contact_no` varchar(100) NOT NULL,
  `st_ug_qualification` varchar(100) NOT NULL,
  `st_ug_specilization` varchar(100) NOT NULL,
  `st_ug_univ` varchar(200) NOT NULL,
  `st_ug_college` varchar(200) NOT NULL,
  `st_ug_passyear` varchar(10) NOT NULL,
  `st_pg_qualification` varchar(100) NOT NULL,
  `st_ug_specilizationp` varchar(100) NOT NULL,
  `st_pg_univ` varchar(100) NOT NULL,
  `st_pg_college` varchar(200) NOT NULL,
  `st_pg_passyear` varchar(10) NOT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `dup_students`
--

INSERT INTO `dup_students` (`st_id`, `st_username`, `st_pass`, `st_email`, `st_name`, `st_location`, `st_created`, `st_mobile`, `st_status`, `modified`, `st_keyskills`, `st_resumeheadline`, `st_resumepath`, `st_textresume`, `st_contact_no`, `st_ug_qualification`, `st_ug_specilization`, `st_ug_univ`, `st_ug_college`, `st_ug_passyear`, `st_pg_qualification`, `st_ug_specilizationp`, `st_pg_univ`, `st_pg_college`, `st_pg_passyear`) VALUES
(10, 'teststudent', 'teststudent', 'tests@test.com', 'test student', 'delhi', '2009-02-12', '9888888', 'active', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
