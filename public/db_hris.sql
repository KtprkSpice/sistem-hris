-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:4402
-- Generation Time: Aug 13, 2025 at 07:24 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hris`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id` bigint UNSIGNED NOT NULL,
  `id_karyawan` bigint UNSIGNED NOT NULL,
  `jenis_cuti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `awal_cuti` date NOT NULL,
  `akhir_cuti` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id`, `id_karyawan`, `jenis_cuti`, `awal_cuti`, `akhir_cuti`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'sakit', '2025-09-20', '2025-09-25', 'pending', '2025-08-05 01:58:59', '2025-08-05 01:58:59', NULL),
(2, 2, 'sakit', '2025-08-21', '2025-08-26', 'rejected', '2025-08-05 01:58:59', '2025-08-11 02:24:28', NULL),
(3, 14, 'sakit', '2025-08-13', '2025-08-14', 'rejected', '2025-08-11 00:54:26', '2025-08-11 02:13:28', NULL),
(4, 13, 'liburan', '2025-08-20', '2025-08-22', 'pending', '2025-08-11 00:55:59', '2025-08-11 01:16:16', NULL),
(5, 8, 'liburan', '2025-08-16', '2025-08-17', 'accepted', '2025-08-11 01:44:10', '2025-08-11 02:24:20', NULL),
(6, 8, 'melahirkan', '2025-08-25', '2025-08-30', 'accepted', '2025-08-11 01:44:29', '2025-08-11 02:19:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deksripsi` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id`, `nama`, `deksripsi`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Human Resource', 'Human Resources', 'active', '2025-08-05 01:51:24', '2025-08-08 21:13:20', NULL),
(2, 'IT', 'Information Technology', 'active', '2025-08-05 01:51:24', '2025-08-05 01:51:24', NULL),
(3, 'Sales', 'Sales Departement', 'inactive', '2025-08-05 01:51:24', '2025-08-08 03:38:31', NULL),
(19, 'Finance', 'Financial Management', 'active', '2025-08-08 02:53:09', '2025-08-08 03:58:48', '2025-08-08 03:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id` bigint UNSIGNED NOT NULL,
  `id_karyawan` bigint UNSIGNED NOT NULL,
  `gaji` decimal(10,2) NOT NULL,
  `bonus` decimal(10,2) DEFAULT NULL,
  `potongan` decimal(10,2) DEFAULT NULL,
  `total_gaji` decimal(10,2) NOT NULL,
  `tanggal_gaji` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id`, `id_karyawan`, `gaji`, `bonus`, `potongan`, `total_gaji`, `tanggal_gaji`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 5000000.00, 1000000.00, 500000.00, 5500000.00, '2025-09-14', '2025-08-05 01:55:14', '2025-08-10 02:28:07', '2025-08-10 02:28:07'),
(2, 1, 4000000.00, 2000000.00, 1000000.00, 5000000.00, '2025-09-14', '2025-08-05 01:56:44', '2025-08-05 01:56:44', NULL),
(3, 1, 5000000.00, 4000000.00, 1000000.00, 8000000.00, '2025-09-14', '2025-08-05 01:58:59', '2025-08-05 01:58:59', NULL),
(4, 14, 9000000.00, 3000000.00, 1000000.00, 11000000.00, '2025-08-13', '2025-08-10 01:29:12', '2025-08-10 01:29:12', NULL),
(5, 13, 5000000.00, 1000000.00, 200000.00, 5800000.00, '2025-08-12', '2025-08-10 01:50:03', '2025-08-10 01:50:03', NULL),
(6, 14, 7000000.00, 3000000.00, 500000.00, 9500000.00, '2025-08-11', '2025-08-10 01:55:04', '2025-08-10 02:24:04', NULL),
(7, 10, 5000000.00, 500000.00, 0.00, 5500000.00, '2025-08-21', '2025-08-10 02:41:34', '2025-08-10 02:41:34', NULL),
(8, 2, 6000000.00, 0.00, 200000.00, 5800000.00, '2025-08-26', '2025-08-10 02:41:53', '2025-08-10 02:41:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HR', 'Human Resources', '2025-08-05 01:51:25', '2025-08-08 21:13:05', NULL),
(2, 'Developer', 'Code Developer', '2025-08-05 01:51:25', '2025-08-05 01:51:25', NULL),
(3, 'Sales', 'Handling Selling ', '2025-08-05 01:51:25', '2025-08-05 01:51:25', NULL),
(19, 'Finance', 'Financial Management', '2025-08-08 21:06:39', '2025-08-08 21:17:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tgl_kerja` date NOT NULL,
  `departemen_id` bigint UNSIGNED NOT NULL,
  `roles_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama_lengkap`, `email`, `no_telepon`, `alamat`, `tgl_lahir`, `tgl_kerja`, `departemen_id`, `roles_id`, `status`, `gaji`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Loy Brakus Sr.', 'mhermann@maining.org', '+1-231-664-1607', '85588 McKenzie Island\r\nRunolfsdottirberg, MD 78224', '1999-02-11', '2025-08-05', 3, 3, 'active', 2000000.00, '2025-08-05 01:54:46', '2025-08-07 05:40:41', NULL),
(2, 'Allison Beer IV', 'boyle.terence@example.net', '+1 (878) 479-9553', '8027 Bauch Stream Suite 871\nAliyaberg, MT 31475-1108', '1990-02-05', '2025-08-05', 2, 2, 'active', 4526.85, '2025-08-05 01:54:46', '2025-08-05 01:54:46', NULL),
(3, 'Prof. Fabian Hyatt', 'modesta97@example.net', '707-375-7719', '890 Michaela Hollow\r\nHeloiseburgh, ID 83775-3360', '1991-12-12', '2025-08-05', 3, 3, 'active', 4500000.00, '2025-08-05 01:54:46', '2025-08-07 05:47:35', NULL),
(4, 'Lucie Runolfsson', 'melissa.bailey@example.com', '303-499-8477', '672 Erdman Way Suite 637\r\nNew Gerhardburgh, LA 48948-4408', '2003-05-23', '2025-08-05', 1, 3, 'inactive', 45000000.00, '2025-08-05 01:55:14', '2025-08-07 06:12:25', '2025-08-07 06:12:25'),
(5, 'Devonte Mueller', 'imraz@example.net', '1-747-466-6714', '167 Hamill Hill\nNorth Mallory, MD 64815', '1993-08-25', '2025-08-05', 2, 2, 'active', 5454.56, '2025-08-05 01:55:14', '2025-08-05 01:55:14', NULL),
(6, 'Randall Fahey', 'flavie79@example.net', '+1-404-472-8140', '63915 Tre Extension Apt. 862\nOsvaldofurt, IL 25782-4726', '1991-01-17', '2025-08-05', 3, 3, 'active', 4086.37, '2025-08-05 01:55:14', '2025-08-05 01:55:14', NULL),
(7, 'Neal Schneider Sr.', 'hintz.roxane@example.org', '1-540-288-0341', '6580 Schuyler Springs\nPort Shyanne, IA 53551-3565', '1992-06-09', '2025-08-05', 1, 1, 'inactive', 3153.22, '2025-08-05 01:56:44', '2025-08-05 01:56:44', NULL),
(8, 'Sandrine Koelpin', 'titus.pfannerstill@example.org', '+1.786.344.5520', '8605 Carissa Park Suite 992\nAnastasiabury, UT 44094-2197', '1992-03-04', '2025-08-05', 2, 2, 'active', 3668.94, '2025-08-05 01:56:44', '2025-08-05 01:56:44', NULL),
(9, 'Dr. Jordi Pollich', 'hailee.daugherty@example.org', '+1 (954) 967-1102', '9671 Opal Port Apt. 232\nJavonshire, NJ 30427', '1993-05-07', '2025-08-05', 3, 3, 'active', 4567.91, '2025-08-05 01:56:44', '2025-08-05 01:56:44', NULL),
(10, 'Owen Robel DDS', 'dromaguera@example.org', '(346) 697-3791', '440 Randi Ranch\nEugenechester, NE 95108', '1988-09-02', '2025-08-05', 1, 1, 'active', 5417.56, '2025-08-05 01:58:58', '2025-08-05 01:58:58', NULL),
(11, 'Arden Hodkiewicz', 'vquigley@example.net', '+1-949-313-9772', '49140 Emmalee Creek Suite 347\nBaileefort, WI 45751', '1990-08-17', '2025-08-05', 2, 2, 'active', 4335.99, '2025-08-05 01:58:58', '2025-08-05 01:58:58', NULL),
(12, 'Rowena Schuster', 'lillian.oreilly@example.com', '702.989.8791', '119 Kemmer Rest\nLacymouth, KS 17061', '1991-01-03', '2025-08-05', 3, 3, 'active', 5970.96, '2025-08-05 01:58:59', '2025-08-05 01:58:59', NULL),
(13, 'Budiono Siregar', 'Budiy@mail.com', '028173123', 'dwaji', '2025-08-05', '2025-08-08', 1, 1, 'active', 5000000.00, '2025-08-07 03:20:25', '2025-08-07 03:20:25', NULL),
(14, 'Kunto', 'kunkuy@mail.com', '0283891', 'Ciakoeaw', '2025-08-06', '2025-08-08', 2, 19, 'active', 2000000.00, '2025-08-07 03:23:49', '2025-08-07 03:23:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id` bigint UNSIGNED NOT NULL,
  `id_karyawan` bigint UNSIGNED NOT NULL,
  `waktu_masuk` datetime NOT NULL,
  `waktu_keluar` datetime DEFAULT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id`, `id_karyawan`, `waktu_masuk`, `waktu_keluar`, `tanggal`, `status`, `created_at`, `updated_at`, `deleted_at`, `latitude`, `longitude`) VALUES
(1, 1, '2025-08-10 00:00:00', '2025-08-10 00:00:00', '2025-05-10', 'hadir', '2025-08-05 01:58:59', '2025-08-05 01:58:59', NULL, NULL, NULL),
(2, 2, '2025-08-10 00:00:00', '2025-08-10 00:00:00', '2025-05-10', 'hadir', '2025-08-05 01:58:59', '2025-08-05 01:58:59', NULL, NULL, NULL),
(3, 3, '2025-08-10 00:00:00', '2025-08-10 00:00:00', '2025-05-10', 'hadir', '2025-08-05 01:58:59', '2025-08-05 01:58:59', NULL, NULL, NULL),
(4, 6, '2025-08-14 00:00:00', '2025-08-14 00:00:00', '2025-08-14', 'hadir', '2025-08-09 03:01:13', '2025-08-09 03:01:13', NULL, NULL, NULL),
(5, 14, '2025-08-16 09:00:00', '2025-08-16 17:00:00', '2025-08-16', 'absen', '2025-08-09 03:01:36', '2025-08-09 04:29:33', NULL, NULL, NULL),
(6, 6, '2025-08-23 00:00:00', '2025-08-30 00:00:00', '2025-08-23', 'hadir', '2025-08-09 03:04:32', '2025-08-09 04:50:04', NULL, NULL, NULL),
(7, 3, '2025-08-16 09:00:00', '2025-08-16 17:00:00', '2025-08-16', 'hadir', '2025-08-09 03:24:22', '2025-08-09 04:35:34', '2025-08-09 04:35:34', NULL, NULL),
(8, 14, '2025-08-11 16:37:21', NULL, '2025-08-11', 'hadir', '2025-08-11 09:37:21', '2025-08-11 09:37:21', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_04_162630_create_human_resources_app', 1),
(5, '2025_08_04_170809_alter_table_user', 2),
(6, '2025_08_11_162027_add_latitude_longitude', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('CCilmcJZGGv08XeB2aln5MD2n5LqwPCcpBteia7s', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidkFmR2lHTzh3Y1dtY2FsWmhZWW9pNmhvOHlVaWViY2hLekNpaVBhUSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2tlaGFkaXJhbiI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAva2VoYWRpcmFuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1755060316),
('glgQqXaJQJXURvU6CiS8Qqt79icIkCEUW7TjKkXG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieUJnTFJ5aVhDS3pOUUd0QW94RnY0dzBzVTYzTE1xY2xpV1p6a05NVSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2dhamkiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2dhamkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1755060317),
('MKMGUPwxDMwqZ4vkHyoBE0JS9ojruImqvTrtMDae', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiRDFwUFVQcldWQmd5eXc1OXczQjRsUXdraG40ZnVMRzFSUjBaYTVOVSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvY3V0aS9jcmVhdGUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO3M6NzoiamFiYXRhbiI7czo5OiJEZXZlbG9wZXIiO3M6MTE6ImlkX2thcnlhd2FuIjtpOjI7fQ==', 1755062035);

-- --------------------------------------------------------

--
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_tugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deksripsi` text COLLATE utf8mb4_unicode_ci,
  `ditugaskan` bigint UNSIGNED NOT NULL,
  `tenggat_waktu` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`id`, `nama_tugas`, `deksripsi`, `ditugaskan`, `tenggat_waktu`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Blanditiis cupiditate quia.', 'Est neque vel quia eum. Et sed quas temporibus voluptas nostrum. Cum voluptatem aperiam animi voluptas iure eligendi dolor.', 1, '2025-09-14', 'done', '2025-08-05 01:55:14', '2025-08-06 09:41:06', NULL),
(2, 'Enim maiores tempora.', 'Quidem adipisci molestiae quia natus nihil. Et quae amet expedita illum. Unde quibusdam minima recusandae.', 2, '2025-09-14', 'done', '2025-08-05 01:55:14', '2025-08-06 09:03:56', NULL),
(3, 'Non rerum deleniti et.', 'Iure sed sed aliquam voluptatem veniam repudiandae. Possimus earum autem tempore hic accusantium. Numquam corporis aut consequatur cum dolor minus. Nobis earum facere impedit quasi voluptate atque. Qui odio aut voluptas ipsa asperiores beatae.', 3, '2025-09-14', 'pending', '2025-08-05 01:55:14', '2025-08-06 09:12:07', NULL),
(4, 'Nobis est commodi voluptates.', 'Provident omnis quod harum beatae sapiente. Culpa qui magni laborum. Doloribus sint nulla est aliquam.', 1, '2025-09-14', 'pending', '2025-08-05 01:56:44', '2025-08-06 09:12:32', '2025-08-06 09:12:32'),
(5, 'Veritatis accusantium deserunt dolores.', 'Quod eligendi tempore architecto quae maxime vero quia. Dolorem eaque est est culpa sint velit eius. Quaerat rerum omnis iure dolores in.', 2, '2025-09-14', 'pending', '2025-08-05 01:56:44', '2025-08-06 09:12:12', '2025-08-06 09:12:12'),
(6, 'Dolor ipsa beatae dolores.', 'Sed sint soluta voluptatem necessitatibus est. Aperiam aut dolores doloribus autem. Dolore nulla voluptas saepe. Vitae facere nihil qui incidunt.', 3, '2025-09-14', 'done', '2025-08-05 01:56:44', '2025-08-08 04:04:27', NULL),
(7, 'Repellat inventore.', 'Amet consequuntur qui fuga et tempore maxime. Molestiae quis perferendis qui esse minima. Molestias veniam earum maxime ea.', 1, '2025-09-14', 'pending', '2025-08-05 01:58:59', '2025-08-05 01:58:59', NULL),
(8, 'Cari Bapaknya Erina Domikado', 'Do', 2, '2025-09-14', 'on progress', '2025-08-05 01:58:59', '2025-08-06 09:09:38', '2025-08-06 09:09:38'),
(9, 'Voluptatem nemo dolorum.', 'Cupiditate neque tempora quod sint enim. Perspiciatis neque qui provident. Officiis quae odit quaerat odio qui atque.', 3, '2025-09-14', 'pending', '2025-08-05 01:58:59', '2025-08-05 01:58:59', NULL),
(10, 'Bersihin Kali Ciputat', 'asdaw', 5, '2025-08-14', 'pending', '2025-08-05 11:21:18', '2025-08-05 11:21:18', NULL),
(11, 'Mandiin Cipung', 'Siram aja pake bensin', 11, '2025-08-13', 'pending', '2025-08-06 07:04:32', '2025-08-06 07:04:32', NULL),
(12, 'Cebokin Rafatar', 'Pake Paku aja', 3, '2025-08-19', 'pending', '2025-08-06 07:05:39', '2025-08-06 07:05:39', NULL),
(13, 'Gulingkan Rezim', 'One For All', 14, '2025-08-17', 'pending', '2025-08-06 07:05:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_karyawan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `id_karyawan`) VALUES
(1, 'test', 'test@mail.com', NULL, 'password', NULL, NULL, NULL, '1'),
(2, 'Test User', 'test@example.com', '2025-08-11 03:23:22', '$2y$12$2kq4u7s/sOj17IjneThn6eOIWHl911f4fDW3oAqFmA7KUhxh8ATY.', 'qUs9zd9rgM0NIyT39gKqhKFhjzu0p599rhf5kfjAPSiuxQ8qYpshkaSUBx0t', '2025-08-11 03:23:22', '2025-08-11 03:23:22', '10'),
(3, 'testuser', 'test2@mail.com', '2025-08-11 03:23:22', '$2y$12$2kq4u7s/sOj17IjneThn6eOIWHl911f4fDW3oAqFmA7KUhxh8ATY.', '2JN4laZZDDqcmWbXiSKJthtummxAIVasX0CPseDusmrsTgaUXgQ2Uvuwa8Vz', '2025-08-11 03:23:22', NULL, '2'),
(4, 'Miji', 'miji@mail.com', '2025-08-11 03:23:22', '$2y$12$XXcJDlfN.8xBnz5lFo3Uj.PxWGBmJFCzVfPcYiM5FVAR1s4kcGrqi', 'pJvtvtYdTCbPBxmAWpf0Gc8AQOkDW0GfSlr3MhKVB7lusT1A7fUAWhcL1wJv', '2025-08-11 06:51:23', '2025-08-11 06:51:23', '11'),
(5, 'Kunto', 'kunto@mail.com', '2025-08-11 03:23:22', '$2y$12$XXcJDlfN.8xBnz5lFo3Uj.PxWGBmJFCzVfPcYiM5FVAR1s4kcGrqi', 'MPAKqRzTnTZS9iKnfcESeLsTImDaVTnpFxH9BvTWsX5Oo7LqmRHjldBBXj31', '2025-08-11 06:51:23', NULL, '14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cuti_id_karyawan_foreign` (`id_karyawan`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gaji_id_karyawan_foreign` (`id_karyawan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `karyawan_email_unique` (`email`),
  ADD KEY `karyawan_departemen_id_foreign` (`departemen_id`),
  ADD KEY `karyawan_roles_id_foreign` (`roles_id`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kehadiran_id_karyawan_foreign` (`id_karyawan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tugas_ditugaskan_foreign` (`ditugaskan`);

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
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `cuti_id_karyawan_foreign` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`);

--
-- Constraints for table `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji_id_karyawan_foreign` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_departemen_id_foreign` FOREIGN KEY (`departemen_id`) REFERENCES `departemen` (`id`),
  ADD CONSTRAINT `karyawan_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `jabatan` (`id`);

--
-- Constraints for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD CONSTRAINT `kehadiran_id_karyawan_foreign` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`);

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_ditugaskan_foreign` FOREIGN KEY (`ditugaskan`) REFERENCES `karyawan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
