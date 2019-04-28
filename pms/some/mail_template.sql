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
-- Table structure for table `mail_template`
--

DROP TABLE IF EXISTS `mail_template`;
CREATE TABLE IF NOT EXISTS `mail_template` (
  `HotelId` int(100) NOT NULL,
  `TemplateId` int(11) NOT NULL AUTO_INCREMENT,
  `template_header` varchar(100) NOT NULL,
  `Subject` varchar(10000) NOT NULL DEFAULT 'Template Subject',
  `Body` varchar(50000) NOT NULL DEFAULT 'Template Body',
  PRIMARY KEY (`TemplateId`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_template`
--

INSERT INTO `mail_template` (`HotelId`, `TemplateId`, `template_header`, `Subject`, `Body`) VALUES
(11, 1, 'Reservation Confirmation', 'Confirmed Reservation for {property_name}', 'Dear,\r\nWe are pleased to inform you that your reservation has been confirmed.The details are as follows:\r\n'),
(11, 2, 'Pre-Arrival email to Guest', '{Property_name} is awaiting your arrival', 'Thank you for choosing {Property_name} for your upcoming stay.'),
(11, 3, 'Arrival email to Guest', 'Welcome to {Property_name}!', 'Dear {Guest_name},\r\nOn behalf of our entire staff, we would like to welcome you to {Property_name}. We are honored that you have chosen to stay with us and look forward to providing you with a memorable experience.\r\n'),
(11, 7, 'Reservation modification', 'Template Subject', 'Template Body'),
(11, 5, 'Departure email to Guest', 'Thank you for staying with us :)', 'Dear {Guest_name},\r\nWe hope we achieved our goal of making your stay memorable by providing outstanding service.\r\nWe would love to hear your feedback. If you feel that there’s anything that needs to be brought to our immediate attention, please email us directly at {support_email}.\r\nWe use your feedback to review and improve our services every day so that we are able to maintain our exceptional service.\r\n'),
(11, 6, 'Reservation cancellation ', 'Cancelled Reservation for {property_name}', 'We are sorry to inform you that due to some unforeseeable circumstances, your reservation with reference number {reservation_id} at {Property_name} for date {arrival_date} has been cancelled.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
