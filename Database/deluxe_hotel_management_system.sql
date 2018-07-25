-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 12, 2017 at 07:33 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `id3166825_id3166825_deluxe_hotel_management_system`
--
CREATE DATABASE IF NOT EXISTS `id3166825_deluxe_hotel_management_system` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `id3166825_deluxe_hotel_management_system`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE IF NOT EXISTS `admin_details` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `user_type` varchar(5) DEFAULT NULL,
  `admin_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`username`, `password`, `user_type`, `admin_id`) VALUES
('solomonaleka', 'susannoo@1', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE IF NOT EXISTS `booking_details` (
  `first_name` varchar(25) NOT NULL,
  `hotel_name` varchar(50) NOT NULL,
  `room_type` varchar(30) NOT NULL,
  `fixed_charge` decimal(6,2) NOT NULL,
  `booking_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `second_name` varchar(25) NOT NULL,
  `room_number` smallint(6) NOT NULL,
  `time_of_booking` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `check_in_date` text NOT NULL,
  `check_out_date` text NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=138 ;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`first_name`, `hotel_name`, `room_type`, `fixed_charge`, `booking_id`, `second_name`, `room_number`, `time_of_booking`, `check_in_date`, `check_out_date`) VALUES
('Mercy', 'Avari Hotels', 'VIP room', '1600.00', 128, 'Mukosia', 42, '2017-06-09 16:25:10', '06/10/2017', '06/11/2017'),
('Susan', 'Avari Hotels', 'Superior double room', '1200.00', 134, 'Nthenya', 121, '2017-06-10 06:07:24', '06/10/2017', '06/11/2017'),
('Nathaniel', 'Avari Hotels', 'VIP room', '1600.00', 135, 'Achevi', 31, '2017-06-12 05:54:52', '06/12/2017', '06/15/2017'),
('Susan', 'Avari Hotels', 'VIP room', '1600.00', 136, 'Nthenya', 32, '2017-06-12 06:00:29', '06/12/2017', '06/15/2017'),
('Lucy', 'Avari Hotels', 'Family Room', '1300.00', 137, 'Mukhavi', 126, '2017-06-12 06:16:55', '06/12/2017', '06/15/2017');

-- --------------------------------------------------------

--
-- Table structure for table `city_details`
--

