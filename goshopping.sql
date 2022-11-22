-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 07:55 PM
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
(2, 'RamTheGreat', 'http://cdn.shopify.com/s/files/1/0260/6877/9066/products/304482_81bd0f1d-3b7e-42fe-a1de-07db12443361.jpg?v=1657595360', 'Chicken da bod', 19, 8, 'PENDING', '2022-11-22 22:29:12'),
(3, 'RamTheGreat', 'http://cdn.shopify.com/s/files/1/0260/6877/9066/products/304482_81bd0f1d-3b7e-42fe-a1de-07db12443361.jpg?v=1657595360', 'Chicken', 19, 2, 'PENDING', '2022-11-22 22:42:20'),
(4, 'RamTheGreat', 'http://cdn.shopify.com/s/files/1/0260/6877/9066/products/636918_f08e0b6b-1bd1-4dad-9736-5414355653aa.jpg?v=1642779028', 'Turkey', 20, 1, 'PENDING', '2022-11-22 22:48:01'),
(5, 'RamTheGreat', 'http://cdn.shopify.com/s/files/1/0260/6877/9066/products/304482_81bd0f1d-3b7e-42fe-a1de-07db12443361.jpg?v=1657595360', 'Chicken', 19, 6, 'CANCELLED', '2022-11-22 22:48:50');

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
  `product_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_product`
--

INSERT INTO `table_product` (`product_id`, `product_image`, `product_name`, `product_description`, `product_price`, `product_category`, `product_date`) VALUES
(1, 'http://cdn.shopify.com/s/files/1/0260/6877/9066/products/304482_81bd0f1d-3b7e-42fe-a1de-07db12443361.jpg?v=1657595360', 'Chicken', 'Price: ₱252/kilo', '19', 'Meat', '2022-11-12'),
(2, 'http://cdn.shopify.com/s/files/1/0260/6877/9066/products/636918_f08e0b6b-1bd1-4dad-9736-5414355653aa.jpg?v=1642779028', 'Turkey', 'Price: ₱675/kilo.', '20', 'Poultry', '2022-11-12');

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
  `user_address1` varchar(250) NOT NULL,
  `user_address2` varchar(250) NOT NULL,
  `user_city` varchar(250) NOT NULL,
  `user_zipcode` varchar(4) NOT NULL,
  `user_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`user_id`, `user_firstname`, `user_middlename`, `user_lastname`, `user_username`, `user_birthday`, `user_mobile`, `user_email`, `user_password`, `user_status`, `user_address1`, `user_address2`, `user_city`, `user_zipcode`, `user_date`) VALUES
(1, 'RamTheGreat', '', 'RamTheGreat', 'RamTheGreat', '', '', 'ramemersongoria.13.versus@gmail.com', 'RamTheGreat', 'USER', '', '', '', '', '0000-00-00 00:00:00'),
(2, 'Antonio', '', 'Manila', 'EasyPheasy', '', '', 'manilaronquillo@gmail.com', '12345678', 'USER', '', '', '', '', '0000-00-00 00:00:00');

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
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `table_product`
--
ALTER TABLE `table_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_user`
--
ALTER TABLE `table_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
