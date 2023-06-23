-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 08:57 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insurance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'kamlesh', 'kamlesh@gmail.com', '$2y$10$nasnrC65aaaTkYUWnTlS3OVKyXULHDiFzHO9AZxpa1jDEc2f8qKTG', '2021-12-21 01:55:32', '2021-12-21 01:55:32'),
(2, 'jay', 'jay@gmail.com', '$2y$10$nasnrC65aaaTkYUWnTlS3OVKyXULHDiFzHO9AZxpa1jDEc2f8qKTG', '2021-12-21 01:55:32', '2021-12-21 01:55:32'),
(3, 'Admin', 'admin@gmail.com', '$2y$10$nasnrC65aaaTkYUWnTlS3OVKyXULHDiFzHO9AZxpa1jDEc2f8qKTG', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_ name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_ name`) VALUES
(1, 'Motor Insurance'),
(2, 'Non-Moto Insurance');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `sub_cat` int(11) NOT NULL,
  `remark` text DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `email`, `contact`, `category`, `sub_cat`, `remark`, `year`, `created_at`, `updated_at`) VALUES
(1, 'LIC', 'lic@gmail.com', '7845129637', 1, 2, 'Check', 2023, NULL, NULL),
(2, 'ICICI', 'icici@gmail.com', '7845963217', 1, 1, 'ICICI', 2023, NULL, NULL),
(4, 'HDFC', 'hdfc@gmail.com', '7894561237', 2, 3, 'HDFC', 2023, NULL, NULL),
(6, 'Regan Randall', 'gicamevej@mailinator.com', '+1 (188) 358-6373', 1, 1, NULL, 2023, NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_21_060353_create_admins_table', 1);

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
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `policie_id` int(11) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `vehicle` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `entry_date` varchar(255) DEFAULT NULL,
  `expire_date` varchar(255) NOT NULL,
  `renewal_date` varchar(255) NOT NULL,
  `beneficiaries` varchar(255) DEFAULT NULL,
  `premium` varchar(255) NOT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `payment_date` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `docs` varchar(255) DEFAULT NULL,
  `remark` text NOT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`policie_id`, `customer`, `company`, `product`, `vehicle`, `type`, `entry_date`, `expire_date`, `renewal_date`, `beneficiaries`, `premium`, `amount`, `payment_date`, `payment_mode`, `docs`, `remark`, `year`) VALUES
(1, '2', 'HDFC', '4', NULL, 'Annually', '2023-03-16', '2019-06-22', '2001-05-17', 'Cupiditate sit tempo', '40000', '30000', '2011-11-26', 'Card', NULL, 'This is final check', 0),
(3, '1', 'LIC', '3', 'GJ7FE7001', 'Annually', '2023-03-16', '2023-02-16', '2023-02-17', 'Friends', '10000', '9000', '2023-02-16', 'Gpay', '1676546362-beautiful_nature_landscape_05_hd_picture_166223.jpg', 'tHIS DELETE', 0),
(4, '1', 'LIC', '3', 'GJ6DF7000', 'Annually', '2023-03-15', '2023-02-16', '2023-02-17', 'tiufkjhbbjl', '1000', '7000', '2023-02-16', 'Cash', '1676547731-beautiful_nature_landscape_05_hd_picture_166223.jpg|1676547731-imag2.jpg', 'fewergfgerwg', 2023),
(6, '1', 'LIC', '3', 'GJ6DF7000', 'Annually', '2023-03-14', '2023-02-24', '2023-02-24', 'sdasfsda', '435654', '6544', '2023-02-24', 'Cash', '1677232464-dummy.jpg', 'zdddf', 2023),
(7, '1', 'LIC', '3', 'GJ6DF7000', 'Annually', '2023-03-11', '2023-02-24', '2023-02-24', 'sdffsd', '43543', NULL, '2023-02-24', 'Card', '1677241088-beautiful_nature_landscape_05_hd_picture_166223.jpg', 'sdsad', 2023),
(8, '1', 'LIC', '3', 'GJ6DF7000', 'Annually', '2023-03-12', '1976-05-25', '1971-07-07', 'Qui vero et ut vero', '435654', NULL, '1999-09-25', 'Gpay', '1677298801-dummy.jpg', 'Cupiditate cupiditat', 2023),
(9, '1', 'LIC', '3', 'GJ6DF7000', 'Annually', '2023-03-20', '1975-10-17', '1987-11-13', 'Odit aut do tenetur', '435654', NULL, '2008-03-27', 'Cash', '1677299093-beautiful_nature_landscape_05_hd_picture_166223.jpg', 'Eveniet dolor sequi', 2023),
(10, '1', 'LIC', '3', 'GJ6DF7000', 'Annually', '2023-03-15', '2023-02-25', '2023-02-25', 'sdasfdsad', '234543', NULL, '2023-02-25', 'Online', '1677300769-Rec-1674284526.jpg', 'sadsad', 2023),
(11, '2', 'HDFC', '4', NULL, 'Annually', '2023-03-20', '2023-02-27', '2023-02-27', 'sadsadsa', '12321', NULL, '2023-02-27', 'Online', '1677491540-5. Other Models & Cart.pdf', 'sdsdsdaffsa', 2023),
(12, '4', 'HDFC', '5', NULL, 'Annually', '2023-03-20', '2023-02-27', '2023-02-27', NULL, '222', NULL, '2023-02-27', 'Online', '1678698550-download.pdf|1678698550-download1.pdf', 'sdsdsdsd', 2023),
(13, '1', 'LIC', '3', 'GJ06DE4545', 'Annually', '2023-03-20', '2023-03-13', '2023-03-14', NULL, '12000', NULL, '2023-03-13', 'Online', '1678684549-download.pdf|1678684549-download1.pdf', '12345', 2023),
(14, '19', 'LIC', '3', 'Gj8907', 'Annually', '2023-03-20', '2023-03-13', '2023-03-13', NULL, '12000', NULL, '2023-03-13', 'Online', '1678699503-download.pdf', '234234234', 2023),
(15, '1', 'LIC', '3', 'sd544egg', 'Annually', '2023-03-20', '2023-03-20', '2023-03-20', NULL, '120000', NULL, '2023-03-20', 'Online', '1679291231-1677659733-INS_1677654620_policyDoc.pdf|1679291232-1677491540-5. Other Models & Cart.pdf|1679291232-1677491978-demo.pdf|1679291232-demo.pdf', 'assdsadsad', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `company` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sub_cat` varchar(255) NOT NULL,
  `remark` text NOT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `company`, `category`, `sub_cat`, `remark`, `year`) VALUES
