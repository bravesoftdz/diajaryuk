-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2017 at 07:53 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer`, `created_at`, `updated_at`) VALUES
(1, 12, 'jawaban d', '2017-07-24 09:08:17', '2017-07-24 09:08:17'),
(2, 13, 'jawaban A', '2017-07-24 09:10:55', '2017-07-24 09:10:55'),
(4, 17, 'answer c edited', '2017-07-24 10:30:55', '2017-07-24 10:42:08'),
(5, 18, '8', '2017-07-27 14:20:01', '2017-07-27 14:20:01'),
(6, 20, 'part of speech adalah bagian-bagian terkecil dari data', '2017-08-07 08:12:25', '2017-08-07 08:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `matery_id` int(11) DEFAULT NULL,
  `try_out_id` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `matery_id`, `try_out_id`, `comment`, `created_at`, `updated_at`) VALUES
(16, 1, 4, NULL, '<p>hai</p>', '2017-08-12 21:54:52', '2017-08-12 21:54:52'),
(17, 1, 4, NULL, '<p>aku aa tamvan</p>', '2017-08-12 22:40:41', '2017-08-12 22:40:41'),
(18, 2, 4, NULL, '<p>hai aku dama yasika</p>', '2017-08-12 22:41:28', '2017-08-12 22:41:28'),
(19, 1, 6, NULL, '<p>lh</p>', '2017-08-13 05:57:42', '2017-08-13 05:57:42'),
(20, 1, NULL, NULL, '<p>hia</p>', '2017-08-13 06:43:26', '2017-08-13 06:43:26'),
(21, 1, NULL, NULL, '<p>try out matery 4</p>', '2017-08-13 06:49:03', '2017-08-13 06:49:03'),
(22, 1, NULL, 2, '<p>hai</p>', '2017-08-13 06:57:07', '2017-08-13 06:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `materies`
--

CREATE TABLE `materies` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materies`
--

