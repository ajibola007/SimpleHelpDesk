-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2017 at 07:46 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `helpdesk`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_admin`
--

CREATE TABLE IF NOT EXISTS `login_admin` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login_admin`
--

INSERT INTO `login_admin` (`uid`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `login_technician`
--

CREATE TABLE IF NOT EXISTS `login_technician` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `expertise` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `login_technician`
--

INSERT INTO `login_technician` (`uid`, `username`, `password`, `expertise`) VALUES
(1, 'technician', 'technician', 'hard-drive'),
(2, 'technician2', 'technician2', 'floppy-disk');

-- --------------------------------------------------------

--
-- Table structure for table `repair`
--

CREATE TABLE IF NOT EXISTS `repair` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `selected_item` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Assigned_Tech` varchar(50) NOT NULL DEFAULT 'NONE',
  `status` varchar(50) NOT NULL DEFAULT 'NOT FIXED',
  PRIMARY KEY (`id`),
  UNIQUE KEY `customer_name` (`selected_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `repair`
--

INSERT INTO `repair` (`id`, `selected_item`, `username`, `Assigned_Tech`, `status`) VALUES
(1, 'HARD DRIVE', 'alice', 'NONE', 'FIXED'),
(2, 'CD ROM', 'kayode', 'NONE', 'NOT FIXED'),
(11, 'FLOPPY DISK', 'shile', 'NONE', 'NOT FIXED');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'alice', 'alice'),
(2, 'jill', 'jill'),
(3, 'marcus', 'marcus'),
(4, 'shile', 'shile'),
(5, 'dennis', 'dennis'),
(6, 'kayode', 'kayode'),
(7, 'chukwuma', 'chukwuma'),
(8, 'ajibola', 'ajibola');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
