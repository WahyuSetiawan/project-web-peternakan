-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.2-dmr - MySQL Community Server (GPL)
-- Server OS:                    Linux
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for peternakan_app
CREATE DATABASE IF NOT EXISTS `peternakan_app` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `peternakan_app`;

-- Dumping structure for table peternakan_app.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usernmae` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.admin: ~-1 rows (approximately)
DELETE FROM `admin`;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `nama`, `username`, `password`) VALUES
	(5, 'Usman', 'admin', '$1$cQ2./l0.$2EEzCFuqA2rIOq1.sNTtD1'),
	(6, 'Owner', 'aaa', '$1$S/1.zk4.$0qKF24Yg2XvO67EHRk7eS.');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.detail_kandang_persediaan
CREATE TABLE IF NOT EXISTS `detail_kandang_persediaan` (
  `id_detail_kandang_persediaan` varchar(7) NOT NULL,
  `id_kandang` varchar(7) NOT NULL DEFAULT '0',
  `id_persediaan` varchar(7) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_detail_kandang_persediaan`),
  KEY `FK_detail_kandang_persediaan_kandang` (`id_kandang`),
  KEY `FK_detail_kandang_persediaan_persediaan` (`id_persediaan`),
  CONSTRAINT `FK_detail_kandang_persediaan_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id_kandang`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_kandang_persediaan_persediaan` FOREIGN KEY (`id_persediaan`) REFERENCES `persediaan` (`id_persediaan`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.detail_kandang_persediaan: ~-1 rows (approximately)
DELETE FROM `detail_kandang_persediaan`;
/*!40000 ALTER TABLE `detail_kandang_persediaan` DISABLE KEYS */;
INSERT INTO `detail_kandang_persediaan` (`id_detail_kandang_persediaan`, `id_kandang`, `id_persediaan`) VALUES
	('MP_0001', 'KD_0001', 'PR_0002');
/*!40000 ALTER TABLE `detail_kandang_persediaan` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.detail_pembelian_ayam
CREATE TABLE IF NOT EXISTS `detail_pembelian_ayam` (
  `id_detail_pembelian_ayam` varchar(7) NOT NULL,
  `id_kandang` varchar(7) NOT NULL,
  `id_supplier` varchar(7) DEFAULT NULL,
  `id_karyawan` varchar(7) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jumlah_ayam` int(11) NOT NULL,
  `update_by_admin` int(11) DEFAULT NULL,
  `update_by_karyawan` varchar(7) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detail_pembelian_ayam`),
  KEY `FK_detail_pemasukan_ayam_kandang` (`id_kandang`),
  KEY `FK_detail_pembelian_ayam_supplier` (`id_supplier`),
  KEY `FK_detail_pembelian_ayam_karyawan` (`id_karyawan`),
  KEY `FK_detail_pembelian_ayam_admin` (`id_admin`),
  KEY `FK_detail_pembelian_ayam_admin_2` (`update_by_admin`),
  KEY `FK_detail_pembelian_ayam_karyawan_2` (`update_by_karyawan`),
  CONSTRAINT `FK_detail_pembelian_ayam_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pembelian_ayam_admin_2` FOREIGN KEY (`update_by_admin`) REFERENCES `admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pembelian_ayam_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id_kandang`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pembelian_ayam_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pembelian_ayam_karyawan_2` FOREIGN KEY (`update_by_karyawan`) REFERENCES `karyawan` (`id_karyawan`),
  CONSTRAINT `FK_detail_pembelian_ayam_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.detail_pembelian_ayam: ~-1 rows (approximately)
DELETE FROM `detail_pembelian_ayam`;
/*!40000 ALTER TABLE `detail_pembelian_ayam` DISABLE KEYS */;
INSERT INTO `detail_pembelian_ayam` (`id_detail_pembelian_ayam`, `id_kandang`, `id_supplier`, `id_karyawan`, `id_admin`, `tanggal`, `jumlah_ayam`, `update_by_admin`, `update_by_karyawan`, `created_at`, `updated_at`) VALUES
	('MA_0019', 'KD_0001', 'SP_0001', NULL, 5, '2018-11-12 00:00:00', 120, NULL, NULL, '2019-01-01 13:07:21', NULL),
	('MA_0020', 'KD_0001', 'SP_0001', 'KR_0002', NULL, '2018-11-12 00:00:00', 120, 5, NULL, '2019-01-01 13:07:26', '2019-01-01 13:38:55'),
	('MA_0021', 'KD_0003', 'SP_0001', NULL, 5, '0000-00-00 00:00:00', 100, NULL, NULL, '2019-01-03 20:59:17', NULL),
	('MA_0022', 'KD_0002', 'SP_0001', NULL, 5, '0000-00-00 00:00:00', 200, NULL, NULL, '2019-01-03 20:59:30', NULL);
/*!40000 ALTER TABLE `detail_pembelian_ayam` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.detail_pembelian_gudang
CREATE TABLE IF NOT EXISTS `detail_pembelian_gudang` (
  `id_detail_pembelian_gudang` varchar(7) NOT NULL,
  `id_supplier` varchar(7) DEFAULT NULL,
  `id_persediaan` varchar(7) NOT NULL,
  `id_pemasukan_ayam` varchar(7) DEFAULT NULL,
  `id_karyawan` varchar(7) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `nominal` int(11) NOT NULL DEFAULT '0',
  `update_by_karyawan` varchar(7) DEFAULT NULL,
  `update_by_admin` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detail_pembelian_gudang`),
  KEY `FK_detail_pembelian_gudang_supplier` (`id_supplier`),
  KEY `FK_detail_pembelian_gudang_persediaan` (`id_persediaan`),
  KEY `FK_detail_pembelian_gudang_detail_pemasukan_ayam` (`id_pemasukan_ayam`),
  KEY `FK_detail_pembelian_gudang_karyawan` (`id_karyawan`),
  KEY `FK_detail_pembelian_gudang_admin` (`update_by_admin`),
  KEY `FK_detail_pembelian_gudang_admin_2` (`id_admin`),
  KEY `FK_detail_pembelian_gudang_karyawan_2` (`update_by_karyawan`),
  CONSTRAINT `FK_detail_pembelian_gudang_admin` FOREIGN KEY (`update_by_admin`) REFERENCES `admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pembelian_gudang_admin_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pembelian_gudang_detail_pemasukan_ayam` FOREIGN KEY (`id_pemasukan_ayam`) REFERENCES `detail_pemasukan_ayam` (`id_detail_pemasukan_ayam`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pembelian_gudang_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pembelian_gudang_karyawan_2` FOREIGN KEY (`update_by_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pembelian_gudang_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pembelian_gudang_type_gudang` FOREIGN KEY (`id_persediaan`) REFERENCES `type_gudang` (`id_type_gudang`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.detail_pembelian_gudang: ~-1 rows (approximately)
DELETE FROM `detail_pembelian_gudang`;
/*!40000 ALTER TABLE `detail_pembelian_gudang` DISABLE KEYS */;
INSERT INTO `detail_pembelian_gudang` (`id_detail_pembelian_gudang`, `id_supplier`, `id_persediaan`, `id_pemasukan_ayam`, `id_karyawan`, `id_admin`, `tanggal`, `jumlah`, `nominal`, `update_by_karyawan`, `update_by_admin`, `created_at`, `updated_at`) VALUES
	('MG_0004', 'SP_0004', 'TG_0002', 'MA_0013', NULL, 6, '2018-08-27 01:37:24', 10, 1, NULL, NULL, '2019-01-01 15:39:48', NULL),
	('MG_0005', 'SP_0004', 'TG_0001', 'MA_0013', NULL, 6, '2018-08-27 01:37:43', 100, 1, NULL, 5, '2019-01-01 15:39:52', '2019-01-01 15:44:43'),
	('MG_0006', 'SP_0004', 'TG_0001', NULL, 'KR_0002', NULL, '2018-11-12 00:00:00', 120, 0, 'KR_0001', NULL, '2019-01-01 15:39:54', NULL);
/*!40000 ALTER TABLE `detail_pembelian_gudang` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.detail_pengeluaran_gudang
CREATE TABLE IF NOT EXISTS `detail_pengeluaran_gudang` (
  `id_detail_pengeluaran_gudang` varchar(7) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_kandang` varchar(7) DEFAULT NULL,
  `id_persediaan` varchar(7) NOT NULL,
  `id_pemasukan_ayam` varchar(7) DEFAULT NULL,
  `id_karyawan` varchar(7) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `keterangan` text,
  `update_by_karyawan` varchar(7) DEFAULT NULL,
  `update_by_admin` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detail_pengeluaran_gudang`),
  KEY `FK_detail_pengeluaran_gudang_persediaan` (`id_persediaan`),
  KEY `FK_detail_pengeluaran_gudang_detail_pemasukan_ayam` (`id_pemasukan_ayam`),
  KEY `FK_detail_pengeluaran_gudang_karyawan` (`id_karyawan`),
  KEY `FK_detail_pengeluaran_gudang_kandang` (`id_kandang`),
  KEY `FK_detail_pengeluaran_gudang_admin` (`id_admin`),
  KEY `FK_detail_pengeluaran_gudang_karyawan_2` (`update_by_karyawan`),
  KEY `FK_detail_pengeluaran_gudang_admin_2` (`update_by_admin`),
  CONSTRAINT `FK_detail_pengeluaran_gudang_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pengeluaran_gudang_admin_2` FOREIGN KEY (`update_by_admin`) REFERENCES `admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pengeluaran_gudang_detail_pemasukan_ayam` FOREIGN KEY (`id_pemasukan_ayam`) REFERENCES `detail_pemasukan_ayam` (`id_detail_pemasukan_ayam`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pengeluaran_gudang_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id_kandang`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pengeluaran_gudang_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pengeluaran_gudang_karyawan_2` FOREIGN KEY (`update_by_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pengeluaran_gudang_type_gudang` FOREIGN KEY (`id_persediaan`) REFERENCES `type_gudang` (`id_type_gudang`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.detail_pengeluaran_gudang: ~-1 rows (approximately)
DELETE FROM `detail_pengeluaran_gudang`;
/*!40000 ALTER TABLE `detail_pengeluaran_gudang` DISABLE KEYS */;
INSERT INTO `detail_pengeluaran_gudang` (`id_detail_pengeluaran_gudang`, `tanggal`, `id_kandang`, `id_persediaan`, `id_pemasukan_ayam`, `id_karyawan`, `id_admin`, `jumlah`, `keterangan`, `update_by_karyawan`, `update_by_admin`, `created_at`, `updated_at`) VALUES
	('KG_0007', '2018-11-12 00:00:00', NULL, 'TG_0002', NULL, NULL, NULL, 129, 'Kerusakan', NULL, 5, '2019-01-01 13:06:24', '2019-01-01 17:30:29'),
	('KG_0008', '2019-01-01 00:00:00', NULL, 'TG_0001', NULL, NULL, NULL, 12, '', NULL, NULL, '2019-01-01 17:04:05', '2019-01-01 17:23:06'),
	('KG_0009', '2019-01-01 00:00:00', NULL, 'TG_0001', NULL, NULL, 5, 12, '', NULL, NULL, '2019-01-01 17:08:49', '2019-01-01 17:23:09');
/*!40000 ALTER TABLE `detail_pengeluaran_gudang` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.detail_penjualan_ayam
CREATE TABLE IF NOT EXISTS `detail_penjualan_ayam` (
  `id_detail_penjualan_ayam` varchar(7) NOT NULL,
  `id_kandang` varchar(7) DEFAULT NULL,
  `id_karyawan` varchar(7) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jumlah_ayam` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `update_by_karyawan` varchar(7) DEFAULT NULL,
  `update_by_admin` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detail_penjualan_ayam`),
  KEY `FK_detail_penjualan_ayam_kandang` (`id_kandang`),
  KEY `FK_detail_penjualan_ayam_karyawan` (`id_karyawan`),
  KEY `FK_detail_penjualan_ayam_admin` (`id_admin`),
  KEY `FK_detail_penjualan_ayam_karyawan_2` (`update_by_karyawan`),
  KEY `FK_detail_penjualan_ayam_admin_2` (`update_by_admin`),
  CONSTRAINT `FK_detail_penjualan_ayam_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_penjualan_ayam_admin_2` FOREIGN KEY (`update_by_admin`) REFERENCES `admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_penjualan_ayam_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id_kandang`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_penjualan_ayam_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_penjualan_ayam_karyawan_2` FOREIGN KEY (`update_by_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.detail_penjualan_ayam: ~-1 rows (approximately)
DELETE FROM `detail_penjualan_ayam`;
/*!40000 ALTER TABLE `detail_penjualan_ayam` DISABLE KEYS */;
INSERT INTO `detail_penjualan_ayam` (`id_detail_penjualan_ayam`, `id_kandang`, `id_karyawan`, `id_admin`, `tanggal`, `jumlah_ayam`, `keterangan`, `update_by_karyawan`, `update_by_admin`, `created_at`, `updated_at`) VALUES
	('KA_0001', 'KD_0002', 'KR_0002', NULL, '2018-11-12 00:00:00', 12, 'asdf', NULL, 5, '2019-01-01 20:05:17', '2019-01-01 14:58:18'),
	('KA_0002', 'KD_0002', 'KR_0002', NULL, '2018-12-12 00:00:00', 120, 'asdf', NULL, NULL, '2019-01-01 20:05:18', NULL);
/*!40000 ALTER TABLE `detail_penjualan_ayam` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.detail_persediaan
CREATE TABLE IF NOT EXISTS `detail_persediaan` (
  `id_detail_persediaan` varchar(7) NOT NULL,
  `id_persediaan` varchar(7) DEFAULT NULL,
  `id_kandang` varchar(7) DEFAULT NULL,
  `type_durasi` enum('MONTHLY','DAILY','YEARLY') DEFAULT 'MONTHLY',
  `durasi` int(11) DEFAULT '1',
  `type` enum('event-important','event-success','event-warning','event-info','event-inverse','event-special') DEFAULT 'event-info',
  PRIMARY KEY (`id_detail_persediaan`),
  KEY `FK_detail_persediaan_persediaan` (`id_persediaan`),
  KEY `FK_detail_persediaan_kandang` (`id_kandang`),
  CONSTRAINT `FK_detail_persediaan_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id_kandang`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_persediaan_persediaan` FOREIGN KEY (`id_persediaan`) REFERENCES `persediaan` (`id_persediaan`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.detail_persediaan: ~-1 rows (approximately)
DELETE FROM `detail_persediaan`;
/*!40000 ALTER TABLE `detail_persediaan` DISABLE KEYS */;
INSERT INTO `detail_persediaan` (`id_detail_persediaan`, `id_persediaan`, `id_kandang`, `type_durasi`, `durasi`, `type`) VALUES
	('DP_0001', 'PR_0002', 'KD_0001', 'DAILY', 3, 'event-special'),
	('DP_0004', 'PR_0003', 'KD_0001', 'MONTHLY', 1, 'event-important'),
	('DP_0005', 'PR_0003', 'KD_0002', 'MONTHLY', 1, 'event-important'),
	('DP_0007', 'PR_0004', 'KD_0001', 'DAILY', 1, 'event-info'),
	('DP_0008', 'PR_0004', 'KD_0002', 'DAILY', 1, 'event-warning'),
	('DP_0009', 'PR_0002', 'KD_0003', 'MONTHLY', 1, 'event-info');
/*!40000 ALTER TABLE `detail_persediaan` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.detail_supplier_jenis
CREATE TABLE IF NOT EXISTS `detail_supplier_jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_supplier` varchar(7) NOT NULL,
  `id_jenis` varchar(7) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_supplier_id_jenis` (`id_supplier`,`id_jenis`),
  KEY `FK_detail_supplier_jenis_type_gudang` (`id_jenis`),
  CONSTRAINT `FK_detail_supplier_jenis_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_supplier_jenis_type_gudang` FOREIGN KEY (`id_jenis`) REFERENCES `type_gudang` (`id_type_gudang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.detail_supplier_jenis: ~-1 rows (approximately)
DELETE FROM `detail_supplier_jenis`;
/*!40000 ALTER TABLE `detail_supplier_jenis` DISABLE KEYS */;
INSERT INTO `detail_supplier_jenis` (`id`, `id_supplier`, `id_jenis`) VALUES
	(2, 'SP_0001', 'TG_0002'),
	(4, 'SP_0004', 'TG_0001'),
	(3, 'SP_0004', 'TG_0002');
/*!40000 ALTER TABLE `detail_supplier_jenis` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.detail_type_supplier
CREATE TABLE IF NOT EXISTS `detail_type_supplier` (
  `id_detail_type_supplier` varchar(8) NOT NULL,
  `id_supplier` varchar(7) NOT NULL,
  `id_type_supplier` varchar(7) NOT NULL,
  PRIMARY KEY (`id_detail_type_supplier`),
  KEY `FK_detail_type_supplier_supplier` (`id_supplier`),
  KEY `FK_detail_type_supplier_type_supplier` (`id_type_supplier`),
  CONSTRAINT `FK_detail_type_supplier_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_type_supplier_type_supplier` FOREIGN KEY (`id_type_supplier`) REFERENCES `type_supplier` (`id_type_supplier`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.detail_type_supplier: ~-1 rows (approximately)
DELETE FROM `detail_type_supplier`;
/*!40000 ALTER TABLE `detail_type_supplier` DISABLE KEYS */;
INSERT INTO `detail_type_supplier` (`id_detail_type_supplier`, `id_supplier`, `id_type_supplier`) VALUES
	('DTS_0001', 'SP_0004', 'TS_0001');
/*!40000 ALTER TABLE `detail_type_supplier` ENABLE KEYS */;

-- Dumping structure for function peternakan_app.function_detail_type_supplier
DELIMITER //
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
end//
DELIMITER ;

-- Dumping structure for function peternakan_app.function_id_detail_kandang_persediaan
DELIMITER //
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
end//
DELIMITER ;

-- Dumping structure for function peternakan_app.function_id_detail_pembelian_ayam
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_detail_pembelian_ayam`() RETURNS varchar(7) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	declare initial varchar(3);
	
	set initial = 'MA_';
	
	select count(*) into count_id from detail_pembelian_ayam where id_detail_pembelian_ayam like concat(initial, '%');
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_detail_pembelian_ayam), 5) + 1 into id from detail_pembelian_ayam where id_detail_pembelian_ayam like concat(initial, '%');
	end if;
	
	set code = concat('00000', id);
	set code = concat(initial, substring(code, LENGTH(code) - 3));
	
	return code;
end//
DELIMITER ;

-- Dumping structure for function peternakan_app.function_id_detail_pembelian_gudang
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_detail_pembelian_gudang`() RETURNS varchar(7) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	declare initial varchar(3);
	
	set initial = 'MG_';
	
	select count(*) into count_id from detail_pembelian_gudang where id_detail_pembelian_gudang like concat(initial, '%');
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_detail_pembelian_gudang), 5) + 1 into id from detail_pembelian_gudang where id_detail_pembelian_gudang like concat(initial, '%');
	end if;
	
	set code = concat('00000', id);
	set code = concat(initial, substring(code, LENGTH(code) - 3));
	
	return code;
end//
DELIMITER ;

-- Dumping structure for function peternakan_app.function_id_detail_pengeluaran_gudang
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_detail_pengeluaran_gudang`() RETURNS varchar(7) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	declare initial varchar(3);
	
	set initial = 'KG_';
	
	select count(*) into count_id from detail_pengeluaran_gudang where id_detail_pengeluaran_gudang like concat(initial, '%');
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_detail_pengeluaran_gudang), 5) + 1 into id from detail_pengeluaran_gudang where id_detail_pengeluaran_gudang like concat(initial, '%');
	end if;
	
	set code = concat('00000', id);
	set code = concat(initial, substring(code, LENGTH(code) - 3));
	
	return code;
end//
DELIMITER ;

-- Dumping structure for function peternakan_app.function_id_detail_penjualan_ayam
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_detail_penjualan_ayam`() RETURNS varchar(7) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	declare initial varchar(3);
	
	set initial = 'KA_';
	
	select count(*) into count_id from detail_penjualan_ayam where id_detail_penjualan_ayam like concat(initial, '%');
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_detail_penjualan_ayam), 5) + 1 into id from detail_penjualan_ayam where id_detail_penjualan_ayam like concat(initial, '%');
	end if;
	
	set code = concat('00000', id);
	set code = concat(initial, substring(code, LENGTH(code) - 3));
	
	return code;
