-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2019 at 01:56 AM
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

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `function_detail_type_supplier`() RETURNS varchar(8) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	
	select count(*) into count_id from detail_type_supplier;
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_detail_type_supplier), 5) + 1 into id from detail_type_supplier;
	end if;
	
	set code = concat('00000', id);
	set code = concat('DTS_', substring(code, LENGTH(code) - 3));
	
	return code;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_detail_kandang_persediaan`() RETURNS varchar(7) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	declare initial varchar(3);
	
	set initial = 'MP_';
	
	select count(*) into count_id from detail_kandang_persediaan where id_detail_kandang_persediaan like concat(initial, '%');
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_detail_kandang_persediaan), 5) + 1 into id from detail_kandang_persediaan where id_detail_kandang_persediaan like concat(initial, '%');
	end if;
	
	set code = concat('00000', id);
	set code = concat(initial, substring(code, LENGTH(code) - 3));
	
	return code;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_detail_kerugian_ayam`() RETURNS varchar(7) CHARSET utf8mb4
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	declare initial varchar(3);
	
	set initial = 'KA_';
	
	select count(*) into count_id from tb_detail_kerugian_ayam where id_detail_kerugian_ayam like concat(initial, '%');
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_detail_kerugian_ayam), 5) + 1 into id from tb_detail_kerugian_ayam where id_detail_kerugian_ayam like concat(initial, '%');
	end if;
	
	set code = concat('00000', id);
	set code = concat(initial, substring(code, LENGTH(code) - 3));
	
	return code;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_detail_pembelian_ayam`() RETURNS varchar(7) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	declare initial varchar(3);
	
	set initial = 'MA_';
	
	select count(*) into count_id from tb_detail_pembelian_ayam where id_detail_pembelian_ayam like concat(initial, '%');
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_detail_pembelian_ayam), 5) + 1 into id from tb_detail_pembelian_ayam where id_detail_pembelian_ayam like concat(initial, '%');
	end if;
	
	set code = concat('00000', id);
	set code = concat(initial, substring(code, LENGTH(code) - 3));
	
	return code;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_detail_pembelian_gudang`() RETURNS varchar(7) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	declare initial varchar(3);
	
	set initial = 'MG_';
	
	select count(*) into count_id from tb_detail_pembelian_gudang where id_detail_pembelian_gudang like concat(initial, '%');
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_detail_pembelian_gudang), 5) + 1 into id from tb_detail_pembelian_gudang where id_detail_pembelian_gudang like concat(initial, '%');
	end if;
	
	set code = concat('00000', id);
	set code = concat(initial, substring(code, LENGTH(code) - 3));
	
	return code;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_detail_pengeluaran_gudang`() RETURNS varchar(7) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	declare initial varchar(3);
	
	set initial = 'KG_';
	
	select count(*) into count_id from tb_detail_penggunaan_gudang where id_detail_penggunaan_gudang like concat(initial, '%');
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_detail_penggunaan_gudang), 5) + 1 into id from tb_detail_penggunaan_gudang where id_detail_penggunaan_gudang like concat(initial, '%');
	end if;
	
	set code = concat('00000', id);
	set code = concat(initial, substring(code, LENGTH(code) - 3));
	
	return code;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_detail_penjualan_ayam`() RETURNS varchar(7) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	declare initial varchar(3);
	
	set initial = 'KA_';
	
	select count(*) into count_id from tb_detail_penjualan_ayam where id_detail_penjualan_ayam like concat(initial, '%');
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_detail_penjualan_ayam), 5) + 1 into id from tb_detail_penjualan_ayam where id_detail_penjualan_ayam like concat(initial, '%');
	end if;
	
	set code = concat('00000', id);
	set code = concat(initial, substring(code, LENGTH(code) - 3));
	
	return code;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_detail_persediaan`() RETURNS varchar(7) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	declare initial varchar(3);
	
	set initial = 'DP_';
	
	select count(*) into count_id from detail_persediaan where id_detail_persediaan like concat(initial, '%');
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_detail_persediaan), 5) + 1 into id from detail_persediaan where id_detail_persediaan like concat(initial, '%');
	end if;
	
	set code = concat('00000', id);
	set code = concat(initial, substring(code, LENGTH(code) - 3));
	
	return code;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_gudang`() RETURNS varchar(10) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	
	select count(*) into count_id from tb_gudang;
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_gudang), 5) + 1 into id from tb_gudang;
	end if;
	
	set code = concat('00000', id);
	set code = concat('TG_', substring(code, LENGTH(code) - 3));
	
	return code;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_jadwal_kandang`() RETURNS varchar(7) CHARSET utf8mb4
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	
	select count(*) into count_id from tb_jadwal_kandang;
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_jadwal_kandang), 5) + 1 into id from tb_jadwal_kandang;
	end if;
	
	set code = concat('00000', id);
	set code = concat('JK_', substring(code, LENGTH(code) - 3));
	
	return code;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_kandang`() RETURNS varchar(7) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	
	select count(*) into count_id from tb_kandang;
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_kandang), 5) + 1 into id from tb_kandang;
	end if;
	
	set code = concat('00000', id);
	set code = concat('KD_', substring(code, LENGTH(code) - 3));
	
	return code;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_karyawan`() RETURNS varchar(7) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	
	select count(*) into count_id from tb_kandang;
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_karyawan), 5) + 1 into id from tb_kandang;
	end if;
	
	set code = concat('00000', id);
	set code = concat('KR_', substring(code, LENGTH(code) - 3));
	
	return code;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_supplier`() RETURNS varchar(7) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	
	select count(*) into count_id from tb_supplier;
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_supplier), 5) + 1 into id from tb_supplier;
	end if;
	
	set code = concat('00000', id);
	set code = concat('SP_', substring(code, LENGTH(code) - 3));
	
	return code;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_type_gudang`() RETURNS varchar(10) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	
	select count(*) into count_id from tb_detail_type_supplier;
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_gudang), 5) + 1 into id from tb_detail_type_supplier;
	end if;
	
	set code = concat('00000', id);
	set code = concat('TG_', substring(code, LENGTH(code) - 3));
	
	return code;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_kandang_persediaan`
--

