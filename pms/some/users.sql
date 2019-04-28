-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 21, 2019 at 11:55 AM
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
-- Database: `mytravaly_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(10) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `passwd` text NOT NULL,
  `username` text NOT NULL,
  `mobile` text NOT NULL,
  `designation` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `pict` text NOT NULL,
  `role` text NOT NULL,
  `status` int(11) NOT NULL,
  `dateofcreation` date NOT NULL,
  `punchin` int(11) DEFAULT '0',
  `privilege` text NOT NULL,
  `hotelid` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `email`, `passwd`, `username`, `mobile`, `designation`, `department`, `pict`, `role`, `status`, `dateofcreation`, `punchin`, `privilege`, `hotelid`) VALUES
(1, 'test', 'abc@gmail.com', '12345', 'test', '909090909090', 1, 1, '', 'Admin', 0, '2019-02-28', 0, '', 7),
(2, 'Hassan', 'han@han.com', '123456', 'minigo', '', 0, 0, '', 'user', 1, '2019-01-29', 0, '', 7),
(5, 'hamlet', 'ahhd@ahh.com', 'dsfsfs', 'roy', '65566565', 0, 0, '', 'admin', 1, '2019-01-29', 0, '6,', 7),
(7, 'mahamat', 'mahamatabdallah98@gmail.com', '123456', 'dogoy', '01245789', 0, 0, '', 'superadmin', 1, '2019-01-31', 1, '3,1,9,4,', 1),
(9, 'hamit', 'ham@ham.com', '12345', 'Hidiba', '84548785548', 4, 1, '', 'user', 1, '2019-01-31', 0, '9,', 1),
(10, 'abdallah', 'admin@email.com', '12034', 'abib', '40012570', 1, 1, '', 'admin', 0, '2019-02-06', 0, '6,', 1),
(11, 'prashanth', 'prashanththunder007@gmail.com', '123', 'Basava', '8880910157', 1, 1, '', 'Admin', 0, '2019-02-28', 0, '', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
