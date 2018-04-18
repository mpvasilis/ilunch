-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 17 Απρ 2018 στις 07:27:46
-- Έκδοση διακομιστή: 10.1.24-MariaDB
-- Έκδοση PHP: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `ilunch`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `announcements`
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
-- Άδειασμα δεδομένων του πίνακα `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `content`, `show_until`, `created_at`, `updated_at`, `created_by`, `type`) VALUES
(31, 'fgdgfd', 'gdfgdf', '2018-04-04', '2018-04-16', '2018-04-16', NULL, '2');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` text NOT NULL,
  `university` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `student_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 11, 'fdfdfd', '2017-04-02 10:51:23', '2017-04-02 10:51:23'),
(2, 1, 'fdfdfd', '2017-04-02 10:52:44', '2017-04-02 10:52:44'),
(3, 11, '12121212121', '2017-04-02 10:56:18', '2017-04-02 10:56:18');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `memberships`
--

CREATE TABLE `memberships` (
  `id` binary(1) NOT NULL,
  `title` text NOT NULL,
  `type_id` int(11) NOT NULL,
  `breakfast` tinyint(1) NOT NULL,
  `lunch` tinyint(1) NOT NULL,
  `dinner` tinyint(1) NOT NULL,
  `created_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `membership_assigns`
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
-- Δομή πίνακα για τον πίνακα `membership_types`
--

CREATE TABLE `membership_types` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `value` int(11) NOT NULL,
  `expires` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `week` tinyint(1) NOT NULL,
  `day_start` date NOT NULL,
  `day_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `menus`
--

INSERT INTO `menus` (`id`, `day`, `week`, `day_start`, `day_end`) VALUES
(1, 1, 1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `menu_assigns`
--

CREATE TABLE `menu_assigns` (
  `id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `menu_assigns`
--

INSERT INTO `menu_assigns` (`id`, `meal_id`, `menu_id`, `type`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 2),
(3, 3, 1, 3);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `menu_meals`
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
-- Άδειασμα δεδομένων του πίνακα `menu_meals`
--

INSERT INTO `menu_meals` (`id`, `title`, `info`, `is_active`, `type_id`, `updated_at`, `created_at`) VALUES
(1, 'Αυγά Βραστάa', 'δφδσφφδσ', 1, 2, '2018-04-16', '0000-00-00'),
(2, 'Παστιτσιο', 'σφδσφ', 1, 2, '0000-00-00', '0000-00-00'),
(3, 'μακαρόνια', 'φδσφσδ', 1, 3, '0000-00-00', '0000-00-00'),
(4, 'dsffds', 'fdssd', 0, 0, '2018-04-16', '2018-04-16'),
(5, 'dsaads', 'dsffdsdsf', 0, 2, '2018-04-16', '2018-04-16'),
(6, 'dsaads', 'dsffdsdsf', 0, 2, '2018-04-16', '2018-04-16'),
(7, 'dsaads', 'dsffdsdfsdfdssf', 0, 2, '2018-04-16', '2018-04-16');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `menu_types`
--

CREATE TABLE `menu_types` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `menu_types`
--

INSERT INTO `menu_types` (`id`, `title`, `time_start`, `time_end`) VALUES
(1, 'Πρωνό', '07:00:00', '09:00:00'),
(2, 'Μεσημεριανό', '12:00:00', '15:30:00'),
(3, 'Βραδυνό', '18:00:00', '21:00:00');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `ratings`
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
-- Δομή πίνακα για τον πίνακα `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `setting` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `settings`
--

INSERT INTO `settings` (`id`, `setting`, `value`) VALUES
(1, 'time_counter', '1');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `statistics`
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
-- Δομή πίνακα για τον πίνακα `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `AM` int(11) NOT NULL,
  `AEM` int(11) NOT NULL,
  `fistname` text NOT NULL,
  `lastname` binary(1) NOT NULL,
  `father_name` text NOT NULL,
  `photo` varchar(75) NOT NULL DEFAULT '/images/default.png',
  `department_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
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
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `role`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 'Sarantis', 'i@sarantis.pw', '$2y$10$AF1p0HaulDq.nFLJ0Q2Oc.P5oJfEvz2VqOEu4I69DUl2/ms1wp8/G', 'dfYytInmpY67ZryjLR3ehEeRgC2Jkx7CBlHXrFmKPcBNCRGjhLSYzxv2vuwv', 'ADMINISTRATOR', 1069, '2017-03-28 01:49:24', '2017-03-28 01:49:24'),
(2, 'Alex', 'modis.alex@gmail.com', '$2y$10$FHJ8J0FEKWAnYjQ62ObCtOIPqmLWl/8tVLAQbRsoFuxZMMgH3Yo4y', NULL, 'ADMINISTRATOR', NULL, '2017-04-01 11:29:08', '2017-04-01 11:29:08');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memberships_fk0` (`type_id`);

--
-- Ευρετήρια για πίνακα `membership_assigns`
--
ALTER TABLE `membership_assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `membership_assigns_fk0` (`students_id`);

--
-- Ευρετήρια για πίνακα `membership_types`
--
ALTER TABLE `membership_types`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `menu_assigns`
--
ALTER TABLE `menu_assigns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meal_id` (`meal_id`),
  ADD KEY `menu_id` (`menu_id`),
  ADD KEY `type` (`type`);

--
-- Ευρετήρια για πίνακα `menu_meals`
--
ALTER TABLE `menu_meals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Ευρετήρια για πίνακα `menu_types`
--
ALTER TABLE `menu_types`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_fk0` (`department_id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT για πίνακα `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT για πίνακα `menu_assigns`
--
ALTER TABLE `menu_assigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT για πίνακα `menu_meals`
--
ALTER TABLE `menu_meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT για πίνακα `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT για πίνακα `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `memberships`
--
ALTER TABLE `memberships`
  ADD CONSTRAINT `memberships_fk0` FOREIGN KEY (`type_id`) REFERENCES `membership_types` (`id`);

--
-- Περιορισμοί για πίνακα `membership_assigns`
--
ALTER TABLE `membership_assigns`
  ADD CONSTRAINT `membership_assigns_fk0` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`);

--
-- Περιορισμοί για πίνακα `menu_assigns`
--
ALTER TABLE `menu_assigns`
  ADD CONSTRAINT `menu_assigns_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `menu_assigns_ibfk_3` FOREIGN KEY (`type`) REFERENCES `menu_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Περιορισμοί για πίνακα `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_fk0` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
