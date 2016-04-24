-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2016 at 01:52 PM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `problem`
--

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

DROP TABLE IF EXISTS `track`;
CREATE TABLE IF NOT EXISTS `track` (
  `problem_id` int(11) NOT NULL,
  `test_number` bigint(50) UNSIGNED NOT NULL,
  `test_answer` bigint(50) UNSIGNED NOT NULL,
  `total_runs` int(11) NOT NULL,
  PRIMARY KEY (`problem_id`,`test_number`,`test_answer`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`problem_id`, `test_number`, `test_answer`, `total_runs`) VALUES
(1, 1, 0, 1),
(3, 2, 2, 2),
(3, 600851475143, 6857, 2),
(5, 0, 1, 1),
(3, 2520, 7, 1),
(3, 20, 5, 1),
(3, 21, 7, 2),
(1, 2321, 1257828, 1),
(3, 9999999999, 9091, 1),
(3, 9999999, 4649, 1),
(1, 9999999, 23333321666669, 1),
(1, 99999999, 2333333216666700, 2),
(3, 999999999, 333667, 2),
(1, 999999999, 233333332166670016, 1),
(3, 221, 17, 1),
(3, 32321, 32321, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
