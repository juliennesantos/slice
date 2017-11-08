-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2017 at 06:18 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slicedbq`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `logID` int(11) NOT NULL,
  `tutorID` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `schoolYr` varchar(10) NOT NULL,
  `timeIn` datetime NOT NULL,
  `timeOut` datetime DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auditlogs`
--

CREATE TABLE `auditlogs` (
  `auditID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `logType` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `timeStamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `facultyID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `facultyNo` varchar(11) NOT NULL,
  `programID` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `dateModified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`facultyID`, `userID`, `facultyNo`, `programID`, `status`, `dateAdded`, `dateModified`) VALUES
(1, 36, '20763829', 1, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(2, 37, '20677261', 2, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(3, 38, '20199283', 3, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(4, 39, '20987898', 4, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(5, 40, '20600192', 5, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(6, 41, '20788293', 1, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(7, 42, '20091827', 2, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(8, 43, '21388726', 3, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(9, 44, '20988817', 4, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(10, 45, '20788766', 5, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedbackID` int(11) NOT NULL,
  `tutorialNo` int(11) NOT NULL,
  `feedback` varchar(1000) NOT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `programcourses`
--

CREATE TABLE `programcourses` (
  `refNo` int(11) NOT NULL,
  `programID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `programcourses`
--

INSERT INTO `programcourses` (`refNo`, `programID`, `subjectID`) VALUES
(1, 1, 16),
(2, 2, 25),
(3, 3, 17),
(4, 4, 18),
(5, 5, 19),
(6, 6, 20),
(7, 7, 21),
(8, 8, 22),
(9, 9, 23),
(10, 10, 24);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `programID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `programCode` varchar(10) NOT NULL,
  `schoolID` int(5) NOT NULL,
  `dateModified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`programID`, `name`, `programCode`, `schoolID`, `dateModified`) VALUES
(1, 'Bachelor of Science in Information System', 'BS-IS', 2, '2017-09-27 00:00:00'),
(3, 'Bachelor of Science in Business Administration major in Export Management', 'BSBA-EM', 2, '2017-09-27 00:00:00'),
(4, 'Bachelor of Science in Business Administration major in Human Resource Management', 'BSBA-HRM', 2, '2017-09-27 00:00:00'),
(5, 'Bachelor of Science in Interactive Entertainment and Multimedia Computing ', 'BSBA-CA', 2, '2017-09-27 00:00:00'),
(6, 'Bachelor of Science in Information Technology with specialization in Game Design and Development', 'BSIEMC', 2, '2017-09-27 00:00:00'),
(7, 'Bachelor of Arts in Fashion Design and Merchandising', 'AB-FDM', 4, '2017-10-08 00:00:00'),
(8, 'Bachelor in Applied Deaf Studies', 'BAPDST', 1, '2017-10-08 00:00:00'),
(9, 'Bachelor of Arts major in Consular and Diplomatic Affairs', 'AB-CDA', 3, '2017-10-08 00:00:00'),
(10, 'Bachelor of Science in International Hospitality Management', 'BS-IHM', 5, '2017-10-08 00:00:00'),
(2, 'Bachelor of Arts in Multimedia Arts', 'ABMMA', 4, '2017-10-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `schoolID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `schoolCode` varchar(10) NOT NULL,
  `dateModified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`schoolID`, `name`, `schoolCode`, `dateModified`) VALUES
(1, 'School of Deaf Education and Applied Studies', 'SDEAS', '2017-10-09 00:00:00'),
(2, 'School of Management and Information Technology', 'SMIT', '2017-10-09 00:00:00'),
(3, 'School of Diplomacy and Governance', 'SDG', '2017-10-09 00:00:00'),
(4, 'School of Design and Arts', 'SDA', '2017-10-09 00:00:00'),
(5, 'School of Hotel, Restaurant and Institution Management', 'SHRIM', '2017-10-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `studentNo` varchar(8) NOT NULL,
  `programID` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `dateModified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `userID`, `studentNo`, `programID`, `status`, `dateAdded`, `dateModified`) VALUES
(1, 1, '11439757', 1, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(2, 2, '11410000', 2, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(3, 3, '11410001', 3, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(4, 4, '11410002', 4, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(5, 5, '11410003', 5, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(6, 31, '11677289', 1, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(7, 32, '11682798', 2, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(8, 33, '11726397', 3, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(9, 34, '11477283', 4, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(10, 35, '11500986', 5, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(11, 6, '11410004', 1, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(12, 7, '11410005', 2, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(13, 8, '11410006', 3, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(14, 9, '11410007', 4, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(15, 10, '11410008', 5, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(16, 26, '11400552', 1, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(17, 27, '11500009', 2, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(18, 28, '11499944', 3, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(19, 29, '11388299', 4, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(20, 30, '11599805', 5, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subjectID` int(11) NOT NULL,
  `subjectCode` varchar(7) NOT NULL,
  `name` varchar(80) NOT NULL,
  `dateModified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjectID`, `subjectCode`, `name`, `dateModified`) VALUES
(1, 'JOSERIZ', '', '2017-09-27 00:00:00'),
(2, 'NATSC11', '', '2017-09-27 00:00:00'),
(3, 'ALGEB-X', '', '2017-09-27 00:00:00'),
(4, 'CORWRIT', '', '2017-09-27 00:00:00'),
(5, 'BIBSTUD', '', '2017-09-27 00:00:00'),
(6, 'CSBLIFE', '', '2017-09-27 00:00:00'),
(7, 'ECONOMY', '', '2017-09-27 00:00:00'),
(8, 'NATSC13', '', '2017-09-27 00:00:00'),
(9, 'TRIGONO', '', '2017-09-27 00:00:00'),
(10, 'TECWRIT', '', '2017-09-27 00:00:00'),
(11, 'DYNAREL', '', '2017-09-27 00:00:00'),
(12, 'BMAT-X', '', '2017-09-27 00:00:00'),
(13, 'ORALCOM', '', '2017-09-27 00:00:00'),
(14, 'RECONSE', '', '2017-09-27 00:00:00'),
(15, 'CATHWOR', '', '2017-09-27 00:00:00'),
(16, 'ISPROG1', 'Basic C# Programming 1', '2017-10-09 00:00:00'),
(17, 'ENTREM1', 'Entrepreneurial Management 1', '2017-10-09 00:00:00'),
(18, 'EVNTMGT', 'Event Management', '2017-10-09 00:00:00'),
(19, 'CAPRACT', 'Computer Applications Practicum', '2017-10-09 00:00:00'),
(20, 'GAMTHEO', 'Game Theory', '2017-10-09 00:00:00'),
(21, 'FSTUDI1', 'Fashion Studies 1', '2017-10-09 00:00:00'),
(22, 'SPECOMM', 'Special Communications', '2017-10-09 00:00:00'),
(23, 'FRENCH1', 'Basic French 1', '2017-10-09 00:00:00'),
(24, 'HMSALES', 'Hotel Management Sales', '2017-10-09 00:00:00'),
(25, '2DANIM1', '2D Animation 1', '2017-10-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `timeblocks`
--

CREATE TABLE `timeblocks` (
  `timeblockID` int(5) NOT NULL,
  `timeStart` time NOT NULL,
  `timeEnd` time NOT NULL,
  `status` varchar(25) NOT NULL,
  `dateModified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timeblocks`
--

INSERT INTO `timeblocks` (`timeblockID`, `timeStart`, `timeEnd`, `status`, `dateModified`) VALUES
(1, '08:00:00', '09:00:00', 'Approved', NULL),
(2, '09:30:00', '10:30:00', 'Approved', NULL),
(3, '10:00:00', '11:00:00', 'Approved', NULL),
(4, '10:30:00', '11:30:00', 'Approved', NULL),
(5, '11:00:00', '12:00:00', 'Approved', NULL),
(6, '13:00:00', '14:00:00', 'Approved', '2017-10-09 00:00:00'),
(7, '13:30:00', '14:30:00', 'Approved', '2017-10-09 00:00:00'),
(8, '14:00:00', '15:00:00', 'Approved', '2017-10-09 00:00:00'),
(9, '14:30:00', '15:30:00', 'Approved', '2017-10-09 00:00:00'),
(10, '15:00:00', '16:00:00', 'Approved', '2017-10-09 00:00:00'),
(11, '15:30:00', '16:30:00', 'Approved', '2017-10-09 00:00:00'),
(12, '16:00:00', '17:00:00', 'Approved', '2017-10-09 00:00:00'),
(13, '16:30:00', '17:30:00', 'Approved', '2017-10-09 00:00:00'),
(14, '17:00:00', '18:00:00', 'Approved', '2017-10-09 00:00:00'),
(15, '17:30:00', '18:30:00', 'Approved', '2017-10-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tutees`
--

CREATE TABLE `tutees` (
  `tuteeID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `dateModified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutees`
--

INSERT INTO `tutees` (`tuteeID`, `StudentID`, `status`, `dateAdded`, `dateModified`) VALUES
(1, 11439757, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(2, 11410000, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(3, 11410001, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(4, 11410002, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(5, 11410003, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(31, 11677289, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(32, 11682798, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(33, 11726397, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(34, 11477283, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(35, 11500986, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tutorexpertise`
--

CREATE TABLE `tutorexpertise` (
  `expertiseID` int(11) NOT NULL,
  `tutorID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `dateModified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutorexpertise`
--

INSERT INTO `tutorexpertise` (`expertiseID`, `tutorID`, `subjectID`, `dateModified`) VALUES
(1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tutorialchecklists`
--

CREATE TABLE `tutorialchecklists` (
  `checklistID` int(11) NOT NULL,
  `tutorialNo` int(11) NOT NULL,
  `subjectArea` varchar(200) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `dateModified` datetime DEFAULT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutorialchecklists`
--

INSERT INTO `tutorialchecklists` (`checklistID`, `tutorialNo`, `subjectArea`, `comment`, `dateAdded`, `dateModified`, `status`) VALUES
(1, 1, 'JOSERIZ', 'Help Rizal Stuff', '2017-10-09 00:00:00', NULL, 'Active'),
(2, 2, 'NATSC11', 'Help Science', '2017-10-09 00:00:00', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tutorialsessions`
--

CREATE TABLE `tutorialsessions` (
  `tutorialNo` int(11) NOT NULL,
  `tuteeID` int(11) DEFAULT NULL,
  `tutorID` int(11) DEFAULT NULL,
  `previousTutorID` int(11) DEFAULT NULL,
  `subjectID` int(11) NOT NULL,
  `tutorschedrequestedID` int(11) NOT NULL,
  `dateTimeRequested` datetime NOT NULL,
  `dateTimeStarted` datetime DEFAULT NULL,
  `dateTimeEnded` datetime DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `dateAdded` datetime NOT NULL,
  `dateModified` datetime DEFAULT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutorialsessions`
--

INSERT INTO `tutorialsessions` (`tutorialNo`, `tuteeID`, `tutorID`, `previousTutorID`, `subjectID`, `tutorschedrequestedID`, `dateTimeRequested`, `dateTimeStarted`, `dateTimeEnded`, `remarks`, `dateAdded`, `dateModified`, `status`) VALUES
(1, 1, 1, 10, 1, 1, '2017-10-07 14:22:28', '2017-10-09 08:00:00', '2017-10-09 09:00:00', 'Give out more questions', '2017-10-07 00:00:00', '2017-10-07 00:00:00', 'Active'),
(2, 2, 2, 9, 2, 2, '2017-10-05 00:00:00', '2017-10-10 09:30:00', '2017-10-11 10:30:00', 'Remember to study NATSC11 curriculum', '2017-10-07 00:00:00', '2017-10-07 00:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `tutorID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `tutorType` varchar(80) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `dateModified` datetime DEFAULT NULL,
  `statusID` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`tutorID`, `userID`, `tutorType`, `dateAdded`, `dateModified`, `statusID`) VALUES
(1, 6, 'volunteer', '0000-00-00 00:00:00', NULL, 1),
(2, 7, 'volunteer', '0000-00-00 00:00:00', NULL, 1),
(3, 8, 'volunteer', '0000-00-00 00:00:00', NULL, 1),
(4, 9, 'volunteer', '0000-00-00 00:00:00', NULL, 1),
(5, 10, 'volunteer', '0000-00-00 00:00:00', NULL, 1),
(6, 26, 'scholar', '0000-00-00 00:00:00', NULL, 1),
(7, 27, 'scholar', '0000-00-00 00:00:00', NULL, 1),
(8, 28, 'scholar', '0000-00-00 00:00:00', NULL, 1),
(9, 29, 'scholar', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 1),
(10, 30, 'scholar', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tutorschedules`
--

CREATE TABLE `tutorschedules` (
  `tutorScheduleID` int(11) NOT NULL,
  `tutorID` int(11) NOT NULL,
  `dayofweek` varchar(10) NOT NULL,
  `timeblockID` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `schoolYear` year(4) NOT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutorschedules`
--

INSERT INTO `tutorschedules` (`tutorScheduleID`, `tutorID`, `dayofweek`, `timeblockID`, `term`, `schoolYear`, `dateAdded`) VALUES
(1, 1, 'Monday', 1, 1, 2017, '2017-10-04 12:03:21'),
(2, 2, 'Tuesday', 2, 1, 2017, '0000-00-00 00:00:00'),
(3, 3, 'Wednesday', 3, 1, 2017, '0000-00-00 00:00:00'),
(4, 4, 'Thursday', 4, 1, 2017, '0000-00-00 00:00:00'),
(5, 5, 'Friday', 5, 1, 2017, '0000-00-00 00:00:00'),
(6, 6, 'Monday', 6, 1, 2017, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tutorstatus`
--

CREATE TABLE `tutorstatus` (
  `statusID` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutorstatus`
--

INSERT INTO `tutorstatus` (`statusID`, `status`) VALUES
(1, 'Active'),
(2, 'Inactive'),
(3, 'Graduating'),
(4, 'OJT');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `typeID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstName` varchar(80) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `emailAddress` varchar(100) NOT NULL,
  `contactNo` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `dateModified` datetime DEFAULT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `typeID`, `username`, `firstName`, `lastName`, `middleName`, `emailAddress`, `contactNo`, `password`, `dateAdded`, `dateModified`, `status`) VALUES
(5, 1, '11410003', 'Jeremy', 'Sargent', 'Livingston', 'ipsum.primis@dictum.co.uk', '09457353365', 'test', '2016-10-28 23:15:53', '2017-05-24 21:52:16', 'Approved'),
(4, 1, '11410002', 'Fitzgerald', 'Richardson', 'Compton', 'amet.ultricies@magnaPraesentinterdum.org', '09674170097', 'test', '2017-08-03 02:16:09', '2018-08-24 08:19:02', 'Approved'),
(3, 1, '11410001', 'Malcolm', 'Duffy', 'Dillon', 'luctus.vulputate@consequatenimdiam.ca', '09232885918', 'test', '2018-08-17 06:04:03', '2017-03-07 19:10:50', 'Approved'),
(2, 1, '11410000', 'Pandora', 'Mcbride', 'Sandoval', 'eget.metus.eu@semut.edu', '09360800576', 'test', '2016-10-06 05:13:43', '2017-02-06 04:27:33', 'Approved'),
(1, 1, '11439757', 'Julie', 'Santos', 'Juangco', 'ju@benilde.edu.ph', '09178451486', '$2y$10$xINqyw0rYnR7jtGcHsKIL.WC0l04Zulm9g5vGC8wV9rw8VvzP0pF6', '2017-09-30 07:47:46', '2017-09-30 07:47:46', 'Active'),
(6, 2, '11410004', 'Lisandra', 'Salazar', 'Wade', 'turpis.egestas@tortor.net', '09415795642', 'test', '2018-10-31 08:19:17', '2017-06-04 03:40:35', 'Approved'),
(7, 2, '11410005', 'Nola', 'Key', 'Burns', 'Sed@aultricies.org', '09138532961', 'test', '2018-10-28 06:36:53', '2017-06-21 19:53:20', 'Approved'),
(8, 2, '11410006', 'Graiden', 'Keller', 'Key', 'cursus.et@sed.net', '09895406903', 'test', '2017-07-03 02:53:54', '2018-06-24 18:57:17', 'Approved'),
(9, 2, '11410007', 'Francesca', 'Bennett', 'Gamble', 'volutpat@Integermollis.com', '09855692855', 'test', '2018-09-30 17:57:26', '2017-07-15 10:39:41', 'Approved'),
(10, 2, '11410008', 'Michael', 'Pacheco', 'Love', 'dictum.sapien.Aenean@estarcuac.ca', '09501573261', 'test', '2018-02-02 11:28:27', '2018-08-31 05:40:02', 'Approved'),
(11, 3, '11410009', 'Samuel', 'Trevino', 'Gill', 'ipsum.nunc.id@malesuada.com', '09933467224', 'test', '2018-04-01 01:13:34', '2016-10-25 21:03:36', 'Approved'),
(12, 3, '11427937', 'Elaina', 'Cruz', 'Dimaunahan', 'Elaina.cruz@gmail.com', '09150000001', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(13, 3, '11494827', 'Angela', 'Elejido', 'Cruz', 'angela.elejido@gmail.com', '09167283910', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(14, 3, '11494293', 'Thirdy', 'Cruz', 'Hasan', 'thirdy.cruz@gmail.com', '09278389946', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(15, 4, '11488977', 'Juan', 'Ravago', 'Angeles', 'juan.ravago@gmail.com', '09186253392', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(16, 4, '11300628', 'Katrina', 'Galang', 'Sy', 'kat.galang@gmail.com', '09196628304', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(17, 4, '11599283', 'Vincent', 'Buendia', 'Abad', 'vince.buendia@gmail.com', '09287294462', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(18, 4, '11522001', 'Dave', 'Cheever', 'Truman', 'dave.cheever@gmail.com', '09178829938', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(19, 4, '11238291', 'Alleane', 'Co', 'Ty', 'alleane.co@gmail.com', '09177777777', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(20, 4, '11300271', 'Angelica', 'Tuazon', 'Zuno', 'angelica.tuazon@gmail.com', '09182099317', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(21, 5, '21400001', 'Mae', 'Garcia', 'Jusaya', 'mae.garcia@gmail.com', '09178293472', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(22, 5, '21392078', 'Edward', 'Cabanatan', 'Igop', 'edward.cabanatan@gmail.com', '09170009955', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(23, 5, '21582906', 'Nikaela', 'Ang', 'So', 'nikaela.ang@gmail.com', '09152222213', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(24, 5, '21899075', 'Andrea', 'Martinez', 'Pomada', 'andie.martinez@gmail.com', '09180009273', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(25, 5, '21677192', 'Angela', 'Lim', 'Valle', 'angela.lim@gmail.com', '09269918726', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(26, 2, '11400552', 'Maria', 'Ang', 'Fernandez', 'maria.ang@gmail.com', '09178829909', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(27, 2, '11500009', 'Nicole', 'Yap', 'Uy', 'nicole.yap@gmail.com', '09177726188', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(28, 2, '11499944', 'Coleen', 'Bartido', 'Gomez', 'coleen.bartido@gmail.com', '09227718829', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(29, 2, '11388299', 'Cheska', 'Cruz', 'Cheesman', 'cheska.cruz@gmail.com', '09187778898', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(30, 2, '11599805', 'Jace', 'Villanueva', 'Agustin', 'jace.villanueva@gmail.com', '09188888876', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(31, 1, '11677289', 'Marissa', 'Castro', 'De Guzman', 'marissa.castro@gmail.com', '09184444425', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(32, 1, '11682798', 'Vincent', 'Villa', 'Borgis', 'vince.villa@gmail.com', '09188266635', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(33, 1, '11726397', 'Diane', 'Litan', 'Letran', 'diane.litan@gmail.com', '09182625341', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(34, 1, '11477283', 'Willie', 'Revillame', 'Lodi', 'willie.revillame@gmail.com', '09178827365', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(35, 1, '11500986', 'Bianca', 'Azurin', 'Lim', 'bianca.azurin@gmail.com', '09141111182', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(36, 1, '20763829', 'Isabelle', 'Castell', 'Flores', 'isabelle.castell@gmail.com', '09158882738', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(37, 1, '20677261', 'Jomar', 'Azivedo', 'Sta. Cruz', 'jomar.azivedo@gmail.com', '09172534162', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(38, 1, '20199283', 'Louise', 'Custodio', 'Tan', 'louise.custodio@gmail.com', '091988273', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(39, 1, '20987898', 'Abram', 'Limpin', 'Hosea', 'abram.limpin@gmail.com', '0906009876', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(40, 1, '20600192', 'Henry', 'Castro', 'De Villa', 'henry.castro@gmail.com', '09098827738', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(41, 1, '20788293', 'Esther', 'Tuazon', 'Dorado', 'esther.tuazon@gmail.com', '09082283728', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(42, 1, '20091827', 'Andrea', 'Juridico', 'Locsin', 'andrea.juridico@gmail.com', '09087726371', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(43, 1, '21388726', 'Kristine', 'Limco', 'Tan', 'kristine.limco@gmail.com', '09067728391', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'test'),
(44, 1, '20988817', 'Juan', 'Barcelon', 'Bandonillo', 'juan.barcelon@gmail.com', '09056627389', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active'),
(45, 1, '20788766', 'Paolo', 'Ortiz', 'Escudero', 'paolo.ortiz@gmail.com', '09098829938', 'test', '2017-10-09 00:00:00', '2017-10-09 00:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `typeID` int(11) NOT NULL,
  `userType` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`typeID`, `userType`) VALUES
(5, 'SLU Coordinator'),
(3, 'Student Assistant'),
(2, 'Tutor'),
(1, 'Tutee'),
(4, 'SGO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`logID`);

--
-- Indexes for table `auditlogs`
--
ALTER TABLE `auditlogs`
  ADD PRIMARY KEY (`auditID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`facultyID`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedbackID`);

--
-- Indexes for table `programcourses`
--
ALTER TABLE `programcourses`
  ADD PRIMARY KEY (`refNo`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`programID`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`schoolID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjectID`);

--
-- Indexes for table `timeblocks`
--
ALTER TABLE `timeblocks`
  ADD PRIMARY KEY (`timeblockID`);

--
-- Indexes for table `tutees`
--
ALTER TABLE `tutees`
  ADD PRIMARY KEY (`tuteeID`);

--
-- Indexes for table `tutorexpertise`
--
ALTER TABLE `tutorexpertise`
  ADD PRIMARY KEY (`expertiseID`);

--
-- Indexes for table `tutorialchecklists`
--
ALTER TABLE `tutorialchecklists`
  ADD PRIMARY KEY (`checklistID`);

--
-- Indexes for table `tutorialsessions`
--
ALTER TABLE `tutorialsessions`
  ADD PRIMARY KEY (`tutorialNo`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`tutorID`);

--
-- Indexes for table `tutorschedules`
--
ALTER TABLE `tutorschedules`
  ADD PRIMARY KEY (`tutorScheduleID`);

--
-- Indexes for table `tutorstatus`
--
ALTER TABLE `tutorstatus`
  ADD PRIMARY KEY (`statusID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`typeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `logID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `auditlogs`
--
ALTER TABLE `auditlogs`
  MODIFY `auditID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `facultyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `programcourses`
--
ALTER TABLE `programcourses`
  MODIFY `refNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `programID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `schoolID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `timeblocks`
--
ALTER TABLE `timeblocks`
  MODIFY `timeblockID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tutees`
--
ALTER TABLE `tutees`
  MODIFY `tuteeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tutorexpertise`
--
ALTER TABLE `tutorexpertise`
  MODIFY `expertiseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tutorialchecklists`
--
ALTER TABLE `tutorialchecklists`
  MODIFY `checklistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tutorialsessions`
--
ALTER TABLE `tutorialsessions`
  MODIFY `tutorialNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `tutorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tutorschedules`
--
ALTER TABLE `tutorschedules`
  MODIFY `tutorScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tutorstatus`
--
ALTER TABLE `tutorstatus`
  MODIFY `statusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11323069;
--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
