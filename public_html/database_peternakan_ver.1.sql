-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_perternakan_ayam
CREATE DATABASE IF NOT EXISTS `db_perternakan_ayam` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_perternakan_ayam`;

-- Dumping structure for table db_perternakan_ayam.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usernmae` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.admin: ~2 rows (approximately)
DELETE FROM `admin`;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `username`, `password`) VALUES
	(5, 'admin', '$1$cQ2./l0.$2EEzCFuqA2rIOq1.sNTtD1'),
	(6, 'aaa', '$1$S/1.zk4.$0qKF24Yg2XvO67EHRk7eS.');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.detail_kandang_vaksin
CREATE TABLE IF NOT EXISTS `detail_kandang_vaksin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kandang` int(11) NOT NULL DEFAULT '0',
  `id_vaksin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_detail_kandang_vaksin_kandang` (`id_kandang`),
  KEY `FK_detail_kandang_vaksin_vaksin` (`id_vaksin`),
  CONSTRAINT `FK_detail_kandang_vaksin_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id`),
  CONSTRAINT `FK_detail_kandang_vaksin_vaksin` FOREIGN KEY (`id_vaksin`) REFERENCES `persediaan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.detail_kandang_vaksin: ~0 rows (approximately)
DELETE FROM `detail_kandang_vaksin`;
/*!40000 ALTER TABLE `detail_kandang_vaksin` DISABLE KEYS */;
INSERT INTO `detail_kandang_vaksin` (`id`, `id_kandang`, `id_vaksin`) VALUES
	(1, 1, 2);
/*!40000 ALTER TABLE `detail_kandang_vaksin` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.detail_pakan_kandang
CREATE TABLE IF NOT EXISTS `detail_pakan_kandang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kandang` int(11) NOT NULL,
  `id_pakan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `type_durasi` enum('MONTHLY','DAILY','YEARLY') NOT NULL DEFAULT 'DAILY',
  `durasi` int(11) NOT NULL DEFAULT '0',
  `type` enum('event-important','event-success','event-warning','event-info','event-inverse','event-special') NOT NULL DEFAULT 'event-info',
  PRIMARY KEY (`id`),
  KEY `FK_detail_pakan_kandang_kandang` (`id_kandang`),
  KEY `FK_detail_pakan_kandang_pakan` (`id_pakan`),
  CONSTRAINT `FK_detail_pakan_kandang_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pakan_kandang_pakan` FOREIGN KEY (`id_pakan`) REFERENCES `pakan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.detail_pakan_kandang: ~0 rows (approximately)
DELETE FROM `detail_pakan_kandang`;
/*!40000 ALTER TABLE `detail_pakan_kandang` DISABLE KEYS */;
INSERT INTO `detail_pakan_kandang` (`id`, `id_kandang`, `id_pakan`, `jumlah`, `type_durasi`, `durasi`, `type`) VALUES
	(1, 1, 1, 10, 'DAILY', 0, 'event-info');
/*!40000 ALTER TABLE `detail_pakan_kandang` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.detail_pembelian
CREATE TABLE IF NOT EXISTS `detail_pembelian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_vendor` int(11) NOT NULL,
  `id_kandang` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `umur_awal` int(11) NOT NULL,
  `jumlah_ayam` int(11) NOT NULL,
  `nominal` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_detail_pembelian_supplier` (`id_vendor`),
  KEY `FK_detail_pembelian_kandang` (`id_kandang`),
  CONSTRAINT `FK_detail_pembelian_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pembelian_supplier` FOREIGN KEY (`id_vendor`) REFERENCES `supplier` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.detail_pembelian: ~2 rows (approximately)
DELETE FROM `detail_pembelian`;
/*!40000 ALTER TABLE `detail_pembelian` DISABLE KEYS */;
INSERT INTO `detail_pembelian` (`id`, `id_vendor`, `id_kandang`, `tanggal`, `umur_awal`, `jumlah_ayam`, `nominal`) VALUES
	(13, 3, 1, '2018-07-13 01:19:59', 1, 50, 0),
	(15, 4, 1, '2018-07-25 15:59:48', 1, 15, 0);
/*!40000 ALTER TABLE `detail_pembelian` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.detail_pembelian_gudang
CREATE TABLE IF NOT EXISTS `detail_pembelian_gudang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_transaksi` datetime NOT NULL,
  `id_persediaan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `nominal` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_detail_pembelian_vaksin_vaksin` (`id_persediaan`),
  CONSTRAINT `FK_detail_pembelian_vaksin_vaksin` FOREIGN KEY (`id_persediaan`) REFERENCES `persediaan` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.detail_pembelian_gudang: ~1 rows (approximately)
DELETE FROM `detail_pembelian_gudang`;
/*!40000 ALTER TABLE `detail_pembelian_gudang` DISABLE KEYS */;
INSERT INTO `detail_pembelian_gudang` (`id`, `tanggal_transaksi`, `id_persediaan`, `jumlah`, `nominal`) VALUES
	(3, '2018-08-25 14:34:57', 3, 100, 10000);
