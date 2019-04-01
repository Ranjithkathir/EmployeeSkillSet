-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2019 at 02:16 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employeeskillset`
--

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(10) UNSIGNED NOT NULL,
  `DesignationName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `IsDeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `DesignationName`, `created_at`, `updated_at`, `IsDeleted`) VALUES
(1, 'SOFTWARE ENGINEER TRAINEE', NULL, NULL, 0),
(2, 'SOFTWARE ENGINEER', NULL, NULL, 0),
(3, 'SENIOR SOFTWARE ENGINEER', NULL, NULL, 0),
(4, 'TEAM LEAD', NULL, NULL, 0),
(5, 'ASSOCIATE PROJECT LEAD', NULL, NULL, 0),
(6, 'PROJECT LEAD', NULL, NULL, 0),
(7, 'PROJECT MANAGER', NULL, NULL, 0),
(8, 'MARKETING EXECUTIVE', NULL, NULL, 0),
(9, 'MARKETING HEAD', NULL, NULL, 0),
(10, 'HR', NULL, NULL, 0),
(11, 'HR MANAGER', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `EmployeeNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `Email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `MobileNumber` bigint(20) DEFAULT NULL,
  `Designation` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `DateOfJoin` date DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(190) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `IsDeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `EmployeeNumber`, `Name`, `Email`, `MobileNumber`, `Designation`, `DateOfJoin`, `password`, `remember_token`, `CreatedBy`, `created_at`, `updated_at`, `IsDeleted`) VALUES
