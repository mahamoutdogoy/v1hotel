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
-- Table structure for table `international_registration`
--

DROP TABLE IF EXISTS `international_registration`;
CREATE TABLE IF NOT EXISTS `international_registration` (
  `folio` int(100) NOT NULL,
  `registration_reference` int(100) NOT NULL AUTO_INCREMENT,
  `registration_date` date NOT NULL,
  `guest_name` varchar(100) NOT NULL,
  `Nationality` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `anniversary` date DEFAULT NULL,
  `Company` varchar(100) NOT NULL,
  `Tax` varchar(100) NOT NULL,
  `passport_no` varchar(100) NOT NULL,
  `passport_expiry` date NOT NULL,
  `visa_no` varchar(100) NOT NULL,
  `visa_expiry` date NOT NULL,
  `arrival_date` date NOT NULL,
  `stay_duartion` int(100) NOT NULL,
  `arrival_immigration` varchar(100) NOT NULL,
  `employed` varchar(100) NOT NULL,
  `street` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zipcode` int(100) NOT NULL,
  PRIMARY KEY (`registration_reference`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `international_registration`
--

INSERT INTO `international_registration` (`folio`, `registration_reference`, `registration_date`, `guest_name`, `Nationality`, `birthday`, `anniversary`, `Company`, `Tax`, `passport_no`, `passport_expiry`, `visa_no`, `visa_expiry`, `arrival_date`, `stay_duartion`, `arrival_immigration`, `employed`, `street`, `city`, `state`, `country`, `zipcode`) VALUES
(6, 1, '2019-03-20', 'abcd', 'dfds', '2019-03-12', '2019-03-19', 'nbmbnmbn', 'MT1256', '3', '2019-02-26', '5443', '2019-03-06', '2019-03-29', 4, '11', 'yes', 'panduranga', 'bangalore', 'karnataka', 'India', 560086),
(123, 2, '2019-03-22', 'Syed aamir', 'India', '2019-03-06', '2019-03-18', 'cozy', 'MT1256', '3', '2019-03-12', '5443', '2019-02-26', '2019-03-19', 4, '11', 'yes', 'panduranga', 'bangalore', 'karnataka', 'India', 560086);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
