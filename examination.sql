-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2016 at 03:31 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `examination`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `dep_id` int(10) NOT NULL,
  `course` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `dep_id`, `course`) VALUES
(11, 5, 'BCA'),
(12, 5, 'Bsc MEC'),
(18, 6, 'Bsc PCM'),
(19, 6, 'BBG'),
(20, 6, 'BtCG'),
(21, 6, 'BCG'),
(22, 7, 'Bsc CBZ'),
(23, 7, 'Bsc BCB');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `dep_type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dep_type`) VALUES
(5, 'Computer Science'),
(6, 'Biotechnology'),
(7, 'Botany'),
(8, 'Chemistry & Biochemistry');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `semester` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester`) VALUES
(4, 1),
(5, 2),
(6, 3),
(7, 4),
(8, 5),
(9, 6);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `course_id` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `course_id`, `semester`, `subject`) VALUES
(1, 11, 9, 'artificial intelligence'),
(2, 11, 9, 'j2e');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `user_type_id` int(10) NOT NULL,
  `dep_type` int(10) DEFAULT NULL,
  `course_type` int(10) DEFAULT NULL,
  `semester` int(5) DEFAULT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `roll_number` varchar(30) DEFAULT NULL,
  `contact` varchar(30) DEFAULT NULL,
  `active` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `date`, `user_type_id`, `dep_type`, `course_type`, `semester`, `user_name`, `user_email`, `user_pass`, `roll_number`, `contact`, `active`) VALUES
(1, '0000-00-00', 1, 5, NULL, NULL, 'Naren', 'naren@gmail.com', 'naren', NULL, NULL, 1),
(2, '0000-00-00', 2, 5, 1, NULL, 'beata', 'beata@gmail.com', 'beata', NULL, NULL, 1),
(6, '0000-00-00', 3, 5, 1, 9, 'qwerty', 'qwerty@gmail.com', 'qwerty', '13bca017', '8888888888', 1),
(8, '0000-00-00', 4, NULL, NULL, NULL, 'Admin', 'admin@gmail.com', 'admin', NULL, NULL, 1),
(9, '0000-00-00', 1, 5, NULL, NULL, 'asdf', 'asdf@gmail.com', 'asdf', NULL, '1234567890', 1),
(12, '0000-00-00', 1, 8, NULL, NULL, 'Sophia', 'sophia@gmail.com', 'sophia', NULL, '1234567162', 0),
(13, '0000-00-00', 1, 7, NULL, NULL, 'neeta', 'neeta@gmail.com', 'neeta', NULL, '7896785678', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `user_type`) VALUES
(1, 'Admin'),
(2, 'Teacher'),
(3, 'Student'),
(4, 'College Admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
