-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 22, 2019 at 03:57 PM
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
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `reservationId` int(100) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(110) NOT NULL,
  `room_id` int(110) NOT NULL,
  `room_sub_id` varchar(1000) NOT NULL,
  `folio_id` int(110) NOT NULL,
  `guestName` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `phoneNo` bigint(110) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `nights` int(220) NOT NULL,
  `meal_plan` varchar(1000) NOT NULL DEFAULT 'AP',
  `noOfAdults` int(110) NOT NULL,
  `noOfChildren` int(110) NOT NULL,
  `noOfExtraperson` int(220) NOT NULL,
  `received_ammount` float NOT NULL,
  `price` float NOT NULL,
  `tax` float NOT NULL,
  `total` float NOT NULL,
  `status` int(11) NOT NULL COMMENT '0->booking closed;1->conform;2->pending;',
  `channel` varchar(1000) NOT NULL,
  `payment_status` varchar(1000) NOT NULL,
  `payment_mode` varchar(1000) NOT NULL,
  `payment_type` varchar(1000) NOT NULL,
  `payment_reference` varchar(1000) NOT NULL,
  `internal_note` varchar(1000) NOT NULL,
  `createdBy` varchar(1000) NOT NULL,
  `pending_upto` date NOT NULL,
  PRIMARY KEY (`reservationId`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservationId`, `hotel_id`, `room_id`, `room_sub_id`, `folio_id`, `guestName`, `email`, `phoneNo`, `check_in`, `check_out`, `nights`, `meal_plan`, `noOfAdults`, `noOfChildren`, `noOfExtraperson`, `received_ammount`, `price`, `tax`, `total`, `status`, `channel`, `payment_status`, `payment_mode`, `payment_type`, `payment_reference`, `internal_note`, `createdBy`, `pending_upto`) VALUES
(1, 1, 1, '1A', 123, 'prashanth', 'prashanththunder007@gmail.com', 8880910157, '2019-03-14', '2019-03-20', 6, 'AP', 4, 2, 0, 12000, 10000, 2000, 12000, 1, '', 'Prepaid', 'cash', 'Full Amount', 'xxx', 'hjgh', 'prashanth', '2019-03-10'),
(27, 1, 2, '1v', 124, 'bvv', 'bvv@gmail.com', 254136987, '2019-03-14', '2019-03-28', 5, 'AP', 2, 4, 5, 1000, 10000, 2000, 12000, 1, 'bvv', 'sd', 'card', 'cccx', 'cxc', 'cxcx', 'cxxcx', '2019-03-11');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
