-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Mar 2022 pada 16.32
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sancu_order_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamats`
--

CREATE TABLE `alamats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `propinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_propinsi` int(11) NOT NULL,
  `kota_kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kota_kabupaten` int(11) NOT NULL,
  `kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `alamat_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` int(11) NOT NULL,
  `utama` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alamats`
--

INSERT INTO `alamats` (`id`, `id_user`, `nama_lengkap`, `telepon`, `propinsi`, `id_propinsi`, `kota_kabupaten`, `id_kota_kabupaten`, `kecamatan`, `id_kecamatan`, `alamat_lengkap`, `detail`, `kode_pos`, `utama`, `created_at`, `updated_at`) VALUES
(3, 1, 'Mal', '085611223344', 'SUMATERA UTARA', 12, 'KABUPATEN TAPANULI SELATAN', 1203, 'ANGKOLA TIMUR', 1203070, 'Jalan kelapa dua wetan III ciracas', 'Pagar coklat', 13730, 1, NULL, NULL),
(4, 1, 'Agus', '081122334455', 'RIAU', 14, 'KABUPATEN KUANTAN SINGINGI', 1401, 'SENTAJO RAYA', 1401031, 'Jalan jambi', 'pagar tinggi besar', 13730, 0, NULL, NULL),
(5, 1, 'Joko', '0811223344556', 'SUMATERA BARAT', 13, 'KABUPATEN SOLOK', 1303, 'HILIRAN GUMANTI', 1303051, 'Pulau bali', 'dekat pantai', 13470, 0, NULL, NULL),
(14, 3, 'Adam', '081290723643', 'Riau', 14, 'Kabupaten Indragiri Hulu', 1402, 'Rengat Barat', 1402050, 'Jl. Al-Iman No. 23 Rt/Rw. 005/009, Kelapa Dua Wetan\r\nCiracas', NULL, 13730, 1, NULL, NULL),
(15, 3, 'Idris', '081290723643', 'Jawa Timur', 35, 'Kabupaten Jombang', 3517, 'Ploso', 3517180, 'Jl. Al-Iman No. 23 Rt/Rw. 005/009, Kelapa Dua Wetan\r\nCiracas', 'Pagar putih bulat', 13730, 0, NULL, NULL),
(16, 3, 'Isa', '081122334455', 'Kepulauan Bangka Belitung', 19, 'Kabupaten Bangka Barat', 1903, 'Mentok', 1903030, 'Jl. Al-Iman No. 23 Rt/Rw. 005/009, Kelapa Dua Wetan\r\nCiracas', NULL, 13730, 0, NULL, NULL),
(17, 3, 'Ilyas', '081290723643', 'Gorontalo', 75, 'Kabupaten Gorontalo', 7502, 'Boliyohuto', 7502040, 'Jl. Al-Iman No. 23 Rt/Rw. 005/009, Kelapa Dua Wetan\r\nCiracas', NULL, 13730, 0, NULL, NULL),
(18, 3, 'Zakaria', '081290723643', 'Maluku Utara', 82, 'Kota Ternate', 8271, 'Moti', 8271011, 'Jl. Al-Iman No. 23 Rt/Rw. 005/009, Kelapa Dua Wetan\r\nCiracas', NULL, 13730, 0, NULL, NULL),
(19, 3, 'Nuh', '081290723643', 'Sumatera Selatan', 16, 'Kabupaten Musi Rawas', 1605, 'Tuah Negeri', 1605072, 'Jl. Al-Iman No. 23 Rt/Rw. 005/009, Kelapa Dua Wetan\r\nCiracas', NULL, 13730, 0, NULL, NULL),
(20, 4, 'Yusuf', '081122334455', 'Dki Jakarta', 31, 'Kota Jakarta Pusat', 3173, 'Senen', 3173030, 'Jl. Al-Iman No. 23 Rt/Rw. 005/009, Kelapa Dua Wetan\r\nCiracas', NULL, 13730, 1, NULL, NULL),
(21, 5, 'Firman', '0812312312312', 'Dki Jakarta', 31, 'Kota Jakarta Timur', 3172, 'Ciracas', 3172020, 'Jalan persahabatan VI no 3', 'Pagar putih bulat', 13730, 1, NULL, NULL),
(22, 6, 'Minerva', '081122334455', 'Lampung', 18, 'Kabupaten Mesuji', 1811, 'Panca Jaya', 1811030, 'Lampung aja', NULL, 22345, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `id_produk` int(11) NOT NULL,
  `id_produk_detail` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `nama_category`, `created_at`, `updated_at`) VALUES
