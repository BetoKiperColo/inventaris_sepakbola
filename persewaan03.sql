-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 25, 2025 at 06:50 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `persewaan03`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `nama`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$12$/EZdUtpNHoptx29vsByCmedWZ.aqYDe0BW9AuT8z8b3xEaGbPMn4u', '2025-12-15 06:49:21', '2025-12-15 06:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint UNSIGNED NOT NULL,
  `kategori_id` bigint UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int NOT NULL,
  `harga_sewa` int NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `kategori_id`, `nama_barang`, `stok`, `harga_sewa`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 2, 'Kursi Lipat 2', 4, 15000, 'barang/cjq7coPAO2jws2bPFGHOE2xxs2poVNOlDaWnhQ9C.jpg', '2025-12-17 05:58:03', '2025-12-25 11:39:31'),
(3, 3, 'Meja Lipat 4', 3, 20000, 'barang/bIGk0UaXDSJrQHKBo0KZoGmreWq0TBDXfMorgua5.jpg', '2025-12-17 06:42:26', '2025-12-25 11:24:10'),
(5, 4, 'Kompor Portable 1', 3, 15000, 'barang/AlOGAG7e5MTerbj0M8JtOnek0UFMWhMkzmGTCu5C.jpg', '2025-12-17 06:45:17', '2025-12-25 11:39:32'),
(6, 5, 'Tenda 1', 3, 40000, 'barang/rcuNPfPi73NpkfQC70nXmwanCucMnfJraWaO6MDF.jpg', '2025-12-22 21:55:26', '2025-12-25 11:27:19'),
(7, 5, 'Tenda 3', 4, 45000, 'barang/YGFvRXx3lI9XBn2PzajHrT1ZsiVYjP76sWzGnT0o.jpg', '2025-12-23 03:32:39', '2025-12-25 11:26:39'),
(8, 5, 'Tenda 4', 3, 50000, 'barang/JhvU2Dji63yaXsq4f95z84e23MTw8VrwWpQUDn0U.jpg', '2025-12-23 03:33:59', '2025-12-25 11:39:31'),
(9, 5, 'Tenda 2', 5, 42000, 'barang/c0ZMewnYFluSvk1yo4YwygsCwfoJjdr7Pi3iE95S.jpg', '2025-12-23 03:37:48', '2025-12-25 11:27:31'),
(10, 4, 'Kompor Portable 2', 9, 13000, 'barang/eGf91JEJtugl7JdZy7XiNotN27rb1LLIRwpOCUb6.jpg', '2025-12-23 03:39:26', '2025-12-25 11:24:58'),
(11, 3, 'Meja Lipat 2', 4, 18000, 'barang/tYzbpFiaXsevbYCYgzFoAPnLn7VtvKkY4qZPGdxZ.jpg', '2025-12-23 03:42:01', '2025-12-25 11:39:31'),
(12, 3, 'Meja Lipat 3', 5, 18500, 'barang/420jxOX0deli0KV6G2wQDrtLQoQvdp7CARJ5zIgC.jpg', '2025-12-23 03:43:27', '2025-12-25 11:23:51'),
(13, 3, 'Meja Lipat 1', 8, 13000, 'barang/ek1PbpKrF4QvAyCNt2tAQeajSafrEv3OSURKlGpL.jpg', '2025-12-23 03:45:13', '2025-12-25 11:23:17'),
(14, 2, 'Kursi Lipat 1', 13, 12500, 'barang/qx2fnHd8AhKPmWxmWdCnTXWTySrNmwfSaOahkBKj.jpg', '2025-12-23 03:46:17', '2025-12-25 11:21:11'),
(15, 2, 'Kursi Lipat 3', 7, 25000, 'barang/VImeTNY5U95Tpeln0NChmsXuJEQb1I4pfatzH2ra.jpg', '2025-12-23 03:48:02', '2025-12-25 11:22:07'),
(16, 8, 'Tas Carrier 1', 5, 40000, 'barang/Hr69djm1eNq5EeqWvhAhe0bB59MF5TaO9JKNRkXk.jpg', '2025-12-23 03:51:03', '2025-12-25 11:39:32'),
(17, 8, 'Tas Carrier 3', 4, 45000, 'barang/Xr7c0DN2tQvWyUvJoypOOOC2OZyzgNwycrm3dT20.jpg', '2025-12-23 03:51:58', '2025-12-25 11:30:00'),
(18, 8, 'Tas Carrier 4', 7, 50000, 'barang/0GSBT7zkgJ3pfiDNiD80Io1MWOoCpXaSvBvVaZSC.jpg', '2025-12-23 03:53:04', '2025-12-25 11:29:37'),
(19, 9, 'Matras Camping 2', 16, 19000, 'barang/NC3tJY5pV3I9yRf4gyd5tzAAibjITAqRNt5H0YAT.jpg', '2025-12-23 03:54:58', '2025-12-25 11:30:49'),
(20, 9, 'Matras Camping 1', 13, 17000, 'barang/QJDpJOFgr6K7CLdiMxJNRJffZngXX0SPp0da5CNf.jpg', '2025-12-23 03:55:43', '2025-12-25 11:31:17'),
(21, 10, 'Tracking Pool 1', 28, 16000, 'barang/xYmBtr4hsXENIgXSgzrxRHrGuQlrj27tUpKzzy6I.jpg', '2025-12-23 03:58:54', '2025-12-25 11:32:24'),
(23, 12, 'Nesting 1', 6, 24000, 'barang/EiGXauycMqFSEyfiCerXgStkUFk4hfK9CvOxgOfP.jpg', '2025-12-23 22:21:07', '2025-12-25 11:39:32'),
(24, 12, 'Nesting 2', 8, 27000, 'barang/P5iI28py2PV9Er7Dm4j7CdtSOD054EgUkEBY4MAf.jpg', '2025-12-23 22:23:47', '2025-12-25 11:33:08'),
(25, 13, 'Senter 2', 9, 22000, 'barang/ctz75Glm0h59hO0f2uwJEwv3iVPPLklAxjeRiS87.jpg', '2025-12-23 22:38:49', '2025-12-25 11:34:40'),
(26, 13, 'Senter 4', 12, 29000, 'barang/p8HnfWzya0JZuwjJGmloB2ko7aXXD2Os0nWT9rFs.jpg', '2025-12-23 22:40:03', '2025-12-25 11:35:20'),
(27, 13, 'Senter 1', 13, 20000, 'barang/5PxeEHZb0cgnYucOapiIfMijN8eAyoeLOIXttxpU.jpg', '2025-12-23 22:41:19', '2025-12-25 11:34:13'),
(28, 13, 'Senter 3', 17, 25000, 'barang/wZAPNcZu8Sna63M8GD80q4RNbvhcS0ai6ueQPgnM.jpg', '2025-12-23 22:42:50', '2025-12-25 11:34:59'),
(29, 14, 'Sleeping Bag 1', 20, 30000, 'barang/lmx3u9PbE7YJ1zZW0RIAP7Dvo5DZ2ernC6RcVPlg.jpg', '2025-12-23 22:44:20', '2025-12-25 11:35:48'),
(30, 14, 'Sleeping Bag 2', 24, 35000, 'barang/gduoBc9GZVW9rin2E7d3IZlbBUNX8xsGNsH1ykgd.jpg', '2025-12-23 22:45:06', '2025-12-25 11:37:37'),
(31, 8, 'Tas Carrier 2', 6, 44000, 'barang/KyEeNr9W78FJIcCEtBj1RNQF43DeQ8vH15v4Uv2m.jpg', '2025-12-23 22:46:22', '2025-12-25 11:29:23');

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
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(2, 'kursi lipat', '2025-12-15 07:46:20', '2025-12-17 05:28:45'),
(3, 'meja lipat', '2025-12-17 05:28:57', '2025-12-17 05:28:57'),
(4, 'kompor portable', '2025-12-17 05:29:08', '2025-12-17 05:29:08'),
(5, 'tenda 2x2', '2025-12-17 05:29:46', '2025-12-17 05:29:46'),
(8, 'carrier', '2025-12-23 03:50:12', '2025-12-23 03:50:12'),
(9, 'matras', '2025-12-23 03:53:29', '2025-12-23 03:53:29'),
(10, 'tracking pool', '2025-12-23 03:58:16', '2025-12-23 03:58:16'),
(12, 'nesting', '2025-12-23 22:20:36', '2025-12-23 22:20:36'),
(13, 'senter', '2025-12-23 22:38:09', '2025-12-23 22:38:09'),
(14, 'sleeping bag', '2025-12-23 22:43:48', '2025-12-23 22:43:48');

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
(4, '2025_12_15_134419_create_admins_table', 1),
(5, '2025_12_15_142200_create_kategoris_table', 2),
(6, '2025_12_17_123547_create_barangs_table', 3),
(7, '2025_12_17_130843_create_persewaans_table', 4),
(8, '2025_12_17_135653_remove_barang_id_from_persewaans_table', 5),
(9, '2025_12_17_140236_create_persewaan_details_table', 6);

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
-- Table structure for table `persewaans`
--

