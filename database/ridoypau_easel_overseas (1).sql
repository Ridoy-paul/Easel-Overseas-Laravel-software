-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 27, 2022 at 11:14 AM
-- Server version: 10.3.36-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ridoypau_easel_overseas`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_number` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `name`, `phone`, `address`, `father_name`, `mother_name`, `nid_number`, `balance`, `is_active`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Dipto', '01641766876', 'Ref by kaiser sir', NULL, NULL, NULL, NULL, 1, 1, '2022-05-15 10:58:26', '2022-09-20 06:00:49'),
(2, 'Idris Ali', '01720378575', NULL, NULL, NULL, NULL, 0, 1, 1, '2022-05-26 10:52:15', '2022-09-20 05:53:55'),
(3, 'Aziz Vai', '01766077078', 'Keranigonj', NULL, NULL, NULL, 0, 1, 2, '2022-06-02 09:29:06', '2022-06-02 09:29:06'),
(4, 'Azmun Vai', '01711346416', 'Kathalbagan, Dhaka', NULL, NULL, NULL, 0, 1, 2, '2022-06-02 09:29:45', '2022-06-02 09:29:45'),
(5, 'Ruhul Mama', '01729877716', 'Cumilla', NULL, NULL, NULL, 0, 1, 2, '2022-06-02 09:30:17', '2022-06-02 09:30:17'),
(6, 'Rustom Vai', '01712781912', 'Jessore', NULL, NULL, NULL, 0, 1, 2, '2022-06-02 09:30:47', '2022-06-02 09:30:47'),
(7, 'Monir Vai', '01817069398', 'Cumilla', NULL, NULL, NULL, 0, 1, 2, '2022-06-02 09:31:12', '2022-06-02 09:31:12');

-- --------------------------------------------------------

--
-- Table structure for table `business_settings`
--

CREATE TABLE `business_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_settings`
--