(1, 'sancu', '2022-01-28 02:14:28', '2022-03-22 04:55:59'),
(2, 'boncu', '2022-01-28 02:14:28', '2022-01-28 02:14:28'),
(3, 'pretty', '2022-01-28 02:14:28', '2022-01-28 02:14:28'),
(4, 'xtreme', '2022-01-28 02:14:28', '2022-01-28 02:14:28'),
(5, 'pelengkap', '2022-03-22 04:40:05', '2022-03-22 04:40:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `configs`
--

CREATE TABLE `configs` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `configs`
--

INSERT INTO `configs` (`id`, `nama`, `nilai`) VALUES
(1, 'server_host', 'http://127.0.0.1:8000/'),
(2, 'client_host', 'http://127.0.0.2:8000/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `potongan` int(11) NOT NULL,
  `masa_mulai` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `masa_aktif` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tipe` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `keterangan`, `potongan`, `masa_mulai`, `masa_aktif`, `tipe`, `created_at`, `updated_at`) VALUES
(1, 'SANCU2021', 'diskon ulang tahun sancu', 500, '0000-00-00 00:00:00', '2021-11-25 03:36:34', '', NULL, NULL),
(3, 'SANCU20221', 'potongan 1000 per pasang', 1000, '0000-00-00 00:00:00', '2022-02-10 02:54:25', '', NULL, NULL),
(4, 'SANCU20222', 'potongan Rp500', 500, '0000-00-00 00:00:00', '2022-02-28 01:31:52', '', NULL, NULL),
(5, 'SANCUFEB22', 'diskon sancu februari 2022', 1000, '2022-03-04 17:00:00', '2022-03-22 17:00:00', 'nominal', '2022-03-05 06:48:55', '2022-03-05 06:48:55'),
(6, 'SANCUFEB221', 'diskon sancu februari 2022', 1000, '2022-03-04 17:00:00', '2022-03-29 17:00:00', 'nominal', '2022-03-05 06:50:11', '2022-03-05 06:50:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kartu_stoks`
--

CREATE TABLE `kartu_stoks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produk_detail` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 0,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kartu_stoks`
--

INSERT INTO `kartu_stoks` (`id`, `id_produk_detail`, `status`, `jumlah`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 357, 'out', 0, 'order agen', '2022-02-08 04:58:59', '2022-02-08 04:58:59'),
(2, 353, 'out', 0, 'order agen', '2022-02-08 04:58:59', '2022-02-08 04:58:59'),
(3, 352, 'out', 0, 'order agen', '2022-02-08 04:58:59', '2022-02-08 04:58:59'),
(4, 351, 'out', 0, 'order agen', '2022-02-08 04:58:59', '2022-02-08 04:58:59'),
(7, 357, 'in', 0, 'pembatalan order agen', '2022-02-08 05:25:41', '2022-02-08 05:25:41'),
(8, 353, 'in', 0, 'pembatalan order agen', '2022-02-08 05:25:41', '2022-02-08 05:25:41'),
(9, 352, 'in', 0, 'pembatalan order agen', '2022-02-08 05:25:41', '2022-02-08 05:25:41'),
(10, 351, 'in', 0, 'pembatalan order agen', '2022-02-08 05:25:41', '2022-02-08 05:25:41'),
(11, 3, 'out', 0, 'order agen', '2022-02-08 18:34:09', '2022-02-08 18:34:09'),
(12, 2, 'out', 0, 'order agen', '2022-02-08 18:34:09', '2022-02-08 18:34:09'),
(13, 39, 'out', 0, 'order agen', '2022-02-08 18:34:09', '2022-02-08 18:34:09'),
(14, 38, 'out', 0, 'order agen', '2022-02-08 18:34:09', '2022-02-08 18:34:09'),
(15, 55, 'out', 0, 'order agen', '2022-02-08 18:34:09', '2022-02-08 18:34:09'),
(16, 54, 'out', 0, 'order agen', '2022-02-08 18:34:09', '2022-02-08 18:34:09'),
(17, 102, 'out', 0, 'order agen', '2022-02-19 03:18:56', '2022-02-19 03:18:56'),
(18, 101, 'out', 0, 'order agen', '2022-02-19 03:18:56', '2022-02-19 03:18:56'),
(19, 2, 'out', 0, 'order agen', '2022-02-24 05:53:56', '2022-02-24 05:53:56'),
(20, 2, 'in', 0, 'pembatalan order agen', '2022-02-24 05:54:52', '2022-02-24 05:54:52'),
(21, 301, 'out', 0, 'order agen', '2022-03-03 06:59:55', '2022-03-03 06:59:55'),
(22, 301, 'in', 0, 'pembatalan order agen', '2022-03-03 07:00:28', '2022-03-03 07:00:28'),
(23, 301, 'out', 0, 'order agen', '2022-03-03 07:24:02', '2022-03-03 07:24:02'),
(24, 196632, 'out', 0, 'order agen', '2022-03-05 03:54:10', '2022-03-05 03:54:10'),
(25, 196630, 'out', 0, 'order agen', '2022-03-05 03:54:10', '2022-03-05 03:54:10'),
(26, 196632, 'in', 0, 'pembatalan order agen', '2022-03-05 03:54:29', '2022-03-05 03:54:29'),
(27, 196630, 'in', 0, 'pembatalan order agen', '2022-03-05 03:54:29', '2022-03-05 03:54:29'),
(28, 102, 'out', 0, 'order agen', '2022-03-05 06:50:51', '2022-03-05 06:50:51'),
(29, 3, 'out', 0, 'order agen', '2022-03-08 04:30:28', '2022-03-08 04:30:28'),
(30, 2, 'out', 0, 'order agen', '2022-03-08 04:30:28', '2022-03-08 04:30:28'),
(31, 2, 'out', 0, 'order agen', '2022-03-08 04:33:47', '2022-03-08 04:33:47'),
(32, 40, 'out', 0, 'order agen', '2022-03-12 02:08:20', '2022-03-12 02:08:20'),
(33, 34, 'out', 0, 'order agen', '2022-03-12 02:08:20', '2022-03-12 02:08:20'),
(34, 32, 'out', 0, 'order agen', '2022-03-12 02:08:20', '2022-03-12 02:08:20'),
(35, 107, 'out', 0, 'order agen', '2022-03-12 02:08:20', '2022-03-12 02:08:20'),
(36, 104, 'out', 0, 'order agen', '2022-03-12 02:08:20', '2022-03-12 02:08:20'),
(37, 102, 'out', 0, 'order agen', '2022-03-12 02:08:20', '2022-03-12 02:08:20'),
(38, 83, 'out', 0, 'order agen', '2022-03-12 02:38:09', '2022-03-12 02:38:09'),
(39, 28, 'out', 0, 'order agen', '2022-03-12 04:17:18', '2022-03-12 04:17:18'),
(40, 43, 'out', 0, 'order agen', '2022-03-12 04:17:18', '2022-03-12 04:17:18'),
(41, 196630, 'out', 0, 'order agen', '2022-03-12 04:17:18', '2022-03-12 04:17:18'),
(42, 148440, 'out', 0, 'order agen', '2022-03-13 04:17:05', '2022-03-13 04:17:05'),
(43, 776928, 'out', 0, 'order agen', '2022-03-13 04:17:05', '2022-03-13 04:17:05'),
(44, 776924, 'out', 0, 'order agen', '2022-03-13 04:17:05', '2022-03-13 04:17:05'),
(45, 776921, 'out', 0, 'order agen', '2022-03-13 04:17:05', '2022-03-13 04:17:05'),
(46, 174, 'out', 0, 'order agen', '2022-03-13 04:46:51', '2022-03-13 04:46:51'),
(47, 173, 'out', 0, 'order agen', '2022-03-13 04:46:51', '2022-03-13 04:46:51'),
(48, 171, 'out', 0, 'order agen', '2022-03-13 04:46:51', '2022-03-13 04:46:51'),
(49, 148442, 'out', 0, 'order agen', '2022-03-13 04:46:51', '2022-03-13 04:46:51'),
(50, 148441, 'out', 0, 'order agen', '2022-03-13 04:46:51', '2022-03-13 04:46:51'),
(51, 196632, 'out', 0, 'order agen', '2022-03-13 04:46:51', '2022-03-13 04:46:51'),
(52, 196630, 'out', 0, 'order agen', '2022-03-13 04:46:52', '2022-03-13 04:46:52'),
(53, 776924, 'out', 0, 'order agen', '2022-03-13 04:46:52', '2022-03-13 04:46:52'),
(54, 776921, 'out', 0, 'order agen', '2022-03-13 04:46:52', '2022-03-13 04:46:52'),
(55, 11, 'out', 0, 'order agen', '2022-03-13 20:05:38', '2022-03-13 20:05:38'),
(56, 148441, 'out', 0, 'order agen', '2022-03-13 20:05:38', '2022-03-13 20:05:38'),
(57, 61533536, 'out', 0, 'order agen', '2022-03-13 20:05:38', '2022-03-13 20:05:38'),
(58, 776921, 'out', 0, 'order agen', '2022-03-13 20:05:38', '2022-03-13 20:05:38'),
(59, 182, 'out', 0, 'order agen', '2022-03-19 02:09:01', '2022-03-19 02:09:01'),
(60, 181, 'out', 0, 'order agen', '2022-03-19 02:09:01', '2022-03-19 02:09:01'),
(61, 182, 'in', 0, 'pembatalan order agen', '2022-03-19 05:26:36', '2022-03-19 05:26:36'),
(62, 182, 'in', 0, 'pembatalan order agen', '2022-03-19 05:27:34', '2022-03-19 05:27:34'),
(63, 182, 'in', 0, 'pembatalan order agen', '2022-03-19 05:28:53', '2022-03-19 05:28:53'),
(64, 181, 'in', 0, 'pembatalan order agen', '2022-03-19 05:28:53', '2022-03-19 05:28:53'),
(65, 86, 'out', 0, 'order agen', '2022-03-24 01:56:13', '2022-03-24 01:56:13'),
(66, 85, 'out', 0, 'order agen', '2022-03-24 01:56:13', '2022-03-24 01:56:13'),
(67, 84, 'out', 0, 'order agen', '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(68, 113, 'out', 0, 'order agen', '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(69, 112, 'out', 0, 'order agen', '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(70, 111, 'out', 0, 'order agen', '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(71, 148443, 'out', 0, 'order agen', '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(72, 148442, 'out', 0, 'order agen', '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(73, 148441, 'out', 0, 'order agen', '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(74, 61533940, 'out', 0, 'order agen', '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(75, 61533738, 'out', 0, 'order agen', '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(76, 61533536, 'out', 0, 'order agen', '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(77, 776928, 'out', 0, 'order agen', '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(78, 776924, 'out', 0, 'order agen', '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(79, 776921, 'out', 0, 'order agen', '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(80, 13, 'out', 10, 'order agen nomor #50', '2022-03-26 05:12:33', '2022-03-26 05:12:33'),
(81, 12, 'out', 10, 'order agen nomor #50', '2022-03-26 05:12:33', '2022-03-26 05:12:33'),
(82, 11, 'out', 10, 'order agen nomor #50', '2022-03-26 05:12:33', '2022-03-26 05:12:33'),
(83, 13, 'in', 10, 'pembatalan order agen no #50', '2022-03-26 05:14:46', '2022-03-26 05:14:46'),
(84, 12, 'in', 10, 'pembatalan order agen no #50', '2022-03-26 05:14:46', '2022-03-26 05:14:46'),
(85, 11, 'in', 10, 'pembatalan order agen no #50', '2022-03-26 05:14:46', '2022-03-26 05:14:46'),
(86, 86, 'in', 6, 'pembatalan order agen no #49', '2022-03-26 05:18:37', '2022-03-26 05:18:37'),
(87, 85, 'in', 5, 'pembatalan order agen no #49', '2022-03-26 05:18:37', '2022-03-26 05:18:37'),
(88, 84, 'in', 4, 'pembatalan order agen no #49', '2022-03-26 05:18:37', '2022-03-26 05:18:37'),
(89, 113, 'in', 3, 'pembatalan order agen no #49', '2022-03-26 05:18:37', '2022-03-26 05:18:37'),
(90, 112, 'in', 2, 'pembatalan order agen no #49', '2022-03-26 05:18:37', '2022-03-26 05:18:37'),
(91, 111, 'in', 1, 'pembatalan order agen no #49', '2022-03-26 05:18:37', '2022-03-26 05:18:37'),
(92, 148443, 'in', 6, 'pembatalan order agen no #49', '2022-03-26 05:18:37', '2022-03-26 05:18:37'),
(93, 148442, 'in', 6, 'pembatalan order agen no #49', '2022-03-26 05:18:37', '2022-03-26 05:18:37'),
(94, 148441, 'in', 6, 'pembatalan order agen no #49', '2022-03-26 05:18:37', '2022-03-26 05:18:37'),
(95, 61533940, 'in', 6, 'pembatalan order agen no #49', '2022-03-26 05:18:37', '2022-03-26 05:18:37'),
(96, 61533738, 'in', 6, 'pembatalan order agen no #49', '2022-03-26 05:18:37', '2022-03-26 05:18:37'),
(97, 61533536, 'in', 6, 'pembatalan order agen no #49', '2022-03-26 05:18:37', '2022-03-26 05:18:37'),
(98, 776928, 'in', 5, 'pembatalan order agen no #49', '2022-03-26 05:18:37', '2022-03-26 05:18:37'),
(99, 776924, 'in', 5, 'pembatalan order agen no #49', '2022-03-26 05:18:37', '2022-03-26 05:18:37'),
(100, 776921, 'in', 5, 'pembatalan order agen no #49', '2022-03-26 05:18:37', '2022-03-26 05:18:37'),
(101, 1, 'in', 40, 'Stok masuk', '2022-03-26 05:24:51', '2022-03-26 05:24:51'),
(102, 2, 'in', 40, 'Stok masuk', '2022-03-26 05:24:51', '2022-03-26 05:24:51'),
(103, 3, 'in', 40, 'Stok masuk', '2022-03-26 05:24:51', '2022-03-26 05:24:51'),
(104, 4, 'in', 10, 'Stok masuk', '2022-03-26 05:24:51', '2022-03-26 05:24:51'),
(105, 5, 'in', 0, 'Stok masuk', '2022-03-26 05:24:51', '2022-03-26 05:24:51'),
(106, 6, 'in', 0, 'Stok masuk', '2022-03-26 05:24:51', '2022-03-26 05:24:51'),
(107, 7, 'in', 0, 'Stok masuk', '2022-03-26 05:24:51', '2022-03-26 05:24:51'),
(108, 8, 'in', 0, 'Stok masuk', '2022-03-26 05:24:51', '2022-03-26 05:24:51'),
(109, 9, 'in', 0, 'Stok masuk', '2022-03-26 05:24:51', '2022-03-26 05:24:51'),
(110, 10, 'in', 0, 'Stok masuk', '2022-03-26 05:24:51', '2022-03-26 05:24:51'),
(111, 1, 'in', 1, 'Stok masuk', '2022-03-26 05:36:07', '2022-03-26 05:36:07'),
(112, 2, 'in', 2, 'Stok masuk', '2022-03-26 05:36:07', '2022-03-26 05:36:07'),
(113, 3, 'in', 3, 'Stok masuk', '2022-03-26 05:36:07', '2022-03-26 05:36:07'),
(114, 4, 'in', 4, 'Stok masuk', '2022-03-26 05:36:07', '2022-03-26 05:36:07'),
(115, 5, 'in', 0, 'Stok masuk', '2022-03-26 05:36:07', '2022-03-26 05:36:07'),
(116, 6, 'in', 0, 'Stok masuk', '2022-03-26 05:36:07', '2022-03-26 05:36:07'),
(117, 7, 'in', 0, 'Stok masuk', '2022-03-26 05:36:07', '2022-03-26 05:36:07'),
(118, 8, 'in', 0, 'Stok masuk', '2022-03-26 05:36:07', '2022-03-26 05:36:07'),
(119, 9, 'in', 0, 'Stok masuk', '2022-03-26 05:36:07', '2022-03-26 05:36:07'),
(120, 10, 'in', 0, 'Stok masuk', '2022-03-26 05:36:07', '2022-03-26 05:36:07'),
(121, 1, 'in', 5, 'Stok masuk', '2022-03-26 05:37:53', '2022-03-26 05:37:53'),
(122, 2, 'in', 5, 'Stok masuk', '2022-03-26 05:37:53', '2022-03-26 05:37:53'),
(123, 3, 'in', 5, 'Stok masuk', '2022-03-26 05:37:53', '2022-03-26 05:37:53'),
(124, 4, 'in', 5, 'Stok masuk', '2022-03-26 05:37:53', '2022-03-26 05:37:53'),
(125, 7, 'in', 5, 'Stok masuk', '2022-03-26 05:38:08', '2022-03-26 05:38:08'),
(126, 8, 'in', 5, 'Stok masuk', '2022-03-26 05:38:08', '2022-03-26 05:38:08'),
(127, 10, 'in', 10, 'Stok masuk', '2022-03-26 05:38:08', '2022-03-26 05:38:08'),
(128, 1, 'out', 6, 'Stok Hilang/Rusak', '2022-03-26 06:05:36', '2022-03-26 06:05:36'),
(129, 2, 'out', 7, 'Stok Hilang/Rusak', '2022-03-26 06:05:36', '2022-03-26 06:05:36'),
(130, 3, 'out', 8, 'Stok Hilang/Rusak', '2022-03-26 06:05:36', '2022-03-26 06:05:36'),
(131, 1, 'out', 10, 'order agen nomor #51', '2022-03-27 07:26:23', '2022-03-27 07:26:23'),
(132, 148441, 'out', 10, 'order agen nomor #51', '2022-03-27 07:26:23', '2022-03-27 07:26:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_items`
--

CREATE TABLE `log_items` (
  `id` int(11) NOT NULL,
  `id_produk_detail` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_items`
--

INSERT INTO `log_items` (`id`, `id_produk_detail`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 'perubahan harga dari 16000 menjadi -> 15000', '2022-03-27 07:04:19', '2022-03-27 07:04:19'),
(2, 11, 'perubahan harga dari 16000 menjadi -> 14000', '2022-03-27 07:05:00', '2022-03-27 07:05:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(5, '2021_09_08_024504_create_produks_table', 1),
(6, '2021_09_14_084054_create_stoks_table', 2),
(7, '2021_09_14_085034_create_categories_table', 3),
(8, '2021_10_21_043819_create_produk_details_table', 4),
(9, '2021_10_22_072712_create_carts_table', 5),
(11, '2021_11_24_025900_create_coupons_table', 6),
(12, '2021_11_25_033556_create_slide_banners_table', 7),
(13, '2021_11_29_023043_create_alamats_table', 8),
(14, '2021_11_30_042433_create_orders_table', 9),
(15, '2021_12_01_024407_create_order_details_table', 10),
(16, '2022_02_08_111541_create_kartu_stoks_table', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ongkir` int(11) NOT NULL DEFAULT 0,
  `ekspedisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `potongan_harga_langsung` int(11) NOT NULL DEFAULT 0,
  `keterangan_potongan_harga_langsung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_bayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `id_alamat`, `coupon`, `status`, `ongkir`, `ekspedisi`, `potongan_harga_langsung`, `keterangan_potongan_harga_langsung`, `bukti_bayar`, `resi`, `created_at`, `updated_at`) VALUES
(29, 1, '3', NULL, '5', 300000, NULL, 0, '', 'bukti_bayar/SN2uq5nsAIayAQ60EEZVSGOYPmIoFVZ0N01pBjnA.png', 'resi/dlGlKLiQZojozvhlBY6AZZqnqet2dozsdISPL8VX.jpg', '2022-01-28 01:06:51', '2022-02-06 05:29:02'),
(30, 1, '3', NULL, '0', 0, NULL, 0, '', NULL, NULL, '2022-02-01 19:44:20', '2022-02-01 19:44:20'),
(31, 1, '3', 'SANCU20221', '5', 70000, NULL, 0, '', 'bukti_bayar/bCBA33VL02CcLOygo72MyIY2DOFB40rbYXIbZJIO.png', 'resi/JxvEHvXFPlAHa1V8Op9Kytq12lbP6XBOzThYgiCQ.jpg', '2022-02-01 19:57:19', '2022-02-06 04:16:28'),
(32, 1, '3', NULL, '0', 0, NULL, 0, '', NULL, NULL, '2022-02-08 04:58:59', '2022-02-08 05:25:41'),
(33, 1, '3', 'SANCU20222', '5', 120000, NULL, 0, '', 'bukti_bayar/QH5gnBEACGx7KY27OrauIlWIH2W4v603WnxONGKr.jpg', 'resi/3i33MIGFGJUVSdzRlMcWFRG1XFzEIVj7d4ZtKZ4j.jpg', '2022-02-08 18:34:09', '2022-02-08 18:46:31'),
(34, 1, '3', NULL, '3', 200000, NULL, 0, '', 'bukti_bayar/Jp8H8X2mGqTjCu2AX66f9BYEfHoAfjy2dK4zNavc.jpg', NULL, '2022-02-19 03:18:56', '2022-02-21 18:24:12'),
(35, 1, '3', NULL, '0', 0, NULL, 0, '', NULL, NULL, '2022-02-24 05:53:56', '2022-02-24 05:54:52'),
(36, 1, '3', NULL, '0', 0, NULL, 0, '', NULL, NULL, '2022-03-03 06:59:55', '2022-03-03 07:00:28'),
(37, 1, '3', NULL, '1', 0, NULL, 0, '', NULL, NULL, '2022-03-03 07:24:02', '2022-03-03 07:24:02'),
(38, 1, '3', NULL, '0', 0, NULL, 0, '', NULL, NULL, '2022-03-05 03:54:10', '2022-03-05 03:54:29'),
(39, 1, '3', 'SANCUFEB221', '1', 0, NULL, 0, '', NULL, NULL, '2022-03-05 06:50:51', '2022-03-05 06:50:51'),
(40, 3, '0', NULL, '1', 0, NULL, 0, '', NULL, NULL, '2022-03-08 04:30:28', '2022-03-08 04:30:28'),
(41, 3, '0', NULL, '2', 40000, NULL, 0, '', NULL, NULL, '2022-03-08 04:33:47', '2022-03-12 02:05:28'),
(42, 3, '15', NULL, '5', 40000, NULL, 0, '', 'bukti_bayar/v4oaeQ00VBaBKmViRGeWGGoxjbWfjswfCiv5j58d.jpg', 'resi/RrsknmINiVwJbTvXNsXtaSkoIigd3CE9oAlSlHdj.jpg', '2022-03-12 02:08:20', '2022-03-12 02:37:20'),
(43, 3, '16', NULL, '3', 50000, NULL, 0, '', 'bukti_bayar/bVEL0qfmNo0yVc649nPcRYmLsy8APgIzIeXeqj41.png', NULL, '2022-03-12 02:38:09', '2022-03-12 02:54:30'),
(44, 4, '20', NULL, '5', 10000, NULL, 0, '', 'bukti_bayar/LF2eY9l2wZKSLlU4aLx17w3jmbDQ1xMoNpzf1zA9.png', 'resi/JBBw2m0iLRau5yrYA9ioC7Yrvix1CJfkRG9Ive7u.jpg', '2022-03-12 04:17:18', '2022-03-12 04:28:38'),
(45, 4, '20', NULL, '4', 30000, NULL, 0, '', 'bukti_bayar/lNErM2bcdl1BwUl9oM6b1fI46TmjgIDNi9daPPmg.jpg', 'resi/igCMHoLA01Pn5all15WqY6RX1M88GR7ZweTvPB0k.jpg', '2022-03-13 04:17:05', '2022-03-13 04:41:11'),
(46, 3, '16', NULL, '3', 240000, 'Indah Cargo', 10000, 'bonus dari sancu', 'bukti_bayar/QGccnANI7Jv29WoVScBMP0f1VtS0YAn52Btt0Dw0.jpg', NULL, '2022-03-13 04:46:51', '2022-03-19 06:34:21'),
(47, 5, '21', NULL, '5', 250000, NULL, 0, '', 'bukti_bayar/sBmzwmxEpNRm0CqInzJxAXOxKztVnakKRNGpooZl.jpg', 'resi/rypBpVhBxbux1H1z62OX2oYZlf3YSRYdNeoT4wbs.jpg', '2022-03-13 20:05:38', '2022-03-13 20:17:54'),
(48, 3, '14', NULL, '0', 0, NULL, 30000, '', NULL, NULL, '2022-03-19 02:09:01', '2022-03-19 05:28:53'),
(49, 3, '14', 'SANCUFEB221', '0', 100000, 'Indah Cargoo', 50000, 'bonus dari sancu', NULL, NULL, '2022-03-24 01:56:13', '2022-03-26 05:18:37'),
(50, 6, '22', NULL, '0', 0, NULL, 0, NULL, NULL, NULL, '2022-03-26 05:12:33', '2022-03-26 05:14:46'),
(51, 6, '22', NULL, '1', 0, NULL, 0, NULL, NULL, NULL, '2022-03-27 07:26:23', '2022-03-27 07:26:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_produk_detail` int(11) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order_details`
--

INSERT INTO `order_details` (`id`, `id_order`, `id_produk_detail`, `jumlah_produk`, `harga_produk`, `id_user`, `created_at`, `updated_at`) VALUES
(60, 29, 128, 7, 20000, 1, '2022-01-28 01:06:51', '2022-01-28 01:06:51'),
(61, 29, 127, 6, 18500, 1, '2022-01-28 01:06:51', '2022-01-28 01:06:51'),
(62, 29, 174, 5, 17000, 1, '2022-01-28 01:06:51', '2022-01-28 01:06:51'),
(63, 29, 173, 4, 17000, 1, '2022-01-28 01:06:51', '2022-01-28 01:06:51'),
(64, 29, 172, 4, 16000, 1, '2022-01-28 01:06:51', '2022-01-28 01:06:51'),
(65, 29, 204, 12, 17000, 1, '2022-01-28 01:06:51', '2022-01-28 01:06:51'),
(66, 29, 203, 10, 17000, 1, '2022-01-28 01:06:51', '2022-01-28 01:06:51'),
(67, 29, 202, 5, 16000, 1, '2022-01-28 01:06:51', '2022-01-28 01:06:51'),
(68, 29, 357, 11, 18500, 1, '2022-01-28 01:06:51', '2022-01-28 01:06:51'),
(69, 29, 356, 7, 18500, 1, '2022-01-28 01:06:51', '2022-01-28 01:06:51'),
(70, 29, 355, 3, 17000, 1, '2022-01-28 01:06:51', '2022-01-28 01:06:51'),
(71, 30, 34, 6, 17000, 1, '2022-02-01 19:44:20', '2022-02-01 19:44:20'),
(72, 30, 45, 3, 17000, 1, '2022-02-01 19:44:20', '2022-02-01 19:44:20'),
(73, 30, 42, 3, 16000, 1, '2022-02-01 19:44:20', '2022-02-01 19:44:20'),
(74, 30, 177, 3, 18500, 1, '2022-02-01 19:44:20', '2022-02-01 19:44:20'),
(75, 30, 173, 9, 17000, 1, '2022-02-01 19:44:20', '2022-02-01 19:44:20'),
(76, 31, 34, 6, 17000, 1, '2022-02-01 19:57:19', '2022-02-01 19:57:19'),
(77, 31, 45, 3, 17000, 1, '2022-02-01 19:57:19', '2022-02-01 19:57:19'),
(78, 31, 42, 3, 16000, 1, '2022-02-01 19:57:19', '2022-02-01 19:57:19'),
(79, 31, 177, 3, 18500, 1, '2022-02-01 19:57:19', '2022-02-01 19:57:19'),
(80, 31, 173, 9, 17000, 1, '2022-02-01 19:57:19', '2022-02-01 19:57:19'),
(81, 32, 357, 5, 18500, 1, '2022-02-08 04:58:59', '2022-02-08 04:58:59'),
(82, 32, 353, 5, 17000, 1, '2022-02-08 04:58:59', '2022-02-08 04:58:59'),
(83, 32, 352, 5, 16000, 1, '2022-02-08 04:58:59', '2022-02-08 04:58:59'),
(84, 32, 351, 5, 16000, 1, '2022-02-08 04:58:59', '2022-02-08 04:58:59'),
(85, 33, 3, 10, 17000, 1, '2022-02-08 18:34:09', '2022-02-08 18:34:09'),
(86, 33, 2, 5, 16000, 1, '2022-02-08 18:34:09', '2022-02-08 18:34:09'),
(87, 33, 39, 20, 20000, 1, '2022-02-08 18:34:09', '2022-02-08 18:34:09'),
(88, 33, 38, 15, 20000, 1, '2022-02-08 18:34:09', '2022-02-08 18:34:09'),
(89, 33, 55, 10, 17000, 1, '2022-02-08 18:34:09', '2022-02-08 18:34:09'),
(90, 33, 54, 10, 17000, 1, '2022-02-08 18:34:09', '2022-02-08 18:34:09'),
(91, 34, 102, 10, 16000, 1, '2022-02-19 03:18:56', '2022-02-19 03:18:56'),
(92, 34, 101, 10, 16000, 1, '2022-02-19 03:18:56', '2022-02-19 03:18:56'),
(93, 35, 2, 40, 16000, 1, '2022-02-24 05:53:56', '2022-02-24 05:53:56'),
(94, 36, 301, 40, 16000, 1, '2022-03-03 06:59:55', '2022-03-03 06:59:55'),
(95, 37, 301, 30, 16000, 1, '2022-03-03 07:24:02', '2022-03-03 07:24:02'),
(96, 38, 196632, 10, 12000, 1, '2022-03-05 03:54:10', '2022-03-05 03:54:10'),
(97, 38, 196630, 10, 10000, 1, '2022-03-05 03:54:10', '2022-03-05 03:54:10'),
(98, 39, 102, 10, 16000, 1, '2022-03-05 06:50:51', '2022-03-05 06:50:51'),
(99, 40, 3, 10, 17000, 3, '2022-03-08 04:30:28', '2022-03-08 04:30:28'),
(100, 40, 2, 10, 16000, 3, '2022-03-08 04:30:28', '2022-03-08 04:30:28'),
(101, 41, 2, 20, 16000, 3, '2022-03-08 04:33:47', '2022-03-08 04:33:47'),
(102, 42, 40, 10, 20000, 3, '2022-03-12 02:08:20', '2022-03-12 02:08:20'),
(103, 42, 34, 10, 17000, 3, '2022-03-12 02:08:20', '2022-03-12 02:08:20'),
(104, 42, 32, 10, 16000, 3, '2022-03-12 02:08:20', '2022-03-12 02:08:20'),
(105, 42, 107, 10, 18500, 3, '2022-03-12 02:08:20', '2022-03-12 02:08:20'),
(106, 42, 104, 5, 17000, 3, '2022-03-12 02:08:20', '2022-03-12 02:08:20'),
(107, 42, 102, 10, 16000, 3, '2022-03-12 02:08:20', '2022-03-12 02:08:20'),
(108, 43, 83, 40, 17000, 3, '2022-03-12 02:38:09', '2022-03-12 02:38:09'),
(109, 44, 28, 21, 20000, 4, '2022-03-12 04:17:18', '2022-03-12 04:17:18'),
(110, 44, 43, 50, 17000, 4, '2022-03-12 04:17:18', '2022-03-12 04:17:18'),
(111, 44, 196630, 6, 10000, 4, '2022-03-12 04:17:18', '2022-03-12 04:17:18'),
(112, 45, 148440, 100, 40000, 4, '2022-03-13 04:17:05', '2022-03-13 04:17:05'),
(113, 45, 776928, 21, 12000, 4, '2022-03-13 04:17:05', '2022-03-13 04:17:05'),
(114, 45, 776924, 10, 12000, 4, '2022-03-13 04:17:05', '2022-03-13 04:17:05'),
(115, 45, 776921, 50, 12000, 4, '2022-03-13 04:17:05', '2022-03-13 04:17:05'),
(116, 46, 174, 10, 17000, 3, '2022-03-13 04:46:51', '2022-03-13 04:46:51'),
(117, 46, 173, 10, 17000, 3, '2022-03-13 04:46:51', '2022-03-13 04:46:51'),
(118, 46, 171, 10, 16000, 3, '2022-03-13 04:46:51', '2022-03-13 04:46:51'),
(119, 46, 148442, 10, 40000, 3, '2022-03-13 04:46:51', '2022-03-13 04:46:51'),
(120, 46, 148441, 10, 40000, 3, '2022-03-13 04:46:51', '2022-03-13 04:46:51'),
(121, 46, 196632, 10, 12000, 3, '2022-03-13 04:46:51', '2022-03-13 04:46:51'),
(122, 46, 196630, 10, 10000, 3, '2022-03-13 04:46:52', '2022-03-13 04:46:52'),
(123, 46, 776924, 10, 12000, 3, '2022-03-13 04:46:52', '2022-03-13 04:46:52'),
(124, 46, 776921, 10, 12000, 3, '2022-03-13 04:46:52', '2022-03-13 04:46:52'),
(125, 47, 11, 5, 16000, 5, '2022-03-13 20:05:38', '2022-03-13 20:05:38'),
(126, 47, 148441, 5, 40000, 5, '2022-03-13 20:05:38', '2022-03-13 20:05:38'),
(127, 47, 61533536, 5, 21000, 5, '2022-03-13 20:05:38', '2022-03-13 20:05:38'),
(128, 47, 776921, 5, 12000, 5, '2022-03-13 20:05:38', '2022-03-13 20:05:38'),
(129, 48, 182, 5, 16000, 3, '2022-03-19 02:09:01', '2022-03-19 02:09:01'),
(130, 48, 181, 10, 16000, 3, '2022-03-19 02:09:01', '2022-03-19 02:09:01'),
(131, 49, 86, 6, 18500, 3, '2022-03-24 01:56:13', '2022-03-24 01:56:13'),
(132, 49, 85, 5, 17000, 3, '2022-03-24 01:56:13', '2022-03-24 01:56:13'),
(133, 49, 84, 4, 17000, 3, '2022-03-24 01:56:13', '2022-03-24 01:56:13'),
(134, 49, 113, 3, 17000, 3, '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(135, 49, 112, 2, 16000, 3, '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(136, 49, 111, 1, 16000, 3, '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(137, 49, 148443, 6, 50000, 3, '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(138, 49, 148442, 6, 40000, 3, '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(139, 49, 148441, 6, 40000, 3, '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(140, 49, 61533940, 6, 21000, 3, '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(141, 49, 61533738, 6, 21000, 3, '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(142, 49, 61533536, 6, 21000, 3, '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(143, 49, 776928, 5, 12000, 3, '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(144, 49, 776924, 5, 12000, 3, '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(145, 49, 776921, 5, 12000, 3, '2022-03-24 01:56:14', '2022-03-24 01:56:14'),
(146, 50, 13, 10, 17000, 6, '2022-03-26 05:12:33', '2022-03-26 05:12:33'),
(147, 50, 12, 10, 16000, 6, '2022-03-26 05:12:33', '2022-03-26 05:12:33'),
(148, 50, 11, 10, 16000, 6, '2022-03-26 05:12:33', '2022-03-26 05:12:33'),
(149, 51, 1, 10, 15000, 6, '2022-03-27 07:26:23', '2022-03-27 07:26:23'),
(150, 51, 148441, 10, 40000, 6, '2022-03-27 07:26:23', '2022-03-27 07:26:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_url_produk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_category` int(11) NOT NULL,
  `desktripsi_produk` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `nama_produk`, `gambar_url_produk`, `tag`, `id_category`, `desktripsi_produk`, `created_at`, `updated_at`) VALUES
(1, 'Sancu Dolphin', 'produk/thumbnail/dolphin-thumb.jpeg', NULL, 1, '', '2022-01-28 03:08:05', '2022-03-27 07:04:19'),
(11, 'Sancu Samurai', 'produk/thumbnail/samurai-thumb.jpeg', NULL, 1, '', '2022-01-28 06:24:02', '2022-03-27 07:05:00'),
(21, 'Sancu Kodok hijau', 'produk/thumbnail/kodok-hijau-thumb.jpeg', NULL, 1, '', '2022-01-28 06:24:02', '2022-01-28 06:24:02'),
(31, 'Sancu Finger Boy Kuning', 'produk/thumbnail/finger-boy-kuning-thumb.jpeg', NULL, 1, '', '2022-01-28 06:25:05', '2022-01-28 06:25:05'),
(41, 'Sancu Sheep', 'produk/thumbnail/sheep-thumb.jpeg', NULL, 1, '', '2022-01-28 06:25:05', '2022-01-28 06:25:05'),
(51, 'Sancu Cars Biru', 'produk/thumbnail/cars-biru-thumb.jpeg', NULL, 1, '', '2022-01-28 06:26:04', '2022-03-03 01:07:54'),
(61, 'Sancu Toycop', 'produk/thumbnail/toycop-thumb.jpeg', NULL, 1, '', '2022-01-28 06:26:04', '2022-01-28 06:26:04'),
(71, 'Sancu Pika-Pika', 'produk/thumbnail/pika-pika-thumb.jpeg', NULL, 1, '', '2022-01-28 06:27:01', '2022-01-28 06:27:01'),
(81, 'Sancu Hudson Jessica', 'produk/thumbnail/hudson-thumb.jpeg', NULL, 1, '', '2022-01-28 06:27:01', '2022-01-28 06:27:01'),
(101, 'Sancu Among Astro', 'produk/thumbnail/among-astro-thumb.jpeg', 'New Model', 1, '', '2022-01-28 06:28:22', '2022-01-28 06:28:22'),
(111, 'Sancu Robot Merah', 'produk/thumbnail/robot-merah-thumb.jpeg', NULL, 1, '', '2022-01-28 06:28:22', '2022-01-28 06:28:22'),
(121, 'Sancu George Monkey', 'produk/thumbnail/george-monkey-thumb.jpeg', NULL, 1, '', '2022-01-28 06:29:36', '2022-01-28 06:29:36'),
(131, 'Sancu Doraemon', 'produk/thumbnail/doraemon-thumb.jpeg', 'Best Seller', 1, '', '2022-01-28 06:29:36', '2022-01-28 06:29:36'),
(141, 'Sancu Cars Merah', 'produk/thumbnail/cars-biru-thumb.jpeg', NULL, 1, '', '2022-01-28 06:30:36', '2022-01-28 06:30:36'),
(151, 'Sancu Cheese Kid', 'produk/thumbnail/cheese-kid-thumb.jpeg', NULL, 1, '', '2022-01-28 06:30:36', '2022-01-28 06:30:36'),
(161, 'Sancu Boboy Boy', 'produk/thumbnail/boboy-boy-thumb.jpeg', 'Best Seller', 1, '', '2022-01-28 06:31:40', '2022-01-28 06:31:40'),
(171, 'Sancu Baby Girl Pink', 'produk/thumbnail/baby-girl-pink-thumb.jpeg', 'Best Seller', 1, '', '2022-01-28 06:31:40', '2022-01-28 06:31:40'),
(181, 'Sancu Kitty Ungu', 'produk/thumbnail/kitty-ungu-thumb.jpeg', NULL, 1, '', '2022-01-28 06:32:37', '2022-01-28 06:32:37'),
(191, 'Sancu Kitty Merah', 'produk/thumbnail/kitty-merah-thumb.jpeg', NULL, 1, '', '2022-01-28 06:32:37', '2022-01-28 06:32:37'),
(201, 'Sancu Spidi', 'produk/thumbnail/spidi-thumb.jpeg', 'Best Seller', 1, '', '2022-01-28 06:33:44', '2022-01-28 06:33:44'),
(211, 'Sancu Ninja Boy', 'produk/thumbnail/ninja-boy-thumb.jpeg', NULL, 1, '', '2022-01-28 06:33:44', '2022-01-28 06:33:44'),
(221, 'Sancu Baby Girl Ungu', 'produk/thumbnail/baby-girl-ungu-thumb.jpeg', 'Best Seller', 1, '', '2022-01-28 06:34:41', '2022-01-28 06:34:41'),
(231, 'Sancu Baby Bear', 'produk/thumbnail/baby-bear-thumb.jpeg', NULL, 1, '', '2022-01-28 06:34:41', '2022-01-28 06:34:41'),
(241, 'Sancu Little Girl Marsha', 'produk/thumbnail/little-girl-thumb.jpeg', NULL, 1, '', '2022-01-28 06:35:38', '2022-01-28 06:35:38'),
(251, 'Sancu Princess', 'produk/thumbnail/princess-thumb.jpeg', 'Best Seller', 1, '', '2022-01-28 06:35:38', '2022-01-28 06:35:38'),
(261, 'Sancu Bang Jarwo', 'produk/thumbnail/bang-jarwo-thumb.jpeg', NULL, 1, '', '2022-01-28 06:36:33', '2022-01-28 06:36:33'),
(271, 'Sancu Gatot Kaca', 'produk/thumbnail/gatot-kaca-thumb.jpeg', NULL, 1, '', '2022-01-28 06:36:33', '2022-01-28 06:36:33'),
(281, 'Sancu Thomas Train', 'produk/thumbnail/thomas-train-thumb.jpeg', NULL, 1, '', '2022-01-28 06:37:37', '2022-01-28 06:37:37'),
(291, 'Sancu Dino', 'produk/thumbnail/dino-thumb.jpeg', 'New Product', 1, '', '2022-01-28 06:37:37', '2022-01-28 06:37:37'),
(301, 'Sancu Superman', 'produk/thumbnail/superman-thumb.jpeg', NULL, 1, '', '2022-01-28 06:38:35', '2022-03-03 07:19:29'),
(311, 'Sancu Batman', 'produk/thumbnail/batman-thumb.jpeg', NULL, 1, '', '2022-01-28 06:38:35', '2022-01-28 06:38:35'),
(321, 'Sancu Little Pony Ungu', 'produk/thumbnail/little-pony-ungu-thumb.jpeg', NULL, 1, '', '2022-01-28 06:39:35', '2022-01-28 06:39:35'),
(331, 'Sancu Sofia', 'produk/thumbnail/sofia-thumb.jpeg', NULL, 1, '', '2022-01-28 06:39:35', '2022-01-28 06:39:35'),
(341, 'Sancu Udin Idin', 'produk/thumbnail/udin-idin-thumb.jpeg', 'Best Seller', 1, '', '2022-01-28 06:40:49', '2022-01-28 06:40:49'),
(351, 'Sancu Little Bus Tayo', 'produk/thumbnail/little-bus-thumb.jpeg', NULL, 1, '', '2022-01-28 06:40:49', '2022-01-28 06:40:49'),
(1484, 'Xtreme Gunung Water', 'produk/thumbnail/aoksdpaowjdpoajwfoj.jpg', NULL, 4, NULL, '2022-03-12 04:28:27', '2022-03-12 04:28:27'),
(1966, 'Pretty Polos Merah', 'produk/thumbnail/9hnZ5fLDHMc3VE8EfncrBnFMaAEyphQX3u9FLe8o.jpg', NULL, 3, NULL, '2022-03-03 06:52:51', '2022-03-03 06:52:51'),
(6153, 'Pretty Korea', 'produk/thumbnail/KAZOcDPVLXxwCf7GoMtCtmdd1tS69rKna0UZlbDs.jpg', NULL, 3, NULL, '2022-03-13 19:58:40', '2022-03-13 19:58:40'),
(7769, 'Boncu Spider TPR', 'produk/thumbnail/zvQYfpaUNgtHtpJrEVNdlbb86T2NHdFS4FeFriNP.jpg', NULL, 2, NULL, '2022-03-13 03:57:07', '2022-03-13 04:14:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_details`
--

CREATE TABLE `produk_details` (
  `id` int(20) UNSIGNED NOT NULL,
  `id_produk` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk_details`
--

INSERT INTO `produk_details` (`id`, `id_produk`, `size`, `jumlah_stok`, `harga_produk`, `berat`, `created_at`, `updated_at`) VALUES
(1, 1, 21, 30, 15000, 300, '0000-00-00 00:00:00', '2022-03-27 07:04:19'),
(2, 1, 24, 40, 16000, 300, '0000-00-00 00:00:00', '2022-03-27 07:04:19'),
(3, 1, 28, 40, 17000, 300, '0000-00-00 00:00:00', '2022-03-27 07:04:19'),
(4, 1, 30, 19, 17000, 300, '0000-00-00 00:00:00', '2022-03-27 07:04:19'),
(5, 1, 32, 0, 17000, 300, '0000-00-00 00:00:00', '2022-03-27 07:04:19'),
(6, 1, 34, 0, 18500, 300, '0000-00-00 00:00:00', '2022-03-27 07:04:19'),
(7, 1, 36, 5, 18500, 300, '0000-00-00 00:00:00', '2022-03-27 07:04:19'),
(8, 1, 38, 5, 24000, 300, '0000-00-00 00:00:00', '2022-03-27 07:04:19'),
(9, 1, 40, 0, 20000, 300, '0000-00-00 00:00:00', '2022-03-27 07:04:19'),
(10, 1, 42, 10, 22000, 300, '0000-00-00 00:00:00', '2022-03-27 07:04:19'),
(11, 11, 21, 50, 14000, 300, '0000-00-00 00:00:00', '2022-03-27 07:05:00'),
(12, 11, 24, 55, 16000, 300, '0000-00-00 00:00:00', '2022-03-27 07:05:00'),
(13, 11, 28, 55, 17000, 300, '0000-00-00 00:00:00', '2022-03-27 07:05:00'),
(14, 11, 30, 50, 17000, 300, '0000-00-00 00:00:00', '2022-03-27 07:05:00'),
(15, 11, 32, 50, 17000, 300, '0000-00-00 00:00:00', '2022-03-27 07:05:00'),
(16, 11, 34, 50, 18500, 300, '0000-00-00 00:00:00', '2022-03-27 07:05:00'),
(17, 11, 36, 50, 18500, 300, '0000-00-00 00:00:00', '2022-03-27 07:05:00'),
(18, 11, 38, 50, 20000, 300, '0000-00-00 00:00:00', '2022-03-27 07:05:00'),
(19, 11, 40, 50, 20000, 300, '0000-00-00 00:00:00', '2022-03-27 07:05:00'),
(20, 11, 42, 50, 20000, 300, '0000-00-00 00:00:00', '2022-03-27 07:05:00'),
(21, 21, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 21, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 21, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 21, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 21, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 21, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 21, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 21, 38, 29, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 21, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 21, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, 31, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(32, 31, 24, 40, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 31, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 31, 30, 28, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 31, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, 31, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, 31, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, 31, 38, 35, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, 31, 40, 30, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, 31, 42, 40, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 41, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(42, 41, 24, 44, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 41, 28, 0, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 41, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 41, 32, 44, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 41, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 41, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 41, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(49, 41, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(50, 41, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(51, 51, 21, 50, 16000, 300, '0000-00-00 00:00:00', '2022-03-03 01:07:54'),
(52, 51, 24, 50, 16000, 300, '0000-00-00 00:00:00', '2022-03-03 01:07:54'),
(53, 51, 28, 50, 17000, 300, '0000-00-00 00:00:00', '2022-03-03 01:07:54'),
(54, 51, 30, 60, 17000, 300, '0000-00-00 00:00:00', '2022-03-03 01:07:54'),
(55, 51, 32, 40, 17000, 300, '0000-00-00 00:00:00', '2022-03-03 01:07:54'),
(56, 51, 34, 50, 18500, 300, '0000-00-00 00:00:00', '2022-03-03 01:07:54'),
(57, 51, 36, 50, 18500, 300, '0000-00-00 00:00:00', '2022-03-03 01:07:54'),
(58, 51, 38, 50, 20000, 300, '0000-00-00 00:00:00', '2022-03-03 01:07:54'),
(59, 51, 40, 50, 20000, 300, '0000-00-00 00:00:00', '2022-03-03 01:07:54'),
(60, 51, 42, 50, 30000, 300, '0000-00-00 00:00:00', '2022-03-03 01:07:54'),
(61, 61, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(62, 61, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(63, 61, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(64, 61, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 61, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 61, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 61, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 61, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 61, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 61, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 71, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 71, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 71, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 71, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 71, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 71, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 71, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 71, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 71, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 71, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 81, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 81, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 81, 28, 10, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 81, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 81, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 81, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 81, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 81, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(89, 81, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 81, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 101, 21, 40, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 101, 24, 20, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 101, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 101, 30, 45, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 101, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 101, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 101, 36, 40, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 101, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 101, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 101, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 111, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 111, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 111, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 111, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 111, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 111, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 111, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 111, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 111, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 111, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 121, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 121, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 121, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 121, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 121, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 121, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 121, 36, 44, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 121, 38, 43, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 121, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 121, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 131, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 131, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 131, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 131, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 131, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 131, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 131, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 131, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 131, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 131, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 141, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 141, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 141, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 141, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 141, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 141, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 141, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 141, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 141, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 141, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 151, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 151, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 151, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 151, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 151, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 151, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 151, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(158, 151, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(159, 151, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(160, 151, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 161, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(162, 161, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(163, 161, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(164, 161, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(165, 161, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(166, 161, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(167, 161, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(168, 161, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(169, 161, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(170, 161, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(171, 171, 21, 40, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(172, 171, 24, 46, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(173, 171, 28, 18, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(174, 171, 30, 35, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(175, 171, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(176, 171, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(177, 171, 36, 44, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(178, 171, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(179, 171, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(180, 171, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(181, 181, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(182, 181, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(183, 181, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(184, 181, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(185, 181, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(186, 181, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(187, 181, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(188, 181, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(189, 181, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(190, 181, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(191, 191, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 191, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(193, 191, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(194, 191, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(195, 191, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(196, 191, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(197, 191, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(198, 191, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(199, 191, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(200, 191, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(201, 201, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(202, 201, 24, 45, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(203, 201, 28, 40, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(204, 201, 30, 38, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(205, 201, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(206, 201, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(207, 201, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(208, 201, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(209, 201, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(210, 201, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(211, 211, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(212, 211, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(213, 211, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(214, 211, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(215, 211, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(216, 211, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(217, 211, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(218, 211, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(219, 211, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(220, 211, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(221, 221, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(222, 221, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(223, 221, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(224, 221, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(225, 221, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(226, 221, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(227, 221, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(228, 221, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(229, 221, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(230, 221, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(231, 231, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(232, 231, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(233, 231, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(234, 231, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(235, 231, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(236, 231, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(237, 231, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(238, 231, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(239, 231, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(240, 231, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(241, 241, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(242, 241, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(243, 241, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(244, 241, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(245, 241, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(246, 241, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(247, 241, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(248, 241, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(249, 241, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(250, 241, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(251, 251, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(252, 251, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(253, 251, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(254, 251, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(255, 251, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(256, 251, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(257, 251, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(258, 251, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(259, 251, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(260, 251, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(261, 261, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(262, 261, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(263, 261, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(264, 261, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(265, 261, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(266, 261, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(267, 261, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(268, 261, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(269, 261, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(270, 261, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(271, 271, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(272, 271, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(273, 271, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(274, 271, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(275, 271, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(276, 271, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(277, 271, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(278, 271, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(279, 271, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(280, 271, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(281, 281, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(282, 281, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(283, 281, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(284, 281, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(285, 281, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(286, 281, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(287, 281, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(288, 281, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(289, 281, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(290, 281, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(291, 291, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(292, 291, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(293, 291, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(294, 291, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(295, 291, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(296, 291, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(297, 291, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(298, 291, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(299, 291, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(300, 291, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(301, 301, 21, 0, 16000, 300, '0000-00-00 00:00:00', '2022-03-03 07:19:29'),
(302, 301, 24, 50, 16000, 300, '0000-00-00 00:00:00', '2022-03-03 07:19:29'),
(303, 301, 28, 50, 17000, 300, '0000-00-00 00:00:00', '2022-03-03 07:19:29'),
(304, 301, 30, 50, 17000, 300, '0000-00-00 00:00:00', '2022-03-03 07:19:29'),
(305, 301, 32, 50, 17000, 300, '0000-00-00 00:00:00', '2022-03-03 07:19:29'),
(306, 301, 34, 50, 18500, 300, '0000-00-00 00:00:00', '2022-03-03 07:19:29'),
(307, 301, 36, 50, 18500, 300, '0000-00-00 00:00:00', '2022-03-03 07:19:29'),
(308, 301, 38, 50, 20000, 300, '0000-00-00 00:00:00', '2022-03-03 07:19:29'),
(309, 301, 40, 50, 20000, 300, '0000-00-00 00:00:00', '2022-03-03 07:19:29'),
(310, 301, 42, 50, 20000, 300, '0000-00-00 00:00:00', '2022-03-03 07:19:29'),
(311, 311, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(312, 311, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(313, 311, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(314, 311, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(315, 311, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(316, 311, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(317, 311, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(318, 311, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(319, 311, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(320, 311, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(321, 321, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(322, 321, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(323, 321, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(324, 321, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(325, 321, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(326, 321, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(327, 321, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(328, 321, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(329, 321, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(330, 321, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(331, 331, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(332, 331, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(333, 331, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(334, 331, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(335, 331, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(336, 331, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(337, 331, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(338, 331, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(339, 331, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(340, 331, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(341, 341, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(342, 341, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(343, 341, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(344, 341, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(345, 341, 32, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(346, 341, 34, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(347, 341, 36, 50, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(348, 341, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(349, 341, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(350, 341, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(351, 351, 21, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(352, 351, 24, 50, 16000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(353, 351, 28, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(354, 351, 30, 50, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(355, 351, 32, 47, 17000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(356, 351, 34, 43, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(357, 351, 36, 39, 18500, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(358, 351, 38, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(359, 351, 40, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(360, 351, 42, 50, 20000, 300, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148440, 1484, 40, 0, 40000, 300, '2022-03-12 04:28:27', '2022-03-12 04:28:27'),
(148441, 1484, 41, 95, 40000, 300, '2022-03-12 04:28:27', '2022-03-12 04:28:27'),
(148442, 1484, 42, 90, 40000, 300, '2022-03-12 04:28:27', '2022-03-12 04:28:27'),
(148443, 1484, 43, 90, 50000, 300, '2022-03-12 04:28:27', '2022-03-12 04:28:27'),
(196630, 1966, 30, 84, 10000, 300, '2022-03-03 06:52:51', '2022-03-03 06:52:51'),
(196632, 1966, 32, 80, 12000, 300, '2022-03-03 06:52:51', '2022-03-03 06:52:51'),
(196634, 1966, 34, 80, 14000, 300, '2022-03-03 06:52:51', '2022-03-03 06:52:51'),
(196636, 1966, 36, 0, 16000, 300, '2022-03-03 06:52:51', '2022-03-03 06:52:51'),
(776921, 7769, 21, 35, 12000, 200, '2022-03-13 03:57:07', '2022-03-13 04:14:32'),
(776924, 7769, 24, 50, 12000, 200, '2022-03-13 03:57:07', '2022-03-13 04:14:32'),
(776928, 7769, 28, 59, 12000, 200, '2022-03-13 03:57:07', '2022-03-13 04:14:32'),
(776930, 7769, 30, 0, 11000, 250, '2022-03-13 03:57:07', '2022-03-13 04:14:32'),
(61533536, 6153, 3536, 95, 21000, 100, '2022-03-13 19:58:40', '2022-03-13 19:58:40'),
(61533738, 6153, 3738, 100, 21000, 100, '2022-03-13 19:58:40', '2022-03-13 19:58:40'),
(61533940, 6153, 3940, 100, 21000, 100, '2022-03-13 19:58:40', '2022-03-13 19:58:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slide_banners`
--

CREATE TABLE `slide_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `posisi` int(11) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `slide_banners`
--

INSERT INTO `slide_banners` (`id`, `path`, `posisi`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'assets/image/banner-sancu.jpg', 1, 'top home slide', '2021-11-24 17:00:00', '2021-11-24 17:00:00'),
(2, 'assets/image/banner-sancu-2.jpg', 1, 'top home slide', '2021-11-24 17:00:00', '2021-11-24 17:00:00'),
(3, 'assets/image/banner-sancu-3.jpg', 1, 'top home banner', '2021-11-24 17:00:00', '2021-11-24 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_pesanan`
--

CREATE TABLE `status_pesanan` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_pesanan`
--

INSERT INTO `status_pesanan` (`id`, `keterangan`) VALUES
(0, 'Dibatalkan'),
(1, 'Menunggu Ongkir'),
(2, 'Telah di Proses'),
(3, 'Konfirmasi Pembayaran'),
(4, 'Dikirim'),
(5, 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stoks`
--

CREATE TABLE `stoks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produk` int(11) NOT NULL,
  `size` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `telepon`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mala', 'malcorp', 'sancuwebmaster@gmail.com', NULL, '$2y$10$A.LnrmNZVvAobf1C7ermmeIEm4ZiDKLycWM5BxklHv2BHhu0GlULy', 'admin', '62856112233440', '9d5to1BpaUj2hAaNz63mOXHuGgoI33jUi0OVG3c0K8csqSflBD', '2021-11-04 23:37:42', '2022-03-22 06:29:11'),
(3, 'Tes akun Distributor 1', 'sancu1', 'sancu1@gmail.com', NULL, '$2y$10$vIBh9lRWYG1JHMpB.eZo.ejjd7SiBErtVpdPI./QQn73fQL7LR0pG', 'db', '6281284658324', NULL, '2022-03-07 06:10:45', '2022-03-22 06:30:34'),
(4, 'Yusuf', 'sancu2', 'sancu2@gmail.com', NULL, '$2y$10$/MNvdW8igpfoTuECnw4GD.xfOyiDLjdyGPy0qTLbGroGtPP2fqYgG', 'db', '6281233445566', NULL, '2022-03-12 02:55:44', '2022-03-22 06:29:24'),
(5, 'Firman', 'mal123', 'sancu3@gmail.com', NULL, '$2y$10$TqYgsVbM7GmJe5hjf.OHSe6Icu6l3f3NXUkxPrfthc1v.vZnlYhC6', 'db', '6281290723643', NULL, '2022-03-13 19:54:27', '2022-03-22 06:29:31'),
(6, 'Tes akun Distributor 4', 'sancu4', 'sancu4@gmail.com', NULL, '$2y$10$I.sCcyUml5souhHVFZWw7u8hsHiY1DPg88OxBT7Po49dE5fuuzBzO', 'db', '6281233445566', NULL, '2022-03-24 01:51:24', '2022-03-24 01:51:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `whatsapps`
--

CREATE TABLE `whatsapps` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `whatsapps`
--

INSERT INTO `whatsapps` (`id`, `nama`, `text`, `created_at`, `updated_at`) VALUES
(0, 'dibatalkan', 'Halo {{$order->name}}, order anda dibatalkan', NULL, NULL),
(1, 'Menunggu Ongkir', 'menunggu ongkir', NULL, '2022-03-22 06:12:28'),
(2, 'Di proses', 'order sudah di proses', NULL, '2022-03-22 06:12:28'),
(3, 'Konfirmasi pembayaran', 'pembayaran sedang kami validasi', NULL, '2022-03-22 06:12:28'),
(4, 'Dikirim', 'pesanan anda sudah dikirim silakan cek resi', NULL, '2022-03-22 06:12:28'),
(5, 'selesai', 'pesanan sudah selesai', NULL, '2022-03-22 06:12:28');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamats`
--
ALTER TABLE `alamats`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_name_unique` (`name`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kartu_stoks`
--
ALTER TABLE `kartu_stoks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_items`
--
ALTER TABLE `log_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_details`
--
ALTER TABLE `order_details`
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
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk_details`
--
ALTER TABLE `produk_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `slide_banners`
--
ALTER TABLE `slide_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status_pesanan`
--
ALTER TABLE `status_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stoks`
--
ALTER TABLE `stoks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `whatsapps`
--
ALTER TABLE `whatsapps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alamats`
--
ALTER TABLE `alamats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kartu_stoks`
--
ALTER TABLE `kartu_stoks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT untuk tabel `log_items`
--
ALTER TABLE `log_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7962;

--
-- AUTO_INCREMENT untuk tabel `produk_details`
--
ALTER TABLE `produk_details`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61533941;

--
-- AUTO_INCREMENT untuk tabel `slide_banners`
--
ALTER TABLE `slide_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `stoks`
--
ALTER TABLE `stoks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
