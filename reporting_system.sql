-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2020 at 12:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reporting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `finish_report`
--

CREATE TABLE `finish_report` (
  `uid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fdate` date NOT NULL,
  `work_done` text COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `finish_report`
--

INSERT INTO `finish_report` (`uid`, `user_id`, `fdate`, `work_done`, `created_date`, `updated_date`) VALUES
(3, 3, '2020-06-11', 'Finish report', '2020-06-11 16:46:31', '2020-06-11 16:46:31'),
(4, 2, '2020-06-12', 'Finish Report', '2020-06-12 16:17:11', '2020-06-12 16:18:09'),
(5, 2, '2020-06-11', 'finish report', '2020-06-12 16:19:35', '2020-06-12 16:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `plan_report`
--

CREATE TABLE `plan_report` (
  `uid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ndate` date NOT NULL,
  `morning_plan` text COLLATE utf8_unicode_ci NOT NULL,
  `evening_plan` text COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plan_report`
--

INSERT INTO `plan_report` (`uid`, `user_id`, `ndate`, `morning_plan`, `evening_plan`, `created_date`, `updated_date`) VALUES
(1, 2, '2020-06-12', 'morning report', 'evening report', '0000-00-00 00:00:00', '2020-06-12 10:26:32'),
(2, 2, '2020-06-11', 'morning report', 'evening report', '0000-00-00 00:00:00', '2020-06-12 15:32:24'),
(3, 3, '2020-06-11', 'morning plan detail', 'evening plan detail', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, '2020-06-11', 'morning report', 'morning report', '0000-00-00 00:00:00', '2020-06-12 08:21:04'),
(5, 2, '2020-06-11', 'morning report', 'morning report', '0000-00-00 00:00:00', '2020-06-12 08:21:04'),
(6, 2, '2020-06-11', 'morning report', 'morning report', '2020-06-11 16:56:58', '2020-06-12 08:21:04'),
(7, 2, '2020-06-11', 'morning report', 'morning report', '2020-06-11 16:57:17', '2020-06-12 08:21:04'),
(8, 2, '2020-06-11', 'morning report', 'morning report', '2020-06-11 16:57:38', '2020-06-12 08:21:04'),
(9, 2, '2020-06-11', 'morning report', 'morning report', '2020-06-11 16:57:59', '2020-06-12 08:21:04'),
(10, 2, '2020-06-11', 'morning report', 'morning report', '2020-06-11 16:58:11', '2020-06-12 08:21:04'),
(11, 2, '2020-06-11', 'morning report', 'morning report', '2020-06-11 16:58:30', '2020-06-12 08:21:04'),
(13, 2, '2020-06-12', 'morning report', 'evening plan', '2020-06-12 10:30:46', '2020-06-12 10:30:46'),
(14, 2, '2020-06-12', 'morning plan', 'evening report', '2020-06-12 16:10:01', '2020-06-12 16:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `name`, `password`, `role`, `active`, `created_date`, `updated_date`) VALUES
(2, 'zay', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Ko Ko', '827ccb0eea8a706c4c34a16891f84e7b', 2, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Ma Ma', '827ccb0eea8a706c4c34a16891f84e7b', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `finish_report`
--
ALTER TABLE `finish_report`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `plan_report`
--
ALTER TABLE `plan_report`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `finish_report`
--
ALTER TABLE `finish_report`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `plan_report`
--
ALTER TABLE `plan_report`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
