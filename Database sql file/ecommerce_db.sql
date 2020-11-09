-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 01:46 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `requestQuantity` int(11) NOT NULL,
  `cost` double(8,2) NOT NULL,
  `sellingStatus` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `requestQuantity`, `cost`, `sellingStatus`, `created_at`, `updated_at`) VALUES
(1, 1, 21, 5, 5500.00, 'pending', '2019-10-28 17:48:29', '2019-10-28 17:48:29'),
(2, 1, 19, 2, 150.00, 'pending', '2019-10-28 17:48:59', '2019-10-28 17:48:59'),
(3, 1, 17, 1, 900.00, 'pending', '2019-10-28 19:51:12', '2019-10-28 19:51:12'),
(4, 11, 20, 4, 336.00, 'pending', '2020-11-09 09:57:40', '2020-11-09 09:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `publication_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `publication_status`, `created_at`, `updated_at`) VALUES
(6, 'men', 'a related category for men and all related things to men ', 1, '2019-08-20 22:00:00', '2019-08-25 19:56:24'),
(7, 'women', 'category for women related stuff', 1, '2019-08-26 19:16:24', '2019-08-26 19:16:24'),
(8, 'electronics', 'category for electronics stuff like video games', 1, '2019-08-26 19:16:59', '2019-10-07 18:50:36'),
(9, 'clothes', 'this category is for clothes and fashion', 1, '2019-08-26 19:17:30', '2019-08-26 19:18:06'),
(10, 'glasses', 'this for category glasses', 1, '2019-08-26 19:18:36', '2019-08-26 19:18:36'),
(11, 'sports', 'this is for sports men and all related stuff to sport', 1, '2019-08-26 19:19:27', '2019-08-26 19:19:27'),
(12, 'childs', 'for childs stuff', 1, '2019-08-26 19:19:49', '2019-08-26 19:19:49'),
(13, 'others', 'category for other things', 1, '2019-08-26 19:20:12', '2019-08-26 19:20:21'),
(14, 'video games', 'This is for video games', 1, '2019-09-05 23:04:54', '2019-09-05 23:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_product_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_product_id`, `user_id`, `user_name`, `comment`, `created_at`, `updated_at`) VALUES
(17, 3, 1, 'Ahmed nabil', 'This is a good offer', '2019-10-28 17:10:36', '2019-10-28 17:10:36'),
(18, 2, 11, 'Ahmed', 'good product', '2020-11-09 09:58:45', '2020-11-09 09:58:45');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

CREATE TABLE `manufactures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `publication_status` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`id`, `name`, `publication_status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'adidas', 1, 'This is adidas brand', '2019-08-28 11:32:07', '2019-08-29 13:46:14'),
(2, 'nike', 1, 'Nike brand', '2019-08-29 12:09:55', '2019-08-29 12:09:55'),
(3, 'zara', 1, 'this is zara brand', '2019-08-29 12:10:20', '2019-08-29 12:10:20'),
(4, 'apple', 1, 'this is apple brand', '2019-08-29 12:10:42', '2019-08-29 12:10:42'),
(5, 'samsung', 1, 'this is samsung brand', '2019-08-29 12:12:06', '2019-08-29 12:12:06'),
(6, 'oppo', 1, 'this is oppo brand', '2019-08-29 12:12:25', '2019-08-29 12:12:25'),
(7, 'konami digital', 1, 'This is konami digital for electronic games like pes, metel geers&nbsp;', '2019-09-05 23:03:36', '2019-09-05 23:03:36'),
(8, 'ea sports', 1, 'EA Sports for electronic games like fifa, need for speed etc', '2019-09-05 23:04:19', '2019-09-05 23:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2019_08_21_201417_create_tbl_admins_table', 1),
(3, '2019_08_23_143850_create_categories_table', 2),
(4, '2019_08_26_212719_create_manufactures_table', 3),
(5, '2019_08_28_134437_create_products_table', 4),
(6, '2019_08_30_224553_create_sliders_table', 5),
(7, '2019_09_03_155347_create_customers_table', 6),
(8, '2014_10_12_000000_create_users_table', 7),
(9, '2019_09_05_224524_create_shippings_table', 8),
(10, '2019_09_05_224606_create_carts_table', 8),
(11, '2019_09_06_235138_create_shippings_table', 9),
(12, '2019_09_07_224604_create_payments_table', 10),
(13, '2019_09_07_224756_create_order__details_table', 10),
(14, '2019_09_07_224834_create_orders_table', 10),
(15, '2019_10_08_184006_create_reviews_table', 11),
(16, '2019_10_10_195746_create_support_messages_table', 12),
(17, '2019_10_14_191601_create_products_by_users_table', 13),
(18, '2019_10_23_193203_create_comments_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) NOT NULL,
  `shippingId` bigint(20) NOT NULL,
  `paymentId` bigint(20) NOT NULL,
  `total` double(8,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `userId`, `shippingId`, `paymentId`, `total`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 18, 6, 7759.00, 'pending', '2019-09-08 10:09:09', NULL),
(5, 1, 19, 7, 3300.00, 'pending', '2019-09-08 10:09:23', NULL),
(6, 1, 20, 8, 300.00, 'pending', '2019-10-07 06:10:21', NULL),
(7, 9, 21, 9, 3300.00, 'pending', '2019-10-09 04:10:38', NULL),
(8, 9, 22, 10, 3600.00, 'pending', '2019-10-09 04:10:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order__details`
--

CREATE TABLE `order__details` (
  `order__details_id` bigint(20) UNSIGNED NOT NULL,
  `orderId` bigint(20) NOT NULL,
  `productId` bigint(20) NOT NULL,
  `cost` double(8,2) NOT NULL,
  `requestQuantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order__details`
--

INSERT INTO `order__details` (`order__details_id`, `orderId`, `productId`, `cost`, `requestQuantity`, `created_at`, `updated_at`) VALUES
(4, 4, 18, 1800.00, 2, '2019-09-08 10:09:09', NULL),
(5, 4, 19, 375.00, 5, '2019-09-08 10:09:10', NULL),
(6, 4, 20, 84.00, 1, '2019-09-08 10:09:10', NULL),
(7, 4, 21, 5500.00, 5, '2019-09-08 10:09:10', NULL),
(8, 5, 21, 3300.00, 3, '2019-09-08 10:09:23', NULL),
(9, 6, 19, 300.00, 4, '2019-10-07 06:10:21', NULL),
(10, 7, 21, 3300.00, 3, '2019-10-09 04:10:39', NULL),
(11, 8, 17, 3600.00, 4, '2019-10-09 04:10:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(15) NOT NULL,
  `payment_status` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(6, 'Master card', 'pending', '2019-09-08 10:09:09', NULL),
(7, 'Master card', 'pending', '2019-09-08 10:09:23', NULL),
(8, 'Paypal', 'pending', '2019-10-07 06:10:21', NULL),
(9, 'Master card', 'pending', '2019-10-09 04:10:38', NULL),
(10, 'Visa', 'pending', '2019-10-09 04:10:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `brand_id` bigint(20) NOT NULL,
  `seller_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `description` longtext NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(120) NOT NULL,
  `color` varchar(40) NOT NULL,
  `price` double(8,2) NOT NULL,
  `currency` varchar(10) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `publication_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `seller_id`, `quantity`, `status`, `description`, `name`, `image`, `color`, `price`, `currency`, `size`, `publication_status`, `created_at`, `updated_at`) VALUES
(17, 8, 1, 1, 34, 'New', 'This is a product 1', 'labtop', 'products_images//labtop.jpg', 'red,black', 900.00, 'euro', '15inch', 1, '2019-09-05 20:26:30', '2019-10-28 19:51:12'),
(18, 8, 4, 1, 511, 'New', 'An iphone7 with capacity storage of 64GB, Ram 4GB, Camera 25mpixel', 'iphone7', 'products_images//AppleiPhone7.jpg', 'purper', 900.00, 'dollar', '6.22 INCH', 1, '2019-09-05 23:02:06', '2019-09-07 20:38:09'),
(19, 14, 7, 1, 808, 'New', 'The popular video game of konami pes 2020 is out now in platforms PS4,Xbox1', 'pes 2020', 'products_images//pes20.jpg', 'red,black', 75.00, 'dollar', '20CM x 20CM', 1, '2019-09-05 23:07:43', '2019-10-28 17:48:59'),
(20, 14, 8, 1, 561, 'New', 'Fifa 20 is released with great features in career mode', 'fifa 20', 'products_images//FIFA20.jpg', 'pink | blue', 84.00, 'dollar', '20CM x 20CM', 1, '2019-09-05 23:09:54', '2020-11-09 09:57:40'),
(21, 8, 5, 1, 740, 'New', 'Samsung TV with 48 INCH, Flat screen, with notch, support smart features', 'tv', 'products_images//tv.jpg', 'Black | White', 1100.00, 'euro', '40CM x 20CM', 1, '2019-09-05 23:22:44', '2019-10-28 17:48:29'),
(22, 9, 3, 1, 450, 'New', 'This is t-shirt for high quality', 't-shirt', 'products_images//tshirt.jpg', 'green', 25.00, 'dollar', 'XL,L,XXL', 1, '2019-10-10 16:39:41', '2019-10-10 16:39:41'),
(23, 10, 2, 1, 220, 'New', 'This is a beautiful sun glass', 'sunglasses', 'products_images//sunglass.jpg', 'silver', 75.00, 'dollar', NULL, 1, '2019-10-10 16:41:33', '2019-10-10 16:41:33'),
(24, 9, 3, 1, 550, 'New', 'This is gental blazer for men', 'blazers', 'products_images//blazer.jpg', 'Black | White | blue', 80.00, 'dollar', 'XL,L,XXL', 1, '2019-10-10 16:46:09', '2019-10-10 16:46:09'),
(25, 9, 3, 1, 200, 'Old', 'good polo shirt', 'polo shirt', 'products_images//poloshirt.jpg', 'red', 20.00, 'dollar', 'L | XL| M', 1, '2019-10-10 16:49:48', '2019-10-10 16:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `products_by_users`
--

CREATE TABLE `products_by_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `description` varchar(600) NOT NULL,
  `selling_address` varchar(100) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `colors` varchar(50) NOT NULL,
  `sizes` varchar(50) NOT NULL,
  `currency` varchar(12) NOT NULL,
  `tags` varchar(60) NOT NULL,
  `image` varchar(120) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` varchar(5) NOT NULL,
  `publication_status` varchar(12) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_by_users`
--

INSERT INTO `products_by_users` (`id`, `product_name`, `description`, `selling_address`, `user_id`, `user_name`, `colors`, `sizes`, `currency`, `tags`, `image`, `category`, `status`, `publication_status`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(3, 'T-shirt', 'beautiful tshirt that looks smart on men body and attractive', 'Egypt cairo', 1, 'Ahmed nabil', 'blue', 'xl', 'euro', 'clothes | shirts', 'products_images_by_sellers//tshirt.jpg', 'clothes', 'new', 'active', 20, 1, '2019-10-22 19:30:13', '2019-10-22 19:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `review` varchar(200) NOT NULL,
  `name` varchar(70) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rating`, `review`, `name`, `created_at`, `updated_at`) VALUES
(2, 1, 17, 4, 'f lkm mlmdfp', 'Ahmed nabil', '2019-10-08 18:26:51', '2019-10-08 18:26:51'),
(4, 1, 21, 4, 'good product thank you', 'Ahmed nabil', '2019-10-08 18:47:23', '2019-10-08 18:47:23'),
(5, 9, 21, 4, 'this is a greet things', 'Alaa nabil', '2019-10-09 15:54:15', '2019-10-09 15:54:15'),
(6, 1, 19, 4, 'This is the greatest football video game ever...', 'Ahmed nabil', '2019-10-28 17:15:27', '2019-10-28 17:15:27'),
(7, 11, 20, 4, 'Great product, I loved it', 'Ahmed', '2020-11-09 09:57:04', '2020-11-09 09:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `shipping_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(30) NOT NULL,
  `company_name` varchar(30) DEFAULT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `address1` varchar(60) NOT NULL,
  `address2` varchar(60) DEFAULT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `notes` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`shipping_id`, `email`, `company_name`, `fname`, `lname`, `address1`, `address2`, `mobile_number`, `notes`, `created_at`, `updated_at`) VALUES
(18, 'programmer2k18@gmail.com', 'Microsoft', 'Ahmed', 'Nabil', 'Egypt cairo', 'Egypt giza', '+201211711051', 'please deliver it before tommorow', '2019-09-08 10:09:09', '2019-09-08 10:09:09'),
(19, 'nabilahmed37@yahoo.com', 'Google', 'Alaa', 'Nabil', 'Egypt | cairo | Atfih station | Elbrombel', 'Egypt giza', '+201285262637', 'hurrey up', '2019-09-08 10:09:23', '2019-09-08 10:09:23'),
(20, 'programmer2k18@gmail.com', 'Microsoft', 'Ahmed', 'Nabil', 'Egypt cairo', 'Egypt giza', '+201211711051', 'smdlmol lnion nindo noln nson;n loino', '2019-10-07 06:10:20', '2019-10-07 06:10:20'),
(21, 'nabilahmed@yahoo.com', 'Google', 'Alaa', 'Nabil', 'Egypt | cairo | Atfih station | Elbrombel', 'Egypt giza', '+201211711051', 'please as possible as you can', '2019-10-09 04:10:38', '2019-10-09 04:10:38'),
(22, 'nabilahmed@yahoo.com', 'Alliad consaltant', 'Alaa', 'Nabil', 'Egypt cairo', 'Egypt giza', '+201285262637', 'PLease come soon', '2019-10-09 04:10:23', '2019-10-09 04:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `publication_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `heading`, `description`, `publication_status`, `created_at`, `updated_at`) VALUES
(3, 'sliders_images//image1.jpg', 'Welcome to E-shoper', 'The place where to find your needs', 1, '2019-09-05 20:40:12', '2019-09-05 20:40:12'),
(4, 'sliders_images//image2.jpg', 'Powering Shopping', 'Power your shopping search', 1, '2019-09-05 20:40:54', '2019-09-05 20:40:54'),
(5, 'sliders_images//image3.jpg', 'Ultimate Promotions', 'Plenty of&nbsp;Ultimate Promotions on products', 1, '2019-09-05 20:41:48', '2019-09-05 20:41:48');

-- --------------------------------------------------------

--
-- Table structure for table `support_messages`
--

CREATE TABLE `support_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `support_messages`
--

INSERT INTO `support_messages` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(4, 'Ahmed nabil', 'programmer2k18@gmail.com', '01245678936', 'Receiving Order', 'I ordered a product 3 days ago and didn\'t get it till now', '2019-10-10 19:35:21', '2019-10-10 19:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(35) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `age`, `gender`, `isAdmin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed nabil', 'programmer2k18@gmail.com', NULL, '$2y$10$fwdaHRsRt3pZiupP.fWeM.U4kGU4Fy0SXo7edQWnM4bZdv0kYmUni', '01245678936', 'Egypt,cairo', 55, 'Male', 0, NULL, '2019-09-03 18:03:10', '2019-09-03 18:03:10'),
(8, 'Mostafa Nabil', 'nabilahmed37@yahoo.com', NULL, '$2y$10$zX2BFC5tIC3we721UIWG/uY47WSpIpoop8M7wvEtqb2PkwG3i0h/.', '01550737092', 'Egypt,cairo', 28, 'Male', 1, NULL, '2019-10-07 18:47:27', '2019-10-07 18:47:27'),
(9, 'Alaa nabil', 'nabilahmed@yahoo.com', NULL, '$2y$10$8TwpybvbFDUVkuJkh6vLY.USoXgsfAU08R6HJINeZgzYazn75DwJy', '0128526546446', 'Egypt,cairo', 30, 'Male', 0, NULL, '2019-10-09 15:53:25', '2019-10-09 15:53:25'),
(10, 'Ali', 'pes20@gmail.com', NULL, '$2y$10$SqFrTn1o2vKWIzlg9ZvzsOQRRkL4niS9Ga35Dyzj5z3fudvho3dwa', '456465', 'Egypt,cairo', 22, 'Male', 0, NULL, '2019-10-30 15:44:06', '2019-10-30 15:44:06'),
(11, 'Ahmed', 'ahmed.nabil@gmail.com', NULL, '$2y$10$Fszawn/rPuGSn.IsUhvf8.2zVO7Dd5EkVvJB9QWVIKIbG3m70fYL6', '01122233366', 'Egypt', 22, 'Male', 1, NULL, '2020-11-09 09:54:31', '2020-11-09 09:54:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order__details`
--
ALTER TABLE `order__details`
  ADD PRIMARY KEY (`order__details_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_by_users`
--
ALTER TABLE `products_by_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_messages`
--
ALTER TABLE `support_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order__details`
--
ALTER TABLE `order__details`
  MODIFY `order__details_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `products_by_users`
--
ALTER TABLE `products_by_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `shipping_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `support_messages`
--
ALTER TABLE `support_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
