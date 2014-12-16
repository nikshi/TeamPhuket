-- phpMyAdmin SQL Dump
-- version 4.3.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2014 at 06:25 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

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
-- Table structure for table `views`
--

CREATE TABLE IF NOT EXISTS `views` (
  `post_id` int(11) NOT NULL,
  `ip` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`post_id`, `ip`) VALUES
(1, '0'),
(4, '0'),
(1, '0'),
(4, '0'),
(1, '0'),
(4, '0'),
(1, '0'),
(4, '0'),
(1, '0'),
(4, '0'),
(1, '::1'),
(4, '::1'),
(1, ''),
(4, ''),
(1, '::1'),
(4, '::1'),
(1, '::1'),
(4, '::1'),
(1, '::1'),
(4, '::1'),
(1, '::1'),
(4, '::1'),
(1, '::1'),
(4, '::1'),
(1, '::1'),
(4, '::1'),
(1, '::1'),
(4, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(5, '::1'),
(5, '::1'),
(5, '::1'),
(5, '::1'),
(5, '::1'),
(5, '::1'),
(5, '::1'),
(5, '::1'),
(5, '::1'),
(5, '::1'),
(5, '::1'),
(5, '::1'),
(5, '::1'),
(5, '::1'),
(5, '::1'),
(5, '::1'),
(5, '::1'),
(5, '::1'),
(5, '::1'),
(5, '::1'),
(5, '::1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
