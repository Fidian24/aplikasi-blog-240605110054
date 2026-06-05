-- Database: db_blog  (impor lewat phpMyAdmin / HeidiSQL Laragon)
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `db_blog` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `db_blog`;

-- ----------------------------- artikel -----------------------------
CREATE TABLE `artikel` (
  `id` int NOT NULL,
  `id_penulis` int NOT NULL,
  `id_kategori` int NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari_tanggal` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `artikel` (`id`, `id_penulis`, `id_kategori`, `judul`, `isi`, `gambar`, `hari_tanggal`) VALUES
(1, 1, 1, 'Semangkuk keberhasilan', 'menceritakan seorang pria yang berhasil mendapatkan pekerjaan', 'artikel_69ef6d87db3844.76162615.png', 'Senin, 27 April 2026 | 21:07');

-- ------------------------- kategori_artikel -------------------------
CREATE TABLE `kategori_artikel` (
  `id` int NOT NULL,
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kategori_artikel` (`id`, `nama_kategori`, `keterangan`) VALUES
(1, 'Family', 'Menceritakan kisah keluarga');

-- ----------------------------- penulis -----------------------------
CREATE TABLE `penulis` (
  `id` int NOT NULL,
  `nama_depan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `penulis` (`id`, `nama_depan`, `nama_belakang`, `user_name`, `password`, `foto`) VALUES
(1, 'Yusuf', 'Kusuma', 'ninakusuma_', '$2y$10$TuRuRUwA/GcUTf4l2Tapfu7Ive.dv1axt/iOdI55GcklDZuBD7ppO', 'penulis_69ef6c6f8da710.03744227.jpg');

-- ----------------------------- indexes -----------------------------
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_artikel_penulis` (`id_penulis`),
  ADD KEY `fk_artikel_kategori` (`id_kategori`);

ALTER TABLE `kategori_artikel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_nama_kategori` (`nama_kategori`);

ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_user_name` (`user_name`);

ALTER TABLE `artikel`          MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `kategori_artikel` MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `penulis`          MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `artikel`
  ADD CONSTRAINT `fk_artikel_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_artikel` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_artikel_penulis`  FOREIGN KEY (`id_penulis`)  REFERENCES `penulis` (`id`)          ON DELETE RESTRICT ON UPDATE CASCADE;
