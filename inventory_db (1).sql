-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 02:29 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `status`) VALUES
(1, 1, '2023-08-15 22:59:56', 'Pending'),
(2, 1, '2023-08-15 23:07:05', 'Pending'),
(3, 1, '2023-08-15 23:14:37', 'Pending'),
(4, 1, '2023-08-15 23:20:15', 'Pending'),
(5, 1, '2023-08-15 23:21:05', 'Pending'),
(6, 1, '2023-08-15 23:22:05', 'Pending'),
(7, 1, '2023-08-15 23:22:45', 'Pending'),
(8, 1, '2023-08-15 23:23:20', 'Pending'),
(9, 1, '2023-08-15 23:29:21', 'Pending'),
(10, 1, '2023-08-15 23:29:27', 'Pending'),
(11, 1, '2023-08-16 00:11:44', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `avialable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `avialable`) VALUES
(1, 2, 3, 13, 13),
(2, 2, 2, 134, 134),
(3, 2, 1, 14, 14),
(4, 3, 3, 1, 1),
(5, 3, 2, 1, 1),
(6, 3, 1, 1, 1),
(7, 4, 3, 1, 1),
(8, 4, 2, 1, 1),
(9, 4, 1, 1, 1),
(10, 6, 2, 1, 1),
(11, 6, 1, 1, 1),
(12, 8, 3, 1, 1),
(13, 8, 2, 1, 1),
(14, 8, 1, 1, 1),
(15, 9, 3, 1, 1),
(16, 9, 2, 1, 1),
(17, 9, 1, 1, 1),
(18, 10, 3, 1, 1),
(19, 10, 2, 1, 1),
(20, 10, 1, 1, 1),
(21, 11, 4, 1, 1),
(22, 11, 3, 1, 1),
(23, 11, 2, 1, 1),
(24, 11, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `productImage` text DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `productImage`, `status`) VALUES
(1, 'testing', 'uploads/defualt_profile.png', 1),
(2, 'ghgh', 'uploads/signature (6).png', 1),
(3, 'jhjhjhhghjhj', 'uploads/defualt_profile.png', 1),
(4, 'hhb', 'uploads/signature (6).png', 1),
(5, 'hhbh', 'uploads/signature (6).png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'user',
  `creadted_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `password` text NOT NULL,
  `userImage` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `creadted_by`, `created_at`, `password`, `userImage`, `status`) VALUES
(1, 'ADMIN', 'admin@gmail.com', 'admin', 1, '2023-08-13 21:47:06', '$10$9AgbBO.wPTR6WVYUlHk9qunw64JFfkbLZWkCYRuZlzos.Ope0sJ56', 'uploads/Screenshot (3).png', 1),
(26, 'USER', 'user@gmail.com', 'user', 0, '0000-00-00 00:00:00', '$2y$10$8n8oyGY1PdLczO/ZdVuL0u4rWRfgfNFYVrfcGoUiea8kUavLi/NDG', 'uploads/Screenshot (3).png', 2),
(28, 'ali sans', 'adsdf@gmail.com', 'user', 0, '2023-08-14 10:36:49', '', 'uploads/pexels-kindel-media-7688336.jpg', 1),
(29, 'testing ', 'tstisng@gmail.com', 'user', 0, '2023-08-14 10:37:19', '$2y$10$9AgbBO.wPTR6WVYUlHk9qunw64JFfkbLZWkCYRuZlzos.Ope0sJ56', 'uploads/defualt_profile.png', 1),
(30, 'ali', 'admin@gjakjfd.com', 'user', 0, '2023-08-16 01:15:43', '$2y$10$sTHJ9lQegTmMhuxGekpNWeAtCd4wUM9xbJOfANmoIUKWm1/1irMgG', '', 1),
(31, 'kmk', 'sdksdk@gmail.com', 'user', 0, '2023-08-16 01:22:56', '$2y$10$bp0Kbtfgnk4t2PcVNK4ljO.lqQpfYmWs1KaUuEF.1r0oiTBVa6Rq6', 'uploads/IMG_5110 (1).jpg', 1),
(32, 'testing ', 'testing@gmail.com', 'admin', 0, '2023-08-16 05:08:18', '$2y$10$YtIF.NTkhJ7QOaYHeHlmY.TuXLd4KGGiQc.j8mpczCQTa/23WepRm', 'uploads/defualt_products.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
