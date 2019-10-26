-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 Okt 2019 pada 11.06
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `id_vendor` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `warranty` int(11) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` smallint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `id_category`, `id_vendor`, `name`, `sku`, `price`, `warranty`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Vivo Book', 'SK256U', 25000000, 24, 'cbd37e9174151f04461e82977835dc18.jpg', 1, '2019-09-30 17:09:11', '2019-09-30 18:46:04'),
(2, 3, 1, 'Asus Pro Book', 'SK8972', 40000000, 24, '1cff1fcfe3238fae26232d3a83ec18bb.jpg', 1, '2019-09-30 18:49:17', '2019-09-30 18:49:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` varchar(20) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `description` text,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id`, `id_supplier`, `transaction_date`, `total`, `description`, `status`, `created_at`, `updated_at`) VALUES
('BK2019102200001', 3, '2019-10-22', 75000000, 'beli lagi bos', 1, '2019-10-22 13:07:50', '2019-10-22 13:07:50'),
('BK2019102400002', 3, '2019-10-24', 185000000, 'belanja bulanan', 5, '2019-10-24 10:04:43', '2019-10-26 08:33:18'),
('BK2019102400003', 3, '2019-10-24', 115000000, 'test', 1, '2019-10-24 10:36:30', '2019-10-26 08:34:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar_detail`
--