INSERT INTO `business_settings` (`id`, `company_name`, `logo`, `phone`, `email`, `website`, `address`, `balance`, `created_at`, `updated_at`) VALUES
(1, 'Easel Overseas Limited', 'images/settings/1742478803371701.png', '+8801760188807', 'info@easeloverseas.com', 'easeloverseas.com', 'Queen’s Garden Point (5th Floor) 15,New Eskaton Road Boro Mogbazar, Dhaka-1217, Bangladesh', '-1266020', '2022-05-19 05:27:18', '2022-08-29 07:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', '1', '2022-05-14 12:27:16', '2022-05-14 12:27:16'),
(2, 'Dubai', '1', '2022-05-14 12:27:55', '2022-05-29 06:44:29'),
(3, 'Kuwait', '1', '2022-05-29 06:42:48', '2022-05-29 06:42:48'),
(4, 'Saudi Arabia', '1', '2022-05-29 06:43:23', '2022-05-29 06:43:23'),
(5, 'Malaysia', '1', '2022-05-29 06:43:53', '2022-05-29 06:44:55'),
(6, 'Romania', '1', '2022-05-29 06:44:02', '2022-05-29 06:44:02'),
(7, 'Qatar', '1', '2022-05-29 06:45:13', '2022-05-29 06:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `for_whom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'c=client, a=agent, o=office',
  `expenses_category_id` int(11) DEFAULT NULL,
  `work_id` int(11) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `passport_id` int(11) DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `voucher_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `for_whom`, `expenses_category_id`, `work_id`, `agent_id`, `passport_id`, `amount`, `user_id`, `voucher_number`, `file`, `note`, `date`, `created_at`, `updated_at`) VALUES
(21, 'o', 8, NULL, NULL, NULL, '15000', 1, '1', NULL, 'Tread License Renew (Rajib, Ruhul)', '2021-10-26', '2022-08-01 09:41:50', '2022-08-01 09:41:50'),
(22, 'o', 8, NULL, NULL, NULL, '30000', 1, '1', NULL, 'Tread License Renew (Rajib, Ruhul)', '2021-10-27', '2022-08-01 09:43:31', '2022-08-01 09:43:31'),
(23, 'o', 5, NULL, NULL, NULL, '285000', 1, '2', NULL, 'BMET License Renew fee (Razib)', '2021-10-31', '2022-08-01 09:44:55', '2022-08-01 09:44:55'),
(24, 'o', 7, NULL, NULL, NULL, '1000', 1, '3', NULL, 'Share Transfer (Zaman)', '2021-10-28', '2022-08-01 09:46:05', '2022-08-01 09:46:05'),
(25, 'o', 5, NULL, NULL, NULL, '5000', 1, '4', NULL, 'BMET Staff Entertainment (Kakoli)', '2021-11-08', '2022-08-01 09:47:23', '2022-08-01 09:47:23'),
(27, 'o', 7, NULL, NULL, NULL, '10000', 1, '5', NULL, 'Share Transfer, Audit Report (Zaman)', '2021-11-10', '2022-08-01 09:50:32', '2022-08-01 09:50:32'),
(28, 'o', 7, NULL, NULL, NULL, '10000', 1, '7', NULL, 'Share Transfer, Audit Report (Zaman)', '2021-11-16', '2022-08-01 09:50:56', '2022-08-01 09:50:56'),
(29, 'o', 7, NULL, NULL, NULL, '10000', 1, '8', NULL, 'Share Transfer, Audit Report (Zaman)', '2021-11-21', '2022-08-01 09:52:56', '2022-08-01 09:52:56'),
(30, 'o', 5, NULL, NULL, NULL, '1000', 1, '9', NULL, 'Entertainment (Ruhul)', '2021-11-25', '2022-08-01 09:54:27', '2022-08-01 09:54:27'),
(31, 'o', 7, NULL, NULL, NULL, '50000', 1, '10', NULL, 'Zaman Vai', '2021-12-01', '2022-08-01 09:55:12', '2022-08-01 09:55:12'),
(32, 'o', 3, NULL, NULL, NULL, '1000', 1, '11', NULL, 'Zahir Sir', '2021-12-05', '2022-08-01 09:56:18', '2022-08-01 09:56:18'),
(33, 'o', 5, NULL, NULL, NULL, '300000', 1, '12', NULL, 'BMET License (BMET Director Entertainment)', '2021-12-27', '2022-08-01 09:57:32', '2022-08-01 09:57:32'),
(34, 'o', 5, NULL, NULL, NULL, '5000', 1, '13', NULL, 'BMET Section Entertainment (Kakoli)', '2021-12-13', '2022-08-01 09:58:17', '2022-08-01 09:58:17'),
(35, 'o', 5, NULL, NULL, NULL, '45000', 1, '13', NULL, 'BMET Section Entertainment (Kakoli)', '2021-12-13', '2022-08-01 10:03:15', '2022-08-01 10:03:15'),
(36, 'o', 4, NULL, NULL, NULL, '10000', 1, '14', NULL, 'Kakoli', '2021-12-13', '2022-08-01 10:03:55', '2022-08-01 10:03:55'),
(38, 'o', 8, NULL, NULL, NULL, '15000', 1, '15', NULL, 'Razib', '2021-12-23', '2022-08-28 04:33:58', '2022-08-28 04:33:58'),
(39, 'o', 8, NULL, NULL, NULL, '20000', 1, '16', NULL, 'Razib', '2022-01-03', '2022-08-28 04:34:45', '2022-08-28 04:34:45'),
(40, 'o', 3, NULL, NULL, NULL, '1000', 1, '17', NULL, 'Nijamul Sayeed Office Visit (Ruhul)', '2022-01-03', '2022-08-28 04:35:41', '2022-08-28 04:35:41'),
(41, 'o', 5, NULL, NULL, NULL, '57000', 1, '18', NULL, 'BMET Office Entertainment', '2022-01-04', '2022-08-28 04:41:00', '2022-08-28 04:41:00'),
(43, 'o', 5, NULL, NULL, NULL, '1000', 1, NULL, NULL, 'Convince (Ruhul)', '2022-01-05', '2022-08-29 05:49:52', '2022-08-29 05:49:52'),
(44, 'o', 5, NULL, NULL, NULL, '1410', 1, NULL, NULL, 'Lunch Bill (Ruhul)', '2022-01-12', '2022-08-29 05:50:34', '2022-08-29 05:50:34'),
(45, 'o', 5, NULL, NULL, NULL, '2070', 1, NULL, NULL, 'Convince (Ruhul)', '2022-01-12', '2022-08-29 05:51:25', '2022-08-29 05:51:25'),
(46, 'o', 4, NULL, NULL, NULL, '10000', 1, '19', NULL, 'Salary (Kakoli)', '2022-01-13', '2022-08-29 05:52:01', '2022-08-29 05:52:01'),
(47, 'o', 4, NULL, NULL, NULL, '3000', 1, '20', NULL, 'Salary (Ruhul)', '2022-01-13', '2022-08-29 05:53:56', '2022-08-29 05:53:56'),
(48, 'o', 9, NULL, NULL, NULL, '1000', 1, '21', NULL, 'Advance for Pad Print (Kakoli)', '2022-01-19', '2022-08-29 06:04:09', '2022-08-29 06:04:09'),
(49, 'o', 5, NULL, NULL, NULL, '5000', 1, '22', NULL, 'BMET Staff Entertainment for Office module update (Kakoli)', '2022-01-20', '2022-08-29 06:05:09', '2022-08-29 06:05:09'),
(50, 'o', 9, NULL, NULL, NULL, '4500', 1, '23', NULL, 'Pad & Voucher', '2022-01-31', '2022-08-29 06:05:49', '2022-08-29 06:05:49'),
(51, 'o', 7, NULL, NULL, NULL, '25000', 1, '24', NULL, 'Zaman', '2022-01-08', '2022-08-29 06:06:46', '2022-08-29 06:06:46'),
(52, 'o', 9, NULL, NULL, NULL, '2550', 1, '25', NULL, 'Convince & Photocopy (Kakoli)', '2022-02-13', '2022-08-29 06:07:30', '2022-08-29 06:07:30'),
(53, 'o', 4, NULL, NULL, NULL, '10000', 1, '26', NULL, 'Salary (Kakoli)', '2022-02-13', '2022-08-29 06:08:10', '2022-08-29 06:08:10'),
(54, 'o', 5, NULL, NULL, NULL, '5000', 1, NULL, NULL, 'For Manpower License Update', '2022-02-20', '2022-08-29 06:09:07', '2022-08-29 06:09:07'),
(55, 'o', 7, NULL, NULL, NULL, '25000', 1, NULL, NULL, 'Zaman', '2022-03-03', '2022-08-29 06:09:40', '2022-08-29 06:09:40'),
(56, 'o', 8, NULL, NULL, NULL, '14000', 1, NULL, NULL, 'Razib', '2022-03-07', '2022-08-29 06:10:07', '2022-08-29 06:10:07'),
(57, 'o', 10, NULL, NULL, NULL, '2500', 1, '27', NULL, '4 person police clearance and TA (Sohel)', '2022-03-08', '2022-08-29 06:12:03', '2022-08-29 06:12:03'),
(58, 'o', 10, NULL, NULL, NULL, '1300', 1, '28', NULL, 'Signboard Inside (Sohel)', '2022-03-08', '2022-08-29 06:13:42', '2022-08-29 06:13:42'),
(59, 'o', 10, NULL, NULL, NULL, '650', 1, '29', NULL, 'Signboard outside + power cable (sohel)', '2022-03-14', '2022-08-29 06:14:22', '2022-08-29 06:14:22'),
(60, 'o', 10, NULL, NULL, NULL, '7000', 1, '30', NULL, 'Passport+Police Clarence+Attestation (Shajahan)', '2022-03-15', '2022-08-29 06:15:55', '2022-08-29 06:15:55'),
(61, 'o', 7, NULL, NULL, NULL, '15000', 1, NULL, NULL, 'Zaman', '2022-03-22', '2022-08-29 06:16:43', '2022-08-29 06:16:43'),
(62, 'o', 10, NULL, NULL, NULL, '3000', 1, '30', NULL, 'Passport+Police Clarence+Attestation (Shajahan)', '2022-03-24', '2022-08-29 06:18:57', '2022-08-29 06:18:57'),
(63, 'o', 10, NULL, NULL, NULL, '1000', 1, NULL, NULL, 'Murad Sir', '2022-03-26', '2022-08-29 06:21:10', '2022-08-29 06:21:10'),
(64, 'o', 3, NULL, NULL, NULL, '500', 1, NULL, NULL, 'Nizamul Sayed Office Visit (Sohel)', '2022-03-28', '2022-08-29 06:22:03', '2022-08-29 06:22:03'),
(65, 'o', 11, NULL, NULL, NULL, '10000', 1, '31', NULL, 'Fara IT', '2022-03-31', '2022-08-29 06:23:29', '2022-08-29 06:23:29'),
(66, 'o', 9, NULL, NULL, NULL, '550', 1, '32', NULL, 'Office Photo Print (sohel)', '2022-03-31', '2022-08-29 06:24:47', '2022-08-29 06:24:47'),
(67, 'o', 3, NULL, NULL, NULL, '1000', 1, NULL, NULL, 'Shajahan', '2022-04-04', '2022-08-29 06:25:14', '2022-08-29 06:25:14'),
(68, 'o', 10, NULL, NULL, NULL, '1000', 1, '35', NULL, 'E-tin, Papper, TA- (Shajahan, Sohel), Ifter', '2022-04-04', '2022-08-29 06:26:49', '2022-08-29 06:26:49'),
(69, 'o', 4, NULL, NULL, NULL, '15000', 1, '36', NULL, 'Sohel', '2022-04-07', '2022-08-29 06:28:19', '2022-08-29 06:28:19'),
(70, 'o', 4, NULL, NULL, NULL, '18000', 1, '36', NULL, 'Shajahan', '2022-04-07', '2022-08-29 06:28:48', '2022-08-29 06:28:48'),
(71, 'o', 12, NULL, NULL, NULL, '55000', 1, NULL, NULL, '13Feb-14April others Transport Cost', '2022-04-16', '2022-08-29 06:33:16', '2022-08-29 06:33:16'),
(72, 'o', 12, NULL, NULL, NULL, '53234', 1, NULL, NULL, '21/08/2021 to 16/04/2022 uber & patho bill', '2022-04-16', '2022-08-29 06:33:56', '2022-08-29 06:33:56'),
(73, 'o', 11, NULL, NULL, NULL, '10000', 1, '36', NULL, 'Fara IT', '2022-04-16', '2022-08-29 06:34:27', '2022-08-29 06:34:27'),
(74, 'o', 3, NULL, NULL, NULL, '1000', 1, '38', NULL, 'TA (Shajahan)', '2022-04-18', '2022-08-29 06:35:00', '2022-08-29 06:35:00'),
(75, 'o', 3, NULL, NULL, NULL, '300', 1, '39', NULL, 'Sohel', '0005-04-18', '2022-08-29 06:35:23', '2022-08-29 06:35:23'),
(76, 'o', 10, NULL, NULL, NULL, '5000', 1, '40', NULL, 'Passport+Police Clarence+Attestation (Shajahan) (Due Adjust)', '2022-04-20', '2022-08-29 06:36:35', '2022-08-29 06:36:35'),
(77, 'o', 4, NULL, NULL, NULL, '18000', 1, '41', NULL, 'Shajahan', '2022-04-26', '2022-08-29 06:37:01', '2022-08-29 06:37:01'),
(78, 'o', 4, NULL, NULL, NULL, '18000', 1, '41', NULL, 'Sohel', '2022-04-26', '2022-08-29 06:37:27', '2022-08-29 06:37:27'),
(79, 'o', 10, NULL, NULL, NULL, '100', 1, NULL, NULL, 'Bkash Charge for cash out', '2022-05-12', '2022-08-29 06:38:00', '2022-08-29 06:38:00'),
(80, 'o', 5, NULL, NULL, NULL, '2000', 1, NULL, NULL, 'Section Amir Entertainment (BMET Name transfer)', '2022-05-12', '2022-08-29 06:40:03', '2022-08-29 06:40:03'),
(81, 'o', 10, NULL, NULL, NULL, '350', 1, '43', NULL, 'Sticker (Lift)', '2022-05-19', '2022-08-29 06:41:11', '2022-08-29 06:41:11'),
(83, 'o', 9, NULL, NULL, NULL, '850', 1, '42', NULL, 'Visiting card (sohel)', '2022-05-14', '2022-08-29 06:44:54', '2022-08-29 06:44:54'),
(84, 'o', 3, NULL, NULL, NULL, '750', 1, '43', NULL, 'Sohel', '2022-05-08', '2022-08-29 06:45:15', '2022-08-29 06:45:15'),
(85, 'o', 10, NULL, NULL, NULL, '2600', 1, '44', NULL, 'New Mobile for office', '2022-05-25', '2022-08-29 06:45:48', '2022-08-29 06:45:48'),
(86, 'o', 10, NULL, NULL, NULL, '100', 1, NULL, NULL, 'Bkash Charge for cash out', '2022-05-25', '2022-08-29 06:46:26', '2022-08-29 06:46:26'),
(87, 'o', 10, NULL, NULL, NULL, '100', 1, NULL, NULL, 'Mobile Recharge', '2022-05-26', '2022-08-29 06:46:54', '2022-08-29 06:46:54'),
(88, 'o', 3, NULL, NULL, NULL, '1000', 1, '45', NULL, 'Shajahan', '2022-05-26', '2022-08-29 06:47:29', '2022-08-29 06:47:29'),
(89, 'o', 9, NULL, NULL, NULL, '660', 1, '46', NULL, 'Stamp 6 pcs', '2022-06-05', '2022-08-29 06:48:30', '2022-08-29 06:48:30'),
(90, 'o', 4, NULL, NULL, NULL, '18000', 1, '47', NULL, 'Shajahan', '2022-06-07', '2022-08-29 06:48:53', '2022-08-29 06:48:53'),
(91, 'o', 4, NULL, NULL, NULL, '18000', 1, '48', NULL, 'Sohel', '2022-06-07', '2022-08-29 06:49:22', '2022-08-29 06:49:22'),
(92, 'o', 9, NULL, NULL, NULL, '150', 1, '49', NULL, 'Easel Profile Making', '2022-06-14', '2022-08-29 06:49:54', '2022-08-29 06:49:54'),
(93, 'o', 9, NULL, NULL, NULL, '150', 1, '50', NULL, 'Notari- 3 pages for Malaysia agreement', '2022-06-28', '2022-08-29 06:50:37', '2022-08-29 06:50:37'),
(94, 'o', 9, NULL, NULL, NULL, '635', 1, '51', NULL, 'Keyboard', '2022-06-30', '2022-08-29 06:51:08', '2022-08-29 06:51:08'),
(95, 'o', 3, NULL, NULL, NULL, '2340', 1, '52', NULL, 'Sohel', '2022-07-05', '2022-08-29 06:51:37', '2022-08-29 06:51:37'),
(96, 'o', 3, NULL, NULL, NULL, '1100', 1, '53', NULL, 'TA with Due (Shajahan)', '2022-07-05', '2022-08-29 06:52:21', '2022-08-29 06:52:21'),
(97, 'o', 4, NULL, NULL, NULL, '18000', 1, '54', NULL, 'Shajahan', '2022-07-05', '2022-08-29 06:52:50', '2022-08-29 06:52:50'),
(98, 'o', 4, NULL, NULL, NULL, '18000', 1, '55', NULL, 'Sohel', '2022-07-05', '2022-08-29 06:53:19', '2022-08-29 06:53:19'),
(99, 'o', 3, NULL, NULL, NULL, '150', 1, '57', NULL, 'Dubai File purpose (Sohel)', '2022-07-18', '2022-08-29 06:54:29', '2022-08-29 06:54:29'),
(100, 'o', 9, NULL, NULL, NULL, '40', 1, '57', NULL, 'Sign pen', '2022-07-18', '2022-08-29 06:54:51', '2022-08-29 06:54:51'),
(101, 'o', 3, NULL, NULL, NULL, '400', 1, '58', NULL, 'Sohel', '2022-07-27', '2022-08-29 06:55:27', '2022-08-29 06:55:27'),
(102, 'o', 13, NULL, NULL, NULL, '90', 1, '59', NULL, 'Tea Bag', '2022-08-01', '2022-08-29 06:57:30', '2022-08-29 06:57:30'),
(103, 'o', 11, NULL, NULL, NULL, '20000', 1, '56', NULL, 'Fara IT', '2022-07-06', '2022-08-29 06:58:04', '2022-08-29 06:58:04'),
(104, 'o', 4, NULL, NULL, NULL, '18000', 1, '60', NULL, 'Shajahan', '2022-08-04', '2022-08-29 06:58:41', '2022-08-29 06:58:41'),
(105, 'o', 4, NULL, NULL, NULL, '18000', 1, '61', NULL, 'Sohel', '2022-08-04', '2022-08-29 06:59:05', '2022-08-29 06:59:05'),
(106, 'o', 9, NULL, NULL, NULL, '880', 1, '62', NULL, 'Visiting card for Munna vai & TA (Sohel)', '2022-08-16', '2022-08-29 06:59:46', '2022-08-29 06:59:46'),
(107, 'o', 10, NULL, NULL, NULL, '11000', 1, '36', NULL, 'Saudi File Attestation (Shajahan)', '2022-04-10', '2022-08-29 07:08:01', '2022-08-29 07:08:01'),
(108, 'o', 3, NULL, NULL, NULL, '300', 1, '39', NULL, 'Sohel', '2022-04-18', '2022-08-29 07:10:06', '2022-08-29 07:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `expenses_categories`
--

CREATE TABLE `expenses_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses_categories`
--

INSERT INTO `expenses_categories` (`id`, `title`, `expense_type`, `is_active`, `note`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'office Rent', 'client', 1, NULL, '1', '2022-05-15 12:32:50', '2022-05-16 07:07:42'),
(2, 'Client Visa Cost', 'client', 1, NULL, '1', '2022-05-28 06:14:51', '2022-05-28 06:14:51'),
(3, 'TA', 'company', 1, NULL, '1', '2022-08-01 08:46:12', '2022-08-01 08:46:12'),
(4, 'Salary', 'company', 1, NULL, '1', '2022-08-01 08:46:31', '2022-08-01 08:46:31'),
(5, 'BMET', 'company', 1, NULL, '1', '2022-08-01 09:34:01', '2022-08-01 09:34:01'),
(6, 'Commission', 'agent', 1, NULL, '1', '2022-08-01 09:34:19', '2022-08-01 09:40:36'),
(7, 'Share Transfer', 'company', 1, NULL, '1', '2022-08-01 09:35:03', '2022-08-01 09:35:03'),
(8, 'Tread License', 'company', 1, NULL, '1', '2022-08-01 09:40:49', '2022-08-01 09:40:49'),
(9, 'Stationary/Pad/Vouchar/Visiting Card/Print/Photocopy', 'company', 1, NULL, '1', '2022-08-29 06:03:15', '2022-08-29 06:03:15'),
(10, 'Others', 'company', 1, NULL, '1', '2022-08-29 06:11:09', '2022-08-29 06:11:09'),
(11, 'Website & Accounts Software', 'company', 1, NULL, '1', '2022-08-29 06:22:54', '2022-08-29 06:22:54'),
(12, 'Chairman Expense (Uber, Patho & Others cost)', 'company', 1, NULL, '1', '2022-08-29 06:31:19', '2022-08-29 06:31:19'),
(13, 'Food Expenses', 'company', 1, NULL, '1', '2022-08-29 06:56:54', '2022-08-29 06:56:54');

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
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `work_id` int(11) NOT NULL,
  `passport_id` int(11) NOT NULL,
  `income_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `work_id`, `passport_id`, `income_category`, `amount`, `note`, `date`, `created_at`, `updated_at`) VALUES
