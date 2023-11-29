-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 29, 2023 at 10:02 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$12$wsStQJpNX.3LbgR4NUYrg.JvONOna22GlAZRDIY0e9u78kUwhMar2');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `app_dt_start` datetime NOT NULL,
  `app_dt_end` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `doctor_id`, `app_dt_start`, `app_dt_end`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2023-11-17 22:10:00', '2023-11-17 22:40:00', '2023-11-26 12:07:06', '2023-11-29 03:40:59'),
(2, 1, 1, '2023-11-29 22:10:00', '2023-11-29 22:40:00', '2023-11-26 12:11:07', '2023-11-29 03:45:24'),
(3, 1, 2, '2023-11-26 22:51:00', '2023-11-26 23:21:00', '2023-11-26 12:51:23', '2023-11-26 12:51:23'),
(4, 1, 1, '2023-11-26 23:22:00', '2023-11-26 23:52:00', '2023-11-26 13:22:46', '2023-11-26 13:22:46'),
(5, 1, 1, '2023-11-26 23:23:00', '2023-11-26 23:53:00', '2023-11-26 13:23:35', '2023-11-26 13:23:35'),
(6, 1, 1, '0000-00-00 00:00:00', '2023-11-26 23:56:00', '2023-11-26 13:26:45', '2023-11-26 13:26:45'),
(7, 1, 2, '2023-11-26 23:54:00', '2023-11-27 00:24:00', '2023-11-26 13:54:46', '2023-11-26 13:54:46'),
(8, 1, 2, '2023-11-26 23:55:00', '2023-11-27 00:25:00', '2023-11-26 13:55:06', '2023-11-26 13:55:06'),
(9, 1, 3, '2023-11-27 21:09:00', '2023-11-27 21:39:00', '2023-11-27 11:09:08', '2023-11-27 11:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Regina Logan', 'nypolenak@mailinator.com', '$2y$12$N.K/8da/JouxnLGSPGRA3e9aXWqFsaLvK2D9xAtICR6p.KBYOpm4O', '2023-11-21 22:22:49', '2023-11-21 22:22:49'),
(2, 'MacKensie Rowland', 'xejoxi@mailinator.com', '$2y$12$eXwzeQ9cGrcZ8taM4DKM5e25CxFqrrP/aXBXAuIVWqvSWdGGF7uwi', '2023-11-21 22:31:47', '2023-11-21 22:31:47'),
(3, 'Kessie Smith', 'zagez@mailinator.com', '$2y$12$G2efqbyE782Ujee114tbYuhTmoJ0YvIm4CnXY3kxxyJcuiPYuG4Xy', '2023-11-24 10:38:41', '2023-11-24 10:38:41'),
(4, 'Gareth Waters', 'paveca@mailinator.com', '$2y$12$PDtbRwwW7FwPZJop9GGPuey8FUEZhVgqQkGp0dR5Mh4W/ubnfbpJS', '2023-11-24 10:42:26', '2023-11-24 10:42:26'),
(5, 'Quinn Delacruz', 'voruwidef@mailinator.com', '$2y$12$R31NfcubxKNkB6fPT9v5LO.TctC5RWXIq4qy.TFhIZx6aMZlnKJeC', '2023-11-28 01:33:26', '2023-11-28 01:33:26'),
(6, 'Ignatius Whitney', 'guhob@mailinator.com', '$2y$12$80lQueE.wTtvz4SWG6oFreuBMru0ntundaIjZvVokqRMj761wAq.q', '2023-11-28 01:38:20', '2023-11-28 01:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_24_160035_create_appointments_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `google_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `google_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Safi Khan', 'safi@gmail.com', NULL, '$2y$12$lrMbuNFNGHMzBCDVmiC3pun2CVV660.n7epXhZBugLG.nzqYIODXi', '', NULL, '2023-11-20 13:21:34', '2023-11-20 13:21:34'),
(3, 'Numan Anwar', 'numan@gmail.com', NULL, '$2y$12$oaD2tuCu6E7lyeasuzGZ/exEbL2KbRWg/WaCaNQ4gjq42OVQxWGz.', '', NULL, '2023-11-21 16:35:46', '2023-11-29 02:13:57'),
(4, 'Ciara Maxwell', 'leqyrigi@mailinator.com', NULL, '$2y$12$tZO9pkjzZhp1x8oEyUqjp.HJPOxXNhLg7Ms8Gpq928vG.YKqxuG.O', '', NULL, '2023-11-21 18:14:58', '2023-11-21 18:14:58'),
(5, 'Lillith Nicholson', 'qixu@mailinator.com', NULL, '$2y$12$n7NfDauUw7dLfI5Nyc1ni.qEFeAdBQJiYAubAlBjB0JVUEPYf5M.y', '', NULL, '2023-11-21 22:34:16', '2023-11-21 22:34:16'),
(7, 'Linda Santos', 'wyfyki@mailinator.com', NULL, '$2y$12$xN4p6GXpE3bKL9Tj4cdiC.yfHYHL.Kgz1xFdKro5r9v869E/VXosi', NULL, NULL, '2023-11-28 01:07:02', '2023-11-28 01:07:02'),
(8, 'Madison Larsen', 'wakalu@mailinator.com', NULL, '$2y$12$EC3mU64ZB8X4leLu.zpk2ObxytGy8xTtxnTNspgThgyYHRhih8w36', NULL, NULL, '2023-11-28 01:37:20', '2023-11-28 01:37:20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
