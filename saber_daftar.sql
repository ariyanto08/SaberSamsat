-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Nov 2023 pada 02.35
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
-- Struktur dari tabel `saber_daftar`
--

CREATE TABLE `saber_daftar` (
  `daftar_id` int NOT NULL,
  `daftar_kode` varchar(6) COLLATE utf8mb4_general_ci DEFAULT NULL,
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
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `saber_daftar`
--
ALTER TABLE `saber_daftar`
  ADD PRIMARY KEY (`daftar_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `saber_daftar`
--
ALTER TABLE `saber_daftar`
  MODIFY `daftar_id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