CREATE TABLE `persewaans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_penyewa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `lama_sewa` int NOT NULL,
  `total_harga` int NOT NULL,
  `jaminan_sewa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('disewa','kembali') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'disewa',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `persewaan_details`
--

CREATE TABLE `persewaan_details` (
  `id` bigint UNSIGNED NOT NULL,
  `persewaan_id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL,
  `harga_sewa` int NOT NULL,
  `subtotal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
('p09xmaoJLb2aU5nmVESY4rXCSS7yieywjfLADFkk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYTFoYUo4ek0yanZ0MWlVWEJPRzBwbElVdDBPVXgydTNTdFptSFA1biI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766688010);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-12-15 06:49:21', '$2y$12$kXiMVa44VjIyhtCkSbwj8edEgGjMTjblOPtyK0fOnALozlMq2cSQe', 'AYbLqp9RiB', '2025-12-15 06:49:22', '2025-12-15 06:49:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangs_kategori_id_foreign` (`kategori_id`);

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `persewaans`
--
ALTER TABLE `persewaans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persewaan_details`
--
ALTER TABLE `persewaan_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persewaan_details_persewaan_id_foreign` (`persewaan_id`),
  ADD KEY `persewaan_details_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `persewaans`
--
ALTER TABLE `persewaans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `persewaan_details`
--
ALTER TABLE `persewaan_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `persewaan_details`
--
ALTER TABLE `persewaan_details`
  ADD CONSTRAINT `persewaan_details_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`),
  ADD CONSTRAINT `persewaan_details_persewaan_id_foreign` FOREIGN KEY (`persewaan_id`) REFERENCES `persewaans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
