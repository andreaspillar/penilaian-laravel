-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 21, 2019 at 04:37 PM
-- Server version: 10.3.12-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penilaiankaryawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `departemens`
--

CREATE TABLE `departemens` (
  `id_departemen` int(10) UNSIGNED NOT NULL,
  `departemen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departemens`
--

INSERT INTO `departemens` (`id_departemen`, `departemen`, `created_at`, `updated_at`) VALUES
(1, 'HR-GA', '2019-05-06 20:12:24', '2019-05-06 20:12:24'),
(2, 'Alat Berat', '2019-05-06 20:12:24', '2019-05-06 20:12:24'),
(3, 'Laboratorium', '2019-05-06 20:12:24', '2019-05-06 20:12:24'),
(4, 'Keuangan', '2019-05-06 20:12:24', '2019-05-06 20:12:24'),
(5, 'PPIC', '2019-05-06 20:12:24', '2019-05-06 20:12:24'),
(6, 'Unit Limbah', '2019-05-06 20:12:24', '2019-05-06 20:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `id_jabatan` int(2) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id_jabatan`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin HR', '2019-04-25 11:37:16', '2019-04-25 11:37:16'),
(2, 'Pimpinan Unit', '2019-04-25 11:37:16', '2019-04-25 11:37:16'),
(3, 'Manajer/ Kabag', '2019-04-25 11:37:16', '2019-04-25 11:37:16'),
(4, 'Kabid', '2019-04-25 11:37:16', '2019-04-25 11:37:16'),
(5, 'Staff', '2019-04-25 11:37:16', '2019-04-25 11:37:16'),
(6, 'Kepala Shift', '2019-04-25 11:37:16', '2019-04-25 11:37:16'),
(7, 'Operator', '2019-04-25 11:37:16', '2019-04-25 11:37:16'),
(8, 'Outsourcing', '2019-04-25 11:37:16', '2019-04-25 11:37:16');

-- --------------------------------------------------------

--
-- Table structure for table `karyawans`
--

CREATE TABLE `karyawans` (
  `id_karyawan` bigint(20) NOT NULL,
  `nomor_karyawan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_karyawan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_departemen` int(2) NOT NULL,
  `id_jabatan` int(2) NOT NULL,
  `nilai` decimal(11,2) DEFAULT 0.00,
  `status_nilai` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawans`
--

INSERT INTO `karyawans` (`id_karyawan`, `nomor_karyawan`, `nama_karyawan`, `id_departemen`, `id_jabatan`, `nilai`, `status_nilai`, `created_at`, `updated_at`) VALUES
(1, '93131', 'ERMANU H', 1, 4, '0.00', '', '2019-04-25 17:22:09', '2019-04-25 17:22:09'),
(2, '03047', 'CASIM', 1, 5, '0.00', 'N', '2019-04-25 17:22:09', '2019-06-07 16:42:52'),
(3, '02830', 'SABARYANTO', 1, 5, '0.00', 'N', '2019-04-25 17:22:09', '2019-05-24 03:04:41'),
(4, '10782', 'SUSANTO AW', 1, 5, '0.00', 'N', '2019-04-25 17:22:09', '2019-06-13 00:48:50'),
(5, '94333', 'NICOLAS HUTASOIT', 1, 5, '0.00', 'N', '2019-04-25 17:22:09', '2019-06-13 00:49:22'),
(6, '02830', 'KASDONO', 1, 5, '0.00', 'N', '2019-04-25 17:22:09', '2019-06-07 16:42:31'),
(7, '02131', 'IMROATUL', 1, 7, '0.00', 'N', '2019-04-25 17:22:09', '2019-05-24 01:53:48'),
(8, '04635', 'BUDIYONO', 1, 7, '0.00', 'N', '2019-04-25 17:22:09', '2019-06-07 16:43:15'),
(9, '5013', 'M. ZAENUDIN', 2, 7, '0.00', '', '2019-04-25 17:22:09', '2019-04-25 17:22:09'),
(10, '5013', 'MARZUKI ASWAT', 2, 7, '0.00', '', '2019-04-25 17:22:10', '2019-04-25 17:22:10'),
(11, '3237', 'SUBADI', 2, 7, '0.00', '', '2019-04-25 17:22:10', '2019-04-25 17:22:10'),
(12, '92698', 'SULISTYO Y', 2, 7, '0.00', '', '2019-04-25 17:22:10', '2019-04-25 17:22:10'),
(13, '92702', 'A ROHMAN', 2, 7, '0.00', '', '2019-04-25 17:22:10', '2019-04-25 17:22:10'),
(14, '10424', 'SUBEKTI', 2, 7, '0.00', '', '2019-04-25 17:22:10', '2019-04-25 17:22:10'),
(15, '9774', 'SUGENG RIYADI', 2, 7, '0.00', '', '2019-04-25 17:22:10', '2019-04-25 17:22:10'),
(16, '92700', 'M YUSUF', 2, 7, '0.00', '', '2019-04-25 17:22:10', '2019-04-25 17:22:10'),
(17, '2327', 'HARYONO', 2, 7, '0.00', '', '2019-04-25 17:22:10', '2019-04-25 17:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id_kriteria` bigint(20) NOT NULL,
  `nama_kriteria` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_kriteria` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id_kriteria`, `nama_kriteria`, `nilai_kriteria`, `created_at`, `updated_at`) VALUES
(1, 'Kerjasama', '9.00', '2019-05-20 02:40:25', '2019-06-20 20:50:12'),
(2, 'Kedisiplinan', '10.00', '2019-05-20 02:40:34', '2019-05-20 02:42:52'),
(3, 'K3', '11.00', '2019-05-20 02:40:40', '2019-05-20 02:42:52'),
(4, 'Absensi', '13.00', '2019-05-20 02:40:53', '2019-06-20 20:50:12'),
(5, 'Pemahaman Kerja', '8.00', '2019-05-20 02:41:03', '2019-06-20 20:50:12'),
(6, 'Pencapaian', '14.00', '2019-05-20 02:41:10', '2019-05-20 02:42:52'),
(7, 'Efektivitas', '15.00', '2019-05-20 02:41:25', '2019-05-20 02:42:52'),
(8, 'Problem Solving', '16.00', '2019-05-20 02:41:36', '2019-05-20 02:42:52'),
(9, 'Ketuntasan', '4.00', '2019-05-20 02:41:45', '2019-05-20 02:42:52');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_09_172840_create_karyawans_table', 1),
(4, '2019_03_10_043433_create_kriterias_table', 1),
(5, '2019_03_10_060922_crete_role', 2),
(6, '2016_06_01_000001_create_oauth_auth_codes_table', 3),
(7, '2016_06_01_000002_create_oauth_access_tokens_table', 3),
(8, '2016_06_01_000003_create_oauth_refresh_tokens_table', 3),
(9, '2016_06_01_000004_create_oauth_clients_table', 3),
(10, '2016_06_01_000005_create_oauth_personal_access_clients_table', 3),
(11, '2019_03_21_062023_buat_tabel_jabatan', 4),
(12, '2019_05_07_015914_create_departemens_table', 5),
(13, '2019_05_07_060733_create_nilai_karyawans_table', 6),
(14, '2019_05_24_092321_value_nilai', 7);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_karyawans`
--

CREATE TABLE `nilai_karyawans` (
  `id_karyawan` bigint(20) NOT NULL,
  `nilai_karyawan` decimal(5,2) NOT NULL,
  `id_kriteria` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_karyawans`
--

INSERT INTO `nilai_karyawans` (`id_karyawan`, `nilai_karyawan`, `id_kriteria`, `created_at`, `updated_at`) VALUES
(7, '20.00', 1, '2019-05-24 01:53:48', '2019-06-09 20:08:48'),
(7, '20.00', 2, '2019-05-24 01:53:48', '2019-06-09 20:08:48'),
(7, '20.00', 3, '2019-05-24 01:53:48', '2019-06-09 20:08:48'),
(7, '20.00', 4, '2019-05-24 01:53:48', '2019-06-09 20:08:48'),
(7, '20.00', 5, '2019-05-24 01:53:48', '2019-06-09 20:08:48'),
(7, '20.00', 6, '2019-05-24 01:53:48', '2019-06-09 20:08:48'),
(7, '20.00', 7, '2019-05-24 01:53:48', '2019-06-09 20:08:48'),
(7, '20.00', 8, '2019-05-24 01:53:48', '2019-06-09 20:08:48'),
(7, '20.00', 9, '2019-05-24 01:53:48', '2019-06-09 20:08:48'),
(3, '40.00', 1, '2019-05-24 03:04:41', '2019-05-24 03:05:00'),
(3, '40.00', 2, '2019-05-24 03:04:41', '2019-05-24 03:05:00'),
(3, '40.00', 3, '2019-05-24 03:04:41', '2019-05-24 03:05:00'),
(3, '40.00', 4, '2019-05-24 03:04:41', '2019-05-24 03:05:00'),
(3, '60.00', 5, '2019-05-24 03:04:41', '2019-05-24 03:05:00'),
(3, '60.00', 6, '2019-05-24 03:04:41', '2019-05-24 03:05:00'),
(3, '60.00', 7, '2019-05-24 03:04:41', '2019-05-24 03:05:00'),
(3, '60.00', 8, '2019-05-24 03:04:41', '2019-05-24 03:05:00'),
(3, '60.00', 9, '2019-05-24 03:04:41', '2019-05-24 03:05:00'),
(6, '60.00', 1, '2019-06-07 16:42:31', '2019-06-07 16:42:31'),
(6, '40.00', 2, '2019-06-07 16:42:31', '2019-06-07 16:42:31'),
(6, '80.00', 3, '2019-06-07 16:42:31', '2019-06-07 16:42:31'),
(6, '80.00', 4, '2019-06-07 16:42:31', '2019-06-07 16:42:31'),
(6, '60.00', 5, '2019-06-07 16:42:31', '2019-06-07 16:42:31'),
(6, '80.00', 6, '2019-06-07 16:42:31', '2019-06-07 16:42:31'),
(6, '100.00', 7, '2019-06-07 16:42:31', '2019-06-07 16:42:31'),
(6, '80.00', 8, '2019-06-07 16:42:31', '2019-06-07 16:42:31'),
(6, '100.00', 9, '2019-06-07 16:42:31', '2019-06-07 16:42:31'),
(2, '80.00', 1, '2019-06-07 16:42:52', '2019-06-07 16:42:52'),
(2, '80.00', 2, '2019-06-07 16:42:52', '2019-06-07 16:42:52'),
(2, '80.00', 3, '2019-06-07 16:42:52', '2019-06-07 16:42:52'),
(2, '80.00', 4, '2019-06-07 16:42:52', '2019-06-07 16:42:52'),
(2, '60.00', 5, '2019-06-07 16:42:52', '2019-06-07 16:42:52'),
(2, '60.00', 6, '2019-06-07 16:42:52', '2019-06-07 16:42:52'),
(2, '40.00', 7, '2019-06-07 16:42:52', '2019-06-07 16:42:52'),
(2, '80.00', 8, '2019-06-07 16:42:52', '2019-06-07 16:42:52'),
(2, '60.00', 9, '2019-06-07 16:42:52', '2019-06-07 16:42:52'),
(8, '60.00', 1, '2019-06-07 16:43:15', '2019-06-07 16:43:15'),
(8, '80.00', 2, '2019-06-07 16:43:15', '2019-06-07 16:43:15'),
(8, '80.00', 3, '2019-06-07 16:43:15', '2019-06-07 16:43:15'),
(8, '60.00', 4, '2019-06-07 16:43:15', '2019-06-07 16:43:15'),
(8, '60.00', 5, '2019-06-07 16:43:15', '2019-06-07 16:43:15'),
(8, '60.00', 6, '2019-06-07 16:43:15', '2019-06-07 16:43:15'),
(8, '100.00', 7, '2019-06-07 16:43:15', '2019-06-07 16:43:15'),
(8, '100.00', 8, '2019-06-07 16:43:15', '2019-06-07 16:43:15'),
(8, '100.00', 9, '2019-06-07 16:43:15', '2019-06-07 16:43:15'),
(4, '80.00', 1, '2019-06-13 00:48:50', '2019-06-13 00:48:50'),
(4, '80.00', 2, '2019-06-13 00:48:50', '2019-06-13 00:48:50'),
(4, '60.00', 3, '2019-06-13 00:48:50', '2019-06-13 00:48:50'),
(4, '80.00', 4, '2019-06-13 00:48:50', '2019-06-13 00:48:50'),
(4, '60.00', 5, '2019-06-13 00:48:50', '2019-06-13 00:48:50'),
(4, '40.00', 6, '2019-06-13 00:48:50', '2019-06-13 00:48:50'),
(4, '80.00', 7, '2019-06-13 00:48:50', '2019-06-13 00:48:50'),
(4, '80.00', 8, '2019-06-13 00:48:50', '2019-06-13 00:48:50'),
(4, '80.00', 9, '2019-06-13 00:48:50', '2019-06-13 00:48:50'),
(5, '40.00', 1, '2019-06-13 00:49:22', '2019-06-13 00:49:22'),
(5, '40.00', 2, '2019-06-13 00:49:22', '2019-06-13 00:49:22'),
(5, '20.00', 3, '2019-06-13 00:49:22', '2019-06-13 00:49:22'),
(5, '100.00', 4, '2019-06-13 00:49:22', '2019-06-13 00:49:22'),
(5, '20.00', 5, '2019-06-13 00:49:22', '2019-06-13 00:49:22'),
(5, '60.00', 6, '2019-06-13 00:49:22', '2019-06-13 00:49:22'),
(5, '60.00', 7, '2019-06-13 00:49:22', '2019-06-13 00:49:22'),
(5, '40.00', 8, '2019-06-13 00:49:22', '2019-06-13 00:49:22'),
(5, '20.00', 9, '2019-06-13 00:49:22', '2019-06-13 00:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('174c3f728e6f144601839956cb5fb62e069bfb77994ddd1f2e22d7c28878eeddb0cdfe587ff46543', 1, 1, 'LaraPassport', '[]', 0, '2019-03-18 01:01:52', '2019-03-18 01:01:52', '2020-03-18 08:01:52'),
('182658ef65592cc9ccbff465d8792e846394ca28ebd4367b986ec54e1fa1549a658c67e2e235ef31', 1, 1, 'LaraPassport', '[]', 0, '2019-03-18 00:48:18', '2019-03-18 00:48:18', '2020-03-18 07:48:18'),
('1fb5c5248985cf29400380c16c8e91e086dc31f861291ca24b386f63a748c77374647c4d0a81e8f7', 1, 1, 'LaraPassport', '[]', 1, '2019-03-18 00:50:49', '2019-03-18 00:50:49', '2020-03-18 07:50:49'),
('3f38773a02422b1c480d04e19c581b80a5324e83d7b872e7643dc80f5edaa11ce04135101c650490', 1, 1, 'LaraPassport', '[]', 1, '2019-03-18 00:57:03', '2019-03-18 00:57:03', '2020-03-18 07:57:03'),
('66cc3275526bb1a753c7c3c6ade28c849bf7dd0a93ea9ac9a4fec7d7600d88d55fa9f2c9a2182cc1', 1, 1, 'Personal Access Token', '[]', 0, '2019-03-17 21:07:06', '2019-03-17 21:07:06', '2020-03-18 04:07:06'),
('8bcf5f1a1ec1264534d28a42d687a8bf4e13e0da67b99b402d3f053483f7fb0b45112668b7054a6e', 1, 1, 'Personal Access Token', '[]', 0, '2019-03-17 22:41:32', '2019-03-17 22:41:32', '2020-03-18 05:41:32'),
('a8aabc161ff0b45e0cf7262b334bb954b8f6425d40aabb5bf7ac15bd04ca7a6ef62c4fa50e7f4316', 1, 1, 'Personal Access Token', '[]', 0, '2019-03-17 22:46:22', '2019-03-17 22:46:22', '2020-03-18 05:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'ZwOehuB17IFzqG2GFGlvDYXFct3OTB6aPvyWVGDd', 'http://localhost', 1, 0, 0, '2019-03-17 19:26:02', '2019-03-17 19:26:02'),
(2, NULL, 'Laravel Password Grant Client', 'SAtMrYp1rJVzzRuaQriZTzMn97vHxObHNb03QEmf', 'http://localhost', 0, 1, 0, '2019-03-17 19:26:02', '2019-03-17 19:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-03-17 19:26:02', '2019-03-17 19:26:02');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_jabatan` int(10) NOT NULL,
  `id_departemen` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `id_jabatan`, `id_departemen`) VALUES
(1, 'adminHR', 'adminhr@kudus.puragroup.com', NULL, '$2y$10$GVr5/wWLNx93vs0NiZ/kBeeh/MUVZzXJSKssn9/JvYiIAzwPJCWJi', NULL, '2019-04-25 11:58:41', '2019-04-25 11:58:41', 1, 0),
(2, 'managerHR', 'managerhr@kudus.puragroup.com', NULL, '$2y$10$rKq6i6hV.FI5bt.l1XnUg.nBoEu5EQxq9AC04ToO7V5ztO9Y81Qrm', NULL, '2019-04-25 11:58:41', '2019-04-25 11:58:41', 3, 1),
(3, 'kabidHR', 'kabidhr@kudus.puragroup.com', NULL, '$2y$10$vT/SBs.QwxVM7En/uLc2R.ofVEMLr9QkWNcxFfesB7dL1xbKI9wFi', NULL, '2019-04-25 11:58:41', '2019-04-25 11:58:41', 4, 1),
(4, 'pimpinan569', 'pm569@kudus.puragroup.com', NULL, '$2y$10$2EhKYQqpQaNgdDURUcWelOC5BD6YGYK9kAaNl97HaYVC32cm0EzJm', NULL, '2019-04-25 11:58:41', '2019-04-25 11:58:41', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `value_nilais`
--

CREATE TABLE `value_nilais` (
  `id_value` int(10) UNSIGNED NOT NULL,
  `nilai_value` decimal(5,2) NOT NULL,
  `alias_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `value_nilais`
--

INSERT INTO `value_nilais` (`id_value`, `nilai_value`, `alias_value`, `created_at`, `updated_at`) VALUES
(1, '20.00', 'Sangat Kurang', '2019-05-24 02:46:06', '2019-05-24 02:46:06'),
(2, '40.00', 'Kurang', '2019-05-24 02:46:06', '2019-05-24 02:46:06'),
(3, '60.00', 'Cukup', '2019-05-24 02:46:06', '2019-05-24 02:46:06'),
(4, '80.00', 'Baik', '2019-05-24 02:46:06', '2019-05-24 02:46:06'),
(5, '100.00', 'Sangat Baik', '2019-05-24 02:46:06', '2019-05-24 02:46:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemens`
--
ALTER TABLE `departemens`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_karyawans`
--
ALTER TABLE `nilai_karyawans`
  ADD KEY `FK_ID_KRITERIA` (`id_kriteria`),
  ADD KEY `FK_ID_KARYAWAN` (`id_karyawan`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `value_nilais`
--
ALTER TABLE `value_nilais`
  ADD PRIMARY KEY (`id_value`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departemens`
--
ALTER TABLE `departemens`
  MODIFY `id_departemen` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id_jabatan` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id_karyawan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id_kriteria` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `value_nilais`
--
ALTER TABLE `value_nilais`
  MODIFY `id_value` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nilai_karyawans`
--
ALTER TABLE `nilai_karyawans`
  ADD CONSTRAINT `FK_ID_KARYAWAN` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawans` (`id_karyawan`),
  ADD CONSTRAINT `FK_ID_KRITERIA` FOREIGN KEY (`id_kriteria`) REFERENCES `kriterias` (`id_kriteria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
