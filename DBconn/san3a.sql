-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2025 at 02:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`) VALUES
(3, 'عدة سباكة'),
(2, 'عدة نجارة'),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `image_url` varchar(255) DEFAULT 'Resorces/product.jpg',
  `min_stock_level` int(11) DEFAULT 1,
  `properties` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `name`, `description`, `price`, `stock`, `discount`, `created_at`, `image_url`, `min_stock_level`, `properties`) VALUES
(1, 1, 'مفك عادة', '                    فولاذ عالى الجودة المقبض مريح \r\n', 200.00, 50, 0.00, '2025-03-30 15:08:28', 'Resorces/mofaak.jpg', 30, ' <ul>\r\n                        <li>\r\n                            تصميم مدمج ومريح وسهل الاستخدام\r\n                        </li>\r\n                        <li>\r\n                            دقة فائقة مع رأس محكم يمنع الانزلاق\r\n                        </li>\r\n                        <li>\r\n                            مصنوع من مواد متينة ومقاومة للصدأ\r\n                        </li>\r\n                        <li>\r\n                            مثالي للصيانة الدقيقة وإصلاح الإلكترونيات\r\n                        </li>\r\n                        <li>\r\n                            حجم صغير مناسب للسفر والتخزين السهل\r\n                        </li>\r\n                        <li>\r\n                            سعر اقتصادي مع أداء احترافي\r\n                        </li>\r\n                        <li>\r\n                            توصيل سريع وموثوق إلى باب المنزل\r\n                        </li>\r\n                    </ul>\r\n'),
(5, 2, 'صفيحة منشار', '                    فولاذ عالى الجودة \r\n', 50.00, 50, 0.00, '2025-03-30 15:08:28', 'Resorces/menshar.webp', 30, ' <ul>\r\n                        <li>\r\n                            تصميم مدمج ومريح وسهل الاستخدام\r\n                        </li>\r\n                        <li>\r\n                            مصنوع من مواد متينة ومقاومة للصدأ\r\n                        </li>\r\n                        <li>\r\n                            حجم صغير مناسب للسفر والتخزين السهل\r\n                        </li>\r\n                        <li>\r\n                            سعر اقتصادي مع أداء احترافي\r\n                        </li>\r\n                        <li>\r\n                            توصيل سريع وموثوق إلى باب المنزل\r\n                        </li>\r\n                    </ul>\r\n'),
(6, 3, 'حنفية حوض', 'عالي الجودة', 250.00, 50, 0.00, '2025-03-30 15:08:28', 'Resorces/khalat.webp', 30, ' <ul>\r\n                        <li>\r\n                            تصميم مدمج ومريح وسهل الاستخدام\r\n                        </li>\r\n                        <li>\r\n                            مصنوع من مواد متينة ومقاومة للصدأ\r\n                        </li>\r\n                        <li>\r\n                            سعر اقتصادي مع أداء احترافي\r\n                        </li>\r\n                        <li>\r\n                            توصيل سريع وموثوق إلى باب المنزل\r\n                        </li>\r\n                    </ul>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `technicians`
--

CREATE TABLE `technicians` (
  `user_id` int(11) NOT NULL,
  `rating` decimal(3,2) DEFAULT 5.00,
  `visit_price` decimal(10,2) DEFAULT 200.00,
  `area` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'القاهرة',
  `specialty` varchar(50) DEFAULT 'كهربائي',
  `work_hours` text DEFAULT 'من 5 الى 9',
  `tech_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `technicians`
--