(1, 'Product11', 4, 'Non-Moto Insurance', 'Life Insurance', 'Remark  1', 2023),
(3, 'Product13', 1, 'Motor Insurance', 'Car Insurance', 'Product13', 2023),
(4, 'jij', 4, 'Non-Moto Insurance', 'Life Insurance', 'hbnhbnhjn', 2023),
(5, 'dahfle', 4, 'Non-Moto Insurance', 'Life Insurance', 'fefefe', 2023),
(6, 'Aspen Kelley', 2, 'Motor Insurance', 'Bike Insurance', 'Ut esse dolorem dig', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sub_category_id`, `category_id`, `sub_category`) VALUES
(1, 1, 'Bike Insurance'),
(2, 1, 'Car Insurance'),
(3, 2, 'Health Insurance');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone`, `dob`, `address`, `company`, `email`, `category`, `sub_cat`, `remark`, `email_verified_at`, `password`, `year`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Vaishal', 'Shrimali', '7845129637', NULL, 'Vadodara', 1, NULL, 'Motor Insurance', 'Bike Insurance', 'Hello', NULL, NULL, 2023, NULL, '2023-02-15 06:13:18', '2023-02-15 06:13:18'),
(2, 'Tushar', 'Mohite', '7894561237', '2000-02-15', 'Surat', 4, 'vaishal@gmail.com', 'Non-Moto Insurance', 'Car Insurance', 'Hello1', NULL, NULL, 2023, NULL, '2023-02-15 06:20:12', '2023-02-15 06:20:29'),
(4, 'Raju', 'Solanki', '7845129637', '2001-02-15', 'Surat', 4, 'vaishal@gmail.com', 'Non-Moto Insurance', 'Life Insurance', 'Raju', NULL, NULL, 2023, NULL, '2023-02-15 06:35:02', '2023-02-15 06:35:02'),
(18, 'Carla Watson', 'Neil Mckay', '+1 (468) 408-4019', '2002-05-01', 'Sint elit sit qui', 2, 'vaishal@gmail.com', 'Motor Insurance', 'Bike Insurance', 'Aut fuga Vero paria', NULL, NULL, 2023, NULL, NULL, NULL),
(19, 'Wesley Avery', 'Amanda Horne', '7845129637', NULL, 'Nam excepturi at omn', 1, NULL, 'Motor Insurance', 'Car Insurance', 'Numquam cupidatat ad', NULL, NULL, 2023, NULL, NULL, NULL),
(20, 'Ria Vance', 'Felicia Alvarez', '+1 (143) 427-8193', NULL, 'Numquam in ullamco d', 2, NULL, 'Motor Insurance', 'Bike Insurance', 'Fugiat eveniet vel', NULL, NULL, 2023, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`policie_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `policie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
