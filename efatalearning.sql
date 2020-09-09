-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2020 at 06:00 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `efatalearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjelasan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `id` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`id`, `nama`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(4, 'Ferdinan', 'ferdi', 'Ferdinan@gmail.com', '123', '2020-06-22 07:20:17', '2020-06-23 06:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `informasis`
--

CREATE TABLE `informasis` (
  `id` int(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `guru` int(10) NOT NULL,
  `mapel` varchar(30) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nilai` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` int(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` varchar(10) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `guru` varchar(191) NOT NULL,
  `mapel` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jawabs`
--

CREATE TABLE `jawabs` (
  `id` int(10) NOT NULL,
  `name` varchar(191) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `jawaban` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `file` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawabs`
--

INSERT INTO `jawabs` (`id`, `name`, `judul`, `jawaban`, `created_at`, `updated_at`, `file`) VALUES
(1, '3', '1', 'https://www.google.com/', '2020-09-08 22:20:14', '2020-09-08 22:20:14', '20200908222014_252 (3) (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `mapel` varchar(30) NOT NULL,
  `guru` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`, `mapel`, `guru`, `created_at`, `updated_at`) VALUES
(1, 'Kelas 1', '1', '86', '2020-09-08 22:12:11', '2020-09-08 22:12:11');

-- --------------------------------------------------------

--
-- Table structure for table `mapels`
--

CREATE TABLE `mapels` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapels`
--

INSERT INTO `mapels` (`id`, `nama`, `updated_at`, `created_at`) VALUES
(1, 'Matematika', '2020-09-08 22:09:50', '2020-09-08 22:09:50'),
(2, 'Indonesia', '2020-09-08 22:09:54', '2020-09-08 22:09:54'),
(3, 'Inggris', '2020-09-08 22:09:59', '2020-09-08 22:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `materis`
--

CREATE TABLE `materis` (
  `id` int(10) NOT NULL,
  `mapel` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `link` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `nama`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Charles van houten', 'Charles@gmail.com', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Refsi Maulana', 'maulana@gmail.com', '12', '2020-06-22 06:40:10', '2020-06-22 06:40:10'),
(4, 'aa', '12@12.COM', '$2y$10$MSts.Qwf3RD1jYZgc3tnce.jIgOvJb08wMC7oCd5KReKjLp8IUoWy', '2020-06-23 09:00:56', '2020-06-23 09:00:56'),
(5, 'refsi', 'refsi@gmail.com', '$2y$10$9QhS6sP8euMWD7X0m6wuZ.iLXyqGeWVSx0picT51A8d/Z/yrWH5oi', '2020-06-23 09:52:23', '2020-06-23 09:52:23');

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
(7, '2020_06_24_182345_create_files_table', 1),
(8, '2020_06_25_081242_create_files_table', 2),
(9, '2014_10_12_000000_create_users_table', 3),
(10, '2014_10_12_100000_create_password_resets_table', 3),
(11, '2020_06_25_144413_create_files_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nilais`
--

CREATE TABLE `nilais` (
  `id` int(10) NOT NULL,
  `murid` varchar(191) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nilai` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('refsimaulanatkr@gmail.com', '$2y$10$Lx5HsqMf0AJCuQvdvFQixOq3xDxoh56FS6r128jbjgZQ16ByzGEae', '2020-06-26 00:48:21'),
('refsimaulanatkr@gmail.com', '$2y$10$Lx5HsqMf0AJCuQvdvFQixOq3xDxoh56FS6r128jbjgZQ16ByzGEae', '2020-06-26 00:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `soals`
--

CREATE TABLE `soals` (
  `id` int(11) NOT NULL,
  `mapel` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `link` text,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soals`
--

INSERT INTO `soals` (`id`, `mapel`, `judul`, `kelas`, `file`, `created_at`, `updated_at`, `link`, `deadline`) VALUES
(1, '1', 'Belajar Menghitung dasar', '1', '20200908221549_252 (2).jpg', '2020-09-08 22:15:49', '2020-09-08 22:15:49', 'https://www.youtube.com/', '2020-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kelas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`, `kelas`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$/7TSH8.2lKED/BClX.Njv.LbAl2Pi.3SEWOwNXxsKlsPZhpBqCgqG', '0', 'KD9qjZJS4l6GDwmmrkKJrCcncee0RRgYZsdwwoUYh2J8zSqyzJmrev7DsktD', '2020-06-25 07:52:33', '2020-06-25 07:52:33', NULL),
(3, 'murid', 'murid@gmail.com', '$2y$10$CfHoiQy1aAPYIPcfRF6WrOCCV9NxMlRjMeRlDRxOFBDwMLgQ6V8.u', '2', 'zfPge5wsRRr6NzvmiTsskZxHqMBbuF8bf4N9CR0VxoZ4TUcEAUlaSQbOIEnH', '2020-06-25 09:30:52', '2020-06-25 09:30:52', 1),
(21, 'Gladyn', 'Gladyn@gmail.com', '$2y$10$korgTYBrtco4UQjbfkUnJOonpj8xmR9aHBR5oi5C910y1uuI6lZk.', '2', 'i0AZ3l30Cs5zXYW2gbIW68N9zjiKYvSYxnvoOYOukKtmXoJpvXJmWtq8VxvU', '2020-09-05 02:25:05', '2020-09-05 02:25:05', NULL),
(22, 'Brandon', 'Brandon@gmail.com', '$2y$10$cCVhTaAaymf2DcMQQt7OeOiHv42xtnL7cLES2FNln6zlTRJGzU18.', '2', 'Ul1uiO3z5UDs6OIsj22SmlcqYEqEPstKNE6Dweu7RNtrDukAU0iKKrsWhcU5', '2020-09-05 02:25:36', '2020-09-05 02:25:36', NULL),
(23, 'Floria Elvira', 'FloriaElvira@gmail.com', '$2y$10$.0qJSWU5t/xcAfYvhe5v2./RHN/Uwu38uIwe.0T/dwJjEUc7PHHA6', '2', 'CDYVYZLbDZ5UBfUpSIqxJ1KX9X1KIqODpUEEKemy4JQYVPcURkdl62xu8LLy', '2020-09-05 02:26:13', '2020-09-05 02:26:13', NULL),
(24, 'Marcelo', 'Marcelo@gmail.com', '$2y$10$h6vYHf8PqUroO2qHZqM6o.z5CPBpQhuNLxhpvj.kvTEgpjpXkDHyi', '2', 'pmhucPVpPvCP6MzcLOqpACFpCnHjA2cU1bhFuz1E5m0aLVqMn47Wdip5XxXm', '2020-09-05 02:26:46', '2020-09-05 02:26:46', NULL),
(25, 'Aqueen', 'Aqueen@gmail.com', '$2y$10$aWcNlTfwoLacIqDITgH1Z.FQj2r2gaIsv/Ye8hg0bSAXxD4p95Ruy', '2', 'IZ7kFFJpsDAln3DasyJCEo4Ypy6cS6ToZqRoqUzaw3UNi2X75Y0Pxyg1lxf6', '2020-09-05 02:27:16', '2020-09-05 02:27:16', NULL),
(26, 'Alvino', 'Alvino@gmail.com', '$2y$10$gnppip8ujfpY9UamgAsIC.aPptVtuuAsGWG70EkcfF0AY.ARNUdni', '2', '7sFNor7wONQccjjDB2oRQnq0OCC2KO2ThX5Guu7hjQGznaRltYYoeznSjqwt', '2020-09-05 02:27:45', '2020-09-05 02:27:45', NULL),
(27, 'Brian Edward', 'BrianEdward@gmail.com', '$2y$10$isyW.Jq6ejmwOXFp4Uq.GONKofF4PPbRXf9bprYYp0CObsWBZfOx6', '2', '7vKPWBtXfb4pKp8mqI3QAa41HyxMzfUCWvsXELkV0FkSMty5ghbH10aVT1Et', '2020-09-05 02:28:22', '2020-09-05 02:28:22', NULL),
(28, 'Cleon Louis', 'CleonLouis@gmail.com', '$2y$10$461vKDDGIQKfceIBYq/ON.A9jHE/kYClskOkU7wE4YYe/co1ul5VO', '2', 'vUEWyyYv4MZN0WMwcyXjWDRTf7epgxQcyb4yDYEnOPQzoeaZJUdHrOWLvJzG', '2020-09-05 02:28:55', '2020-09-05 02:28:55', NULL),
(29, 'Giselle Jovilla', 'GiselleJovilla@gmail.com', '$2y$10$qY6EHF9Lm1t1xhT7s0OzqeIYSUsjDM9GDGbWBxkrqhCBPznEXHX6e', '2', 'IXdbUULhsdFHREqlAFexfDj0fmwfKaaFLbvogupzKfyf6NjoF04cPdfc4bzh', '2020-09-05 02:29:30', '2020-09-05 02:29:30', NULL),
(30, 'JasonV', 'JasonV@gmail.com', '$2y$10$2TAYBzfY6KeLjU7iNlhiHuFvCc11IN5jKHKOr7uiCaiBJQcYbNvFi', '2', 'U0jUpFU5BZ2s5mwCwknKhTGmlkBC9LrrEOykJQXgaCTqmBcS4biF6a0cOtS8', '2020-09-05 02:29:58', '2020-09-05 02:29:58', NULL),
(31, 'Jacelyn W', 'JacelynW@gmail.com', '$2y$10$TDmM321p5M1fSLKFJeuIrO0m5AkD4OyvatMfHFWY/ld8USIyOlzpm', '2', 'xOIepdmwv0f2Db3fOIIdewPUdzyC10konDBwSjeS0iF8Ya3ZKTSFpu6equD7', '2020-09-05 02:30:46', '2020-09-05 02:30:46', NULL),
(32, 'Micaelangelo', 'Micaelangelo@gmail.com', '$2y$10$dp6OIGm9nBxEzbPQJ3UJR.ZUe/a1K.E0JnMzlscCJcwPw0TOlwXnq', '2', 'vJYPZgfWirYHhYfMl0qQOdJOIYa3zLrswk2HI8f3e9Gsvfb8b4NitSXvIZZg', '2020-09-05 02:31:17', '2020-09-05 02:31:17', NULL),
(33, 'Sherly T', 'SherlyT@gmail.com', '$2y$10$FctHukNuOQX1XAHuXOWEzOfKGZs09AZHKN3yoPka0y4mxpLbe06Rm', '2', 'l2XZE0eFGBSpNO4TIveicifc5wMQBho1jXXMy9IGITEhSXaWrkn1JodVLvyl', '2020-09-05 02:32:10', '2020-09-05 02:32:10', NULL),
(34, 'Benjamin Ang', 'BenjaminAng@gmail.com', '$2y$10$Yz77vB3ldJyxGnQmd8xVhOriQ8OyVHLJa/JRrJFIb03gqEIB03KGW', '2', 'xX7EkDN1vGS080N9lZSvXb0ud7goKtRGvwejzztgPijKWiiJ7T9iqnfhdxHm', '2020-09-05 02:32:38', '2020-09-05 02:32:38', NULL),
(35, 'Grace C', 'GraceC@gmail.com', '$2y$10$9KufX08e4UzL3R5v4Kqr8uwXQQ7dGZxAyt0nj0mUPp4bs0Jfm3Z22', '2', '1cqfqlQMMyhHmZ06yC8fVzigMwGay1gB9Wf4gnpBpQ2aupaQWPy3tiPbhja4', '2020-09-05 02:33:20', '2020-09-05 02:33:20', NULL),
(36, 'Josh W', 'JoshW@gmail.com', '$2y$10$1sgOXWaNc8StDWiFddHrT.8/T3prgn814BgOyx6S1sb1GRWpSmlO2', '2', 'Ry1u77Dd8kgUjnOuDtAG5RlPWbAk5YG0vD94Mia0PvZTcd0lzn026Yy5lTDK', '2020-09-05 02:33:47', '2020-09-05 02:33:47', NULL),
(37, 'William Dominic', 'WilliamDominic@gmail.com', '$2y$10$9DVIoaMQZoucX/gWhJaZHuHcCGuXBOUhZdv9vSOMPfhmztedfYn8W', '2', 'VTBrwI4N1kOQqaaYiUFwbqB1FFTEThLfSoLLa0mK5N5DbQl2Cqyoa4NJLEoV', '2020-09-05 02:34:19', '2020-09-05 02:34:19', NULL),
(38, 'Jirey', 'Jirey@gmail.com', '$2y$10$hiDdPsZcBbL.mp8qjtu1MOMaGn6yvtzlzn9IQp3G7Hts7Kb4H26mO', '2', 'mk2R3NvVWjj4kxSJfmF1o2wvyK51tDBQq9oEhuox5ftB6fC8g8xfewXjhoum', '2020-09-05 02:34:46', '2020-09-05 02:34:46', NULL),
(39, 'Reysyerine', 'Reysyerine@gmail.com', '$2y$10$xkckp1D9qgElr0CFYDNlh.T9mlQI9xY3MNzqi7qQk9Vx8vqnyyyUC', '2', 'r8XdnMBrIxVyHfGDMl1TlY8zBLbwE1lJoxvCN7PehiVEI1dY5S2wOOn50hjB', '2020-09-05 02:35:37', '2020-09-05 02:35:37', NULL),
(40, 'Elizabeth', 'Elizabeth@gmail.com', '$2y$10$Fv9GmRb1eIZOnl4otEjEWeemX.JMsqSnoKD8SZ8w91ZHZglafCkBu', '2', 'cJ4dXM7lydEqfLU9RU5iFjlyU8F7kkqp0YKe2dWfi20pUzShWHGmX4sjLOE3', '2020-09-05 02:36:06', '2020-09-05 02:36:06', NULL),
(41, 'Excel', 'Excel@gmail.com', '$2y$10$3Ppac6a2rJHguM80Lc5zPedPek6AtqODISjBlUzf.NhVOvn6JLc32', '2', 'BtYtGOr4FRePWIiQ1HiQ2diK73Uy2E4KMcn9JlG6dd8RDBse1Sq2X6SLR5Mi', '2020-09-05 02:36:28', '2020-09-05 02:36:28', NULL),
(42, 'Gladysse', 'Gladysse@gmail.com', '$2y$10$0mkYT6j0GsnwcXlkq/MgpubM/xyqLC5LbvkOFsuEt9BW6TJjvW1KO', '2', 'yyAFE5etT0F4Dl4bTjuUQv3IJK0YjvwlLfeLEZe4gta4sEDWtJWIRWYxuB7l', '2020-09-05 02:38:45', '2020-09-05 02:38:45', NULL),
(43, 'Felicia Kartono', 'FeliciaKartono@gmail.com', '$2y$10$ULNgsHY206VxUxlTnEIENuU9qnr1tUvFaIaj1OpOGE6TRVX.FFEui', '2', 'fpGJLCs5fRfEGXB5su7kXBjIhuocrte0LqwaaKwceYE4iCwkWJDkdxD20JWp', '2020-09-05 02:39:40', '2020-09-05 02:39:40', NULL),
(44, 'Stanley D', 'StanleyD@gmail.com', '$2y$10$Np6AcK7zoI6aPBFX3qBjEuddHwDm0DDfmMTdhvQp25C1TjUVnGRfK', '2', 'M2iD1Z2hL0mwjXNrXvCFpvMeTm5ot8lsl5dGGAHJjWjmBQV5YP4IdoazuQED', '2020-09-05 02:40:13', '2020-09-05 02:40:13', NULL),
(45, 'Kimberly', 'Kimberly@gmail.com', '$2y$10$QzWj3iurj2EKjOpkpjocJO5a7biMQOStYB3Ypbljj7FjDTgoXLp5O', '2', '9EsCp3l5VDKYKTeOYiXZr00Danfb8lcxbq038ZIKOyp5Bs5b2d4GaKHKtajf', '2020-09-05 02:40:40', '2020-09-05 02:40:40', NULL),
(46, 'Valencia Wijaya', 'ValenciaWijaya@gmail.com', '$2y$10$IAiDwk29CQqlg2JxpZdCJuXxn7FQ9cTWMo79YRTCd2oMABFlr360C', '2', '59L8wSLOJsl4gnByIfrlqisPihn3DUvUnGVph6lQjSGr47jti6ULKlnYv0KP', '2020-09-05 02:41:13', '2020-09-05 02:41:13', NULL),
(47, 'Verlyn', 'Verlyn@gmail.com', '$2y$10$gKxp5M8pkhFmhzJ9txEc5eOSl.RfiRwjqVzZmcs79KlghcwLfobs.', '2', 'JaCGqWzq3FPQxTAZLZfyob53yTLCGGSEBZZZwYEPLMNa96QbnvOY6SLjMNpW', '2020-09-05 02:41:52', '2020-09-05 02:41:52', NULL),
(48, 'Audrey', 'Audrey@gmail.com', '$2y$10$eW368fvKsLUBiiOqlyQZSeZGWwqROaQXUWcwjs7P.H5nRLEDedJkK', '2', 'Mh0SBDCCE30FUnIqhneTSJMFKo8WsuNLOGLtJzIZ6Zs5jV1dUHvwJJ66f5UV', '2020-09-05 02:42:15', '2020-09-05 02:42:15', NULL),
(49, 'Derick', 'Derick@gmail.com', '$2y$10$oCYuAKpIEvzXh/27yda6V.ZTUbbVCtn9KeOMeRAUOP77ORucvQEQ6', '2', '7F6v8T8tXtAs9ClT8v04aiYi39FhdKOz4LagroATkhp8SD3hon4eUWRmCQvU', '2020-09-05 02:42:41', '2020-09-05 02:42:41', NULL),
(50, 'Janice W', 'JaniceW@gmail.com', '$2y$10$XApjty43uCvOYPUU6Q4wGe3mO57fWALXbrjJiIFXT8elfaOc5Inqa', '2', 'nwXYW29eF3L9ystliliRItnH5VFYkBa3HjkpNG7ry2eMAFuH5VerlDCvIdp7', '2020-09-05 02:43:09', '2020-09-05 02:43:09', NULL),
(51, 'Jovita', 'Jovita@gmail.com', '$2y$10$cldv2KvBksEQpTqAP84UrumEDw0r/PiyX8I.I0rYEwaIFyb19ce2O', '2', '4fCg24FNw7Br1oXGeiCfTF54oIuL3QUgsSbHk0kd4YBibzR7WSK4el3Am3LC', '2020-09-05 02:43:36', '2020-09-05 02:43:36', NULL),
(52, 'Medelyn', 'Medelyn@gmail.com', '$2y$10$8FKv4vqwm6tTR9MKrLmb6O466nXEYsr0oo/bREXikioZWX7qPHrhK', '2', '9oZHolGbI4ZUY7iuDUYur28UQpJTNt3cYRpBojOtFTJKLqbcAbhLYvHC5OXT', '2020-09-05 02:45:25', '2020-09-05 02:45:25', NULL),
(53, 'Quinara', 'Quinara@gmail.com', '$2y$10$oakNVBdwDRzMDpma17GmeOr2DxRMERYTKTLvWN5COiYzkOupqbRZC', '2', 'x5SciO3m51LFwnCRduCatZxGoIXTkL1SQHviyC6gO4MTp4KvsY6B4q9O2WBq', '2020-09-05 02:45:50', '2020-09-05 02:45:50', NULL),
(54, 'Malyka Prawira', 'MalykaPrawira@gmail.com', '$2y$10$dg10ewu4Vd9Soc89o9JE8e2ZXnsvJTMKjabfJCy/wjtfU941zLZ.y', '2', 'SxPxW8TLvVUgl9QXonouvfVseOXvxsUJyD4vUpJgl0fioPCd5uHabhX4kdUj', '2020-09-05 02:46:28', '2020-09-05 02:46:28', NULL),
(55, 'Cherry', 'Cherry@gmail.com', '$2y$10$5A9OAv90s64DvaH/FZAKZurGrxSZ7ORUm6YdAC5yR5.Jh0vKfqI3a', '2', '1rHIFCO4WKTHxcc3VPZLFRnVRCZMKV4I0Ou49e5i4GT4nATLB4QWykhhgrsu', '2020-09-05 02:46:58', '2020-09-05 02:46:58', NULL),
(56, 'Delbert', 'Delbert@gmail.com', '$2y$10$7tKxgDQquUG2yh6Kf2Uy5uXI0XFHuqht0uPQxLbg1tugvGuwbV2Jm', '2', 'JdJ3l252WnAqyv4eweKI03ppZtnxvL1ykMA2Uky8TcnIE8IMuhsiorGd3Z49', '2020-09-05 02:47:59', '2020-09-05 02:47:59', NULL),
(57, 'Joel', 'Joel@gmail.com', '$2y$10$E1AWieN/TEYxTgqjIiT0K.drBU7yf0o9ZuxW2uGSuFOgfjU/bamSy', '2', 'kN8dzu9crQ4D3AgoiBz3vlUZRBr32OVPM7HOJ4nFpK9W3TD1MxGc1HwkV32u', '2020-09-05 02:48:23', '2020-09-05 02:48:23', NULL),
(58, 'Richard', 'Richard@gmail.com', '$2y$10$8sG6XTIZYQIYt3rYQE7ECeAQLP.azIgChfoIdf/MzMRRkqCFYTuFm', '2', 'IVOD45NTlKCi4J5J1qHvzAzJcsA0VJPu0oFPHImd4WMODiT2shIIR9GQLaH9', '2020-09-05 02:48:58', '2020-09-05 02:48:58', NULL),
(59, 'Velicia', 'Velicia@gmail.com', '$2y$10$o9jAk65wPP0.mVOx55l0VerWhrACtvgPKTOXruldsu/HGaO4L1wJS', '2', 'at4BSQFUMdGpqyPqS6Ahso1N3NSwb6iEKq1XBSQPcXK4e0YRAMhoVjS36KDh', '2020-09-05 02:49:22', '2020-09-05 02:49:22', NULL),
(60, 'Veronica', 'Veronica@gmail.com', '$2y$10$gnLWM9VmsKGCD1ea0f4ZA.Ifxb6Rr4ZYXxjjURFFwUkSYyq6eDwQ.', '2', 'l92sDUfXwdrSEP5Lsja7rTtwtY7FsQtwKTJ93osFInIzLGtNCA0gqtN5FoM5', '2020-09-05 02:49:59', '2020-09-05 02:49:59', NULL),
(61, 'Vienny', 'Vienny@gmail.com', '$2y$10$l7HDrnl4xwgF4Dq2vSajru/h/HS.YKl/hnjkT4qArAZTBV0/VnDgy', '2', 'Df6LNBjnlWfXVrza29IqDJtXNWrpeeDn3HY8aqjWpKT5Um32i7pGfhwzJjxt', '2020-09-05 02:50:19', '2020-09-05 02:50:19', NULL),
(62, 'Archie', 'Archie@gmail.com', '$2y$10$ryZlsFJ.IrjMPd.1i4YogOXfyULabUzQHXGUiRROxpJguLqqhbkRe', '2', 'UiWrDtwJZ7rIcFC28jkSNE91eqlgUgUFQ7REZFI6WB1ws6cKJTLydyPKSO0h', '2020-09-05 02:50:46', '2020-09-05 02:50:46', NULL),
(63, 'Aurellia', 'Aurellia@gmail.com', '$2y$10$wJODvSYMySfMHUUsGe68OeLMNM2Ki7F0Vthnt7GiFhsceFK.NtVNW', '2', 'p1We0GxrgwLFQZP2DcmrPD2bD7RnUwYqYkvMHOhqSWortC0t19faOB7lfICz', '2020-09-05 02:52:00', '2020-09-05 02:52:00', NULL),
(64, 'Chelsea', 'Chelsea@gmail.com', '$2y$10$7/WOVmZ4iBm1DnZrZm.aoeLoZk9yo0J1Vye8UFx4J.mQN39p2B8pe', '2', 'qc6zpR7yK3dHGJOWzLDShbr3zxDIngl0eQbQZq9vMM3kpI5ilTHoQhsU8vUr', '2020-09-05 02:54:47', '2020-09-05 02:54:47', NULL),
(65, 'Hose', 'Hose@gmail.com', '$2y$10$.1Vrh8YexSOg3DNcQJEnJOpyxe2skOK8XPHukN6uQK.SdiUOzzqa2', '2', 'R4sYfjNP8QuNHlNstLHRqaSgOcZcJqHFbbtVPDGd6W8Y6F9nzxuRx4broUYK', '2020-09-05 02:55:41', '2020-09-05 02:55:41', NULL),
(66, 'Dicky', 'Dicky@gmail.com', '$2y$10$cj.7w4NxwLh2bDr7hAiy0uxRazTga0Ey3OX0F0Ruf9w0AdK7t7VI6', '2', 'hI0ju3K9y3hlMv99Fc0JrKsWxkjNasLMctImIc1u8ilHotvvgI5Iko012V6F', '2020-09-05 02:56:02', '2020-09-05 02:56:02', NULL),
(67, 'Jasper', 'Jasper@gmail.com', '$2y$10$IRQcU3Iub3jCsrET/QrsmOrvuprHmxVnaU/GfJKZLhXnG/q4vjm1y', '2', 'fqsdm5Ny1YcvOQtK0SvbiwY8is8LRBZupl1H4aQVnoHsleW84g9pouBU7O55', '2020-09-05 02:56:33', '2020-09-05 02:56:33', NULL),
(68, 'Angeline', 'Angeline@gmail.com', '$2y$10$VWQ6Al1HmbJ6RZWRmChmm.teQ25lXT5myAs7v/DvJ229QNQe7jh0O', '2', 'keff9fUZZGf2253fTjgYb0bYsuyGDJbGS9JQBMB8rMC02M8pX4pUSv4mzZ4H', '2020-09-05 02:56:55', '2020-09-05 02:56:55', NULL),
(69, 'Febrian', 'Febrian@gmail.com', '$2y$10$Gid9NejzxgRIs413pOtLH.LmECBmhfJZxOyUJiFRkBIJxQBbUo.dC', '2', 'XRbg6YtdbXofcB7yhoYWYoYrgRaFjCz6wFWNRWUYc7ae39xxrgmDoZb4NC2O', '2020-09-05 02:57:28', '2020-09-05 02:57:28', NULL),
(70, 'Graciella', 'Graciella@gmail.com', '$2y$10$fEQFS6AyfyoePa4O5yB2QOC2CzP73HmFBLA5mZ8LqvxmS0H/JIDFi', '2', 'l7l4Jw6KjA27JIzhq91WhvNeejbbp0V72X4yX156OboAkHhnt5qq83N4TB4r', '2020-09-05 02:57:59', '2020-09-05 02:57:59', NULL),
(71, 'Justin D', 'JustinD@gmail.com', '$2y$10$rqvTle/Lc4XKRentCEUu4edGpTgmr5Z6ESlruC1DVSjXTyDGcd2Z2', '2', 'jxvXucOF0JHIEKxBnfPhowkn1UZjgp0umbFLQOs6sz7J1WUAnwRpaW6DxgdI', '2020-09-05 02:58:20', '2020-09-05 02:58:20', NULL),
(72, 'Kevin F', 'KevinF@gmail.com', '$2y$10$UJs8r72AjLIev1TaHDS7l.YiAlQFnrhc/RWhxh0wX0YzTmFSvK40S', '2', 'XiionPJuhuIUEAyqspxHuHRcW8qAyFT5mQaP9PCsKvjcwUrKjKEp35cZny42', '2020-09-05 02:58:43', '2020-09-05 02:58:43', NULL),
(73, 'Michelle', 'Michelle@gmail.com', '$2y$10$6FIB83KF.yF4on3lmgqoWeWphjJffzo9SPxVjPDauGbreEsm/2jIO', '2', 'usRCgFE3VTFYWwiOUA2eSoX4NKlnViV4hYEn4VengewcmsE8z1YAMYtuZH7x', '2020-09-05 02:59:09', '2020-09-05 02:59:09', NULL),
(74, 'Daniel', 'Daniel@gmail.com', '$2y$10$2595j41MPNYsD7vOdn6aaeF0/fmOsIroBq1HbNkZYIaAJSIfP0hOO', '2', '1fXUbGWo9sOEacOJTmNMBGOtk32GvYNWvNFCbJ16SFiR3XgrpuuFOOheZHz7', '2020-09-05 02:59:31', '2020-09-05 02:59:31', NULL),
(75, 'Andreas', 'Andreas@gmail.com', '$2y$10$iBWAVOb2vruQhIfHRZIJaea1eXX.vFqn2t1MV3P1J8MjXh/CuHtfu', '2', 'h4VvHJ8qI2IEuAx65vz6OwQRFcD8HRjWpCp5WvwUObHY9s17PMOonKbFS1FW', '2020-09-05 02:59:51', '2020-09-05 02:59:51', NULL),
(76, 'Evonne', 'Evonne@gmail.com', '$2y$10$tMqtERG1ludaMk/zO8NQWuFLTmp2e8kTTxRGFgoolXPtCxRQziQGW', '2', 'h2gtmqL1ISbbt2GygMMtN4gRMtRsM0U5ugBUbhWIIgh7PZg86uXgddqjmGl0', '2020-09-05 03:00:11', '2020-09-05 03:00:11', NULL),
(77, 'Novella', 'Novella@gmail.com', '$2y$10$VLPeEBfENIQBGDUOmCSLy.Ol3sTFn/ABQY5RR5.nAT..xwWLuJtE.', '2', 'hDHC0XDwkgETVnDEJlC3XK5oboLxBchpKGnig4Y4AeYbBztoc0bVxaoUD3jd', '2020-09-05 03:00:28', '2020-09-05 03:00:28', NULL),
(78, 'Kayla', 'Kayla@gmail.com', '$2y$10$igYjrfeslBCbPbNbZ7iVGeVZIGNqCa.oWh4b2hpLTmgne.1Q6xJbW', '2', 'aRV0VBrS9Fgs61xvuMC2rC7zrq8OOLMPyhdjupT5WjQh4PoOVJMsYQGHWZyg', '2020-09-05 03:00:55', '2020-09-05 03:00:55', NULL),
(79, 'Thoriq', 'Thoriq@gmail.com', '$2y$10$Pd1Ox9LdHIZmoUc8.G8c7.AZ7q6qq4F0MppTREOO7qf19clkrux5O', '2', '6f8YRWvIW9UvU2idqhiGq02BdeDTQyIqg9TMLsIpzMRSpjbQxCdK4djQyNR0', '2020-09-05 03:01:21', '2020-09-05 03:01:21', NULL),
(80, 'Violla', 'Violla@gmail.com', '$2y$10$tTaBCMO/AoXP.GX8uW9E8.hg67QML4jnRxJ9xv3vPstM6h1K0njyO', '2', 'JA3rBLxapQHfFxZDZlqIwygwg0ssAx28PNAJtjW4Ex6Q6WQqPGReeB1R3CR4', '2020-09-05 03:01:54', '2020-09-05 03:01:54', NULL),
(81, 'Fiona Bella', 'FionaBella@gmail.com', '$2y$10$3kUxepfp2/apPQqqXYq22uoQ98DjtYHASk4sCAPjdCb2WJRLfwBJK', '2', 'FlSL8LrB8vMMDoC4Y8UssJHYFpuZjcDHO0B8iCCTV4kB1L7xqpj7p8jP10Ou', '2020-09-05 03:02:17', '2020-09-05 03:02:17', NULL),
(84, 'Heksa Kusuma', 'siswa@gmail.com', '$2y$10$cfILPwHww659dAY3195tWeVpwD9QnOZfpE2d46FYvxQI3P8/bWnve', '2', '3mPj4yc0FkBVSnV1tgzQAeVCFVfgofMDt5dPKt49E8P4hZcpZMSb9FYa1PyV', '2020-09-08 12:19:18', '2020-09-08 12:19:18', 15),
(85, 'Dedi Santoso', 'siswa1@gmail.com', '$2y$10$p8yNFVa/9Mt.CH/G4stqHuK4Gr956gSUNwR3T2PzVlNXWSUKnQveC', '2', '8D0v5QKfM5vT3cDuY0xw4rGJJawmJL806U0zMLCLcUzKuQW87YNydyRK2SPZ', '2020-09-08 12:19:52', '2020-09-08 12:19:52', 15),
(86, 'Heriawan', 'guru@gmail.com', '$2y$10$11oGqA4ddXVb7psq0tLcU.AF6rYYQsVEEDx9n76i9usQ2rGTHdJlC', '1', NULL, '2020-09-08 15:11:18', '2020-09-08 15:11:18', NULL),
(87, 'Suparman', 'guru1@gmail.com', 'guru1guru1', '1', NULL, '2020-09-08 15:11:35', '2020-09-08 15:11:35', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawabs`
--
ALTER TABLE `jawabs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapels`
--
ALTER TABLE `mapels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materis`
--
ALTER TABLE `materis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `soals`
--
ALTER TABLE `soals`
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
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jawabs`
--
ALTER TABLE `jawabs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `materis`
--
ALTER TABLE `materis`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soals`
--
ALTER TABLE `soals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