/*!40000 ALTER TABLE `detail_pembelian_gudang` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.detail_pembelian_pakan
CREATE TABLE IF NOT EXISTS `detail_pembelian_pakan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pakan` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `nominal_pembelian` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_detail_pembelian_pakan_pakan` (`id_pakan`),
  CONSTRAINT `FK_detail_pembelian_pakan_pakan` FOREIGN KEY (`id_pakan`) REFERENCES `pakan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.detail_pembelian_pakan: ~0 rows (approximately)
DELETE FROM `detail_pembelian_pakan`;
/*!40000 ALTER TABLE `detail_pembelian_pakan` DISABLE KEYS */;
INSERT INTO `detail_pembelian_pakan` (`id`, `id_pakan`, `tanggal_transaksi`, `jumlah`, `nominal_pembelian`) VALUES
	(1, 1, '2018-08-19', 100, 100000);
/*!40000 ALTER TABLE `detail_pembelian_pakan` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.detail_pengeluaran_gudang
CREATE TABLE IF NOT EXISTS `detail_pengeluaran_gudang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_transaksi` datetime NOT NULL,
  `id_persediaan` int(11) NOT NULL,
  `id_kandang` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_detail_pengeluaran_vaksin_vaksin` (`id_persediaan`),
  KEY `FK_detail_pengeluaran_vaksin_kandang` (`id_kandang`),
  CONSTRAINT `FK_detail_pengeluaran_vaksin_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pengeluaran_vaksin_vaksin` FOREIGN KEY (`id_persediaan`) REFERENCES `persediaan` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.detail_pengeluaran_gudang: ~0 rows (approximately)
DELETE FROM `detail_pengeluaran_gudang`;
/*!40000 ALTER TABLE `detail_pengeluaran_gudang` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_pengeluaran_gudang` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.detail_pengeluaran_pakan
CREATE TABLE IF NOT EXISTS `detail_pengeluaran_pakan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pakan` int(11) NOT NULL,
  `id_kandang` int(11) DEFAULT NULL,
  `keterangan` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_detail_pengeluaran_pakan_pakan` (`id_pakan`),
  KEY `FK_detail_pengeluaran_pakan_kandang` (`id_kandang`),
  CONSTRAINT `FK_detail_pengeluaran_pakan_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pengeluaran_pakan_pakan` FOREIGN KEY (`id_pakan`) REFERENCES `pakan` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.detail_pengeluaran_pakan: ~0 rows (approximately)
DELETE FROM `detail_pengeluaran_pakan`;
/*!40000 ALTER TABLE `detail_pengeluaran_pakan` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_pengeluaran_pakan` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.detail_penjualan
CREATE TABLE IF NOT EXISTS `detail_penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_penjualan` int(11),
  `id_kandang` int(11) DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `jumlah_ayam` int(11) NOT NULL,
  `nominal` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_detail_penjualan_penjualan` (`id_penjualan`),
  KEY `FK_detail_penjualan_kandang` (`id_kandang`),
  CONSTRAINT `FK_detail_penjualan_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id`),
  CONSTRAINT `FK_detail_penjualan_penjualan` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.detail_penjualan: ~1 rows (approximately)
DELETE FROM `detail_penjualan`;
/*!40000 ALTER TABLE `detail_penjualan` DISABLE KEYS */;
INSERT INTO `detail_penjualan` (`id`, `id_penjualan`, `id_kandang`, `tanggal`, `jumlah_ayam`, `nominal`) VALUES
	(10, NULL, 1, '2018-07-13 01:30:53', 10, 100000);
/*!40000 ALTER TABLE `detail_penjualan` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.detail_persediaan
CREATE TABLE IF NOT EXISTS `detail_persediaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_persediaan` int(11) DEFAULT NULL,
  `id_kandang` int(11),
  `type_durasi` enum('MONTHLY','DAILY','YEARLY') NOT NULL DEFAULT 'MONTHLY',
  `durasi` int(11) NOT NULL DEFAULT '1',
  `type` enum('event-important','event-success','event-warning','event-info','event-inverse','event-special') NOT NULL DEFAULT 'event-info',
  PRIMARY KEY (`id`),
  KEY `FK_detail_vaksin_kandang` (`id_kandang`),
  KEY `FK_detail_vaksin_vaksin` (`id_persediaan`),
  CONSTRAINT `FK_detail_vaksin_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id`),
  CONSTRAINT `FK_detail_vaksin_vaksin` FOREIGN KEY (`id_persediaan`) REFERENCES `persediaan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.detail_persediaan: ~4 rows (approximately)
DELETE FROM `detail_persediaan`;
/*!40000 ALTER TABLE `detail_persediaan` DISABLE KEYS */;
INSERT INTO `detail_persediaan` (`id`, `id_persediaan`, `id_kandang`, `type_durasi`, `durasi`, `type`) VALUES
	(1, 2, 1, 'MONTHLY', 1, 'event-important'),
	(4, 3, 1, 'MONTHLY', 1, 'event-important'),
	(5, 3, 2, 'MONTHLY', 1, 'event-important'),
	(6, 4, 1, 'DAILY', 1, 'event-important');
