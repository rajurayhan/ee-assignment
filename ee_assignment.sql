-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 07:20 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ee_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Google Pixel 6', 'Google Pixel 6. Google Pixel 6. Google Pixel 6. Google Pixel 6. Google Pixel 6. Google Pixel 6. Google Pixel 6. Google Pixel 6. Google Pixel 6. Google Pixel 6. Google Pixel 6. Google Pixel 6. Google Pixel 6. Google Pixel 6. Google Pixel 6. Google Pixel 6. ', 'https://brotherselectronicsbd.com/image/cache/catalog/demo/product/Google/Pixel%206/Pixel-6-Sorta-Seafoam-800x800.png', 1, '2022-06-09 14:24:10', '2022-06-09 14:24:10'),
(2, 'Google Pixel 5', 'Google Pixel 5. Google Pixel 5. Google Pixel 5.', 'https://brotherselectronicsbd.com/image/cache/catalog/demo/product/Google/Pixel%206/Pixel-6-Sorta-Seafoam-800x800.png', 1, '2022-06-09 14:25:06', '2022-06-09 14:25:06'),
(3, 'iPhone 13 Pro ', 'iPhone 13 Pro iPhone 13 Pro iPhone 13 Pro iPhone 13 Pro iPhone 13 Pro iPhone 13 Pro iPhone 13 Pro iPhone 13 Pro iPhone 13 Pro iPhone 13 Pro iPhone 13 Pro iPhone 13 Pro ', 'https://www.gizmochina.com/wp-content/uploads/2021/09/2-1-500x500.jpg', 1, '2022-06-09 14:25:55', '2022-06-09 14:25:55'),
(4, 'iPhone 13  ', 'iPhone 13  iPhone 13  iPhone 13  iPhone 13  iPhone 13  iPhone 13  iPhone 13  iPhone 13  iPhone 13  iPhone 13  iPhone 13  iPhone 13  ', 'https://www.gizmochina.com/wp-content/uploads/2021/09/2-1-500x500.jpg', 1, '2022-06-09 14:26:23', '2022-06-09 14:26:23'),
(5, 'Product With No User -- 1', 'Product With No User', 'Product With No User', 1, '2022-06-09 16:10:02', '2022-06-09 16:10:02'),
(6, 'Product With No User -- 2', 'Product With No User -- 2', 'Product With No User', 0, '2022-06-09 16:10:15', '2022-06-09 16:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `email_verified_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `status`, `email_verified_at`, `created_at`, `updated_at`) VALUES
(1, 'raju.rayhan@yandex.com', 'def1a6a961c395ce521d2c543bfcd58b', 'Raju Rayhan', 1, '2022-06-09 16:17:09', '2022-06-09 14:34:26', '2022-06-09 14:21:48'),
(2, 'user.one@yandex.com', 'def1a6a961c395ce521d2c543bfcd58b', 'User One', 1, '2022-06-09 16:17:09', '2022-06-09 14:34:26', '2022-06-09 14:21:48'),
(3, 'user.two@yandex.com', 'def1a6a961c395ce521d2c543bfcd58b', 'User Two', 1, '2022-06-09 21:36:49', '2022-06-09 14:34:26', '2022-06-09 14:21:48'),
(4, 'user.three@yandex.com', 'def1a6a961c395ce521d2c543bfcd58b', 'User Three', 0, NULL, '2022-06-09 14:34:26', '2022-06-09 14:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_product`
--

CREATE TABLE `user_has_product` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_has_product`
--

INSERT INTO `user_has_product` (`id`, `user_id`, `product_id`, `price`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 400, 10, 1, NULL, '2022-06-09 15:43:21'),
(2, 1, 1, 500, 5, 1, NULL, '2022-06-09 15:43:21'),
(3, 1, 4, 1000, 50, 1, NULL, '2022-06-09 15:43:54'),
(4, 1, 3, 1250, 80, 1, NULL, '2022-06-09 15:43:54'),
(5, 2, 2, 400, 12, 1, NULL, '2022-06-09 15:43:21'),
(6, 2, 1, 500, 50, 1, NULL, '2022-06-09 15:43:21'),
(7, 2, 4, 1000, 30, 1, NULL, '2022-06-09 15:43:54'),
(8, 2, 3, 1250, 20, 1, NULL, '2022-06-09 15:43:54'),
(9, 4, 2, 400, 8, 1, NULL, '2022-06-09 15:43:21'),
(10, 4, 1, 500, 12, 1, NULL, '2022-06-09 15:43:21'),
(11, 4, 4, 1000, 15, 1, NULL, '2022-06-09 15:43:54'),
(12, 4, 3, 1250, 5, 1, NULL, '2022-06-09 15:43:54'),
(13, 3, 2, 400, 5, 1, NULL, '2022-06-09 15:43:21'),
(14, 3, 1, 500, 42, 1, NULL, '2022-06-09 15:43:21'),
(15, 3, 4, 1000, 54, 1, NULL, '2022-06-09 15:43:54'),
(16, 3, 3, 1250, 50, 1, NULL, '2022-06-09 15:43:54');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `user_has_product`
--
ALTER TABLE `user_has_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_foreign` (`user_id`),
  ADD KEY `product_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_has_product`
--
ALTER TABLE `user_has_product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_has_product`
--
ALTER TABLE `user_has_product`
  ADD CONSTRAINT `product_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `user_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
