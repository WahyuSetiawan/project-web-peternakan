-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2018 at 11:37 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_perternakan_ayam`
--

DELIMITER $$
--
-- Functions
--
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

CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_detail_pemasukan_ayam`() RETURNS varchar(7) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	declare initial varchar(3);
	
	set initial = 'MA_';
	
	select count(*) into count_id from detail_pemasukan_ayam where id_detail_pemasukan_ayam like concat(initial, '%');
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_detail_pemasukan_ayam), 5) + 1 into id from detail_pemasukan_ayam where id_detail_pemasukan_ayam like concat(initial, '%');
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
	
	select count(*) into count_id from detail_pembelian_gudang where id_detail_pembelian_gudang like concat(initial, '%');
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_detail_pembelian_gudang), 5) + 1 into id from detail_pembelian_gudang where id_detail_pembelian_gudang like concat(initial, '%');
	end if;
	
	set code = concat('00000', id);
	set code = concat(initial, substring(code, LENGTH(code) - 3));
	
	return code;
end$$

CREATE DEFINER=`root`@`localhost` FUNCTION `function_id_detail_pengeluaran_ayam`() RETURNS varchar(7) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	declare initial varchar(3);
	
	set initial = 'KA_';
	
	select count(*) into count_id from detail_pengeluaran_ayam where id_detail_pengeluaran_ayam like concat(initial, '%');
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_detail_pengeluaran_ayam), 5) + 1 into id from detail_pengeluaran_ayam where id_detail_pengeluaran_ayam like concat(initial, '%');
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
	
	select count(*) into count_id from detail_pengeluaran_gudang where id_detail_pengeluaran_gudang like concat(initial, '%');
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_detail_pengeluaran_gudang), 5) + 1 into id from detail_pengeluaran_gudang where id_detail_pengeluaran_gudang like concat(initial, '%');
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
end$$

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
end$$

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
end$$

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
end$$

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
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(5, 'admin', '$1$cQ2./l0.$2EEzCFuqA2rIOq1.sNTtD1'),
(6, 'aaa', '$1$S/1.zk4.$0qKF24Yg2XvO67EHRk7eS.');

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
-- Table structure for table `detail_pemasukan_ayam`
--

