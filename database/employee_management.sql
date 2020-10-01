-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2020 at 07:46 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `address_one`, `state`, `address_two`, `post_code`, `city`, `created_at`, `updated_at`) VALUES
(1, 2, 'sharif complex', 'Dhaka', 'sharif complex', '1000', 'Dhaka', '2020-04-08 10:43:49', '2020-04-08 10:43:49'),
(2, 3, 'sharif complex', 'Dhaka', 'sharif complex', '1000', 'Dhaka', '2020-04-08 10:45:52', '2020-04-08 10:45:52'),
(3, 4, 'sharif complex', 'Dhaka', 'sharif complex', '1000', 'Dhaka', '2020-04-10 06:13:51', '2020-04-10 06:13:51'),
(4, 5, 'sharif complex', 'Dhaka', 'sharif complex', '1000', 'Dhaka', '2020-04-10 06:15:05', '2020-04-10 06:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `em_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `em_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `em_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lunch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_hour` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sick` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leave` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `em_id`, `em_name`, `em_email`, `department`, `date`, `start`, `lunch`, `end`, `total_hour`, `sick`, `leave`, `file`, `comment`, `created_at`, `updated_at`) VALUES
(1, '1', 'rijwan chowdhury', 'rijwanc007@gmail.com', 'admin', '2020-04-16', '08:33', '1', '17:30', '8', NULL, NULL, NULL, NULL, '2020-04-08 07:10:39', '2020-04-08 07:10:39'),
(2, '1', 'rijwan chowdhury', 'rijwanc007@gmail.com', 'admin', '2020-04-08', '08:30', '1', '17:30', '8', NULL, NULL, NULL, NULL, '2020-04-08 07:14:58', '2020-04-08 07:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `document` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `user_id`, `document`, `created_at`, `updated_at`) VALUES
(1, 2, '[\"1210194412.png\"]', '2020-04-08 10:43:49', '2020-04-08 10:43:49'),
(2, 3, '[\"1269593845.png\"]', '2020-04-08 10:45:52', '2020-04-08 10:45:52'),
(3, 4, '[\"896018716.png\",\"1749177527.png\"]', '2020-04-10 06:13:51', '2020-04-10 06:13:51'),
(4, 5, '[\"1752367726.png\",\"191876095.png\"]', '2020-04-10 06:15:05', '2020-04-10 06:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_27_084816_create_documnets_table', 2),
(5, '2020_03_27_084837_create_services_table', 2),
(6, '2020_03_27_084902_create_addresses_table', 2),
(7, '2020_03_27_084951_add_columns_user_table', 2),
(8, '2020_03_27_101302_create_relatives_table', 2),
(9, '2020_03_27_120543_create_documents_table', 3),
(11, '2020_03_27_170819_add_column_user_table', 4),
(12, '2020_03_27_183130_create_attendances_table', 5),
(13, '2020_03_29_061435_create_offerts_table', 6),
(14, '2020_03_29_070138_create_salaries_table', 7),
(15, '2020_03_31_092332_add_columns', 8),
(16, '2020_04_01_180740_add_columns_table_users', 9),
(17, '2020_04_02_133239_add_columns_attendance_table', 10),
(18, '2020_04_03_105157_create_roles_table', 11),
(19, '2020_04_03_105220_create_permissions_table', 11),
(20, '2020_04_03_110020_create_permission_role_table', 11),
(21, '2020_04_03_110123_create_role_user_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `offerts`
--

CREATE TABLE `offerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `em_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `em_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sent_offert` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waiting_for_clients_feedback` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offert_value` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_close_deals` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_for` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission_name`, `permission_for`, `created_at`, `updated_at`) VALUES
(1, 'admin_dashboard', 'dashboard', NULL, NULL),
(2, 'user_dashboard', 'dashboard', NULL, NULL),
(3, 'attendances', 'dashboard', NULL, NULL),
(4, 'all_user', 'user', NULL, NULL),
(5, 'show', 'user', NULL, NULL),
(6, 'edit', 'user', NULL, NULL),
(7, 'delete', 'user', NULL, NULL),
(8, 'hr_index', 'hr', NULL, NULL),
(9, 'hr_create', 'hr', NULL, NULL),
(10, 'show', 'hr', NULL, NULL),
(11, 'edit', 'hr', NULL, NULL),
(12, 'delete', 'hr', NULL, NULL),
(13, 'account_index', 'account', NULL, NULL),
(14, 'account_create', 'account', NULL, NULL),
(15, 'show', 'account', NULL, NULL),
(16, 'edit', 'account', NULL, NULL),
(17, 'delete', 'account', NULL, NULL),
(18, 'employee_index', 'employee', NULL, NULL),
(19, 'employee_create', 'employee', NULL, NULL),
(20, 'show', 'employee', NULL, NULL),
(21, 'edit', 'employee', NULL, NULL),
(22, 'delete', 'employee', NULL, NULL),
(23, 'sale_leader_index', 'sale_leader', NULL, NULL),
(24, 'sale_leader_create', 'sale_leader', NULL, NULL),
(25, 'show', 'sale_leader', NULL, NULL),
(26, 'edit', 'sale_leader', NULL, NULL),
(27, 'delete', 'sale_leader', NULL, NULL),
(28, 'supervisor_index', 'supervisor', NULL, NULL),
(29, 'supervisor_create', 'supervisor', NULL, NULL),
(30, 'show', 'supervisor', NULL, NULL),
(31, 'edit', 'supervisor', NULL, NULL),
(32, 'delete', 'supervisor', NULL, NULL),
(33, 'seller_index', 'seller', NULL, NULL),
(34, 'seller_create', 'seller', NULL, NULL),
(35, 'show', 'seller', NULL, NULL),
(36, 'edit', 'seller', NULL, NULL),
(37, 'delete', 'seller', NULL, NULL),
(38, 'client_index', 'client', NULL, NULL),
(39, 'client_create', 'client', NULL, NULL),
(40, 'show', 'client', NULL, NULL),
(41, 'edit', 'client', NULL, NULL),
(42, 'delete', 'client', NULL, NULL),
(43, 'index', 'time_report', NULL, NULL),
(44, 'all_time_report', 'time_report', NULL, NULL),
(45, 'salary_approved', 'salary_approved', NULL, NULL),
(46, 'salary_index', 'salary', NULL, NULL),
(47, 'salary_create', 'salary', NULL, NULL),
(48, 'show', 'salary', NULL, NULL),
(49, 'edit', 'salary', NULL, NULL),
(50, 'delete', 'salary', NULL, NULL),
(51, 'document', 'document', NULL, NULL),
(52, 'index', 'offert', NULL, NULL),
(53, 'edit', 'offert', NULL, NULL),
(54, 'delete', 'offert', NULL, NULL),
(55, 'all_offert', 'offert', NULL, NULL),
(56, 'offert_create', 'offert', NULL, NULL),
(57, 'index', 'role', NULL, NULL),
(58, 'edit', 'role', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 1, 5, NULL, NULL),
(6, 1, 6, NULL, NULL),
(7, 1, 7, NULL, NULL),
(8, 1, 8, NULL, NULL),
(9, 1, 9, NULL, NULL),
(10, 1, 10, NULL, NULL),
(11, 1, 11, NULL, NULL),
(12, 1, 12, NULL, NULL),
(13, 1, 13, NULL, NULL),
(14, 1, 14, NULL, NULL),
(15, 1, 15, NULL, NULL),
(16, 1, 16, NULL, NULL),
(17, 1, 17, NULL, NULL),
(18, 1, 18, NULL, NULL),
(19, 1, 19, NULL, NULL),
(20, 1, 20, NULL, NULL),
(21, 1, 21, NULL, NULL),
(22, 1, 22, NULL, NULL),
(23, 1, 23, NULL, NULL),
(24, 1, 24, NULL, NULL),
(25, 1, 25, NULL, NULL),
(26, 1, 26, NULL, NULL),
(27, 1, 27, NULL, NULL),
(28, 1, 28, NULL, NULL),
(29, 1, 29, NULL, NULL),
(30, 1, 30, NULL, NULL),
(31, 1, 31, NULL, NULL),
(32, 1, 32, NULL, NULL),
(33, 1, 33, NULL, NULL),
(34, 1, 34, NULL, NULL),
(35, 1, 35, NULL, NULL),
(36, 1, 36, NULL, NULL),
(37, 1, 37, NULL, NULL),
(38, 1, 38, NULL, NULL),
(39, 1, 39, NULL, NULL),
(40, 1, 40, NULL, NULL),
(41, 1, 41, NULL, NULL),
(42, 1, 42, NULL, NULL),
(43, 1, 43, NULL, NULL),
(44, 1, 44, NULL, NULL),
(45, 1, 45, NULL, NULL),
(46, 1, 46, NULL, NULL),
(47, 1, 47, NULL, NULL),
(48, 1, 48, NULL, NULL),
(49, 1, 49, NULL, NULL),
(50, 1, 50, NULL, NULL),
(51, 1, 51, NULL, NULL),
(52, 1, 52, NULL, NULL),
(53, 1, 53, NULL, NULL),
(54, 1, 54, NULL, NULL),
(55, 1, 55, NULL, NULL),
(56, 1, 56, NULL, NULL),
(57, 1, 57, NULL, NULL),
(58, 1, 58, NULL, NULL),
(59, 2, 8, NULL, NULL),
(60, 2, 9, NULL, NULL),
(61, 2, 10, NULL, NULL),
(62, 2, 11, NULL, NULL),
(63, 2, 12, NULL, NULL),
(64, 3, 13, NULL, NULL),
(65, 3, 14, NULL, NULL),
(66, 3, 15, NULL, NULL),
(67, 3, 16, NULL, NULL),
(68, 3, 17, NULL, NULL),
(69, 4, 18, NULL, NULL),
(70, 4, 19, NULL, NULL),
(71, 4, 20, NULL, NULL),
(72, 4, 21, NULL, NULL),
(73, 4, 22, NULL, NULL),
(74, 5, 23, NULL, NULL),
(75, 5, 24, NULL, NULL),
(76, 5, 25, NULL, NULL),
(77, 5, 26, NULL, NULL),
(78, 5, 27, NULL, NULL),
(79, 6, 28, NULL, NULL),
(80, 6, 29, NULL, NULL),
(81, 6, 30, NULL, NULL),
(82, 6, 31, NULL, NULL),
(83, 6, 32, NULL, NULL),
(84, 7, 33, NULL, NULL),
(85, 7, 34, NULL, NULL),
(86, 7, 35, NULL, NULL),
(87, 7, 36, NULL, NULL),
(88, 7, 37, NULL, NULL),
(89, 7, 45, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `relatives`
--

CREATE TABLE `relatives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `relative_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relative_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relatives`
--

INSERT INTO `relatives` (`id`, `user_id`, `relative_name`, `relative_phone`, `relation`, `created_at`, `updated_at`) VALUES
(1, 2, '555555', '1234556564', '1234567', '2020-04-08 10:43:49', '2020-04-08 10:43:49'),
(2, 3, '555555', '1234556564', '1234567', '2020-04-08 10:45:52', '2020-04-08 10:45:52'),
(3, 4, '12345647', '1234556564', '1234567', '2020-04-10 06:13:51', '2020-04-10 06:13:51'),
(4, 5, '12345647', '1234556564', '1234567', '2020-04-10 06:15:05', '2020-04-10 06:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'admin', '2020-04-03 06:31:24', '2020-04-03 06:31:24'),
(2, 'hr', 'admin', '2020-04-03 06:42:59', '2020-04-03 06:42:59'),
(3, 'account', 'admin', '2020-04-03 06:44:05', '2020-04-03 06:44:05'),
(4, 'employee', 'admin', '2020-04-03 06:45:17', '2020-04-03 06:45:17'),
(5, 'sale leader', 'admin', '2020-04-03 06:46:26', '2020-04-03 06:46:26'),
(6, 'supervisor', 'admin', '2020-04-03 06:46:47', '2020-04-03 06:46:47'),
(7, 'seller', 'admin', '2020-04-03 06:47:03', '2020-04-03 06:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 16, 2, NULL, NULL),
(2, 1, 1, NULL, NULL),
(3, 2, 6, NULL, NULL),
(4, 3, 7, NULL, NULL),
(5, 4, 4, NULL, NULL),
(6, 5, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `em_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `em_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_hours_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_for` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `active_service` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_start` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_end` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prospect_service` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_for` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `private_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_evening` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_space` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nearest_chief` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_security_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_start` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_end` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clearing_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_under` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `name`, `image`, `status`, `account_for`, `email`, `private_email`, `invoice_email`, `phone`, `phone_evening`, `designation`, `work_space`, `nearest_chief`, `social_security_number`, `employee_type`, `contract_start`, `contract_end`, `bank_name`, `account_number`, `clearing_number`, `table_tax`, `company_name`, `contact_person`, `organization_number`, `url`, `work_under`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rijwan', 'chowdhury', 'rijwan chowdhury', '300767512.jpg', 'checked', 'admin', 'rijwanc007@gmail.com', NULL, NULL, NULL, NULL, 'super admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$kyU569qaZxgHM/nVSTzCaO7/xtYTOEXm5VZSvZAJ5xYKoSlV4xMnC', NULL, '2020-03-23 10:05:33', '2020-04-03 13:09:10'),
(2, 'sattar', 'chowdhury', 'sattar chowdhury', '15640848.png', 'checked', 'supervisor', 'r@gmail.com', 'hello@gmail.com', NULL, '01521434247', '01986324855', 'software engineer', 'something', 'hello', '01234456897', NULL, '2020-04-09', '2020-04-24', '123456788789', '4444444444', '12365478', '123456', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$T5TterNa8XSGbRm39dz50OMsgCd1bgAR0tTiimVQfllZ/zbKgLBcm', NULL, '2020-04-08 10:43:49', '2020-04-08 10:43:49'),
(3, 'sattar', 'chowdhury', 'sattar chowdhury', '417026492.png', 'checked', 'seller', 'rij541267@yahoo.com', 'frist@gmail.com', NULL, '01824318212', '01986324855', 'software engineer', 'something', 'hello', '01234456897', 'half_time', '2020-04-08', '2020-04-25', '123456788789', '4444444444', '12365478', '123456', NULL, NULL, NULL, NULL, 'sattar chowdhury_2', NULL, '$2y$10$1pEqPC28sBHRPIY25vQEkOTVYZRkEYoXO.Z236LlDJkc.sGRA3x8K', NULL, '2020-04-08 10:45:52', '2020-04-08 10:45:52'),
(4, 'rana', 'chowdhury', 'rana chowdhury', '1005110948.png', 'checked', 'employee', 'ranasayed@gmail.com', 'hello@gmail.com', NULL, '01521434247', '01986324855', 'software engineer', 'something', 'hello', '01234456897', NULL, '2020-04-10', '2020-04-25', '123456788789', '4444444444', '12365478', '123456', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$hklCI9P3iepr2dNBrpO0BuzgSI8R/.P8TkXw4Hqky3Ps0X/LQT4M2', NULL, '2020-04-10 06:13:51', '2020-04-10 06:13:51'),
(5, 'sattar', 'chowdhury', 'sattar chowdhury', '2045750372.png', 'checked', 'employee', 'sattar@gmail.com', 'hello@gmail.com', NULL, '01521434247', '01986324855', 'software engineer', 'something', 'hello', '01234456897', NULL, '2020-04-10', '2020-04-18', '123456788789', '4444444444', '12365478', '123456', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$7vgm5WbCVpzC8MBHO.gy.u8vuJ5H1XGxr3DtP6Z0uRIihA7ANv5w2', NULL, '2020-04-10 06:15:05', '2020-04-10 06:15:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offerts`
--
ALTER TABLE `offerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relatives`
--
ALTER TABLE `relatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `offerts`
--
ALTER TABLE `offerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `relatives`
--
ALTER TABLE `relatives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
