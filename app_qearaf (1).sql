-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Agu 2023 pada 11.11
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
(141, '::1', 'rf.otomotive@gmail.com', 1, '2023-08-02 15:12:20', 1);

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
(1, 10000000, 0, '2023-08-02 09:02:47', NULL, NULL);

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
('5013456e', 600000, 0, '2023-08-02 09:06:46', NULL, NULL),
('777ab718', 500000, 0, '2023-08-02 09:06:46', NULL, NULL),
('fc701eff', 700000, 0, '2023-08-02 09:06:46', NULL, NULL);

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
(1, 'detail/view/230724S040162AB92', 'Sales Cancel', 'AABBCCDDOO', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Millio Tokopedia Cancel', '', 1, '2023-07-25 08:00:59', '2023-07-25 08:00:59', NULL),
(2, 'detail/view/230724S040162AB92', 'Sales Cancel', 'AABBCCDDOO', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Millio Tokopedia Cancel', '', 1, '2023-07-25 08:00:59', '2023-07-25 08:00:59', NULL),
(3, 'detail/view/230724S040162AB92', 'Sales Cancel', 'AABBCCDDOO', 'c02625c9', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Millio Tokopedia Cancel', '', 1, '2023-07-25 08:00:59', '2023-07-25 08:00:59', NULL),
(4, 'detail/view/230724S03031CD2F5', 'Sales Cancel', 'HGDSJHDSGJHFDS', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Millio Tokopedia Cancel', '', 1, '2023-07-25 08:01:03', '2023-07-25 08:01:03', NULL),
(5, 'detail/view/230724S03031CD2F5', 'Sales Cancel', 'HGDSJHDSGJHFDS', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Millio Tokopedia Cancel', '', 1, '2023-07-25 08:01:03', '2023-07-25 08:01:03', NULL),
(6, 'detail/view/230724S03031CD2F5', 'Sales Cancel', 'HGDSJHDSGJHFDS', 'c02625c9', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Millio Tokopedia Cancel', '', 1, '2023-07-25 08:01:03', '2023-07-25 08:01:03', NULL),
(7, 'detail/view/230724S02041BD2EC', 'Sales Cancel', 'SFDSFSDAFDS', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Cancel', '', 1, '2023-07-25 08:01:07', '2023-07-25 08:01:07', NULL),
(8, 'detail/view/230724S02041BD2EC', 'Sales Cancel', 'SFDSFSDAFDS', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Cancel', '', 1, '2023-07-25 08:01:07', '2023-07-25 08:01:07', NULL),
(9, 'detail/view/230724S090FAC461D', 'Sales Received', 'DGDSGAGADGD', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-07-25 08:01:25', '2023-07-25 08:01:25', NULL),
(10, 'detail/view/230724S090FAC461D', 'Sales Received', 'DGDSGAGADGD', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-07-25 08:01:25', '2023-07-25 08:01:25', NULL),
(11, 'detail/view/230724S08035AC864', 'Sales Received', 'VJNGJGDJHFSHS', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-07-25 08:01:51', '2023-07-25 08:01:51', NULL),
(12, 'detail/view/230724S08035AC864', 'Sales Received', 'VJNGJGDJHFSHS', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-07-25 08:01:51', '2023-07-25 08:01:51', NULL),
(13, 'detail/view/230724S0705094EF6', 'Sales Received', 'DGFHFDDSHGFD6', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-07-25 08:02:06', '2023-07-25 08:02:06', NULL),
(14, 'detail/view/230724S0705094EF6', 'Sales Received', 'DGFHFDDSHGFD6', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-07-25 08:02:06', '2023-07-25 08:02:06', NULL),
(15, 'detail/view/230724S06038EB60B', 'Sales Received', 'DSGASG47636436', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-07-25 08:02:39', '2023-07-25 08:02:39', NULL),
(16, 'detail/view/230724S06038EB60B', 'Sales Received', 'DSGASG47636436', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-07-25 08:02:39', '2023-07-25 08:02:39', NULL),
(17, 'detail/view/230724S090FAC461D', 'Sales Completed', 'DGDSGAGADGD', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-07-25 08:02:50', '2023-07-25 08:02:50', NULL),
(18, 'detail/view/230724S090FAC461D', 'Sales Completed', 'DGDSGAGADGD', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-07-25 08:02:50', '2023-07-25 08:02:50', NULL),
(19, 'detail/view/230724S08035AC864', 'Sales Completed', 'VJNGJGDJHFSHS', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-07-25 08:02:55', '2023-07-25 08:02:55', NULL),
(20, 'detail/view/230724S08035AC864', 'Sales Completed', 'VJNGJGDJHFSHS', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Completed', '', 1, '2023-07-25 08:02:55', '2023-07-25 08:02:55', NULL),
(21, 'detail/view/230724S0506A22F48', 'Sales Return', 'SFAFSAFSAF', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Return', '', 1, '2023-07-25 08:05:23', '2023-07-25 08:05:23', NULL),
(22, 'detail/view/230724S0506A22F48', 'Sales Return', 'SFAFSAFSAF', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Return', '', 1, '2023-07-25 08:05:23', '2023-07-25 08:05:23', NULL),
(23, 'detail/view/230725S0100205A7A', 'New Sales', 'SAFSAFSAFSA', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Confirmed', '', 1, '2023-07-25 10:45:56', '2023-07-25 10:45:56', NULL),
(24, 'detail/view/230725S0100205A7A', 'New Sales', 'SAFSAFSAFSA', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Confirmed', '', 1, '2023-07-25 10:45:56', '2023-07-25 10:45:56', NULL),
(25, 'detail/purchaseview/230725P010B6B96C2', 'Purchase Product', '230725/P/01/0B6B96C2', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 0, '2023-07-25 15:50:08', '2023-07-25 15:50:32', NULL),
(26, 'detail/purchaseview/230725P010B6B96C2', 'Purchase Product', '230725/P/01/0B6B96C2', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 1, '2023-07-25 15:50:08', '2023-07-25 15:50:08', NULL),
(27, 'detail/purchaseview/230725P0200BA7876', 'Purchase Product', '230725/P/02/00BA7876', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 1, '2023-07-25 16:06:30', '2023-07-25 16:06:30', NULL),
(28, 'detail/purchaseview/230725P0200BA7876', 'Purchase Product', '230725/P/02/00BA7876', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 1, '2023-07-25 16:06:30', '2023-07-25 16:06:30', NULL),
(29, 'product/ADS50-00', 'New Product', 'Iklan ADS-50', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 1, '2023-07-26 11:04:26', '2023-07-26 11:04:26', NULL),
(30, 'product/ADS50-00', 'New Product', 'Iklan ADS-50', 'c02625c9', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 1, '2023-07-26 11:04:26', '2023-07-26 11:04:26', NULL),
(31, 'product/ADS50-00', 'New Product', 'Iklan ADS-50', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 1, '2023-07-26 11:04:26', '2023-07-26 11:04:26', NULL),
(32, 'product/ADS100-00', 'New Product', 'Iklan ADS-100', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 1, '2023-07-26 11:05:44', '2023-07-26 11:05:44', NULL),
(33, 'product/ADS100-00', 'New Product', 'Iklan ADS-100', 'c02625c9', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 1, '2023-07-26 11:05:44', '2023-07-26 11:05:44', NULL),
(34, 'product/ADS100-00', 'New Product', 'Iklan ADS-100', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 1, '2023-07-26 11:05:44', '2023-07-26 11:05:44', NULL),
(35, 'product/PCKG-', 'New Product', 'Kardus Small 17x9x6cm', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 0, '2023-07-26 11:09:48', '2023-07-27 08:30:55', NULL),
(36, 'product/PCKG-', 'New Product', 'Kardus Small 17x9x6cm', 'c02625c9', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 1, '2023-07-26 11:09:48', '2023-07-26 11:09:48', NULL),
(37, 'product/PCKG-', 'New Product', 'Kardus Small 17x9x6cm', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 1, '2023-07-26 11:09:48', '2023-07-26 11:09:48', NULL),
(38, 'detail/purchaseview/230727P010675CA10', 'Purchase Product', '230727/P/01/0675CA10', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 0, '2023-07-27 08:16:01', '2023-07-27 08:31:07', NULL),
(39, 'detail/purchaseview/230727P010675CA10', 'Purchase Product', '230727/P/01/0675CA10', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 1, '2023-07-27 08:16:01', '2023-07-27 08:16:01', NULL),
(44, 'detail/purchaseview/230727P0208239F57', 'Purchase ADS (Iklan)', '230727/P/02/08239F57', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee', '', 1, '2023-07-27 08:27:39', '2023-07-27 08:27:39', NULL),
(45, 'detail/purchaseview/230727P0208239F57', 'Purchase ADS (Iklan)', '230727/P/02/08239F57', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee', '', 1, '2023-07-27 08:27:39', '2023-07-27 08:27:39', NULL),
(46, 'detail/purchaseview/230727P030D0EE4B5', 'Purchase Consumable', '230727/P/03/0D0EE4B5', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Online Shop', '', 0, '2023-07-27 08:30:29', '2023-07-27 08:49:42', NULL),
(47, 'detail/purchaseview/230727P030D0EE4B5', 'Purchase Consumable', '230727/P/03/0D0EE4B5', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Online Shop', '', 1, '2023-07-27 08:30:29', '2023-07-27 08:30:29', NULL),
(48, 'detail/view/230727S0102DA1DC5', 'New Sales', 'SAFADGDAGDAG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Confirmed', '', 0, '2023-07-27 08:31:35', '2023-07-27 08:47:07', NULL),
(49, 'detail/view/230727S0102DA1DC5', 'New Sales', 'SAFADGDAGDAG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Confirmed', '', 1, '2023-07-27 08:31:35', '2023-07-27 08:31:35', NULL),
(50, 'detail/purchaseview/230727P0408F0AF1E', 'Purchase Product', '230727/P/04/08F0AF1E', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 0, '2023-07-27 09:02:38', '2023-07-27 09:04:43', NULL),
(51, 'detail/purchaseview/230727P0408F0AF1E', 'Purchase Product', '230727/P/04/08F0AF1E', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 1, '2023-07-27 09:02:38', '2023-07-27 09:02:38', NULL),
(52, 'detail/purchaseview/230727P0106790294', 'Purchase Product', '230727/P/01/06790294', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 0, '2023-07-27 10:03:25', '2023-07-27 11:07:08', NULL),
(53, 'detail/purchaseview/230727P0106790294', 'Purchase Product', '230727/P/01/06790294', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 1, '2023-07-27 10:03:25', '2023-07-27 10:03:25', NULL),
(54, 'detail/purchaseview/230727P020B896C34', 'Purchase ADS (Iklan)', '230727/P/02/0B896C34', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia', '', 0, '2023-07-27 10:04:00', '2023-07-27 10:04:51', NULL),
(55, 'detail/purchaseview/230727P020B896C34', 'Purchase ADS (Iklan)', '230727/P/02/0B896C34', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia', '', 1, '2023-07-27 10:04:00', '2023-07-27 10:04:00', NULL),
(56, 'detail/purchaseview/230727P030C86FC03', 'Purchase Consumable', '230727/P/03/0C86FC03', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Online Shop', '', 0, '2023-07-27 10:04:25', '2023-07-27 11:14:34', NULL),
(57, 'detail/purchaseview/230727P030C86FC03', 'Purchase Consumable', '230727/P/03/0C86FC03', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Online Shop', '', 1, '2023-07-27 10:04:25', '2023-07-27 10:04:25', NULL),
(60, 'detail/purchaseview/230727P010C49125C', 'Purchase Product', '230727/P/01/0C49125C', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 0, '2023-07-27 10:28:50', '2023-07-27 11:12:16', NULL),
(61, 'detail/purchaseview/230727P010C49125C', 'Purchase Product', '230727/P/01/0C49125C', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 1, '2023-07-27 10:28:50', '2023-07-27 10:28:50', NULL),
(62, 'detail/purchaseview/230727P02023BC30E', 'Purchase ADS (Iklan)', '230727/P/02/023BC30E', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia', '', 0, '2023-07-27 10:29:22', '2023-07-27 11:12:22', NULL),
(63, 'detail/purchaseview/230727P02023BC30E', 'Purchase ADS (Iklan)', '230727/P/02/023BC30E', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia', '', 1, '2023-07-27 10:29:22', '2023-07-27 10:29:22', NULL),
(64, 'detail/purchaseview/230727P03084C4BC2', 'Purchase Consumable', '230727/P/03/084C4BC2', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Online Shop', '', 0, '2023-07-27 10:29:56', '2023-07-27 13:26:46', NULL),
(65, 'detail/purchaseview/230727P03084C4BC2', 'Purchase Consumable', '230727/P/03/084C4BC2', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Online Shop', '', 1, '2023-07-27 10:29:56', '2023-07-27 10:29:56', NULL),
(66, 'detail/purchaseview/230727P04058F1E25', 'Purchase Product', '230727/P/04/058F1E25', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 0, '2023-07-27 14:03:29', '2023-08-01 09:04:21', NULL),
(67, 'detail/purchaseview/230727P04058F1E25', 'Purchase Product', '230727/P/04/058F1E25', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from Menara Terus Makmur (METEMA)', '', 1, '2023-07-27 14:03:29', '2023-07-27 14:03:29', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `list_packaging`
--

CREATE TABLE `list_packaging` (
  `id_packaging` varchar(20) NOT NULL,
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

INSERT INTO `list_packaging` (`id_packaging`, `name_packaging`, `price_packaging`, `stock_packaging`, `created_at`, `updated_at`, `deleted_at`) VALUES
('0', 'No Packaging', 500, 0, NULL, NULL, NULL),
('1', 'Small 17x9x6cm', 2000, 500, NULL, NULL, NULL),
('2', 'Long 8x8x30cm', 2000, 500, NULL, NULL, NULL);

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
(37, '2023-08-02-013101', 'App\\Database\\Migrations\\CreateBalanceAccount', 'default', 'App', 1690941750, 15),
(38, '2023-08-02-012249', 'App\\Database\\Migrations\\CreateEwalet', 'default', 'App', 1690941959, 16);

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
('04E36BF5', 'COVJACK-00', 'Cover', 'Jack', '', '', 'Jack', 'Otomotive', 4, 0, 1, '', '2023-07-24 10:52:22', '2023-07-24 10:52:22', NULL),
('05E32313', 'TLBAG-00', 'Tool', 'Bag', '', '', 'Toolkit', 'Otomotive', 4, 0, 1, '', '2023-07-24 10:55:40', '2023-07-24 10:55:40', NULL),
('3440F568', 'TW21IMV-0', 'Tire Wrench', '21 IMV', '', '', 'Tire Wrench', 'Otomotive', 4, 0, 1, '', '2023-07-08 10:58:58', '2023-07-08 10:58:58', NULL),
('3B3AEF19', 'TW21RHB-0', 'Tire Wrench', '21 RHB', '', '', 'Tire Wrench', 'Otomotive', 4, 0, 1, '', '2023-07-04 13:36:01', '2023-07-04 13:36:01', NULL),
('4773B208', 'TW19REH-0', 'Tire Wrench', '19 REH', '', '', 'Tire Wrench', 'Otomotive', 4, 0, 1, '', '2023-07-04 13:37:45', '2023-07-04 13:37:45', NULL),
('A7285208', 'HDL30D80-00', 'Handle', 'D80', '', '', 'Tire Wrench', 'Otomotive', 4, 0, 1, '', '2023-07-24 10:10:54', '2023-07-24 10:10:54', NULL),
('AC4EBCF4', 'ADS100-00', 'Iklan', 'ADS-100', '', '', 'IklanAds', 'Consumable', 2, 0, 1, '', '2023-07-26 11:05:43', '2023-07-26 11:21:38', NULL),
('CAD729A6', 'HDL50OF-00', 'Handle', 'OF', '', '', 'Tire Wrench', 'Otomotive', 4, 0, 1, '', '2023-07-24 10:26:45', '2023-07-24 10:26:45', NULL),
('E3244FE4', 'PCKG-', 'Kardus', 'Small 17x9x6cm', '', '', 'Packaging', 'Consumable', 2, 0, 1, '', '2023-07-26 11:09:47', '2023-07-26 11:09:47', NULL),
('E9D891C7', 'HDL90X620-00', 'Handle', 'X620', '', '', 'Tire Wrench', 'Otomotive', 4, 0, 1, '', '2023-07-24 09:51:20', '2023-07-24 09:51:20', NULL),
('F595C7E3', 'ADS50-00', 'Iklan', 'ADS-50', '', '', 'IklanAds', 'Consumable', 2, 0, 1, '', '2023-07-26 11:04:25', '2023-07-26 11:04:25', NULL);

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
(25, 'E3244FE4', '1', 'E3244FE4-picture-1.png', '2023-07-26 11:09:48', '2023-07-26 11:09:48', NULL);

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
('3B3AEF19-P-TW21RHB-0', '3B3AEF19', 26000, 32000, 40000, 0, '2023-07-04 13:36:01', '2023-07-04 13:36:01', NULL),
('4773B208-P-TW19REH-0', '4773B208', 29000, 35000, 40000, 0, '2023-07-04 13:37:45', '2023-07-04 13:37:45', NULL),
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
  `pro_id_stock` varchar(20) NOT NULL,
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
('04E36BF5-S-COVJACK-0', '04E36BF5', 0, 10, 100, '2023-07-24 10:52:23', '2023-07-24 10:52:23', NULL),
('05E32313-S-TLBAG-00', '05E32313', 60, 10, 100, '2023-07-24 10:55:41', '2023-07-24 10:55:41', NULL),
('3440F568-S-TW21IMV-0', '3440F568', 20, 10, 100, '2023-07-08 10:58:59', '2023-07-08 10:58:59', NULL),
('3B3AEF19-S-TW21RHB-0', '3B3AEF19', 25, 10, 100, '2023-07-04 13:36:01', '2023-07-04 13:36:01', NULL),
('4773B208-S-TW19REH-0', '4773B208', 15, 10, 100, '2023-07-04 13:37:45', '2023-07-04 13:37:45', NULL),
('A7285208-S-HDL30D80-', 'A7285208', 15, 10, 100, '2023-07-24 10:10:54', '2023-07-24 10:10:54', NULL),
('AC4EBCF4-S-ADS100-00', 'AC4EBCF4', 1, 1, 1, '2023-07-26 11:05:43', '2023-07-26 11:21:38', NULL),
('CAD729A6-S-HDL50OF-0', 'CAD729A6', 16, 10, 100, '2023-07-24 10:26:45', '2023-07-24 10:26:45', NULL),
('E3244FE4-S-PCKG-', 'E3244FE4', 100, 50, 500, '2023-07-26 11:09:48', '2023-07-26 11:09:48', NULL),
('E9D891C7-S-HDL90X620', 'E9D891C7', 15, 10, 100, '2023-07-24 09:51:20', '2023-07-24 09:51:20', NULL),
('F595C7E3-S-ADS50-00', 'F595C7E3', 1, 1, 1, '2023-07-26 11:04:26', '2023-07-26 11:04:26', NULL);

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
('230727/P/01/0C49125C', '1', '1', '2023-07-27', NULL, 140000, 140000, '1', 'Lunas', '2023-07-27 10:28:50', '2023-07-27 10:28:50', NULL),
('230727/P/02/023BC30E', '2', '5013456e', '2023-07-27', NULL, 100000, 100000, '1', 'Lunas', '2023-07-27 10:29:22', '2023-07-27 10:29:22', NULL),
('230727/P/03/084C4BC2', '3', '2', '2023-07-27', NULL, 600000, 200000, '1', 'Lunas', '2023-07-27 10:29:56', '2023-07-27 10:29:56', NULL),
('230727/P/04/058F1E25', '1', '1', '2023-07-27', NULL, 2400000, 0, '3', 'Belum Lunas', '2023-07-27 14:03:29', '2023-07-27 14:03:29', NULL);

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
('230727/P/01/0C49125C/0', '230727/P/01/0C49125C', '2023-07-27', '3440F568', '3440F568-picture-1.png', 35000, 60000, 1, '', '2023-07-27 10:28:50', '2023-07-27 10:28:50', NULL),
('230727/P/01/0C49125C/1', '230727/P/01/0C49125C', '2023-07-27', '3B3AEF19', '3B3AEF19-picture-1.png', 26000, 40000, 1, '', '2023-07-27 10:28:50', '2023-07-27 10:28:50', NULL),
('230727/P/01/0C49125C/2', '230727/P/01/0C49125C', '2023-07-27', '4773B208', '4773B208-picture-1.png', 29000, 40000, 1, '', '2023-07-27 10:28:50', '2023-07-27 10:28:50', NULL),
('230727/P/02/023BC30E/0', '230727/P/02/023BC30E', '2023-07-27', 'AC4EBCF4', 'AC4EBCF4-picture-1.png', 100000, 100000, 1, '', '2023-07-27 10:29:22', '2023-07-27 10:29:22', NULL),
('230727/P/03/084C4BC2/0', '230727/P/03/084C4BC2', '2023-07-27', 'E3244FE4', 'E3244FE4-picture-1.png', 1000, 2000, 300, '', '2023-07-27 10:29:56', '2023-07-27 10:29:56', NULL),
('230727/P/04/058F1E25/0', '230727/P/04/058F1E25', '2023-07-27', '3440F568', '3440F568-picture-1.png', 35000, 60000, 40, '', '2023-07-27 14:03:29', '2023-07-27 14:03:29', NULL);

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
('230713/S/01/044B0EB1', 'GFJFDSHDHAFHGD', '2023-07-13', '777ab718', '4', '777ab718', 'DGDSGDSGSGDS', '', '1', 2000, 260000, 0, '1', 'Process', '', '2023-07-20 12:43:57', '2023-07-24 15:55:32', NULL),
('230714/S/01/0F418442', 'AFSAFSAFSAFSA', '2023-07-14', '777ab718', '3', '777ab718', 'AFSSAFSAF', '', '1', 2000, 120000, 90000, '1', 'Process', '', '2023-07-14 09:03:59', '2023-07-21 15:48:58', NULL),
('230714/S/02/049DAECE', '35253/DSAFAFAF/3525', '2023-07-14', '5013456e', '6', '5013456e', '3FGSG3DSAFSA', '', '1', 2000, 140000, 128000, '1', 'Process', '', '2023-07-14 09:04:37', '2023-07-21 15:48:37', NULL),
('230714/S/03/05DFF412', 'BCXBXB4436', '2023-07-14', '777ab718', '7', '777ab718', 'FAFSAFSAFSA', '', '1', 2000, 280000, 254000, '2', 'Packaging', '', '2023-07-14 09:05:08', '2023-07-25 08:00:27', NULL),
('230714/S/04/093FCC99', 'BXFXSHGF', '2023-07-14', '5013456e', '4', '5013456e', 'DSGSDG', '', '1', 2000, 60000, 50000, '2', 'Packaging', '', '2023-07-14 09:05:44', '2023-07-25 08:00:24', NULL),
('230714/S/05/0F15A070', 'MFHFSHDSDA', '2023-07-14', '777ab718', '4', '777ab718', 'GFDAGDAGDA', '', '1', 2000, 60000, 56000, '2', 'Ready', '', '2023-07-14 09:06:03', '2023-07-25 08:02:19', NULL),
('230720/S/01/08230318', 'FDDFDSAGFHGADSGDG', '2023-07-20', 'fc701eff', '4', 'fc701eff', 'SGSAGDSGDS', '', '1', 2000, 420000, 380000, '1', 'Ready', '', '2023-07-20 11:16:06', '2023-07-25 08:00:42', NULL),
('230720/S/02/0470815C', 'KLKKJG5765347547', '2023-07-20', 'fc701eff', '1', 'fc701eff', 'DSGDSGDSGDSGDS', '', '2', 2000, 100000, 90000, '2', 'Ready', '', '2023-07-20 13:59:00', '2023-07-25 08:00:39', NULL),
('230721/S/01/01132985', '5364WFEDAFAFSA', '2023-07-21', '777ab718', '3', '777ab718', 'SAFSAFSAFSAF', '', '2', 2000, 120000, 115000, '2', 'Delivery', '', '2023-07-21 07:49:46', '2023-07-25 08:02:25', NULL),
('230724/S/01/05E0FA07', 'DGDGSGDSG', '2023-07-24', 'fc701eff', '3', 'fc701eff', '54654654654', '', '1', 2000, 20000, 0, '2', 'Delivery', '', '2023-07-24 13:38:50', '2023-07-25 08:01:11', NULL),
('230724/S/02/041BD2EC', 'SFDSFSDAFDS', '2023-07-24', '777ab718', '4', '777ab718', 'SADFASFSAFSAF', 'safsafsa', '1', 2000, 20000, 0, '1', 'Cancel', '', '2023-07-24 13:47:32', '2023-07-25 08:01:07', NULL),
('230724/S/03/031CD2F5', 'HGDSJHDSGJHFDS', '2023-07-24', 'fc701eff', '4', 'fc701eff', 'SAFSAFSAFSA', '', '1', 2000, 40000, 0, '1', 'Cancel', '', '2023-07-24 13:52:37', '2023-07-25 08:01:03', NULL),
('230724/S/04/0162AB92', 'AABBCCDDOO', '2023-07-24', 'fc701eff', '10', 'fc701eff', 'SAFSAF35252523', '', '1', 2000, 40000, 0, '1', 'Cancel', '', '2023-07-24 14:38:38', '2023-07-25 08:00:59', NULL),
('230724/S/05/06A22F48', 'SFAFSAFSAF', '2023-07-24', '5013456e', '4', '5013456e', 'DFSAFSFSA', '', '1', 2000, 40000, 0, '1', 'Return', '', '2023-07-24 14:56:05', '2023-07-25 08:05:23', NULL),
('230724/S/06/038EB60B', 'DSGASG47636436', '2023-07-24', '777ab718', '3', '777ab718', 'FDAZFA533253252', '', '2', 2000, 300000, 270000, '2', 'Received', '', '2023-07-24 15:00:47', '2023-07-25 08:02:39', NULL),
('230724/S/07/05094EF6', 'DGFHFDDSHGFD6', '2023-07-24', '777ab718', '4', '777ab718', 'SAFSAFSAFSAF', '', '1', 2000, 40000, 35000, '2', 'Received', '', '2023-07-24 15:03:00', '2023-07-25 08:02:06', NULL),
('230724/S/08/035AC864', 'VJNGJGDJHFSHS', '2023-07-24', '777ab718', '8', '777ab718', 'SAFSAFSAFSA', '', '2', 2000, 40000, 35000, '1', 'Completed', '', '2023-07-24 15:03:48', '2023-07-25 08:02:55', NULL),
('230724/S/09/0FAC461D', 'DGDSGAGADGD', '2023-07-24', '777ab718', '10', '777ab718', 'SAFSAFSAFSAF', '', '1', 2000, 120000, 100000, '2', 'Completed', '', '2023-07-24 16:06:10', '2023-07-25 08:02:50', NULL),
('230725/S/01/00205A7A', 'SAFSAFSAFSA', '2023-07-25', '5013456e', '5', '5013456e', 'SAFSAFSAF', '', '2', 2000, 9000, 10100, '2', 'Process', '', '2023-07-25 10:45:56', '2023-07-25 10:45:56', NULL),
('230727/S/01/02DA1DC5', 'SAFADGDAGDAG', '2023-07-27', '5013456e', '1', '5013456e', 'DGSD4464364363', '', '2', 2000, 300000, 272000, '1', 'Process', '', '2023-07-27 08:31:35', '2023-07-27 08:31:35', NULL);

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
('230713/S/01/044B0EB1/0', 'GFJFDSHDHAFHGD', '0000-00-00', '3440F568', '3440F568-picture-1.png', 35000, 60000, 1, '', '2023-07-20 13:58:01', '2023-07-20 13:58:01', NULL),
('230713/S/01/044B0EB1/1', 'GFJFDSHDHAFHGD', '0000-00-00', '3B3AEF19', '3B3AEF19-picture-1.png', 26000, 40000, 5, '', '2023-07-20 13:58:01', '2023-07-20 13:58:01', NULL),
('230714/S/01/0F418442/0', 'AFSAFSAFSAFSA', '0000-00-00', '3440F568', '3440F568-picture-1.png', 35000, 60000, 2, '', '2023-07-14 09:03:59', '2023-07-14 09:03:59', NULL),
('230714/S/02/049DAECE/0', '35253/DSAFAFAF/3525', '0000-00-00', '3440F568', '3440F568-picture-1.png', 35000, 60000, 1, '', '2023-07-14 09:04:37', '2023-07-14 09:04:37', NULL),
('230714/S/02/049DAECE/1', '35253/DSAFAFAF/3525', '0000-00-00', '3B3AEF19', '3B3AEF19-picture-1.png', 26000, 40000, 1, '', '2023-07-14 09:04:37', '2023-07-14 09:04:37', NULL),
('230714/S/02/049DAECE/2', '35253/DSAFAFAF/3525', '0000-00-00', '4773B208', '4773B208-picture-1.png', 29000, 40000, 1, '', '2023-07-14 09:04:37', '2023-07-14 09:04:37', NULL),
('230714/S/03/05DFF412/0', 'BCXBXB4436', '0000-00-00', '3440F568', '3440F568-picture-1.png', 35000, 60000, 4, '', '2023-07-14 09:05:08', '2023-07-14 09:05:08', NULL),
('230714/S/03/05DFF412/1', 'BCXBXB4436', '0000-00-00', '3B3AEF19', '3B3AEF19-picture-1.png', 26000, 40000, 1, '', '2023-07-14 09:05:08', '2023-07-14 09:05:08', NULL),
('230714/S/04/093FCC99/0', 'BXFXSHGF', '0000-00-00', '3440F568', '3440F568-picture-1.png', 35000, 60000, 1, '', '2023-07-14 09:05:45', '2023-07-14 09:05:45', NULL),
('230714/S/05/0F15A070/0', 'MFHFSHDSDA', '0000-00-00', '3440F568', '3440F568-picture-1.png', 35000, 60000, 1, '', '2023-07-14 09:06:03', '2023-07-14 09:06:03', NULL),
('230720/S/01/08230318/0', 'FDDFDSAGFHGADSGDG', '0000-00-00', '3440F568', '3440F568-picture-1.png', 35000, 60000, 7, '', '2023-07-20 11:16:06', '2023-07-20 11:16:06', NULL),
('230720/S/02/0470815C/0', 'KLKKJG5765347547', '0000-00-00', '3440F568', '3440F568-picture-1.png', 35000, 60000, 1, '', '2023-07-20 13:59:00', '2023-07-20 13:59:00', NULL),
('230720/S/02/0470815C/1', 'KLKKJG5765347547', '0000-00-00', '3B3AEF19', '3B3AEF19-picture-1.png', 26000, 40000, 1, '', '2023-07-20 13:59:00', '2023-07-20 13:59:00', NULL),
('230721/S/01/01132985/0', '5364WFEDAFAFSA', '0000-00-00', '3440F568', '3440F568-picture-1.png', 35000, 60000, 2, '', '2023-07-21 07:49:46', '2023-07-21 07:49:46', NULL),
('230724/S/01/05E0FA07/0', 'DGDGSGDSG', '0000-00-00', '04E36BF5', '04E36BF5-picture-1.png', 10000, 20000, 1, '', '2023-07-24 13:38:50', '2023-07-24 13:38:50', NULL),
('230724/S/02/041BD2EC/0', 'SFDSFSDAFDS', '0000-00-00', '04E36BF5', '04E36BF5-picture-1.png', 10000, 20000, 1, '', '2023-07-24 13:47:32', '2023-07-24 13:47:32', NULL),
('230724/S/03/031CD2F5/0', 'HGDSJHDSGJHFDS', '0000-00-00', '04E36BF5', '04E36BF5-picture-1.png', 10000, 20000, 2, '', '2023-07-24 13:52:37', '2023-07-24 13:52:37', NULL),
('230724/S/04/0162AB92/0', 'AABBCCDDOO', '0000-00-00', '4773B208', '4773B208-picture-1.png', 29000, 40000, 1, '', '2023-07-24 14:38:38', '2023-07-24 14:38:38', NULL),
('230724/S/05/06A22F48/0', 'SFAFSAFSAF', '0000-00-00', 'CAD729A6', 'CAD729A6-picture-1.png', 16000, 40000, 1, '', '2023-07-24 14:56:05', '2023-07-24 14:56:05', NULL),
('230724/S/06/038EB60B/0', 'DSGASG47636436', '0000-00-00', '3440F568', '3440F568-picture-1.png', 35000, 60000, 5, '', '2023-07-24 15:00:47', '2023-07-24 15:00:47', NULL),
('230724/S/07/05094EF6/0', 'DGFHFDDSHGFD6', '0000-00-00', '04E36BF5', '04E36BF5-picture-1.png', 10000, 20000, 2, '', '2023-07-24 15:03:00', '2023-07-24 15:03:00', NULL),
('230724/S/08/035AC864/0', 'VJNGJGDJHFSHS', '0000-00-00', 'E9D891C7', 'E9D891C7-picture-1.png', 26000, 40000, 1, '', '2023-07-24 15:03:48', '2023-07-24 15:03:48', NULL),
('230724/S/09/0FAC461D/0', 'DGDSGAGADGD', '0000-00-00', 'CAD729A6', 'CAD729A6-picture-1.png', 16000, 40000, 3, '', '2023-07-24 16:06:10', '2023-07-24 16:06:10', NULL),
('230725/S/01/00205A7A/0', 'SAFSAFSAFSA', '0000-00-00', '05E32313', '05E32313-picture-1.png', 5000, 9000, 1, '', '2023-07-25 10:45:56', '2023-07-25 10:45:56', NULL),
('230727/S/01/02DA1DC5/0', 'SAFADGDAGDAG', '0000-00-00', '3440F568', '3440F568-picture-1.png', 35000, 60000, 5, '', '2023-07-27 08:31:35', '2023-07-27 08:31:35', NULL);

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
-- Indeks untuk tabel `balance_ewallet`
--
ALTER TABLE `balance_ewallet`
  ADD UNIQUE KEY `ewallet_shopid` (`ewallet_shopid`);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

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
  MODIFY `id_notif` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
  MODIFY `pro_id_image` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
-- Ketidakleluasaan untuk tabel `balance_ewallet`
--
ALTER TABLE `balance_ewallet`
  ADD CONSTRAINT `balance_ewallet_ewallet_shopid_foreign` FOREIGN KEY (`ewallet_shopid`) REFERENCES `shop` (`id_shop`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_pro_category_foreign` FOREIGN KEY (`pro_category`) REFERENCES `products_category` (`pro_name_category`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_pro_group_foreign` FOREIGN KEY (`pro_group`) REFERENCES `products_group` (`pro_name_group`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_pro_show_foreign` FOREIGN KEY (`pro_show`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