/*!40000 ALTER TABLE `detail_persediaan` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.detail_supplier_jenis
CREATE TABLE IF NOT EXISTS `detail_supplier_jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_supplier` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_supplier_id_jenis` (`id_supplier`,`id_jenis`),
  KEY `FK_detail_supplier_jenis_jenis_supplier` (`id_jenis`),
  CONSTRAINT `FK_detail_supplier_jenis_jenis_supplier` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_supplier_jenis_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.detail_supplier_jenis: ~2 rows (approximately)
DELETE FROM `detail_supplier_jenis`;
/*!40000 ALTER TABLE `detail_supplier_jenis` DISABLE KEYS */;
INSERT INTO `detail_supplier_jenis` (`id`, `id_supplier`, `id_jenis`) VALUES
	(1, 3, 1),
	(2, 3, 2);
/*!40000 ALTER TABLE `detail_supplier_jenis` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.jenis_supplier
CREATE TABLE IF NOT EXISTS `jenis_supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.jenis_supplier: ~2 rows (approximately)
DELETE FROM `jenis_supplier`;
/*!40000 ALTER TABLE `jenis_supplier` DISABLE KEYS */;
INSERT INTO `jenis_supplier` (`id`, `keterangan`) VALUES
	(1, 'Pakan'),
	(2, 'Vaksin');
/*!40000 ALTER TABLE `jenis_supplier` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.kandang
CREATE TABLE IF NOT EXISTS `kandang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `maksimal_jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.kandang: ~3 rows (approximately)
DELETE FROM `kandang`;
/*!40000 ALTER TABLE `kandang` DISABLE KEYS */;
INSERT INTO `kandang` (`id`, `nama`, `maksimal_jumlah`) VALUES
	(1, 'kandang 1', 20),
	(2, 'kandang 2', 30),
	(3, 'kandang 3', 30);
/*!40000 ALTER TABLE `kandang` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.kandang_persediaan_history
CREATE TABLE IF NOT EXISTS `kandang_persediaan_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembelian` int(11) NOT NULL,
  `id_persediaan` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_pembelian_id_vaksin_tanggal` (`id_pembelian`,`id_persediaan`,`tanggal`),
  KEY `FK_kadang_vaksin_history_vaksin` (`id_persediaan`),
  CONSTRAINT `FK_kadang_vaksin_history_detail_pembelian` FOREIGN KEY (`id_pembelian`) REFERENCES `detail_pembelian` (`id`),
  CONSTRAINT `FK_kadang_vaksin_history_vaksin` FOREIGN KEY (`id_persediaan`) REFERENCES `persediaan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.kandang_persediaan_history: ~1 rows (approximately)
DELETE FROM `kandang_persediaan_history`;
/*!40000 ALTER TABLE `kandang_persediaan_history` DISABLE KEYS */;
INSERT INTO `kandang_persediaan_history` (`id`, `id_pembelian`, `id_persediaan`, `tanggal`) VALUES
	(7, 15, 2, '2018-07-25');
/*!40000 ALTER TABLE `kandang_persediaan_history` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.karyawan
CREATE TABLE IF NOT EXISTS `karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `gaji` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text,
  `hint` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.karyawan: ~2 rows (approximately)
DELETE FROM `karyawan`;
/*!40000 ALTER TABLE `karyawan` DISABLE KEYS */;
INSERT INTO `karyawan` (`id`, `nama`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `no_hp`, `gaji`, `username`, `password`, `hint`) VALUES
	(1, 'Karyawan 1', '2018-07-24', 'Matesih', 'Jl. pasanah', '0856470000001', 1200000, 'supersuper', '$1$somethin$k8AtJbDPlkfGtvGU2qXx5.', '123'),
	(2, 'jono', '2018-08-18', 'Matesih 1', 'karangmulyo', '0856571111111', 200000, 'superadmin', '$1$somethin$f3PxGtAYM8jWEyWGPrKsQ1', '');
/*!40000 ALTER TABLE `karyawan` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.kerugian
CREATE TABLE IF NOT EXISTS `kerugian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kandang` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `jumlah_ayam` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_detail_kerugian_kandang` (`id_kandang`),
  CONSTRAINT `FK_detail_kerugian_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.kerugian: ~1 rows (approximately)
DELETE FROM `kerugian`;
/*!40000 ALTER TABLE `kerugian` DISABLE KEYS */;
INSERT INTO `kerugian` (`id`, `id_kandang`, `tanggal`, `keterangan`, `jumlah_ayam`) VALUES
	(10, 1, '2018-07-13 10:31:17', '', 15);
