-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 25, 2023 at 03:25 AM
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
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `picture` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `password`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, '$2y$12$C3RqfoHopsTaTOs3LwsAjOUvzhpVYYUH9OVZO1GvrldYU6pUdCw.a', 'user-avatar.png', '2023-12-14 15:29:33', '2023-12-14 15:29:33');

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
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `doctor_id`, `app_dt_start`, `app_dt_end`, `status`, `created_at`, `updated_at`) VALUES
(4, 4, 1, '2023-12-22 21:18:00', '2023-12-22 21:48:00', 0, '2023-12-22 15:19:00', '2023-12-22 15:19:00'),
(3, 1, 1, '2023-12-21 08:30:00', '2023-12-21 09:00:00', 0, '2023-12-21 02:29:15', '2023-12-21 02:29:15');

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
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `doctors_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `password`, `phone_no`, `nationality`, `dob`, `gender`, `profile_picture`, `medical_license_picture`, `medical_license_no`, `specialization`, `experience`, `board_certifications`, `clinic_name`, `clinic_email`, `clinic_phone`, `clinic_address`, `days_week`, `start_time`, `end_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Khadija', 'khadija@mail.com', '$2y$12$4kNB3mhU5ZsqkFWQ.ZA4SOdmbTMdUdvkB1BolhI0WZaJAGWaEYRzO', '11', 'Ut reprehenderit ma', '2013-04-11', 'male', 'user-avatar.png', 'PO-Box-Number-795-Islamabad-Jobs-2023.webp', 'Aut ut unde amet do', 'Dermatology', 3, 'Fuga Et in ipsa ve', 'Nadine Palmer', 'zabowe@mailinator.com', '+1 (305) 756-3837', 'Eveniet est anim q', '4', '16:50:00', '22:45:00', 1, '2023-12-14 15:55:49', '2023-12-14 15:57:54'),
(2, 'Ali', 'ali@mail.com', '$2y$12$4kNB3mhU5ZsqkFWQ.ZA4SOdmbTMdUdvkB1BolhI0WZaJAGWaEYRzO', '11', 'Ut reprehenderit ma', '2013-04-11', 'male', 'user-avatar.png', 'PO-Box-Number-795-Islamabad-Jobs-2023.webp', 'Aut ut unde amet do', 'Endocrinologist', 4, 'Fuga Et in ipsa ve', 'Nadine Palmer', 'zabowe@mailinator.com', '+1 (305) 756-3837', 'Eveniet est anim q', '4', '16:50:00', '22:45:00', 1, '2023-12-14 15:55:49', '2023-12-14 15:57:54'),
(3, 'Zain', 'zain@mail.com', '$2y$12$4kNB3mhU5ZsqkFWQ.ZA4SOdmbTMdUdvkB1BolhI0WZaJAGWaEYRzO', '11', 'Ut reprehenderit ma', '2013-04-11', 'male', 'user-avatar.png', 'PO-Box-Number-795-Islamabad-Jobs-2023.webp', 'Aut ut unde amet do', 'Gastroenterology', 5, 'Fuga Et in ipsa ve', 'Nadine Palmer', 'zabowe@mailinator.com', '+1 (305) 756-3837', 'Eveniet est anim q', '4', '16:50:00', '22:45:00', 1, '2023-12-14 15:55:49', '2023-12-14 15:57:54'),
(4, 'Test Doctor', 'doctor@gmail.com', '$2y$12$Sl8ile/XTNKsrJVgPCGKNuDvcRMdq/1D3n7fCsa6yzXXkan4.y4Di', '123456', 'Pak', '2005-09-12', 'male', 'user-avatar.png', 'Digital Clinic Logo.png', '123', 'Dermatology', 3, 'UOL', 'Test Clinic', 'test@email.com', '123456', 'test address', '4', '09:00:00', '17:00:00', 0, '2023-12-22 15:26:30', '2023-12-22 15:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_name` varchar(191) NOT NULL,
  `health_record_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `file_name`, `health_record_id`, `created_at`, `updated_at`) VALUES
(5, 'dhc_ogo.png', 1, '2023-12-19 17:46:31', '2023-12-19 17:46:31'),
(4, 'Dark bg logo.png', 1, '2023-12-19 17:46:31', '2023-12-19 17:46:31'),
(3, 'Digital Clinic Logo.png', 1, '2023-12-19 17:13:57', '2023-12-19 17:45:24');

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
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `comments` varchar(191) NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `doctor_id` bigint UNSIGNED DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `comments`, `user_id`, `doctor_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Error labore quis su', 1, NULL, 0, '2023-12-15 16:57:37', '2023-12-15 16:57:37'),
(2, 'Test comment', 4, NULL, 0, '2023-12-22 15:20:30', '2023-12-22 15:20:30');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `health_records`
--

INSERT INTO `health_records` (`id`, `user_id`, `doctor_id`, `past_medical_condition`, `present_medical_condition`, `medications`, `blood_pressure`, `heart_rate`, `respiratory_rate`, `temprature`, `weight`, `lifestyle_info`, `healthcare_providers`, `comments`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Porro sit voluptatib', 'Maiores necessitatib', 'Ad dolorem soluta pe', 77, 25, 35, 69, 81, 'Maiores sunt amet', 'Est sint adipisicing', '<p>asdasdasdadasd</p>', '2023-12-19 16:21:15', '2023-12-19 17:35:19');

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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(22, '2023_11_24_160035_create_appointments_table', 5),
(14, '2023_11_29_163415_create_health_records_table', 1),
(23, '2023_12_03_101814_create_documents_table', 6),
(16, '2023_12_08_101236_create_doctors_table', 1),
(17, '2023_12_14_195716_create_admins_table', 1),
(24, '2023_12_14_212617_create_notifications_table', 7),
(21, '2023_12_15_200936_create_feedbacks_table', 4),
(25, '2023_12_21_222058_create_prescriptions_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(191) NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `user_id`, `doctor_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'appointment', 1, 1, 0, '2023-12-21 02:29:15', '2023-12-21 02:29:15'),
(2, 'video_call_request', 1, 1, 1, '2023-12-21 02:29:36', '2023-12-21 16:54:57'),
(3, 'appointment', 4, 1, 0, '2023-12-22 15:19:00', '2023-12-22 15:19:00'),
(4, 'video_call_request', 4, 1, 1, '2023-12-22 15:21:07', '2023-12-22 15:33:03');

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
-- Table structure for table `prescriptions`
--

DROP TABLE IF EXISTS `prescriptions`;
CREATE TABLE IF NOT EXISTS `prescriptions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `medicine_name` varchar(191) NOT NULL,
  `dosage` varchar(191) NOT NULL,
  `unit` varchar(191) NOT NULL,
  `frequency` varchar(191) NOT NULL,
  `route_of_administration` varchar(191) NOT NULL,
  `duration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `additional_instructions` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `user_id`, `doctor_id`, `medicine_name`, `dosage`, `unit`, `frequency`, `route_of_administration`, `duration`, `additional_instructions`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Panadol', '2 Tab', 'mg', 'Once Daily', 'Topical', '7 Days', 'Test Additional Instructions', '2023-12-22 14:58:51', '2023-12-22 17:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `picture` varchar(191) DEFAULT NULL,
  `gender` varchar(191) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `google_id` varchar(191) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `picture`, `gender`, `dob`, `address`, `email_verified_at`, `password`, `google_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Numan', 'numan@gmail.com', NULL, 'IMG_20230412_113329.jpg', NULL, NULL, NULL, '2023-12-16 15:46:13', '$2y$12$0l4r2hvBmUd/9XgvNP2RcuqE68ps90SLoabaY8QBaHUAfrQ8nrxqu', NULL, NULL, '2023-12-16 15:45:26', '2023-12-19 17:10:14'),
(2, 'Numan Anwar', 'numananwar789@gmail.com', NULL, NULL, NULL, NULL, NULL, '2023-12-17 06:12:45', '$2y$12$/CuIw8t0HtCMUdjNRBw9MeSLcdCPfc1e8UFkr8QQhMdIdCPsPR/ha', '118230902951519858102', 'WST7lpE7Cx4QgeNH4terIPxFBe40x0ghiAsqxlGDWEQN1Uqcezt28onEJs3t', '2023-12-17 06:11:36', '2023-12-17 06:11:36'),
(3, 'Kato Pena', 'vody@mail.com', NULL, NULL, NULL, NULL, NULL, '2023-12-18 19:00:00', '$2y$12$DDKfhqaCP8julBk97mTW6.lxnZVxOziBOwdcfe0CPKhfPUp2T6ux6', NULL, NULL, '2023-12-19 16:52:11', '2023-12-19 16:52:11'),
(4, 'test', 'test@mail.com', NULL, NULL, NULL, NULL, NULL, '2023-12-22 15:16:04', '$2y$12$GN3ULi4qQNf5CcuoJAqTLO/8R4U0t4WUkztuu6zZDrCt7d9Db9zXq', NULL, NULL, '2023-12-22 15:14:40', '2023-12-22 15:16:04');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
