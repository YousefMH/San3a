-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2025 at 07:28 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `san3a`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--
CREARE DATABASE san3a;
USE san3a;
<<<<<<< HEAD

CREATE DATABASE San3a;
USE San3a;
=======
>>>>>>> 50b2f6825c4841aaffcbc59a8c86f041f9395b07

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(1, 'مفكات ');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone_num` varchar(20) NOT NULL,
  `problem_message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `phone_num`, `problem_message`) VALUES
(1, 'Yahia', '01117938642', 'Test'),
(2, 'Yahia', '01117938642', '312412412412412'),
(3, 'Yahia', '241244124', '4124124'),
(4, 'fdsaf', 'fsdafsa', 'fsadfsa'),
(5, 'fdsaf', 'fsdafsa', 'fsadfsa'),
(6, 'fsadf', 'fsdafasd', 'fsdafdas'),
(7, 'fsdafsa', 'fsadfsa', 'asfd'),
(8, 'fdas', 'fsdaf', 'fdsaf'),
(9, 'fsdaf', 'fsdaf', 'dsfadsaf'),
(10, 'fsdaf', 'fsadfs', 'fsadfasd'),
(11, 'fsdaf', 'sdafdas', 'sfsdaf'),
(12, 'fsadf', 'fsadfs', 'sfadf'),
(13, 'sdfsa', 'fsdafd', 'sfaddsaf');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message_text` text NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `type` enum('order_update','payment','system','chat') NOT NULL,
  `related_id` int(11) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `technician_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `discount` decimal(5,2) DEFAULT 0.00,
  `status` enum('pending','in_progress','completed','cancelled') DEFAULT 'pending',
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment_method` enum('cash','credit_card','wallet') DEFAULT 'cash',
  `delivery_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `discount` decimal(5,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_url` varchar(255) DEFAULT NULL,
  `min_stock_level` int(11) DEFAULT 1,
  `properties` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `name`, `description`, `price`, `stock`, `discount`, `created_at`, `image_url`, `min_stock_level`, `properties`) VALUES
(1, 1, '                    مفك صليبة كبير\r\n', '                    فولاذ عالى الجودة المقبض مريح \r\n', '200.00', 50, '0.00', '2025-03-30 15:08:28', NULL, 30, ' <ul>\r\n                        <li>\r\n                            تصميم مدمج ومريح وسهل الاستخدام\r\n                        </li>\r\n                        <li>\r\n                            دقة فائقة مع رأس محكم يمنع الانزلاق\r\n                        </li>\r\n                        <li>\r\n                            مصنوع من مواد متينة ومقاومة للصدأ\r\n                        </li>\r\n                        <li>\r\n                            مثالي للصيانة الدقيقة وإصلاح الإلكترونيات\r\n                        </li>\r\n                        <li>\r\n                            حجم صغير مناسب للسفر والتخزين السهل\r\n                        </li>\r\n                        <li>\r\n                            سعر اقتصادي مع أداء احترافي\r\n                        </li>\r\n                        <li>\r\n                            توصيل سريع وموثوق إلى باب المنزل\r\n                        </li>\r\n                    </ul>\r\n'),
(5, 1, '                    مفك صليبة كبير\r\n', '                    فولاذ عالى الجودة المقبض مريح \r\n', '200.00', 50, '0.00', '2025-03-30 15:08:28', NULL, 30, ' <ul>\r\n                        <li>\r\n                            تصميم مدمج ومريح وسهل الاستخدام\r\n                        </li>\r\n                        <li>\r\n                            دقة فائقة مع رأس محكم يمنع الانزلاق\r\n                        </li>\r\n                        <li>\r\n                            مصنوع من مواد متينة ومقاومة للصدأ\r\n                        </li>\r\n                        <li>\r\n                            مثالي للصيانة الدقيقة وإصلاح الإلكترونيات\r\n                        </li>\r\n                        <li>\r\n                            حجم صغير مناسب للسفر والتخزين السهل\r\n                        </li>\r\n                        <li>\r\n                            سعر اقتصادي مع أداء احترافي\r\n                        </li>\r\n                        <li>\r\n                            توصيل سريع وموثوق إلى باب المنزل\r\n                        </li>\r\n                    </ul>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reviewed_item_id` int(11) NOT NULL,
  `reviewed_item_type` enum('technician','product') NOT NULL,
  `rating` decimal(3,2) NOT NULL CHECK (`rating` >= 0 and `rating` <= 5),
  `review_text` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `subscription_id` int(11) NOT NULL,
  `technician_id` int(11) NOT NULL,
  `plan` varchar(50) NOT NULL,
  `start_date` date NOT NULL DEFAULT curdate(),
  `expiration_date` date NOT NULL,
  `status` enum('active','expired','cancelled') DEFAULT 'active',
  `renewal_status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `technicians`
--

CREATE TABLE `technicians` (
  `user_id` int(11) NOT NULL,
  `rating` decimal(3,2) DEFAULT 5.00,
  `visit_price` decimal(10,2) DEFAULT NULL,
  `area` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '6 أكتوبر',
  `province` varchar(50) CHARACTER SET utf8 DEFAULT 'القاهرة',
  `specialty` varchar(50) DEFAULT 'كهربائي',
  `work_hours` text DEFAULT '9 to 5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technicians`
--

INSERT INTO `technicians` (`user_id`, `rating`, `visit_price`, `area`, `province`, `specialty`, `work_hours`) VALUES
(23, '0.00', NULL, '6 أكتوبر', 'القاهرة', 'كهربائي', '9 to 5'),
(24, '5.00', NULL, '6 أكتوبر', 'القاهرة', 'كهربائي', '9 to 5'),
(25, '5.00', NULL, '6 أكتوبر', 'القاهرة', 'كهربائي', '9 to 5'),
(26, '5.00', NULL, '6 أكتوبر', 'القاهرة', 'كهربائي', '9 to 5'),
(27, '5.00', NULL, '6 أكتوبر', 'القاهرة', 'كهربائي', '9 to 5'),
(28, '5.00', NULL, '6 أكتوبر', 'القاهرة', 'كهربائي', '9 to 5'),
(29, '5.00', NULL, '6 أكتوبر', 'القاهرة', 'كهربائي', '9 to 5');

-- --------------------------------------------------------

--
-- Table structure for table `tech_orders`
--

CREATE TABLE `tech_orders` (
  `order_ID` int(50) NOT NULL,
  `order_tile` varchar(100) NOT NULL,
  `order_date` date DEFAULT NULL,
  `order_location` varchar(50) NOT NULL,
  `order_price` int(50) NOT NULL DEFAULT 200,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tech_orders`
--

INSERT INTO `tech_orders` (`order_ID`, `order_tile`, `order_date`, `order_location`, `order_price`, `user_id`) VALUES
(1, 'صيانة تكييف', '2025-04-05', 'أكتوبر', 200, 22),
(2, 'عطل في الثلاجة', '2025-04-06', 'الهرم', 200, 22);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('pending','completed','failed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `history_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `previous_status` enum('pending','completed','failed') NOT NULL,
  `new_status` enum('pending','completed','failed') NOT NULL,
  `change_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `national_id` varchar(20) DEFAULT NULL,
  `id_front_image` varchar(255) DEFAULT NULL,
  `id_back_image` varchar(255) DEFAULT NULL,
  `user_type` enum('client','technician') NOT NULL,
  `address` text DEFAULT NULL,
  `phone_verified` tinyint(1) DEFAULT 0,
  `email_verified` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('active','suspended','banned') DEFAULT 'active',
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `phone`, `password`, `national_id`, `id_front_image`, `id_back_image`, `user_type`, `address`, `phone_verified`, `email_verified`, `created_at`, `status`, `profile_image`) VALUES
(18, 'يوسف', 'محمد', 'yousefhosney253@gmail.com', NULL, '$2y$10$PPdgIdkuUno6q1i1833fZeJyl6PcXPWym8sEUVzjIuDJbG1bYEUwy', NULL, NULL, NULL, 'client', NULL, 0, 0, '2025-03-21 00:29:06', 'active', NULL),
(19, 'يوسف ', 'حسني', 'y@y.y', NULL, '0', NULL, NULL, NULL, 'client', NULL, 0, 0, '2025-03-21 00:54:27', 'active', NULL),
(20, 'Yousef', '54', 'm@m.m', NULL, '$2y$10$txse0jfep8VEse66Hqh2euIRsK79lh7ElvVrvGenmfncXAhARwmGC', NULL, NULL, NULL, 'client', NULL, 0, 0, '2025-03-21 01:13:09', 'active', NULL),
(21, 'Yousef', 'd', 'h@h.h', NULL, '$2y$10$mKQC3bRcxN/NxSPGyaHC7eAYyIjAbUPoq413d7WdMfw2im2Nis.OW', NULL, NULL, NULL, 'client', NULL, 0, 0, '2025-03-21 01:47:03', 'active', NULL),
(22, 'yousef', 'hos', 'y@m.m', '01551227246', 'pa5y.tEMAsAWE', NULL, NULL, NULL, 'client', NULL, 0, 0, '2025-03-21 03:31:48', 'active', NULL),
(23, 'المعلم', 'سيد', 's@s.s', NULL, '$2y$10$r86w82yGFJVlZLYoyajav.MjONMEIJMh5cUY1A3mj4LueC.UHG8vi', NULL, NULL, NULL, 'technician', NULL, 0, 0, '2025-03-21 04:47:14', 'active', NULL),
(24, 'df', 'df', 'd@d.h', NULL, '$2y$10$QzbGFDaFWAwUfMWXa5K2rurD1QaMvtE/EqZEzht4QK1Eumat3su2C', NULL, NULL, NULL, 'client', NULL, 0, 0, '2025-03-21 13:46:02', 'active', NULL),
(25, 'df', 'fd', 'fdd@dd.kjkj', NULL, '$2y$10$fm8T.EBLEeH1ZG21JiIaBO4nf5wMQnai1yw53VDumCm01JM584aDq', NULL, NULL, NULL, 'client', NULL, 0, 0, '2025-03-21 13:47:59', 'active', NULL),
(26, 'dfdf', 'fdfds', 'dydfd@md.m', NULL, '$2y$10$bvNyl155ZYhmH7..9I45S.IKRINCT0kiIMzbdxBkrSIOt0XTxREn.', NULL, NULL, NULL, 'client', NULL, 0, 0, '2025-03-21 14:41:15', 'active', NULL),
(27, 'df', 'da', 'yddfa@m.m', NULL, '$2y$10$C0vKmEU014pPC5oOoTf7A.cq/6DSRO.//N9HZrxCHmA8VepNchuem', NULL, NULL, NULL, 'client', NULL, 0, 0, '2025-03-21 14:41:37', 'active', NULL),
(28, 'df', 'k', 'kz@d.c', NULL, '$2y$10$rE6utFrWAEiPsTWQp7/7w.9r6s98sPSAP4Ga/xrBekHG8kp3XQAJa', NULL, NULL, NULL, 'client', NULL, 0, 0, '2025-03-21 21:12:31', 'active', NULL),
(29, 'df', 'hkj', 'j@kl.dl', NULL, '$2y$10$vTHBTjYJsjtoZIE7sGvCt.0I575bj0.PdM0RC.lMqr86r5sGjG5ma', NULL, NULL, NULL, 'client', NULL, 0, 0, '2025-03-21 21:15:16', 'active', NULL),
(30, 'Yahia', 'Shabaan', 'yahiashabaan97@gmail.com', NULL, '$2y$10$.o.A5dIIMz23Josm/wf3juGj77BupOW/6BntRbKPuvcyQwYJMSIfS', NULL, NULL, NULL, 'client', NULL, 0, 0, '2025-03-30 14:59:01', 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `wallet_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance` decimal(10,2) DEFAULT 0.00,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `name_2` (`name`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `technician_id` (`technician_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `technician_id` (`technician_id`);

--
-- Indexes for table `technicians`
--
ALTER TABLE `technicians`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tech_orders`
--
ALTER TABLE `tech_orders`
  ADD PRIMARY KEY (`order_ID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`history_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `national_id` (`national_id`),
  ADD KEY `email_2` (`email`),
  ADD KEY `phone_2` (`phone`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`wallet_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tech_orders`
--
ALTER TABLE `tech_orders`
  MODIFY `order_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`technician_id`) REFERENCES `technicians` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`technician_id`) REFERENCES `technicians` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `technicians`
--
ALTER TABLE `technicians`
  ADD CONSTRAINT `technicians_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD CONSTRAINT `transaction_history_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`transaction_id`) ON DELETE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
