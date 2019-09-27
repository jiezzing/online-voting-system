-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 27, 2019 at 12:56 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ovs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `status_file`
--

CREATE TABLE `status_file` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_file`
--

INSERT INTO `status_file` (`status_id`, `status_name`) VALUES
(1, 'Active'),
(2, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `voters_account`
--

CREATE TABLE `voters_account` (
  `voters_id` int(11) NOT NULL,
  `voters_username` varchar(30) NOT NULL,
  `voters_password` varchar(50) NOT NULL,
  `voters_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `voters_account`
--

INSERT INTO `voters_account` (`voters_id`, `voters_username`, `voters_password`, `voters_status`) VALUES
(1, 'jiezzing@gmail.com', 'ZG90YTJ0aGVpbnRlcm5hdGlvbmFs', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voters_profile`
--

CREATE TABLE `voters_profile` (
  `voters_id` int(5) NOT NULL,
  `voters_name` varchar(50) NOT NULL,
  `voters_status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `voters_profile`
--

INSERT INTO `voters_profile` (`voters_id`, `voters_name`, `voters_status`) VALUES
(1, 'Fritz Gerald Dumdum', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `status_file`
--
ALTER TABLE `status_file`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `voters_account`
--
ALTER TABLE `voters_account`
  ADD PRIMARY KEY (`voters_id`);

--
-- Indexes for table `voters_profile`
--
ALTER TABLE `voters_profile`
  ADD PRIMARY KEY (`voters_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `status_file`
--
ALTER TABLE `status_file`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `voters_account`
--
ALTER TABLE `voters_account`
  MODIFY `voters_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voters_profile`
--
ALTER TABLE `voters_profile`
  MODIFY `voters_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
