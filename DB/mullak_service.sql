-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2020 at 12:53 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mullak_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `export`
--

CREATE TABLE `export` (
  `e_id` int(11) NOT NULL,
  `e_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `e_amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp(),
  `create_date` date NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `export`
--

INSERT INTO `export` (`e_id`, `e_desc`, `e_amount`, `create_at`, `create_date`, `user_id`) VALUES
(1, 'Salary of the guard', '1000', '2020-02-17 14:01:51', '0000-00-00', 4),
(2, 'Electricity', '500', '2020-02-17 14:49:10', '2020-02-17', 4);

-- --------------------------------------------------------

--
-- Table structure for table `import`
--

CREATE TABLE `import` (
  `i_id` int(11) NOT NULL,
  `i_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `create_date` date NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `import`
--

INSERT INTO `import` (`i_id`, `i_desc`, `amount`, `create_at`, `create_date`, `user_id`) VALUES
(1, 'monthly', 200, '2020-02-17 10:25:30', '0000-00-00', 4),
(2, 'monthly', 200, '2020-02-17 10:26:20', '2020-02-17', 4),
(3, 'emergency', 100, '2020-02-17 10:33:44', '2020-02-17', 4),
(4, 'monthly', 200, '2020-02-17 10:56:13', '2020-02-17', 1),
(5, 'monthly', 200, '2020-02-17 10:56:13', '2020-02-17', 2),
(6, 'monthly', 200, '2020-02-17 10:56:13', '2020-02-17', 3),
(7, 'monthly', 200, '2020-02-17 10:56:13', '2020-02-17', 4),
(8, 'monthly', 200, '2020-02-17 10:56:13', '2020-02-17', 5),
(9, 'emergency', 100, '2020-02-17 11:01:38', '2020-02-17', 1),
(10, 'emergency', 100, '2020-02-17 11:01:38', '2020-02-17', 2),
(11, 'emergency', 100, '2020-02-17 11:01:38', '2020-02-17', 3),
(12, 'emergency', 100, '2020-02-17 11:01:38', '2020-02-17', 4),
(13, 'emergency', 100, '2020-02-17 11:01:38', '2020-02-17', 5),
(15, 'monthly', 200, '2020-02-17 11:46:26', '2020-02-17', 1),
(16, 'monthly', 200, '2020-02-17 11:46:26', '2020-02-17', 2),
(17, 'monthly', 200, '2020-02-17 11:46:27', '2020-02-17', 3),
(18, 'monthly', 200, '2020-02-17 11:46:27', '2020-02-17', 4),
(19, 'monthly', 200, '2020-02-17 11:46:27', '2020-02-17', 5),
(20, 'monthly', 200, '2020-02-17 11:46:45', '2020-02-17', 1),
(21, 'emergency', 300, '2020-02-17 11:46:45', '2020-02-17', 1),
(22, 'monthly', 200, '2020-02-17 11:46:45', '2020-02-17', 2),
(23, 'emergency', 300, '2020-02-17 11:46:45', '2020-02-17', 2),
(24, 'monthly', 200, '2020-02-17 11:46:45', '2020-02-17', 3),
(25, 'emergency', 300, '2020-02-17 11:46:45', '2020-02-17', 3),
(26, 'monthly', 200, '2020-02-17 11:46:45', '2020-02-17', 4),
(27, 'emergency', 300, '2020-02-17 11:46:45', '2020-02-17', 4),
(28, 'monthly', 200, '2020-02-17 11:46:45', '2020-02-17', 5),
(29, 'emergency', 300, '2020-02-17 11:46:45', '2020-02-17', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `home_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `pass`, `is_admin`, `home_no`) VALUES
(1, 'ahmed mohamed', '123456', 1, 2),
(2, 'mohamed mahmoud', '147852', 0, 1),
(3, 'ismail ahmed', '369852', 1, 3),
(4, 'abdelrahman attia', '321456', 0, 4),
(5, 'mahmoud mahmoud', '789654', 0, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `export`
--
ALTER TABLE `export`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `import`
--
ALTER TABLE `import`
  ADD PRIMARY KEY (`i_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `export`
--
ALTER TABLE `export`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `import`
--
ALTER TABLE `import`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `export`
--
ALTER TABLE `export`
  ADD CONSTRAINT `export_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `import`
--
ALTER TABLE `import`
  ADD CONSTRAINT `import_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
