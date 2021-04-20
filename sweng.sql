-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2021 at 06:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sweng`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` varchar(32) DEFAULT NULL,
  `email_ad` varchar(128) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(128) NOT NULL,
  `dem_type` int(8) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `email_ad`, `password`, `name`, `dem_type`, `is_admin`) VALUES
('604a2fa2bf775', 'Test', '$2y$10$HW8Alka.Vb5O6XFR0tJuIeJVd.qSUc9cN/dvcR1crso/72mWsuxhO', 'Test', 0, 1),
('604a33f5ce021', 'Test@abc.com', '$2y$10$2CbHvOXO9cmqeOh.LXmekOkqmBF7KLSY7T6/T9y0ekgz.b24LjEhy', 'Test', 0, 0),
('604a2ba2cf829', 'Testing@abc.xyz', 'Fake', 'TestTwo', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admins_modules`
--

CREATE TABLE `admins_modules` (
  `account_id` varchar(128) DEFAULT NULL,
  `module_id` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins_modules`
--

INSERT INTO `admins_modules` (`account_id`, `module_id`) VALUES
('604a2fa2bf775', 'CSU123456'),
('604a2fa2bf775', 'CSU11011'),
('604a2fa2bf775', 'CSU22021');

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

CREATE TABLE `claims` (
  `claim_id` varchar(128) NOT NULL,
  `dem_id` varchar(128) DEFAULT NULL,
  `module_id` varchar(128) NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `duration` decimal(6,2) DEFAULT NULL,
  `claim_status` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`claim_id`, `dem_id`, `module_id`, `start_time`, `duration`, `claim_status`) VALUES
('123456789', '604a33f5ce021', 'CSU123456', '2021-02-18 14:00:00', '2.00', 2),
('6ab78c786a', '604a33f5ce021', 'CSU11011', '2021-02-19 10:00:00', '1.00', 2),
('689b78fda21', '604a33f5ce021', 'CSU22021', '2021-02-26 14:00:00', '3.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dems_modules`
--

CREATE TABLE `dems_modules` (
  `account_id` varchar(128) DEFAULT NULL,
  `module_id` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dems_modules`
--

INSERT INTO `dems_modules` (`account_id`, `module_id`) VALUES
('604a33f5ce021', 'CSU123456'),
('604a33f5ce021', 'CSU11011'),
('604a33f5ce021', 'CSU22021'),
('604a2ba2cf829', 'CSU123456'),
('604a2ba2cf829', 'CSU11011'),
('604a2ba2cf829', 'CSU22021');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` varchar(255) NOT NULL,
  `total_hours` decimal(10,2) NOT NULL,
  `unclaimed_hours` decimal(10,2) NOT NULL,
  `logged_hours` decimal(10,2) NOT NULL,
  `claimed_hours` decimal(10,2) NOT NULL,
  `submitted_hours` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `total_hours`, `unclaimed_hours`, `logged_hours`, `claimed_hours`, `submitted_hours`) VALUES
('CSU123456', '10.00', '3.00', '2.00', '2.00', '3.00'),
('CSU11011', '20.00', '5.00', '5.00', '5.00', '5.00'),
('CSU22021', '20.00', '8.00', '6.00', '2.00', '4.00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
