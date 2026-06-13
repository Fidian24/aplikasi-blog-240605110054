-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2026 at 11:51 AM
-- Server version: 8.0.44
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog_web1`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` bigint UNSIGNED NOT NULL,
  `id_penulis` bigint UNSIGNED NOT NULL,
  `id_kategori` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hari_tanggal` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `id_penulis`, `id_kategori`, `judul`, `isi`, `gambar`, `hari_tanggal`) VALUES
(1, 1, 1, 'Manfaat Minum Air Putih yang Cukup Setiap Hari', 'Air putih adalah kebutuhan dasar tubuh yang sering diabaikan. Kecukupan cairan membantu fungsi organ, menjaga konsentrasi, dan memperlancar metabolisme. Biasakan minum setidaknya delapan gelas per hari untuk menjaga tubuh tetap bugar dan produktif.', '6a2d07ef30070.jpg', 'Senin, 2 Juni 2026 | 08:00'),
(2, 1, 1, 'Olahraga Ringan yang Bisa Dilakukan di Rumah', 'Tidak perlu ke gym untuk tetap aktif bergerak. Senam, yoga, atau jalan santai di sekitar rumah sudah cukup untuk menjaga kebugaran tubuh. Konsistensi lebih penting daripada intensitas saat membangun kebiasaan olahraga.', '6a2d07bab3284.jpg', 'Selasa, 3 Juni 2026 | 09:15'),
(3, 1, 2, 'Strategi Belajar Efektif untuk Pelajar dan Mahasiswa', 'Metode belajar yang tepat dapat meningkatkan pemahaman secara signifikan. Teknik seperti Pomodoro, mind mapping, dan belajar aktif terbukti membantu otak menyerap informasi lebih baik. Kunci utamanya adalah konsistensi dan kedisiplinan waktu belajar.', '6a2d075cf1a16.jpg', 'Rabu, 4 Juni 2026 | 10:00'),
(4, 1, 2, 'Pentingnya Literasi Digital di Era Modern', 'Kemampuan memahami dan memanfaatkan teknologi digital adalah bekal penting di abad ke-21. Literasi digital mencakup kemampuan memilah informasi, memahami privasi online, dan menggunakan perangkat secara bijak. Pendidikan literasi digital harus dimulai sejak dini.', '6a2d071794155.jpg', 'Kamis, 5 Juni 2026 | 11:30'),
(5, 1, 3, 'Mengenal Kecerdasan Buatan dan Dampaknya pada Kehidupan', 'Kecerdasan buatan atau AI semakin hadir dalam kehidupan sehari-hari, mulai dari rekomendasi konten hingga asisten virtual. Teknologi ini membawa efisiensi besar namun juga menuntut adaptasi dari berbagai sektor pekerjaan. Memahami dasar-dasar AI membantu kita memanfaatkannya dengan lebih bijak.', '6a2d067ec0685.jpg', 'Jumat, 6 Juni 2026 | 13:00'),
(6, 1, 3, 'Cloud Computing: Solusi Penyimpanan Data Masa Kini', 'Cloud computing memungkinkan penyimpanan dan akses data kapan saja dan di mana saja tanpa bergantung pada perangkat fisik. Layanan seperti Google Drive dan OneDrive telah mengubah cara individu maupun perusahaan mengelola data. Keamanan data tetap menjadi pertimbangan utama dalam penggunaan cloud.', '6a2d06343c03d.jpg', 'Sabtu, 7 Juni 2026 | 14:45'),
(7, 1, 4, 'Resep Nasi Goreng Kampung yang Lezat dan Mudah', 'Nasi goreng kampung adalah sajian sederhana namun kaya rasa yang digemari banyak orang. Kuncinya ada pada nasi yang tidak terlalu lembek, bumbu bawang merah dan cabai yang ditumis hingga harum. Dengan tambahan kecap manis dan telur mata sapi, hidangan ini sempurna disantap kapan saja.', '6a2d05e97a0e4.jpg', 'Minggu, 8 Juni 2026 | 07:30'),
(8, 1, 5, 'Cara Mengatur Waktu agar Lebih Produktif Setiap Hari', 'Manajemen waktu yang baik adalah fondasi produktivitas tinggi. Mulailah hari dengan menetapkan prioritas, gunakan teknik time-blocking untuk mengelompokkan tugas serupa, dan kurangi distraksi digital. Evaluasi rutin setiap malam membantu Anda terus memperbaiki pola kerja.', '6a2d053414d99.jpg', 'Senin, 9 Juni 2026 | 08:30'),
(9, 1, 5, 'Tips Menjaga Fokus saat Bekerja dari Rumah', 'Bekerja dari rumah memberikan fleksibilitas namun juga menghadirkan berbagai gangguan. Buat ruang kerja yang terpisah dari area istirahat, tetapkan jam kerja yang konsisten, dan ambil jeda singkat secara berkala. Komunikasi yang jelas dengan anggota keluarga juga membantu menjaga konsentrasi.', '6a2d04a08d6d4.jpg', 'Selasa, 10 Juni 2026 | 09:00'),
(10, 1, 4, 'Wisata Kuliner: Menjelajahi Cita Rasa Khas Jawa Timur', 'Jawa Timur menyimpan kekayaan kuliner yang menggugah selera, mulai dari rawon, soto Lamongan, hingga lontong balap. Setiap daerah memiliki ciri khas rasa yang berbeda namun sama-sama autentik. Menjelajahi kuliner lokal adalah cara terbaik untuk mengenal budaya suatu daerah.', '6a2d0414b82cf.jpg', 'Rabu, 11 Juni 2026 | 12:00');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_artikel`
--

CREATE TABLE `kategori_artikel` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`id`, `nama_kategori`, `keterangan`) VALUES
(1, 'Kesehatan', 'Artikel seputar gaya hidup sehat dan medis'),
(2, 'Pendidikan', 'Informasi dan tips dunia pendidikan'),
(3, 'Teknologi', 'Perkembangan teknologi dan inovasi digital'),
(4, 'Kuliner', 'Resep, review makanan, dan wisata kuliner'),
(5, 'Produktivitas', 'Tips dan trik meningkatkan efisiensi kerja'),
(6, 'game tradisional', 'game tradisional jawa timur'),
(7, 'Kecantikan', 'Makeup'),
(8, 'Buku', 'Novel');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_depan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_belakang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'penulis_default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id`, `nama_depan`, `nama_belakang`, `user_name`, `password`, `foto`) VALUES
(1, 'Fidian', 'Trisnawati', 'Fidian', '$2y$12$tVi8kTTY.6u5hsnZ0m0GH.ccpn66X5RCR8UecnTv5vaZvlpiQl1WC', '6a2d208cf11a4.jpg'),
(4, 'Ismy', 'Liza', 'Ismy123', '$2y$12$5BfKUvjuIXPtJQPVBFcTvePIArxRg9yIYjRGqsfPFxJ9Hc7ZWu8La', '6a2d3f010ce52.jpeg'),
(5, 'Kucing', 'imut', 'kucing123', '$2y$12$hww/AI9jHYeia9tEtcyxO.HYaRz57Xqiv/tMOkiIw6eAyVtlPoJIO', '6a2d408760dcd.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penulis` (`id_penulis`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `fk_artikel_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_artikel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_artikel_penulis` FOREIGN KEY (`id_penulis`) REFERENCES `penulis` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
