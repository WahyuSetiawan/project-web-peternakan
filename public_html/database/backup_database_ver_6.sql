-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.2-dmr - MySQL Community Server (GPL)
-- Server OS:                    Linux
-- HeidiSQL Version:             10.0.0.5460
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for peternakan_app
CREATE DATABASE IF NOT EXISTS `peternakan_app` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `peternakan_app`;

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
	('', 'KD_0001', 'SP_0001', NULL, 5, '0000-00-00 00:00:00', 10, NULL, NULL, '2019-01-29 16:29:25', NULL),
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
  KEY `FK_detail_pembelian_gudang_karyawan` (`id_karyawan`),
  KEY `FK_detail_pembelian_gudang_admin` (`update_by_admin`),
  KEY `FK_detail_pembelian_gudang_admin_2` (`id_admin`),
  KEY `FK_detail_pembelian_gudang_karyawan_2` (`update_by_karyawan`),
  CONSTRAINT `FK_detail_pembelian_gudang_admin` FOREIGN KEY (`update_by_admin`) REFERENCES `admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pembelian_gudang_admin_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pembelian_gudang_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pembelian_gudang_karyawan_2` FOREIGN KEY (`update_by_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pembelian_gudang_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pembelian_gudang_type_gudang` FOREIGN KEY (`id_persediaan`) REFERENCES `persediaan` (`id_persediaan`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.detail_pembelian_gudang: ~-1 rows (approximately)
DELETE FROM `detail_pembelian_gudang`;
/*!40000 ALTER TABLE `detail_pembelian_gudang` DISABLE KEYS */;
INSERT INTO `detail_pembelian_gudang` (`id_detail_pembelian_gudang`, `id_supplier`, `id_persediaan`, `id_karyawan`, `id_admin`, `tanggal`, `jumlah`, `nominal`, `update_by_karyawan`, `update_by_admin`, `created_at`, `updated_at`) VALUES
	('MG_0004', 'SP_0004', 'TG_0002', NULL, 6, '2018-08-27 01:37:24', 10, 1, NULL, NULL, '2019-01-01 15:39:48', NULL),
	('MG_0005', 'SP_0004', 'TG_0001', NULL, 6, '2018-08-27 01:37:43', 100, 1, NULL, 5, '2019-01-01 15:39:52', '2019-01-01 15:44:43'),
	('MG_0006', 'SP_0004', 'TG_0001', 'KR_0002', NULL, '2018-11-12 00:00:00', 120, 0, 'KR_0001', NULL, '2019-01-01 15:39:54', NULL);
/*!40000 ALTER TABLE `detail_pembelian_gudang` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.detail_pengeluaran_gudang
CREATE TABLE IF NOT EXISTS `detail_pengeluaran_gudang` (
  `id_detail_pengeluaran_gudang` varchar(7) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_kandang` varchar(7) DEFAULT NULL,
  `id_persediaan` varchar(7) NOT NULL,
  `id_karyawan` varchar(7) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `keterangan` text,
  `update_by_karyawan` varchar(7) DEFAULT NULL,
  `update_by_admin` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id_detail_pengeluaran_gudang`),
  KEY `FK_detail_pengeluaran_gudang_persediaan` (`id_persediaan`),
  KEY `FK_detail_pengeluaran_gudang_karyawan` (`id_karyawan`),
  KEY `FK_detail_pengeluaran_gudang_kandang` (`id_kandang`),
  KEY `FK_detail_pengeluaran_gudang_admin` (`id_admin`),
  KEY `FK_detail_pengeluaran_gudang_karyawan_2` (`update_by_karyawan`),
  KEY `FK_detail_pengeluaran_gudang_admin_2` (`update_by_admin`),
  CONSTRAINT `FK_detail_pengeluaran_gudang_admin` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pengeluaran_gudang_admin_2` FOREIGN KEY (`update_by_admin`) REFERENCES `admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pengeluaran_gudang_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id_kandang`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pengeluaran_gudang_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pengeluaran_gudang_karyawan_2` FOREIGN KEY (`update_by_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pengeluaran_gudang_persediaan` FOREIGN KEY (`id_persediaan`) REFERENCES `persediaan` (`id_persediaan`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.detail_pengeluaran_gudang: ~-1 rows (approximately)
DELETE FROM `detail_pengeluaran_gudang`;
/*!40000 ALTER TABLE `detail_pengeluaran_gudang` DISABLE KEYS */;
INSERT INTO `detail_pengeluaran_gudang` (`id_detail_pengeluaran_gudang`, `tanggal`, `id_kandang`, `id_persediaan`, `id_karyawan`, `id_admin`, `jumlah`, `keterangan`, `update_by_karyawan`, `update_by_admin`, `created_at`, `updated_at`) VALUES
	('KG_0007', '2018-11-12 00:00:00', NULL, 'TG_0002', NULL, NULL, 129, 'Kerusakan', NULL, 5, '2019-01-01 13:06:24', '2019-01-01 17:30:29'),
	('KG_0008', '2019-01-01 00:00:00', NULL, 'TG_0001', NULL, NULL, 12, '', NULL, NULL, '2019-01-01 17:04:05', '2019-01-01 17:23:06'),
	('KG_0009', '2019-01-01 00:00:00', NULL, 'TG_0001', NULL, 5, 12, '', NULL, NULL, '2019-01-01 17:08:49', '2019-01-01 17:23:09'),
	('KG_0010', '2019-01-06 16:02:38', NULL, 'TG_0001', NULL, 5, 12, '', NULL, NULL, '2019-01-06 16:02:07', '2019-01-06 16:02:42'),
	('KG_0011', '0000-00-00 00:00:00', NULL, 'TG_0001', NULL, 5, 10, '', NULL, NULL, '2019-01-06 16:03:02', '0000-00-00 00:00:00');
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
  CONSTRAINT `FK_detail_supplier_jenis_type_gudang` FOREIGN KEY (`id_jenis`) REFERENCES `persediaan` (`id_persediaan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
  `id_gudang` varchar(7) NOT NULL,
  PRIMARY KEY (`id_detail_type_supplier`),
  KEY `FK_detail_type_supplier_supplier` (`id_supplier`),
  KEY `FK_detail_type_supplier_type_supplier` (`id_gudang`),
  CONSTRAINT `FK_detail_type_supplier_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_type_supplier_type_supplier` FOREIGN KEY (`id_gudang`) REFERENCES `type_supplier` (`id_type_supplier`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.detail_type_supplier: ~-1 rows (approximately)
DELETE FROM `detail_type_supplier`;
/*!40000 ALTER TABLE `detail_type_supplier` DISABLE KEYS */;
INSERT INTO `detail_type_supplier` (`id_detail_type_supplier`, `id_supplier`, `id_gudang`) VALUES
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

-- Dumping structure for function peternakan_app.function_id_detail_kerugian_ayam
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_detail_kerugian_ayam`() RETURNS varchar(7) CHARSET utf8mb4
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	declare initial varchar(3);
	
	set initial = 'KA_';
	
	select count(*) into count_id from detail_kerugian_ayam where id_detail_kerugian_ayam like concat(initial, '%');
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_detail_kerugian_ayam), 5) + 1 into id from detail_kerugian_ayam where id_detail_kerugian_ayam like concat(initial, '%');
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

-- Dumping structure for function peternakan_app.function_id_gudang
DELIMITER //
CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_gudang`() RETURNS varchar(10) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	
	select count(*) into count_id from gudang;
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_gudang), 5) + 1 into id from gudang;
	end if;
	
	set code = concat('00000', id);
	set code = concat('TG_', substring(code, LENGTH(code) - 3));
	
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

-- Dumping structure for table peternakan_app.tb_admin
CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usernmae` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.tb_admin: ~-1 rows (approximately)
DELETE FROM `tb_admin`;
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` (`id`, `nama`, `username`, `password`) VALUES
	(5, 'Usman', 'admin', '$1$cQ2./l0.$2EEzCFuqA2rIOq1.sNTtD1'),
	(6, 'Owner', 'aaa', '$1$S/1.zk4.$0qKF24Yg2XvO67EHRk7eS.'),
	(9, 'kaskus1', 'kaskus1', '$1$DlgjUedV$gXZoXCPqESC1uF7hN0AVC.');
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.tb_detail_kerugian_ayam
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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detail_kerugian_ayam`),
  KEY `FK_tb_detail_kerugian_ayam_tb_kandang` (`id_kandang`),
  KEY `FK_tb_detail_kerugian_ayam_tb_admin` (`id_admin`),
  KEY `FK_tb_detail_kerugian_ayam_tb_karyawan` (`id_karyawan`),
  KEY `FK_tb_detail_kerugian_ayam_tb_admin_2` (`update_by_admin`),
  KEY `FK_tb_detail_kerugian_ayam_tb_karyawan_2` (`update_by_karyawan`),
  CONSTRAINT `FK_tb_detail_kerugian_ayam_tb_admin` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_kerugian_ayam_tb_admin_2` FOREIGN KEY (`update_by_admin`) REFERENCES `tb_admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_kerugian_ayam_tb_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `tb_kandang` (`id_kandang`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_kerugian_ayam_tb_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_kerugian_ayam_tb_karyawan_2` FOREIGN KEY (`update_by_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.tb_detail_kerugian_ayam: ~-1 rows (approximately)
DELETE FROM `tb_detail_kerugian_ayam`;
/*!40000 ALTER TABLE `tb_detail_kerugian_ayam` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_detail_kerugian_ayam` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.tb_detail_pembelian_ayam
CREATE TABLE IF NOT EXISTS `tb_detail_pembelian_ayam` (
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
  KEY `FK_tb_detail_pembelian_ayam_tb_kandang` (`id_kandang`),
  KEY `FK_tb_detail_pembelian_ayam_tb_admin` (`id_admin`),
  KEY `FK_tb_detail_pembelian_ayam_tb_karyawan` (`id_karyawan`),
  KEY `FK_tb_detail_pembelian_ayam_tb_supplier` (`id_supplier`),
  KEY `FK_tb_detail_pembelian_ayam_tb_admin_2` (`update_by_admin`),
  KEY `FK_tb_detail_pembelian_ayam_tb_karyawan_2` (`update_by_karyawan`),
  CONSTRAINT `FK_tb_detail_pembelian_ayam_tb_admin` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_pembelian_ayam_tb_admin_2` FOREIGN KEY (`update_by_admin`) REFERENCES `tb_admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_pembelian_ayam_tb_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `tb_kandang` (`id_kandang`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_pembelian_ayam_tb_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_pembelian_ayam_tb_karyawan_2` FOREIGN KEY (`update_by_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_pembelian_ayam_tb_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.tb_detail_pembelian_ayam: ~-1 rows (approximately)
DELETE FROM `tb_detail_pembelian_ayam`;
/*!40000 ALTER TABLE `tb_detail_pembelian_ayam` DISABLE KEYS */;
INSERT INTO `tb_detail_pembelian_ayam` (`id_detail_pembelian_ayam`, `id_kandang`, `id_supplier`, `id_karyawan`, `id_admin`, `tanggal`, `jumlah_ayam`, `update_by_admin`, `update_by_karyawan`, `created_at`, `updated_at`) VALUES
	('MA_0017', 'KD_0001', 'SP_0001', NULL, 5, '2018-11-12 00:00:00', 10, NULL, NULL, '2019-01-29 16:29:25', '2019-01-29 17:39:29'),
	('MA_0019', 'KD_0001', 'SP_0001', NULL, 5, '2018-11-12 00:00:00', 120, NULL, NULL, '2019-01-01 13:07:21', NULL),
	('MA_0020', 'KD_0001', 'SP_0001', 'KR_0002', NULL, '2018-11-12 00:00:00', 120, 5, NULL, '2019-01-01 13:07:26', '2019-01-01 13:38:55'),
	('MA_0021', 'KD_0003', 'SP_0001', NULL, 5, '2018-11-12 00:00:00', 100, NULL, NULL, '2019-01-03 20:59:17', NULL),
	('MA_0022', 'KD_0002', 'SP_0001', NULL, 5, '2018-11-12 00:00:00', 200, NULL, NULL, '2019-01-03 20:59:30', NULL);
/*!40000 ALTER TABLE `tb_detail_pembelian_ayam` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.tb_detail_pembelian_gudang
CREATE TABLE IF NOT EXISTS `tb_detail_pembelian_gudang` (
  `id_detail_pembelian_gudang` varchar(7) NOT NULL,
  `id_supplier` varchar(7) DEFAULT NULL,
  `id_gudang` varchar(7) NOT NULL,
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
  KEY `FK_tb_detail_pembelian_gudang_tb_supplier` (`id_supplier`),
  KEY `FK_tb_detail_pembelian_gudang_tb_gudang` (`id_gudang`),
  KEY `FK_tb_detail_pembelian_gudang_tb_admin` (`id_admin`),
  KEY `FK_tb_detail_pembelian_gudang_tb_karyawan` (`id_karyawan`),
  KEY `FK_tb_detail_pembelian_gudang_tb_karyawan_2` (`update_by_karyawan`),
  KEY `FK_tb_detail_pembelian_gudang_tb_admin_2` (`update_by_admin`),
  CONSTRAINT `FK_tb_detail_pembelian_gudang_tb_admin` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_pembelian_gudang_tb_admin_2` FOREIGN KEY (`update_by_admin`) REFERENCES `tb_admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_pembelian_gudang_tb_gudang` FOREIGN KEY (`id_gudang`) REFERENCES `tb_gudang` (`id_gudang`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_pembelian_gudang_tb_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_pembelian_gudang_tb_karyawan_2` FOREIGN KEY (`update_by_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_pembelian_gudang_tb_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.tb_detail_pembelian_gudang: ~-1 rows (approximately)
DELETE FROM `tb_detail_pembelian_gudang`;
/*!40000 ALTER TABLE `tb_detail_pembelian_gudang` DISABLE KEYS */;
INSERT INTO `tb_detail_pembelian_gudang` (`id_detail_pembelian_gudang`, `id_supplier`, `id_gudang`, `id_karyawan`, `id_admin`, `tanggal`, `jumlah`, `nominal`, `update_by_karyawan`, `update_by_admin`, `created_at`, `updated_at`) VALUES
	('MG_0004', 'SP_0004', 'TG_0002', NULL, 6, '2018-08-27 01:37:24', 10, 1, NULL, NULL, '2019-01-01 15:39:48', NULL),
	('MG_0005', 'SP_0004', 'TG_0001', NULL, 6, '2018-08-27 01:37:43', 100, 1, NULL, 5, '2019-01-01 15:39:52', '2019-01-01 15:44:43'),
	('MG_0006', 'SP_0004', 'TG_0001', 'KR_0002', NULL, '2018-11-12 00:00:00', 120, 0, 'KR_0001', NULL, '2019-01-01 15:39:54', NULL);
/*!40000 ALTER TABLE `tb_detail_pembelian_gudang` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.tb_detail_penggunaan_gudang
CREATE TABLE IF NOT EXISTS `tb_detail_penggunaan_gudang` (
  `id_detail_penggunaan_gudang` varchar(7) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_kandang` varchar(7) DEFAULT NULL,
  `id_gudang` varchar(7) NOT NULL,
  `id_karyawan` varchar(7) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `keterangan` text,
  `update_by_karyawan` varchar(7) DEFAULT NULL,
  `update_by_admin` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id_detail_penggunaan_gudang`),
  KEY `FK_tb_detail_penggunaan_gudang_tb_gudang` (`id_gudang`),
  KEY `FK_tb_detail_penggunaan_gudang_tb_karyawan` (`id_karyawan`),
  KEY `FK_tb_detail_penggunaan_gudang_tb_admin` (`id_admin`),
  KEY `FK_tb_detail_penggunaan_gudang_tb_karyawan_2` (`update_by_karyawan`),
  KEY `FK_tb_detail_penggunaan_gudang_tb_admin_2` (`update_by_admin`),
  CONSTRAINT `FK_tb_detail_penggunaan_gudang_tb_admin` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_penggunaan_gudang_tb_admin_2` FOREIGN KEY (`update_by_admin`) REFERENCES `tb_admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_penggunaan_gudang_tb_gudang` FOREIGN KEY (`id_gudang`) REFERENCES `tb_gudang` (`id_gudang`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_penggunaan_gudang_tb_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_penggunaan_gudang_tb_karyawan_2` FOREIGN KEY (`update_by_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.tb_detail_penggunaan_gudang: ~-1 rows (approximately)
DELETE FROM `tb_detail_penggunaan_gudang`;
/*!40000 ALTER TABLE `tb_detail_penggunaan_gudang` DISABLE KEYS */;
INSERT INTO `tb_detail_penggunaan_gudang` (`id_detail_penggunaan_gudang`, `tanggal`, `id_kandang`, `id_gudang`, `id_karyawan`, `id_admin`, `jumlah`, `keterangan`, `update_by_karyawan`, `update_by_admin`, `created_at`, `updated_at`) VALUES
	('KG_0007', '2018-11-12 00:00:00', NULL, 'TG_0002', NULL, NULL, 129, 'Kerusakan', NULL, 5, '2019-01-01 13:06:24', '2019-01-01 17:30:29'),
	('KG_0008', '2019-01-01 00:00:00', NULL, 'TG_0001', NULL, NULL, 12, '', NULL, NULL, '2019-01-01 17:04:05', '2019-01-01 17:23:06'),
	('KG_0009', '2019-01-01 00:00:00', NULL, 'TG_0001', NULL, 5, 12, '', NULL, NULL, '2019-01-01 17:08:49', '2019-01-01 17:23:09'),
	('KG_0010', '2019-01-06 16:02:38', NULL, 'TG_0001', NULL, 5, 12, '', NULL, NULL, '2019-01-06 16:02:07', '2019-01-06 16:02:42'),
	('KG_0011', '2019-01-06 16:02:38', NULL, 'TG_0001', NULL, 5, 10, '', NULL, NULL, '2019-01-06 16:03:02', '2019-01-06 16:02:38');
/*!40000 ALTER TABLE `tb_detail_penggunaan_gudang` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.tb_detail_penjualan_ayam
CREATE TABLE IF NOT EXISTS `tb_detail_penjualan_ayam` (
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
  KEY `FK_tb_detail_penjualan_ayam_tb_kandang` (`id_kandang`),
  KEY `FK_tb_detail_penjualan_ayam_tb_karyawan` (`id_karyawan`),
  KEY `FK_tb_detail_penjualan_ayam_tb_admin` (`id_admin`),
  KEY `FK_tb_detail_penjualan_ayam_tb_karyawan_2` (`update_by_karyawan`),
  KEY `FK_tb_detail_penjualan_ayam_tb_admin_2` (`update_by_admin`),
  CONSTRAINT `FK_tb_detail_penjualan_ayam_tb_admin` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_penjualan_ayam_tb_admin_2` FOREIGN KEY (`update_by_admin`) REFERENCES `tb_admin` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_penjualan_ayam_tb_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `tb_kandang` (`id_kandang`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_penjualan_ayam_tb_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_penjualan_ayam_tb_karyawan_2` FOREIGN KEY (`update_by_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.tb_detail_penjualan_ayam: ~-1 rows (approximately)
DELETE FROM `tb_detail_penjualan_ayam`;
/*!40000 ALTER TABLE `tb_detail_penjualan_ayam` DISABLE KEYS */;
INSERT INTO `tb_detail_penjualan_ayam` (`id_detail_penjualan_ayam`, `id_kandang`, `id_karyawan`, `id_admin`, `tanggal`, `jumlah_ayam`, `keterangan`, `update_by_karyawan`, `update_by_admin`, `created_at`, `updated_at`) VALUES
	('KA_0001', 'KD_0002', 'KR_0002', NULL, '2018-11-12 00:00:00', 12, 'asdf', NULL, 5, '2019-01-01 20:05:17', '2019-01-01 14:58:18'),
	('KA_0002', 'KD_0002', 'KR_0002', NULL, '2018-12-12 00:00:00', 120, 'asdf', NULL, NULL, '2019-01-01 20:05:18', NULL);
/*!40000 ALTER TABLE `tb_detail_penjualan_ayam` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.tb_detail_supplier_jenis
CREATE TABLE IF NOT EXISTS `tb_detail_supplier_jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_supplier` varchar(7) NOT NULL,
  `id_jenis` varchar(7) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_supplier_id_jenis` (`id_supplier`,`id_jenis`),
  KEY `FK_detail_supplier_jenis_type_gudang` (`id_jenis`),
  CONSTRAINT `FK_tb_detail_supplier_jenis_tb_gudang` FOREIGN KEY (`id_jenis`) REFERENCES `tb_gudang` (`id_gudang`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_supplier_jenis_tb_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.tb_detail_supplier_jenis: ~-1 rows (approximately)
DELETE FROM `tb_detail_supplier_jenis`;
/*!40000 ALTER TABLE `tb_detail_supplier_jenis` DISABLE KEYS */;
INSERT INTO `tb_detail_supplier_jenis` (`id`, `id_supplier`, `id_jenis`) VALUES
	(2, 'SP_0001', 'TG_0002'),
	(4, 'SP_0004', 'TG_0001'),
	(3, 'SP_0004', 'TG_0002');
/*!40000 ALTER TABLE `tb_detail_supplier_jenis` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.tb_detail_type_supplier
CREATE TABLE IF NOT EXISTS `tb_detail_type_supplier` (
  `id_detail_type_supplier` varchar(8) NOT NULL,
  `id_supplier` varchar(7) NOT NULL,
  `id_gudang` varchar(7) NOT NULL,
  PRIMARY KEY (`id_detail_type_supplier`),
  KEY `FK_tb_detail_type_supplier_tb_gudang` (`id_gudang`),
  KEY `FK_tb_detail_type_supplier_tb_supplier` (`id_supplier`),
  CONSTRAINT `FK_tb_detail_type_supplier_tb_gudang` FOREIGN KEY (`id_gudang`) REFERENCES `tb_gudang` (`id_gudang`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_detail_type_supplier_tb_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.tb_detail_type_supplier: ~-1 rows (approximately)
DELETE FROM `tb_detail_type_supplier`;
/*!40000 ALTER TABLE `tb_detail_type_supplier` DISABLE KEYS */;
INSERT INTO `tb_detail_type_supplier` (`id_detail_type_supplier`, `id_supplier`, `id_gudang`) VALUES
	('DTS_0001', 'SP_0004', 'TG_0001');
/*!40000 ALTER TABLE `tb_detail_type_supplier` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.tb_gudang
CREATE TABLE IF NOT EXISTS `tb_gudang` (
  `id_gudang` varchar(7) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `cara_pemakaian` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_gudang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.tb_gudang: ~-1 rows (approximately)
DELETE FROM `tb_gudang`;
/*!40000 ALTER TABLE `tb_gudang` DISABLE KEYS */;
INSERT INTO `tb_gudang` (`id_gudang`, `nama`, `cara_pemakaian`, `created_at`, `updated_at`) VALUES
	('TG_0001', 'Jagung', '', '2019-01-02 14:36:23', '2019-01-06 15:47:09'),
	('TG_0002', 'Pakan Katul', '', '2019-01-02 14:36:23', '2019-01-06 15:46:47'),
	('TG_0003', 'Vaksin Persediaan', '', '2019-01-06 15:44:11', NULL);
/*!40000 ALTER TABLE `tb_gudang` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.tb_jadwal_kandang
CREATE TABLE IF NOT EXISTS `tb_jadwal_kandang` (
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
  CONSTRAINT `FK_tb_jadwal_kandang_tb_gudang` FOREIGN KEY (`id_persediaan`) REFERENCES `tb_gudang` (`id_gudang`) ON UPDATE CASCADE,
  CONSTRAINT `FK_tb_jadwal_kandang_tb_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `tb_kandang` (`id_kandang`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.tb_jadwal_kandang: ~-1 rows (approximately)
DELETE FROM `tb_jadwal_kandang`;
/*!40000 ALTER TABLE `tb_jadwal_kandang` DISABLE KEYS */;
INSERT INTO `tb_jadwal_kandang` (`id_jadwal_kandang`, `id_kandang`, `hari`, `id_persediaan`, `catatan`, `created_at`, `updated_at`) VALUES
	('JK_0001', 'KD_0002', 0, 'TG_0001', 'dfgsdfg', '2019-01-02 16:58:08', '2019-01-02 18:23:41'),
	('JK_0002', 'KD_0002', 0, 'TG_0002', '', '2019-01-03 18:27:39', NULL),
	('JK_0003', 'KD_0001', 0, 'TG_0001', '', '2019-01-03 19:19:48', NULL),
	('JK_0004', 'KD_0001', 0, 'TG_0001', '', '2019-01-03 19:19:51', NULL),
	('JK_0005', 'KD_0001', 0, 'TG_0001', '', '2019-01-03 19:19:54', NULL);
/*!40000 ALTER TABLE `tb_jadwal_kandang` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.tb_kandang
CREATE TABLE IF NOT EXISTS `tb_kandang` (
  `id_kandang` varchar(7) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `id_karyawan` varchar(7) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_kandang`),
  KEY `kandang_karyawan_FK` (`id_karyawan`),
  CONSTRAINT `kandang_karyawan_FK` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.tb_kandang: ~-1 rows (approximately)
DELETE FROM `tb_kandang`;
/*!40000 ALTER TABLE `tb_kandang` DISABLE KEYS */;
INSERT INTO `tb_kandang` (`id_kandang`, `nama`, `id_karyawan`, `created_at`, `updated_at`) VALUES
	('KD_0001', 'kandang 1', 'KR_0001', '2019-01-02 14:34:52', NULL),
	('KD_0002', 'kandang 2', 'KR_0001', '2019-01-02 14:34:52', NULL),
	('KD_0003', 'kandang 3', 'KR_0002', '2019-01-02 14:34:52', NULL),
	('KD_0004', 'kandang 4', 'KR_0001', '2019-01-03 19:23:06', NULL);
/*!40000 ALTER TABLE `tb_kandang` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.tb_karyawan
CREATE TABLE IF NOT EXISTS `tb_karyawan` (
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

-- Dumping data for table peternakan_app.tb_karyawan: ~-1 rows (approximately)
DELETE FROM `tb_karyawan`;
/*!40000 ALTER TABLE `tb_karyawan` DISABLE KEYS */;
INSERT INTO `tb_karyawan` (`id_karyawan`, `nama`, `no_hp`, `username`, `password`, `hint`, `created_at`, `updated_at`) VALUES
	('KR_0001', 'Karyawan', '085651000000', 'supersuper', '$1$somethin$WQbPE.XtYdckEUANnIB1a1', '123', '2019-01-02 14:35:41', '2019-01-22 15:19:26'),
	('KR_0002', 'jono', '0856571111111', 'superadmin', '$1$somethin$f3PxGtAYM8jWEyWGPrKsQ1', '', '2019-01-02 14:35:41', NULL);
/*!40000 ALTER TABLE `tb_karyawan` ENABLE KEYS */;

-- Dumping structure for table peternakan_app.tb_supplier
CREATE TABLE IF NOT EXISTS `tb_supplier` (
  `id_supplier` varchar(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `notelepon` varchar(15) DEFAULT NULL,
  `jual_ayam` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table peternakan_app.tb_supplier: ~-1 rows (approximately)
DELETE FROM `tb_supplier`;
/*!40000 ALTER TABLE `tb_supplier` DISABLE KEYS */;
INSERT INTO `tb_supplier` (`id_supplier`, `nama`, `alamat`, `notelepon`, `jual_ayam`) VALUES
	('SP_0001', 'Terbit Terang', 'Jl. Kusuma Negara no.5', '+62855470001', 'Y'),
	('SP_0004', 'Terang Bersahaja', 'Jl. Kawitan no. 6 Sidorejo', '08547132566', 'N');
/*!40000 ALTER TABLE `tb_supplier` ENABLE KEYS */;

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
CREATE TABLE `view_history_transaksi_gudang` (
	`id` VARCHAR(7) NOT NULL COLLATE 'latin1_swedish_ci',
	`tanggal_transaksi` DATETIME NOT NULL,
	`id_persediaan` VARCHAR(7) NOT NULL COLLATE 'latin1_swedish_ci',
	`jumlah` INT(11) NOT NULL,
	`nominal` INT(11) NOT NULL,
	`keterangan` BINARY(0) NULL,
	`ket` VARCHAR(4) NOT NULL COLLATE 'utf8mb4_0900_ai_ci'
) ENGINE=MyISAM;

-- Dumping structure for view peternakan_app.view_jumlah_ayam_kandang
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_jumlah_ayam_kandang` 
) ENGINE=MyISAM;

-- Dumping structure for view peternakan_app.view_periode_transaksi
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_periode_transaksi` (
	`tahun` INT(4) NULL,
	`bulan` INT(1) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view peternakan_app.view_semua_transaksi_pembelian_kandang
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_semua_transaksi_pembelian_kandang` 
) ENGINE=MyISAM;

-- Dumping structure for view peternakan_app.view_stok_ayam
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_stok_ayam` (
	`id_kandang` VARCHAR(7) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`id_karyawan` VARCHAR(7) NULL COLLATE 'latin1_swedish_ci',
	`jumlah` DECIMAL(34,0) NOT NULL,
	`jumlah_transaksi` BIGINT(21) NULL,
	`jumlah_transaksi_masuk` BIGINT(21) NULL,
	`jumlah_transaksi_keluar` BIGINT(21) NULL,
	`jumlah_kerugian` BIGINT(21) NULL
) ENGINE=MyISAM;

-- Dumping structure for view peternakan_app.view_stok_gudang
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_stok_gudang` 
) ENGINE=MyISAM;

-- Dumping structure for view peternakan_app.view_transaksi_ayam
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_transaksi_ayam` (
	`id_transaksi` VARCHAR(7) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_kandang` VARCHAR(7) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_supplier` VARCHAR(7) NULL COLLATE 'latin1_swedish_ci',
	`tanggal` DATETIME NOT NULL,
	`jumlah_ayam` INT(11) NOT NULL,
	`keterangan` VARCHAR(9) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`aksi` VARCHAR(2) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`id_admin` INT(11) NULL,
	`id_karyawan` VARCHAR(7) NULL COLLATE 'latin1_swedish_ci',
	`update_by_karyawan` VARCHAR(7) NULL COLLATE 'latin1_swedish_ci',
	`update_by_admin` INT(11) NULL,
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NULL
) ENGINE=MyISAM;

-- Dumping structure for view peternakan_app.view_transaksi_gudang
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_transaksi_gudang` (
	`id_transaksi` VARCHAR(7) NOT NULL COLLATE 'latin1_swedish_ci',
	`aksi` VARCHAR(2) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`id_gudang` VARCHAR(7) NOT NULL COLLATE 'latin1_swedish_ci',
	`id_supplier` VARCHAR(7) NULL COLLATE 'latin1_swedish_ci',
	`tanggal` DATETIME NOT NULL,
	`jumlah` INT(11) NOT NULL,
	`id_admin` INT(11) NULL,
	`id_karyawan` VARCHAR(7) NULL COLLATE 'latin1_swedish_ci',
	`update_by_admin` INT(11) NULL,
	`update_by_karyawan` VARCHAR(7) NULL COLLATE 'latin1_swedish_ci',
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NULL,
	`keterangan` CHAR(0) NOT NULL COLLATE 'utf8mb4_0900_ai_ci'
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
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_dashboard_penjualan_ayam` AS select `tb_kandang`.`id_kandang` AS `id_kandang`,`tb_kandang`.`nama` AS `nama` from `tb_kandang`;

-- Dumping structure for view peternakan_app.view_history_transaksi
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_history_transaksi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_history_transaksi` AS (select `tb_detail_pembelian_ayam`.`id_detail_pembelian_ayam` AS `id`,`tb_detail_pembelian_ayam`.`tanggal` AS `tanggal_transaksi`,`tb_kandang`.`id_kandang` AS `id_kandang`,`tb_kandang`.`nama` AS `nama_kandang`,`tb_detail_pembelian_ayam`.`jumlah_ayam` AS `jumlah_ayam`,NULL AS `NULL`,'in' AS `ket` from (`tb_kandang` join `tb_detail_pembelian_ayam` on((`tb_detail_pembelian_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)))) union all (select `tb_detail_penjualan_ayam`.`id_detail_penjualan_ayam` AS `id_detail_penjualan_ayam`,`tb_detail_penjualan_ayam`.`tanggal` AS `tanggal_transaksi`,`tb_kandang`.`id_kandang` AS `id_kandang`,`tb_kandang`.`nama` AS `nama_kandang`,`tb_detail_penjualan_ayam`.`jumlah_ayam` AS `jumlah_ayam`,`tb_detail_penjualan_ayam`.`keterangan` AS `keterangan`,'out' AS `ket` from (`tb_detail_penjualan_ayam` join `tb_kandang` on((`tb_kandang`.`id_kandang` = `tb_detail_penjualan_ayam`.`id_kandang`)))) order by `id_kandang`,`tanggal_transaksi` desc;

