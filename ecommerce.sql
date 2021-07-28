-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2021 at 03:03 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `comments`, `created_at`, `updated_at`) VALUES
(3, 'accessory', NULL, NULL, NULL),
(4, 'Food', 'branch of food', NULL, NULL),
(5, 'Network', 'devices of network', NULL, NULL),
(6, 'computer', 'computer branch', NULL, NULL),
(7, 'Drinks', 'drinks branch', NULL, NULL),
(8, 'Mobiles', 'mobile branch', NULL, NULL),
(9, 'Screens', 'screens divices', NULL, NULL),
(10, 'Colthes', 'clothes now.', NULL, NULL),
(11, 'Last', 'great', NULL, NULL),
(14, 'Agriculture', 'Agriculture of branches', NULL, NULL),
(15, 'Industry', 'kjlkx jlkxj lkx', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(48, '2014_10_12_000000_create_users_table', 1),
(49, '2014_10_12_100000_create_password_resets_table', 1),
(50, '2019_08_19_000000_create_failed_jobs_table', 1),
(51, '2021_07_24_141226_create_categories_table', 1),
(52, '2021_07_24_142350_add_comments_to_categories_table', 1),
(53, '2021_07_24_143706_create_vendors_table', 1),
(54, '2021_07_24_143842_create_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `color` enum('red','blue','green','yellow','black') COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vendors/logo.png',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `color`, `logo`, `active`, `vendor_id`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'Buckridge, Romaguera and Carroll', '193.65', 'green', 'uploads/products/3.jpg', 1, 11, 7, NULL, NULL),
(3, 'Cd 4', '12.00', 'green', 'uploads/products/4.jpg', 1, 2, 10, NULL, NULL),
(4, 'lenove 5', '44.55', 'green', 'uploads/products/8.png', 1, 2, 9, NULL, NULL),
(5, 'lenove 7', '22.55', 'red', 'uploads/products/2.png', 1, 1, 3, NULL, NULL),
(6, 'Kennedy Feil III', '137.97', 'yellow', 'uploads/products/9.jpg', 1, 1, 4, NULL, NULL),
(7, 'Prof. Billie Kuhn', '234.15', 'black', 'uploads/products/6.jpg', 1, 2, 6, NULL, NULL),
(8, 'Jannie Carroll DVM', '90.88', 'black', 'uploads/products/1.png', 1, 3, 5, NULL, NULL),
(9, 'Ivory Hyatt', '270.01', 'red', 'uploads/products/3.jpg', 1, 2, 5, NULL, NULL),
(10, 'Dr. Devin Borer III', '215.70', 'black', 'uploads/products/5.jpg', 1, 7, 11, NULL, NULL),
(11, 'Grace Wilkinson', '174.76', 'blue', 'uploads/products/9.jpg', 1, 7, 15, NULL, NULL),
(12, 'Larissa Grimes', '288.75', 'green', 'uploads/products/10.jpg', 1, 9, 11, NULL, NULL),
(13, 'Prof. Orville Balistreri', '296.05', 'blue', 'uploads/products/6.jpg', 1, 4, 9, NULL, NULL),
(14, 'Soledad Terry', '129.21', 'blue', 'uploads/products/7.jpg', 1, 10, 15, NULL, NULL),
(15, 'Tanner Parisian', '87.26', 'yellow', 'uploads/products/7.jpg', 1, 8, 8, NULL, NULL),
(16, 'Jannie Prohaska IV', '294.74', 'red', 'uploads/products/1.png', 1, 7, 8, NULL, NULL),
(17, 'Mr. Jarrod Leannon', '12.21', 'green', 'uploads/products/8.png', 1, 10, 9, NULL, NULL),
(18, 'Demond Sawayn', '115.48', 'red', 'uploads/products/6.jpg', 1, 7, 14, NULL, NULL),
(19, 'Cleo Watsica V', '293.18', 'yellow', 'uploads/products/1.png', 1, 9, 5, NULL, NULL),
(20, 'Clare Sauer', '207.00', 'blue', 'uploads/products/10.jpg', 1, 6, 7, NULL, NULL),
(21, 'Nola Leannon', '96.43', 'green', 'uploads/products/8.png', 1, 5, 14, NULL, NULL),
(22, 'Dr. Jasen Beier', '63.28', 'yellow', 'uploads/products/6.jpg', 1, 7, 3, NULL, NULL),
(23, 'Dr. Cierra D\'Amore', '94.31', 'green', 'uploads/products/1.png', 1, 6, 10, NULL, NULL),
(24, 'Miss Katrine Glover DVM', '133.77', 'red', 'uploads/products/9.jpg', 1, 6, 11, NULL, NULL),
(25, 'Mrs. Luz Kessler', '270.02', 'red', 'uploads/products/2.png', 1, 8, 6, NULL, NULL),
(26, 'Therese Farrell', '64.09', 'red', 'uploads/products/6.jpg', 1, 13, 14, NULL, NULL),
(27, 'Mollie Orn', '117.89', 'yellow', 'uploads/products/8.png', 1, 11, 3, NULL, NULL),
(28, 'Prof. Pinkie Feest', '232.26', 'blue', 'uploads/products/1.png', 1, 13, 5, NULL, NULL),
(29, 'Jensen Rau III', '144.38', 'red', 'uploads/products/1.png', 1, 5, 7, NULL, NULL),
(30, 'Roman Carroll', '114.62', 'black', 'uploads/products/6.jpg', 1, 10, 3, NULL, NULL),
(31, 'Colten Brekke Jr.', '73.15', 'green', 'uploads/products/2.png', 1, 12, 11, NULL, NULL),
(32, 'Deontae Leffler I', '278.84', 'black', 'uploads/products/6.jpg', 1, 2, 7, NULL, NULL),
(33, 'Brock Bashirian', '106.48', 'blue', 'uploads/products/9.jpg', 1, 4, 11, NULL, NULL),
(34, 'Kaleigh Fadel V', '117.41', 'red', 'uploads/products/8.png', 1, 13, 9, NULL, NULL),
(35, 'Kattie Bayer DDS', '154.67', 'black', 'uploads/products/5.jpg', 1, 7, 10, NULL, NULL),
(36, 'Breana Shields', '61.50', 'green', 'uploads/products/5.jpg', 1, 1, 9, NULL, NULL),
(37, 'Holden Fadel', '203.18', 'blue', 'uploads/products/3.jpg', 1, 8, 4, NULL, NULL),
(38, 'Kub, Schaefer and Wiegand', '80.95', 'green', 'uploads/products/9.jpg', 1, 3, 10, NULL, NULL),
(39, 'Crist-Wyman', '289.76', 'blue', 'uploads/products/9.jpg', 1, 10, 4, NULL, NULL),
(40, 'Kessler, Keeling and Torphy', '54.31', 'blue', 'uploads/products/3.jpg', 1, 3, 11, NULL, NULL),
(41, 'Dickinson-Bode', '41.99', 'red', 'uploads/products/1.png', 1, 7, 10, NULL, NULL),
(42, 'Marks-Gibson', '41.81', 'blue', 'uploads/products/3.jpg', 1, 10, 7, NULL, NULL),
(43, 'Cummerata, Murphy and Nader', '66.25', 'green', 'uploads/products/2.png', 1, 3, 6, NULL, NULL),
(44, 'Runte-Kling', '163.31', 'blue', 'uploads/products/5.jpg', 1, 8, 7, NULL, NULL),
(45, 'Reinger-Reynolds', '175.66', 'yellow', 'uploads/products/6.jpg', 1, 10, 3, NULL, NULL),
(46, 'Yost, Goodwin and Koepp', '38.79', 'black', 'uploads/products/10.jpg', 1, 12, 7, NULL, NULL),
(47, 'Ullrich and Sons', '160.86', 'red', 'uploads/products/10.jpg', 1, 13, 5, NULL, NULL),
(48, 'Durgan LLC', '212.63', 'green', 'uploads/products/6.jpg', 1, 13, 14, NULL, NULL),
(49, 'Jacobs-Nikolaus', '274.66', 'black', 'uploads/products/3.jpg', 1, 6, 11, NULL, NULL),
(50, 'Dooley-McLaughlin', '157.24', 'green', 'uploads/products/4.jpg', 1, 8, 3, NULL, NULL),
(51, 'Mitchell-Pouros', '112.51', 'yellow', 'uploads/products/10.jpg', 1, 3, 11, NULL, NULL),
(52, 'Goyette PLC', '290.58', 'black', 'uploads/products/1.png', 1, 8, 5, NULL, NULL),
(53, 'Jakubowski-Bergstrom', '22.41', 'red', 'uploads/products/1.png', 1, 10, 15, NULL, NULL),
(54, 'O\'Conner LLC', '74.28', 'red', 'uploads/products/1.png', 1, 8, 15, NULL, NULL),
(55, 'Zieme-Gutkowski', '70.61', 'green', 'uploads/products/5.jpg', 1, 8, 5, NULL, NULL),
(56, 'Hansen Group', '247.41', 'blue', 'uploads/products/7.jpg', 1, 6, 14, NULL, NULL),
(57, 'Sporer, Gusikowski and Gulgowski', '184.16', 'blue', 'uploads/products/10.jpg', 1, 10, 14, NULL, NULL),
(58, 'Beier and Sons', '275.66', 'red', 'uploads/products/1.png', 1, 11, 5, NULL, NULL),
(59, 'Conn-Walsh', '181.25', 'blue', 'uploads/products/5.jpg', 1, 7, 14, NULL, NULL),
(60, 'Kling and Sons', '112.87', 'black', 'uploads/products/2.png', 1, 6, 9, NULL, NULL),
(61, 'O\'Connell and Sons', '103.56', 'blue', 'uploads/products/1.png', 1, 7, 6, NULL, NULL),
(62, 'Wisozk Inc', '40.57', 'red', 'uploads/products/2.png', 1, 5, 5, NULL, NULL),
(63, 'Kuvalis-Luettgen', '238.38', 'red', 'uploads/products/4.jpg', 1, 5, 11, NULL, NULL),
(64, 'Swaniawski-Lesch', '68.61', 'blue', 'uploads/products/2.png', 1, 9, 7, NULL, NULL),
(65, 'Schimmel-Fisher', '146.07', 'yellow', 'uploads/products/2.png', 1, 2, 15, NULL, NULL),
(66, 'Howell, Boyer and Stark', '18.33', 'black', 'uploads/products/4.jpg', 1, 4, 7, NULL, NULL),
(67, 'Maggio-Swift', '37.56', 'green', 'uploads/products/5.jpg', 1, 12, 9, NULL, NULL),
(68, 'good', '22.55', 'red', 'uploads/products/1627471075_68569079.jpg', 1, 1, 3, NULL, NULL),
(69, 'newxx', '22.55', 'red', 'uploads/products/1627476877_4.jpg', 1, 1, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$10$QgdgAPgOusd1gH4L21qplezW6v3jTWdBYxYbxdx5Kn8KC2hrAKFyG', NULL, NULL, NULL),
(2, 'J87Xb6SyLB', 'lgUGVZIUk1@mail.com', NULL, '$2y$10$Qw0ACbPf/FaxRo6nuBk0/.AXX0DI4.lqeCyOV/R9fCQBFincZbed.', NULL, NULL, NULL),
(3, 'd7HoUETmjl', 'woOtXxEs4z@mail.com', NULL, '$2y$10$r4xjVICae1pZlYpa.eu.w.zhaazSz/YONwaVKsHtOsTDoCO81VbgS', NULL, NULL, NULL),
(4, 'Cassie VonRueden DVM', 'gCBquhnzak@mail.com', NULL, '$2y$10$yLo6It9p1F9./JGlj02YeOs1QCfuCJq1RIdah7ZuI/yChqOgacMDO', NULL, NULL, NULL),
(5, 'Prof. Bruce Bernhard PhD', 'miller50@example.net', NULL, '$2y$10$KoQuarEsFf8698YTR7yGzeovtWuZoEGIuJ0TCyeNYzoDAmrV6cju.', NULL, NULL, NULL),
(6, 'Georgiana Tremblay Jr.', 'wrutherford@example.org', NULL, '$2y$10$ncQV6sjRu2pE.MARv3cYCeaxSOsKmr/ljTPxhmVYTOH83MwEh/Ciq', NULL, NULL, NULL),
(7, 'Hortense McClure', 'luisa48@example.com', NULL, '$2y$10$hQEo.RRMpObtTJ0kUy7/TuuQQFTtrwaqkRXqSGRHbxmCwAaR0Wk8.', NULL, NULL, NULL),
(8, 'Mr. Lawrence Hoppe IV', 'mollie42@example.net', NULL, '$2y$10$GBiurIX16HYERF0kZw9RAOCbLA6UWOX.LCkgiH95CExFUVUVR1.B6', NULL, NULL, NULL),
(9, 'Gerardo Boehm', 'nathaniel94@example.net', NULL, '$2y$10$98YiW0BS7ROcrL5S3WNQj.9VZbTPRszzX8LMoH3G/RrrX6vZg7DWC', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vendors/logo.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Vendor A', 'vendors/logo.png', NULL, NULL),
(2, 'Vendor B', 'vendors/logo.png', NULL, NULL),
(3, 'Cordie Marquardt', 'vendors/logo.png', NULL, NULL),
(4, 'Prof. Joyce Corwin', 'vendors/logo.png', NULL, NULL),
(5, 'Santino Schuppe', 'vendors/logo.png', NULL, NULL),
(6, 'Eliza Strosin', 'vendors/logo.png', NULL, NULL),
(7, 'Jena West', 'vendors/logo.png', NULL, NULL),
(8, 'Zachary Sipes IV', 'vendors/logo.png', NULL, NULL),
(9, 'Miss Brigitte Ferry', 'vendors/logo.png', NULL, NULL),
(10, 'Elmore Upton', 'vendors/logo.png', NULL, NULL),
(11, 'Howell Crooks', 'vendors/logo.png', NULL, NULL),
(12, 'William Kessler', 'vendors/logo.png', NULL, NULL),
(13, 'Miss Zita Gislason', 'vendors/logo.png', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_vendor_id_foreign` (`vendor_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
