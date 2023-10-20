-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Okt 2023 pada 16.48
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dashboard_doctor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_16_000001_create_mst_hospital_table', 1),
(6, '2023_10_16_000002_create_mst_visit_method_table', 1),
(7, '2023_10_16_000003_create_mst_action_table', 1),
(8, '2023_10_16_000004_create_mst_assurance_table', 1),
(9, '2023_10_16_000005_create_stg_main_menu', 1),
(10, '2023_10_16_000006_create_stg_menu', 1),
(11, '2023_10_16_000007_create_mst_user', 1),
(12, '2023_10_16_000008_create_stg_login', 1),
(13, '2023_10_16_000009_create_stg_attributes', 1),
(14, '2023_10_16_000010_create_stg_role', 1),
(15, '2023_10_16_000011_create_stg_group_menu', 1),
(16, '2023_10_16_000012_create_stg_provider', 1),
(17, '2023_10_16_000013_create_stg_menu_access', 1),
(18, '2023_10_16_000014_create_stg_data_access', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_action`
--

CREATE TABLE `mst_action` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `background` varchar(191) DEFAULT NULL,
  `color` varchar(191) DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` varchar(191) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(191) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_action`
--

INSERT INTO `mst_action` (`id`, `code`, `name`, `background`, `color`, `disabled`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'RJ', 'Rawat Jalan', '#000', '#fff', 0, '2023-10-19 21:47:28', 'Migrasi', '2023-10-19 21:47:28', NULL, NULL, NULL),
(2, 'RI', 'Rawat Inap', '#000', '#fff', 0, '2023-10-19 21:47:28', 'Migrasi', '2023-10-19 21:47:28', NULL, NULL, NULL),
(3, 'GD', 'Gawat Darurat', '#000', '#fff', 0, '2023-10-19 21:47:28', 'Migrasi', '2023-10-19 21:47:28', NULL, NULL, NULL),
(4, 'PR', 'Radiologi', '#000', '#fff', 0, '2023-10-19 21:47:28', 'Migrasi', '2023-10-19 21:47:28', NULL, NULL, NULL),
(5, 'PL', 'Laboratorium', '#000', '#fff', 0, '2023-10-19 21:47:28', 'Migrasi', '2023-10-19 21:47:28', NULL, NULL, NULL),
(6, 'OK', 'Kamar Bedah', '#000', '#fff', 0, '2023-10-19 21:47:28', 'Migrasi', '2023-10-19 21:47:28', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_assurance`
--

CREATE TABLE `mst_assurance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `background` varchar(191) DEFAULT NULL,
  `color` varchar(191) DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` varchar(191) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(191) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_assurance`
--

INSERT INTO `mst_assurance` (`id`, `code`, `name`, `background`, `color`, `disabled`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'U', 'Umum', '#000', '#fff', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(2, 'B', 'BPJS', '#000', '#fff', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(3, 'A', 'Asuransi', '#000', '#fff', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_hospital`
--

CREATE TABLE `mst_hospital` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `background` varchar(191) DEFAULT NULL,
  `color` varchar(191) DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` varchar(191) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(191) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_hospital`
--

INSERT INTO `mst_hospital` (`id`, `code`, `name`, `background`, `color`, `disabled`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'RSIM', 'RS Islam Muhammadiyah Sumberrejo', '#000', '#fff', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(2, 'RSASFT', 'RS \'Aisyiyah Siti Fatimah Tulangan', '#f10', '#fff', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(3, 'RSSKMCS', 'RS Siti Khodijah Muhammadiyah Cabang Sepanjang', '#ff0', '#000', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(4, 'RSAB', 'RS \'Aisyiyah Bojonegoro ', '#f0f', '#000', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(5, 'RSIAMM', 'RSIA Muhammadiyah Malang', '#0ff', '#000', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(6, 'RSIAM', 'RS Islam \'Aisyiyah Malang', '#02f', '#fff', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(7, 'RSMSU', 'RSU Muhammadiyah Sumatera Utara', '#fff', '#000', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_user`
--

CREATE TABLE `mst_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(16) NOT NULL,
  `full_name` varchar(191) NOT NULL,
  `gender` enum('l','p') NOT NULL,
  `birth_place` varchar(191) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone_number` varchar(191) DEFAULT NULL,
  `home_number` varchar(191) DEFAULT NULL,
  `address_1` text DEFAULT NULL,
  `address_2` varchar(3) DEFAULT NULL,
  `address_3` varchar(3) DEFAULT NULL,
  `religion_id` int(10) UNSIGNED DEFAULT NULL,
  `role` enum('adm','pat','tec') NOT NULL,
  `biography` text DEFAULT NULL,
  `twitter` varchar(191) DEFAULT NULL,
  `facebook` varchar(191) DEFAULT NULL,
  `instagram` varchar(191) DEFAULT NULL,
  `github` varchar(191) DEFAULT NULL,
  `picture` text DEFAULT NULL,
  `picture_name` varchar(191) DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` varchar(191) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(191) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_visit_method`
--

CREATE TABLE `mst_visit_method` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `background` varchar(191) DEFAULT NULL,
  `color` varchar(191) DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` varchar(191) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(191) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mst_visit_method`
--

INSERT INTO `mst_visit_method` (`id`, `code`, `name`, `background`, `color`, `disabled`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'A', 'Datang Sendiri', '#000', '#fff', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(2, 'B', 'Rujukan', '#000', '#fff', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(3, 'C', 'Gawat Darurat', '#000', '#fff', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(4, 'D', 'Ditemani Orang Tua', '#000', '#fff', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(5, 'E', 'Ditemani Istri', '#000', '#fff', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stg_attributes`
--

CREATE TABLE `stg_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `value` varchar(191) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` varchar(191) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(191) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stg_attributes`
--

INSERT INTO `stg_attributes` (`id`, `title`, `value`, `disabled`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'background', 'Warna Latar', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(2, 'code', 'Kode', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(3, 'color', 'Warna', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(4, 'name', 'Nama', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(5, 'title', 'Judul', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stg_data_access`
--

CREATE TABLE `stg_data_access` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `table_name` varchar(100) DEFAULT NULL,
  `condition` text DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` varchar(191) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(191) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stg_group_menu`
--

CREATE TABLE `stg_group_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` varchar(191) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(191) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stg_group_menu`
--

INSERT INTO `stg_group_menu` (`id`, `name`, `disabled`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Developer', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(2, 'Dokter', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(3, 'Admin', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stg_login`
--

CREATE TABLE `stg_login` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` varchar(191) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(191) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stg_main_menu`
--

CREATE TABLE `stg_main_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `icon` varchar(191) DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `is_parent` tinyint(1) NOT NULL DEFAULT 0,
  `is_login` tinyint(1) NOT NULL DEFAULT 0,
  `is_shown` tinyint(1) NOT NULL DEFAULT 1,
  `order_no` int(11) DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` varchar(191) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(191) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stg_main_menu`
--

INSERT INTO `stg_main_menu` (`id`, `title`, `icon`, `url`, `is_parent`, `is_login`, `is_shown`, `order_no`, `disabled`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Dashboard', 'entypo-gauge', '/', 0, 1, 1, 1, 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(2, 'Master', 'entypo-layout', NULL, 1, 1, 1, 3, 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(3, 'Pengaturan', 'entypo-cog', NULL, 1, 1, 1, 4, 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(4, 'Manajemen', 'entypo-docs', NULL, 1, 1, 1, 2, 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(5, 'Profile', '/entypo-user', '/profil', 0, 1, 0, 5, 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stg_menu`
--

CREATE TABLE `stg_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `icon` varchar(191) DEFAULT NULL,
  `url` varchar(191) DEFAULT NULL,
  `is_parent` tinyint(1) NOT NULL DEFAULT 0,
  `is_login` tinyint(1) NOT NULL DEFAULT 0,
  `is_shown` tinyint(1) NOT NULL DEFAULT 1,
  `order_no` int(11) DEFAULT NULL,
  `main_menu_id` int(10) UNSIGNED DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` varchar(191) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(191) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stg_menu`
--

INSERT INTO `stg_menu` (`id`, `title`, `icon`, `url`, `is_parent`, `is_login`, `is_shown`, `order_no`, `main_menu_id`, `disabled`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Rumah Sakit', NULL, '/master/hospital', 0, 1, 1, 1, 2, 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(2, 'Cara Kunjung', NULL, '/master/visit-method', 0, 1, 1, 2, 2, 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(3, 'Tindakan', NULL, '/master/action', 0, 1, 1, 3, 2, 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(4, 'Jaminan', NULL, '/master/assurance', 0, 1, 1, 4, 2, 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(5, 'Menu Akses', NULL, '/setting/menu-access', 0, 1, 1, 5, 3, 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(6, 'Pengguna', NULL, '/setting/user', 0, 1, 1, 6, 3, 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(7, 'Data Akses', NULL, '/setting/data-access', 0, 1, 1, 7, 3, 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(8, 'Pasien', NULL, '/management/patient', 0, 1, 1, 8, 4, 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(9, 'Peran', NULL, '/setting/role', 0, 1, 1, 9, 3, 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(10, 'Grup Menu', NULL, '/setting/group-menu', 0, 1, 1, 10, 3, 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(11, 'Provider', NULL, '/setting/provider', 0, 1, 1, 11, 3, 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stg_menu_access`
--

CREATE TABLE `stg_menu_access` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_menu_id` int(10) UNSIGNED NOT NULL,
  `main_menu_id` int(10) UNSIGNED DEFAULT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `submenu_id` int(10) UNSIGNED DEFAULT NULL,
  `add` tinyint(1) NOT NULL DEFAULT 0,
  `edit` tinyint(1) NOT NULL DEFAULT 0,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `detail` tinyint(1) NOT NULL DEFAULT 0,
  `view` tinyint(1) NOT NULL DEFAULT 0,
  `approval` tinyint(1) NOT NULL DEFAULT 0,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` varchar(191) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(191) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stg_provider`
--

CREATE TABLE `stg_provider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provider_npwp` varchar(25) DEFAULT NULL,
  `provider_name` varchar(250) NOT NULL,
  `provider_birth_place` varchar(100) DEFAULT NULL,
  `provider_birth_date` date DEFAULT NULL,
  `provider_email` varchar(191) DEFAULT NULL,
  `provider_phone_number` varchar(25) DEFAULT NULL,
  `provider_home_number` varchar(25) DEFAULT NULL,
  `provider_address_1` text DEFAULT NULL,
  `provider_address_2` varchar(3) DEFAULT NULL,
  `provider_address_3` varchar(3) DEFAULT NULL,
  `provider_district_id` int(10) UNSIGNED DEFAULT NULL,
  `provider_ward` varchar(191) DEFAULT NULL,
  `provider_logo` text DEFAULT NULL,
  `provider_picture` text DEFAULT NULL,
  `owner_npwp` varchar(25) DEFAULT NULL,
  `owner_nik` varchar(16) DEFAULT NULL,
  `owner_name` varchar(250) NOT NULL,
  `owner_birth_place` varchar(100) DEFAULT NULL,
  `owner_birth_date` date DEFAULT NULL,
  `owner_email` varchar(191) DEFAULT NULL,
  `owner_phone_number` varchar(25) DEFAULT NULL,
  `owner_home_number` varchar(25) DEFAULT NULL,
  `owner_address_1` text DEFAULT NULL,
  `owner_address_2` varchar(3) DEFAULT NULL,
  `owner_address_3` varchar(3) DEFAULT NULL,
  `owner_district_id` int(10) UNSIGNED DEFAULT NULL,
  `owner_ward` varchar(191) DEFAULT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` varchar(191) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(191) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stg_role`
--

CREATE TABLE `stg_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `created_by` varchar(191) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(191) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stg_role`
--

INSERT INTO `stg_role` (`id`, `name`, `disabled`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Developer', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(2, 'Dokter', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(3, 'Dewa', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(4, 'Admin 1', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(5, 'Admin 2', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL),
(6, 'Admin 3', 0, '2023-10-19 21:47:29', 'Migrasi', '2023-10-19 21:47:29', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_action`
--
ALTER TABLE `mst_action`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_assurance`
--
ALTER TABLE `mst_assurance`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_hospital`
--
ALTER TABLE `mst_hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mst_user_nik_unique` (`nik`),
  ADD UNIQUE KEY `mst_user_email_unique` (`email`),
  ADD UNIQUE KEY `mst_user_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `mst_user_home_number_unique` (`home_number`);

--
-- Indeks untuk tabel `mst_visit_method`
--
ALTER TABLE `mst_visit_method`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `stg_attributes`
--
ALTER TABLE `stg_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stg_data_access`
--
ALTER TABLE `stg_data_access`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stg_group_menu`
--
ALTER TABLE `stg_group_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stg_login`
--
ALTER TABLE `stg_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stg_login_username_unique` (`username`);

--
-- Indeks untuk tabel `stg_main_menu`
--
ALTER TABLE `stg_main_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stg_menu`
--
ALTER TABLE `stg_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stg_menu_access`
--
ALTER TABLE `stg_menu_access`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stg_provider`
--
ALTER TABLE `stg_provider`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stg_provider_provider_npwp_unique` (`provider_npwp`),
  ADD UNIQUE KEY `stg_provider_provider_email_unique` (`provider_email`),
  ADD UNIQUE KEY `stg_provider_provider_phone_number_unique` (`provider_phone_number`),
  ADD UNIQUE KEY `stg_provider_provider_home_number_unique` (`provider_home_number`),
  ADD UNIQUE KEY `stg_provider_owner_npwp_unique` (`owner_npwp`),
  ADD UNIQUE KEY `stg_provider_owner_nik_unique` (`owner_nik`),
  ADD UNIQUE KEY `stg_provider_owner_email_unique` (`owner_email`),
  ADD UNIQUE KEY `stg_provider_owner_phone_number_unique` (`owner_phone_number`),
  ADD UNIQUE KEY `stg_provider_owner_home_number_unique` (`owner_home_number`);

--
-- Indeks untuk tabel `stg_role`
--
ALTER TABLE `stg_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `mst_action`
--
ALTER TABLE `mst_action`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `mst_assurance`
--
ALTER TABLE `mst_assurance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mst_hospital`
--
ALTER TABLE `mst_hospital`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mst_visit_method`
--
ALTER TABLE `mst_visit_method`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stg_attributes`
--
ALTER TABLE `stg_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `stg_data_access`
--
ALTER TABLE `stg_data_access`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stg_group_menu`
--
ALTER TABLE `stg_group_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `stg_login`
--
ALTER TABLE `stg_login`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stg_main_menu`
--
ALTER TABLE `stg_main_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `stg_menu`
--
ALTER TABLE `stg_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `stg_menu_access`
--
ALTER TABLE `stg_menu_access`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stg_provider`
--
ALTER TABLE `stg_provider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stg_role`
--
ALTER TABLE `stg_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
