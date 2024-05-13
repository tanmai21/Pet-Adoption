-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 11:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bot`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `queries` varchar(300) NOT NULL,
  `replies` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`queries`, `replies`) VALUES
('My dog is cranky', 'Take it for a walk'),
('My dog is cranky', 'Take it for a walk'),
('My cat is vomiting the food', 'Just stop feeding it.'),
('My cat is vomiting the food', 'Just stop feeding it.'),
('How can I litter train my rabbit?', 'Just put a dustbin in its enclosure'),
('How can I litter train my rabbit?', 'Just put a dustbin in its enclosure');

-- --------------------------------------------------------

--
-- Table structure for table `slot`
--

CREATE TABLE `slot` (
  `date` int(11) NOT NULL,
  `slots` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slot`
--

INSERT INTO `slot` (`date`, `slots`) VALUES
(3, 0),
(4, 0),
(5, 0),
(6, 1),
(7, 0),
(8, 0),
(9, 1),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(18, 0),
(19, 1),
(20, 0),
(21, 1),
(22, 0),
(23, 0),
(24, 0),
(25, 1),
(26, 0),
(27, 1),
(28, 0),
(29, 0),
(30, 0),
(31, 1),
(3, 0),
(4, 0),
(5, 0),
(6, 1),
(7, 0),
(8, 0),
(9, 1),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(18, 0),
(19, 1),
(20, 0),
(21, 1),
(22, 0),
(23, 0),
(24, 0),
(25, 1),
(26, 0),
(27, 1),
(28, 0),
(29, 0),
(30, 0),
(31, 1),
(1, 1),
(2, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