CREATE TABLE IF NOT EXISTS `detail_pemasukan_ayam` (
  `id_detail_pemasukan_ayam` varchar(7) NOT NULL,
  `id_kandang` varchar(7) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_ayam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pemasukan_ayam`
--

INSERT INTO `detail_pemasukan_ayam` (`id_detail_pemasukan_ayam`, `id_kandang`, `tanggal`, `jumlah_ayam`) VALUES
('MA_0013', 'KD_0001', '2018-07-13', 50),
('MA_0014', 'KD_0001', '2018-09-09', 10),
('MA_0015', 'KD_0002', '2018-09-09', 40);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian_gudang`
--

CREATE TABLE IF NOT EXISTS `detail_pembelian_gudang` (
  `id_detail_pembelian_gudang` varchar(7) NOT NULL,
  `id_supplier` varchar(7) DEFAULT NULL,
  `id_persediaan` varchar(7) NOT NULL,
  `id_pemasukan_ayam` varchar(7) DEFAULT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `nominal` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pembelian_gudang`
--

INSERT INTO `detail_pembelian_gudang` (`id_detail_pembelian_gudang`, `id_supplier`, `id_persediaan`, `id_pemasukan_ayam`, `tanggal_transaksi`, `jumlah`, `nominal`) VALUES
('MG_0003', 'SP_0004', 'PR_0003', 'MA_0013', '2018-08-25 14:34:57', 10, 10000),
('MG_0004', 'SP_0004', 'PR_0002', 'MA_0013', '2018-08-27 01:37:24', 10, 1),
('MG_0005', 'SP_0004', 'PR_0004', 'MA_0013', '2018-08-27 01:37:43', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengeluaran_ayam`
--

CREATE TABLE IF NOT EXISTS `detail_pengeluaran_ayam` (
  `id_detail_pengeluaran_ayam` varchar(7) NOT NULL,
  `id_pemasukan_ayam` varchar(7) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `jumlah_ayam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pengeluaran_ayam`
--

INSERT INTO `detail_pengeluaran_ayam` (`id_detail_pengeluaran_ayam`, `id_pemasukan_ayam`, `tanggal`, `keterangan`, `jumlah_ayam`) VALUES
('KA_0010', 'MA_0013', '2018-07-13', '', 15);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengeluaran_gudang`
--

CREATE TABLE IF NOT EXISTS `detail_pengeluaran_gudang` (
  `id_detail_pengeluaran_gudang` varchar(7) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `id_persediaan` varchar(7) NOT NULL,
  `id_pemasukan_ayam` varchar(7) NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_supplier_jenis`
--

INSERT INTO `detail_supplier_jenis` (`id`, `id_supplier`, `id_jenis`) VALUES
(2, 'SP_0001', 'TG_0002'),
(4, 'SP_0004', 'TG_0001'),
(3, 'SP_0004', 'TG_0002');

-- --------------------------------------------------------

--
-- Table structure for table `kandang`
--

CREATE TABLE IF NOT EXISTS `kandang` (
  `id_kandang` varchar(7) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kandang`
--

INSERT INTO `kandang` (`id_kandang`, `nama`) VALUES
('KD_0001', 'kandang 1'),
('KD_0002', 'kandang 2'),
('KD_0003', 'kandang 3');

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
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `id_karyawan` varchar(7) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text,
  `hint` varchar(50) DEFAULT NULL,
  `id_kandang` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `no_hp`, `username`, `password`, `hint`, `id_kandang`) VALUES
('KR_0001', 'Karyawan 1', '0856470000001', 'supersuper', '$1$cQ2./l0.$2EEzCFuqA2rIOq1.sNTtD1', '123', 'KD_0001'),
('KR_0002', 'jono', '0856571111111', 'superadmin', '$1$somethin$f3PxGtAYM8jWEyWGPrKsQ1', '', 'KD_0001');

-- --------------------------------------------------------

--
-- Table structure for table `persediaan`
--

CREATE TABLE IF NOT EXISTS `persediaan` (
  `id_persediaan` varchar(7) NOT NULL,
  `type_gudang` varchar(7) DEFAULT NULL,
  `nama` varchar(12) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `cara_pemakaian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persediaan`
--

INSERT INTO `persediaan` (`id_persediaan`, `type_gudang`, `nama`, `keterangan`, `cara_pemakaian`) VALUES
('PR_0002', 'TG_0001', 'vaksin deman', 'perbaikan gizi', 'di siram'),
('PR_0003', 'TG_0001', 'vaksin Flu', 'Flu Burung', 'Ditaburkan dipakanan'),
('PR_0004', 'TG_0001', 'katul', 'Makanan Ayam', 'ditaburkan 3 kali sehari');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id_supplier` varchar(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `notelepon` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `alamat`, `notelepon`) VALUES
('SP_0001', 'Terbit Terang', 'Jl. Kusuma Negara no.5', '+62855470001'),
('SP_0004', 'Terang Bersahaja', 'Jl. Kawitan no. 6 Sidorejo', '08547132566');

-- --------------------------------------------------------

--
-- Table structure for table `type_gudang`
--

CREATE TABLE IF NOT EXISTS `type_gudang` (
  `id_type_gudang` varchar(7) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_gudang`
--

INSERT INTO `type_gudang` (`id_type_gudang`, `keterangan`) VALUES
('TG_0001', 'vaksin'),
('TG_0002', 'pakan');

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
-- Stand-in structure for view `view_history_transaksi`
--
CREATE TABLE IF NOT EXISTS `view_history_transaksi` (
`id` varchar(7)
,`tanggal_transaksi` date
,`id_kandang` varchar(7)
,`nama_kandang` varchar(50)
,`jumlah_ayam` int(11)
,`NULL` varchar(50)
,`ket` varchar(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_history_transaksi_gudang`
--
CREATE TABLE IF NOT EXISTS `view_history_transaksi_gudang` (
`id` varchar(7)
,`tanggal_transaksi` datetime
,`id_persediaan` varchar(7)
,`id_kandang` varchar(7)
,`id_pemasukan_ayam` varchar(7)
,`jumlah` int(11)
,`nominal` bigint(20)
,`keterangan` text
,`ket` varchar(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_jumlah_ayam_kandang`
--
CREATE TABLE IF NOT EXISTS `view_jumlah_ayam_kandang` (
`id_kandang` varchar(7)
,`nama_kandang` varchar(50)
,`jumlah_ayam` decimal(33,0)
,`keterangan` varchar(16)
,`id_pembelian_terbaru` varchar(7)
,`tanggal_pembelian_terbaru` date
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
-- Stand-in structure for view `view_semua_transaksi_pembelian_kandang`
--
CREATE TABLE IF NOT EXISTS `view_semua_transaksi_pembelian_kandang` (
`id_detail_pemasukan_ayam` varchar(7)
,`id_kandang` varchar(7)
,`tanggal` date
,`jumlah_ayam` int(11)
,`nama_kandang` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_stok_gudang_vaksin`
--
CREATE TABLE IF NOT EXISTS `view_stok_gudang_vaksin` (
`pemasukan` decimal(32,0)
,`pengeluaran` decimal(32,0)
,`jumlah` decimal(33,0)
,`id_persediaan` varchar(7)
,`type_gudang` varchar(7)
,`nama` varchar(12)
,`keterangan` varchar(100)
,`cara_pemakaian` text
,`ket_type_gudang` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi_all`
--
CREATE TABLE IF NOT EXISTS `view_transaksi_all` (
`id_kandang` varchar(7)
,`nama` varchar(70)
,`id_detail_pemasukan_ayam` varchar(7)
,`masuk` decimal(32,0)
,`keluar` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Structure for view `view_dashboard_kerugian_ayam`
--
DROP TABLE IF EXISTS `view_dashboard_kerugian_ayam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_dashboard_kerugian_ayam` AS select `view_periode_transaksi`.`tahun` AS `tahun`,`view_periode_transaksi`.`bulan` AS `bulan`,monthname(concat(`view_periode_transaksi`.`tahun`,'-',`view_periode_transaksi`.`bulan`,'-',1)) AS `monthname`,(select ifnull(sum(`detail_pengeluaran_ayam`.`jumlah_ayam`),0) from `detail_pengeluaran_ayam` where ((year(`detail_pengeluaran_ayam`.`tanggal`) = `view_periode_transaksi`.`tahun`) and (month(`detail_pengeluaran_ayam`.`tanggal`) = `view_periode_transaksi`.`bulan`))) AS `jumlah_ayam` from `view_periode_transaksi`;

-- --------------------------------------------------------

--
-- Structure for view `view_dashboard_pembelian_ayam`
--
DROP TABLE IF EXISTS `view_dashboard_pembelian_ayam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_dashboard_pembelian_ayam` AS select `view_periode_transaksi`.`tahun` AS `tahun`,`view_periode_transaksi`.`bulan` AS `bulan`,monthname(concat(`view_periode_transaksi`.`tahun`,'-',`view_periode_transaksi`.`bulan`,'-',1)) AS `monthname`,(select ifnull(sum(`detail_pemasukan_ayam`.`jumlah_ayam`),0) from `detail_pemasukan_ayam` where ((year(`detail_pemasukan_ayam`.`tanggal`) = `view_periode_transaksi`.`tahun`) and (month(`detail_pemasukan_ayam`.`tanggal`) = `view_periode_transaksi`.`bulan`))) AS `jumlah_ayam` from `view_periode_transaksi`;

-- --------------------------------------------------------

--
-- Structure for view `view_history_transaksi`
--
DROP TABLE IF EXISTS `view_history_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_history_transaksi` AS (select `detail_pemasukan_ayam`.`id_detail_pemasukan_ayam` AS `id`,`detail_pemasukan_ayam`.`tanggal` AS `tanggal_transaksi`,`kandang`.`id_kandang` AS `id_kandang`,`kandang`.`nama` AS `nama_kandang`,`detail_pemasukan_ayam`.`jumlah_ayam` AS `jumlah_ayam`,NULL AS `NULL`,'pemasukan' AS `ket` from (`kandang` join `detail_pemasukan_ayam` on((`detail_pemasukan_ayam`.`id_kandang` = `kandang`.`id_kandang`)))) union all (select `detail_pengeluaran_ayam`.`id_detail_pengeluaran_ayam` AS `id_detail_pengeluaran_ayam`,`detail_pengeluaran_ayam`.`tanggal` AS `tanggal_transaksi`,`kandang`.`id_kandang` AS `id_kandang`,`kandang`.`nama` AS `nama_kandang`,`detail_pengeluaran_ayam`.`jumlah_ayam` AS `jumlah_ayam`,`detail_pengeluaran_ayam`.`keterangan` AS `keterangan`,'pengeluaran' AS `ket` from ((`detail_pengeluaran_ayam` join `detail_pemasukan_ayam` on((`detail_pemasukan_ayam`.`id_detail_pemasukan_ayam` = `detail_pengeluaran_ayam`.`id_pemasukan_ayam`))) join `kandang` on((`kandang`.`id_kandang` = `detail_pemasukan_ayam`.`id_kandang`)))) order by `id_kandang`,`tanggal_transaksi` desc;

-- --------------------------------------------------------

--
-- Structure for view `view_history_transaksi_gudang`
--
DROP TABLE IF EXISTS `view_history_transaksi_gudang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_history_transaksi_gudang` AS (select `detail_pembelian_gudang`.`id_detail_pembelian_gudang` AS `id`,`detail_pembelian_gudang`.`tanggal_transaksi` AS `tanggal_transaksi`,`detail_pembelian_gudang`.`id_persediaan` AS `id_persediaan`,NULL AS `id_kandang`,`detail_pembelian_gudang`.`id_pemasukan_ayam` AS `id_pemasukan_ayam`,`detail_pembelian_gudang`.`jumlah` AS `jumlah`,`detail_pembelian_gudang`.`nominal` AS `nominal`,NULL AS `keterangan`,'beli' AS `ket` from `detail_pembelian_gudang`) union all (select `detail_pengeluaran_gudang`.`id_detail_pengeluaran_gudang` AS `id`,`detail_pengeluaran_gudang`.`tanggal_transaksi` AS `tanggal_transaksi`,`detail_pengeluaran_gudang`.`id_persediaan` AS `id_persediaan`,`detail_pemasukan_ayam`.`id_kandang` AS `id_kandang`,`detail_pengeluaran_gudang`.`id_pemasukan_ayam` AS `id_pemasukan_ayam`,`detail_pengeluaran_gudang`.`jumlah` AS `jumlah`,0 AS `0`,`detail_pengeluaran_gudang`.`keterangan` AS `keterangan`,'jual' AS `ket` from (`detail_pengeluaran_gudang` join `detail_pemasukan_ayam` on((`detail_pemasukan_ayam`.`id_detail_pemasukan_ayam` = `detail_pengeluaran_gudang`.`id_pemasukan_ayam`))));

-- --------------------------------------------------------

--
-- Structure for view `view_jumlah_ayam_kandang`
--
DROP TABLE IF EXISTS `view_jumlah_ayam_kandang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jumlah_ayam_kandang` AS select `kandang`.`id_kandang` AS `id_kandang`,`kandang`.`nama` AS `nama_kandang`,ifnull((sum(`detail_pemasukan_ayam`.`jumlah_ayam`) - (select ifnull(sum(`detail_pengeluaran_ayam`.`jumlah_ayam`),0) from (`detail_pengeluaran_ayam` join `detail_pemasukan_ayam` on((`detail_pemasukan_ayam`.`id_detail_pemasukan_ayam` = `detail_pengeluaran_ayam`.`id_pemasukan_ayam`))) where (`detail_pemasukan_ayam`.`id_kandang` = `kandang`.`id_kandang`))),0) AS `jumlah_ayam`,if((ifnull((sum(`detail_pemasukan_ayam`.`jumlah_ayam`) - (select ifnull(sum(`detail_pengeluaran_ayam`.`jumlah_ayam`),0) from (`detail_pengeluaran_ayam` join `detail_pemasukan_ayam` on((`detail_pemasukan_ayam`.`id_detail_pemasukan_ayam` = `detail_pengeluaran_ayam`.`id_pemasukan_ayam`))) where (`detail_pemasukan_ayam`.`id_kandang` = `kandang`.`id_kandang`))),0) <= 0),'Stock Ayam Habis','Masih ada') AS `keterangan`,(select `detail_pemasukan_ayam`.`id_detail_pemasukan_ayam` from `detail_pemasukan_ayam` where (`detail_pemasukan_ayam`.`id_kandang` = `kandang`.`id_kandang`) order by `detail_pemasukan_ayam`.`tanggal` desc limit 1) AS `id_pembelian_terbaru`,(select `detail_pemasukan_ayam`.`tanggal` from `detail_pemasukan_ayam` where (`detail_pemasukan_ayam`.`id_kandang` = `kandang`.`id_kandang`) order by `detail_pemasukan_ayam`.`tanggal` desc limit 1) AS `tanggal_pembelian_terbaru` from (`kandang` left join `detail_pemasukan_ayam` on((`detail_pemasukan_ayam`.`id_kandang` = `kandang`.`id_kandang`))) group by `kandang`.`id_kandang`,`kandang`.`nama`;

-- --------------------------------------------------------

--
-- Structure for view `view_periode_transaksi`
--
DROP TABLE IF EXISTS `view_periode_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_periode_transaksi` AS select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,1 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (1 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,2 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (2 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,3 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (3 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,4 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (4 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,5 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (5 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,6 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (6 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,7 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (7 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,8 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (8 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,9 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (9 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,10 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (10 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,11 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (11 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,12 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (12 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)));

-- --------------------------------------------------------

--
-- Structure for view `view_semua_transaksi_pembelian_kandang`
--
DROP TABLE IF EXISTS `view_semua_transaksi_pembelian_kandang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_semua_transaksi_pembelian_kandang` AS select `detail_pemasukan_ayam`.`id_detail_pemasukan_ayam` AS `id_detail_pemasukan_ayam`,`detail_pemasukan_ayam`.`id_kandang` AS `id_kandang`,`detail_pemasukan_ayam`.`tanggal` AS `tanggal`,`detail_pemasukan_ayam`.`jumlah_ayam` AS `jumlah_ayam`,`kandang`.`nama` AS `nama_kandang` from (`kandang` join `detail_pemasukan_ayam` on((`detail_pemasukan_ayam`.`id_kandang` = `kandang`.`id_kandang`))) order by `detail_pemasukan_ayam`.`id_detail_pemasukan_ayam`;

-- --------------------------------------------------------

--
-- Structure for view `view_stok_gudang_vaksin`
--
DROP TABLE IF EXISTS `view_stok_gudang_vaksin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stok_gudang_vaksin` AS select (select ifnull(sum(`detail_pembelian_gudang`.`jumlah`),0) from `detail_pembelian_gudang` where (`detail_pembelian_gudang`.`id_supplier` = `persediaan`.`id_persediaan`)) AS `pemasukan`,(select ifnull(sum(`detail_pengeluaran_gudang`.`jumlah`),0) from `detail_pengeluaran_gudang` where (`detail_pengeluaran_gudang`.`id_persediaan` = `persediaan`.`id_persediaan`)) AS `pengeluaran`,((select ifnull(sum(`detail_pembelian_gudang`.`jumlah`),0) from `detail_pembelian_gudang` where (`detail_pembelian_gudang`.`id_persediaan` = `persediaan`.`id_persediaan`)) - (select ifnull(sum(`detail_pengeluaran_gudang`.`jumlah`),0) from `detail_pengeluaran_gudang` where (`detail_pengeluaran_gudang`.`id_persediaan` = `persediaan`.`id_persediaan`))) AS `jumlah`,`persediaan`.`id_persediaan` AS `id_persediaan`,`persediaan`.`type_gudang` AS `type_gudang`,`persediaan`.`nama` AS `nama`,`persediaan`.`keterangan` AS `keterangan`,`persediaan`.`cara_pemakaian` AS `cara_pemakaian`,`type_gudang`.`keterangan` AS `ket_type_gudang` from (`persediaan` join `type_gudang` on((`type_gudang`.`id_type_gudang` = `persediaan`.`type_gudang`)));

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi_all`
--
DROP TABLE IF EXISTS `view_transaksi_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi_all` AS (select `kandang`.`id_kandang` AS `id_kandang`,concat('ayam pada kandang : ',`kandang`.`nama`) AS `nama`,`detail_pemasukan_ayam`.`id_detail_pemasukan_ayam` AS `id_detail_pemasukan_ayam`,`detail_pemasukan_ayam`.`jumlah_ayam` AS `masuk`,ifnull((select sum(`detail_pengeluaran_ayam`.`jumlah_ayam`) from `detail_pengeluaran_ayam` where (`detail_pengeluaran_ayam`.`id_pemasukan_ayam` = `detail_pemasukan_ayam`.`id_detail_pemasukan_ayam`)),0) AS `keluar` from (`kandang` join `detail_pemasukan_ayam` on((`detail_pemasukan_ayam`.`id_kandang` = `kandang`.`id_kandang`)))) union all (select `detail_persediaan`.`id_persediaan` AS `id_persediaan`,`persediaan`.`nama` AS `nama`,`view_jumlah_ayam_kandang`.`id_pembelian_terbaru` AS `id_pembelian_terbaru`,ifnull((select sum(`detail_pembelian_gudang`.`jumlah`) from `detail_pembelian_gudang` where (`detail_pembelian_gudang`.`id_pemasukan_ayam` = `view_jumlah_ayam_kandang`.`id_pembelian_terbaru`)),0) AS `masuk`,ifnull((select sum(`detail_pengeluaran_gudang`.`jumlah`) from `detail_pengeluaran_gudang` where (`detail_pengeluaran_gudang`.`id_pemasukan_ayam` = `view_jumlah_ayam_kandang`.`id_pembelian_terbaru`)),0) AS `keluar` from ((`detail_persediaan` join `view_jumlah_ayam_kandang` on((`view_jumlah_ayam_kandang`.`id_kandang` = `detail_persediaan`.`id_kandang`))) join `persediaan` on((`persediaan`.`id_persediaan` = `detail_persediaan`.`id_persediaan`))));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `usernmae` (`username`);

--
-- Indexes for table `detail_kandang_persediaan`
--
ALTER TABLE `detail_kandang_persediaan`
  ADD PRIMARY KEY (`id_detail_kandang_persediaan`), ADD KEY `FK_detail_kandang_persediaan_kandang` (`id_kandang`), ADD KEY `FK_detail_kandang_persediaan_persediaan` (`id_persediaan`);

--
-- Indexes for table `detail_pemasukan_ayam`
--
ALTER TABLE `detail_pemasukan_ayam`
  ADD PRIMARY KEY (`id_detail_pemasukan_ayam`), ADD KEY `FK_detail_pemasukan_ayam_kandang` (`id_kandang`);

--
-- Indexes for table `detail_pembelian_gudang`
--
ALTER TABLE `detail_pembelian_gudang`
  ADD PRIMARY KEY (`id_detail_pembelian_gudang`), ADD KEY `FK_detail_pembelian_gudang_supplier` (`id_supplier`), ADD KEY `FK_detail_pembelian_gudang_persediaan` (`id_persediaan`), ADD KEY `FK_detail_pembelian_gudang_detail_pemasukan_ayam` (`id_pemasukan_ayam`);

--
-- Indexes for table `detail_pengeluaran_ayam`
--
ALTER TABLE `detail_pengeluaran_ayam`
  ADD PRIMARY KEY (`id_detail_pengeluaran_ayam`), ADD KEY `FK_detail_pengeluaran_ayam_detail_pemasukan_ayam` (`id_pemasukan_ayam`);

--
-- Indexes for table `detail_pengeluaran_gudang`
--
ALTER TABLE `detail_pengeluaran_gudang`
  ADD PRIMARY KEY (`id_detail_pengeluaran_gudang`), ADD KEY `FK_detail_pengeluaran_gudang_persediaan` (`id_persediaan`), ADD KEY `FK_detail_pengeluaran_gudang_detail_pemasukan_ayam` (`id_pemasukan_ayam`);

--
-- Indexes for table `detail_persediaan`
--
ALTER TABLE `detail_persediaan`
  ADD PRIMARY KEY (`id_detail_persediaan`), ADD KEY `FK_detail_persediaan_persediaan` (`id_persediaan`), ADD KEY `FK_detail_persediaan_kandang` (`id_kandang`);

--
-- Indexes for table `detail_supplier_jenis`
--
ALTER TABLE `detail_supplier_jenis`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_supplier_id_jenis` (`id_supplier`,`id_jenis`), ADD KEY `FK_detail_supplier_jenis_type_gudang` (`id_jenis`);

--
-- Indexes for table `kandang`
--
ALTER TABLE `kandang`
  ADD PRIMARY KEY (`id_kandang`);

--
-- Indexes for table `kandang_persediaan_history`
--
ALTER TABLE `kandang_persediaan_history`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_pembelian_id_vaksin_tanggal` (`id_pembelian`,`id_persediaan`,`tanggal`), ADD KEY `FK_kadang_vaksin_history_vaksin` (`id_persediaan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`), ADD KEY `FK_karyawan_kandang` (`id_kandang`);

--
-- Indexes for table `persediaan`
--
ALTER TABLE `persediaan`
  ADD PRIMARY KEY (`id_persediaan`), ADD KEY `FK_persediaan_type_gudang` (`type_gudang`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `type_gudang`
--
ALTER TABLE `type_gudang`
  ADD PRIMARY KEY (`id_type_gudang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `detail_supplier_jenis`
--
ALTER TABLE `detail_supplier_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kandang_persediaan_history`
--
ALTER TABLE `kandang_persediaan_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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
-- Constraints for table `detail_pemasukan_ayam`
--
ALTER TABLE `detail_pemasukan_ayam`
ADD CONSTRAINT `FK_detail_pemasukan_ayam_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id_kandang`) ON UPDATE CASCADE;

--
-- Constraints for table `detail_pembelian_gudang`
--
ALTER TABLE `detail_pembelian_gudang`
ADD CONSTRAINT `FK_detail_pembelian_gudang_detail_pemasukan_ayam` FOREIGN KEY (`id_pemasukan_ayam`) REFERENCES `detail_pemasukan_ayam` (`id_detail_pemasukan_ayam`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_detail_pembelian_gudang_persediaan` FOREIGN KEY (`id_persediaan`) REFERENCES `persediaan` (`id_persediaan`) ON UPDATE CASCADE,
ADD CONSTRAINT `FK_detail_pembelian_gudang_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON UPDATE CASCADE;

--
-- Constraints for table `detail_pengeluaran_ayam`
--
ALTER TABLE `detail_pengeluaran_ayam`
ADD CONSTRAINT `FK_detail_pengeluaran_ayam_detail_pemasukan_ayam` FOREIGN KEY (`id_pemasukan_ayam`) REFERENCES `detail_pemasukan_ayam` (`id_detail_pemasukan_ayam`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_pengeluaran_gudang`
--
ALTER TABLE `detail_pengeluaran_gudang`
ADD CONSTRAINT `FK_detail_pengeluaran_gudang_detail_pemasukan_ayam` FOREIGN KEY (`id_pemasukan_ayam`) REFERENCES `detail_pemasukan_ayam` (`id_detail_pemasukan_ayam`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_detail_pengeluaran_gudang_persediaan` FOREIGN KEY (`id_persediaan`) REFERENCES `persediaan` (`id_persediaan`) ON UPDATE CASCADE;

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
ADD CONSTRAINT `FK_detail_supplier_jenis_type_gudang` FOREIGN KEY (`id_jenis`) REFERENCES `type_gudang` (`id_type_gudang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
ADD CONSTRAINT `FK_karyawan_kandang` FOREIGN KEY (`id_kandang`) REFERENCES `kandang` (`id_kandang`) ON UPDATE CASCADE;

--
-- Constraints for table `persediaan`
--
ALTER TABLE `persediaan`
ADD CONSTRAINT `FK_persediaan_type_gudang` FOREIGN KEY (`type_gudang`) REFERENCES `type_gudang` (`id_type_gudang`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