end//
DELIMITER ;

-- Dumping structure for function peternakan_app.function_id_detail_persediaan
DELIMITER //
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
end//
DELIMITER ;

-- Dumping structure for function peternakan_app.function_id_jadwal_kandang
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_jadwal_kandang`() RETURNS varchar(7) CHARSET utf8mb4
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	
	select count(*) into count_id from jadwal_kandang;
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_jadwal_kandang), 5) + 1 into id from jadwal_kandang;
	end if;
	
	set code = concat('00000', id);
	set code = concat('JK_', substring(code, LENGTH(code) - 3));
	
	return code;
end//
DELIMITER ;

-- Dumping structure for function peternakan_app.function_id_kandang
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_kandang`() RETURNS varchar(7) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	
	select count(*) into count_id from kandang;
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_kandang), 5) + 1 into id from kandang;
	end if;
	
	set code = concat('00000', id);
	set code = concat('KD_', substring(code, LENGTH(code) - 3));
	
	return code;
end//
DELIMITER ;

-- Dumping structure for function peternakan_app.function_id_karyawan
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_karyawan`() RETURNS varchar(7) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	
	select count(*) into count_id from karyawan;
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_karyawan), 5) + 1 into id from karyawan;
	end if;
	
	set code = concat('00000', id);
	set code = concat('KR_', substring(code, LENGTH(code) - 3));
	
	return code;
end//
DELIMITER ;

-- Dumping structure for function peternakan_app.function_id_persediaan
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_persediaan`() RETURNS varchar(7) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	
	select count(*) into count_id from persediaan;
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_persediaan), 5) + 1 into id from persediaan;
	end if;
	
	set code = concat('00000', id);
	set code = concat('PR_', substring(code, LENGTH(code) - 3));
	
	return code;
