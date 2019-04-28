-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 22, 2019 at 03:53 PM
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
-- Table structure for table `arrival_info`
--

DROP TABLE IF EXISTS `arrival_info`;
CREATE TABLE IF NOT EXISTS `arrival_info` (
  `folio` int(100) NOT NULL,
  `guest_type` varchar(100) NOT NULL,
  `arrived_from` varchar(100) NOT NULL,
  `proceeding_to` varchar(100) NOT NULL,
  `arrived_date` date NOT NULL,
  `arrived_time` time NOT NULL,
  `departure_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `visit_purpose` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arrival_info`
--

INSERT INTO `arrival_info` (`folio`, `guest_type`, `arrived_from`, `proceeding_to`, `arrived_date`, `arrived_time`, `departure_date`, `departure_time`, `visit_purpose`) VALUES
(123, 'domestic', 'aus', 'ind', '2019-03-11', '05:11:03', '2019-03-05', '06:07:07', 'business');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
