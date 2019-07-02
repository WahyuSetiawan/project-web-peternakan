-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2019 at 04:38 PM
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
-- Table structure for table `tb_detail_pembelian_ayam`
--

CREATE TABLE IF NOT EXISTS `tb_detail_pembelian_ayam` (
  `id_detail_pembelian_ayam` varchar(7) NOT NULL,
  `id_kandang` varchar(7) NOT NULL,
  `id_supplier` varchar(7) DEFAULT NULL,
  `id_karyawan` varchar(7) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `umur` int(11) NOT NULL,
  `jumlah_ayam` int(11) NOT NULL,
  `harga_ayam` int(11) NOT NULL DEFAULT '0',
  `update_by_admin` int(11) DEFAULT NULL,
  `update_by_karyawan` varchar(7) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_pembelian_ayam`
--

INSERT INTO `tb_detail_pembelian_ayam` (`id_detail_pembelian_ayam`, `id_kandang`, `id_supplier`, `id_karyawan`, `id_admin`, `tanggal`, `umur`, `jumlah_ayam`, `harga_ayam`, `update_by_admin`, `update_by_karyawan`, `created_at`, `updated_at`) VALUES
('MA_0017', 'KD_0001', 'SP_0001', NULL, 5, '2018-11-12 00:00:00', 30, 100, 1000, NULL, 'KR_0001', '2019-06-18 14:02:10', '2019-01-29 17:39:29'),
('MA_0021', 'KD_0003', 'SP_0001', NULL, 5, '2018-11-12 00:00:00', 30, 100, 0, NULL, NULL, '2019-05-28 07:22:19', '2019-05-27 16:26:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_pembelian_ayam`
--
ALTER TABLE `tb_detail_pembelian_ayam`
  ADD PRIMARY KEY (`id_detail_pembelian_ayam`),
  ADD KEY `FK_tb_detail_pembelian_ayam_tb_kandang` (`id_kandang`),
  ADD KEY `FK_tb_detail_pembelian_ayam_tb_admin` (`id_admin`),
  ADD KEY `FK_tb_detail_pembelian_ayam_tb_karyawan` (`id_karyawan`),
  ADD KEY `FK_tb_detail_pembelian_ayam_tb_supplier` (`id_supplier`),
  ADD KEY `FK_tb_detail_pembelian_ayam_tb_admin_2` (`update_by_admin`),
  ADD KEY `FK_tb_detail_pembelian_ayam_tb_karyawan_2` (`update_by_karyawan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
