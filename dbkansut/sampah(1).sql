-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2023 at 11:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sampah`
--

-- --------------------------------------------------------

--
-- Table structure for table `penarikan`
--

CREATE TABLE `penarikan` (
  `id` int(255) NOT NULL,
  `tanggal_tarik` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `saldo` varchar(255) NOT NULL,
  `tarik` varchar(255) NOT NULL,
  `petugas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penarikan`
--

INSERT INTO `penarikan` (`id`, `tanggal_tarik`, `username`, `saldo`, `tarik`, `petugas`) VALUES
(5, '2023-11-26', 'prathamaloveshenxiao', '31000', '1000', 'ijustmaking'),
(6, '2023-11-30', 'prathamaagustyan123', '280000', '180000', 'ijustmaking'),
(7, '2023-11-26', 'prathamaagustyan123', '9000', '4000', 'ijustmaking'),
(8, '2023-11-26', 'prathamaagustyan123', '5000', '1000', 'ijustmaking'),
(9, '2023-11-26', 'prathamaagustyan123', '4000', '4000', 'ijustmaking'),
(10, '2023-11-28', 'prathamaloveshenxiao', '30000', '10000', 'ijustmaking'),
(11, '2023-11-26', 'prathamaloveshenxiao', '20000', '5000', 'ijustmaking'),
(12, '2023-11-26', 'prathamaloveshenxiao', '15000', '5000', 'ijustmaking'),
(13, '2023-11-26', 'prathamaloveshenxiao', '10000', '10000', 'ijustmaking'),
(14, '2023-11-26', 'prathamaagustyan123', '35000', '5000', 'ijustmaking'),
(15, '2023-11-27', 'prathamaagustyan123', '30000', '10000', 'ijustmaking'),
(16, '2023-11-27', 'prathamaagustyan123', '30000', '10000', 'ijustmaking'),
(17, '2023-11-27', 'prathamaagustyan123', '30000', '10000', 'ijustmaking'),
(18, '2023-11-27', 'prathamaagustyan123', '58000', '8000', 'ijustmaking'),
(19, '2023-11-27', 'prathamaagustyan123', '50000', '20000', 'ijustmaking'),
(20, '2023-11-26', 'josdunsukandarimmanuel', '14000', '4000', 'ijustmaking'),
(21, '2023-11-26', 'josdunsukandarimmanuel', '10000', '2000', 'ijustmaking'),
(22, '2023-11-26', 'josdunsukandarimmanuel', '8000', '1000', 'ijustmaking'),
(23, '2023-11-26', 'josdunsukandarimmanuel', '7000', '1000', 'ijustmaking'),
(24, '2023-11-26', 'prathamaagustyan123', '45000', '5000', 'ijustmaking'),
(25, '2023-11-26', 'josdunsukandarimmanuel', '6000', '500', 'ijustmaking'),
(26, '2023-11-26', 'prathamaagustyan123', '45000', '5000', 'ijustmaking'),
(27, '2023-11-26', 'josdunsukandarimmanuel', '5500', '500', 'ijustmaking'),
(28, '2023-11-26', 'josdunsukandarimmanuel', '5500', '500', 'ijustmaking'),
(29, '2023-11-26', 'josdunsukandarimmanuel', '4500', '1000', 'ijustmaking'),
(30, '2023-11-26', 'josdunsukandarimmanuel', '4500', '1000', 'ijustmaking'),
(31, '2023-11-26', 'josdunsukandarimmanuel', '2500', '500', 'ijustmaking'),
(32, '2023-11-26', 'prathamaagustyan123', '35000', '1000', 'ijustmaking'),
(33, '2023-11-26', 'josdunsukandarimmanuel', '2000', '2000', 'ijustmaking'),
(34, '2023-11-26', 'josdunsukandarimmanuel', '150000', '10000', 'ijustmaking'),
(35, '2023-11-26', 'josdunsukandarimmanuel', '140000', '40000', 'ijustmaking'),
(36, '2023-11-26', 'prathamaagustyan123', '34000', '4000', 'ijustmaking'),
(37, '2023-11-26', 'josdunsukandarimmanuel', '100000', '1000', 'ijustmaking'),
(38, '2023-11-26', 'josdunsukandarimmanuel', '99000', '1000', 'ijustmaking'),
(39, '2023-11-27', 'josdunsukandarimmanuel', '98000', '8000', 'ijustmaking'),
(40, '2023-11-26', 'josdunsukandarimmanuel', '90000', '2000', 'ijustmaking'),
(41, '2023-11-27', 'josdunsukandarimmanuel', '88000', '8000', 'ijustmaking'),
(42, '2023-11-26', 'josdunsukandarimmanuel', '80000', '1000', 'ijustmaking'),
(43, '2023-11-26', 'josdunsukandarimmanuel', '79000', '3000', 'ijustmaking'),
(44, '2023-11-26', 'josdunsukandarimmanuel', '151000', '50000', 'ijustmaking'),
(45, '2023-11-27', 'josdunsukandarimmanuel', '101000', '1000', 'ijustmaking'),
(46, '2023-11-28', 'prathamaagustyan123', '36000', '6000', 'ijustmaking'),
(47, '2023-12-04', 'josdunsukandarimmanuel', '500000', '200000', 'ijustmaking');

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `id_saldo` int(255) NOT NULL,
  `tanggal_saldo` date NOT NULL,
  `username` varchar(255) NOT NULL,
  `saldo_keluar` varchar(255) DEFAULT NULL,
  `saldo_masuk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`id_saldo`, `tanggal_saldo`, `username`, `saldo_keluar`, `saldo_masuk`) VALUES
