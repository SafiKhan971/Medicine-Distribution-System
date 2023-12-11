-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2023 at 05:16 PM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

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
  `picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `picture`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$12$wsStQJpNX.3LbgR4NUYrg.JvONOna22GlAZRDIY0e9u78kUwhMar2', 'user-avatar.png');

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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `doctor_id`, `app_dt_start`, `app_dt_end`, `created_at`, `updated_at`) VALUES
(16, 6, 2, '2023-11-30 21:30:00', '2023-11-30 22:00:00', '2023-11-30 11:30:39', '2023-11-30 11:30:39'),
(17, 6, 2, '2023-12-01 20:41:00', '2023-12-01 21:11:00', '2023-12-01 10:42:02', '2023-12-01 10:42:02'),
(18, 6, 5, '2023-12-10 20:47:00', '2023-12-10 21:17:00', '2023-12-10 18:47:46', '2023-12-10 10:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) DEFAULT NULL,
  `phone_no` varchar(191) DEFAULT NULL,
  `nationality` varchar(191) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(191) DEFAULT NULL,
  `profile_picture` varchar(191) DEFAULT NULL,
  `medical_license_picture` varchar(191) DEFAULT NULL,
  `medical_license_no` varchar(191) DEFAULT NULL,
  `specialization` varchar(191) DEFAULT NULL,
  `experience` int DEFAULT NULL,
  `board_certifications` varchar(191) DEFAULT NULL,
  `clinic_name` varchar(191) DEFAULT NULL,
  `clinic_email` varchar(191) DEFAULT NULL,
  `clinic_phone` varchar(191) DEFAULT NULL,
  `clinic_address` varchar(191) DEFAULT NULL,
  `days_week` varchar(191) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `doctors_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `password`, `phone_no`, `nationality`, `dob`, `gender`, `profile_picture`, `medical_license_picture`, `medical_license_no`, `specialization`, `experience`, `board_certifications`, `clinic_name`, `clinic_email`, `clinic_phone`, `clinic_address`, `days_week`, `start_time`, `end_time`, `created_at`, `updated_at`, `status`) VALUES
(5, 'Amena Chapman', 'bonosa@mailinator.com', '$2y$12$HIpNvpbBZjYDfZ.y78hS0OkqCUnttinyMDsjU39KJ.g88BcLic0Oe', '13', 'Impedit dolorem nis', '2015-02-24', 'female', 'Dark bg logo.png', 'Breakpoints of screens.png', 'Labore incididunt se', 'Beatae animi quos n', 1975, 'Sint culpa at esse f', 'McKenzie Acosta', 'tagata@mailinator.com', '+1 (978) 363-4547', 'Officiis quia ea mol', '4', '21:48:00', '01:42:00', '2023-12-08 12:29:30', '2023-12-10 01:27:01', 1),
(2, 'Numan Anwar', 'numananwar789@gmail.com', '$2y$12$HIpNvpbBZjYDfZ.y78hS0OkqCUnttinyMDsjU39KJ.g88BcLic0Oe', '03325548599', 'Pak', '2006-02-18', 'male', 'user-avatar.png', 'home (570 x 500 px).png', '12312', 'Cardiology', 2, 'BISE', 'Numan Anwar', 'numananwar789@gmail.com', '03325548599', 'Kotka Haji Ayub Khan', '4', '22:14:00', '22:15:00', '2023-12-08 12:14:16', '2023-12-08 12:14:33', 1),
(6, 'Dahlia Williamson', 'gaval@mailinator.com', NULL, '21', 'Molestiae amet mole', '1978-11-28', 'female', NULL, NULL, 'Ea provident animi', 'Deserunt nesciunt e', 1975, 'Explicabo Eiusmod p', 'Yoshi Thompson', 'panotadocy@mailinator.com', '+1 (515) 716-2871', 'Non et est ducimus', '11', '11:36:00', '16:46:00', '2023-12-10 01:56:08', '2023-12-10 01:56:08', 0),
(7, 'Troy Peck', 'zedexywa@mailinator.com', NULL, '1', 'Labore autem dolor q', '2016-08-25', 'non-binary', 'user-avatar.png', 'tree-736885_1280.jpg', 'Dolor eu unde non cu', 'Est delectus pariat', 2009, 'At alias ullam iste', 'Preston Riddle', 'dycujuvij@mailinator.com', '+1 (171) 881-7938', 'Eu facere culpa qui', '20', '01:22:00', '20:58:00', '2023-12-10 02:34:01', '2023-12-10 02:34:01', 0);

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
-- Table structure for table `health_records`
--

DROP TABLE IF EXISTS `health_records`;
CREATE TABLE IF NOT EXISTS `health_records` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED DEFAULT NULL,
  `past_medical_condition` longtext NOT NULL,
  `present_medical_condition` longtext NOT NULL,
  `medications` text NOT NULL,
  `blood_pressure` int DEFAULT NULL,
  `heart_rate` int DEFAULT NULL,
  `respiratory_rate` int DEFAULT NULL,
  `temprature` int DEFAULT NULL,
  `weight` int DEFAULT NULL,
  `lifestyle_info` longtext NOT NULL,
  `healthcare_providers` longtext NOT NULL,
  `comments` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_08_101236_create_doctors_table', 2),
(6, '2023_11_29_163415_create_health_records_table', 3),
(8, '2023_12_08_164623_add_status_to_doctors', 4);

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
  `phone` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `picture`, `gender`, `dob`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'Jackson Forbes', 'kodosyw@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$sYiaj/KzpXnx.D55d1RnKO8atT780/3.vpkBEN/LqRphQzXtwWAfq', NULL, '2023-12-08 11:32:22', '2023-12-08 11:32:22'),
(9, 'Allegra Reeves', 'mohalamav@mailinator.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$D1O/fQUONl8oFsxbG1/s3uUlngZiBczH7VyrA6sibKFPu1prEfxWi', NULL, '2023-12-08 11:25:29', '2023-12-08 11:25:29'),
(6, 'Numan Anwar', 'numan@gmail.com', '03325548599', 'IMG_20230412_113329.jpg', 'Male', '2001-08-31', 'Sami Communication and Easy Paisa Shop Tanchi Bazar, Bannu', '2023-12-10 01:40:52', '$2y$12$yMZNiJQQpncP9xQpCWXJ3.f8BuGHHhZ/wSrr.do.9yWmCGA3.DrSa', 'PGivQn5oQenVVsk3hhSWdgOQjU8OAkXsLY3fx7N9GqYiRoEJdzGtTa6y8cpe', '2023-11-22 12:12:02', '2023-12-10 01:40:52');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
