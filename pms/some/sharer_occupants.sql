-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 22, 2019 at 03:58 PM
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
-- Table structure for table `sharer_occupants`
--

DROP TABLE IF EXISTS `sharer_occupants`;
CREATE TABLE IF NOT EXISTS `sharer_occupants` (
  `folio` int(100) NOT NULL,
  `guest_type` varchar(100) NOT NULL,
  `registration_reference` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `relationship` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `identification` varchar(100) NOT NULL,
  KEY `registration_reference` (`registration_reference`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sharer_occupants`
--

INSERT INTO `sharer_occupants` (`folio`, `guest_type`, `registration_reference`, `name`, `relationship`, `email`, `mobile`, `nationality`, `identification`) VALUES
(6, 'international', 1, 'Syed aamir', 'cbnxnbcn', 'syedaamirsan@gmail.com', '12456789', 'mc,m', 'bnnm '),
(6, 'international', 1, 'abcd', 'buddy', 'roy@email.com', '12456789', 'gfgfh', '4544886465456'),
(123, 'international', 2, 'aaaaaaaaa', 'cbnxnbcn', 'roy@email.com', '12456789', 'mc,m', 'bnnm '),
(123, 'international', 2, 'bbbbbbbbbb', 'plplplpl', 'roy@email.com', '12456789', 'hj', 'hj');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
