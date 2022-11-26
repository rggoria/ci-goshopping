-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2022 at 05:57 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_order`
--

CREATE TABLE `table_order` (
  `order_id` int(11) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `product_image` varchar(250) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `order_status` varchar(50) NOT NULL DEFAULT 'PENDING',
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_order`
--

INSERT INTO `table_order` (`order_id`, `user_username`, `product_image`, `product_name`, `product_price`, `order_quantity`, `order_status`, `order_date`) VALUES
(1, 'RamTheGreat', 'Chicken.jpg', 'Chicken', 150, 10, 'PENDING', '2022-11-26 20:58:07'),
(2, 'EasyPheasy', 'Chicken.jpg', 'Chicken', 150, 10, 'SUCCESSFULL', '2022-11-26 21:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `table_product`
--

CREATE TABLE `table_product` (
  `product_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` varchar(50) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_category` varchar(50) NOT NULL,
  `product_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_product`
--

INSERT INTO `table_product` (`product_id`, `product_image`, `product_name`, `product_description`, `product_price`, `product_category`, `product_date`) VALUES
(1, 'Chicken.jpg', 'Chicken', '₱150 per kilo', '160', 'Poultry', '2022-11-26 20:53:17'),
(2, 'Teriyaki_Chicken.jpg', 'Teriyaki Chicken', 'Fresh Teriyaki Chicken', '175', 'Meat', '2022-11-26 21:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `table_transaction`
--

CREATE TABLE `table_transaction` (
  `transaction_id` int(11) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `transaction_balance` int(11) NOT NULL,
  `user_balance` int(10) NOT NULL,
  `transaction_status` varchar(10) NOT NULL,
  `transaction_discount` int(11) NOT NULL DEFAULT 0,
  `transaction_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_transaction`
--

INSERT INTO `table_transaction` (`transaction_id`, `user_username`, `transaction_balance`, `user_balance`, `transaction_status`, `transaction_discount`, `transaction_date`) VALUES
(1, 'EasyPheasy', 2147483647, 2147483647, 'DEPOSIT', 0, '2022-11-26 21:57:36'),
(2, 'EasyPheasy', 1500, 2147482147, 'WITHDRAW', 0, '2022-11-26 21:58:39');

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `user_id` int(11) NOT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_middlename` varchar(50) NOT NULL,
  `user_lastname` varchar(50) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_birthday` varchar(20) NOT NULL,
  `user_mobile` varchar(20) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_status` varchar(10) NOT NULL,
  `user_balance` int(11) NOT NULL DEFAULT 0,
  `user_address1` varchar(250) NOT NULL,
  `user_address2` varchar(250) NOT NULL,
  `user_city` varchar(250) NOT NULL,
  `user_zipcode` varchar(4) NOT NULL,
  `user_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`user_id`, `user_firstname`, `user_middlename`, `user_lastname`, `user_username`, `user_birthday`, `user_mobile`, `user_email`, `user_password`, `user_status`, `user_balance`, `user_address1`, `user_address2`, `user_city`, `user_zipcode`, `user_date`) VALUES
(1, '', '', '', 'admin', '', '', 'admin', 'admin', 'ADMIN', 0, '', '', '', '', '2022-11-26 13:41:08'),
(2, 'RamTheGreat', '', 'RamTheGreat', 'RamTheGreat', '', '', 'ramemersongoria.13.versus@gmail.com', '12345678', 'USER', 0, '', '', '', '', '0000-00-00 00:00:00'),
(3, 'Antonio', '', 'Manila', 'EasyPheasy', '', '', 'manilaronquillo@gmail.com', '12345678', 'USER', 2147482147, '', '', '', '', '0000-00-00 00:00:00'),
(4, 'Antonio ', '', 'Manila', 'A3Jayy', '', '', 'manilaajr.csabinan@gmail.com', '12345678', 'USER', 0, '', '', '', '', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_order`
--
ALTER TABLE `table_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `table_product`
--
ALTER TABLE `table_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `table_transaction`
--
ALTER TABLE `table_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_order`
--
ALTER TABLE `table_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_product`
--
ALTER TABLE `table_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_transaction`
--
ALTER TABLE `table_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_user`
--
ALTER TABLE `table_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
