-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 03:07 PM
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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `c_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `p_cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `c_id`) VALUES
(12, 2, '2021-05-26 11:55:54.970653', 'spinach', 'img4.jpg', 'img8.jpg', 'img7.jpg', 150, '<p>Grown without any chemicals|Right from farm to you|reasonable price|<p>', 22),
(13, 4, '2021-05-26 11:58:26.967201', 'elephant', 'img9.jpg', 'img10.jpg', 'img11.jpg', 200, '<p>Showpiece for your office and house|make your house look great|clay made|with hand drawn design|<p>', 23),
(24, 9, '2021-05-26 11:50:45.993578', 'mask ', 'mask_img1.jpg', 'mask-img3.jpg', 'mask_img1.jpg', 100, '<p>cotton 100%|best quality|elastic|environment friendly|<p>', 21),
(25, 2, '2021-05-26 07:42:02.000000', 'cake ', 'cake 1.jpg', 'cake 2.jpg', 'cake 3.jpg', 800, '<p>vanilla and strawberry flavour | eggless| no added brown sugar|</p>', 22),
(26, 3, '2021-05-26 08:30:20.000000', 'cargo pant', 'pant 1.jpg', 'pant 2.jpg', 'pant 3.jpg', 700, '<p>Cargo pant|Three different colors|Durable|</p>', 21),
(27, 2, '2021-05-26 08:34:49.000000', 'cake ', 'cake 2_1.jpg', 'cake 2_2.jpg', 'cake 2_3.jpg', 900, '<p>vanila|three level cake|party cake|</p>', 23),
(28, 4, '2021-05-26 08:36:40.000000', 'Ring', 'ring 1.jpg', 'ring 2.jpg', 'ring 3.jpg', 120, '<p>Duplicate wedding rings|metal finishing|stainless steel|</p>', 23),
(29, 9, '2021-05-26 08:40:27.000000', 'mask ', 'mask 2.jpg', 'mask 2_2.jpg', 'mask 2_3.png', 120, '<p>cotton mask|one time usable|non washable|</p>', 20),
(30, 3, '2021-05-26 08:41:59.000000', 'shirt', 'shirt 1.png', 'shirt 2.png', 'shirt 1.png', 499, '<p>denim shirt for womens|pure denim material|designer|</p>', 20),
(31, 3, '2021-05-26 08:44:06.000000', 'hoodie', 'hoodie 1.jpg', 'hoodie 2.jpg', 'hoodie 3.jpg', 799, '<p>100% cotton|long sleeve|graphic print|</p>', 20),
(32, 9, '2021-05-26 12:28:03.000000', 'Watch', 'watch 1.png', 'watch 2.png', 'watch 3.png', 750, '<p>water resistant|durable|strong build quality|suits your personality|</p>', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