(12, 9, 3, NULL, '6000', 'hjghj ghj gh j', '2022-05-25', '2022-05-25 06:32:07', '2022-05-25 06:32:07');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2021_12_15_102336_create_sessions_table', 1),
(10, '2022_01_23_000110_create_business_settings_table', 1),
(11, '2022_02_27_013225_create_permission_tables', 1),
(14, '2022_05_12_182153_create_countries_table', 2),
(15, '2022_05_12_183633_create_visas_table', 2),
(16, '2022_05_15_121859_create_passports_table', 3),
(17, '2022_05_15_122310_create_agents_table', 3),
(18, '2022_05_15_174844_create_expenses_categories_table', 4),
(20, '2022_05_17_111845_create_works_table', 5),
(21, '2022_05_18_144644_create_incomes_table', 6),
(24, '2022_05_19_150019_create_expenses_table', 7),
(25, '2022_05_22_173106_create_owners_table', 8),
(26, '2022_05_24_183936_create_owner_transactions_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opening_capital` double NOT NULL,
  `capital` double NOT NULL DEFAULT 0,
  `business_portion` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `name`, `phone`, `nid_number`, `address`, `opening_capital`, `capital`, `business_portion`, `created_at`, `updated_at`) VALUES
(1, 'Mohammed Kawser Ahmed', '+8801873966020', '7814980798', 'Gulshan-2, Dhaka', 0, 0, 22.4, '2022-05-22 12:02:19', '2022-05-29 06:31:56'),
(2, 'Mujibor Rahman Shamim', '+8801711217693', '123456', 'Gulshan-2, Dhaka', 0, 0, 22.4, '2022-05-29 06:34:43', '2022-05-29 06:38:37'),
(3, 'Khandker Wahed Murad', '+8801713035964', '25896', 'Uttara, Dhaka', 0, 0, 8, '2022-05-29 06:39:12', NULL),
(4, 'Nijamul Sayeed', '+880100000', '12546', 'Mohammadpur, Dhaka', 0, 0, 8, '2022-05-29 06:40:12', NULL),
(5, 'Al Yami Yaser Mobark K M', '+6100000', '89654', 'KSA', 0, 0, 39.2, '2022-05-29 06:41:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `owner_transactions`
--

CREATE TABLE `owner_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `owner_id` int(11) NOT NULL,
  `add_or_withdraw` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passports`
--

CREATE TABLE `passports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_number` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_scan_copy` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `passports`
--

INSERT INTO `passports` (`id`, `name`, `phone`, `address`, `father_name`, `mother_name`, `passport_number`, `passport_scan_copy`, `nid_number`, `note`, `reference`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Ridoy Paul', '01627382866', 'Shah Ali plaza\r\n1205', NULL, NULL, 'h fgh fgh', NULL, NULL, 'fghfgh fgh fgh fgh', NULL, 1, '2022-05-15 07:10:20', '2022-05-29 06:56:39'),
(2, 'Robin Hossain', '01627382866', 'Shah Ali plaza 1205', NULL, NULL, '1234567877777', NULL, NULL, 'ghjjjjjjfh fgh fgh fgh fghfg hfgh fgh fg hf', NULL, 1, '2022-05-15 07:13:21', '2022-05-19 11:21:16'),
(3, 'Tuhin Mia', '0162828282', 'Shah Ali plaza\r\n1205', NULL, NULL, '43534534534534534534', 'images/1732888360166904.jpg', NULL, 'gfhfgh fgh dfgh fgh    fg hfgh fgh dfgh fdgh fdgh df', NULL, 1, '2022-05-15 10:38:42', '2022-05-19 11:20:51'),
(4, 'Shagor Amhed', '22222222222222', 'dfgdg dg dfg', NULL, NULL, '555555555555555', 'images/1733783041525073.pdf', NULL, 'hgjghjg', NULL, 1, '2022-05-25 07:39:16', '2022-05-29 06:56:31'),
(5, 'Md Nayamul Hossain', '01302355113', 'Paikara, Tarail, Kaliganj, Satkhira', NULL, NULL, 'BY0885822', NULL, NULL, 'Agent: Azmun Vai', NULL, 2, '2022-06-02 09:21:43', '2022-06-02 09:21:43'),
(6, 'Md Tamim Islam', '01929688336', 'Baherchar Katla, 06, Madaripur Sadar-7900, Madaripur', NULL, NULL, 'A03376300', NULL, NULL, 'Agent: Shawon Vai', NULL, 2, '2022-06-02 09:23:25', '2022-06-02 09:23:25'),
(7, 'Md Razwoun Khan', '01712781912', 'Bamonpara Road, Karbala, Jessore Main Post Office, Kotwali, Jessore', NULL, NULL, 'BW0214277', NULL, NULL, 'Agent Rustom Vai', NULL, 2, '2022-06-02 09:24:55', '2022-06-02 09:24:55'),
(8, 'Md Antor Hossain', '01310749502', 'Durgapur, Daudkandi, Gouripur-3517, Cumilla', NULL, NULL, 'A03450596', NULL, NULL, 'Agent Ruhul Mama', NULL, 2, '2022-06-02 09:26:24', '2022-06-02 09:26:24'),
(9, 'Amir Hossen', '01862583841', 'Itakhola, Daudkandi, Amirabad-3517, Cumilla', NULL, NULL, 'A03212542', NULL, NULL, 'Agent Ruhul Mama', NULL, 2, '2022-06-02 09:27:34', '2022-06-02 09:27:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('cse.ridoypaul@gmail.com', '$2y$10$CzuFa4hCyOzkKrlJx/2i3ucS/tuQOL8ZSLnxsffhuJfvrNInSApne', '2022-05-19 06:47:17');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(432, 'dashboard.view', 'web', 'Dashboard', NULL, NULL),
(433, 'settings', 'web', 'Dashboard', NULL, NULL),
(434, 'role.view', 'web', 'Role', NULL, NULL),
(435, 'create.role', 'web', 'Role', NULL, NULL),
(436, 'update.role', 'web', 'Role', NULL, NULL),
(437, 'permissions', 'web', 'Role', NULL, NULL),
(438, 'crm.view', 'web', 'CRM', NULL, NULL),
(439, 'crm.create', 'web', 'CRM', NULL, NULL),
(440, 'crm.update', 'web', 'CRM', NULL, NULL),
(441, 'country.view', 'web', 'Country', NULL, NULL),
(442, 'country.create', 'web', 'Country', NULL, NULL),
(443, 'country.edit', 'web', 'Country', NULL, NULL),
(444, 'visa.view', 'web', 'Visa', NULL, NULL),
(445, 'visa.create', 'web', 'Visa', NULL, NULL),
(446, 'visa.edit', 'web', 'Visa', NULL, NULL),
(447, 'passport.view', 'web', 'Passport', NULL, NULL),
(448, 'passport.create', 'web', 'Passport', NULL, NULL),
(449, 'passport.edit', 'web', 'Passport', NULL, NULL),
(450, 'agents.view', 'web', 'Agents', NULL, NULL),
(451, 'agents.create', 'web', 'Agents', NULL, NULL),
(452, 'agents.edit', 'web', 'Agents', NULL, NULL),
(453, 'agents.report', 'web', 'Agents', NULL, NULL),
(454, 'expenses.category.view', 'web', 'Expenses_Category', NULL, NULL),
(455, 'expenses.category.create', 'web', 'Expenses_Category', NULL, NULL),
(456, 'expenses.category.edit', 'web', 'Expenses_Category', NULL, NULL),
(457, 'work.all.view', 'web', 'Work', NULL, NULL),
(458, 'work.single.view', 'web', 'Work', NULL, NULL),
(459, 'work.create', 'web', 'Work', NULL, NULL),
(460, 'work.edit', 'web', 'Work', NULL, NULL),
(461, 'work.edit.status', 'web', 'Work', NULL, NULL),
(462, 'income.view', 'web', 'Income', NULL, NULL),
(463, 'income.create', 'web', 'Income', NULL, NULL),
(464, 'income.delete', 'web', 'Income', NULL, NULL),
(465, 'expenses.view', 'web', 'Expenses', NULL, NULL),
(466, 'expenses.create', 'web', 'Expenses', NULL, NULL),
(467, 'expenses.delete', 'web', 'Expenses', NULL, NULL),
(468, 'owners.view', 'web', 'Owners', NULL, NULL),
(469, 'owners.create', 'web', 'Owners', NULL, NULL),
(470, 'owners.edit', 'web', 'Owners', NULL, NULL),
(471, 'owners.transaction.view', 'web', 'Owners', NULL, NULL),
(472, 'owners.transaction.create', 'web', 'Owners', NULL, NULL),
(473, 'owners.transaction.delete', 'web', 'Owners', NULL, NULL),
(474, 'owners.report', 'web', 'Reports', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Manager', 'web', '2022-05-12 10:32:53', NULL),
(2, 'Sohel', 'web', '2022-07-31 06:58:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3T6v2ffaPRrauvnpWGxFR7FZtjoGpfdDHgxF921g', NULL, '183.129.153.157', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.108 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNnVSNkNZVzh5QVJTRG42cnlXdE9vZnlvZ2dXV3d5Z2dCMVZiZHdwdiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vd3d3LmFwcC5lYXNlbG92ZXJzZWFzLmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1664103244),
('9beDDM0M1wc73IJE7jDVTMHWLUxrJsUWADoxpNYF', NULL, '66.102.7.36', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 Google-PageRenderer Google (+https://developers.google.com/+/web/snippet/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib0hTaFJuSFFlYU5uQmV1ZGpRS0hENDlPZU9hRUw5ZmNGSWROUjdZZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663740692),
('a3bOJxthwvVlwkMvTdb6V4bpCnuqZ0oiTN2h4mto', NULL, '64.233.172.70', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 Google-PageRenderer Google (+https://developers.google.com/+/web/snippet/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZEQ4MWhIdWdpYk5vNWkxQ09DZ1c0Y1U1Tnpnd003NGZiMUdCbFh3YyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663740687),
('A4yJqrXuYBj08xcBPMnqxpcPXfNz3KDs297N1Ln8', NULL, '66.249.88.57', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 Google-PageRenderer Google (+https://developers.google.com/+/web/snippet/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib3NyRmpZbTRVR2tjVEhzSUhLZEZkb1RuNjFmWktPR2hwV0x4d2Z5SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663740674),
('aCDuQx9ZXgTMVzVaPXk45uUyBAxkfMpZPHVZ1vtz', NULL, '103.100.234.193', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU1NzUk9oUlBmdHZOTExwR3dUTk1LbHR1NmRwSDFYTVNISDQ1eEZQSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663740247),
('AznFZguhw7t1K0VoM5pNscQ05sOf9fdAhAP4nnBk', NULL, '66.249.88.58', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 Google-PageRenderer Google (+https://developers.google.com/+/web/snippet/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic0VhbUpSY2tyZzZBdkh3SFNNWDJ5c3JGTXdKWTFJMlFHWjA4ZnZVaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663741831),
('GVz2zcBxShluFxNn7x3r07ytFaHCvxOj3oUIOzxb', NULL, '52.114.14.71', 'Mozilla/5.0 (Windows NT 6.1; WOW64) SkypeUriPreview Preview/0.5 skype-url-preview@microsoft.com', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ3ZXd3FVSnU2dnBucDVpSXk0SnFaWmVJNEpnQWE1Z3pYeE1ETGoycCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663755442),
('iCjnEOrQUwlu56OW7r3grZCIBkGCIBcGBNuyZWOp', NULL, '27.4.78.170', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTzh4YUFwWVQ2QXI2T0NKODVkSjNiSmozMHZWNHpRSW5Ka1FMQThySiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663749150),
('iJnnpZvI6SEKzEGgm6zDz8jThAqD24kAv10TPdie', NULL, '66.249.88.58', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 Google-PageRenderer Google (+https://developers.google.com/+/web/snippet/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieG43eGlCOGJhUkpIR1I0ZjNhOUs4ODZmR09VMUFxaWJLN1Q4cFBOcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663740676),
('iL9saLvpZMChv4IvJhGewHEW2gGhtfswzoknA2Hh', 1, '103.49.203.92', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNmJ1N1REa3ptcURuM2VOR3FnZURyMzJnRzJpSTBUTmg0cVNMRFNjViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRaYmVUVXdYV0subHdQcjdacWhNeGguU3VKS2RzVUpZRGFaRS5rOU5TTjROdWNTLjBmNHczdSI7fQ==', 1664000159),
('KdushMWQsLEuRyuqzdq5lXFbIO2KCKQmR187JISy', NULL, '27.4.78.170', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSm1FdjE0MkNVdzlkVktQZ3l0UmttRVh3Z213emE5MjJUM2pTR3pVSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663754974),
('KoKfca0tvTH2foOTTkzcwweRWXy7064QQZKDMGj9', NULL, '103.184.239.133', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:104.0) Gecko/20100101 Firefox/104.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoib0RDVk1vWFpKdW5FSzMzbmxaeXdxeWU0MkM2TGVhQkxRR1RITWZGeCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663743159),
('LyseWw9t8dZLKhX1lkJMi67hrxp7do3GyINlR70H', NULL, '66.249.88.57', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 Google-PageRenderer Google (+https://developers.google.com/+/web/snippet/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR25tMVI0QW5mRjltdGJ0NDluWFMxdWVvYm9QY0xWMmt0eDNsbEJFOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663740681),
('mKMKvTJFYumMUBbnWopx8mhW1oYvCc5eT2vhUUiw', NULL, '183.129.153.157', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.108 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiblBQYWFsa0VZY0twT2F1R2c1QVB5WFNSOTB0aVVaa0VpWU05bUFPNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9hcHAuZWFzZWxvdmVyc2Vhcy5jb20vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1664103064),
('MkVsdrf8bfav0IHcZlMoOmhFlAZrx2btmdNHQCDf', 1, '103.49.203.92', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaXdoZHN2S29SNWp2T1hXZ2d3aGdWb09vS2Nmc1h5RXQ5ZzNLSklwRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL3JlcG9ydC9leHBlbnNlcy1sZWRnZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkWmJlVFV3WFdLLmx3UHI3WnFoTXhoLlN1Sktkc1VKWURhWkUuazlOU040TnVjUy4wZjR3M3UiO30=', 1663761984),
('mWSqcwKb8IIOePT83DAOgkuW7WARIK0uHZFZLCcu', 1, '103.49.203.92', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiakl0ZEltaFpVeUloVjVZZkJybERqd1Q3RVJ0eXFSM2hhR1g3czR1cCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2Rhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRaYmVUVXdYV0subHdQcjdacWhNeGguU3VKS2RzVUpZRGFaRS5rOU5TTjROdWNTLjBmNHczdSI7fQ==', 1664019430),
('Ng5zqimwqN9fey6hv2q5czu0AYadGaly3xa9tCYa', NULL, '103.196.232.134', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQklseEhjempzckREWDR6R1ZPWVZyWHc0SVlKbm40dHFxZjBUOGFseiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663739613),
('nizdskSWMrhF2iZBAYVlbNQbOTVA0KSgAoewm0UD', NULL, '183.129.153.157', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.108 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiajUwTFk5cWN5TWRySlYzMUFUeDJjZWo3d0dTMWpndW1Lc2NTMWdEZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9hcHAuZWFzZWxvdmVyc2Vhcy5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1664103062),
('OPWxSAdSPeqa05vz5WadCxKIst7a4MVZ8DMEePnh', NULL, '64.233.172.70', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 Google-PageRenderer Google (+https://developers.google.com/+/web/snippet/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2VlclFpYWl6Y1lYREk0b2h3MzNpSm1manJ5Wkd6V3NFMWJmSmZ2NSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663740596),
('OVygUYZ7evNtNyoZKlqHZiPr9OAeDcp3LNisbV6C', NULL, '103.100.234.193', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:105.0) Gecko/20100101 Firefox/105.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN1ZpdWZMbTJHQ0JBTjNTdHdpZTJ6TVBBUUk3TUoyWHZ0VVdYcTJxTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663877610),
('poUlHfZ6ojGy9fdH9nqBFsIvj23Oy4RVKGni9HyB', NULL, '85.14.28.197', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQzNwOXFSZHB2bld2THVOOXFjeVZHM0FnR0U0TWU1QU9PT3BUd3FORiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663739604),
('qGllX0hPSHikoDVXaIuhzGbGzJvyG0IKucxgIETw', NULL, '49.37.247.194', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiekJWOGlMVVJtZ2tYb055aUdTZTVKSnBRVG1YRGpFelMxdzFBWnBuRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663740606),
('QkucKdar9ScTd9QW7tFtOnp8Tbicy9SJG30uurnV', NULL, '66.249.88.59', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 Google-PageRenderer Google (+https://developers.google.com/+/web/snippet/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid0g1ZXhWOG9pSERiSVd0TXZwMmNFeHpPUk1teVJqSnhrUnBlSmpEWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663740677),
('rWAHHcSraY5iKlrArC8fi6zsByLLwdU7sXzVfMCS', NULL, '183.129.153.157', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.108 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWGlmd0ZWdUFYOGFlYzBwWmZidERqREdjN3hWMHZ4d1Q3R04wejlzdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vd3d3LmFwcC5lYXNlbG92ZXJzZWFzLmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1664103234),
('Sn0Epb5BItpoVquoT47T5ve6I5IM7HkXEYQtwT3E', NULL, '66.249.88.57', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 Google-PageRenderer Google (+https://developers.google.com/+/web/snippet/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibk4xM0RWSUo1VGlJYnhPdW5HeGY4cmZic0N1TjVmQ0J1d0FZSmM4eSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663740690),
('TD8vWe1DL5uNSiNNWphEuLeVWz1VnApsqMTiKSyJ', NULL, '66.249.88.57', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 Google-PageRenderer Google (+https://developers.google.com/+/web/snippet/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTThPV1o0cFdsZ0dSaXQ2VzdSdmtnbzhxeXJ5T1VwZWJXaWtTQWVreiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663740684),
('tKMpllhSGyp1fIRAFHU8Z5PIJgyDmkOzytlJQ5jX', NULL, '64.233.172.68', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 Google-PageRenderer Google (+https://developers.google.com/+/web/snippet/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQUdObGdLUm80aWV1Mms2UkFCRm84SFgwZVFRTUhvTXk4Zkw2WlN6YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663740594),
('TvMHTDRcHtthytW2xSUkwpSGaFpBHTuHqu8p2Gzk', NULL, '64.233.172.70', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 Google-PageRenderer Google (+https://developers.google.com/+/web/snippet/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieTJkZUVZb21HUjd4dHhJR0NtcDlxdW9NQXpwMm1jR2dMREU3cEtYYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663740679),
('vBy7RIiYOmSGcNZFM7PqQ0aQyCAffz46yOBysLRV', NULL, '66.152.183.24', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMzhJV0xqc3JLdG5lWDV0bmFCV1JRaVFCUWlrQ3plWlo2N0pJOFhQaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663744084),
('vgXTGqiZP8x74mdikH2eqEhHUlBxNhpxbR7hHCKk', NULL, '66.249.88.59', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 Google-PageRenderer Google (+https://developers.google.com/+/web/snippet/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWnFRQWd6NTZOdXJrbDAyb2JxdlNnNGN2aDJ4akFkdmNXUEFhUzJNeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663740587),
('VWZZ5wPkog8PpZjkYfMoW0Wpq0ktK9J2EDcBRhg9', NULL, '66.249.88.58', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 Google-PageRenderer Google (+https://developers.google.com/+/web/snippet/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibDlLeVFiUkdDZkU1MlVGZENTdkhNWnJHTGR4Sk5wMzh3SG5BNk1tNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663742601),
('XeGtHzFG8koOpyCHPdqxUV4mYGkMKv7F039HsGwF', NULL, '66.249.88.57', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36 Google-PageRenderer Google (+https://developers.google.com/+/web/snippet/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUGo2SUJSOEJUeTRRRTdjS3V1N1h5QTNmUFdWekQ2bE5aQ09oZ1NDOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL2ZpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1663740593),
('yfE32CYvGm1uuwFJ02B13ad9sKNE4gRVxt6DDZXr', 1, '103.49.203.92', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/105.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicjVjNElJR2s3RzJOOW1UOW9BZ01NUk9VeTA5c1NVTDdtOTJ1RFlOOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tL3JlcG9ydC9leHBlbnNlcy1sZWRnZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkWmJlVFV3WFdLLmx3UHI3WnFoTXhoLlN1Sktkc1VKWURhWkUuazlOU040TnVjUy4wZjR3M3UiO30=', 1663999939),
('yky5VgT06RhlwRmzEl0LgfGDfgJLvobcrGKC8BXq', NULL, '183.129.153.157', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.108 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUW5ZS014Q1h3ZVV5dkVGS3pkN1JnMGJvdUpMdHJFSmRJWUJRNTM1UiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHBzOi8vYXBwLmVhc2Vsb3ZlcnNlYXMuY29tIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1664103061);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ridoy\'s Team', 1, '2022-05-12 09:56:29', '2022-05-12 09:56:29'),
(2, 2, 'Easel\'s Team', 1, '2022-05-28 07:47:01', '2022-05-28 07:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `type`, `is_active`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Sohel Rana', 'cse.ridoypaul@gmail.com', NULL, NULL, '$2y$10$ZbeTUwXWK.lwPr7ZqhMxh.SuJKdsUJYDaZE.k9NSN4NucS.0f4w3u', NULL, NULL, 'admin', '1', NULL, NULL, 'images/profile/99626686562.png', '2022-05-12 09:56:29', '2022-08-01 09:38:18'),
(2, 'Easel Overseas Limited', 'info@easeloverseas.com', NULL, NULL, '$2y$10$nh8yBHkZnAkELnZsFr7OceR1WySU5krMyATz6cAGJFnWMNq9qrvgO', NULL, NULL, 'admin', '1', 'ZVVREXHpTH4aLY1e7BX81kX3vqqEzqfL66ev7TdAv4vwDqlAhbwirnK6HXW5', NULL, 'images/profile/39535782006.png', '2022-05-28 07:47:01', '2022-05-28 08:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `visas`
--

CREATE TABLE `visas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` int(11) NOT NULL,
  `visa_title` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_visa` int(11) NOT NULL DEFAULT 0,
  `rest_number_of_visa` int(11) NOT NULL DEFAULT 0,
  `total_cost` double NOT NULL DEFAULT 0,
  `individual_cost` double NOT NULL DEFAULT 0,
  `company_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visas`
--

INSERT INTO `visas` (`id`, `country_id`, `visa_title`, `number_of_visa`, `rest_number_of_visa`, `total_cost`, `individual_cost`, `company_name`, `note`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test Visa Name', 50, 41, 5000000, 100000, 'gfhfgh fgh fg h', 'fgjhfghfgh', 1, '2022-05-14 12:40:53', '2022-06-11 09:04:30'),
(2, 3, 'Work Visa', 35, 32, 5775000, 165000, 'Al Bader Golf Construction', NULL, 0, '2022-05-22 06:38:42', '2022-09-20 06:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `passport_id` int(11) NOT NULL,
  `post` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `visa_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `package_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `due` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `agent_commission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `agent_commission_paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `agent_commission_due` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_rejected` int(11) NOT NULL DEFAULT 0,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `passport_id`, `post`, `country_id`, `visa_id`, `code`, `agent_id`, `package_price`, `paid`, `due`, `agent_commission`, `agent_commission_paid`, `agent_commission_due`, `note`, `is_active`, `status`, `is_rejected`, `date`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 1, 'fghfg fg hfg hf', 1, 1, '883D4SA', 1, '66666', '0', '66666', '666665', '0', '666665', 'hello note', 0, 'start', 0, '2022-05-18', 1, '2022-05-18 06:12:27', '2022-08-01 08:45:41'),
(5, 1, 'fghfg fg hfg hf', 1, 1, '883D4SA', 1, '66666', '0', '66666', '666665', '0', '666665', 'hello note', 1, '', 0, '2022-05-18', 1, '2022-05-18 06:12:45', '2022-05-18 06:12:45'),
(6, 1, 'dfgdfgdfg', 1, 1, '883D', 1, '65675756', '0', '65675756', '6665665', '0', '6665665', 'dfgdfgdfgdfg', 1, '', 0, '2022-05-18', 1, '2022-05-18 06:19:26', '2022-05-18 06:19:26'),
(7, 1, 'ghjghj gj ghj gh', 1, 1, 'ghjghj ghjghj ghj', 1, '456456', '0', '414456', '546546', '0', '546546', 'ghjghjgh', 1, '', 0, '2022-05-18', 1, '2022-05-18 07:04:23', '2022-05-19 07:16:12'),
(8, 1, 'rrrrtertertb ert ert et', 1, 1, 'e334', 1, '10000', '0', '10000', '1000', '0', '1000', 'dgdfgdfg', 1, '', 0, '2022-05-18', 1, '2022-05-18 07:05:11', '2022-05-18 07:05:11'),
(9, 3, 'rrrrtertertb ert ert et', 1, 1, 'dfgfd', 1, '300000', '6000', '294000', '4000', '0', '4000', 'ghjgf jgf jgjf j', 0, 'interview/application', 0, '2022-05-19', 1, '2022-05-25 06:31:19', '2022-08-01 08:45:34'),
(10, 1, 'rrrrtertertb ert ert et', 2, 2, '76867', 1, '5000000', '0', '5000000', '50000', '0', '50000', NULL, 1, '', 0, '2022-05-24', 1, '2022-05-24 06:31:16', '2022-05-24 06:31:16'),
(11, 1, 'rrrrtertertb ert ert et', 3, 2, 'gggtg', 1, '3443434', '0', '3443434', '500000', '0', '500000', 'hgjfghf', 0, 'start', 0, '2022-05-24', 1, '2022-06-04 07:28:14', '2022-06-11 04:51:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_settings`
--
ALTER TABLE `business_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses_categories`
--
ALTER TABLE `expenses_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
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
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner_transactions`
--
ALTER TABLE `owner_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_transactions_owner_id_index` (`owner_id`);

--
-- Indexes for table `passports`
--
ALTER TABLE `passports`
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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visas`
--
ALTER TABLE `visas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `business_settings`
--
ALTER TABLE `business_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `expenses_categories`
--
ALTER TABLE `expenses_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `owner_transactions`
--
ALTER TABLE `owner_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `passports`
--
ALTER TABLE `passports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=475;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visas`
--
ALTER TABLE `visas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
