-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2023 at 01:46 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fcai_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` bigint(20) UNSIGNED NOT NULL,
  `to` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `attachment_path` varchar(255) DEFAULT NULL,
  `seen` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from`, `to`, `message`, `created_at`, `updated_at`, `attachment_path`, `seen`) VALUES
(174, 7, 3, 'iman to ali', '2023-07-03 06:32:27', '2023-07-03 06:32:27', NULL, '1'),
(176, 12, 3, 'dina to ali', '2023-07-03 06:33:08', '2023-07-03 06:33:08', NULL, '1'),
(177, 3, 7, 'ho', '2023-07-03 08:15:14', '2023-07-03 08:15:14', NULL, '0'),
(178, 3, 7, 'hi dr. iman', '2023-07-03 08:34:08', '2023-07-03 08:34:08', NULL, '0'),
(179, 3, 7, 'hi dr', '2023-07-03 08:35:07', '2023-07-03 08:35:07', NULL, '0'),
(180, 3, 7, 'hi', '2023-07-03 08:37:18', '2023-07-03 08:37:18', NULL, '0'),
(181, 3, 7, 'hi', '2023-07-03 08:37:51', '2023-07-03 08:37:51', NULL, '0'),
(182, 3, 10, 'hi dr. Ayman', '2023-07-03 08:40:30', '2023-07-03 08:40:30', NULL, '1'),
(183, 3, 14, 'ali to mohamed', '2023-07-03 08:44:21', '2023-07-03 08:44:21', NULL, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_from_foreign` (`from`),
  ADD KEY `messages_to_foreign` (`to`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
