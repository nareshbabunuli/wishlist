-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Creato il: Giu 14, 2021 alle 16:34
-- Versione del server: 10.4.10-MariaDB
-- Versione PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wishlist`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_super_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`) USING HASH
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_super_admin`) VALUES
(2, 'admin', 'admin@example.com', NULL, '$2y$10$GVouKjakaUJTPDy7MKKUMuk00zVvtqbEEDu3jhOSv9lRB3CdW06Nu', NULL, '2020-06-20 02:50:39', '2020-06-20 02:50:39', '1');

-- --------------------------------------------------------

--
-- Struttura della tabella `admin_password_resets`
--

DROP TABLE IF EXISTS `admin_password_resets`;
CREATE TABLE IF NOT EXISTS `admin_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `admin_password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `admin_wishlist`
--

DROP TABLE IF EXISTS `admin_wishlist`;
CREATE TABLE IF NOT EXISTS `admin_wishlist` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `admin_wishlist`
--

INSERT INTO `admin_wishlist` (`id`, `product_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, '2', '2', '2020-06-26 02:10:36', '2020-06-26 02:10:36'),
(12, '4', '2', '2020-06-28 01:19:09', '2020-06-28 01:19:09'),
(11, '6', '2', '2020-06-26 10:42:34', '2020-06-26 10:42:34');

-- --------------------------------------------------------

--
-- Struttura della tabella `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_20_035025_create_admin_password_resets_table', 1),
(5, '2020_06_20_035025_create_admins_table', 1),
(6, '2020_05_19_070902_create_product_categories_table', 2),
(7, '2020_05_19_165202_create_products_table', 2),
(8, '2020_06_21_132409_create_wishlist_table', 3),
(9, '2020_06_26_034515_add_userid_to_products', 4),
(10, '2020_06_26_041027_add_userid_to_product_categories', 5),
(11, '2020_06_26_045123_create_admin_wishlist_table', 6),
(12, '2020_06_26_165352_add_is_admin_to_admins', 7);

-- --------------------------------------------------------

--
-- Struttura della tabella `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `product_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `product_category`, `description`, `image`, `created_at`, `updated_at`, `admin_id`) VALUES
(2, 'Shoe 2', 110, '1', '2nd Shoe', '1592916637.png', '2020-06-23 05:35:43', '2020-06-23 07:20:37', '2'),
(3, 'Shoe 3', 112, '1', 'Shoe 3', '1592916651.jpeg', '2020-06-23 05:36:13', '2020-06-23 07:20:51', '2'),
(4, 'Shoe 4', 50, '1', 'shoe 4', '1592916666.jpeg', '2020-06-23 05:37:16', '2020-06-23 07:21:06', '2'),
(5, 'Shoe 5', 85, '1', 'shoe 5', '1592916700.jpeg', '2020-06-23 05:37:46', '2020-06-23 07:21:40', '2'),
(6, 'Shoe 6', 69, '1', 'Shoe 6', '1592916715.jpeg', '2020-06-23 05:38:13', '2020-06-23 07:21:55', '2'),
(7, 'Shoe 7', 99, '1', 'Shoe 8', '1592917947.jpeg', '2020-06-23 05:38:36', '2020-06-23 07:42:27', '2'),
(8, 'Shoe 8', 77, '1', 'Shoe 8', '1592916801.jpeg', '2020-06-23 05:39:16', '2020-06-23 07:23:21', '2');

-- --------------------------------------------------------

--
-- Struttura della tabella `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_name`, `created_at`, `updated_at`, `admin_id`) VALUES
(1, 'shoe', '2020-06-21 02:48:46', '2020-06-21 02:48:46', '2'),
(2, 'shirt', '2020-06-25 08:14:54', '2020-06-25 08:14:54', '2');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`) USING HASH
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'customer 1', 'customer1@gmail.com', NULL, '$2y$10$wUs5Eaqu.qNVVmOqCvHUwuFH3smyOXnaikRK9g52QOCpvMnaB2pbO', NULL, '2020-06-20 00:22:59', '2020-06-25 10:59:39'),
(6, 'customer2', 'customer2@gmail.com', NULL, '$2y$10$uuFc.qAMNBjhTgYw619HAuV8tjSz5GlBsJCmFE5aRVDLoZLeo17R.', NULL, '2020-06-25 10:17:49', '2020-06-25 10:17:49'),
(8, 'customer4', 'customer4@gmail.com', NULL, '$2y$10$3nA5UTXV7cjKqRsCyPo7CecsyLaTUPT8PAWp4YPufeL7s1WoEqNxO', NULL, '2020-06-25 10:41:49', '2020-06-25 10:41:49'),
(10, 'customer3', 'customer3@gmail.com', NULL, '$2y$10$ibGGrXVhLmSbIYrOY9ABpuuaK8aY2OxejWFLv.OmD.G3Za6Ro1NsW', NULL, '2020-06-25 10:47:23', '2020-06-25 10:47:23');

-- --------------------------------------------------------

--
-- Struttura della tabella `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `wishlist`
--

INSERT INTO `wishlist` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(11, '2', '6', '2020-06-28 02:36:49', '2020-06-28 02:36:49'),
(10, '2', '1', '2020-06-25 07:16:11', '2020-06-25 07:16:11'),
(9, '1', '1', '2020-06-25 07:16:06', '2020-06-25 07:16:06');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
