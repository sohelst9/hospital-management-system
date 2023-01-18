-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2023 at 10:17 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Is_admin` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `phone`, `image`, `password`, `Is_admin`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '01709876543', '1.webp', '$2y$10$mqHirymbwtVzoRLiTcmQa.6Iblypn7tFo7QhQk/ga.JcThBI5kF2q', 1, '2023-01-18 09:18:02', '2023-01-18 09:18:02'),
(2, 'squre', 'squre@gmail.com', NULL, NULL, '$2y$10$TGcF4r2YD5u4KeP.P50ejuNyhzXfgqrM16J8aRBMFDnTkN0dho7py', 0, '2023-01-18 09:18:02', '2023-01-18 09:18:02'),
(3, 'labaid', 'labaid@gmail.com', '01765432567', NULL, '$2y$10$ZsP6rMtld5wU5.PV6l47defct3MgE8.VmRB6/145OngXm/cM2AGJS', 0, '2023-01-18 14:10:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `hospital_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time_slot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `hospital_id`, `category_id`, `name`, `email`, `phone`, `date`, `time_slot`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'test', 'test@gmail.com', '01765432567', '2023-01-25', '15:25', 1, '2023-01-18 09:25:03', '2023-01-18 09:35:07'),
(2, 1, 1, 1, 'Sohel Rana', 'naptechgames@gmail.com', '01765432567', '2023-01-18', '00:26', 1, '2023-01-18 11:25:44', '2023-01-18 11:26:42'),
(3, 1, 2, 2, 'Lab Aid Hospital', 'test@gmail.com', '01765432567', '2023-01-26', '08:39', 0, '2023-01-18 14:33:52', '2023-01-18 14:33:52'),
(4, 2, 1, 1, 'test', 'test@gmail.com', '01765432567', '2023-01-26', '07:04', 1, '2023-01-18 14:40:16', '2023-01-18 16:07:23');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `hospital_id` bigint UNSIGNED NOT NULL,
  `labtest_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `hospital_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `hospital_id`, `name`, `slug`, `description`, `thumbnail`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Blood test', 'blood-test', '<p>Most blood tests only take a few minutes to complete and are carried out at your GP surgery or local hospital by a doctor, nurse or phlebotomist (a specialist in taking blood samples).</p>', 'blood (2).jpeg', 2, '2023-01-18 09:18:02', '2023-01-18 15:01:09'),