end//
DELIMITER ;

-- Dumping structure for function peternakan_app.function_id_supplier
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_supplier`() RETURNS varchar(7) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	
	select count(*) into count_id from supplier;
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_supplier), 5) + 1 into id from supplier;
	end if;
	
	set code = concat('00000', id);
	set code = concat('SP_', substring(code, LENGTH(code) - 3));
	
	return code;
end//
DELIMITER ;

-- Dumping structure for function peternakan_app.function_id_type_gudang
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_type_gudang`() RETURNS varchar(10) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	
	select count(*) into count_id from type_gudang;
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_type_gudang), 5) + 1 into id from type_gudang;
	end if;
	
	set code = concat('00000', id);
	set code = concat('TG_', substring(code, LENGTH(code) - 3));
	
	return code;
end//
DELIMITER ;

-- Dumping structure for function peternakan_app.function_id_type_supplier
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_type_supplier`() RETURNS varchar(10) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	
	select count(*) into count_id from type_supplier;
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_type_supplier), 5) + 1 into id from type_supplier;
	end if;
	
	set code = concat('00000', id);
	set code = concat('TS_', substring(code, LENGTH(code) - 3));
	
	return code;
end//
DELIMITER ;

-- Dumping structure for table peternakan_app.jadwal_kandang
CREATE TABLE IF NOT EXISTS `jadwal_kandang` (
  `id_jadwal_kandang` varchar(7) NOT NULL,
  `id_kandang` varchar(7) NOT NULL,
  `hari` int(11) NOT NULL,
  `id_persediaan` varchar(7) NOT NULL,
  `catatan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_jadwal_kandang`),
  KEY `id_kandang` (`id_kandang`),
  KEY `id_persediaan` (`id_persediaan`),
  CONSTRAINT `FK_jadwal_kandang_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id_kandang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_jadwal_kandang_type_gudang` FOREIGN KEY (`id_persediaan`) REFERENCES `type_gudang` (`id_type_gudang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.jadwal_kandang: ~-1 rows (approximately)
