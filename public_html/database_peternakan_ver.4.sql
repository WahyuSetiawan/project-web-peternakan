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

-- Dumping structure for table db_perternakan_ayam.detail_kandang_persediaan
CREATE TABLE IF NOT EXISTS `detail_kandang_persediaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kandang` int(11) NOT NULL DEFAULT '0',
  `id_persediaan` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_detail_kandang_vaksin_kandang` (`id_kandang`),
  KEY `FK_detail_kandang_vaksin_vaksin` (`id_persediaan`),
  CONSTRAINT `FK_detail_kandang_vaksin_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id`),
  CONSTRAINT `FK_detail_kandang_vaksin_vaksin` FOREIGN KEY (`id_persediaan`) REFERENCES `persediaan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.detail_kandang_persediaan: ~0 rows (approximately)
DELETE FROM `detail_kandang_persediaan`;
/*!40000 ALTER TABLE `detail_kandang_persediaan` DISABLE KEYS */;
INSERT INTO `detail_kandang_persediaan` (`id`, `id_kandang`, `id_persediaan`) VALUES
	(1, 1, 2);
/*!40000 ALTER TABLE `detail_kandang_persediaan` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.detail_pemasukan_ayam
CREATE TABLE IF NOT EXISTS `detail_pemasukan_ayam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kandang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_ayam` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_detail_pembelian_kandang` (`id_kandang`),
  CONSTRAINT `FK_detail_pembelian_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.detail_pemasukan_ayam: ~2 rows (approximately)
DELETE FROM `detail_pemasukan_ayam`;
/*!40000 ALTER TABLE `detail_pemasukan_ayam` DISABLE KEYS */;
INSERT INTO `detail_pemasukan_ayam` (`id`, `id_kandang`, `tanggal`, `jumlah_ayam`) VALUES
	(13, 1, '2018-07-13', 50),
	(15, 1, '2018-07-25', 15);
/*!40000 ALTER TABLE `detail_pemasukan_ayam` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.detail_pembelian_gudang
CREATE TABLE IF NOT EXISTS `detail_pembelian_gudang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_supplier` int(11),
  `tanggal_transaksi` datetime NOT NULL,
  `id_persediaan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `nominal` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_detail_pembelian_vaksin_vaksin` (`id_persediaan`),
  KEY `FK_detail_pembelian_gudang_supplier` (`id_supplier`),
  CONSTRAINT `FK_detail_pembelian_gudang_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pembelian_vaksin_vaksin` FOREIGN KEY (`id_persediaan`) REFERENCES `persediaan` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.detail_pembelian_gudang: ~3 rows (approximately)
DELETE FROM `detail_pembelian_gudang`;
/*!40000 ALTER TABLE `detail_pembelian_gudang` DISABLE KEYS */;
INSERT INTO `detail_pembelian_gudang` (`id`, `id_supplier`, `tanggal_transaksi`, `id_persediaan`, `jumlah`, `nominal`) VALUES
	(3, 4, '2018-08-25 14:34:57', 3, 100, 10000),
	(4, 4, '2018-08-27 01:37:24', 2, 100, 1),
	(5, 4, '2018-08-27 01:37:43', 4, 100, 1);
/*!40000 ALTER TABLE `detail_pembelian_gudang` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.detail_pengeluaran_ayam
CREATE TABLE IF NOT EXISTS `detail_pengeluaran_ayam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kandang` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `jumlah_ayam` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_detail_kerugian_kandang` (`id_kandang`),
  CONSTRAINT `FK_detail_kerugian_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.detail_pengeluaran_ayam: ~1 rows (approximately)
DELETE FROM `detail_pengeluaran_ayam`;
/*!40000 ALTER TABLE `detail_pengeluaran_ayam` DISABLE KEYS */;
INSERT INTO `detail_pengeluaran_ayam` (`id`, `id_kandang`, `tanggal`, `keterangan`, `jumlah_ayam`) VALUES
	(10, 1, '2018-07-13', '', 15);
/*!40000 ALTER TABLE `detail_pengeluaran_ayam` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.detail_pengeluaran_gudang: ~0 rows (approximately)
DELETE FROM `detail_pengeluaran_gudang`;
/*!40000 ALTER TABLE `detail_pengeluaran_gudang` DISABLE KEYS */;
INSERT INTO `detail_pengeluaran_gudang` (`id`, `tanggal_transaksi`, `id_persediaan`, `id_kandang`, `jumlah`, `keterangan`) VALUES
	(1, '2018-08-27 00:00:00', 4, 1, 10, '');