(1, 'E0001', 'Robert', 'robert@gmail.com', 7894561233, 2, '2019-03-06', '$2y$10$fR.L23gTNDdshn3Y/QiQy.Y/xuToi5/wlIju1T1XrAWfDrzh.Y.o2', '1Y7tykTJy0WumfR9ZhVxuHwiDKjZ6P9Wk7FcfKURcxGIEr78BXA1i6nsYOo5', 1, '2019-03-05 11:48:38', '2019-03-07 05:25:16', 0),
(2, 'E0002', 'Michaels', 'michael@gmail.com', 7894561232, 1, '2019-03-07', '$2y$10$3ICgsF8lV7m1V99XN1voUu2CMEMwMGqVBMEWh3Zj4Q7Z1jNmDIJhO', '7sadiMElbXO7kCluFlQTEAaJs3eftypfU0ZC7IK4F8EsOcLTkVf7bZI02XDT', 1, '2019-03-05 12:08:06', '2019-03-07 12:21:41', 0),
(3, 'E0003', 'Krishna', 'krishna@gmail.com', 8608660660, 2, '2019-03-05', '$2y$10$eJaoN.RJO5o5fVfR.cTdE.99m4hxAmC2.5SIXiUxXoi7pVdds/hWK', 'a3VuYWxyYmF0aGlqYUBnbWFpbC5jb20jQCQyMDE5LTAzLTA2IDIwOjM1OjM5', 1, '2019-03-06 07:57:09', '2019-03-07 08:56:45', 1),
(4, 'E0004', 'Joe', 'joe@gmail.com', 7418529630, 2, '2019-03-04', '$2y$10$BxsTh00.h3x0saaOA5ZlYuDSkGY8MoiiCj/9P3Yap0h3MzyjtLdkW', 'dw1Us6Kx9UzwJvz0Mk7g4Y6JdHH0a8TB4ESqlOv92GNqsMlcujtSH1imeBTb', 1, '2019-03-06 15:32:57', '2019-03-06 15:32:57', 0),
(5, 'E0005', 'John', 'john@mail.com', 7894561238, 3, '2019-03-01', '$2y$10$Nn.6vI.gK5/JKPKZJ/qr0OGnbB5LHDWjU00U5OZAPV8DT3gJCHD96', NULL, 1, '2019-03-06 15:33:49', '2019-03-06 15:33:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_skills`
--

CREATE TABLE `employee_skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `EmployeeId` int(10) UNSIGNED NOT NULL,
  `SkillId` int(10) UNSIGNED NOT NULL,
  `Rating` int(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_skills`
--

INSERT INTO `employee_skills` (`id`, `EmployeeId`, `SkillId`, `Rating`, `created_at`, `updated_at`) VALUES
(102, 3, 4, 7, '2019-03-06 07:57:37', '2019-03-06 08:29:58'),
(103, 3, 1, 8, '2019-03-06 07:57:47', '2019-03-06 07:57:47'),
(108, 1, 4, 10, '2019-03-06 13:30:53', '2019-03-07 11:15:19'),
(109, 1, 7, 8, '2019-03-06 13:31:19', '2019-03-06 13:31:19'),
(114, 1, 1, 9, '2019-03-07 05:24:58', '2019-03-07 05:24:58');

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
(14, '2019_02_06_111343_create_designations_table', 2),
(15, '2019_02_06_111510_create_employees_table', 2),
(16, '2019_02_07_104116_create_skills_table', 2),
(17, '2019_02_07_104248_create_employee_skills_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('joy@gmail.com', '$2y$10$X3rTwHJDR6wh5152cYU8SO4eqOE9b9szJ/zVq9sSKe0BuTaiWmRei', '2019-02-13 07:46:28'),
('ranjithkathir97@gmail.com', '$2y$10$REVkYCa.j5FUQ6raXw5vi.D4aJCCi4N5vP5gexuVVmh/SQMUqnOLq', '2019-02-13 09:29:43'),
('admin@gmail.com', '$2y$10$11q7X1djIT1RAQYryBexxeOGlYFsDuByyJWha/LBaEo3F5rJEh5kC', '2019-03-06 11:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `Skills` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `IsDeleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `Skills`, `created_at`, `updated_at`, `IsDeleted`) VALUES
(1, 'CorePHP', NULL, NULL, 0),
(2, 'Cake PHP', NULL, NULL, 0),
(3, 'CodeIgnitor', NULL, NULL, 0),
(4, 'Laravel', NULL, NULL, 0),
(5, 'Symfony', NULL, NULL, 0),
(6, 'Magento', NULL, NULL, 0),
(7, 'Drupal', NULL, NULL, 0),
(8, 'Wordpress', NULL, NULL, 0),
(9, 'Jquery', NULL, NULL, 0),
(10, 'ReactJS', '2019-02-14 06:17:13', '2019-02-14 06:17:13', 0),
(11, 'nodeJS', '2019-02-14 08:25:23', '2019-02-14 08:25:23', 0),
(12, 'Joomla', '2019-02-15 05:41:16', '2019-02-15 05:41:16', 0),
(13, 'Xamarin', '2019-02-15 05:42:13', '2019-02-15 05:42:13', 0),
(14, 'Swift', '2019-02-15 05:44:05', '2019-02-15 05:44:05', 0),
(15, 'VueJS', '2019-02-15 05:45:12', '2019-02-15 05:45:12', 0),
(16, 'React Native', '2019-02-15 05:48:17', '2019-02-15 05:48:17', 0),
(17, 'MangoDB', '2019-02-15 05:49:58', '2019-02-15 05:49:58', 0),
(18, 'zend', '2019-02-15 09:25:13', '2019-02-15 09:25:13', 0),
(19, 'Fuel PHP', '2019-02-15 09:41:44', '2019-02-15 09:41:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IsAdmin` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `IsAdmin`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '0000-00-00 00:00:00', '$2y$10$F93WhvlbLPIo1SvXCaIkruvgsx78whRuZ38jr4bqd1YdQv9/cGEf.', 'jL4qWdQXeMsItLimKVtWr4laQMPfCVxaJEuq7kCy0sweA2rjoVDcLqM6A5XN', 1, '2019-03-05 10:44:38', '2019-03-07 12:18:46'),
(2, 'Administrator', 'admin2@gmail.com', NULL, '$2y$10$5Pogd/bycqZk6.TSlvdFxOOHfU4G1u0aav0P0uCBL6HOe9123rS2K', 'ZyfdqieQretfhKmzrMjnfbFWLEVe1M1URummoLHy9I91rsROzAeqJl6wqldw', 1, '2019-03-06 07:48:48', '2019-03-06 09:49:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_designationname_unique` (`DesignationName`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `fk_DesignationId` (`Designation`);

--
-- Indexes for table `employee_skills`
--
ALTER TABLE `employee_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_EmployeesId` (`EmployeeId`),
  ADD KEY `fk_SkillsId` (`SkillId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `skills_skills_unique` (`Skills`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee_skills`
--
ALTER TABLE `employee_skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `fk_DesignationId` FOREIGN KEY (`Designation`) REFERENCES `designations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_skills`
--
ALTER TABLE `employee_skills`
  ADD CONSTRAINT `fk_EmployeesId` FOREIGN KEY (`EmployeeId`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_SkillsId` FOREIGN KEY (`SkillId`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
