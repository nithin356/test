-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2020 at 09:22 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `dc`
--

CREATE TABLE `dc` (
  `id` int(10) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `sem` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dc`
--

INSERT INTO `dc` (`id`, `unit`, `sem`) VALUES
(1, '2', '3\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `dclog`
--

CREATE TABLE `dclog` (
  `id` int(10) NOT NULL,
  `dcname` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dclog`
--

INSERT INTO `dclog` (`id`, `dcname`, `pass`) VALUES
(10, 'dc', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `lec`
--

CREATE TABLE `lec` (
  `id` int(10) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `access` varchar(10) DEFAULT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lec`
--

INSERT INTO `lec` (`id`, `lname`, `unit`, `access`, `pass`) VALUES
(11, 'lec', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `s_id` varchar(100) DEFAULT NULL,
  `sname` varchar(100) DEFAULT NULL,
  `semail` varchar(100) DEFAULT NULL,
  `squal` varchar(100) DEFAULT NULL,
  `smobile` varchar(100) DEFAULT NULL,
  `expert` varchar(100) DEFAULT NULL,
  `spassword` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`s_id`, `sname`, `semail`, `squal`, `smobile`, `expert`, `spassword`) VALUES
('1234', 'dsd', 'nithinbhandary356@gmail.com', 'MCA', '9483887537', 'a', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `uclog`
--

CREATE TABLE `uclog` (
  `id` int(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `sem` varchar(100) DEFAULT NULL,
  `camp` varchar(100) DEFAULT NULL,
  `day_to` varchar(100) DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `from_time` varchar(100) DEFAULT NULL,
  `to_time` varchar(100) DEFAULT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uclog`
--

INSERT INTO `uclog` (`id`, `uname`, `unit`, `sem`, `camp`, `day_to`, `date_to`, `from_time`, `to_time`, `pass`) VALUES
(13, 'uc', '2', '3', 'ww', 'Monday', '2020-05-01', '00:36', '01:35', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` varchar(10) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `uemail` varchar(50) NOT NULL,
  `udate` date NOT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `umobile` int(15) NOT NULL,
  `uaddr` varchar(500) NOT NULL,
  `upassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `uname`, `uemail`, `udate`, `unit`, `umobile`, `uaddr`, `upassword`) VALUES
('1234', 'wewe', 'nithinbhandary356@gmail.com', '2020-05-20', NULL, 2147483647, 'TEST', 'c81e728d9d4c2f636f067f89cc14862c'),
('123412', 'cdf', 'dhanushkt787dd@gmail.com', '0000-00-00', NULL, 2147483647, 'dsd', '698d51a19d8a121ce581499d7b701668');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dc`
--
ALTER TABLE `dc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unit` (`unit`);

--
-- Indexes for table `dclog`
--
ALTER TABLE `dclog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lec`
--
ALTER TABLE `lec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD UNIQUE KEY `s_id` (`s_id`);

--
-- Indexes for table `uclog`
--
ALTER TABLE `uclog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dclog`
--
ALTER TABLE `dclog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `lec`
--
ALTER TABLE `lec`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `uclog`
--
ALTER TABLE `uclog`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
