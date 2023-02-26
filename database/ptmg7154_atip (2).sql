-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Feb 2023 pada 03.19
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ptmg7154_atip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `jenis`, `create_time`) VALUES
(4, 'SARANA', '0000-00-00 00:00:00'),
(5, 'PRASARANA', '0000-00-00 00:00:00'),
(6, 'KAMTIBMAS', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `tipe` varchar(100) DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `property` varchar(225) DEFAULT NULL,
  `nama_alat` varchar(225) DEFAULT NULL,
  `merk` varchar(225) DEFAULT NULL,
  `lokasi` varchar(225) DEFAULT NULL,
  `id_pelapor` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `status` text DEFAULT NULL COMMENT '1. Mulai, 2. Proses, 3. Selesai',
  `id_teknisi` int(11) DEFAULT NULL,
  `biaya` int(11) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `tipe`, `id_jenis`, `property`, `nama_alat`, `merk`, `lokasi`, `id_pelapor`, `tanggal`, `deskripsi`, `foto`, `status`, `id_teknisi`, `biaya`, `create_time`) VALUES
(4, 'Ringan', 4, NULL, NULL, NULL, NULL, 2, '2022-09-22', 'Sarana Olahraga rusak', 'atip-removebg-preview.png', '3', 3, 300000, '2022-09-23 16:46:33'),
(5, 'Ringan', 4, NULL, NULL, NULL, NULL, 2, '2022-10-11', 'ok', 'Blank_image.jpg', '2', 3, NULL, '2022-09-26 07:25:12'),
(6, '#', 6, NULL, NULL, NULL, NULL, 2, '2022-09-30', 'Tes', 'Banner_KSPBS BMT AL-HIDAYAH.png', '2', 3, NULL, '2022-09-30 08:58:59'),
(7, 'Sedang', 5, 'Instalasi Listrik', NULL, NULL, 'Didekat situ', 2, '2023-01-22', NULL, 'WhatsApp Image 2022-06-03 at 10.09.42 (1).jpeg', '1', 3, NULL, '2023-02-16 12:38:00'),
(8, NULL, 4, 'Printer', NULL, 'eho', 'disini', 2, '2023-01-22', 'asdsad', 'WhatsApp Image 2022-06-03 at 10.09.42 (1).jpeg', '1', 3, NULL, '2023-02-17 07:16:42'),
(9, NULL, 4, 'LCD Proyektor', NULL, 'dasda', 'sadas', 2, '2023-01-21', 'adsd', 'WhatsApp Image 2022-06-03 at 10.09.42 (1).jpeg', '2', 3, NULL, '2023-02-17 07:30:15'),
(10, NULL, 4, 'LCD Proyektor', NULL, 'dasda', 'sadas', 2, '2023-01-21', 'adsd', 'WhatsApp Image 2022-06-03 at 10.09.42 (1).jpeg', '1', NULL, NULL, '2023-01-22 04:21:23'),
(11, NULL, 4, 'LCD Proyektor', NULL, 'dasda', 'sadas', 2, '2023-01-21', 'adsd', 'WhatsApp Image 2022-06-03 at 10.09.42 (1).jpeg', '1', NULL, NULL, '2023-01-22 04:23:47'),
(12, 'Ringan', NULL, 'Instalasi Listrik', NULL, NULL, 'dasdas', 2, '2023-02-12', NULL, 'WhatsApp Image 2022-06-03 at 10.09.41.jpeg', '1', NULL, NULL, '2023-02-12 08:21:54'),
(13, NULL, 4, 'Printer', NULL, 'adsd', 'asdas', 2, '2023-02-12', 'asd', 'WhatsApp Image 2022-06-03 at 10.09.42 (1).jpeg', '1', NULL, NULL, '2023-02-12 08:32:09'),
(14, NULL, 4, 'AC', 'Panasonic1231', 'Panasonic', 'Gedung B', 2, '2023-02-12', 'Terjadi Kebocoran', 'WhatsApp Image 2022-06-03 at 10.09.42 (1).jpeg', '1', NULL, NULL, '2023-02-12 14:23:48'),
(15, NULL, 4, 'AC', 'asdsa', 'asdas', 'dasdas', 2, '2023-02-19', 'sadsad', 'WhatsApp Image 2022-06-03 at 10.09.41.jpeg', '1', NULL, NULL, '2023-02-19 16:21:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_laporan`
--

CREATE TABLE `log_laporan` (
  `id_log` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `log_laporan`
--

INSERT INTO `log_laporan` (`id_log`, `id_laporan`, `keterangan`, `create_time`) VALUES
(1, 4, 'Mulai', '2022-09-21 17:37:11'),
(2, 4, 'Check awal', '2022-09-22 16:05:21'),
(3, 4, 'Check Kedua', '2022-09-22 16:12:16'),
(4, 5, 'Mulai', '2022-09-26 07:13:24'),
(5, 5, 'tahap 1', '2022-09-26 07:25:12'),
(6, 6, 'Mulai', '2022-09-30 08:55:40'),
(7, 5, 'Njjuu', '2022-09-30 08:57:47'),
(8, 6, 'Tes', '2022-09-30 08:58:59'),
(9, 7, 'Mulai', '2023-01-22 03:49:18'),
(10, 8, 'Mulai', '2023-01-22 04:18:53'),
(11, 9, 'Mulai', '2023-01-22 04:21:00'),
(12, 10, 'Mulai', '2023-01-22 04:21:23'),
(13, 11, 'Mulai', '2023-01-22 04:23:47'),
(14, 12, 'Mulai', '2023-02-12 08:21:54'),
(15, 13, 'Mulai', '2023-02-12 08:32:09'),
(16, 14, 'Mulai', '2023-02-12 14:23:48'),
(17, 9, 'On going', '2023-02-17 07:30:15'),
(18, 15, 'Mulai', '2023-02-19 16:21:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `teknisi`
--

CREATE TABLE `teknisi` (
  `id_teknisi` int(11) NOT NULL,
  `nama_teknisi` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `password_text` text NOT NULL,
  `teknisi` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `unit_kerja` varchar(100) DEFAULT NULL,
  `jabatan` text DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `password_text` varchar(100) DEFAULT NULL,
  `role` int(11) NOT NULL COMMENT '1. pelapor, 2. Admin, 3. Teknisi, 4. Pimpinan',
  `fcm_token` varchar(255) DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `nip`, `unit_kerja`, `jabatan`, `no_hp`, `email`, `password`, `password_text`, `role`, `fcm_token`, `create_time`) VALUES
(1, 'admin', '12345678', NULL, NULL, NULL, 'adminatip0@gmail.com', '$2y$10$IJCoLmpJtzbpXYRqDE44DOOS/Olb.1cuSYi52DEoWEQzlWB1F9wRi', '12345678', 2, 'test', '2023-02-16 12:17:04'),
(2, 'ANTONI', '1234567890', 'Operasional', 'Pemimpin', '081234567890', 'antoni12@gmail.com', '$2y$10$/J3j8IIqlhbVL8Urxr/nNeEh4yRxY56dafgeTaWCxIGZwUH7HGC6u', '12345678', 1, 'test', '2023-01-17 14:46:37'),
(3, 'Hikmal', '308321', NULL, NULL, '082288621242', 'hikmal0@gmail.com', '$2y$10$CkI28M5nhSQKkVJD.soki.CNVaIC2WqIX7sQNX20Hu./.C8oi3pSK', '12345678', 3, 'test', '2022-11-29 09:53:28'),
(4, 'ILZA Raharja', '0987654321', 'SDM', 'Pemimpin', '081234567890', 'pimpinan1@gmail.com', '$2y$10$sLIo3XUWZbnkGknucHcBKuC0O/WoTpK01tQmQnc7DgDrSmbUPcS8W', '1234567890', 4, 'test', '2023-02-17 07:33:26'),
(5, 'ILZA', '0987654321', 'SDM', 'Pemimpin', '081234567890', 'ilza@gmail.com', '$2y$10$eYze2pvVr6XdcBjLKaS2rOA.0xbfqRBZjGX0A80YXF2Ku/DO0sYVu', '12345678', 4, 'test', '2023-02-17 07:33:26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `log_laporan`
--
ALTER TABLE `log_laporan`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id_teknisi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `log_laporan`
--
ALTER TABLE `log_laporan`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `id_teknisi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
