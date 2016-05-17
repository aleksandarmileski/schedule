-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2016 at 09:23 AM
-- Server version: 5.7.9
-- PHP Version: 7.0.6RC1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtasks`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `ID` int(11) NOT NULL,
  `TYPE` tinytext,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ID`, `TYPE`) VALUES
(0, 'USER'),
(1, 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` int(11) NOT NULL,
  `context` varchar(255) DEFAULT NULL,
  `priority` text NOT NULL,
  `hour` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=233 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `day`, `context`, `priority`, `hour`, `user_id`) VALUES
(46, 2, 'work', 'danger', 4, 10),
(49, 3, 'sreda bzzz', 'danger', 4, 8),
(51, 5, 'few more hours', 'danger', 6, 8),
(58, 3, 'bzz', 'danger', 4, 8),
(59, 4, 'last sprint', 'success', 1, 8),
(61, 2, 'CL 1/2 finals', 'info', 9, 8),
(63, 5, 'bbb', 'success', 1, 8),
(191, 1, 'monday down 4 to go', 'success', 9, 10),
(194, 4, 'two more days to go', 'info', 1, 10),
(195, 3, 'big bug discovered', 'danger', 1, 10),
(196, 4, 'bug successfully solved', 'info', 5, 10),
(172, 3, 'JQuerry time', 'success', 9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role_type` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `role_type` (`role_type`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_type`) VALUES
(10, 'ace', 'ace', 0),
(8, 'pece', 'pece', 0),
(12, 'admin', 'admin', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