DELETE FROM `jadwal_kandang`;
/*!40000 ALTER TABLE `jadwal_kandang` DISABLE KEYS */;
INSERT INTO `jadwal_kandang` (`id_jadwal_kandang`, `id_kandang`, `hari`, `id_persediaan`, `catatan`, `created_at`, `updated_at`) VALUES
	('JK_0001', 'KD_0002', 0, 'TG_0001', 'dfgsdfg', '2019-01-02 16:58:08', '2019-01-02 18:23:41'),
	('JK_0002', 'KD_0002', 0, 'TG_0002', '', '2019-01-03 18:27:39', NULL),
	('JK_0003', 'KD_0001', 0, 'TG_0001', '', '2019-01-03 19:19:48', NULL),
	('JK_0004', 'KD_0001', 0, 'TG_0001', '', '2019-01-03 19:19:51', NULL),
	('JK_0005', 'KD_0001', 0, 'TG_0001', '', '2019-01-03 19:19:54', NULL);
/*!40000 ALTER TABLE `jadwal_kandang` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.kandang
CREATE TABLE IF NOT EXISTS `kandang` (
  `id_kandang` varchar(7) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `id_karyawan` varchar(7) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kandang`),
  KEY `kandang_karyawan_FK` (`id_karyawan`),
  CONSTRAINT `kandang_karyawan_FK` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.kandang: ~-1 rows (approximately)
DELETE FROM `kandang`;
/*!40000 ALTER TABLE `kandang` DISABLE KEYS */;
INSERT INTO `kandang` (`id_kandang`, `nama`, `id_karyawan`, `created_at`, `updated_at`) VALUES
	('KD_0001', 'kandang 1', 'KR_0001', '2019-01-02 14:34:52', NULL),
	('KD_0002', 'kandang 2', 'KR_0001', '2019-01-02 14:34:52', NULL),
	('KD_0003', 'kandang 3', 'KR_0002', '2019-01-02 14:34:52', NULL),
	('KD_0004', 'kandang 4', 'KR_0001', '2019-01-03 19:23:06', NULL),
	('KD_0005', 'kandang 5', 'KR_0001', '2019-01-03 19:23:19', NULL);
