-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2022 at 07:39 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `al_ali_cbt_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Primary one', '2022-11-06 04:04:19', '2022-11-06 04:04:19'),
(2, 'Primary two', '2022-11-06 04:04:26', '2022-11-06 04:04:26'),
(3, 'Primary three', '2022-11-06 04:04:36', '2022-11-06 04:04:36'),
(4, 'Primary four', '2022-11-06 04:04:46', '2022-11-06 04:04:46'),
(5, 'Primary five', '2022-11-06 04:04:57', '2022-11-06 04:04:57'),
(6, 'Primary six', '2022-11-06 04:05:09', '2022-11-06 04:05:09');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

DROP TABLE IF EXISTS `exams`;
CREATE TABLE IF NOT EXISTS `exams` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripton` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `year_id` int UNSIGNED NOT NULL,
  `term_id` int UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exams_year_id_foreign` (`year_id`),
  KEY `exams_term_id_foreign` (`term_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `title`, `descripton`, `start_date`, `end_date`, `year_id`, `term_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '2022 Second Term Exam', 'Second Term exam for 2021/2022 Session', '2022-10-30', '2022-11-03', 1, 2, 'active', '2022-11-06 04:08:22', '2022-11-06 04:08:22'),
(2, '2022  Second Term C.A test', 'Second Term contineous accessment for 2021/2022 Session', '2022-10-30', '2022-11-03', 1, 2, 'active', '2022-11-06 04:08:37', '2022-11-15 15:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `exam_papers`
--

DROP TABLE IF EXISTS `exam_papers`;
CREATE TABLE IF NOT EXISTS `exam_papers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classes_id` int UNSIGNED NOT NULL,
  `subject_id` int UNSIGNED NOT NULL,
  `exam_id` int UNSIGNED NOT NULL,
  `instruction` mediumtext COLLATE utf8mb4_unicode_ci,
  `duration` int NOT NULL,
  `start_time` datetime NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exam_papers_classes_id_foreign` (`classes_id`),
  KEY `exam_papers_subject_id_foreign` (`subject_id`),
  KEY `exam_papers_exam_id_foreign` (`exam_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_papers`
--

INSERT INTO `exam_papers` (`id`, `name`, `classes_id`, `subject_id`, `exam_id`, `instruction`, `duration`, `start_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Primary One English exam', 1, 8, 1, NULL, 2, '2022-10-30 10:30:00', 'active', '2022-11-06 04:09:44', '2022-11-14 09:44:34'),
(2, 'Primary One Mathematics exam', 1, 2, 1, NULL, 2, '2022-11-20 00:30:00', 'active', '2022-11-06 04:10:12', '2022-11-17 13:17:10'),
(3, 'Primary Two Mathematics exam', 2, 2, 1, NULL, 2, '2022-10-30 11:30:00', 'active', '2022-11-06 04:10:47', '2022-11-06 04:10:47'),
(11, 'Mathematics primary 3 exam', 3, 2, 1, 'Answer all questions', 2, '2022-11-26 17:00:00', 'active', '2022-11-17 13:20:59', '2022-11-26 14:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 2),
(3, '2019_08_19_000000_create_failed_jobs_table', 3),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(5, '2022_10_30_162620_create_students_table', 5),
(6, '2022_10_30_163359_create_classes_table', 6),
(7, '2022_10_30_164303_create_teachers_table', 7),
(8, '2022_10_30_171446_create_exams_table', 8),
(9, '2022_10_30_193353_create_exam_papers_table', 9),
(10, '2022_10_30_201354_create_questions_table', 10),
(11, '2022_10_30_203618_create_results_table', 11),
(12, '2022_10_30_213234_create_subjects_table', 12),
(13, '2022_10_30_222556_create_question_answers_table', 13),
(14, '2022_10_30_223235_create_teacher_subjects_table', 14),
(15, '2022_10_30_223411_create_teacher_classes_table', 15),
(16, '2022_10_31_213649_create_years_table', 16),
(17, '2022_11_01_030920_create_terms_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 1, 'token', 'a96388091633dfd3bd1f1485a65c9603b5e851284da5a57154bdfb2f948da686', '[\"*\"]', NULL, NULL, '2022-11-13 16:35:10', '2022-11-13 16:35:10'),
(2, 'App\\Models\\User', 2, 'token', '60735d4d3c4531af132f3fecb712513fa05cace881fb635c4f5e31555a0f7903', '[\"*\"]', '2022-11-13 16:37:51', NULL, '2022-11-13 16:37:13', '2022-11-13 16:37:51'),
(3, 'App\\Models\\User', 2, 'token', '1a567c22683c247d69f8623521dddd9952c10de584ad492bd68852ee62754ad3', '[\"*\"]', NULL, NULL, '2022-11-13 16:38:39', '2022-11-13 16:38:39'),
(4, 'App\\Models\\User', 2, 'token', '5e557ff44ebb8077f7df29a6e96af0a888e3e5baff6532ae758ff39f5a733955', '[\"*\"]', NULL, NULL, '2022-11-13 16:39:42', '2022-11-13 16:39:42');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `exam_id` int UNSIGNED NOT NULL,
  `classes_id` int UNSIGNED NOT NULL,
  `subject_id` int UNSIGNED NOT NULL,
  `exam_paper_id` int UNSIGNED NOT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_exam_id_foreign` (`exam_id`),
  KEY `questions_classes_id_foreign` (`classes_id`),
  KEY `questions_subject_id_foreign` (`subject_id`),
  KEY `questions_exam_paper_id_foreign` (`exam_paper_id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `exam_id`, `classes_id`, `subject_id`, `exam_paper_id`, `question`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 8, 1, 'What is a  noun?', '2022-11-06 04:19:37', '2022-11-14 09:46:55'),
(2, 1, 1, 8, 1, 'Bola _____ to school everyday?', '2022-11-06 04:19:38', '2022-11-14 09:47:05'),
(3, 1, 1, 1, 1, 'What is an adjective?', '2022-11-06 04:19:38', '2022-11-06 10:26:35'),
(4, 1, 1, 8, 2, 'What are prime numbers?', '2022-11-06 04:19:38', '2022-11-14 09:47:18'),
(5, 2, 4, 2, 3, 'What are natural numbers?', '2022-11-06 12:23:29', '2022-11-06 12:23:29'),
(6, 2, 4, 2, 3, 'What number do you add to 15 to give 9', '2022-11-06 12:23:29', '2022-11-06 12:23:29'),
(52, 1, 3, 2, 11, 'Evaluate: 2x + 8x', '2022-11-17 14:04:19', '2022-11-17 14:04:19'),
(47, 1, 1, 1, 1, 'Kola ______ next week', '2022-11-07 18:13:39', '2022-11-07 18:13:39'),
(53, 1, 3, 2, 11, '<p>Solve the equation:</p><p>2x + 8y = 18;</p><p>x - 4y = 9</p>', '2022-11-17 14:04:20', '2022-11-17 14:26:28'),
(54, 1, 3, 2, 11, '<p>Solve for y if: 8y + 6 = 22</p>', '2022-11-17 14:04:20', '2022-11-26 13:42:47'),
(55, 1, 3, 2, 11, 'What are odd numbers?', '2022-11-17 14:04:20', '2022-11-17 14:04:20'),
(56, 1, 3, 2, 11, '<p>What is 2 raise to power 4?</p>', '2022-11-17 14:04:20', '2022-11-26 13:42:35'),
(59, 1, 1, 1, 1, 'testing question', '2022-11-26 01:53:18', '2022-11-26 01:53:18'),
(60, 1, 1, 1, 1, 'testing question2', '2022-11-26 01:57:44', '2022-11-26 01:57:44'),
(62, 1, 3, 2, 11, '<p><math xmlns=\"http://www.w3.org/1998/Math/MathML\"><semantics><msqrt><mn>5</mn></msqrt><annotation encoding=\"application/vnd.wiris.mtweb-params+json\">{\"fontSize\":\"26px\"}</annotation></semantics></math></p>\n<p>Is the above root rational or irrational?&nbsp;</p>', '2022-11-26 02:03:34', '2022-11-26 13:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `question_answers`
--

DROP TABLE IF EXISTS `question_answers`;
CREATE TABLE IF NOT EXISTS `question_answers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `question_id` int UNSIGNED NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `question_answers_question_id_foreign` (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_answers`
--

INSERT INTO `question_answers` (`id`, `question_id`, `answer`, `correct`, `created_at`, `updated_at`) VALUES
(1, 1, 'Name of person, animal, place or things', 1, '2022-11-06 04:21:01', '2022-11-06 04:21:01'),
(2, 1, 'An adjective of us', 0, '2022-11-06 04:21:01', '2022-11-06 07:10:43'),
(25, 1, 'All of the above', 0, '2022-11-06 09:16:13', '2022-11-06 09:16:57'),
(4, 2, 'went', 0, '2022-11-06 04:21:01', '2022-11-06 04:21:01'),
(5, 2, 'goes', 1, '2022-11-06 04:21:01', '2022-11-06 04:21:01'),
(6, 2, 'ran', 0, '2022-11-06 04:21:01', '2022-11-06 04:21:01'),
(7, 2, 'came', 0, '2022-11-06 04:21:01', '2022-11-06 04:21:01'),
(8, 3, 'Tells us nothing', 0, '2022-11-06 04:21:01', '2022-11-06 04:21:01'),
(9, 3, 'An adjective qualifies a noun', 1, '2022-11-06 04:21:01', '2022-11-06 04:21:01'),
(10, 3, 'Describes a verb', 0, '2022-11-06 04:21:01', '2022-11-06 10:13:11'),
(11, 4, 'Multiples of 2', 0, '2022-11-06 04:21:01', '2022-11-06 04:21:01'),
(12, 4, 'Numbers that can be devided by 2', 0, '2022-11-06 04:21:02', '2022-11-06 04:21:02'),
(13, 4, 'All posivite numbers', 0, '2022-11-06 04:21:02', '2022-11-06 04:21:02'),
(14, 4, 'Numbers that can only be divided by one and itself', 1, '2022-11-06 04:21:02', '2022-11-06 04:21:02'),
(24, 1, 'All places in the world', 0, '2022-11-06 09:11:03', '2022-11-06 09:11:58'),
(37, 47, 'for', 0, '2022-11-07 18:21:12', '2022-11-07 18:21:12'),
(36, 47, 'dey', 0, '2022-11-07 18:19:54', '2022-11-07 18:19:54'),
(38, 47, 'will', 1, '2022-11-07 18:21:30', '2022-11-07 18:21:30'),
(39, 47, 'have', 0, '2022-11-07 18:21:48', '2022-11-07 18:21:48'),
(44, 52, '5x2', 0, '2022-11-17 14:17:06', '2022-11-17 14:17:06'),
(45, 52, '2+8+x', 0, '2022-11-17 14:17:47', '2022-11-17 14:17:47'),
(46, 52, '10x', 1, '2022-11-17 14:18:25', '2022-11-17 14:18:25'),
(47, 52, '-8x', 0, '2022-11-17 14:18:41', '2022-11-17 14:18:41'),
(48, 54, '10', 0, '2022-11-17 14:20:11', '2022-11-17 14:20:11'),
(49, 54, '8', 0, '2022-11-17 14:20:20', '2022-11-17 14:20:20'),
(50, 54, '20', 0, '2022-11-17 14:20:43', '2022-11-17 14:20:43'),
(51, 54, '2', 1, '2022-11-17 14:21:17', '2022-11-17 14:21:17'),
(52, 54, '32', 0, '2022-11-17 14:21:31', '2022-11-17 14:21:42'),
(53, 55, 'numbers that can not be divided excertly by 2', 1, '2022-11-17 14:22:18', '2022-11-17 14:23:37'),
(54, 55, 'positive integers', 0, '2022-11-17 14:22:32', '2022-11-17 14:22:32'),
(55, 55, 'number of 3', 0, '2022-11-17 14:22:56', '2022-11-17 14:22:56'),
(56, 55, 'natural number', 0, '2022-11-17 14:23:56', '2022-11-17 14:24:06'),
(57, 56, '32', 0, '2022-11-17 14:24:34', '2022-11-17 14:24:34'),
(58, 56, '61', 0, '2022-11-17 14:24:45', '2022-11-17 14:24:45'),
(59, 56, '8', 0, '2022-11-17 14:25:08', '2022-11-17 14:25:08'),
(60, 56, '16', 1, '2022-11-17 14:25:23', '2022-11-17 14:25:23'),
(61, 53, 'x= 0, y= 3', 0, '2022-11-17 14:28:17', '2022-11-17 14:28:26'),
(62, 53, 'x=9, y=0', 1, '2022-11-17 14:29:59', '2022-11-17 14:29:59'),
(63, 53, 'x=18, y=3', 0, '2022-11-17 14:30:23', '2022-11-17 14:30:23'),
(64, 62, '<p>Rational</p>', 0, '2022-11-26 13:50:52', '2022-11-26 14:20:43'),
(65, 62, '<p>Irrational</p>', 1, '2022-11-26 14:04:08', '2022-11-26 14:04:08');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
CREATE TABLE IF NOT EXISTS `results` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` int UNSIGNED NOT NULL,
  `exam_id` int UNSIGNED NOT NULL,
  `subject_id` int UNSIGNED NOT NULL,
  `classes_id` int UNSIGNED NOT NULL,
  `exam_paper_id` int UNSIGNED NOT NULL,
  `year_id` int UNSIGNED NOT NULL,
  `term_id` int UNSIGNED NOT NULL,
  `score` int NOT NULL,
  `over` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `results_student_id_foreign` (`student_id`),
  KEY `results_exam_id_foreign` (`exam_id`),
  KEY `results_subject_id_foreign` (`subject_id`),
  KEY `results_classes_id_foreign` (`classes_id`),
  KEY `results_exam_paper_id_foreign` (`exam_paper_id`),
  KEY `results_year_id_foreign` (`year_id`),
  KEY `results_term_id_foreign` (`term_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `student_id`, `exam_id`, `subject_id`, `classes_id`, `exam_paper_id`, `year_id`, `term_id`, `score`, `over`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 8, 1, 1, 1, 2, 2, 5, '2022-11-06 04:24:00', '2022-11-14 13:13:22'),
(2, 3, 1, 2, 1, 1, 1, 2, 10, 10, '2022-11-14 18:06:17', '2022-11-14 19:20:42'),
(3, 3, 2, 8, 1, 2, 1, 2, 10, 10, '2022-11-14 18:06:41', '2022-11-15 15:18:49'),
(4, 3, 1, 8, 2, 4, 2, 1, 10, 10, '2022-11-14 18:08:15', '2022-11-16 07:24:43'),
(5, 3, 2, 2, 2, 4, 2, 3, 7, 10, '2022-11-16 06:59:10', '2022-11-16 07:22:33'),
(15, 1, 1, 2, 3, 11, 1, 2, 6, 6, '2022-11-26 15:13:35', '2022-11-26 15:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `classes_id` int UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `students_user_id_foreign` (`user_id`),
  KEY `students_classes_id_foreign` (`classes_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `classes_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 'Abu Aare', '2022-11-06 04:27:09', '2022-11-13 17:38:24'),
(2, 6, 2, 'Kalejaye Arigbabuwo', '2022-11-06 04:27:09', '2022-11-06 04:27:09'),
(3, 7, 5, 'Tunde Sule', '2022-11-06 04:27:09', '2022-11-06 04:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Mathematics', '2022-11-06 04:27:31', '2022-11-06 04:27:31'),
(3, 'Socail Studies', '2022-11-06 04:27:31', '2022-11-06 04:27:31'),
(4, 'Computer', '2022-11-06 04:27:31', '2022-11-06 04:27:31'),
(5, 'Agric', '2022-11-09 10:27:09', '2022-11-13 15:15:05'),
(8, 'English', '2022-11-14 09:38:14', '2022-11-14 09:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teachers_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 2, 'Yusuf Wale', '2022-11-06 04:25:46', '2022-11-13 16:16:29'),
(2, 3, 'Gani Tunde', '2022-11-06 04:26:00', '2022-11-14 08:07:49'),
(3, 4, 'Kenny Baba', '2022-11-06 04:26:24', '2022-11-06 04:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_classes`
--

DROP TABLE IF EXISTS `teacher_classes`;
CREATE TABLE IF NOT EXISTS `teacher_classes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `teacher_id` int UNSIGNED NOT NULL,
  `classes_id` int UNSIGNED NOT NULL,
  `teacher_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classes_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teacher_classes_teacher_id_foreign` (`teacher_id`),
  KEY `teacher_classes_classes_id_foreign` (`classes_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_classes`
--

INSERT INTO `teacher_classes` (`id`, `teacher_id`, `classes_id`, `teacher_name`, `classes_name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Yusuf Wale', 'Primary one', '2022-11-06 04:28:59', '2022-11-07 17:02:01'),
(2, 2, 4, 'Gani Tunde', 'Primary four', '2022-11-06 04:28:59', '2022-11-06 04:28:59'),
(3, 3, 1, 'Kenny Baba', 'Primary one', '2022-11-06 04:28:59', '2022-11-06 04:28:59'),
(4, 3, 4, 'Kenny Baba', 'Primary four', '2022-11-06 04:28:59', '2022-11-06 04:28:59'),
(5, 3, 3, 'Kenny Baba', 'Primary three', '2022-11-11 02:53:06', '2022-11-11 02:53:06'),
(30, 1, 3, 'Yusuf Wale', 'Primary three', '2022-11-20 20:44:05', '2022-11-20 20:44:05'),
(21, 1, 5, 'Yusuf Wale', 'Primary five', '2022-11-11 06:13:39', '2022-11-11 06:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subjects`
--

DROP TABLE IF EXISTS `teacher_subjects`;
CREATE TABLE IF NOT EXISTS `teacher_subjects` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `teacher_id` int UNSIGNED NOT NULL,
  `subject_id` int UNSIGNED NOT NULL,
  `subject_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teacher_subjects_teacher_id_foreign` (`teacher_id`),
  KEY `teacher_subjects_subject_id_foreign` (`subject_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_subjects`
--

INSERT INTO `teacher_subjects` (`id`, `teacher_id`, `subject_id`, `subject_name`, `teacher_name`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Mathematics', 'Yusu Wale', '2022-11-06 04:28:44', '2022-11-06 04:28:44'),
(2, 1, 8, 'English', 'Yusu Wale', '2022-11-06 04:28:44', '2022-11-14 09:43:22'),
(3, 2, 4, 'Computer', 'Gani Tunde', '2022-11-06 04:28:44', '2022-11-06 04:28:44'),
(4, 3, 2, 'Mathematics', 'Kenny Baba', '2022-11-06 04:28:44', '2022-11-06 04:28:44'),
(5, 3, 3, 'Social Studies', 'Kenny Baba', '2022-11-06 04:28:44', '2022-11-06 04:28:44'),
(8, 2, 5, 'Agric', 'Gani Tunde', '2022-11-13 13:42:31', '2022-11-13 13:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

DROP TABLE IF EXISTS `terms`;
CREATE TABLE IF NOT EXISTS `terms` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'first term', '2022-11-06 04:28:10', '2022-11-06 04:28:10'),
(2, 'second term', '2022-11-06 04:28:11', '2022-11-06 04:28:11'),
(3, 'third term', '2022-11-06 04:28:11', '2022-11-06 04:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Olagoke Mubarak', 'mubarakolagoke@gmail.com', NULL, 'admin', '07036998004', '$2y$10$vwrK.oELW98UBAl9DCZWXeV2Qs.ZaK0ERBB1nm85.1BQbwXi.MOFO', NULL, '2022-11-06 04:03:15', '2022-11-14 07:46:22'),
(2, 'Yusuf Wale', 'wale@gmail.com', NULL, 'teacher', '090303940439', '$2y$10$qa7JNx2N6vrOjXB7OdsrRuJCIIHsIDXfiwP3iSZCtITFk9lNYNhG2', NULL, '2022-11-06 04:03:22', '2022-11-14 08:05:52'),
(3, 'Gani Tunde', 'tunde@gmail.com', NULL, 'teacher', '09878909878909', '$2y$10$jy3Qp73.WXGnRVp.YW9d6O0Wd1gWPAbVyiRYgV3FdCp2aG2J9MOhe', NULL, '2022-11-06 04:03:23', '2022-11-06 04:03:23'),
(4, 'Kenny Baba', 'baba@gmail.com', NULL, 'teacher', '9879879878987', '$2y$10$oOpri2T56H6eVm8y2RKUquf7YFp2s6cBgPyTRPb.Z0z7w0FT0awZa', NULL, '2022-11-06 04:03:23', '2022-11-14 13:00:59'),
(5, 'Abu Aare', 'student1', NULL, 'student', '542345632345', '$2y$10$Bi4wwf4JavyjIhRHVaMiB./fN9rByk0ONjB1qYh3/49sufNz.g4ei', NULL, '2022-11-06 04:03:23', '2022-11-06 04:03:23'),
(6, 'Kalejaye Arigbabuwo', 'student2', NULL, 'student', '456532345665', '$2y$10$91nuGroVCoTLnR9vOEwOgebhrHv7o7iKESp/XzmMHS3MZZyc./.Y6', NULL, '2022-11-06 04:03:24', '2022-11-06 04:03:24'),
(7, 'Tunde Sule', 'student3', NULL, 'student', '45986594303', '$2y$10$cGgUVsyOq9GYvGgFHGEG5O59BZy07M8u/4ZCQ/mlVUJjOibubG6qW', NULL, '2022-11-06 04:03:24', '2022-11-06 04:03:24'),
(8, 'Busura Rabiu', 'student4', NULL, 'student', '5435642324565', '$2y$10$uQthshUXLnh9JFhfXU2WV./S1L6YZn6jiWuocYbjK6IPW7vRwDqS.', NULL, '2022-11-06 04:03:24', '2022-11-06 04:03:24'),
(9, 'Teacher Test', 'TeacherTest', NULL, 'teacher', '0986543567', '$2y$10$gMrt6F5Z.I08I2suW0g9Iuqked3dEtBx/BEV.qh9Le20PDXkW4RUu', NULL, '2022-11-13 14:31:50', '2022-11-13 14:31:50'),
(27, 'rgergweg', 'gffegefgeg', NULL, 'student', NULL, '$2y$10$XPRVx2T9Mg4WRyfoAtMA4eVHKJlbhbkm9krUUM111tPk55jF5VWlq', NULL, '2022-11-14 12:14:50', '2022-11-14 12:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

DROP TABLE IF EXISTS `years`;
CREATE TABLE IF NOT EXISTS `years` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year`, `created_at`, `updated_at`) VALUES
(1, '2021/2022', '2022-11-06 04:27:51', '2022-11-06 04:27:51'),
(2, '2022/2023', '2022-11-06 04:27:51', '2022-11-06 04:27:51'),
(3, '2023/2024', '2022-11-06 04:27:51', '2022-11-08 14:55:51');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
