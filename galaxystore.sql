-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2023 at 07:47 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galaxystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `name` varchar(20) NOT NULL,
  `price` int(8) NOT NULL,
  `quantity` int(3) NOT NULL,
  `discount` int(5) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`name`, `price`, `quantity`, `discount`, `user_id`, `item_id`, `id`) VALUES
('Apple Iphone x', 250000, 1, 2500, 0, 69, 13),
('Apple Iphone se', 100000, 2, 5000, 6, 70, 14),
('Apple Iphone x', 250000, 1, 2500, 8, 74, 17),
('Samsung s10', 5555, 1, 55, 10, 84, 23),
('Apple iPhone 14 Plus', 502000, 1, 5000, 7, 122, 40);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(3) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(5) NOT NULL,
  `discount` int(5) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `price`, `quantity`, `discount`, `url`) VALUES
(123, 'Google Pixel 7 ', 210000, 10, 6000, 'https://lifemobile.lk/wp-content/uploads/2022/10/Google-Pixel-7.png'),
(124, 'Apple iPhone 12 Mini', 180000, 7, 3500, 'https://lifemobile.lk/wp-content/uploads/2020/10/Apple-iPhone-12-Blue.jpg'),
(125, 'Apple iPhone SE 2020', 155429, 4, 4200, 'https://lifemobile.lk/wp-content/uploads/2020/11/Apple-iPhone-SE-2020.png'),
(126, 'Apple iPhone X 64GB', 199599, 10, 1200, 'https://lifemobile.lk/wp-content/uploads/2019/04/iphone20x.jpg'),
(127, 'Huawei Y5 Lite', 19760, 7, 1999, 'https://lifemobile.lk/wp-content/uploads/2019/10/y5-lite-1.jpg'),
(128, 'Nokia C01 Plus ', 25800, 3, 1200, 'https://lifemobile.lk/wp-content/uploads/2021/08/Nokia-C01-Plus-2GB-RAM-16GB.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `fname` varchar(70) NOT NULL,
  `sname` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `sname`, `email`, `password`, `user_type`) VALUES
(5, 'Maneesha', 'Maduranga', 'Maneesha@gmail.com', '123', 'admin'),
(6, 'Test', 'One', 'Test@gmail.com', '123', 'user'),
(7, 'Vijitth', 'Dinesh', 'Vijith@gmail.com', '456', 'user'),
(8, 'chris', 'Bum', 'Cbum@gmail.com', 'cbum', 'user'),
(9, 'Pathum ', 'Nissanka', 'Pathum@gmail.com', '123', 'user'),
(10, 'kusal', 'Mendis', 'Kusal@gmail.com', '123', 'user'),
(11, 'Dasun ', 'Shanka', 'Dasun@gmail.com', '123', 'user'),
(12, 'Lucifer', 'Devon', 'luciferdevon@gmail.com', '123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
