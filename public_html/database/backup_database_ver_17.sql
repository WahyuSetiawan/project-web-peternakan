-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2019 at 02:37 PM
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
-- Table structure for table `tb_gudang`
--

CREATE TABLE IF NOT EXISTS `tb_gudang` (
  `id_gudang` varchar(7) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `cara_pemakaian` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gudang`
--

INSERT INTO `tb_gudang` (`id_gudang`, `nama`, `cara_pemakaian`, `created_at`, `updated_at`) VALUES
('TG_0001', 'Jagung', '', '2019-05-28 05:28:27', '2019-01-06 15:47:09'),
('TG_0002', 'Pakan Katul', '', '2019-01-02 14:36:23', '2019-01-06 15:46:47'),
('TG_0003', 'Vaksin Flu Burung', '', '2019-06-18 13:47:31', '2019-01-29 21:29:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  ADD PRIMARY KEY (`id_gudang`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
