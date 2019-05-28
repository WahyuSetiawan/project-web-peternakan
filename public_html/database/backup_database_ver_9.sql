-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2019 at 10:14 AM
-- Server version: 5.5.60-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peternakan_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_penjualan_ayam`
--

CREATE TABLE IF NOT EXISTS `tb_detail_penjualan_ayam` (
  `id_detail_penjualan_ayam` varchar(7) NOT NULL,
  `id_detail_pembelian_ayam` varchar(7) NOT NULL,
  `id_kandang` varchar(7) DEFAULT NULL,
  `id_karyawan` varchar(7) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `jumlah_ayam` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `update_by_karyawan` varchar(7) DEFAULT NULL,
  `update_by_admin` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_penjualan_ayam`
--

INSERT INTO `tb_detail_penjualan_ayam` (`id_detail_penjualan_ayam`, `id_detail_pembelian_ayam`, `id_kandang`, `id_karyawan`, `id_admin`, `tanggal`, `jumlah_ayam`, `keterangan`, `update_by_karyawan`, `update_by_admin`, `created_at`, `updated_at`) VALUES
('KA_0001', 'MA_0017', 'KD_0002', 'KR_0002', NULL, '2018-11-12 00:00:00', 12, 'asdf', NULL, 5, '2019-01-01 20:05:17', '2019-01-01 14:58:18'),
('KA_0002', 'MA_0017', 'KD_0002', 'KR_0002', NULL, '2018-12-12 00:00:00', 120, 'asdf', NULL, NULL, '2019-01-01 20:05:18', '2019-05-27 16:26:43'),
('KA_0003', 'MA_0017', 'KD_0003', NULL, 5, '0000-00-00 00:00:00', 20, '', NULL, 5, '2019-01-29 19:52:39', '2019-01-29 19:52:49'),
('KA_0004', 'MA_0017', 'KD_0001', NULL, 5, '2019-01-30 00:00:00', 2, 'gfjdgngmfgm', NULL, NULL, '2019-01-29 21:11:24', '2019-05-27 16:26:43'),
('KA_0005', 'MA_0017', 'KD_0001', NULL, 5, '2019-01-30 00:00:00', 33, 'gaga', NULL, NULL, '2019-01-29 21:13:51', '2019-05-27 16:26:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_penjualan_ayam`
--
ALTER TABLE `tb_detail_penjualan_ayam`
  ADD PRIMARY KEY (`id_detail_penjualan_ayam`),
  ADD KEY `FK_tb_detail_penjualan_ayam_tb_kandang` (`id_kandang`),
  ADD KEY `FK_tb_detail_penjualan_ayam_tb_karyawan` (`id_karyawan`),
  ADD KEY `FK_tb_detail_penjualan_ayam_tb_admin` (`id_admin`),
  ADD KEY `FK_tb_detail_penjualan_ayam_tb_karyawan_2` (`update_by_karyawan`),
  ADD KEY `FK_tb_detail_penjualan_ayam_tb_admin_2` (`update_by_admin`),
  ADD KEY `FK_id_detail_pembelian_ayam_tb_pembelian_ayam` (`id_detail_pembelian_ayam`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_penjualan_ayam`
--
ALTER TABLE `tb_detail_penjualan_ayam`
  ADD CONSTRAINT `tb_detail_penjualan_ayam_ibfk_5` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tb_detail_penjualan_ayam_ibfk_1` FOREIGN KEY (`id_detail_pembelian_ayam`) REFERENCES `tb_detail_pembelian_ayam` (`id_detail_pembelian_ayam`),
  ADD CONSTRAINT `tb_detail_penjualan_ayam_ibfk_2` FOREIGN KEY (`id_kandang`) REFERENCES `tb_kandang` (`id_kandang`) ON DELETE SET NULL,
  ADD CONSTRAINT `tb_detail_penjualan_ayam_ibfk_3` FOREIGN KEY (`id_kandang`) REFERENCES `tb_kandang` (`id_kandang`) ON DELETE SET NULL,
  ADD CONSTRAINT `tb_detail_penjualan_ayam_ibfk_4` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
