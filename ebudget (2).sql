-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 02:17 AM
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
-- Database: `ebudget`
--

-- --------------------------------------------------------

--
-- Table structure for table `addingdetails`
--

CREATE TABLE `addingdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uniqueID` varchar(255) NOT NULL,
  `FIRSTadd` varchar(255) DEFAULT NULL,
  `SECONDadd` varchar(255) DEFAULT NULL,
  `THIRDadd` varchar(255) DEFAULT NULL,
  `FOURTHadd` varchar(255) DEFAULT NULL,
  `Date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addingdetails`
--

INSERT INTO `addingdetails` (`id`, `created_at`, `updated_at`, `uniqueID`, `FIRSTadd`, `SECONDadd`, `THIRDadd`, `FOURTHadd`, `Date`) VALUES
(4, '2024-10-09 01:55:40', '2024-10-09 01:55:40', '21', '100', '100', '100', NULL, NULL),
(5, '2024-10-09 02:03:00', '2024-10-09 02:03:00', '21', '1000', NULL, NULL, NULL, NULL),
(6, '2024-10-09 02:15:07', '2024-10-09 02:15:07', '21', '200', NULL, NULL, NULL, NULL),
(7, '2024-10-09 07:31:04', '2024-10-09 07:31:04', '23', NULL, NULL, '1000', NULL, NULL),
(8, '2024-10-09 07:38:15', '2024-10-09 07:38:15', '23', NULL, '1000', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `addnews`
--

CREATE TABLE `addnews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `AIPRefCode` varchar(255) NOT NULL,
  `ACCOUNT_CODE` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addnews`
--

INSERT INTO `addnews` (`id`, `AIPRefCode`, `ACCOUNT_CODE`, `Title`, `Department`, `Year`, `created_at`, `updated_at`) VALUES
(4, '001', '001-01', 'sd', 'MIS', '2025', '2024-10-08 08:57:57', '2024-10-09 01:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `detailsdeductions`
--

CREATE TABLE `detailsdeductions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uniqueID` varchar(255) NOT NULL,
  `Quarter` varchar(255) NOT NULL,
  `PR_No` varchar(255) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Totaldeduction` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detailsdeductions`
--

INSERT INTO `detailsdeductions` (`id`, `uniqueID`, `Quarter`, `PR_No`, `Date`, `Title`, `Amount`, `Status`, `Totaldeduction`, `created_at`, `updated_at`) VALUES
(3, '21', 'First Quarter', '002', '2024-10-09', 'dd', 50, NULL, 150, '2024-10-09 01:56:11', '2024-10-09 01:56:11'),
(4, '21', 'Second Quarter', '001', '2024-10-09', 'sad', 20, NULL, 180, '2024-10-09 02:14:44', '2024-10-09 02:14:44'),
(5, '23', 'First Quarter', '001', '2024-10-09', 'dsd', 100, 'CANCELLED', 900, '2024-10-09 07:30:29', '2024-10-09 07:30:34'),
(6, '23', 'First Quarter', '0212', '2024-10-10', 'hfg', 1000, NULL, 0, '2024-10-09 07:37:58', '2024-10-09 07:37:58'),
(7, '22', 'First Quarter', '002', '2024-10-16', 'sfdaf', 100, NULL, 0, '2024-10-09 07:39:07', '2024-10-09 07:39:07'),
(8, '23', 'Second Quarter', '0002', '2024-10-10', 'rfasfs', 1100, NULL, 0, '2024-10-09 07:40:15', '2024-10-09 07:40:15'),
(9, '24', 'First Quarter', '021', '2024-10-10', 'zxzx', 980, NULL, 20, '2024-10-09 08:29:08', '2024-10-09 08:29:08'),
(10, '21', 'First Quarter', 'sfds', '2024-10-10', 'sffd', 1300, NULL, 50, '2024-10-09 08:29:40', '2024-10-09 08:29:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(35, '2014_10_12_000000_create_users_table', 1),
(36, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(37, '2019_08_19_000000_create_failed_jobs_table', 1),
(38, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(39, '2023_12_05_010420_create_addnews_table', 1),
(40, '2023_12_05_070334_create_newcategs_table', 1),
(41, '2024_07_17_153412_create_detailsdeductions_table', 1),
(42, '2024_08_28_110117_create_addingdetails_table', 1),
(43, '2024_09_16_161900_create_supplementals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newcategs`
--

CREATE TABLE `newcategs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CATEGORY` varchar(255) NOT NULL,
  `AIPRefCode` varchar(255) NOT NULL,
  `PPA` varchar(255) NOT NULL,
  `RESOURCES` varchar(255) NOT NULL,
  `RESPONSIBLE_UNIT` varchar(255) NOT NULL,
  `ACCOUNT_CODE` varchar(255) NOT NULL,
  `OBJECT_EXPENDITURE` varchar(255) NOT NULL,
  `SOURCE_FUND` varchar(255) NOT NULL,
  `NOTE` varchar(255) DEFAULT NULL,
  `FIRST` int(11) DEFAULT NULL,
  `FIRSTREM` int(11) DEFAULT NULL,
  `SECOND` int(11) DEFAULT NULL,
  `SECONDREM` int(11) DEFAULT NULL,
  `THIRD` int(11) DEFAULT NULL,
  `THIRDREM` int(11) DEFAULT NULL,
  `FOURTH` int(11) DEFAULT NULL,
  `FOURTHREM` int(11) DEFAULT NULL,
  `TOTAL` int(11) DEFAULT NULL,
  `REMAINING_BALANCE` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newcategs`
--

INSERT INTO `newcategs` (`id`, `CATEGORY`, `AIPRefCode`, `PPA`, `RESOURCES`, `RESPONSIBLE_UNIT`, `ACCOUNT_CODE`, `OBJECT_EXPENDITURE`, `SOURCE_FUND`, `NOTE`, `FIRST`, `FIRSTREM`, `SECOND`, `SECONDREM`, `THIRD`, `THIRDREM`, `FOURTH`, `FOURTHREM`, `TOTAL`, `REMAINING_BALANCE`, `created_at`, `updated_at`) VALUES
(20, 'Quarterly', '001', 'df', 'adfdsaf', 'sadfsadf', '001-01', 'safdsaf', 'df', 'dfadf', 100, 100, 100, 100, 0, 0, 0, 0, NULL, NULL, '2024-10-09 01:37:59', '2024-10-09 01:39:07'),
(21, 'Monthly', '001', 'dddd', 'dsdsad', 'd', '001-01', 'd', 'd', 'ok', 1400, 50, 200, 180, 100, 100, 0, 0, NULL, NULL, '2024-10-09 01:55:25', '2024-10-09 08:29:41'),
(22, 'Monthly', '001', 'tyty', 'rtyrt', 'rtyr', '001-01', 'yrytr', 'rtyurty', '', 100, 0, 200, 200, 100, 100, 0, 0, NULL, NULL, '2024-10-09 07:14:00', '2024-10-09 07:39:07'),
(23, 'Quarterly', '001', 'PPSA', 'Rn', 'RP', '001-01', 'OOE', 'fdafsa', '', 1000, 0, 1100, 0, 1000, 1000, 0, 0, NULL, NULL, '2024-10-09 07:30:02', '2024-10-09 07:40:16'),
(24, 'Quarterly', '001', 'cC', 'xcxz', 'czx', '001-01', 'ccc', 'cc', '', 1000, 20, 1000, 1000, 1000, 1000, 1000, 1000, NULL, NULL, '2024-10-09 08:28:45', '2024-10-09 08:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplementals`
--

CREATE TABLE `supplementals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplementals`
--

INSERT INTO `supplementals` (`id`, `category_id`, `name`, `amount`, `created_at`, `updated_at`) VALUES
(31, 20, 'df', 0, '2024-10-09 01:38:21', '2024-10-09 01:57:09'),
(32, 21, 'dsad', 0, '2024-10-09 01:56:32', '2024-10-09 01:56:38'),
(33, 21, 'fadfsa', 0, '2024-10-09 01:56:46', '2024-10-09 01:56:58'),
(34, 20, 'fasdf', 300, '2024-10-09 01:57:17', '2024-10-09 02:07:55'),
(35, 21, 'fssa', 100, '2024-10-09 01:57:31', '2024-10-09 01:57:31'),
(36, 21, 'fasf', 180, '2024-10-09 01:57:38', '2024-10-09 07:12:57'),
(37, 20, 'asdf', 50, '2024-10-09 02:14:21', '2024-10-09 02:14:27'),
(38, 20, 'jhj', 0, '2024-10-09 07:13:08', '2024-10-09 07:13:30'),
(39, 22, 'utrurtu', 163939891, '2024-10-09 07:14:21', '2024-10-09 07:14:35'),
(40, 23, 'dsd', 800, '2024-10-09 07:31:28', '2024-10-09 07:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `designation`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'syl@gmail.com', NULL, '$2y$10$AubPebUHdiy8gCmK9huj3u4/dt6uAO/gU8aBug.Sbgmb42SS2/0Uq', NULL, '2024-10-07 06:47:33', '2024-10-07 06:47:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addingdetails`
--
ALTER TABLE `addingdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addnews`
--
ALTER TABLE `addnews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailsdeductions`
--
ALTER TABLE `detailsdeductions`
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
-- Indexes for table `newcategs`
--
ALTER TABLE `newcategs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `supplementals`
--
ALTER TABLE `supplementals`
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
-- AUTO_INCREMENT for table `addingdetails`
--
ALTER TABLE `addingdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `addnews`
--
ALTER TABLE `addnews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detailsdeductions`
--
ALTER TABLE `detailsdeductions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `newcategs`
--
ALTER TABLE `newcategs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplementals`
--
ALTER TABLE `supplementals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
