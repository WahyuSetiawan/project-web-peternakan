-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 03, 2019 at 02:38 PM
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
-- Procedures
--
CREATE DEFINER=`user`@`%` PROCEDURE `pd_insert_detail_penggunaan_gudang`()
    READS SQL DATA
begin 
    declare count_data_exists int;
    declare durasi_gudang int;
    
	declare id_gudang_in_temp varchar(7);
    declare id_kandang_tmp varchar(7);
    declare tanggal_tmp datetime;
    
    
    set id_gudang_in_temp = "TG_0001";
    set id_kandang_tmp = "KD_0001";
    set tanggal_tmp = "2019-01-29 00:01:59";
    
    select @durasi_gudang := durasi from tb_gudang
                  where id_gudang = id_gudang_in_temp limit 1;
                  
    select @count_data_exists := ifnull(count(*), 0)
        from tb_detail_penggunaan_gudang
        where time_to_sec(TIMEDIFF(tanggal, tanggal_tmp))/60 <= @durasi_gudang
        	and id_gudang = id_gudang_in_temp
            and id_kandang = id_kandang_tmp;
            
    if @count_data_exists = 0 then 
        select "masuk ke database";
     end if;
end$$

CREATE DEFINER=`user`@`%` PROCEDURE `pd_insert_detail_penjualan_ayam`()
    NO SQL
begin 
	declare umur int;
	declare id_pembelian_ayam_temp varchar(7); 
    
    set id_pembelian_ayam_temp = "MA_0017";
    
	select @umur := tb_detail_pembelian_ayam.umur from tb_detail_pembelian_ayam 
    	WHERE id_detail_pembelian_ayam = id_pembelian_ayam_temp limit 1;
end$$

CREATE DEFINER=`user`@`%` PROCEDURE `pd_select_detail_pembelian_ayam`()
    NO SQL
select *, 
(select ifnull(sum(tb_detail_penjualan_ayam.jumlah_ayam), 0) from tb_detail_penjualan_ayam where tb_detail_penjualan_ayam.id_detail_pembelian_ayam = tb_detail_pembelian_ayam.id_detail_pembelian_ayam) as jumlah_penjualan,
jumlah_ayam - (select ifnull(sum(tb_detail_penjualan_ayam.jumlah_ayam), 0) from tb_detail_penjualan_ayam where tb_detail_penjualan_ayam.id_detail_pembelian_ayam = tb_detail_pembelian_ayam.id_detail_pembelian_ayam) as jumlah_sisa_ayam
from tb_detail_pembelian_ayam
where (jumlah_ayam - (select ifnull(sum(tb_detail_penjualan_ayam.jumlah_ayam), 0) from tb_detail_penjualan_ayam where tb_detail_penjualan_ayam.id_detail_pembelian_ayam = tb_detail_pembelian_ayam.id_detail_pembelian_ayam)) > 0$$

CREATE DEFINER=`user`@`%` PROCEDURE `pd_show_jadwal_penggunaan`(IN `dateTmp` DATETIME, IN `kandangTmp` VARCHAR(7), IN `gudangTmp` VARCHAR(7))
    NO SQL
select 
	* 
from 
	view_jadwal_penggunaan_gudang 
where 
	view_jadwal_penggunaan_gudang.id_jadwal_gudang in (
		select 
			tb_jadwal_kandang.id_jadwal_kandang 
		from 
			tb_jadwal_kandang 
		where 
			date_format(dateTmp, "%w") = tb_jadwal_kandang.hari 
			and tb_jadwal_kandang.id_kandang = kandangTmp
			and tb_jadwal_kandang.id_gudang = gudangTmp
			and time(dateTmp) BETWEEN waktu_mulai 
			and waktu_selesai
	)$$

--
-- Functions
--
CREATE DEFINER=`user`@`%` FUNCTION `function_detail_type_supplier`() RETURNS varchar(8) CHARSET latin1
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

CREATE DEFINER=`user`@`%` FUNCTION `function_id_detail_kandang_persediaan`() RETURNS varchar(7) CHARSET latin1
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

CREATE DEFINER=`user`@`%` FUNCTION `function_id_detail_kerugian_ayam`() RETURNS varchar(7) CHARSET utf8mb4
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

CREATE DEFINER=`user`@`%` FUNCTION `function_id_detail_pembelian_ayam`() RETURNS varchar(7) CHARSET latin1
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

CREATE DEFINER=`user`@`%` FUNCTION `function_id_detail_pembelian_gudang`() RETURNS varchar(7) CHARSET latin1
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

CREATE DEFINER=`user`@`%` FUNCTION `function_id_detail_pengeluaran_gudang`() RETURNS varchar(7) CHARSET latin1
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

CREATE DEFINER=`user`@`%` FUNCTION `function_id_detail_penjualan_ayam`() RETURNS varchar(7) CHARSET latin1
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

CREATE DEFINER=`user`@`%` FUNCTION `function_id_detail_persediaan`() RETURNS varchar(7) CHARSET latin1
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

CREATE DEFINER=`user`@`%` FUNCTION `function_id_group_transaksi`() RETURNS varchar(10) CHARSET latin1
begin
	declare id INT;
	declare count_id INT;
	declare code varchar(11);
	
	select count(*) into count_id from tb_detail_group_transaksi;
	
	IF count_id = 0 then
		set id = 1;
	else
		select substring(max(id_detail_group_transaksi), 5) + 1 into id from tb_detail_group_transaksi;
	end if;
	
	set code = concat('00000', id);
	set code = concat('GT_', substring(code, LENGTH(code) - 3));
	
	return code;
end$$

CREATE DEFINER=`user`@`%` FUNCTION `function_id_gudang`() RETURNS varchar(10) CHARSET latin1
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

CREATE DEFINER=`user`@`%` FUNCTION `function_id_jadwal_kandang`() RETURNS varchar(7) CHARSET utf8mb4
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

CREATE DEFINER=`user`@`%` FUNCTION `function_id_kandang`() RETURNS varchar(7) CHARSET latin1
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

CREATE DEFINER=`user`@`%` FUNCTION `function_id_karyawan`() RETURNS varchar(7) CHARSET latin1
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

CREATE DEFINER=`user`@`%` FUNCTION `function_id_supplier`() RETURNS varchar(7) CHARSET latin1
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

CREATE DEFINER=`user`@`%` FUNCTION `function_id_type_gudang`() RETURNS varchar(10) CHARSET latin1
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

CREATE DEFINER=`user`@`%` FUNCTION `function_status_pemberian_pakan`(`id_gudang_in_temp` VARCHAR(7), `id_kandang_in_tmp` VARCHAR(7), `tanggal_tmp` DATETIME) RETURNS tinyint(1)
    NO SQL
begin 
    declare count_data_exists int;
    declare durasi_gudang int;
    
    select durasi into durasi_gudang from tb_gudang
    	where id_gudang = id_gudang_in_temp limit 1;
                  
    select ifnull(count(*), 0) into count_data_exists
        from tb_detail_penggunaan_gudang
        where time_to_sec(TIMEDIFF(tanggal_tmp, tanggal))/60 <= (durasi_gudang * 60)
        	and time_to_sec(TIMEDIFF(tanggal_tmp, tanggal))/60 >= (durasi_gudang * 60) * -1
        	and id_gudang = id_gudang_in_temp
            and id_kandang = id_kandang_in_tmp
            and id_detail_penggunaan_gudang != id_detail_edit;
            
	return count_data_exists = 0;
end$$

CREATE DEFINER=`user`@`%` FUNCTION `function_status_pemberian_pakan_edit`(`id_gudang_in_temp` VARCHAR(7), `id_kandang_in_tmp` VARCHAR(7), `tanggal_tmp` DATETIME, `id_detail_edit` VARCHAR(7)) RETURNS varchar(7) CHARSET latin1
    NO SQL
begin 
    declare count_data_exists int;
    declare durasi_gudang int;
    
    select durasi into durasi_gudang from tb_gudang
    	where id_gudang = id_gudang_in_temp limit 1;
                  
    select ifnull(count(*), 0) into count_data_exists
        from tb_detail_penggunaan_gudang
        where time_to_sec(TIMEDIFF(tanggal_tmp, tanggal))/60 <= (durasi_gudang * 60)
        	and time_to_sec(TIMEDIFF(tanggal_tmp, tanggal))/60 >= (durasi_gudang * 60) * -1
        	and id_gudang = id_gudang_in_temp
            and id_kandang = id_kandang_in_tmp
            and id_detail_penggunaan_gudang != id_detail_edit;
            
	return count_data_exists = 0;
end$$

CREATE DEFINER=`user`@`%` FUNCTION `function_status_penjualan_ayam`(`id_pembelian_ayam_temp` VARCHAR(7), `tanggal_tmp` DATE) RETURNS int(11)
    NO SQL
begin 
	declare umur int;
    
	select tb_detail_pembelian_ayam.umur + datediff(tanggal_tmp, tanggal) into umur from tb_detail_pembelian_ayam 
    	WHERE id_detail_pembelian_ayam = id_pembelian_ayam_temp limit 1;
        
	return umur;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `username`, `password`) VALUES
