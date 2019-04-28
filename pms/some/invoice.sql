-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 22, 2019 at 03:56 PM
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
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_no` int(100) NOT NULL AUTO_INCREMENT,
  `folioId` int(110) NOT NULL,
  `credit_date` date DEFAULT NULL,
  `Charge` int(100) NOT NULL,
  `tax_gst` int(100) NOT NULL,
  `debit_Dated` date DEFAULT NULL,
  `description` varchar(100) NOT NULL,
  `debit` int(100) NOT NULL,
  `note` varchar(100) DEFAULT NULL,
  `credit` int(100) DEFAULT NULL,
  `mode_of_payment` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`invoice_no`),
  KEY `folioId` (`folioId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `folioId`, `credit_date`, `Charge`, `tax_gst`, `debit_Dated`, `description`, `debit`, `note`, `credit`, `mode_of_payment`) VALUES
(1, 123, '2019-03-13', 122, 2, '2019-03-20', 'food', 124, 'dfghj', 124, 'card'),
(2, 123, '2019-03-04', 0, 0, '2019-03-04', 'advance', 0, 'nmmnm', 5000, 'cash'),
(3, 123, '2019-02-25', 0, 0, '2019-03-05', 'save deposit', 0, 'bnnnbn', 200, 'bank_transfer'),
(4, 123, NULL, 0, 0, NULL, '', 0, '', 0, ''),
(5, 123, '2019-03-19', 0, 0, NULL, '', 0, 'weeeeeee', 1122334455, 'card'),
(6, 123, '2019-03-04', 0, 0, NULL, '', 0, 'yuuuu', 202020, 'bank_transfer'),
(7, 123, '2019-03-11', 0, 0, NULL, '', 0, '121212', 6523, 'card'),
(8, 123, '2019-03-22', 0, 0, NULL, '', 0, 'lk', 7, 'bank_transfer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