/*!40000 ALTER TABLE `kerugian` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.pakan
CREATE TABLE IF NOT EXISTS `pakan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `cara_pemakaian` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.pakan: ~1 rows (approximately)
DELETE FROM `pakan`;
/*!40000 ALTER TABLE `pakan` DISABLE KEYS */;
INSERT INTO `pakan` (`id`, `nama`, `keterangan`, `cara_pemakaian`) VALUES
	(1, 'Katul', 'makanan pokok 1', 'ditaburkan');
/*!40000 ALTER TABLE `pakan` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.penjualan
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.penjualan: ~0 rows (approximately)
DELETE FROM `penjualan`;
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
INSERT INTO `penjualan` (`id`) VALUES
	(1);
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.persediaan
CREATE TABLE IF NOT EXISTS `persediaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_gudang` int(11),
  `nama` varchar(12) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `cara_pemakaian` text NOT NULL,
  `type_durasi` enum('MONTHLY','DAILY','YEARLY') NOT NULL DEFAULT 'DAILY',
  `durasi` int(11) NOT NULL,
  `type` enum('event-important','event-success','event-warning','event-info','event-inverse','event-special') NOT NULL DEFAULT 'event-info',
  PRIMARY KEY (`id`),
  KEY `FK_vaksin_type_gudang` (`type_gudang`),
  CONSTRAINT `FK_vaksin_type_gudang` FOREIGN KEY (`type_gudang`) REFERENCES `type_gudang` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.persediaan: ~3 rows (approximately)
DELETE FROM `persediaan`;
/*!40000 ALTER TABLE `persediaan` DISABLE KEYS */;
INSERT INTO `persediaan` (`id`, `type_gudang`, `nama`, `keterangan`, `cara_pemakaian`, `type_durasi`, `durasi`, `type`) VALUES
	(2, 1, 'vaksin deman', 'perbaikan gizi', 'di siram', 'DAILY', 7, 'event-info'),
	(3, 1, 'vaksin Flu', 'Flu Burung', 'Ditaburkan dipakanan', 'MONTHLY', 2, 'event-important'),
	(4, 2, 'katul', 'Makanan Ayam', 'ditaburkan 3 kali sehari', 'DAILY', 0, 'event-info');
/*!40000 ALTER TABLE `persediaan` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.supplier
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `notelepon` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.supplier: ~3 rows (approximately)
DELETE FROM `supplier`;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` (`id`, `nama`, `alamat`, `notelepon`) VALUES
	(3, 'Terbit Terang', 'Jl. Kusuma Negara no.5', '+62855470001'),
	(4, 'Terang Bersahaja', 'Jl. Kawitan no. 6 Sidorejo', '08547132566');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.type_gudang
CREATE TABLE IF NOT EXISTS `type_gudang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.type_gudang: ~0 rows (approximately)
DELETE FROM `type_gudang`;
/*!40000 ALTER TABLE `type_gudang` DISABLE KEYS */;
INSERT INTO `type_gudang` (`id`, `keterangan`) VALUES
	(1, 'vaksin'),
	(2, 'pakan');
/*!40000 ALTER TABLE `type_gudang` ENABLE KEYS */;

