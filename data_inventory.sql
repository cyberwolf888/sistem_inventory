-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04 Jan 2020 pada 10.38
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
(1, 2, 3, 'PIPING SYSTEM', 'pipa-pvc-1', 120000, 0, '3d681af6cbfbe31910127e5264178dc6.png', 1, '2020-01-04 08:18:07', '2020-01-04 08:20:09'),
(2, 1, 1, 'Rice Cooker', 'rice-c-y-1', 350000, 12, 'e1d0c330242b885a0b773bc04919d9dc.jpg', 1, '2020-01-04 08:23:33', '2020-01-04 08:23:33'),
(3, 4, 5, 'Kompor Gas', 'gas-c-2', 200000, 12, 'c439a217f206cd72fea21bc89cf7f0cf.jpg', 1, '2020-01-04 08:25:37', '2020-01-04 08:25:37'),
(4, 1, 6, 'Kulkas', 'NRS-19-AH', 1874000, 12, '1791772c96410ffdef8eee014a69933e.jpg', 1, '2020-01-04 08:28:19', '2020-01-04 08:28:19');

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
('BK2020010400001', 3, '2020-01-04', 3748000, 'lunas', 1, '2020-01-04 08:38:06', '2020-01-04 08:38:06'),
('BK2020010400002', 5, '2020-01-03', 550000, 'lunas', 1, '2020-01-04 08:38:55', '2020-01-04 08:38:55'),
('BK2020010400003', 5, '2020-01-07', 120000, NULL, 1, '2020-01-04 08:42:06', '2020-01-04 08:42:06'),
('BK2020010400004', 5, '2020-03-19', 200000, NULL, 1, '2020-01-04 08:48:31', '2020-01-04 08:48:31'),
('BK2020010400005', 3, '2020-03-19', 200000, NULL, 1, '2020-01-04 08:49:11', '2020-01-04 08:49:11'),
('BK2020010400006', 3, '2020-02-19', 120000, NULL, 1, '2020-01-04 08:49:31', '2020-01-04 08:49:31'),
('BK2020010400007', 5, '2020-01-04', 550000, 'rumah no 1', 1, '2020-01-04 08:51:56', '2020-01-04 08:55:02'),
('BK2020010400008', 5, '2020-02-04', 1994000, 'rumah no 1', 1, '2020-01-04 08:55:37', '2020-01-04 08:58:01'),
('BK2020010400009', 5, '2020-03-04', 1874000, 'rumah no 19', 1, '2020-01-04 08:59:17', '2020-01-04 09:00:21');

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
(1, 'BK2020010400001', 4, 20, '2020-01-04 08:38:06', '2020-01-04 08:38:06'),
(2, 'BK2020010400001', 4, 19, '2020-01-04 08:38:06', '2020-01-04 08:38:06'),
(3, 'BK2020010400002', 3, 15, '2020-01-04 08:38:55', '2020-01-04 08:38:55'),
(4, 'BK2020010400002', 2, 8, '2020-01-04 08:38:55', '2020-01-04 08:38:55'),
(5, 'BK2020010400003', 1, 2, '2020-01-04 08:42:06', '2020-01-04 08:42:06'),
(6, 'BK2020010400004', 3, 13, '2020-01-04 08:48:31', '2020-01-04 08:48:31'),
(7, 'BK2020010400005', 3, 11, '2020-01-04 08:49:11', '2020-01-04 08:49:11'),
(8, 'BK2020010400006', 1, 4, '2020-01-04 08:49:31', '2020-01-04 08:49:31'),
(9, 'BK2020010400007', 3, 14, '2020-01-04 08:54:49', '2020-01-04 08:54:49'),
(10, 'BK2020010400007', 2, 10, '2020-01-04 08:54:49', '2020-01-04 08:54:49'),
(11, 'BK2020010400008', 1, 5, '2020-01-04 08:57:26', '2020-01-04 08:57:26'),
(12, 'BK2020010400008', 4, 18, '2020-01-04 08:57:26', '2020-01-04 08:57:26'),
(13, 'BK2020010400009', 4, 17, '2020-01-04 09:00:11', '2020-01-04 09:00:11');

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
(1, 3, 'FK-001-2019', '2020-01-02', 'a', 550000, 1, '2020-01-04 08:31:23', '2020-01-04 08:31:23'),
(2, 1, 'Fk-002-2019', '2020-01-03', 'lunas', 1700000, 1, '2020-01-04 08:33:23', '2020-01-04 08:33:23'),
(3, 5, 'FK-003-2019', '2020-01-04', 'lunas', 1450000, 1, '2020-01-04 08:34:59', '2020-01-04 08:34:59'),
(4, 6, 'FK-009-2020', '2020-01-04', 'lunas', 8500000, 1, '2020-01-04 08:37:09', '2020-01-04 08:37:09');

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
(1, '1', 1, 1, '2020-01-04 08:31:23', '2020-01-04 08:31:23'),
(2, '1', 1, 2, '2020-01-04 08:31:23', '2020-01-04 08:31:23'),
(3, '1', 1, 3, '2020-01-04 08:31:23', '2020-01-04 08:31:23'),
(4, '1', 1, 4, '2020-01-04 08:31:23', '2020-01-04 08:31:23'),
(5, '1', 1, 5, '2020-01-04 08:31:23', '2020-01-04 08:31:23'),
(6, '2', 2, 6, '2020-01-04 08:33:23', '2020-01-04 08:33:23'),
(7, '2', 2, 7, '2020-01-04 08:33:23', '2020-01-04 08:33:23'),
(8, '2', 2, 8, '2020-01-04 08:33:23', '2020-01-04 08:33:23'),
(9, '2', 2, 9, '2020-01-04 08:33:23', '2020-01-04 08:33:23'),
(10, '2', 2, 10, '2020-01-04 08:33:23', '2020-01-04 08:33:23'),
(11, '3', 3, 11, '2020-01-04 08:34:59', '2020-01-04 08:34:59'),
(12, '3', 3, 12, '2020-01-04 08:34:59', '2020-01-04 08:34:59'),
(13, '3', 3, 13, '2020-01-04 08:34:59', '2020-01-04 08:34:59'),
(14, '3', 3, 14, '2020-01-04 08:34:59', '2020-01-04 08:34:59'),
(15, '3', 3, 15, '2020-01-04 08:34:59', '2020-01-04 08:34:59'),
(16, '4', 4, 16, '2020-01-04 08:37:09', '2020-01-04 08:37:09'),
(17, '4', 4, 17, '2020-01-04 08:37:09', '2020-01-04 08:37:09'),
(18, '4', 4, 18, '2020-01-04 08:37:09', '2020-01-04 08:37:09'),
(19, '4', 4, 19, '2020-01-04 08:37:09', '2020-01-04 08:37:09'),
(20, '4', 4, 20, '2020-01-04 08:37:09', '2020-01-04 08:37:09');

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
(5, 1, 'Panjang', '30 cm', '2020-01-04 08:20:09', '2020-01-04 08:20:09'),
(6, 1, 'Lebar', '20 cm', '2020-01-04 08:20:09', '2020-01-04 08:20:09'),
(7, 2, 'Volume', '1 Liter', '2020-01-04 08:23:33', '2020-01-04 08:23:33'),
(8, 2, 'Tinggi', '30 cm', '2020-01-04 08:23:33', '2020-01-04 08:23:33'),
(9, 2, 'Lebar', '25 cm', '2020-01-04 08:23:33', '2020-01-04 08:23:33'),
(10, 3, 'Burner', 'Double', '2020-01-04 08:25:37', '2020-01-04 08:25:37'),
(11, 3, 'Body', 'Stainless Steel', '2020-01-04 08:25:37', '2020-01-04 08:25:37'),
(12, 3, 'Gas Pressure', '280 mmH2O', '2020-01-04 08:25:37', '2020-01-04 08:25:37'),
(13, 4, 'Meterial', 'Silver Champagne Gold', '2020-01-04 08:28:19', '2020-01-04 08:28:19'),
(14, 4, 'Volume', '170 L', '2020-01-04 08:28:19', '2020-01-04 08:28:19');

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
(4, 'Perabot Rumah Tangga', 1, '2019-09-28 04:29:55', '2020-01-04 08:06:03'),
(5, 'Kipas Angin', 1, '2019-09-28 04:30:09', '2020-01-04 08:05:29'),
(6, 'Bahan Bangunan', 1, '2019-09-30 18:46:37', '2020-01-04 08:05:14');

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
(1, 'PS2020010400001', '58f9c3a8183d634ebf5438b1f9121e31.jpg', '2020-01-04 08:52:13', '2020-01-04 08:52:13'),
(2, 'PS2020010400002', '6c7f1892aea8b36b0bb2e8fa30ba0a87.jpg', '2020-01-04 08:56:19', '2020-01-04 08:56:19'),
(3, 'PS2020010400003', '61084264e832aea5ee84ff39cc57a346.png', '2020-01-04 08:59:30', '2020-01-04 08:59:30');

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
('PS2020010400001', 5, 'BK2020010400007', 'Jalan Gita Sura No.1, Peguyangan Kaja', 'rumah no 1', '2020-01-04 08:51:56', '2020-01-04 08:51:56'),
('PS2020010400002', 5, 'BK2020010400008', 'Jalan Gita Sura No.1, Peguyangan Kaja', 'rumah no 1', '2020-02-04 08:55:37', '2020-01-04 08:55:37'),
('PS2020010400003', 5, 'BK2020010400009', 'Jalan Wisnu Marga Belayu No 19', 'rumah no 19', '2020-03-04 08:59:17', '2020-01-04 08:59:17');

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
(1, 'PS2020010400001', 3, 200000, 1, '2020-01-04 08:51:56', '2020-01-04 08:51:56'),
(2, 'PS2020010400001', 2, 350000, 1, '2020-01-04 08:51:56', '2020-01-04 08:51:56'),
(3, 'PS2020010400002', 1, 120000, 1, '2020-01-04 08:55:37', '2020-01-04 08:55:37'),
(4, 'PS2020010400002', 4, 1874000, 1, '2020-01-04 08:55:37', '2020-01-04 08:55:37'),
(5, 'PS2020010400003', 4, 1874000, 1, '2020-01-04 08:59:17', '2020-01-04 08:59:17');

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
(1, 1, 'A3SQJ8YYWE', '2020-01-02', 'Rak Barang Masuk', 1, '2020-01-04 08:31:23', '2020-01-04 08:31:23'),
(2, 1, '4ERKOFIRZZ', '2020-01-02', 'Rak Barang Masuk', 2, '2020-01-04 08:31:23', '2020-01-04 08:42:06'),
(3, 1, '2JDHKVGHDO', '2020-01-02', 'Rak Barang Masuk', 1, '2020-01-04 08:31:23', '2020-01-04 08:31:23'),
(4, 1, 'HDKDJP2P3D', '2020-01-02', 'Rak Barang Masuk', 2, '2020-01-04 08:31:23', '2020-01-04 08:49:31'),
(5, 1, 'G2DVNS39QN', '2020-01-02', 'Rak Barang Masuk', 2, '2020-01-04 08:31:23', '2020-01-04 08:57:26'),
(6, 2, '4RGDAZINCU', '2020-01-03', 'Rak Barang Masuk', 1, '2020-01-04 08:33:23', '2020-01-04 08:33:23'),
(7, 2, 'VFBEZD6FET', '2020-01-03', 'Rak Barang Masuk', 1, '2020-01-04 08:33:23', '2020-01-04 08:33:23'),
(8, 2, 'LI2BNURXMS', '2020-01-03', 'Rak Barang Masuk', 2, '2020-01-04 08:33:23', '2020-01-04 08:38:55'),
(9, 2, 'LF5D6NS3FQ', '2020-01-03', 'Rak Barang Masuk', 1, '2020-01-04 08:33:23', '2020-01-04 08:33:23'),
(10, 2, 'AMDOW2HWMK', '2020-01-03', 'Rak Barang Masuk', 2, '2020-01-04 08:33:23', '2020-01-04 08:54:49'),
(11, 3, '6C6S41D23M', '2020-01-04', 'Rak Barang Masuk', 2, '2020-01-04 08:34:59', '2020-01-04 08:49:11'),
(12, 3, 'CM5LKXZY9N', '2020-01-04', 'Rak Barang Masuk', 1, '2020-01-04 08:34:59', '2020-01-04 08:34:59'),
(13, 3, '0ANHBVI901', '2020-01-04', 'Rak Barang Masuk', 2, '2020-01-04 08:34:59', '2020-01-04 08:48:31'),
(14, 3, 'RPVLEWVDAI', '2020-01-04', 'Rak Barang Masuk', 2, '2020-01-04 08:34:59', '2020-01-04 08:54:49'),
(15, 3, '6J7Q9FRD9E', '2020-01-04', 'Rak Barang Masuk', 2, '2020-01-04 08:34:59', '2020-01-04 08:38:55'),
(16, 4, 'Z7AY4QHMR3', '2020-01-04', 'Rak Barang Masuk', 1, '2020-01-04 08:37:09', '2020-01-04 08:37:09'),
(17, 4, 'RZBIMMIIGR', '2020-01-04', 'Rak Barang Masuk', 2, '2020-01-04 08:37:09', '2020-01-04 09:00:11'),
(18, 4, 'K0G944WO0V', '2020-01-04', 'Rak Barang Masuk', 2, '2020-01-04 08:37:09', '2020-01-04 08:57:26'),
(19, 4, 'TMLAOKUQPS', '2020-01-04', 'Rak Barang Masuk', 2, '2020-01-04 08:37:09', '2020-01-04 08:38:06'),
(20, 4, 'SVYED58OSX', '2020-01-04', 'Rak Barang Masuk', 2, '2020-01-04 08:37:09', '2020-01-04 08:38:06');

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
(1, 'COSMOS', '0822350', 'asus@mail.com', 1, '2019-09-28 04:22:19', '2020-01-04 08:07:30'),
(2, 'YONGMA', '0822653265', 'yongma@mail.com', 1, '2019-09-28 05:14:18', '2020-01-04 08:07:20'),
(3, 'PIPA BOSS', '0361896452', 'boss@mail.com', 1, '2019-09-30 18:47:01', '2020-01-04 08:07:05'),
(4, 'PIPA CLIPSAL', '0361879654', 'clipsal@mail.com', 1, '2020-01-04 08:06:37', '2020-01-04 08:06:37'),
(5, 'MASPION', '0361789654', 'maspion@mail.com', 1, '2020-01-04 08:07:49', '2020-01-04 08:07:49'),
(6, 'PANASONIC', '0361654987', 'panasonic@mail.com', 1, '2020-01-04 08:08:17', '2020-01-04 08:08:17'),
(7, 'SOGO', '0217255644', 'sogo@mail.com', 1, '2020-01-04 08:09:48', '2020-01-04 08:09:48'),
(8, 'NAGOYA', '0315321633', 'nagoya@mail.com', 1, '2020-01-04 08:10:09', '2020-01-04 08:10:09'),
(9, 'QQ', '0217501944', 'qq@mail.com', 1, '2020-01-04 08:10:28', '2020-01-04 08:10:28'),
(10, 'SKYTRON', '0248502492', 'skytron@mail.com', 1, '2020-01-04 08:10:46', '2020-01-04 08:10:46'),
(11, 'GMC', '0217180485', 'gmc@mail.com', 1, '2020-01-04 08:11:07', '2020-01-04 08:11:07');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barang_keluar_detail`
--
ALTER TABLE `barang_keluar_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barang_masuk_detail`
--
ALTER TABLE `barang_masuk_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `detail_barang`
--
ALTER TABLE `detail_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `retur_detail`
--
ALTER TABLE `retur_detail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_barang`
--
ALTER TABLE `stock_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
