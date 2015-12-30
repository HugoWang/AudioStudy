-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Nov 16, 2015 at 01:48 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ubiquitous`
--

-- --------------------------------------------------------

--
-- Table structure for table `clickevents`
--

CREATE TABLE `clickevents` (
  `xcoord` int(4) NOT NULL,
  `ycoord` int(4) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `music` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `no_player`
--

CREATE TABLE `no_player` (
  `num_no_player` int(11) NOT NULL,
  `display` int(11) NOT NULL,
  `day` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `int_player` int(11) NOT NULL,
  `day` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `int_display` int(11) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `age` int(11) NOT NULL,
  `answer_question1` int(11) NOT NULL,
  `answer_question2` int(11) NOT NULL,
  `answer_question3` int(11) NOT NULL,
  `answer_question4` int(11) NOT NULL,
  `timestamp_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `player_no_sound`
--

CREATE TABLE `player_no_sound` (
  `int_player` int(11) NOT NULL,
  `day` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `int_display` int(11) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `age` int(11) NOT NULL,
  `answer_question1` int(11) NOT NULL,
  `answer_question2` int(11) NOT NULL,
  `timestamp_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `num_score` int(11) NOT NULL,
  `num_player` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clickevents`
--
ALTER TABLE `clickevents`
  ADD PRIMARY KEY (`timestamp`);

--
-- Indexes for table `no_player`
--
ALTER TABLE `no_player`
  ADD PRIMARY KEY (`num_no_player`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`int_player`);

--
-- Indexes for table `player_no_sound`
--
ALTER TABLE `player_no_sound`
  ADD PRIMARY KEY (`int_player`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`num_score`);
