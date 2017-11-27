-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2017 at 03:36 AM
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
-- Database: `slice_final`
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

-- --------------------------------------------------------

--
-- Table structure for table `tutorstatus`
--

CREATE TABLE `tutorstatus` (
  `statusID` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `typeID` int(11) NOT NULL,
  `userType` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  MODIFY `auditID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `facultyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `expertiseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tutorialchecklists`
--
ALTER TABLE `tutorialchecklists`
  MODIFY `checklistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tutorialsessions`
--
ALTER TABLE `tutorialsessions`
  MODIFY `tutorialNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `tutorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
