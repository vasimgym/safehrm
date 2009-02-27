-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 27, 2009 at 08:24 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=116 ;

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
(114, '', '', '', 'admin', '', '2009-02-13', '', 'active', '0000-00-00'),
(115, 'admin123', 'admin123', 'admin123@vbvb.com', 'admin', '', '2009-02-14', '4356464564', 'active', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `dup_coursetypes`
--

CREATE TABLE IF NOT EXISTS `dup_coursetypes` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `coursename` varchar(40) NOT NULL DEFAULT '',
  `pid` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `dup_coursetypes`
--

INSERT INTO `dup_coursetypes` (`id`, `coursename`, `pid`) VALUES
(1, 'ugcourses', 0),
(2, 'pgcourses', 0),
(3, 'postpgcourses', 0),
(5, 'C.S.A', 1),
(28, 'BVSC', 1),
(29, 'Other', 1),
(52, 'kk', 2),
(35, 'M.Com', 2),
(36, 'M.Ed', 2),
(38, 'M.Sc', 2),
(47, 'Test', 1),
(40, 'MBA/PGDM', 2),
(51, 'kk', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dup_functions`
--

CREATE TABLE IF NOT EXISTS `dup_functions` (
  `functionid` int(11) NOT NULL AUTO_INCREMENT,
  `functionname` varchar(150) NOT NULL,
  `functionstatus` varchar(10) NOT NULL,
  PRIMARY KEY (`functionid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `dup_functions`
--

INSERT INTO `dup_functions` (`functionid`, `functionname`, `functionstatus`) VALUES
(7, 'Developer', 'active'),
(6, 'manager', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `dup_industry`
--

CREATE TABLE IF NOT EXISTS `dup_industry` (
  `industryid` int(11) NOT NULL AUTO_INCREMENT,
  `industryname` varchar(150) NOT NULL,
  `industrystatus` varchar(10) NOT NULL,
  PRIMARY KEY (`industryid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dup_industry`
--

INSERT INTO `dup_industry` (`industryid`, `industryname`, `industrystatus`) VALUES
(2, 'Accounting/Taxation', 'inactive'),
(3, 'Accounting/Taxationtest', 'active'),
(4, 'wwww', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `dup_jobs`
--

CREATE TABLE IF NOT EXISTS `dup_jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_cl_id` int(11) NOT NULL,
  `job_title` text NOT NULL,
  `job_description` text NOT NULL,
  `job_st_requirement` text NOT NULL,
  `job_highest_education` varchar(255) NOT NULL,
  `job_experience` varchar(30) NOT NULL,
  `job_industry` varchar(255) NOT NULL,
  `job_function` varchar(255) NOT NULL,
  `job_location` varchar(255) NOT NULL,
  `job_salary` varchar(255) NOT NULL,
  `job_clientname` varchar(255) NOT NULL,
  `job_contact_person` varchar(255) NOT NULL,
  `job_reference_id` varchar(255) NOT NULL,
  `job_address` text NOT NULL,
  `job_phone1` int(30) NOT NULL,
  `job_phone2` int(30) NOT NULL,
  `job_email` varchar(100) NOT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dup_jobs`
--

INSERT INTO `dup_jobs` (`job_id`, `job_cl_id`, `job_title`, `job_description`, `job_st_requirement`, `job_highest_education`, `job_experience`, `job_industry`, `job_function`, `job_location`, `job_salary`, `job_clientname`, `job_contact_person`, `job_reference_id`, `job_address`, `job_phone1`, `job_phone2`, `job_email`) VALUES
(1, 0, 'qq', 'nmn', 'n', '35', '3', '3', '7', '3', 'jhj', 'jhj', 'hjh', 'jh', 'hj', 0, 0, 'hjh'),
(2, 0, 'qq', 'nmn', 'n', '35', '3', '3', '7', '3', 'jhj', 'jhj', 'hjh', 'jh', 'hj', 0, 0, 'hjh'),
(3, 1, 'test job', 'test job', '', '35', '3', '2', '7', '3', '1200000', 'ABC Consultancy', 'mr. dev', 'A008TR', '123, FFD', 32232424, 0, 'abc@KLLL.CIM');

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
-- Table structure for table `dup_salary`
--

CREATE TABLE IF NOT EXISTS `dup_salary` (
  `salaryid` int(11) NOT NULL AUTO_INCREMENT,
  `salaryname` varchar(150) NOT NULL,
  `salarystatus` varchar(10) NOT NULL,
  PRIMARY KEY (`salaryid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dup_salary`
--

INSERT INTO `dup_salary` (`salaryid`, `salaryname`, `salarystatus`) VALUES
(1, '1-2 lac', 'active'),
(2, '2-10 lac', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `dup_specialization`
--

CREATE TABLE IF NOT EXISTS `dup_specialization` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `coursename` varchar(40) NOT NULL DEFAULT '',
  `pid` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=51 ;

--
-- Dumping data for table `dup_specialization`
--

INSERT INTO `dup_specialization` (`id`, `coursename`, `pid`) VALUES
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
(46, '', 1),
(47, 'll', 1),
(48, 'll', 1),
(49, 'Test', 1),
(50, 'Test', 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `dup_studentexp`
--

INSERT INTO `dup_studentexp` (`ex_id`, `ex_st_id`, `ex_number`, `ex_duration`, `ex_function`, `ex_industry`, `ex_remuneration`) VALUES
(7, 15, 1, '4 years', '7', '4', '2'),
(6, 10, 2, 'dd', '7', '3', '2'),
(5, 10, 1, 'aaa', '7', '2', '1');

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
  `st_dob` date NOT NULL,
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
  `st_pg_specilization` varchar(100) NOT NULL,
  `st_pg_univ` varchar(100) NOT NULL,
  `st_pg_college` varchar(200) NOT NULL,
  `st_pg_passyear` varchar(10) NOT NULL,
  `st_resume_modified` date NOT NULL,
  `st_photo` varchar(150) NOT NULL,
  `st_address` text NOT NULL,
  `st_gender` varchar(11) NOT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `dup_students`
--

INSERT INTO `dup_students` (`st_id`, `st_username`, `st_pass`, `st_email`, `st_name`, `st_location`, `st_created`, `st_mobile`, `st_status`, `st_dob`, `st_keyskills`, `st_resumeheadline`, `st_resumepath`, `st_textresume`, `st_contact_no`, `st_ug_qualification`, `st_ug_specilization`, `st_ug_univ`, `st_ug_college`, `st_ug_passyear`, `st_pg_qualification`, `st_pg_specilization`, `st_pg_univ`, `st_pg_college`, `st_pg_passyear`, `st_resume_modified`, `st_photo`, `st_address`, `st_gender`) VALUES
(10, 'teststudent', 'teststudent', 'tests@test.com', 'test student', '3', '2009-02-12', '9888888', 'active', '1982-09-09', 'gg', 'ggg', '__1235193602__tesr.wps', 'OBJECTIVE:\r\n\r\nBrief out your knowledge and experience in the field of accountancy.\r\nE.g.: Record information about financial status of customers, keeping records of collection and status of accounts, identifying the underlying principles, reasons, or facts of information\r\nAnd as an accounting manager, have a rich experience with ten years of work experience in accounting. Strong accounting and management skills with extensive knowledge in processes and accounting standards\r\nPROFESSIONAL SYNOPSIS\r\n\r\nGive a detailed explanation about your responsibilities in accounting, so as to make the reader feel you are the best person for the job\r\nMention the duties you did in accounting, and the results you received on the basis of your work.\r\nMention down the rewards you attained on the basis of your work result\r\n\r\nResponsibilities\r\n\r\nMention your major responsibilities in your current company as per your work experience. E.g.: A highly experienced manager with ten years of wok experience in accounting. Strong accounting & management skills with extensive knowledge in processes and accounting standards.\r\nGive a glimpse of your previous work-related experience, skill and knowledge.\r\nACADEMIC QUALIFICATION\r\n\r\nThis section should have minimum of three educational details. Always try to give full details regarding your education including degrees and awards received. You can write details as below:\r\nGeneral studies, XYZ High School Major, year\r\nGraduation, XYZ College, year\r\nMasters, XYZ College, Year\r\nPROFESSIONAL QUALIFICATION\r\n\r\nIf you have done any relevant courses for previous jobs, include them to beef up your credentials Mention any certifications done related to your degree, certifications related to accounting software like Tally.\r\nORGANISATIONAL EXPERIENCE\r\n\r\nStart with your most recent work experience at the top. Include all relevant or related experience, no matter how old. Avoid long gaps when you write your work history. If you have large gaps, try to cover up with a brief description of any kind of related job or experience during that time you did. If youâ€™ve had many job changes in short span, be sure to explain why, e.g. it was a contract job, relocation Etc. Never blame your previous employer or previous job as you could be viewed as someone who is difficult to please, even if your arguments are legitimate.\r\nYou can use the below template to describe your work experience.\r\nTenure Company Name Designation\r\nCORE COMPETENCIES\r\n\r\nAccounting Skills\r\nMention all your accounting skills which will make the reader feel that your resume is outstanding. These include knowledge of specific computer skills, business software and specific tasks that you did.\r\nAccounting Experience\r\nEmphasize on your accounting related accomplishments and contributions you made in the organization.\r\nUse as many key words and skill headings as possible. For example:\r\nLedger, Accounting standards\r\nManagement of A/R & A/P Accounts\r\nBilling, Cost and Collections\r\nSupervision of Accounting and Administrative Staff\r\nBalance Sheet and Management Status Reports\r\nActivities\r\nList all your significant activities you did as a student and communal activities including organizations, student government, sports, and professional affiliations. Use action items to describe your responsibilities and accomplishments you did.\r\nUse Keywords: Use extensively accounting related keywords and action items to describe your skills and accomplishments. Few Action Items as below can be used when constructing your statements:\r\nAccruals | Advertising | Asset | Bad Debts | Balance Sheet | Bank & Cash | Bank Interest | Capital | Closing Stock | Cost of Sales | Creditors | Current Assets | Current Liabilities | Debtors | Accumulated Depreciation | Depreciation | Doubtful Debts charge | Doubtful Debts Provision | Drawings | Expenses | Fixed Assets | Fixtures & Fittings | Gross Profit | Land & Buildings | Light & Heat | Loan | Long Term Liabilities | Miscellaneous | Motor Vehicles | Net Assets | Net Book Value | Net Current Assets | Net Profit | Office Expenses | Opening Stock | Overdraft | Plant & Machinery | Prepayments | Profit | Profit & Loss | Purchases | Rent & Rates | Sales | Stock | Trading Account | Trading Profit & Loss | Travel Expenses | Wages & Salaries\r\n', '9997-7777777777', '28', '44', 'uuu', 'ccc', '2007', '40', '', '', '', '', '2009-02-21', '__1235201170__000655.jpg', 'abc, delhi\r\nnew delhi', 'Female'),
(11, '', '', '', '', '', '2009-02-14', '', 'active', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(12, 'dfff', '', '', '', '', '2009-02-14', '', 'active', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(13, 'sttest', 'sttest', 'fdffgd@vfdg.in', 'sttest', 'delhi', '2009-02-14', '34543535', 'active', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', ''),
(14, 'teststudent1', 'teststudent1', 'sdfesfsd@fdgbfdg.com', 'sdfdf1', 'ccfvdf1', '2009-02-14', '098887733201', 'block', '0000-00-00', 'sdfdef', 'aaadd', 'aaadd', 'ssff', 'dfds', 'dfdf', 'dfd', 'df', 'dsd', 'dsd', 'ds', 's', 'sdd', 'sdsd', 'ds', '0000-00-00', '', '', ''),
(15, 'student1', 'student1', 'student1@sd.com', 'student1', '3', '2009-02-21', '23424234324', 'active', '0000-00-00', 'php,mysql,js', 'php developer', '', 'tets, \r\ntets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, tets, ', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '');