/*!40000 ALTER TABLE `detail_pengeluaran_gudang` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.detail_persediaan
CREATE TABLE IF NOT EXISTS `detail_persediaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_persediaan` int(11) DEFAULT NULL,
  `id_kandang` int(11) DEFAULT NULL,
  `type_durasi` enum('MONTHLY','DAILY','YEARLY') DEFAULT 'MONTHLY',
  `durasi` int(11) DEFAULT '1',
  `type` enum('event-important','event-success','event-warning','event-info','event-inverse','event-special') DEFAULT 'event-info',
  PRIMARY KEY (`id`),
  KEY `FK_detail_vaksin_kandang` (`id_kandang`),
  KEY `FK_detail_vaksin_vaksin` (`id_persediaan`),
  CONSTRAINT `FK_detail_vaksin_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id`),
  CONSTRAINT `FK_detail_vaksin_vaksin` FOREIGN KEY (`id_persediaan`) REFERENCES `persediaan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.detail_persediaan: ~6 rows (approximately)
DELETE FROM `detail_persediaan`;
/*!40000 ALTER TABLE `detail_persediaan` DISABLE KEYS */;
INSERT INTO `detail_persediaan` (`id`, `id_persediaan`, `id_kandang`, `type_durasi`, `durasi`, `type`) VALUES
	(1, 2, 1, 'DAILY', 3, 'event-special'),
	(4, 3, 1, 'MONTHLY', 1, 'event-important'),
	(5, 3, 2, 'MONTHLY', 1, 'event-important'),
	(7, 4, 1, 'DAILY', 1, 'event-info'),
	(8, 4, 2, 'DAILY', 1, 'event-warning'),
	(9, 2, 3, 'MONTHLY', 1, 'event-info');
/*!40000 ALTER TABLE `detail_persediaan` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.detail_supplier_jenis
CREATE TABLE IF NOT EXISTS `detail_supplier_jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_supplier` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_supplier_id_jenis` (`id_supplier`,`id_jenis`),
  KEY `FK_detail_supplier_jenis_jenis_supplier` (`id_jenis`),
  CONSTRAINT `FK_detail_supplier_jenis_jenis_supplier` FOREIGN KEY (`id_jenis`) REFERENCES `type_gudang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_supplier_jenis_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.detail_supplier_jenis: ~3 rows (approximately)
DELETE FROM `detail_supplier_jenis`;
/*!40000 ALTER TABLE `detail_supplier_jenis` DISABLE KEYS */;
INSERT INTO `detail_supplier_jenis` (`id`, `id_supplier`, `id_jenis`) VALUES
	(2, 3, 2),
	(4, 4, 1),
	(3, 4, 2);
/*!40000 ALTER TABLE `detail_supplier_jenis` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.kandang
CREATE TABLE IF NOT EXISTS `kandang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.kandang: ~3 rows (approximately)
DELETE FROM `kandang`;
/*!40000 ALTER TABLE `kandang` DISABLE KEYS */;
INSERT INTO `kandang` (`id`, `nama`) VALUES
	(1, 'kandang 1'),
	(2, 'kandang 2'),
	(3, 'kandang 3');
/*!40000 ALTER TABLE `kandang` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.kandang_persediaan_history
CREATE TABLE IF NOT EXISTS `kandang_persediaan_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembelian` int(11) NOT NULL,
  `id_persediaan` int(11) NOT NULL,
  `tanggal` date NOT NULL DEFAULT '0000-00-00',
  `jumlah` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_pembelian_id_vaksin_tanggal` (`id_pembelian`,`id_persediaan`,`tanggal`),
  KEY `FK_kadang_vaksin_history_vaksin` (`id_persediaan`),
  CONSTRAINT `FK_kadang_vaksin_history_detail_pembelian` FOREIGN KEY (`id_pembelian`) REFERENCES `detail_pemasukan_ayam` (`id`),
  CONSTRAINT `FK_kadang_vaksin_history_vaksin` FOREIGN KEY (`id_persediaan`) REFERENCES `persediaan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.kandang_persediaan_history: ~1 rows (approximately)
DELETE FROM `kandang_persediaan_history`;
/*!40000 ALTER TABLE `kandang_persediaan_history` DISABLE KEYS */;
INSERT INTO `kandang_persediaan_history` (`id`, `id_pembelian`, `id_persediaan`, `tanggal`, `jumlah`) VALUES
	(7, 15, 2, '2018-07-25', 0),
	(8, 15, 4, '2018-08-27', 0);
