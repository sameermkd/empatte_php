-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 06, 2023 at 03:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoom`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empid` varchar(20) NOT NULL,
  `empname` varchar(100) NOT NULL,
  `empmob` varchar(20) NOT NULL,
  `idnumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empid`, `empname`, `empmob`, `idnumber`) VALUES
('A100', 'Sameer', '', '454545'),
('A101', 'Raju', '9946456236', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

CREATE TABLE `entry` (
  `date` date NOT NULL,
  `empid` varchar(20) NOT NULL,
  `empname` varchar(100) NOT NULL,
  `jobid` varchar(20) NOT NULL,
  `customername` varchar(100) NOT NULL,
  `jobdesc` text NOT NULL,
  `starttime` datetime NOT NULL,
  `endtime` datetime NOT NULL,
  `lunch` varchar(5) NOT NULL,
  `hollyday` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`date`, `empid`, `empname`, `jobid`, `customername`, `jobdesc`, `starttime`, `endtime`, `lunch`, `hollyday`) VALUES
('2023-08-06', 'A100', 'Sameer', 'A123', 'Accounting', 'Test', '2023-08-06 09:59:00', '2023-08-06 20:59:00', 'Yes', 'No'),
('2023-08-05', 'A100', 'Sameer', 'A123', 'Accounting', 'Test', '2023-08-06 16:53:00', '2023-08-07 06:54:00', 'Yes', 'No'),
('2023-08-06', 'A100', 'Sameer', 'A123', 'Accounting', 'Test', '2023-08-06 20:02:00', '2023-08-07 17:02:00', 'Yes', 'No'),
('2023-08-01', 'A101', 'Raju', 'A124', 'Management', 'Demo', '2023-08-06 09:38:00', '2023-08-06 19:39:00', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jobid` varchar(20) NOT NULL,
  `customername` varchar(100) NOT NULL,
  `jobdesc` text NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jobid`, `customername`, `jobdesc`, `startdate`, `enddate`) VALUES
('A123', 'Accounting', 'Test', '2023-08-06', NULL),
('A124', 'Management', 'Demo', '2023-08-06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jobid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
