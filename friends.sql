-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Sep 01, 2021 at 05:59 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friends`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
CREATE TABLE IF NOT EXISTS `friends` (
  `friend_id` int(11) NOT NULL AUTO_INCREMENT,
  `friend_email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_name` varchar(50) NOT NULL,
  `date_started` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`friend_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`friend_id`, `friend_email`, `password`, `profile_name`, `date_started`) VALUES
(1, 'ram@gmail.com', '1234', 'ram', '2021-08-30 04:47:56'),
(2, 'ragul@gmail.com', '1234', 'ragul', '2021-08-31 04:06:18'),
(3, 'rohit@gmail.com', '1234', 'rohit', '2021-08-31 17:10:18'),
(4, 'shanaka@gmail.com', '1234', 'shanaka', '2021-08-31 17:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `myfriends`
--

DROP TABLE IF EXISTS `myfriends`;
CREATE TABLE IF NOT EXISTS `myfriends` (
  `friend_id1` int(11) NOT NULL,
  `friend_id2` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `myfriends`
--

INSERT INTO `myfriends` (`friend_id1`, `friend_id2`) VALUES
(2, 1),
(1, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