/*!40000 ALTER TABLE `kandang_persediaan_history` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.karyawan
CREATE TABLE IF NOT EXISTS `karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text,
  `hint` varchar(50) DEFAULT NULL,
  `id_kandang` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_karyawan_kandang` (`id_kandang`),
  CONSTRAINT `FK_karyawan_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.karyawan: ~2 rows (approximately)
DELETE FROM `karyawan`;
/*!40000 ALTER TABLE `karyawan` DISABLE KEYS */;
INSERT INTO `karyawan` (`id`, `nama`, `no_hp`, `username`, `password`, `hint`, `id_kandang`) VALUES
	(1, 'Karyawan 1', '0856470000001', 'supersuper', '$1$somethin$k8AtJbDPlkfGtvGU2qXx5.', '123', 1),
	(2, 'jono', '0856571111111', 'superadmin', '$1$somethin$f3PxGtAYM8jWEyWGPrKsQ1', '', 1);
/*!40000 ALTER TABLE `karyawan` ENABLE KEYS */;

-- Dumping structure for table db_perternakan_ayam.persediaan
CREATE TABLE IF NOT EXISTS `persediaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_gudang` int(11),
  `nama` varchar(12) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `cara_pemakaian` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_vaksin_type_gudang` (`type_gudang`),
  CONSTRAINT `FK_vaksin_type_gudang` FOREIGN KEY (`type_gudang`) REFERENCES `type_gudang` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perternakan_ayam.persediaan: ~3 rows (approximately)
DELETE FROM `persediaan`;
/*!40000 ALTER TABLE `persediaan` DISABLE KEYS */;
INSERT INTO `persediaan` (`id`, `type_gudang`, `nama`, `keterangan`, `cara_pemakaian`) VALUES
	(2, 1, 'vaksin deman', 'perbaikan gizi', 'di siram'),
	(3, 1, 'vaksin Flu', 'Flu Burung', 'Ditaburkan dipakanan'),
	(4, 1, 'katul', 'Makanan Ayam', 'ditaburkan 3 kali sehari');
/*!40000 ALTER TABLE `persediaan` ENABLE KEYS */;

-- Dumping structure for view db_perternakan_ayam.select kandang.id as id_kandang, kandang.nama as nama_kandang, k
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `select kandang.id as id_kandang, kandang.nama as nama_kandang, k` 
) ENGINE=MyISAM;

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

-- Dumping data for table db_perternakan_ayam.type_gudang: ~2 rows (approximately)
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
	`jumlah_ayam` DECIMAL(32,0) NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_perternakan_ayam.view_history_transaksi
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_history_transaksi` (
	`id` INT(11) NOT NULL,
	`tanggal_transaksi` DATE NOT NULL,
	`id_kandang` INT(11) NOT NULL,
	`nama_kandang` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`jumlah_ayam` INT(11) NOT NULL,
	`NULL` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`ket` VARCHAR(11) NOT NULL COLLATE 'utf8mb4_general_ci'
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
	`jumlah_ayam` DECIMAL(33,0) NOT NULL,
	`keterangan` VARCHAR(16) NOT NULL COLLATE 'utf8mb4_general_ci',
	`id_pembelian_terbaru` BIGINT(11) NULL,
	`tanggal_pembelian_terbaru` DATE NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_perternakan_ayam.view_periode_transaksi
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_periode_transaksi` (
	`tahun` BIGINT(20) NULL,
	`bulan` BIGINT(20) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_perternakan_ayam.view_semua_transaksi_pembelian_kandang
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_semua_transaksi_pembelian_kandang` 
) ENGINE=MyISAM;

