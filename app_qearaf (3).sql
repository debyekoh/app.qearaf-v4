-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Agu 2023 pada 11.06
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_qearaf`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'SuAdmin', 'Super Admin'),
(2, 'Admin', 'Admin'),
(3, 'Reseller', 'Reseller'),
(4, 'User', 'User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(4, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(3, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'rf.otomotive@gmail.com', 1, '2023-06-26 08:13:57', 1),
(2, '::1', 'rf.otomotive@gmail.com', 1, '2023-06-26 10:06:47', 1),
(3, '::1', 'rf.otomotive@gmail.com', 1, '2023-06-26 12:43:17', 1),
(4, '::1', 'qea.lazada@gmail.com', 2, '2023-06-26 14:06:40', 1),
(5, '::1', 'rf.otomotive@gmail.com', 1, '2023-06-26 14:15:24', 1),
(6, '::1', 'rf.otomotive@gmail.com', 1, '2023-06-26 14:16:51', 1),
(7, '::1', 'qea.lazada@gmail.com', 2, '2023-06-26 14:21:14', 1),
(8, '::1', 'rf.otomotive@gmail.com', 1, '2023-06-26 14:55:32', 1),
(9, '::1', 'rf.otomotive@gmail.com', 1, '2023-06-26 14:58:37', 1),
(10, '::1', 'qealazada', NULL, '2023-06-26 15:03:59', 0),
(11, '::1', 'qea.lazada@gmail.com', 2, '2023-06-26 15:04:06', 1),
(12, '::1', 'rf.otomotive@gmail.com', 1, '2023-06-26 15:06:01', 1),
(13, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-04 13:32:21', 1),
(14, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-04 15:53:06', 1),
(15, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-05 09:14:56', 1),
(16, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-05 10:54:01', 1),
(17, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-05 10:58:49', 1),
(18, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-05 11:23:52', 1),
(19, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-05 15:00:44', 1),
(20, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-06 07:55:05', 1),
(21, '::1', 'qea.lazada@gmail.com', 2, '2023-07-06 08:08:48', 1),
(22, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-06 08:25:24', 1),
(23, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-06 11:28:35', 1),
(24, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-07 07:33:23', 1),
(25, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-07 07:41:58', 1),
(26, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-07 12:52:41', 1),
(27, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-07 15:30:01', 1),
(28, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-08 07:36:53', 1),
(29, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-08 12:46:15', 1),
(30, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-08 13:41:58', 1),
(31, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-10 08:47:11', 1),
(32, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-10 08:51:24', 1),
(33, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-10 09:24:03', 1),
(34, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-10 10:22:21', 1),
(35, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-10 10:28:23', 1),
(36, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-10 10:29:06', 1),
(37, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-10 10:46:39', 1),
(38, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-10 10:47:44', 1),
(39, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-10 10:50:07', 1),
(40, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-10 14:42:42', 1),
(41, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-11 08:13:08', 1),
(42, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-11 09:52:07', 1),
(43, '::1', 'qea.lazada@gmail.com', 2, '2023-07-11 12:42:43', 1),
(44, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-11 12:51:18', 1),
(45, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-11 15:48:59', 1),
(46, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-11 15:59:41', 1),
(47, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-12 08:51:56', 1),
(48, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-12 09:11:56', 1),
(49, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-12 09:44:05', 1),
(50, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-12 10:53:20', 1),
(51, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-12 12:33:23', 1),
(52, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-13 08:17:12', 1),
(53, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-13 08:21:54', 1),
(54, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-13 08:29:42', 1),
(55, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-13 08:51:52', 1),
(56, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-13 11:00:11', 1),
(57, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-13 11:19:58', 1),
(58, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-13 11:23:24', 1),
(59, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-13 13:59:56', 1),
(60, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-14 07:34:50', 1),
(61, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-14 08:24:50', 1),
(62, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-14 08:37:52', 1),
(63, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-14 08:38:41', 1),
(64, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-14 10:29:35', 1),
(65, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-14 10:51:05', 1),
(66, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-14 13:45:13', 1),
(67, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-14 16:01:23', 1),
(68, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-20 10:46:14', 1),
(69, '::1', 'qea.lazada@gmail.com', 2, '2023-07-20 11:14:15', 1),
(70, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-20 13:34:55', 1),
(71, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-20 14:39:30', 1),
(72, '::1', 'qearafowner', NULL, '2023-07-21 07:32:29', 0),
(73, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-21 07:32:35', 1),
(74, '::1', 'qearafowner', NULL, '2023-07-21 07:33:12', 0),
(75, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-21 07:33:41', 1),
(76, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-21 07:45:00', 1),
(77, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-21 07:51:32', 1),
(78, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-21 08:30:29', 1),
(79, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-21 08:51:26', 1),
(80, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-21 08:58:52', 1),
(81, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-21 09:09:37', 1),
(82, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-21 09:15:43', 1),
(83, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-21 09:24:17', 1),
(84, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-21 10:45:11', 1),
(85, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-21 14:14:26', 1),
(86, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-21 15:31:36', 1),
(87, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-24 09:50:03', 1),
(88, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-24 10:14:39', 1),
(89, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-24 10:15:39', 1),
(90, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-24 10:48:14', 1),
(91, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-24 10:57:47', 1),
(92, '::1', 'test@test.com', NULL, '2023-07-24 12:47:41', 0),
(93, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-24 12:49:56', 1),
(94, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-24 13:54:54', 1),
(95, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-24 13:58:55', 1),
(96, '::1', 'qea.lazada@gmail.com', 2, '2023-07-24 14:38:01', 1),
(97, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-24 14:39:12', 1),
(98, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-24 15:55:21', 1),
(99, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-24 16:03:46', 1),
(100, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-25 07:55:05', 1),
(101, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-25 08:08:40', 1),
(102, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-25 08:27:44', 1),
(103, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-25 08:30:25', 1),
(104, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-25 08:48:34', 1),
(105, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-25 09:19:32', 1),
(106, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-25 09:56:26', 1),
(107, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-25 10:00:10', 1),
(108, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-25 14:26:40', 1),
(109, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-26 10:52:41', 1),
(110, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-26 14:40:14', 1),
(111, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-26 14:49:22', 1),
(112, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-26 14:52:43', 1),
(113, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-26 15:32:36', 1),
(114, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-26 15:40:04', 1),
(115, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-27 07:51:00', 1),
(116, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-27 11:37:34', 1),
(117, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-27 12:31:09', 1),
(118, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-27 12:58:07', 1),
(119, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-27 12:59:12', 1),
(120, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-27 13:02:20', 1),
(121, '::1', 'qearafowner', NULL, '2023-07-27 13:08:09', 0),
(122, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-27 13:08:13', 1),
(123, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-27 14:10:05', 1),
(124, '::1', 'qea.lazada@gmail.com', 2, '2023-07-27 15:10:38', 1),
(125, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-27 15:10:55', 1),
(126, '::1', 'qea.lazada@gmail.com', 2, '2023-07-27 15:39:47', 1),
(127, '::1', 'test@test.com', NULL, '2023-07-27 15:43:43', 0),
(128, '::1', 'test1@test.com', 3, '2023-07-27 15:44:06', 1),
(129, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-27 15:45:02', 1),
(130, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-28 09:27:38', 1),
(131, '::1', 'rf.otomotive@gmail.com', 1, '2023-07-31 08:22:25', 1),
(132, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-01 08:42:53', 1),
(133, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-01 08:51:58', 1),
(134, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-01 12:27:05', 1),
(135, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-01 14:12:13', 1),
(136, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-01 15:47:07', 1),
(137, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-02 07:32:22', 1),
(138, '::1', 'qea.lazada@gmail.com', 2, '2023-08-02 09:59:23', 1),
(139, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-02 10:02:21', 1),
(140, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-02 14:48:55', 1),
(141, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-02 15:12:20', 1),
(142, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-03 11:33:00', 1),
(143, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-07 12:27:46', 1),
(144, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-07 12:52:02', 1),
(145, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-07 13:00:35', 1),
(146, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-07 13:30:59', 1),
(147, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-07 15:41:46', 1),
(148, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-07 16:08:12', 1),
(149, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 09:16:33', 1),
(150, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 11:27:50', 1),
(151, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 11:47:19', 1),
(152, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 12:53:08', 1),
(153, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 13:04:01', 1),
(154, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 13:04:52', 1),
(155, '::1', 'dsagfdsgdsg', NULL, '2023-08-08 13:25:32', 0),
(156, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 13:25:41', 1),
(157, '::1', 'qea.lazada@gmail.com', 2, '2023-08-08 14:47:20', 1),
(158, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 14:47:50', 1),
(159, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 15:50:29', 1),
(160, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 15:56:32', 1),
(161, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 15:56:58', 1),
(162, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 15:57:46', 1),
(163, '::1', 'qearafowner', NULL, '2023-08-08 15:58:05', 0),
(164, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 15:58:45', 1),
(165, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 15:58:48', 1),
(166, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 15:58:49', 1),
(167, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 15:58:52', 1),
(168, '::1', 'qearafowner', NULL, '2023-08-08 15:59:27', 0),
(169, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 15:59:32', 1),
(170, '::1', 'qearafowner', NULL, '2023-08-08 16:00:05', 0),
(171, '::1', 'qearafowner', NULL, '2023-08-08 16:00:30', 0),
(172, '::1', 'qearafowner', NULL, '2023-08-08 16:00:46', 0),
(173, '::1', 'qearafowner', NULL, '2023-08-08 16:01:42', 0),
(174, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 16:01:47', 1),
(175, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 16:02:02', 1),
(176, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 16:02:51', 1),
(177, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 16:03:04', 1),
(178, '::1', 'qearafowner', NULL, '2023-08-08 16:05:03', 0),
(179, '::1', 'qearafowner', NULL, '2023-08-08 16:05:16', 0),
(180, '::1', 'qearafowner', NULL, '2023-08-08 16:05:17', 0),
(181, '::1', 'qearafowner', NULL, '2023-08-08 16:05:18', 0),
(182, '::1', 'qearafowner', NULL, '2023-08-08 16:05:19', 0),
(183, '::1', 'qearafowner', NULL, '2023-08-08 16:05:20', 0),
(184, '::1', 'qearafowner', NULL, '2023-08-08 16:05:20', 0),
(185, '::1', 'qearafowner', NULL, '2023-08-08 16:05:21', 0),
(186, '::1', 'qearafowner', NULL, '2023-08-08 16:05:22', 0),
(187, '::1', 'qearafowner', NULL, '2023-08-08 16:05:22', 0),
(188, '::1', 'qearafowner', NULL, '2023-08-08 16:05:23', 0),
(189, '::1', 'qearafowner', NULL, '2023-08-08 16:05:23', 0),
(190, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 16:05:39', 1),
(191, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 16:07:42', 1),
(192, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 16:07:59', 1),
(193, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 16:09:03', 1),
(194, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-08 16:11:12', 1),
(195, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 07:28:09', 1),
(196, '::1', 'qearafowner', NULL, '2023-08-09 07:28:17', 0),
(197, '::1', 'qearafowner', NULL, '2023-08-09 07:29:49', 0),
(198, '::1', 'qearafowner', NULL, '2023-08-09 07:31:09', 0),
(199, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 07:31:27', 1),
(200, '::1', 'qearafowner', NULL, '2023-08-09 07:31:35', 0),
(201, '::1', 'qearafowner', NULL, '2023-08-09 07:32:31', 0),
(202, '::1', 'qearafowner', NULL, '2023-08-09 07:32:33', 0),
(203, '::1', 'qearafowner', NULL, '2023-08-09 07:32:34', 0),
(204, '::1', 'qearafowner', NULL, '2023-08-09 07:32:35', 0),
(205, '::1', 'qearafowner', NULL, '2023-08-09 07:32:35', 0),
(206, '::1', 'qearafowner', NULL, '2023-08-09 07:32:37', 0),
(207, '::1', 'qearafowner', NULL, '2023-08-09 07:32:38', 0),
(208, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 07:32:45', 1),
(209, '::1', 'qearafowner', NULL, '2023-08-09 07:51:14', 0),
(210, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 07:51:33', 1),
(211, '::1', 'qearafowner', NULL, '2023-08-09 07:52:15', 0),
(212, '::1', 'qearafowner', NULL, '2023-08-09 07:53:58', 0),
(213, '::1', 'qearafowner', NULL, '2023-08-09 07:54:04', 0),
(214, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 07:54:23', 1),
(215, '::1', 'qearafowner', NULL, '2023-08-09 07:54:26', 0),
(216, '::1', 'qearafowner', NULL, '2023-08-09 07:54:34', 0),
(217, '::1', 'qearafowner', NULL, '2023-08-09 07:54:58', 0),
(218, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 07:55:14', 1),
(219, '::1', 'qearafowner', NULL, '2023-08-09 08:01:54', 0),
(220, '::1', 'qearafowner', NULL, '2023-08-09 08:01:54', 0),
(221, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 08:02:00', 1),
(222, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 10:45:23', 1),
(223, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 10:45:28', 1),
(224, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 10:50:00', 1),
(225, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 10:51:40', 1),
(226, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 10:54:57', 1),
(227, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 10:56:02', 1),
(228, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 10:56:17', 1),
(229, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 10:56:22', 1),
(230, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 10:57:19', 1),
(231, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 10:57:37', 1),
(232, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 10:59:57', 1),
(233, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:00:39', 1),
(234, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:01:05', 1),
(235, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:01:37', 1),
(236, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:01:41', 1),
(237, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:02:38', 1),
(238, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:02:58', 1),
(239, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:04:20', 1),
(240, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:05:31', 1),
(241, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:06:15', 1),
(242, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:06:34', 1),
(243, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:07:19', 1),
(244, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:09:07', 1),
(245, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:11:08', 1),
(246, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:11:16', 1),
(247, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:11:54', 1),
(248, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:16:48', 1),
(249, '::1', 'qearafowner', NULL, '2023-08-09 11:17:21', 0),
(250, '::1', 'qearafowner', NULL, '2023-08-09 11:17:22', 0),
(251, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:17:26', 1),
(252, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:18:50', 1),
(253, '::1', 'qearafowner', NULL, '2023-08-09 11:19:38', 0),
(254, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:19:43', 1),
(255, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:21:06', 1),
(256, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:22:08', 1),
(257, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:22:23', 1),
(258, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:22:40', 1),
(259, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:23:41', 1),
(260, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:25:20', 1),
(261, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:25:46', 1),
(262, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:26:01', 1),
(263, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:26:57', 1),
(264, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:27:37', 1),
(265, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:28:04', 1),
(266, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:29:14', 1),
(267, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:29:46', 1),
(268, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:30:29', 1),
(269, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:31:00', 1),
(270, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:31:29', 1),
(271, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:31:40', 1),
(272, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:33:31', 1),
(273, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:33:52', 1),
(274, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:34:21', 1),
(275, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:34:51', 1),
(276, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:35:13', 1),
(277, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:35:41', 1),
(278, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:35:56', 1),
(279, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:36:07', 1),
(280, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:36:33', 1),
(281, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:36:54', 1),
(282, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:37:08', 1),
(283, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:37:34', 1),
(284, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:37:48', 1),
(285, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:38:42', 1),
(286, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:39:04', 1),
(287, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:40:33', 1),
(288, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:41:34', 1),
(289, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:41:57', 1),
(290, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:42:19', 1),
(291, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:42:51', 1),
(292, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:44:40', 1),
(293, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 11:44:53', 1),
(294, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 12:28:03', 1),
(295, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 12:31:11', 1),
(296, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 12:32:16', 1),
(297, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 12:33:16', 1),
(298, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 12:33:52', 1),
(299, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 12:34:25', 1),
(300, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 12:34:39', 1),
(301, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 12:34:59', 1),
(302, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 12:35:27', 1),
(303, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 12:37:10', 1),
(304, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 12:37:27', 1),
(305, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 12:37:33', 1),
(306, '::1', 'qearafowner', NULL, '2023-08-09 12:47:58', 0),
(307, '::1', 'qearafowner', NULL, '2023-08-09 12:51:24', 0),
(308, '::1', 'qearafowner', NULL, '2023-08-09 12:51:40', 0),
(309, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 12:53:36', 1),
(310, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 12:58:13', 1),
(311, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:07:57', 1),
(312, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:08:03', 1),
(313, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:08:12', 1),
(314, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:08:26', 1),
(315, '::1', 'qearafowner', NULL, '2023-08-09 13:08:48', 0),
(316, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:09:02', 1),
(317, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:09:12', 1),
(318, '::1', 'qearafowner', NULL, '2023-08-09 13:09:38', 0),
(319, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:09:43', 1),
(320, '::1', 'qearafowner', NULL, '2023-08-09 13:10:27', 0),
(321, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:13:31', 1),
(322, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:14:24', 1),
(323, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:14:55', 1),
(324, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:15:57', 1),
(325, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:16:24', 1),
(326, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:19:47', 1),
(327, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:21:12', 1),
(328, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:21:28', 1),
(329, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:21:42', 1),
(330, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:22:01', 1),
(331, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:22:07', 1),
(332, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:24:58', 1),
(333, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:25:56', 1),
(334, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:26:15', 1),
(335, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:28:50', 1),
(336, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:30:53', 1),
(337, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:35:13', 1),
(338, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:36:15', 1),
(339, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:37:02', 1),
(340, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:44:48', 1),
(341, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:45:06', 1),
(342, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:47:26', 1),
(343, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:49:05', 1),
(344, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:51:30', 1),
(345, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:52:59', 1),
(346, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:53:24', 1),
(347, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:53:52', 1),
(348, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:54:52', 1),
(349, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:55:39', 1),
(350, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:55:52', 1),
(351, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:57:19', 1),
(352, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:57:27', 1),
(353, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 13:59:26', 1),
(354, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:00:11', 1),
(355, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:00:44', 1),
(356, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:00:58', 1),
(357, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:01:05', 1),
(358, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:01:27', 1),
(359, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:01:54', 1),
(360, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:03:05', 1),
(361, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:03:22', 1),
(362, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:03:56', 1),
(363, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:04:25', 1),
(364, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:04:41', 1),
(365, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:09:48', 1),
(366, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:10:21', 1),
(367, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:11:17', 1),
(368, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:13:28', 1),
(369, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:16:14', 1),
(370, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:17:02', 1),
(371, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:23:56', 1),
(372, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:24:29', 1),
(373, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:25:28', 1),
(374, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:25:40', 1),
(375, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:26:21', 1),
(376, '::1', 'qearafowner', NULL, '2023-08-09 14:26:22', 0),
(377, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:31:22', 1),
(378, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:31:37', 1),
(379, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:31:48', 1),
(380, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:51:29', 1),
(381, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:54:58', 1),
(382, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:55:51', 1),
(383, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:57:02', 1),
(384, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:58:18', 1),
(385, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 14:59:57', 1),
(386, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 15:00:15', 1),
(387, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 15:04:41', 1),
(388, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 15:04:58', 1),
(389, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 15:07:35', 1),
(390, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 15:07:59', 1),
(391, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 15:08:36', 1),
(392, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 15:08:52', 1),
(393, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 15:09:43', 1),
(394, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 15:10:10', 1),
(395, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 15:35:22', 1),
(396, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 15:35:39', 1),
(397, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 15:36:25', 1),
(398, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 15:43:20', 1),
(399, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 15:49:07', 1),
(400, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 15:49:35', 1),
(401, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 15:53:43', 1),
(402, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 15:57:32', 1),
(403, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 15:58:16', 1),
(404, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 16:02:04', 1),
(405, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 16:02:31', 1),
(406, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 16:03:20', 1),
(407, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 16:04:37', 1),
(408, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 16:10:59', 1),
(409, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 16:11:18', 1),
(410, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-09 16:12:48', 1),
(411, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 07:28:54', 1),
(412, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 07:29:24', 1),
(413, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 08:24:33', 1),
(414, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 08:26:20', 1),
(415, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 08:38:37', 1),
(416, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 08:41:18', 1),
(417, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 08:47:57', 1),
(418, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 08:48:23', 1),
(419, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 08:51:23', 1),
(420, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 08:54:15', 1),
(421, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 08:56:11', 1),
(422, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 09:05:07', 1),
(423, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 09:24:35', 1),
(424, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 09:26:24', 1),
(425, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 09:28:59', 1),
(426, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 09:29:27', 1),
(427, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 09:29:46', 1),
(428, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 09:46:07', 1),
(429, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 09:48:35', 1),
(430, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 09:49:16', 1),
(431, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 09:49:33', 1),
(432, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 09:50:04', 1),
(433, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 09:50:52', 1),
(434, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 09:51:54', 1),
(435, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 09:52:30', 1),
(436, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 09:52:49', 1),
(437, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 09:53:24', 1),
(438, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 09:54:05', 1),
(439, '::1', 'qearafowner', NULL, '2023-08-10 10:04:31', 0),
(440, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 10:04:40', 1),
(441, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 10:05:55', 1),
(442, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 10:07:06', 1),
(443, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 10:08:09', 1),
(444, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 10:12:26', 1),
(445, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 10:14:09', 1),
(446, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 10:14:14', 1),
(447, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 10:14:37', 1),
(448, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 10:17:43', 1),
(449, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 10:18:19', 1),
(450, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 10:21:47', 1),
(451, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 10:33:26', 1),
(452, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 10:34:39', 1),
(453, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 10:36:12', 1),
(454, '::1', 'qearafowner', NULL, '2023-08-10 10:39:20', 0),
(455, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 10:39:26', 1),
(456, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 10:39:33', 1),
(457, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 10:42:02', 1),
(458, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 11:39:26', 1),
(459, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 11:39:45', 1),
(460, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 13:34:17', 1),
(461, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 13:43:28', 1),
(462, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 14:59:01', 1),
(463, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 15:03:26', 1),
(464, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 15:08:01', 1),
(465, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 15:10:27', 1),
(466, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 15:56:49', 1),
(467, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 16:11:28', 1),
(468, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-10 16:11:34', 1),
(469, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-11 07:29:55', 1),
(470, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-11 07:35:44', 1),
(471, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-11 07:43:14', 1),
(472, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-11 07:45:18', 1),
(473, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-11 07:52:11', 1),
(474, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-11 13:07:18', 1),
(475, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-11 13:26:18', 1),
(476, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-11 15:37:07', 1),
(477, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-11 15:39:14', 1),
(478, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-14 10:01:41', 1),
(479, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-14 15:03:50', 1),
(480, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-14 15:47:39', 1),
(481, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-14 15:53:55', 1),
(482, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-14 16:03:42', 1),
(483, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-15 07:29:53', 1),
(484, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-15 08:58:39', 1),
(485, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-15 09:49:45', 1),
(486, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-15 10:03:43', 1),
(487, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-15 10:09:39', 1),
(488, '::1', 'qearafowner', NULL, '2023-08-15 14:11:09', 0),
(489, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-15 14:11:14', 1),
(490, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-16 08:43:39', 1),
(491, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-18 08:28:47', 1),
(492, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-18 11:15:27', 1),
(493, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-18 12:42:19', 1),
(494, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-18 13:01:09', 1),
(495, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-18 13:05:34', 1),
(496, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-18 13:10:14', 1),
(497, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-18 13:22:30', 1),
(498, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-18 13:57:11', 1),
(499, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-18 14:00:00', 1),
(500, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-18 14:03:45', 1),
(501, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-21 14:02:25', 1),
(502, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-21 15:59:33', 1),
(503, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-21 16:09:33', 1),
(504, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-22 07:33:53', 1),
(505, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-22 07:45:16', 1),
(506, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-22 07:50:28', 1),
(507, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-22 11:02:21', 1),
(508, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-22 11:10:22', 1),
(509, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-22 11:17:22', 1),
(510, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-22 11:25:50', 1),
(511, '::1', 'deby.qearaf', NULL, '2023-08-22 12:38:21', 0),
(512, '::1', 'deby.qearaf', NULL, '2023-08-22 12:38:26', 0),
(513, '::1', 'owner.qearaf', NULL, '2023-08-22 12:38:40', 0),
(514, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-22 12:39:06', 1),
(515, '::1', 'ownerqearaf', NULL, '2023-08-22 13:42:46', 0),
(516, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-22 13:43:04', 1),
(517, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-22 13:45:15', 1),
(518, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-22 13:55:26', 1),
(519, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-22 14:11:20', 1),
(520, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-22 14:15:14', 1),
(521, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-22 14:47:33', 1),
(522, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-22 15:06:28', 1),
(523, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-23 12:45:53', 1),
(524, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-23 13:28:44', 1),
(525, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-23 13:50:00', 1),
(526, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-23 16:08:50', 1),
(527, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-24 11:02:15', 1),
(528, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-24 14:03:06', 1),
(529, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-24 14:15:15', 1),
(530, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-24 14:43:05', 1),
(531, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-24 15:40:55', 1),
(532, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-24 15:59:36', 1),
(533, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-24 16:09:37', 1),
(534, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-24 16:10:18', 1),
(535, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-25 07:56:17', 1),
(536, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-25 08:22:57', 1),
(537, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-25 10:04:27', 1),
(538, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-25 10:28:19', 1),
(539, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-26 07:32:29', 1),
(540, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-26 15:41:06', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'Create', 'Create'),
(2, 'Update', 'Update'),
(3, 'Delete', 'Delete'),
(4, 'Read', 'Read');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `balance_account`
--

CREATE TABLE `balance_account` (
  `balance_userid` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `value_account` float NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `balance_account`
--

INSERT INTO `balance_account` (`balance_userid`, `value_account`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 188050, 0, '2023-08-08 10:45:28', '2023-08-18 14:25:34', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `balance_account_log`
--

CREATE TABLE `balance_account_log` (
  `balance_userid_log` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `log_key` varchar(255) NOT NULL,
  `log_code` varchar(255) NOT NULL,
  `log_description` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `last_value` float NOT NULL,
  `trans_value` float NOT NULL,
  `new_value` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `balance_account_log`
--

INSERT INTO `balance_account_log` (`balance_userid_log`, `log_key`, `log_code`, `log_description`, `link`, `last_value`, `trans_value`, `new_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '230810/IN/0001', 'IN-FEWAL', 'Withdraw From 5013456e', 'balance', 2200000, 580000, 2780000, '2023-08-10 10:21:48', '2023-08-10 10:21:48', NULL),
(1, '230810/IN/0002', 'IN-FEWAL', 'Withdraw From 777ab718', 'balance', 2780000, 524000, 3304000, '2023-08-10 10:33:27', '2023-08-10 10:33:27', NULL),
(1, '230810/IN/0003', 'IN-FEWAL', 'Withdraw From fc701eff', 'balance', 3304000, 954500, 4258500, '2023-08-10 10:34:39', '2023-08-10 10:34:39', NULL),
(1, '230810/IN/0004', 'IN-FEWAL', 'Withdraw From 5013456e', 'balance', 4258500, 568524, 4827020, '2023-08-10 10:36:15', '2023-08-10 10:36:15', NULL),
(1, '230810/IN/0005', 'IN-FEWAL', 'Withdraw From 777ab718', 'balance', 4827020, 54332, 4881350, '2023-08-10 10:39:35', '2023-08-10 10:39:35', NULL),
(1, '230810/IN/0006', 'IN-FEWAL', 'Withdraw From fc701eff', 'balance', 4881350, 546698, 5428050, '2023-08-10 10:42:03', '2023-08-10 10:42:03', NULL),
(1, '230810/IN/0007', 'IN-FEWAL', 'Withdraw From 5013456e', 'balance', 5428050, 272000, 5700050, '2023-08-10 11:39:27', '2023-08-10 11:39:27', NULL),
(1, '230810/IN/0008', 'IN-FEWAL', 'Withdraw From 777ab718', 'balance', 5700050, 305000, 6005050, '2023-08-10 11:39:46', '2023-08-10 11:39:46', NULL),
(1, '230810/IN/0009', 'IN-FEWAL', 'Withdraw From 777ab718', 'balance', 6005050, 110000, 6115050, '2023-08-10 15:03:27', '2023-08-10 15:03:27', NULL),
(1, '230810/IN/0010', 'IN-FEWAL', 'Withdraw From 777ab718', 'balance', 6115050, 60000, 6175050, '2023-08-10 15:08:02', '2023-08-10 15:08:02', NULL),
(1, '230810/IN/0011', 'IN-FEWAL', 'Withdraw From 777ab718', 'balance', 6175050, 265000, 6440050, '2023-08-10 15:10:28', '2023-08-10 15:10:28', NULL),
(1, '230810/IN/0012', 'IN-FEWAL', 'Withdraw From 777ab718', 'balance', 6440050, 350000, 6790050, '2023-08-10 15:56:50', '2023-08-10 15:56:50', NULL),
(1, '230810/IN/0013', 'IN-FEWAL', 'Withdraw From 5013456e', 'balance', 6790050, 10000, 6800050, '2023-08-10 16:11:29', '2023-08-10 16:11:29', NULL),
(1, '230810/IN/0014', 'IN-FEWAL', 'Withdraw From fc701eff', 'balance', 6800050, 18000, 6818050, '2023-08-10 16:11:35', '2023-08-10 16:11:35', NULL),
(1, '230811/IN/0001', 'IN-FEWAL', 'Withdraw From 777ab718', 'balance', 6818050, 275000, 7093050, '2023-08-11 07:35:44', '2023-08-11 07:35:44', NULL),
(1, '230818/OUT/0001', 'OUT-PAYDEBT', 'Payment Debt 230811/P/04/08A20F75', 'detail/purchaseview/230811P0408A20F75', 7093050, 45000, 7048050, '2023-08-18 11:33:46', '2023-08-18 11:33:46', NULL),
(1, '230818/OUT/0002', 'OUT-PAYDEBT', 'Payment Debt 230811/P/01/03DCF2B8', 'detail/purchaseview/230811P0103DCF2B8', 7048050, 200000, 6848050, '2023-08-18 11:41:07', '2023-08-18 11:41:07', NULL),
(1, '230818/OUT/0003', 'OUT-PAYDEBT', 'Payment Debt 230808/P/03/0CB81231', 'detail/purchaseview/230808P030CB81231', 6848050, 620000, 6228050, '2023-08-18 11:42:30', '2023-08-18 11:42:30', NULL),
(1, '230818/OUT/0004', 'OUT-PAYDEBT', 'Payment Debt 230811/P/03/095544A0', 'detail/purchaseview/230811P03095544A0', 6228050, 2450000, 3778050, '2023-08-18 12:44:12', '2023-08-18 12:44:12', NULL),
(1, '230818/OUT/0005', 'OUT-PAYDEBT', 'Payment Debt 230811/P/02/01305BFE', 'detail/purchaseview/230811P0201305BFE', 3778050, 1200000, 2578050, '2023-08-18 12:46:32', '2023-08-18 12:46:32', NULL),
(1, '230818/IN/0001', 'IN-FEWAL', 'Withdraw From fc701eff', 'balance', 2578050, 380000, 2958050, '2023-08-18 13:01:11', '2023-08-18 13:01:11', NULL),
(1, '230818/OUT/0006', 'OUT-PAYDEBT', 'Payment Debt 230818/P/01/0EEFB04F', 'detail/purchaseview/230818P010EEFB04F', 2958050, 2710000, 248050, '2023-08-18 13:01:42', '2023-08-18 13:01:42', NULL),
(1, '230818/OUT/0007', 'OUT-PAYDEBT', 'Payment Debt 230818/P/02/0CD66847', 'detail/purchaseview/230818P020CD66847', 248050, 10000, 238050, '2023-08-18 13:05:40', '2023-08-18 13:05:40', NULL),
(1, '230818/OUT/0008', 'OUT-PAYDEBT', 'Payment Debt 230818/P/03/0F0867EB', 'detail/purchaseview/230818P030F0867EB', 238050, 5000, 233050, '2023-08-18 13:14:24', '2023-08-18 13:14:24', NULL),
(1, '230818/OUT/0009', 'OUT-PAYDEBT', 'Payment Debt 230818/P/04/0C2CA68C', 'detail/purchaseview/230818P040C2CA68C', 233050, 5000, 228050, '2023-08-18 13:19:32', '2023-08-18 13:19:32', NULL),
(1, '230818/OUT/0010', 'OUT-PAYDEBT', 'Payment Debt 230818/P/05/02B507DB', 'detail/purchaseview/230818P0502B507DB', 228050, 10000, 218050, '2023-08-18 14:18:47', '2023-08-18 14:18:47', NULL),
(1, '230818/OUT/0011', 'OUT-PAYDEBT', 'Payment Debt 230818/P/06/0C0BCFAF', 'detail/purchaseview/230818P060C0BCFAF', 218050, 20000, 198050, '2023-08-18 14:21:55', '2023-08-18 14:21:55', NULL),
(1, '230818/OUT/0012', 'OUT-PAYDEBT', 'Payment Debt 230818/P/07/076D3848', 'detail/purchaseview/230818P07076D3848', 198050, 10000, 188050, '2023-08-18 14:25:34', '2023-08-18 14:25:34', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `balance_ewallet`
--

CREATE TABLE `balance_ewallet` (
  `ewallet_shopid` varchar(20) NOT NULL,
  `value_ewallet` float NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `balance_ewallet`
--

INSERT INTO `balance_ewallet` (`ewallet_shopid`, `value_ewallet`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
('5013456e', 0, 0, '2023-08-08 10:44:51', '2023-08-10 16:11:29', NULL),
('777ab718', 962000, 0, '2023-08-08 10:44:51', '2023-08-26 10:18:14', NULL),
('fc701eff', 0, 0, '2023-08-08 10:44:51', '2023-08-18 13:01:11', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `balance_ewallet_log`
--

CREATE TABLE `balance_ewallet_log` (
  `ewallet_shopid_log` varchar(20) NOT NULL,
  `log_key` varchar(255) NOT NULL,
  `log_code` varchar(255) NOT NULL,
  `log_description` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `last_value` float NOT NULL,
  `trans_value` float NOT NULL,
  `new_value` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `balance_ewallet_log`
--

INSERT INTO `balance_ewallet_log` (`ewallet_shopid_log`, `log_key`, `log_code`, `log_description`, `link`, `last_value`, `trans_value`, `new_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
('5013456e', '230810/OUT/0001', 'OUT-EWAL', 'Withdraw', 'ewallet', 580000, 580000, 1620000, '2023-08-10 10:21:48', '2023-08-10 10:21:48', NULL),
('777ab718', '230810/OUT/0002', 'OUT-EWAL', 'Withdraw', 'ewallet', 524000, 524000, 2256000, '2023-08-10 10:33:27', '2023-08-10 10:33:27', NULL),
('fc701eff', '230810/OUT/0003', 'OUT-EWAL', 'Withdraw', 'ewallet', 954500, 954500, 2349500, '2023-08-10 10:34:39', '2023-08-10 10:34:39', NULL),
('5013456e', '230810/OUT/0004', 'OUT-EWAL', 'Withdraw', 'ewallet', 568524, 568524, 3689980, '2023-08-10 10:36:15', '2023-08-10 10:36:15', NULL),
('777ab718', '230810/OUT/0005', 'OUT-EWAL', 'Withdraw', 'ewallet', 54332, 54332, 4772690, '2023-08-10 10:39:35', '2023-08-10 10:39:35', NULL),
('fc701eff', '230810/OUT/0006', 'OUT-EWAL', 'Withdraw', 'ewallet', 546698, 546698, 4334650, '2023-08-10 10:42:02', '2023-08-10 10:42:02', NULL),
('5013456e', '230810/IN/0001', 'OUT-EWAL', 'Withdraw', 'detail/view/230727S0102DA1DC5', 0, 272000, 272000, '2023-08-10 11:30:02', '2023-08-10 11:30:02', NULL),
('5013456e', '230810/OUT/0007', 'OUT-EWAL', 'Withdraw', 'ewallet', 272000, 272000, 5156050, '2023-08-10 11:39:27', '2023-08-10 11:39:27', NULL),
('777ab718', '230810/OUT/0008', 'OUT-EWAL', 'Withdraw', 'ewallet', 305000, 305000, 5395050, '2023-08-10 11:39:46', '2023-08-10 11:39:46', NULL),
('5013456e', '230810/IN/0002', 'IN-SALES', 'Withdraw', 'detail/view/230725S0100205A7A', 0, 10000, 10000, '2023-08-10 11:42:04', '2023-08-10 11:42:04', NULL),
('fc701eff', '230810/IN/0003', 'IN-SALES', 'Payment Sales 230724/S/01/05E0FA07', 'detail/view/230724S0105E0FA07', 0, 18000, 18000, '2023-08-10 14:21:57', '2023-08-10 14:21:57', NULL),
('777ab718', '230810/IN/0004', 'IN-SALES', 'Payment Sales 230721/S/01/01132985', 'detail/view/230721S0101132985', 0, 110000, 110000, '2023-08-10 14:47:39', '2023-08-10 14:47:39', NULL),
('777ab718', '230810/OUT/0009', 'OUT-EWAL', 'Withdraw', 'ewallet', 110000, 110000, 5895050, '2023-08-10 15:03:27', '2023-08-10 15:03:27', NULL),
('777ab718', '230810/IN/0005', 'IN-SALES', 'Payment Sales 230714/S/05/0F15A070', 'detail/view/230714S050F15A070', 0, 60000, 60000, '2023-08-10 15:06:54', '2023-08-10 15:06:54', NULL),
('777ab718', '230810/OUT/0010', 'OUT-EWAL', 'Withdraw', 'ewallet', 60000, 60000, -5995050, '2023-08-10 15:08:02', '2023-08-10 15:08:02', NULL),
('777ab718', '230810/IN/0006', 'IN-SALES', 'Payment Sales 230714/S/03/05DFF412', 'detail/view/230714S0305DFF412', 0, 265000, 265000, '2023-08-10 15:10:11', '2023-08-10 15:10:11', NULL),
('777ab718', '230810/OUT/0011', 'OUT-EWAL', 'Withdraw', 'ewallet', 265000, 265000, 0, '2023-08-10 15:10:28', '2023-08-10 15:10:28', NULL),
('777ab718', '230810/IN/0007', 'IN-SALES', 'Payment Sales 230713/S/01/044B0EB1', 'detail/view/230713S01044B0EB1', 0, 240000, 240000, '2023-08-10 15:51:35', '2023-08-10 15:51:35', NULL),
('777ab718', '230810/IN/0008', 'IN-SALES', 'Payment Sales 230714/S/01/0F418442', 'detail/view/230714S010F418442', 240000, 110000, 350000, '2023-08-10 15:56:41', '2023-08-10 15:56:41', NULL),
('777ab718', '230810/OUT/0012', 'OUT-EWAL', 'Withdraw', 'ewallet', 350000, 350000, 0, '2023-08-10 15:56:50', '2023-08-10 15:56:50', NULL),
('5013456e', '230810/OUT/0013', 'OUT-EWAL', 'Withdraw', 'ewallet', 10000, 10000, 0, '2023-08-10 16:11:29', '2023-08-10 16:11:29', NULL),
('fc701eff', '230810/OUT/0014', 'OUT-EWAL', 'Withdraw', 'ewallet', 18000, 18000, 0, '2023-08-10 16:11:35', '2023-08-10 16:11:35', NULL),
('777ab718', '230811/IN/0001', 'IN-SALES', 'Payment Sales 230724/S/06/038EB60B', 'detail/view/230724S06038EB60B', 0, 275000, 275000, '2023-08-11 07:32:57', '2023-08-11 07:32:57', NULL),
('777ab718', '230811/OUT/0001', 'OUT-EWAL', 'Withdraw', 'ewallet', 275000, 275000, 0, '2023-08-11 07:35:44', '2023-08-11 07:35:44', NULL),
('777ab718', '230814/IN/0001', 'IN-SALES', 'Payment Sales 230714/S/03/05DFF412', 'detail/view/230714S0305DFF412', 0, 252000, 252000, '2023-08-14 10:06:21', '2023-08-14 10:06:21', NULL),
('fc701eff', '230818/IN/0001', 'IN-SALES', 'Payment Sales 230720/S/01/08230318', 'detail/view/230720S0108230318', 0, 380000, 380000, '2023-08-18 13:00:47', '2023-08-18 13:00:47', NULL),
('fc701eff', '230818/OUT/0001', 'OUT-EWAL', 'Withdraw', 'ewallet', 380000, 380000, 0, '2023-08-18 13:01:11', '2023-08-18 13:01:11', NULL),
('777ab718', '230818/P/09/0BC8F553', 'OP-EWAL', 'Purchase 230818/P/09/0BC8F553', 'detail/purchaseview/230818P090BC8F553', 252000, 100000, 152000, '2023-08-18 15:52:08', '2023-08-18 15:52:08', NULL),
('777ab718', '230825/IN/0001', 'IN-SALES', 'Payment Sales 230823/S/01/0D24ED98', 'detail/view/230823S010D24ED98', 152000, 100000, 252000, '2023-08-25 14:41:45', '2023-08-25 14:41:45', NULL),
('777ab718', '230825/IN/0002', 'IN-SALES', 'Payment Sales 230613/S/01/0E8F017D', 'detail/view/230613S010E8F017D', 252000, 360000, 612000, '2023-08-25 14:54:47', '2023-08-25 14:54:47', NULL),
('777ab718', '230825/IN/0003', 'IN-SALES', 'Payment Sales 230724/S/01/0FB6C9C4', 'detail/view/230724S010FB6C9C4', 612000, 40000, 652000, '2023-08-25 14:56:11', '2023-08-25 14:56:11', NULL),
('777ab718', '230825/IN/0004', 'IN-SALES', 'Payment Sales 230713/S/01/0A58C72E', 'detail/view/230713S010A58C72E', 652000, 110000, 762000, '2023-08-25 14:58:09', '2023-08-25 14:58:09', NULL),
('777ab718', '230826/IN/0001', 'IN-SALES', 'Payment Sales 230607/S/01/0584C608', 'detail/view/230607S010584C608', 762000, 145000, 907000, '2023-08-26 10:17:12', '2023-08-26 10:17:12', NULL),
('777ab718', '230826/IN/0002', 'IN-SALES', 'Payment Sales 230719/S/01/06A4A49E', 'detail/view/230719S0106A4A49E', 907000, 55000, 962000, '2023-08-26 10:18:14', '2023-08-26 10:18:14', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `debt_account`
--

CREATE TABLE `debt_account` (
  `debt_userid` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `value_debt` float NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `debt_account`
--

INSERT INTO `debt_account` (`debt_userid`, `value_debt`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 29000, 0, '2023-08-08 10:44:22', '2023-08-18 14:35:06', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `debt_account_log`
--

CREATE TABLE `debt_account_log` (
  `debt_userid_log` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `log_key` varchar(255) NOT NULL,
  `log_code` varchar(255) NOT NULL,
  `log_description` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `last_value` float NOT NULL,
  `trans_value` float NOT NULL,
  `new_value` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `debt_account_log`
--

INSERT INTO `debt_account_log` (`debt_userid_log`, `log_key`, `log_code`, `log_description`, `link`, `last_value`, `trans_value`, `new_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '230808/P/03/0CB81231', 'TOP-DEB', 'Purchase', 'detail/purchaseview/230808P030CB81231', 0, 620000, 620000, '2023-08-08 11:28:22', '2023-08-08 11:28:22', NULL),
(1, '230811/P/01/03DCF2B8', 'TOP-DEB', 'Purchase 230811/P/01/03DCF2B8', 'detail/purchaseview/230811P0103DCF2B8', 620000, 200000, 820000, '2023-08-11 15:41:15', '2023-08-11 15:41:15', NULL),
(1, '230811/P/02/01305BFE', 'TOP-DEB', 'Purchase 230811/P/02/01305BFE', 'detail/purchaseview/230811P0201305BFE', 820000, 1200000, 2020000, '2023-08-11 16:03:32', '2023-08-11 16:03:32', NULL),
(1, '230811/P/03/095544A0', 'TOP-DEB', 'Purchase 230811/P/03/095544A0', 'detail/purchaseview/230811P03095544A0', 2020000, 2450000, 4470000, '2023-08-11 16:04:20', '2023-08-11 16:04:20', NULL),
(1, '230811/P/04/08A20F75', 'TOP-DEB', 'Purchase 230811/P/04/08A20F75', 'detail/purchaseview/230811P0408A20F75', 4470000, 45000, 4515000, '2023-08-11 16:05:23', '2023-08-11 16:05:23', NULL),
(1, '230818/OUT/0001', 'OUT-PAYDEBT', 'Payment Debt 230811/P/04/08A20F75', 'detail/purchaseview/230811P0408A20F75', 7093050, 45000, 7048050, '2023-08-18 11:33:46', '2023-08-18 11:33:46', NULL),
(1, '230818/OUT/0002', 'OUT-PAYDEBT', 'Payment Debt 230811/P/01/03DCF2B8', 'detail/purchaseview/230811P0103DCF2B8', 7048050, 200000, 6848050, '2023-08-18 11:41:07', '2023-08-18 11:41:07', NULL),
(1, '230818/OUT/0003', 'OUT-PAYDEBT', 'Payment Debt 230808/P/03/0CB81231', 'detail/purchaseview/230808P030CB81231', 6848050, 620000, 6228050, '2023-08-18 11:42:30', '2023-08-18 11:42:30', NULL),
(1, '230818/OUT/0004', 'OUT-PAYDEBT', 'Payment Debt 230811/P/03/095544A0', 'detail/purchaseview/230811P03095544A0', 6228050, 2450000, 3778050, '2023-08-18 12:44:12', '2023-08-18 12:44:12', NULL),
(1, '230818/OUT/0005', 'OUT-PAYDEBT', 'Payment Debt 230811/P/02/01305BFE', 'detail/purchaseview/230811P0201305BFE', 3778050, 1200000, 2578050, '2023-08-18 12:46:32', '2023-08-18 12:46:32', NULL),
(1, '230818/P/01/0EEFB04F', 'TOP-DEB', 'Purchase 230818/P/01/0EEFB04F', 'detail/purchaseview/230818P010EEFB04F', 0, 2710000, 2710000, '2023-08-18 12:55:34', '2023-08-18 12:55:34', NULL),
(1, '230818/OUT/0006', 'OUT-PAYDEBT', 'Payment Debt 230818/P/01/0EEFB04F', 'detail/purchaseview/230818P010EEFB04F', 2958050, 2710000, 248050, '2023-08-18 13:01:42', '2023-08-18 13:01:42', NULL),
(1, '230818/P/02/0CD66847', 'TOP-DEB', 'Purchase 230818/P/02/0CD66847', 'detail/purchaseview/230818P020CD66847', 0, 10000, 10000, '2023-08-18 13:04:15', '2023-08-18 13:04:15', NULL),
(1, '230818/OUT/0007', 'OUT-PAYDEBT', 'Payment Debt 230818/P/02/0CD66847', 'detail/purchaseview/230818P020CD66847', 248050, 10000, 238050, '2023-08-18 13:05:40', '2023-08-18 13:05:40', NULL),
(1, '230818/P/03/0F0867EB', 'TOP-DEB', 'Purchase 230818/P/03/0F0867EB', 'detail/purchaseview/230818P030F0867EB', 0, 5000, 5000, '2023-08-18 13:14:04', '2023-08-18 13:14:04', NULL),
(1, '230818/OUT/0008', 'OUT-PAYDEBT', 'Payment Debt 230818/P/03/0F0867EB', 'detail/purchaseview/230818P030F0867EB', 238050, 5000, 233050, '2023-08-18 13:14:24', '2023-08-18 13:14:24', NULL),
(1, '230818/P/04/0C2CA68C', 'TOP-DEB', 'Purchase 230818/P/04/0C2CA68C', 'detail/purchaseview/230818P040C2CA68C', 0, 5000, 5000, '2023-08-18 13:19:16', '2023-08-18 13:19:16', NULL),
(1, '230818/OUT/0009', 'OUT-PAYDEBT', 'Payment Debt 230818/P/04/0C2CA68C', 'detail/purchaseview/230818P040C2CA68C', 5000, 5000, 0, '2023-08-18 13:19:32', '2023-08-18 13:19:32', NULL),
(1, '230818/P/05/02B507DB', 'TOP-DEB', 'Purchase 230818/P/05/02B507DB', 'detail/purchaseview/230818P0502B507DB', 0, 10000, 10000, '2023-08-18 13:26:16', '2023-08-18 13:26:16', NULL),
(1, '230818/OUT/0010', 'OUT-PAYDEBT', 'Payment Debt 230818/P/05/02B507DB', 'detail/purchaseview/230818P0502B507DB', 10000, 10000, 0, '2023-08-18 14:18:47', '2023-08-18 14:18:47', NULL),
(1, '230818/P/06/0C0BCFAF', 'TOP-DEB', 'Purchase 230818/P/06/0C0BCFAF', 'detail/purchaseview/230818P060C0BCFAF', 0, 20000, 20000, '2023-08-18 14:21:45', '2023-08-18 14:21:45', NULL),
(1, '230818/OUT/0011', 'OUT-PAYDEBT', 'Payment Debt 230818/P/06/0C0BCFAF', 'detail/purchaseview/230818P060C0BCFAF', 20000, 20000, 0, '2023-08-18 14:21:55', '2023-08-18 14:21:55', NULL),
(1, '230818/P/07/076D3848', 'TOP-DEB', 'Purchase 230818/P/07/076D3848', 'detail/purchaseview/230818P07076D3848', 0, 10000, 10000, '2023-08-18 14:25:26', '2023-08-18 14:25:26', NULL),
(1, '230818/OUT/0012', 'OUT-PAYDEBT', 'Payment Debt 230818/P/07/076D3848', 'detail/purchaseview/230818P07076D3848', 10000, 10000, 0, '2023-08-18 14:25:34', '2023-08-18 14:25:34', NULL),
(1, '230818/P/08/0766049E', 'TOP-DEB', 'Purchase 230818/P/08/0766049E', 'detail/purchaseview/230818P080766049E', 0, 29000, 29000, '2023-08-18 14:35:06', '2023-08-18 14:35:06', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_category_purchase`
--

CREATE TABLE `list_category_purchase` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `list_category_purchase`
--

INSERT INTO `list_category_purchase` (`id`, `category_name`) VALUES
(1, 'Product'),
(2, 'ADS (Iklan)'),
(3, 'Consumable');

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_delivery_services`
--

CREATE TABLE `list_delivery_services` (
  `id` int(11) UNSIGNED NOT NULL,
  `name_delivery_services` varchar(255) NOT NULL,
  `image_services` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `list_delivery_services`
--

INSERT INTO `list_delivery_services` (`id`, `name_delivery_services`, `image_services`) VALUES
(1, 'Anteraja', 'Service_ANTERAJA.png'),
(2, 'Gosend', 'Service_GOSEND.png'),
(3, 'Grab', 'Service_Grab.png'),
(4, 'J&T Express', 'Service_J&T.png'),
(5, 'JNE Express', 'Service_JNE.png'),
(6, 'Lion Parcel', 'Service_LIONPARCEL.png'),
(7, 'Ninja Xpress', 'Service_NINJA.png'),
(8, 'Paxel', 'Service_PAXEL.png'),
(9, 'SiCepat', 'Service_SICEPAT.png'),
(10, 'Shopee Xpress', 'Service_SHOPEEXPRESS.png'),
(11, 'Other', 'picture-img.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_marketplace`
--

CREATE TABLE `list_marketplace` (
  `id` int(11) UNSIGNED NOT NULL,
  `name_marketplace` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `list_marketplace`
--

INSERT INTO `list_marketplace` (`id`, `name_marketplace`) VALUES
(1, 'Lazada'),
(2, 'Shopee'),
(3, 'Tokopedia'),
(4, 'Tiktok'),
(5, 'Other'),
(6, 'Lazada'),
(7, 'Shopee'),
(8, 'Tokopedia'),
(9, 'Tiktok'),
(10, 'Other');

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_notification`
--

CREATE TABLE `list_notification` (
  `id_notif` int(11) UNSIGNED NOT NULL,
  `path_notif` varchar(255) NOT NULL,
  `type_notif` varchar(255) NOT NULL,
  `title_notif` varchar(255) NOT NULL,
  `to_member_id` varchar(255) NOT NULL,
  `to_fullname` varchar(255) NOT NULL,
  `to_user_image` varchar(255) NOT NULL,
  `from_member_id` varchar(255) NOT NULL,
  `from_fullname` varchar(255) NOT NULL,
  `from_user_image` varchar(255) NOT NULL,
  `notification` varchar(1000) NOT NULL,
  `notification_image` varchar(255) NOT NULL,
  `read_status` int(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `list_notification`
--

INSERT INTO `list_notification` (`id_notif`, `path_notif`, `type_notif`, `title_notif`, `to_member_id`, `to_fullname`, `to_user_image`, `from_member_id`, `from_fullname`, `from_user_image`, `notification`, `notification_image`, `read_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'balance', 'Withdraw E-Wallet', 'Your Balance', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 580.000,- to 2.780.000,-', '', 0, '2023-08-10 10:21:48', '2023-08-18 14:37:56', NULL),
(2, 'balance', 'Withdraw E-Wallet', 'Your Balance', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 580.000,- to 2.780.000,-', '', 1, '2023-08-10 10:21:48', '2023-08-10 10:21:48', NULL),
(3, 'balance', 'Withdraw E-Wallet', 'Your Balance', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 524.000,- to 3.304.000,-', '', 0, '2023-08-10 10:33:27', '2023-08-18 14:37:56', NULL),
(4, 'balance', 'Withdraw E-Wallet', 'Your Balance', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 524.000,- to 3.304.000,-', '', 1, '2023-08-10 10:33:27', '2023-08-10 10:33:27', NULL),
(5, 'balance', 'Withdraw E-Wallet', 'Your Balance', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 954.500,- to 4.258.500,-', '', 0, '2023-08-10 10:34:39', '2023-08-18 14:37:56', NULL),
(6, 'balance', 'Withdraw E-Wallet', 'Your Balance', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 954.500,- to 4.258.500,-', '', 1, '2023-08-10 10:34:39', '2023-08-10 10:34:39', NULL),
(7, 'balance', 'Withdraw E-Wallet', 'Your Balance', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 568.524,- to 4.827.024,-', '', 0, '2023-08-10 10:36:15', '2023-08-18 14:37:56', NULL),
(8, 'balance', 'Withdraw E-Wallet', 'Your Balance', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 568.524,- to 4.827.024,-', '', 1, '2023-08-10 10:36:15', '2023-08-10 10:36:15', NULL),
(9, 'balance', 'Withdraw E-Wallet', 'Your Balance', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 54.332,- to 4.881.352,-', '', 0, '2023-08-10 10:39:35', '2023-08-18 14:37:56', NULL),
(10, 'balance', 'Withdraw E-Wallet', 'Your Balance', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 54.332,- to 4.881.352,-', '', 1, '2023-08-10 10:39:35', '2023-08-10 10:39:35', NULL),
(11, 'balance', 'Withdraw E-Wallet', 'Your Balance', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 546.698,- to 5.428.048,-', '', 0, '2023-08-10 10:42:03', '2023-08-18 14:37:56', NULL),
(12, 'balance', 'Withdraw E-Wallet', 'Your Balance', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 546.698,- to 5.428.048,-', '', 1, '2023-08-10 10:42:03', '2023-08-10 10:42:03', NULL),
(13, 'detail/view/230724S0705094EF6', 'Sales Completed', 'DGFHFDDSHGFD6', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 0, '2023-08-10 11:22:01', '2023-08-18 14:37:56', NULL),
(14, 'detail/view/230724S0705094EF6', 'Sales Completed', 'DGFHFDDSHGFD6', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-08-10 11:22:01', '2023-08-10 11:22:01', NULL),
(15, 'detail/view/230724S06038EB60B', 'Sales Completed', 'DSGASG47636436', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 0, '2023-08-10 11:28:05', '2023-08-18 14:37:56', NULL),
(16, 'detail/view/230724S06038EB60B', 'Sales Completed', 'DSGASG47636436', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-08-10 11:28:05', '2023-08-10 11:28:05', NULL),
(17, 'detail/view/230727S0102DA1DC5', 'Sales Received', 'SAFADGDAGDAG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Received', '', 0, '2023-08-10 11:29:45', '2023-08-18 14:37:56', NULL),
(18, 'detail/view/230727S0102DA1DC5', 'Sales Received', 'SAFADGDAGDAG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Received', '', 1, '2023-08-10 11:29:45', '2023-08-10 11:29:45', NULL),
(19, 'detail/view/230727S0102DA1DC5', 'Sales Completed', 'SAFADGDAGDAG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Completed', '', 0, '2023-08-10 11:30:02', '2023-08-18 14:37:56', NULL),
(20, 'detail/view/230727S0102DA1DC5', 'Sales Completed', 'SAFADGDAGDAG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Completed', '', 1, '2023-08-10 11:30:02', '2023-08-10 11:30:02', NULL),
(21, 'balance', 'Withdraw E-Wallet', 'Your Balance', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 272.000,- to 5.700.050,-', '', 0, '2023-08-10 11:39:27', '2023-08-18 14:37:56', NULL),
(22, 'balance', 'Withdraw E-Wallet', 'Your Balance', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 272.000,- to 5.700.050,-', '', 1, '2023-08-10 11:39:27', '2023-08-10 11:39:27', NULL),
(23, 'balance', 'Withdraw E-Wallet', 'Your Balance', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 305.000,- to 6.005.050,-', '', 0, '2023-08-10 11:39:46', '2023-08-18 14:37:56', NULL),
(24, 'balance', 'Withdraw E-Wallet', 'Your Balance', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 305.000,- to 6.005.050,-', '', 1, '2023-08-10 11:39:46', '2023-08-10 11:39:46', NULL),
(25, 'detail/view/230725S0100205A7A', 'Sales Received', 'SAFSAFSAFSA', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Received', '', 0, '2023-08-10 11:41:43', '2023-08-18 14:37:56', NULL),
(26, 'detail/view/230725S0100205A7A', 'Sales Received', 'SAFSAFSAFSA', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Received', '', 1, '2023-08-10 11:41:43', '2023-08-10 11:41:43', NULL),
(27, 'detail/view/230725S0100205A7A', 'Sales Completed', 'SAFSAFSAFSA', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Completed', '', 0, '2023-08-10 11:42:04', '2023-08-18 14:37:56', NULL),
(28, 'detail/view/230725S0100205A7A', 'Sales Completed', 'SAFSAFSAFSA', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Completed', '', 1, '2023-08-10 11:42:04', '2023-08-10 11:42:04', NULL),
(29, 'detail/view/230724S0105E0FA07', 'Sales Received', 'DGDGSGDSG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Millio Tokopedia Received', '', 0, '2023-08-10 11:44:14', '2023-08-18 14:37:56', NULL),
(30, 'detail/view/230724S0105E0FA07', 'Sales Received', 'DGDGSGDSG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Millio Tokopedia Received', '', 1, '2023-08-10 11:44:14', '2023-08-10 11:44:14', NULL),
(31, 'detail/view/230724S0105E0FA07', 'Sales Received', 'DGDGSGDSG', 'c02625c9', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Millio Tokopedia Received', '', 1, '2023-08-10 11:44:14', '2023-08-10 11:44:14', NULL),
(32, 'detail/view/230724S0105E0FA07', 'Sales Completed', 'DGDGSGDSG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Millio Tokopedia Completed', '', 0, '2023-08-10 14:21:57', '2023-08-18 14:37:56', NULL),
(33, 'detail/view/230724S0105E0FA07', 'Sales Completed', 'DGDGSGDSG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Millio Tokopedia Completed', '', 1, '2023-08-10 14:21:57', '2023-08-10 14:21:57', NULL),
(34, 'detail/view/230724S0105E0FA07', 'Sales Completed', 'DGDGSGDSG', 'c02625c9', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Millio Tokopedia Completed', '', 1, '2023-08-10 14:21:57', '2023-08-10 14:21:57', NULL),
(35, 'detail/view/230721S0101132985', 'Sales Received', '5364WFEDAFAFSA', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 0, '2023-08-10 14:47:32', '2023-08-18 14:37:56', NULL),
(36, 'detail/view/230721S0101132985', 'Sales Received', '5364WFEDAFAFSA', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-10 14:47:32', '2023-08-10 14:47:32', NULL),
(37, 'detail/view/230721S0101132985', 'Sales Completed', '5364WFEDAFAFSA', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 0, '2023-08-10 14:47:39', '2023-08-18 14:37:56', NULL),
(38, 'detail/view/230721S0101132985', 'Sales Completed', '5364WFEDAFAFSA', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-08-10 14:47:39', '2023-08-10 14:47:39', NULL),
(39, 'balance', 'Withdraw E-Wallet', 'Your Balance', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 110.000,- to 6.115.050,-', '', 0, '2023-08-10 15:03:27', '2023-08-18 14:37:56', NULL),
(40, 'balance', 'Withdraw E-Wallet', 'Your Balance', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 110.000,- to 6.115.050,-', '', 1, '2023-08-10 15:03:27', '2023-08-10 15:03:27', NULL),
(41, 'detail/view/230714S050F15A070', 'Sales Received', 'MFHFSHDSDA', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 0, '2023-08-10 15:06:48', '2023-08-18 14:37:56', NULL),
(42, 'detail/view/230714S050F15A070', 'Sales Received', 'MFHFSHDSDA', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-10 15:06:48', '2023-08-10 15:06:48', NULL),
(43, 'detail/view/230714S050F15A070', 'Sales Completed', 'MFHFSHDSDA', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 0, '2023-08-10 15:06:54', '2023-08-18 14:37:56', NULL),
(44, 'detail/view/230714S050F15A070', 'Sales Completed', 'MFHFSHDSDA', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-08-10 15:06:54', '2023-08-10 15:06:54', NULL),
(45, 'balance', 'Withdraw E-Wallet', 'Your Balance', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 60.000,- to 6.175.050,-', '', 0, '2023-08-10 15:08:02', '2023-08-18 14:37:56', NULL),
(46, 'balance', 'Withdraw E-Wallet', 'Your Balance', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 60.000,- to 6.175.050,-', '', 1, '2023-08-10 15:08:02', '2023-08-10 15:08:02', NULL),
(47, 'detail/view/230714S0305DFF412', 'Sales Received', 'BCXBXB4436', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 0, '2023-08-10 15:10:05', '2023-08-18 14:37:56', NULL),
(48, 'detail/view/230714S0305DFF412', 'Sales Received', 'BCXBXB4436', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-10 15:10:05', '2023-08-10 15:10:05', NULL),
(49, 'detail/view/230714S0305DFF412', 'Sales Completed', 'BCXBXB4436', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 0, '2023-08-10 15:10:11', '2023-08-18 14:37:56', NULL),
(50, 'detail/view/230714S0305DFF412', 'Sales Completed', 'BCXBXB4436', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-08-10 15:10:11', '2023-08-10 15:10:11', NULL),
(51, 'balance', 'Withdraw E-Wallet', 'Your Balance', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 265.000,- to 6.440.050,-', '', 0, '2023-08-10 15:10:28', '2023-08-18 14:37:56', NULL),
(52, 'balance', 'Withdraw E-Wallet', 'Your Balance', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 265.000,- to 6.440.050,-', '', 1, '2023-08-10 15:10:28', '2023-08-10 15:10:28', NULL),
(53, 'detail/view/230713S01044B0EB1', 'Sales Received', 'GFJFDSHDHAFHGD', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 0, '2023-08-10 15:51:30', '2023-08-18 14:37:56', NULL),
(54, 'detail/view/230713S01044B0EB1', 'Sales Received', 'GFJFDSHDHAFHGD', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-10 15:51:30', '2023-08-10 15:51:30', NULL),
(55, 'detail/view/230713S01044B0EB1', 'Sales Completed', 'GFJFDSHDHAFHGD', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 0, '2023-08-10 15:51:35', '2023-08-18 14:37:56', NULL),
(56, 'detail/view/230713S01044B0EB1', 'Sales Completed', 'GFJFDSHDHAFHGD', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-08-10 15:51:35', '2023-08-10 15:51:35', NULL),
(57, 'detail/view/230714S010F418442', 'Sales Received', 'AFSAFSAFSAFSA', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 0, '2023-08-10 15:56:31', '2023-08-18 14:37:56', NULL),
(58, 'detail/view/230714S010F418442', 'Sales Received', 'AFSAFSAFSAFSA', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-10 15:56:31', '2023-08-10 15:56:31', NULL),
(59, 'detail/view/230714S010F418442', 'Sales Completed', 'AFSAFSAFSAFSA', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 0, '2023-08-10 15:56:41', '2023-08-18 14:37:56', NULL),
(60, 'detail/view/230714S010F418442', 'Sales Completed', 'AFSAFSAFSAFSA', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-08-10 15:56:41', '2023-08-10 15:56:41', NULL),
(61, 'balance', 'Withdraw E-Wallet', 'Your Balance', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 350.000,- to 6.790.050,-', '', 0, '2023-08-10 15:56:50', '2023-08-18 14:37:56', NULL),
(62, 'balance', 'Withdraw E-Wallet', 'Your Balance', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 350.000,- to 6.790.050,-', '', 1, '2023-08-10 15:56:50', '2023-08-10 15:56:50', NULL),
(63, 'balance', 'Withdraw E-Wallet', 'Your Balance', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 10.000,- to 6.800.050,-', '', 0, '2023-08-10 16:11:29', '2023-08-18 14:37:56', NULL),
(64, 'balance', 'Withdraw E-Wallet', 'Your Balance', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 10.000,- to 6.800.050,-', '', 1, '2023-08-10 16:11:29', '2023-08-10 16:11:29', NULL),
(65, 'balance', 'Withdraw E-Wallet', 'Your Balance', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 18.000,- to 6.818.050,-', '', 0, '2023-08-10 16:11:35', '2023-08-18 14:37:56', NULL),
(66, 'balance', 'Withdraw E-Wallet', 'Your Balance', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 18.000,- to 6.818.050,-', '', 1, '2023-08-10 16:11:35', '2023-08-10 16:11:35', NULL),
(67, 'detail/view/230724S06038EB60B', 'Sales Received', 'DSGASG47636436', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 0, '2023-08-11 07:31:28', '2023-08-18 14:37:56', NULL),
(68, 'detail/view/230724S06038EB60B', 'Sales Received', 'DSGASG47636436', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-11 07:31:28', '2023-08-11 07:31:28', NULL),
(69, 'detail/view/230724S06038EB60B', 'Sales Completed', 'DSGASG47636436', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 0, '2023-08-11 07:32:57', '2023-08-18 14:37:56', NULL),
(70, 'detail/view/230724S06038EB60B', 'Sales Completed', 'DSGASG47636436', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-08-11 07:32:57', '2023-08-11 07:32:57', NULL),
(71, 'balance', 'Withdraw E-Wallet', 'Your Balance', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 275.000,- to 7.093.050,-', '', 0, '2023-08-11 07:35:44', '2023-08-18 14:37:56', NULL),
(72, 'balance', 'Withdraw E-Wallet', 'Your Balance', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 275.000,- to 7.093.050,-', '', 1, '2023-08-11 07:35:44', '2023-08-11 07:35:44', NULL),
(73, 'detail/purchaseview/230811P0103DCF2B8', 'Purchase Product', '230811/P/01/03DCF2B8', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 0, '2023-08-11 15:41:15', '2023-08-18 14:37:56', NULL),
(74, 'detail/purchaseview/230811P0103DCF2B8', 'Purchase Product', '230811/P/01/03DCF2B8', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 1, '2023-08-11 15:41:15', '2023-08-11 15:41:15', NULL),
(75, 'detail/purchaseview/230811P0201305BFE', 'Purchase Product', '230811/P/02/01305BFE', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 0, '2023-08-11 16:03:32', '2023-08-18 14:37:56', NULL),
(76, 'detail/purchaseview/230811P0201305BFE', 'Purchase Product', '230811/P/02/01305BFE', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 1, '2023-08-11 16:03:32', '2023-08-11 16:03:32', NULL),
(77, 'detail/purchaseview/230811P03095544A0', 'Purchase Product', '230811/P/03/095544A0', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 0, '2023-08-11 16:04:20', '2023-08-18 14:37:56', NULL),
(78, 'detail/purchaseview/230811P03095544A0', 'Purchase Product', '230811/P/03/095544A0', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 1, '2023-08-11 16:04:20', '2023-08-11 16:04:20', NULL),
(79, 'detail/purchaseview/230811P0408A20F75', 'Purchase Product', '230811/P/04/08A20F75', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 0, '2023-08-11 16:05:23', '2023-08-18 14:37:56', NULL),
(80, 'detail/purchaseview/230811P0408A20F75', 'Purchase Product', '230811/P/04/08A20F75', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 1, '2023-08-11 16:05:23', '2023-08-11 16:05:23', NULL),
(81, 'detail/view/230814S01046DC966', 'New Sales', 'GSFD564GSD6G', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Confirmed', '', 0, '2023-08-14 10:02:25', '2023-08-18 14:37:56', NULL),
(82, 'detail/view/230814S01046DC966', 'New Sales', 'GSFD564GSD6G', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Confirmed', '', 1, '2023-08-14 10:02:25', '2023-08-14 10:02:25', NULL),
(83, 'detail/view/230814S01046DC966', 'Sales Cancel', 'GSFD564GSD6G', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Cancel', '', 0, '2023-08-14 10:02:58', '2023-08-18 14:37:56', NULL),
(84, 'detail/view/230814S01046DC966', 'Sales Cancel', 'GSFD564GSD6G', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Cancel', '', 1, '2023-08-14 10:02:58', '2023-08-14 10:02:58', NULL),
(85, 'detail/view/230714S0305DFF412', 'Sales Received', 'BCXBXB4436', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 0, '2023-08-14 10:06:02', '2023-08-18 14:37:56', NULL),
(86, 'detail/view/230714S0305DFF412', 'Sales Received', 'BCXBXB4436', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-14 10:06:02', '2023-08-14 10:06:02', NULL),
(87, 'detail/view/230714S0305DFF412', 'Sales Completed', 'BCXBXB4436', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 0, '2023-08-14 10:06:21', '2023-08-18 14:37:56', NULL),
(88, 'detail/view/230714S0305DFF412', 'Sales Completed', 'BCXBXB4436', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-08-14 10:06:21', '2023-08-14 10:06:21', NULL),
(95, 'product/TW21RHB-HDL90X620-00', 'New Product', 'Paket Tire Wrench & Handle 21RHB-X620', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 0, '2023-08-15 14:48:35', '2023-08-18 14:37:56', NULL),
(96, 'product/TW21RHB-HDL90X620-00', 'New Product', 'Paket Tire Wrench & Handle 21RHB-X620', 'c02625c9', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 1, '2023-08-15 14:48:35', '2023-08-15 14:48:35', NULL),
(97, 'product/TW21RHB-HDL90X620-00', 'New Product', 'Paket Tire Wrench & Handle 21RHB-X620', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 1, '2023-08-15 14:48:35', '2023-08-15 14:48:35', NULL),
(98, 'product/TW21RHB-HDL90X620-00', 'New Product', 'Paket Tire Wrench & Handle 21RHB-X620', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 0, '2023-08-15 15:01:07', '2023-08-18 14:37:56', NULL),
(99, 'product/TW21RHB-HDL90X620-00', 'New Product', 'Paket Tire Wrench & Handle 21RHB-X620', 'c02625c9', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 1, '2023-08-15 15:01:07', '2023-08-15 15:01:07', NULL),
(100, 'product/TW21RHB-HDL90X620-00', 'New Product', 'Paket Tire Wrench & Handle 21RHB-X620', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 1, '2023-08-15 15:01:07', '2023-08-15 15:01:07', NULL),
(101, 'detail/view/230815S010CD70849', 'New Sales', 'ADADADA', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Confirmed', '', 0, '2023-08-15 16:04:02', '2023-08-18 14:37:56', NULL),
(102, 'detail/view/230815S010CD70849', 'New Sales', 'ADADADA', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Confirmed', '', 1, '2023-08-15 16:04:02', '2023-08-15 16:04:02', NULL),
(103, 'product/TW21RHB-HDL30D80-00', 'New Product', 'Paket Tire Wrench & Handle 21RHB-D80', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 0, '2023-08-16 08:45:12', '2023-08-18 14:37:56', NULL),
(104, 'product/TW21RHB-HDL30D80-00', 'New Product', 'Paket Tire Wrench & Handle 21RHB-D80', 'c02625c9', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 1, '2023-08-16 08:45:12', '2023-08-16 08:45:12', NULL),
(105, 'product/TW21RHB-HDL30D80-00', 'New Product', 'Paket Tire Wrench & Handle 21RHB-D80', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 1, '2023-08-16 08:45:12', '2023-08-16 08:45:12', NULL),
(106, 'detail/view/230816S01064ABC5D', 'New Sales', 'FGFDSAG6434326432', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Confirmed', '', 0, '2023-08-16 12:50:20', '2023-08-18 14:37:56', NULL),
(107, 'detail/view/230816S01064ABC5D', 'New Sales', 'FGFDSAG6434326432', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Confirmed', '', 1, '2023-08-16 12:50:20', '2023-08-16 12:50:20', NULL),
(108, 'detail/view/230816S020D705D4B', 'New Sales', 'KJDHGFKJDSFAL', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Confirmed', '', 0, '2023-08-16 12:55:39', '2023-08-18 14:37:56', NULL),
(109, 'detail/view/230816S020D705D4B', 'New Sales', 'KJDHGFKJDSFAL', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Confirmed', '', 1, '2023-08-16 12:55:39', '2023-08-16 12:55:39', NULL),
(110, 'detail/view/230816S0303D05AF4', 'New Sales', 'KJDSHFKJSAHFD', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 0, '2023-08-16 14:32:30', '2023-08-18 14:37:56', NULL),
(111, 'detail/view/230816S0303D05AF4', 'New Sales', 'KJDSHFKJSAHFD', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-16 14:32:30', '2023-08-16 14:32:30', NULL),
(112, 'detail/view/230816S040112C49E', 'New Sales', 'GDS54SFDADGF', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 0, '2023-08-16 14:41:21', '2023-08-18 14:37:56', NULL),
(113, 'detail/view/230816S040112C49E', 'New Sales', 'GDS54SFDADGF', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-16 14:41:21', '2023-08-16 14:41:21', NULL),
(114, 'detail/view/230816S050132CE36', 'New Sales', 'JHCSJKFDSAHKJG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 0, '2023-08-16 14:54:52', '2023-08-18 14:37:56', NULL),
(115, 'detail/view/230816S050132CE36', 'New Sales', 'JHCSJKFDSAHKJG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-16 14:54:52', '2023-08-16 14:54:52', NULL),
(116, 'detail/view/', 'New Sales', 'JHCSJKFDSAHKJG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 0, '2023-08-16 15:03:15', '2023-08-18 14:37:56', NULL),
(117, 'detail/view/', 'New Sales', 'JHCSJKFDSAHKJG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-16 15:03:15', '2023-08-16 15:03:15', NULL),
(118, 'detail/view/', 'Change Sales', 'JHCSJKFDSAHKJG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 0, '2023-08-16 15:05:04', '2023-08-18 14:37:56', NULL),
(119, 'detail/view/', 'Change Sales', 'JHCSJKFDSAHKJG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-16 15:05:04', '2023-08-16 15:05:04', NULL),
(120, 'detail/view/230816S050132CE36', 'Change Sales', 'JHCSJKFDSAHKJG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Change Detail', '', 0, '2023-08-16 15:07:56', '2023-08-18 14:37:56', NULL),
(121, 'detail/view/230816S050132CE36', 'Change Sales', 'JHCSJKFDSAHKJG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Change Detail', '', 1, '2023-08-16 15:07:56', '2023-08-16 15:07:56', NULL),
(122, 'detail/view/230816S050132CE36', 'Sales Cancel', 'JHCSJKFDSAHKJG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Cancel', '', 0, '2023-08-16 16:04:30', '2023-08-18 14:37:56', NULL),
(123, 'detail/view/230816S050132CE36', 'Sales Cancel', 'JHCSJKFDSAHKJG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Cancel', '', 1, '2023-08-16 16:04:30', '2023-08-16 16:04:30', NULL),
(124, 'detail/purchaseview/230811P0103DCF2B8', 'Payment Debt Purchase230811/P/01/03DCF2B8', '230811/P/01/03DCF2B8', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 0, '2023-08-18 11:41:07', '2023-08-18 14:37:56', NULL),
(125, 'detail/purchaseview/230811P0103DCF2B8', 'Payment Debt Purchase230811/P/01/03DCF2B8', '230811/P/01/03DCF2B8', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 1, '2023-08-18 11:41:07', '2023-08-18 11:41:07', NULL),
(126, 'detail/purchaseview/230808P030CB81231', 'Payment Debt Purchase', '230808/P/03/0CB81231', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 0, '2023-08-18 11:42:30', '2023-08-18 14:37:56', NULL),
(127, 'detail/purchaseview/230808P030CB81231', 'Payment Debt Purchase', '230808/P/03/0CB81231', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 1, '2023-08-18 11:42:30', '2023-08-18 11:42:30', NULL),
(128, 'detail/purchaseview/230811P03095544A0', 'Payment Debt Purchase', '230811/P/03/095544A0', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 0, '2023-08-18 12:44:12', '2023-08-18 14:37:56', NULL),
(129, 'detail/purchaseview/230811P03095544A0', 'Payment Debt Purchase', '230811/P/03/095544A0', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 1, '2023-08-18 12:44:12', '2023-08-18 12:44:12', NULL),
(130, 'detail/purchaseview/230811P0201305BFE', 'Payment Debt Purchase', '230811/P/02/01305BFE', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 0, '2023-08-18 12:46:32', '2023-08-18 14:37:56', NULL),
(131, 'detail/purchaseview/230811P0201305BFE', 'Payment Debt Purchase', '230811/P/02/01305BFE', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 1, '2023-08-18 12:46:32', '2023-08-18 12:46:32', NULL),
(132, 'detail/purchaseview/230818P010EEFB04F', 'Purchase Product', '230818/P/01/0EEFB04F', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 0, '2023-08-18 12:55:34', '2023-08-18 14:37:56', NULL),
(133, 'detail/purchaseview/230818P010EEFB04F', 'Purchase Product', '230818/P/01/0EEFB04F', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 1, '2023-08-18 12:55:34', '2023-08-18 12:55:34', NULL),
(134, 'detail/view/230720S0108230318', 'Sales Received', 'FDDFDSAGFHGADSGDG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Millio Tokopedia Received', '', 0, '2023-08-18 13:00:42', '2023-08-18 14:37:56', NULL),
(135, 'detail/view/230720S0108230318', 'Sales Received', 'FDDFDSAGFHGADSGDG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Millio Tokopedia Received', '', 1, '2023-08-18 13:00:42', '2023-08-18 13:00:42', NULL),
(136, 'detail/view/230720S0108230318', 'Sales Received', 'FDDFDSAGFHGADSGDG', 'c02625c9', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Millio Tokopedia Received', '', 1, '2023-08-18 13:00:42', '2023-08-18 13:00:42', NULL),
(137, 'detail/view/230720S0108230318', 'Sales Completed', 'FDDFDSAGFHGADSGDG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Millio Tokopedia Completed', '', 0, '2023-08-18 13:00:47', '2023-08-18 14:37:56', NULL),
(138, 'detail/view/230720S0108230318', 'Sales Completed', 'FDDFDSAGFHGADSGDG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Millio Tokopedia Completed', '', 1, '2023-08-18 13:00:47', '2023-08-18 13:00:47', NULL),
(139, 'detail/view/230720S0108230318', 'Sales Completed', 'FDDFDSAGFHGADSGDG', 'c02625c9', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Millio Tokopedia Completed', '', 1, '2023-08-18 13:00:47', '2023-08-18 13:00:47', NULL),
(140, 'balance', 'Withdraw E-Wallet', 'Your Balance', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 380.000,- to 2.958.050,-', '', 0, '2023-08-18 13:01:11', '2023-08-18 14:37:56', NULL),
(141, 'balance', 'Withdraw E-Wallet', 'Your Balance', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'will increase Rp 380.000,- to 2.958.050,-', '', 1, '2023-08-18 13:01:11', '2023-08-18 13:01:11', NULL),
(142, 'detail/purchaseview/230818P010EEFB04F', 'Payment Debt', 'Payment 230818/P/01/0EEFB04F', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 0, '2023-08-18 13:01:42', '2023-08-18 14:37:56', NULL),
(143, 'detail/purchaseview/230818P010EEFB04F', 'Payment Debt', 'Payment 230818/P/01/0EEFB04F', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 1, '2023-08-18 13:01:42', '2023-08-18 13:01:42', NULL),
(144, 'detail/purchaseview/230818P020CD66847', 'Purchase Product', '230818/P/02/0CD66847', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 0, '2023-08-18 13:04:15', '2023-08-18 14:37:56', NULL),
(145, 'detail/purchaseview/230818P020CD66847', 'Purchase Product', '230818/P/02/0CD66847', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 1, '2023-08-18 13:04:15', '2023-08-18 13:04:15', NULL),
(146, 'detail/purchaseview/230818P020CD66847', 'Payment Debt', 'Payment #230818/P/02/0CD66847', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 0, '2023-08-18 13:05:40', '2023-08-18 14:37:56', NULL),
(147, 'detail/purchaseview/230818P020CD66847', 'Payment Debt', 'Payment #230818/P/02/0CD66847', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 1, '2023-08-18 13:05:40', '2023-08-18 13:05:40', NULL),
(148, 'detail/purchaseview/230818P030F0867EB', 'Purchase Product', '230818/P/03/0F0867EB', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 0, '2023-08-18 13:14:04', '2023-08-18 14:37:56', NULL),
(149, 'detail/purchaseview/230818P030F0867EB', 'Purchase Product', '230818/P/03/0F0867EB', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 1, '2023-08-18 13:14:04', '2023-08-18 13:14:04', NULL),
(150, 'detail/purchaseview/230818P030F0867EB', 'Payment Debt', 'Payment #230818/P/03/0F0867EB', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 0, '2023-08-18 13:14:24', '2023-08-18 14:37:56', NULL),
(151, 'detail/purchaseview/230818P030F0867EB', 'Payment Debt', 'Payment #230818/P/03/0F0867EB', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 1, '2023-08-18 13:14:24', '2023-08-18 13:14:24', NULL),
(152, 'detail/purchaseview/230818P040C2CA68C', 'Purchase Product', '230818/P/04/0C2CA68C', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 0, '2023-08-18 13:19:16', '2023-08-18 14:37:56', NULL),
(153, 'detail/purchaseview/230818P040C2CA68C', 'Purchase Product', '230818/P/04/0C2CA68C', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 1, '2023-08-18 13:19:16', '2023-08-18 13:19:16', NULL),
(154, 'detail/purchaseview/230818P040C2CA68C', 'Payment Debt', 'Payment #230818/P/04/0C2CA68C', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 0, '2023-08-18 13:19:32', '2023-08-18 14:37:56', NULL),
(155, 'detail/purchaseview/230818P040C2CA68C', 'Payment Debt', 'Payment #230818/P/04/0C2CA68C', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 1, '2023-08-18 13:19:32', '2023-08-18 13:19:32', NULL),
(156, 'detail/purchaseview/230818P0502B507DB', 'Purchase Product', '230818/P/05/02B507DB', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 0, '2023-08-18 13:26:16', '2023-08-18 14:37:56', NULL),
(157, 'detail/purchaseview/230818P0502B507DB', 'Purchase Product', '230818/P/05/02B507DB', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 1, '2023-08-18 13:26:16', '2023-08-18 13:26:16', NULL),
(158, 'detail/purchaseview/230818P0502B507DB', 'Payment Debt', 'Payment #230818/P/05/02B507DB', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 0, '2023-08-18 14:18:47', '2023-08-18 14:37:56', NULL),
(159, 'detail/purchaseview/230818P0502B507DB', 'Payment Debt', 'Payment #230818/P/05/02B507DB', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 1, '2023-08-18 14:18:47', '2023-08-18 14:18:47', NULL),
(160, 'detail/purchaseview/230818P060C0BCFAF', 'Purchase Product', '230818/P/06/0C0BCFAF', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 0, '2023-08-18 14:21:45', '2023-08-18 14:37:56', NULL),
(161, 'detail/purchaseview/230818P060C0BCFAF', 'Purchase Product', '230818/P/06/0C0BCFAF', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 1, '2023-08-18 14:21:45', '2023-08-18 14:21:45', NULL),
(162, 'detail/purchaseview/230818P060C0BCFAF', 'Payment Debt', 'Payment #230818/P/06/0C0BCFAF', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 0, '2023-08-18 14:21:55', '2023-08-18 14:37:56', NULL),
(163, 'detail/purchaseview/230818P060C0BCFAF', 'Payment Debt', 'Payment #230818/P/06/0C0BCFAF', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 1, '2023-08-18 14:21:55', '2023-08-18 14:21:55', NULL),
(164, 'detail/purchaseview/230818P07076D3848', 'Purchase Product', '230818/P/07/076D3848', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 0, '2023-08-18 14:25:26', '2023-08-18 14:37:56', NULL),
(165, 'detail/purchaseview/230818P07076D3848', 'Purchase Product', '230818/P/07/076D3848', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 1, '2023-08-18 14:25:26', '2023-08-18 14:25:26', NULL),
(166, 'detail/purchaseview/230818P07076D3848', 'Payment Debt', 'Payment #230818/P/07/076D3848', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 0, '2023-08-18 14:25:34', '2023-08-18 14:37:56', NULL),
(167, 'detail/purchaseview/230818P07076D3848', 'Payment Debt', 'Payment #230818/P/07/076D3848', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'Paid Off', '', 1, '2023-08-18 14:25:34', '2023-08-18 14:25:34', NULL),
(168, 'detail/purchaseview/230818P080766049E', 'Purchase Product', '230818/P/08/0766049E', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 0, '2023-08-18 14:35:06', '2023-08-18 14:37:56', NULL),
(169, 'detail/purchaseview/230818P080766049E', 'Purchase Product', '230818/P/08/0766049E', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 1, '2023-08-18 14:35:06', '2023-08-18 14:35:06', NULL),
(170, 'detail/purchaseview/230818P090BC8F553', 'Purchase ADS (Iklan)', '230818/P/09/0BC8F553', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee', '', 1, '2023-08-18 15:52:08', '2023-08-18 15:52:08', NULL),
(171, 'detail/purchaseview/230818P090BC8F553', 'Purchase ADS (Iklan)', '230818/P/09/0BC8F553', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee', '', 1, '2023-08-18 15:52:08', '2023-08-18 15:52:08', NULL),
(172, 'detail/view/230825S010403F6BA', 'New Sales', 'FDGHFHSHS', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Confirmed', '', 1, '2023-08-25 14:02:12', '2023-08-25 14:02:12', NULL),
(173, 'detail/view/230825S010403F6BA', 'New Sales', 'FDGHFHSHS', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Confirmed', '', 1, '2023-08-25 14:02:12', '2023-08-25 14:02:12', NULL),
(174, 'detail/view/230725S0101360F8F', 'New Sales', 'KLKSJHALKDHSAD', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-25 14:39:53', '2023-08-25 14:39:53', NULL),
(175, 'detail/view/230725S0101360F8F', 'New Sales', 'KLKSJHALKDHSAD', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-25 14:39:53', '2023-08-25 14:39:53', NULL),
(176, 'detail/view/230823S010D24ED98', 'New Sales', 'CBGFDSHGSHGDSAGDSAG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-25 14:41:03', '2023-08-25 14:41:03', NULL),
(177, 'detail/view/230823S010D24ED98', 'New Sales', 'CBGFDSHGSHGDSAGDSAG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-25 14:41:03', '2023-08-25 14:41:03', NULL),
(178, 'detail/view/230823S010D24ED98', 'Sales Received', 'CBGFDSHGSHGDSAGDSAG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-25 14:41:40', '2023-08-25 14:41:40', NULL),
(179, 'detail/view/230823S010D24ED98', 'Sales Received', 'CBGFDSHGSHGDSAGDSAG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-25 14:41:40', '2023-08-25 14:41:40', NULL),
(180, 'detail/view/230823S010D24ED98', 'Sales Completed', 'CBGFDSHGSHGDSAGDSAG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-08-25 14:41:45', '2023-08-25 14:41:45', NULL),
(181, 'detail/view/230823S010D24ED98', 'Sales Completed', 'CBGFDSHGSHGDSAGDSAG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-08-25 14:41:45', '2023-08-25 14:41:45', NULL),
(182, 'detail/view/230725S0101360F8F', 'Sales Received', 'KLKSJHALKDHSAD', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-25 14:42:43', '2023-08-25 14:42:43', NULL),
(183, 'detail/view/230725S0101360F8F', 'Sales Received', 'KLKSJHALKDHSAD', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-25 14:42:43', '2023-08-25 14:42:43', NULL),
(184, 'detail/view/230613S010E8F017D', 'New Sales', 'DSGFDSGSGSDG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-25 14:54:15', '2023-08-25 14:54:15', NULL),
(185, 'detail/view/230613S010E8F017D', 'New Sales', 'DSGFDSGSGSDG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-25 14:54:15', '2023-08-25 14:54:15', NULL),
(186, 'detail/view/230613S010E8F017D', 'Sales Received', 'DSGFDSGSGSDG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-25 14:54:43', '2023-08-25 14:54:43', NULL),
(187, 'detail/view/230613S010E8F017D', 'Sales Received', 'DSGFDSGSGSDG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-25 14:54:43', '2023-08-25 14:54:43', NULL),
(188, 'detail/view/230613S010E8F017D', 'Sales Completed', 'DSGFDSGSGSDG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-08-25 14:54:47', '2023-08-25 14:54:47', NULL),
(189, 'detail/view/230613S010E8F017D', 'Sales Completed', 'DSGFDSGSGSDG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-08-25 14:54:47', '2023-08-25 14:54:47', NULL),
(190, 'detail/view/230724S010FB6C9C4', 'New Sales', 'DDFDGSDGDSGS', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-25 14:55:50', '2023-08-25 14:55:50', NULL),
(191, 'detail/view/230724S010FB6C9C4', 'New Sales', 'DDFDGSDGDSGS', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-25 14:55:50', '2023-08-25 14:55:50', NULL),
(192, 'detail/view/230724S010FB6C9C4', 'Sales Received', 'DDFDGSDGDSGS', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-25 14:56:08', '2023-08-25 14:56:08', NULL),
(193, 'detail/view/230724S010FB6C9C4', 'Sales Received', 'DDFDGSDGDSGS', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-25 14:56:08', '2023-08-25 14:56:08', NULL),
(194, 'detail/view/230724S010FB6C9C4', 'Sales Completed', 'DDFDGSDGDSGS', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-08-25 14:56:11', '2023-08-25 14:56:11', NULL),
(195, 'detail/view/230724S010FB6C9C4', 'Sales Completed', 'DDFDGSDGDSGS', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-08-25 14:56:11', '2023-08-25 14:56:11', NULL),
(196, 'detail/view/230713S010A58C72E', 'New Sales', 'HGFDHFDHFDH', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-25 14:57:51', '2023-08-25 14:57:51', NULL),
(197, 'detail/view/230713S010A58C72E', 'New Sales', 'HGFDHFDHFDH', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-25 14:57:51', '2023-08-25 14:57:51', NULL),
(198, 'detail/view/230713S010A58C72E', 'Sales Received', 'HGFDHFDHFDH', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-25 14:58:06', '2023-08-25 14:58:06', NULL),
(199, 'detail/view/230713S010A58C72E', 'Sales Received', 'HGFDHFDHFDH', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-25 14:58:06', '2023-08-25 14:58:06', NULL),
(200, 'detail/view/230713S010A58C72E', 'Sales Completed', 'HGFDHFDHFDH', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-08-25 14:58:09', '2023-08-25 14:58:09', NULL),
(201, 'detail/view/230713S010A58C72E', 'Sales Completed', 'HGFDHFDHFDH', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-08-25 14:58:09', '2023-08-25 14:58:09', NULL),
(202, 'detail/view/230825S010A43346B', 'New Sales', 'GFDDSDSDDDSD', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-25 14:59:06', '2023-08-25 14:59:06', NULL),
(203, 'detail/view/230825S010A43346B', 'New Sales', 'GFDDSDSDDDSD', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-25 14:59:06', '2023-08-25 14:59:06', NULL),
(204, 'detail/view/230825S010A43346B', 'Sales Received', 'GFDDSDSDDDSD', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-25 16:10:29', '2023-08-25 16:10:29', NULL),
(205, 'detail/view/230825S010A43346B', 'Sales Received', 'GFDDSDSDDDSD', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-25 16:10:29', '2023-08-25 16:10:29', NULL),
(206, 'detail/view/230826S010A5F71F0', 'New Sales', 'GFDSGFDGFDSG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 08:00:17', '2023-08-26 08:00:17', NULL),
(207, 'detail/view/230826S010A5F71F0', 'New Sales', 'GFDSGFDGFDSG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 08:00:17', '2023-08-26 08:00:17', NULL),
(220, 'product/PCKG- 30X8X8', 'New Product', 'Kardus Long 30x8x8cm', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 1, '2023-08-26 08:31:44', '2023-08-26 08:31:44', NULL),
(221, 'product/PCKG- 30X8X8', 'New Product', 'Kardus Long 30x8x8cm', 'c02625c9', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 1, '2023-08-26 08:31:44', '2023-08-26 08:31:44', NULL),
(222, 'product/PCKG- 30X8X8', 'New Product', 'Kardus Long 30x8x8cm', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 1, '2023-08-26 08:31:44', '2023-08-26 08:31:44', NULL),
(223, 'detail/view/230826S020F696996', 'New Sales', 'FAAGFSAFSA', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 09:45:35', '2023-08-26 09:45:35', NULL),
(224, 'detail/view/230826S020F696996', 'New Sales', 'FAAGFSAFSA', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 09:45:35', '2023-08-26 09:45:35', NULL),
(225, 'detail/view/230607S010584C608', 'New Sales', 'SAHDGJHGDFSAKJDSG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 10:16:45', '2023-08-26 10:16:45', NULL),
(226, 'detail/view/230607S010584C608', 'New Sales', 'SAHDGJHGDFSAKJDSG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 10:16:45', '2023-08-26 10:16:45', NULL),
(227, 'detail/view/230607S010584C608', 'Sales Received', 'SAHDGJHGDFSAKJDSG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-26 10:17:06', '2023-08-26 10:17:06', NULL);
INSERT INTO `list_notification` (`id_notif`, `path_notif`, `type_notif`, `title_notif`, `to_member_id`, `to_fullname`, `to_user_image`, `from_member_id`, `from_fullname`, `from_user_image`, `notification`, `notification_image`, `read_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(228, 'detail/view/230607S010584C608', 'Sales Received', 'SAHDGJHGDFSAKJDSG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-26 10:17:06', '2023-08-26 10:17:06', NULL),
(229, 'detail/view/230607S010584C608', 'Sales Completed', 'SAHDGJHGDFSAKJDSG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-08-26 10:17:12', '2023-08-26 10:17:12', NULL),
(230, 'detail/view/230607S010584C608', 'Sales Completed', 'SAHDGJHGDFSAKJDSG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-08-26 10:17:12', '2023-08-26 10:17:12', NULL),
(231, 'detail/view/230719S0106A4A49E', 'New Sales', 'GSFDGFDSGFDGFD', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 10:17:56', '2023-08-26 10:17:56', NULL),
(232, 'detail/view/230719S0106A4A49E', 'New Sales', 'GSFDGFDSGFDGFD', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 10:17:56', '2023-08-26 10:17:56', NULL),
(233, 'detail/view/230719S0106A4A49E', 'Sales Received', 'GSFDGFDSGFDGFD', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-26 10:18:10', '2023-08-26 10:18:10', NULL),
(234, 'detail/view/230719S0106A4A49E', 'Sales Received', 'GSFDGFDSGFDGFD', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-26 10:18:10', '2023-08-26 10:18:10', NULL),
(235, 'detail/view/230719S0106A4A49E', 'Sales Completed', 'GSFDGFDSGFDGFD', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-08-26 10:18:14', '2023-08-26 10:18:14', NULL),
(236, 'detail/view/230719S0106A4A49E', 'Sales Completed', 'GSFDGFDSGFDGFD', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-08-26 10:18:14', '2023-08-26 10:18:14', NULL),
(237, 'detail/view/230816S0105286C16', 'New Sales', 'FDGFDSGFDGFDSG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 10:18:58', '2023-08-26 10:18:58', NULL),
(238, 'detail/view/230816S0105286C16', 'New Sales', 'FDGFDSGFDGFDSG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 10:18:58', '2023-08-26 10:18:58', NULL),
(239, 'detail/view/230821S0107A7F677', 'New Sales', 'FGFDSGFDGFDSGSD', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 10:19:25', '2023-08-26 10:19:25', NULL),
(240, 'detail/view/230821S0107A7F677', 'New Sales', 'FGFDSGFDGFDSGSD', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 10:19:25', '2023-08-26 10:19:25', NULL),
(241, 'detail/view/230801S010F1D38CD', 'New Sales', 'DSGFFDSGGADS', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 11:29:49', '2023-08-26 11:29:49', NULL),
(242, 'detail/view/230801S010F1D38CD', 'New Sales', 'DSGFFDSGGADS', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 11:29:49', '2023-08-26 11:29:49', NULL),
(253, 'detail/view/230706S0105D307BE', 'New Sales', 'SAFSAFSAF', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 12:51:00', '2023-08-26 12:51:00', NULL),
(254, 'detail/view/230706S0105D307BE', 'New Sales', 'SAFSAFSAF', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 12:51:00', '2023-08-26 12:51:00', NULL),
(255, 'detail/view/230816S0107D92F79', 'New Sales', 'AFSSAFSAFSA', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 13:31:30', '2023-08-26 13:31:30', NULL),
(256, 'detail/view/230816S0107D92F79', 'New Sales', 'AFSSAFSAFSA', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 13:31:30', '2023-08-26 13:31:30', NULL),
(257, 'detail/view/230826S010C0E0E38', 'New Sales', 'FAFSAFSAFSA', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 13:32:08', '2023-08-26 13:32:08', NULL),
(258, 'detail/view/230826S010C0E0E38', 'New Sales', 'FAFSAFSAFSA', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 13:32:08', '2023-08-26 13:32:08', NULL),
(259, 'detail/view/230823S0102ABE083', 'New Sales', 'DSGDSGDSG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 14:39:01', '2023-08-26 14:39:01', NULL),
(260, 'detail/view/230823S0102ABE083', 'New Sales', 'DSGDSGDSG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 14:39:01', '2023-08-26 14:39:01', NULL),
(261, 'detail/view/230826S020FEC9E99', 'New Sales', 'DSGFDSGDSG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 14:39:50', '2023-08-26 14:39:50', NULL),
(262, 'detail/view/230826S020FEC9E99', 'New Sales', 'DSGFDSGDSG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 14:39:50', '2023-08-26 14:39:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_packaging`
--

CREATE TABLE `list_packaging` (
  `id_packaging` varchar(20) NOT NULL,
  `proid_pck` varchar(11) NOT NULL,
  `name_packaging` varchar(20) NOT NULL,
  `price_packaging` float NOT NULL,
  `stock_packaging` int(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `list_packaging`
--

INSERT INTO `list_packaging` (`id_packaging`, `proid_pck`, `name_packaging`, `price_packaging`, `stock_packaging`, `created_at`, `updated_at`, `deleted_at`) VALUES
('0', '', 'No Packaging', 500, 0, NULL, NULL, NULL),
('1', 'E3244FE4', 'Small 17x9x6cm', 2000, 500, NULL, NULL, NULL),
('2', '838F7D07', 'Long 8x8x30cm', 2000, 500, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_pay_methode`
--

CREATE TABLE `list_pay_methode` (
  `id` int(11) UNSIGNED NOT NULL,
  `pay_methode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `list_pay_methode`
--

INSERT INTO `list_pay_methode` (`id`, `pay_methode`) VALUES
(1, 'OnlinePay'),
(2, 'COD'),
(3, 'TOP'),
(4, 'Ewalet'),
(5, 'Other');

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_supplier`
--

CREATE TABLE `list_supplier` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `name_supplier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `list_supplier`
--

INSERT INTO `list_supplier` (`id`, `type`, `name_supplier`) VALUES
(1, 'Product', 'Menara Terus Makmur (METEMA)'),
(2, 'Other', 'Online Shop');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'App\\Database\\Migrations\\CreateAuthTables', 'default', 'App', 1687593614, 1),
(2, '2023-06-09-171825', 'App\\Database\\Migrations\\CreateShop', 'default', 'App', 1687593614, 1),
(3, '2023-06-09-171939', 'App\\Database\\Migrations\\CreateProducts', 'default', 'App', 1687593616, 1),
(4, '2023-06-29-150105', 'App\\Database\\Migrations\\CreateListMarketplace', 'default', 'App', 1688606666, 2),
(10, '2023-07-11-035017', 'App\\Database\\Migrations\\CreateListPayMethode', 'default', 'App', 1689047504, 5),
(12, '2023-07-06-153853', 'App\\Database\\Migrations\\CreateListDeliveryServices', 'default', 'App', 1689126631, 7),
(13, '2023-07-12-030650', 'App\\Database\\Migrations\\CreateListPackaging', 'default', 'App', 1689131595, 8),
(14, '2023-07-10-035846', 'App\\Database\\Migrations\\CreateSales', 'default', 'App', 1689136943, 9),
(22, '2023-07-13-021249', 'App\\Database\\Migrations\\CreateListNotification', 'default', 'App', 1690169085, 10),
(28, '2023-07-25-145642', 'App\\Database\\Migrations\\CreateListCategoryPurchase', 'default', 'App', 1690343378, 11),
(29, '2023-07-25-072204', 'App\\Database\\Migrations\\CreateListSupplier', 'default', 'App', 1690343504, 12),
(31, '2023-07-25-053940', 'App\\Database\\Migrations\\CreatePurchase', 'default', 'App', 1690428452, 13),
(44, '2023-08-02-012249', 'App\\Database\\Migrations\\CreateEwalet', 'default', 'App', 1691466245, 14),
(45, '2023-08-02-013101', 'App\\Database\\Migrations\\CreateBalanceAccount', 'default', 'App', 1691466245, 14),
(46, '2023-08-02-151413', 'App\\Database\\Migrations\\CreateDebt', 'default', 'App', 1691466246, 14),
(47, '2023-08-11-074023', 'App\\Database\\Migrations\\CreateStockLog', 'default', 'App', 1691739909, 15),
(49, '2023-08-15-063245', 'App\\Database\\Migrations\\CreateProductBundling', 'default', 'App', 1692085562, 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `pro_id` varchar(11) NOT NULL,
  `pro_part_no` varchar(35) NOT NULL,
  `pro_name` varchar(50) NOT NULL,
  `pro_model` varchar(50) NOT NULL,
  `pro_brand` varchar(50) NOT NULL,
  `pro_spec` varchar(50) NOT NULL,
  `pro_category` varchar(25) DEFAULT NULL,
  `pro_group` varchar(25) DEFAULT NULL,
  `pro_show` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `pro_active` tinyint(1) NOT NULL DEFAULT 0,
  `pro_bundling` tinyint(1) NOT NULL DEFAULT 0,
  `pro_description` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`pro_id`, `pro_part_no`, `pro_name`, `pro_model`, `pro_brand`, `pro_spec`, `pro_category`, `pro_group`, `pro_show`, `pro_active`, `pro_bundling`, `pro_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
('04E36BF5', 'COVJACK-00', 'Cover', 'Jack', '', '', 'Jack', 'Otomotive', 4, 0, 0, '', '2023-07-24 10:52:22', '2023-07-24 10:52:22', NULL),
('05E32313', 'TLBAG-00', 'Tool', 'Bag', '', '', 'Toolkit', 'Otomotive', 4, 0, 0, '', '2023-07-24 10:55:40', '2023-07-24 10:55:40', NULL),
('3440F568', 'TW21IMV-0', 'Tire Wrench', '21 IMV', '', '', 'Tire Wrench', 'Otomotive', 4, 0, 0, '', '2023-07-08 10:58:58', '2023-07-08 10:58:58', NULL),
('35516313', 'TW21RHB-HDL90X620-00', 'Paket Tire Wrench & Handle', '21RHB-X620', '', '', 'Tire Wrench', 'Otomotive', 4, 0, 1, '', '2023-08-15 15:01:07', '2023-08-15 15:01:07', NULL),
('3B3AEF19', 'TW21RHB-0', 'Tire Wrench', '21 RHB', '', '', 'Tire Wrench', 'Otomotive', 4, 0, 0, '', '2023-07-04 13:36:01', '2023-07-04 13:36:01', NULL),
('4773B208', 'TW19REH-0', 'Tire Wrench', '19 REH', '', '', 'Tire Wrench', 'Otomotive', 4, 0, 0, '', '2023-07-04 13:37:45', '2023-07-04 13:37:45', NULL),
('838F7D07', 'PCKG-8X8X30', 'Kardus', 'Long 8x8x30cm', '', '', 'Packaging', 'Consumable', 2, 0, 0, '', '2023-08-26 08:31:44', '2023-08-26 09:49:43', NULL),
('9E6039AE', 'TW21RHB-HDL30D80-00', 'Paket Tire Wrench & Handle', '21RHB-D80', '', '', 'Tire Wrench', 'Otomotive', 4, 0, 1, '', '2023-08-16 08:45:12', '2023-08-16 08:45:12', NULL),
('A7285208', 'HDL30D80-00', 'Handle', 'D80', '', '', 'Tire Wrench', 'Otomotive', 4, 0, 0, '', '2023-07-24 10:10:54', '2023-07-24 10:10:54', NULL),
('AC4EBCF4', 'ADS100-00', 'Iklan', 'ADS-100', '', '', 'IklanAds', 'Consumable', 2, 0, 0, '', '2023-07-26 11:05:43', '2023-07-26 11:21:38', NULL),
('CAD729A6', 'HDL50OF-00', 'Handle', 'OF', '', '', 'Tire Wrench', 'Otomotive', 4, 0, 0, '', '2023-07-24 10:26:45', '2023-07-24 10:26:45', NULL),
('E3244FE4', 'PCKG-17X9X6', 'Kardus', 'Small 17x9x6cm', '', '', 'Packaging', 'Consumable', 2, 0, 0, '', '2023-07-26 11:09:47', '2023-07-26 11:09:47', NULL),
('E9D891C7', 'HDL90X620-00', 'Handle', 'X620', '', '', 'Tire Wrench', 'Otomotive', 4, 0, 0, '', '2023-07-24 09:51:20', '2023-07-24 09:51:20', NULL),
('F595C7E3', 'ADS50-00', 'Iklan', 'ADS-50', '', '', 'IklanAds', 'Consumable', 2, 0, 0, '', '2023-07-26 11:04:25', '2023-07-26 11:04:25', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products_bundling`
--

CREATE TABLE `products_bundling` (
  `id_pro_bundling` varchar(20) NOT NULL,
  `id_bundling` varchar(20) NOT NULL,
  `pro_id_bundling_item` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `products_bundling`
--

INSERT INTO `products_bundling` (`id_pro_bundling`, `id_bundling`, `pro_id_bundling_item`, `created_at`, `updated_at`, `deleted_at`) VALUES
('35516313/0', '35516313', '3B3AEF19', '2023-08-15 15:01:07', '2023-08-15 15:01:07', NULL),
('35516313/1', '35516313', 'E9D891C7', '2023-08-15 15:01:07', '2023-08-15 15:01:07', NULL),
('9E6039AE/0', '9E6039AE', '3B3AEF19', '2023-08-16 08:45:12', '2023-08-16 08:45:12', NULL),
('9E6039AE/1', '9E6039AE', 'A7285208', '2023-08-16 08:45:12', '2023-08-16 08:45:12', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products_category`
--

CREATE TABLE `products_category` (
  `pro_id_category` int(11) UNSIGNED NOT NULL,
  `pro_name_category` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `products_category`
--

INSERT INTO `products_category` (`pro_id_category`, `pro_name_category`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Toolkit', '2023-06-24 15:00:43', NULL, NULL),
(2, 'Tire Wrench', '2023-06-24 15:00:43', NULL, NULL),
(3, 'Jack', '2023-06-24 15:00:43', NULL, NULL),
(4, 'Soap', '2023-06-24 15:00:43', NULL, NULL),
(5, 'Plastic', '2023-06-24 15:00:43', NULL, NULL),
(6, 'Packaging', '2023-07-26 11:00:27', NULL, NULL),
(7, 'IklanAds', '2023-07-26 11:00:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products_group`
--

CREATE TABLE `products_group` (
  `pro_id_group` int(11) UNSIGNED NOT NULL,
  `pro_name_group` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `products_group`
--

INSERT INTO `products_group` (`pro_id_group`, `pro_name_group`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Otomotive', '2023-06-24 15:00:43', NULL, NULL),
(2, 'Sanitation', '2023-06-24 15:00:43', NULL, NULL),
(3, 'Consumable', '2023-07-26 10:59:09', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products_image`
--

CREATE TABLE `products_image` (
  `pro_id_image` int(11) UNSIGNED NOT NULL,
  `pro_id` varchar(20) NOT NULL,
  `pro_image_no` varchar(20) NOT NULL,
  `pro_image_name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `products_image`
--

INSERT INTO `products_image` (`pro_id_image`, `pro_id`, `pro_image_no`, `pro_image_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '3B3AEF19', '1', '3B3AEF19-picture-1.png', '2023-07-04 13:36:01', '2023-07-04 13:36:01', NULL),
(2, '3B3AEF19', '2', '3B3AEF19-picture-2.png', '2023-07-04 13:36:01', '2023-07-04 13:36:01', NULL),
(3, '4773B208', '1', '4773B208-picture-1.png', '2023-07-04 13:37:45', '2023-07-04 13:37:45', NULL),
(4, '4773B208', '2', '4773B208-picture-2.png', '2023-07-04 13:37:45', '2023-07-04 13:37:45', NULL),
(5, '3440F568', '1', '3440F568-picture-1.png', '2023-07-08 10:58:59', '2023-07-08 10:58:59', NULL),
(6, 'E9D891C7', '1', 'E9D891C7-picture-1.png', '2023-07-24 09:51:20', '2023-07-24 09:51:20', NULL),
(7, 'E9D891C7', '2', 'E9D891C7-picture-2.png', '2023-07-24 09:51:20', '2023-07-24 09:51:20', NULL),
(8, 'A7285208', '1', 'A7285208-picture-1.png', '2023-07-24 10:10:54', '2023-07-24 10:10:54', NULL),
(9, 'A7285208', '2', 'A7285208-picture-2.png', '2023-07-24 10:10:54', '2023-07-24 10:10:54', NULL),
(10, 'CAD729A6', '1', 'CAD729A6-picture-1.png', '2023-07-24 10:26:45', '2023-07-24 10:26:45', NULL),
(11, 'CAD729A6', '2', 'CAD729A6-picture-2.png', '2023-07-24 10:26:45', '2023-07-24 10:26:45', NULL),
(20, '04E36BF5', '1', '04E36BF5-picture-1.png', '2023-07-24 10:52:23', '2023-07-24 10:52:23', NULL),
(21, '05E32313', '1', '05E32313-picture-1.png', '2023-07-24 10:55:41', '2023-07-24 10:55:41', NULL),
(22, '05E32313', '2', '05E32313-picture-2.png', '2023-07-24 10:55:41', '2023-07-24 10:55:41', NULL),
(23, 'F595C7E3', '1', 'F595C7E3-picture-1.png', '2023-07-26 11:04:26', '2023-07-26 11:04:26', NULL),
(24, 'AC4EBCF4', '1', 'AC4EBCF4-picture-1.png', '2023-07-26 11:05:44', '2023-07-26 11:05:44', NULL),
(25, 'E3244FE4', '1', 'E3244FE4-picture-1.png', '2023-07-26 11:09:48', '2023-07-26 11:09:48', NULL),
(28, 'A33E50B6', '1', 'A33E50B6-picture-1.png', '2023-08-15 14:48:35', '2023-08-15 14:48:35', NULL),
(29, '35516313', '1', '35516313-picture-1.png', '2023-08-15 15:01:07', '2023-08-15 15:01:07', NULL),
(30, '9E6039AE', '1', '9E6039AE-picture-1.png', '2023-08-16 08:45:12', '2023-08-16 08:45:12', NULL),
(35, '838F7D07', '1', '838F7D07-picture-1.png', '2023-08-26 08:31:44', '2023-08-26 08:31:44', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products_price`
--

CREATE TABLE `products_price` (
  `pro_id_price` varchar(20) NOT NULL,
  `pro_id` varchar(20) NOT NULL,
  `pro_price_basic` float NOT NULL,
  `pro_price_reseler` float NOT NULL,
  `pro_price_seller` float NOT NULL,
  `pro_price_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `products_price`
--

INSERT INTO `products_price` (`pro_id_price`, `pro_id`, `pro_price_basic`, `pro_price_reseler`, `pro_price_seller`, `pro_price_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
('04E36BF5-P-COVJACK-0', '04E36BF5', 10000, 13000, 20000, 0, '2023-07-24 10:52:23', '2023-07-24 10:52:23', NULL),
('05E32313-P-TLBAG-00', '05E32313', 5000, 7000, 9000, 0, '2023-07-24 10:55:40', '2023-07-24 10:55:40', NULL),
('3440F568-P-TW21IMV-0', '3440F568', 35000, 45000, 60000, 0, '2023-07-08 10:58:58', '2023-07-08 10:58:58', NULL),
('35516313-P-TW21RHB-H', '35516313', 52000, 61000, 80000, 0, '2023-08-15 15:01:07', '2023-08-15 15:01:07', NULL),
('3B3AEF19-P-TW21RHB-0', '3B3AEF19', 26000, 32000, 40000, 0, '2023-07-04 13:36:01', '2023-07-04 13:36:01', NULL),
('4773B208-P-TW19REH-0', '4773B208', 29000, 35000, 40000, 0, '2023-07-04 13:37:45', '2023-07-04 13:37:45', NULL),
('838F7D07-P-PCKG-8X8X', '838F7D07', 800, 1500, 2000, 0, '2023-08-26 08:31:44', '2023-08-26 09:49:43', NULL),
('9E6039AE-P-TW21RHB-H', '9E6039AE', 42000, 50000, 60000, 0, '2023-08-16 08:45:12', '2023-08-16 08:45:12', NULL),
('A7285208-P-HDL30D80-', 'A7285208', 16000, 18000, 20000, 0, '2023-07-24 10:10:54', '2023-07-24 10:10:54', NULL),
('AC4EBCF4-P-ADS100-00', 'AC4EBCF4', 100000, 100000, 100000, 0, '2023-07-26 11:05:43', '2023-07-26 11:21:38', NULL),
('CAD729A6-P-HDL50OF-0', 'CAD729A6', 16000, 20000, 40000, 0, '2023-07-24 10:26:45', '2023-07-24 10:26:45', NULL),
('E3244FE4-P-PCKG-', 'E3244FE4', 1000, 2000, 2000, 0, '2023-07-26 11:09:47', '2023-07-26 11:09:47', NULL),
('E9D891C7-P-HDL90X620', 'E9D891C7', 26000, 29000, 40000, 0, '2023-07-24 09:51:20', '2023-07-24 09:51:20', NULL),
('F595C7E3-P-ADS50-00', 'F595C7E3', 50000, 50000, 50000, 0, '2023-07-26 11:04:25', '2023-07-26 11:04:25', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products_show`
--

CREATE TABLE `products_show` (
  `pro_id_show` int(11) UNSIGNED NOT NULL,
  `pro_name_show` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `products_show`
--

INSERT INTO `products_show` (`pro_id_show`, `pro_name_show`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SuAdmin', '2023-06-24 15:00:43', NULL, NULL),
(2, 'Admin', '2023-06-24 15:00:43', NULL, NULL),
(3, 'Reseller', '2023-06-24 15:00:43', NULL, NULL),
(4, 'User', '2023-06-24 15:00:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products_stock`
--

CREATE TABLE `products_stock` (
  `pro_id_stock` varchar(50) NOT NULL,
  `pro_id` varchar(20) NOT NULL,
  `pro_current_stock` int(20) DEFAULT NULL,
  `pro_min_stock` int(20) DEFAULT NULL,
  `pro_max_stock` int(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `products_stock`
--

INSERT INTO `products_stock` (`pro_id_stock`, `pro_id`, `pro_current_stock`, `pro_min_stock`, `pro_max_stock`, `created_at`, `updated_at`, `deleted_at`) VALUES
('04E36BF5-S-COVJACK-0', '04E36BF5', 199, 10, 100, '2023-07-24 10:52:23', '2023-08-25 14:02:12', NULL),
('05E32313-S-TLBAG-00', '05E32313', 150, 10, 100, '2023-07-24 10:55:41', '2023-08-26 14:39:50', NULL),
('3440F568-S-TW21IMV-0', '3440F568', 193, 10, 100, '2023-07-08 10:58:59', '2023-08-26 14:39:01', NULL),
('35516313-S-TW21RHB-H', '35516313', 100, 10, 0, '2023-08-15 15:01:07', '2023-08-15 16:04:02', NULL),
('3B3AEF19-S-TW21RHB-0', '3B3AEF19', 189, 10, 100, '2023-07-04 13:36:01', '2023-08-26 13:32:08', NULL),
('4773B208-S-TW19REH-0', '4773B208', 200, 10, 100, '2023-07-04 13:37:45', '2023-08-18 15:54:00', NULL),
('838F7D07-S-PCKG-8X8X30', '838F7D07', 292, 100, 1000, '2023-08-26 08:31:44', '2023-08-26 14:39:01', NULL),
('9E6039AE-S-TW21RHB-H', '9E6039AE', 10, 10, 10, '2023-08-16 08:45:12', '2023-08-16 08:45:12', NULL),
('A7285208-S-HDL30D80-', 'A7285208', 199, 10, 100, '2023-07-24 10:10:54', '2023-08-26 10:17:56', NULL),
('AC4EBCF4-S-ADS100-00', 'AC4EBCF4', 0, 0, 0, '2023-07-26 11:05:43', '2023-08-18 15:52:08', NULL),
('CAD729A6-S-HDL50OF-0', 'CAD729A6', 200, 10, 100, '2023-07-24 10:26:45', '2023-08-18 15:54:09', NULL),
('E3244FE4-S-PCKG-', 'E3244FE4', 298, 50, 500, '2023-07-26 11:09:48', '2023-08-26 14:39:50', NULL),
('E9D891C7-S-HDL90X620', 'E9D891C7', 190, 10, 100, '2023-07-24 09:51:20', '2023-08-26 13:32:08', NULL),
('F595C7E3-S-ADS50-00', 'F595C7E3', 0, 0, 0, '2023-07-26 11:04:26', '2023-07-26 11:04:26', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products_stock_log`
--

CREATE TABLE `products_stock_log` (
  `products_stock_log_proid` varchar(20) NOT NULL,
  `date_log` date DEFAULT NULL,
  `log_key` varchar(255) NOT NULL,
  `log_code` varchar(255) NOT NULL,
  `log_description` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `last_value` float NOT NULL,
  `trans_value` float NOT NULL,
  `new_value` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `products_stock_log`
--

INSERT INTO `products_stock_log` (`products_stock_log_proid`, `date_log`, `log_key`, `log_code`, `log_description`, `link`, `last_value`, `trans_value`, `new_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
('05E32313', '2023-07-06', '230826/SALES/0001', 'SALES', 'SALES 230706/S/01/05D307BE', 'detail/view/230706S0105D307BE', 170, 10, 160, '2023-08-26 12:51:00', '2023-08-26 12:51:00', NULL),
('E3244FE4', '2023-07-06', '230826/SALES/0002', 'SALES', 'SALES 230706/S/01/05D307BE', 'detail/view/230706S0105D307BE', 300, 1, 299, '2023-08-26 12:51:00', '2023-08-26 12:51:00', NULL),
('3440F568', '2023-08-16', '230826/SALES/0003', 'SALES', 'SALES 230816/S/01/07D92F79', 'detail/view/230816S0107D92F79', 195, 1, 194, '2023-08-26 13:31:30', '2023-08-26 13:31:30', NULL),
('838F7D07', '2023-08-16', '230826/SALES/0004', 'SALES', 'SALES 230816/S/01/07D92F79', 'detail/view/230816S0107D92F79', 295, 1, 294, '2023-08-26 13:31:30', '2023-08-26 13:31:30', NULL),
('3B3AEF19', '2023-08-26', '230826/SALES/0005', 'SALES', 'SALES 230826/S/01/0C0E0E38', 'detail/view/230826S010C0E0E38', 190, 1, 189, '2023-08-26 13:32:08', '2023-08-26 13:32:08', NULL),
('E9D891C7', '2023-08-26', '230826/SALES/0006', 'SALES', 'SALES 230826/S/01/0C0E0E38', 'detail/view/230826S010C0E0E38', 191, 1, 190, '2023-08-26 13:32:08', '2023-08-26 13:32:08', NULL),
('838F7D07', '2023-08-26', '230826/SALES/0007', 'SALES', 'SALES 230826/S/01/0C0E0E38', 'detail/view/230826S010C0E0E38', 294, 1, 293, '2023-08-26 13:32:08', '2023-08-26 13:32:08', NULL),
('3440F568', '2023-08-23', '230826/SALES/0008', 'SALES', 'SALES 230823/S/01/02ABE083', 'detail/view/230823S0102ABE083', 194, 1, 193, '2023-08-26 14:39:01', '2023-08-26 14:39:01', NULL),
('838F7D07', '2023-08-23', '230826/SALES/0009', 'SALES', 'SALES 230823/S/01/02ABE083', 'detail/view/230823S0102ABE083', 293, 1, 292, '2023-08-26 14:39:01', '2023-08-26 14:39:01', NULL),
('05E32313', '2023-08-26', '230826/SALES/0010', 'SALES', 'SALES 230826/S/02/0FEC9E99', 'detail/view/230826S020FEC9E99', 160, 10, 150, '2023-08-26 14:39:50', '2023-08-26 14:39:50', NULL),
('E3244FE4', '2023-08-26', '230826/SALES/0011', 'SALES', 'SALES 230826/S/02/0FEC9E99', 'detail/view/230826S020FEC9E99', 299, 1, 298, '2023-08-26 14:39:50', '2023-08-26 14:39:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase`
--

CREATE TABLE `purchase` (
  `no_purchase` varchar(50) NOT NULL,
  `purch_category` varchar(50) NOT NULL,
  `supplier_id` varchar(50) NOT NULL,
  `date_purchase` date NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `bill` float NOT NULL,
  `payment` float NOT NULL,
  `paymethod` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `purchase`
--

INSERT INTO `purchase` (`no_purchase`, `purch_category`, `supplier_id`, `date_purchase`, `note`, `bill`, `payment`, `paymethod`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('230807/P/01/02B440FC', '3', '2', '2023-08-07', NULL, 300000, 112000, '1', 'Lunas', '2023-08-08 11:39:21', '2023-08-08 11:39:21', NULL),
('230808/P/01/037D04D9', '2', '5013456e', '2023-08-08', NULL, 100000, 100000, '1', 'Lunas', '2023-08-08 11:05:06', '2023-08-08 11:05:06', NULL),
('230808/P/02/0DC9ED22', '2', '5013456e', '2023-08-08', NULL, 100000, 100000, '1', 'Lunas', '2023-08-08 11:13:07', '2023-08-08 11:13:07', NULL),
('230808/P/03/0CB81231', '1', '1', '2023-08-08', NULL, 620000, 620000, '3', 'Lunas', '2023-08-08 11:28:21', '2023-08-18 11:42:30', NULL),
('230808/P/04/00837EBE', '3', '2', '2023-08-08', NULL, 500000, 500000, '1', 'Lunas', '2023-08-08 11:30:58', '2023-08-08 11:30:58', NULL),
('230811/P/01/03DCF2B8', '1', '1', '2023-08-11', NULL, 200000, 200000, '3', 'Lunas', '2023-08-11 15:41:15', '2023-08-18 11:41:07', NULL),
('230811/P/02/01305BFE', '1', '1', '2023-08-11', NULL, 1200000, 1200000, '3', 'Lunas', '2023-08-11 16:03:32', '2023-08-18 12:46:32', NULL),
('230811/P/03/095544A0', '1', '1', '2023-08-11', NULL, 2450000, 2450000, '3', 'Lunas', '2023-08-11 16:04:20', '2023-08-18 12:44:12', NULL),
('230811/P/04/08A20F75', '1', '1', '2023-08-11', NULL, 45000, 45000, '3', 'Lunas', '2023-08-11 16:05:23', '2023-08-18 11:33:46', NULL),
('230818/P/01/0EEFB04F', '1', '1', '2023-08-18', NULL, 2710000, 2710000, '3', 'Lunas', '2023-08-18 12:55:34', '2023-08-18 13:01:42', NULL),
('230818/P/02/0CD66847', '1', '1', '2023-08-18', NULL, 10000, 10000, '3', 'Lunas', '2023-08-18 13:04:15', '2023-08-18 13:05:40', NULL),
('230818/P/03/0F0867EB', '1', '1', '2023-08-18', NULL, 5000, 5000, '3', 'Lunas', '2023-08-18 13:14:04', '2023-08-18 13:14:24', NULL),
('230818/P/04/0C2CA68C', '1', '1', '2023-08-18', NULL, 5000, 5000, '3', 'Lunas', '2023-08-18 13:19:16', '2023-08-18 13:19:32', NULL),
('230818/P/05/02B507DB', '1', '1', '2023-08-18', NULL, 10000, 10000, '3', 'Lunas', '2023-08-18 13:26:16', '2023-08-18 14:18:47', NULL),
('230818/P/06/0C0BCFAF', '1', '1', '2023-08-18', NULL, 20000, 20000, '3', 'Lunas', '2023-08-18 14:21:45', '2023-08-18 14:21:55', NULL),
('230818/P/07/076D3848', '1', '1', '2023-08-18', NULL, 10000, 10000, '3', 'Lunas', '2023-08-18 14:25:26', '2023-08-18 14:25:34', NULL),
('230818/P/08/0766049E', '1', '1', '2023-08-18', NULL, 29000, 0, '3', 'Belum Lunas', '2023-08-18 14:35:06', '2023-08-18 14:35:06', NULL),
('230818/P/09/0BC8F553', '2', '777ab718', '2023-08-18', NULL, 100000, 100000, '1', 'Lunas', '2023-08-18 15:52:08', '2023-08-18 15:52:08', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `no_purchase_detail` varchar(50) NOT NULL,
  `no_purchase` varchar(50) NOT NULL,
  `date_purchase` date NOT NULL,
  `pro_id` varchar(50) NOT NULL,
  `pro_img` varchar(50) NOT NULL,
  `pro_price_basic` float NOT NULL,
  `pro_price` float NOT NULL,
  `pro_qty` float NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `purchase_detail`
--

INSERT INTO `purchase_detail` (`no_purchase_detail`, `no_purchase`, `date_purchase`, `pro_id`, `pro_img`, `pro_price_basic`, `pro_price`, `pro_qty`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('230807/P/01/02B440FC/0', '230807/P/01/02B440FC', '2023-08-07', 'E3244FE4', 'E3244FE4-picture-1.png', 1000, 1000, 300, '', '2023-08-08 11:39:21', '2023-08-08 11:39:21', NULL),
('230808/P/01/037D04D9/0', '230808/P/01/037D04D9', '2023-08-08', 'AC4EBCF4', 'AC4EBCF4-picture-1.png', 100000, 100000, 1, '', '2023-08-08 11:05:06', '2023-08-08 11:05:06', NULL),
('230808/P/02/0DC9ED22/0', '230808/P/02/0DC9ED22', '2023-08-08', 'AC4EBCF4', 'AC4EBCF4-picture-1.png', 100000, 100000, 1, '', '2023-08-08 11:13:07', '2023-08-08 11:13:07', NULL),
('230808/P/03/0CB81231/0', '230808/P/03/0CB81231', '2023-08-08', '05E32313', '05E32313-picture-1.png', 5000, 5000, 20, '', '2023-08-08 11:28:21', '2023-08-08 11:28:21', NULL),
('230808/P/03/0CB81231/1', '230808/P/03/0CB81231', '2023-08-08', '3B3AEF19', '3B3AEF19-picture-1.png', 26000, 26000, 20, '', '2023-08-08 11:28:21', '2023-08-08 11:28:21', NULL),
('230808/P/04/00837EBE/0', '230808/P/04/00837EBE', '2023-08-08', 'E3244FE4', 'E3244FE4-picture-1.png', 1000, 1000, 500, '', '2023-08-08 11:30:58', '2023-08-08 11:30:58', NULL),
('230811/P/01/03DCF2B8/0', '230811/P/01/03DCF2B8', '2023-08-11', '04E36BF5', '04E36BF5-picture-1.png', 10000, 10000, 20, '', '2023-08-11 15:41:15', '2023-08-11 15:41:15', NULL),
('230811/P/02/01305BFE/0', '230811/P/02/01305BFE', '2023-08-11', '05E32313', '05E32313-picture-1.png', 5000, 5000, 30, '', '2023-08-11 16:03:32', '2023-08-11 16:03:32', NULL),
('230811/P/02/01305BFE/1', '230811/P/02/01305BFE', '2023-08-11', '3440F568', '3440F568-picture-1.png', 35000, 35000, 30, '', '2023-08-11 16:03:32', '2023-08-11 16:03:32', NULL),
('230811/P/03/095544A0/0', '230811/P/03/095544A0', '2023-08-11', '04E36BF5', '04E36BF5-picture-1.png', 10000, 10000, 60, '', '2023-08-11 16:04:20', '2023-08-11 16:04:20', NULL),
('230811/P/03/095544A0/1', '230811/P/03/095544A0', '2023-08-11', '05E32313', '05E32313-picture-1.png', 5000, 5000, 20, '', '2023-08-11 16:04:20', '2023-08-11 16:04:20', NULL),
('230811/P/03/095544A0/2', '230811/P/03/095544A0', '2023-08-11', '3440F568', '3440F568-picture-1.png', 35000, 35000, 50, '', '2023-08-11 16:04:20', '2023-08-11 16:04:20', NULL),
('230811/P/04/08A20F75/0', '230811/P/04/08A20F75', '2023-08-11', '04E36BF5', '04E36BF5-picture-1.png', 10000, 10000, 1, '', '2023-08-11 16:05:23', '2023-08-11 16:05:23', NULL),
('230811/P/04/08A20F75/1', '230811/P/04/08A20F75', '2023-08-11', '3440F568', '3440F568-picture-1.png', 35000, 35000, 1, '', '2023-08-11 16:05:23', '2023-08-11 16:05:23', NULL),
('230818/P/01/0EEFB04F/0', '230818/P/01/0EEFB04F', '2023-08-18', '3440F568', '3440F568-picture-1.png', 35000, 35000, 50, '', '2023-08-18 12:55:34', '2023-08-18 12:55:34', NULL),
('230818/P/01/0EEFB04F/1', '230818/P/01/0EEFB04F', '2023-08-18', 'A7285208', 'A7285208-picture-1.png', 16000, 16000, 60, '', '2023-08-18 12:55:34', '2023-08-18 12:55:34', NULL),
('230818/P/02/0CD66847/0', '230818/P/02/0CD66847', '2023-08-18', '04E36BF5', '04E36BF5-picture-1.png', 10000, 10000, 1, '', '2023-08-18 13:04:15', '2023-08-18 13:04:15', NULL),
('230818/P/03/0F0867EB/0', '230818/P/03/0F0867EB', '2023-08-18', '05E32313', '05E32313-picture-1.png', 5000, 5000, 1, '', '2023-08-18 13:14:04', '2023-08-18 13:14:04', NULL),
('230818/P/04/0C2CA68C/0', '230818/P/04/0C2CA68C', '2023-08-18', '05E32313', '05E32313-picture-1.png', 5000, 5000, 1, '', '2023-08-18 13:19:16', '2023-08-18 13:19:16', NULL),
('230818/P/05/02B507DB/0', '230818/P/05/02B507DB', '2023-08-18', '04E36BF5', '04E36BF5-picture-1.png', 10000, 10000, 1, '', '2023-08-18 13:26:16', '2023-08-18 13:26:16', NULL),
('230818/P/06/0C0BCFAF/0', '230818/P/06/0C0BCFAF', '2023-08-18', '04E36BF5', '04E36BF5-picture-1.png', 10000, 10000, 2, '', '2023-08-18 14:21:45', '2023-08-18 14:21:45', NULL),
('230818/P/07/076D3848/0', '230818/P/07/076D3848', '2023-08-18', '04E36BF5', '04E36BF5-picture-1.png', 10000, 10000, 1, '', '2023-08-18 14:25:26', '2023-08-18 14:25:26', NULL),
('230818/P/08/0766049E/0', '230818/P/08/0766049E', '2023-08-18', '4773B208', '4773B208-picture-1.png', 29000, 29000, 1, '', '2023-08-18 14:35:06', '2023-08-18 14:35:06', NULL),
('230818/P/09/0BC8F553/0', '230818/P/09/0BC8F553', '2023-08-18', 'AC4EBCF4', 'AC4EBCF4-picture-1.png', 100000, 100000, 1, '', '2023-08-18 15:52:08', '2023-08-18 15:52:08', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales`
--

CREATE TABLE `sales` (
  `id_sales` varchar(50) NOT NULL,
  `no_sales` varchar(50) NOT NULL,
  `date_sales` date NOT NULL,
  `id_shop` varchar(50) NOT NULL,
  `deliveryservices` varchar(255) NOT NULL,
  `marketplace` varchar(255) DEFAULT NULL,
  `resi` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `packaging` varchar(255) DEFAULT NULL,
  `packaging_charge` float NOT NULL,
  `bill` float NOT NULL,
  `payment` float NOT NULL,
  `paymethod` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `sales`
--

INSERT INTO `sales` (`id_sales`, `no_sales`, `date_sales`, `id_shop`, `deliveryservices`, `marketplace`, `resi`, `note`, `packaging`, `packaging_charge`, `bill`, `payment`, `paymethod`, `status`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
('230706/S/01/05D307BE', 'SAFSAFSAF', '2023-07-06', '777ab718', '4', '777ab718', 'SAFFSAFSA', '', '1', 2000, 90000, 83000, '2', 'Process', '', '2023-08-26 12:51:00', '2023-08-26 12:51:00', NULL),
('230816/S/01/07D92F79', 'AFSSAFSAFSA', '2023-08-16', '777ab718', '4', '777ab718', 'SAFSFSAF', '', '2', 2000, 60000, 56000, '2', 'Process', '', '2023-08-26 13:31:30', '2023-08-26 13:31:30', NULL),
('230823/S/01/02ABE083', 'DSGDSGDSG', '2023-08-23', '777ab718', '3', '777ab718', 'SAFSAFSAFSA', '', '2', 2000, 60000, 56000, '2', 'Process', '', '2023-08-26 14:39:01', '2023-08-26 14:39:01', NULL),
('230826/S/01/0C0E0E38', 'FAFSAFSAFSA', '2023-08-26', '777ab718', '3', '777ab718', 'SFSAFAFSA', '', '2', 2000, 80000, 74000, '2', 'Process', '', '2023-08-26 13:32:08', '2023-08-26 13:32:08', NULL),
('230826/S/02/0FEC9E99', 'DSGFDSGDSG', '2023-08-26', '777ab718', '9', '777ab718', 'SAFSAFASF', '', '1', 2000, 90000, 83000, '2', 'Process', '', '2023-08-26 14:39:50', '2023-08-26 14:39:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales_detail`
--

CREATE TABLE `sales_detail` (
  `id_sales_detail` varchar(50) NOT NULL,
  `no_sales` varchar(50) NOT NULL,
  `date_sales` date NOT NULL,
  `pro_id` varchar(50) NOT NULL,
  `pro_img` varchar(50) NOT NULL,
  `pro_price_basic` float NOT NULL,
  `pro_price` float NOT NULL,
  `pro_qty` float NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `sales_detail`
--

INSERT INTO `sales_detail` (`id_sales_detail`, `no_sales`, `date_sales`, `pro_id`, `pro_img`, `pro_price_basic`, `pro_price`, `pro_qty`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
('230706/S/01/05D307BE/0', 'SAFSAFSAF', '0000-00-00', '05E32313', '05E32313-picture-1.png', 5000, 9000, 10, '', '2023-08-26 12:51:00', '2023-08-26 12:51:00', NULL),
('230816/S/01/07D92F79/0', 'AFSSAFSAFSA', '0000-00-00', '3440F568', '3440F568-picture-1.png', 35000, 60000, 1, '', '2023-08-26 13:31:30', '2023-08-26 13:31:30', NULL),
('230823/S/01/02ABE083/0', 'DSGDSGDSG', '0000-00-00', '3440F568', '3440F568-picture-1.png', 35000, 60000, 1, '', '2023-08-26 14:39:01', '2023-08-26 14:39:01', NULL),
('230826/S/01/0C0E0E38/0', 'FAFSAFSAFSA', '0000-00-00', '35516313', '35516313-picture-1.png', 52000, 80000, 1, '', '2023-08-26 13:32:08', '2023-08-26 13:32:08', NULL),
('230826/S/02/0FEC9E99/0', 'DSGFDSGDSG', '0000-00-00', '05E32313', '05E32313-picture-1.png', 5000, 9000, 10, '', '2023-08-26 14:39:50', '2023-08-26 14:39:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop`
--

CREATE TABLE `shop` (
  `id_shop` varchar(20) NOT NULL,
  `member_id` varchar(20) NOT NULL,
  `name_shop` varchar(255) NOT NULL,
  `marketplace` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address_shop` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `shop`
--

INSERT INTO `shop` (`id_shop`, `member_id`, `name_shop`, `marketplace`, `phone`, `address_shop`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
('5013456e', '4c1249d3', 'QEA', 'Tokopedia', '085716387955', 'JL. Beruang IX No.86', 1, '2023-07-06 08:26:20', '2023-07-06 08:26:56', NULL),
('777ab718', '4c1249d3', 'QEA', 'Shopee', '085716387955', 'JL. Beruang IX No.86', 1, '2023-07-08 12:58:12', '2023-07-08 12:58:13', NULL),
('fc701eff', 'c02625c9', 'Millio', 'Tokopedia', '085000000000', 'Cikarang, Kab Bekasi', 1, '2023-07-20 11:15:32', '2023-07-20 11:15:34', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) NOT NULL DEFAULT 'Avatar.webp',
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `member_id`, `email`, `username`, `fullname`, `phone`, `address`, `user_image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '4c1249d3', 'rf.otomotive@gmail.com', 'qearafowner', 'Deby Eko Hidayat', '085716387955', 'Jl. Beruang IX No.86 Perum Cikarang Baru - Desa Jayamukti', 'Avatar.webp', '$2y$10$bsjEMtkZm.r36u46hr5z6.R04cs7Txyc14GSpnvGOgvosuo6Q6yi.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL),
(2, 'c02625c9', 'qea.lazada@gmail.com', 'qealazada', NULL, NULL, NULL, 'Avatar.webp', '$2y$10$nKTGvX7idiD4KJ/uSQvzx.luRqQI.8D0HeWJi6vsrmQ2zUrE3KlkW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-26 14:06:36', '2023-06-26 14:06:36', NULL),
(3, 'aae8f43b', 'test1@test.com', 'test1', NULL, NULL, NULL, 'Avatar.webp', '$2y$10$V1MGzmyE2F/9uOBGEO0xiuI0lmFrNYys18mjf7nrouh/YKwHqv3WW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-07-24 12:48:13', '2023-07-24 12:48:13', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `balance_account`
--
ALTER TABLE `balance_account`
  ADD UNIQUE KEY `balance_userid` (`balance_userid`);

--
-- Indeks untuk tabel `balance_account_log`
--
ALTER TABLE `balance_account_log`
  ADD KEY `balance_userid_log` (`balance_userid_log`) USING BTREE;

--
-- Indeks untuk tabel `balance_ewallet`
--
ALTER TABLE `balance_ewallet`
  ADD UNIQUE KEY `ewallet_shopid` (`ewallet_shopid`);

--
-- Indeks untuk tabel `balance_ewallet_log`
--
ALTER TABLE `balance_ewallet_log`
  ADD KEY `ewallet_shopid_log` (`ewallet_shopid_log`) USING BTREE;

--
-- Indeks untuk tabel `debt_account`
--
ALTER TABLE `debt_account`
  ADD UNIQUE KEY `debt_userid` (`debt_userid`);

--
-- Indeks untuk tabel `debt_account_log`
--
ALTER TABLE `debt_account_log`
  ADD KEY `debt_userid_log` (`debt_userid_log`) USING BTREE;

--
-- Indeks untuk tabel `list_category_purchase`
--
ALTER TABLE `list_category_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `list_delivery_services`
--
ALTER TABLE `list_delivery_services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `list_marketplace`
--
ALTER TABLE `list_marketplace`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `list_notification`
--
ALTER TABLE `list_notification`
  ADD PRIMARY KEY (`id_notif`),
  ADD UNIQUE KEY `id_notif` (`id_notif`);

--
-- Indeks untuk tabel `list_packaging`
--
ALTER TABLE `list_packaging`
  ADD PRIMARY KEY (`id_packaging`),
  ADD UNIQUE KEY `id_packaging` (`id_packaging`);

--
-- Indeks untuk tabel `list_pay_methode`
--
ALTER TABLE `list_pay_methode`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `list_supplier`
--
ALTER TABLE `list_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD UNIQUE KEY `pro_id` (`pro_id`),
  ADD UNIQUE KEY `pro_part_no` (`pro_part_no`),
  ADD KEY `products_pro_category_foreign` (`pro_category`),
  ADD KEY `products_pro_group_foreign` (`pro_group`),
  ADD KEY `products_pro_show_foreign` (`pro_show`);

--
-- Indeks untuk tabel `products_bundling`
--
ALTER TABLE `products_bundling`
  ADD UNIQUE KEY `id_pro_bundling` (`id_pro_bundling`),
  ADD KEY `products_bundling_pro_id_bundling_item_foreign` (`pro_id_bundling_item`);

--
-- Indeks untuk tabel `products_category`
--
ALTER TABLE `products_category`
  ADD PRIMARY KEY (`pro_id_category`),
  ADD UNIQUE KEY `pro_id_category` (`pro_id_category`),
  ADD UNIQUE KEY `pro_name_category` (`pro_name_category`);

--
-- Indeks untuk tabel `products_group`
--
ALTER TABLE `products_group`
  ADD PRIMARY KEY (`pro_id_group`),
  ADD UNIQUE KEY `pro_id_group` (`pro_id_group`),
  ADD UNIQUE KEY `pro_name_group` (`pro_name_group`);

--
-- Indeks untuk tabel `products_image`
--
ALTER TABLE `products_image`
  ADD UNIQUE KEY `pro_id_image` (`pro_id_image`);

--
-- Indeks untuk tabel `products_price`
--
ALTER TABLE `products_price`
  ADD PRIMARY KEY (`pro_id_price`),
  ADD UNIQUE KEY `pro_id_price` (`pro_id_price`),
  ADD KEY `products_price_pro_id_foreign` (`pro_id`);

--
-- Indeks untuk tabel `products_show`
--
ALTER TABLE `products_show`
  ADD PRIMARY KEY (`pro_id_show`),
  ADD UNIQUE KEY `pro_id_show` (`pro_id_show`),
  ADD UNIQUE KEY `pro_name_show` (`pro_name_show`);

--
-- Indeks untuk tabel `products_stock`
--
ALTER TABLE `products_stock`
  ADD PRIMARY KEY (`pro_id_stock`),
  ADD UNIQUE KEY `pro_id_stock` (`pro_id_stock`),
  ADD KEY `products_stock_pro_id_foreign` (`pro_id`);

--
-- Indeks untuk tabel `products_stock_log`
--
ALTER TABLE `products_stock_log`
  ADD KEY `products_stock_log_proid` (`products_stock_log_proid`) USING BTREE;

--
-- Indeks untuk tabel `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`no_purchase`),
  ADD UNIQUE KEY `no_purchase` (`no_purchase`);

--
-- Indeks untuk tabel `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`no_purchase_detail`),
  ADD UNIQUE KEY `no_purchase_detail` (`no_purchase_detail`);

--
-- Indeks untuk tabel `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sales`),
  ADD UNIQUE KEY `no_sales` (`no_sales`);

--
-- Indeks untuk tabel `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD PRIMARY KEY (`id_sales_detail`),
  ADD UNIQUE KEY `id_sales_detail` (`id_sales_detail`);

--
-- Indeks untuk tabel `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id_shop`),
  ADD UNIQUE KEY `id_shop` (`id_shop`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=541;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `list_category_purchase`
--
ALTER TABLE `list_category_purchase`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `list_delivery_services`
--
ALTER TABLE `list_delivery_services`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `list_marketplace`
--
ALTER TABLE `list_marketplace`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `list_notification`
--
ALTER TABLE `list_notification`
  MODIFY `id_notif` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT untuk tabel `list_pay_methode`
--
ALTER TABLE `list_pay_methode`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `list_supplier`
--
ALTER TABLE `list_supplier`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `products_category`
--
ALTER TABLE `products_category`
  MODIFY `pro_id_category` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `products_group`
--
ALTER TABLE `products_group`
  MODIFY `pro_id_group` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `products_image`
--
ALTER TABLE `products_image`
  MODIFY `pro_id_image` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `products_show`
--
ALTER TABLE `products_show`
  MODIFY `pro_id_show` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `balance_account`
--
ALTER TABLE `balance_account`
  ADD CONSTRAINT `balance_account_balance_userid_foreign` FOREIGN KEY (`balance_userid`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `balance_account_log`
--
ALTER TABLE `balance_account_log`
  ADD CONSTRAINT `balance_account_log_balance_userid_log_foreign` FOREIGN KEY (`balance_userid_log`) REFERENCES `balance_account` (`balance_userid`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `balance_ewallet`
--
ALTER TABLE `balance_ewallet`
  ADD CONSTRAINT `balance_ewallet_ewallet_shopid_foreign` FOREIGN KEY (`ewallet_shopid`) REFERENCES `shop` (`id_shop`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `balance_ewallet_log`
--
ALTER TABLE `balance_ewallet_log`
  ADD CONSTRAINT `balance_ewallet_log_ewallet_shopid_log_foreign` FOREIGN KEY (`ewallet_shopid_log`) REFERENCES `balance_ewallet` (`ewallet_shopid`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `debt_account`
--
ALTER TABLE `debt_account`
  ADD CONSTRAINT `debt_account_debt_userid_foreign` FOREIGN KEY (`debt_userid`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `debt_account_log`
--
ALTER TABLE `debt_account_log`
  ADD CONSTRAINT `debt_account_log_debt_userid_log_foreign` FOREIGN KEY (`debt_userid_log`) REFERENCES `debt_account` (`debt_userid`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_pro_category_foreign` FOREIGN KEY (`pro_category`) REFERENCES `products_category` (`pro_name_category`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_pro_group_foreign` FOREIGN KEY (`pro_group`) REFERENCES `products_group` (`pro_name_group`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_pro_show_foreign` FOREIGN KEY (`pro_show`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products_bundling`
--
ALTER TABLE `products_bundling`
  ADD CONSTRAINT `products_bundling_pro_id_bundling_item_foreign` FOREIGN KEY (`pro_id_bundling_item`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products_price`
--
ALTER TABLE `products_price`
  ADD CONSTRAINT `products_price_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products_stock`
--
ALTER TABLE `products_stock`
  ADD CONSTRAINT `products_stock_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products_stock_log`
--
ALTER TABLE `products_stock_log`
  ADD CONSTRAINT `products_stock_log_products_stock_log_proid_foreign` FOREIGN KEY (`products_stock_log_proid`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