/*!40000 ALTER TABLE `kandang` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.kandang_persediaan_history
CREATE TABLE IF NOT EXISTS `kandang_persediaan_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembelian` int(11) NOT NULL,
  `id_persediaan` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT '0000-00-00',
  `jumlah` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_pembelian_id_vaksin_tanggal` (`id_pembelian`,`id_persediaan`,`tanggal`),
  KEY `FK_kadang_vaksin_history_vaksin` (`id_persediaan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.kandang_persediaan_history: ~-1 rows (approximately)
DELETE FROM `kandang_persediaan_history`;
/*!40000 ALTER TABLE `kandang_persediaan_history` DISABLE KEYS */;
INSERT INTO `kandang_persediaan_history` (`id`, `id_pembelian`, `id_persediaan`, `tanggal`, `jumlah`) VALUES
	(7, 15, 2, '2018-07-25', 0),
	(8, 15, 4, '2018-08-27', 0);
/*!40000 ALTER TABLE `kandang_persediaan_history` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.karyawan
CREATE TABLE IF NOT EXISTS `karyawan` (
  `id_karyawan` varchar(7) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text,
  `hint` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.karyawan: ~-1 rows (approximately)
DELETE FROM `karyawan`;
/*!40000 ALTER TABLE `karyawan` DISABLE KEYS */;
INSERT INTO `karyawan` (`id_karyawan`, `nama`, `no_hp`, `username`, `password`, `hint`, `created_at`, `updated_at`) VALUES
	('KR_0001', 'Karyawan 1', '0856470000001', 'supersuper', '$1$cQ2./l0.$2EEzCFuqA2rIOq1.sNTtD1', '123', '2019-01-02 14:35:41', NULL),
	('KR_0002', 'jono', '0856571111111', 'superadmin', '$1$somethin$f3PxGtAYM8jWEyWGPrKsQ1', '', '2019-01-02 14:35:41', NULL);
/*!40000 ALTER TABLE `karyawan` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.persediaan
CREATE TABLE IF NOT EXISTS `persediaan` (
  `id_persediaan` varchar(7) NOT NULL,
  `type_gudang` varchar(7) DEFAULT NULL,
  `nama` varchar(12) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `cara_pemakaian` text NOT NULL,
  PRIMARY KEY (`id_persediaan`),
  KEY `FK_persediaan_type_gudang` (`type_gudang`),
  CONSTRAINT `FK_persediaan_type_gudang` FOREIGN KEY (`type_gudang`) REFERENCES `type_gudang` (`id_type_gudang`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.persediaan: ~-1 rows (approximately)
DELETE FROM `persediaan`;
/*!40000 ALTER TABLE `persediaan` DISABLE KEYS */;
INSERT INTO `persediaan` (`id_persediaan`, `type_gudang`, `nama`, `keterangan`, `cara_pemakaian`) VALUES
	('PR_0002', 'TG_0001', 'vaksin deman', 'perbaikan gizi', 'di siram'),
	('PR_0003', 'TG_0001', 'vaksin Flu', 'Flu Burung', 'Ditaburkan dipakanan'),
	('PR_0004', 'TG_0001', 'katul', 'Makanan Ayam', 'ditaburkan 3 kali sehari');
/*!40000 ALTER TABLE `persediaan` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.supplier
CREATE TABLE IF NOT EXISTS `supplier` (
  `id_supplier` varchar(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `notelepon` varchar(15) DEFAULT NULL,
  `jual_ayam` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.supplier: ~-1 rows (approximately)
DELETE FROM `supplier`;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` (`id_supplier`, `nama`, `alamat`, `notelepon`, `jual_ayam`) VALUES
	('SP_0001', 'Terbit Terang', 'Jl. Kusuma Negara no.5', '+62855470001', 'Y'),
	('SP_0004', 'Terang Bersahaja', 'Jl. Kawitan no. 6 Sidorejo', '08547132566', 'N');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.type_gudang
CREATE TABLE IF NOT EXISTS `type_gudang` (
  `id_type_gudang` varchar(7) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `udpated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `nama` varchar(50) DEFAULT NULL,
  `cara pemakaian` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_type_gudang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.type_gudang: ~-1 rows (approximately)
DELETE FROM `type_gudang`;
/*!40000 ALTER TABLE `type_gudang` DISABLE KEYS */;
INSERT INTO `type_gudang` (`id_type_gudang`, `keterangan`, `created_at`, `udpated_at`, `nama`, `cara pemakaian`) VALUES
	('TG_0001', 'vaksin', '2019-01-02 14:36:23', NULL, NULL, NULL),
	('TG_0002', 'pakan', '2019-01-02 14:36:23', NULL, NULL, NULL);
/*!40000 ALTER TABLE `type_gudang` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.type_supplier
CREATE TABLE IF NOT EXISTS `type_supplier` (
  `id_type_supplier` varchar(7) NOT NULL,
  `alias` varchar(15) DEFAULT NULL,
  `title` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_type_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.type_supplier: ~-1 rows (approximately)
DELETE FROM `type_supplier`;
/*!40000 ALTER TABLE `type_supplier` DISABLE KEYS */;
INSERT INTO `type_supplier` (`id_type_supplier`, `alias`, `title`) VALUES
	('TS_0001', 'ayam', 'Ayam'),
	('TS_0002', 'pakan', 'Pakan'),
	('TS_0003', 'vaksin', 'Vaksin');
/*!40000 ALTER TABLE `type_supplier` ENABLE KEYS */;

-- Dumping structure for view peternakan_app.view_dashboard_kerugian_ayam
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_dashboard_kerugian_ayam` (
	`tahun` BIGINT(20) NULL,
	`bulan` BIGINT(20) NOT NULL,
	`monthname` VARCHAR(9) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`jumlah_ayam` DECIMAL(32,0) NULL
) ENGINE=MyISAM;

-- Dumping structure for view peternakan_app.view_dashboard_pembelian_ayam
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_dashboard_pembelian_ayam` (
	`tahun` BIGINT(20) NULL,
	`bulan` BIGINT(20) NOT NULL,
	`monthname` VARCHAR(9) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`jumlah_ayam` DECIMAL(32,0) NULL
) ENGINE=MyISAM;

