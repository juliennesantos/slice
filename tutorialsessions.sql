-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2017 at 08:09 PM
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
-- Database: `slicedb`
--

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
(1, 1, 1, 1, 1, 1, '2017-10-30 00:00:00', '2017-11-03 02:44:58', '2017-11-03 02:45:04', 'jose rizal qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', '', '2017-10-25 03:12:22', '2017-10-25 10:08:48', 'Finished'),
(2, 1, 1, NULL, 10, 1, '2017-10-30 00:00:00', '2017-11-09 10:24:11', NULL, '', '', '2017-10-27 19:00:14', NULL, 'Approved'),
(3, 1, 13, NULL, 13, 1, '2017-10-30 00:00:00', '2017-11-08 11:03:26', '2017-11-08 11:04:14', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 'hi', '2017-10-29 01:36:36', '2017-11-07 21:13:55', 'Finished'),
(4, 1, 1, 13, 1, 1, '2017-10-30 00:00:00', NULL, NULL, 'qwertyuiop', 'comments here', '2017-10-31 18:17:58', '2017-11-04 14:11:48', 'Finished'),
(5, 1, 0, 1, 13, 1, '2017-11-27 00:00:00', NULL, NULL, 'hi', '', '2017-11-08 09:33:44', '2017-11-09 06:20:10', 'Cancel Approved'),
(6, 1, 0, 13, 13, 4, '2017-11-27 00:00:00', NULL, NULL, 'heyo', NULL, '2017-11-08 09:38:43', '2017-11-08 10:07:17', 'Approved'),
(7, 1, 13, 0, 3, 4, '2017-11-27 00:00:00', NULL, NULL, '', NULL, '2017-11-08 09:40:41', '2017-11-08 18:23:28', 'Disapproved'),
(8, 1, 0, NULL, 3, 0, '1970-01-01 08:00:00', NULL, NULL, '                                                      ', NULL, '2017-11-08 14:25:11', '2017-11-09 06:22:00', 'Cancel Disapproved'),
(9, 1, 0, NULL, 3, 0, '1970-01-01 08:00:00', NULL, NULL, '                                                      ', '', '2017-11-08 14:26:26', '2017-11-09 04:50:59', 'Cancel Approved'),
(10, 1, 13, NULL, 3, 0, '1970-01-01 08:00:00', NULL, NULL, '                                                      ', 'qqqw', '2017-11-08 14:37:57', '2017-11-09 06:18:31', 'Changed to Session #11'),
(11, 1, 13, NULL, 3, 0, '1970-01-01 08:00:00', NULL, NULL, '                                                      ', 'qqqw', '2017-11-08 14:38:51', '2017-11-09 06:18:31', 'Change Approved'),
(12, 1, 13, NULL, 3, 0, '1970-01-01 08:00:00', NULL, NULL, '                                                      ', '                            ', '2017-11-08 14:55:42', '2017-11-09 04:11:55', 'Change Approved'),
(13, 1, 0, NULL, 3, 0, '1970-01-01 08:00:00', NULL, NULL, '                                                      ', '                            ', '2017-11-08 15:17:17', '2017-11-09 04:18:54', 'Change Disapproved'),
(14, 1, NULL, 1, 1, 1, '2017-11-27 00:00:00', NULL, NULL, 'qqq', NULL, '2017-11-09 10:00:58', '2017-11-09 10:00:58', 'Pending'),
(15, 1, NULL, 13, 5, 4, '2017-11-20 00:00:00', NULL, NULL, 'bible stuff.', NULL, '2017-11-09 18:47:17', '2017-11-09 18:47:17', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tutorialsessions`
--
ALTER TABLE `tutorialsessions`
  ADD PRIMARY KEY (`tutorialNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tutorialsessions`
--
ALTER TABLE `tutorialsessions`
  MODIFY `tutorialNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
