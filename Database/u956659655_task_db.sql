-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2023 at 07:06 PM
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
(7, 25, 24, 'Interested', '2023-10-15 13:01:06'),
(8, 26, 22, 'Interested', '2023-10-15 13:31:03'),
(9, 27, 24, 'Interested', '2023-10-15 13:42:50'),
(10, 27, 22, 'Interested', '2023-10-15 13:43:06'),
(11, 30, 23, 'Interested', '2023-10-15 16:31:39'),
(12, 28, 22, 'Not Interested', '2023-10-15 17:30:38');

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
(20, 'web ', 'Software Developing', 25, 'TASk', NULL, '2023-09-14', 'Closed', '2023-09-14 15:39:16'),
(21, 'Logo', 'Design & Creative', 10, 'logo', NULL, '2023-09-14', 'Closed', '2023-09-14 15:39:48'),
(22, 'business management writing', 'Writing', 20, 'check guidelines al details added', '../images/upload/697145-MBA651_T2_2021_Assessment_01_Webinar_v01_Managing_Service_based_Industries.pdf', '2023-10-19', 'Open', '2023-10-15 07:34:11'),
(23, 'java coding', 'Software Developing', 40, 'all details provided in pdf', '../images/upload/252564-ITC561_202330_SM_I-version_1.pdf', '2023-10-19', 'Open', '2023-10-15 07:36:09'),
(24, 'version control change management', 'IT & Networking', 50, 'version control management', NULL, '2023-10-15', 'Open', '2023-10-15 08:04:42');

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
(55, 20, 54),
(56, 21, 55),
(57, 22, 84),
(58, 22, 92),
(59, 23, 89),
(60, 23, 86),
(61, 24, 86),
(62, 24, 87);

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
(54, 'react', 'active'),
(55, 'laravel', 'active'),
(56, 'ass', 'inactive'),
(57, 'asdw', 'inactive'),
(58, 'wedw', 'inactive'),
(59, 'qww', 'inactive'),
(60, 'qqq', 'inactive'),
(61, 'qqq', 'inactive'),
(62, 'aaa', 'inactive'),
(63, 'ddd', 'inactive'),
(64, 'ccc', 'inactive'),
(65, 'qwew', 'inactive'),
(66, 'wqwqd', 'inactive'),
(67, 'wedc', 'inactive'),
(68, 'wedwed', 'inactive'),
(69, 'wferf', 'inactive'),
(70, 'dwed', 'inactive'),
(71, 'ewdew', 'inactive'),
(72, 'dewd', 'inactive'),
(73, 'ede', 'inactive'),
(74, 'wede', 'inactive'),
(75, 'cc', 'inactive'),
(76, 'www', 'inactive'),
(77, 'qwqq', 'inactive'),
(78, 'ddd', 'inactive'),
(79, 'aaa', 'inactive'),
(80, 'hyh', 'inactive'),
(81, 'hyh', 'inactive'),
(82, 'hyh', 'inactive'),
(83, 'hyh', 'inactive'),
(84, 'report writing', 'active'),
(85, 'technical report writing', 'active'),
(86, 'computer science', 'active'),
(87, 'it', 'active'),
(88, 'networking', 'active'),
(89, 'java', 'active'),
(90, 'law', 'active'),
(91, 'international law', 'active'),
(92, 'business management', 'active'),
(93, 'python', 'active'),
(94, 'oracle', 'active'),
(95, 'database managent', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `v_code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `mobile`, `description`, `type`, `password`, `v_code`, `status`, `date`) VALUES
(1, 'Admin', 'admin@gmail.com', '923122345662', '', '', 'admin', '$2y$10$o4EECh/lK5MaHU708.OMDO9.AwZ6fn6k44rJLgiTLpDx09.d7lZhW', '', 'active', '2023-09-16'),
(19, 'senio', 'rahamatis001@gmail.com', '447678786712', '', '', 'user', '$2y$10$vCqudbDEsxaodEz9n9cXIu.VPC3EA0SpfBH8k.byzBWd9UcNf9TW6', '', 'active', '2023-09-29'),
(24, 'Muhammad Maaz', 'm.maazfaisal0302@gmail.com', '923122345662', '923122345662', '', 'user', '$2y$10$o4EECh/lK5MaHU708.OMDO9.AwZ6fn6k44rJLgiTLpDx09.d7lZhW', '165101', 'active', '2023-10-09'),
(25, 'karthika mohankumar', 'nikitapillai5@gmail.com', '917356783548', '17356783548', '', 'user', '$2y$10$srcZ5RB6L3yVM0YoxV0Nye5LXTVJ3sk7/IaIHjJ94WRfUzRWxk9U.', '471718', 'active', '2023-10-15'),
(26, 'Elizaphan Ndiritu', 'erlizaphanndiritu9@gmail.com', '254795677957', '254795677957', 'Welcome to my profile!\r\n\r\nMy name is Elizaphan, and I am a skilled Article Writer, Product Reviews Writer,  Blog Post Writer, and Academic Research Writer with years of expertise in the field. Through my passion for words and meticulous research skills, ', 'user', '$2y$10$LXy4DGc5ZMoecNe8OQ0l9.ncQ9c6jPKYgtqysLe2i2D8kpwOPLqvy', '', 'active', '2023-10-15'),
(27, 'Academic Writing Consultancy', 'starphanie01@gmail.com', '1208 905 4129', '1208 905 4129', ' I am a skilled Article Writer, Product Reviews Writer,  Blog Post Writer, and Academic Research Writer with years of expertise in the field. Through my passion for words and meticulous research skills, ', 'user', '$2y$10$hgvS2dG4NYezm9At6Imyb.F1dBGET.OFmmJcjl.iRIewApH8vRZfK', '', 'active', '2023-10-15'),
(28, 'Asim Zahid', 'zasim864@gmail.com', '96871179046', '96871179046', 'An expert technical content writer with experience of more than 3 years as a freelancer. \r\nExpert knowledge of academic writing. ', 'user', '$2y$10$k2fX86.vksTAqnacMb2HLOzFj42lv9TSAzJHKYrzd8y4RqT4Erhju', '', 'active', '2023-10-15'),
(29, 'Raina Faye Garingarao', 'rainafg.work@gmail.com', '639198071103', '639198071103', '', 'user', '$2y$10$bmwaC.7O4rI.eVaLRQ2F8OmWD/M5hDj0YUfjsXQkn9gnMTTbxKY7S', '', 'active', '2023-10-15'),
(30, 'Junaid Ahmed ', 'engr1junaid@gmail.com', '923406976313', '923406976313', '', 'user', '$2y$10$kfgsOk0d/ENK82Zq7anpFeNqAu.fmrqPMrY3lNDdVS.GbTjoQWHkq', '', 'active', '2023-10-15'),
(31, 'Esther Karimi Githiomi ', 'karimigithiomi45@gmail.com', '254740198947', '254740198947', '', 'user', '$2y$10$ju/cWh8ivTjOx9Y39UbOqOTNLNsNbYCV7V/4JOP.SYYOnu8CZ7wDe', '', 'active', '2023-10-15'),
(32, 'Ibsen Hanoj', 'mirangine018@gmail.com', '254718675762', '254729288238', 'I am compassionate in research writing which overwhelms my zeal to write, analyze and critique. I have a vast array of skills which include, compelling content, expert writing solutions, spot-on catalyst for SEO, interactive content, data entry.', 'user', '$2y$10$8VKWpQHgvr8XBNnHi435NOHLzPRUOXiQUZZ8z8QQD63umka.qzoBe', '', 'active', '2023-10-15'),
(33, 'Aimen Farooq', 'aimenfarooq8@gmail.com', '923009897529', '923009897529', '', 'user', '$2y$10$2OUcTmYWGH9lbpqLBtRpwe6CKHkSxU7loxJBYDf27LUpTvsKrAlta', '', 'active', '2023-10-15'),
(34, 'Ahmed Muhammad Shaikh ', 'ahmedmunim2000.am2@gmail.com', '16147430077', '16147430077', '', 'user', '$2y$10$QL.Ck6OtgDFpvJ8vcjl8i.Ram7Dalzdh35m0MBEeHntW0C8zeJOKC', '', 'active', '2023-10-16'),
(35, 'Aruthra R', 'aruthra.rutz@gmail.com', '109361937347', '109361937347', '', 'user', '$2y$10$gbxJ4eIPNcpHkCiKpZ8ZH.2gEye8KO4Zx5mBUNOMhbB3MPjij6JnK', '', 'active', '2023-10-17');

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
(57, 19, 95),
(73, 26, 84),
(74, 26, 85),
(75, 26, 92),
(76, 27, 55),
(77, 27, 84),
(78, 27, 85),
(79, 27, 86),
(80, 27, 87),
(81, 27, 88),
(82, 27, 91),
(83, 27, 92),
(84, 27, 95),
(85, 29, 95),
(86, 30, 85),
(87, 30, 86),
(88, 30, 87),
(89, 30, 88),
(90, 30, 89),
(91, 30, 92),
(92, 30, 93),
(93, 31, 84),
(94, 31, 85),
(95, 31, 91),
(96, 31, 92),
(97, 32, 84),
(98, 32, 85),
(99, 32, 86),
(100, 32, 92),
(101, 28, 84),
(102, 28, 85),
(103, 33, 86),
(104, 33, 92),
(105, 25, 84),
(106, 25, 85),
(107, 25, 86),
(108, 25, 92),
(111, 24, 86);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `project_skills`
--
ALTER TABLE `project_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

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
