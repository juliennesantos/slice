-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2017 at 08:21 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slice`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `logID` int(11) NOT NULL,
  `tutorID` int(11) DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `schoolYr` year(4) DEFAULT NULL,
  `timeIn` datetime DEFAULT NULL,
  `timeOut` datetime DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auditlogs`
--

CREATE TABLE `auditlogs` (
  `auditID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `logType` varchar(80) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `timeStamp` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseID` int(11) NOT NULL,
  `courseCode` varchar(7) DEFAULT NULL,
  `name` varchar(80) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `dateModified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `courseCode`, `name`, `description`, `dateModified`) VALUES
(1, 'JOSERIZ', NULL, NULL, '2017-09-27 00:00:00'),
(2, 'NATSC11', NULL, NULL, '2017-09-27 00:00:00'),
(3, 'ALGEB-X', NULL, NULL, '2017-09-27 00:00:00'),
(4, 'CORWRIT', NULL, NULL, '2017-09-27 00:00:00'),
(5, 'BIBSTUD', NULL, NULL, '2017-09-27 00:00:00'),
(6, 'CSBLIFE', NULL, NULL, '2017-09-27 00:00:00'),
(7, 'ECONOMY', NULL, NULL, '2017-09-27 00:00:00'),
(8, 'NATSC13', NULL, NULL, '2017-09-27 00:00:00'),
(9, 'TRIGONO', NULL, NULL, '2017-09-27 00:00:00'),
(10, 'TECWRIT', NULL, NULL, '2017-09-27 00:00:00'),
(11, 'DYNAREL', NULL, NULL, '2017-09-27 00:00:00'),
(12, 'BMAT-X', NULL, NULL, '2017-09-27 00:00:00'),
(13, 'ORALCOM', NULL, NULL, '2017-09-27 00:00:00'),
(14, 'RECONSE', NULL, NULL, '2017-09-27 00:00:00'),
(15, 'CATHWOR', NULL, NULL, '2017-09-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `degreeprograms`
--

CREATE TABLE `degreeprograms` (
  `programID` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `programCode` varchar(10) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `dateModified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `degreeprograms`
--

INSERT INTO `degreeprograms` (`programID`, `name`, `programCode`, `description`, `dateModified`) VALUES
(1, 'Bachelor of Science in Information System', 'BS-IS', 'Information System ', '2017-09-27 00:00:00'),
(3, 'Bachelor of Science in Business Administration major in Export Management', 'BSBA - EM', 'Studies Export management', '2017-09-27 00:00:00'),
(4, 'Bachelor of Science in Business Administration major in Human Resource Management', 'BSBA - HRM', 'Studies Human resources management', '2017-09-27 00:00:00'),
(5, 'Bachelor of Science in Business Administration major in Computer Application', 'BSBA - CA', NULL, '2017-09-27 00:00:00'),
(6, 'Bachelor of Science in Information Technology with specialization in Game Design and Development', 'BSIT - GDD', NULL, '2017-09-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `facultyID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `userName` varchar(80) DEFAULT NULL,
  `facultyNo` varchar(11) DEFAULT NULL,
  `programID` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `dateAdded` datetime DEFAULT NULL,
  `dateModified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedbackID` int(11) NOT NULL,
  `tutorID` int(11) DEFAULT NULL,
  `tutorialNo` int(11) DEFAULT NULL,
  `feedback` varchar(1000) DEFAULT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `programcourses`
--

CREATE TABLE `programcourses` (
  `refNo` int(11) NOT NULL,
  `programID` int(11) DEFAULT NULL,
  `courseID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `scheduleID` int(11) NOT NULL,
  `day` varchar(9) DEFAULT NULL,
  `timeStart` time DEFAULT NULL,
  `timeEnd` time DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `dateModified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`scheduleID`, `day`, `timeStart`, `timeEnd`, `status`, `dateModified`) VALUES
(1, 'Monday', '08:00:00', '09:00:00', NULL, '0000-00-00 00:00:00'),
(2, 'Monday', '09:00:00', '10:00:00', NULL, '0000-00-00 00:00:00'),
(3, 'Tuesday', '08:00:00', '09:00:00', NULL, '0000-00-00 00:00:00'),
(4, 'Tuesday', '09:00:00', '10:00:00', NULL, '0000-00-00 00:00:00'),
(5, 'Wednesday', '13:00:00', '14:00:00', NULL, '0000-00-00 00:00:00'),
(6, 'Wednesday', '14:00:00', '15:00:00', NULL, '0000-00-00 00:00:00'),
(7, 'Thursday', '13:00:00', '14:00:00', NULL, '0000-00-00 00:00:00'),
(8, 'Thursday', '13:00:00', '14:00:00', NULL, '0000-00-00 00:00:00'),
(9, 'Friday', '11:00:00', '12:00:00', NULL, '0000-00-00 00:00:00'),
(10, 'Friday', '13:00:00', '14:00:00', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `schoolID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `schoolCode` varchar(10) NOT NULL,
  `dateModified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `studentNo` varchar(8) DEFAULT NULL,
  `programID` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `dateAdded` datetime DEFAULT NULL,
  `dateModified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tutees`
--

CREATE TABLE `tutees` (
  `tuteeID` int(11) NOT NULL,
  `StudentID` int(11) DEFAULT NULL,
  `tutorialNo` int(11) DEFAULT NULL,
  `status` varchar(25) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `dateModified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tutorexpertise`
--

CREATE TABLE `tutorexpertise` (
  `expertiseID` int(11) NOT NULL,
  `tutorID` int(11) DEFAULT NULL,
  `courseID` int(11) DEFAULT NULL,
  `dateModified` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tutorialchecklist`
--

CREATE TABLE `tutorialchecklist` (
  `checklistID` int(11) NOT NULL,
  `tutorialNo` int(11) NOT NULL,
  `subjectArea` varchar(200) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `dateModified` datetime NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tutorialsession`
--

CREATE TABLE `tutorialsession` (
  `tutorialNo` int(11) NOT NULL,
  `tutorID` int(11) DEFAULT NULL,
  `courseID` int(11) DEFAULT NULL,
  `dateTimeApproved` datetime DEFAULT NULL,
  `dateTimeStarted` datetime DEFAULT NULL,
  `dateTimeEnded` datetime DEFAULT NULL,
  `remarks` varchar(200) DEFAULT NULL,
  `dateAdded` datetime NOT NULL,
  `dateModified` datetime NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `tutorID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `tutorType` varchar(80) DEFAULT NULL,
  `dateAdded` datetime DEFAULT NULL,
  `dateModified` datetime DEFAULT NULL,
  `statusID` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`tutorID`, `userID`, `tutorType`, `dateAdded`, `dateModified`, `statusID`) VALUES
(4, 1, 'volunteer', NULL, NULL, 1),
(5, 10, 'volunteer', NULL, NULL, 1),
(6, 11, 'scholar', NULL, NULL, 1),
(7, 12, 'volunteer', NULL, NULL, 1),
(8, 14, NULL, NULL, NULL, 1),
(9, 17, 'scholar', NULL, NULL, 1),
(11, 18, 'scholar', NULL, NULL, 1),
(12, 19, 'scholar', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tutorschedules`
--

CREATE TABLE `tutorschedules` (
  `tutorScheduleID` int(11) NOT NULL,
  `tutorID` int(11) DEFAULT NULL,
  `scheduleID` int(11) DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `schoolYear` year(4) DEFAULT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `typeID` int(11) DEFAULT NULL,
  `IDNo` int(11) NOT NULL,
  `firstName` varchar(80) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `middleName` varchar(50) DEFAULT NULL,
  `emailAddress` varchar(100) DEFAULT NULL,
  `contactNo` varchar(15) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `dateModified` datetime NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `typeID`, `IDNo`, `firstName`, `lastName`, `middleName`, `emailAddress`, `contactNo`, `password`, `dateAdded`, `dateModified`, `status`) VALUES
(1, 4, 0, 'Bianca Patriza', 'Valmeo', 'Toreja', 'biancapatriza.valmeo@benilde.edu.ph', '09178381609', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(17, 4, 0, 'eto', 'talag', 'na', 'haay@a.com', '09123456784', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(18, 4, 0, 'eedxae', 'adx', 'axde', 'axda@i.com', '09123456783', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(19, 4, 0, 'auq', 'Talaga', 'na', 'ed@as.com', '09123456782', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(10, 4, 0, 'Bianca', 'aded', 'eto na', 'email@yahoo.com', '09122345678', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(11, 4, 0, 'Bianca', 'aded', 'eto na', 'email@yahoo.com', '09122345678', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(12, 4, 0, 'bla', 'hi', 'hello', 'hi@yahoo.com', '09123456782', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(14, 4, 0, 'bdrgrs', 'srgs', 'rsgsrg', 'hello@yahoo.com', '09123456783', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `typeID` int(11) NOT NULL,
  `userType` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usertypes`
--

INSERT INTO `usertypes` (`typeID`, `userType`) VALUES
(1, 'SLU Coordinator'),
(3, 'Student Assistant'),
(4, 'Tutor'),
(5, 'Tutee'),
(2, 'SGO');

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
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `degreeprograms`
--
ALTER TABLE `degreeprograms`
  ADD PRIMARY KEY (`programID`);

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
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`scheduleID`);

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
-- Indexes for table `tutorialchecklist`
--
ALTER TABLE `tutorialchecklist`
  ADD PRIMARY KEY (`checklistID`);

--
-- Indexes for table `tutorialsession`
--
ALTER TABLE `tutorialsession`
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
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `degreeprograms`
--
ALTER TABLE `degreeprograms`
  MODIFY `programID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `facultyID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `programcourses`
--
ALTER TABLE `programcourses`
  MODIFY `refNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `scheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `schoolID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tutees`
--
ALTER TABLE `tutees`
  MODIFY `tuteeID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tutorexpertise`
--
ALTER TABLE `tutorexpertise`
  MODIFY `expertiseID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tutorialchecklist`
--
ALTER TABLE `tutorialchecklist`
  MODIFY `checklistID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tutorialsession`
--
ALTER TABLE `tutorialsession`
  MODIFY `tutorialNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `tutorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tutorschedules`
--
ALTER TABLE `tutorschedules`
  MODIFY `tutorScheduleID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tutorstatus`
--
ALTER TABLE `tutorstatus`
  MODIFY `statusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
