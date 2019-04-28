-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 22, 2019 at 03:54 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_travaly`
--

-- --------------------------------------------------------

--
-- Table structure for table `departure_info`
--

DROP TABLE IF EXISTS `departure_info`;
CREATE TABLE IF NOT EXISTS `departure_info` (
  `folio` int(100) NOT NULL,
  `checkout_date` date NOT NULL,
  `checkout_time` time NOT NULL,
  `duty_manager` varchar(100) NOT NULL,
  `room_inspaected_by` varchar(100) NOT NULL,
  `key_recieved` varchar(100) NOT NULL,
  `room_status` varchar(100) NOT NULL,
  `bill_to` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departure_info`
--

INSERT INTO `departure_info` (`folio`, `checkout_date`, `checkout_time`, `duty_manager`, `room_inspaected_by`, `key_recieved`, `room_status`, `bill_to`) VALUES
(6, '2019-03-12', '02:02:00', 'def', 'def', 'yes', 'clean', 'Guest'),
(123, '2019-03-20', '14:02:00', 'jkl', 'kjhkj', 'yes', 'clean', 'Guest'),
(123, '2019-03-20', '14:02:00', 'jkl', 'kjhkj', 'yes', 'clean', 'Guest'),
(123, '2019-03-20', '03:03:00', 'abc', 'def', 'yes', 'clean', 'Guest');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
