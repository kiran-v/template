-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2017 at 01:47 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `template`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `ID` int(100) NOT NULL,
  `QN_ID_FK` int(100) NOT NULL,
  `QS_ID_FK` int(100) NOT NULL,
  `Answer` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `field_option`
--

CREATE TABLE `field_option` (
  `ID` int(100) NOT NULL,
  `QS_ID_FK` int(100) NOT NULL,
  `Attributes` varchar(50) NOT NULL,
  `Is_required` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `field_option`
--

INSERT INTO `field_option` (`ID`, `QS_ID_FK`, `Attributes`, `Is_required`) VALUES
(1, 1, 'text', 'required'),
(2, 2, 'password', 'required'),
(3, 3, 'text', 'required'),
(4, 4, 'number', ''),
(5, 5, 'male', ''),
(6, 5, 'female', ''),
(7, 6, 'email', 'required'),
(8, 7, 'password', ''),
(9, 8, 'SSLC', ''),
(10, 8, 'PLUS 2', ''),
(11, 8, 'GRADUATION', ''),
(12, 8, 'POST GRADUATION', ''),
(13, 9, 'textarea', ''),
(14, 10, '', ''),
(15, 11, '', ''),
(16, 12, 'multiple', '');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `ID` int(100) NOT NULL,
  `QN_ID_FK` int(100) NOT NULL,
  `Question` varchar(250) NOT NULL,
  `Field_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`ID`, `QN_ID_FK`, `Question`, `Field_Name`) VALUES
(1, 1, 'Username', 'text'),
(2, 1, 'Password', 'password'),
(3, 2, 'Full name', 'text'),
(4, 2, 'Age', 'number'),
(5, 2, 'gender', 'radio'),
(6, 2, 'email id', 'email'),
(7, 2, 'password', 'password'),
(8, 2, 'Qualification ', 'checkbox'),
(9, 2, 'address', 'textarea'),
(10, 2, 'image', 'file'),
(11, 3, 'image', 'file'),
(12, 4, 'images', 'file');

-- --------------------------------------------------------

--
-- Table structure for table `quest_name`
--

CREATE TABLE `quest_name` (
  `ID` int(100) NOT NULL,
  `q_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quest_name`
--

INSERT INTO `quest_name` (`ID`, `q_name`) VALUES
(1, 'Login'),
(2, 'Registartion'),
(3, 'file upload'),
(4, 'Multiple file');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `field_option`
--
ALTER TABLE `field_option`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `quest_name`
--
ALTER TABLE `quest_name`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `field_option`
--
ALTER TABLE `field_option`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `quest_name`
--
ALTER TABLE `quest_name`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
