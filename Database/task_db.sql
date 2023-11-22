-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2023 at 04:01 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int NOT NULL,
  `u_id` int NOT NULL,
  `p_id` int NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `budget` int NOT NULL,
  `description` varchar(255) NOT NULL,
  `upload` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `deadline` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `category`, `budget`, `description`, `upload`, `deadline`, `status`, `date`) VALUES
(1, 'Web Development', 'Data Analytics', 100, 'nm', NULL, '2023-07-29', 'Open', '2023-07-28 03:04:58'),
(2, 'First Project', 'Data Analytics', 50, 'dad', NULL, '2023-07-28', 'Open', '2023-07-28 03:13:13'),
(3, 'First Project 2', 'Data Analytics', 50, 'dad', NULL, '2023-07-28', 'Open', '2023-07-28 03:14:14'),
(4, 'Web Development', 'Customer Service', 50, 'sad', NULL, '2023-07-28', 'Open', '2023-07-28 03:17:05'),
(5, 'New Project', 'Data Analytics', 21, 'asd', NULL, '2023-07-28', 'Open', '2023-07-28 03:17:47'),
(6, 'New Project', 'Customer Service', 23, 'das', NULL, '2023-07-28', 'Open', '2023-07-28 03:18:37'),
(7, 'New Project', 'Customer Service', 23, 'das', NULL, '2023-07-28', 'Open', '2023-07-28 03:20:43'),
(8, 'New Project', 'Customer Service', 23, 'das', NULL, '2023-07-28', 'Open', '2023-07-28 03:30:37'),
(9, 'New Project', 'Customer Service', 23, 'das', NULL, '2023-07-28', 'Open', '2023-07-28 03:30:55'),
(10, 'New Project', 'Customer Service', 23, 'das', NULL, '2023-07-28', 'Open', '2023-07-28 03:36:50'),
(11, 'New Project', 'Customer Service', 23, 'das', NULL, '2023-07-28', 'Open', '2023-07-28 03:37:04'),
(12, 'New Project', 'Customer Service', 23, 'das', NULL, '2023-07-28', 'Open', '2023-07-28 03:37:24'),
(13, 'New Project', 'Data Analytics', 23, 'das', NULL, '2023-07-28', 'Open', '2023-07-28 03:52:15'),
(14, 'New Project', 'Data Analytics', 23, 'das', NULL, '2023-07-28', 'Open', '2023-07-28 03:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `project_skills`
--

CREATE TABLE `project_skills` (
  `id` int NOT NULL,
  `p_id` int NOT NULL,
  `s_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `project_skills`
--

INSERT INTO `project_skills` (`id`, `p_id`, `s_id`) VALUES
(1, 1, 46),
(2, 2, 46),
(3, 3, 46),
(4, 4, 46),
(5, 5, 46),
(6, 6, 46),
(7, 7, 46),
(8, 8, 46),
(9, 9, 46),
(10, 10, 46),
(11, 11, 46),
(12, 12, 46),
(13, 13, 46),
(14, 14, 46);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `status`) VALUES
(46, 'ui ux', 'active'),
(47, 'angular', 'active'),
(48, 'laravel', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `description`, `type`, `password`, `status`) VALUES
(1, 'Admin', 'm.maazfaisal0301@gmail.com', '923122345662', '', 'admin', '$2y$10$1d4RBOXS0pUrajg2xyloD.8zKibxQ5mO6PjU7vzixOCwWt1HGTr/W', 'active'),
(2, 'Maaz', 'm.maazfaisal0302@gmail.com', '923122345662', '', 'user', '$2y$10$yCRtHQFAmJjvrVeGSYwD.utrEKolS8lSrY47ETcUd02ke1oV/.suK', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE `user_skills` (
  `id` int NOT NULL,
  `u_id` int NOT NULL,
  `s_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_skills`
--

INSERT INTO `user_skills` (`id`, `u_id`, `s_id`) VALUES
(4, 2, 46);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_skills`
--
ALTER TABLE `project_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `s_id` (`s_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_id` (`s_id`),
  ADD KEY `u_id` (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `project_skills`
--
ALTER TABLE `project_skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `bids_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `projects` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `project_skills`
--
ALTER TABLE `project_skills`
  ADD CONSTRAINT `project_skills_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `projects` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `project_skills_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `skills` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD CONSTRAINT `user_skills_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `skills` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user_skills_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