(2, '2023-11-26', 'prathamaagustyan123', '30000', '134500'),
(7, '2023-11-26', 'josdunsukandarimmanuel', '50000', '75000'),
(8, '2023-11-27', 'josdunsukandarimmanuel', '1000', '0'),
(9, '2023-11-28', 'prathamaagustyan123', '6000', '6000'),
(10, '2023-12-04', 'josdunsukandarimmanuel', '200000', '400000');

-- --------------------------------------------------------

--
-- Table structure for table `sampah`
--

CREATE TABLE `sampah` (
  `id_sampah` int(255) NOT NULL,
  `nama_sampah` varchar(255) NOT NULL,
  `harga_sampah` varchar(255) NOT NULL,
  `potosampah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sampah`
--

INSERT INTO `sampah` (`id_sampah`, `nama_sampah`, `harga_sampah`, `potosampah`) VALUES
(7, 'Botol Plastik', '3000', 'botol.jpg'),
(8, 'Kertas', '5000', 'kertas.jpg'),
(9, 'Plastik', '2000', 'plastik.jpg'),
(10, 'Kaleng', '3500', 'kaleng.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `setorkan`
--

CREATE TABLE `setorkan` (
  `id_setor` int(255) NOT NULL,
  `tanggal_setor` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_sampah` varchar(255) NOT NULL,
  `berat` varchar(255) NOT NULL,
  `harga_sampah` varchar(255) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setorkan`
--

INSERT INTO `setorkan` (`id_setor`, `tanggal_setor`, `username`, `nama_sampah`, `berat`, `harga_sampah`, `total_harga`, `status`) VALUES
(13, '2023-11-25', 'ijustmaking', 'Botol Plastik', '4', '3000', '12000', 'Sudah di Verifikasi'),
(14, '2023-11-25', 'prathamaagustyan123', 'Kaleng', '4', '3500', '14000', 'Sudah di Verifikasi'),
(21, '2023-11-26', 'prathamaagustyan123', 'Kertas', '2', '5000', '10000', 'Sudah di Verifikasi'),
(22, '2023-11-26', 'prathamaagustyan123', 'Kertas', '6', '5000', '30000', 'Sudah di Verifikasi'),
(23, '2023-11-26', 'prathamaagustyan123', 'Kertas', '3', '5000', '15000', 'Sudah di Verifikasi'),
(24, '2023-11-26', 'prathamaagustyan123', 'Botol Plastik', '45', '3000', '135000', 'Sudah di Verifikasi'),
(25, '2023-11-26', 'prathamaagustyan123', 'Kaleng', '2', '3500', '7000', 'Sudah di Verifikasi'),
(26, '2023-11-26', 'prathamaagustyan123', 'Plastik', '2', '2000', '4000', 'Sudah di Verifikasi'),
(27, '2023-11-26', 'prathamaagustyan123', 'Botol Plastik', '6', '3000', '18000', 'Sudah di Verifikasi'),
(28, '2023-11-26', 'prathamaagustyan123', 'Kertas', '6', '5000', '30000', 'Sudah di Verifikasi'),
(29, '2023-11-26', 'prathamaagustyan123', 'Plastik', '2', '2000', '4000', 'Sudah di Verifikasi'),
(30, '2023-11-26', 'prathamaagustyan123', 'Botol Plastik', '3', '3000', '9000', 'Sudah di Verifikasi'),
(31, '2023-11-26', 'prathamaagustyan123', 'Kertas', '4', '5000', '20000', 'Sudah di Verifikasi'),
(32, '2023-11-26', 'prathamaagustyan123', 'Botol Plastik', '2', '3000', '6000', 'Sudah di Verifikasi'),
(33, '2023-11-26', 'prathamaagustyan123', 'Kertas', '2', '5000', '10000', 'Sudah di Verifikasi'),
(34, '2023-11-26', 'prathamaagustyan123', 'Plastik', '4', '2000', '8000', 'Sudah di Verifikasi'),
(35, '2023-11-26', 'prathamaagustyan123', 'Kaleng', '4', '3500', '14000', 'Sudah di Verifikasi'),
(36, '2023-11-26', 'prathamaagustyan123', 'Kaleng', '5', '3500', '17500', 'Sudah di Verifikasi'),
(37, '2023-11-26', 'prathamaagustyan123', 'Botol Plastik', '3', '3000', '9000', 'Sudah di Verifikasi'),
(38, '2023-11-26', 'prathamaagustyan123', 'Kertas', '5', '5000', '25000', 'Sudah di Verifikasi'),
(39, '2023-11-26', 'prathamaagustyan123', 'Plastik', '6', '2000', '12000', 'Sudah di Verifikasi'),
(40, '2023-11-26', 'prathamaagustyan123', 'Kaleng', '6', '3500', '21000', 'Sudah di Verifikasi'),
(41, '2023-11-26', 'prathamaagustyan123', 'Botol Plastik', '5', '3000', '15000', 'Sudah di Verifikasi'),
(42, '2023-11-26', 'prathamaagustyan123', 'Kaleng', '4', '3500', '14000', 'Sudah di Verifikasi'),
(43, '2023-11-26', 'prathamaagustyan123', 'Plastik', '7', '2000', '14000', 'Sudah di Verifikasi'),
(75, '2023-12-03', 'ijustmaking', 'Kertas', '6', '5000', '30000', 'Belum di Verifikasi'),
(76, '2023-12-03', 'ijustmaking', 'Plastik', '12', '2000', '24000', 'Belum di Verifikasi'),
(77, '2023-12-03', 'ijustmaking', 'Botol Plastik', '4', '3000', '12000', 'Belum di Verifikasi'),
(78, '2023-12-03', 'ijustmaking', 'Kertas', '5', '5000', '25000', 'Belum di Verifikasi'),
(79, '2023-12-03', 'ijustmaking', 'Botol Plastik', '12', '3000', '36000', 'Belum di Verifikasi'),
(80, '2023-12-03', 'ijustmaking', 'Kertas', '12', '5000', '60000', 'Belum di Verifikasi'),
(81, '2023-12-03', 'ijustmaking', 'Plastik', '12', '2000', '24000', 'Belum di Verifikasi'),
(82, '2023-12-04', 'ijustmaking', 'Botol Plastik', '12', '3000', '36000', 'Belum di Verifikasi'),
(83, '2023-12-04', 'ijustmaking', 'Kertas', '2', '5000', '10000', 'Belum di Verifikasi'),
(84, '2023-12-04', 'josdunsukandarimmanuel', 'Botol Plastik', '100', '3000', '300000', 'Sudah di Verifikasi'),
(85, '2023-12-04', 'josdunsukandarimmanuel', 'Kertas', '20', '5000', '100000', 'Sudah di Verifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(200) NOT NULL,
  `poto` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `koordinat` varchar(255) DEFAULT NULL,
  `usertype` varchar(255) DEFAULT NULL,
  `notelp` varchar(255) DEFAULT NULL,
  `saldo_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `poto`, `email`, `alamat`, `koordinat`, `usertype`, `notelp`, `saldo_user`) VALUES
(9, 'ijustmaking', NULL, 'Eunha-ssi ', '20230910_102408.jpg', 'ijustmaking@gmail.com', 'Jalanan Bagus', '', 'petugas', '0899898899', '1000059000'),
(17, 'prathamaagustyan', NULL, 'Prathama Agustyan', 'F6CWFhBaQAA05pc.jpeg', 'prathamaagustyan@gmail.com', 'jlnjln', '', 'kasir', '080080989', ''),
(21, 'prathamaagustyan123', NULL, 'Prathama Agustyan', 'F-Bj3H7a8AEcFlv.jpeg', 'prathamaagustyan123@gmail.com', '', '', '', '', '30000'),
(22, 'prathamaloveshenxiao', NULL, 'Prathama love Shenxiaoting', '20230910_102425.jpg', 'prathamaloveshenxiaoting@gmail.com', '', '', '', '', '0'),
(28, 'josdunsukandarimmanuel', NULL, 'josdun sukandar immanuel', 'Untitled.jpg', 'josdunsukandarimmanuel@gmail.com', 'joslan', '', '', '089976665432', '300000'),
(29, 'sacibatekaje', NULL, 'tekaje saciba', 'img-20190203-235941-16c3a8a0cf0a39303830e8e107fd60d6.jpg', 'sacibatekaje@gmail.com', 'Jalan Sukaraja, Kecamatan Sukaratu, Jawa Barat, Bekasi', '', 'petugas', '0898989778978', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `penarikan`
--
ALTER TABLE `penarikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`);

--
-- Indexes for table `sampah`
--
ALTER TABLE `sampah`
  ADD PRIMARY KEY (`id_sampah`);

--
-- Indexes for table `setorkan`
--
ALTER TABLE `setorkan`
  ADD PRIMARY KEY (`id_setor`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penarikan`
--
ALTER TABLE `penarikan`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id_saldo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sampah`
--
ALTER TABLE `sampah`
  MODIFY `id_sampah` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `setorkan`
--
ALTER TABLE `setorkan`
  MODIFY `id_setor` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