(5, 'Usman', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(6, 'Owner', 'aaa', '21232f297a57a5a743894a0e4a801fc3'),
(10, 'lalala', 'lalala', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_group_transaksi`
--

CREATE TABLE IF NOT EXISTS `tb_detail_group_transaksi` (
  `id_detail_group_transaksi` varchar(7) NOT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_group_transaksi`
--

INSERT INTO `tb_detail_group_transaksi` (`id_detail_group_transaksi`, `created_at`, `updated_at`) VALUES
('GT_0003', NULL, NULL),
('GT_0004', NULL, NULL),
('GT_0005', NULL, NULL),
('GT_0006', NULL, NULL),
('GT_0007', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_kerugian_ayam`
--

CREATE TABLE IF NOT EXISTS `tb_detail_kerugian_ayam` (
  `id_detail_kerugian_ayam` varchar(7) NOT NULL,
  `id_detail_pembelian_ayam` varchar(7) DEFAULT NULL,
  `id_kandang` varchar(7) DEFAULT NULL,
  `id_detail_group_transaksi` varchar(7) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_karyawan` varchar(7) DEFAULT NULL,
  `update_by_admin` int(11) DEFAULT NULL,
  `update_by_karyawan` varchar(7) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `id_detail_group_transaksi` varchar(7) DEFAULT NULL,
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

INSERT INTO `tb_detail_pembelian_ayam` (`id_detail_pembelian_ayam`, `id_kandang`, `id_supplier`, `id_karyawan`, `id_admin`, `id_detail_group_transaksi`, `tanggal`, `umur`, `jumlah_ayam`, `harga_ayam`, `update_by_admin`, `update_by_karyawan`, `created_at`, `updated_at`) VALUES
('MA_0001', 'KD_0001', 'SP_0001', 'KR_0001', NULL, 'GT_0007', '2019-08-02 00:00:00', 140, 30, 1000, NULL, NULL, '2019-08-02 15:35:24', '0000-00-00 00:00:00'),
('MA_0002', 'KD_0001', 'SP_0001', 'KR_0001', NULL, 'GT_0007', '2019-08-02 00:00:00', 140, 70, 10000, NULL, NULL, '2019-08-02 15:57:15', '0000-00-00 00:00:00');

--
-- Triggers `tb_detail_pembelian_ayam`
--
DELIMITER $$
CREATE TRIGGER `trigger_before_insert_pembelian` BEFORE INSERT ON `tb_detail_pembelian_ayam`
 FOR EACH ROW begin 
	set @count = 0;
	set @id = function_id_group_transaksi();
    set @oldid = "";
    
	select jumlah, id_detail_group_transaksi into @count, @oldid from view_stok_ayam where id_kandang = NEW.id_kandang;
    
    if @count > 0 then
		set @id = @oldid;
	else
		insert into tb_detail_group_transaksi (id_detail_group_transaksi) values (@id);
    end if;
    
    set NEW.id_detail_group_transaksi = @id;
end
$$
DELIMITER ;

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
  `harga` int(11) NOT NULL DEFAULT '0',
  `update_by_karyawan` varchar(7) DEFAULT NULL,
  `update_by_admin` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_pembelian_gudang`
--

INSERT INTO `tb_detail_pembelian_gudang` (`id_detail_pembelian_gudang`, `id_supplier`, `id_gudang`, `id_karyawan`, `id_admin`, `tanggal`, `jumlah`, `harga`, `update_by_karyawan`, `update_by_admin`, `created_at`, `updated_at`) VALUES
('MG_0004', 'SP_0004', 'TG_0002', NULL, 6, '2018-08-27 01:37:24', 10, 1, NULL, NULL, '2019-01-01 15:39:48', '2019-05-27 16:26:43'),
('MG_0005', 'SP_0004', 'TG_0001', NULL, 6, '2018-08-27 01:37:43', 100, 1, NULL, 5, '2019-01-01 15:39:52', '2019-01-01 15:44:43'),
('MG_0006', 'SP_0004', 'TG_0001', 'KR_0002', NULL, '2018-11-12 00:00:00', 120, 0, 'KR_0001', NULL, '2019-01-01 15:39:54', '2019-05-27 16:26:43'),
('MG_0007', 'SP_0004', 'TG_0001', NULL, 5, '2019-01-29 00:00:00', 123, 20000, 'KR_0001', NULL, '2019-07-28 15:39:25', '2019-05-27 16:26:43'),
('MG_0008', 'SP_0006', 'TG_0001', NULL, 5, '2019-01-30 00:00:00', 400, 0, NULL, NULL, '2019-01-29 21:20:03', '2019-05-27 16:26:43'),
('MG_0009', 'SP_0006', 'TG_0001', NULL, 5, '2019-01-30 00:00:00', 1, 0, NULL, NULL, '2019-01-29 21:20:44', '2019-05-27 16:26:43'),
('MG_0010', 'SP_0006', 'TG_0002', NULL, 5, '2019-01-30 00:00:00', 100, 0, NULL, NULL, '2019-01-29 21:21:26', '2019-05-27 16:26:43'),
('MG_0011', 'SP_0008', 'TG_0004', 'KR_0001', NULL, '2019-07-15 00:00:00', 100, 0, NULL, NULL, '2019-07-15 17:07:08', '0000-00-00 00:00:00'),
('MG_0012', 'SP_0001', 'TG_0001', 'KR_0001', NULL, '2019-07-18 00:00:00', 10, 10000, 'KR_0001', NULL, '2019-07-28 15:39:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_penggunaan_gudang`
--

CREATE TABLE IF NOT EXISTS `tb_detail_penggunaan_gudang` (
  `id_detail_penggunaan_gudang` varchar(7) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `id_kandang` varchar(7) DEFAULT NULL,
  `id_gudang` varchar(7) NOT NULL,
  `time` time DEFAULT NULL,
  `id_jadwal` varchar(7) DEFAULT NULL,
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

INSERT INTO `tb_detail_penggunaan_gudang` (`id_detail_penggunaan_gudang`, `tanggal`, `id_kandang`, `id_gudang`, `time`, `id_jadwal`, `id_karyawan`, `id_admin`, `jumlah`, `keterangan`, `update_by_karyawan`, `update_by_admin`, `created_at`, `updated_at`) VALUES
('KG_0007', '2018-11-12 00:00:00', NULL, 'TG_0002', NULL, NULL, NULL, NULL, 129, 'Kerusakan', NULL, 5, '2019-01-01 13:06:24', '2019-01-01 17:30:29'),
('KG_0008', '2019-01-01 00:00:00', NULL, 'TG_0001', NULL, NULL, NULL, NULL, 12, '', NULL, NULL, '2019-01-01 17:04:05', NULL),
('KG_0009', '2019-01-01 00:00:00', NULL, 'TG_0001', NULL, NULL, NULL, 5, 12, '', NULL, NULL, '2019-01-01 17:08:49', NULL),
('KG_0010', '2019-01-06 16:02:38', NULL, 'TG_0001', NULL, NULL, NULL, 5, 12, '', NULL, NULL, '2019-01-06 16:02:07', NULL),
('KG_0011', '2019-01-06 16:02:38', 'KD_0002', 'TG_0001', NULL, NULL, NULL, 5, 10, '', NULL, NULL, '2019-05-28 05:17:39', NULL),
('KG_0012', '2019-01-29 00:00:00', 'KD_0001', 'TG_0001', NULL, NULL, NULL, 5, 678, 'asdf', NULL, 5, '2019-05-28 05:17:31', NULL),
('KG_0013', '2019-06-03 12:00:00', 'KD_0001', 'TG_0001', NULL, NULL, NULL, NULL, 11, '', 'KR_0001', NULL, '2019-06-03 23:49:28', NULL),
('KG_0014', '2019-06-03 15:55:43', 'KD_0001', 'TG_0001', NULL, NULL, NULL, NULL, 1, '', 'KR_0001', NULL, '2019-06-13 23:36:47', NULL),
('KG_0015', '2019-06-14 18:18:30', 'KD_0002', 'TG_0001', NULL, NULL, 'KR_0001', NULL, 11, '', NULL, NULL, '2019-06-14 13:25:48', NULL),
('KG_0016', '2019-07-06 17:00:00', 'KD_0001', 'TG_0001', '17:00:00', 'JK_0008', 'KR_0001', NULL, 0, '', NULL, NULL, '2019-07-07 01:25:17', NULL),
('KG_0017', '2019-07-15 13:33:00', 'kandang', 'Jagung', '13:33:00', 'JK_0011', NULL, NULL, 10, '', 'KR_0001', NULL, '2019-07-15 17:41:37', NULL),
('KG_0018', '2019-07-15 14:20:00', 'kandang', 'Jagung', '14:20:00', 'JK_0002', 'KR_0001', NULL, 10, 'aaaa', NULL, NULL, '2019-07-15 18:03:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_penjualan_ayam`
--

CREATE TABLE IF NOT EXISTS `tb_detail_penjualan_ayam` (
  `id_detail_penjualan_ayam` varchar(7) NOT NULL,
  `id_kandang` varchar(7) DEFAULT NULL,
  `id_karyawan` varchar(7) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_detail_group_transaksi` varchar(7) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `jumlah_ayam` int(11) NOT NULL,
  `harga` int(11) NOT NULL DEFAULT '0',
  `keterangan` varchar(50) NOT NULL,
  `update_by_karyawan` varchar(7) DEFAULT NULL,
  `update_by_admin` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_supplier_jenis`
--

CREATE TABLE IF NOT EXISTS `tb_detail_supplier_jenis` (
  `id` int(11) NOT NULL,
  `id_supplier` varchar(7) NOT NULL,
  `id_gudang` varchar(7) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_supplier_jenis`
--

INSERT INTO `tb_detail_supplier_jenis` (`id`, `id_supplier`, `id_gudang`) VALUES
(18, 'SP_0001', 'TG_0001'),
(2, 'SP_0001', 'TG_0002'),
(19, 'SP_0002', 'TG_0003'),
(20, 'SP_0002', 'TG_0004'),
(21, 'SP_0003', 'TG_0001'),
(22, 'SP_0003', 'TG_0002'),
(23, 'SP_0003', 'TG_0003'),
(24, 'SP_0003', 'TG_0004'),
(4, 'SP_0004', 'TG_0001'),
(3, 'SP_0004', 'TG_0002'),
(11, 'SP_0005', 'TG_0001'),
(25, 'SP_0005', 'TG_0002'),
(13, 'SP_0006', 'TG_0001'),
(14, 'SP_0007', 'TG_0001'),
(15, 'SP_0007', 'TG_0002'),
(16, 'SP_0007', 'TG_0003'),
(17, 'SP_0008', 'TG_0004');

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
  `satuan` varchar(20) NOT NULL,
  `cara_pemakaian` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gudang`
--

INSERT INTO `tb_gudang` (`id_gudang`, `nama`, `satuan`, `cara_pemakaian`, `created_at`, `updated_at`) VALUES
('TG_0001', 'Jagung', 'Karung', 'setiap kandang dikasih jagung sebanyak 2 Kg', '2019-07-28 13:23:42', '2019-01-06 15:47:09'),
('TG_0002', 'Pakan Katul', 'Kg', 'setiap kandang dikasih katul sebanyak 2 Kg', '2019-07-28 13:23:48', '2019-01-06 15:46:47'),
('TG_0003', 'Vaksin Flu Burung', 'Bungkus', 'Setiap kandang dikasih vaksin ', '2019-07-28 13:24:04', '2019-01-29 21:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal_kandang`
--

CREATE TABLE IF NOT EXISTS `tb_jadwal_kandang` (
  `id_jadwal_kandang` varchar(7) NOT NULL,
  `id_kandang` varchar(7) NOT NULL,
  `hari` int(11) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `id_gudang` varchar(7) NOT NULL,
  `catatan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal_kandang`
--

INSERT INTO `tb_jadwal_kandang` (`id_jadwal_kandang`, `id_kandang`, `hari`, `waktu_mulai`, `waktu_selesai`, `id_gudang`, `catatan`, `created_at`, `updated_at`) VALUES
('JK_0001', 'KD_0001', 0, '07:00:00', '09:00:00', 'TG_0001', 'makanan jagung', '2019-07-17 17:22:07', '0000-00-00 00:00:00'),
('JK_0002', 'KD_0001', 3, '13:00:00', '15:00:00', 'TG_0002', 'makan katul', '2019-07-17 17:24:01', '0000-00-00 00:00:00'),
('JK_0003', 'KD_0001', 4, '09:45:00', '12:05:00', 'TG_0001', 'uuuu', '2019-07-18 13:47:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kandang`
--

CREATE TABLE IF NOT EXISTS `tb_kandang` (
  `id_kandang` varchar(7) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `stok_ayam` int(11) NOT NULL,
  `id_karyawan` varchar(7) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kandang`
--

INSERT INTO `tb_kandang` (`id_kandang`, `nama`, `stok_ayam`, `id_karyawan`, `created_at`, `updated_at`) VALUES
('KD_0001', 'Kandang 1', 100, 'KR_0003', '2019-07-23 14:26:40', '0000-00-00 00:00:00'),
('KD_0002', 'Kandang 2', 199, 'KR_0001', '2019-07-23 14:26:36', '0000-00-00 00:00:00'),
('KD_0003', 'Kandang 3', 100, 'KR_0002', '2019-07-23 14:26:45', '0000-00-00 00:00:00'),
('KD_0004', 'Kandang 4', 100, 'KR_0002', '2019-07-23 14:26:49', '0000-00-00 00:00:00');

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
('KR_0001', 'Paijo', '085651000000', 'supersuper', '21232f297a57a5a743894a0e4a801fc3', 'rasmuslerdorf/rahasia', '2019-07-02 11:38:38', '2019-01-22 15:19:26'),
('KR_0002', 'jono', '0856571111111', 'superadmin', '21232f297a57a5a743894a0e4a801fc3', '', '2019-07-02 11:38:41', '2019-05-27 16:26:43'),
('KR_0003', 'hahaha', '436566adhdahahaayaeh', 'hahaha', '21232f297a57a5a743894a0e4a801fc3', '', '2019-07-02 11:38:44', '2019-01-29 21:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE IF NOT EXISTS `tb_supplier` (
  `id_supplier` varchar(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `notelepon` varchar(15) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `jual_ayam` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama`, `alamat`, `notelepon`, `email`, `kota`, `jual_ayam`) VALUES
('SP_0001', 'Supplier 1', 'jl.magelang', '08122553536', 'kaskus@gmail.com', 'magelang', 'Y'),
('SP_0002', 'Supplier 2', 'j.monjali', '089136365212', '', '', 'Y'),
('SP_0003', 'Supplier 3', 'jl.solo', '08635163712', '', '', 'N'),
('SP_0004', 'Jono', 'Super', '08122553536', 'Jono@gmail.com', 'majalengka', 'Y');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_detail_group_transaksi`
--
CREATE TABLE IF NOT EXISTS `view_detail_group_transaksi` (
`id_detail_group_transaksi` varchar(7)
,`created_at` varchar(45)
,`updated_at` varchar(45)
,`id_kandang` varchar(7)
,`nama_kandang` varchar(50)
,`jumlah_pembelian` bigint(21)
,`jumlah_penjualan` bigint(21)
,`jumlah_kerugian` bigint(21)
,`pembelian` decimal(32,0)
,`jumlah_ayam_pembelian` decimal(32,0)
,`penjualan` decimal(32,0)
,`jumlah_ayam_penjualan` decimal(32,0)
,`jumlah_ayam_kerugian` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_detail_group_transaksi_ayam`
--
CREATE TABLE IF NOT EXISTS `view_detail_group_transaksi_ayam` (
`id_transaksi` varchar(7)
,`id_detail_group_transaksi` varchar(7)
,`id_kandang` varchar(7)
,`nama_kandang` varchar(50)
,`id_supplier` varchar(7)
,`tanggal` datetime
,`jumlah_ayam` int(11)
,`keterangan` varchar(50)
,`aksi` varchar(4)
,`id_admin` int(11)
,`nama_admin` varchar(50)
,`id_karyawan` varchar(7)
,`nama_karyawan` varchar(50)
,`update_by_karyawan` varchar(7)
,`update_by_karyawan_nama` varchar(50)
,`update_by_admin` int(11)
,`update_by_admin_nama` varchar(50)
,`created_at` timestamp
,`updated_at` timestamp
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
,`harga` bigint(20)
,`keterangan` varchar(200)
,`ket` varchar(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_jadwal_penggunaan_gudang`
--
CREATE TABLE IF NOT EXISTS `view_jadwal_penggunaan_gudang` (
`id_detail_penggunaan_gudang` varchar(7)
,`tanggal` datetime
,`id_kandang` varchar(7)
,`id_gudang` varchar(7)
,`id_karyawan` varchar(7)
,`id_admin` int(11)
,`jumlah` int(11)
,`keterangan` varchar(200)
,`update_by_karyawan` varchar(7)
,`update_by_admin` int(11)
,`created_at` timestamp
,`updated_at` timestamp
,`id_jadwal_gudang` varchar(7)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_kandang_avaliable`
--
CREATE TABLE IF NOT EXISTS `view_kandang_avaliable` (
`id_kandang` varchar(7)
,`nama` varchar(50)
,`id_karyawan` varchar(7)
,`created_at` timestamp
,`updated_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_kandang_penjualan_avaiable`
--
CREATE TABLE IF NOT EXISTS `view_kandang_penjualan_avaiable` (
`id_kandang` varchar(7)
,`nama` varchar(50)
,`id_karyawan` varchar(7)
,`created_at` timestamp
,`updated_at` timestamp
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
-- Stand-in structure for view `view_periode_transaksi_gudang`
--
CREATE TABLE IF NOT EXISTS `view_periode_transaksi_gudang` (
`num_year` bigint(20)
,`num_month` bigint(20)
,`id_gudang` varchar(7)
,`nama` varchar(50)
,`satuan` varchar(20)
,`jumlah_pembelian` decimal(32,0)
,`jumlah_penggunaan` decimal(32,0)
,`stok` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_periode_transaksi_month`
--
CREATE TABLE IF NOT EXISTS `view_periode_transaksi_month` (
`num_year` bigint(20)
,`num_month` bigint(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_sisa_pembelian`
--
CREATE TABLE IF NOT EXISTS `view_sisa_pembelian` (
`id_detail_pembelian_ayam` varchar(7)
,`id_kandang` varchar(7)
,`id_supplier` varchar(7)
,`id_karyawan` varchar(7)
,`id_admin` int(11)
,`tanggal` datetime
,`umur` int(11)
,`jumlah_ayam` int(11)
,`update_by_admin` int(11)
,`update_by_karyawan` varchar(7)
,`created_at` timestamp
,`updated_at` timestamp
,`jumlah_penjualan_harga` decimal(32,0)
,`jumlah_penjualan` decimal(32,0)
,`jumlah_sisa_ayam` decimal(34,0)
,`jumlah_kerugian_ayam` decimal(32,0)
,`umur_ayam_sekarang` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_stok_ayam`
--
CREATE TABLE IF NOT EXISTS `view_stok_ayam` (
`id_kandang` varchar(7)
,`nama` varchar(50)
,`stok_ayam` int(11)
,`jumlah` decimal(34,0)
,`sisa_jumlah_ayam` decimal(35,0)
,`umur_ayam` bigint(11)
,`id_detail_group_transaksi` varchar(7)
,`umur_ayam_sekarang` bigint(11)
,`id_karyawan` varchar(7)
,`jumlah_transaksi` bigint(21)
,`jumlah_transaksi_masuk` bigint(21)
,`jumlah_transaksi_keluar` bigint(21)
,`jumlah_kerugian` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_stok_ayam_params`
--
CREATE TABLE IF NOT EXISTS `view_stok_ayam_params` (
`id_kandang` varchar(7)
,`nama` varchar(50)
,`stok_ayam` int(11)
,`pembelian` decimal(32,0)
,`penjualan` decimal(32,0)
,`kerugian` decimal(32,0)
,`jumlah` decimal(34,0)
,`sisa_jumlah_ayam` decimal(35,0)
,`umur_ayam` bigint(11)
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
,`satuan` varchar(20)
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
,`aksi` varchar(4)
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
,`aksi` varchar(5)
,`id_gudang` varchar(7)
,`id_supplier` varchar(7)
,`tanggal` datetime
,`jumlah` int(11)
,`satuan` varchar(20)
,`harga` bigint(20)
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
-- Structure for view `view_detail_group_transaksi`
--
DROP TABLE IF EXISTS `view_detail_group_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `view_detail_group_transaksi` AS select `tb_detail_group_transaksi`.`id_detail_group_transaksi` AS `id_detail_group_transaksi`,`tb_detail_group_transaksi`.`created_at` AS `created_at`,`tb_detail_group_transaksi`.`updated_at` AS `updated_at`,(select distinct `tb_detail_pembelian_ayam`.`id_kandang` from `tb_detail_pembelian_ayam` where (`tb_detail_group_transaksi`.`id_detail_group_transaksi` = `tb_detail_pembelian_ayam`.`id_detail_group_transaksi`) limit 1) AS `id_kandang`,(select `tb_kandang`.`nama` from `tb_kandang` where (`tb_kandang`.`id_kandang` = (select distinct `tb_detail_pembelian_ayam`.`id_kandang` from `tb_detail_pembelian_ayam` where (`tb_detail_group_transaksi`.`id_detail_group_transaksi` = `tb_detail_pembelian_ayam`.`id_detail_group_transaksi`) limit 1))) AS `nama_kandang`,(select count(0) from `tb_detail_pembelian_ayam` where (`tb_detail_group_transaksi`.`id_detail_group_transaksi` = `tb_detail_pembelian_ayam`.`id_detail_group_transaksi`) limit 1) AS `jumlah_pembelian`,(select count(0) from `tb_detail_penjualan_ayam` where (`tb_detail_group_transaksi`.`id_detail_group_transaksi` = `tb_detail_penjualan_ayam`.`id_detail_group_transaksi`) limit 1) AS `jumlah_penjualan`,(select count(0) from `tb_detail_kerugian_ayam` where (`tb_detail_group_transaksi`.`id_detail_group_transaksi` = `tb_detail_kerugian_ayam`.`id_detail_group_transaksi`) limit 1) AS `jumlah_kerugian`,(select ifnull(sum(`tb_detail_pembelian_ayam`.`harga_ayam`),0) from `tb_detail_pembelian_ayam` where (`tb_detail_group_transaksi`.`id_detail_group_transaksi` = `tb_detail_pembelian_ayam`.`id_detail_group_transaksi`)) AS `pembelian`,(select ifnull(sum(`tb_detail_pembelian_ayam`.`jumlah_ayam`),0) from `tb_detail_pembelian_ayam` where (`tb_detail_group_transaksi`.`id_detail_group_transaksi` = `tb_detail_pembelian_ayam`.`id_detail_group_transaksi`)) AS `jumlah_ayam_pembelian`,(select ifnull(sum(`tb_detail_penjualan_ayam`.`harga`),0) from `tb_detail_penjualan_ayam` where (`tb_detail_penjualan_ayam`.`id_detail_group_transaksi` = `tb_detail_penjualan_ayam`.`id_detail_group_transaksi`)) AS `penjualan`,(select ifnull(sum(`tb_detail_penjualan_ayam`.`jumlah_ayam`),0) from `tb_detail_penjualan_ayam` where (`tb_detail_penjualan_ayam`.`id_detail_group_transaksi` = `tb_detail_penjualan_ayam`.`id_detail_group_transaksi`)) AS `jumlah_ayam_penjualan`,(select ifnull(sum(`tb_detail_kerugian_ayam`.`jumlah`),0) from `tb_detail_kerugian_ayam` where (`tb_detail_kerugian_ayam`.`id_detail_group_transaksi` = `tb_detail_kerugian_ayam`.`id_detail_group_transaksi`)) AS `jumlah_ayam_kerugian` from `tb_detail_group_transaksi`;

-- --------------------------------------------------------

--
-- Structure for view `view_detail_group_transaksi_ayam`
--
DROP TABLE IF EXISTS `view_detail_group_transaksi_ayam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `view_detail_group_transaksi_ayam` AS select `tb_detail_pembelian_ayam`.`id_detail_pembelian_ayam` AS `id_transaksi`,`tb_detail_pembelian_ayam`.`id_detail_group_transaksi` AS `id_detail_group_transaksi`,`tb_detail_pembelian_ayam`.`id_kandang` AS `id_kandang`,(select `tb_kandang`.`nama` from `tb_kandang` where (`tb_kandang`.`id_kandang` = `tb_detail_pembelian_ayam`.`id_kandang`) limit 1) AS `nama_kandang`,`tb_detail_pembelian_ayam`.`id_supplier` AS `id_supplier`,`tb_detail_pembelian_ayam`.`tanggal` AS `tanggal`,`tb_detail_pembelian_ayam`.`jumlah_ayam` AS `jumlah_ayam`,'pembelian' AS `keterangan`,'beli' AS `aksi`,`tb_detail_pembelian_ayam`.`id_admin` AS `id_admin`,(select `tb_admin`.`nama` from `tb_admin` where (`tb_admin`.`id` = `tb_detail_pembelian_ayam`.`id_admin`) limit 1) AS `nama_admin`,`tb_detail_pembelian_ayam`.`id_karyawan` AS `id_karyawan`,(select `tb_karyawan`.`nama` from `tb_karyawan` where (`tb_karyawan`.`id_karyawan` = `tb_detail_pembelian_ayam`.`id_karyawan`) limit 1) AS `nama_karyawan`,`tb_detail_pembelian_ayam`.`update_by_karyawan` AS `update_by_karyawan`,(select `tb_karyawan`.`nama` from `tb_karyawan` where (`tb_karyawan`.`id_karyawan` = `tb_detail_pembelian_ayam`.`update_by_karyawan`) limit 1) AS `update_by_karyawan_nama`,`tb_detail_pembelian_ayam`.`update_by_admin` AS `update_by_admin`,(select `tb_admin`.`nama` from `tb_admin` where (`tb_admin`.`id` = `tb_detail_pembelian_ayam`.`update_by_admin`) limit 1) AS `update_by_admin_nama`,`tb_detail_pembelian_ayam`.`created_at` AS `created_at`,`tb_detail_pembelian_ayam`.`updated_at` AS `updated_at` from `tb_detail_pembelian_ayam` union select `tb_detail_penjualan_ayam`.`id_detail_penjualan_ayam` AS `id_transaksi`,`tb_detail_penjualan_ayam`.`id_detail_group_transaksi` AS `id_detail_group_transaksi`,`tb_detail_pembelian_ayam`.`id_kandang` AS `id_kandang`,(select `tb_kandang`.`nama` from `tb_kandang` where (`tb_kandang`.`id_kandang` = `tb_detail_pembelian_ayam`.`id_kandang`) limit 1) AS `nama_kandang`,NULL AS `id_supplier`,`tb_detail_penjualan_ayam`.`tanggal` AS `tanggal`,`tb_detail_penjualan_ayam`.`jumlah_ayam` AS `jumlah_ayam`,`tb_detail_penjualan_ayam`.`keterangan` AS `keterangan`,'jual' AS `aksi`,`tb_detail_penjualan_ayam`.`id_admin` AS `id_admin`,(select `tb_admin`.`nama` from `tb_admin` where (`tb_admin`.`id` = `tb_detail_penjualan_ayam`.`id_admin`) limit 1) AS `nama_admin`,`tb_detail_penjualan_ayam`.`id_karyawan` AS `id_karyawan`,(select `tb_karyawan`.`nama` from `tb_karyawan` where (`tb_karyawan`.`id_karyawan` = `tb_detail_penjualan_ayam`.`id_karyawan`) limit 1) AS `nama_karyawan`,`tb_detail_penjualan_ayam`.`update_by_karyawan` AS `update_by_karyawan`,(select `tb_karyawan`.`nama` from `tb_karyawan` where (`tb_karyawan`.`id_karyawan` = `tb_detail_penjualan_ayam`.`update_by_karyawan`) limit 1) AS `update_by_karyawan_nama`,`tb_detail_penjualan_ayam`.`update_by_admin` AS `update_by_admin`,(select `tb_admin`.`nama` from `tb_admin` where (`tb_admin`.`id` = `tb_detail_penjualan_ayam`.`update_by_admin`) limit 1) AS `update_by_admin_nama`,`tb_detail_penjualan_ayam`.`created_at` AS `created_at`,`tb_detail_penjualan_ayam`.`updated_at` AS `updated_at` from (`tb_detail_penjualan_ayam` join `tb_detail_pembelian_ayam` on((`tb_detail_pembelian_ayam`.`id_detail_group_transaksi` = `tb_detail_penjualan_ayam`.`id_detail_group_transaksi`))) union select `tb_detail_kerugian_ayam`.`id_detail_kerugian_ayam` AS `id_transaksi`,`tb_detail_kerugian_ayam`.`id_detail_group_transaksi` AS `id_detail_group_transaksi`,`tb_detail_pembelian_ayam`.`id_kandang` AS `id_kandang`,(select `tb_kandang`.`nama` from `tb_kandang` where (`tb_kandang`.`id_kandang` = `tb_detail_pembelian_ayam`.`id_kandang`) limit 1) AS `nama_kandang`,NULL AS `id_supplier`,`tb_detail_kerugian_ayam`.`tanggal` AS `tanggal`,`tb_detail_kerugian_ayam`.`jumlah` AS `jumlah_ayam`,`tb_detail_kerugian_ayam`.`keterangan` AS `keterangan`,'rugi' AS `aksi`,`tb_detail_kerugian_ayam`.`id_admin` AS `id_admin`,(select `tb_admin`.`nama` from `tb_admin` where (`tb_admin`.`id` = `tb_detail_kerugian_ayam`.`id_admin`) limit 1) AS `nama_admin`,`tb_detail_kerugian_ayam`.`id_karyawan` AS `id_karyawan`,(select `tb_karyawan`.`nama` from `tb_karyawan` where (`tb_karyawan`.`id_karyawan` = `tb_detail_kerugian_ayam`.`id_karyawan`) limit 1) AS `nama_karyawan`,`tb_detail_kerugian_ayam`.`update_by_karyawan` AS `update_by_karyawan`,(select `tb_karyawan`.`nama` from `tb_karyawan` where (`tb_karyawan`.`id_karyawan` = `tb_detail_kerugian_ayam`.`update_by_karyawan`) limit 1) AS `update_by_karyawan_nama`,`tb_detail_kerugian_ayam`.`update_by_admin` AS `update_by_admin`,(select `tb_admin`.`nama` from `tb_admin` where (`tb_admin`.`id` = `tb_detail_kerugian_ayam`.`update_by_admin`) limit 1) AS `update_by_admin_nama`,`tb_detail_kerugian_ayam`.`created_at` AS `created_at`,`tb_detail_kerugian_ayam`.`updated_at` AS `updated_at` from (`tb_detail_kerugian_ayam` join `tb_detail_pembelian_ayam` on((`tb_detail_pembelian_ayam`.`id_detail_group_transaksi` = `tb_detail_kerugian_ayam`.`id_detail_group_transaksi`)));

-- --------------------------------------------------------

--
-- Structure for view `view_history_transaksi`
--
DROP TABLE IF EXISTS `view_history_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `view_history_transaksi` AS (select `tb_detail_pembelian_ayam`.`id_detail_pembelian_ayam` AS `id`,`tb_detail_pembelian_ayam`.`tanggal` AS `tanggal_transaksi`,`tb_kandang`.`id_kandang` AS `id_kandang`,`tb_kandang`.`nama` AS `nama_kandang`,`tb_detail_pembelian_ayam`.`jumlah_ayam` AS `jumlah_ayam`,NULL AS `NULL`,'in' AS `ket` from (`tb_kandang` join `tb_detail_pembelian_ayam` on((`tb_detail_pembelian_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)))) union all (select `tb_detail_penjualan_ayam`.`id_detail_penjualan_ayam` AS `id_detail_penjualan_ayam`,`tb_detail_penjualan_ayam`.`tanggal` AS `tanggal_transaksi`,`tb_kandang`.`id_kandang` AS `id_kandang`,`tb_kandang`.`nama` AS `nama_kandang`,`tb_detail_penjualan_ayam`.`jumlah_ayam` AS `jumlah_ayam`,`tb_detail_penjualan_ayam`.`keterangan` AS `keterangan`,'out' AS `ket` from (`tb_detail_penjualan_ayam` join `tb_kandang` on((`tb_kandang`.`id_kandang` = `tb_detail_penjualan_ayam`.`id_kandang`)))) order by `id_kandang`,`tanggal_transaksi` desc;

-- --------------------------------------------------------

--
-- Structure for view `view_history_transaksi_gudang`
--
DROP TABLE IF EXISTS `view_history_transaksi_gudang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `view_history_transaksi_gudang` AS (select `tb_detail_pembelian_gudang`.`id_detail_pembelian_gudang` AS `id`,`tb_detail_pembelian_gudang`.`tanggal` AS `tanggal_transaksi`,`tb_detail_pembelian_gudang`.`id_gudang` AS `id_persediaan`,`tb_detail_pembelian_gudang`.`jumlah` AS `jumlah`,`tb_detail_pembelian_gudang`.`harga` AS `harga`,NULL AS `keterangan`,'beli' AS `ket` from `tb_detail_pembelian_gudang`) union all (select `tb_detail_penggunaan_gudang`.`id_detail_penggunaan_gudang` AS `id`,`tb_detail_penggunaan_gudang`.`tanggal` AS `tanggal_transaksi`,`tb_detail_penggunaan_gudang`.`id_gudang` AS `id_persediaan`,`tb_detail_penggunaan_gudang`.`jumlah` AS `jumlah`,0 AS `0`,`tb_detail_penggunaan_gudang`.`keterangan` AS `keterangan`,'jual' AS `ket` from `tb_detail_penggunaan_gudang`);

-- --------------------------------------------------------

--
-- Structure for view `view_jadwal_penggunaan_gudang`
--
DROP TABLE IF EXISTS `view_jadwal_penggunaan_gudang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `view_jadwal_penggunaan_gudang` AS select `tb_detail_penggunaan_gudang`.`id_detail_penggunaan_gudang` AS `id_detail_penggunaan_gudang`,`tb_detail_penggunaan_gudang`.`tanggal` AS `tanggal`,`tb_detail_penggunaan_gudang`.`id_kandang` AS `id_kandang`,`tb_detail_penggunaan_gudang`.`id_gudang` AS `id_gudang`,`tb_detail_penggunaan_gudang`.`id_karyawan` AS `id_karyawan`,`tb_detail_penggunaan_gudang`.`id_admin` AS `id_admin`,`tb_detail_penggunaan_gudang`.`jumlah` AS `jumlah`,`tb_detail_penggunaan_gudang`.`keterangan` AS `keterangan`,`tb_detail_penggunaan_gudang`.`update_by_karyawan` AS `update_by_karyawan`,`tb_detail_penggunaan_gudang`.`update_by_admin` AS `update_by_admin`,`tb_detail_penggunaan_gudang`.`created_at` AS `created_at`,`tb_detail_penggunaan_gudang`.`updated_at` AS `updated_at`,(select `tb_jadwal_kandang`.`id_jadwal_kandang` from `tb_jadwal_kandang` where ((`tb_jadwal_kandang`.`id_kandang` = `tb_detail_penggunaan_gudang`.`id_kandang`) and (`tb_jadwal_kandang`.`id_gudang` = `tb_detail_penggunaan_gudang`.`id_gudang`) and (date_format(`tb_detail_penggunaan_gudang`.`tanggal`,'%w') = `tb_jadwal_kandang`.`hari`) and (cast(`tb_detail_penggunaan_gudang`.`tanggal` as time) between `tb_jadwal_kandang`.`waktu_mulai` and `tb_jadwal_kandang`.`waktu_selesai`)) limit 1) AS `id_jadwal_gudang` from `tb_detail_penggunaan_gudang`;

-- --------------------------------------------------------

--
-- Structure for view `view_kandang_avaliable`
--
DROP TABLE IF EXISTS `view_kandang_avaliable`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `view_kandang_avaliable` AS select `tb_kandang`.`id_kandang` AS `id_kandang`,`tb_kandang`.`nama` AS `nama`,`tb_kandang`.`id_karyawan` AS `id_karyawan`,`tb_kandang`.`created_at` AS `created_at`,`tb_kandang`.`updated_at` AS `updated_at` from `tb_kandang` where (not(`tb_kandang`.`id_kandang` in (select `view_sisa_pembelian`.`id_kandang` from `view_sisa_pembelian` where (`view_sisa_pembelian`.`jumlah_sisa_ayam` > 0))));

-- --------------------------------------------------------

--
-- Structure for view `view_kandang_penjualan_avaiable`
--
DROP TABLE IF EXISTS `view_kandang_penjualan_avaiable`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `view_kandang_penjualan_avaiable` AS select distinct `tb_kandang`.`id_kandang` AS `id_kandang`,`tb_kandang`.`nama` AS `nama`,`tb_kandang`.`id_karyawan` AS `id_karyawan`,`tb_kandang`.`created_at` AS `created_at`,`tb_kandang`.`updated_at` AS `updated_at` from ((`tb_detail_penjualan_ayam` join `tb_detail_pembelian_ayam` on((`tb_detail_pembelian_ayam`.`id_detail_group_transaksi` = `tb_detail_penjualan_ayam`.`id_detail_group_transaksi`))) join `tb_kandang` on((`tb_kandang`.`id_kandang` = `tb_detail_pembelian_ayam`.`id_kandang`)));

-- --------------------------------------------------------

--
-- Structure for view `view_periode_transaksi`
--
DROP TABLE IF EXISTS `view_periode_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `view_periode_transaksi` AS select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,1 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (1 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,2 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (2 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,3 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (3 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,4 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (4 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,5 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (5 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,6 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (6 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,7 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (7 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,8 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (8 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,9 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (9 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,10 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (10 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,11 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (11 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`))) union all select distinct year(`view_history_transaksi`.`tanggal_transaksi`) AS `tahun`,12 AS `bulan` from `view_history_transaksi` where ((year(`view_history_transaksi`.`tanggal_transaksi`) <= (select year(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)) and (12 <= (select month(max(`view_history_transaksi`.`tanggal_transaksi`)) from `view_history_transaksi`)));

-- --------------------------------------------------------

--
-- Structure for view `view_periode_transaksi_gudang`
--
DROP TABLE IF EXISTS `view_periode_transaksi_gudang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `view_periode_transaksi_gudang` AS select `view_periode_transaksi_month`.`num_year` AS `num_year`,`view_periode_transaksi_month`.`num_month` AS `num_month`,`tb_gudang`.`id_gudang` AS `id_gudang`,`tb_gudang`.`nama` AS `nama`,`tb_gudang`.`satuan` AS `satuan`,(select ifnull(sum(`tb_detail_pembelian_gudang`.`jumlah`),0) from `tb_detail_pembelian_gudang` where ((month(`tb_detail_pembelian_gudang`.`tanggal`) = `view_periode_transaksi_month`.`num_month`) and (year(`tb_detail_pembelian_gudang`.`tanggal`) = `view_periode_transaksi_month`.`num_year`))) AS `jumlah_pembelian`,(select ifnull(sum(`tb_detail_penggunaan_gudang`.`jumlah`),0) from `tb_detail_penggunaan_gudang` where ((month(`tb_detail_penggunaan_gudang`.`tanggal`) = `view_periode_transaksi_month`.`num_month`) and (year(`tb_detail_penggunaan_gudang`.`tanggal`) = `view_periode_transaksi_month`.`num_year`))) AS `jumlah_penggunaan`,((select ifnull(sum(`tb_detail_pembelian_gudang`.`jumlah`),0) from `tb_detail_pembelian_gudang` where ((month(`tb_detail_pembelian_gudang`.`tanggal`) = `view_periode_transaksi_month`.`num_month`) and (year(`tb_detail_pembelian_gudang`.`tanggal`) = `view_periode_transaksi_month`.`num_year`))) - (select ifnull(sum(`tb_detail_penggunaan_gudang`.`jumlah`),0) from `tb_detail_penggunaan_gudang` where ((month(`tb_detail_penggunaan_gudang`.`tanggal`) = `view_periode_transaksi_month`.`num_month`) and (year(`tb_detail_penggunaan_gudang`.`tanggal`) = `view_periode_transaksi_month`.`num_year`)))) AS `stok` from (`view_periode_transaksi_month` join `tb_gudang`);

-- --------------------------------------------------------

--
-- Structure for view `view_periode_transaksi_month`
--
DROP TABLE IF EXISTS `view_periode_transaksi_month`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `view_periode_transaksi_month` AS select year(now()) AS `num_year`,month(now()) AS `num_month` union select year((now() + interval -(1) month)) AS `num_year`,month((now() + interval -(1) month)) AS `num_month` union select year((now() + interval -(2) month)) AS `num_year`,month((now() + interval -(2) month)) AS `num_month` union select year((now() + interval -(3) month)) AS `num_year`,month((now() + interval -(3) month)) AS `num_month` union select year((now() + interval -(4) month)) AS `num_year`,month((now() + interval -(4) month)) AS `num_month` union select year((now() + interval -(5) month)) AS `num_year`,month((now() + interval -(5) month)) AS `num_month` union select year((now() + interval -(6) month)) AS `num_year`,month((now() + interval -(6) month)) AS `num_month` union select year((now() + interval -(7) month)) AS `num_year`,month((now() + interval -(7) month)) AS `num_month` union select year((now() + interval -(8) month)) AS `num_year`,month((now() + interval -(8) month)) AS `num_month` union select year((now() + interval -(9) month)) AS `num_year`,month((now() + interval -(9) month)) AS `num_month`;

-- --------------------------------------------------------

--
-- Structure for view `view_sisa_pembelian`
--
DROP TABLE IF EXISTS `view_sisa_pembelian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `view_sisa_pembelian` AS select `tb_detail_pembelian_ayam`.`id_detail_pembelian_ayam` AS `id_detail_pembelian_ayam`,`tb_detail_pembelian_ayam`.`id_kandang` AS `id_kandang`,`tb_detail_pembelian_ayam`.`id_supplier` AS `id_supplier`,`tb_detail_pembelian_ayam`.`id_karyawan` AS `id_karyawan`,`tb_detail_pembelian_ayam`.`id_admin` AS `id_admin`,`tb_detail_pembelian_ayam`.`tanggal` AS `tanggal`,`tb_detail_pembelian_ayam`.`umur` AS `umur`,`tb_detail_pembelian_ayam`.`jumlah_ayam` AS `jumlah_ayam`,`tb_detail_pembelian_ayam`.`update_by_admin` AS `update_by_admin`,`tb_detail_pembelian_ayam`.`update_by_karyawan` AS `update_by_karyawan`,`tb_detail_pembelian_ayam`.`created_at` AS `created_at`,`tb_detail_pembelian_ayam`.`updated_at` AS `updated_at`,(select ifnull(sum(`tb_detail_penjualan_ayam`.`harga`),0) from `tb_detail_penjualan_ayam` where (`tb_detail_penjualan_ayam`.`id_detail_group_transaksi` = `tb_detail_pembelian_ayam`.`id_detail_group_transaksi`)) AS `jumlah_penjualan_harga`,(select ifnull(sum(`tb_detail_penjualan_ayam`.`jumlah_ayam`),0) from `tb_detail_penjualan_ayam` where (`tb_detail_penjualan_ayam`.`id_detail_group_transaksi` = `tb_detail_pembelian_ayam`.`id_detail_group_transaksi`)) AS `jumlah_penjualan`,((`tb_detail_pembelian_ayam`.`jumlah_ayam` - (select ifnull(sum(`tb_detail_penjualan_ayam`.`jumlah_ayam`),0) from `tb_detail_penjualan_ayam` where (`tb_detail_penjualan_ayam`.`id_detail_group_transaksi` = `tb_detail_pembelian_ayam`.`id_detail_group_transaksi`))) - (select ifnull(sum(`tb_detail_kerugian_ayam`.`jumlah`),0) from `tb_detail_kerugian_ayam` where (`tb_detail_kerugian_ayam`.`id_detail_group_transaksi` = `tb_detail_pembelian_ayam`.`id_detail_group_transaksi`))) AS `jumlah_sisa_ayam`,(select ifnull(sum(`tb_detail_kerugian_ayam`.`jumlah`),0) from `tb_detail_kerugian_ayam` where (`tb_detail_kerugian_ayam`.`id_detail_group_transaksi` = `tb_detail_pembelian_ayam`.`id_detail_group_transaksi`)) AS `jumlah_kerugian_ayam`,`FUNCTION_STATUS_PENJUALAN_AYAM`(`tb_detail_pembelian_ayam`.`id_detail_pembelian_ayam`,cast(now() as date)) AS `umur_ayam_sekarang` from `tb_detail_pembelian_ayam`;

-- --------------------------------------------------------

--
-- Structure for view `view_stok_ayam`
--
DROP TABLE IF EXISTS `view_stok_ayam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `view_stok_ayam` AS select `tb_kandang`.`id_kandang` AS `id_kandang`,`tb_kandang`.`nama` AS `nama`,`tb_kandang`.`stok_ayam` AS `stok_ayam`,((ifnull((select sum(`tb_detail_pembelian_ayam`.`jumlah_ayam`) from `tb_detail_pembelian_ayam` where (`tb_detail_pembelian_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)),0) - ifnull((select sum(`tb_detail_penjualan_ayam`.`jumlah_ayam`) from `tb_detail_penjualan_ayam` where (`tb_detail_penjualan_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)),0)) - ifnull((select sum(`tb_detail_kerugian_ayam`.`jumlah`) from `tb_detail_kerugian_ayam` where (`tb_detail_kerugian_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)),0)) AS `jumlah`,(select `view_stok_ayam_params`.`sisa_jumlah_ayam` from `view_stok_ayam_params` where (`view_stok_ayam_params`.`id_kandang` = `tb_kandang`.`id_kandang`)) AS `sisa_jumlah_ayam`,if(((select `view_stok_ayam_params`.`jumlah` from `view_stok_ayam_params` where (`view_stok_ayam_params`.`id_kandang` = `tb_kandang`.`id_kandang`) limit 1) > 0),ifnull((select `tb_detail_pembelian_ayam`.`umur` from `tb_detail_pembelian_ayam` where (`tb_detail_pembelian_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`) order by `tb_detail_pembelian_ayam`.`created_at` desc limit 1),0),0) AS `umur_ayam`,if(((select `view_stok_ayam_params`.`jumlah` from `view_stok_ayam_params` where (`view_stok_ayam_params`.`id_kandang` = `tb_kandang`.`id_kandang`) limit 1) > 0),(select min(`tb_detail_pembelian_ayam`.`id_detail_group_transaksi`) from `tb_detail_pembelian_ayam` where (`tb_detail_pembelian_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`) limit 1),NULL) AS `id_detail_group_transaksi`,if(((select `view_stok_ayam_params`.`jumlah` from `view_stok_ayam_params` where (`view_stok_ayam_params`.`id_kandang` = `tb_kandang`.`id_kandang`) limit 1) > 0),ifnull((select `FUNCTION_STATUS_PENJUALAN_AYAM`(`tb_detail_pembelian_ayam`.`id_detail_pembelian_ayam`,cast(now() as date)) from `tb_detail_pembelian_ayam` where (`tb_detail_pembelian_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`) order by `tb_detail_pembelian_ayam`.`created_at` desc limit 1),0),0) AS `umur_ayam_sekarang`,`tb_kandang`.`id_karyawan` AS `id_karyawan`,(select count(`view_transaksi_ayam`.`id_transaksi`) from `view_transaksi_ayam` where (`view_transaksi_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)) AS `jumlah_transaksi`,(select count(`view_transaksi_ayam`.`id_transaksi`) from `view_transaksi_ayam` where ((`view_transaksi_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`) and (convert(`view_transaksi_ayam`.`aksi` using utf8mb4) = 'beli'))) AS `jumlah_transaksi_masuk`,(select count(`view_transaksi_ayam`.`id_transaksi`) from `view_transaksi_ayam` where ((`view_transaksi_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`) and (convert(`view_transaksi_ayam`.`aksi` using utf8mb4) = 'jual'))) AS `jumlah_transaksi_keluar`,(select count(`view_transaksi_ayam`.`id_transaksi`) from `view_transaksi_ayam` where ((`view_transaksi_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`) and (convert(`view_transaksi_ayam`.`aksi` using utf8mb4) = 'rugi'))) AS `jumlah_kerugian` from `tb_kandang`;

-- --------------------------------------------------------

--
-- Structure for view `view_stok_ayam_params`
--
DROP TABLE IF EXISTS `view_stok_ayam_params`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `view_stok_ayam_params` AS select `tb_kandang`.`id_kandang` AS `id_kandang`,`tb_kandang`.`nama` AS `nama`,`tb_kandang`.`stok_ayam` AS `stok_ayam`,ifnull((select sum(`tb_detail_pembelian_ayam`.`jumlah_ayam`) from `tb_detail_pembelian_ayam` where (`tb_detail_pembelian_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)),0) AS `pembelian`,ifnull((select sum(`tb_detail_penjualan_ayam`.`jumlah_ayam`) from `tb_detail_penjualan_ayam` where (`tb_detail_penjualan_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)),0) AS `penjualan`,ifnull((select sum(`tb_detail_kerugian_ayam`.`jumlah`) from `tb_detail_kerugian_ayam` where (`tb_detail_kerugian_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)),0) AS `kerugian`,((ifnull((select sum(`tb_detail_pembelian_ayam`.`jumlah_ayam`) from `tb_detail_pembelian_ayam` where (`tb_detail_pembelian_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)),0) - ifnull((select sum(`tb_detail_penjualan_ayam`.`jumlah_ayam`) from `tb_detail_penjualan_ayam` where (`tb_detail_penjualan_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)),0)) - ifnull((select sum(`tb_detail_kerugian_ayam`.`jumlah`) from `tb_detail_kerugian_ayam` where (`tb_detail_kerugian_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)),0)) AS `jumlah`,(`tb_kandang`.`stok_ayam` - ((ifnull((select sum(`tb_detail_pembelian_ayam`.`jumlah_ayam`) from `tb_detail_pembelian_ayam` where (`tb_detail_pembelian_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)),0) - ifnull((select sum(`tb_detail_penjualan_ayam`.`jumlah_ayam`) from `tb_detail_penjualan_ayam` where (`tb_detail_penjualan_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)),0)) - ifnull((select sum(`tb_detail_kerugian_ayam`.`jumlah`) from `tb_detail_kerugian_ayam` where (`tb_detail_kerugian_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)),0))) AS `sisa_jumlah_ayam`,ifnull((select `tb_detail_pembelian_ayam`.`umur` from `tb_detail_pembelian_ayam` where (`tb_detail_pembelian_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`) order by `tb_detail_pembelian_ayam`.`created_at` desc limit 1),0) AS `umur_ayam`,(select count(`view_transaksi_ayam`.`id_transaksi`) from `view_transaksi_ayam` where (`view_transaksi_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`)) AS `jumlah_transaksi`,(select count(`view_transaksi_ayam`.`id_transaksi`) from `view_transaksi_ayam` where ((`view_transaksi_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`) and (convert(`view_transaksi_ayam`.`aksi` using utf8mb4) = 'in'))) AS `jumlah_transaksi_masuk`,(select count(`view_transaksi_ayam`.`id_transaksi`) from `view_transaksi_ayam` where ((`view_transaksi_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`) and (convert(`view_transaksi_ayam`.`aksi` using utf8mb4) = 'out'))) AS `jumlah_transaksi_keluar`,(select count(`view_transaksi_ayam`.`id_transaksi`) from `view_transaksi_ayam` where ((`view_transaksi_ayam`.`id_kandang` = `tb_kandang`.`id_kandang`) and (convert(`view_transaksi_ayam`.`aksi` using utf8mb4) = 'die'))) AS `jumlah_kerugian` from `tb_kandang`;

-- --------------------------------------------------------

--
-- Structure for view `view_stok_gudang`
--
DROP TABLE IF EXISTS `view_stok_gudang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `view_stok_gudang` AS select `tb_gudang`.`id_gudang` AS `id_gudang`,`tb_gudang`.`nama` AS `nama_gudang`,`tb_gudang`.`satuan` AS `satuan`,(ifnull((select sum(`view_transaksi_gudang`.`jumlah`) from `view_transaksi_gudang` where ((`view_transaksi_gudang`.`id_gudang` = `tb_gudang`.`id_gudang`) and (`view_transaksi_gudang`.`aksi` = 'beli'))),0) - ifnull((select sum(`view_transaksi_gudang`.`jumlah`) from `view_transaksi_gudang` where ((`view_transaksi_gudang`.`id_gudang` = `tb_gudang`.`id_gudang`) and (`view_transaksi_gudang`.`aksi` = 'pakai'))),0)) AS `jumlah_gudang`,(select count(`view_transaksi_gudang`.`jumlah`) from `view_transaksi_gudang` where (`view_transaksi_gudang`.`id_gudang` = `tb_gudang`.`id_gudang`)) AS `jumlah_transaksi`,(select count(`view_transaksi_gudang`.`jumlah`) from `view_transaksi_gudang` where ((`view_transaksi_gudang`.`id_gudang` = `tb_gudang`.`id_gudang`) and (`view_transaksi_gudang`.`aksi` = 'beli'))) AS `jumlah_transaksi_masuk`,(select count(`view_transaksi_gudang`.`jumlah`) from `view_transaksi_gudang` where ((`view_transaksi_gudang`.`id_gudang` = `tb_gudang`.`id_gudang`) and (`view_transaksi_gudang`.`aksi` = 'pakai'))) AS `jumlah_transaksi_keluar` from `tb_gudang`;

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi_ayam`
--
DROP TABLE IF EXISTS `view_transaksi_ayam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `view_transaksi_ayam` AS select `tb_detail_pembelian_ayam`.`id_detail_pembelian_ayam` AS `id_transaksi`,`tb_detail_pembelian_ayam`.`id_kandang` AS `id_kandang`,`tb_detail_pembelian_ayam`.`id_supplier` AS `id_supplier`,`tb_detail_pembelian_ayam`.`tanggal` AS `tanggal`,`tb_detail_pembelian_ayam`.`jumlah_ayam` AS `jumlah_ayam`,'pembelian' AS `keterangan`,'beli' AS `aksi`,`tb_detail_pembelian_ayam`.`id_admin` AS `id_admin`,`tb_detail_pembelian_ayam`.`id_karyawan` AS `id_karyawan`,`tb_detail_pembelian_ayam`.`update_by_karyawan` AS `update_by_karyawan`,`tb_detail_pembelian_ayam`.`update_by_admin` AS `update_by_admin`,`tb_detail_pembelian_ayam`.`created_at` AS `created_at`,`tb_detail_pembelian_ayam`.`updated_at` AS `updated_at` from `tb_detail_pembelian_ayam` union select `tb_detail_penjualan_ayam`.`id_detail_penjualan_ayam` AS `id_transaksi`,`tb_detail_pembelian_ayam`.`id_kandang` AS `id_kandang`,NULL AS `id_supplier`,`tb_detail_penjualan_ayam`.`tanggal` AS `tanggal`,`tb_detail_penjualan_ayam`.`jumlah_ayam` AS `jumlah_ayam`,`tb_detail_penjualan_ayam`.`keterangan` AS `keterangan`,'jual' AS `aksi`,`tb_detail_penjualan_ayam`.`id_admin` AS `id_admin`,`tb_detail_penjualan_ayam`.`id_karyawan` AS `id_karyawan`,`tb_detail_penjualan_ayam`.`update_by_karyawan` AS `update_by_karyawan`,`tb_detail_penjualan_ayam`.`update_by_admin` AS `update_by_admin`,`tb_detail_penjualan_ayam`.`created_at` AS `created_at`,`tb_detail_penjualan_ayam`.`updated_at` AS `updated_at` from (`tb_detail_penjualan_ayam` join `tb_detail_pembelian_ayam` on((`tb_detail_pembelian_ayam`.`id_detail_group_transaksi` = `tb_detail_penjualan_ayam`.`id_detail_group_transaksi`))) union select `tb_detail_kerugian_ayam`.`id_detail_kerugian_ayam` AS `id_transaksi`,`tb_detail_pembelian_ayam`.`id_kandang` AS `id_kandang`,NULL AS `id_supplier`,`tb_detail_kerugian_ayam`.`tanggal` AS `tanggal`,`tb_detail_kerugian_ayam`.`jumlah` AS `jumlah_ayam`,`tb_detail_kerugian_ayam`.`keterangan` AS `keterangan`,'rugi' AS `aksi`,`tb_detail_kerugian_ayam`.`id_admin` AS `id_admin`,`tb_detail_kerugian_ayam`.`id_karyawan` AS `id_karyawan`,`tb_detail_kerugian_ayam`.`update_by_karyawan` AS `update_by_karyawan`,`tb_detail_kerugian_ayam`.`update_by_admin` AS `update_by_admin`,`tb_detail_kerugian_ayam`.`created_at` AS `created_at`,`tb_detail_kerugian_ayam`.`updated_at` AS `updated_at` from (`tb_detail_kerugian_ayam` join `tb_detail_pembelian_ayam` on((`tb_detail_pembelian_ayam`.`id_detail_group_transaksi` = `tb_detail_kerugian_ayam`.`id_detail_group_transaksi`)));

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi_gudang`
--
DROP TABLE IF EXISTS `view_transaksi_gudang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`user`@`%` SQL SECURITY DEFINER VIEW `view_transaksi_gudang` AS (select `tb_detail_pembelian_gudang`.`id_detail_pembelian_gudang` AS `id_transaksi`,'beli' AS `aksi`,`tb_detail_pembelian_gudang`.`id_gudang` AS `id_gudang`,`tb_detail_pembelian_gudang`.`id_supplier` AS `id_supplier`,`tb_detail_pembelian_gudang`.`tanggal` AS `tanggal`,`tb_detail_pembelian_gudang`.`jumlah` AS `jumlah`,`tb_gudang`.`satuan` AS `satuan`,`tb_detail_pembelian_gudang`.`harga` AS `harga`,`tb_detail_pembelian_gudang`.`id_admin` AS `id_admin`,`tb_detail_pembelian_gudang`.`id_karyawan` AS `id_karyawan`,`tb_detail_pembelian_gudang`.`update_by_admin` AS `update_by_admin`,`tb_detail_pembelian_gudang`.`update_by_karyawan` AS `update_by_karyawan`,`tb_detail_pembelian_gudang`.`created_at` AS `created_at`,`tb_detail_pembelian_gudang`.`updated_at` AS `updated_at`,'' AS `keterangan` from (`tb_detail_pembelian_gudang` join `tb_gudang` on((`tb_gudang`.`id_gudang` = `tb_detail_pembelian_gudang`.`id_gudang`)))) union all (select `tb_detail_penggunaan_gudang`.`id_detail_penggunaan_gudang` AS `id_detail_penggunaan_gudang`,'pakai' AS `aksi`,`tb_detail_penggunaan_gudang`.`id_gudang` AS `id_gudang`,NULL AS `id_supplier`,`tb_detail_penggunaan_gudang`.`tanggal` AS `tanggal`,`tb_detail_penggunaan_gudang`.`jumlah` AS `jumlah`,`tb_gudang`.`satuan` AS `satuan`,0 AS `0`,`tb_detail_penggunaan_gudang`.`id_admin` AS `id_admin`,`tb_detail_penggunaan_gudang`.`id_karyawan` AS `id_karyawan`,`tb_detail_penggunaan_gudang`.`update_by_admin` AS `update_by_admin`,`tb_detail_penggunaan_gudang`.`update_by_karyawan` AS `update_by_karyawan`,`tb_detail_penggunaan_gudang`.`created_at` AS `created_at`,`tb_detail_penggunaan_gudang`.`updated_at` AS `updated_at`,`tb_detail_penggunaan_gudang`.`keterangan` AS `keterangan` from (`tb_detail_penggunaan_gudang` join `tb_gudang` on((`tb_gudang`.`id_gudang` = `tb_detail_penggunaan_gudang`.`id_gudang`))));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usernmae` (`username`);

--
-- Indexes for table `tb_detail_group_transaksi`
--
ALTER TABLE `tb_detail_group_transaksi`
  ADD PRIMARY KEY (`id_detail_group_transaksi`);

--
-- Indexes for table `tb_detail_kerugian_ayam`
--
ALTER TABLE `tb_detail_kerugian_ayam`
  ADD PRIMARY KEY (`id_detail_kerugian_ayam`),
  ADD KEY `FK_tb_detail_kerugian_ayam_tb_admin` (`id_admin`),
  ADD KEY `FK_tb_detail_kerugian_ayam_tb_karyawan` (`id_karyawan`),
  ADD KEY `FK_tb_detail_kerugian_ayam_tb_admin_2` (`update_by_admin`),
  ADD KEY `FK_tb_detail_kerugian_ayam_tb_karyawan_2` (`update_by_karyawan`),
  ADD KEY `id_detail_pembelian_ayam` (`id_detail_pembelian_ayam`),
  ADD KEY `id_kandang_2` (`id_kandang`),
  ADD KEY `id_detail_group_transaksi` (`id_detail_group_transaksi`);

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
  ADD KEY `FK_tb_detail_pembelian_ayam_tb_karyawan_2` (`update_by_karyawan`),
  ADD KEY `id_detail_group_transaksi` (`id_detail_group_transaksi`);

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
  ADD KEY `FK_tb_detail_penjualan_ayam_tb_admin_2` (`update_by_admin`),
  ADD KEY `id_detail_group_transaksi` (`id_detail_group_transaksi`);

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
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_detail_supplier_jenis`
--
ALTER TABLE `tb_detail_supplier_jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_kerugian_ayam`
--
ALTER TABLE `tb_detail_kerugian_ayam`
  ADD CONSTRAINT `tb_detail_kerugian_ayam_ibfk_1` FOREIGN KEY (`id_detail_pembelian_ayam`) REFERENCES `tb_detail_pembelian_ayam` (`id_detail_pembelian_ayam`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_kerugian_ayam_ibfk_2` FOREIGN KEY (`id_kandang`) REFERENCES `tb_kandang` (`id_kandang`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_kerugian_ayam_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_kerugian_ayam_ibfk_4` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_kerugian_ayam_ibfk_5` FOREIGN KEY (`update_by_admin`) REFERENCES `tb_admin` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_kerugian_ayam_ibfk_6` FOREIGN KEY (`update_by_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_kerugian_ayam_ibfk_7` FOREIGN KEY (`id_detail_group_transaksi`) REFERENCES `tb_detail_group_transaksi` (`id_detail_group_transaksi`);

--
-- Constraints for table `tb_detail_pembelian_ayam`
--
ALTER TABLE `tb_detail_pembelian_ayam`
  ADD CONSTRAINT `tb_detail_pembelian_ayam_ibfk_1` FOREIGN KEY (`id_detail_group_transaksi`) REFERENCES `tb_detail_group_transaksi` (`id_detail_group_transaksi`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_pembelian_ayam_ibfk_2` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_pembelian_ayam_ibfk_3` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_pembelian_ayam_ibfk_4` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_pembelian_ayam_ibfk_5` FOREIGN KEY (`id_detail_group_transaksi`) REFERENCES `tb_detail_group_transaksi` (`id_detail_group_transaksi`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_pembelian_ayam_ibfk_6` FOREIGN KEY (`update_by_admin`) REFERENCES `tb_admin` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_pembelian_ayam_ibfk_7` FOREIGN KEY (`update_by_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE SET NULL,
  ADD CONSTRAINT `tb_detail_pembelian_ayam_ibfk_8` FOREIGN KEY (`id_kandang`) REFERENCES `tb_kandang` (`id_kandang`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_detail_penjualan_ayam`
--
ALTER TABLE `tb_detail_penjualan_ayam`
  ADD CONSTRAINT `tb_detail_penjualan_ayam_ibfk_2` FOREIGN KEY (`id_kandang`) REFERENCES `tb_kandang` (`id_kandang`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `tb_detail_penjualan_ayam_ibfk_3` FOREIGN KEY (`id_kandang`) REFERENCES `tb_kandang` (`id_kandang`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_penjualan_ayam_ibfk_4` FOREIGN KEY (`id_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_penjualan_ayam_ibfk_5` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_penjualan_ayam_ibfk_6` FOREIGN KEY (`id_detail_group_transaksi`) REFERENCES `tb_detail_group_transaksi` (`id_detail_group_transaksi`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_penjualan_ayam_ibfk_7` FOREIGN KEY (`update_by_karyawan`) REFERENCES `tb_karyawan` (`id_karyawan`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_penjualan_ayam_ibfk_8` FOREIGN KEY (`update_by_admin`) REFERENCES `tb_admin` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