-- Dumping structure for view peternakan_app.view_dashboard_penjualan_ayam
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_dashboard_penjualan_ayam` (
	`id_kandang` VARCHAR(7) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view peternakan_app.view_history_transaksi
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_history_transaksi` (
	`id` VARCHAR(7) NOT NULL COLLATE 'latin1_swedish_ci',
	`tanggal_transaksi` DATETIME NOT NULL,
	`id_kandang` VARCHAR(7) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama_kandang` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`jumlah_ayam` INT(11) NOT NULL,
	`NULL` BINARY(0) NULL,
	`ket` VARCHAR(2) NOT NULL COLLATE 'utf8mb4_0900_ai_ci'
) ENGINE=MyISAM;

-- Dumping structure for view peternakan_app.view_history_transaksi_gudang
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_history_transaksi_gudang` 
) ENGINE=MyISAM;

-- Dumping structure for view peternakan_app.view_jumlah_ayam_kandang
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_jumlah_ayam_kandang` (
	`id_kandang` VARCHAR(7) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama_kandang` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`id_pembelian_terbaru` VARCHAR(7) NULL COLLATE 'latin1_swedish_ci',
	`tanggal_pembelian_terbaru` DATETIME NULL
) ENGINE=MyISAM;

-- Dumping structure for view peternakan_app.view_periode_transaksi
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_periode_transaksi` (
	`tahun` INT(4) NULL,
	`bulan` INT(1) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view peternakan_app.view_semua_transaksi_pembelian_kandang
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_semua_transaksi_pembelian_kandang` (
	`id_detail_pembelian_ayam` VARCHAR(7) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_kandang` VARCHAR(7) NOT NULL COLLATE 'latin1_swedish_ci',
	`tanggal` DATETIME NOT NULL,
	`jumlah_ayam` INT(11) NOT NULL,
	`nama_kandang` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view peternakan_app.view_stok_ayam
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_stok_ayam` (
	`id_kandang` VARCHAR(7) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`jumlah` DECIMAL(33,0) NOT NULL,
	`jumlah_transaksi` BIGINT(21) NULL,
	`jumlah_transaksi_masuk` BIGINT(21) NULL,
	`jumlah_transaksi_keluar` BIGINT(21) NULL
) ENGINE=MyISAM;

-- Dumping structure for view peternakan_app.view_stok_gudang_vaksin
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_stok_gudang_vaksin` (
	`pemasukan` DECIMAL(32,0) NULL,
	`pengeluaran` DECIMAL(32,0) NULL,
	`jumlah` DECIMAL(33,0) NULL,
	`id_persediaan` VARCHAR(7) NOT NULL COLLATE 'latin1_swedish_ci',
	`type_gudang` VARCHAR(7) NULL COLLATE 'latin1_swedish_ci',
	`nama` VARCHAR(12) NOT NULL COLLATE 'latin1_swedish_ci',
	`keterangan` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`cara_pemakaian` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`ket_type_gudang` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view peternakan_app.view_stok_persediaan
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_stok_persediaan` (
	`id_persediaan` VARCHAR(7) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama_persediaan` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`jumlah_persediaan` DECIMAL(33,0) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view peternakan_app.view_transaksi_all
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_transaksi_all` 
) ENGINE=MyISAM;

-- Dumping structure for view peternakan_app.view_transaksi_kandang
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_transaksi_kandang` (
	`id_transaksi` VARCHAR(7) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_kandang` VARCHAR(7) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_supplier` VARCHAR(7) NULL COLLATE 'latin1_swedish_ci',
	`tanggal` DATETIME NOT NULL,
	`jumlah_ayam` INT(11) NOT NULL,
	`keterangan` VARCHAR(9) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`transaksi` VARCHAR(2) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`id_admin` INT(11) NULL,
	`id_karyawan` VARCHAR(7) NULL COLLATE 'latin1_swedish_ci',
	`update_by_karyawan` VARCHAR(7) NULL COLLATE 'latin1_swedish_ci',
	`update_by_admin` INT(11) NULL,
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NULL
) ENGINE=MyISAM;

-- Dumping structure for view peternakan_app.view_transaksi_persediaan
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_transaksi_persediaan` (
	`id_type_gudang` VARCHAR(7) NOT NULL COLLATE 'latin1_swedish_ci',
	`keterangan` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`created_at` TIMESTAMP NOT NULL,
	`udpated_at` TIMESTAMP NULL
) ENGINE=MyISAM;

-- Dumping structure for view peternakan_app.view_dashboard_kerugian_ayam
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_dashboard_kerugian_ayam`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_dashboard_kerugian_ayam` AS select `view_periode_transaksi`.`tahun` AS `tahun`,`view_periode_transaksi`.`bulan` AS `bulan`,monthname(concat(`view_periode_transaksi`.`tahun`,'-',`view_periode_transaksi`.`bulan`,'-',1)) AS `monthname`,(select ifnull(sum(`detail_penjualan_ayam`.`jumlah_ayam`),0) from `detail_penjualan_ayam` where ((year(`detail_penjualan_ayam`.`tanggal`) = `view_periode_transaksi`.`tahun`) and (month(`detail_penjualan_ayam`.`tanggal`) = `view_periode_transaksi`.`bulan`))) AS `jumlah_ayam` from `view_periode_transaksi`;

-- Dumping structure for view peternakan_app.view_dashboard_pembelian_ayam
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_dashboard_pembelian_ayam`;
CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_dashboard_pembelian_ayam` AS select `view_periode_transaksi`.`tahun` AS `tahun`,`view_periode_transaksi`.`bulan` AS `bulan`,monthname(concat(`view_periode_transaksi`.`tahun`,'-',`view_periode_transaksi`.`bulan`,'-',1)) AS `monthname`,(select ifnull(sum(`detail_penjualan_ayam`.`jumlah_ayam`),0) from `detail_penjualan_ayam` where ((year(`detail_penjualan_ayam`.`tanggal`) = `view_periode_transaksi`.`tahun`) and (month(`detail_penjualan_ayam`.`tanggal`) = `view_periode_transaksi`.`bulan`))) AS `jumlah_ayam` from `view_periode_transaksi`;

-- Dumping structure for view peternakan_app.view_dashboard_penjualan_ayam
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_dashboard_penjualan_ayam`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_dashboard_penjualan_ayam` AS select `kandang`.`id_kandang` AS `id_kandang`,`kandang`.`nama` AS `nama` from `kandang`;

-- Dumping structure for view peternakan_app.view_history_transaksi
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_history_transaksi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_history_transaksi` AS (select `detail_pembelian_ayam`.`id_detail_pembelian_ayam` AS `id`,`detail_pembelian_ayam`.`tanggal` AS `tanggal_transaksi`,`kandang`.`id_kandang` AS `id_kandang`,`kandang`.`nama` AS `nama_kandang`,`detail_pembelian_ayam`.`jumlah_ayam` AS `jumlah_ayam`,NULL AS `NULL`,'in' AS `ket` from (`kandang` join `detail_pembelian_ayam` on((`detail_pembelian_ayam`.`id_kandang` = `kandang`.`id_kandang`)))) union all (select `detail_penjualan_ayam`.`id_detail_penjualan_ayam` AS `id_detail_penjualan_ayam`,`detail_penjualan_ayam`.`tanggal` AS `tanggal_transaksi`,`kandang`.`id_kandang` AS `id_kandang`,`kandang`.`nama` AS `nama_kandang`,`detail_penjualan_ayam`.`jumlah_ayam` AS `jumlah_ayam`,`detail_penjualan_ayam`.`keterangan` AS `keterangan`,'out' AS `ket` from (`detail_penjualan_ayam` join `kandang` on((`kandang`.`id_kandang` = `detail_penjualan_ayam`.`id_kandang`)))) order by `id_kandang`,`tanggal_transaksi` desc;

-- Dumping structure for view peternakan_app.view_history_transaksi_gudang
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_history_transaksi_gudang`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_history_transaksi_gudang` AS (select `detail_pembelian_gudang`.`id_detail_pembelian_gudang` AS `id`,`detail_pembelian_gudang`.`tanggal_transaksi` AS `tanggal_transaksi`,`detail_pembelian_gudang`.`id_persediaan` AS `id_persediaan`,NULL AS `id_kandang`,`detail_pembelian_gudang`.`id_pemasukan_ayam` AS `id_pemasukan_ayam`,`detail_pembelian_gudang`.`jumlah` AS `jumlah`,`detail_pembelian_gudang`.`nominal` AS `nominal`,NULL AS `keterangan`,'beli' AS `ket` from `detail_pembelian_gudang`) union all (select `detail_pengeluaran_gudang`.`id_detail_pengeluaran_gudang` AS `id`,`detail_pengeluaran_gudang`.`tanggal_transaksi` AS `tanggal_transaksi`,`detail_pengeluaran_gudang`.`id_persediaan` AS `id_persediaan`,`detail_pembelian_ayam`.`id_kandang` AS `id_kandang`,`detail_pengeluaran_gudang`.`id_pemasukan_ayam` AS `id_pemasukan_ayam`,`detail_pengeluaran_gudang`.`jumlah` AS `jumlah`,0 AS `0`,`detail_pengeluaran_gudang`.`keterangan` AS `keterangan`,'jual' AS `ket` from (`detail_pengeluaran_gudang` join `detail_pembelian_ayam` on((`detail_pembelian_ayam`.`id_detail_pembelian_ayam` = `detail_pengeluaran_gudang`.`id_pemasukan_ayam`))));

-- Dumping structure for view peternakan_app.view_jumlah_ayam_kandang
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_jumlah_ayam_kandang`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jumlah_ayam_kandang` AS select `kandang`.`id_kandang` AS `id_kandang`,`kandang`.`nama` AS `nama_kandang`,(select `detail_pembelian_ayam`.`id_detail_pembelian_ayam` from `detail_pembelian_ayam` where (`detail_pembelian_ayam`.`id_kandang` = `kandang`.`id_kandang`) order by `detail_pembelian_ayam`.`tanggal` desc limit 1) AS `id_pembelian_terbaru`,(select `detail_pembelian_ayam`.`tanggal` from `detail_pembelian_ayam` where (`detail_pembelian_ayam`.`id_kandang` = `kandang`.`id_kandang`) order by `detail_pembelian_ayam`.`tanggal` desc limit 1) AS `tanggal_pembelian_terbaru` from (`kandang` left join `detail_pembelian_ayam` on((`detail_pembelian_ayam`.`id_kandang` = `kandang`.`id_kandang`))) group by `kandang`.`id_kandang`,`kandang`.`nama`;

-- Dumping structure for view peternakan_app.view_periode_transaksi
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_periode_transaksi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_periode_transaksi` AS select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,1 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (1 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,2 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (2 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,3 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (3 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,4 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (4 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,5 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (5 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,6 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (6 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,7 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (7 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,8 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (8 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,9 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (9 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,10 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (10 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,11 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (11 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,12 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (12 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)));

-- Dumping structure for view peternakan_app.view_semua_transaksi_pembelian_kandang
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_semua_transaksi_pembelian_kandang`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_semua_transaksi_pembelian_kandang` AS select `detail_pembelian_ayam`.`id_detail_pembelian_ayam` AS `id_detail_pembelian_ayam`,`detail_pembelian_ayam`.`id_kandang` AS `id_kandang`,`detail_pembelian_ayam`.`tanggal` AS `tanggal`,`detail_pembelian_ayam`.`jumlah_ayam` AS `jumlah_ayam`,`kandang`.`nama` AS `nama_kandang` from (`kandang` join `detail_pembelian_ayam` on((`detail_pembelian_ayam`.`id_kandang` = `kandang`.`id_kandang`))) order by `detail_pembelian_ayam`.`id_detail_pembelian_ayam`;

-- Dumping structure for view peternakan_app.view_stok_ayam
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_stok_ayam`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stok_ayam` AS select `kandang`.`id_kandang` AS `id_kandang`,`kandang`.`nama` AS `nama`,(ifnull((select sum(`detail_pembelian_ayam`.`jumlah_ayam`) from `detail_pembelian_ayam` where (`detail_pembelian_ayam`.`id_kandang` = `kandang`.`id_kandang`)),0) - ifnull((select sum(`detail_penjualan_ayam`.`jumlah_ayam`) from `detail_penjualan_ayam` where (`detail_penjualan_ayam`.`id_kandang` = `kandang`.`id_kandang`)),0)) AS `jumlah`,(select count(`view_transaksi_kandang`.`id_transaksi`) from `view_transaksi_kandang` where (`view_transaksi_kandang`.`id_kandang` = `kandang`.`id_kandang`)) AS `jumlah_transaksi`,(select count(`view_transaksi_kandang`.`id_transaksi`) from `view_transaksi_kandang` where ((`view_transaksi_kandang`.`id_kandang` = `kandang`.`id_kandang`) and (`view_transaksi_kandang`.`transaksi` = 'in'))) AS `jumlah_transaksi_masuk`,(select count(`view_transaksi_kandang`.`id_transaksi`) from `view_transaksi_kandang` where ((`view_transaksi_kandang`.`id_kandang` = `kandang`.`id_kandang`) and (`view_transaksi_kandang`.`transaksi` = 'out'))) AS `jumlah_transaksi_keluar` from `kandang`;

-- Dumping structure for view peternakan_app.view_stok_gudang_vaksin
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_stok_gudang_vaksin`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stok_gudang_vaksin` AS select (select ifnull(sum(`detail_pembelian_gudang`.`jumlah`),0) from `detail_pembelian_gudang` where (`detail_pembelian_gudang`.`id_supplier` = `persediaan`.`id_persediaan`)) AS `pemasukan`,(select ifnull(sum(`detail_pengeluaran_gudang`.`jumlah`),0) from `detail_pengeluaran_gudang` where (`detail_pengeluaran_gudang`.`id_persediaan` = `persediaan`.`id_persediaan`)) AS `pengeluaran`,((select ifnull(sum(`detail_pembelian_gudang`.`jumlah`),0) from `detail_pembelian_gudang` where (`detail_pembelian_gudang`.`id_persediaan` = `persediaan`.`id_persediaan`)) - (select ifnull(sum(`detail_pengeluaran_gudang`.`jumlah`),0) from `detail_pengeluaran_gudang` where (`detail_pengeluaran_gudang`.`id_persediaan` = `persediaan`.`id_persediaan`))) AS `jumlah`,`persediaan`.`id_persediaan` AS `id_persediaan`,`persediaan`.`type_gudang` AS `type_gudang`,`persediaan`.`nama` AS `nama`,`persediaan`.`keterangan` AS `keterangan`,`persediaan`.`cara_pemakaian` AS `cara_pemakaian`,`type_gudang`.`keterangan` AS `ket_type_gudang` from (`persediaan` join `type_gudang` on((`type_gudang`.`id_type_gudang` = `persediaan`.`type_gudang`)));

-- Dumping structure for view peternakan_app.view_stok_persediaan
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_stok_persediaan`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stok_persediaan` AS select `type_gudang`.`id_type_gudang` AS `id_persediaan`,`type_gudang`.`keterangan` AS `nama_persediaan`,(ifnull((select sum(`detail_pembelian_gudang`.`jumlah`) from `detail_pembelian_gudang` where (`detail_pembelian_gudang`.`id_persediaan` = `type_gudang`.`id_type_gudang`)),0) - ifnull((select sum(`detail_pengeluaran_gudang`.`jumlah`) from `detail_pengeluaran_gudang` where (`detail_pengeluaran_gudang`.`id_persediaan` = `type_gudang`.`id_type_gudang`)),0)) AS `jumlah_persediaan` from `type_gudang`;

-- Dumping structure for view peternakan_app.view_transaksi_all
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_transaksi_all`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_all` AS (select `kandang`.`id_kandang` AS `id_kandang`,concat('ayam pada kandang : ',`kandang`.`nama`) AS `nama`,`detail_pembelian_ayam`.`id_detail_pembelian_ayam` AS `id_detail_pembelian_ayam`,`detail_pembelian_ayam`.`jumlah_ayam` AS `masuk`,ifnull((select sum(`detail_penjualan_ayam`.`jumlah_ayam`) from `detail_penjualan_ayam` where (`detail_penjualan_ayam`.`id_detail_pembelian_ayam` = `detail_pembelian_ayam`.`id_detail_pembelian_ayam`)),0) AS `keluar` from (`kandang` join `detail_pembelian_ayam` on((`detail_pembelian_ayam`.`id_kandang` = `kandang`.`id_kandang`)))) union all (select `detail_persediaan`.`id_persediaan` AS `id_persediaan`,`persediaan`.`nama` AS `nama`,`view_jumlah_ayam_kandang`.`id_pembelian_terbaru` AS `id_pembelian_terbaru`,ifnull((select sum(`detail_pembelian_gudang`.`jumlah`) from `detail_pembelian_gudang` where (`detail_pembelian_gudang`.`id_pemasukan_ayam` = `view_jumlah_ayam_kandang`.`id_pembelian_terbaru`)),0) AS `masuk`,ifnull((select sum(`detail_pengeluaran_gudang`.`jumlah`) from `detail_pengeluaran_gudang` where (`detail_pengeluaran_gudang`.`id_pemasukan_ayam` = `view_jumlah_ayam_kandang`.`id_pembelian_terbaru`)),0) AS `keluar` from ((`detail_persediaan` join `view_jumlah_ayam_kandang` on((`view_jumlah_ayam_kandang`.`id_kandang` = `detail_persediaan`.`id_kandang`))) join `persediaan` on((`persediaan`.`id_persediaan` = `detail_persediaan`.`id_persediaan`))));

-- Dumping structure for view peternakan_app.view_transaksi_kandang
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_transaksi_kandang`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_kandang` AS select `detail_pembelian_ayam`.`id_detail_pembelian_ayam` AS `id_transaksi`,`detail_pembelian_ayam`.`id_kandang` AS `id_kandang`,`detail_pembelian_ayam`.`id_supplier` AS `id_supplier`,`detail_pembelian_ayam`.`tanggal` AS `tanggal`,`detail_pembelian_ayam`.`jumlah_ayam` AS `jumlah_ayam`,'pembelian' AS `keterangan`,'in' AS `transaksi`,`detail_pembelian_ayam`.`id_admin` AS `id_admin`,`detail_pembelian_ayam`.`id_karyawan` AS `id_karyawan`,`detail_pembelian_ayam`.`update_by_karyawan` AS `update_by_karyawan`,`detail_pembelian_ayam`.`update_by_admin` AS `update_by_admin`,`detail_pembelian_ayam`.`created_at` AS `created_at`,`detail_pembelian_ayam`.`updated_at` AS `updated_at` from `detail_pembelian_ayam` union select `detail_penjualan_ayam`.`id_detail_penjualan_ayam` AS `id_transaksi`,`detail_penjualan_ayam`.`id_kandang` AS `id_kandang`,NULL AS `id_supplier`,`detail_penjualan_ayam`.`tanggal` AS `tanggal`,`detail_penjualan_ayam`.`jumlah_ayam` AS `jumlah_ayam`,`detail_penjualan_ayam`.`keterangan` AS `keterangan`,'out' AS `transaksi`,`detail_penjualan_ayam`.`id_admin` AS `id_admin`,`detail_penjualan_ayam`.`id_karyawan` AS `id_karyawan`,`detail_penjualan_ayam`.`update_by_karyawan` AS `update_by_karyawan`,`detail_penjualan_ayam`.`update_by_admin` AS `update_by_admin`,`detail_penjualan_ayam`.`created_at` AS `created_at`,`detail_penjualan_ayam`.`updated_at` AS `updated_at` from `detail_penjualan_ayam`;

-- Dumping structure for view peternakan_app.view_transaksi_persediaan
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_transaksi_persediaan`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_persediaan` AS select `type_gudang`.`id_type_gudang` AS `id_type_gudang`,`type_gudang`.`keterangan` AS `keterangan`,`type_gudang`.`created_at` AS `created_at`,`type_gudang`.`udpated_at` AS `udpated_at` from `type_gudang`;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
