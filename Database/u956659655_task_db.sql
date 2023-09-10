-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 10, 2023 at 10:33 AM
-- Server version: 10.6.14-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u956659655_task_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `u_id`, `p_id`, `status`, `date`) VALUES
(1, 3, 15, 'Not Interested', '2023-08-25 12:16:57'),
(2, 3, 17, 'Not Interested', '2023-08-28 17:02:01'),
(3, 9, 18, 'Not Interested', '2023-09-05 04:46:14'),
(4, 15, 19, 'Interested', '2023-09-07 13:54:15'),
(5, 15, 15, 'Interested', '2023-09-07 13:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `budget` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `upload` varchar(255) DEFAULT NULL,
  `deadline` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `category`, `budget`, `description`, `upload`, `deadline`, `status`, `date`) VALUES
(15, 'Web Development', 'Software Developing', 300, 'Hi, You have created good website.', NULL, '2023-08-30', 'Open', '2023-08-25 12:10:20'),
(16, 'Graphic Designing', 'Design & Creative', 70, 'dasd', NULL, '2023-08-31', 'Closed', '2023-08-25 12:53:26'),
(17, 'projec11', 'Data Analytics', 70, 'asd', NULL, '2023-08-30', 'Open', '2023-08-25 19:10:51'),
(18, 'web management', 'IT & Networking', 40, 'wewerf \r\njduic ifj\r\n;lscojui \r\ncinsmclx\r\nrtrtt\r\ntgrt', NULL, '2023-09-08', 'Open', '2023-08-29 03:53:21'),
(19, 'web management12', 'Admin Support', 21, 'eae', '../images/upload/472310-brandon-lam-Dd_7xDCuuUo-unsplash.jpg', '2023-09-05', 'Open', '2023-09-05 18:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `project_skills`
--

CREATE TABLE `project_skills` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_skills`
--

INSERT INTO `project_skills` (`id`, `p_id`, `s_id`) VALUES
(18, 15, 51),
(19, 16, 50),
(24, 17, 50),
(40, 18, 49),
(41, 18, 52),
(54, 19, 50);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `status`) VALUES
(49, 'ui ux', 'active'),
(50, 'angular', 'active'),
(51, 'laravel', 'inactive'),
(52, 'sas', 'active'),
(53, 'asa', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `v_code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `description`, `type`, `password`, `v_code`, `status`) VALUES
(1, 'Admin', 'admin@gmail.com', '923122345662', '', 'admin', '$2y$10$HJf7sh.ud1j6dijYto8//uYigUMXQZvPBtyWh8x6zM1M1y.Mq8V/K', '', 'active'),
(3, 'Musadiq Mustafa', 'm.maazfaisal0302@gmail.com', '923122345662', '', 'user', '$2y$10$SbTy6wTGRY7ISXPH5VjgEunXMwEomH8h8gXdst.B4Fjj9/TFTTUQm', '402247', 'active'),
(4, '123', '123@example.com', '923122345662', '', 'user', '$2y$10$uj5B/9hJw2/lYmBRT/4x2OxYMVbl4VqNanpMRmpFoabPmHqRXAsS6', '', 'active'),
(5, '123', '1234@example.com', '913012453295', '', 'user', '$2y$10$Mp1Z5cJ7/KlHQn9qRRN.F.Uta1P3ZkSGSweqUDIIgjTyiFJtemBmm', '', 'active'),
(6, '321', '321@gmail.com', '447700900381', '', 'user', '$2y$10$VJLbxFD1SOE1phdyl.5m.OIWKQci3uttXcBxfO5PMj5H24SCikjG6', '', 'active'),
(7, '123', '123@example.co', '231223123', '', 'user', '$2y$10$M77A7AMpF.uonyOifxebBe9nXuSWHTpybeqiHpbEyzXHbC/iWEeo6', '', 'active'),
(8, 'maaz', 'admin1@gmail.com', '03122345662', '', 'user', '$2y$10$HJf7sh.ud1j6dijYto8//uYigUMXQZvPBtyWh8x6zM1M1y.Mq8V/K', '', 'active'),
(9, 'sdd', 'extraahour@gmail.com', '97868768760', '', 'user', '1234', '', 'active'),
(10, 'saD', 'AS@GMAIL.COM', '+9231213213312', '', 'user', '$2y$10$ClcL9L7.iGwLR6EwCBHe5ODHee5sWSHPET3FmIu79YTN3zDwqE9QS', '', 'active'),
(11, 'maaz', '123456@example.com', '3702312231232', '', 'user', '$2y$10$1fXwCAzvhfjXnTwATRdb..GxRp2y7KxmT4/S9W6PdB330tksLLjWy', '', 'active'),
(12, 'Maaz', 'iamemmarose1@gmail.com', '923122345662', '', 'user', '$2y$10$jEy2B9WVchqaETOOVhIskuzExCILKZTDZJ9OJfHgfocwuYIvrvgO2', '', 'active'),
(13, '123', 'admin2@gmail.com', '12312321', '', 'user', '$2y$12$xJpUsRtPlks2ahA6srh4PeCgO4eGMqoMRxs/odUV34up4MAo4RJoG', '', 'active'),
(14, 'maaz', 'maaz@gmail.com', '132131', '', 'user', '123', '', 'active'),
(15, 'sinoy', 'rahamatis001@gmail.com', '917356783548', '', 'user', 'rahamatis', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE `user_skills` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_skills`
--

INSERT INTO `user_skills` (`id`, `u_id`, `s_id`) VALUES
(8, 3, 50),
(9, 9, 49),
(10, 9, 50),
(11, 15, 50);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `project_skills`
--
ALTER TABLE `project_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bids_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `projects` (`id`);

--
-- Constraints for table `project_skills`
--
ALTER TABLE `project_skills`
  ADD CONSTRAINT `project_skills_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `project_skills_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `skills` (`id`);

--
-- Constraints for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD CONSTRAINT `user_skills_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `skills` (`id`),
  ADD CONSTRAINT `user_skills_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