-- Dumping structure for view db_perternakan_ayam.view_dashboard_kerugian_ayam
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_dashboard_kerugian_ayam` (
	`tahun` BIGINT(20) NULL,
	`bulan` BIGINT(20) NOT NULL,
	`monthname` VARCHAR(9) NULL COLLATE 'utf8mb4_general_ci',
	`jumlah_ayam` DECIMAL(32,0) NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_perternakan_ayam.view_dashboard_pembelian_ayam
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_dashboard_pembelian_ayam` (
	`tahun` BIGINT(20) NULL,
	`bulan` BIGINT(20) NOT NULL,
	`monthname` VARCHAR(9) NULL COLLATE 'utf8mb4_general_ci',
	`jumlah_ayam` DECIMAL(32,0) NULL,
	`total_nominal` DECIMAL(32,0) NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_perternakan_ayam.view_dashboard_penjualan_ayam
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_dashboard_penjualan_ayam` (
	`tahun` BIGINT(20) NULL,
	`bulan` BIGINT(20) NOT NULL,
	`monthname` VARCHAR(9) NULL COLLATE 'utf8mb4_general_ci',
	`jumlah_ayam` DECIMAL(32,0) NULL,
	`total_nominal` DECIMAL(32,0) NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_perternakan_ayam.view_history_transaksi
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_history_transaksi` (
	`id` INT(11) NOT NULL,
	`tanggal_transaksi` DATETIME NOT NULL,
	`id_kandang` INT(11) NOT NULL,
	`nama_kandang` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`jumlah_ayam` INT(11) NOT NULL,
	`nama_supplier` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`nominal` BIGINT(20) NOT NULL,
	`perubahan_jumlah` DECIMAL(34,0) NULL,
	`id_vendor` INT(11) NULL,
	`umur_awal` INT(11) NULL,
	`keterangan` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`ket` VARCHAR(4) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view db_perternakan_ayam.view_history_transaksi_gudang
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_history_transaksi_gudang` (
	`id` INT(11) NOT NULL,
	`tanggal_transaksi` DATETIME NOT NULL,
	`id_persediaan` INT(11) NOT NULL,
	`id_kandang` INT(11) NULL,
	`jumlah` INT(11) NOT NULL,
	`nominal` BIGINT(20) NOT NULL,
	`keterangan` TEXT NULL COLLATE 'latin1_swedish_ci',
	`ket` VARCHAR(4) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view db_perternakan_ayam.view_jumlah_ayam_kandang
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_jumlah_ayam_kandang` (
	`id_kandang` INT(11) NOT NULL,
	`nama_kandang` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`maksimal_jumlah` INT(11) NULL,
	`jumlah_ayam` DECIMAL(34,0) NOT NULL,
	`keterangan` VARCHAR(16) NOT NULL COLLATE 'utf8mb4_general_ci',
	`id_pembelian_terbaru` BIGINT(11) NULL,
	`id_penjualan_terbaru` BIGINT(11) NULL,
	`tanggal_pembelian_terbaru` DATETIME NULL,
	`tanggal_penjualan_terbaru` DATETIME NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_perternakan_ayam.view_jumlah_ayam_keseluruhan_history
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_jumlah_ayam_keseluruhan_history` (
	`id_kandang` INT(11) NOT NULL,
	`nama_kandang` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`maksimal_jumlah` INT(11) NULL,
	`jumlah_ayam` DECIMAL(34,0) NOT NULL,
	`keterangan` VARCHAR(16) NOT NULL COLLATE 'utf8mb4_general_ci',
	`id_pembelian_terbaru` BIGINT(11) NULL,
	`id_penjualan_terbaru` BIGINT(11) NULL,
	`tanggal_pembelian_terbaru` DATETIME NULL,
	`tanggal_penjualan_terbaru` DATETIME NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_perternakan_ayam.view_periode_transaksi
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_periode_transaksi` (
	`tahun` BIGINT(20) NULL,
	`bulan` BIGINT(20) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_perternakan_ayam.view_semua_transaksi_pembelian_kandang
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_semua_transaksi_pembelian_kandang` (
	`id` INT(11) NOT NULL,
	`id_vendor` INT(11) NOT NULL,
	`id_kandang` INT(11) NOT NULL,
	`tanggal` DATETIME NOT NULL,
	`umur_awal` INT(11) NOT NULL,
	`jumlah_ayam` INT(11) NOT NULL,
	`nama_kandang` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`maksimal_jumlah` INT(11) NULL,
	`nama_supplier` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`alamat_supplier` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`notelepon_supplier` VARCHAR(15) NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view db_perternakan_ayam.view_stok_gudang_pakan
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_stok_gudang_pakan` (
	`jumlah` DOUBLE NULL,
	`id` INT(11) NOT NULL,
	`nama` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`keterangan` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`cara_pemakaian` TEXT NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view db_perternakan_ayam.view_stok_gudang_vaksin
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_stok_gudang_vaksin` (
	`jumlah` DECIMAL(33,0) NULL,
	`id` INT(11) NOT NULL,
	`type_gudang` INT(11) NULL,
	`nama` VARCHAR(12) NOT NULL COLLATE 'latin1_swedish_ci',
	`keterangan` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`cara_pemakaian` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`type_durasi` ENUM('MONTHLY','DAILY','YEARLY') NOT NULL COLLATE 'latin1_swedish_ci',
	`durasi` INT(11) NOT NULL,
	`type` ENUM('event-important','event-success','event-warning','event-info','event-inverse','event-special') NOT NULL COLLATE 'latin1_swedish_ci',
	`ket_type_gudang` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view db_perternakan_ayam.view_dashboard_kerugian_ayam
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_dashboard_kerugian_ayam`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_dashboard_kerugian_ayam` AS select 
tahun, 
bulan,
MONTHNAME(concat(tahun,"-", bulan, "-", 1)) as monthname,
(select ifnull(sum(kerugian.jumlah_ayam), 0) from kerugian where year(kerugian.tanggal) = tahun and month(kerugian.tanggal) = bulan) as jumlah_ayam
from view_periode_transaksi ;

-- Dumping structure for view db_perternakan_ayam.view_dashboard_pembelian_ayam
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_dashboard_pembelian_ayam`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_dashboard_pembelian_ayam` AS select 
tahun, 
bulan,
MONTHNAME(concat(tahun,"-", bulan, "-", 1)) as monthname,
(select ifnull(sum(detail_pembelian.jumlah_ayam), 0) from detail_pembelian where year(detail_pembelian.tanggal) = tahun and month(detail_pembelian.tanggal) = bulan) as jumlah_ayam,
(select ifnull(sum(detail_pembelian.nominal), 0) from detail_pembelian where year(detail_pembelian.tanggal) = tahun and month(detail_pembelian.tanggal) = bulan) as total_nominal
from view_periode_transaksi ;

-- Dumping structure for view db_perternakan_ayam.view_dashboard_penjualan_ayam
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_dashboard_penjualan_ayam`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_dashboard_penjualan_ayam` AS select 
tahun, 
bulan,
MONTHNAME(concat(tahun,"-", bulan, "-", 1)) as monthname,
(select ifnull(sum(detail_penjualan.jumlah_ayam), 0) from detail_penjualan where year(detail_penjualan.tanggal) = tahun and month(detail_penjualan.tanggal) = bulan) as jumlah_ayam,
(select ifnull(sum(detail_penjualan.nominal), 0) from detail_penjualan where year(detail_penjualan.tanggal) = tahun and month(detail_penjualan.tanggal) = bulan) as total_nominal
from view_periode_transaksi ;

-- Dumping structure for view db_perternakan_ayam.view_history_transaksi
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_history_transaksi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_history_transaksi` AS (
	select 
		detail_penjualan.id, 
		detail_penjualan.tanggal as tanggal_transaksi, 
		kandang.id as id_kandang, 
		kandang.nama as nama_kandang , 
		detail_penjualan.jumlah_ayam, '' as nama_supplier,
		detail_penjualan.nominal as nominal,
		(SELECT ifnull(sum(detail_pembelian.jumlah_ayam), 0) from detail_pembelian 
				WHERE detail_pembelian.id_kandang = kandang.id and detail_pembelian.tanggal <= tanggal_transaksi) 
				- 
			(SELECT ifnull(sum(detail_penjualan.jumlah_ayam), 0) from detail_penjualan 
				WHERE detail_penjualan.id_kandang = kandang.id and detail_penjualan.tanggal <= tanggal_transaksi)
				-
			(SELECT ifnull(sum(kerugian.jumlah_ayam), 0) from kerugian 
				WHERE kerugian.id_kandang = kandang.id and kerugian.tanggal <= tanggal_transaksi) as perubahan_jumlah, 
			null as id_vendor,
			null as umur_awal,
			null as keterangan,
			'jual' as ket
		from detail_penjualan 
	INNER join kandang on kandang.id = detail_penjualan.id_kandang
)
union all
(
	SELECT 
		detail_pembelian.id, 
		detail_pembelian.tanggal as tanggal_transaksi, 
		kandang.id as id_kandang, 
		kandang.nama as nama_kandang, 
		detail_pembelian.jumlah_ayam,
		supplier.nama as nama_supplier,
		detail_pembelian.nominal as nominal,
		(SELECT ifnull(sum(detail_pembelian.jumlah_ayam), 0) from detail_pembelian 
			WHERE detail_pembelian.id_kandang = kandang.id and detail_pembelian.tanggal <= tanggal_transaksi)
			- 
		(SELECT ifnull(sum(detail_penjualan.jumlah_ayam), 0) from detail_penjualan 
			WHERE detail_penjualan.id_kandang = kandang.id and detail_penjualan.tanggal <= tanggal_transaksi)
			-
		(SELECT ifnull(sum(kerugian.jumlah_ayam), 0) from kerugian 
			WHERE kerugian.id_kandang = kandang.id and kerugian.tanggal <= tanggal_transaksi) as perubahan_jumlah, 
		detail_pembelian.id_vendor,
		detail_pembelian.umur_awal,
		null,
		'beli' as ket 
		from kandang 
	inner JOIN detail_pembelian ON detail_pembelian.id_kandang = kandang.id
	inner join supplier on detail_pembelian.id_vendor = supplier.id
)
union all
(
	select 
		kerugian.id, 
		kerugian.tanggal as tanggal_transaksi, 
		kandang.id as id_kandang, 
		kandang.nama as nama_kandang, 
		kerugian.jumlah_ayam, '' as nama_supplier, 
		0 as nominal,
		(SELECT ifnull(sum(detail_pembelian.jumlah_ayam), 0) from detail_pembelian 
			WHERE detail_pembelian.id_kandang = kandang.id and detail_pembelian.tanggal <= tanggal_transaksi) 
			- 
		(SELECT ifnull(sum(detail_penjualan.jumlah_ayam), 0) from detail_penjualan 
			WHERE detail_penjualan.id_kandang = kandang.id and detail_penjualan.tanggal <= tanggal_transaksi)
			-
		(SELECT ifnull(sum(kerugian.jumlah_ayam), 0) from kerugian 
			WHERE kerugian.id_kandang = kandang.id and kerugian.tanggal <= tanggal_transaksi) as perubahan_jumlah,
		null,
		null,
		kerugian.keterangan,
		'rugi' as ket
	from kerugian 
	inner join kandang on kandang.id = kerugian.id_kandang
)
order by id_kandang, tanggal_transaksi desc ;

-- Dumping structure for view db_perternakan_ayam.view_history_transaksi_gudang
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_history_transaksi_gudang`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_history_transaksi_gudang` AS (
select id, tanggal_transaksi, id_persediaan, null as id_kandang, jumlah, nominal, null as keterangan, 'beli' as ket from detail_pembelian_gudang
)
union all
(
select id, tanggal_transaksi, id_persediaan, id_kandang, jumlah, 0, keterangan, 'jual'  as ket from detail_pengeluaran_gudang
) ;

-- Dumping structure for view db_perternakan_ayam.view_jumlah_ayam_kandang
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_jumlah_ayam_kandang`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jumlah_ayam_kandang` AS select kandang.id as id_kandang, kandang.nama as nama_kandang, kandang.maksimal_jumlah, 
	IFNULL(sum(detail_pembelian.jumlah_ayam) 
		- (select ifnull(sum(detail_penjualan.jumlah_ayam), 0) from detail_penjualan WHERE detail_penjualan.id_kandang = kandang.id)
		- (select ifnull(sum(kerugian.jumlah_ayam), 0) from kerugian WHERE kerugian.id_kandang = kandang.id),0) 
		as jumlah_ayam, 
	if(IFNULL(sum(detail_pembelian.jumlah_ayam) 
		- (select ifnull(sum(detail_penjualan.jumlah_ayam), 0) from detail_penjualan WHERE detail_penjualan.id_kandang = kandang.id)
		- (select ifnull(sum(kerugian.jumlah_ayam), 0) from kerugian WHERE kerugian.id_kandang = kandang.id),0) <=0
		, 'Stock Ayam Habis', 'Masih ada') as keterangan,
	(select detail_pembelian.id from detail_pembelian where detail_pembelian.id_kandang = kandang.id order by detail_pembelian.tanggal desc limit 1) as id_pembelian_terbaru,
	(select detail_penjualan.id from detail_penjualan where detail_penjualan.id_kandang = kandang.id order by detail_penjualan.tanggal desc limit 1) as id_penjualan_terbaru,
	(select detail_pembelian.tanggal from detail_pembelian where detail_pembelian.id_kandang = kandang.id order by detail_pembelian.tanggal desc limit 1) as tanggal_pembelian_terbaru,
	(select detail_penjualan.tanggal from detail_penjualan where detail_penjualan.id_kandang = kandang.id order by detail_penjualan.tanggal desc limit 1) as tanggal_penjualan_terbaru
from kandang
left join detail_pembelian on detail_pembelian.id_kandang = kandang.id
left join supplier on supplier.id = detail_pembelian.id_vendor
group by kandang.id , kandang.nama, kandang.maksimal_jumlah ;

-- Dumping structure for view db_perternakan_ayam.view_jumlah_ayam_keseluruhan_history
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_jumlah_ayam_keseluruhan_history`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jumlah_ayam_keseluruhan_history` AS select kandang.id as id_kandang, kandang.nama as nama_kandang, kandang.maksimal_jumlah, 
	IFNULL(sum(detail_pembelian.jumlah_ayam) 
		- (select ifnull(sum(detail_penjualan.jumlah_ayam), 0) from detail_penjualan WHERE detail_penjualan.id_kandang = kandang.id)
		- (select ifnull(sum(kerugian.jumlah_ayam), 0) from kerugian WHERE kerugian.id_kandang = kandang.id),0) 
		as jumlah_ayam, 
	if(IFNULL(sum(detail_pembelian.jumlah_ayam) 
		- (select ifnull(sum(detail_penjualan.jumlah_ayam), 0) from detail_penjualan WHERE detail_penjualan.id_kandang = kandang.id)
		- (select ifnull(sum(kerugian.jumlah_ayam), 0) from kerugian WHERE kerugian.id_kandang = kandang.id),0) <=0
		, 'Stock Ayam Habis', 'Masih ada') as keterangan,
	(select detail_pembelian.id from detail_pembelian where detail_pembelian.id_kandang = kandang.id order by detail_pembelian.tanggal desc limit 1) as id_pembelian_terbaru,
	(select detail_penjualan.id from detail_penjualan where detail_penjualan.id_kandang = kandang.id order by detail_penjualan.tanggal desc limit 1) as id_penjualan_terbaru,
	(select detail_pembelian.tanggal from detail_pembelian where detail_pembelian.id_kandang = kandang.id order by detail_pembelian.tanggal desc limit 1) as tanggal_pembelian_terbaru,
	(select detail_penjualan.tanggal from detail_penjualan where detail_penjualan.id_kandang = kandang.id order by detail_penjualan.tanggal desc limit 1) as tanggal_penjualan_terbaru
from kandang
left join detail_pembelian on detail_pembelian.id_kandang = kandang.id
left join supplier on supplier.id = detail_pembelian.id_vendor
group by kandang.id , kandang.nama, kandang.maksimal_jumlah ;

-- Dumping structure for view db_perternakan_ayam.view_periode_transaksi
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_periode_transaksi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_periode_transaksi` AS select distinct(YEAR(view_history_transaksi.tanggal_transaksi)) as tahun, 1 as bulan from view_history_transaksi 
where 
YEAR(view_history_transaksi.tanggal_transaksi) <= (select year(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi) and
1 <= (select month(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi)
union all
select distinct(YEAR(view_history_transaksi.tanggal_transaksi)) as tahun, 2 as bulan from view_history_transaksi 
where 
YEAR(view_history_transaksi.tanggal_transaksi) <= (select year(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi) and
2 <= (select month(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi)
union all
select distinct(YEAR(view_history_transaksi.tanggal_transaksi)) as tahun, 3 as bulan from view_history_transaksi 
where 
YEAR(view_history_transaksi.tanggal_transaksi) <= (select year(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi) and
3 <= (select month(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi)
union all
select distinct(YEAR(view_history_transaksi.tanggal_transaksi)) as tahun,4 as bulan from view_history_transaksi 
where 
YEAR(view_history_transaksi.tanggal_transaksi) <= (select year(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi) and
4 <= (select month(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi)
union all
select distinct(YEAR(view_history_transaksi.tanggal_transaksi)) as tahun, 5 as bulan from view_history_transaksi 
where 
YEAR(view_history_transaksi.tanggal_transaksi) <= (select year(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi) and
5 <= (select month(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi)
union all
select distinct(YEAR(view_history_transaksi.tanggal_transaksi)) as tahun, 6 as bulan from view_history_transaksi 
where 
YEAR(view_history_transaksi.tanggal_transaksi) <= (select year(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi) and
6 <= (select month(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi)
union all
select distinct(YEAR(view_history_transaksi.tanggal_transaksi)) as tahun, 7 as bulan from view_history_transaksi 
where 
YEAR(view_history_transaksi.tanggal_transaksi) <= (select year(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi) and
7 <= (select month(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi)
union all
select distinct(YEAR(view_history_transaksi.tanggal_transaksi)) as tahun,8 as bulan from view_history_transaksi 
where 
YEAR(view_history_transaksi.tanggal_transaksi) <= (select year(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi) and
8 <= (select month(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi)
union all
select distinct(YEAR(view_history_transaksi.tanggal_transaksi)) as tahun, 9 as bulan from view_history_transaksi 
where 
YEAR(view_history_transaksi.tanggal_transaksi) <= (select year(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi) and
9 <= (select month(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi)
union all
select distinct(YEAR(view_history_transaksi.tanggal_transaksi)) as tahun, 10 as bulan from view_history_transaksi 
where 
YEAR(view_history_transaksi.tanggal_transaksi) <= (select year(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi) and
10 <= (select month(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi)
union all
select distinct(YEAR(view_history_transaksi.tanggal_transaksi)) as tahun, 11 as bulan from view_history_transaksi 
where 
YEAR(view_history_transaksi.tanggal_transaksi) <= (select year(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi) and
11 <= (select month(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi)
union all
select distinct(YEAR(view_history_transaksi.tanggal_transaksi)) as tahun, 12 as bulan from view_history_transaksi 
where 
YEAR(view_history_transaksi.tanggal_transaksi) <= (select year(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi) and
12 <= (select month(max(view_history_transaksi.tanggal_transaksi)) from view_history_transaksi) ;

-- Dumping structure for view db_perternakan_ayam.view_semua_transaksi_pembelian_kandang
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_semua_transaksi_pembelian_kandang`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_semua_transaksi_pembelian_kandang` AS select detail_pembelian.*, kandang.nama as nama_kandang, kandang.maksimal_jumlah, supplier.nama as nama_supplier, supplier.alamat as alamat_supplier, supplier.notelepon as notelepon_supplier 
from kandang 
inner join detail_pembelian on detail_pembelian.id_kandang = kandang.id
inner join supplier on supplier.id = detail_pembelian.id_vendor 
order by detail_pembelian.id ASC ;

-- Dumping structure for view db_perternakan_ayam.view_stok_gudang_pakan
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_stok_gudang_pakan`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stok_gudang_pakan` AS select 
(select ifnull(sum(detail_pembelian_pakan.jumlah),0) from detail_pembelian_pakan where detail_pembelian_pakan.id_pakan = pakan.id) - 
(select ifnull(sum(detail_pengeluaran_pakan.jumlah), 0) from detail_pengeluaran_pakan where detail_pengeluaran_pakan.id_pakan = pakan.id) as jumlah, 
pakan.* from pakan
inner join detail_pakan_kandang on detail_pakan_kandang.id_pakan = pakan.id
inner join kandang on kandang.id = detail_pakan_kandang.id_kandang ;

-- Dumping structure for view db_perternakan_ayam.view_stok_gudang_vaksin
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_stok_gudang_vaksin`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stok_gudang_vaksin` AS select 
(select ifnull(sum(detail_pembelian_gudang.jumlah),0) from detail_pembelian_gudang where detail_pembelian_gudang.id_persediaan = persediaan.id) - (select ifnull(sum(detail_pengeluaran_gudang.jumlah), 0) from detail_pengeluaran_gudang where detail_pengeluaran_gudang.id_persediaan = persediaan.id) as jumlah, 
persediaan.*, type_gudang.keterangan as ket_type_gudang
from persediaan 
inner join type_gudang on type_gudang.id = persediaan.type_gudang ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