INSERT INTO `technicians` (`user_id`, `rating`, `visit_price`, `area`, `province`, `specialty`, `work_hours`, `tech_id`) VALUES
(33, 5.00, 200.00, 'أكتوبر', 'القاهرة', 'كهربائي', 'من 5 الى 9', 0),
(34, 5.00, 200.00, 'الهرم', 'القاهرة', 'سباك', 'من 5 الى 9', 0),
(35, 5.00, 200.00, 'الرحاب', 'القاهرة', 'نجار', 'من 5 الى 9', 0),
(36, 5.00, 200.00, 'مدينتي', 'القاهرة', 'نقاش', 'من 5 الى 9', 0),
(38, 5.00, 200.00, 'زايد', 'الجيزة', 'حداد', 'من 5 الى 9', 0),
(39, 5.00, 200.00, 'التجمع', 'القاهرة', 'كهربائي', 'من 5 الى 9', 0),
(40, 5.00, 200.00, 'الهرم', 'الجيزة', 'كهربائي', 'من 5 الى 9', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tech_orders`
--

CREATE TABLE `tech_orders` (
  `order_ID` int(50) NOT NULL,
  `order_title` varchar(100) NOT NULL,
  `order_date` date DEFAULT current_timestamp(),
  `order_location` varchar(50) NOT NULL,
  `order_price` int(50) NOT NULL DEFAULT 200,
  `user_id` int(11) DEFAULT NULL,
  `tech_id` int(50) NOT NULL,
  `user_phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tech_orders`
--

INSERT INTO `tech_orders` (`order_ID`, `order_title`, `order_date`, `order_location`, `order_price`, `user_id`, `tech_id`, `user_phone`) VALUES
(1, 'صيانة تكييف', '2025-04-05', 'أكتوبر', 200, 22, 33, '0123456789'),
(2, 'عطل في الثلاجة', '2025-04-06', 'الهرم', 200, 22, 35, NULL),
(5, 'طلب حدادة', '2025-01-06', 'Giza', 200, 32, 38, '01551227246');

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
  `user_type` enum('client','technician') NOT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `phone`, `password`, `national_id`, `user_type`, `address`, `created_at`) VALUES
(32, 'يوسف', 'حسني', 'y@y.y', '01551227246', '$2y$10$kYp/t.hJhC/Z6P20PsKgt..aSuS4LxTMPiNIyheP66yixMnyl3aeq', NULL, 'client', NULL, '2025-04-09 15:54:31'),
(33, 'محمد', 'ياسر', 'm@t.t', NULL, '$2y$10$NtSinZ9xM4Qg4qB38iewg.UADRlNTRJM2wIL7cyKg3Kr4SxlCLz/u', NULL, 'technician', NULL, '2025-04-09 15:55:21'),
(34, 'سيد', 'حنفي', 's@t.t', NULL, '$2y$10$ZPZ/ijjaEx5WTMFFxrFcqO4j3ZtP9O8uwOI5nlYIXOTpWZn70xU52', NULL, 'technician', NULL, '2025-04-09 15:55:53'),
(35, 'أحمد', 'حمدي', 'a@t.t', NULL, '$2y$10$sOvTWfayu8NAug80d1YkYu7AzPHQ9dI5uKY2Tkq4x2GziAHCvlpFG', NULL, 'technician', NULL, '2025-04-09 15:56:27'),
(36, 'فتحي', 'أحمد', 'f@t.t', NULL, '$2y$10$WCcvZTNHib/9Kca68m9b/uzMI12Wf5Uu2l.ufwGK60BWROsxxiCRy', NULL, 'technician', NULL, '2025-04-09 15:57:27'),
(37, 'Yahya', 'Shaaban', 'ys@c.c', NULL, '$2y$10$qyOS4eplnv61K4T5RyG6FO7SZXNCEFRWefXasMcwo61VCPwt.VJ/S', NULL, 'client', NULL, '2025-04-09 16:31:05'),
(38, 'المعلم', 'صبري', 'sab@t.t', NULL, '$2y$10$qLW1eiYu/cOJsAL6kOcXn.ahy/0mAYE/SIB7V4izGpOCHIOplWHd6', NULL, 'technician', NULL, '2025-04-11 13:56:47'),
(39, 'يحي', 'شعبان', 'ys@t.t', NULL, '$2y$10$tDbB.pbZgXtEI80TowiEhOGMGn4naL.4W8qhu.xHukKY874kL.wLC', NULL, 'technician', NULL, '2025-05-13 20:56:20'),
(40, 'yahia', 'shabaan', 'yh@t.t', NULL, '$2y$10$FmxIFH5e6r3bnn.DRWzsvOJ6TOlaJK5BP.wqirsfXtPcterBTIO7O', NULL, 'technician', NULL, '2025-05-13 22:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `job` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id`, `name`, `job`, `phone`, `lat`, `lng`) VALUES
(1, 'أحمد', 'سباك', '01012345678', 29.8955, 31.263),
(2, 'المعلم سيد', 'كهربائي', '01098765432', 29.9668, 30.9255),
(3, 'ياسر', 'نجار', '01011112222', 29.897, 31.265),
(4, 'مصطفى', 'حداد', '01022223333', 29.893, 31.262),
(5, 'عبدالرحمن', 'سباك', '01012345678', 29.9553, 30.9614),
(6, 'أحمد محمود', 'سباك', '01012345678', 30.0444, 31.2357),
(7, 'محمود السيد', 'كهربائي', '01023456789', 30.05, 31.38),
(8, 'سامي عبد الرحمن', 'نجار', '01034567890', 30.0189, 31.4197),
(9, 'خالد حسن', 'حداد', '01045678901', 30.0608, 31.2166),
(10, 'علي محمد', 'سباك', '01056789012', 30.04, 31.21),
(11, 'مصطفى كامل', 'كهربائي', '01067890123', 30.0935, 31.4034),
(12, 'ياسر فؤاد', 'نجار', '01078901234', 30.1469, 31.6255),
(13, 'عماد الدين', 'حداد', '01089012345', 30.0086, 31.2314),
(14, 'أحمد عادل', 'سباك', '01090123456', 30.07, 31.27),
(15, 'طارق نصر', 'كهربائي', '01112345678', 30.12, 31.31),
(16, 'سعيد مرسي', 'نجار', '01123456789', 29.98, 31.13),
(17, 'رفعت حسين', 'حداد', '01134567890', 29.9668, 30.9255),
(18, 'ناصر محمد', 'سباك', '01145678901', 30.01, 31.19),
(19, 'صلاح عبد الله', 'كهربائي', '01156789012', 30.02, 31.25),
(20, 'فاروق جمال', 'نجار', '01167890123', 29.99, 31.27),
(21, 'مجدي صبري', 'حداد', '01178901234', 30.01, 31.26),
(22, 'حسام الدين', 'سباك', '01189012345', 30.13, 31.3),
(23, 'نبيل أسامة', 'كهربائي', '01212345678', 30.01, 31.28),
(24, 'وسام رامي', 'نجار', '01223456789', 30.03, 31.22),
(25, 'رامي عاطف', 'حداد', '01234567890', 30.08, 31.3);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `name` (`name`);

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
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tech_orders`
--
ALTER TABLE `tech_orders`
  MODIFY `order_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `technicians`
--
ALTER TABLE `technicians`
  ADD CONSTRAINT `technicians_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