CREATE TABLE IF NOT EXISTS `detail_kandang_persediaan` (
  `id_detail_kandang_persediaan` varchar(7) NOT NULL,
  `id_kandang` varchar(7) NOT NULL DEFAULT '0',
  `id_persediaan` varchar(7) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_kandang_persediaan`
--

INSERT INTO `detail_kandang_persediaan` (`id_detail_kandang_persediaan`, `id_kandang`, `id_persediaan`) VALUES
('MP_0001', 'KD_0001', 'PR_0002');

-- --------------------------------------------------------

--
-- Table structure for table `detail_persediaan`
--

CREATE TABLE IF NOT EXISTS `detail_persediaan` (
  `id_detail_persediaan` varchar(7) NOT NULL,
  `id_persediaan` varchar(7) DEFAULT NULL,
  `id_kandang` varchar(7) DEFAULT NULL,
  `type_durasi` enum('MONTHLY','DAILY','YEARLY') DEFAULT 'MONTHLY',
  `durasi` int(11) DEFAULT '1',
  `type` enum('event-important','event-success','event-warning','event-info','event-inverse','event-special') DEFAULT 'event-info'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_persediaan`
--

INSERT INTO `detail_persediaan` (`id_detail_persediaan`, `id_persediaan`, `id_kandang`, `type_durasi`, `durasi`, `type`) VALUES
('DP_0001', 'PR_0002', 'KD_0001', 'DAILY', 3, 'event-special'),
('DP_0004', 'PR_0003', 'KD_0001', 'MONTHLY', 1, 'event-important'),
('DP_0005', 'PR_0003', 'KD_0002', 'MONTHLY', 1, 'event-important'),
('DP_0007', 'PR_0004', 'KD_0001', 'DAILY', 1, 'event-info'),
('DP_0008', 'PR_0004', 'KD_0002', 'DAILY', 1, 'event-warning'),
('DP_0009', 'PR_0002', 'KD_0003', 'MONTHLY', 1, 'event-info');

-- --------------------------------------------------------

--
-- Table structure for table `detail_supplier_jenis`
--

CREATE TABLE IF NOT EXISTS `detail_supplier_jenis` (
  `id` int(11) NOT NULL,
  `id_supplier` varchar(7) NOT NULL,
  `id_jenis` varchar(7) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_supplier_jenis`
--

INSERT INTO `detail_supplier_jenis` (`id`, `id_supplier`, `id_jenis`) VALUES
(2, 'SP_0001', 'TG_0002'),
(4, 'SP_0004', 'TG_0001'),
(3, 'SP_0004', 'TG_0002');

-- --------------------------------------------------------

--
-- Table structure for table `detail_type_supplier`
--

CREATE TABLE IF NOT EXISTS `detail_type_supplier` (
  `id_detail_type_supplier` varchar(8) NOT NULL,
  `id_supplier` varchar(7) NOT NULL,
  `id_gudang` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_type_supplier`
--

INSERT INTO `detail_type_supplier` (`id_detail_type_supplier`, `id_supplier`, `id_gudang`) VALUES
('DTS_0001', 'SP_0004', 'TS_0001');

-- --------------------------------------------------------

--
-- Table structure for table `kandang_persediaan_history`
--

CREATE TABLE IF NOT EXISTS `kandang_persediaan_history` (
  `id` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_persediaan` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT '0000-00-00',
  `jumlah` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kandang_persediaan_history`
--

INSERT INTO `kandang_persediaan_history` (`id`, `id_pembelian`, `id_persediaan`, `tanggal`, `jumlah`) VALUES
(7, 15, 2, '2018-07-25', 0),
(8, 15, 4, '2018-08-27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `username`, `password`) VALUES
(5, 'Usman', 'admin', '$1$Rse8WLDF$T7V4cWo8b8/pWYWKWDwfJ0'),
(6, 'Owner', 'aaa', '$1$S/1.zk4.$0qKF24Yg2XvO67EHRk7eS.'),
(10, 'lalala', 'lalala', '$1$eog2MhuW$Jb6zsGuNYRWsV7BJ17sM5.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_kerugian_ayam`
--

CREATE TABLE IF NOT EXISTS `tb_detail_kerugian_ayam` (
  `id_detail_kerugian_ayam` varchar(7) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `id_kandang` varchar(7) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_karyawan` varchar(7) DEFAULT NULL,
  `update_by_admin` int(11) DEFAULT NULL,
  `update_by_karyawan` varchar(7) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_kerugian_ayam`
--

INSERT INTO `tb_detail_kerugian_ayam` (`id_detail_kerugian_ayam`, `tanggal`, `keterangan`, `jumlah`, `id_kandang`, `id_admin`, `id_karyawan`, `update_by_admin`, `update_by_karyawan`, `updated_at`, `created_at`) VALUES
('KA_0001', '2019-01-30 00:00:00', 'hahaha', 50, 'KD_0001', 5, NULL, 5, NULL, '2019-01-29 21:11:56', '2019-01-29 21:15:09'),
('KA_0002', '2019-01-30 00:00:00', 'chiiiiiii', 10, 'KD_0001', 5, NULL, NULL, NULL, '2019-01-29 21:16:56', '2019-05-27 16:26:43');

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
  `jumlah_ayam` int(11) NOT NULL,
  `update_by_admin` int(11) DEFAULT NULL,
  `update_by_karyawan` varchar(7) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_pembelian_ayam`
--

INSERT INTO `tb_detail_pembelian_ayam` (`id_detail_pembelian_ayam`, `id_kandang`, `id_supplier`, `id_karyawan`, `id_admin`, `tanggal`, `jumlah_ayam`, `update_by_admin`, `update_by_karyawan`, `created_at`, `updated_at`) VALUES
('MA_0017', 'KD_0001', 'SP_0001', NULL, 5, '2018-11-12 00:00:00', 10, NULL, NULL, '2019-01-29 16:29:25', '2019-01-29 17:39:29'),
('MA_0019', 'KD_0001', 'SP_0001', NULL, 5, '2018-11-12 00:00:00', 120, NULL, NULL, '2019-01-01 13:07:21', '2019-05-27 16:26:43'),
('MA_0020', 'KD_0001', 'SP_0001', 'KR_0002', NULL, '2018-11-12 00:00:00', 120, 5, NULL, '2019-01-01 13:07:26', '2019-01-01 13:38:55'),
('MA_0021', 'KD_0003', 'SP_0001', NULL, 5, '2018-11-12 00:00:00', 100, NULL, NULL, '2019-01-03 20:59:17', '2019-05-27 16:26:43'),
('MA_0022', 'KD_0001', 'SP_0005', NULL, 5, '2019-01-30 00:00:00', 2, 5, NULL, '2019-01-29 21:09:33', '2019-01-29 21:10:18'),
('MA_0023', 'KD_0001', 'SP_0006', NULL, 5, '2019-01-30 00:00:00', 100, NULL, NULL, '2019-01-29 21:14:35', '2019-05-27 16:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_pembelian_gudang`
--

CREATE TABLE IF NOT EXISTS `tb_detail_pembelian_gudang` (
  `id_detail_pembelian_gudang` varchar(7) NOT NULL,
  `id_supplier` varchar(7) DEFAULT NULL,
  `id_gudang` varchar(7) NOT NULL,
  `id_karyawan` varchar(7) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `nominal` int(11) NOT NULL DEFAULT '0',
  `update_by_karyawan` varchar(7) DEFAULT NULL,
  `update_by_admin` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_pembelian_gudang`
--

INSERT INTO `tb_detail_pembelian_gudang` (`id_detail_pembelian_gudang`, `id_supplier`, `id_gudang`, `id_karyawan`, `id_admin`, `tanggal`, `jumlah`, `nominal`, `update_by_karyawan`, `update_by_admin`, `created_at`, `updated_at`) VALUES
('MG_0004', 'SP_0004', 'TG_0002', NULL, 6, '2018-08-27 01:37:24', 10, 1, NULL, NULL, '2019-01-01 15:39:48', '2019-05-27 16:26:43'),
('MG_0005', 'SP_0004', 'TG_0001', NULL, 6, '2018-08-27 01:37:43', 100, 1, NULL, 5, '2019-01-01 15:39:52', '2019-01-01 15:44:43'),
('MG_0006', 'SP_0004', 'TG_0001', 'KR_0002', NULL, '2018-11-12 00:00:00', 120, 0, 'KR_0001', NULL, '2019-01-01 15:39:54', '2019-05-27 16:26:43'),
('MG_0007', 'SP_0004', 'TG_0001', NULL, 5, '2019-01-29 00:00:00', 123, 0, NULL, NULL, '2019-01-29 19:59:35', '2019-05-27 16:26:43'),
('MG_0008', 'SP_0006', 'TG_0001', NULL, 5, '2019-01-30 00:00:00', 400, 0, NULL, NULL, '2019-01-29 21:20:03', '2019-05-27 16:26:43'),
('MG_0009', 'SP_0006', 'TG_0001', NULL, 5, '2019-01-30 00:00:00', 1, 0, NULL, NULL, '2019-01-29 21:20:44', '2019-05-27 16:26:43'),
('MG_0010', 'SP_0006', 'TG_0002', NULL, 5, '2019-01-30 00:00:00', 100, 0, NULL, NULL, '2019-01-29 21:21:26', '2019-05-27 16:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_penggunaan_gudang`
--

CREATE TABLE IF NOT EXISTS `tb_detail_penggunaan_gudang` (
  `id_detail_penggunaan_gudang` varchar(7) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `id_kandang` varchar(7) DEFAULT NULL,
  `id_gudang` varchar(7) NOT NULL,
  `id_karyawan` varchar(7) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `keterangan` varchar(200) DEFAULT NULL,
  `update_by_karyawan` varchar(7) DEFAULT NULL,
  `update_by_admin` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_penggunaan_gudang`
--

INSERT INTO `tb_detail_penggunaan_gudang` (`id_detail_penggunaan_gudang`, `tanggal`, `id_kandang`, `id_gudang`, `id_karyawan`, `id_admin`, `jumlah`, `keterangan`, `update_by_karyawan`, `update_by_admin`, `created_at`, `updated_at`) VALUES
('KG_0007', '2018-11-12 00:00:00', NULL, 'TG_0002', NULL, NULL, 129, 'Kerusakan', NULL, 5, '2019-01-01 13:06:24', '2019-01-01 17:30:29'),
('KG_0008', '2019-01-01 00:00:00', NULL, 'TG_0001', NULL, NULL, 12, '', NULL, NULL, '2019-01-01 17:04:05', NULL),
('KG_0009', '2019-01-01 00:00:00', NULL, 'TG_0001', NULL, 5, 12, '', NULL, NULL, '2019-01-01 17:08:49', NULL),
('KG_0010', '2019-01-06 16:02:38', NULL, 'TG_0001', NULL, 5, 12, '', NULL, NULL, '2019-01-06 16:02:07', NULL),
('KG_0011', '2019-01-06 16:02:38', NULL, 'TG_0001', NULL, 5, 10, '', NULL, NULL, '2019-01-06 16:03:02', NULL),
('KG_0012', '2019-01-29 00:00:00', NULL, 'TG_0001', NULL, 5, 678, 'asdf', NULL, 5, '2019-01-29 20:01:35', NULL);

--
-- Triggers `tb_detail_penggunaan_gudang`
--
DELIMITER $$
CREATE TRIGGER `tg_insert_penggunaan_gudang_durasi` BEFORE INSERT ON `tb_detail_penggunaan_gudang`
 FOR EACH ROW BEGIN
    INSERT INTO detail_supplier_jenis
    SET id_supplier = "TG_0001",
        id_jenis = "TG_0002"; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_penjualan_ayam`
--

CREATE TABLE IF NOT EXISTS `tb_detail_penjualan_ayam` (
  `id_detail_penjualan_ayam` varchar(7) NOT NULL,
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

INSERT INTO `tb_detail_penjualan_ayam` (`id_detail_penjualan_ayam`, `id_kandang`, `id_karyawan`, `id_admin`, `tanggal`, `jumlah_ayam`, `keterangan`, `update_by_karyawan`, `update_by_admin`, `created_at`, `updated_at`) VALUES
('KA_0001', 'KD_0002', 'KR_0002', NULL, '2018-11-12 00:00:00', 12, 'asdf', NULL, 5, '2019-01-01 20:05:17', '2019-01-01 14:58:18'),
('KA_0002', 'KD_0002', 'KR_0002', NULL, '2018-12-12 00:00:00', 120, 'asdf', NULL, NULL, '2019-01-01 20:05:18', '2019-05-27 16:26:43'),
('KA_0003', 'KD_0003', NULL, 5, '0000-00-00 00:00:00', 20, '', NULL, 5, '2019-01-29 19:52:39', '2019-01-29 19:52:49'),
('KA_0004', 'KD_0001', NULL, 5, '2019-01-30 00:00:00', 2, 'gfjdgngmfgm', NULL, NULL, '2019-01-29 21:11:24', '2019-05-27 16:26:43'),
('KA_0005', 'KD_0001', NULL, 5, '2019-01-30 00:00:00', 33, 'gaga', NULL, NULL, '2019-01-29 21:13:51', '2019-05-27 16:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_supplier_jenis`
--

CREATE TABLE IF NOT EXISTS `tb_detail_supplier_jenis` (
  `id` int(11) NOT NULL,
  `id_supplier` varchar(7) NOT NULL,
  `id_gudang` varchar(7) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_supplier_jenis`
--

INSERT INTO `tb_detail_supplier_jenis` (`id`, `id_supplier`, `id_gudang`) VALUES
(2, 'SP_0001', 'TG_0002'),
(4, 'SP_0004', 'TG_0001'),
(3, 'SP_0004', 'TG_0002'),
(11, 'SP_0005', 'TG_0001'),
(13, 'SP_0006', 'TG_0001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_type_supplier`
--

CREATE TABLE IF NOT EXISTS `tb_detail_type_supplier` (
  `id_detail_type_supplier` varchar(8) NOT NULL,
  `id_supplier` varchar(7) NOT NULL,
  `id_gudang` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_type_supplier`
--

INSERT INTO `tb_detail_type_supplier` (`id_detail_type_supplier`, `id_supplier`, `id_gudang`) VALUES
('DTS_0001', 'SP_0004', 'TG_0001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gudang`
--

CREATE TABLE IF NOT EXISTS `tb_gudang` (
  `id_gudang` varchar(7) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `cara_pemakaian` varchar(50) DEFAULT NULL,
  `durasi` int(11) NOT NULL COMMENT 'durasi pembelian makan',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gudang`
--

INSERT INTO `tb_gudang` (`id_gudang`, `nama`, `cara_pemakaian`, `durasi`, `created_at`, `updated_at`) VALUES
('TG_0001', 'Jagung', '', 0, '2019-01-02 14:36:23', '2019-01-06 15:47:09'),
('TG_0002', 'Pakan Katul', '', 0, '2019-01-02 14:36:23', '2019-01-06 15:46:47'),
('TG_0003', 'Vaksin ', '', 0, '2019-01-29 21:29:09', '2019-01-29 21:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal_kandang`
--

CREATE TABLE IF NOT EXISTS `tb_jadwal_kandang` (
  `id_jadwal_kandang` varchar(7) NOT NULL,
  `id_kandang` varchar(7) NOT NULL,
  `hari` int(11) NOT NULL,
  `id_gudang` varchar(7) NOT NULL,
  `catatan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal_kandang`
--

INSERT INTO `tb_jadwal_kandang` (`id_jadwal_kandang`, `id_kandang`, `hari`, `id_gudang`, `catatan`, `created_at`, `updated_at`) VALUES
('JK_0001', 'KD_0002', 0, 'TG_0001', 'dfgsdfg', '2019-01-02 16:58:08', '2019-01-02 18:23:41'),
('JK_0002', 'KD_0001', 1, 'TG_0001', 'khbouyg8gy', '2019-01-03 18:27:39', '2019-01-29 21:07:19'),
('JK_0003', 'KD_0001', 0, 'TG_0002', 'ruyryurur', '2019-01-03 19:19:48', '2019-01-29 21:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kandang`
--

CREATE TABLE IF NOT EXISTS `tb_kandang` (
  `id_kandang` varchar(7) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `id_karyawan` varchar(7) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kandang`
--

INSERT INTO `tb_kandang` (`id_kandang`, `nama`, `id_karyawan`, `created_at`, `updated_at`) VALUES
('KD_0001', 'kandang a', 'KR_0002', '2019-01-02 14:34:52', '2019-01-29 20:56:55'),
('KD_0002', 'kandang 2', 'KR_0001', '2019-01-02 14:34:52', '2019-05-27 16:26:43'),
('KD_0003', 'kandang 3', 'KR_0002', '2019-01-02 14:34:52', '2019-05-27 16:26:43'),
('KD_0004', 'kandang 4', 'KR_0001', '2019-01-03 19:23:06', '2019-05-27 16:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE IF NOT EXISTS `tb_karyawan` (
  `id_karyawan` varchar(7) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text,
  `hint` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nama`, `no_hp`, `username`, `password`, `hint`, `created_at`, `updated_at`) VALUES
('KR_0001', 'Karyawan', '085651000000', 'supersuper', '$2y$12$QjSH496pcT5CEbzjD/vtVeH03tfHKFy36d4J0Ltp3lRtee9HDxY3K', 'rasmuslerdorf', '2019-05-27 16:37:40', '2019-01-22 15:19:26'),
('KR_0002', 'jono', '0856571111111', 'superadmin', '$1$somethin$f3PxGtAYM8jWEyWGPrKsQ1', '', '2019-01-02 14:35:41', '2019-05-27 16:26:43'),
('KR_0003', 'hahaha', '436566adhdahahaayaeh', 'hahaha', '$1$somethin$LxfQc6H/CnspgrtBTOaAw.', '', '2019-01-29 21:07:53', '2019-01-29 21:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE IF NOT EXISTS `tb_supplier` (
  `id_supplier` varchar(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `notelepon` varchar(15) DEFAULT NULL,
  `jual_ayam` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama`, `alamat`, `notelepon`, `jual_ayam`) VALUES
('SP_0001', 'Terbit Terang', 'Jl. Kusuma Negara no.5', '+62855470001', 'Y'),
('SP_0004', 'Terang Bersahaja', 'Jl. Kawitan no. 6 Sidorejo', '08547132566', 'N'),
('SP_0005', 'aaaa', 'asdfasd', '34234', 'Y'),
('SP_0006', 'hhhhh', 'hahahihi', 'kuyfdqtu8467845', 'Y');

-- --------------------------------------------------------

--
-- Stand-in structure for view `tb_view_stok_gudang`
--
CREATE TABLE IF NOT EXISTS `tb_view_stok_gudang` (
`id_gudang` varchar(7)
,`nama_gudang` varchar(50)
,`jumlah_gudang` decimal(33,0)
,`jumlah_transaksi` bigint(21)
,`jumlah_transaksi_masuk` bigint(21)
,`jumlah_transaksi_keluar` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_dashboard_kerugian_ayam`
--
CREATE TABLE IF NOT EXISTS `view_dashboard_kerugian_ayam` (
`tahun` bigint(20)
,`bulan` bigint(20)
,`monthname` varchar(9)
,`jumlah_ayam` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_dashboard_pembelian_ayam`
--
CREATE TABLE IF NOT EXISTS `view_dashboard_pembelian_ayam` (
`tahun` bigint(20)
,`bulan` bigint(20)
,`monthname` varchar(9)
,`jumlah_ayam` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_dashboard_penjualan_ayam`
--
CREATE TABLE IF NOT EXISTS `view_dashboard_penjualan_ayam` (
`id_kandang` varchar(7)
,`nama` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_history_transaksi`
--
CREATE TABLE IF NOT EXISTS `view_history_transaksi` (
`id` varchar(7)
,`tanggal_transaksi` datetime
,`id_kandang` varchar(7)
,`nama_kandang` varchar(50)
,`jumlah_ayam` int(11)
,`NULL` varchar(50)
,`ket` varchar(3)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_history_transaksi_gudang`
--
CREATE TABLE IF NOT EXISTS `view_history_transaksi_gudang` (
`id` varchar(7)
,`tanggal_transaksi` datetime
,`id_persediaan` varchar(7)
,`jumlah` int(11)
,`nominal` bigint(20)
,`keterangan` varchar(200)
,`ket` varchar(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_periode_transaksi`
--
CREATE TABLE IF NOT EXISTS `view_periode_transaksi` (
`tahun` bigint(20)
,`bulan` bigint(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_stok_ayam`
--
CREATE TABLE IF NOT EXISTS `view_stok_ayam` (
`id_kandang` varchar(7)
,`nama` varchar(50)
,`id_karyawan` varchar(7)
,`jumlah` decimal(34,0)
,`jumlah_transaksi` bigint(21)
,`jumlah_transaksi_masuk` bigint(21)
,`jumlah_transaksi_keluar` bigint(21)
,`jumlah_kerugian` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_stok_gudang`
--
CREATE TABLE IF NOT EXISTS `view_stok_gudang` (
`id_gudang` varchar(7)
,`nama_gudang` varchar(50)
,`jumlah_gudang` decimal(33,0)
,`jumlah_transaksi` bigint(21)
,`jumlah_transaksi_masuk` bigint(21)
,`jumlah_transaksi_keluar` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi_ayam`
--
CREATE TABLE IF NOT EXISTS `view_transaksi_ayam` (
`id_transaksi` varchar(7)
,`id_kandang` varchar(7)
,`id_supplier` varchar(7)
,`tanggal` datetime
,`jumlah_ayam` int(11)
,`keterangan` varchar(50)
,`aksi` varchar(3)
,`id_admin` int(11)
,`id_karyawan` varchar(7)
,`update_by_karyawan` varchar(7)
,`update_by_admin` int(11)
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi_gudang`
--
CREATE TABLE IF NOT EXISTS `view_transaksi_gudang` (
`id_transaksi` varchar(7)
,`aksi` varchar(3)
,`id_gudang` varchar(7)
,`id_supplier` varchar(7)
,`tanggal` datetime
,`jumlah` int(11)
,`id_admin` int(11)
,`id_karyawan` varchar(7)
,`update_by_admin` int(11)
,`update_by_karyawan` varchar(7)
,`created_at` timestamp
,`updated_at` timestamp
,`keterangan` varchar(200)
);

-- --------------------------------------------------------

--
-- Structure for view `tb_view_stok_gudang`
--
DROP TABLE IF EXISTS `tb_view_stok_gudang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`localhost` SQL SECURITY DEFINER VIEW `tb_view_stok_gudang` AS select `tb_gudang`.`id_gudang` AS `id_gudang`,`tb_gudang`.`nama` AS `nama_gudang`,(ifnull((select sum(`view_transaksi_gudang`.`jumlah`) from `view_transaksi_gudang` where ((`view_transaksi_gudang`.`id_gudang` = `tb_gudang`.`id_gudang`) and (`view_transaksi_gudang`.`aksi` = 'in'))),0) - ifnull((select sum(`view_transaksi_gudang`.`jumlah`) from `view_transaksi_gudang` where ((`view_transaksi_gudang`.`id_gudang` = `tb_gudang`.`id_gudang`) and (`view_transaksi_gudang`.`aksi` = 'out'))),0)) AS `jumlah_gudang`,(select count(`view_transaksi_gudang`.`jumlah`) from `view_transaksi_gudang` where (`view_transaksi_gudang`.`id_gudang` = `tb_gudang`.`id_gudang`)) AS `jumlah_transaksi`,(select count(`view_transaksi_gudang`.`jumlah`) from `view_transaksi_gudang` where ((`view_transaksi_gudang`.`id_gudang` = `tb_gudang`.`id_gudang`) and (`view_transaksi_gudang`.`aksi` = 'in'))) AS `jumlah_transaksi_masuk`,(select count(`view_transaksi_gudang`.`jumlah`) from `view_transaksi_gudang` where ((`view_transaksi_gudang`.`id_gudang` = `tb_gudang`.`id_gudang`) and (`view_transaksi_gudang`.`aksi` = 'out'))) AS `jumlah_transaksi_keluar` from `tb_gudang`;

-- --------------------------------------------------------

--
-- Structure for view `view_dashboard_kerugian_ayam`
--
DROP TABLE IF EXISTS `view_dashboard_kerugian_ayam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`localhost` SQL SECURITY DEFINER VIEW `view_dashboard_kerugian_ayam` AS select `view_periode_transaksi`.`tahun` AS `tahun`,`view_periode_transaksi`.`bulan` AS `bulan`,monthname(concat(`view_periode_transaksi`.`tahun`,'-',`view_periode_transaksi`.`bulan`,'-',1)) AS `monthname`,(select ifnull(sum(`tb_detail_penjualan_ayam`.`jumlah_ayam`),0) from `tb_detail_penjualan_ayam` where ((year(`tb_detail_penjualan_ayam`.`tanggal`) = `view_periode_transaksi`.`tahun`) and (month(`tb_detail_penjualan_ayam`.`tanggal`) = `view_periode_transaksi`.`bulan`))) AS `jumlah_ayam` from `view_periode_transaksi`;

-- --------------------------------------------------------

--
-- Structure for view `view_dashboard_pembelian_ayam`
--
DROP TABLE IF EXISTS `view_dashboard_pembelian_ayam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`localhost` SQL SECURITY DEFINER VIEW `view_dashboard_pembelian_ayam` AS select `view_periode_transaksi`.`tahun` AS `tahun`,`view_periode_transaksi`.`bulan` AS `bulan`,monthname(concat(`view_periode_transaksi`.`tahun`,'-',`view_periode_transaksi`.`bulan`,'-',1)) AS `monthname`,(select ifnull(sum(`tb_detail_penjualan_ayam`.`jumlah_ayam`),0) from `tb_detail_penjualan_ayam` where ((year(`tb_detail_penjualan_ayam`.`tanggal`) = `view_periode_transaksi`.`tahun`) and (month(`tb_detail_penjualan_ayam`.`tanggal`) = `view_periode_transaksi`.`bulan`))) AS `jumlah_ayam` from `view_periode_transaksi`;

-- --------------------------------------------------------

--
-- Structure for view `view_dashboard_penjualan_ayam`
--
DROP TABLE IF EXISTS `view_dashboard_penjualan_ayam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`localhost` SQL SECURITY DEFINER VIEW `view_dashboard_penjualan_ayam` AS select `tb_kandang`.`id_kandang` AS `id_kandang`,`tb_kandang`.`nama` AS `nama` from `tb_kandang`;

-- --------------------------------------------------------

--
-- Structure for view `view_history_transaksi`
--
DROP TABLE IF EXISTS `view_history_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`localhost` SQL SECURITY DEFINER VIEW `view_history_transaksi` AS (select `tb_detail_pembelian_ayam`.`id_detail_pembelian_ayam` AS `id`,`tb_detail_pembelian_ayam`.`tanggal` AS `tanggal_transaksi`,`tb_kandang`.`id_kandang` AS `id_kandang`,`tb_kandang`.`nama` AS `nama_kandang`,`tb_detail_pembelian_ayam`.`jumlah_ayam` AS `jumlah_ayam`,NULL AS `NULL`,'in' AS `ket` from (`tb_kandang` join `tb_detail_pembelian_ayam` on((`tb_detail_pembelian_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)))) union all (select `tb_detail_penjualan_ayam`.`id_detail_penjualan_ayam` AS `id_detail_penjualan_ayam`,`tb_detail_penjualan_ayam`.`tanggal` AS `tanggal_transaksi`,`tb_kandang`.`id_kandang` AS `id_kandang`,`tb_kandang`.`nama` AS `nama_kandang`,`tb_detail_penjualan_ayam`.`jumlah_ayam` AS `jumlah_ayam`,`tb_detail_penjualan_ayam`.`keterangan` AS `keterangan`,'out' AS `ket` from (`tb_detail_penjualan_ayam` join `tb_kandang` on((`tb_kandang`.`id_kandang` = `tb_detail_penjualan_ayam`.`id_kandang`)))) order by `id_kandang`,`tanggal_transaksi` desc;

-- --------------------------------------------------------

--
-- Structure for view `view_history_transaksi_gudang`
--
DROP TABLE IF EXISTS `view_history_transaksi_gudang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`localhost` SQL SECURITY DEFINER VIEW `view_history_transaksi_gudang` AS (select `tb_detail_pembelian_gudang`.`id_detail_pembelian_gudang` AS `id`,`tb_detail_pembelian_gudang`.`tanggal` AS `tanggal_transaksi`,`tb_detail_pembelian_gudang`.`id_gudang` AS `id_persediaan`,`tb_detail_pembelian_gudang`.`jumlah` AS `jumlah`,`tb_detail_pembelian_gudang`.`nominal` AS `nominal`,NULL AS `keterangan`,'beli' AS `ket` from `tb_detail_pembelian_gudang`) union all (select `tb_detail_penggunaan_gudang`.`id_detail_penggunaan_gudang` AS `id`,`tb_detail_penggunaan_gudang`.`tanggal` AS `tanggal_transaksi`,`tb_detail_penggunaan_gudang`.`id_gudang` AS `id_persediaan`,`tb_detail_penggunaan_gudang`.`jumlah` AS `jumlah`,0 AS `0`,`tb_detail_penggunaan_gudang`.`keterangan` AS `keterangan`,'jual' AS `ket` from `tb_detail_penggunaan_gudang`);

-- --------------------------------------------------------

--
-- Structure for view `view_periode_transaksi`
--
DROP TABLE IF EXISTS `view_periode_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`localhost` SQL SECURITY DEFINER VIEW `view_periode_transaksi` AS select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,1 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (1 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,2 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (2 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,3 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (3 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,4 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (4 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,5 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (5 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,6 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (6 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,7 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (7 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,8 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (8 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,9 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (9 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,10 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (10 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,11 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (11 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,12 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (12 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)));

-- --------------------------------------------------------

--
-- Structure for view `view_stok_ayam`
--
DROP TABLE IF EXISTS `view_stok_ayam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`localhost` SQL SECURITY DEFINER VIEW `view_stok_ayam` AS select `tb_kandang`.`id_kandang` AS `id_kandang`,`tb_kandang`.`nama` AS `nama`,`tb_kandang`.`id_karyawan` AS `id_karyawan`,((ifnull((select sum(`tb_detail_pembelian_ayam`.`jumlah_ayam`) from `tb_detail_pembelian_ayam` where (`tb_detail_pembelian_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)),0) - ifnull((select sum(`tb_detail_penjualan_ayam`.`jumlah_ayam`) from `tb_detail_penjualan_ayam` where (`tb_detail_penjualan_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)),0)) - ifnull((select sum(`tb_detail_kerugian_ayam`.`jumlah`) from `tb_detail_kerugian_ayam` where (`tb_detail_kerugian_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)),0)) AS `jumlah`,(select count(`view_transaksi_ayam`.`id_transaksi`) from `view_transaksi_ayam` where (`view_transaksi_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)) AS `jumlah_transaksi`,(select count(`view_transaksi_ayam`.`id_transaksi`) from `view_transaksi_ayam` where ((`view_transaksi_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`) and (`view_transaksi_ayam`.`aksi` = 'in'))) AS `jumlah_transaksi_masuk`,(select count(`view_transaksi_ayam`.`id_transaksi`) from `view_transaksi_ayam` where ((`view_transaksi_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`) and (`view_transaksi_ayam`.`aksi` = 'out'))) AS `jumlah_transaksi_keluar`,(select count(`view_transaksi_ayam`.`id_transaksi`) from `view_transaksi_ayam` where ((`view_transaksi_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`) and (`view_transaksi_ayam`.`aksi` = 'die'))) AS `jumlah_kerugian` from `tb_kandang`;

-- --------------------------------------------------------

--
-- Structure for view `view_stok_gudang`
--
DROP TABLE IF EXISTS `view_stok_gudang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`localhost` SQL SECURITY DEFINER VIEW `view_stok_gudang` AS select `tb_gudang`.`id_gudang` AS `id_gudang`,`tb_gudang`.`nama` AS `nama_gudang`,(ifnull((select sum(`view_transaksi_gudang`.`jumlah`) from `view_transaksi_gudang` where ((`view_transaksi_gudang`.`id_gudang` = `tb_gudang`.`id_gudang`) and (`view_transaksi_gudang`.`aksi` = 'in'))),0) - ifnull((select sum(`view_transaksi_gudang`.`jumlah`) from `view_transaksi_gudang` where ((`view_transaksi_gudang`.`id_gudang` = `tb_gudang`.`id_gudang`) and (`view_transaksi_gudang`.`aksi` = 'out'))),0)) AS `jumlah_gudang`,(select count(`view_transaksi_gudang`.`jumlah`) from `view_transaksi_gudang` where (`view_transaksi_gudang`.`id_gudang` = `tb_gudang`.`id_gudang`)) AS `jumlah_transaksi`,(select count(`view_transaksi_gudang`.`jumlah`) from `view_transaksi_gudang` where ((`view_transaksi_gudang`.`id_gudang` = `tb_gudang`.`id_gudang`) and (`view_transaksi_gudang`.`aksi` = 'in'))) AS `jumlah_transaksi_masuk`,(select count(`view_transaksi_gudang`.`jumlah`) from `view_transaksi_gudang` where ((`view_transaksi_gudang`.`id_gudang` = `tb_gudang`.`id_gudang`) and (`view_transaksi_gudang`.`aksi` = 'out'))) AS `jumlah_transaksi_keluar` from `tb_gudang`;

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi_ayam`
--
DROP TABLE IF EXISTS `view_transaksi_ayam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_ayam` AS select `tb_detail_pembelian_ayam`.`id_detail_pembelian_ayam` AS `id_transaksi`,`tb_detail_pembelian_ayam`.`id_kandang` AS `id_kandang`,`tb_detail_pembelian_ayam`.`id_supplier` AS `id_supplier`,`tb_detail_pembelian_ayam`.`tanggal` AS `tanggal`,`tb_detail_pembelian_ayam`.`jumlah_ayam` AS `jumlah_ayam`,'pembelian' AS `keterangan`,'in' AS `aksi`,`tb_detail_pembelian_ayam`.`id_admin` AS `id_admin`,`tb_detail_pembelian_ayam`.`id_karyawan` AS `id_karyawan`,`tb_detail_pembelian_ayam`.`update_by_karyawan` AS `update_by_karyawan`,`tb_detail_pembelian_ayam`.`update_by_admin` AS `update_by_admin`,`tb_detail_pembelian_ayam`.`created_at` AS `created_at`,`tb_detail_pembelian_ayam`.`updated_at` AS `updated_at` from `tb_detail_pembelian_ayam` union select `tb_detail_penjualan_ayam`.`id_detail_penjualan_ayam` AS `id_transaksi`,`tb_detail_penjualan_ayam`.`id_kandang` AS `id_kandang`,NULL AS `id_supplier`,`tb_detail_penjualan_ayam`.`tanggal` AS `tanggal`,`tb_detail_penjualan_ayam`.`jumlah_ayam` AS `jumlah_ayam`,`tb_detail_penjualan_ayam`.`keterangan` AS `keterangan`,'out' AS `aksi`,`tb_detail_penjualan_ayam`.`id_admin` AS `id_admin`,`tb_detail_penjualan_ayam`.`id_karyawan` AS `id_karyawan`,`tb_detail_penjualan_ayam`.`update_by_karyawan` AS `update_by_karyawan`,`tb_detail_penjualan_ayam`.`update_by_admin` AS `update_by_admin`,`tb_detail_penjualan_ayam`.`created_at` AS `created_at`,`tb_detail_penjualan_ayam`.`updated_at` AS `updated_at` from `tb_detail_penjualan_ayam` union select `tb_detail_kerugian_ayam`.`id_detail_kerugian_ayam` AS `id_transaksi`,`tb_detail_kerugian_ayam`.`id_kandang` AS `id_kandang`,NULL AS `id_supplier`,`tb_detail_kerugian_ayam`.`tanggal` AS `tanggal`,`tb_detail_kerugian_ayam`.`jumlah` AS `jumlah_ayam`,`tb_detail_kerugian_ayam`.`keterangan` AS `keterangan`,'out' AS `aksi`,`tb_detail_kerugian_ayam`.`id_admin` AS `id_admin`,`tb_detail_kerugian_ayam`.`id_karyawan` AS `id_karyawan`,`tb_detail_kerugian_ayam`.`update_by_karyawan` AS `update_by_karyawan`,`tb_detail_kerugian_ayam`.`update_by_admin` AS `update_by_admin`,`tb_detail_kerugian_ayam`.`created_at` AS `created_at`,`tb_detail_kerugian_ayam`.`updated_at` AS `updated_at` from `tb_detail_kerugian_ayam`;

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi_gudang`
--
DROP TABLE IF EXISTS `view_transaksi_gudang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_gudang` AS (select `tb_detail_pembelian_gudang`.`id_detail_pembelian_gudang` AS `id_transaksi`,'in' AS `aksi`,`tb_detail_pembelian_gudang`.`id_gudang` AS `id_gudang`,`tb_detail_pembelian_gudang`.`id_supplier` AS `id_supplier`,`tb_detail_pembelian_gudang`.`tanggal` AS `tanggal`,`tb_detail_pembelian_gudang`.`jumlah` AS `jumlah`,`tb_detail_pembelian_gudang`.`id_admin` AS `id_admin`,`tb_detail_pembelian_gudang`.`id_karyawan` AS `id_karyawan`,`tb_detail_pembelian_gudang`.`update_by_admin` AS `update_by_admin`,`tb_detail_pembelian_gudang`.`update_by_karyawan` AS `update_by_karyawan`,`tb_detail_pembelian_gudang`.`created_at` AS `created_at`,`tb_detail_pembelian_gudang`.`updated_at` AS `updated_at`,'' AS `keterangan` from `tb_detail_pembelian_gudang`) union all (select `tb_detail_penggunaan_gudang`.`id_detail_penggunaan_gudang` AS `id_detail_penggunaan_gudang`,'out' AS `aksi`,`tb_detail_penggunaan_gudang`.`id_gudang` AS `id_gudang`,NULL AS `id_supplier`,`tb_detail_penggunaan_gudang`.`tanggal` AS `tanggal`,`tb_detail_penggunaan_gudang`.`jumlah` AS `jumlah`,`tb_detail_penggunaan_gudang`.`id_admin` AS `id_admin`,`tb_detail_penggunaan_gudang`.`id_karyawan` AS `id_karyawan`,`tb_detail_penggunaan_gudang`.`update_by_admin` AS `update_by_admin`,`tb_detail_penggunaan_gudang`.`update_by_karyawan` AS `update_by_karyawan`,`tb_detail_penggunaan_gudang`.`created_at` AS `created_at`,`tb_detail_penggunaan_gudang`.`updated_at` AS `updated_at`,`tb_detail_penggunaan_gudang`.`keterangan` AS `keterangan` from `tb_detail_penggunaan_gudang`);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_kandang_persediaan`
--
ALTER TABLE `detail_kandang_persediaan`
  ADD PRIMARY KEY (`id_detail_kandang_persediaan`),
  ADD KEY `FK_detail_kandang_persediaan_kandang` (`id_kandang`),
  ADD KEY `FK_detail_kandang_persediaan_persediaan` (`id_persediaan`);

--
-- Indexes for table `detail_persediaan`
--
ALTER TABLE `detail_persediaan`
  ADD PRIMARY KEY (`id_detail_persediaan`),
  ADD KEY `FK_detail_persediaan_persediaan` (`id_persediaan`),
  ADD KEY `FK_detail_persediaan_kandang` (`id_kandang`);

--
-- Indexes for table `detail_supplier_jenis`
--
ALTER TABLE `detail_supplier_jenis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_supplier_id_jenis` (`id_supplier`,`id_jenis`),
  ADD KEY `FK_detail_supplier_jenis_type_gudang` (`id_jenis`);

--
-- Indexes for table `detail_type_supplier`
--
ALTER TABLE `detail_type_supplier`
  ADD PRIMARY KEY (`id_detail_type_supplier`),
  ADD KEY `FK_detail_type_supplier_supplier` (`id_supplier`),
  ADD KEY `FK_detail_type_supplier_type_supplier` (`id_gudang`);

--
-- Indexes for table `kandang_persediaan_history`
--
ALTER TABLE `kandang_persediaan_history`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pembelian_id_vaksin_tanggal` (`id_pembelian`,`id_persediaan`,`tanggal`),
  ADD KEY `FK_kadang_vaksin_history_vaksin` (`id_persediaan`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usernmae` (`username`);

--
-- Indexes for table `tb_detail_kerugian_ayam`
--
ALTER TABLE `tb_detail_kerugian_ayam`
  ADD PRIMARY KEY (`id_detail_kerugian_ayam`),
  ADD KEY `FK_tb_detail_kerugian_ayam_tb_kandang` (`id_kandang`),
  ADD KEY `FK_tb_detail_kerugian_ayam_tb_admin` (`id_admin`),
  ADD KEY `FK_tb_detail_kerugian_ayam_tb_karyawan` (`id_karyawan`),
  ADD KEY `FK_tb_detail_kerugian_ayam_tb_admin_2` (`update_by_admin`),
  ADD KEY `FK_tb_detail_kerugian_ayam_tb_karyawan_2` (`update_by_karyawan`);

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

--
-- Indexes for table `tb_detail_pembelian_gudang`
--
ALTER TABLE `tb_detail_pembelian_gudang`
  ADD PRIMARY KEY (`id_detail_pembelian_gudang`),
  ADD KEY `FK_tb_detail_pembelian_gudang_tb_supplier` (`id_supplier`),
  ADD KEY `FK_tb_detail_pembelian_gudang_tb_gudang` (`id_gudang`),
  ADD KEY `FK_tb_detail_pembelian_gudang_tb_admin` (`id_admin`),
  ADD KEY `FK_tb_detail_pembelian_gudang_tb_karyawan` (`id_karyawan`),
  ADD KEY `FK_tb_detail_pembelian_gudang_tb_karyawan_2` (`update_by_karyawan`),
  ADD KEY `FK_tb_detail_pembelian_gudang_tb_admin_2` (`update_by_admin`);

--
-- Indexes for table `tb_detail_penggunaan_gudang`
--
ALTER TABLE `tb_detail_penggunaan_gudang`
  ADD PRIMARY KEY (`id_detail_penggunaan_gudang`),
  ADD KEY `FK_tb_detail_penggunaan_gudang_tb_gudang` (`id_gudang`),
  ADD KEY `FK_tb_detail_penggunaan_gudang_tb_karyawan` (`id_karyawan`),
  ADD KEY `FK_tb_detail_penggunaan_gudang_tb_admin` (`id_admin`),
  ADD KEY `FK_tb_detail_penggunaan_gudang_tb_karyawan_2` (`update_by_karyawan`),
  ADD KEY `FK_tb_detail_penggunaan_gudang_tb_admin_2` (`update_by_admin`);

--
-- Indexes for table `tb_detail_penjualan_ayam`
--
ALTER TABLE `tb_detail_penjualan_ayam`
  ADD PRIMARY KEY (`id_detail_penjualan_ayam`),
  ADD KEY `FK_tb_detail_penjualan_ayam_tb_kandang` (`id_kandang`),
  ADD KEY `FK_tb_detail_penjualan_ayam_tb_karyawan` (`id_karyawan`),
  ADD KEY `FK_tb_detail_penjualan_ayam_tb_admin` (`id_admin`),
  ADD KEY `FK_tb_detail_penjualan_ayam_tb_karyawan_2` (`update_by_karyawan`),
  ADD KEY `FK_tb_detail_penjualan_ayam_tb_admin_2` (`update_by_admin`);

--
-- Indexes for table `tb_detail_supplier_jenis`
--
ALTER TABLE `tb_detail_supplier_jenis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_supplier_id_jenis` (`id_supplier`,`id_gudang`),
  ADD KEY `FK_detail_supplier_jenis_type_gudang` (`id_gudang`);

--
-- Indexes for table `tb_detail_type_supplier`
--
ALTER TABLE `tb_detail_type_supplier`
  ADD PRIMARY KEY (`id_detail_type_supplier`),
  ADD KEY `FK_tb_detail_type_supplier_tb_gudang` (`id_gudang`),
  ADD KEY `FK_tb_detail_type_supplier_tb_supplier` (`id_supplier`);

--
-- Indexes for table `tb_gudang`
--
ALTER TABLE `tb_gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indexes for table `tb_jadwal_kandang`
--
ALTER TABLE `tb_jadwal_kandang`
  ADD PRIMARY KEY (`id_jadwal_kandang`),
  ADD KEY `id_kandang` (`id_kandang`),
  ADD KEY `id_persediaan` (`id_gudang`);

--
-- Indexes for table `tb_kandang`
--
ALTER TABLE `tb_kandang`
  ADD PRIMARY KEY (`id_kandang`),
  ADD KEY `FK_tb_kandang_tb_karyawan` (`id_karyawan`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_supplier_jenis`
--
ALTER TABLE `detail_supplier_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `kandang_persediaan_history`
--
ALTER TABLE `kandang_persediaan_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_detail_supplier_jenis`
--
ALTER TABLE `tb_detail_supplier_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_kandang_persediaan`
--
ALTER TABLE `detail_kandang_persediaan`
  ADD CONSTRAINT `FK_detail_kandang_persediaan_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id_kandang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_detail_kandang_persediaan_persediaan` FOREIGN KEY (`id_persediaan`) REFERENCES `persediaan` (`id_persediaan`) ON UPDATE CASCADE;

--
-- Constraints for table `detail_persediaan`
--
ALTER TABLE `detail_persediaan`
  ADD CONSTRAINT `FK_detail_persediaan_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id_kandang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_detail_persediaan_persediaan` FOREIGN KEY (`id_persediaan`) REFERENCES `persediaan` (`id_persediaan`) ON UPDATE CASCADE;

--
-- Constraints for table `detail_supplier_jenis`
--
ALTER TABLE `detail_supplier_jenis`
  ADD CONSTRAINT `FK_detail_supplier_jenis_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_detail_supplier_jenis_type_gudang` FOREIGN KEY (`id_jenis`) REFERENCES `persediaan` (`id_persediaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_type_supplier`
--
ALTER TABLE `detail_type_supplier`
  ADD CONSTRAINT `FK_detail_type_supplier_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_detail_type_supplier_type_supplier` FOREIGN KEY (`id_gudang`) REFERENCES `type_supplier` (`id_type_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_detail_kerugian_ayam`
--
ALTER TABLE `tb_detail_kerugian_ayam`
  ADD CONSTRAINT `FK_tb_detail_kerugian_ayam_tb_admin` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_kerugian_ayam_tb_admin_2` FOREIGN KEY (`update_by_admin`) REFERENCES `tb_admin` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_kerugian_ayam_tb_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `tb_kandang` (`id_kandang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_kerugian_ayam_tb_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_kerugian_ayam_tb_karyawan_2` FOREIGN KEY (`update_by_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_detail_pembelian_ayam`
--
ALTER TABLE `tb_detail_pembelian_ayam`
  ADD CONSTRAINT `FK_tb_detail_pembelian_ayam_tb_admin` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_pembelian_ayam_tb_admin_2` FOREIGN KEY (`update_by_admin`) REFERENCES `tb_admin` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_pembelian_ayam_tb_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `tb_kandang` (`id_kandang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_pembelian_ayam_tb_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_pembelian_ayam_tb_karyawan_2` FOREIGN KEY (`update_by_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_pembelian_ayam_tb_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_detail_pembelian_gudang`
--
ALTER TABLE `tb_detail_pembelian_gudang`
  ADD CONSTRAINT `FK_tb_detail_pembelian_gudang_tb_admin` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_pembelian_gudang_tb_admin_2` FOREIGN KEY (`update_by_admin`) REFERENCES `tb_admin` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_pembelian_gudang_tb_gudang` FOREIGN KEY (`id_gudang`) REFERENCES `tb_gudang` (`id_gudang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_pembelian_gudang_tb_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_pembelian_gudang_tb_karyawan_2` FOREIGN KEY (`update_by_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_pembelian_gudang_tb_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_detail_penggunaan_gudang`
--
ALTER TABLE `tb_detail_penggunaan_gudang`
  ADD CONSTRAINT `FK_tb_detail_penggunaan_gudang_tb_admin` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_penggunaan_gudang_tb_admin_2` FOREIGN KEY (`update_by_admin`) REFERENCES `tb_admin` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_penggunaan_gudang_tb_gudang` FOREIGN KEY (`id_gudang`) REFERENCES `tb_gudang` (`id_gudang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_penggunaan_gudang_tb_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_penggunaan_gudang_tb_karyawan_2` FOREIGN KEY (`update_by_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_detail_penjualan_ayam`
--
ALTER TABLE `tb_detail_penjualan_ayam`
  ADD CONSTRAINT `FK_tb_detail_penjualan_ayam_tb_admin` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_penjualan_ayam_tb_admin_2` FOREIGN KEY (`update_by_admin`) REFERENCES `tb_admin` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_penjualan_ayam_tb_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `tb_kandang` (`id_kandang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_penjualan_ayam_tb_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_penjualan_ayam_tb_karyawan_2` FOREIGN KEY (`update_by_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_detail_supplier_jenis`
--
ALTER TABLE `tb_detail_supplier_jenis`
  ADD CONSTRAINT `FK_tb_detail_supplier_jenis_tb_gudang` FOREIGN KEY (`id_gudang`) REFERENCES `tb_gudang` (`id_gudang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_supplier_jenis_tb_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_detail_type_supplier`
--
ALTER TABLE `tb_detail_type_supplier`
  ADD CONSTRAINT `FK_tb_detail_type_supplier_tb_gudang` FOREIGN KEY (`id_gudang`) REFERENCES `tb_gudang` (`id_gudang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_detail_type_supplier_tb_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_jadwal_kandang`
--
ALTER TABLE `tb_jadwal_kandang`
  ADD CONSTRAINT `FK_tb_jadwal_kandang_tb_gudang` FOREIGN KEY (`id_gudang`) REFERENCES `tb_gudang` (`id_gudang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_jadwal_kandang_tb_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `tb_kandang` (`id_kandang`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_kandang`
--
ALTER TABLE `tb_kandang`
  ADD CONSTRAINT `FK_tb_kandang_tb_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
