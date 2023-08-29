-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Agu 2023 pada 04.17
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
(3, 2);

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
('777ab718', 862000, 0, '2023-08-08 10:44:51', '2023-08-26 22:38:10', NULL),
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `consumable_log`
--

CREATE TABLE `consumable_log` (
  `id_consumable` int(11) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `procon_id` varchar(50) NOT NULL,
  `id_sales_consum` varchar(50) NOT NULL,
  `consum_qty` float NOT NULL,
  `consum_price` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(262, 'detail/view/230826S020FEC9E99', 'New Sales', 'DSGFDSGDSG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 14:39:50', '2023-08-26 14:39:50', NULL),
(263, 'detail/view/230826S0300049226', 'New Sales', 'DSGSFAGSDGSD', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 22:29:45', '2023-08-26 22:29:45', NULL),
(264, 'detail/view/230826S0300049226', 'New Sales', 'DSGSFAGSDGSD', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 22:29:45', '2023-08-26 22:29:45', NULL),
(265, 'product/LAKBAN-00', 'New Product', 'LAKBAN BENING', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 1, '2023-08-26 22:36:17', '2023-08-26 22:36:17', NULL),
(266, 'product/LAKBAN-00', 'New Product', 'LAKBAN BENING', 'c02625c9', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 1, '2023-08-26 22:36:17', '2023-08-26 22:36:17', NULL),
(267, 'product/LAKBAN-00', 'New Product', 'LAKBAN BENING', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'is now available', '', 1, '2023-08-26 22:36:17', '2023-08-26 22:36:17', NULL),
(268, 'detail/purchaseview/230713P0104E9967D', 'Purchase ADS (Iklan)', '230713/P/01/04E9967D', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee', '', 1, '2023-08-26 22:38:10', '2023-08-26 22:38:10', NULL),
(269, 'detail/purchaseview/230713P0104E9967D', 'Purchase ADS (Iklan)', '230713/P/01/04E9967D', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee', '', 1, '2023-08-26 22:38:10', '2023-08-26 22:38:10', NULL),
(270, 'detail/view/230711S010D99BB39', 'New Sales', 'ASFSAFSFGSAG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 22:51:25', '2023-08-26 22:51:25', NULL),
(271, 'detail/view/230711S010D99BB39', 'New Sales', 'ASFSAFSFGSAG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 22:51:25', '2023-08-26 22:51:25', NULL),
(272, 'detail/view/230711S010D99BB39', 'Sales Received', 'ASFSAFSFGSAG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-26 22:51:50', '2023-08-26 22:51:50', NULL),
(273, 'detail/view/230711S010D99BB39', 'Sales Received', 'ASFSAFSFGSAG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-26 22:51:50', '2023-08-26 22:51:50', NULL),
(274, 'detail/view/230826S010753CEBA', 'New Sales', 'SDSAFSAFSAFAS', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 23:31:04', '2023-08-26 23:31:04', NULL),
(275, 'detail/view/230826S010753CEBA', 'New Sales', 'SDSAFSAFSAFAS', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-26 23:31:04', '2023-08-26 23:31:04', NULL),
(276, 'detail/view/230729S0108E12A9B', 'New Sales', 'DGDAGADGADGAG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-27 00:47:36', '2023-08-27 00:47:36', NULL),
(277, 'detail/view/230729S0108E12A9B', 'New Sales', 'DGDAGADGADGAG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-27 00:47:36', '2023-08-27 00:47:36', NULL),
(278, 'detail/view/230729S0108E12A9B', 'Sales Received', 'DGDAGADGADGAG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-27 00:49:02', '2023-08-27 00:49:02', NULL),
(279, 'detail/view/230729S0108E12A9B', 'Sales Received', 'DGDAGADGADGAG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-27 00:49:02', '2023-08-27 00:49:02', NULL),
(280, 'detail/view/230826S010753CEBA', 'Sales Received', 'SDSAFSAFSAFAS', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-27 00:52:30', '2023-08-27 00:52:30', NULL),
(281, 'detail/view/230826S010753CEBA', 'Sales Received', 'SDSAFSAFSAFAS', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Received', '', 1, '2023-08-27 00:52:30', '2023-08-27 00:52:30', NULL),
(282, 'detail/view/230718S010414BBD4', 'New Sales', 'FADGADGDAGDA', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-27 01:01:59', '2023-08-27 01:01:59', NULL),
(283, 'detail/view/230718S010414BBD4', 'New Sales', 'FADGADGDAGDA', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-27 01:01:59', '2023-08-27 01:01:59', NULL),
(284, 'detail/view/230827S010B9F5BBC', 'New Sales', 'SDGDFHFDHDFAH', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-27 22:47:24', '2023-08-27 22:47:24', NULL),
(285, 'detail/view/230827S010B9F5BBC', 'New Sales', 'SDGDFHFDHDFAH', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Shopee Confirmed', '', 1, '2023-08-27 22:47:24', '2023-08-27 22:47:24', NULL),
(286, 'detail/view/230828S0101CE1A9D', 'New Sales', 'SGSAGADSGSDG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from TESTSHOP2 Shopee Confirmed', '', 1, '2023-08-28 01:01:33', '2023-08-28 01:01:33', NULL),
(287, 'detail/view/230828S0101CE1A9D', 'New Sales', 'SGSAGADSGSDG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from TESTSHOP2 Shopee Confirmed', '', 1, '2023-08-28 01:01:33', '2023-08-28 01:01:33', NULL),
(288, 'detail/view/230828S0101CE1A9D', 'New Sales', 'SGSAGADSGSDG', '0cc53c00', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from TESTSHOP2 Shopee Confirmed', '', 1, '2023-08-28 01:01:33', '2023-08-28 01:01:33', NULL),
(289, 'detail/view/230829S010CAAA1DF', 'New Sales', 'GFSAGFSAGFSA', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Confirmed', '', 1, '2023-08-29 08:42:05', '2023-08-29 08:42:05', NULL),
(290, 'detail/view/230829S010CAAA1DF', 'New Sales', 'GFSAGFSAGFSA', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Confirmed', '', 1, '2023-08-29 08:42:05', '2023-08-29 08:42:05', NULL),
(291, 'detail/view/230829S0101366EF3', 'New Sales', 'AGADSGADGDAG', '4c1249d3', 'Deby Eko Hidayat', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Confirmed', '', 1, '2023-08-29 09:13:29', '2023-08-29 09:13:29', NULL),
(292, 'detail/view/230829S0101366EF3', 'New Sales', 'AGADSGADGDAG', 'aae8f43b', '', '', '4c1249d3', 'Deby Eko Hidayat', 'Avatar.webp', 'from QEA Tokopedia Confirmed', '', 1, '2023-08-29 09:13:29', '2023-08-29 09:13:29', NULL);

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
(49, '2023-08-15-063245', 'App\\Database\\Migrations\\CreateProductBundling', 'default', 'App', 1692085562, 16),
(51, '2023-08-26-150723', 'App\\Database\\Migrations\\CreateConsumable', 'default', 'App', 1693063029, 17);

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
('4CCE4758', 'LAKBAN-00', 'LAKBAN', 'BENING', '', '', 'Packaging', 'Consumable', 2, 0, 0, '', '2023-08-26 22:36:17', '2023-08-26 22:36:17', NULL),
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
(35, '838F7D07', '1', '838F7D07-picture-1.png', '2023-08-26 08:31:44', '2023-08-26 08:31:44', NULL),
(36, '4CCE4758', '1', '4CCE4758-picture-1.png', '2023-08-26 22:36:17', '2023-08-26 22:36:17', NULL);

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
('4CCE4758-P-LAKBAN-00', '4CCE4758', 7000, 7000, 7000, 0, '2023-08-26 22:36:17', '2023-08-26 22:36:17', NULL),
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
('05E32313-S-TLBAG-00', '05E32313', 139, 10, 100, '2023-07-24 10:55:41', '2023-08-29 08:42:05', NULL),
('3440F568-S-TW21IMV-0', '3440F568', 191, 10, 100, '2023-07-08 10:58:59', '2023-08-26 22:29:45', NULL),
('35516313-S-TW21RHB-H', '35516313', 100, 10, 0, '2023-08-15 15:01:07', '2023-08-15 16:04:02', NULL),
('3B3AEF19-S-TW21RHB-0', '3B3AEF19', 179, 10, 100, '2023-07-04 13:36:01', '2023-08-28 01:01:33', NULL),
('4773B208-S-TW19REH-0', '4773B208', 199, 10, 100, '2023-07-04 13:37:45', '2023-08-27 22:47:24', NULL),
('4CCE4758-S-LAKBAN-00', '4CCE4758', 20, 5, 100, '2023-08-26 22:36:17', '2023-08-26 22:36:17', NULL),
('838F7D07-S-PCKG-8X8X30', '838F7D07', 285, 100, 1000, '2023-08-26 08:31:44', '2023-08-29 09:13:29', NULL),
('9E6039AE-S-TW21RHB-H', '9E6039AE', 10, 10, 10, '2023-08-16 08:45:12', '2023-08-16 08:45:12', NULL),
('A7285208-S-HDL30D80-', 'A7285208', 198, 10, 100, '2023-07-24 10:10:54', '2023-08-29 09:13:29', NULL),
('AC4EBCF4-S-ADS100-00', 'AC4EBCF4', 0, 0, 0, '2023-07-26 11:05:43', '2023-08-26 22:38:10', NULL),
('CAD729A6-S-HDL50OF-0', 'CAD729A6', 200, 10, 100, '2023-07-24 10:26:45', '2023-08-18 15:54:09', NULL),
('E3244FE4-S-PCKG-', 'E3244FE4', 296, 50, 500, '2023-07-26 11:09:48', '2023-08-29 08:42:05', NULL),
('E9D891C7-S-HDL90X620', 'E9D891C7', 180, 10, 100, '2023-07-24 09:51:20', '2023-08-28 01:01:33', NULL),
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
(2, 'c02625c9', 'qea.lazada@gmail.com', 'qealazada', NULL, NULL, NULL, 'Avatar.webp', '$2y$10$nKTGvX7idiD4KJ/uSQvzx.luRqQI.8D0HeWJi6vsrmQ2zUrE3KlkW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-26 14:06:36', '2023-06-26 14:06:36', NULL);

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
-- Indeks untuk tabel `consumable_log`
--
ALTER TABLE `consumable_log`
  ADD UNIQUE KEY `id_consumable` (`id_consumable`),
  ADD KEY `consumable_log_procon_id_foreign` (`procon_id`),
  ADD KEY `consumable_log_id_sales_consum_foreign` (`id_sales_consum`);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT untuk tabel `consumable_log`
--
ALTER TABLE `consumable_log`
  MODIFY `id_consumable` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id_notif` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
  MODIFY `pro_id_image` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `products_show`
--
ALTER TABLE `products_show`
  MODIFY `pro_id_show` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Ketidakleluasaan untuk tabel `consumable_log`
--
ALTER TABLE `consumable_log`
  ADD CONSTRAINT `consumable_log_id_sales_consum_foreign` FOREIGN KEY (`id_sales_consum`) REFERENCES `sales` (`id_sales`) ON DELETE CASCADE,
  ADD CONSTRAINT `consumable_log_procon_id_foreign` FOREIGN KEY (`procon_id`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE;

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
