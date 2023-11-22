-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 20 Nov 2023 pada 02.21
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saber`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `saber_akun`
--

CREATE TABLE `saber_akun` (
  `akun_id` int NOT NULL,
  `akun_nama` text COLLATE utf8mb4_general_ci,
  `akun_user` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `akun_pass` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `akun_level` int DEFAULT NULL,
  `akun_created` datetime DEFAULT NULL,
  `akun_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `saber_daftar`
--

CREATE TABLE `saber_daftar` (
  `daftar_id` int NOT NULL,
  `daftar_nama` text COLLATE utf8mb4_general_ci,
  `daftar_nik` varchar(32) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `daftar_wa` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `daftar_alamat` text COLLATE utf8mb4_general_ci,
  `daftar_kecamatan` int DEFAULT NULL,
  `daftar_lokasi` int DEFAULT NULL,
  `daftar_jadwal` int DEFAULT NULL,
  `daftar_status` int DEFAULT '0',
  `daftar_created` datetime DEFAULT NULL,
  `daftar_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `saber_daftar`
--

INSERT INTO `saber_daftar` (`daftar_id`, `daftar_nama`, `daftar_nik`, `daftar_wa`, `daftar_alamat`, `daftar_kecamatan`, `daftar_lokasi`, `daftar_jadwal`, `daftar_status`, `daftar_created`, `daftar_timestamp`) VALUES
(22, 'grgrff', '2342342342', '0987654323', 'thgh', 21, 1, 1, 1, NULL, '2023-11-17 09:07:27'),
(23, 'hiyaa', '1234567890', '0987654321', 'jalan pasar', 22, 2, 2, 1, NULL, '2023-11-18 07:35:14'),
(24, 'eren', '987676534210', '089767645312', 'benteng mariana', 21, 1, 1, 1, NULL, '2023-11-18 07:39:44'),
(25, 'mikasa', '98473231209', '075893441024', 'jalan ackerman', 21, 1, 1, 1, NULL, '2023-11-18 09:23:21'),
(26, 'ahliong', '764343423234554', '098767898761', 'tembok besar cina', 21, 1, NULL, 0, NULL, '2023-11-18 14:15:29'),
(27, 'hola', '1029348765321', '089785746321', 'benteng maria', 23, 4, 3, 1, NULL, '2023-11-20 01:47:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saber_daftar_nopol`
--

CREATE TABLE `saber_daftar_nopol` (
  `nopol_id` int NOT NULL,
  `nopol_daftar` int DEFAULT NULL,
  `nopol_tengah` varchar(4) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nopol_belakang` varchar(3) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nopol_jenis` text COLLATE utf8mb4_general_ci,
  `nopol_merk` text COLLATE utf8mb4_general_ci,
  `nopol_type` text COLLATE utf8mb4_general_ci,
  `nopol_tahun` year DEFAULT NULL,
  `nopol_cc` decimal(10,2) DEFAULT NULL,
  `nopol_plat` text COLLATE utf8mb4_general_ci,
  `nopol_bbm` text COLLATE utf8mb4_general_ci,
  `nopol_pkb_pokok` decimal(10,2) DEFAULT NULL,
  `nopol_pkb_denda` decimal(10,2) DEFAULT NULL,
  `nopol_swdkllj_pokok` decimal(10,2) DEFAULT NULL,
  `nopol_swdkllj_denda` decimal(10,2) DEFAULT NULL,
  `nopol_total_denda` decimal(10,2) DEFAULT NULL,
  `nopol_total_pokok` decimal(10,2) DEFAULT NULL,
  `nopol_grandtotal` decimal(10,2) DEFAULT NULL,
  `nopol_created` datetime DEFAULT NULL,
  `nopol_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `saber_daftar_nopol`
--

INSERT INTO `saber_daftar_nopol` (`nopol_id`, `nopol_daftar`, `nopol_tengah`, `nopol_belakang`, `nopol_jenis`, `nopol_merk`, `nopol_type`, `nopol_tahun`, `nopol_cc`, `nopol_plat`, `nopol_bbm`, `nopol_pkb_pokok`, `nopol_pkb_denda`, `nopol_swdkllj_pokok`, `nopol_swdkllj_denda`, `nopol_total_denda`, `nopol_total_pokok`, `nopol_grandtotal`, `nopol_created`, `nopol_timestamp`) VALUES
(23, 22, '8678', 'de', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-17 09:07:27'),
(24, 23, '9789', 'de', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-18 07:35:14'),
(25, 24, '8678', 'hu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-18 07:39:44'),
(26, 25, '7854', 'qw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-18 09:23:21'),
(27, 25, '0987', 'tr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-18 09:23:21'),
(28, 26, '5654', 'hu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-18 14:15:29'),
(29, 26, '1234', 'po', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-18 14:15:29'),
(30, 27, '5654', 'qw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-20 01:47:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saber_ex`
--

CREATE TABLE `saber_ex` (
  `id` int NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `nip` bigint DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `saber_ex`
--

INSERT INTO `saber_ex` (`id`, `nama`, `nip`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(37, 'Arii', 1234567890, 'ade@mail.co', '$2y$10$fMi6PgwaQ9powtbLKF/2AOTR4qWc44NySu41jKOWlbs7Ykp2af70e', '1', NULL, '2022-10-30 19:36:26', '2022-11-11 04:20:04'),
(39, 'Sakti', 987654321, 'sakti@mail.co', '$2y$10$S330QUA.ouIg/TvVvvdPiO1V1HhQ8tVmSY9uc41/yMV2cL.f8oCDW', '2', NULL, '2022-11-10 21:09:26', '2022-11-11 04:20:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saber_jadwal`
--

CREATE TABLE `saber_jadwal` (
  `jadwal_id` int NOT NULL,
  `jadwal_kecamatan` int DEFAULT NULL,
  `jadwal_lokasi` int DEFAULT NULL,
  `jadwal_status` int DEFAULT '0',
  `jadwal_mulai` date DEFAULT NULL,
  `jadwal_selesai` date DEFAULT NULL,
  `jadwal_waktu` time DEFAULT NULL,
  `jadwal_penanggungjawab` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jadwal_user` int DEFAULT NULL,
  `jadwal_created` datetime DEFAULT NULL,
  `jadwal_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `saber_jadwal`
--

INSERT INTO `saber_jadwal` (`jadwal_id`, `jadwal_kecamatan`, `jadwal_lokasi`, `jadwal_status`, `jadwal_mulai`, `jadwal_selesai`, `jadwal_waktu`, `jadwal_penanggungjawab`, `jadwal_user`, `jadwal_created`, `jadwal_timestamp`) VALUES
(1, 21, 1, 0, '2023-11-18', '2023-11-25', '08:00:00', 'sisiapa', NULL, NULL, '2023-11-18 11:16:33'),
(2, 22, 2, 0, '2023-11-20', '2023-11-25', '08:30:00', 'bukan saya', NULL, NULL, '2023-11-18 13:26:04'),
(3, 23, 4, 0, '2023-11-16', '2023-11-19', '09:00:00', 'bukan saya', NULL, NULL, '2023-11-20 01:48:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saber_kecamatan`
--

CREATE TABLE `saber_kecamatan` (
  `kecamatan_id` int NOT NULL,
  `kecamatan_nama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kecamatan_target` int DEFAULT NULL,
  `kecamatan_target_pendapatan` decimal(10,2) DEFAULT NULL,
  `kecamatan_created` datetime DEFAULT NULL,
  `kecamatan_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `saber_kecamatan`
--

INSERT INTO `saber_kecamatan` (`kecamatan_id`, `kecamatan_nama`, `kecamatan_target`, `kecamatan_target_pendapatan`, `kecamatan_created`, `kecamatan_timestamp`) VALUES
(21, 'Delta Pawan', 3, 100000.00, NULL, '2023-11-17 01:50:05'),
(22, 'Muara Pawan', 1, 2000000.00, NULL, '2023-11-18 07:33:15'),
(23, 'Jelai Hulu', 1, 100000.00, NULL, '2023-11-20 01:45:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saber_kontak`
--

CREATE TABLE `saber_kontak` (
  `kontak_id` int NOT NULL,
  `kontak_nama` text COLLATE utf8mb4_general_ci,
  `kontak_email` text COLLATE utf8mb4_general_ci,
  `kontak_judul` text COLLATE utf8mb4_general_ci,
  `kontak_pesan` text COLLATE utf8mb4_general_ci,
  `kontak_status` int DEFAULT '0',
  `kontak_created` datetime DEFAULT NULL,
  `kontak_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `saber_kontak`
--

INSERT INTO `saber_kontak` (`kontak_id`, `kontak_nama`, `kontak_email`, `kontak_judul`, `kontak_pesan`, `kontak_status`, `kontak_created`, `kontak_timestamp`) VALUES
(1, 'ari', 'ari@gmail.com', 'Dak ad judul', 'gege', 1, NULL, '2023-11-19 15:01:25'),
(2, 'hitler', 'hitler@gmail.com', 'Ingpo kan peperangan', 'pengen buat event ww3', 0, NULL, '2023-11-19 15:44:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saber_layanan`
--

CREATE TABLE `saber_layanan` (
  `layanan_id` int NOT NULL,
  `layanan_nopol` int DEFAULT NULL,
  `layanan_kecamatan` int DEFAULT NULL,
  `layanan_lokasi` int DEFAULT NULL,
  `layanan_grandtotal` int DEFAULT NULL,
  `layanan_daftar` int DEFAULT NULL,
  `layanan_jadwal` int DEFAULT NULL,
  `layanan_status` int DEFAULT '0',
  `layanan_user` int DEFAULT NULL,
  `layanan_created` datetime DEFAULT NULL,
  `layanan_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `saber_layanan`
--

INSERT INTO `saber_layanan` (`layanan_id`, `layanan_nopol`, `layanan_kecamatan`, `layanan_lokasi`, `layanan_grandtotal`, `layanan_daftar`, `layanan_jadwal`, `layanan_status`, `layanan_user`, `layanan_created`, `layanan_timestamp`) VALUES
(1, 22, 21, 1, NULL, 22, 1, 1, NULL, NULL, '2023-11-18 11:16:33'),
(2, 24, 21, 1, NULL, 24, 1, 0, NULL, NULL, '2023-11-18 11:16:33'),
(3, 25, 21, 1, NULL, 25, 1, 0, NULL, NULL, '2023-11-18 11:16:33'),
(4, 23, 22, 2, NULL, 23, 2, 1, NULL, NULL, '2023-11-18 13:26:04'),
(10, 27, 23, 4, NULL, 27, 3, 0, NULL, NULL, '2023-11-20 01:48:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saber_lokasi`
--

CREATE TABLE `saber_lokasi` (
  `lokasi_id` int NOT NULL,
  `lokasi_kecamatan` int DEFAULT NULL,
  `lokasi_nama` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lokasi_created` datetime DEFAULT NULL,
  `lokasi_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `saber_lokasi`
--

INSERT INTO `saber_lokasi` (`lokasi_id`, `lokasi_kecamatan`, `lokasi_nama`, `lokasi_created`, `lokasi_timestamp`) VALUES
(1, 21, 'Kantor Samsat', '2023-11-17 01:51:14', '2023-11-17 01:51:14'),
(2, 22, 'Kantor Desa', '2023-11-18 07:33:43', '2023-11-18 07:33:43'),
(3, 21, 'Polres', '2023-11-18 11:30:23', '2023-11-18 11:30:23'),
(4, 23, 'Kantor camat', '2023-11-20 01:46:54', '2023-11-20 01:46:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `saber_akun`
--
ALTER TABLE `saber_akun`
  ADD PRIMARY KEY (`akun_id`);

--
-- Indeks untuk tabel `saber_daftar`
--
ALTER TABLE `saber_daftar`
  ADD PRIMARY KEY (`daftar_id`);

--
-- Indeks untuk tabel `saber_daftar_nopol`
--
ALTER TABLE `saber_daftar_nopol`
  ADD PRIMARY KEY (`nopol_id`);

--
-- Indeks untuk tabel `saber_ex`
--
ALTER TABLE `saber_ex`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `saber_jadwal`
--
ALTER TABLE `saber_jadwal`
  ADD PRIMARY KEY (`jadwal_id`);

--
-- Indeks untuk tabel `saber_kecamatan`
--
ALTER TABLE `saber_kecamatan`
  ADD PRIMARY KEY (`kecamatan_id`);

--
-- Indeks untuk tabel `saber_kontak`
--
ALTER TABLE `saber_kontak`
  ADD PRIMARY KEY (`kontak_id`);

--
-- Indeks untuk tabel `saber_layanan`
--
ALTER TABLE `saber_layanan`
  ADD PRIMARY KEY (`layanan_id`);

--
-- Indeks untuk tabel `saber_lokasi`
--
ALTER TABLE `saber_lokasi`
  ADD PRIMARY KEY (`lokasi_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `saber_akun`
--
ALTER TABLE `saber_akun`
  MODIFY `akun_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `saber_daftar`
--
ALTER TABLE `saber_daftar`
  MODIFY `daftar_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `saber_daftar_nopol`
--
ALTER TABLE `saber_daftar_nopol`
  MODIFY `nopol_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `saber_ex`
--
ALTER TABLE `saber_ex`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `saber_jadwal`
--
ALTER TABLE `saber_jadwal`
  MODIFY `jadwal_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `saber_kecamatan`
--
ALTER TABLE `saber_kecamatan`
  MODIFY `kecamatan_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `saber_kontak`
--
ALTER TABLE `saber_kontak`
  MODIFY `kontak_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `saber_layanan`
--
ALTER TABLE `saber_layanan`
  MODIFY `layanan_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `saber_lokasi`
--
ALTER TABLE `saber_lokasi`
  MODIFY `lokasi_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
