-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2018 at 11:18 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ilunch`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(75) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_bin,
  `show_until` date DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `content`, `show_until`, `created_at`, `updated_at`, `created_by`, `type`) VALUES
(32, 'Δωρεάν Φαγητό μέχρι τις 122', 'Θα υπάρχει δωρεάν φαγητό', '2018-04-18', '2018-04-17', '2018-04-17', 1, '2'),
(33, 'Δωρεάν Φαγητό μέχρι τις 12', 'Θα υπάρχει δωρεάν φαγητό', '2018-04-18', '2018-04-17', '2018-04-17', 1, '2'),
(34, 'Έγινε κάτι σημαντικό και πρέπει να το ξέρετε', 'οχι πλακα κάνω', '2018-06-30', '2018-06-18', '2018-06-18', 2, '0'),
(35, 'Έγινε κάτι σημαντικό και πρέπει να το ξέρετε', 'Έγινε κάτι σημαντικό και πρέπει να το ξέρετε', '2018-06-30', '2018-06-18', '2018-06-18', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` text NOT NULL,
  `university` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `university`) VALUES
(1, 'ICTE', 'UOWM\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `student_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 11, 'fdfdfd', '2017-04-02 10:51:23', '2017-04-02 10:51:23'),
(2, 1, 'fdfdfd', '2017-04-02 10:52:44', '2017-04-02 10:52:44'),
(3, 11, '12121212121', '2017-04-02 10:56:18', '2017-04-02 10:56:18'),
(4, NULL, '_token', '2018-06-15 22:52:14', '2018-06-15 22:52:14'),
(5, 1, 'sarantis', '2018-06-15 22:59:09', '2018-06-15 22:59:09'),
(6, 1, 'sarantis', '2018-06-15 22:59:53', '2018-06-15 22:59:53'),
(7, NULL, 'Very Good!', '2018-06-15 23:36:05', '2018-06-15 23:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `student_id`, `date`, `type`) VALUES
(1, 1, '2018-04-04 13:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `type_id` int(11) NOT NULL,
  `breakfast` tinyint(1) NOT NULL,
  `lunch` tinyint(1) NOT NULL,
  `dinner` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `title`, `type_id`, `breakfast`, `lunch`, `dinner`, `created_at`, `created_by`, `is_active`) VALUES
(1, 'Monthly No Breakfast', 1, 0, 1, 1, '2018-06-18 21:07:32', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `membership_assigns`
--

CREATE TABLE `membership_assigns` (
  `id` int(11) NOT NULL,
  `students_id` int(11) NOT NULL,
  `membership_id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `membership_types`
--

CREATE TABLE `membership_types` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `membership_types`
--

INSERT INTO `membership_types` (`id`, `type`, `value`) VALUES
(1, 'NONE', 0),
(2, 'DAYS', 30),
(3, 'VISITS', 80),
(4, 'DAYS', 7);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `week` tinyint(1) NOT NULL,
  `day_start` date NOT NULL,
  `day_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `day`, `week`, `day_start`, `day_end`) VALUES
(1, 1, 1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `menu_assigns`
--

CREATE TABLE `menu_assigns` (
  `id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_assigns`
--

INSERT INTO `menu_assigns` (`id`, `meal_id`, `menu_id`, `type`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 2),
(3, 3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `menu_meals`
--

CREATE TABLE `menu_meals` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `info` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `type_id` tinyint(1) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_meals`
--

INSERT INTO `menu_meals` (`id`, `title`, `info`, `is_active`, `type_id`, `updated_at`, `created_at`) VALUES
(1, 'Αυγά Βραστά', 'δφδσφφδσ', 1, 1, '0000-00-00', '0000-00-00'),
(2, 'Παστιτσιο', 'σφδσφ', 1, 2, '0000-00-00', '0000-00-00'),
(3, 'μακαρόνια', 'φδσφσδ', 1, 3, '0000-00-00', '0000-00-00'),
(4, 'dsffds', 'fdssd', 0, 1, '2018-04-16', '2018-04-16'),
(5, 'dsaads', 'dsffdsdsf', 0, 2, '2018-04-16', '2018-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `menu_types`
--

CREATE TABLE `menu_types` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_types`
--

INSERT INTO `menu_types` (`id`, `title`, `time_start`, `time_end`) VALUES
(1, 'Πρωνό', '07:00:00', '09:00:00'),
(2, 'Μεσημεριανό', '12:00:00', '15:30:00'),
(3, 'Βραδυνό', '18:00:00', '21:00:00');

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
('i@sarantis.pw', '$2y$10$m2y5nCCVo/bsQU2WToaQGO9yglh15UBeyGSDLmtdMxutmJ2bPUsSy', '2018-06-15 23:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text,
  `student_id` int(11) DEFAULT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting`, `value`) VALUES
(1, 'time_counter', '1');

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `membership_id` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `aem` int(11) NOT NULL,
  `firstname` text CHARACTER SET utf8,
  `lastname` text CHARACTER SET utf8,
  `father_name` text CHARACTER SET utf8,
  `photo` varchar(75) CHARACTER SET utf8 NOT NULL DEFAULT 'assets/images/profilePlaceholder.jpg',
  `department_id` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `aem`, `firstname`, `lastname`, `father_name`, `photo`, `department_id`, `semester`, `created_at`) VALUES
(1, 155, 'Alex', 'Modis', 'Modis', 'assets/images/profilePlaceholder.jpg	', 1, 1, '2018-04-09 21:00:00'),
(2, 1069, 'Christos', 'Sarantis', 'Dimitrios', 'assets/images/profilePlaceholder.jpg	', 1, 6, '2018-04-09 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('ADMINISTRATOR','STAFF','STUDENT_CARE','STUDENT') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `role`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 'Sarantis', 'i@sarantis.pw', '$2y$10$AF1p0HaulDq.nFLJ0Q2Oc.P5oJfEvz2VqOEu4I69DUl2/ms1wp8/G', 'K3KmPII1DnoFrA8kQghONaMs5reEWCLJV4QrtURgv6NaBscoYujS8UYDh2Av', 'ADMINISTRATOR', 1069, '2017-03-28 01:49:24', '2017-03-28 01:49:24'),
(2, 'Alex', 'modis.alex@gmail.com', '$2y$10$FHJ8J0FEKWAnYjQ62ObCtOIPqmLWl/8tVLAQbRsoFuxZMMgH3Yo4y', NULL, 'ADMINISTRATOR', NULL, '2017-04-01 11:29:08', '2017-04-01 11:29:08'),
(4, 'Christos Sarantis', 'c.sarantis@yahoo.gr', '$2y$10$fVjFgNFHuOinrwwTskV9becHHGaWdOYIzQ1q8c024SwDXmpON5qUW', 'IUveNDKz3WDmHFpoIa0kktyO5PZ4oD5VZ0y9rXLaUQ3wLicGq3ta7j2SBkTk', 'STUDENT', 1066, '2018-06-15 23:29:25', '2018-06-15 23:29:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memberships_fk0` (`type_id`);

--
-- Indexes for table `membership_assigns`
--
ALTER TABLE `membership_assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `membership_assigns_fk0` (`students_id`);

--
-- Indexes for table `membership_types`
--
ALTER TABLE `membership_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_assigns`
--
ALTER TABLE `menu_assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meal_id` (`meal_id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `menu_meals`
--
ALTER TABLE `menu_meals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Indexes for table `menu_types`
--
ALTER TABLE `menu_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_fk0` (`department_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `membership_types`
--
ALTER TABLE `membership_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu_assigns`
--
ALTER TABLE `menu_assigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menu_meals`
--
ALTER TABLE `menu_meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `memberships`
--
ALTER TABLE `memberships`
  ADD CONSTRAINT `memberships_fk0` FOREIGN KEY (`type_id`) REFERENCES `membership_types` (`id`);

--
-- Constraints for table `membership_assigns`
--
ALTER TABLE `membership_assigns`
  ADD CONSTRAINT `membership_assigns_fk0` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `menu_assigns`
--
ALTER TABLE `menu_assigns`
  ADD CONSTRAINT `menu_assigns_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `menu_assigns_ibfk_3` FOREIGN KEY (`type`) REFERENCES `menu_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_fk0` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
