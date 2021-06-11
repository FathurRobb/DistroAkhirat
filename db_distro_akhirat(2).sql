-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2021 at 09:35 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_distro_akhirat`
--

-- --------------------------------------------------------

--
-- Table structure for table `gudanginouts`
--

CREATE TABLE `gudanginouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_faktur` bigint(20) NOT NULL,
  `no_order` bigint(20) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_supplier` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gudanginout_details`
--

CREATE TABLE `gudanginout_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_brg` bigint(20) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_brg_io` bigint(20) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gudangs`
--

CREATE TABLE `gudangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_brg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` bigint(20) UNSIGNED NOT NULL,
  `nm_brg` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_brg` bigint(20) NOT NULL,
  `harga_beli_brg` bigint(20) NOT NULL,
  `harga_jual_brg` bigint(20) NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gudangs`
--

INSERT INTO `gudangs` (`id`, `kode_brg`, `jenis`, `nm_brg`, `warna`, `ukuran`, `stok_brg`, `harga_beli_brg`, `harga_jual_brg`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'BR0001', 1, 'Kaos MTMA', 'Hitam', 'L', 27, 60000, 75000, 'Official Merchandise My Trip My Adventures', NULL, NULL),
(2, 'BR0002', 2, 'Celana Jeans Robb Cloth', 'Biru', '32', 19, 70000, 80000, 'Celana Trendi yang cocok untuk anak muda', NULL, NULL),
(3, 'BR0003', 1, 'Kemeja Panjang Rob Cloth', 'Putih', 'L', 22, 80000, 95000, 'Baju yang cocok untuk dipake ke kantor,keundangan dan acara formal lain', NULL, NULL),
(4, 'BR0004', 1, 'Kemeja Panjang Rob Cloth', 'Putih', 'M', 18, 80000, 95000, 'Baju yang cocok untuk dipake ke kantor,keundangan dan acara formal lain', NULL, NULL),
(6, 'BR0005', 1, 'Kemeja Panjang Rob Cloth', 'Putih', 'XL', 13, 80000, 95000, 'Baju yang cocok untuk dipake ke kantor,keundangan dan acara formal lain', NULL, NULL),
(7, 'BR0006', 2, 'Celana Jeans Robb Cloth', 'Biru', '33', 9, 70000, 80000, 'Celana Trendi yang cocok untuk anak muda', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nm_jns` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `nm_jns`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'Baju', 'Terdiri dari Atasan mulai dari Kaos, Kemeja, ', NULL, NULL),
(2, 'Celana', 'Bawahan seperti jeans, training, ', NULL, NULL);

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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2021_06_03_112657_create_gudangs_table', 1),
(10, '2021_06_04_034022_create_gudanginout_details_table', 1),
(11, '2021_06_04_034631_create_gudanginouts_table', 1),
(12, '2021_06_05_030707_create_jenis_table', 1),
(13, '2021_06_08_162159_orders', 2),
(14, '2021_06_08_163322_order_details', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `invoices` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_order` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_order` double NOT NULL,
  `uang_order` double NOT NULL,
  `kembalian_order` double NOT NULL,
  `id_user` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) NOT NULL,
  `invoices` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_barang` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Triggers `order_details`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `order_details` FOR EACH ROW BEGIN
	UPDATE gudangs SET stok_brg = stok_brg-NEW.qty
    WHERE id = NEW.id_barang;
END
$$
DELIMITER ;

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
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `level`, `password`, `nama`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ceokeren', 'admin', '$2y$10$Z7eB5589sPKECfu2osMlC.0IWowhtMysboHJR7YUTm3HDPJyezOyK', 'Arthur Fleck', 'NnPclJyW0jWlV0nd9JsZU911S0UQJpDlY5EdoytM5p35LcyiF9CLOLkzODOP', NULL, NULL),
(2, 'kasir01', 'kasir', '$2y$10$O1kKx3ehCb9zgWZH4OyGjOLgFiPuXYHcTBG7iTEqd8btRHQ6EUdUO', 'Windah Ackerman', 'uqGqAD57YsSgRllcGP1obXWnMLC4YL8dfahcsuZTD7WSpqzloY7zP7KJrn9f', NULL, NULL),
(3, 'gudang69', 'gudang', '$2y$10$oijt.gPfpOTQECsO.r3pN.iMYlGlLZJPeViTz5lQrBwBqhoxH6EYO', 'Iin Solihin', 't0rsmYdlsjHMOR9TcMZ7tLnHkFQUutt4ddDTy0qV2B3BIUTDwl5FCamQKOjl', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gudanginouts`
--
ALTER TABLE `gudanginouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gudanginout_details`
--
ALTER TABLE `gudanginout_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gudangs`
--
ALTER TABLE `gudangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gudangs_kode_brg_unique` (`kode_brg`),
  ADD KEY `jenis` (`jenis`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`invoices`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_ibfk_1` (`id_barang`),
  ADD KEY `invoices` (`invoices`);

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
  ADD UNIQUE KEY `users_nik_karyawan_unique` (`nama`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD UNIQUE KEY `nama_2` (`nama`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gudanginouts`
--
ALTER TABLE `gudanginouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gudanginout_details`
--
ALTER TABLE `gudanginout_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gudangs`
--
ALTER TABLE `gudangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gudangs`
--
ALTER TABLE `gudangs`
  ADD CONSTRAINT `gudangs_ibfk_1` FOREIGN KEY (`jenis`) REFERENCES `jenis` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `gudangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`invoices`) REFERENCES `orders` (`invoices`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
