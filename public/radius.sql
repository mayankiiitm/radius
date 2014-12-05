-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2014 at 01:29 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `radius`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_name` varchar(250) NOT NULL,
  `public_key` varchar(64) NOT NULL,
  `private_key` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `app_name`, `public_key`, `private_key`, `created_at`) VALUES
(11, 'radius', '611c9f811b80684c4173e4fc52958b86db5c6443', '4eb61ffce723d858fde96d014d6ca32cff8aaba0', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_id` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` text NOT NULL,
  `dob` datetime NOT NULL,
  `access_token` varchar(128) NOT NULL,
  `at_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fb_id` (`fb_id`),
  KEY `access_token` (`access_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fb_id`, `email`, `gender`, `dob`, `access_token`, `at_time`) VALUES
(1, '1', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(2, 'erere', '', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(9, '12345', 'mayank@gmail.com', 'm', '2014-12-30 00:00:00', '656e5fdd15bd9fcd0375d34a1bc9f9f7', '2014-12-05 17:58:21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
