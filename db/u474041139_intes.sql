-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2019 at 07:20 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u474041139_intes`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activitiesID` int(11) NOT NULL,
  `activitiescategoryID` int(11) NOT NULL,
  `description` text NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `time_to` varchar(40) DEFAULT NULL,
  `time_from` varchar(40) DEFAULT NULL,
  `time_at` varchar(40) DEFAULT NULL,
  `usertypeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `schoolyearID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `activitiescategory`
--

CREATE TABLE `activitiescategory` (
  `activitiescategoryID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `fa_icon` varchar(40) DEFAULT NULL,
  `schoolyearID` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `userID` int(11) NOT NULL,
  `usertypeID` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activitiescategory`
--

INSERT INTO `activitiescategory` (`activitiescategoryID`, `title`, `fa_icon`, `schoolyearID`, `create_date`, `modify_date`, `userID`, `usertypeID`) VALUES
(1, 'Photos', 'fa-picture-o', 19, '2017-04-30 09:04:15', '2017-08-01 05:15:23', 1, 1),
(2, 'Food', 'fa-cutlery', 19, '2017-04-30 02:28:09', '2017-04-30 02:28:09', 1, 1),
(3, 'Sleep', 'fa-bed', 19, '2017-04-30 02:51:08', '2017-04-30 02:51:08', 1, 1),
(4, 'Sports', 'fa-trophy', 19, '2017-04-30 02:52:04', '2017-04-30 02:52:04', 1, 1),
(5, 'Activities', 'fa-puzzle-piece', 19, '2017-04-30 02:52:36', '2017-04-30 02:56:41', 1, 1),
(6, 'Note', 'fa-edit', 19, '2017-04-30 02:55:08', '2017-04-30 02:55:08', 1, 1),
(7, 'Incident', 'fa-times', 19, '2017-04-30 03:00:54', '2017-04-30 03:02:37', 1, 1),
(8, 'Meds', 'fa-medkit', 19, '2017-04-30 03:02:47', '2017-04-30 03:02:47', 1, 1),
(9, 'Art', 'fa-paint-brush', 19, '2017-04-30 03:06:07', '2017-04-30 03:06:07', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `activitiescomment`
--

CREATE TABLE `activitiescomment` (
  `activitiescommentID` int(11) NOT NULL,
  `activitiesID` int(11) NOT NULL,
  `comment` text NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `activitiesmedia`
--

CREATE TABLE `activitiesmedia` (
  `activitiesmediaID` int(11) NOT NULL,
  `activitiesID` int(11) NOT NULL,
  `attachment` text NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `activitiesstudent`
--

CREATE TABLE `activitiesstudent` (
  `activitiesstudentID` int(11) NOT NULL,
  `activitiesID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE `alert` (
  `alertID` int(11) UNSIGNED NOT NULL,
  `itemID` int(128) NOT NULL,
  `userID` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `itemname` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE `asset` (
  `assetID` int(11) NOT NULL,
  `serial` varchar(255) DEFAULT NULL,
  `description` text COMMENT 'Title',
  `manufacturer` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `asset_number` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `asset_condition` int(11) DEFAULT NULL,
  `attachment` text,
  `originalfile` text,
  `asset_categoryID` int(11) DEFAULT NULL,
  `asset_locationID` int(11) DEFAULT NULL,
  `create_date` date NOT NULL,
  `modify_date` date NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_usertypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `asset_assignment`
--

CREATE TABLE `asset_assignment` (
  `asset_assignmentID` int(11) NOT NULL,
  `assetID` int(11) NOT NULL COMMENT 'Description and title',
  `usertypeID` int(11) DEFAULT NULL,
  `check_out_to` int(11) NOT NULL,
  `due_date` date DEFAULT NULL,
  `note` text,
  `assigned_quantity` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `asset_locationID` int(11) DEFAULT NULL,
  `check_out_date` date DEFAULT NULL,
  `check_in_date` date DEFAULT NULL,
  `create_date` date NOT NULL,
  `modify_date` date NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_usertypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `asset_category`
--

CREATE TABLE `asset_category` (
  `asset_categoryID` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `create_date` date NOT NULL,
  `modify_date` date NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_usertypeID` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignmentID` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `deadlinedate` date NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `originalfile` text NOT NULL,
  `file` text NOT NULL,
  `classesID` longtext NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `sectionID` longtext,
  `subjectID` longtext,
  `assignusertypeID` int(11) DEFAULT NULL,
  `assignuserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignmentID`, `title`, `description`, `deadlinedate`, `usertypeID`, `userID`, `originalfile`, `file`, `classesID`, `schoolyearID`, `sectionID`, `subjectID`, `assignusertypeID`, `assignuserID`) VALUES
(1, 'test', 'this is for test', '2019-10-07', 1, 1, '', '', '3', 1, '[\"6\"]', '3', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assignmentanswer`
--

CREATE TABLE `assignmentanswer` (
  `assignmentanswerID` int(11) NOT NULL,
  `assignmentID` int(11) NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `uploaderID` int(11) NOT NULL,
  `uploadertypeID` int(11) NOT NULL,
  `answerfile` text NOT NULL,
  `answerfileoriginal` text NOT NULL,
  `answerdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendanceID` int(200) UNSIGNED NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `usertype` varchar(60) NOT NULL,
  `monthyear` varchar(10) NOT NULL,
  `a1` varchar(3) DEFAULT NULL,
  `a2` varchar(3) DEFAULT NULL,
  `a3` varchar(3) DEFAULT NULL,
  `a4` varchar(3) DEFAULT NULL,
  `a5` varchar(3) DEFAULT NULL,
  `a6` varchar(3) DEFAULT NULL,
  `a7` varchar(3) DEFAULT NULL,
  `a8` varchar(3) DEFAULT NULL,
  `a9` varchar(3) DEFAULT NULL,
  `a10` varchar(3) DEFAULT NULL,
  `a11` varchar(3) DEFAULT NULL,
  `a12` varchar(3) DEFAULT NULL,
  `a13` varchar(3) DEFAULT NULL,
  `a14` varchar(3) DEFAULT NULL,
  `a15` varchar(3) DEFAULT NULL,
  `a16` varchar(3) DEFAULT NULL,
  `a17` varchar(3) DEFAULT NULL,
  `a18` varchar(3) DEFAULT NULL,
  `a19` varchar(3) DEFAULT NULL,
  `a20` varchar(3) DEFAULT NULL,
  `a21` varchar(3) DEFAULT NULL,
  `a22` varchar(3) DEFAULT NULL,
  `a23` varchar(3) DEFAULT NULL,
  `a24` varchar(3) DEFAULT NULL,
  `a25` varchar(3) DEFAULT NULL,
  `a26` varchar(3) DEFAULT NULL,
  `a27` varchar(3) DEFAULT NULL,
  `a28` varchar(3) DEFAULT NULL,
  `a29` varchar(3) DEFAULT NULL,
  `a30` varchar(3) DEFAULT NULL,
  `a31` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendanceID`, `schoolyearID`, `studentID`, `classesID`, `sectionID`, `userID`, `usertype`, `monthyear`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`, `a11`, `a12`, `a13`, `a14`, `a15`, `a16`, `a17`, `a18`, `a19`, `a20`, `a21`, `a22`, `a23`, `a24`, `a25`, `a26`, `a27`, `a28`, `a29`, `a30`, `a31`) VALUES
(1, 1, 1, 1, 1, 1, 'Admin', '07-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL),
(2, 1, 3, 1, 1, 1, 'Admin', '10-2019', NULL, NULL, NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `automation_rec`
--

CREATE TABLE `automation_rec` (
  `automation_recID` int(11) UNSIGNED NOT NULL,
  `studentID` int(11) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(3) NOT NULL,
  `month` varchar(3) NOT NULL,
  `year` year(4) NOT NULL,
  `nofmodule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `automation_shudulu`
--

CREATE TABLE `automation_shudulu` (
  `automation_shuduluID` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `day` varchar(3) NOT NULL,
  `month` varchar(3) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `automation_shudulu`
--

INSERT INTO `automation_shudulu` (`automation_shuduluID`, `date`, `day`, `month`, `year`) VALUES
(1, '2019-07-27', '27', '07', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookID` int(11) UNSIGNED NOT NULL,
  `book` varchar(60) NOT NULL,
  `subject_code` tinytext NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `due_quantity` int(11) NOT NULL,
  `rack` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) UNSIGNED NOT NULL,
  `hostelID` int(11) NOT NULL,
  `class_type` varchar(60) NOT NULL,
  `hbalance` varchar(20) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categoryus`
--

CREATE TABLE `categoryus` (
  `catid` int(11) NOT NULL,
  `cat_title` varchar(50) DEFAULT NULL,
  `short_name` varchar(50) DEFAULT NULL,
  `ot_formula` varchar(10) DEFAULT NULL,
  `min_ot` varchar(10) DEFAULT NULL,
  `max_ot` varchar(10) DEFAULT NULL,
  `week_off1` varchar(10) DEFAULT NULL,
  `week_off2` varchar(10) DEFAULT NULL,
  `consider_punch` varchar(10) DEFAULT NULL,
  `gracetime_late` varchar(10) DEFAULT NULL,
  `gracetime_early` varchar(10) DEFAULT NULL,
  `neglect_last` varchar(10) DEFAULT NULL,
  `weekoff1` varchar(10) DEFAULT NULL,
  `weekoff2` varchar(10) DEFAULT NULL,
  `consider_early_come` varchar(10) DEFAULT NULL,
  `consider_late_going` varchar(10) DEFAULT NULL,
  `deduct_break_hour` varchar(10) DEFAULT NULL,
  `halfday_calculation` varchar(10) DEFAULT NULL,
  `absent_calculation` varchar(10) DEFAULT NULL,
  `partialday_half_calculation` varchar(10) DEFAULT NULL,
  `partialday_absent_calculation` varchar(10) DEFAULT NULL,
  `mark_weekoff_prefixday_absent` varchar(10) DEFAULT NULL,
  `mark_weekoff_suffixday_absent` varchar(10) DEFAULT NULL,
  `halfday_absent` varchar(10) DEFAULT NULL,
  `halfday_lateby` varchar(10) DEFAULT NULL,
  `halfday_goingby` varchar(10) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `day` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoryus`
--

INSERT INTO `categoryus` (`catid`, `cat_title`, `short_name`, `ot_formula`, `min_ot`, `max_ot`, `week_off1`, `week_off2`, `consider_punch`, `gracetime_late`, `gracetime_early`, `neglect_last`, `weekoff1`, `weekoff2`, `consider_early_come`, `consider_late_going`, `deduct_break_hour`, `halfday_calculation`, `absent_calculation`, `partialday_half_calculation`, `partialday_absent_calculation`, `mark_weekoff_prefixday_absent`, `mark_weekoff_suffixday_absent`, `halfday_absent`, `halfday_lateby`, `halfday_goingby`, `created_date`, `day`) VALUES
(1, 'test', 'test12', '123test', '30', '30', NULL, NULL, NULL, '15', '15', NULL, 'wednesday', 'wednesday', NULL, NULL, NULL, '30', '30', '20', '20', NULL, NULL, '', '', '', '2019-10-24 09:10:04', NULL),
(2, 'Test', 'tes', 'yes', '20', '20', NULL, NULL, NULL, '20', '20', NULL, 'monday', 'wednesday', NULL, NULL, NULL, '', '', '', '', NULL, NULL, '', '', '', '2019-10-25 06:38:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `certificate_template`
--

CREATE TABLE `certificate_template` (
  `certificate_templateID` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `theme` int(11) NOT NULL,
  `top_heading_title` text,
  `top_heading_left` text,
  `top_heading_right` text,
  `top_heading_middle` text,
  `main_middle_text` text NOT NULL,
  `template` text NOT NULL,
  `footer_left_text` text,
  `footer_right_text` text,
  `footer_middle_text` text,
  `background_image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `childcare`
--

CREATE TABLE `childcare` (
  `childcareID` int(11) NOT NULL,
  `dropped_at` datetime DEFAULT NULL,
  `received_at` datetime DEFAULT NULL,
  `usertypeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `parentID` int(11) NOT NULL,
  `signature` text,
  `classesID` int(11) NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `comment` text,
  `received_status` int(11) NOT NULL DEFAULT '0',
  `receiver_name` varchar(40) NOT NULL,
  `phone` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `classesID` int(11) UNSIGNED NOT NULL,
  `classes` varchar(60) NOT NULL,
  `classes_numeric` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `studentmaxID` int(11) DEFAULT NULL,
  `note` text,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(60) NOT NULL,
  `create_usertype` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`classesID`, `classes`, `classes_numeric`, `teacherID`, `studentmaxID`, `note`, `create_date`, `modify_date`, `create_userID`, `create_username`, `create_usertype`) VALUES
(1, 'Sample Class', 1, 1, 999999999, 'This is a sample class.', '2019-07-28 07:33:27', '2019-08-30 04:20:00', 1, 'initest_admin', 'Admin'),
(2, '10th', 10, 1, 999999999, 'high school', '2019-09-22 10:44:32', '2019-09-22 10:44:32', 1, 'initest_admin', 'Admin'),
(3, 'VII', 8, 1, 999999999, 'good class', '2019-09-24 06:16:19', '2019-09-24 06:16:19', 1, 'initest_admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `complainID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `schoolyearID` int(11) DEFAULT NULL,
  `description` text,
  `attachment` text,
  `originalfile` text,
  `create_userID` int(11) NOT NULL DEFAULT '0',
  `create_usertypeID` int(11) NOT NULL DEFAULT '0',
  `create_date` datetime DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `conversation_message_info`
--

CREATE TABLE `conversation_message_info` (
  `id` int(11) NOT NULL,
  `status` int(11) DEFAULT '0',
  `draft` int(11) DEFAULT '0',
  `fav_status` int(11) DEFAULT '0',
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `conversation_msg`
--

CREATE TABLE `conversation_msg` (
  `msg_id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `msg` text NOT NULL,
  `attach` text,
  `attach_file_name` text,
  `usertypeID` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `start` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `conversation_user`
--

CREATE TABLE `conversation_user` (
  `conversation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `is_sender` int(11) DEFAULT '0',
  `trash` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `documentID` int(11) NOT NULL,
  `title` varchar(128) CHARACTER SET utf8 NOT NULL,
  `file` varchar(200) CHARACTER SET utf8 NOT NULL,
  `userID` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_userID` int(11) NOT NULL,
  `create_usertypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eattendance`
--

CREATE TABLE `eattendance` (
  `eattendanceID` int(200) UNSIGNED NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `examID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `date` date NOT NULL,
  `studentID` int(11) DEFAULT NULL,
  `s_name` varchar(60) DEFAULT NULL,
  `eattendance` varchar(20) DEFAULT NULL,
  `year` year(4) NOT NULL,
  `eextra` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ebooks`
--

CREATE TABLE `ebooks` (
  `ebooksID` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `author` varchar(255) CHARACTER SET utf8 NOT NULL,
  `classesID` int(11) NOT NULL,
  `authority` tinyint(4) NOT NULL DEFAULT '0',
  `cover_photo` varchar(200) CHARACTER SET utf8 NOT NULL,
  `file` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emailsetting`
--

CREATE TABLE `emailsetting` (
  `fieldoption` varchar(100) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emailsetting`
--

INSERT INTO `emailsetting` (`fieldoption`, `value`) VALUES
('email_engine', 'sendmail'),
('smtp_password', ''),
('smtp_port', ''),
('smtp_security', ''),
('smtp_server', ''),
('smtp_username', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventID` int(11) UNSIGNED NOT NULL,
  `fdate` date NOT NULL,
  `ftime` time NOT NULL,
  `tdate` date NOT NULL,
  `ttime` time NOT NULL,
  `title` varchar(128) NOT NULL,
  `details` text NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `create_userID` int(11) NOT NULL DEFAULT '0',
  `create_usertypeID` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `eventcounter`
--

CREATE TABLE `eventcounter` (
  `eventcounterID` int(11) UNSIGNED NOT NULL,
  `eventID` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `type` varchar(20) NOT NULL,
  `name` varchar(128) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `examID` int(11) UNSIGNED NOT NULL,
  `exam` varchar(60) NOT NULL,
  `date` date NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `examschedule`
--

CREATE TABLE `examschedule` (
  `examscheduleID` int(11) UNSIGNED NOT NULL,
  `examID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `edate` date NOT NULL,
  `examfrom` varchar(10) NOT NULL,
  `examto` varchar(10) NOT NULL,
  `room` tinytext,
  `schoolyearID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expenseID` int(11) UNSIGNED NOT NULL,
  `create_date` date NOT NULL,
  `date` date NOT NULL,
  `expenseday` varchar(11) NOT NULL,
  `expensemonth` varchar(11) NOT NULL,
  `expenseyear` year(4) NOT NULL,
  `expense` varchar(128) NOT NULL,
  `amount` double NOT NULL,
  `file` varchar(200) DEFAULT NULL,
  `userID` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `uname` varchar(60) NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feetypes`
--

CREATE TABLE `feetypes` (
  `feetypesID` int(11) UNSIGNED NOT NULL,
  `feetypes` varchar(60) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feetypes`
--

INSERT INTO `feetypes` (`feetypesID`, `feetypes`, `note`) VALUES
(1, 'Books Fine', 'Don\'t delete it!'),
(2, 'Library Fee', 'Don\'t delete it!'),
(3, 'Transport Fee', 'Don\'t delete it!'),
(4, 'Hostel Fee', 'Don\'t delete it!'),
(5, 'Monthly Fee [Jan]', ''),
(6, 'Monthly Fee [Feb]', ''),
(7, 'Monthly Fee [Mar]', ''),
(8, 'Monthly Fee [Apr]', ''),
(9, 'Monthly Fee [May]', ''),
(10, 'Monthly Fee [Jun]', ''),
(11, 'Monthly Fee [Jul]', ''),
(12, 'Monthly Fee [Aug]', ''),
(13, 'Monthly Fee [Sep]', ''),
(14, 'Monthly Fee [Oct]', ''),
(15, 'Monthly Fee [Nov]', ''),
(16, 'Monthly Fee [Dec]', '');

-- --------------------------------------------------------

--
-- Table structure for table `fmenu`
--

CREATE TABLE `fmenu` (
  `fmenuID` int(11) NOT NULL,
  `menu_name` varchar(128) NOT NULL,
  `status` int(11) NOT NULL COMMENT 'Only for active',
  `topbar` int(11) NOT NULL,
  `social` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fmenu_relation`
--

CREATE TABLE `fmenu_relation` (
  `fmenu_relationID` int(11) NOT NULL,
  `fmenuID` int(11) DEFAULT NULL,
  `menu_typeID` int(11) DEFAULT NULL COMMENT '1 => Pages, 2 => Post, 3 => Links',
  `menu_parentID` varchar(128) DEFAULT NULL,
  `menu_orderID` int(11) DEFAULT NULL,
  `menu_pagesID` int(11) DEFAULT NULL,
  `menu_label` varchar(254) DEFAULT NULL,
  `menu_link` text NOT NULL,
  `menu_rand` varchar(128) DEFAULT NULL,
  `menu_rand_parentID` varchar(128) DEFAULT NULL,
  `menu_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `frontend_setting`
--

CREATE TABLE `frontend_setting` (
  `fieldoption` varchar(100) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frontend_setting`
--

INSERT INTO `frontend_setting` (`fieldoption`, `value`) VALUES
('description', ''),
('facebook', ''),
('google', ''),
('linkedin', ''),
('login_menu_status', '1'),
('online_admission_status', '0'),
('teacher_email_status', '0'),
('teacher_phone_status', '0'),
('twitter', ''),
('youtube', '');

-- --------------------------------------------------------

--
-- Table structure for table `frontend_template`
--

CREATE TABLE `frontend_template` (
  `frontend_templateID` int(11) NOT NULL,
  `template_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frontend_template`
--

INSERT INTO `frontend_template` (`frontend_templateID`, `template_name`) VALUES
(1, 'home'),
(2, 'about'),
(3, 'event'),
(4, 'teacher'),
(5, 'gallery'),
(6, 'notice'),
(7, 'blog'),
(8, 'contact'),
(9, 'admission');

-- --------------------------------------------------------

--
-- Table structure for table `globalpayment`
--

CREATE TABLE `globalpayment` (
  `globalpaymentID` int(11) NOT NULL,
  `classesID` int(11) DEFAULT NULL,
  `sectionID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `clearancetype` varchar(40) NOT NULL,
  `invoicename` varchar(128) NOT NULL,
  `invoicedescription` varchar(128) NOT NULL,
  `paymentyear` varchar(5) NOT NULL,
  `schoolyearID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `globalpayment`
--

INSERT INTO `globalpayment` (`globalpaymentID`, `classesID`, `sectionID`, `studentID`, `clearancetype`, `invoicename`, `invoicedescription`, `paymentyear`, `schoolyearID`) VALUES
(1, 1, 1, 2, 'paid', '235555-Ankur Shakya', '', '2019', 1),
(2, 1, 1, 1, 'partial', '1001-Sample Student', '', '2019', 1),
(3, 1, 1, 2, 'paid', '235555-Ankur Shakya', '', '2019', 1),
(4, 1, 1, 2, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(5, 1, 1, 1, 'partial', '1001-Sample Student', '', '2019', 1),
(6, 1, 1, 2, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(7, 1, 1, 1, 'partial', '1001-Sample Student', '', '2019', 1),
(8, 1, 1, 2, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(9, 1, 1, 1, 'partial', '1001-Sample Student', '', '2019', 1),
(10, 1, 1, 2, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(11, 1, 1, 2, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(12, 1, 1, 2, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(13, 1, 1, 2, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(14, 1, 1, 2, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(15, 1, 1, 3, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(16, 1, 1, 3, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(17, 1, 1, 3, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(18, 1, 1, 3, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(19, 1, 1, 3, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(20, 1, 1, 3, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(21, 1, 1, 3, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(22, 1, 1, 3, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(23, 1, 1, 3, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(24, 1, 1, 3, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(25, 1, 1, 3, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(26, 1, 1, 3, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(27, 1, 1, 3, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(28, 1, 1, 3, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(29, 1, 1, 3, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(30, 1, 1, 3, 'partial', '235555-Ankur Shakya', '', '2019', 1),
(31, 1, 1, 3, 'partial', '235555-Ankur Shakya', '', '2019', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `gradeID` int(11) UNSIGNED NOT NULL,
  `grade` varchar(60) NOT NULL,
  `point` varchar(11) NOT NULL,
  `gradefrom` int(11) NOT NULL,
  `gradeupto` int(11) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hmember`
--

CREATE TABLE `hmember` (
  `hmemberID` int(11) UNSIGNED NOT NULL,
  `hostelID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `hbalance` varchar(20) DEFAULT NULL,
  `hjoindate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `holidayID` int(11) UNSIGNED NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `fdate` date NOT NULL,
  `tdate` date NOT NULL,
  `title` varchar(128) NOT NULL,
  `details` text NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL DEFAULT '0',
  `create_usertypeID` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `hostelID` int(11) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `htype` varchar(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hourly_template`
--

CREATE TABLE `hourly_template` (
  `hourly_templateID` int(11) NOT NULL,
  `hourly_grades` varchar(128) NOT NULL,
  `hourly_rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `idmanager`
--

CREATE TABLE `idmanager` (
  `idmanagerID` int(11) NOT NULL,
  `schooltype` varchar(20) NOT NULL,
  `idtitle` varchar(128) NOT NULL,
  `idtype` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `idmanager`
--

INSERT INTO `idmanager` (`idmanagerID`, `schooltype`, `idtitle`, `idtype`) VALUES
(1, 'semesterbase', 'Year+Semester Code+Department Code+Student Max ID', 'schoolyear+semestercode+classes_numeric+studentmaxID'),
(2, 'semesterbase', 'Year+Department Code+Semester Code+Student Max ID', 'schoolyear+classes_numeric+semestercode+studentmaxID'),
(3, 'semesterbase', 'Year+Semester Code+Student Max ID', 'schoolyear+semestercode+studentmaxID'),
(4, 'semesterbase', 'Year+Department Code+Student Max ID', 'schoolyear+classes_numeric+studentmaxID'),
(5, 'semesterbase', 'Student Max ID+Year+Semester Code+Department Code', 'studentmaxID+schoolyear+semestercode+classes_numeric'),
(6, 'semesterbase', 'Student Max ID+Semester Code+Department Code+Year', 'studentmaxID+semestercode+classes_numeric+schoolyear'),
(7, 'semesterbase', 'Student Max ID+Semester Code+Department Code', 'studentmaxID+semestercode+classes_numeric'),
(8, 'semesterbase', 'Student Max ID+Department Code+Semester Code', 'studentmaxID+classes_numeric+semestercode'),
(9, 'semesterbase', 'Semester Code+Department Code+Student Max ID', 'semestercode+classes_numeric+studentmaxID'),
(10, 'semesterbase', 'Department Code+Semester Code+Student Max ID', 'classes_numeric+semestercode+studentmaxID'),
(11, 'semesterbase', 'Semester Code+Student Max ID', 'semestercode+studentmaxID'),
(12, 'semesterbase', 'Department Code+Student Max ID', 'classes_numeric+studentmaxID'),
(13, 'semesterbase', 'Student Max ID', 'studentmaxID'),
(14, 'classbase', 'Year+Class Numeric+Student Max ID', 'schoolyear+classes_numeric+studentmaxID'),
(15, 'Classbase', 'Class Numeric+Year+Student Max ID', 'classes_numeric+schoolyear+studentmaxID'),
(16, 'classbase', 'Year+Student Max ID', 'schoolyear+studentmaxID'),
(17, 'classbase', 'Class Numeric+Student Max ID', 'classes_numeric+studentmaxID'),
(18, 'classbase', 'Student Max ID', 'studentmaxID'),
(19, 'semesterbase', 'None', 'none'),
(20, 'classbase', 'None', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `incomeID` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `date` date NOT NULL,
  `incomeday` varchar(11) NOT NULL,
  `incomemonth` varchar(11) NOT NULL,
  `incomeyear` year(4) NOT NULL,
  `amount` double NOT NULL,
  `file` varchar(200) NOT NULL,
  `note` text NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `userID` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ini_config`
--

CREATE TABLE `ini_config` (
  `configID` int(11) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `config_key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ini_config`
--

INSERT INTO `ini_config` (`configID`, `type`, `config_key`, `value`) VALUES
(1, 'paypal', 'paypal_api_username', ''),
(2, 'paypal', 'paypal_api_password', ''),
(3, 'paypal', 'paypal_api_signature', ''),
(4, 'paypal', 'paypal_email', ''),
(5, 'paypal', 'paypal_demo', ''),
(6, 'stripe', 'stripe_secret', ''),
(8, 'stripe', 'stripe_demo', ''),
(9, 'payumoney', 'payumoney_key', 'xtebSrdR'),
(10, 'payumoney', 'payumoney_salt', 'nsgFBHLJXz'),
(11, 'payumoney', 'payumoney_demo', 'FALSE'),
(12, 'paypal', 'paypal_status', ''),
(13, 'stripe', 'stripe_status', ''),
(14, 'payumoney', 'payumoney_status', '1'),
(15, 'voguepay', 'voguepay_merchant_id', ''),
(16, 'voguepay', 'voguepay_merchant_ref', ''),
(17, 'voguepay', 'voguepay_developer_code', ''),
(18, 'voguepay', 'voguepay_demo', ''),
(19, 'voguepay', 'voguepay_status', ''),
(20, 'ccavenue', 'ccavenue_merchant_id', '209487'),
(21, 'ccavenue', 'ccavenue_access_code', 'AVFC86GG43AS11CFSA'),
(22, 'ccavenue', 'ccavenue_working_key', 'B82583A0C811E1C29F47E9D394EFAE22'),
(23, 'ccavenue', 'ccavenue_status', '1');

-- --------------------------------------------------------

--
-- Table structure for table `instruction`
--

CREATE TABLE `instruction` (
  `instructionID` int(11) NOT NULL,
  `title` varchar(512) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceID` int(11) UNSIGNED NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `feetypeID` int(11) DEFAULT NULL,
  `feetype` varchar(128) NOT NULL,
  `amount` double NOT NULL,
  `discount` double NOT NULL DEFAULT '0',
  `userID` int(11) DEFAULT NULL,
  `usertypeID` int(11) DEFAULT NULL,
  `uname` varchar(60) DEFAULT NULL,
  `date` date NOT NULL,
  `create_date` date NOT NULL,
  `day` varchar(20) DEFAULT NULL,
  `month` varchar(20) DEFAULT NULL,
  `year` year(4) NOT NULL,
  `payment_mode` varchar(20) DEFAULT NULL,
  `check_date` varchar(50) DEFAULT NULL,
  `check_no` varchar(50) DEFAULT NULL,
  `paidstatus` int(11) DEFAULT NULL,
  `deleted_at` int(11) NOT NULL DEFAULT '1',
  `maininvoiceID` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoiceID`, `schoolyearID`, `classesID`, `studentID`, `feetypeID`, `feetype`, `amount`, `discount`, `userID`, `usertypeID`, `uname`, `date`, `create_date`, `day`, `month`, `year`, `payment_mode`, `check_date`, `check_no`, `paidstatus`, `deleted_at`, `maininvoiceID`) VALUES
(21, 1, 1, 3, 2, 'Library Fee', 8000, 0, 1, 1, 'S Saxena', '2019-09-20', '2019-09-20', '20', '09', 2019, NULL, NULL, NULL, 0, 1, 12),
(22, 1, 1, 3, 1, 'Books Fine', 9000, 0, 1, 1, 'S Saxena', '2019-09-27', '2019-09-20', '20', '09', 2019, NULL, NULL, NULL, 1, 1, 13),
(23, 1, 1, 3, 1, 'Books Fine', 80, 0, 1, 1, 'S Saxena', '2019-09-17', '2019-09-20', '20', '09', 2019, NULL, NULL, NULL, 0, 1, 0),
(24, 1, 1, 3, 3, 'Transport Fee', 8000, 0, 1, 1, 'S Saxena', '2019-09-26', '2019-09-20', '20', '09', 2019, NULL, NULL, NULL, 1, 1, 14),
(25, 1, 1, 3, 2, 'Library Fee', 500, 0, 1, 1, 'S Saxena', '2019-09-08', '2019-09-20', '20', '09', 2019, NULL, NULL, NULL, 1, 1, 16),
(26, 1, 1, 3, 3, 'Transport Fee', 1000, 0, 1, 1, 'S Saxena', '2019-09-03', '2019-09-20', '20', '09', 2019, NULL, NULL, NULL, 1, 1, 17),
(27, 1, 1, 3, 4, 'Hostel Fee', 3000, 0, 1, 1, 'S Saxena', '2019-09-27', '2019-09-20', '20', '09', 2019, NULL, NULL, NULL, 0, 1, 18),
(28, 1, 1, 3, 4, 'Hostel Fee', 8000, 0, 1, 1, 'S Saxena', '2019-09-14', '2019-09-20', '20', '09', 2019, NULL, NULL, NULL, 0, 1, 19),
(29, 1, 1, 3, 1, 'Books Fine', 900, 0, 1, 1, 'S Saxena', '2019-09-11', '2019-09-20', '20', '09', 2019, NULL, NULL, NULL, 1, 1, 20),
(30, 1, 1, 3, 4, 'Hostel Fee', 76656, 0, 1, 1, 'S Saxena', '2019-09-12', '2019-09-20', '20', '09', 2019, 'Cash', NULL, NULL, 1, 1, 21),
(31, 1, 1, 3, 1, 'Books Fine', 5464465, 7, 1, 1, 'S Saxena', '2019-09-05', '2019-09-20', '20', '09', 2019, 'Cash', NULL, NULL, 1, 1, 22),
(32, 1, 1, 3, 2, 'Library Fee', 99999, 0, 1, 1, 'S Saxena', '2019-09-18', '2019-09-20', '20', '09', 2019, 'Cheque', NULL, NULL, 1, 1, 23),
(33, 1, 1, 3, 4, 'Hostel Fee', 8000, 0, 1, 1, 'S Saxena', '2019-09-02', '2019-09-21', '21', '09', 2019, 'Cheque', '29-09-2019', '456899897CK', 1, 1, 24),
(34, 1, 1, 3, 4, 'Hostel Fee', 100, 0, 1, 1, 'S Saxena', '2019-09-20', '2019-09-23', '23', '09', 2019, 'Cheque', '', '', 1, 1, 25),
(35, 1, 1, 3, 2, 'Library Fee', 900, 9, 1, 1, 'S Saxena', '2019-08-27', '2019-10-14', '14', '10', 2019, 'Cheque', '16-10-2019', '77878', 1, 1, 26),
(36, 1, 1, 3, 2, 'Library Fee', 100, 0, 1, 1, 'S Saxena', '2019-10-12', '2019-10-19', '19', '10', 2019, 'Cheque', '19-10-2019', '123456', 1, 1, 27);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `issueID` int(11) UNSIGNED NOT NULL,
  `lID` varchar(128) NOT NULL,
  `bookID` int(11) NOT NULL,
  `serial_no` varchar(40) NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leaveapplications`
--

CREATE TABLE `leaveapplications` (
  `leaveapplicationID` int(10) UNSIGNED NOT NULL,
  `leavecategoryID` int(10) UNSIGNED NOT NULL,
  `apply_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `od_status` tinyint(1) NOT NULL DEFAULT '0',
  `from_date` date NOT NULL,
  `from_time` time DEFAULT NULL,
  `to_date` date NOT NULL,
  `to_time` time DEFAULT NULL,
  `leave_days` int(11) NOT NULL,
  `reason` text,
  `attachment` varchar(200) DEFAULT NULL,
  `attachmentorginalname` varchar(200) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_usertypeID` int(11) UNSIGNED NOT NULL,
  `applicationto_userID` int(11) UNSIGNED DEFAULT NULL,
  `applicationto_usertypeID` int(11) UNSIGNED DEFAULT NULL,
  `approver_userID` int(11) UNSIGNED DEFAULT NULL,
  `approver_usertypeID` int(11) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `schoolyearID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leaveapplications`
--

INSERT INTO `leaveapplications` (`leaveapplicationID`, `leavecategoryID`, `apply_date`, `od_status`, `from_date`, `from_time`, `to_date`, `to_time`, `leave_days`, `reason`, `attachment`, `attachmentorginalname`, `create_date`, `modify_date`, `create_userID`, `create_usertypeID`, `applicationto_userID`, `applicationto_usertypeID`, `approver_userID`, `approver_usertypeID`, `status`, `schoolyearID`) VALUES
(1, 1, '2019-09-25 10:31:21', 0, '2019-09-25', '16:01:21', '2019-09-25', '16:01:21', 1, 'Sick', '', '', '2019-09-25 16:01:21', '2019-09-25 16:04:21', 1, 2, 2, 5, NULL, NULL, 1, 1),
(2, 1, '2019-11-05 05:40:03', 0, '2019-11-05', '11:10:03', '2019-11-05', '11:10:03', 1, 'leave', '', '', '2019-11-05 11:10:03', '2019-11-05 11:10:35', 1, 2, 2, 2, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `leaveassign`
--

CREATE TABLE `leaveassign` (
  `leaveassignID` int(10) UNSIGNED NOT NULL,
  `leavecategoryID` int(10) UNSIGNED NOT NULL,
  `usertypeID` int(11) UNSIGNED NOT NULL,
  `leaveassignday` int(11) NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_usertypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leaveassign`
--

INSERT INTO `leaveassign` (`leaveassignID`, `leavecategoryID`, `usertypeID`, `leaveassignday`, `schoolyearID`, `create_date`, `modify_date`, `create_userID`, `create_usertypeID`) VALUES
(1, 1, 2, 3, 1, '2019-09-25 14:48:17', '2019-09-25 15:53:13', 1, 1),
(2, 2, 2, 3, 1, '2019-09-25 15:53:25', '2019-09-25 15:53:25', 1, 1),
(3, 2, 7, 3, 1, '2019-10-08 11:15:02', '2019-10-08 11:15:02', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `leavecategory`
--

CREATE TABLE `leavecategory` (
  `leavecategoryID` int(10) UNSIGNED NOT NULL,
  `leavecategory` varchar(255) NOT NULL,
  `leavegender` int(11) DEFAULT '0' COMMENT '1 = General, 2 = Male, 3 = Femele',
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_usertypeID` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leavecategory`
--

INSERT INTO `leavecategory` (`leavecategoryID`, `leavecategory`, `leavegender`, `create_date`, `modify_date`, `create_userID`, `create_usertypeID`) VALUES
(1, 'Casual Leave', 1, '2019-09-25 14:47:48', '2019-09-25 14:47:48', 1, 1),
(2, 'Medical Leave', 1, '2019-09-25 15:52:48', '2019-09-25 15:52:48', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lmember`
--

CREATE TABLE `lmember` (
  `lmemberID` int(11) UNSIGNED NOT NULL,
  `lID` varchar(40) NOT NULL,
  `studentID` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `lbalance` varchar(20) DEFAULT NULL,
  `ljoindate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locationID` int(11) UNSIGNED NOT NULL,
  `location` varchar(128) NOT NULL,
  `description` text,
  `create_date` date NOT NULL,
  `modify_date` date NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_usertypeID` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `loginlog`
--

CREATE TABLE `loginlog` (
  `loginlogID` int(11) NOT NULL,
  `ip` varchar(45) DEFAULT NULL,
  `browser` varchar(128) DEFAULT NULL,
  `operatingsystem` varchar(128) DEFAULT NULL,
  `login` int(11) UNSIGNED DEFAULT NULL,
  `logout` int(11) UNSIGNED DEFAULT NULL,
  `usertypeID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loginlog`
--

INSERT INTO `loginlog` (`loginlogID`, `ip`, `browser`, `operatingsystem`, `login`, `logout`, `usertypeID`, `userID`) VALUES
(1, '116.74.214.119', 'Google Chrome', 'windows', 1564176304, 1564178150, 1, 1),
(2, '171.49.139.48', 'Google Chrome', 'windows', 1564189294, NULL, 1, 1),
(3, '116.74.214.119', 'Google Chrome', 'windows', 1564279021, 1564279321, 1, 1),
(4, '49.206.186.163', 'Google Chrome', 'windows', 1564258208, NULL, 1, 1),
(5, '116.74.214.119', 'Google Chrome', 'windows', 1564365037, 1564365426, 1, 1),
(6, '116.74.214.119', 'Google Chrome', 'windows', 1564365743, 1564366758, 1, 1),
(7, '116.74.214.119', 'Google Chrome', 'windows', 1564368085, 1564368159, 4, 1),
(8, '116.74.214.119', 'Google Chrome', 'windows', 1564368176, 1564368423, 1, 1),
(9, '116.74.214.119', 'Google Chrome', 'windows', 1564369733, 1564370015, 1, 1),
(10, '182.68.239.81', 'Google Chrome', 'windows', 1564383578, NULL, 1, 1),
(11, '116.74.214.119', 'Google Chrome', 'windows', 1564642198, 1564642210, 1, 1),
(12, '171.79.74.5', 'Google Chrome', 'windows', 1567059393, 1567059693, 1, 1),
(13, '171.79.74.5', 'Google Chrome', 'windows', 1567039756, 1567039896, 1, 1),
(14, '171.79.74.5', 'Google Chrome', 'windows', 1567039929, 1567039964, 2, 1),
(15, '171.79.74.5', 'Google Chrome', 'windows', 1567039970, 1567040232, 1, 1),
(16, '171.79.74.5', 'Google Chrome', 'windows', 1567040240, NULL, 2, 2),
(17, '116.74.214.119', 'Google Chrome', 'windows', 1567118944, 1567119400, 1, 1),
(18, '116.74.214.119', 'Google Chrome', 'windows', 1567119075, NULL, 2, 2),
(19, '116.74.173.229', 'Google Chrome', 'windows', 1568066633, 1568067063, 1, 1),
(20, '42.106.46.193', 'Google Chrome', 'windows', 1568784796, NULL, 1, 1),
(21, '42.106.45.47', 'Google Chrome', 'windows', 1568878195, NULL, 1, 1),
(22, '42.106.46.174', 'Google Chrome', 'windows', 1568863328, NULL, 1, 1),
(23, '116.74.173.229', 'Google Chrome', 'windows', 1568943874, 1568944043, 1, 1),
(24, '42.106.44.126', 'Google Chrome', 'windows', 1568947578, 1568960576, 1, 1),
(25, '116.74.173.229', 'Google Chrome', 'windows', 1568950809, 1568953146, 1, 1),
(26, '42.106.44.126', 'Google Chrome', 'windows', 1568960595, NULL, 1, 1),
(27, '42.106.6.251', 'Google Chrome', 'windows', 1568945741, NULL, 1, 1),
(28, '42.106.45.54', 'Google Chrome', 'windows', 1568946807, NULL, 1, 1),
(29, '42.106.47.231', 'Google Chrome', 'windows', 1569033826, NULL, 1, 1),
(30, '42.106.44.213', 'Google Chrome', 'windows', 1569031546, NULL, 1, 1),
(31, '42.106.47.196', 'Google Chrome', 'windows', 1569125652, NULL, 1, 1),
(32, '42.106.46.232', 'Google Chrome', 'windows', 1569202380, NULL, 1, 1),
(33, '116.74.173.229', 'Google Chrome', 'windows', 1569203495, 1569203832, 1, 1),
(34, '116.74.173.229', 'Google Chrome', 'windows', 1569204258, 1569204413, 1, 1),
(35, '116.74.173.229', 'Google Chrome', 'windows', 1569204464, 1569210935, 1, 1),
(36, '116.74.173.229', 'Google Chrome', 'windows', 1569188749, 1569188793, 1, 1),
(37, '42.106.47.222', 'Google Chrome', 'windows', 1569201615, NULL, 1, 1),
(38, '106.220.167.9', 'Google Chrome', 'windows', 1569292727, 1569293344, 1, 1),
(39, '106.220.167.9', 'Google Chrome', 'windows', 1569293528, 1569294119, 1, 1),
(40, '42.106.47.88', 'Google Chrome', 'windows', 1569303201, 1569303501, 1, 1),
(41, '116.74.173.229', 'Google Chrome', 'windows', 1569279102, 1569279933, 1, 1),
(42, '42.106.47.228', 'Google Chrome', 'windows', 1569282313, NULL, 1, 1),
(43, '42.106.45.216', 'Google Chrome', 'windows', 1569376958, NULL, 1, 1),
(44, '42.106.46.72', 'Google Chrome', 'windows', 1569377983, NULL, 1, 1),
(45, '116.74.173.229', 'Google Chrome', 'windows', 1569384182, 1569384381, 1, 1),
(46, '116.74.173.229', 'Google Chrome', 'windows', 1569360972, 1569364192, 1, 1),
(47, '116.74.173.229', 'Google Chrome', 'windows', 1569364222, 1569364400, 2, 1),
(48, '116.74.173.229', 'Google Chrome', 'windows', 1569364420, 1569364502, 1, 1),
(49, '116.74.173.229', 'Google Chrome', 'windows', 1569364517, 1569365742, 2, 1),
(50, '42.106.44.210', 'Google Chrome', 'windows', 1569378411, NULL, 1, 1),
(51, '42.106.46.194', 'Google Chrome', 'windows', 1569460242, NULL, 1, 1),
(52, '116.74.173.229', 'Google Chrome', 'windows', 1569472709, 1569473045, 1, 1),
(53, '116.74.173.229', 'Google Chrome', 'windows', 1569475260, 1569475560, 1, 1),
(54, '116.74.173.229', 'Google Chrome', 'windows', 1569475339, 1569444940, 1, 1),
(55, '116.74.173.229', 'Google Chrome', 'windows', 1569444977, 1569444993, 1, 1),
(56, '116.74.173.229', 'Google Chrome', 'windows', 1569445008, 1569445070, 2, 1),
(57, '42.106.47.238', 'Google Chrome', 'windows', 1569467011, NULL, 1, 1),
(58, '42.106.47.88', 'Google Chrome', 'windows', 1569555558, NULL, 1, 1),
(59, '42.106.47.234', 'Google Chrome', 'windows', 1569564045, NULL, 1, 1),
(60, '42.106.47.11', 'Google Chrome', 'windows', 1569547883, NULL, 1, 1),
(61, '42.106.45.218', 'Google Chrome', 'windows', 1569548038, NULL, 1, 1),
(62, '116.74.173.229', 'Google Chrome', 'windows', 1570155201, 1570155501, 1, 1),
(63, '116.74.173.229', 'Google Chrome', 'windows', 1570169490, 1570171094, 1, 1),
(64, '116.74.173.229', 'Google Chrome', 'windows', 1570135062, 1570137479, 1, 1),
(65, '116.74.173.229', 'Google Chrome', 'windows', 1570138950, 1570139870, 1, 1),
(66, '116.74.173.229', 'Google Chrome', 'windows', 1570394014, NULL, 1, 1),
(67, '103.35.133.29', 'Google Chrome', 'windows', 1570512222, 1570516553, 1, 1),
(68, '182.68.179.195', 'Google Chrome', 'windows', 1570658384, NULL, 1, 1),
(69, '116.75.176.215', 'Google Chrome', 'windows', 1571028817, 1571028955, 1, 1),
(70, '182.68.94.120', 'Google Chrome', 'windows', 1571009276, 1571009576, 1, 1),
(71, '157.48.25.68', 'Google Chrome', 'windows', 1571025807, NULL, 1, 1),
(72, '116.74.188.84', 'Google Chrome', 'windows', 1571095465, 1571096019, 1, 1),
(73, '182.68.94.120', 'Google Chrome', 'windows', 1571100193, NULL, 1, 1),
(74, '116.74.188.84', 'Google Chrome', 'windows', 1571195938, 1571196036, 1, 1),
(75, '182.64.66.25', 'Google Chrome', 'windows', 1571291165, NULL, 1, 1),
(76, '116.74.188.84', 'Google Chrome', 'windows', 1571346689, 1571346832, 1, 1),
(77, '116.74.188.84', 'Google Chrome', 'windows', 1571354254, 1571354423, 1, 1),
(78, '150.242.175.109', 'Google Chrome', 'windows', 1571468219, NULL, 1, 1),
(79, '116.74.188.84', 'Google Chrome', 'windows', 1571437303, 1571437603, 1, 1),
(80, '106.198.209.184', 'Google Chrome', 'windows', 1571438010, NULL, 1, 1),
(81, '103.35.133.40', 'Google Chrome', 'windows', 1571452658, 1571452701, 1, 1),
(82, '103.240.193.164', 'Google Chrome', 'windows', 1571633572, 1571633872, 1, 1),
(83, '103.240.193.164', 'Google Chrome', 'windows', 1571605272, NULL, 1, 1),
(84, '150.129.236.63', 'Google Chrome', 'windows', 1571706747, NULL, 1, 1),
(85, '116.74.188.84', 'Google Chrome', 'windows', 1571712271, 1571712333, 1, 1),
(86, '182.64.217.200', 'Google Chrome', 'windows', 1571723491, 1571699237, 1, 1),
(87, '116.74.188.84', 'Google Chrome', 'windows', 1571698015, 1571698054, 1, 1),
(88, '116.74.188.84', 'Google Chrome', 'windows', 1571698071, 1571698371, 1, 1),
(89, '116.74.188.84', 'Google Chrome', 'windows', 1571698213, 1571698240, 1, 1),
(90, '116.74.188.84', 'Google Chrome', 'windows', 1571698315, 1571698351, 1, 1),
(91, '182.64.217.200', 'Google Chrome', 'windows', 1571699245, 1571699545, 1, 1),
(92, '116.74.188.84', 'Google Chrome', 'windows', 1571699968, 1571700299, 1, 1),
(93, '116.74.188.84', 'Google Chrome', 'windows', 1571795087, 1571795295, 1, 1),
(94, '116.74.188.84', 'Google Chrome', 'windows', 1571804341, 1571806257, 1, 1),
(95, '116.74.188.84', 'Google Chrome', 'windows', 1571806306, 1571806428, 1, 1),
(96, '116.74.188.84', 'Google Chrome', 'windows', 1571806449, 1571806495, 2, 6),
(97, '116.74.188.84', 'Google Chrome', 'windows', 1571806509, 1571813104, 1, 1),
(98, '182.64.217.200', 'Google Chrome', 'windows', 1571807566, 1571807866, 1, 1),
(99, '116.74.188.84', 'Google Chrome', 'windows', 1571783962, 1571784262, 1, 1),
(100, '116.74.188.84', 'Google Chrome', 'windows', 1571784020, 1571784185, 1, 1),
(101, '182.64.217.200', 'Google Chrome', 'windows', 1571893253, 1571893553, 1, 1),
(102, '116.74.188.84', 'Google Chrome', 'windows', 1571895448, 1571895496, 1, 1),
(103, '116.74.188.84', 'Google Chrome', 'windows', 1571895523, 1571895823, 1, 1),
(104, '116.74.188.84', 'Google Chrome', 'windows', 1571895730, 1571896030, 1, 1),
(105, '116.74.188.84', 'Google Chrome', 'linux', 1571895828, 1571896042, 1, 1),
(106, '116.74.188.84', 'Google Chrome', 'windows', 1571896232, 1571896474, 1, 1),
(107, '182.64.217.200', 'Google Chrome', 'windows', 1571981756, 1571982646, 1, 1),
(108, '182.64.217.200', 'Google Chrome', 'windows', 1571982654, 1571982954, 1, 1),
(109, '103.35.133.33', 'Google Chrome', 'windows', 1571984604, 1571985160, 1, 1),
(110, '103.35.133.33', 'Google Chrome', 'windows', 1571986394, 1571986694, 1, 1),
(111, '103.35.133.33', 'Google Chrome', 'windows', 1571986476, 1571987232, 1, 1),
(112, '182.64.217.200', 'Google Chrome', 'windows', 1571955916, NULL, 1, 1),
(113, '103.35.133.33', 'Google Chrome', 'windows', 1571956407, 1571956707, 1, 1),
(114, '103.35.133.33', 'Google Chrome', 'windows', 1571956537, NULL, 1, 1),
(115, '182.68.62.46', 'Google Chrome', 'windows', 1572558119, 1572558419, 1, 1),
(116, '116.75.176.241', 'Google Chrome', 'windows', 1572558304, 1572558331, 1, 1),
(117, '116.75.176.241', 'Google Chrome', 'windows', 1572659897, 1572660339, 1, 1),
(118, '182.68.62.46', 'Google Chrome', 'windows', 1572672515, NULL, 1, 1),
(119, '116.75.176.241', 'Google Chrome', 'windows', 1572679108, 1572679475, 1, 1),
(120, '116.75.176.241', 'Google Chrome', 'windows', 1572679628, 1572636771, 1, 1),
(121, '116.75.176.241', 'Google Chrome', 'windows', 1572648016, 1572648316, 1, 1),
(122, '116.75.176.241', 'Google Chrome', 'windows', 1572648068, 1572648105, 1, 1),
(123, '116.75.176.241', 'Google Chrome', 'windows', 1572648167, 1572648212, 1, 1),
(124, '116.75.176.241', 'Google Chrome', 'windows', 1572648279, 1572648533, 1, 1),
(125, '116.75.176.241', 'Google Chrome', 'windows', 1572833030, 1572833127, 1, 1),
(126, '182.64.78.136', 'Google Chrome', 'windows', 1572842387, NULL, 1, 1),
(127, '180.151.73.154', 'Google Chrome', 'windows', 1572843879, 1572844036, 1, 1),
(128, '116.75.176.241', 'Google Chrome', 'windows', 1572929144, 1572929550, 1, 1),
(129, '116.75.176.241', 'Google Chrome', 'windows', 1572932226, 1572932326, 1, 1),
(130, '116.75.176.241', 'Google Chrome', 'windows', 1572932339, 1572932413, 2, 1),
(131, '116.75.176.241', 'Google Chrome', 'windows', 1572932427, 1572932488, 1, 1),
(132, '116.75.176.241', 'Google Chrome', 'windows', 1572933092, 1572933128, 1, 1),
(133, '116.75.176.241', 'Google Chrome', 'windows', 1572933575, 1572933875, 1, 1),
(134, '39.42.6.50', 'Google Chrome', 'windows', 1573072912, 1573073212, 1, 1),
(135, '39.42.6.50', 'Google Chrome', 'windows', 1573075616, NULL, 1, 1),
(136, '223.225.42.47', 'Google Chrome', 'linux', 1573191458, NULL, 1, 1),
(137, '103.255.7.57', 'Google Chrome', 'windows', 1573195036, NULL, 1, 1),
(138, '116.75.176.241', 'Google Chrome', 'windows', 1573197487, 1573197787, 1, 1),
(139, '104.131.19.173', 'Google Chrome', 'windows', 1573248540, NULL, 1, 1),
(140, '49.207.48.125', 'Google Chrome', 'windows', 1573354603, NULL, 1, 1),
(141, '116.75.176.241', 'Google Chrome', 'windows', 1573451446, 1573451746, 1, 1),
(142, '103.240.193.228', 'Google Chrome', 'windows', 1573451514, NULL, 1, 1),
(143, '116.75.176.241', 'Google Chrome', 'windows', 1573451610, 1573451685, 1, 1),
(144, '182.68.179.199', 'Google Chrome', 'windows', 1574196653, NULL, 1, 1),
(145, '182.64.33.184', 'Google Chrome', 'windows', 1575696591, NULL, 1, 1),
(146, '116.74.218.202', 'Google Chrome', 'windows', 1575696716, 1575698795, 1, 1),
(147, '116.74.218.202', 'Google Chrome', 'windows', 1575700871, 1575701171, 1, 1),
(148, '116.74.218.202', 'Google Chrome', 'windows', 1575700933, 1575701014, 1, 1),
(149, '103.35.133.40', 'Google Chrome', 'linux', 1575681836, 1575681920, 1, 1),
(150, '103.35.133.40', 'Google Chrome', 'linux', 1575681963, 1575682001, 2, 2),
(151, '103.35.133.40', 'Google Chrome', 'windows', 1575772406, 1575772769, 1, 1),
(152, '127.0.0.1', 'Google Chrome', 'windows', 1576047304, 1576033821, 1, 1),
(153, '127.0.0.1', 'Google Chrome', 'windows', 1576034452, 1576034752, 1, 1),
(154, '127.0.0.1', 'Google Chrome', 'windows', 1576200900, 1576200956, 1, 1),
(155, '127.0.0.1', 'Google Chrome', 'windows', 1576200971, 1576201062, 1, 1),
(156, '127.0.0.1', 'Google Chrome', 'windows', 1576201081, 1576201093, 8, 4),
(157, '127.0.0.1', 'Google Chrome', 'windows', 1576201178, 1576201478, 1, 1),
(158, '127.0.0.1', 'Google Chrome', 'windows', 1576292453, 1576292753, 1, 1),
(159, '127.0.0.1', 'Google Chrome', 'windows', 1576298123, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mailandsms`
--

CREATE TABLE `mailandsms` (
  `mailandsmsID` int(11) UNSIGNED NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `users` text NOT NULL,
  `type` varchar(16) NOT NULL,
  `senderusertypeID` int(11) NOT NULL,
  `senderID` int(11) NOT NULL,
  `message` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mailandsmstemplate`
--

CREATE TABLE `mailandsmstemplate` (
  `mailandsmstemplateID` int(11) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `template` text NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mailandsmstemplate`
--

INSERT INTO `mailandsmstemplate` (`mailandsmstemplateID`, `name`, `usertypeID`, `type`, `template`, `create_date`) VALUES
(1, 'Azpire School', 4, 'sms', '[name] has not attended the class today.', '2019-07-29 02:44:59'),
(2, 'Attendance Notification', 3, 'sms', 'You have not attended the class today.', '2019-07-29 02:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `mailandsmstemplatetag`
--

CREATE TABLE `mailandsmstemplatetag` (
  `mailandsmstemplatetagID` int(11) UNSIGNED NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `tagname` varchar(128) NOT NULL,
  `mailandsmstemplatetag_extra` varchar(255) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mailandsmstemplatetag`
--

INSERT INTO `mailandsmstemplatetag` (`mailandsmstemplatetagID`, `usertypeID`, `tagname`, `mailandsmstemplatetag_extra`, `create_date`) VALUES
(1, 1, '[name]', NULL, '2016-12-10 20:36:33'),
(2, 1, '[dob]', NULL, '2016-12-10 20:37:31'),
(3, 1, '[gender]', NULL, '2016-12-10 20:37:31'),
(4, 1, '[religion]', NULL, '2016-12-10 20:39:51'),
(5, 1, '[email]', NULL, '2016-12-10 20:39:51'),
(6, 1, '[phone]', NULL, '2016-12-10 20:39:51'),
(7, 1, '[address]', NULL, '2016-12-10 20:39:51'),
(8, 1, '[jod]', NULL, '2016-12-10 20:39:51'),
(9, 1, '[username]', NULL, '2016-12-10 20:39:51'),
(10, 2, '[name]', NULL, '2016-12-10 20:40:50'),
(11, 2, '[designation]', NULL, '2016-12-10 20:43:27'),
(12, 2, '[dob]', NULL, '2016-12-10 20:46:21'),
(13, 2, '[gender]', NULL, '2016-12-10 20:46:21'),
(14, 2, '[religion]', NULL, '2016-12-10 20:46:21'),
(15, 2, '[email]', NULL, '2016-12-10 20:46:21'),
(16, 2, '[phone]', NULL, '2016-12-10 20:46:21'),
(17, 2, '[address]', NULL, '2016-12-10 20:46:21'),
(18, 2, '[jod]', NULL, '2016-12-10 20:46:21'),
(19, 2, '[username]', NULL, '2016-12-10 20:46:21'),
(20, 3, '[name]', NULL, '2016-12-10 20:47:09'),
(21, 3, '[dob]', NULL, '2016-12-10 20:55:54'),
(22, 3, '[gender]', NULL, '2016-12-10 20:55:54'),
(23, 3, '[blood_group]', NULL, '2016-12-10 20:55:54'),
(24, 3, '[religion]', NULL, '2016-12-10 20:55:54'),
(25, 3, '[email]', NULL, '2016-12-10 20:55:54'),
(26, 3, '[phone]', NULL, '2016-12-10 20:55:54'),
(27, 3, '[address]', NULL, '2016-12-10 20:55:54'),
(28, 3, '[state]', NULL, '2017-02-11 18:21:49'),
(29, 3, '[country]', NULL, '2017-02-11 18:21:27'),
(30, 3, '[class]', NULL, '2016-12-18 21:34:20'),
(31, 3, '[section]', NULL, '2016-12-10 20:55:54'),
(32, 3, '[group]', NULL, '2016-12-10 20:55:54'),
(33, 3, '[optional_subject]', NULL, '2016-12-10 20:55:54'),
(34, 3, '[register_no]', NULL, '2017-02-11 18:21:27'),
(35, 3, '[roll]', NULL, '2017-02-11 18:22:56'),
(36, 3, '[extra_curricular_activities]', NULL, '2017-02-11 18:22:56'),
(37, 3, '[remarks]', NULL, '2017-02-11 18:22:56'),
(38, 3, '[username]', NULL, '2016-12-10 20:55:54'),
(39, 3, '[result_table]', NULL, '2016-12-10 20:55:54'),
(40, 4, '[name]', NULL, '2016-12-10 20:57:31'),
(41, 4, '[father\'s_name]', NULL, '2016-12-10 21:04:19'),
(42, 4, '[mother\'s_name]', NULL, '2016-12-10 21:04:19'),
(43, 4, '[father\'s_profession]', NULL, '2016-12-10 21:04:19'),
(44, 4, '[mother\'s_profession]', NULL, '2016-12-10 21:04:19'),
(45, 4, '[email]', NULL, '2016-12-10 21:04:19'),
(46, 4, '[phone]', NULL, '2016-12-10 21:04:19'),
(47, 4, '[address]', NULL, '2016-12-10 21:04:19'),
(48, 4, '[username]', NULL, '2016-12-10 21:04:19'),
(49, 1, '[date]', NULL, '2018-05-11 10:12:12'),
(50, 2, '[date]', NULL, '2018-05-11 10:12:27'),
(51, 3, '[date]', NULL, '2018-05-11 10:12:36'),
(52, 4, '[date]', NULL, '2018-05-11 10:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `maininvoice`
--

CREATE TABLE `maininvoice` (
  `maininvoiceID` int(11) UNSIGNED NOT NULL,
  `maininvoiceschoolyearID` int(11) NOT NULL,
  `maininvoiceclassesID` int(11) NOT NULL,
  `maininvoicestudentID` int(11) NOT NULL,
  `maininvoiceuserID` int(11) DEFAULT NULL,
  `maininvoiceusertypeID` int(11) DEFAULT NULL,
  `maininvoiceuname` varchar(60) DEFAULT NULL,
  `maininvoicedate` date NOT NULL,
  `maininvoicecreate_date` date NOT NULL,
  `maininvoiceday` varchar(20) DEFAULT NULL,
  `maininvoicemonth` varchar(20) DEFAULT NULL,
  `maininvoiceyear` year(4) NOT NULL,
  `maininvoicestatus` int(11) DEFAULT NULL,
  `maininvoicedeleted_at` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maininvoice`
--

INSERT INTO `maininvoice` (`maininvoiceID`, `maininvoiceschoolyearID`, `maininvoiceclassesID`, `maininvoicestudentID`, `maininvoiceuserID`, `maininvoiceusertypeID`, `maininvoiceuname`, `maininvoicedate`, `maininvoicecreate_date`, `maininvoiceday`, `maininvoicemonth`, `maininvoiceyear`, `maininvoicestatus`, `maininvoicedeleted_at`) VALUES
(1, 1, 1, 1, 1, 1, 'S Saxena', '2019-07-28', '2019-07-28', '28', '07', 2019, 1, 1),
(2, 1, 1, 1, 1, 1, 'S Saxena', '2019-09-26', '2019-09-19', '19', '09', 2019, 0, 0),
(3, 1, 1, 2, 1, 1, 'S Saxena', '2019-09-20', '2019-09-19', '19', '09', 2019, 0, 0),
(4, 1, 1, 2, 1, 1, 'S Saxena', '2019-09-21', '2019-09-19', '19', '09', 2019, 0, 0),
(5, 1, 1, 2, 1, 1, 'S Saxena', '2019-09-28', '2019-09-19', '19', '09', 2019, 0, 0),
(6, 1, 1, 2, 1, 1, 'S Saxena', '2019-10-31', '2019-09-19', '19', '09', 2019, 1, 1),
(7, 1, 1, 2, 1, 1, 'S Saxena', '2019-09-30', '2019-09-19', '19', '09', 2019, 2, 1),
(8, 1, 1, 2, 1, 1, 'S Saxena', '2019-09-27', '2019-09-19', '19', '09', 2019, 2, 1),
(9, 1, 1, 1, 1, 1, 'S Saxena', '2019-09-02', '2019-09-20', '20', '09', 2019, 1, 1),
(10, 1, 1, 2, 1, 1, 'S Saxena', '2019-09-17', '2019-09-20', '20', '09', 2019, 0, 1),
(11, 1, 1, 2, 1, 1, 'S Saxena', '2019-09-01', '2019-09-20', '20', '09', 2019, 1, 1),
(12, 1, 1, 3, 1, 1, 'S Saxena', '2019-09-20', '2019-09-20', '20', '09', 2019, 0, 1),
(13, 1, 1, 3, 1, 1, 'S Saxena', '2019-09-27', '2019-09-20', '20', '09', 2019, 1, 1),
(14, 1, 1, 3, 1, 1, 'S Saxena', '2019-09-26', '2019-09-20', '20', '09', 2019, 1, 1),
(15, 1, 1, 3, 1, 1, 'S Saxena', '2019-09-15', '2019-09-20', '20', '09', 2019, 1, 1),
(16, 1, 1, 3, 1, 1, 'S Saxena', '2019-09-08', '2019-09-20', '20', '09', 2019, 1, 1),
(17, 1, 1, 3, 1, 1, 'S Saxena', '2019-09-03', '2019-09-20', '20', '09', 2019, 1, 1),
(18, 1, 1, 3, 1, 1, 'S Saxena', '2019-09-27', '2019-09-20', '20', '09', 2019, 0, 1),
(19, 1, 1, 3, 1, 1, 'S Saxena', '2019-09-14', '2019-09-20', '20', '09', 2019, 0, 1),
(20, 1, 1, 3, 1, 1, 'S Saxena', '2019-09-11', '2019-09-20', '20', '09', 2019, 1, 1),
(21, 1, 1, 3, 1, 1, 'S Saxena', '2019-09-12', '2019-09-20', '20', '09', 2019, 1, 1),
(22, 1, 1, 3, 1, 1, 'S Saxena', '2019-09-05', '2019-09-20', '20', '09', 2019, 1, 1),
(23, 1, 1, 3, 1, 1, 'S Saxena', '2019-09-18', '2019-09-20', '20', '09', 2019, 1, 1),
(24, 1, 1, 3, 1, 1, 'S Saxena', '2019-09-02', '2019-09-21', '21', '09', 2019, 1, 1),
(25, 1, 1, 3, 1, 1, 'S Saxena', '2019-09-20', '2019-09-23', '23', '09', 2019, 1, 1),
(26, 1, 1, 3, 1, 1, 'S Saxena', '2019-08-27', '2019-10-14', '14', '10', 2019, 1, 1),
(27, 1, 1, 3, 1, 1, 'S Saxena', '2019-10-12', '2019-10-19', '19', '10', 2019, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `make_payment`
--

CREATE TABLE `make_payment` (
  `make_paymentID` int(11) NOT NULL,
  `month` text NOT NULL,
  `gross_salary` text NOT NULL,
  `total_deduction` text NOT NULL,
  `net_salary` text NOT NULL,
  `payment_amount` text NOT NULL,
  `payment_method` int(11) NOT NULL,
  `comments` text,
  `templateID` int(11) NOT NULL,
  `salaryID` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `schoolyearID` int(11) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(60) NOT NULL,
  `create_usertype` varchar(60) NOT NULL,
  `total_hours` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `manage_salary`
--

CREATE TABLE `manage_salary` (
  `manage_salaryID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `template` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(60) NOT NULL,
  `create_usertype` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manage_salary`
--

INSERT INTO `manage_salary` (`manage_salaryID`, `userID`, `usertypeID`, `salary`, `template`, `create_date`, `modify_date`, `create_userID`, `create_username`, `create_usertype`) VALUES
(1, 3, 2, 1, 11, '2019-09-25 14:33:39', '2019-09-25 15:32:11', 1, 'initest_admin', 'Admin'),
(2, 1, 2, 1, 11, '2019-09-25 14:37:23', '2019-09-25 14:37:23', 1, 'initest_admin', 'Admin'),
(3, 2, 2, 1, 11, '2019-09-25 15:19:09', '2019-09-25 15:19:09', 1, 'initest_admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `markID` int(200) UNSIGNED NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `examID` int(11) NOT NULL,
  `exam` varchar(60) NOT NULL,
  `studentID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `year` year(4) NOT NULL,
  `create_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL DEFAULT '0',
  `create_usertypeID` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `markpercentage`
--

CREATE TABLE `markpercentage` (
  `markpercentageID` int(11) NOT NULL,
  `markpercentagetype` varchar(100) NOT NULL,
  `percentage` double NOT NULL,
  `examID` int(11) DEFAULT NULL,
  `classesID` int(11) DEFAULT NULL,
  `subjectID` int(11) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(60) NOT NULL,
  `create_usertype` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `markpercentage`
--

INSERT INTO `markpercentage` (`markpercentageID`, `markpercentagetype`, `percentage`, `examID`, `classesID`, `subjectID`, `create_date`, `modify_date`, `create_userID`, `create_username`, `create_usertype`) VALUES
(1, 'Exam', 100, NULL, NULL, NULL, '2017-01-05 06:11:54', '2017-01-05 06:12:08', 1, 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `markrelation`
--

CREATE TABLE `markrelation` (
  `markrelationID` int(11) UNSIGNED NOT NULL,
  `markID` int(11) NOT NULL,
  `markpercentageID` int(11) NOT NULL,
  `mark` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `mediaID` int(11) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `mcategoryID` int(11) NOT NULL DEFAULT '0',
  `file_name` varchar(255) NOT NULL,
  `file_name_display` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `media_category`
--

CREATE TABLE `media_category` (
  `mcategoryID` int(11) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `media_gallery`
--

CREATE TABLE `media_gallery` (
  `media_galleryID` int(11) NOT NULL,
  `media_gallery_type` int(11) NOT NULL,
  `file_type` varchar(40) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_original_name` varchar(255) DEFAULT NULL,
  `file_title` text NOT NULL,
  `file_size` varchar(40) DEFAULT NULL,
  `file_width_height` varchar(40) DEFAULT NULL,
  `file_upload_date` datetime DEFAULT NULL,
  `file_caption` text,
  `file_alt_text` varchar(255) DEFAULT NULL,
  `file_description` text,
  `file_length` varchar(128) DEFAULT NULL,
  `file_artist` varchar(128) DEFAULT NULL,
  `file_album` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `media_share`
--

CREATE TABLE `media_share` (
  `shareID` int(11) UNSIGNED NOT NULL,
  `classesID` int(11) NOT NULL DEFAULT '0',
  `public` int(11) NOT NULL,
  `file_or_folder` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menuID` int(11) NOT NULL,
  `menuName` varchar(128) NOT NULL,
  `link` varchar(512) NOT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `pullRight` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `parentID` int(11) NOT NULL DEFAULT '0',
  `priority` int(11) NOT NULL DEFAULT '1000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menuID`, `menuName`, `link`, `icon`, `pullRight`, `status`, `parentID`, `priority`) VALUES
(1, 'dashboard', 'dashboard', 'fa-laptop', '', 1, 0, 10000),
(2, 'student', 'student', 'icon-student', NULL, 1, 0, 1000),
(3, 'parents', 'parents', 'fa-user', NULL, 1, 0, 1000),
(4, 'teacher', 'teacher', 'icon-teacher', NULL, 1, 0, 1000),
(5, 'user', 'user', 'fa-users', NULL, 1, 0, 1000),
(6, 'main_academic', '#', 'icon-academicmain', '', 1, 0, 1000),
(7, 'main_attendance', '#', 'icon-attendance', NULL, 1, 0, 1000),
(8, 'main_exam', '#', 'icon-exam', NULL, 1, 0, 1000),
(9, 'main_mark', '#', 'icon-markmain', NULL, 1, 0, 1000),
(10, 'conversation', 'conversation', 'fa-envelope', NULL, 1, 0, 1000),
(11, 'media', 'media', 'fa-film', NULL, 1, 0, 1000),
(12, 'mailandsms', 'mailandsms', 'icon-mailandsms', NULL, 1, 0, 1000),
(13, 'main_library', '#', 'icon-library', '', 1, 0, 390),
(14, 'main_transport', '#', 'icon-bus', '', 1, 0, 350),
(15, 'main_hostel', '#', 'icon-hhostel', '', 1, 0, 320),
(16, 'main_account', '#', 'icon-account', '', 1, 0, 280),
(17, 'main_announcement', '#', 'icon-noticemain', '', 1, 0, 230),
(18, 'main_report', '#', 'fa-clipboard', '', 1, 0, 190),
(19, 'visitorinfo', 'visitorinfo', 'icon-visitorinfo', '', 1, 0, 150),
(20, 'main_administrator', '#', 'icon-administrator', '', 1, 0, 140),
(21, 'main_settings', '#', 'fa-gavel', '', 1, 0, 30),
(22, 'classes', 'classes', 'fa-sitemap', NULL, 1, 6, 5000),
(23, 'section', 'section', 'fa-star', '', 1, 6, 4500),
(24, 'subject', 'subject', 'icon-subject', '', 1, 6, 4000),
(25, 'routine', 'routine', 'icon-routine', NULL, 1, 6, 1000),
(26, 'syllabus', 'syllabus', 'icon-syllabus', NULL, 1, 6, 3500),
(27, 'assignment', 'assignment', 'icon-assignment', NULL, 1, 6, 3000),
(28, 'sattendance', 'sattendance', 'icon-sattendance', NULL, 1, 7, 1000),
(29, 'tattendance', 'tattendance', 'icon-tattendance', NULL, 1, 7, 1000),
(30, 'exam', 'exam', 'fa-pencil', NULL, 1, 8, 1000),
(31, 'examschedule', 'examschedule', 'fa-puzzle-piece', NULL, 1, 8, 1000),
(32, 'grade', 'grade', 'fa-signal', NULL, 1, 8, 1000),
(33, 'eattendance', 'eattendance', 'icon-eattendance', NULL, 1, 8, 1000),
(34, 'mark', 'mark', 'fa-flask', NULL, 1, 9, 1000),
(35, 'markpercentage', 'markpercentage', 'icon-markpercentage', NULL, 1, 9, 1000),
(36, 'promotion', 'promotion', 'icon-promotion', NULL, 1, 9, 1000),
(37, 'notice', 'notice', 'fa-calendar', '', 1, 17, 220),
(38, 'event', 'event', 'fa-calendar-check-o', '', 1, 17, 210),
(39, 'holiday', 'holiday', 'icon-holiday', '', 1, 17, 200),
(40, 'classreport', 'classesreport', 'icon-classreport', '', 1, 18, 1000),
(41, 'attendancereport', 'attendancereport', 'icon-attendancereport', '', 1, 18, 940),
(42, 'studentreport', 'studentreport', 'icon-studentreport', '', 1, 18, 990),
(43, 'schoolyear', 'schoolyear', 'fa fa-calendar-plus-o', '', 1, 20, 130),
(44, 'mailandsmstemplate', 'mailandsmstemplate', 'icon-template', '', 1, 20, 100),
(46, 'backup', 'backup', 'fa-download', '', 1, 20, 80),
(47, 'systemadmin', 'systemadmin', 'icon-systemadmin', '', 1, 20, 120),
(48, 'resetpassword', 'resetpassword', 'icon-reset_password', '', 1, 20, 110),
(49, 'permission', 'permission', 'icon-permission', '', 1, 20, 60),
(50, 'usertype', 'usertype', 'icon-role', '', 1, 20, 70),
(51, 'setting', 'setting', 'fa-gears', '', 1, 21, 30),
(52, 'paymentsettings', 'paymentsettings', 'icon-paymentsettings', '', 1, 21, 20),
(53, 'smssettings', 'smssettings', 'fa-wrench', '', 1, 21, 10),
(54, 'invoice', 'invoice', 'icon-invoice', '', 1, 16, 260),
(55, 'paymenthistory', 'paymenthistory', 'icon-payment', '', 1, 16, 250),
(56, 'transport', 'transport', 'icon-sbus', '', 1, 14, 340),
(57, 'member', 'tmember', 'icon-member', '', 1, 14, 330),
(58, 'hostel', 'hostel', 'icon-hostel', '', 1, 15, 310),
(59, 'category', 'category', 'fa-leaf', '', 1, 15, 300),
(61, 'member', 'hmember', 'icon-member', '', 1, 15, 290),
(62, 'feetypes', 'feetypes', 'icon-feetypes', '', 1, 16, 270),
(63, 'expense', 'expense', 'icon-expense', '', 1, 16, 240),
(64, 'member', 'lmember', 'icon-member', '', 1, 13, 380),
(65, 'books', 'book', 'icon-lbooks', '', 1, 13, 370),
(66, 'issue', 'issue', 'icon-issue', '', 1, 13, 360),
(69, 'import', 'bulkimport', 'fa-upload', '', 1, 20, 90),
(70, 'update', 'update', 'fa-refresh', '', 1, 20, 50),
(71, 'main_child', '#', 'fa-child', '', 1, 0, 430),
(72, 'activitiescategory', 'activitiescategory', 'fa-pagelines', '', 1, 71, 420),
(73, 'activities', 'activities', 'fa-fighter-jet', '', 1, 71, 410),
(74, 'childcare', 'childcare', 'fa-wheelchair', '', 1, 71, 400),
(75, 'uattendance', 'uattendance', 'fa-user-secret', NULL, 1, 7, 1000),
(76, 'studentgroup', 'studentgroup', 'fa-object-group', '', 1, 20, 129),
(77, 'vendor', 'vendor', 'fa-rss', '', 1, 96, 1000),
(78, 'location', 'location', 'fa-newspaper-o', '', 1, 96, 1000),
(79, 'asset_category', 'asset_category', 'fa-life-ring', '', 1, 96, 1000),
(80, 'asset', 'asset', 'fa-fax', '', 1, 96, 1000),
(81, 'complain', 'complain', 'fa-commenting', '', 1, 20, 128),
(82, 'question_group', 'question_group', 'fa-question-circle', '', 1, 88, 1000),
(83, 'question_level', 'question_level', 'fa-level-up', '', 1, 88, 1000),
(84, 'question_bank', 'question_bank', 'fa-qrcode', '', 1, 88, 1000),
(85, 'online_exam', 'online_exam', 'fa-slideshare', '', 1, 88, 1000),
(86, 'instruction', 'instruction', 'fa-map-signs', '', 1, 88, 1000),
(87, 'take_exam', 'take_exam', 'fa-user-secret', '', 1, 88, 1000),
(88, 'online_exam', '#', 'fa-graduation-cap', '', 1, 0, 1000),
(89, 'certificatereport', 'certificatereport', 'fa-diamond', '', 1, 18, 860),
(90, 'certificate_template', 'certificate_template', 'fa-certificate', '', 1, 20, 128),
(91, 'main_payroll', '#', 'fa-usd', NULL, 1, 0, 1000),
(92, 'salary_template', 'salary_template', 'fa-calculator', '', 1, 91, 1000),
(93, 'hourly_template', 'hourly_template', 'fa fa-clock-o', '', 1, 91, 1000),
(94, 'manage_salary', 'manage_salary', 'fa-beer', '', 1, 91, 1000),
(95, 'make_payment', 'make_payment', 'fa-money', NULL, 1, 91, 1000),
(96, 'main_asset_management', '#', 'fa-archive', NULL, 1, 0, 1000),
(97, 'asset_assignment', 'asset_assignment', 'fa-plug', NULL, 1, 96, 1000),
(98, 'purchase', 'purchase', 'fa-cart-plus', NULL, 1, 96, 1000),
(99, 'main_frontend', '#', 'fa-home', '', 1, 0, 40),
(100, 'pages', 'pages', 'fa-connectdevelop', '', 1, 99, 1000),
(101, 'frontend_setting', 'frontend_setting', 'fa-asterisk', '', 1, 21, 25),
(102, 'routinereport', 'routinereport', 'iniicon-routinereport', '', 1, 18, 960),
(103, 'examschedulereport', 'examschedulereport', 'iniicon-examschedulereport', '', 1, 18, 950),
(104, 'feesreport', 'feesreport', 'iniicon-feesreport', '', 1, 18, 850),
(105, 'duefeesreport', 'duefeesreport', 'iniicon-duefeesreport', '', 1, 18, 840),
(106, 'balancefeesreport', 'balancefeesreport', 'iniicon-balancefeesreport', '', 1, 18, 830),
(107, 'transactionreport', 'transactionreport', 'iniicon-transactionreport', '', 1, 18, 820),
(108, 'sociallink', 'sociallink', 'iniicon-sociallink', '', 1, 20, 109),
(109, 'idcardreport', 'idcardreport', 'iniicon-idcardreport', '', 1, 18, 980),
(110, 'admitcardreport', 'admitcardreport', 'iniicon-admitcardreport', '', 1, 18, 970),
(111, 'studentfinereport', 'studentfinereport', 'iniicon-studentfinereport', '', 1, 18, 810),
(112, 'attendanceoverviewreport', 'attendanceoverviewreport', 'iniicon-attendanceoverviewreport', '', 1, 18, 930),
(113, 'income', 'income', 'iniicon-income', '', 1, 16, 239),
(114, 'global_payment', 'global_payment', 'fa-balance-scale', '', 1, 16, 238),
(115, 'terminalreport', 'terminalreport', 'iniicon-terminalreport', '', 1, 18, 920),
(116, 'tabulationsheetreport', 'tabulationsheetreport', 'iniicon-tabulationsheetreport', '', 1, 18, 900),
(117, 'marksheetreport', 'marksheetreport', 'iniicon-marksheetreport', '', 1, 18, 890),
(118, 'meritstagereport', 'meritstagereport', 'iniicon-meritstagereport', '', 1, 18, 910),
(119, 'progresscardreport', 'progresscardreport', 'iniicon-progresscardreport', '', 1, 18, 880),
(120, 'onlineexamreport', 'onlineexamreport', 'iniicon-onlineexamreport', '', 1, 18, 870),
(121, 'main_inventory', '#', 'iniicon-maininventory', '', 1, 0, 1000),
(122, 'productcategory', 'productcategory', 'iniicon-productcategory', '', 1, 121, 1000),
(123, 'product', 'product', 'iniicon-product', '', 1, 121, 1000),
(124, 'productwarehouse', 'productwarehouse', 'iniicon-productwarehouse', '', 1, 121, 1000),
(125, 'productsupplier', 'productsupplier', 'iniicon-productsupplier', '', 1, 121, 1000),
(126, 'productpurchase', 'productpurchase', 'iniicon-productpurchase', '', 1, 121, 1000),
(127, 'productsale', 'productsale', 'iniicon-productsale', '', 1, 121, 1000),
(128, 'main_leaveapplication', '#', 'iniicon-mainleaveapplication', '', 1, 0, 1000),
(129, 'leavecategory', 'leavecategory', 'iniicon-leavecategory', '', 1, 128, 1000),
(130, 'leaveassign', 'leaveassign', 'iniicon-leaveassign', '', 1, 128, 1000),
(131, 'leaveapply', 'leaveapply', 'iniicon-leaveapply', '', 1, 128, 1000),
(132, 'leaveapplication', 'leaveapplication', 'iniicon-leaveapplication', '', 1, 128, 1000),
(133, 'librarybooksreport', 'librarybooksreport', 'iniicon-librarybooksreport', '', 1, 18, 925),
(134, 'searchpaymentfeesreport', 'searchpaymentfeesreport', 'iniicon-searchpaymentfeesreport', '', 1, 18, 852),
(135, 'salaryreport', 'salaryreport', 'iniicon-salaryreport', '', 1, 18, 805),
(136, 'productpurchasereport', 'productpurchasereport', 'iniicon-productpurchasereport', '', 1, 18, 854),
(137, 'productsalereport', 'productsalereport', 'iniicon-productsalereport', '', 1, 18, 853),
(138, 'leaveapplicationreport', 'leaveapplicationreport', 'iniicon-leaveapplicationreport', '', 1, 18, 855),
(139, 'posts', 'posts', 'fa-thumb-tack', '', 1, 99, 1005),
(140, 'posts_categories', 'posts_categories', 'fa-anchor', NULL, 1, 99, 1010),
(141, 'menu', 'frontendmenu', 'iniicon-fmenu', '', 1, 99, 1000),
(142, 'librarycardreport', 'librarycardreport', 'iniicon-librarycardreport', '', 1, 18, 924),
(143, 'librarybookissuereport', 'librarybookissuereport', 'iniicon-librarybookissuereport', '', 1, 18, 923),
(144, 'onlineexamquestionreport', 'onlineexamquestionreport', 'iniicon-onlineexamquestionreport', '', 1, 18, 865),
(145, 'ebooks', 'ebooks', 'iniicon-ebook', '', 1, 13, 350),
(146, 'accountledgerreport', 'accountledgerreport', 'iniicon-accountledgerreport', '', 1, 18, 800),
(147, 'onlineadmission', 'onlineadmission', 'iniicon-onlineadmission', '', 1, 0, 160),
(148, 'emailsetting', 'emailsetting', 'iniicon-ini-emailsetting', '', 1, 21, 5),
(149, 'onlineadmissionreport', 'onlineadmissionreport', 'iniicon-onlineadmissionreport', '', 1, 18, 863),
(150, 'shift', 'shift', 'icon-administrator', NULL, 1, 20, 1000),
(151, 'category', 'categoryus', 'icon-administrator', NULL, 1, 20, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `noticeID` int(11) UNSIGNED NOT NULL,
  `title` varchar(128) NOT NULL,
  `notice` text NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `date` date NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `create_userID` int(11) NOT NULL DEFAULT '0',
  `create_usertypeID` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `onlineadmission`
--

CREATE TABLE `onlineadmission` (
  `onlineadmissionID` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `religion` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` varchar(200) DEFAULT NULL,
  `classesID` int(11) DEFAULT NULL,
  `bloodgroup` varchar(5) DEFAULT NULL,
  `country` varchar(128) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `schoolyearID` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL,
  `studentID` int(11) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT '0' COMMENT '0 = New, 1=Approved, 2 = Waiting, 3 = Declined'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `online_exam`
--

CREATE TABLE `online_exam` (
  `onlineExamID` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `description` text,
  `classID` int(11) DEFAULT '0',
  `sectionID` int(11) DEFAULT '0',
  `studentGroupID` int(11) DEFAULT '0',
  `subjectID` int(11) DEFAULT '0',
  `userTypeID` int(11) DEFAULT '0',
  `instructionID` int(11) DEFAULT '0',
  `examStatus` varchar(11) NOT NULL,
  `schoolYearID` int(11) NOT NULL,
  `examTypeNumber` int(11) DEFAULT NULL,
  `startDateTime` datetime DEFAULT NULL,
  `endDateTime` datetime DEFAULT NULL,
  `duration` int(11) DEFAULT '0',
  `random` int(11) DEFAULT '0',
  `public` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '1',
  `markType` int(11) NOT NULL,
  `negativeMark` int(11) DEFAULT '0',
  `bonusMark` int(11) DEFAULT '0',
  `point` int(11) DEFAULT '0',
  `percentage` int(11) DEFAULT '0',
  `showMarkAfterExam` int(11) DEFAULT '0',
  `judge` int(11) DEFAULT '1' COMMENT 'Auto Judge = 1, Manually Judge = 0',
  `paid` int(11) DEFAULT '0' COMMENT '0 = Unpaid, 1 = Paid',
  `validDays` int(11) DEFAULT '0',
  `cost` int(11) DEFAULT '0',
  `img` varchar(512) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_usertypeID` int(11) NOT NULL,
  `published` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `online_exam_question`
--

CREATE TABLE `online_exam_question` (
  `onlineExamQuestionID` int(11) NOT NULL,
  `onlineExamID` int(11) NOT NULL,
  `questionID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `online_exam_type`
--

CREATE TABLE `online_exam_type` (
  `onlineExamTypeID` int(11) NOT NULL,
  `title` varchar(512) DEFAULT NULL,
  `examTypeNumber` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `online_exam_type`
--

INSERT INTO `online_exam_type` (`onlineExamTypeID`, `title`, `examTypeNumber`, `status`) VALUES
(1, 'Date , Time and Duration', 5, 1),
(2, 'Date and Duration', 4, 1),
(3, 'Only Date', 3, 0),
(4, 'Only Duration', 2, 1),
(5, 'None', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `online_exam_user_answer`
--

CREATE TABLE `online_exam_user_answer` (
  `onlineExamUserAnswerID` int(11) NOT NULL,
  `onlineExamQuestionID` int(11) NOT NULL,
  `onlineExamRegisteredUserID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `online_exam_user_answer_option`
--

CREATE TABLE `online_exam_user_answer_option` (
  `onlineExamUserAnswerOptionID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `optionID` int(11) DEFAULT NULL,
  `typeID` int(11) NOT NULL,
  `text` text,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `online_exam_user_status`
--

CREATE TABLE `online_exam_user_status` (
  `onlineExamUserStatus` int(11) NOT NULL,
  `onlineExamID` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `totalQuestion` int(11) NOT NULL,
  `totalAnswer` int(11) NOT NULL,
  `nagetiveMark` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `userID` int(11) NOT NULL,
  `classesID` int(11) DEFAULT NULL,
  `sectionID` int(11) DEFAULT NULL,
  `examtimeID` int(11) DEFAULT NULL,
  `totalCurrectAnswer` int(11) DEFAULT NULL,
  `totalMark` varchar(40) DEFAULT NULL,
  `totalObtainedMark` int(11) DEFAULT NULL,
  `totalPercentage` double DEFAULT NULL,
  `statusID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pagesID` int(11) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `content` text,
  `status` int(11) DEFAULT NULL COMMENT '1 => active, 2 => draft, 3 => trash, 4 => review  ',
  `visibility` int(11) DEFAULT NULL COMMENT '1 => public 2 => protected 3 => private ',
  `publish_date` datetime DEFAULT NULL,
  `parentID` int(11) NOT NULL DEFAULT '0',
  `pageorder` int(11) NOT NULL DEFAULT '0',
  `template` varchar(250) DEFAULT NULL,
  `featured_image` varchar(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL,
  `create_userID` int(11) DEFAULT NULL,
  `create_username` varchar(60) DEFAULT NULL,
  `create_usertypeID` int(11) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `parentsID` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `father_name` varchar(60) NOT NULL,
  `mother_name` varchar(60) NOT NULL,
  `father_profession` varchar(40) NOT NULL,
  `mother_profession` varchar(40) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `photo` varchar(200) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(60) NOT NULL,
  `create_usertype` varchar(60) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`parentsID`, `name`, `father_name`, `mother_name`, `father_profession`, `mother_profession`, `email`, `phone`, `address`, `photo`, `username`, `password`, `usertypeID`, `create_date`, `modify_date`, `create_userID`, `create_username`, `create_usertype`, `active`) VALUES
(1, 'Sample Parent', '', '', '', '', 'info@witage.net', '9890169318', 'warje', 'default.png', 'parent', 'e53f0e18221784afd4796ffe9d958d6a98c62b253a72e7f8a80a6d5a90c4d7dcbbca008ceef6d024d2713cd57005dd70aba2f31d0ae4021da438eabdb622c00a', 4, '2019-07-28 07:34:56', '2019-07-28 07:34:56', 1, 'initest_admin', 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) UNSIGNED NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `invoiceID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `paymentamount` double DEFAULT NULL,
  `paymenttype` varchar(128) NOT NULL,
  `paymentdate` date NOT NULL,
  `paymentday` varchar(11) NOT NULL,
  `paymentmonth` varchar(10) NOT NULL,
  `paymentyear` year(4) NOT NULL,
  `userID` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `uname` varchar(60) NOT NULL,
  `transactionID` text,
  `globalpaymentID` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `schoolyearID`, `invoiceID`, `studentID`, `paymentamount`, `paymenttype`, `paymentdate`, `paymentday`, `paymentmonth`, `paymentyear`, `userID`, `usertypeID`, `uname`, `transactionID`, `globalpaymentID`) VALUES
(15, 1, 22, 3, 1000, 'Cash', '2019-09-20', '20', '09', 2019, 1, 1, 'S Saxena', 'CASHANDCHEQUE6915202966386058186', 15),
(16, 1, 24, 3, 1000, 'Cash', '2019-09-20', '20', '09', 2019, 1, 1, 'S Saxena', 'CASHANDCHEQUE6492754720556494262', 16),
(17, 1, 15, 3, 100, 'Cash', '2019-09-20', '20', '09', 2019, 1, 1, 'S Saxena', 'CASHANDCHEQUE7148639524995185105', 17),
(18, 1, 25, 3, 100, 'Cash', '2019-09-20', '20', '09', 2019, 1, 1, 'S Saxena', 'CASHANDCHEQUE8152563703699527617', 18),
(19, 1, 26, 3, 100, 'Cash', '2019-09-20', '20', '09', 2019, 1, 1, 'S Saxena', 'CASHANDCHEQUE9320584623784373295', 19),
(20, 1, 29, 3, 90, 'Cheque', '2019-09-20', '20', '09', 2019, 1, 1, 'S Saxena', 'CASHANDCHEQUE5756438522873826549', 20),
(21, 1, 30, 3, 5555, 'Cash', '2019-09-20', '20', '09', 2019, 1, 1, 'S Saxena', 'CASHANDCHEQUE5894062432344207804', 21),
(22, 1, 31, 3, 666666, 'Cash', '2019-09-20', '20', '09', 2019, 1, 1, 'S Saxena', 'CASHANDCHEQUE4232699972322554588', 22),
(23, 1, 32, 3, 66, 'Cheque', '2019-09-20', '20', '09', 2019, 1, 1, 'S Saxena', 'CASHANDCHEQUE8393647434205018443', 23),
(24, 1, 33, 3, 8, 'Cheque', '2019-09-21', '21', '09', 2019, 1, 1, 'S Saxena', 'CASHANDCHEQUE8031945747191145244', 24),
(25, 1, 34, 3, 10, 'Cash', '2019-09-23', '23', '09', 2019, 1, 1, 'S Saxena', 'CASHANDCHEQUE2091233243911498246', 25),
(26, 1, 35, 3, 30, 'Cheque', '2019-10-16', '16', '10', 2019, 1, 1, 'S Saxena', 'CASHANDCHEQUE3502949533851760792', 26),
(27, 1, 35, 3, 20, 'Cheque', '2019-10-18', '18', '10', 2019, 1, 1, 'S Saxena', 'CASHANDCHEQUE1375165266566938453', 27),
(28, 1, 35, 3, 20, 'Cheque', '2019-10-18', '18', '10', 2019, 1, 1, 'S Saxena', 'CASHANDCHEQUE4384566186824964914', 28),
(29, 1, 35, 3, 20, 'Cheque', '2019-10-18', '18', '10', 2019, 1, 1, 'S Saxena', 'CASHANDCHEQUE5110598687507165385', 29),
(30, 1, 36, 3, 80, 'Cheque', '2019-10-19', '19', '10', 2019, 1, 1, 'S Saxena', 'CASHANDCHEQUE1176114321934628137', 30),
(31, 1, 36, 3, 10, 'Cheque', '2019-10-19', '19', '10', 2019, 1, 1, 'S Saxena', 'CASHANDCHEQUE9058101339830773815', 31);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permissionID` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'In most cases, this should be the name of the module (e.g. news)',
  `active` enum('yes','no') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permissionID`, `description`, `name`, `active`) VALUES
(501, 'Dashboard', 'dashboard', 'yes'),
(502, 'Student', 'student', 'yes'),
(503, 'Student Add', 'student_add', 'yes'),
(504, 'Student Edit', 'student_edit', 'yes'),
(505, 'Student Delete', 'student_delete', 'yes'),
(506, 'Student View', 'student_view', 'yes'),
(507, 'Parents', 'parents', 'yes'),
(508, 'Parents Add', 'parents_add', 'yes'),
(509, 'Parents Edit', 'parents_edit', 'yes'),
(510, 'Parents Delete', 'parents_delete', 'yes'),
(511, 'Parents View', 'parents_view', 'yes'),
(512, 'Teacher', 'teacher', 'yes'),
(513, 'Teacher Add', 'teacher_add', 'yes'),
(514, 'Teacher Edit', 'teacher_edit', 'yes'),
(515, 'Teacher Delete', 'teacher_delete', 'yes'),
(516, 'Teacher View', 'teacher_view', 'yes'),
(517, 'User', 'user', 'yes'),
(518, 'User Add', 'user_add', 'yes'),
(519, 'User Edit', 'user_edit', 'yes'),
(520, 'User Delete', 'user_delete', 'yes'),
(521, 'User View', 'user_view', 'yes'),
(522, 'Class', 'classes', 'yes'),
(523, 'Class Add', 'classes_add', 'yes'),
(524, 'Class Edit', 'classes_edit', 'yes'),
(525, 'Class Delete', 'classes_delete', 'yes'),
(526, 'Section', 'section', 'yes'),
(527, 'Section Add', 'section_add', 'yes'),
(528, 'Section Edit', 'section_edit', 'yes'),
(529, 'Semester Delete', 'semester_delete', 'yes'),
(530, 'Section Delete', 'section_delete', 'yes'),
(531, 'Subject', 'subject', 'yes'),
(532, 'Subject Add', 'subject_add', 'yes'),
(533, 'Subject Edit', 'subject_edit', 'yes'),
(534, 'Subject Delete', 'subject_delete', 'yes'),
(535, 'Syllabus', 'syllabus', 'yes'),
(536, 'Syllabus Add', 'syllabus_add', 'yes'),
(537, 'Syllabus Edit', 'syllabus_edit', 'yes'),
(538, 'Syllabus Delete', 'syllabus_delete', 'yes'),
(539, 'Assignment', 'assignment', 'yes'),
(540, 'Assignment Add', 'assignment_add', 'yes'),
(541, 'Assignment Edit', 'assignment_edit', 'yes'),
(542, 'Assignment Delete', 'assignment_delete', 'yes'),
(543, 'Assignment View', 'assignment_view', 'yes'),
(544, 'Routine', 'routine', 'yes'),
(545, 'Routine Add', 'routine_add', 'yes'),
(546, 'Routine Edit', 'routine_edit', 'yes'),
(547, 'Routine Delete', 'routine_delete', 'yes'),
(548, 'Student Attendance', 'sattendance', 'yes'),
(549, 'Student Attendance Add', 'sattendance_add', 'yes'),
(550, 'Student Attendance View', 'sattendance_view', 'yes'),
(551, 'Teacher Attendance', 'tattendance', 'yes'),
(552, 'Teacher Attendance Add', 'tattendance_add', 'yes'),
(553, 'Teacher Attendance View', 'tattendance_view', 'yes'),
(554, 'User Attendance', 'uattendance', 'yes'),
(555, 'User Attendance Add', 'uattendance_add', 'yes'),
(556, 'User Attendance View', 'uattendance_view', 'yes'),
(557, 'Exam', 'exam', 'yes'),
(558, 'Exam Add', 'exam_add', 'yes'),
(559, 'Exam Edit', 'exam_edit', 'yes'),
(560, 'Exam Delete', 'exam_delete', 'yes'),
(561, 'Examschedule', 'examschedule', 'yes'),
(562, 'Examschedule Add', 'examschedule_add', 'yes'),
(563, 'Examschedule Edit', 'examschedule_edit', 'yes'),
(564, 'Examschedule Delete', 'examschedule_delete', 'yes'),
(565, 'Grade', 'grade', 'yes'),
(566, 'Grade Add', 'grade_add', 'yes'),
(567, 'Grade Edit', 'grade_edit', 'yes'),
(568, 'Grade Delete', 'grade_delete', 'yes'),
(569, 'Exam Attendance', 'eattendance', 'yes'),
(570, 'Exam Attendance Add', 'eattendance_add', 'yes'),
(571, 'Mark', 'mark', 'yes'),
(572, 'Mark Add', 'mark_add', 'yes'),
(573, 'Mark View', 'mark_view', 'yes'),
(574, 'Mark Distribution', 'markpercentage', 'yes'),
(575, 'Mark Distribution Add', 'markpercentage_add', 'yes'),
(576, 'Mark Distribution Edit', 'markpercentage_edit', 'yes'),
(577, 'Mark Distribution Delete', 'markpercentage_delete', 'yes'),
(578, 'Promotion', 'promotion', 'yes'),
(579, 'Message', 'conversation', 'yes'),
(580, 'Media', 'media', 'yes'),
(581, 'Media Add', 'media_add', 'yes'),
(582, 'Media Delete', 'media_delete', 'yes'),
(583, 'Mail / SMS', 'mailandsms', 'yes'),
(584, 'Mail / SMS Add', 'mailandsms_add', 'yes'),
(585, 'Mail / SMS View', 'mailandsms_view', 'yes'),
(586, 'Question Group', 'question_group', 'yes'),
(587, 'Question Group Add', 'question_group_add', 'yes'),
(588, 'Question Group Edit', 'question_group_edit', 'yes'),
(589, 'Question Group Delete', 'question_group_delete', 'yes'),
(590, 'Question Level', 'question_level', 'yes'),
(591, 'Question Level Add', 'question_level_add', 'yes'),
(592, 'Question Level Edit', 'question_level_edit', 'yes'),
(593, 'Question Level Delete', 'question_level_delete', 'yes'),
(594, 'Question Bank', 'question_bank', 'yes'),
(595, 'Question Bank Add', 'question_bank_add', 'yes'),
(596, 'Question Bank Edit', 'question_bank_edit', 'yes'),
(597, 'Question Bank Delete', 'question_bank_delete', 'yes'),
(598, 'Question Bank View', 'question_bank_view', 'yes'),
(599, 'Online Exam', 'online_exam', 'yes'),
(600, 'Online Exam Add', 'online_exam_add', 'yes'),
(601, 'Online Exam Edit', 'online_exam_edit', 'yes'),
(602, 'Online Exam Delete', 'online_exam_delete', 'yes'),
(603, 'Instruction', 'instruction', 'yes'),
(604, 'Instruction Add', 'instruction_add', 'yes'),
(605, 'Instruction Edit', 'instruction_edit', 'yes'),
(606, 'Instruction Delete', 'instruction_delete', 'yes'),
(607, 'Instruction View', 'instruction_view', 'yes'),
(608, 'Salary Template', 'salary_template', 'yes'),
(609, 'Salary Template Add', 'salary_template_add', 'yes'),
(610, 'Salary Template Edit', 'salary_template_edit', 'yes'),
(611, 'Salary Template Delete', 'salary_template_delete', 'yes'),
(612, 'Salary Template View', 'salary_template_view', 'yes'),
(613, 'Hourly Template', 'hourly_template', 'yes'),
(614, 'Hourly Template Add', 'hourly_template_add', 'yes'),
(615, 'Hourly Template Edit', 'hourly_template_edit', 'yes'),
(616, 'Hourly Template Delete', 'hourly_template_delete', 'yes'),
(617, 'Manage Salary', 'manage_salary', 'yes'),
(618, 'Manage Salary Add', 'manage_salary_add', 'yes'),
(619, 'Manage Salary Edit', 'manage_salary_edit', 'yes'),
(620, 'Manage Salary Delete', 'manage_salary_delete', 'yes'),
(621, 'Manage Salary View', 'manage_salary_view', 'yes'),
(622, 'Make Payment', 'make_payment', 'yes'),
(623, 'Vendor', 'vendor', 'yes'),
(624, 'Vendor Add', 'vendor_add', 'yes'),
(625, 'Vendor Edit', 'vendor_edit', 'yes'),
(626, 'Vendor Delete', 'vendor_delete', 'yes'),
(627, 'Location', 'location', 'yes'),
(628, 'Location Add', 'location_add', 'yes'),
(629, 'Location Edit', 'location_edit', 'yes'),
(630, 'Location Delete', 'location_delete', 'yes'),
(631, 'Asset Category', 'asset_category', 'yes'),
(632, 'Asset Category Add', 'asset_category_add', 'yes'),
(633, 'Asset Category Edit', 'asset_category_edit', 'yes'),
(634, 'Asset Category Delete', 'asset_category_delete', 'yes'),
(635, 'Asset', 'asset', 'yes'),
(636, 'Asset Add', 'asset_add', 'yes'),
(637, 'Asset Edit', 'asset_edit', 'yes'),
(638, 'Asset Delete', 'asset_delete', 'yes'),
(639, 'Asset View', 'asset_view', 'yes'),
(640, 'Asset Assignment', 'asset_assignment', 'yes'),
(641, 'Asset Assignment Add', 'asset_assignment_add', 'yes'),
(642, 'Asset Assignment Edit', 'asset_assignment_edit', 'yes'),
(643, 'Asset Assignment Delete', 'asset_assignment_delete', 'yes'),
(644, 'Asset Assignment View', 'asset_assignment_view', 'yes'),
(645, 'Purchase', 'purchase', 'yes'),
(646, 'Purchase Add', 'purchase_add', 'yes'),
(647, 'Purchase Edit', 'purchase_edit', 'yes'),
(648, 'Purchase Delete', 'purchase_delete', 'yes'),
(649, 'Product Category', 'productcategory', 'yes'),
(650, 'Product Category Add', 'productcategory_add', 'yes'),
(651, 'Product Category Edit', 'productcategory_edit', 'yes'),
(652, 'Product Category Delete', 'productcategory_delete', 'yes'),
(653, 'Product', 'product', 'yes'),
(654, 'Product Add', 'product_add', 'yes'),
(655, 'Product Edit', 'product_edit', 'yes'),
(656, 'Product Delete', 'product_delete', 'yes'),
(657, 'Warehouse', 'productwarehouse', 'yes'),
(658, 'Warehouse Add', 'productwarehouse_add', 'yes'),
(659, 'Warehouse Edit', 'productwarehouse_edit', 'yes'),
(660, 'Warehouse Delete', 'productwarehouse_delete', 'yes'),
(661, 'Supplier', 'productsupplier', 'yes'),
(662, 'Supplier Add', 'productsupplier_add', 'yes'),
(663, 'Supplier Edit', 'productsupplier_edit', 'yes'),
(664, 'Supplier Delete', 'productsupplier_delete', 'yes'),
(665, 'Purchase', 'productpurchase', 'yes'),
(666, 'Purchase Add', 'productpurchase_add', 'yes'),
(667, 'Purchase Edit', 'productpurchase_edit', 'yes'),
(668, 'Purchase Delete', 'productpurchase_delete', 'yes'),
(669, 'Purchase View', 'productpurchase_view', 'yes'),
(670, 'Sale', 'productsale', 'yes'),
(671, 'Sale Add', 'productsale_add', 'yes'),
(672, 'Sale Edit', 'productsale_edit', 'yes'),
(673, 'Sale Delete', 'productsale_delete', 'yes'),
(674, 'Sale View', 'productsale_view', 'yes'),
(675, 'Leave Category', 'leavecategory', 'yes'),
(676, 'Leave Category Add', 'leavecategory_add', 'yes'),
(677, 'Leave Category Edit', 'leavecategory_edit', 'yes'),
(678, 'Leave Category Delete', 'leavecategory_delete', 'yes'),
(679, 'Leave Assign', 'leaveassign', 'yes'),
(680, 'Leave Assign Add', 'leaveassign_add', 'yes'),
(681, 'Leave Assign Edit', 'leaveassign_edit', 'yes'),
(682, 'Leave Assign Delete', 'leaveassign_delete', 'yes'),
(683, 'Leave Apply', 'leaveapply', 'yes'),
(684, 'Leave Apply Add', 'leaveapply_add', 'yes'),
(685, 'Leave Apply Edit', 'leaveapply_edit', 'yes'),
(686, 'Leave Apply Delete', 'leaveapply_delete', 'yes'),
(687, 'Leave Apply View', 'leaveapply_view', 'yes'),
(688, 'Leave Application', 'leaveapplication', 'yes'),
(689, 'Activities Category', 'activitiescategory', 'yes'),
(690, 'Activities Category Add', 'activitiescategory_add', 'yes'),
(691, 'Activities Category Edit', 'activitiescategory_edit', 'yes'),
(692, 'Activities Category Delete', 'activitiescategory_delete', 'yes'),
(693, 'Activities', 'activities', 'yes'),
(694, 'Activities Add', 'activities_add', 'yes'),
(695, 'Activities Delete', 'activities_delete', 'yes'),
(696, 'Child Care', 'childcare', 'yes'),
(697, 'Child Care Add', 'childcare_add', 'yes'),
(698, 'Child Care Edit', 'childcare_edit', 'yes'),
(699, 'Child Care Delete', 'childcare_delete', 'yes'),
(700, 'Library Member', 'lmember', 'yes'),
(701, 'Library Member Add', 'lmember_add', 'yes'),
(702, 'Library Member Edit', 'lmember_edit', 'yes'),
(703, 'Library Member Delete', 'lmember_delete', 'yes'),
(704, 'Library Member View', 'lmember_view', 'yes'),
(705, 'Books', 'book', 'yes'),
(706, 'Books Add', 'book_add', 'yes'),
(707, 'Books Edit', 'book_edit', 'yes'),
(708, 'Books Delete', 'book_delete', 'yes'),
(709, 'Issue Book', 'issue', 'yes'),
(710, 'Issue Book Add', 'issue_add', 'yes'),
(711, 'Issue Book Edit', 'issue_edit', 'yes'),
(712, 'Issue Book View', 'issue_view', 'yes'),
(713, 'E-Books', 'ebooks', 'yes'),
(714, 'E-Books Add', 'ebooks_add', 'yes'),
(715, 'E-Books Edit', 'ebooks_edit', 'yes'),
(716, 'E-Books Delete', 'ebooks_delete', 'yes'),
(717, 'E-Books View', 'ebooks_view', 'yes'),
(718, 'Transport', 'transport', 'yes'),
(719, 'Transport Add', 'transport_add', 'yes'),
(720, 'Transport Edit', 'transport_edit', 'yes'),
(721, 'Transport Delete', 'transport_delete', 'yes'),
(722, 'Transport Member', 'tmember', 'yes'),
(723, 'Transport Member Add', 'tmember_add', 'yes'),
(724, 'Transport Member Edit', 'tmember_edit', 'yes'),
(725, 'Transport Member Delete', 'tmember_delete', 'yes'),
(726, 'Transport Member View', 'tmember_view', 'yes'),
(727, 'Hostel', 'hostel', 'yes'),
(728, 'Hostel Add', 'hostel_add', 'yes'),
(729, 'Hostel Edit', 'hostel_edit', 'yes'),
(730, 'Hostel Delete', 'hostel_delete', 'yes'),
(731, 'Hostel Category', 'category', 'yes'),
(732, 'Hostel Category Add', 'category_add', 'yes'),
(733, 'Hostel Category Edit', 'category_edit', 'yes'),
(734, 'Hostel Category Delete', 'category_delete', 'yes'),
(735, 'Hostel Member', 'hmember', 'yes'),
(736, 'Hostel Member Add', 'hmember_add', 'yes'),
(737, 'Hostel Member Edit', 'hmember_edit', 'yes'),
(738, 'Hostel Member Delete', 'hmember_delete', 'yes'),
(739, 'Hostel Member View', 'hmember_view', 'yes'),
(740, 'Fee Types', 'feetypes', 'yes'),
(741, 'Fee Types Add', 'feetypes_add', 'yes'),
(742, 'Fee Types Edit', 'feetypes_edit', 'yes'),
(743, 'Fee Types Delete', 'feetypes_delete', 'yes'),
(744, 'Invoice', 'invoice', 'yes'),
(745, 'Invoice Add', 'invoice_add', 'yes'),
(746, 'Invoice Edit', 'invoice_edit', 'yes'),
(747, 'Invoice Delete', 'invoice_delete', 'yes'),
(748, 'Invoice View', 'invoice_view', 'yes'),
(749, 'Payment History', 'paymenthistory', 'yes'),
(750, 'Payment History Edit', 'paymenthistory_edit', 'yes'),
(751, 'Payment History Delete', 'paymenthistory_delete', 'yes'),
(752, 'Expense', 'expense', 'yes'),
(753, 'Expense Add', 'expense_add', 'yes'),
(754, 'Expense Edit', 'expense_edit', 'yes'),
(755, 'Expense Delete', 'expense_delete', 'yes'),
(756, 'Income', 'income', 'yes'),
(757, 'Income Add', 'income_add', 'yes'),
(758, 'Income Edit', 'income_edit', 'yes'),
(759, 'Income Delete', 'income_delete', 'yes'),
(760, 'Global Payment', 'global_payment', 'yes'),
(761, 'Notice', 'notice', 'yes'),
(762, 'Notice Add', 'notice_add', 'yes'),
(763, 'Notice Edit', 'notice_edit', 'yes'),
(764, 'Notice Delete', 'notice_delete', 'yes'),
(765, 'Notice View', 'notice_view', 'yes'),
(766, 'Event', 'event', 'yes'),
(767, 'Event Add', 'event_add', 'yes'),
(768, 'Event Edit', 'event_edit', 'yes'),
(769, 'Event Delete', 'event_delete', 'yes'),
(770, 'Event View', 'event_view', 'yes'),
(771, 'Holiday', 'holiday', 'yes'),
(772, 'Holiday Add', 'holiday_add', 'yes'),
(773, 'Holiday Edit', 'holiday_edit', 'yes'),
(774, 'Holiday Delete', 'holiday_delete', 'yes'),
(775, 'Holiday View', 'holiday_view', 'yes'),
(776, 'Classes Report', 'classesreport', 'yes'),
(777, 'Student Report', 'studentreport', 'yes'),
(778, 'ID Card Report', 'idcardreport', 'yes'),
(779, 'Admit Card Report', 'admitcardreport', 'yes'),
(780, 'Routine Report', 'routinereport', 'yes'),
(781, 'Exam Schedule Report', 'examschedulereport', 'yes'),
(782, 'Attendance Report', 'attendancereport', 'yes'),
(783, 'Attendance Overview Report', 'attendanceoverviewreport', 'yes'),
(784, 'Library Books Report', 'librarybooksreport', 'yes'),
(785, 'Library Card Report', 'librarycardreport', 'yes'),
(786, 'Library Book Issue Report', 'librarybookissuereport', 'yes'),
(787, 'Terminal Report', 'terminalreport', 'yes'),
(788, 'Merit Stage Report', 'meritstagereport', 'yes'),
(789, 'Tabulation Sheet Report', 'tabulationsheetreport', 'yes'),
(790, 'Mark Sheet Report', 'marksheetreport', 'yes'),
(791, 'Progress Card Report', 'progresscardreport', 'yes'),
(792, 'Online Exam Report', 'onlineexamreport', 'yes'),
(793, 'Online Exam Question Report', 'onlineexamquestionreport', 'yes'),
(794, 'Online Admission Report', 'onlineadmissionreport', 'yes'),
(795, 'Certificate Report', 'certificatereport', 'yes'),
(796, 'Leave Application Report', 'leaveapplicationreport', 'yes'),
(797, 'Product Purchase Report', 'productpurchasereport', 'yes'),
(798, 'Product Sale Report', 'productsalereport', 'yes'),
(799, 'Search Payment Fees Report', 'searchpaymentfeesreport', 'yes'),
(800, 'Fees Report', 'feesreport', 'yes'),
(801, 'Due Fees Report', 'duefeesreport', 'yes'),
(802, 'Balance Fees Report', 'balancefeesreport', 'yes'),
(803, 'Transaction', 'transactionreport', 'yes'),
(804, 'Student Fine Report', 'studentfinereport', 'yes'),
(805, 'Salary Report', 'salaryreport', 'yes'),
(806, 'Account Ledger Report', 'accountledgerreport', 'yes'),
(807, 'Online Admission', 'onlineadmission', 'yes'),
(808, 'Visitor Information', 'visitorinfo', 'yes'),
(809, 'Visitor Information Delete', 'visitorinfo_delete', 'yes'),
(810, 'Visitor Infomation View', 'visitorinfo_view', 'yes'),
(811, 'Academic Year', 'schoolyear', 'yes'),
(812, 'Academic Year Add', 'schoolyear_add', 'yes'),
(813, 'Academic Year Edit', 'schoolyear_edit', 'yes'),
(814, 'Academic Year Delete', 'schoolyear_delete', 'yes'),
(815, 'Student Group', 'studentgroup', 'yes'),
(816, 'Student Group Add', 'studentgroup_add', 'yes'),
(817, 'Student Group Edit', 'studentgroup_edit', 'yes'),
(818, 'Student Group Delete', 'studentgroup_delete', 'yes'),
(819, 'Complain', 'complain', 'yes'),
(820, 'Complain Add', 'complain_add', 'yes'),
(821, 'Complain Edit', 'complain_edit', 'yes'),
(822, 'Complain Delete', 'complain_delete', 'yes'),
(823, 'Complain View', 'complain_view', 'yes'),
(824, 'Certificate Template', 'certificate_template', 'yes'),
(825, 'Certificate Template Add', 'certificate_template_add', 'yes'),
(826, 'Certificate Template Edit', 'certificate_template_edit', 'yes'),
(827, 'Certificate Template Delete', 'certificate_template_delete', 'yes'),
(828, 'Certificate Template View', 'certificate_template_view', 'yes'),
(829, 'System Admin', 'systemadmin', 'yes'),
(830, 'System Admin Add', 'systemadmin_add', 'yes'),
(831, 'System Admin Edit', 'systemadmin_edit', 'yes'),
(832, 'System Admin Delete', 'systemadmin_delete', 'yes'),
(833, 'System Admin View', 'systemadmin_view', 'yes'),
(834, 'Reset Password', 'resetpassword', 'yes'),
(835, 'Social Link', 'sociallink', 'yes'),
(836, 'Social Link Add', 'sociallink_add', 'yes'),
(837, 'Social Link Edit', 'sociallink_edit', 'yes'),
(838, 'Social Link Delete', 'sociallink_delete', 'yes'),
(839, 'Mail / SMS Template', 'mailandsmstemplate', 'yes'),
(840, 'Mail / SMS Template Add', 'mailandsmstemplate_add', 'yes'),
(841, 'Mail / SMS Template Edit', 'mailandsmstemplate_edit', 'yes'),
(842, 'Mail / SMS Template Delete', 'mailandsmstemplate_delete', 'yes'),
(843, 'Mail / SMS Template View', 'mailandsmstemplate_view', 'yes'),
(844, 'Import', 'bulkimport ', 'yes'),
(845, 'Backup', 'backup', 'yes'),
(846, 'Role', 'usertype', 'yes'),
(847, 'Role Add', 'usertype_add', 'yes'),
(848, 'Role Edit', 'usertype_edit', 'yes'),
(849, 'Role Delete', 'usertype_delete', 'yes'),
(850, 'Permission', 'permission', 'yes'),
(851, 'Auto Update', 'update', 'yes'),
(852, 'Posts Categories', 'posts_categories', 'yes'),
(853, 'Posts Categories Add', 'posts_categories_add', 'yes'),
(854, 'Posts Categories Edit', 'posts_categories_edit', 'yes'),
(855, 'Posts Categories Delete', 'posts_categories_delete', 'yes'),
(856, 'Posts', 'posts', 'yes'),
(857, 'Posts Add', 'posts_add', 'yes'),
(858, 'Posts Edit', 'posts_edit', 'yes'),
(859, 'Posts Delete', 'posts_delete', 'yes'),
(860, 'Pages', 'pages', 'yes'),
(861, 'Pages Add', 'pages_add', 'yes'),
(862, 'Pages Edit', 'pages_edit', 'yes'),
(863, 'Pages Delete', 'pages_delete', 'yes'),
(864, 'Menu', 'frontendmenu', 'yes'),
(865, 'General Setting', 'setting', 'yes'),
(866, 'Frontend Setting', 'frontend_setting', 'yes'),
(867, 'Payment Settings', 'paymentsettings', 'yes'),
(868, 'SMS Settings', 'smssettings', 'yes'),
(869, 'Email Setting', 'emailsetting', 'yes'),
(870, 'Shift Management', 'shift', 'yes'),
(871, 'Add Shift', 'shift_add', 'yes'),
(872, 'Edit Shift', 'shift_edit', 'yes'),
(873, 'Delete Shift', 'shift_delete', 'yes'),
(874, 'Category Management', 'categoryus', 'yes'),
(875, 'Add Category', 'categoryus_add', 'yes'),
(876, 'Edit Category', 'categoryus_edit', 'yes'),
(877, 'Delete Category', 'categoryus_delete', 'yes'),
(878, 'Admission', 'admission', 'yes'),
(879, 'Edit Admission', 'admission_edit', 'yes'),
(880, 'Delete Admission', 'admission_delete', 'yes'),
(881, 'Add Admission', 'admission_add', 'yes'),
(882, 'Pre Admission', 'preadmission', 'yes'),
(883, 'Edit Pre Admission', 'preadmission_edit', 'yes'),
(884, 'Delete Pre Admission', 'preadmission_delete', 'yes'),
(885, 'Add Pre Admission', 'preadmission_add', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `permission_relationships`
--

CREATE TABLE `permission_relationships` (
  `permission_id` int(11) NOT NULL,
  `usertype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_relationships`
--

INSERT INTO `permission_relationships` (`permission_id`, `usertype_id`) VALUES
(501, 2),
(502, 2),
(506, 2),
(507, 2),
(511, 2),
(512, 2),
(516, 2),
(531, 2),
(535, 2),
(536, 2),
(537, 2),
(538, 2),
(539, 2),
(540, 2),
(541, 2),
(542, 2),
(543, 2),
(544, 2),
(548, 2),
(549, 2),
(550, 2),
(551, 2),
(553, 2),
(554, 2),
(556, 2),
(561, 2),
(569, 2),
(570, 2),
(571, 2),
(572, 2),
(573, 2),
(579, 2),
(580, 2),
(581, 2),
(582, 2),
(586, 2),
(587, 2),
(588, 2),
(590, 2),
(591, 2),
(592, 2),
(594, 2),
(595, 2),
(596, 2),
(598, 2),
(599, 2),
(600, 2),
(601, 2),
(603, 2),
(604, 2),
(605, 2),
(607, 2),
(683, 2),
(684, 2),
(685, 2),
(686, 2),
(687, 2),
(688, 2),
(693, 2),
(694, 2),
(695, 2),
(705, 2),
(713, 2),
(717, 2),
(718, 2),
(727, 2),
(731, 2),
(761, 2),
(765, 2),
(766, 2),
(770, 2),
(771, 2),
(775, 2),
(777, 2),
(780, 2),
(781, 2),
(782, 2),
(783, 2),
(787, 2),
(788, 2),
(789, 2),
(790, 2),
(791, 2),
(792, 2),
(793, 2),
(819, 2),
(820, 2),
(823, 2),
(501, 3),
(502, 3),
(512, 3),
(516, 3),
(531, 3),
(539, 3),
(543, 3),
(544, 3),
(548, 3),
(561, 3),
(571, 3),
(579, 3),
(580, 3),
(683, 3),
(684, 3),
(685, 3),
(686, 3),
(687, 3),
(693, 3),
(700, 3),
(705, 3),
(709, 3),
(712, 3),
(713, 3),
(717, 3),
(718, 3),
(722, 3),
(727, 3),
(731, 3),
(744, 3),
(748, 3),
(749, 3),
(761, 3),
(765, 3),
(766, 3),
(770, 3),
(771, 3),
(775, 3),
(819, 3),
(820, 3),
(823, 3),
(501, 4),
(502, 4),
(506, 4),
(512, 4),
(516, 4),
(531, 4),
(535, 4),
(544, 4),
(548, 4),
(550, 4),
(561, 4),
(571, 4),
(573, 4),
(579, 4),
(580, 4),
(693, 4),
(696, 4),
(700, 4),
(704, 4),
(705, 4),
(709, 4),
(712, 4),
(718, 4),
(722, 4),
(726, 4),
(727, 4),
(731, 4),
(735, 4),
(739, 4),
(744, 4),
(748, 4),
(749, 4),
(761, 4),
(765, 4),
(766, 4),
(770, 4),
(771, 4),
(775, 4),
(819, 4),
(820, 4),
(823, 4),
(501, 6),
(512, 6),
(516, 6),
(531, 6),
(554, 6),
(556, 6),
(579, 6),
(580, 6),
(683, 6),
(684, 6),
(685, 6),
(686, 6),
(687, 6),
(700, 6),
(701, 6),
(702, 6),
(703, 6),
(704, 6),
(705, 6),
(706, 6),
(707, 6),
(708, 6),
(709, 6),
(710, 6),
(711, 6),
(712, 6),
(713, 6),
(714, 6),
(715, 6),
(716, 6),
(717, 6),
(718, 6),
(727, 6),
(731, 6),
(761, 6),
(765, 6),
(766, 6),
(770, 6),
(771, 6),
(775, 6),
(777, 6),
(784, 6),
(785, 6),
(786, 6),
(819, 6),
(820, 6),
(823, 6),
(501, 7),
(502, 7),
(506, 7),
(507, 7),
(511, 7),
(512, 7),
(516, 7),
(517, 7),
(521, 7),
(548, 7),
(550, 7),
(551, 7),
(553, 7),
(554, 7),
(556, 7),
(579, 7),
(580, 7),
(683, 7),
(684, 7),
(685, 7),
(686, 7),
(687, 7),
(727, 7),
(731, 7),
(761, 7),
(765, 7),
(766, 7),
(770, 7),
(771, 7),
(775, 7),
(808, 7),
(809, 7),
(810, 7),
(819, 7),
(820, 7),
(823, 7),
(501, 5),
(512, 5),
(516, 5),
(554, 5),
(556, 5),
(579, 5),
(580, 5),
(608, 5),
(609, 5),
(610, 5),
(611, 5),
(612, 5),
(613, 5),
(614, 5),
(615, 5),
(616, 5),
(617, 5),
(618, 5),
(619, 5),
(620, 5),
(621, 5),
(622, 5),
(649, 5),
(650, 5),
(651, 5),
(652, 5),
(653, 5),
(654, 5),
(655, 5),
(656, 5),
(657, 5),
(658, 5),
(659, 5),
(660, 5),
(661, 5),
(662, 5),
(663, 5),
(664, 5),
(665, 5),
(666, 5),
(667, 5),
(668, 5),
(669, 5),
(670, 5),
(671, 5),
(672, 5),
(673, 5),
(674, 5),
(683, 5),
(684, 5),
(685, 5),
(686, 5),
(687, 5),
(718, 5),
(722, 5),
(723, 5),
(724, 5),
(725, 5),
(726, 5),
(727, 5),
(731, 5),
(735, 5),
(736, 5),
(737, 5),
(738, 5),
(739, 5),
(740, 5),
(741, 5),
(742, 5),
(743, 5),
(744, 5),
(745, 5),
(746, 5),
(747, 5),
(748, 5),
(749, 5),
(750, 5),
(751, 5),
(752, 5),
(753, 5),
(754, 5),
(755, 5),
(756, 5),
(757, 5),
(758, 5),
(759, 5),
(760, 5),
(761, 5),
(765, 5),
(766, 5),
(770, 5),
(771, 5),
(775, 5),
(797, 5),
(798, 5),
(799, 5),
(800, 5),
(801, 5),
(802, 5),
(803, 5),
(804, 5),
(805, 5),
(819, 5),
(820, 5),
(823, 5),
(675, 5),
(676, 5),
(677, 5),
(678, 5),
(679, 5),
(680, 5),
(681, 5),
(682, 5),
(688, 5),
(501, 1),
(502, 1),
(503, 1),
(504, 1),
(505, 1),
(506, 1),
(507, 1),
(508, 1),
(509, 1),
(510, 1),
(511, 1),
(512, 1),
(513, 1),
(514, 1),
(515, 1),
(516, 1),
(517, 1),
(518, 1),
(519, 1),
(520, 1),
(521, 1),
(522, 1),
(523, 1),
(524, 1),
(525, 1),
(526, 1),
(527, 1),
(528, 1),
(530, 1),
(531, 1),
(532, 1),
(533, 1),
(534, 1),
(535, 1),
(536, 1),
(537, 1),
(538, 1),
(539, 1),
(540, 1),
(541, 1),
(542, 1),
(543, 1),
(544, 1),
(545, 1),
(546, 1),
(547, 1),
(548, 1),
(549, 1),
(550, 1),
(551, 1),
(552, 1),
(553, 1),
(554, 1),
(555, 1),
(556, 1),
(557, 1),
(558, 1),
(559, 1),
(560, 1),
(561, 1),
(562, 1),
(563, 1),
(564, 1),
(565, 1),
(566, 1),
(567, 1),
(568, 1),
(569, 1),
(570, 1),
(571, 1),
(572, 1),
(573, 1),
(574, 1),
(575, 1),
(576, 1),
(577, 1),
(578, 1),
(579, 1),
(580, 1),
(581, 1),
(582, 1),
(583, 1),
(584, 1),
(585, 1),
(586, 1),
(587, 1),
(588, 1),
(589, 1),
(590, 1),
(591, 1),
(592, 1),
(593, 1),
(594, 1),
(595, 1),
(596, 1),
(597, 1),
(598, 1),
(599, 1),
(600, 1),
(601, 1),
(602, 1),
(603, 1),
(604, 1),
(605, 1),
(606, 1),
(607, 1),
(608, 1),
(609, 1),
(610, 1),
(611, 1),
(612, 1),
(613, 1),
(614, 1),
(615, 1),
(616, 1),
(617, 1),
(618, 1),
(619, 1),
(620, 1),
(621, 1),
(622, 1),
(623, 1),
(624, 1),
(625, 1),
(626, 1),
(627, 1),
(628, 1),
(629, 1),
(630, 1),
(631, 1),
(632, 1),
(633, 1),
(634, 1),
(635, 1),
(636, 1),
(637, 1),
(638, 1),
(639, 1),
(640, 1),
(641, 1),
(642, 1),
(643, 1),
(644, 1),
(645, 1),
(646, 1),
(647, 1),
(648, 1),
(649, 1),
(650, 1),
(651, 1),
(652, 1),
(653, 1),
(654, 1),
(655, 1),
(656, 1),
(657, 1),
(658, 1),
(659, 1),
(660, 1),
(661, 1),
(662, 1),
(663, 1),
(664, 1),
(665, 1),
(666, 1),
(667, 1),
(668, 1),
(669, 1),
(670, 1),
(671, 1),
(672, 1),
(673, 1),
(674, 1),
(675, 1),
(676, 1),
(677, 1),
(678, 1),
(679, 1),
(680, 1),
(681, 1),
(682, 1),
(683, 1),
(684, 1),
(685, 1),
(686, 1),
(687, 1),
(688, 1),
(689, 1),
(690, 1),
(691, 1),
(692, 1),
(693, 1),
(694, 1),
(695, 1),
(696, 1),
(697, 1),
(698, 1),
(699, 1),
(700, 1),
(701, 1),
(702, 1),
(703, 1),
(704, 1),
(705, 1),
(706, 1),
(707, 1),
(708, 1),
(709, 1),
(710, 1),
(711, 1),
(712, 1),
(713, 1),
(714, 1),
(715, 1),
(716, 1),
(717, 1),
(718, 1),
(719, 1),
(720, 1),
(721, 1),
(722, 1),
(723, 1),
(724, 1),
(725, 1),
(726, 1),
(727, 1),
(728, 1),
(729, 1),
(730, 1),
(731, 1),
(732, 1),
(733, 1),
(734, 1),
(735, 1),
(736, 1),
(737, 1),
(738, 1),
(739, 1),
(740, 1),
(741, 1),
(742, 1),
(743, 1),
(744, 1),
(745, 1),
(746, 1),
(747, 1),
(748, 1),
(749, 1),
(750, 1),
(751, 1),
(752, 1),
(753, 1),
(754, 1),
(755, 1),
(756, 1),
(757, 1),
(758, 1),
(759, 1),
(760, 1),
(761, 1),
(762, 1),
(763, 1),
(764, 1),
(765, 1),
(766, 1),
(767, 1),
(768, 1),
(769, 1),
(770, 1),
(771, 1),
(772, 1),
(773, 1),
(774, 1),
(775, 1),
(776, 1),
(777, 1),
(778, 1),
(779, 1),
(780, 1),
(781, 1),
(782, 1),
(783, 1),
(784, 1),
(785, 1),
(786, 1),
(787, 1),
(788, 1),
(789, 1),
(790, 1),
(791, 1),
(792, 1),
(793, 1),
(794, 1),
(795, 1),
(796, 1),
(797, 1),
(798, 1),
(799, 1),
(800, 1),
(801, 1),
(802, 1),
(803, 1),
(804, 1),
(805, 1),
(806, 1),
(807, 1),
(808, 1),
(809, 1),
(810, 1),
(811, 1),
(812, 1),
(813, 1),
(814, 1),
(815, 1),
(816, 1),
(817, 1),
(818, 1),
(819, 1),
(820, 1),
(821, 1),
(822, 1),
(823, 1),
(824, 1),
(825, 1),
(826, 1),
(827, 1),
(828, 1),
(829, 1),
(830, 1),
(831, 1),
(832, 1),
(833, 1),
(834, 1),
(835, 1),
(836, 1),
(837, 1),
(838, 1),
(839, 1),
(840, 1),
(841, 1),
(842, 1),
(843, 1),
(844, 1),
(845, 1),
(846, 1),
(847, 1),
(848, 1),
(849, 1),
(850, 1),
(851, 1),
(852, 1),
(853, 1),
(854, 1),
(855, 1),
(856, 1),
(857, 1),
(858, 1),
(859, 1),
(860, 1),
(861, 1),
(862, 1),
(863, 1),
(864, 1),
(865, 1),
(866, 1),
(867, 1),
(868, 1),
(869, 1),
(870, 1),
(871, 1),
(872, 1),
(873, 1),
(874, 1),
(875, 1),
(876, 1),
(877, 1),
(878, 1),
(881, 1),
(879, 1),
(880, 1),
(882, 1),
(885, 1),
(883, 1),
(884, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postsID` int(11) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `content` text,
  `status` int(11) DEFAULT NULL COMMENT '1 => active, 2 => draft, 3 => trash, 4 => review  ',
  `visibility` int(11) DEFAULT NULL COMMENT '1 => public 2 => protected 3 => private ',
  `publish_date` datetime DEFAULT NULL,
  `parentID` int(11) NOT NULL DEFAULT '0',
  `postorder` int(11) NOT NULL DEFAULT '0',
  `featured_image` varchar(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL,
  `create_userID` int(11) DEFAULT NULL,
  `create_username` varchar(60) DEFAULT NULL,
  `create_usertypeID` int(11) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts_categories`
--

CREATE TABLE `posts_categories` (
  `posts_categoriesID` int(11) NOT NULL,
  `posts_categories` varchar(40) DEFAULT NULL,
  `posts_slug` varchar(250) DEFAULT NULL,
  `posts_parent` int(11) DEFAULT '0',
  `posts_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts_category`
--

CREATE TABLE `posts_category` (
  `posts_categoryID` int(11) NOT NULL,
  `postsID` int(11) NOT NULL,
  `posts_categoriesID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `preadmission`
--

CREATE TABLE `preadmission` (
  `preadmissionId` int(11) NOT NULL,
  `prospectus_no` varchar(50) DEFAULT NULL,
  `pre_admission_date` varchar(50) DEFAULT NULL,
  `student_name` varchar(50) DEFAULT NULL,
  `father_name` varchar(50) DEFAULT NULL,
  `mother_name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `pincode` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `birth_place` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `fee_category` varchar(50) DEFAULT NULL,
  `source` varchar(50) DEFAULT NULL,
  `marks_score` varchar(50) DEFAULT NULL,
  `curriculum_followed` varchar(50) DEFAULT NULL,
  `personal_contact` varchar(50) DEFAULT NULL,
  `land_line` varchar(50) DEFAULT NULL,
  `father_mobile` varchar(50) DEFAULT NULL,
  `mother_mobile` varchar(50) DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `previous_school` varchar(50) DEFAULT NULL,
  `class_year` varchar(50) DEFAULT NULL,
  `remark` varchar(50) DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productcategoryID` int(11) NOT NULL,
  `productname` varchar(128) NOT NULL,
  `productbuyingprice` double NOT NULL,
  `productsellingprice` double NOT NULL,
  `productdesc` text NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_usertypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `productcategoryID` int(11) NOT NULL,
  `productcategoryname` varchar(128) NOT NULL,
  `productcategorydesc` text NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_usertypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `productpurchase`
--

CREATE TABLE `productpurchase` (
  `productpurchaseID` int(11) NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `productsupplierID` int(11) NOT NULL,
  `productwarehouseID` int(11) NOT NULL,
  `productpurchasereferenceno` varchar(100) NOT NULL,
  `productpurchasedate` date NOT NULL,
  `productpurchasefile` varchar(200) DEFAULT NULL,
  `productpurchasefileorginalname` varchar(200) DEFAULT NULL,
  `productpurchasedescription` text,
  `productpurchasestatus` int(11) NOT NULL COMMENT '0 = pending, 1 = partial_paid,  2 = fully_paid',
  `productpurchaserefund` int(11) NOT NULL DEFAULT '0' COMMENT '0 = not refund, 1 = refund ',
  `productpurchasetaxID` int(11) NOT NULL DEFAULT '0',
  `productpurchasetaxamount` double NOT NULL DEFAULT '0',
  `productpurchasediscount` double NOT NULL DEFAULT '0',
  `productpurchaseshipping` double NOT NULL DEFAULT '0',
  `productpurchasepaymentterm` int(11) NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_usertypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `productpurchaseitem`
--

CREATE TABLE `productpurchaseitem` (
  `productpurchaseitemID` int(11) NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `productpurchaseID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productpurchaseunitprice` double NOT NULL,
  `productpurchasequantity` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `productpurchasepaid`
--

CREATE TABLE `productpurchasepaid` (
  `productpurchasepaidID` int(11) NOT NULL,
  `productpurchasepaidschoolyearID` int(11) NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `productpurchaseID` int(11) NOT NULL,
  `productpurchasepaiddate` date NOT NULL,
  `productpurchasepaidreferenceno` varchar(100) NOT NULL,
  `productpurchasepaidamount` double NOT NULL,
  `productpurchasepaidpaymentmethod` int(11) NOT NULL COMMENT '1 = cash, 2 = cheque, 3 = crediit card, 4 = other',
  `productpurchasepaidfile` varchar(200) DEFAULT NULL,
  `productpurchasepaidorginalname` varchar(200) DEFAULT NULL,
  `productpurchasepaiddescription` text,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_usertypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `productsale`
--

CREATE TABLE `productsale` (
  `productsaleID` int(11) NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `productsalecustomertypeID` int(11) NOT NULL,
  `productsalecustomerID` int(11) NOT NULL,
  `productsalereferenceno` varchar(100) NOT NULL,
  `productsaledate` date NOT NULL,
  `productsalefile` varchar(200) DEFAULT NULL,
  `productsalefileorginalname` varchar(200) DEFAULT NULL,
  `productsaledescription` text,
  `productsalestatus` int(11) NOT NULL COMMENT '0 = select_payment_status, 1 = due,  2 = partial, 3 = Paid',
  `productsalerefund` int(11) NOT NULL DEFAULT '0' COMMENT '0 = not refund, 1 = refund ',
  `productsaletaxID` int(11) NOT NULL DEFAULT '0',
  `productsaletaxamount` double NOT NULL DEFAULT '0',
  `productsalediscount` double NOT NULL DEFAULT '0',
  `productsaleshipping` double NOT NULL DEFAULT '0',
  `productsalepaymentterm` int(11) NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_usertypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `productsaleitem`
--

CREATE TABLE `productsaleitem` (
  `productsaleitemID` int(11) NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `productsaleID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `productsaleserialno` varchar(100) DEFAULT '0',
  `productsaleunitprice` double NOT NULL,
  `productsalequantity` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `productsalepaid`
--

CREATE TABLE `productsalepaid` (
  `productsalepaidID` int(11) NOT NULL,
  `productsalepaidschoolyearID` int(11) NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `productsaleID` int(11) NOT NULL,
  `productsalepaiddate` date NOT NULL,
  `productsalepaidreferenceno` varchar(100) NOT NULL,
  `productsalepaidamount` double NOT NULL,
  `productsalepaidpaymentmethod` int(11) NOT NULL COMMENT '1 = cash, 2 = cheque, 3 = crediit card, 4 = other',
  `productsalepaidfile` varchar(200) DEFAULT NULL,
  `productsalepaidorginalname` varchar(200) DEFAULT NULL,
  `productsalepaiddescription` text,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_usertypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `productsupplier`
--

CREATE TABLE `productsupplier` (
  `productsupplierID` int(11) NOT NULL,
  `productsuppliercompanyname` varchar(128) NOT NULL,
  `productsuppliername` varchar(40) NOT NULL,
  `productsupplieremail` varchar(40) DEFAULT NULL,
  `productsupplierphone` varchar(20) DEFAULT NULL,
  `productsupplieraddress` text,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_usertypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `productwarehouse`
--

CREATE TABLE `productwarehouse` (
  `productwarehouseID` int(11) NOT NULL,
  `productwarehousename` varchar(128) NOT NULL,
  `productwarehousecode` varchar(128) NOT NULL,
  `productwarehouseemail` varchar(40) DEFAULT NULL,
  `productwarehousephone` varchar(20) DEFAULT NULL,
  `productwarehouseaddress` text,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_usertypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `promotionlog`
--

CREATE TABLE `promotionlog` (
  `promotionLogID` int(11) UNSIGNED NOT NULL,
  `promotionType` varchar(50) DEFAULT NULL,
  `classesID` int(11) NOT NULL,
  `jumpClassID` int(11) NOT NULL,
  `schoolYearID` int(11) NOT NULL,
  `jumpSchoolYearID` int(11) NOT NULL,
  `subjectandsubjectcodeandmark` longtext,
  `exams` longtext,
  `markpercentages` longtext,
  `promoteStudents` longtext,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `create_userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchaseID` int(11) NOT NULL,
  `assetID` int(11) NOT NULL,
  `vendorID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` int(11) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `service_date` date DEFAULT NULL,
  `purchase_price` double NOT NULL,
  `purchased_by` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `expire_date` date DEFAULT NULL,
  `create_date` date NOT NULL,
  `modify_date` date NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_usertypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `question_answer`
--

CREATE TABLE `question_answer` (
  `answerID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `optionID` int(11) DEFAULT NULL,
  `typeNumber` int(11) NOT NULL,
  `text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `question_bank`
--

CREATE TABLE `question_bank` (
  `questionBankID` int(11) NOT NULL,
  `question` text NOT NULL,
  `explanation` text,
  `levelID` int(11) DEFAULT NULL,
  `groupID` int(11) DEFAULT NULL,
  `totalQuestion` int(11) DEFAULT '0',
  `totalOption` int(11) DEFAULT NULL,
  `typeNumber` int(11) DEFAULT NULL,
  `parentID` int(11) DEFAULT '0',
  `time` int(11) DEFAULT '0',
  `mark` int(11) DEFAULT '0',
  `hints` text,
  `upload` varchar(512) DEFAULT NULL,
  `subjectID` int(11) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_usertypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `question_group`
--

CREATE TABLE `question_group` (
  `questionGroupID` int(11) NOT NULL,
  `title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question_group`
--

INSERT INTO `question_group` (`questionGroupID`, `title`) VALUES
(1, 'Reasoning'),
(2, 'Computer Knowledge'),
(3, 'General'),
(4, 'Math'),
(5, 'GRE');

-- --------------------------------------------------------

--
-- Table structure for table `question_level`
--

CREATE TABLE `question_level` (
  `questionLevelID` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question_level`
--

INSERT INTO `question_level` (`questionLevelID`, `name`) VALUES
(1, 'Easy'),
(2, 'Medium'),
(3, 'Hard');

-- --------------------------------------------------------

--
-- Table structure for table `question_option`
--

CREATE TABLE `question_option` (
  `optionID` int(11) NOT NULL,
  `questionID` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `img` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `questionTypeID` int(11) NOT NULL,
  `typeNumber` int(11) NOT NULL,
  `name` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`questionTypeID`, `typeNumber`, `name`) VALUES
(1, 1, 'Single Answer'),
(2, 2, 'Multi Answer'),
(3, 3, 'Fill in the blanks');

-- --------------------------------------------------------

--
-- Table structure for table `reset`
--

CREATE TABLE `reset` (
  `resetID` int(11) UNSIGNED NOT NULL,
  `keyID` varchar(128) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `routineID` int(11) UNSIGNED NOT NULL,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `day` varchar(60) NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `room` tinytext NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `routine`
--

INSERT INTO `routine` (`routineID`, `classesID`, `sectionID`, `subjectID`, `schoolyearID`, `teacherID`, `day`, `start_time`, `end_time`, `room`, `date`) VALUES
(94, 1, 1, 1, 1, 1, 'THURSDAY', '16:15:00', '20:15:00', '123', '2019-11-07'),
(95, 1, 1, 1, 1, 1, 'THURSDAY', '15:15:00', '21:15:00', '1234', '2019-11-07'),
(96, 1, 1, 1, 1, 1, 'THURSDAY', '00:15:00', '08:15:00', '123', '2019-11-07'),
(97, 1, 1, 1, 1, 1, 'FRIDAY', '13:45:00', '18:45:00', '123', '2019-11-08'),
(98, 1, 1, 1, 1, 1, 'FRIDAY', '10:45:00', '11:45:00', '123', '2019-11-08'),
(99, 1, 1, 1, 1, 1, 'SATURDAY', '07:15:00', '11:15:00', '45', '2019-11-16'),
(100, 1, 1, 1, 1, 1, 'SATURDAY', '13:30:00', '09:30:00', '145', '2019-11-16'),
(101, 3, 4, 3, 1, 1, 'SATURDAY', '13:00:00', '14:00:00', '1', '2019-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `salary_option`
--

CREATE TABLE `salary_option` (
  `salary_optionID` int(11) NOT NULL,
  `salary_templateID` int(11) NOT NULL,
  `option_type` int(11) NOT NULL COMMENT 'Allowances =1, Dllowances = 2, Increment = 3',
  `label_name` varchar(128) DEFAULT NULL,
  `label_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary_option`
--

INSERT INTO `salary_option` (`salary_optionID`, `salary_templateID`, `option_type`, `label_name`, `label_amount`) VALUES
(23, 11, 1, 'House Rent', 20),
(24, 11, 1, 'Dearness Allowance', 40),
(25, 11, 2, 'Provident Fund', 10),
(29, 10, 1, 'House Rent', 400),
(30, 10, 1, 'Dearness Allowance', 800),
(31, 10, 2, 'Profession Tax', 200);

-- --------------------------------------------------------

--
-- Table structure for table `salary_template`
--

CREATE TABLE `salary_template` (
  `salary_templateID` int(11) NOT NULL,
  `salary_grades` varchar(128) NOT NULL,
  `basic_salary` text NOT NULL,
  `overtime_rate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary_template`
--

INSERT INTO `salary_template` (`salary_templateID`, `salary_grades`, `basic_salary`, `overtime_rate`) VALUES
(10, 'QWE', '10000', '900'),
(11, '100AS', '100', '10');

-- --------------------------------------------------------

--
-- Table structure for table `schoolyear`
--

CREATE TABLE `schoolyear` (
  `schoolyearID` int(11) NOT NULL,
  `schooltype` varchar(40) DEFAULT NULL,
  `schoolyear` varchar(128) NOT NULL,
  `schoolyeartitle` varchar(128) DEFAULT NULL,
  `startingdate` date NOT NULL,
  `endingdate` date NOT NULL,
  `semestercode` int(11) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(100) NOT NULL,
  `create_usertype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schoolyear`
--

INSERT INTO `schoolyear` (`schoolyearID`, `schooltype`, `schoolyear`, `schoolyeartitle`, `startingdate`, `endingdate`, `semestercode`, `create_date`, `modify_date`, `create_userID`, `create_username`, `create_usertype`) VALUES
(1, 'classbase', '2019-2020', '', '2019-01-01', '2019-12-31', NULL, '2019-01-01 12:35:25', '2019-01-01 12:35:25', 1, 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `school_sessions`
--

CREATE TABLE `school_sessions` (
  `id` varchar(250) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` double UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `school_sessions`
--

INSERT INTO `school_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('558d474a01b53bc38a8dd09aa06569245057b3c4', '182.68.62.46', 1572592443, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537323539323433323b6c616e677c733a373a22656e676c697368223b),
('90c02ff8e10c2dda18e77bf3ec1ce9c4e44084af', '182.68.179.199', 1574331232, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537343333313233323b6c616e677c733a373a22656e676c697368223b6572726f72737c733a31313a2253657276657220446f776e223b5f5f63695f766172737c613a313a7b733a363a226572726f7273223b733a333a226e6577223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sectionID` int(11) UNSIGNED NOT NULL,
  `section` varchar(60) NOT NULL,
  `category` varchar(128) NOT NULL,
  `capacity` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `note` text,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(60) NOT NULL,
  `create_usertype` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sectionID`, `section`, `category`, `capacity`, `classesID`, `teacherID`, `note`, `create_date`, `modify_date`, `create_userID`, `create_username`, `create_usertype`) VALUES
(1, 'A', 'Sample', 10, 1, 1, 'This is a sample section.', '2019-07-28 07:34:06', '2019-07-28 07:34:06', 1, 'initest_admin', 'Admin'),
(2, 'B', 'AS', 20, 2, 1, 'd', '2019-09-22 10:45:00', '2019-09-22 10:45:00', 1, 'initest_admin', 'Admin'),
(3, 'A', 'AW', 30, 2, 1, 'good', '2019-09-24 12:33:59', '2019-09-24 12:33:59', 1, 'initest_admin', 'Admin'),
(4, 'A', 'WE', 7, 3, 1, 'good section', '2019-09-24 06:16:56', '2019-09-24 06:16:56', 1, 'initest_admin', 'Admin'),
(5, 'B', 'Sample', 12, 1, 1, '', '2019-09-26 10:54:51', '2019-09-26 10:54:51', 1, 'initest_admin', 'Admin'),
(6, 'B', 'AS', 20, 3, 3, 'rr', '2019-09-27 11:24:05', '2019-09-27 11:24:05', 1, 'initest_admin', 'Admin'),
(7, 'C', 'AS', 20, 3, 3, 'ggg', '2019-09-27 11:24:31', '2019-09-27 11:24:31', 1, 'initest_admin', 'Admin'),
(8, 'D', 'AS', 20, 3, 3, 'ggg', '2019-09-27 11:25:30', '2019-09-27 11:25:30', 1, 'initest_admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `fieldoption` varchar(100) NOT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`fieldoption`, `value`) VALUES
('absent_auto_sms', '1'),
('address', 'warje'),
('attendance', 'subject'),
('attendance_notification', 'sms'),
('attendance_notification_template', '2'),
('attendance_smsgateway', 'msg91'),
('automation', '5'),
('auto_invoice_generate', '0'),
('auto_update_notification', '1'),
('backend_theme', 'default'),
('captcha_status', '1'),
('currency_code', 'INR'),
('currency_symbol', '₹'),
('email', 'ssaxena_v@rediffmail.com'),
('ex_class', '1'),
('footer', 'Copyright &copy; Inilabs Test'),
('frontendorbackend', 'YES'),
('frontend_theme', 'default'),
('google_analytics', ''),
('language', 'english'),
('language_status', '0'),
('mark_1', '1'),
('note', '1'),
('phone', '9890169318'),
('photo', 'site.png'),
('profile_edit', '0'),
('purchase_code', '319c49b9-a611-442c-817b-4f1ad08c8320'),
('purchase_username', 'veenoo'),
('recaptcha_secret_key', ''),
('recaptcha_site_key', ''),
('school_type', 'classbase'),
('school_year', '1'),
('sname', 'Inilabs Test'),
('student_ID_format', '1'),
('time_zone', 'Asia/Kolkata'),
('updateversion', '4.2'),
('weekends', '0');

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `shift_id` int(11) NOT NULL,
  `shift_title` varchar(50) NOT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  `short_name` varchar(50) DEFAULT NULL,
  `brk1_starttime` varchar(20) DEFAULT NULL,
  `brk1_endtime` varchar(20) DEFAULT NULL,
  `brk2_starttime` varchar(20) DEFAULT NULL,
  `brk2_endtime` varchar(20) DEFAULT NULL,
  `punch_before` varchar(20) DEFAULT NULL,
  `punch_after` varchar(20) DEFAULT NULL,
  `grace_time` varchar(20) DEFAULT NULL,
  `partial_day` varchar(20) DEFAULT NULL,
  `p_begins` varchar(20) DEFAULT NULL,
  `p_end` varchar(20) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`shift_id`, `shift_title`, `start_time`, `end_time`, `short_name`, `brk1_starttime`, `brk1_endtime`, `brk2_starttime`, `brk2_endtime`, `punch_before`, `punch_after`, `grace_time`, `partial_day`, `p_begins`, `p_end`, `create_date`) VALUES
(2, 'Test2', '10:00 AM', '12:15 PM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-22 05:41:25'),
(3, 'test', '1:15 PM', '6:15 PM', 'tes1', '3:15 PM', '3:30 PM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-23 11:47:30'),
(4, 'Morning', '9:00 AM', '6:00 PM', 'MNG', '1:00 PM', '2:00 PM', '4:30 PM', '4:45 PM', '15', '15', '15', NULL, NULL, NULL, '2019-10-25 06:58:14'),
(5, 'Morning-2', '9:00 AM', '6:00 PM', 'MNG-2', '1:00 PM', '2:00 PM', '4:00 PM', '4:15 PM', '15', '15', '15', NULL, NULL, NULL, '2019-11-02 07:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `sliderID` int(11) NOT NULL,
  `pagesID` int(11) NOT NULL,
  `slider` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `smssettings`
--

CREATE TABLE `smssettings` (
  `smssettingsID` int(11) UNSIGNED NOT NULL,
  `types` varchar(255) DEFAULT NULL,
  `field_names` varchar(255) DEFAULT NULL,
  `field_values` varchar(255) DEFAULT NULL,
  `smssettings_extra` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `smssettings`
--

INSERT INTO `smssettings` (`smssettingsID`, `types`, `field_names`, `field_values`, `smssettings_extra`) VALUES
(1, 'clickatell', 'clickatell_username', '', NULL),
(2, 'clickatell', 'clickatell_password', '', NULL),
(3, 'clickatell', 'clickatell_api_key', '', NULL),
(4, 'twilio', 'twilio_accountSID', '', NULL),
(5, 'twilio', 'twilio_authtoken', '', NULL),
(6, 'twilio', 'twilio_fromnumber', '', NULL),
(7, 'bulk', 'bulk_username', '', NULL),
(8, 'bulk', 'bulk_password', '', NULL),
(9, 'msg91', 'msg91_authKey', '284676AtBlx6Mzmh5d26a79f', NULL),
(10, 'msg91', 'msg91_senderID', 'Azpire12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sociallink`
--

CREATE TABLE `sociallink` (
  `sociallinkID` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `linkedin` varchar(200) NOT NULL,
  `googleplus` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `dob` date DEFAULT NULL,
  `sex` varchar(10) NOT NULL,
  `religion` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `bloodgroup` varchar(5) DEFAULT NULL,
  `country` varchar(128) DEFAULT NULL,
  `registerNO` varchar(128) DEFAULT NULL,
  `state` varchar(128) DEFAULT NULL,
  `library` int(11) NOT NULL,
  `hostel` int(11) NOT NULL,
  `transport` int(11) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `parentID` int(11) DEFAULT NULL,
  `createschoolyearID` int(11) NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(60) NOT NULL,
  `create_usertype` varchar(60) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `name`, `dob`, `sex`, `religion`, `email`, `phone`, `address`, `classesID`, `sectionID`, `roll`, `bloodgroup`, `country`, `registerNO`, `state`, `library`, `hostel`, `transport`, `photo`, `parentID`, `createschoolyearID`, `schoolyearID`, `username`, `password`, `usertypeID`, `create_date`, `modify_date`, `create_userID`, `create_username`, `create_usertype`, `active`) VALUES
(1, 'Sample Student', '2000-11-27', 'Male', 'Hindu', 'contact@witage.net', '9890169318', 'warje', 1, 1, 101, 'B+', 'IN', '1001', 'Maharashtra', 0, 0, 0, 'default.png', 1, 1, 1, 'student', 'b2ab92d43d847bbaa9af1ba73e7a139d555a030784fcbbe502402559010cf4c46f0dc429ac8d1bf64d0e84239e1d1b5fd6b3c009b940b7440ab0324f4cb7274d', 3, '2019-07-28 07:36:45', '2019-07-28 07:36:45', 1, 'initest_admin', 'Admin', 1),
(2, 'Ankur Shakya', '2019-09-19', 'Male', 'Hindu', 'ankurshakya547@gmail.com', '8821907528', 'agra', 1, 1, 12134, 'B+', 'IN', '235555', 'up', 0, 0, 0, 'default.png', 1, 1, 1, 'ankurshakya', 'bf7dd243871c19613250abad0ded580a33b2e1739a917f0f3b4777cf10ed7da0d1ae977c450644f10ad19c4ae960ae6f660d984a6af22941c9bb8f3cf6bc9bf1', 3, '2019-09-19 14:04:35', '2019-09-19 14:04:35', 1, 'initest_admin', 'Admin', 1),
(3, 'Ankur Shakya', '2019-09-19', 'Male', 'Hindu', 'viratkapoor3@gmil.com', '8821907528', 'thane ke piche', 1, 1, 12134, 'A+', 'IN', '235555', 'up', 0, 0, 0, 'default.png', 1, 1, 1, 'PTPL-266', 'bf7dd243871c19613250abad0ded580a33b2e1739a917f0f3b4777cf10ed7da0d1ae977c450644f10ad19c4ae960ae6f660d984a6af22941c9bb8f3cf6bc9bf1', 3, '2019-09-20 15:13:52', '2019-09-20 15:13:52', 1, 'initest_admin', 'Admin', 1),
(4, 'Bilal', '2019-03-09', 'Male', '', 'bahmad3312@gmail.com', '08 9454 2237', 'District and Tehsil Mardan, Village and PO Hussai rustum road', 3, 7, 31323, 'A+', 'AD', '13333123', '', 0, 0, 0, 'default.png', 0, 1, 1, 'dasd', '03fe46c015472d108e62ea708d0b760a8e78de90925370d02ee22d8e07ffbde2d4ce58de2a33db4cb3ca7472a16098e4fa0bc1f7471f0cd44174ee0750ea1013', 3, '2019-11-08 12:09:28', '2019-11-08 12:09:28', 1, 'initest_admin', 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentextend`
--

CREATE TABLE `studentextend` (
  `studentextendID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `studentgroupID` int(11) NOT NULL,
  `optionalsubjectID` int(11) NOT NULL,
  `extracurricularactivities` text,
  `remarks` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studentextend`
--

INSERT INTO `studentextend` (`studentextendID`, `studentID`, `studentgroupID`, `optionalsubjectID`, `extracurricularactivities`, `remarks`) VALUES
(1, 1, 1, 0, '', ''),
(2, 2, 1, 0, '', ''),
(3, 3, 1, 0, '', ''),
(4, 4, 1, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `studentgroup`
--

CREATE TABLE `studentgroup` (
  `studentgroupID` int(11) NOT NULL,
  `group` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studentgroup`
--

INSERT INTO `studentgroup` (`studentgroupID`, `group`) VALUES
(1, 'Science'),
(2, 'Arts'),
(3, 'Commerce');

-- --------------------------------------------------------

--
-- Table structure for table `studentrelation`
--

CREATE TABLE `studentrelation` (
  `studentrelationID` int(11) NOT NULL,
  `srstudentID` int(11) DEFAULT NULL,
  `srname` varchar(40) NOT NULL,
  `srclassesID` int(11) DEFAULT NULL,
  `srclasses` varchar(40) DEFAULT NULL,
  `srroll` int(11) DEFAULT NULL,
  `srregisterNO` varchar(128) DEFAULT NULL,
  `srsectionID` int(11) DEFAULT NULL,
  `srsection` varchar(40) DEFAULT NULL,
  `srstudentgroupID` int(11) NOT NULL,
  `sroptionalsubjectID` int(11) NOT NULL,
  `srschoolyearID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `studentrelation`
--

INSERT INTO `studentrelation` (`studentrelationID`, `srstudentID`, `srname`, `srclassesID`, `srclasses`, `srroll`, `srregisterNO`, `srsectionID`, `srsection`, `srstudentgroupID`, `sroptionalsubjectID`, `srschoolyearID`) VALUES
(3, 3, 'Ankur Shakya', 1, 'Sample Class', 12134, '235555', 1, 'A', 1, 0, 1),
(4, 4, 'Bilal', 3, 'VII', 31323, '13333123', 7, 'C', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectID` int(11) UNSIGNED NOT NULL,
  `classesID` int(11) NOT NULL,
  `type` int(100) NOT NULL,
  `passmark` int(11) NOT NULL,
  `finalmark` int(11) NOT NULL,
  `subject` varchar(60) NOT NULL,
  `subject_author` varchar(100) DEFAULT NULL,
  `subject_code` tinytext NOT NULL,
  `teacher_name` varchar(60) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(60) NOT NULL,
  `create_usertype` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectID`, `classesID`, `type`, `passmark`, `finalmark`, `subject`, `subject_author`, `subject_code`, `teacher_name`, `create_date`, `modify_date`, `create_userID`, `create_username`, `create_usertype`) VALUES
(1, 1, 1, 33, 100, 'English', 'Ankur', '12345', '', '2019-09-22 09:49:14', '2019-09-22 09:49:14', 1, 'initest_admin', 'Admin'),
(2, 2, 0, 33, 100, 'Math', 'Ankur', '6543', '', '2019-09-22 10:45:36', '2019-09-22 10:45:36', 1, 'initest_admin', 'Admin'),
(3, 3, 1, 33, 100, 'Hindi', 'Ankur', '8907', '', '2019-09-24 06:17:42', '2019-09-24 06:17:42', 1, 'initest_admin', 'Admin'),
(4, 1, 1, 30, 50, 'Photography', 'Azpire School', 'IDFA103', '', '2019-11-05 10:20:56', '2019-11-05 10:20:56', 1, 'initest_admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `subjectteacher`
--

CREATE TABLE `subjectteacher` (
  `subjectteacherID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjectteacher`
--

INSERT INTO `subjectteacher` (`subjectteacherID`, `subjectID`, `classesID`, `teacherID`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1),
(3, 3, 3, 1),
(4, 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_attendance`
--

CREATE TABLE `sub_attendance` (
  `attendanceID` int(200) UNSIGNED NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `classesID` int(11) NOT NULL,
  `sectionID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `usertype` varchar(60) NOT NULL,
  `monthyear` varchar(10) NOT NULL,
  `a1` varchar(3) DEFAULT NULL,
  `a2` varchar(3) DEFAULT NULL,
  `a3` varchar(3) DEFAULT NULL,
  `a4` varchar(3) DEFAULT NULL,
  `a5` varchar(3) DEFAULT NULL,
  `a6` varchar(3) DEFAULT NULL,
  `a7` varchar(3) DEFAULT NULL,
  `a8` varchar(3) DEFAULT NULL,
  `a9` varchar(3) DEFAULT NULL,
  `a10` varchar(3) DEFAULT NULL,
  `a11` varchar(3) DEFAULT NULL,
  `a12` varchar(3) DEFAULT NULL,
  `a13` varchar(3) DEFAULT NULL,
  `a14` varchar(3) DEFAULT NULL,
  `a15` varchar(3) DEFAULT NULL,
  `a16` varchar(3) DEFAULT NULL,
  `a17` varchar(3) DEFAULT NULL,
  `a18` varchar(3) DEFAULT NULL,
  `a19` varchar(3) DEFAULT NULL,
  `a20` varchar(3) DEFAULT NULL,
  `a21` varchar(3) DEFAULT NULL,
  `a22` varchar(3) DEFAULT NULL,
  `a23` varchar(3) DEFAULT NULL,
  `a24` varchar(3) DEFAULT NULL,
  `a25` varchar(3) DEFAULT NULL,
  `a26` varchar(3) DEFAULT NULL,
  `a27` varchar(3) DEFAULT NULL,
  `a28` varchar(3) DEFAULT NULL,
  `a29` varchar(3) DEFAULT NULL,
  `a30` varchar(3) DEFAULT NULL,
  `a31` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_attendance`
--

INSERT INTO `sub_attendance` (`attendanceID`, `schoolyearID`, `studentID`, `classesID`, `sectionID`, `subjectID`, `userID`, `usertype`, `monthyear`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`, `a11`, `a12`, `a13`, `a14`, `a15`, `a16`, `a17`, `a18`, `a19`, `a20`, `a21`, `a22`, `a23`, `a24`, `a25`, `a26`, `a27`, `a28`, `a29`, `a30`, `a31`) VALUES
(1, 1, 3, 1, 1, 1, 1, 'Admin', '10-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 3, 1, 1, 1, 1, 'Admin', '11-2019', NULL, NULL, NULL, NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 3, 1, 1, 4, 1, 'Admin', '11-2019', NULL, NULL, NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `syllabusID` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `description` text,
  `date` date NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `originalfile` text NOT NULL,
  `file` text,
  `classesID` int(11) NOT NULL,
  `schoolyearID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `systemadmin`
--

CREATE TABLE `systemadmin` (
  `systemadminID` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `religion` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `jod` date NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(60) NOT NULL,
  `create_usertype` varchar(60) NOT NULL,
  `active` int(11) NOT NULL,
  `systemadminextra1` varchar(128) DEFAULT NULL,
  `systemadminextra2` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `systemadmin`
--

INSERT INTO `systemadmin` (`systemadminID`, `name`, `dob`, `sex`, `religion`, `email`, `phone`, `address`, `jod`, `photo`, `username`, `password`, `usertypeID`, `create_date`, `modify_date`, `create_userID`, `create_username`, `create_usertype`, `active`, `systemadminextra1`, `systemadminextra2`) VALUES
(1, 'S Saxena', '2019-07-27', 'Male', 'Unknown', 'ssaxena_v@rediffmail.com', '', '', '2019-07-27', 'default.png', 'initest_admin', '1a426eb22956167720f046bceb20937feb24f6a6701bff66f782747d1707d02ba9572d35939640b7907b401acf03b7174fd09e73a5da26cbaaad16c04727413a', 1, '2019-07-27 02:54:45', '2019-07-27 02:54:45', 0, 'initest_admin', 'Admin', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tattendance`
--

CREATE TABLE `tattendance` (
  `tattendanceID` int(200) UNSIGNED NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `monthyear` varchar(10) NOT NULL,
  `a1` varchar(3) DEFAULT NULL,
  `a2` varchar(3) DEFAULT NULL,
  `a3` varchar(3) DEFAULT NULL,
  `a4` varchar(3) DEFAULT NULL,
  `a5` varchar(3) DEFAULT NULL,
  `a6` varchar(3) DEFAULT NULL,
  `a7` varchar(3) DEFAULT NULL,
  `a8` varchar(3) DEFAULT NULL,
  `a9` varchar(3) DEFAULT NULL,
  `a10` varchar(3) DEFAULT NULL,
  `a11` varchar(3) DEFAULT NULL,
  `a12` varchar(3) DEFAULT NULL,
  `a13` varchar(3) DEFAULT NULL,
  `a14` varchar(3) DEFAULT NULL,
  `a15` varchar(3) DEFAULT NULL,
  `a16` varchar(3) DEFAULT NULL,
  `a17` varchar(3) DEFAULT NULL,
  `a18` varchar(3) DEFAULT NULL,
  `a19` varchar(3) DEFAULT NULL,
  `a20` varchar(3) DEFAULT NULL,
  `a21` varchar(3) DEFAULT NULL,
  `a22` varchar(3) DEFAULT NULL,
  `a23` varchar(3) DEFAULT NULL,
  `a24` varchar(3) DEFAULT NULL,
  `a25` varchar(3) DEFAULT NULL,
  `a26` varchar(3) DEFAULT NULL,
  `a27` varchar(3) DEFAULT NULL,
  `a28` varchar(3) DEFAULT NULL,
  `a29` varchar(3) DEFAULT NULL,
  `a30` varchar(3) DEFAULT NULL,
  `a31` varchar(3) DEFAULT NULL,
  `check_in_time` varchar(10) DEFAULT NULL,
  `check_out_time` varchar(10) DEFAULT NULL,
  `flag` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tattendance`
--

INSERT INTO `tattendance` (`tattendanceID`, `schoolyearID`, `teacherID`, `usertypeID`, `monthyear`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`, `a11`, `a12`, `a13`, `a14`, `a15`, `a16`, `a17`, `a18`, `a19`, `a20`, `a21`, `a22`, `a23`, `a24`, `a25`, `a26`, `a27`, `a28`, `a29`, `a30`, `a31`, `check_in_time`, `check_out_time`, `flag`) VALUES
(1, 1, 1, 2, '09-2019', 'P', 'P', 'P', 'P', 'P', 'P', 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'A', 'A', NULL, NULL, NULL, 'P', 'P', NULL, NULL, NULL, NULL, NULL, '10:13:42', '16:44:16', 'TI'),
(2, 1, 2, 2, '09-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P', 'A', NULL, NULL, NULL, 'P', 'P', NULL, NULL, NULL, NULL, NULL, '10:13:46', '16:44:17', 'TI'),
(3, 1, 3, 2, '09-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P', 'P', NULL, NULL, NULL, NULL, NULL, '10:13:38', '16:41:33', 'TI'),
(4, 1, 3, 2, '10-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '22:20:22', NULL, 'TI'),
(5, 1, 1, 2, '10-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '22:20:59', '22:20:26', 'TI'),
(6, 1, 2, 2, '10-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '22:20:28', 'TO'),
(7, 1, 5, 2, '10-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, 4, 2, '10-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 1, 6, 2, '10-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 1, 3, 2, '11-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 1, 1, 2, '11-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 1, 2, 2, '11-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 1, 6, 2, '11-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 1, 5, 2, '11-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 1, 4, 2, '11-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 1, 3, 2, '12-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 1, 1, 2, '12-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 1, 2, 2, '12-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 1, 6, 2, '12-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 1, 5, 2, '12-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 1, 4, 2, '12-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacherID` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `designation` varchar(128) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `shift` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `religion` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `jod` date NOT NULL,
  `pen` varchar(20) NOT NULL,
  `aadhar` varchar(20) NOT NULL,
  `esic` varchar(30) DEFAULT NULL,
  `pfno` varchar(20) DEFAULT NULL,
  `bankname` varchar(50) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `accountno` varchar(50) DEFAULT NULL,
  `ifsc` varchar(50) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(60) NOT NULL,
  `create_usertype` varchar(60) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherID`, `name`, `designation`, `dob`, `sex`, `shift`, `category`, `religion`, `email`, `phone`, `address`, `jod`, `pen`, `aadhar`, `esic`, `pfno`, `bankname`, `branch`, `accountno`, `ifsc`, `photo`, `username`, `password`, `usertypeID`, `create_date`, `modify_date`, `create_userID`, `create_username`, `create_usertype`, `active`) VALUES
(1, 'S Saxena', 'Faculty', '1959-09-27', 'Male', '', '', 'Hindu', 'ssaxena@witage.net', '9890169318', 'warje', '2019-02-04', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'default.png', 'ssaxena', '1a426eb22956167720f046bceb20937feb24f6a6701bff66f782747d1707d02ba9572d35939640b7907b401acf03b7174fd09e73a5da26cbaaad16c04727413a', 2, '2019-07-28 07:32:44', '2019-07-28 07:32:44', 1, 'initest_admin', 'Admin', 1),
(2, 'Sample Teacher', 'Teacher', '1970-02-03', 'Male', '', '', 'Hindu', 'sample@sample.com', '', '', '2019-07-01', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'default.png', 'teacher', '6b8042d7c514d826a1590886563ee06b4e987dae5bdd6be802763276b8810faa513e5b2663dea316b402e123c5d54b1ea80f085f08055509a4f977b5bd4724dc', 2, '2019-08-29 06:24:06', '2019-08-29 06:24:06', 1, 'initest_admin', 'Admin', 1),
(3, 'Ankur Shakya', 'SE', '1994-06-14', 'Male', '', '', 'Hindu', 'ankurshakya54712@gmail.com', '8821907528', 'thane ke piche', '2019-09-23', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'default.png', 'ankur', 'bf7dd243871c19613250abad0ded580a33b2e1739a917f0f3b4777cf10ed7da0d1ae977c450644f10ad19c4ae960ae6f660d984a6af22941c9bb8f3cf6bc9bf1', 2, '2019-09-25 08:08:49', '2019-09-25 08:08:49', 1, 'initest_admin', 'Admin', 1),
(4, 'Vinit', 'teacher', '1992-10-20', 'Male', '', '', 'Hindu', 'test12@gmail.com', '1234567890', 'Gurugram', '2019-10-10', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'default.png', 'teacher12', '716cb8bf22315676296c750a79d2dc1785c27d9adc3b4533e4d06565a08c0561739f70ea0ee0b12e3b4b57ccaebdd3668c9cca98ba561dce1bdc3dd26cde3156', 2, '2019-10-18 02:30:21', '2019-10-18 02:30:21', 1, 'initest_admin', 'Admin', 1),
(5, 'Test', 'Teacher', '1992-07-04', 'Male', '', '', 'Hindu', 'test@gmail.com', '1234567890', 'Test', '2019-10-10', '123456789', '23456789567', '2345ertyu', '1234567', NULL, NULL, NULL, NULL, 'bfab4688fd62fd64eadd1b8d426f3d82f5ed1e61cec7b98a5941230973646f2145e20ccf2d8851dd89824ffcd452c27a8c1160b5007dd5c982329994845453f0.png', 'test', 'e3779dcbaa0d5d7d52b6427cd51c9038573b29eff7d749e41806b04f588ffa06f22870cb9fba2dea642c4f9eb5ba97fc3add001cd3628641fe365b8127a45bf8', 2, '2019-10-19 11:22:43', '2019-10-19 11:22:43', 1, 'initest_admin', 'Admin', 1),
(6, 'Teacher', 'Faculty', '2017-04-04', 'Male', '', '', '', 'satyam.sparihar2000@gmail.com', '7304147193', 'Ward No.6,, House No. 66, Gram Bichholi, Ethar, Bhind', '2007-01-09', 'APUYH5632D', '452168623652', '', '', 'SBI', 'Pune', '1235632563', 'IFSC22365', 'default.png', 'teacher-1', '38bf99b8f85288904c31e553666cdbc7d5b26b30fc8d2127848e88a2ded7f3cb635437de1fe6db77a969d6d775f9053dfda241b5e3b340a83a3efcd9c7aa644f', 2, '2019-10-23 10:23:32', '2019-10-23 10:23:32', 1, 'initest_admin', 'Admin', 1),
(7, 'test teacher', 'tset', '2019-12-13', 'Male', '5', '2', 'fasfasfas', 'test2@gmail.com', '', '', '2019-12-03', '1243255345', '34325235235235', '', '', 'boi', 'somalwada', '0333322222222', 'ASDFGH', '7a51d54e7903e16b4f5a37872ecd88a4b534c5b7568b8874e08d367ff6fa36e77d8f15af35b25988e96a3efdc1c0247e96e1040273ebb16daa9392e84632359e.jpg', 'test_teacher', '331242f85078bb075066c0085e7bfcdd35be2064d5fa8dbf40a9321a6d44151943fff2530c46efb3d6d2c60c3b397f7ab4f43fbdbd242d03c95a9372e128d271', 2, '2019-12-14 09:24:07', '2019-12-14 10:17:36', 1, 'initest_admin', 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `themesID` int(11) NOT NULL,
  `sortID` int(11) NOT NULL DEFAULT '1',
  `themename` varchar(128) NOT NULL,
  `backend` int(11) NOT NULL DEFAULT '1',
  `frontend` int(11) NOT NULL DEFAULT '1',
  `topcolor` text NOT NULL,
  `leftcolor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`themesID`, `sortID`, `themename`, `backend`, `frontend`, `topcolor`, `leftcolor`) VALUES
(1, 1, 'Default', 1, 1, '#FFFFFF', '#2d353c'),
(2, 0, 'Blue', 0, 1, '#3c8dbc', '#2d353c'),
(3, 3, 'Black', 1, 1, '#fefefe', '#222222'),
(4, 4, 'Purple', 1, 1, '#605ca8', '#2d353c'),
(5, 5, 'Green', 1, 1, '#00a65a', '#2d353c'),
(6, 6, 'Red', 1, 1, '#dd4b39', '#2d353c'),
(7, 0, 'Yellow', 0, 1, '#f39c12', '#2d353c'),
(8, 7, 'Blue Light', 1, 1, '#3c8dbc', '#f9fafc'),
(9, 8, 'Black Light', 1, 1, '#fefefe', '#f9fafc'),
(10, 9, 'Purple Light', 1, 1, '#605ca8', '#f9fafc'),
(11, 10, 'Green Light', 1, 1, '#00a65a', '#f9fafc'),
(12, 11, 'Red Light', 1, 1, '#dd4b39', '#f9fafc'),
(13, 12, 'Yellow Light', 1, 1, '#f39c12', '#f9fafc'),
(14, 2, 'White Blue', 1, 1, '#ffffff', '#132035');

-- --------------------------------------------------------

--
-- Table structure for table `tmember`
--

CREATE TABLE `tmember` (
  `tmemberID` int(11) UNSIGNED NOT NULL,
  `studentID` int(11) NOT NULL,
  `transportID` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `tbalance` varchar(11) DEFAULT NULL,
  `tjoindate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `transportID` int(11) UNSIGNED NOT NULL,
  `route` text NOT NULL,
  `vehicle` int(11) NOT NULL,
  `fare` varchar(11) NOT NULL,
  `note` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `uattendance`
--

CREATE TABLE `uattendance` (
  `uattendanceID` int(200) UNSIGNED NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `monthyear` varchar(10) NOT NULL,
  `a1` varchar(3) DEFAULT NULL,
  `a2` varchar(3) DEFAULT NULL,
  `a3` varchar(3) DEFAULT NULL,
  `a4` varchar(3) DEFAULT NULL,
  `a5` varchar(3) DEFAULT NULL,
  `a6` varchar(3) DEFAULT NULL,
  `a7` varchar(3) DEFAULT NULL,
  `a8` varchar(3) DEFAULT NULL,
  `a9` varchar(3) DEFAULT NULL,
  `a10` varchar(3) DEFAULT NULL,
  `a11` varchar(3) DEFAULT NULL,
  `a12` varchar(3) DEFAULT NULL,
  `a13` varchar(3) DEFAULT NULL,
  `a14` varchar(3) DEFAULT NULL,
  `a15` varchar(3) DEFAULT NULL,
  `a16` varchar(3) DEFAULT NULL,
  `a17` varchar(3) DEFAULT NULL,
  `a18` varchar(3) DEFAULT NULL,
  `a19` varchar(3) DEFAULT NULL,
  `a20` varchar(3) DEFAULT NULL,
  `a21` varchar(3) DEFAULT NULL,
  `a22` varchar(3) DEFAULT NULL,
  `a23` varchar(3) DEFAULT NULL,
  `a24` varchar(3) DEFAULT NULL,
  `a25` varchar(3) DEFAULT NULL,
  `a26` varchar(3) DEFAULT NULL,
  `a27` varchar(3) DEFAULT NULL,
  `a28` varchar(3) DEFAULT NULL,
  `a29` varchar(3) DEFAULT NULL,
  `a30` varchar(3) DEFAULT NULL,
  `a31` varchar(3) DEFAULT NULL,
  `check_in_time` varchar(50) DEFAULT NULL,
  `check_out_time` varchar(50) DEFAULT NULL,
  `flag` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uattendance`
--

INSERT INTO `uattendance` (`uattendanceID`, `schoolyearID`, `userID`, `usertypeID`, `monthyear`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`, `a11`, `a12`, `a13`, `a14`, `a15`, `a16`, `a17`, `a18`, `a19`, `a20`, `a21`, `a22`, `a23`, `a24`, `a25`, `a26`, `a27`, `a28`, `a29`, `a30`, `a31`, `check_in_time`, `check_out_time`, `flag`) VALUES
(1, 1, 1, 7, '09-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, '17:18:59', '17:20:54', 'TO'),
(2, 1, 2, 7, '09-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL, '17:19:1', '17:19:6', 'TI'),
(3, 1, 1, 7, '10-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 2, 5, '10-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, 1, 7, '12-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1, 2, 5, '12-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, 3, 8, '12-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, 4, 8, '12-2019', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `update`
--

CREATE TABLE `update` (
  `updateID` int(11) NOT NULL,
  `version` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `userID` int(11) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `log` longtext NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `update`
--

INSERT INTO `update` (`updateID`, `version`, `date`, `userID`, `usertypeID`, `log`, `status`) VALUES
(1, '4.2', '2019-07-27 14:54:45', 1, 1, '<h4>1. initial install</h4>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `shift` varchar(25) NOT NULL,
  `category` varchar(25) NOT NULL,
  `religion` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` tinytext,
  `address` text,
  `jod` date NOT NULL,
  `pen` varchar(50) DEFAULT NULL,
  `aadhar` varchar(50) DEFAULT NULL,
  `esic` varchar(50) DEFAULT NULL,
  `pfno` varchar(50) DEFAULT NULL,
  `bankname` varchar(50) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `accountno` varchar(50) DEFAULT NULL,
  `ifsc` varchar(20) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(128) NOT NULL,
  `usertypeID` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(60) NOT NULL,
  `create_usertype` varchar(60) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `dob`, `sex`, `shift`, `category`, `religion`, `email`, `phone`, `address`, `jod`, `pen`, `aadhar`, `esic`, `pfno`, `bankname`, `branch`, `accountno`, `ifsc`, `photo`, `username`, `password`, `usertypeID`, `create_date`, `modify_date`, `create_userID`, `create_username`, `create_usertype`, `active`) VALUES
(1, 'S Saxena', '1959-09-27', 'Male', '', '', 'Hindu', 'ssaxena@azpireschool.com', '9890169318', 'warje', '2019-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default.png', 'user', 'ae40f4b6e8f5c7001e3a01d5bceec564ef0a67f71bba531d52110dd579dcaa17145ffa252fe0a49489b836ee6ac8f9bc26c2445a5c803002effeaa24bc6934ce', 7, '2019-09-25 03:08:54', '2019-09-25 03:08:54', 1, 'initest_admin', 'Admin', 1),
(2, 'Sumit', '1994-06-14', 'Male', '', '', 'Hindu', 'virartkapoor3@gmil.com', '67576567567', 'thane ke piche', '2019-09-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'default.png', 'sumit', 'c55cbc581582283501f2455d59c9a3c7de1a804dd2347cffc8cd99913d1c41cc0af13aff0a6a3f64e28350fe075e4d1b42fbd6c237f28b58b68d91a2ecf8c22f', 5, '2019-09-25 03:09:36', '2019-09-25 03:57:12', 1, 'initest_admin', 'Admin', 1),
(5, 'Test USER', '2019-12-13', 'Male', '5', '2', '', 'test1@gmail.com', '', '', '2019-12-03', '1243255345', '343252352352355', '', '', 'boi', 'somalwada', '0333322222222', 'BKID123', 'default.png', 'test1', 'fdc3a2b4076be4b9acda7d8e29ffaf916038725802825b8b4368798a19c6a011f5be0d46c8745aa56a836cb85f46d12dd25b2da77a744f60145ffc614e4f1db8', 8, '2019-12-14 08:51:13', '2019-12-14 08:51:13', 1, 'initest_admin', 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `usertypeID` int(11) UNSIGNED NOT NULL,
  `usertype` varchar(60) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` datetime NOT NULL,
  `create_userID` int(11) NOT NULL,
  `create_username` varchar(60) NOT NULL,
  `create_usertype` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`usertypeID`, `usertype`, `create_date`, `modify_date`, `create_userID`, `create_username`, `create_usertype`) VALUES
(1, 'Admin', '2016-06-24 07:12:49', '2016-06-24 07:12:49', 1, 'admin', 'Super Admin'),
(2, 'Teacher', '2016-06-24 07:13:13', '2016-06-24 07:13:13', 1, 'admin', 'Super Admin'),
(3, 'Student', '2016-06-24 07:13:27', '2016-06-24 07:13:27', 1, 'admin', 'Super Admin'),
(4, 'Parents', '2016-06-24 07:13:42', '2016-10-25 01:12:52', 1, 'admin', 'Super Admin'),
(5, 'Accountant', '2016-06-24 07:13:54', '2016-06-24 07:13:54', 1, 'admin', 'Super Admin'),
(6, 'Librarian', '2016-06-24 09:09:43', '2016-06-24 09:09:43', 1, 'admin', 'Super Admin'),
(7, 'Receptionist', '2016-10-30 06:24:41', '2016-10-30 06:24:41', 1, 'admin', 'Admin'),
(8, 'Moderator', '2016-10-30 07:00:20', '2016-12-06 06:08:38', 1, 'admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendorID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `visitorinfo`
--

CREATE TABLE `visitorinfo` (
  `visitorID` bigint(12) UNSIGNED NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `email_id` varchar(128) DEFAULT NULL,
  `phone` text NOT NULL,
  `photo` varchar(128) DEFAULT NULL,
  `company_name` varchar(128) DEFAULT NULL,
  `coming_from` varchar(128) DEFAULT NULL,
  `representing` varchar(128) DEFAULT NULL,
  `to_meet_personID` int(11) NOT NULL,
  `to_meet_usertypeID` int(11) NOT NULL,
  `check_in` timestamp NULL DEFAULT NULL,
  `check_out` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL,
  `schoolyearID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `weaverandfine`
--

CREATE TABLE `weaverandfine` (
  `weaverandfineID` int(11) NOT NULL,
  `globalpaymentID` int(11) NOT NULL,
  `invoiceID` int(11) NOT NULL,
  `paymentID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `schoolyearID` int(11) NOT NULL,
  `weaver` double NOT NULL,
  `fine` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `weaverandfine`
--

INSERT INTO `weaverandfine` (`weaverandfineID`, `globalpaymentID`, `invoiceID`, `paymentID`, `studentID`, `schoolyearID`, `weaver`, `fine`) VALUES
(1, 1, 7, 1, 2, 1, 0, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activitiesID`);

--
-- Indexes for table `activitiescategory`
--
ALTER TABLE `activitiescategory`
  ADD PRIMARY KEY (`activitiescategoryID`);

--
-- Indexes for table `activitiescomment`
--
ALTER TABLE `activitiescomment`
  ADD PRIMARY KEY (`activitiescommentID`);

--
-- Indexes for table `activitiesmedia`
--
ALTER TABLE `activitiesmedia`
  ADD PRIMARY KEY (`activitiesmediaID`);

--
-- Indexes for table `activitiesstudent`
--
ALTER TABLE `activitiesstudent`
  ADD PRIMARY KEY (`activitiesstudentID`);

--
-- Indexes for table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`alertID`);

--
-- Indexes for table `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`assetID`);

--
-- Indexes for table `asset_assignment`
--
ALTER TABLE `asset_assignment`
  ADD PRIMARY KEY (`asset_assignmentID`);

--
-- Indexes for table `asset_category`
--
ALTER TABLE `asset_category`
  ADD PRIMARY KEY (`asset_categoryID`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignmentID`);

--
-- Indexes for table `assignmentanswer`
--
ALTER TABLE `assignmentanswer`
  ADD PRIMARY KEY (`assignmentanswerID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendanceID`);

--
-- Indexes for table `automation_rec`
--
ALTER TABLE `automation_rec`
  ADD PRIMARY KEY (`automation_recID`);

--
-- Indexes for table `automation_shudulu`
--
ALTER TABLE `automation_shudulu`
  ADD PRIMARY KEY (`automation_shuduluID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `categoryus`
--
ALTER TABLE `categoryus`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `certificate_template`
--
ALTER TABLE `certificate_template`
  ADD PRIMARY KEY (`certificate_templateID`);

--
-- Indexes for table `childcare`
--
ALTER TABLE `childcare`
  ADD PRIMARY KEY (`childcareID`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classesID`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`complainID`);

--
-- Indexes for table `conversation_message_info`
--
ALTER TABLE `conversation_message_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversation_msg`
--
ALTER TABLE `conversation_msg`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`documentID`);

--
-- Indexes for table `eattendance`
--
ALTER TABLE `eattendance`
  ADD PRIMARY KEY (`eattendanceID`);

--
-- Indexes for table `ebooks`
--
ALTER TABLE `ebooks`
  ADD PRIMARY KEY (`ebooksID`);

--
-- Indexes for table `emailsetting`
--
ALTER TABLE `emailsetting`
  ADD PRIMARY KEY (`fieldoption`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `eventcounter`
--
ALTER TABLE `eventcounter`
  ADD PRIMARY KEY (`eventcounterID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`examID`);

--
-- Indexes for table `examschedule`
--
ALTER TABLE `examschedule`
  ADD PRIMARY KEY (`examscheduleID`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expenseID`);

--
-- Indexes for table `feetypes`
--
ALTER TABLE `feetypes`
  ADD PRIMARY KEY (`feetypesID`);

--
-- Indexes for table `fmenu`
--
ALTER TABLE `fmenu`
  ADD PRIMARY KEY (`fmenuID`);

--
-- Indexes for table `fmenu_relation`
--
ALTER TABLE `fmenu_relation`
  ADD PRIMARY KEY (`fmenu_relationID`);

--
-- Indexes for table `frontend_setting`
--
ALTER TABLE `frontend_setting`
  ADD PRIMARY KEY (`fieldoption`);

--
-- Indexes for table `frontend_template`
--
ALTER TABLE `frontend_template`
  ADD PRIMARY KEY (`frontend_templateID`);

--
-- Indexes for table `globalpayment`
--
ALTER TABLE `globalpayment`
  ADD PRIMARY KEY (`globalpaymentID`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`gradeID`);

--
-- Indexes for table `hmember`
--
ALTER TABLE `hmember`
  ADD PRIMARY KEY (`hmemberID`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`holidayID`);

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`hostelID`);

--
-- Indexes for table `hourly_template`
--
ALTER TABLE `hourly_template`
  ADD PRIMARY KEY (`hourly_templateID`);

--
-- Indexes for table `idmanager`
--
ALTER TABLE `idmanager`
  ADD PRIMARY KEY (`idmanagerID`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`incomeID`);

--
-- Indexes for table `ini_config`
--
ALTER TABLE `ini_config`
  ADD PRIMARY KEY (`configID`);

--
-- Indexes for table `instruction`
--
ALTER TABLE `instruction`
  ADD PRIMARY KEY (`instructionID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceID`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`issueID`);

--
-- Indexes for table `leaveapplications`
--
ALTER TABLE `leaveapplications`
  ADD PRIMARY KEY (`leaveapplicationID`),
  ADD KEY `leave_categoryID` (`leavecategoryID`),
  ADD KEY `from_date` (`from_date`),
  ADD KEY `to_date` (`to_date`),
  ADD KEY `approver_userID` (`approver_userID`),
  ADD KEY `approver_usertypeID` (`approver_usertypeID`),
  ADD KEY `applicationto_usertypeID` (`applicationto_usertypeID`),
  ADD KEY `applicationto_userID` (`applicationto_userID`);

--
-- Indexes for table `leaveassign`
--
ALTER TABLE `leaveassign`
  ADD PRIMARY KEY (`leaveassignID`),
  ADD KEY `leave_categoryID` (`leavecategoryID`),
  ADD KEY `usertypeID` (`usertypeID`);

--
-- Indexes for table `leavecategory`
--
ALTER TABLE `leavecategory`
  ADD PRIMARY KEY (`leavecategoryID`);

--
-- Indexes for table `lmember`
--
ALTER TABLE `lmember`
  ADD PRIMARY KEY (`lmemberID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationID`);

--
-- Indexes for table `loginlog`
--
ALTER TABLE `loginlog`
  ADD PRIMARY KEY (`loginlogID`);

--
-- Indexes for table `mailandsms`
--
ALTER TABLE `mailandsms`
  ADD PRIMARY KEY (`mailandsmsID`);

--
-- Indexes for table `mailandsmstemplate`
--
ALTER TABLE `mailandsmstemplate`
  ADD PRIMARY KEY (`mailandsmstemplateID`);

--
-- Indexes for table `mailandsmstemplatetag`
--
ALTER TABLE `mailandsmstemplatetag`
  ADD PRIMARY KEY (`mailandsmstemplatetagID`);

--
-- Indexes for table `maininvoice`
--
ALTER TABLE `maininvoice`
  ADD PRIMARY KEY (`maininvoiceID`);

--
-- Indexes for table `make_payment`
--
ALTER TABLE `make_payment`
  ADD PRIMARY KEY (`make_paymentID`);

--
-- Indexes for table `manage_salary`
--
ALTER TABLE `manage_salary`
  ADD PRIMARY KEY (`manage_salaryID`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`markID`);

--
-- Indexes for table `markpercentage`
--
ALTER TABLE `markpercentage`
  ADD PRIMARY KEY (`markpercentageID`);

--
-- Indexes for table `markrelation`
--
ALTER TABLE `markrelation`
  ADD PRIMARY KEY (`markrelationID`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`mediaID`);

--
-- Indexes for table `media_category`
--
ALTER TABLE `media_category`
  ADD PRIMARY KEY (`mcategoryID`);

--
-- Indexes for table `media_gallery`
--
ALTER TABLE `media_gallery`
  ADD PRIMARY KEY (`media_galleryID`);

--
-- Indexes for table `media_share`
--
ALTER TABLE `media_share`
  ADD PRIMARY KEY (`shareID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menuID`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`noticeID`);

--
-- Indexes for table `onlineadmission`
--
ALTER TABLE `onlineadmission`
  ADD PRIMARY KEY (`onlineadmissionID`);

--
-- Indexes for table `online_exam`
--
ALTER TABLE `online_exam`
  ADD PRIMARY KEY (`onlineExamID`);

--
-- Indexes for table `online_exam_question`
--
ALTER TABLE `online_exam_question`
  ADD PRIMARY KEY (`onlineExamQuestionID`);

--
-- Indexes for table `online_exam_type`
--
ALTER TABLE `online_exam_type`
  ADD PRIMARY KEY (`onlineExamTypeID`);

--
-- Indexes for table `online_exam_user_answer`
--
ALTER TABLE `online_exam_user_answer`
  ADD PRIMARY KEY (`onlineExamUserAnswerID`);

--
-- Indexes for table `online_exam_user_answer_option`
--
ALTER TABLE `online_exam_user_answer_option`
  ADD PRIMARY KEY (`onlineExamUserAnswerOptionID`);

--
-- Indexes for table `online_exam_user_status`
--
ALTER TABLE `online_exam_user_status`
  ADD PRIMARY KEY (`onlineExamUserStatus`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pagesID`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`parentsID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permissionID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postsID`);

--
-- Indexes for table `posts_categories`
--
ALTER TABLE `posts_categories`
  ADD PRIMARY KEY (`posts_categoriesID`);

--
-- Indexes for table `posts_category`
--
ALTER TABLE `posts_category`
  ADD PRIMARY KEY (`posts_categoryID`);

--
-- Indexes for table `preadmission`
--
ALTER TABLE `preadmission`
  ADD PRIMARY KEY (`preadmissionId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`productcategoryID`);

--
-- Indexes for table `productpurchase`
--
ALTER TABLE `productpurchase`
  ADD PRIMARY KEY (`productpurchaseID`);

--
-- Indexes for table `productpurchaseitem`
--
ALTER TABLE `productpurchaseitem`
  ADD PRIMARY KEY (`productpurchaseitemID`);

--
-- Indexes for table `productpurchasepaid`
--
ALTER TABLE `productpurchasepaid`
  ADD PRIMARY KEY (`productpurchasepaidID`);

--
-- Indexes for table `productsale`
--
ALTER TABLE `productsale`
  ADD PRIMARY KEY (`productsaleID`);

--
-- Indexes for table `productsaleitem`
--
ALTER TABLE `productsaleitem`
  ADD PRIMARY KEY (`productsaleitemID`);

--
-- Indexes for table `productsalepaid`
--
ALTER TABLE `productsalepaid`
  ADD PRIMARY KEY (`productsalepaidID`);

--
-- Indexes for table `productsupplier`
--
ALTER TABLE `productsupplier`
  ADD PRIMARY KEY (`productsupplierID`);

--
-- Indexes for table `productwarehouse`
--
ALTER TABLE `productwarehouse`
  ADD PRIMARY KEY (`productwarehouseID`);

--
-- Indexes for table `promotionlog`
--
ALTER TABLE `promotionlog`
  ADD PRIMARY KEY (`promotionLogID`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseID`);

--
-- Indexes for table `question_answer`
--
ALTER TABLE `question_answer`
  ADD PRIMARY KEY (`answerID`);

--
-- Indexes for table `question_bank`
--
ALTER TABLE `question_bank`
  ADD PRIMARY KEY (`questionBankID`);

--
-- Indexes for table `question_group`
--
ALTER TABLE `question_group`
  ADD PRIMARY KEY (`questionGroupID`);

--
-- Indexes for table `question_level`
--
ALTER TABLE `question_level`
  ADD PRIMARY KEY (`questionLevelID`);

--
-- Indexes for table `question_option`
--
ALTER TABLE `question_option`
  ADD PRIMARY KEY (`optionID`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`questionTypeID`);

--
-- Indexes for table `reset`
--
ALTER TABLE `reset`
  ADD PRIMARY KEY (`resetID`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`routineID`);

--
-- Indexes for table `salary_option`
--
ALTER TABLE `salary_option`
  ADD PRIMARY KEY (`salary_optionID`);

--
-- Indexes for table `salary_template`
--
ALTER TABLE `salary_template`
  ADD PRIMARY KEY (`salary_templateID`);

--
-- Indexes for table `schoolyear`
--
ALTER TABLE `schoolyear`
  ADD PRIMARY KEY (`schoolyearID`);

--
-- Indexes for table `school_sessions`
--
ALTER TABLE `school_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sectionID`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`fieldoption`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`sliderID`);

--
-- Indexes for table `smssettings`
--
ALTER TABLE `smssettings`
  ADD PRIMARY KEY (`smssettingsID`);

--
-- Indexes for table `sociallink`
--
ALTER TABLE `sociallink`
  ADD PRIMARY KEY (`sociallinkID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `studentextend`
--
ALTER TABLE `studentextend`
  ADD PRIMARY KEY (`studentextendID`);

--
-- Indexes for table `studentgroup`
--
ALTER TABLE `studentgroup`
  ADD PRIMARY KEY (`studentgroupID`);

--
-- Indexes for table `studentrelation`
--
ALTER TABLE `studentrelation`
  ADD PRIMARY KEY (`studentrelationID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectID`);

--
-- Indexes for table `subjectteacher`
--
ALTER TABLE `subjectteacher`
  ADD PRIMARY KEY (`subjectteacherID`);

--
-- Indexes for table `sub_attendance`
--
ALTER TABLE `sub_attendance`
  ADD PRIMARY KEY (`attendanceID`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`syllabusID`);

--
-- Indexes for table `systemadmin`
--
ALTER TABLE `systemadmin`
  ADD PRIMARY KEY (`systemadminID`);

--
-- Indexes for table `tattendance`
--
ALTER TABLE `tattendance`
  ADD PRIMARY KEY (`tattendanceID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherID`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`themesID`);

--
-- Indexes for table `tmember`
--
ALTER TABLE `tmember`
  ADD PRIMARY KEY (`tmemberID`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`transportID`);

--
-- Indexes for table `uattendance`
--
ALTER TABLE `uattendance`
  ADD PRIMARY KEY (`uattendanceID`);

--
-- Indexes for table `update`
--
ALTER TABLE `update`
  ADD PRIMARY KEY (`updateID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`usertypeID`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendorID`);

--
-- Indexes for table `visitorinfo`
--
ALTER TABLE `visitorinfo`
  ADD PRIMARY KEY (`visitorID`);

--
-- Indexes for table `weaverandfine`
--
ALTER TABLE `weaverandfine`
  ADD PRIMARY KEY (`weaverandfineID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activitiesID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activitiescategory`
--
ALTER TABLE `activitiescategory`
  MODIFY `activitiescategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `activitiescomment`
--
ALTER TABLE `activitiescomment`
  MODIFY `activitiescommentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activitiesmedia`
--
ALTER TABLE `activitiesmedia`
  MODIFY `activitiesmediaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activitiesstudent`
--
ALTER TABLE `activitiesstudent`
  MODIFY `activitiesstudentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alert`
--
ALTER TABLE `alert`
  MODIFY `alertID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asset`
--
ALTER TABLE `asset`
  MODIFY `assetID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asset_assignment`
--
ALTER TABLE `asset_assignment`
  MODIFY `asset_assignmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asset_category`
--
ALTER TABLE `asset_category`
  MODIFY `asset_categoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignmentanswer`
--
ALTER TABLE `assignmentanswer`
  MODIFY `assignmentanswerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendanceID` int(200) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `automation_rec`
--
ALTER TABLE `automation_rec`
  MODIFY `automation_recID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `automation_shudulu`
--
ALTER TABLE `automation_shudulu`
  MODIFY `automation_shuduluID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoryus`
--
ALTER TABLE `categoryus`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `certificate_template`
--
ALTER TABLE `certificate_template`
  MODIFY `certificate_templateID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `childcare`
--
ALTER TABLE `childcare`
  MODIFY `childcareID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `classesID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `complainID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conversation_message_info`
--
ALTER TABLE `conversation_message_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conversation_msg`
--
ALTER TABLE `conversation_msg`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `documentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eattendance`
--
ALTER TABLE `eattendance`
  MODIFY `eattendanceID` int(200) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ebooks`
--
ALTER TABLE `ebooks`
  MODIFY `ebooksID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventcounter`
--
ALTER TABLE `eventcounter`
  MODIFY `eventcounterID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `examID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examschedule`
--
ALTER TABLE `examschedule`
  MODIFY `examscheduleID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expenseID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feetypes`
--
ALTER TABLE `feetypes`
  MODIFY `feetypesID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `fmenu`
--
ALTER TABLE `fmenu`
  MODIFY `fmenuID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fmenu_relation`
--
ALTER TABLE `fmenu_relation`
  MODIFY `fmenu_relationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frontend_template`
--
ALTER TABLE `frontend_template`
  MODIFY `frontend_templateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `globalpayment`
--
ALTER TABLE `globalpayment`
  MODIFY `globalpaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `gradeID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hmember`
--
ALTER TABLE `hmember`
  MODIFY `hmemberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `holidayID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostel`
--
ALTER TABLE `hostel`
  MODIFY `hostelID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hourly_template`
--
ALTER TABLE `hourly_template`
  MODIFY `hourly_templateID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `idmanager`
--
ALTER TABLE `idmanager`
  MODIFY `idmanagerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `incomeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ini_config`
--
ALTER TABLE `ini_config`
  MODIFY `configID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `instruction`
--
ALTER TABLE `instruction`
  MODIFY `instructionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `issueID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaveapplications`
--
ALTER TABLE `leaveapplications`
  MODIFY `leaveapplicationID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leaveassign`
--
ALTER TABLE `leaveassign`
  MODIFY `leaveassignID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leavecategory`
--
ALTER TABLE `leavecategory`
  MODIFY `leavecategoryID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lmember`
--
ALTER TABLE `lmember`
  MODIFY `lmemberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locationID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loginlog`
--
ALTER TABLE `loginlog`
  MODIFY `loginlogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `mailandsms`
--
ALTER TABLE `mailandsms`
  MODIFY `mailandsmsID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mailandsmstemplate`
--
ALTER TABLE `mailandsmstemplate`
  MODIFY `mailandsmstemplateID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mailandsmstemplatetag`
--
ALTER TABLE `mailandsmstemplatetag`
  MODIFY `mailandsmstemplatetagID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `maininvoice`
--
ALTER TABLE `maininvoice`
  MODIFY `maininvoiceID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `make_payment`
--
ALTER TABLE `make_payment`
  MODIFY `make_paymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manage_salary`
--
ALTER TABLE `manage_salary`
  MODIFY `manage_salaryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `markID` int(200) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `markpercentage`
--
ALTER TABLE `markpercentage`
  MODIFY `markpercentageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `markrelation`
--
ALTER TABLE `markrelation`
  MODIFY `markrelationID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `mediaID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media_category`
--
ALTER TABLE `media_category`
  MODIFY `mcategoryID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media_gallery`
--
ALTER TABLE `media_gallery`
  MODIFY `media_galleryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media_share`
--
ALTER TABLE `media_share`
  MODIFY `shareID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `noticeID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `onlineadmission`
--
ALTER TABLE `onlineadmission`
  MODIFY `onlineadmissionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_exam`
--
ALTER TABLE `online_exam`
  MODIFY `onlineExamID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_exam_question`
--
ALTER TABLE `online_exam_question`
  MODIFY `onlineExamQuestionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_exam_type`
--
ALTER TABLE `online_exam_type`
  MODIFY `onlineExamTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `online_exam_user_answer`
--
ALTER TABLE `online_exam_user_answer`
  MODIFY `onlineExamUserAnswerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_exam_user_answer_option`
--
ALTER TABLE `online_exam_user_answer_option`
  MODIFY `onlineExamUserAnswerOptionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_exam_user_status`
--
ALTER TABLE `online_exam_user_status`
  MODIFY `onlineExamUserStatus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pagesID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `parentsID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permissionID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=886;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postsID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts_categories`
--
ALTER TABLE `posts_categories`
  MODIFY `posts_categoriesID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts_category`
--
ALTER TABLE `posts_category`
  MODIFY `posts_categoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preadmission`
--
ALTER TABLE `preadmission`
  MODIFY `preadmissionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `productcategoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productpurchase`
--
ALTER TABLE `productpurchase`
  MODIFY `productpurchaseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productpurchaseitem`
--
ALTER TABLE `productpurchaseitem`
  MODIFY `productpurchaseitemID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productpurchasepaid`
--
ALTER TABLE `productpurchasepaid`
  MODIFY `productpurchasepaidID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productsale`
--
ALTER TABLE `productsale`
  MODIFY `productsaleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productsaleitem`
--
ALTER TABLE `productsaleitem`
  MODIFY `productsaleitemID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productsalepaid`
--
ALTER TABLE `productsalepaid`
  MODIFY `productsalepaidID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productsupplier`
--
ALTER TABLE `productsupplier`
  MODIFY `productsupplierID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productwarehouse`
--
ALTER TABLE `productwarehouse`
  MODIFY `productwarehouseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotionlog`
--
ALTER TABLE `promotionlog`
  MODIFY `promotionLogID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_answer`
--
ALTER TABLE `question_answer`
  MODIFY `answerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_bank`
--
ALTER TABLE `question_bank`
  MODIFY `questionBankID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_group`
--
ALTER TABLE `question_group`
  MODIFY `questionGroupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `question_level`
--
ALTER TABLE `question_level`
  MODIFY `questionLevelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question_option`
--
ALTER TABLE `question_option`
  MODIFY `optionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_type`
--
ALTER TABLE `question_type`
  MODIFY `questionTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reset`
--
ALTER TABLE `reset`
  MODIFY `resetID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `routineID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `salary_option`
--
ALTER TABLE `salary_option`
  MODIFY `salary_optionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `salary_template`
--
ALTER TABLE `salary_template`
  MODIFY `salary_templateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `schoolyear`
--
ALTER TABLE `schoolyear`
  MODIFY `schoolyearID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sectionID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
  MODIFY `shift_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `sliderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smssettings`
--
ALTER TABLE `smssettings`
  MODIFY `smssettingsID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sociallink`
--
ALTER TABLE `sociallink`
  MODIFY `sociallinkID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `studentextend`
--
ALTER TABLE `studentextend`
  MODIFY `studentextendID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `studentgroup`
--
ALTER TABLE `studentgroup`
  MODIFY `studentgroupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `studentrelation`
--
ALTER TABLE `studentrelation`
  MODIFY `studentrelationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subjectID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjectteacher`
--
ALTER TABLE `subjectteacher`
  MODIFY `subjectteacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_attendance`
--
ALTER TABLE `sub_attendance`
  MODIFY `attendanceID` int(200) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `syllabusID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `systemadmin`
--
ALTER TABLE `systemadmin`
  MODIFY `systemadminID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tattendance`
--
ALTER TABLE `tattendance`
  MODIFY `tattendanceID` int(200) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacherID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `themesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tmember`
--
ALTER TABLE `tmember`
  MODIFY `tmemberID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `transportID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uattendance`
--
ALTER TABLE `uattendance`
  MODIFY `uattendanceID` int(200) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `update`
--
ALTER TABLE `update`
  MODIFY `updateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `usertypeID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendorID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitorinfo`
--
ALTER TABLE `visitorinfo`
  MODIFY `visitorID` bigint(12) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `weaverandfine`
--
ALTER TABLE `weaverandfine`
  MODIFY `weaverandfineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
