-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 03:11 PM
-- Server version: 10.4.22-MariaDB-log
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sik_kopma`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `npm` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nomor_handphone` varchar(15) NOT NULL,
  `nomor_anggota` varchar(26) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_jurusan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`npm`, `nama`, `nomor_handphone`, `nomor_anggota`, `email`, `id_jurusan`) VALUES
('2017051001', 'Ervan Chodry', '089673116170', '2083/KOPMA_UL/20', 'ervanchodry112@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(2) NOT NULL,
  `nama_fakultas` varchar(50) NOT NULL,
  `singkatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`, `singkatan`) VALUES
(1, 'Fakultas Matematika dan Ilmu Pengetahuan Alam', 'FMIPA'),
(2, 'Fakultas Ekonomi dan Bisnis', 'FEB'),
(3, 'Fakultas Keguruan dan Ilmu Pendidikan', 'FKIP'),
(4, 'Fakultas Kedokteran', 'FK'),
(5, 'Fakultas Teknik', 'FT'),
(6, 'Fakultas Hukum', 'FH'),
(7, 'Fakultas Ilmu Sosial dan Ilmu Politik', 'FISIP'),
(8, 'Fakultas Pertanian', 'FP');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(2) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `id_fakultas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `id_fakultas`) VALUES
(1, 'Ilmu Komputer', 1),
(2, 'Biologi', 1),
(3, 'Manajemen', 2),
(4, 'Akuntansi', 2),
(5, 'Ekonomi', 2),
(6, 'Ilmu Hukum', 6),
(9, 'Pendidikan Biologi', 3),
(10, 'Pendidikan Kimia', 3),
(11, 'Pendidikan Matematika', 3),
(12, 'Pendidikan Fisika', 3),
(13, 'Pendidikan Pancasila dan Kewarganegaraan', 3),
(14, 'Pendidikan Ekonomi', 3),
(15, 'Pendidikan Geografi', 3),
(16, 'Pendidikan Sejarah', 3),
(17, 'Pendidikan Bahasa dan Sastra Indonesia', 3),
(18, 'Pendidikan Bahasa Inggris', 3),
(19, 'Pendidikan Seni Tari', 3),
(20, 'Pendidikan Bimbingan Konseling', 3),
(21, 'Pendidikan Jasmani', 3),
(22, 'Pendidikan Guru Sekolah Dasar (PGSD)', 3),
(23, 'Pendidikan Anak Usia Dini (PG Paud)', 3),
(24, 'Pendidikan Bahasa Perancis', 3),
(25, 'Pendidikan TIK', 3),
(26, 'Agribisnis', 8),
(27, 'Agroteknologi', 8),
(28, 'Teknologi Hasil Pertanian', 8),
(29, 'Teknik Pertanian', 8),
(30, 'Peternakan', 8),
(31, 'Kehutanan', 8),
(32, 'Budidaya Perairan', 8),
(33, 'Ilmu Tanah', 8),
(34, 'Proteksi Tanaman', 8),
(35, 'Agronomi', 8),
(36, 'Penyuluhan Pertanian', 8),
(37, 'Sumberdaya Akuatik', 8),
(38, 'Nutrisi dan Teknologi Pakan Ternak', 8),
(39, 'Ilmu Kelautan', 8),
(40, 'Teknologi Industri Pertanian', 8),
(41, 'Teknik Sipil', 5),
(42, 'Teknik Elektro', 5),
(43, 'Teknik Mesin', 5),
(44, 'Teknik Kimia', 5),
(45, 'Teknik Geofisika', 5),
(46, 'Teknik Informatika', 5),
(47, 'Teknik Arsitektur', 5),
(48, 'Teknik Geodesi', 5),
(49, 'Sosiologi', 7),
(50, 'Ilmu Pemerintahan', 7),
(51, 'Ilmu Komunikasi', 7),
(52, 'Ilmu Administrasi Negara', 7),
(53, 'Ilmu Administrasi Bisnis', 7),
(54, 'Hubungan Internasional', 7),
(55, 'Kimia', 1),
(56, 'Matematika', 1),
(57, 'Fisika', 1),
(58, 'Pendidikan Kedokteran', 4),
(59, 'Ekonomi Pembangunan', 2),
(63, 'Pendidikan Bahasa Lampung', 3);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(10) NOT NULL,
  `id_transaksi` int(5) NOT NULL,
  `id_produk` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `poin`
--

CREATE TABLE `poin` (
  `id_poin` int(8) NOT NULL,
  `total_poin` int(11) NOT NULL,
  `npm` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poin`
--

INSERT INTO `poin` (`id_poin`, `total_poin`, `npm`) VALUES
(5, 15, '2017051001');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(3) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` varchar(8) NOT NULL,
  `stok` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `stok`) VALUES
(1, 'Lays', '5000', 50),
(2, '  Keripik Kentang', '10000', 50),
(3, 'Keripik Mantang', '5000', 50),
(4, 'Keripik Pisang', '5000', 50),
(5, '  KeripikApel', '5000', 50),
(6, ' Pop Mie', '6000', 12);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_transaksi`
--

CREATE TABLE `riwayat_transaksi` (
  `id_transaksi` varchar(15) NOT NULL,
  `nominal` int(8) NOT NULL,
  `npm` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_transaksi`
--

INSERT INTO `riwayat_transaksi` (`id_transaksi`, `nominal`, `npm`) VALUES
('0', 10000, '2017051001'),
('1', 15000, '2017051001'),
('2', -10000, '2017051001'),
('3', 5000, '2017051001'),
('7VJSQIXT25ONUNA', -10000, '2017051001'),
('KKZ159BL4NKR15I', 12000, '2017051001');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `id_simpanan` int(3) NOT NULL,
  `simpanan_wajib` int(8) NOT NULL,
  `simpanan_pokok` int(8) NOT NULL,
  `npm` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`id_simpanan`, `simpanan_wajib`, `simpanan_pokok`, `npm`) VALUES
(10, 52000, 35000, '2017051001'),
(13, 52000, 25000, '2017051001');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembelian`
--

CREATE TABLE `transaksi_pembelian` (
  `id_transaksi` int(5) NOT NULL,
  `npm` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `permission`) VALUES
('admin', '$2y$10$6eryZ8sQTwBSwJm32DfJ0emSYl2GNjHodxBXG5ADupKX9uA7yhYwe', 3),
('anggota', '$2y$10$KqMzD4T81wYCbCdxUulbCOu0Pr1hbNLRsiHZK/5ABU3Qp2Hu3bs9m', 1),
('psda', '$2y$10$I3Qe3OabdE17pFU8bkIB4.7EVJqBtd.9AUTQefzQMWn1HY9OJHQ46', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `jurusan_ibfk_1` (`id_fakultas`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `poin`
--
ALTER TABLE `poin`
  ADD PRIMARY KEY (`id_poin`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id_simpanan`);

--
-- Indexes for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poin`
--
ALTER TABLE `poin`
  MODIFY `id_poin` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `id_simpanan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksi_pembelian`
--
ALTER TABLE `transaksi_pembelian`
  MODIFY `id_transaksi` int(5) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
