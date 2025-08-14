-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2025 at 06:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prepaid`
--

-- --------------------------------------------------------

--
-- Table structure for table `prepaid`
--

CREATE TABLE `prepaid` (
  `id` int(11) NOT NULL,
  `metre_name` varchar(200) NOT NULL,
  `electricity_amount` int(200) NOT NULL,
  `no_unit` int(200) NOT NULL,
  `metre_code` int(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'unused',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prepaid`
--

INSERT INTO `prepaid` (`id`, `metre_name`, `electricity_amount`, `no_unit`, `metre_code`, `status`, `created_at`) VALUES
(1, 'KGY-123', 20000, 20, 591072, 'used', '2025-02-18 11:48:35'),
(2, 'KGY-123', 20000, 20, 6973596, 'used', '2025-02-18 11:50:59'),
(3, 'KGY-123', 20000, 20, 5831290, 'used', '2025-02-21 09:25:31'),
(4, 'BGG-486', 20000, 20, 4853317, 'used', '2025-05-21 19:43:22'),
(5, 'KGY-123', 20000, 20, 1097477, 'used', '2025-05-21 19:48:42'),
(6, 'rrt-876', 23456, 23, 5692620, 'used', '2025-05-21 19:51:33'),
(7, 'BGG-486', 2345600, 2346, 1852531, 'used', '2025-05-21 19:52:48'),
(8, 'BGG-486', 2345600, 2346, 4650242, 'used', '2025-05-21 19:55:38'),
(9, 'BGG-486', 2345600, 2346, 7021923, 'used', '2025-05-21 19:55:38'),
(10, 'BGG-486', 20000, 20, 9138285, 'used', '2025-05-22 15:09:54'),
(11, 'BGG-486', 23456, 23, 9543761, 'used', '2025-05-22 15:13:58'),
(14, 'KGY-123', 23456444, 23456, 4672602, 'unused', '2025-06-04 18:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `used_code`
--

CREATE TABLE `used_code` (
  `id` int(11) NOT NULL,
  `meter_code` int(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `used_code`
--

INSERT INTO `used_code` (`id`, `meter_code`, `created_at`) VALUES
(1, 591072, '2025-02-18 11:51:51'),
(2, 6973596, '2025-02-20 09:24:20'),
(3, 5831290, '2025-05-21 19:42:58'),
(4, 4853317, '2025-05-21 19:43:48'),
(5, 1097477, '2025-05-21 19:50:31'),
(6, 5692620, '2025-05-21 19:51:50'),
(7, 1852531, '2025-05-21 19:53:06'),
(8, 4650242, '2025-05-21 19:56:24'),
(9, 7021923, '2025-05-21 19:57:01'),
(10, 9138285, '2025-05-22 15:10:19'),
(11, 9543761, '2025-05-22 15:14:16'),
(12, 8579028, '2025-05-22 15:34:09'),
(13, 9022705, '2025-05-26 19:49:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prepaid`
--
ALTER TABLE `prepaid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `used_code`
--
ALTER TABLE `used_code`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prepaid`
--
ALTER TABLE `prepaid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `used_code`
--
ALTER TABLE `used_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
