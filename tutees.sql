-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2017 at 06:48 PM
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
-- Database: `slice_ralph`
--

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
(1, 1, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(2, 2, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(3, 3, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(4, 4, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(5, 5, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(31, 31, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(32, 32, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(33, 33, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(34, 34, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00'),
(35, 35, 'Active', '2017-10-09 00:00:00', '2017-10-09 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tutees`
--
ALTER TABLE `tutees`
  ADD PRIMARY KEY (`tuteeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tutees`
--
ALTER TABLE `tutees`
  MODIFY `tuteeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
