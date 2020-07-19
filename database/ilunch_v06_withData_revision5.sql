-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 25 Απρ 2019 στις 23:31:11
-- Έκδοση διακομιστή: 10.1.32-MariaDB
-- Έκδοση PHP: 5.6.36

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
(36, 'Καλή μας Αρχή', 'Το νέο website της επιτροπής σήτισης του Πανεπιστήμιου Δυτικής Μακεδονίας είναι γεγονός!', '2019-05-04', '2019-02-17', '2019-02-17', 2, '0');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` text NOT NULL,
  `university` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `university`) VALUES
(1, 'ICTE', 'UOWM\r\n');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `facillities`
--

CREATE TABLE `facillities` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `info` varchar(500) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `facillities`
--

INSERT INTO `facillities` (`id`, `title`, `info`, `is_active`, `created_at`) VALUES
(1, '4545', '4545', 1, '2019-04-10 00:00:00'),
(2, 'fsdfs', 'dsfsfd', 1, '2019-04-21 17:50:31');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `memberships`
--

CREATE TABLE `memberships` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 NOT NULL,
  `type_id` int(11) NOT NULL,
  `breakfast` tinyint(1) NOT NULL,
  `lunch` tinyint(1) NOT NULL,
  `dinner` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `memberships`
--

INSERT INTO `memberships` (`id`, `title`, `type_id`, `breakfast`, `lunch`, `dinner`, `created_at`, `created_by`, `is_active`) VALUES
(1, 'PAYMENT', 1, 1, 1, 1, '2018-06-18 23:16:59', 1, 0),
(2, 'Clara Bella', 2, 1, 1, 0, '2018-06-18 22:29:16', 1, 1),
(3, 'No Dinner Week', 4, 1, 0, 1, '2018-06-18 22:32:17', 1, 1),
(4, '10 Days Of Breakfast', 5, 1, 0, 0, '2018-06-18 22:37:43', 1, 1),
(5, 'Δωρεάν Σίτιση Χειμερινό 2018', 6, 1, 1, 1, '2018-06-18 23:03:49', 1, 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `membership_assigns`
--

CREATE TABLE `membership_assigns` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `membership_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `membership_assigns`
--

