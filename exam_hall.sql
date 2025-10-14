-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2024 at 12:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_hall`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uname` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `exx`
--


--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `id` int(20) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `etype` varchar(50) NOT NULL,
  `regno` varchar(50) NOT NULL,
  `hallno` varchar(50) NOT NULL,
  `bno` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `sno` varchar(20) NOT NULL,
  `subject` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(100) NOT NULL,
  `year` varchar(10) NOT NULL,
  `roomnum` varchar(10) NOT NULL,
  `seat` varchar(20) NOT NULL,
  `ename` varchar(100) NOT NULL,
  `roww` varchar(20) NOT NULL,
  `dep` varchar(100) NOT NULL,
  `sub` varchar(255) NOT NULL,
  `sect` varchar(20) NOT NULL,
  `regno` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL,
  `ses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staffreg`
--

CREATE TABLE `staffreg` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `department` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `psw` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stalt`
--

CREATE TABLE `stalt` (
  `id` int(100) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `ename` varchar(20) NOT NULL,
  `room` varchar(20) NOT NULL,
  `ses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `dob` varchar(40) NOT NULL,
  `dept` varchar(40) NOT NULL,
  `year` varchar(40) NOT NULL,
  `sem` varchar(20) NOT NULL,
  `class` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `pnumber` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(10) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `sem` varchar(20) NOT NULL,
  `s1` varchar(40) NOT NULL,
  `s2` varchar(40) NOT NULL,
  `s3` varchar(40) NOT NULL,
  `s4` varchar(40) NOT NULL,
  `s5` varchar(40) NOT NULL,
  `s6` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffreg`
--
ALTER TABLE `staffreg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stalt`
--
ALTER TABLE `stalt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30101;

--
-- AUTO_INCREMENT for table `staffreg`
--
ALTER TABLE `staffreg`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stalt`
--
ALTER TABLE `stalt`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
