-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2016 at 05:21 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

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
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` int(11) NOT NULL,
  `hour` int(11) NOT NULL,
  `priority` text NOT NULL,
  `name` text NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `day`, `hour`, `priority`, `name`, `id_user`) VALUES
(1, 1, 12, 'success', 'php', 1),
(2, 2, 2, 'success', 'test martin', 1),
(3, 1, 0, 'danger', 'php', 1),
(4, 2, 6, 'success', 'php', 2),
(5, 3, 3, 'info', 'test', 2),
(6, 5, 8, 'success', 'test', 2),
(7, 2, 3, 'info', 'test', 1),
(8, 5, 8, 'info', 'test', 1),
(9, 3, 4, 'success', 'PHP', 2),
(10, 5, 8, 'info', 'php', 2),
(11, 2, 1, 'info', 'php', 2),
(12, 2, 2, 'info', 'php', 1),
(13, 2, 3, 'info', 'php', 1),
(14, 3, 0, 'success', 'php', 2),
(15, 3, 8, 'success', 'php', 2),
(16, 2, 2, 'success', 'php', 2),
(17, 3, 3, 'success', 'php', 1),
(18, 2, 1, 'success', 'hgfhgf', 1),
(19, 2, 1, 'success', 'fdsfd', 2),
(20, 3, 1, 'info', 'fhfghfgh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'pece', 'pece');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