INSERT INTO `membership_assigns` (`id`, `student_id`, `membership_id`, `created_at`, `created_by`) VALUES
(4, 2, 3, '2018-06-19 10:00:08', 1),
(6, 2, 3, '2018-12-29 17:32:49', 2),
(8, 1, 2, '2019-02-17 17:14:22', 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `membership_types`
--

CREATE TABLE `membership_types` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Άδειασμα δεδομένων του πίνακα `membership_types`
--

INSERT INTO `membership_types` (`id`, `type`, `value`) VALUES
(1, 'NONE', '0'),
(2, 'DAYS', '30'),
(3, 'VISITS', '80'),
(4, 'DAYS', '7'),
(5, 'VISITS', '10'),
(6, 'UNTIL', '10/01/2019');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `week` int(11) NOT NULL,
  `facility_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `menus`
--

INSERT INTO `menus` (`id`, `day`, `week`, `facility_id`) VALUES
(6, 1, 1, 1),
(7, 2, 1, 1),
(8, 3, 1, 1),
(9, 4, 1, 1),
(10, 5, 1, 1),
(11, 6, 1, 1),
(12, 7, 1, 1),
(13, 1, 1, 2),
(14, 2, 1, 2),
(15, 3, 1, 2),
(16, 4, 1, 2),
(17, 5, 1, 2),
(18, 6, 1, 2),
(19, 7, 1, 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `menu_assigns`
--

CREATE TABLE `menu_assigns` (
  `id` int(11) NOT NULL,
  `meal_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `menu_assigns`
--

INSERT INTO `menu_assigns` (`id`, `meal_id`, `menu_id`, `type_id`) VALUES
(42, 66, 6, 2),
(43, 67, 6, 2),
(44, 68, 6, 2),
(45, 69, 6, 3),
(46, 70, 6, 3),
(47, 71, 7, 2),
(48, 72, 7, 2),
(49, 73, 7, 2),
(50, 74, 7, 3),
(51, 75, 7, 3),
(52, 76, 8, 2),
(53, 77, 8, 2),
(54, 78, 8, 2),
(55, 79, 8, 3),
(56, 80, 8, 3),
(57, 81, 9, 2),
(58, 82, 9, 2),
(59, 83, 9, 2),
(60, 84, 9, 3),
(61, 85, 9, 3),
(62, 86, 10, 2),
(63, 87, 10, 2),
(64, 88, 10, 2),
(65, 89, 10, 3),
(66, 90, 10, 3),
(67, 91, 11, 2),
(68, 92, 11, 2),
(69, 93, 11, 2),
(70, 94, 11, 3),
(71, 95, 11, 3),
(72, 96, 12, 2),
(73, 97, 12, 2),
(74, 98, 12, 2),
(75, 99, 12, 3),
(76, 100, 12, 3),
(77, 101, 6, 1),
(79, 103, 6, 1),
(80, 101, 7, 1),
(81, 102, 7, 1),
(82, 103, 7, 1),
(83, 101, 8, 1),
(84, 102, 8, 1),
(85, 103, 8, 1),
(86, 101, 9, 1),
(87, 102, 9, 1),
(88, 103, 9, 1),
(89, 101, 10, 1),
(90, 102, 10, 1),
(91, 103, 10, 1),
(92, 101, 11, 1),
(93, 102, 11, 1),
(94, 103, 11, 1),
(113, 101, 12, 1),
(114, 102, 12, 1),
(115, 103, 12, 1),
(117, 102, 6, 1),
(118, 91, 13, 2);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `menu_meals`
--

CREATE TABLE `menu_meals` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `info` text CHARACTER SET utf8 COLLATE utf8_bin,
  `is_active` tinyint(1) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `menu_meals`
--

INSERT INTO `menu_meals` (`id`, `title`, `info`, `is_active`, `updated_at`, `created_at`) VALUES
(66, 'Ψάρι κατεψυγμένο με πατάτες φούρνου', NULL, 1, '2019-02-17', '2019-02-17'),
(67, 'Ψάρι νωπό τηγανιτό με πατατοσαλάτα', NULL, 1, '2019-02-17', '2019-02-17'),
(68, 'Ψάρόσουπα', NULL, 1, '2019-02-17', '2019-02-17'),
(69, 'Σουτζουκάκια με χυλοπίτες', NULL, 1, '2019-02-17', '2019-02-17'),
(70, 'Μακαρόνια με κιμά', NULL, 1, '2019-02-17', '2019-02-17'),
(71, 'Μοσχάρι γιουβέτσι', NULL, 1, '2019-02-17', '2019-02-17'),
(72, 'Κοτόπουλο κοκκινιστό με ζυμαρικά', NULL, 1, '2019-02-17', '2019-02-17'),
(73, 'Κρεατόσουπα', NULL, 1, '2019-02-17', '2019-02-17'),
(74, 'Γιουβαρλάκια', NULL, 1, '2019-02-17', '2019-02-17'),
(75, 'Λαχανοντολμάδες', NULL, 1, '2019-02-17', '2019-02-17'),
(76, 'Φασολάδα', NULL, 1, '2019-02-17', '2019-02-17'),
(77, 'Φακές', NULL, 1, '2019-02-17', '2019-02-17'),
(78, 'Πίκλες', NULL, 1, '2019-02-17', '2019-02-17'),
(79, 'Καλαμαράκια τηγανητά με πιλάφι', NULL, 1, '2019-02-17', '2019-02-17'),
(80, 'Σουπιές με χόρτα', NULL, 1, '2019-02-17', '2019-02-17'),
(81, 'Παστίτσιο', NULL, 1, '2019-02-17', '2019-02-17'),
(82, 'Κεφτεδάκια με ρύζι', NULL, 1, '2019-02-17', '2019-02-17'),
(83, 'Μανιταρόσουπα', NULL, 1, '2019-02-17', '2019-02-17'),
(84, 'Ομελέτα με πατάτες και μπέικον', NULL, 1, '2019-02-17', '2019-02-17'),
(85, 'Μακαρόνια φούρνου με τυριά', NULL, 1, '2019-02-17', '2019-02-17'),
(86, 'Φασολάκια', NULL, 1, '2019-02-17', '2019-02-17'),
(87, 'Αρακάς με καρότα', NULL, 1, '2019-02-17', '2019-02-17'),
(88, 'Ζυμαρόπιτα', NULL, 1, '2019-02-17', '2019-02-17'),
(89, 'Γεμιστά λαδερά', NULL, 1, '2019-02-17', '2019-02-17'),
(90, 'Μπριάμ', NULL, 1, '2019-02-17', '2019-02-17'),
(91, 'Χοιρινό λεμονάτο', NULL, 1, '2019-02-17', '2019-02-17'),
(92, 'Μπριζόλα χοιρινή με πιλάφι', NULL, 1, '2019-02-17', '2019-02-17'),
(93, 'Μινεστρόνε', NULL, 1, '2019-02-17', '2019-02-17'),
(94, 'Λουκάνικα με πατάτες τηγανητές', NULL, 1, '2019-02-17', '2019-02-17'),
(95, 'Κοτόπουλο σνίτσελ με πατάτες τηγανιτές', NULL, 1, '2019-02-17', '2019-02-17'),
(96, 'Σοφρίτο με πιλάφι', NULL, 1, '2019-02-17', '2019-02-17'),
(97, 'Μπιφτέκι με πουρέ και σάλτσα μανιταριών', NULL, 1, '2019-02-17', '2019-02-17'),
(98, 'Σούπα του σεφ', NULL, 1, '2019-02-17', '2019-02-17'),
(99, 'Σπετζοφάι', NULL, 1, '2019-02-17', '2019-02-17'),
(100, 'Πίτσα', NULL, 1, '2019-02-17', '2019-02-17'),
(101, 'Ψωμί με μέλι και μαρμελάδα', NULL, 1, '2019-02-17', '2019-02-17'),
(102, 'Γάλα', NULL, 1, '2019-02-17', '2019-02-17'),
(103, 'Καφές φίλτρου', NULL, 1, '2019-02-17', '2019-02-17');

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
(1, '2014_04_02_193005_create_translations_table', 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('i@sarantis.pw', '$2y$10$m2y5nCCVo/bsQU2WToaQGO9yglh15UBeyGSDLmtdMxutmJ2bPUsSy', '2018-06-15 23:44:45'),
('i@sarantis.pw', '$2y$10$m2y5nCCVo/bsQU2WToaQGO9yglh15UBeyGSDLmtdMxutmJ2bPUsSy', '2018-06-15 23:44:45'),
('i@sarantis.pw', '$2y$10$m2y5nCCVo/bsQU2WToaQGO9yglh15UBeyGSDLmtdMxutmJ2bPUsSy', '2018-06-15 23:44:45'),
('i@sarantis.pw', '$2y$10$m2y5nCCVo/bsQU2WToaQGO9yglh15UBeyGSDLmtdMxutmJ2bPUsSy', '2018-06-15 23:44:45');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text,
  `student_id` int(11) DEFAULT NULL,
  `station_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `filename` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `schedule_items`
--

CREATE TABLE `schedule_items` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `date` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `schedule_items`
--

INSERT INTO `schedule_items` (`id`, `menu_id`, `date`) VALUES
(134, 15, '2019-05-01'),
(133, 8, '2019-05-01'),
(132, 14, '2019-04-30'),
(131, 7, '2019-04-30'),
(130, 13, '2019-04-29'),
(129, 6, '2019-04-29'),
(128, 19, '2019-04-28'),
(127, 12, '2019-04-28'),
(126, 18, '2019-04-27'),
(125, 11, '2019-04-27'),
(124, 17, '2019-04-26'),
(123, 10, '2019-04-26'),
(122, 16, '2019-04-25'),
(121, 9, '2019-04-25'),
(120, 15, '2019-04-24'),
(119, 8, '2019-04-24'),
(118, 14, '2019-04-23'),
(117, 7, '2019-04-23'),
(116, 13, '2019-04-22'),
(115, 6, '2019-04-22');

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
(2, 'DATABASE_REVISION', '3'),
(3, 'schedule_recurse_weeks', '1'),
(6, 'schedule_recurse_start', '2019-01-29');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `stations`
--

CREATE TABLE `stations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `info` text NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `stations`
--

INSERT INTO `stations` (`id`, `name`, `info`, `is_active`, `created_at`) VALUES
(1, 'sd', 'dssd', 1, '2019-04-23 20:17:59');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `station_assigns`
--

CREATE TABLE `station_assigns` (
  `id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `facility_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `statistics`
--

CREATE TABLE `statistics` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `membership_id` int(11) NOT NULL,
  `facillity_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `statistics`
--

INSERT INTO `statistics` (`id`, `student_id`, `schedule_id`, `type_id`, `membership_id`, `facillity_id`, `created_at`) VALUES
(1, 1, 48, 1, 1, 5, '2019-04-22 19:21:06'),
(2, 1, 48, 1, 1, 1, '2019-04-22 17:41:55'),
(3, 1, 48, 1, 1, 1, '2019-04-22 19:20:39'),
(4, 1, 48, 1, 1, 5, '2019-04-22 19:21:03');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `students`
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
-- Άδειασμα δεδομένων του πίνακα `students`
--

INSERT INTO `students` (`id`, `aem`, `firstname`, `lastname`, `father_name`, `photo`, `department_id`, `semester`, `created_at`) VALUES
(1, 718, 'Alex', 'Modis', 'Modis', 'c4ca4238a0b923820dcc509a6f75849b.jpeg', 1, 1, '2018-04-09 21:00:00'),
(2, 1069, 'Christos', 'Sarantis', 'Dimitrios', 'c81e728d9d4c2f636f067f89cc14862c.jpeg', 1, 6, '2018-04-09 21:00:00');

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
(1, 'Sarantis', 'i@sarantis.pw', '$2y$10$AF1p0HaulDq.nFLJ0Q2Oc.P5oJfEvz2VqOEu4I69DUl2/ms1wp8/G', 'uke8F4g2eWJgKEd3nJ27Xdo0wPIDKCn8BwMGKuGVN8FTg3mXduNldMDlzewD', 'ADMINISTRATOR', 1069, '2017-03-28 01:49:24', '2019-01-27 11:22:10'),
(2, 'mdasyg', 'modis.alex@gmail.com', '$2y$10$FHJ8J0FEKWAnYjQ62ObCtOIPqmLWl/8tVLAQbRsoFuxZMMgH3Yo4y', 'gJ02HpBS1HEZ2k9jFBEM0iZLDr0isorHZooPHYtxBy69UMtXs5EEDYq7jqcU', 'ADMINISTRATOR', 718, '2017-04-01 11:29:08', '2017-04-01 11:29:08');

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
-- Ευρετήρια για πίνακα `facillities`
--
ALTER TABLE `facillities`
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
  ADD KEY `membership_assigns_fk0` (`student_id`);

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
  ADD KEY `menu_id` (`menu_id`);

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
-- Ευρετήρια για πίνακα `schedule_items`
--
ALTER TABLE `schedule_items`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `station_assigns`
--
ALTER TABLE `station_assigns`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT για πίνακα `facillities`
--
ALTER TABLE `facillities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT για πίνακα `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT για πίνακα `membership_assigns`
--
ALTER TABLE `membership_assigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT για πίνακα `membership_types`
--
ALTER TABLE `membership_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT για πίνακα `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT για πίνακα `menu_assigns`
--
ALTER TABLE `menu_assigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT για πίνακα `menu_meals`
--
ALTER TABLE `menu_meals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT για πίνακα `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT για πίνακα `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `schedule_items`
--
ALTER TABLE `schedule_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT για πίνακα `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT για πίνακα `stations`
--
ALTER TABLE `stations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT για πίνακα `station_assigns`
--
ALTER TABLE `station_assigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT για πίνακα `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `assigns_fk0` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Περιορισμοί για πίνακα `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_fk0` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