-- Dumping structure for view peternakan_app.view_history_transaksi_gudang
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_history_transaksi_gudang`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_history_transaksi_gudang` AS (select `tb_detail_pembelian_gudang`.`id_detail_pembelian_gudang` AS `id`,`tb_detail_pembelian_gudang`.`tanggal` AS `tanggal_transaksi`,`tb_detail_pembelian_gudang`.`id_gudang` AS `id_persediaan`,`tb_detail_pembelian_gudang`.`jumlah` AS `jumlah`,`tb_detail_pembelian_gudang`.`nominal` AS `nominal`,NULL AS `keterangan`,'beli' AS `ket` from `tb_detail_pembelian_gudang`) union all (select `tb_detail_penggunaan_gudang`.`id_detail_penggunaan_gudang` AS `id`,`tb_detail_penggunaan_gudang`.`tanggal` AS `tanggal_transaksi`,`tb_detail_penggunaan_gudang`.`id_gudang` AS `id_persediaan`,`tb_detail_penggunaan_gudang`.`jumlah` AS `jumlah`,0 AS `0`,`tb_detail_penggunaan_gudang`.`keterangan` AS `keterangan`,'jual' AS `ket` from `tb_detail_penggunaan_gudang`);

-- Dumping structure for view peternakan_app.view_jumlah_ayam_kandang
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_jumlah_ayam_kandang`;
;

-- Dumping structure for view peternakan_app.view_periode_transaksi
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_periode_transaksi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_periode_transaksi` AS select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,1 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (1 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,2 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (2 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,3 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (3 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,4 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (4 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,5 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (5 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,6 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (6 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,7 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (7 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,8 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (8 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,9 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (9 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,10 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (10 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,11 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (11 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,12 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (12 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)));

-- Dumping structure for view peternakan_app.view_semua_transaksi_pembelian_kandang
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_semua_transaksi_pembelian_kandang`;
;

-- Dumping structure for view peternakan_app.view_stok_ayam
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_stok_ayam`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stok_ayam` AS select `tb_kandang`.`id_kandang` AS `id_kandang`,`tb_kandang`.`nama` AS `nama`,`tb_kandang`.`id_karyawan` AS `id_karyawan`,((ifnull((select sum(`tb_detail_pembelian_ayam`.`jumlah_ayam`) from `tb_detail_pembelian_ayam` where (`tb_detail_pembelian_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)),0) - ifnull((select sum(`tb_detail_penjualan_ayam`.`jumlah_ayam`) from `tb_detail_penjualan_ayam` where (`tb_detail_penjualan_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)),0)) - ifnull((select sum(`tb_detail_kerugian_ayam`.`jumlah`) from `tb_detail_kerugian_ayam` where (`tb_detail_kerugian_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)),0)) AS `jumlah`,(select count(`view_transaksi_ayam`.`id_transaksi`) from `view_transaksi_ayam` where (`view_transaksi_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)) AS `jumlah_transaksi`,(select count(`view_transaksi_ayam`.`id_transaksi`) from `view_transaksi_ayam` where ((`view_transaksi_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`) and (`view_transaksi_ayam`.`aksi` = 'in'))) AS `jumlah_transaksi_masuk`,(select count(`view_transaksi_ayam`.`id_transaksi`) from `view_transaksi_ayam` where ((`view_transaksi_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`) and (`view_transaksi_ayam`.`aksi` = 'out'))) AS `jumlah_transaksi_keluar`,(select count(`view_transaksi_ayam`.`id_transaksi`) from `view_transaksi_ayam` where ((`view_transaksi_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`) and (`view_transaksi_ayam`.`aksi` = 'die'))) AS `jumlah_kerugian` from `tb_kandang`;

-- Dumping structure for view peternakan_app.view_stok_gudang
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_stok_gudang`;
;

-- Dumping structure for view peternakan_app.view_transaksi_ayam
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_transaksi_ayam`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_ayam` AS select `tb_detail_pembelian_ayam`.`id_detail_pembelian_ayam` AS `id_transaksi`,`tb_detail_pembelian_ayam`.`id_kandang` AS `id_kandang`,`tb_detail_pembelian_ayam`.`id_supplier` AS `id_supplier`,`tb_detail_pembelian_ayam`.`tanggal` AS `tanggal`,`tb_detail_pembelian_ayam`.`jumlah_ayam` AS `jumlah_ayam`,'pembelian' AS `keterangan`,'in' AS `aksi`,`tb_detail_pembelian_ayam`.`id_admin` AS `id_admin`,`tb_detail_pembelian_ayam`.`id_karyawan` AS `id_karyawan`,`tb_detail_pembelian_ayam`.`update_by_karyawan` AS `update_by_karyawan`,`tb_detail_pembelian_ayam`.`update_by_admin` AS `update_by_admin`,`tb_detail_pembelian_ayam`.`created_at` AS `created_at`,`tb_detail_pembelian_ayam`.`updated_at` AS `updated_at` from `tb_detail_pembelian_ayam` union select `tb_detail_penjualan_ayam`.`id_detail_penjualan_ayam` AS `id_transaksi`,`tb_detail_penjualan_ayam`.`id_kandang` AS `id_kandang`,NULL AS `id_supplier`,`tb_detail_penjualan_ayam`.`tanggal` AS `tanggal`,`tb_detail_penjualan_ayam`.`jumlah_ayam` AS `jumlah_ayam`,`tb_detail_penjualan_ayam`.`keterangan` AS `keterangan`,'out' AS `aksi`,`tb_detail_penjualan_ayam`.`id_admin` AS `id_admin`,`tb_detail_penjualan_ayam`.`id_karyawan` AS `id_karyawan`,`tb_detail_penjualan_ayam`.`update_by_karyawan` AS `update_by_karyawan`,`tb_detail_penjualan_ayam`.`update_by_admin` AS `update_by_admin`,`tb_detail_penjualan_ayam`.`created_at` AS `created_at`,`tb_detail_penjualan_ayam`.`updated_at` AS `updated_at` from `tb_detail_penjualan_ayam` union select `tb_detail_kerugian_ayam`.`id_detail_kerugian_ayam` AS `id_transaksi`,`tb_detail_kerugian_ayam`.`id_kandang` AS `id_kandang`,NULL AS `id_supplier`,`tb_detail_kerugian_ayam`.`tanggal` AS `tanggal`,`tb_detail_kerugian_ayam`.`jumlah` AS `jumlah_ayam`,`tb_detail_kerugian_ayam`.`keterangan` AS `keterangan`,'out' AS `aksi`,`tb_detail_kerugian_ayam`.`id_admin` AS `id_admin`,`tb_detail_kerugian_ayam`.`id_karyawan` AS `id_karyawan`,`tb_detail_kerugian_ayam`.`update_by_karyawan` AS `update_by_karyawan`,`tb_detail_kerugian_ayam`.`update_by_admin` AS `update_by_admin`,`tb_detail_kerugian_ayam`.`created_at` AS `created_at`,`tb_detail_kerugian_ayam`.`updated_at` AS `updated_at` from `tb_detail_kerugian_ayam`;

-- Dumping structure for view peternakan_app.view_transaksi_gudang
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_transaksi_gudang`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_gudang` AS (select `detail_pembelian_gudang`.`id_detail_pembelian_gudang` AS `id_transaksi`,'in' AS `aksi`,`detail_pembelian_gudang`.`id_persediaan` AS `id_gudang`,`detail_pembelian_gudang`.`id_supplier` AS `id_supplier`,`detail_pembelian_gudang`.`tanggal` AS `tanggal`,`detail_pembelian_gudang`.`jumlah` AS `jumlah`,`detail_pembelian_gudang`.`id_admin` AS `id_admin`,`detail_pembelian_gudang`.`id_karyawan` AS `id_karyawan`,`detail_pembelian_gudang`.`update_by_admin` AS `update_by_admin`,`detail_pembelian_gudang`.`update_by_karyawan` AS `update_by_karyawan`,`detail_pembelian_gudang`.`created_at` AS `created_at`,`detail_pembelian_gudang`.`updated_at` AS `updated_at`,'' AS `keterangan` from `detail_pembelian_gudang`) union all (select `detail_pengeluaran_gudang`.`id_detail_pengeluaran_gudang` AS `id_detail_pengeluaran_gudang`,'out' AS `aksi`,`detail_pengeluaran_gudang`.`id_persediaan` AS `id_gudang`,NULL AS `id_supplier`,`detail_pengeluaran_gudang`.`tanggal` AS `tanggal`,`detail_pengeluaran_gudang`.`jumlah` AS `jumlah`,`detail_pengeluaran_gudang`.`id_admin` AS `id_admin`,`detail_pengeluaran_gudang`.`id_karyawan` AS `id_karyawan`,`detail_pengeluaran_gudang`.`update_by_admin` AS `update_by_admin`,`detail_pengeluaran_gudang`.`update_by_karyawan` AS `update_by_karyawan`,`detail_pengeluaran_gudang`.`created_at` AS `created_at`,`detail_pengeluaran_gudang`.`updated_at` AS `updated_at`,`detail_pengeluaran_gudang`.`keterangan` AS `keterangan` from `detail_pengeluaran_gudang`);

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
