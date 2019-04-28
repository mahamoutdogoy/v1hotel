-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 22, 2019 at 03:55 PM
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
-- Table structure for table `for_hotel_use`
--

DROP TABLE IF EXISTS `for_hotel_use`;
CREATE TABLE IF NOT EXISTS `for_hotel_use` (
  `folio` int(100) NOT NULL,
  `guest_type` varchar(100) NOT NULL,
  `room_no` int(100) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `room_rate` int(100) NOT NULL,
  `adults` int(100) NOT NULL,
  `children` int(100) NOT NULL,
  `extra_person` int(100) NOT NULL,
  `billing_instructions` varchar(100) NOT NULL,
  `front_desk` varchar(100) NOT NULL,
  `duty_manager` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `for_hotel_use`
--

INSERT INTO `for_hotel_use` (`folio`, `guest_type`, `room_no`, `room_type`, `room_rate`, `adults`, `children`, `extra_person`, `billing_instructions`, `front_desk`, `duty_manager`) VALUES
(6, 'international', 101, 'd-lux', 21, 4, 2, 2, 'Gottigere\r\n987', 'd', 'Syed aamir'),
(6, 'domestic', 202, 'djkfvkj', 210000, 4, 25, 0, 'panduranga', 'qwerty', ',mvdhvjk'),
(6, 'international', 101, 'djkfvkj', 21, 4, 25, 2, 'panduranga', '54', 'xyz');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
