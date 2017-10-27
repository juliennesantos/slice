-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2017 at 12:23 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `logType` varchar(80) NOT NULL,
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
  `status` varchar(10) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `dateModified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`facultyID`, `userID`, `facultyNo`, `programID`, `status`, `dateAdded`, `dateModified`) VALUES
(2, 7, '20171234567', 1, '1', '2017-10-26 00:00:00', NULL);

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

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`feedbackID`, `tutorialNo`, `feedback`, `dateAdded`) VALUES
(2, 1, '<script>alert(\'hallu\');</script>', '2017-10-25 13:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `programcourses`
--

CREATE TABLE `programcourses` (
  `refNo` int(11) NOT NULL,
  `programID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
(1, 'Bachelor of Science in Information System', 'BS-IS', 0, '2017-09-27 00:00:00'),
(3, 'Bachelor of Science in Business Administration major in Export Management', 'BSBA - EM', 0, '2017-09-27 00:00:00'),
(4, 'Bachelor of Science in Business Administration major in Human Resource Management', 'BSBA - HRM', 0, '2017-09-27 00:00:00'),
(5, 'Bachelor of Science in Business Administration major in Computer Application', 'BSBA - CA', 0, '2017-09-27 00:00:00'),
(6, 'Bachelor of Science in Information Technology with specialization in Game Design and Development', 'BSIT - GDD', 0, '2017-09-27 00:00:00');

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
(1, 1, '11439757', 1, 'Active', '2017-10-11 00:00:00', NULL),
(2, 2, 'two', 2, 'Active', '2017-10-11 00:00:00', NULL);

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
(15, 'CATHWOR', '', '2017-09-27 00:00:00');

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
(1, '08:00:00', '09:00:00', 'available', NULL),
(2, '09:30:00', '10:30:00', 'available', NULL),
(3, '10:00:00', '11:00:00', 'available', NULL),
(4, '10:30:00', '11:30:00', 'available', NULL),
(5, '11:00:00', '12:00:00', 'available', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tutees`
--

CREATE TABLE `tutees` (
  `tuteeID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `dateModified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutees`
--

INSERT INTO `tutees` (`tuteeID`, `userID`, `status`, `dateAdded`, `dateModified`) VALUES
(1, 1, 'Active', '2017-10-11 00:00:00', NULL),
(2, 6, 'Active', '2017-10-11 00:00:00', NULL);

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
(1, 1, 1, '2017-10-25 09:53:21'),
(2, 1, 5, '2017-10-25 09:53:21'),
(3, 1, 10, '2017-10-25 09:53:21'),
(4, 13, 1, '2017-10-26 16:11:18'),
(5, 13, 2, '2017-10-26 16:11:18'),
(6, 13, 3, '2017-10-26 16:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `tutorialchecklists`
--

CREATE TABLE `tutorialchecklists` (
  `checklistID` int(11) NOT NULL,
  `tutorialNo` int(11) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `dateAdded` datetime NOT NULL,
  `dateModified` datetime DEFAULT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutorialchecklists`
--

INSERT INTO `tutorialchecklists` (`checklistID`, `tutorialNo`, `comment`, `dateAdded`, `dateModified`, `status`) VALUES
(16, 1, '1', '2017-10-21 10:17:42', '2017-10-27 02:59:50', 'Done'),
(17, 1, '2', '2017-10-21 00:00:00', '2017-10-27 02:59:50', 'Not Done'),
(18, 1, '3 hi', '2017-10-25 10:49:24', '2017-10-27 02:59:50', 'Done'),
(19, 1, 'hello im new', '2017-10-27 02:52:06', '2017-10-27 02:59:50', 'Not Done'),
(20, 1, 'nyeam', '2017-10-27 02:59:39', '2017-10-27 02:59:50', 'Done'),
(21, 1, '', '2017-10-27 02:59:50', '2017-10-27 02:59:50', 'Not Done');

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
  `tutorScheduleID` int(11) NOT NULL,
  `dateTimeRequested` datetime NOT NULL,
  `dateTimeStart` datetime DEFAULT NULL,
  `dateTimeEnd` datetime DEFAULT NULL,
  `tuteeRemarks` varchar(200) DEFAULT NULL,
  `coordRemarks` varchar(200) DEFAULT NULL,
  `dateAdded` datetime NOT NULL,
  `dateModified` datetime DEFAULT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutorialsessions`
--

INSERT INTO `tutorialsessions` (`tutorialNo`, `tuteeID`, `tutorID`, `previousTutorID`, `subjectID`, `tutorScheduleID`, `dateTimeRequested`, `dateTimeStart`, `dateTimeEnd`, `tuteeRemarks`, `coordRemarks`, `dateAdded`, `dateModified`, `status`) VALUES
(1, 1, 1, 1, 1, 1, '2017-10-30 00:00:00', '2017-10-26 23:02:34', '2017-10-26 23:02:38', 'jose rizal', '', '2017-10-25 03:12:22', '2017-10-25 10:08:48', 'Approved');

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
(13, 7, 'Volunteer', '2017-10-11 00:00:00', NULL, 1),
(1, 2, 'Honor Scholar', '2017-10-11 00:00:00', NULL, 1);

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
  `schoolYr` varchar(10) NOT NULL,
  `dateAdded` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutorschedules`
--

INSERT INTO `tutorschedules` (`tutorScheduleID`, `tutorID`, `dayofweek`, `timeblockID`, `term`, `schoolYr`, `dateAdded`) VALUES
(1, 1, 'Monday', 1, 1, '2017-2018', '2017-10-25 09:53:21'),
(2, 13, 'Tuesday', 2, 1, '2017-2018', '2017-10-26 16:14:50'),
(3, 13, 'Tuesday', 2, 1, '2017-2018', '2017-10-26 16:15:39');

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
(3, 3, 'three', 'Assistant', 'Student', 'Juangco', 'ju@benilde.edu.ph', '09178451486', '$2y$10$xINqyw0rYnR7jtGcHsKIL.WC0l04Zulm9g5vGC8wV9rw8VvzP0pF6', '2017-09-30 07:47:46', '2017-09-30 07:47:46', 'Active'),
(4, 4, 'four', 'GO', 'S', 'Juangco', 'ju@benilde.edu.ph', '09178451486', '$2y$10$xINqyw0rYnR7jtGcHsKIL.WC0l04Zulm9g5vGC8wV9rw8VvzP0pF6', '2017-09-30 07:47:46', '2017-09-30 07:47:46', 'Active'),
(5, 5, 'five', 'Coordinator', 'SLU', 'Juangco', 'ju@benilde.edu.ph', '09178451486', '$2y$10$xINqyw0rYnR7jtGcHsKIL.WC0l04Zulm9g5vGC8wV9rw8VvzP0pF6', '2017-09-30 07:47:46', '2017-09-30 07:47:46', 'Active'),
(1, 1, '11439757', 'Student', 'The', 'Juangco', 'juliennejsantos@gmail.com', '09178451486', '$2y$10$xINqyw0rYnR7jtGcHsKIL.WC0l04Zulm9g5vGC8wV9rw8VvzP0pF6', '2017-09-30 07:47:46', '2017-09-30 07:47:46', 'Active'),
(2, 2, 'two', 'Jojo', 'Teacher', 'Juangco', 'ju@benilde.edu.ph', '09178451486', '$2y$10$xINqyw0rYnR7jtGcHsKIL.WC0l04Zulm9g5vGC8wV9rw8VvzP0pF6', '2017-09-30 07:47:46', '2017-09-30 07:47:46', 'Active'),
(8, 3, 'eight', 'Ashley', 'SA', 'Juangco', 'ju@benilde.edu.ph', '09178451486', '$2y$10$xINqyw0rYnR7jtGcHsKIL.WC0l04Zulm9g5vGC8wV9rw8VvzP0pF6', '2017-09-30 07:47:46', '2017-09-30 07:47:46', 'Active'),
(6, 1, 'six', 'Julie', 'Student', 'Juangco', 'juliennejsantos@gmail.com', '09178451486', '$2y$10$xINqyw0rYnR7jtGcHsKIL.WC0l04Zulm9g5vGC8wV9rw8VvzP0pF6', '2017-09-30 07:47:46', '2017-09-30 07:47:46', 'Active'),
(7, 2, 'seven', 'Jerome', 'Teacher', 'Juangco', 'ju@benilde.edu.ph', '09178451486', '$2y$10$xINqyw0rYnR7jtGcHsKIL.WC0l04Zulm9g5vGC8wV9rw8VvzP0pF6', '2017-09-30 07:47:46', '2017-09-30 07:47:46', 'Active'),
(9, 4, 'nine', 'GO 2', 'S', 'Juangco', 'ju@benilde.edu.ph', '09178451486', '$2y$10$xINqyw0rYnR7jtGcHsKIL.WC0l04Zulm9g5vGC8wV9rw8VvzP0pF6', '2017-09-30 07:47:46', '2017-09-30 07:47:46', 'Active'),
(10, 5, 'ten', 'Coordinator 2', 'SLU', 'Juangco', 'ju@benilde.edu.ph', '09178451486', '$2y$10$xINqyw0rYnR7jtGcHsKIL.WC0l04Zulm9g5vGC8wV9rw8VvzP0pF6', '2017-09-30 07:47:46', '2017-09-30 07:47:46', 'Active');

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
  MODIFY `facultyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `programcourses`
--
ALTER TABLE `programcourses`
  MODIFY `refNo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `programID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `schoolID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `timeblocks`
--
ALTER TABLE `timeblocks`
  MODIFY `timeblockID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tutees`
--
ALTER TABLE `tutees`
  MODIFY `tuteeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tutorexpertise`
--
ALTER TABLE `tutorexpertise`
  MODIFY `expertiseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tutorialchecklists`
--
ALTER TABLE `tutorialchecklists`
  MODIFY `checklistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tutorialsessions`
--
ALTER TABLE `tutorialsessions`
  MODIFY `tutorialNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `tutorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tutorschedules`
--
ALTER TABLE `tutorschedules`
  MODIFY `tutorScheduleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tutorstatus`
--
ALTER TABLE `tutorstatus`
  MODIFY `statusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `usertypes`
--
ALTER TABLE `usertypes`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
