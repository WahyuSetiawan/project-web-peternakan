-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 15, 2019 at 01:49 PM
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
-- Structure for view `view_transaksi_gudang`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_gudang` AS (select `tb_detail_pembelian_gudang`.`id_detail_pembelian_gudang` AS `id_transaksi`,'in' AS `aksi`,`tb_detail_pembelian_gudang`.`id_gudang` AS `id_gudang`,`tb_detail_pembelian_gudang`.`id_supplier` AS `id_supplier`,`tb_detail_pembelian_gudang`.`tanggal` AS `tanggal`,`tb_detail_pembelian_gudang`.`jumlah` AS `jumlah`,`tb_detail_pembelian_gudang`.`id_admin` AS `id_admin`,`tb_detail_pembelian_gudang`.`id_karyawan` AS `id_karyawan`,`tb_detail_pembelian_gudang`.`update_by_admin` AS `update_by_admin`,`tb_detail_pembelian_gudang`.`update_by_karyawan` AS `update_by_karyawan`,`tb_detail_pembelian_gudang`.`created_at` AS `created_at`,`tb_detail_pembelian_gudang`.`updated_at` AS `updated_at`,'' AS `keterangan` from `tb_detail_pembelian_gudang`) union all (select `tb_detail_penggunaan_gudang`.`id_detail_penggunaan_gudang` AS `id_detail_penggunaan_gudang`,'out' AS `aksi`,`tb_detail_penggunaan_gudang`.`id_gudang` AS `id_gudang`,NULL AS `id_supplier`,`tb_detail_penggunaan_gudang`.`tanggal` AS `tanggal`,`tb_detail_penggunaan_gudang`.`jumlah` AS `jumlah`,`tb_detail_penggunaan_gudang`.`id_admin` AS `id_admin`,`tb_detail_penggunaan_gudang`.`id_karyawan` AS `id_karyawan`,`tb_detail_penggunaan_gudang`.`update_by_admin` AS `update_by_admin`,`tb_detail_penggunaan_gudang`.`update_by_karyawan` AS `update_by_karyawan`,`tb_detail_penggunaan_gudang`.`created_at` AS `created_at`,`tb_detail_penggunaan_gudang`.`updated_at` AS `updated_at`,`tb_detail_penggunaan_gudang`.`keterangan` AS `keterangan` from `tb_detail_penggunaan_gudang`);

--
-- VIEW  `view_transaksi_gudang`
-- Data: None
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
