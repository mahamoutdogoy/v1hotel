-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2019 at 01:11 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mytravaly`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `addressid` int(100) NOT NULL AUTO_INCREMENT,
  `ownerid` varchar(100) NOT NULL,
  `property_id` int(100) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `map_address` varchar(200) NOT NULL,
  PRIMARY KEY (`addressid`),
  KEY `ownerid` (`ownerid`),
  KEY `propertyid` (`property_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `address`
--


-- --------------------------------------------------------

--
-- Table structure for table `agreement`
--

CREATE TABLE IF NOT EXISTS `agreement` (
  `agreement_id` int(100) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) DEFAULT NULL,
  `effective_date` date DEFAULT NULL,
  `hotel_name` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `if_to_hotelName` varchar(100) NOT NULL,
  `if_to_address` varchar(100) NOT NULL,
  `individual_Name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `signature` longblob NOT NULL,
  PRIMARY KEY (`agreement_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `agreement`
--


-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE IF NOT EXISTS `amenities` (
  `amenity_id` int(11) NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `amenities` varchar(500) NOT NULL,
  PRIMARY KEY (`amenity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `amenities`
--


-- --------------------------------------------------------

--
-- Table structure for table `arrival_info`
--

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


-- --------------------------------------------------------

--
-- Table structure for table `bankdetails`
--

CREATE TABLE IF NOT EXISTS `bankdetails` (
  `user_id` varchar(50) NOT NULL,
  `property_id` int(11) NOT NULL,
  `bankname` varchar(100) NOT NULL,
  `beneficiaryname` varchar(100) NOT NULL,
  `accounttype` varchar(50) NOT NULL,
  `accnumber` varchar(50) NOT NULL,
  `ifsc` varchar(50) NOT NULL,
  `swiftcode` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankdetails`
--


-- --------------------------------------------------------

--
-- Table structure for table `change_bankdetails`
--

CREATE TABLE IF NOT EXISTS `change_bankdetails` (
  `user_id` varchar(50) NOT NULL,
  `property_id` int(11) NOT NULL,
  `bankname` varchar(100) NOT NULL,
  `beneficiaryname` varchar(100) NOT NULL,
  `accounttype` varchar(50) NOT NULL,
  `accnumber` varchar(50) NOT NULL,
  `ifsc` varchar(50) NOT NULL,
  `swiftcode` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `cancelcheque` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `change_bankdetails`
--


-- --------------------------------------------------------

--
-- Table structure for table `channel_details`
--

CREATE TABLE IF NOT EXISTS `channel_details` (
  `channel_id` int(100) NOT NULL AUTO_INCREMENT,
  `propertyid` int(100) NOT NULL,
  `channel_name` varchar(200) NOT NULL,
  `secret_key` varchar(200) NOT NULL,
  `api_key` varchar(200) NOT NULL,
  `roomtype` varchar(100) NOT NULL,
  PRIMARY KEY (`channel_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `channel_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `departure_info`
--

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


-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `user_id` varchar(50) NOT NULL,
  `property_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `in_certificate` longblob NOT NULL,
  `tax_certificate` longblob NOT NULL,
  `pan_identifcation` longblob NOT NULL,
  `cancel_cheque` longblob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `documents`
--


-- --------------------------------------------------------

--
-- Table structure for table `domestic_registration`
--

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `domestic_registration`
--


-- --------------------------------------------------------

--
-- Table structure for table `for_hotel_use`
--

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


-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `image` longblob NOT NULL,
  `image_id` int(50) NOT NULL AUTO_INCREMENT,
  `image_type` varchar(50) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `images`
--


-- --------------------------------------------------------

--
-- Table structure for table `international_registration`
--

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `international_registration`
--


-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `invoice`
--


-- --------------------------------------------------------

--
-- Table structure for table `mail_template`
--

CREATE TABLE IF NOT EXISTS `mail_template` (
  `HotelId` int(100) NOT NULL,
  `TemplateId` int(11) NOT NULL AUTO_INCREMENT,
  `template_header` varchar(100) NOT NULL,
  `Subject` varchar(10000) NOT NULL DEFAULT 'Template Subject',
  `Body` varchar(50000) NOT NULL DEFAULT 'Template Body',
  PRIMARY KEY (`TemplateId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

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

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `managerid` int(100) NOT NULL AUTO_INCREMENT,
  `managername` varchar(100) NOT NULL,
  `manageremail` varchar(100) NOT NULL,
  `managerphone` varchar(100) NOT NULL,
  PRIMARY KEY (`managerid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `manager`
--


-- --------------------------------------------------------

--
-- Table structure for table `mapping_images`
--

CREATE TABLE IF NOT EXISTS `mapping_images` (
  `property_id` int(50) NOT NULL,
  `room_id` int(50) NOT NULL,
  `image_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapping_images`
--


-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE IF NOT EXISTS `owner` (
  `ownerid` varchar(100) NOT NULL,
  `property_id` int(100) NOT NULL,
  `ownername` varchar(100) NOT NULL,
  `owneremail` varchar(100) NOT NULL,
  `ownerphone` varchar(100) NOT NULL,
  PRIMARY KEY (`ownerid`),
  KEY `propertyid` (`property_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--


-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE IF NOT EXISTS `policies` (
  `property_id` int(11) NOT NULL,
  `cancel_policy` varchar(300) NOT NULL,
  `refund_policy` varchar(300) NOT NULL,
  `child_policy` varchar(300) NOT NULL,
  `damage_policy` varchar(300) NOT NULL,
  `property_restriction` varchar(500) NOT NULL,
  `pets_allowed` varchar(50) NOT NULL,
  `couple_friendly` varchar(50) NOT NULL,
  `suitable_for_children` varchar(50) NOT NULL,
  `bachulars_allowed` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policies`
--


-- --------------------------------------------------------

--
-- Table structure for table `propertydetails`
--

CREATE TABLE IF NOT EXISTS `propertydetails` (
  `user_id` varchar(60) NOT NULL,
  `property_id` int(100) NOT NULL AUTO_INCREMENT,
  `ownerid` varchar(100) NOT NULL,
  `property_name` varchar(100) NOT NULL,
  `star` int(100) NOT NULL,
  `property_image` longblob NOT NULL,
  `propertytype` varchar(100) NOT NULL,
  `chainname` varchar(100) NOT NULL,
  `establishment` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `checkin` time DEFAULT NULL,
  `checkout` time DEFAULT NULL,
  `description` text NOT NULL,
  `Rating` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`property_id`),
  KEY `ownerid` (`ownerid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `propertydetails`
--


-- --------------------------------------------------------

--
-- Table structure for table `property_score`
--

CREATE TABLE IF NOT EXISTS `property_score` (
  `property_id` varchar(20) NOT NULL,
  `property_score` int(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_score`
--


-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `p_r_id` varchar(50) NOT NULL,
  `reservationId` int(100) NOT NULL AUTO_INCREMENT,
  `property_id` int(110) NOT NULL,
  `room_id` int(110) NOT NULL,
  `inventory_id` varchar(1000) NOT NULL,
  `folio_id` int(110) NOT NULL,
  `guestName` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `phoneNo` bigint(110) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `nights` int(220) DEFAULT NULL,
  `meal_plan` varchar(1000) NOT NULL DEFAULT 'AP',
  `noOfAdults` int(110) NOT NULL DEFAULT '1',
  `noOfChildren` int(110) NOT NULL DEFAULT '0',
  `noOfExtraperson` int(220) NOT NULL DEFAULT '0',
  `received_amount` float NOT NULL DEFAULT '0',
  `price` float DEFAULT '0',
  `tax` float NOT NULL DEFAULT '0',
  `total` float NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '2' COMMENT '0->booking closed;1->conform;2->pending;',
  `channel` varchar(1000) DEFAULT NULL,
  `payment_status` varchar(1000) DEFAULT NULL,
  `payment_mode` varchar(1000) DEFAULT NULL,
  `payment_type` varchar(1000) DEFAULT NULL,
  `payment_reference` varchar(1000) DEFAULT NULL,
  `internal_note` varchar(1000) DEFAULT NULL,
  `createdBy` varchar(1000) DEFAULT NULL,
  `pending_upto` date DEFAULT NULL,
  `reservationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`reservationId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `reservation`
--


-- --------------------------------------------------------

--
-- Table structure for table `reservationmanager`
--

CREATE TABLE IF NOT EXISTS `reservationmanager` (
  `resid` int(100) NOT NULL AUTO_INCREMENT,
  `ownerid` varchar(100) NOT NULL,
  `resname` varchar(100) NOT NULL,
  `resemail` varchar(100) NOT NULL,
  `resphone` varchar(100) NOT NULL,
  `keywords` varchar(100) NOT NULL,
  PRIMARY KEY (`resid`),
  KEY `ownerid` (`ownerid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `reservationmanager`
--


-- --------------------------------------------------------

--
-- Table structure for table `rooms_detail`
--

CREATE TABLE IF NOT EXISTS `rooms_detail` (
  `user_id` varchar(70) NOT NULL,
  `property_id` int(50) NOT NULL,
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_r_id` varchar(50) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `min_occupancy` int(11) NOT NULL DEFAULT '1',
  `max_occupancy` int(11) NOT NULL,
  `max_occupancy_child` int(20) NOT NULL,
  `tariff` varchar(50) NOT NULL,
  `inventory` varchar(50) NOT NULL,
  KEY `room_id` (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rooms_detail`
--


-- --------------------------------------------------------

--
-- Table structure for table `rooms_details`
--

CREATE TABLE IF NOT EXISTS `rooms_details` (
  `user_id` varchar(70) NOT NULL,
  `property_id` int(50) NOT NULL,
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `min_occupancy` int(11) NOT NULL DEFAULT '1',
  `max_occupancy` int(11) NOT NULL,
  `tariff` varchar(50) NOT NULL,
  `inventory` varchar(50) NOT NULL,
  `meal_plan` varchar(50) NOT NULL,
  `singleprice` double NOT NULL DEFAULT '0',
  `doubleprice` double NOT NULL DEFAULT '0',
  `tripleprice` double NOT NULL DEFAULT '0',
  `person4price` double NOT NULL DEFAULT '0',
  `person5price` double NOT NULL DEFAULT '0',
  `person6price` double NOT NULL DEFAULT '0',
  `person7price` double NOT NULL DEFAULT '0',
  `person8price` double NOT NULL DEFAULT '0',
  `person9price` double NOT NULL DEFAULT '0',
  `person10price` double NOT NULL DEFAULT '0',
  `person11price` double NOT NULL DEFAULT '0',
  `person12price` double NOT NULL DEFAULT '0',
  `person13price` double NOT NULL DEFAULT '0',
  `person14price` double NOT NULL DEFAULT '0',
  `person15price` double NOT NULL DEFAULT '0',
  `extrapersonprice` double NOT NULL DEFAULT '0',
  `extrachildprice` double NOT NULL DEFAULT '0',
  `infantprice` double NOT NULL DEFAULT '0',
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Available',
  KEY `room_id` (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rooms_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `rooms_inventory`
--

CREATE TABLE IF NOT EXISTS `rooms_inventory` (
  `user_id` varchar(70) NOT NULL,
  `p_r_id` varchar(50) NOT NULL,
  `property_id` int(50) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `room_sub_id` varchar(50) NOT NULL,
  `check_in` date DEFAULT NULL,
  `check_out` date DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms_inventory`
--


-- --------------------------------------------------------

--
-- Table structure for table `rooms_offers`
--

CREATE TABLE IF NOT EXISTS `rooms_offers` (
  `user_id` varchar(50) NOT NULL,
  `property_id` int(50) NOT NULL,
  `room_id` int(50) NOT NULL,
  `p_r_id` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `meal_plan` varchar(50) NOT NULL,
  `singleprice` double NOT NULL DEFAULT '0',
  `doubleprice` double NOT NULL DEFAULT '0',
  `tripleprice` double NOT NULL DEFAULT '0',
  `person4price` double NOT NULL DEFAULT '0',
  `person5price` double NOT NULL DEFAULT '0',
  `person6price` double NOT NULL DEFAULT '0',
  `person7price` double NOT NULL DEFAULT '0',
  `person8price` double NOT NULL DEFAULT '0',
  `person9price` double NOT NULL DEFAULT '0',
  `person10price` double NOT NULL DEFAULT '0',
  `person11price` double NOT NULL DEFAULT '0',
  `person12price` double NOT NULL DEFAULT '0',
  `person13price` double NOT NULL DEFAULT '0',
  `person14price` double NOT NULL DEFAULT '0',
  `person15price` double NOT NULL DEFAULT '0',
  `extrapersonprice` double NOT NULL DEFAULT '0',
  `extrachildprice` double NOT NULL DEFAULT '0',
  `infantprice` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms_offers`
--


-- --------------------------------------------------------

--
-- Table structure for table `rooms_tariff`
--

CREATE TABLE IF NOT EXISTS `rooms_tariff` (
  `user_id` varchar(70) NOT NULL,
  `property_id` int(50) NOT NULL,
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_r_id` varchar(50) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `meal_plan` varchar(50) NOT NULL,
  `singleprice` double NOT NULL DEFAULT '0',
  `doubleprice` double NOT NULL DEFAULT '0',
  `tripleprice` double NOT NULL DEFAULT '0',
  `person4price` double NOT NULL DEFAULT '0',
  `person5price` double NOT NULL DEFAULT '0',
  `person6price` double NOT NULL DEFAULT '0',
  `person7price` double NOT NULL DEFAULT '0',
  `person8price` double NOT NULL DEFAULT '0',
  `person9price` double NOT NULL DEFAULT '0',
  `person10price` double NOT NULL DEFAULT '0',
  `person11price` double NOT NULL DEFAULT '0',
  `person12price` double NOT NULL DEFAULT '0',
  `person13price` double NOT NULL DEFAULT '0',
  `person14price` double NOT NULL DEFAULT '0',
  `person15price` double NOT NULL DEFAULT '0',
  `extrapersonprice` double NOT NULL DEFAULT '0',
  `extrachildprice` double NOT NULL DEFAULT '0',
  `infantprice` double NOT NULL DEFAULT '0',
  KEY `room_id` (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rooms_tariff`
--


-- --------------------------------------------------------

--
-- Table structure for table `rooms_tax`
--

CREATE TABLE IF NOT EXISTS `rooms_tax` (
  `user_id` varchar(70) NOT NULL,
  `property_id` int(50) NOT NULL,
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(50) NOT NULL,
  `meal_plan` varchar(50) NOT NULL,
  `singletax` double NOT NULL DEFAULT '0',
  `doubletax` double NOT NULL DEFAULT '0',
  `tripletax` double NOT NULL DEFAULT '0',
  `person4tax` double NOT NULL DEFAULT '0',
  `person5tax` double NOT NULL DEFAULT '0',
  `person6tax` double NOT NULL DEFAULT '0',
  `person7tax` double NOT NULL DEFAULT '0',
  `person8tax` double NOT NULL DEFAULT '0',
  `person9tax` double NOT NULL DEFAULT '0',
  `person10tax` double NOT NULL DEFAULT '0',
  `person11tax` double NOT NULL DEFAULT '0',
  `person12tax` double NOT NULL DEFAULT '0',
  `person13tax` double NOT NULL DEFAULT '0',
  `person14tax` double NOT NULL DEFAULT '0',
  `person15tax` double NOT NULL DEFAULT '0',
  `extrapersontax` double NOT NULL DEFAULT '0',
  `extrachildtax` double NOT NULL DEFAULT '0',
  `infanttax` double NOT NULL DEFAULT '0',
  KEY `room_id` (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rooms_tax`
--


-- --------------------------------------------------------

--
-- Table structure for table `setting_invoice`
--

CREATE TABLE IF NOT EXISTS `setting_invoice` (
  `setting_invoice_id` int(100) NOT NULL AUTO_INCREMENT,
  `property_name` varchar(100) NOT NULL,
  `property_address` varchar(100) NOT NULL,
  `logo` longblob NOT NULL,
  `tax_gst` varchar(100) NOT NULL,
  `invoice_prefix` varchar(100) NOT NULL,
  `currency` varchar(100) NOT NULL,
  PRIMARY KEY (`setting_invoice_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `setting_invoice`
--


-- --------------------------------------------------------

--
-- Table structure for table `sharer_occupants`
--

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