-- Dumping structure for view db_perternakan_ayam.view_stok_gudang_vaksin
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_stok_gudang_vaksin` (
	`pemasukan` DECIMAL(32,0) NULL,
	`pengeluaran` DECIMAL(32,0) NULL,
	`jumlah` DECIMAL(33,0) NULL,
	`id` INT(11) NOT NULL,
	`type_gudang` INT(11) NULL,
	`nama` VARCHAR(12) NOT NULL COLLATE 'latin1_swedish_ci',
	`keterangan` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`cara_pemakaian` TEXT NOT NULL COLLATE 'latin1_swedish_ci',
	`ket_type_gudang` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Dumping structure for view db_perternakan_ayam.select kandang.id as id_kandang, kandang.nama as nama_kandang, k
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `select kandang.id as id_kandang, kandang.nama as nama_kandang, k`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `select kandang.id as id_kandang, kandang.nama as nama_kandang, k` AS select `db_perternakan_ayam`.`kandang`.`id` AS `id_kandang`,`db_perternakan_ayam`.`kandang`.`nama` AS `nama_kandang`,`db_perternakan_ayam`.`kandang`.`maksimal_jumlah` AS `maksimal_jumlah`,ifnull(((sum(`db_perternakan_ayam`.`detail_pembelian`.`jumlah_ayam`) - (select ifnull(sum(`db_perternakan_ayam`.`detail_penjualan`.`jumlah_ayam`),0) from `detail_penjualan` where (`db_perternakan_ayam`.`detail_penjualan`.`id_kandang` = `db_perternakan_ayam`.`kandang`.`id`))) - (select ifnull(sum(`db_perternakan_ayam`.`kerugian`.`jumlah_ayam`),0) from `kerugian` where (`db_perternakan_ayam`.`kerugian`.`id_kandang` = `db_perternakan_ayam`.`kandang`.`id`))),0) AS `jumlah_ayam`,if((ifnull(((sum(`db_perternakan_ayam`.`detail_pembelian`.`jumlah_ayam`) - (select ifnull(sum(`db_perternakan_ayam`.`detail_penjualan`.`jumlah_ayam`),0) from `detail_penjualan` where (`db_perternakan_ayam`.`detail_penjualan`.`id_kandang` = `db_perternakan_ayam`.`kandang`.`id`))) - (select ifnull(sum(`db_perternakan_ayam`.`kerugian`.`jumlah_ayam`),0) from `kerugian` where (`db_perternakan_ayam`.`kerugian`.`id_kandang` = `db_perternakan_ayam`.`kandang`.`id`))),0) <= 0),'Stock Ayam Habis','Masih ada') AS `keterangan`,(select `db_perternakan_ayam`.`detail_pembelian`.`id` from `detail_pembelian` where (`db_perternakan_ayam`.`detail_pembelian`.`id_kandang` = `db_perternakan_ayam`.`kandang`.`id`) order by `db_perternakan_ayam`.`detail_pembelian`.`tanggal` desc limit 1) AS `id_pembelian_terbaru`,(select `db_perternakan_ayam`.`detail_penjualan`.`id` from `detail_penjualan` where (`db_perternakan_ayam`.`detail_penjualan`.`id_kandang` = `db_perternakan_ayam`.`kandang`.`id`) order by `db_perternakan_ayam`.`detail_penjualan`.`tanggal` desc limit 1) AS `id_penjualan_terbaru`,(select `db_perternakan_ayam`.`detail_pembelian`.`tanggal` from `detail_pembelian` where (`db_perternakan_ayam`.`detail_pembelian`.`id_kandang` = `db_perternakan_ayam`.`kandang`.`id`) order by `db_perternakan_ayam`.`detail_pembelian`.`tanggal` desc limit 1) AS `tanggal_pembelian_terbaru`,(select `db_perternakan_ayam`.`detail_penjualan`.`tanggal` from `detail_penjualan` where (`db_perternakan_ayam`.`detail_penjualan`.`id_kandang` = `db_perternakan_ayam`.`kandang`.`id`) order by `db_perternakan_ayam`.`detail_penjualan`.`tanggal` desc limit 1) AS `tanggal_penjualan_terbaru` from (`kandang` left join `detail_pembelian` on((`db_perternakan_ayam`.`detail_pembelian`.`id_kandang` = `db_perternakan_ayam`.`kandang`.`id`))) group by `db_perternakan_ayam`.`kandang`.`id`,`db_perternakan_ayam`.`kandang`.`nama`,`db_perternakan_ayam`.`kandang`.`maksimal_jumlah`;

-- Dumping structure for view db_perternakan_ayam.view_dashboard_kerugian_ayam
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_dashboard_kerugian_ayam`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_dashboard_kerugian_ayam` AS select 
tahun, 
bulan,
MONTHNAME(concat(tahun,"-", bulan, "-", 1)) as monthname,
(select ifnull(sum(detail_pengeluaran_ayam.jumlah_ayam), 0) from detail_pengeluaran_ayam where year(detail_pengeluaran_ayam.tanggal) = tahun and month(detail_pengeluaran_ayam.tanggal) = bulan) as jumlah_ayam
from view_periode_transaksi ;

-- Dumping structure for view db_perternakan_ayam.view_dashboard_pembelian_ayam
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_dashboard_pembelian_ayam`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_dashboard_pembelian_ayam` AS select 
tahun, 
bulan,
MONTHNAME(concat(tahun,"-", bulan, "-", 1)) as monthname,
(select ifnull(sum(detail_pemasukan_ayam.jumlah_ayam), 0) from detail_pemasukan_ayam where year(detail_pemasukan_ayam.tanggal) = tahun and month(detail_pemasukan_ayam.tanggal) = bulan) as jumlah_ayam
from view_periode_transaksi ;

-- Dumping structure for view db_perternakan_ayam.view_history_transaksi
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_history_transaksi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_history_transaksi` AS (
	SELECT 
		detail_pemasukan_ayam.id, 
		detail_pemasukan_ayam.tanggal as tanggal_transaksi, 
		kandang.id as id_kandang, 
		kandang.nama as nama_kandang, 
		detail_pemasukan_ayam.jumlah_ayam,
		null,
		'pemasukan' as ket 
		from kandang 
	inner JOIN detail_pemasukan_ayam ON detail_pemasukan_ayam.id_kandang = kandang.id
)
union all
(
	select 
		detail_pengeluaran_ayam.id, 
		detail_pengeluaran_ayam.tanggal as tanggal_transaksi, 
		kandang.id as id_kandang, 
		kandang.nama as nama_kandang, 
		detail_pengeluaran_ayam.jumlah_ayam,
		detail_pengeluaran_ayam.keterangan,
		'pengeluaran' as ket
	from detail_pengeluaran_ayam 
	inner join kandang on kandang.id = detail_pengeluaran_ayam.id_kandang
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
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jumlah_ayam_kandang` AS select kandang.id as id_kandang, kandang.nama as nama_kandang,
	IFNULL(sum(detail_pemasukan_ayam.jumlah_ayam) 
		- (select ifnull(sum(detail_pengeluaran_ayam.jumlah_ayam), 0) from detail_pengeluaran_ayam WHERE detail_pengeluaran_ayam.id_kandang = kandang.id),0) 
		as jumlah_ayam, 
	if(IFNULL(sum(detail_pemasukan_ayam.jumlah_ayam) 
		- (select ifnull(sum(detail_pengeluaran_ayam.jumlah_ayam), 0) from detail_pengeluaran_ayam WHERE detail_pengeluaran_ayam.id_kandang = kandang.id),0) <=0
		, 'Stock Ayam Habis', 'Masih ada') as keterangan,
	(select detail_pemasukan_ayam.id from detail_pemasukan_ayam where detail_pemasukan_ayam.id_kandang = kandang.id order by detail_pemasukan_ayam.tanggal desc limit 1) as id_pembelian_terbaru,
	(select detail_pemasukan_ayam.tanggal from detail_pemasukan_ayam where detail_pemasukan_ayam.id_kandang = kandang.id order by detail_pemasukan_ayam.tanggal desc limit 1) as tanggal_pembelian_terbaru
from kandang
left join detail_pemasukan_ayam on detail_pemasukan_ayam.id_kandang = kandang.id
group by kandang.id , kandang.nama ;

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
CREATE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_semua_transaksi_pembelian_kandang` AS select detail_pemasukan_ayam.*, kandang.nama as nama_kandang, kandang.maksimal_jumlah
from kandang 
inner join detail_pemasukan_ayam on detail_pemasukan_ayam.id_kandang = kandang.id
order by detail_pemasukan_ayam.id ASC ;

-- Dumping structure for view db_perternakan_ayam.view_stok_gudang_vaksin
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_stok_gudang_vaksin`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stok_gudang_vaksin` AS select 
(select ifnull(sum(detail_pembelian_gudang.jumlah), 0) from detail_pembelian_gudang where detail_pembelian_gudang.id_persediaan = persediaan.id) as pemasukan,
(select ifnull(sum(detail_pengeluaran_gudang.jumlah), 0) from detail_pengeluaran_gudang where detail_pengeluaran_gudang.id_persediaan = persediaan.id) as pengeluaran,
(select ifnull(sum(detail_pembelian_gudang.jumlah),0) from detail_pembelian_gudang where detail_pembelian_gudang.id_persediaan = persediaan.id) - (select ifnull(sum(detail_pengeluaran_gudang.jumlah), 0) from detail_pengeluaran_gudang where detail_pengeluaran_gudang.id_persediaan = persediaan.id) as jumlah, 
persediaan.*, type_gudang.keterangan as ket_type_gudang
from persediaan 
inner join type_gudang on type_gudang.id = persediaan.type_gudang ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
