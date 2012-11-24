-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2012 at 06:33 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exp_pdo`
--

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`person_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_id`, `name`, `age`) VALUES
(1, 'abhishek', 25),
(2, 'natasha', 24),
(3, 'akash', 19);

-- --------------------------------------------------------

--
-- Table structure for table `person_subject`
--

CREATE TABLE IF NOT EXISTS `person_subject` (
  `fk_person_id` int(11) NOT NULL,
  `fk_subject_id` int(11) NOT NULL,
  `person_subject_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`person_subject_id`),
  KEY `person_id` (`fk_person_id`,`fk_subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `person_subject`
--

INSERT INTO `person_subject` (`fk_person_id`, `fk_subject_id`, `person_subject_id`) VALUES
(1, 1, 1),
(1, 2, 2),
(2, 3, 3),
(3, 2, 4),
(3, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`subject_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `name`) VALUES
(4, 'bio'),
(2, 'computers'),
(3, 'maths'),
(1, 'physics');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
