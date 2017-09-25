-- phpMyAdmin SQL Dump
-- version 2.10.0.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Sep 16, 2017 at 08:49 AM
-- Server version: 5.0.37
-- PHP Version: 5.2.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `slice`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `attendance`
-- 

CREATE TABLE `attendance` (
  `logID` int(11) NOT NULL auto_increment,
  `tutorID` int(11) default NULL,
  `term` int(11) default NULL,
  `schoolYr` year(4) default NULL,
  `timeIn` datetime default NULL,
  `timeOut` datetime default NULL,
  `remarks` varchar(500) default NULL,
  PRIMARY KEY  (`logID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `attendance`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `auditlogs`
-- 

CREATE TABLE `auditlogs` (
  `auditID` int(11) NOT NULL auto_increment,
  `userID` int(11) default NULL,
  `logType` varchar(80) default NULL,
  `desccription` varchar(500) default NULL,
  `timeStamp` datetime default NULL,
  PRIMARY KEY  (`auditID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `auditlogs`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `courses`
-- 

CREATE TABLE `courses` (
  `courseID` int(11) NOT NULL auto_increment,
  `courseCode` varchar(7) default NULL,
  `name` varchar(80) default NULL,
  `description` varchar(500) default NULL,
  PRIMARY KEY  (`courseID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `courses`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `degreeprograms`
-- 

CREATE TABLE `degreeprograms` (
  `programID` int(11) NOT NULL auto_increment,
  `name` varchar(60) default NULL,
  `programCode` varchar(10) default NULL,
  `description` varchar(500) default NULL,
  PRIMARY KEY  (`programID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `degreeprograms`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `faculty`
-- 

CREATE TABLE `faculty` (
  `facultyID` int(11) NOT NULL auto_increment,
  `userID` int(11) default NULL,
  `userName` varchar(80) default NULL,
  `facultyNo` varchar(11) default NULL,
  `programID` int(11) default NULL,
  `status` varchar(100) default NULL,
  `dateAdded` datetime default NULL,
  `dateModified` datetime default NULL,
  PRIMARY KEY  (`facultyID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `faculty`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `feedbacks`
-- 

CREATE TABLE `feedbacks` (
  `feedbackID` int(11) NOT NULL auto_increment,
  `tutorID` int(11) default NULL,
  `tutorialNo` int(11) default NULL,
  `feedback` varchar(1000) default NULL,
  PRIMARY KEY  (`feedbackID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `feedbacks`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `programcourses`
-- 

CREATE TABLE `programcourses` (
  `refNo` int(11) NOT NULL auto_increment,
  `programID` int(11) default NULL,
  `courseID` int(11) default NULL,
  PRIMARY KEY  (`refNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `programcourses`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `schedule`
-- 

CREATE TABLE `schedule` (
  `scheduleID` int(11) NOT NULL auto_increment,
  `day` varchar(9) default NULL,
  `timeStart` time default NULL,
  `timeEnd` time default NULL,
  PRIMARY KEY  (`scheduleID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `schedule`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `students`
-- 

CREATE TABLE `students` (
  `studentID` int(11) NOT NULL auto_increment,
  `userID` int(11) default NULL,
  `studentNo` varchar(8) default NULL,
  `programID` int(11) default NULL,
  `status` varchar(10) default NULL,
  `dateAdded` datetime default NULL,
  `dateModified` datetime default NULL,
  PRIMARY KEY  (`studentID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `students`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tutees`
-- 

CREATE TABLE `tutees` (
  `tuteeID` int(11) NOT NULL auto_increment,
  `StudentID` int(11) default NULL,
  `tutorialNo` int(11) default NULL,
  PRIMARY KEY  (`tuteeID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `tutees`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tutorexpertise`
-- 

CREATE TABLE `tutorexpertise` (
  `expertiseID` int(11) NOT NULL auto_increment,
  `tutorID` int(11) default NULL,
  `courseID` int(11) default NULL,
  PRIMARY KEY  (`expertiseID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `tutorexpertise`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tutorialsession`
-- 

CREATE TABLE `tutorialsession` (
  `tutorialNo` int(11) NOT NULL auto_increment,
  `tutorID` int(11) default NULL,
  `courseID` int(11) default NULL,
  `dateTimeApproved` datetime default NULL,
  `dateTimeStarted` datetime default NULL,
  `dateTimeEnded` datetime default NULL,
  `remarks` varchar(200) default NULL,
  PRIMARY KEY  (`tutorialNo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `tutorialsession`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tutors`
-- 

CREATE TABLE `tutors` (
  `tutorID` int(11) NOT NULL auto_increment,
  `userID` int(11) default NULL,
  `tutorType` varchar(80) default NULL,
  `dateAdded` datetime default NULL,
  `dateModified` datetime default NULL,
  `status` varchar(10) default NULL,
  PRIMARY KEY  (`tutorID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `tutors`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tutorschedules`
-- 

CREATE TABLE `tutorschedules` (
  `tutorScheduleID` int(11) NOT NULL auto_increment,
  `tutorID` int(11) default NULL,
  `scheduleID` int(11) default NULL,
  `term` int(11) default NULL,
  `schoolYear` year(4) default NULL,
  PRIMARY KEY  (`tutorScheduleID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `tutorschedules`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `userID` int(11) NOT NULL auto_increment,
  `typeID` int(11) default NULL,
  `firstName` varchar(80) default NULL,
  `lastName` varchar(50) default NULL,
  `middleName` varchar(50) default NULL,
  `emailAddress` varchar(100) default NULL,
  `contactNo` varchar(15) default NULL,
  PRIMARY KEY  (`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `users`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `usertypes`
-- 

CREATE TABLE `usertypes` (
  `typeID` int(11) NOT NULL auto_increment,
  `useerType` varchar(25) default NULL,
  PRIMARY KEY  (`typeID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `usertypes`
-- 

