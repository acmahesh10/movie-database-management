-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2017 at 03:18 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `total_collection` (OUT `total_collection` INT)  NO SQL
SELECT SUM(industrycollection) INTO total_collection from producer$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `actid` int(5) NOT NULL,
  `actname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`actid`, `actname`, `gender`, `phone`, `address`) VALUES
(1, 'Rakshith Shetty', 'Male', '9874561230', 'Banglore'),
(2, 'Rashmika', 'Female', '8965231470', 'Banglore');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `dirid` int(5) NOT NULL,
  `dirname` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`dirid`, `dirname`, `phone`, `address`) VALUES
(1, 'Rishab', '8569321470', 'Banglore'),
(2, 'Rishab', '8523697410', 'Banglore');

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `movid` int(5) NOT NULL,
  `region` varchar(15) NOT NULL,
  `amountspent` int(11) NOT NULL,
  `amountgained` int(11) NOT NULL,
  `profit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`movid`, `region`, `amountspent`, `amountgained`, `profit`) VALUES
(1, '5', 100000, 150000, 0),
(2, '6', 800, 1000, 200);

--
-- Triggers `distributor`
--
DELIMITER $$
CREATE TRIGGER `profit` BEFORE INSERT ON `distributor` FOR EACH ROW set new.profit=(new.amountgained-new.amountspent)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movid` int(5) NOT NULL,
  `movtitle` varchar(20) NOT NULL,
  `movyear` int(5) NOT NULL,
  `movlang` varchar(15) NOT NULL,
  `dirid` int(5) NOT NULL,
  `actid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movid`, `movtitle`, `movyear`, `movlang`, `dirid`, `actid`) VALUES
(1, 'kirik party', 2017, 'Kannada', 1, 1),
(2, 'kirik party', 2017, 'Kannada', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `producer`
--

CREATE TABLE `producer` (
  `pid` int(5) NOT NULL,
  `movid` int(5) NOT NULL,
  `budject` int(11) NOT NULL,
  `industrycollection` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producer`
--

INSERT INTO `producer` (`pid`, `movid`, `budject`, `industrycollection`) VALUES
(1, 1, 10000, 20000),
(2, 2, 15000, 20000),
(3, 1, 1000, 3000),
(4, 1, 900, 2500);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `movid` int(5) NOT NULL,
  `revstars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`movid`, `revstars`) VALUES
(1, 5),
(2, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`actid`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`dirid`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`movid`),
  ADD KEY `movid` (`movid`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movid`),
  ADD KEY `dirid` (`dirid`),
  ADD KEY `actid` (`actid`);

--
-- Indexes for table `producer`
--
ALTER TABLE `producer`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `movid` (`movid`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`movid`),
  ADD KEY `movid` (`movid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `distributor`
--
ALTER TABLE `distributor`
  ADD CONSTRAINT `d_mov_id` FOREIGN KEY (`movid`) REFERENCES `movie` (`movid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `m_aid` FOREIGN KEY (`actid`) REFERENCES `actor` (`actid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `m_did` FOREIGN KEY (`dirid`) REFERENCES `director` (`dirid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `producer`
--
ALTER TABLE `producer`
  ADD CONSTRAINT `m_id` FOREIGN KEY (`movid`) REFERENCES `movie` (`movid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `r_mov_id` FOREIGN KEY (`movid`) REFERENCES `movie` (`movid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
