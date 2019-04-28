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
-- Table structure for table `domestic_registration`
--

DROP TABLE IF EXISTS `domestic_registration`;
CREATE TABLE IF NOT EXISTS `domestic_registration` (
  `folio` int(100) NOT NULL,
  `registration_reference` int(100) NOT NULL AUTO_INCREMENT,
  `registration_date` date NOT NULL,
  `guest_name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `anniversary` date DEFAULT NULL,
  `company` varchar(100) NOT NULL,
  `tax_gst` varchar(100) NOT NULL,
  `street` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zipcode` int(100) NOT NULL,
  PRIMARY KEY (`registration_reference`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `domestic_registration`
--

INSERT INTO `domestic_registration` (`folio`, `registration_reference`, `registration_date`, `guest_name`, `designation`, `birthday`, `anniversary`, `company`, `tax_gst`, `street`, `city`, `state`, `country`, `zipcode`) VALUES
(6, 1, '2019-03-20', 'prashnat', 'n', '2019-02-28', '2019-03-06', 'cv', 'MT1256', 'panduranga', 'bangalore', 'karnataka', 'India', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
