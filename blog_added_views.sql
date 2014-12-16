-- phpMyAdmin SQL Dump
-- version 4.3.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2014 at 09:33 PM
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
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(2) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'C#'),
(2, 'JAVA'),
(3, 'HTML5'),
(4, 'JAVASCRIPT'),
(5, 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(5) NOT NULL,
  `name` varchar(150) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comment` text NOT NULL,
  `post_id` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `date`, `comment`, `post_id`) VALUES
(1, 'Fil', '2014-12-16 19:51:42', 'veererbertbnr', 7),
(7, 'Бат Сали', '2014-12-16 20:07:14', 'Я да видиме...', 7),
(8, 'Бат Сали', '2014-12-16 20:07:14', 'Я да видиме...', 7);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(5) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(500) NOT NULL,
  `text` text NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `date`, `title`, `text`, `user_id`) VALUES
(1, '2014-12-15 10:08:58', 'Creating A Bitwise Mask Of Unknown Length', '<p>There are 3 ways to do this (as far as I know).</p>\r\n', 1),
(4, '2014-12-15 16:04:35', 'Flipping a bit on a given position', '<p>Formula: number ^= 1 &lt;&lt; position</p>\r\n', 1),
(5, '2014-11-12 16:05:26', 'Gambling - solution', '<p>Here is the....</p>\r\n', 1),
(7, '2014-02-06 21:45:28', 'Trying out the tags functionality', '<p>This is my textarea to be replaced with CKEditor.</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tags` varchar(50) NOT NULL,
  `post_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tags`, `post_id`) VALUES
('programming', 0),
('bitwise', 0),
('useful', 0),
('programming', 0),
('bitwise', 0),
('useful', 0),
('programming', 0),
('bitwise', 0),
('useful', 0),
('', 0),
('', 0),
('', 0),
('person', 0),
('free time', 0),
('love', 0),
('peace', 0),
('protest', 0),
('person', 0),
('free time', 0),
('love', 0),
('peace', 0),
('protest', 0),
('exam', 0),
('solution', 0),
('exam', 0),
('solution', 0),
('exam', 6),
('solution', 6),
('exam', 8),
('solution', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `username` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `password` varchar(500) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `city`, `country`) VALUES
(1, 'Filip Kolev', 'Filkolev', 'fil.kolev@abv.bg', '2913ed7d4c8d889226fc287a5b2f0f8c60b7d553e031ca77036f2062d8d35373', 'Sofia', 'Bulgaria');

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
(5, '::1'),
(1, '::1'),
(4, '::1'),
(1, '::1'),
(4, '::1'),
(1, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
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
(1, '::1'),
(4, '::1'),
(1, '::1'),
(4, '::1'),
(1, '::1'),
(1, '::1'),
(4, '::1'),
(4, '::1'),
(5, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(1, '::1'),
(1, '::1'),
(1, '::1'),
(1, '::1'),
(1, '::1'),
(1, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
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
(1, '::1'),
(4, '::1'),
(5, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(1, '::1'),
(4, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(7, '::1'),
(8, '::1'),
(9, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(7, '::1'),
(8, '::1'),
(9, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(7, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(7, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(7, '::1'),
(5, '::1'),
(5, '::1'),
(1, '::1'),
(4, '::1'),
(7, '::1'),
(7, '::1'),
(7, '::1'),
(7, '::1'),
(7, '::1'),
(7, '::1'),
(7, '::1'),
(7, '::1'),
(7, '::1'),
(7, '::1'),
(7, '::1'),
(7, '::1'),
(7, '::1'),
(1, '::1'),
(4, '::1'),
(7, '::1'),
(1, '::1'),
(4, '::1'),
(7, '::1'),
(1, '::1'),
(4, '::1'),
(7, '::1'),
(1, '::1'),
(4, '::1'),
(7, '::1'),
(1, '::1'),
(4, '::1'),
(7, '::1'),
(1, '::1'),
(4, '::1'),
(7, '::1'),
(4, '::1'),
(1, '::1'),
(4, '::1'),
(7, '::1'),
(1, '::1'),
(4, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(7, '::1'),
(7, '::1'),
(1, '::1'),
(4, '::1'),
(5, '::1'),
(7, '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