CREATE TABLE `barang_keluar_detail` (
  `id` int(11) NOT NULL,
  `id_barang_keluar` varchar(20) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_stock` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_keluar_detail`
--

INSERT INTO `barang_keluar_detail` (`id`, `id_barang_keluar`, `id_barang`, `id_stock`, `created_at`, `updated_at`) VALUES
(1, 'BK2019102200001', 1, 17, '2019-10-22 13:07:50', '2019-10-22 13:07:50'),
(2, 'BK2019102200001', 1, 16, '2019-10-22 13:07:50', '2019-10-22 13:07:50'),
(3, 'BK2019102200001', 1, 15, '2019-10-22 13:07:50', '2019-10-22 13:07:50'),
(7, 'BK2019102400003', 1, 12, '2019-10-26 08:23:37', '2019-10-26 08:23:37'),
(8, 'BK2019102400003', 1, 11, '2019-10-26 08:23:37', '2019-10-26 08:23:37'),
(9, 'BK2019102400003', 1, 10, '2019-10-26 08:23:37', '2019-10-26 08:23:37'),
(10, 'BK2019102400003', 2, 14, '2019-10-26 08:23:37', '2019-10-26 08:23:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(11) NOT NULL,
  `id_vendor` int(11) DEFAULT NULL,
  `no_faktur` varchar(50) DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `description` text,
  `total` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL COMMENT '1 => selesai, 2 => proses',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `id_vendor`, `no_faktur`, `transaction_date`, `description`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'FK0885', '2019-10-06', 'Stock untuk bulan oktober', 1000000, 1, '2019-10-06 07:36:47', '2019-10-06 07:36:47'),
(2, 1, 'FK00983', '2019-10-22', 'barang baru', 56000000, 1, '2019-10-22 12:51:06', '2019-10-22 12:51:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk_detail`
--

CREATE TABLE `barang_masuk_detail` (
  `id` int(11) NOT NULL,
  `id_barang_masuk` varchar(10) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_stock` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang_masuk_detail`
--

INSERT INTO `barang_masuk_detail` (`id`, `id_barang_masuk`, `id_barang`, `id_stock`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 7, '2019-10-06 07:36:47', '2019-10-06 07:36:47'),
(2, '1', 1, 8, '2019-10-06 07:36:47', '2019-10-06 07:36:47'),
(3, '1', 1, 9, '2019-10-06 07:36:47', '2019-10-06 07:36:47'),
(4, '1', 1, 10, '2019-10-06 07:36:47', '2019-10-06 07:36:47'),
(5, '1', 1, 11, '2019-10-06 07:36:47', '2019-10-06 07:36:47'),
(6, '1', 1, 12, '2019-10-06 07:36:47', '2019-10-06 07:36:47'),
(7, '1', 2, 13, '2019-10-06 07:36:47', '2019-10-06 07:36:47'),
(8, '1', 2, 14, '2019-10-06 07:36:47', '2019-10-06 07:36:47'),
(9, '2', 1, 15, '2019-10-22 12:51:06', '2019-10-22 12:51:06'),
(10, '2', 1, 16, '2019-10-22 12:51:06', '2019-10-22 12:51:06'),
(11, '2', 1, 17, '2019-10-22 12:51:06', '2019-10-22 12:51:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_barang`
--

CREATE TABLE `detail_barang` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `option` varchar(50) DEFAULT NULL,
  `value` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_barang`
--

INSERT INTO `detail_barang` (`id`, `id_barang`, `option`, `value`, `created_at`, `updated_at`) VALUES
(27, 1, 'Warna', 'Hitam', '2019-09-30 18:46:04', '2019-09-30 18:46:04'),
(28, 1, 'Berat', '2 kg', '2019-09-30 18:46:04', '2019-09-30 18:46:04'),
(29, 1, 'processor', 'Intel core i7', '2019-09-30 18:46:04', '2019-09-30 18:46:04'),
(30, 1, 'hardisk', '512 GB', '2019-09-30 18:46:04', '2019-09-30 18:46:04'),
(35, 2, 'Warna', 'Hitam', '2019-09-30 18:49:29', '2019-09-30 18:49:29'),
(36, 2, 'Layar', '24\"', '2019-09-30 18:49:29', '2019-09-30 18:49:29'),
(37, 2, 'Berat', '2 Kg', '2019-09-30 18:49:29', '2019-09-30 18:49:29'),
(38, 2, 'Processor', 'Intel Core i7', '2019-09-30 18:49:29', '2019-09-30 18:49:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` smallint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Elektornik', 1, '2019-09-28 02:48:10', '2019-09-28 09:27:55'),
(2, 'Pipa', 1, '2019-09-28 03:36:19', '2019-09-28 03:36:19'),
(3, 'Laptop', 1, '2019-09-28 03:41:06', '2019-09-28 03:41:23'),
(4, 'Ahsiap', 1, '2019-09-28 04:29:55', '2019-09-28 04:29:55'),
(5, 'kotoloyo', 1, '2019-09-28 04:30:09', '2019-09-30 18:46:28'),
(6, 'bedebah', 1, '2019-09-30 18:46:37', '2019-09-30 18:46:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` bigint(20) NOT NULL,
  `type` tinyint(1) DEFAULT NULL COMMENT '1 => untuk backend, 2 => untuk supplier',
  `id_user` int(11) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `action` varchar(100) DEFAULT NULL,
  `description` text,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(20) DEFAULT NULL,
  `images` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_transaksi`, `images`, `created_at`, `updated_at`) VALUES
(3, 'PS2019102400002', '66d7cffdd7f80a284c2911d32daeb9be.jpg', '2019-10-25 16:48:12', '2019-10-25 16:48:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` varchar(20) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_barang_keluar` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `id_supplier`, `id_barang_keluar`, `address`, `description`, `created_at`, `updated_at`) VALUES
('PS2019102400001', 3, 'BK2019102400002', 'Jalan Gita Sura No.1', 'belanja bulanan', '2019-10-24 10:04:43', '2019-10-24 10:04:43'),
('PS2019102400002', 3, 'BK2019102400003', 'Jalan Gita Sura No.1', 'test', '2019-10-24 10:36:30', '2019-10-24 10:36:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_detail`
--

CREATE TABLE `pemesanan_detail` (
  `id` bigint(20) NOT NULL,
  `id_pemesanan` varchar(20) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan_detail`
--

INSERT INTO `pemesanan_detail` (`id`, `id_pemesanan`, `id_barang`, `price`, `qty`, `created_at`, `updated_at`) VALUES
(1, 'PS2019102400001', 2, 40000000, 4, '2019-10-24 10:04:43', '2019-10-24 10:04:43'),
(2, 'PS2019102400001', 1, 25000000, 1, '2019-10-24 10:04:43', '2019-10-24 10:04:43'),
(3, 'PS2019102400002', 2, 40000000, 1, '2019-10-24 10:36:30', '2019-10-24 10:36:30'),
(4, 'PS2019102400002', 1, 25000000, 3, '2019-10-24 10:36:30', '2019-10-24 10:36:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur`
--

CREATE TABLE `retur` (
  `id` varchar(20) NOT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `retur_date` date DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `retur`
--

INSERT INTO `retur` (`id`, `id_supplier`, `retur_date`, `description`, `status`, `created_at`, `updated_at`) VALUES
('RT2019102600001', 3, '2019-10-26', 'barang rusak', 4, '2019-10-26 08:40:43', '2019-10-26 09:00:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `retur_detail`
--

CREATE TABLE `retur_detail` (
  `id` bigint(20) NOT NULL,
  `id_retur` varchar(20) DEFAULT NULL,
  `id_stock` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `retur_detail`
--

INSERT INTO `retur_detail` (`id`, `id_retur`, `id_stock`, `created_at`, `updated_at`) VALUES
(1, 'RT2019102600001', 12, '2019-10-26 08:40:43', '2019-10-26 08:40:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stock_barang`
--

CREATE TABLE `stock_barang` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `serial_number` varchar(50) DEFAULT NULL,
  `receive_date` date DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `status` smallint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `stock_barang`
--

INSERT INTO `stock_barang` (`id`, `id_barang`, `serial_number`, `receive_date`, `location`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'asdq123123', '2019-10-01', NULL, 1, '2019-09-30 17:56:18', NULL),
(2, 1, 'SN0929902348', '2019-10-01', 'B-1', 1, '2019-10-06 05:38:16', '2019-10-06 05:38:16'),
(3, 1, 'SB00384BU', '2019-09-26', 'BR-02', 1, '2019-10-06 05:40:27', '2019-10-06 05:52:05'),
(4, 1, 'SN092348SJJK', '2019-10-16', 'B-2', 1, '2019-10-06 05:51:26', '2019-10-06 05:51:26'),
(5, 2, 'SN0902394023984', '2019-10-06', 'B-1', 1, '2019-10-06 05:52:59', '2019-10-07 16:14:34'),
(6, 2, 'SN023409384BH', '2019-10-06', 'C-3', 1, '2019-10-06 05:53:20', '2019-10-07 16:30:28'),
(7, 1, 'ABCD01E', '2019-10-06', 'Rak Depan', 1, '2019-10-06 07:36:47', '2019-10-06 07:36:47'),
(8, 1, 'ABCD02E', '2019-10-06', 'Rak Depan', 1, '2019-10-06 07:36:47', '2019-10-06 07:36:47'),
(9, 1, 'ABCD04E', '2019-10-06', 'Rak Depan', 1, '2019-10-06 07:36:47', '2019-10-06 07:36:47'),
(10, 1, 'ABCD05E', '2019-10-06', 'Rak Depan', 2, '2019-10-06 07:36:47', '2019-10-26 08:23:37'),
(11, 1, 'ABCD06E', '2019-10-06', 'Rak Depan', 2, '2019-10-06 07:36:47', '2019-10-26 08:23:37'),
(12, 1, 'ABCD07E', '2019-10-06', 'Rak Depan', 3, '2019-10-06 07:36:47', '2019-10-26 08:40:43'),
(13, 2, 'ABCD16E', '2019-10-06', 'Rak Depan', 1, '2019-10-06 07:36:47', '2019-10-26 08:18:21'),
(14, 2, 'ABCD18E', '2019-10-06', 'Rak Depan', 2, '2019-10-06 07:36:47', '2019-10-26 08:23:37'),
(15, 1, 'ASU645879', '2019-10-22', 'Rak Depan', 2, '2019-10-22 12:51:06', '2019-10-22 13:07:50'),
(16, 1, 'ASU490858762', '2019-10-22', 'Rak Depan', 2, '2019-10-22 12:51:06', '2019-10-22 13:07:50'),
(17, 1, 'ASUsldkf8237', '2019-10-22', 'Rak Depan', 2, '2019-10-22 12:51:06', '2019-10-22 13:07:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `no_telp`, `address`, `password`, `isActive`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Owner', 'owner@mail.com', '082235698798', 'Jalan Nangka Utara', '$2y$10$Ow4p7kfvtokIw0iadjXmNukn/B5V94e45wqoJ8R0nqrChq3DB7ENa', 1, 1, '2019-09-19 07:26:06', '2019-10-22 13:30:41'),
(2, 'Admin', 'admin@mail.com', '081337356987', '', '$2y$10$CJwtg18LMZ.GhTFMCI1jyOBiHAIvoFy4GjatICx15IEtg2OhoeG3q', 1, 2, '2019-09-19 07:26:34', '2019-09-19 07:26:34'),
(3, 'Bumi Mas', 'supplier@mail.com', '082234578965', 'Jalan Gita Sura No.1', '$2y$10$U/ciTVVAkoc/qt/GZEV11uDhY.01ttrkPsR8NzoUReTdi21HAfsPm', 1, 3, '2019-09-19 07:27:01', '2019-10-24 09:52:49'),
(4, 'Petugas', 'petugas@mail.com', '087321654789', '', '$2y$10$SbAAxxKcff4IIVAF5o.ohuowPc6VuMNDTPGuDzVYdjyi1arQvUpzW', 1, 4, '2019-09-19 07:27:22', '2019-09-19 07:27:22'),
(5, 'Sumber Makmus', 'sumbermas@mail.com', '0361789654', '', '$2y$10$axYHDGB5WmwvP5.bvMmPMO/ksyZm88nTosBPgACeQSaSXlGMMu6C.', 1, 3, '2019-10-21 14:19:11', '2019-10-21 14:34:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` smallint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id`, `name`, `no_telp`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Asus', '0822350', 'asus@mail.com', 1, '2019-09-28 04:22:19', '2019-09-30 18:47:41'),
(2, 'Astra Indo', '0822653265', 'asd@mail.com', 1, '2019-09-28 05:14:18', '2019-09-28 09:28:17'),
(3, 'Lenovo', '0361896452', 'lenovo@mail.com', 1, '2019-09-30 18:47:01', '2019-09-30 18:47:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_keluar_detail`
--
ALTER TABLE `barang_keluar_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_masuk_detail`
--
ALTER TABLE `barang_masuk_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retur_detail`
--
ALTER TABLE `retur_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_barang`
--
ALTER TABLE `stock_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang_keluar_detail`
--
ALTER TABLE `barang_keluar_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang_masuk_detail`
--
ALTER TABLE `barang_masuk_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detail_barang`
--
ALTER TABLE `detail_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemesanan_detail`
--
ALTER TABLE `pemesanan_detail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `retur_detail`
--
ALTER TABLE `retur_detail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stock_barang`
--
ALTER TABLE `stock_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
