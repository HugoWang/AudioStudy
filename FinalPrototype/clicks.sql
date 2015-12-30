-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2015 at 02:05 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `clicks`
--
CREATE DATABASE IF NOT EXISTS `clicks` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `clicks`;

-- --------------------------------------------------------

--
-- Table structure for table `clickevents`
--

CREATE TABLE IF NOT EXISTS `clickevents` (
  `xcoord` int(4) NOT NULL,
  `ycoord` int(4) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clickevents`
--

INSERT INTO `clickevents` (`xcoord`, `ycoord`, `timestamp`) VALUES
(787, 231, '2015-10-24 10:33:12'),
(183, 104, '2015-10-24 10:33:28'),
(1888, 1073, '2015-10-24 10:33:39'),
(461, 604, '2015-10-24 10:39:51'),
(1292, 533, '2015-10-24 10:54:28'),
(1195, 632, '2015-10-24 10:55:36'),
(394, 677, '2015-10-24 10:57:55'),
(280, 364, '2015-10-24 11:00:25'),
(374, 443, '2015-10-24 11:01:31'),
(718, 521, '2015-10-24 11:01:36'),
(528, 425, '2015-10-24 11:01:40'),
(722, 521, '2015-10-24 11:01:47'),
(841, 523, '2015-10-24 11:01:51'),
(601, 499, '2015-10-24 11:02:11'),
(607, 533, '2015-10-24 11:02:20'),
(560, 453, '2015-10-24 11:02:24'),
(397, 413, '2015-10-24 11:02:31'),
(696, 644, '2015-10-24 11:02:36'),
(673, 614, '2015-10-24 11:02:43'),
(1002, 658, '2015-10-24 11:02:48'),
(1118, 549, '2015-10-24 11:02:53'),
(785, 507, '2015-10-24 11:02:59'),
(652, 611, '2015-10-24 11:03:03'),
(531, 557, '2015-10-24 11:06:50'),
(444, 443, '2015-10-24 11:07:00'),
(1615, 328, '2015-10-24 11:17:30'),
(449, 343, '2015-10-24 11:18:14'),
(548, 216, '2015-10-24 12:08:13'),
(272, 246, '2015-10-24 13:25:30'),
(1141, 743, '2015-10-24 13:50:51'),
(400, 603, '2015-10-24 13:51:52'),
(639, 371, '2015-10-24 13:56:39'),
(484, 224, '2015-10-24 14:16:53'),
(408, 316, '2015-10-24 14:21:03'),
(435, 329, '2015-10-24 14:43:29'),
(293, 222, '2015-10-24 15:01:06'),
(464, 175, '2015-10-24 15:06:28'),
(982, 591, '2015-10-24 15:11:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clickevents`
--
ALTER TABLE `clickevents`
 ADD PRIMARY KEY (`timestamp`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