(2, 1, 'test', 'test', '<p>dgfh</p>', 'pexels-anna-shvets-3786215 (3).jpg', 2, '2023-01-18 11:27:29', '2023-01-18 11:27:29'),
(3, 2, 'test', 'test', '<p>testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttestdfghhfhfgff</p>', 'download (4).jpeg', 3, '2023-01-18 14:10:57', '2023-01-18 15:01:50'),
(4, 1, 'test444', 'test444', '<p>444444444wrrrrrrrrrrrrrrrrr</p>', 'pexels-martin-lopez-954585.jpg', 2, '2023-01-18 14:51:18', '2023-01-18 15:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `admin_id`, `name`, `slug`, `sub_title`, `description`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 2, 'Squre Hospital', 'squre-hospital', 'Squre is one of the largest and most recognized private healthcare brands in Bangladesh.', 'LabaSqureid is one of the largest and most recognized private healthcare brands in Bangladesh.', 'hospital2.webp', '2023-01-18 09:18:02', '2023-01-18 09:18:02'),
(2, 3, 'Lab Aid Hospital', 'lab-aid-hospital', 'Lab Aid Hospital', '<h3><strong>Lab Aid HospitalLab Aid HospitalLa</strong>b Aid HospitalLab Aid HospitalLab Aid HospitalLab Aid HospitalLab Aid HospitalLab Aid HospitalLab Aid HospitalLab Aid HospitalLab Aid HospitalLab Aid HospitalLab Aid HospitalLab Aid HospitalLab Aid Hospital</h3>', 'pexels-mathias-reding-9741531.jpg', '2023-01-18 14:10:20', '2023-01-18 15:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `labtests`
--

CREATE TABLE `labtests` (
  `id` bigint UNSIGNED NOT NULL,
  `hospital_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labtests`
--

INSERT INTO `labtests` (`id`, `hospital_id`, `category_id`, `name`, `slug`, `price`, `description`, `thumbnail`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'TC DC Blood Test', 'tc-dc-blood-test', '2505', '<p>The test measures Hb (Hemoglobin), TC (Total count), DC (Differential count), and ESR(Erythrocyte Sedimentation Rate).It gives information about the general</p>', 'tc-dc.jpeg', 1, '2023-01-18 09:18:02', '2023-01-18 15:49:15'),
(2, 1, 1, 'testsss', 'testsss', '403', '<p>DDGGG</p>', 'pexels-karolina-grabowska-4230623 (4).jpg', 2, '2023-01-18 11:00:58', '2023-01-18 15:53:09'),
(3, 1, 1, 'test', 'test', '403', '<p>ddgd</p>', 'pexels-karolina-grabowska-4230623 (4).jpg', 2, '2023-01-18 11:28:03', '2023-01-18 11:28:03'),
(4, 2, 3, 'test2', 'test2', '678', '<p>testtesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttesttest</p>', 'pexels-karolina-grabowska-4230623 (6).jpg', 3, '2023-01-18 14:11:19', '2023-01-18 14:11:19'),
(5, 1, 2, 'testrtytyu', 'testrtytyu', '12700', '<p>adfhgj;lkfdsaSDFGJKKJHG</p>', 'pexels-karolina-grabowska-4230623 (5).jpg', 2, '2023-01-18 15:08:08', '2023-01-18 15:08:17');

-- --------------------------------------------------------

--
-- Table structure for table `lab_test_reports`
--

CREATE TABLE `lab_test_reports` (
  `id` bigint UNSIGNED NOT NULL,
  `labtest_order_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `report_file` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lab_test_reports`
--

INSERT INTO `lab_test_reports` (`id`, `labtest_order_id`, `title`, `comment`, `report_file`, `created_at`, `updated_at`) VALUES
(1, 1, 'ff', 'fff', 'pexels-karolina-grabowska-4230623.jpg', '2023-01-18 09:24:05', '2023-01-18 09:24:05'),
(2, 1, 'sdfgrgfg', 'ereddfdf', 'pexels-anna-shvets-3786215.jpg', '2023-01-18 10:16:35', '2023-01-18 10:16:35'),
(3, 1, 'gfgfg', 'gfg', 'pexels-karolina-grabowska-4230623 (1).jpg', '2023-01-18 11:30:55', '2023-01-18 11:30:55'),
(4, 4, 'xfdfdf', 'dfdfd', 'pexels-anna-shvets-3786215 (2).jpg', '2023-01-18 13:33:06', '2023-01-18 13:33:06'),
(5, 4, 'df', 'fdfdfdfd', 'pexels-mathias-reding-9741531.jpg', '2023-01-18 13:34:31', '2023-01-18 13:34:31'),
(6, 2, 'ssdsfds', 'dsdsd', 'pexels-karolina-grabowska-4230623 (5).jpg', '2023-01-18 13:57:34', '2023-01-18 13:57:34'),
(7, 5, '403 quantity 1', '403 quantity 1', 'blood (2).jpeg', '2023-01-18 16:02:55', '2023-01-18 16:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_15_131550_create_admins_table', 1),
(6, '2023_01_15_170253_create_hospitals_table', 1),
(7, '2023_01_16_085312_create_categories_table', 1),
(8, '2023_01_16_092125_create_labtests_table', 1),
(9, '2023_01_16_130557_create_permission_tables', 1),
(10, '2023_01_17_201120_create_carts_table', 1),
(11, '2023_01_17_233531_create_order_lab_test_details_table', 1),
(12, '2023_01_18_085912_create_appointments_table', 1),
(13, '2023_01_18_151444_create_lab_test_reports_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_lab_test_details`
--

CREATE TABLE `order_lab_test_details` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `hospital_id` tinyint NOT NULL,
  `labtest_id` tinyint NOT NULL,
  `quantity` int NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` tinyint DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_lab_test_details`
--

INSERT INTO `order_lab_test_details` (`id`, `user_id`, `hospital_id`, `labtest_id`, `quantity`, `total`, `payment_method`, `fname`, `lname`, `email`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 2, '500', 1, 'Sohel', 'Rana', 'test@gmail.com', 'Dhaka', 1, '2023-01-18 09:20:06', '2023-01-18 09:23:56'),
(2, 1, 1, 2, 1, '400', 1, 'Sohel', 'Rana', 'naptechgames@gmail.com', 'Dhaka', 1, '2023-01-18 11:29:47', '2023-01-18 11:30:25'),
(3, 1, 1, 3, 2, '600', 1, 'test', 'sds', 'squre@gmail.com', 'Dhaka', 1, '2023-01-18 11:34:55', '2023-01-18 13:34:02'),
(4, 1, 1, 2, 1, '700', 1, 'test', 'sds', 'squre@gmail.com', 'Dhaka', 1, '2023-01-18 11:34:55', '2023-01-18 13:34:06'),
(5, 2, 1, 2, 1, '403', 1, 'Sohel', 'Rana', 'sohel.naptechlabs@gmail.com', 'Dhaka', 1, '2023-01-18 14:41:35', '2023-01-18 16:02:21'),
(6, 1, 1, 2, 2, '250', 1, 'Sohel', 'Rana', 'sohel.naptechlabs@gmail.com', 'Dhaka', 0, '2023-01-18 14:44:45', NULL),
(7, 1, 1, 3, 5, '250', 1, 'Sohel', 'Rana', 'sohel.naptechlabs@gmail.com', 'Dhaka', 0, '2023-01-18 14:44:45', NULL),
(8, 1, 2, 4, 2, '250', 1, 'Sohel', 'Rana', 'sohel.naptechlabs@gmail.com', 'Dhaka', 0, '2023-01-18 14:44:45', NULL),
(9, 1, 1, 1, 1, '250', 1, 'Sohel', 'Rana', 'sohel.naptechlabs@gmail.com', 'Dhaka', 0, '2023-01-18 14:44:45', NULL);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
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
(1, 'test', 'test@gmail.com', NULL, '$2y$10$IVdL3dmypJuhxR8PfyWoR.ku/knrMYyBlVnYbCQIsu7MymIeEW.bu', NULL, '2023-01-18 09:19:34', '2023-01-18 09:19:34'),
(2, 'Sohel Rana', 'sohel.naptechlabs@gmail.com', NULL, '$2y$10$bWIp8F.EAy2XbOcUnrrES.myuYtuW5AEgKwuJX3ZYeWuFD6YbUJKe', NULL, '2023-01-18 14:39:42', '2023-01-18 14:39:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`),
  ADD KEY `appointments_hospital_id_foreign` (`hospital_id`),
  ADD KEY `appointments_category_id_foreign` (`category_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_hospital_id_foreign` (`hospital_id`),
  ADD KEY `carts_labtest_id_foreign` (`labtest_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_hospital_id_foreign` (`hospital_id`),
  ADD KEY `categories_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hospitals_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `labtests`
--
ALTER TABLE `labtests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `labtests_hospital_id_foreign` (`hospital_id`),
  ADD KEY `labtests_category_id_foreign` (`category_id`),
  ADD KEY `labtests_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `lab_test_reports`
--
ALTER TABLE `lab_test_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `order_lab_test_details`
--
ALTER TABLE `order_lab_test_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_lab_test_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `labtests`
--
ALTER TABLE `labtests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lab_test_reports`
--
ALTER TABLE `lab_test_reports`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_lab_test_details`
--
ALTER TABLE `order_lab_test_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_labtest_id_foreign` FOREIGN KEY (`labtest_id`) REFERENCES `labtests` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `categories_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD CONSTRAINT `hospitals_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `labtests`
--
ALTER TABLE `labtests`
  ADD CONSTRAINT `labtests_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `labtests_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `labtests_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_lab_test_details`
--
ALTER TABLE `order_lab_test_details`
  ADD CONSTRAINT `order_lab_test_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
