-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2023 at 06:55 PM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`) VALUES
(1, 'testing category', 'Deleted', '2023-08-18 15:33:24'),
(2, 'testing category', 'Deleted', '2023-08-18 15:33:29'),
(3, 'dsfds', 'Deleted', '2023-08-18 15:35:37'),
(4, 'jhjhj', 'Deleted', '2023-08-18 15:37:16'),
(5, 'test Category normal', 'Deleted', '2023-08-18 15:50:25'),
(6, 'test category name', 'Deleted', '2023-08-18 16:45:48'),
(7, 'test cat name', 'Deleted', '2023-08-18 16:45:59'),
(8, 'testing', 'Deleted', '2023-08-18 16:50:06'),
(9, 'name categories ...', 'Deleted', '2023-08-18 16:50:22'),
(10, 'test name of category', 'Deleted', '2023-08-18 16:50:31'),
(11, 'test name of categories', 'Deleted', '2023-08-18 16:51:10'),
(12, 'nald change hjhj', 'Deleted', '2023-08-18 17:01:13'),
(13, 'test nameo ', 'Active', '2023-08-18 17:18:23'),
(14, 'cat 2', 'Deleted', '2023-08-18 17:19:18'),
(15, 'cat name  2', 'Active', '2023-08-18 17:19:26'),
(16, 'category name test', 'Active', '2023-08-18 18:00:47'),
(17, 'test name edit', 'Deleted', '2023-08-18 18:05:10'),
(18, 'testin name', 'Active', '2023-08-18 18:40:42'),
(19, 'shampo', 'Active', '2023-08-18 18:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `status`) VALUES
(32, 35, '2023-08-19 11:46:16', 'Pending'),
(33, 35, '2023-08-19 11:46:35', 'Completed'),
(34, 35, '2023-08-19 16:40:08', 'Completed'),
(35, 35, '2023-08-19 18:11:35', 'Pending'),
(36, 35, '2023-08-19 18:48:03', 'Completed');

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
(77, 32, 14, 1, 1),
(78, 32, 13, 1, 1),
(79, 33, 16, 1, 1),
(80, 34, 16, 5, 5),
(81, 35, 16, 1, 1),
(82, 36, 16, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `productImage` text DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `productImage`, `category_id`, `status`) VALUES
(6, 'prouduct 1', 'uploads/defualt_profile.png', 0, 2),
(7, 'product 2', 'uploads/defualt_products.png', 0, 2),
(8, 'product 3', 'uploads/defualt_products.png', 0, 2),
(9, 'test category', NULL, 0, 2),
(10, 'test product cat', '', 0, 2),
(11, 'testing', '15', 0, 2),
(12, 'testing pro', 'uploads/defualt_products.png', 13, 2),
(13, 'Testing Product ', 'uploads/defualt_products.png', 13, 1),
(14, 'test projec name', 'uploads/defualt_profile.png', 13, 1),
(15, 'Product ', 'uploads/defualt_profile.png', 16, 1),
(16, 'sunslik', 'uploads/defualt_profile.png', 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `shop_name` varchar(255) DEFAULT NULL,
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

INSERT INTO `users` (`id`, `name`, `shop_name`, `email`, `role`, `creadted_by`, `created_at`, `password`, `userImage`, `status`) VALUES
(34, 'Admin', 'Admin Shop', 'admin@gmail.com', 'admin', 1, '2023-08-16 18:22:14', '$2y$10$PLOLIaUUF7wpT59JVeTTGuWakSk7TMbdhjrImiBPYqUAT2r2XgMf.', 'uploads/defualt_products.png', 1),
(35, 'User', 'User Shop', 'user@gmail.com', 'user', 0, '2023-08-16 18:23:29', '$2y$10$wV.aCe8MbNtRoY4UJGRHtevG7JsSLyb2ppX1L93UjDQPUJj4cRrES', 'uploads/defualt_products.png', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