CREATE TABLE IF NOT EXISTS `city_details` (
  `city_id` smallint(6) NOT NULL,
  `city_name` varchar(30) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_details`
--

INSERT INTO `city_details` (`city_id`, `city_name`) VALUES
(20000, 'Nairobi'),
(20001, 'Mombasa'),
(20002, 'Kisumu'),
(20003, 'Nakuru');

-- --------------------------------------------------------

--
-- Table structure for table `commission_details`
--

CREATE TABLE IF NOT EXISTS `commission_details` (
  `hotel_name` varchar(50) NOT NULL,
  `standard_single` decimal(6,2) NOT NULL,
  `superior_single` decimal(6,2) NOT NULL,
  `standard_double` decimal(6,2) NOT NULL,
  `superior_double` decimal(6,2) NOT NULL,
  `family_room` decimal(6,2) NOT NULL,
  `vip_room` decimal(6,2) NOT NULL,
  `commission_id` smallint(6) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`commission_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `commission_details`
--

INSERT INTO `commission_details` (`hotel_name`, `standard_single`, `superior_single`, `standard_double`, `superior_double`, `family_room`, `vip_room`, `commission_id`) VALUES
('Avari Hotels', '900.00', '1000.00', '1100.00', '1200.00', '1300.00', '1600.00', 1),
('Aloft Hotels', '800.00', '900.00', '1000.00', '1100.00', '1200.00', '1500.00', 2),
('Choice Hotels', '1000.00', '1100.00', '1200.00', '1300.00', '1400.00', '1700.00', 3),
('Clarion Hotels', '700.00', '800.00', '900.00', '1000.00', '1100.00', '1400.00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE IF NOT EXISTS `contact_details` (
  `email_address` varchar(50) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `message` varchar(200) NOT NULL,
  `contact_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`email_address`, `phone_number`, `message`, `contact_id`, `first_name`) VALUES
('mercymukosia@gmail.com', 713787314, 'Average', 8, 'Mercy'),
('nathanachevi@gmail.com', 789988713, 'Good', 9, 'Adija');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_details`
--

CREATE TABLE IF NOT EXISTS `hotel_details` (
  `hotel_name` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `city_id` smallint(6) NOT NULL,
  `hotel_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`hotel_id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hotel_details`
--

INSERT INTO `hotel_details` (`hotel_name`, `email_address`, `city_id`, `hotel_id`) VALUES
('Avari Hotels', 'avarihotel@gmail.com', 20000, 1),
('Aloft Hotels', 'alofthotels@gmail.com', 20001, 2),
('Choice Hotels', 'choicehotels@gmail.com', 20002, 3),
('Clarion Hotels', 'clarionhotels@gmail.com', 20003, 4);

-- --------------------------------------------------------

--
-- Table structure for table `room_details`
--

CREATE TABLE IF NOT EXISTS `room_details` (
  `hotel_name` varchar(30) NOT NULL,
  `room_type` varchar(30) NOT NULL,
  `room_number` smallint(6) NOT NULL,
  `room_id` smallint(6) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=145 ;

--
-- Dumping data for table `room_details`
--

INSERT INTO `room_details` (`hotel_name`, `room_type`, `room_number`, `room_id`) VALUES
('Avari Hotels', 'Family Room', 23, 3),
('Avari Hotels', 'Family Room', 24, 6),
('Avari Hotels', 'Standard Single Room', 2, 12),
('Avari Hotels', 'Standard Single Room', 3, 13),
('Avari Hotels', 'Standard Single Room', 4, 14),
('Avari Hotels', 'Standard Single Room', 5, 15),
('Avari Hotels', 'Superior Single Room', 7, 17),
('Avari Hotels', 'Superior Single Room', 8, 18),
('Avari Hotels', 'Superior Single Room', 9, 19),
('Avari Hotels', 'Superior Single Room', 10, 20),
('Avari Hotels', 'Standard Double Room', 13, 23),
('Avari Hotels', 'Standard Double Room', 14, 24),
('Avari Hotels', 'Standard Double Room', 15, 25),
('Avari Hotels', 'Superior Double Room', 19, 29),
('Avari Hotels', 'Superior Double Room', 20, 30),
('Avari Hotels', 'VIP Room', 27, 32),
('Avari Hotels', 'VIP Room', 28, 33),
('Avari Hotels', 'VIP Room', 29, 34),
('Avari Hotels', 'VIP Room', 30, 35),
('Avari Hotels', 'Family Room', 22, 40),
('Avari Hotels', 'Superior Double Room', 16, 42),
('Avari Hotels', 'Superior Double Room', 17, 51),
('Avari Hotels', 'Superior Double Room', 18, 52),
('Avari Hotels', 'VIP Room', 26, 54),
('Avari Hotels', 'VIP Room', 47, 71),
('Avari Hotels', 'VIP Room', 48, 72),
('Avari Hotels', 'Superior Single Room', 6, 76),
('Avari Hotels', 'Family Room', 25, 78),
('Avari Hotels', 'VIP Room', 49, 91),
('Avari Hotels', 'Standard Single Room', 1, 92),
('Avari Hotels', 'VIP Room', 50, 93),
('Avari Hotels', 'Family Room', 21, 95),
('Avari Hotels', 'Standard Double Room', 11, 96),
('Avari Hotels', 'Standard Double Room', 12, 97),
('Avari Hotels', 'VIP Room', 33, 100),
('Avari Hotels', 'VIP Room', 34, 101),
('Avari Hotels', 'VIP Room', 35, 102),
('Avari Hotels', 'VIP Room', 36, 103),
('Avari Hotels', 'VIP Room', 37, 104),
('Avari Hotels', 'VIP Room', 38, 105),
('Avari Hotels', 'VIP Room', 39, 106),
('Avari Hotels', 'VIP Room', 40, 107),
('Avari Hotels', 'VIP Room', 41, 108),
('Avari Hotels', 'VIP Room', 42, 109),
('Avari Hotels', 'VIP Room', 43, 110),
('Avari Hotels', 'VIP Room', 44, 111),
('Avari Hotels', 'VIP Room', 45, 112),
('Avari Hotels', 'VIP Room', 46, 113),
('Avari Hotels', 'Standard Single Room', 100, 114),
('Avari Hotels', 'Standard Single Room', 101, 115),
('Avari Hotels', 'Standard Single Room', 102, 116),
('Avari Hotels', 'Standard Single Room', 103, 117),
('Avari Hotels', 'Standard Single Room', 104, 118),
('Avari Hotels', 'Standard Single Room', 105, 119),
('Avari Hotels', 'Superior Single Room', 106, 120),
('Avari Hotels', 'Superior Single Room', 107, 121),
('Avari Hotels', 'Superior Single Room', 108, 122),
('Avari Hotels', 'Superior Single Room', 109, 123),
('Avari Hotels', 'Superior Single Room', 110, 124),
('Avari Hotels', 'Standard Single Room', 111, 125),
('Avari Hotels', 'Standard Single Room', 112, 126),
('Avari Hotels', 'Standard Single Room', 113, 127),
('Avari Hotels', 'Standard Single Room', 114, 128),
('Avari Hotels', 'Standard Single Room', 115, 129),
('Avari Hotels', 'Standard Double Room', 116, 130),
('Avari Hotels', 'Standard Double Room', 117, 131),
('Avari Hotels', 'Standard Double Room', 118, 132),
('Avari Hotels', 'Standard Double Room', 119, 133),
('Avari Hotels', 'Standard Double Room', 120, 134),
('Avari Hotels', 'Superior Double Room', 122, 136),
('Avari Hotels', 'Superior Double Room', 123, 137),
('Avari Hotels', 'Superior Double Room', 124, 138),
('Avari Hotels', 'Superior Double Room', 125, 139),
('Avari Hotels', 'Family Room', 127, 141),
('Avari Hotels', 'Family Room', 128, 142),
('Avari Hotels', 'Family Room', 129, 143),
('Avari Hotels', 'Family Room', 130, 144);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `first_name` varchar(25) NOT NULL,
  `second_name` varchar(25) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `user_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`first_name`, `second_name`, `phone_no`, `email_address`, `gender`, `username`, `password`, `user_id`) VALUES
('Lucy', 'Mukhavi', 789988998, 'lucymukhavi@gmail.com', 'Female', 'kalucy', 'kalucy@1', 15),
('Mercy', 'Mukosia', 2147483647, 'mercymukosia@gmail.com', 'Male', 'tinashe', 'tinashe@1', 17),
('Samuel', 'Victor', 789877871, 'samuelvictor@gmail.com', 'Male', 'samueli', 'samueli@1', 18),
('Nathaniel', 'Achevi', 789877876, 'nathanielachevi@gmail.com', 'Male', 'natho', 'nathanieli@1', 20),
('Susan', 'Nthenya', 701043568, 'susannthenya@gmail.com', 'Female', 'susy', 'faithstrong', 21),
('Barnabas', 'Ngati', 725912152, 'barnabasngati@gmail.com', 'Male', 'luka', 'miracleGod', 22);

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE IF NOT EXISTS `user_log` (
  `username` varchar(25) NOT NULL,
  `login_date` date NOT NULL,
  `login_time` time NOT NULL,
  `log_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`username`, `login_date`, `login_time`, `log_id`) VALUES
('natho', '2017-06-06', '14:31:23', 1),
('natho', '2017-06-07', '10:31:59', 2),
('solomonaleka', '2017-06-08', '23:28:06', 3),
('natho', '2017-06-08', '23:28:20', 4),
('kalucy', '2017-06-08', '23:43:58', 5),
('natho', '2017-06-08', '23:52:39', 6),
('tinashe', '2017-06-08', '23:55:55', 7),
('solomonaleka', '2017-06-09', '16:32:35', 8),
('natho', '2017-06-09', '16:33:05', 9),
('natho', '2017-06-09', '16:34:33', 10),
('solomonaleka', '2017-06-09', '19:15:40', 11),
('natho', '2017-06-09', '19:16:47', 12),
('natho', '2017-06-09', '19:33:20', 13),
('natho', '2017-06-09', '19:59:36', 14),
('solomonaleka', '2017-06-09', '20:03:14', 15),
('natho', '2017-06-09', '20:07:05', 16),
('natho', '2017-06-10', '06:53:30', 17),
('tinashe', '2017-06-10', '08:36:51', 18),
('luka', '2017-06-10', '09:02:23', 19),
('natho', '2017-06-12', '08:46:27', 20),
('natho', '2017-06-12', '08:59:21', 21);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel_details`
--
ALTER TABLE `hotel_details`
  ADD CONSTRAINT `hotel_details_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city_details` (`city_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
