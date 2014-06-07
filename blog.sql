-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2014 at 09:05 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` varchar(8) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `pass`) VALUES
('admin-01', '32250170a0dca92d53ec9624f336ca24');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `art_id` int(3) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(8) NOT NULL,
  `description` varchar(100) NOT NULL,
  `cat_id` varchar(2) NOT NULL,
  `status` varchar(11) NOT NULL,
  `title` varchar(15) NOT NULL,
  PRIMARY KEY (`art_id`),
  UNIQUE KEY `art_id` (`art_id`),
  UNIQUE KEY `art_id_2` (`art_id`),
  UNIQUE KEY `art_id_3` (`art_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`art_id`, `user_id`, `description`, `cat_id`, `status`, `title`) VALUES
(1, 'adisha', 'dsgsjj', '1', 'approved', 'adfdgh'),
(2, 'adisha', 'ghzj', '2', 'approved', 'xcfhng');

-- --------------------------------------------------------

--
-- Table structure for table `catogry`
--

CREATE TABLE IF NOT EXISTS `catogry` (
  `cat_id` int(2) NOT NULL AUTO_INCREMENT,
  `cat` varchar(15) NOT NULL,
  UNIQUE KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `catogry`
--

INSERT INTO `catogry` (`cat_id`, `cat`) VALUES
(1, 'music'),
(2, 'technical'),
(3, 'dance'),
(4, 'management'),
(5, 'cooking'),
(6, 'food');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(8) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `sname` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `pass`, `fname`, `sname`) VALUES
('adisha', '32250170a0dca92d53ec9624f336ca24', 'adisha', 'porwal'),
('hetald', '32250170a0dca92d53ec9624f336ca24', 'hetal', 'desai');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
