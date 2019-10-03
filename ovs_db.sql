-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 03, 2019 at 12:55 PM
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
-- Table structure for table `poll_detail_file`
--

CREATE TABLE `poll_detail_file` (
  `poll_id` int(11) NOT NULL,
  `poll_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `total_votes` int(11) NOT NULL,
  `poll_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poll_detail_file`
--

INSERT INTO `poll_detail_file` (`poll_id`, `poll_no`, `user_id`, `pos_id`, `total_votes`, `poll_status`) VALUES
(1, 1, 3, 1, 0, 4),
(2, 1, 4, 1, 0, 4),
(3, 1, 5, 1, 3, 4),
(4, 1, 6, 1, 1, 4),
(5, 1, 7, 1, 0, 4),
(6, 1, 8, 2, 0, 4),
(7, 1, 9, 2, 0, 4),
(8, 1, 10, 2, 1, 4),
(9, 1, 11, 2, 3, 4),
(10, 1, 12, 2, 0, 4),
(11, 1, 13, 3, 0, 4),
(12, 1, 14, 3, 0, 4),
(13, 1, 15, 3, 1, 4),
(14, 1, 16, 3, 0, 4),
(15, 1, 17, 3, 3, 4),
(16, 1, 18, 4, 0, 4),
(17, 1, 19, 4, 0, 4),
(18, 1, 20, 4, 1, 4),
(19, 1, 21, 4, 3, 4),
(20, 1, 22, 4, 0, 4),
(21, 1, 23, 5, 1, 4),
(22, 1, 24, 5, 0, 4),
(23, 1, 25, 5, 3, 4),
(24, 1, 26, 5, 0, 4),
(25, 1, 27, 5, 0, 4),
(26, 1, 28, 6, 1, 4),
(27, 1, 29, 6, 0, 4),
(28, 1, 30, 6, 0, 4),
(29, 1, 31, 6, 3, 4),
(30, 1, 32, 6, 0, 4),
(31, 1, 33, 7, 0, 4),
(32, 1, 34, 7, 1, 4),
(33, 1, 35, 7, 3, 4),
(34, 1, 36, 7, 0, 4),
(35, 1, 37, 7, 0, 4),
(36, 1, 38, 8, 0, 4),
(37, 1, 39, 8, 0, 4),
(38, 1, 40, 8, 1, 4),
(39, 1, 41, 8, 3, 4),
(40, 1, 42, 8, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `poll_file`
--

CREATE TABLE `poll_file` (
  `poll_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `started_at` datetime DEFAULT NULL,
  `end_at` datetime DEFAULT NULL,
  `poll_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `poll_file`
--

INSERT INTO `poll_file` (`poll_id`, `created_at`, `started_at`, `end_at`, `poll_status`) VALUES
(1, '2019-10-03 10:49:57', '2019-10-03 10:59:02', '2019-10-03 17:05:05', 4);

-- --------------------------------------------------------

--
-- Table structure for table `positions_file`
--

CREATE TABLE `positions_file` (
  `pos_id` int(11) NOT NULL,
  `pos_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `positions_file`
--

INSERT INTO `positions_file` (`pos_id`, `pos_name`) VALUES
(1, 'President'),
(2, 'Vice President'),
(3, 'Secretary'),
(4, 'Treasurer'),
(5, 'P.I.O'),
(6, 'Auditor'),
(7, 'Sergeant at Arms'),
(8, 'Department Represetatives');

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
(2, 'Inactive'),
(3, 'To be decided (TBD)'),
(4, 'Voting is now Closed'),
(5, 'Open for Voting'),
(6, 'Voted');

-- --------------------------------------------------------

--
-- Table structure for table `users_account_file`
--

CREATE TABLE `users_account_file` (
  `voters_id` int(11) NOT NULL,
  `voters_username` varchar(30) DEFAULT NULL,
  `voters_password` varchar(50) DEFAULT NULL,
  `voters_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_account_file`
--

INSERT INTO `users_account_file` (`voters_id`, `voters_username`, `voters_password`, `voters_status`) VALUES
(1, 'administrator', 'YWRtaW5pc3RyYXRvcg==', 1),
(2, 'shammah', 'c2hhbW1haA==', 1),
(3, NULL, NULL, 1),
(4, NULL, NULL, 1),
(5, NULL, NULL, 1),
(6, NULL, NULL, 1),
(7, NULL, NULL, 1),
(8, NULL, NULL, 1),
(9, NULL, NULL, 1),
(10, NULL, NULL, 1),
(11, NULL, NULL, 1),
(12, NULL, NULL, 1),
(13, NULL, NULL, 1),
(14, NULL, NULL, 1),
(15, NULL, NULL, 1),
(16, NULL, NULL, 1),
(17, NULL, NULL, 1),
(18, NULL, NULL, 1),
(19, NULL, NULL, 1),
(20, NULL, NULL, 1),
(21, NULL, NULL, 1),
(22, NULL, NULL, 1),
(23, NULL, NULL, 1),
(24, NULL, NULL, 1),
(25, NULL, NULL, 1),
(26, NULL, NULL, 1),
(27, NULL, NULL, 1),
(28, NULL, NULL, 1),
(29, NULL, NULL, 1),
(30, NULL, NULL, 1),
(31, NULL, NULL, 1),
(32, NULL, NULL, 1),
(33, NULL, NULL, 1),
(34, NULL, NULL, 1),
(35, NULL, NULL, 1),
(36, NULL, NULL, 1),
(37, NULL, NULL, 1),
(38, NULL, NULL, 1),
(39, NULL, NULL, 1),
(40, NULL, NULL, 1),
(41, NULL, NULL, 1),
(42, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_profile`
--

CREATE TABLE `users_profile` (
  `voters_id` int(5) NOT NULL,
  `pos_id` int(11) DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_age` int(11) DEFAULT NULL,
  `user_address` varchar(150) DEFAULT NULL,
  `user_motto` varchar(150) DEFAULT NULL,
  `user_achievements` varchar(500) DEFAULT NULL,
  `user_image` varchar(500) DEFAULT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_profile`
--

INSERT INTO `users_profile` (`voters_id`, `pos_id`, `type_id`, `user_fullname`, `user_age`, `user_address`, `user_motto`, `user_achievements`, `user_image`, `user_status`) VALUES
(1, NULL, 1, 'Fritz Gerald Dumdum', NULL, NULL, NULL, NULL, NULL, 1),
(2, NULL, 2, 'Shammah Casumpang', NULL, NULL, NULL, NULL, NULL, 1),
(3, 1, 3, 'Abby', 1, 'Bangkas A', 'Sayings', 'Achievements 2', NULL, 1),
(4, 1, 3, 'Begail', 1, 'Bangkas B', 'Bad', 'Butcher', NULL, 1),
(5, 1, 3, 'C', 2, 'C', 'C', 'C', NULL, 1),
(6, 1, 3, 'D', 1, 'D', 'D', 'D', NULL, 1),
(7, 1, 3, 'E', 1, 'E', 'E', 'E', NULL, 1),
(8, 2, 3, 'A', 1, 'A', 'A', 'A', NULL, 1),
(9, 2, 3, 'B', 1, 'B', 'B', 'B', NULL, 1),
(10, 2, 3, 'C', 1, 'C', 'C', 'C', NULL, 1),
(11, 2, 3, 'Dianne', 1, 'Davao', 'D', 'D', NULL, 1),
(12, 2, 3, 'E', 1, 'E', 'E', 'E', NULL, 1),
(13, 3, 3, 'A', 1, 'A', 'A', 'A', NULL, 1),
(14, 3, 3, 'B', 1, 'B', 'B', 'B', NULL, 1),
(15, 3, 3, 'C', 1, 'C', 'C', 'C', NULL, 1),
(16, 3, 3, 'D', 1, 'D', 'D', 'D', NULL, 1),
(17, 3, 3, 'E', 1, 'E', 'E', 'E', NULL, 1),
(18, 4, 3, 'A', 1, 'A', 'A', 'A', NULL, 1),
(19, 4, 3, 'B', 1, 'B', 'B', 'B', NULL, 1),
(20, 4, 3, 'C', 1, 'C', 'C', 'C', NULL, 1),
(21, 4, 3, 'D', 1, 'D', 'D', 'D', NULL, 1),
(22, 4, 3, 'E', 1, 'E', 'E', 'E', NULL, 1),
(23, 5, 3, 'A', 1, 'A', 'A', 'A', NULL, 1),
(24, 5, 3, 'B', 1, 'B', 'B', 'B', NULL, 1),
(25, 5, 3, 'C', 1, 'C', 'C', 'C', NULL, 1),
(26, 5, 3, 'D', 1, 'D', 'D', 'D', NULL, 1),
(27, 5, 3, 'E', 1, 'E', 'E', 'E', NULL, 1),
(28, 6, 3, 'A', 1, 'A', 'A', 'A', NULL, 1),
(29, 6, 3, 'AB', 1, 'B', 'B', 'B', NULL, 1),
(30, 6, 3, 'C', 1, 'C', 'C', 'C', NULL, 1),
(31, 6, 3, 'D', 1, 'D', 'D', 'D', NULL, 1),
(32, 6, 3, 'E', 1, 'E', 'E', 'E', NULL, 1),
(33, 7, 3, 'A', 1, 'A', 'A', 'A', NULL, 1),
(34, 7, 3, 'B', 1, 'B', 'B', 'B', NULL, 1),
(35, 7, 3, 'C', 1, 'C', 'C', 'C', NULL, 1),
(36, 7, 3, 'D', 1, 'D', 'D', 'D', NULL, 1),
(37, 7, 3, 'E', 1, 'E', 'E', 'E', NULL, 1),
(38, 8, 3, 'A', 1, 'A', 'A', 'A', NULL, 1),
(39, 8, 3, 'B', 1, 'B', 'B', 'B', NULL, 1),
(40, 8, 3, 'C', 1, 'C', 'C', 'C', NULL, 1),
(41, 8, 3, 'D', 1, 'D', 'D', 'D', NULL, 1),
(42, 8, 3, 'Elijah', 1, 'Everland', 'E', 'E', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type_file`
--

CREATE TABLE `user_type_file` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type_file`
--

INSERT INTO `user_type_file` (`type_id`, `type_name`) VALUES
(1, 'Administrator'),
(2, 'Voter'),
(3, 'Candidate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `poll_detail_file`
--
ALTER TABLE `poll_detail_file`
  ADD PRIMARY KEY (`poll_id`);

--
-- Indexes for table `poll_file`
--
ALTER TABLE `poll_file`
  ADD PRIMARY KEY (`poll_id`);

--
-- Indexes for table `positions_file`
--
ALTER TABLE `positions_file`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `status_file`
--
ALTER TABLE `status_file`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users_account_file`
--
ALTER TABLE `users_account_file`
  ADD PRIMARY KEY (`voters_id`);

--
-- Indexes for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`voters_id`);

--
-- Indexes for table `user_type_file`
--
ALTER TABLE `user_type_file`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `poll_detail_file`
--
ALTER TABLE `poll_detail_file`
  MODIFY `poll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `poll_file`
--
ALTER TABLE `poll_file`
  MODIFY `poll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `positions_file`
--
ALTER TABLE `positions_file`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status_file`
--
ALTER TABLE `status_file`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_account_file`
--
ALTER TABLE `users_account_file`
  MODIFY `voters_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `voters_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user_type_file`
--
ALTER TABLE `user_type_file`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
