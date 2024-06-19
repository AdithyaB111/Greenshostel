-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 07, 2024 at 06:52 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

DROP TABLE IF EXISTS `ads`;
CREATE TABLE IF NOT EXISTS `ads` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `imgurl` text NOT NULL,
  `lon` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `confirm` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `email`, `name`, `imgurl`, `lon`, `lat`, `about`, `confirm`) VALUES
(10, 'l1@gmail.com', 'Homagama vila', 'https://www.stayokay.com/system/hostels/images/000/000/003/xlarge/Stayokay-Amsterdam-Vondelpark---TacoVanDerWerf-017.jpg', '80.028351', '6.829097', 'Location Longitude', 1),
(11, 'l1@gmail.com', 'Hostel gart', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1b/08/30/aa/room-no-103.jpg', '80.027210', '6.828796', 'des', 1),
(12, 'l1@gmail.com', 'lkash Hostel v', 'https://www.hotelashrey.in/img/gallery/image-19.jpg', '80.026169', '6.828293', 'wow', 1),
(4, 'l3@gmail.com', 'kamal Hostel B', 'https://www.cambridge.edu.in/wp-content/uploads/2020/12/CIT-139-768x509.jpg', '80.027429', '6.827311', 'vb', 1),
(14, 'l1@gmail.com', 'road map v', 'https://jumpberlin.com/wp-content/uploads/2017/12/Circus-Berlin46-1200x800.jpg', '80.025158', '6.829600', 'Road hostel', 1),
(15, 'l1@gmail.com', 'nsbm hostel', 'https://0e1f9520cfbb74a61ba4-0c2137d93f8d1ba7abe4c5e2888a558f.ssl.cf1.rackcdn.com/1494400362257DSC1010resize.jpeg', '80.032625', '6.819944', 'woow', 1);

-- --------------------------------------------------------

--
-- Table structure for table `landlords`
--

DROP TABLE IF EXISTS `landlords`;
CREATE TABLE IF NOT EXISTS `landlords` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneno` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `landlords`
--

INSERT INTO `landlords` (`id`, `username`, `email`, `phoneno`, `town`, `password`) VALUES
(1, 'samn23', 'l1@gmail.com', '1234567890', 'homagama', '2'),
(2, 'w', 'l2@gmail.com', '1234567890', 'pitipana', '3'),
(3, '4', 'l3@gmail.com', '1234567890', 'pitipana', '4'),
(4, '5', 'l4@gmail.com', '1234', 'maharagama', '5');

-- --------------------------------------------------------

--
-- Table structure for table `srequest`
--

DROP TABLE IF EXISTS `srequest`;
CREATE TABLE IF NOT EXISTS `srequest` (
  `id` int NOT NULL AUTO_INCREMENT,
  `lemail` varchar(255) NOT NULL,
  `semail` varchar(255) NOT NULL,
  `confirm` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `srequest`
--

INSERT INTO `srequest` (`id`, `lemail`, `semail`, `confirm`) VALUES
(1, 'l1@gmail.com', '1@gmail.com', 1),
(4, 'l2@gmail.com', '9@gmail.com', 0),
(5, 'l2@gmail.com', 'k@gmail.com', 0),
(6, 'l2@gmail.com', 'd@gmail.com', 0),
(7, 'l1@gmail.com', '8e@gmail.com', 0),
(8, 'l1@gmail.com', 'w@gmail.com', 1),
(9, '2@gmail.com', 'nipunaf18@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `email`, `password`) VALUES
(1, '1@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `warden`
--

DROP TABLE IF EXISTS `warden`;
CREATE TABLE IF NOT EXISTS `warden` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `warden`
--

INSERT INTO `warden` (`id`, `email`, `password`) VALUES
(1, 'w@gmail.com', 'w');

-- --------------------------------------------------------

--
-- Table structure for table `webadmin`
--

DROP TABLE IF EXISTS `webadmin`;
CREATE TABLE IF NOT EXISTS `webadmin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `webadmin`
--

INSERT INTO `webadmin` (`id`, `email`, `password`) VALUES
(1, 'web@gmail.com', 'web');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