INSERT INTO `materies` (`id`, `module_id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(4, 27, 'Part of Speech', 'Hi, apa kalian tahu apa itu part of speech ?? dalam pembelajaran bahasa inggris, part of speech merupakan hal dasar yang perlu kalian ketahui sebelum bisa belajar lebih lanjut. tapi tenang,  materi ini bukan materi yang terlalu sulit untuk dipelajari. Kalian akan kami pandu sedikit demi sedikit. Just klik Next ! :)', '2017-07-27 00:35:13', '2017-07-27 00:35:13'),
(5, 27, 'Part of speech: pengertian', 'Part of speech adalah bagian-bagian mendasar dari kalimat bahasa Inggris. Ada 8 part of speech, yaitu: noun, pronoun, verb, adjective, adverb, preposition, conjunction, dan interjection.', '2017-07-27 00:40:43', '2017-07-27 00:40:43'),
(6, 28, 'Noun', 'part of speech : ini digunakan untuk menamai orang, benda, hewan, tempat, dan konsep abstrak.', '2017-07-27 00:50:08', '2017-07-27 00:55:09'),
(7, 28, 'Noun', 'dalam bahasa inggris, noun memiliki beberapa sub part, diantaranya :\n- Terhitung & tak terhitung.\n- Proper and Common nout\n- abstrak dan konkret\n- collective noun', '2017-07-27 00:54:30', '2017-07-27 00:54:30'),
(8, 28, 'Noun : contoh', 'Contoh - contoh dari noun diantaranya :\n\n- book, house, car, love\n\nYour book is on the table.\n(Bukumu di atas meja.)', '2017-07-27 00:56:18', '2017-07-27 00:56:18'),
(9, 29, 'pronoun', 'pronoun ( kata ganti ) : digunakan untuk menggantikan noun.\nPart of speech ini bermanfaat untuk menghindari repetisi penggunaan noun.', '2017-07-27 00:57:50', '2017-07-27 00:57:50'),
(10, 29, 'pronoun', 'contoh pronoun diantaranya:\n\nIt is on the table.\n(Itu di atas meja.)\n\nThis is your cake.\n(Ini kuemu.)\n\nHe didn’t blame himself for the accident.\n(Dia tidak menyalahkan dirinya sendiri terhadap kecelakaan tersebut.)\n\nFriends help each other.\n(Teman membantu satu sama lain.)', '2017-07-27 01:02:37', '2017-07-27 01:02:37'),
(11, 30, 'Verb', '<p><span style="color: rgb(76, 76, 76);">Verb (kata kerja) adalah suatu kata yang berfungsi untuk menunjukkan tindakan dari&nbsp;</span><a href="https://www.wordsmile.com/pengertian-contoh-kalimat-subject-predicate" target="_blank" style="color: rgb(39, 158, 197); background-color: rgb(255, 255, 255);"><strong>subject</strong></a><span style="color: rgb(76, 76, 76);">, menunjukkan peristiwa atau&nbsp;keadaan. Kata kerja bahasa Inggris ini&nbsp;merupakan satu dari delapan&nbsp;</span><a href="https://www.wordsmile.com/pengertian-macam-contoh-kalimat-parts-of-speech" target="_blank" style="color: rgb(39, 158, 197); background-color: rgb(255, 255, 255);"><strong>part of speech</strong></a><span style="color: rgb(76, 76, 76);">.</span></p>', '2017-07-27 06:56:57', '2017-07-27 07:05:23'),
(12, 35, 'sadf', '<p>Interjection adalah </p>', '2017-07-27 23:28:15', '2017-07-27 23:28:15'),
(13, 30, 'Verb part 2', '<p>verb atau kata kerja sering sekali </p>', '2017-07-27 23:31:26', '2017-07-27 23:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(47, '2014_10_12_000000_create_users_table', 1),
(48, '2014_10_12_100000_create_password_resets_table', 1),
(49, '2017_06_29_040151_add_materies', 1),
(50, '2017_06_29_040220_add_comments', 1),
(51, '2017_06_29_044633_create_modules_table', 1),
(52, '2017_06_29_073713_create_questions_table', 1),
(53, '2017_06_29_074024_create_answers_table', 1),
(54, '2017_06_29_080224_create_try_out_table', 1),
(55, '2017_06_29_080614_create_quiz_table', 1),
(56, '2017_08_13_174154_create_stages', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `image_path`, `created_at`, `updated_at`) VALUES
(27, 'part of speech', NULL, '2017-07-27 00:31:20', '2017-07-27 00:31:20'),
(28, 'noun', NULL, '2017-07-27 00:31:30', '2017-07-27 00:31:30'),
(29, 'pronoun', NULL, '2017-07-27 00:31:32', '2017-07-27 00:31:32'),
(30, 'verb', NULL, '2017-07-27 00:31:38', '2017-07-27 00:31:38'),
(31, 'adjective', NULL, '2017-07-27 00:31:40', '2017-07-27 00:31:40'),
(32, 'adverb', NULL, '2017-07-27 00:31:47', '2017-07-27 00:31:47'),
(33, 'preposition', NULL, '2017-07-27 00:31:56', '2017-07-27 00:31:56'),
(34, 'conjunction', NULL, '2017-07-27 00:32:04', '2017-07-27 00:32:04'),
(35, 'interjection', NULL, '2017-07-27 00:32:13', '2017-07-27 00:32:26'),
(36, 'present tense', NULL, '2017-07-31 01:51:14', '2017-07-31 01:51:14');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` int(11) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer_4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_type`, `point`, `question`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `created_at`, `updated_at`) VALUES
(18, 'PG', 0, 'terbagi berapa bagian kah part of speech itu ?', '8', '2', '4', '1', '2017-07-27 14:20:00', '2017-07-27 14:20:00'),
(19, 'PG', 10, 'apakah yang dimaksud present tense', 'tense', 'tense bentuk sekarang', 'tense bentuk lampau', 'pola kalimat untuk menunjukan waktu sekarang', '2017-07-31 01:52:40', '2017-07-31 01:52:40'),
(20, 'PG', 10, 'apa yang dimaksud dengan part of speech ?', 'part of speech adalah bagian-bagian terkecil dari data', 'part of speech terbagi 8 bagian', 'part of speech adalah pers', 'saya tidak tahu', '2017-08-07 08:12:24', '2017-08-07 08:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `module_id`, `question_id`, `created_at`, `updated_at`) VALUES
(3, 27, 18, '2017-07-28 00:42:15', '2017-07-28 00:42:15');

-- --------------------------------------------------------

--
-- Table structure for table `try_outs`
--

CREATE TABLE `try_outs` (
  `id` int(10) UNSIGNED NOT NULL,
  `matery_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `try_outs`
--

INSERT INTO `try_outs` (`id`, `matery_id`, `question_id`, `created_at`, `updated_at`) VALUES
(2, 4, 18, '2017-07-28 00:08:03', '2017-07-28 00:08:03'),
(3, 5, 18, '2017-08-06 09:27:21', '2017-08-06 09:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `is_permission` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `access_level`, `is_permission`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'punk73', 'teguhsetiawan171@gmail.com', '$2y$10$xlwsPtEnn3WO90v8oxUwKO2VhZYTNhwPhsIxcHGMNTYQNxzJsNdGy', 'admin', 2, 'QuxkCYnx2EVrj4C0LFu0obliMIDT3vGLohF6tJgx7QBZXdJ6StAmtvHlXVS2', '2017-07-06 10:10:32', '2017-07-06 10:10:32'),
(2, 'Dama yasika', 'dyasika26@gmail.com', '$2y$10$chseoMpOGacBSrcbCjCmC..9I4e6pUF0v3tzRI7REbr8w0yz4LFnq', 'user', 0, 'kg28FTQZTH5Z6sUfOIpaG66gZkn77GYlqCL8IUBdZ4BMcotnC9lNeUqcmfYN', '2017-07-29 10:09:28', '2017-07-29 10:09:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `answers_question_id_unique` (`question_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materies`
--
ALTER TABLE `materies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `try_outs`
--
ALTER TABLE `try_outs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `materies`
--
ALTER TABLE `materies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `try_outs`
--
ALTER TABLE `try_outs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
