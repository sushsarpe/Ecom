-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 03:06 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homebusiness`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(100) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(50) NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(100) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_role` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`, `customer_role`) VALUES
(14, 'HEALTHCARE ORG', 'healthcare123@gmail.com', '123', 'mumbai', '02512311647', 'lower parel ,mumbai', 'healthcare.jpg', '::1', 3),
(17, 'JEVAN DHARA ', 'jevan@gmail.com', '1234', 'mumbai', '225 515 321', 'Maheshwari Nagar, Andheri (EAST) ,Mumbai', 'jd.jpg', '::1', 3),
(18, 'Mansi Pisat ', 'mansi@gmail.com', 'mansi', 'Navi Mumbai ', '8282828070', 'Thankarpada , Ansari  Chowk ,Navi Mumbai  ', 'yogita pisat.jpg', '::1', 1),
(19, 'Mandar Sase ', 'mandarsase@gmail.com', 'mandar', 'kalyan', '8433585626', 'kala talav, beturkarpada, Kalyan (west)', 'mandar.jpg', '::1', 1),
(20, 'ramesh patange', 'ramesh@gmail.com', 'ramesh', 'Dadar', '222333651', 'VS Agashe RD, Kabutar khana, Dadar ', 'img10.jpg', '::1', 2),
(21, 'rahul lambade', 'rahul@gmail.com', 'rahul', 'Navi Mumbai ', '8726111324', 'sector 23,Nerul ,Navi Mumbai', 'img10.jpg', '::1', 2),
(22, 'Dinesh Pardesi ', 'dinesh@gmail.com', 'dinesh', 'kalyan', '8467913572', 'kala talav, beturkarpada, Kalyan (west)', 'img10.jpg', '::1', 2),
(23, 'Vasu reddy ', 'vasu@gmail.com', 'vasu', 'Thane', '8764913521', 'Garden Estates, Manpada , Thane ', 'img10.jpg', '::1', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_email` (`customer_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
