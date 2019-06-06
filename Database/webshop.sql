-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:49732
-- Generation Time: Jun 06, 2019 at 04:59 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `localdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `webshop`
--

CREATE TABLE `webshop` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `review` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webshop`
--

INSERT INTO `webshop` (`id`, `name`, `type`, `price`, `color`, `label`, `image`, `review`) VALUES
(1, 'Baseball cap', 'Hats', 29, 'Black', 'UN', 'Images/Products/hat1.jpeg', 'A classic baseball style hat from UN for everyday use. Superb quality!'),
(2, 'Jeans', 'Pants', 59, 'Blue', 'Levis', 'Images/Products/pants1.jpeg', 'Durable and stylish blue jeans for everyday use!'),
(3, 'Sweat pants', 'Pants', 39, 'Black', 'Adidas', 'Images/Products/pants2.jpeg', 'A classic pair of Adidas sweat pants for workout and sports!'),
(4, 'Hoodie', 'Shirts', 49, 'Red', 'Adidas', 'Images/Products/hoodie1.jpeg', 'A comfy hoodie from Adidas for every age and gender.'),
(8, 'Insanely cool Hoodie', 'Shirts', 52, 'Red', 'Nike', 'hoodie1.jpeg', 'Testing Testing'),
(9, 'Nice hoodie', 'Shirts', 52, 'Red', 'Nike', 'hoodie1.jpeg', 'Testetstewt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `webshop`
--
ALTER TABLE `webshop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `webshop`
--
ALTER TABLE `webshop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
