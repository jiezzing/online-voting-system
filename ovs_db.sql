-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 02, 2019 at 12:55 PM
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
(1, 'admin@gmail.com', 'YWRtaW5pc3RyYXRvcg==', 1),
(2, 'jiezzing@gmail.com', 'ZG90YTJ0aGVpbnRlcm5hdGlvbmFs', 1);

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
(1, NULL, 1, 'Administrator', NULL, NULL, NULL, NULL, NULL, 1),
(2, NULL, 2, 'Fritz Gerald Dumdum', NULL, NULL, NULL, NULL, NULL, 1);

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
  MODIFY `poll_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poll_file`
--
ALTER TABLE `poll_file`
  MODIFY `poll_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `voters_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `voters_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_type_file`
--
ALTER TABLE `user_type_file`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
