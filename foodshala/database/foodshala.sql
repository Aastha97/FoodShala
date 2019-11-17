-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 17, 2019 at 11:12 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_tbl`
--

DROP TABLE IF EXISTS `customer_tbl`;
CREATE TABLE IF NOT EXISTS `customer_tbl` (
  `c_id` int(3) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(30) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `c_username` varchar(30) NOT NULL,
  `c_password` varchar(50) NOT NULL,
  `is_nonveg` tinyint(1) NOT NULL,
  PRIMARY KEY (`c_id`),
  UNIQUE KEY `c_username` (`c_username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_tbl`
--

INSERT INTO `customer_tbl` (`c_id`, `c_name`, `c_address`, `c_username`, `c_password`, `is_nonveg`) VALUES
(1, 'Shruti', 'K-216, DA-IICT, Gandhinagar', 'shruti', '674f3c2c1a8a6f90461e8a66fb5550ba', 0),
(2, 'Ajay', 'A-209, HOR men, NICM, Gandhinagar', 'ajay', 'f38fef4c0e4988792723c29a0bd3ca98', 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_item_tbl`
--

DROP TABLE IF EXISTS `food_item_tbl`;
CREATE TABLE IF NOT EXISTS `food_item_tbl` (
  `f_id` int(7) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(30) NOT NULL,
  `f_price` float NOT NULL,
  `is_nonveg` tinyint(1) NOT NULL,
  `r_id` int(3) NOT NULL,
  PRIMARY KEY (`f_id`),
  KEY `r_id` (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_item_tbl`
--

INSERT INTO `food_item_tbl` (`f_id`, `f_name`, `f_price`, `is_nonveg`, `r_id`) VALUES
(1, 'Pineapple cake', 150, 0, 1),
(2, 'Egg Pineapple cake', 170, 1, 1),
(3, 'Chocolate cake', 200, 0, 1),
(4, 'Noodles', 70, 0, 2),
(5, 'Chicken Noddles', 140, 1, 2),
(6, 'Manchurian', 100, 0, 2),
(7, 'Prawns', 250, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

DROP TABLE IF EXISTS `order_tbl`;
CREATE TABLE IF NOT EXISTS `order_tbl` (
  `order_id` int(7) NOT NULL AUTO_INCREMENT,
  `c_id` int(3) NOT NULL,
  `f_id` int(7) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `c_id` (`c_id`),
  KEY `f_id` (`f_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`order_id`, `c_id`, `f_id`) VALUES
(1, 1, 1),
(2, 1, 6),
(3, 2, 2),
(4, 2, 7),
(5, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_tbl`
--

DROP TABLE IF EXISTS `restaurant_tbl`;
CREATE TABLE IF NOT EXISTS `restaurant_tbl` (
  `r_id` int(3) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(30) NOT NULL,
  `r_address` varchar(255) NOT NULL,
  `r_owner_name` varchar(30) NOT NULL,
  `r_username` varchar(30) NOT NULL,
  `r_password` varchar(50) NOT NULL,
  PRIMARY KEY (`r_id`),
  UNIQUE KEY `username` (`r_username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_tbl`
--

INSERT INTO `restaurant_tbl` (`r_id`, `r_name`, `r_address`, `r_owner_name`, `r_username`, `r_password`) VALUES
(1, 'Aastha Bakery', '4-A, Block no.3, Vadodara', 'Aastha', 'aastha', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'China Town', '49/P, Agra Cantt, Agra', 'Aman', 'chinatown', 'd93591bdf7860e1e4ee2fca799911215');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
