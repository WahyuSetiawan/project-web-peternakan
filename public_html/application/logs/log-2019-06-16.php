<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-06-16 02:32:50 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-06-16 02:32:50 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel /usr/share/httpd/www/system/core/Loader.php 344
ERROR - 2019-06-16 02:32:56 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-06-16 02:32:59 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-06-16 04:25:04 --> Query error: Unknown column 'kandang' in 'order clause' - Invalid query: SELECT `tb_jadwal_kandang`.*, `tb_gudang`.`nama` as `nama_gudang`, `tb_kandang`.`nama` as `nama_kandang`
FROM `tb_jadwal_kandang`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_jadwal_kandang`.`id_kandang`
LEFT JOIN `tb_gudang` ON `tb_gudang`.`id_gudang` = `tb_jadwal_kandang`.`id_gudang`
ORDER BY `waktu_mulai` ASC, `hari` ASC, `kandang` ASC, `gudang` ASC
 LIMIT 5
ERROR - 2019-06-16 06:18:18 --> 404 Page Not Found: Gudang/0
ERROR - 2019-06-16 06:18:45 --> 404 Page Not Found: Gudang/0
ERROR - 2019-06-16 06:19:01 --> 404 Page Not Found: Gudang/0
ERROR - 2019-06-16 06:19:05 --> 404 Page Not Found: Pakan/belum
ERROR - 2019-06-16 06:19:13 --> 404 Page Not Found: Pakan/belum
ERROR - 2019-06-16 06:19:17 --> 404 Page Not Found: Pakan/belum
ERROR - 2019-06-16 06:23:49 --> Severity: Error --> Call to undefined method DetailPenggunaanGudangModel::belum() /usr/share/httpd/www/application/controllers/Pakan.php 82
ERROR - 2019-06-16 06:31:08 --> Severity: Parsing Error --> syntax error, unexpected 'b' (T_STRING) /usr/share/httpd/www/application/models/DetailPenggunaanGudangModel.php 74
ERROR - 2019-06-16 06:32:12 --> Severity: Parsing Error --> syntax error, unexpected 'b' (T_STRING) /usr/share/httpd/www/application/models/DetailPenggunaanGudangModel.php 77
ERROR - 2019-06-16 06:32:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 5 - Invalid query: SELECT *
FROM `tb_jadwal_kandang`
WHERE 
            id_jadwal not in (select id_jadwal from tb_detail_penggunaan_gudang where date(tanggal) = date('2019-06-16')
 LIMIT 5
ERROR - 2019-06-16 06:33:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 5 - Invalid query: SELECT *
FROM `tb_jadwal_kandang`
WHERE 
            id_jadwal not in (select id_jadwal from tb_detail_penggunaan_gudang
 LIMIT 5
ERROR - 2019-06-16 06:33:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 5 - Invalid query: SELECT *
FROM `tb_jadwal_kandang`
WHERE 
            id_jadwal not in (select id_jadwal from tb_detail_penggunaan_gudang where date(tanggal) = date('2019-06-16')
 LIMIT 5
ERROR - 2019-06-16 06:34:00 --> Query error: Unknown column 'id_jadwal' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tb_jadwal_kandang`
WHERE 
            id_jadwal not in (select id_jadwal from tb_detail_penggunaan_gudang where date(tanggal) = date('2019-06-16'))
 LIMIT 5
ERROR - 2019-06-16 06:36:13 --> Query error: Unknown column 'id_jadwal' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tb_jadwal_kandang`
WHERE 
            id_jadwal not in (select id_jadwal from view_jadwal_penggunaan_gudang where date(tanggal) = date('2019-06-16'))
 LIMIT 5
ERROR - 2019-06-16 06:36:15 --> Query error: Unknown column 'id_jadwal' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tb_jadwal_kandang`
WHERE 
            id_jadwal not in (select id_jadwal from view_jadwal_penggunaan_gudang where date(tanggal) = date('2019-06-16'))
 LIMIT 5
ERROR - 2019-06-16 06:36:28 --> Query error: Unknown column 'id_jadwal' in 'IN/ALL/ANY subquery' - Invalid query: SELECT *
FROM `tb_jadwal_kandang`
WHERE 
            id_jadwal not in (select id_jadwal_gudang from view_jadwal_penggunaan_gudang where date(tanggal) = date('2019-06-16'))
 LIMIT 5
ERROR - 2019-06-16 06:41:05 --> Severity: Notice --> Undefined variable: id_hari /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 63
ERROR - 2019-06-16 06:41:05 --> Severity: Notice --> Undefined variable: id_hari /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 64
ERROR - 2019-06-16 06:41:05 --> Severity: Notice --> Undefined variable: id_hari /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 65
ERROR - 2019-06-16 06:41:05 --> Severity: Notice --> Undefined variable: id_hari /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 66
ERROR - 2019-06-16 06:41:05 --> Severity: Notice --> Undefined variable: id_hari /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 67
ERROR - 2019-06-16 06:41:05 --> Severity: Notice --> Undefined variable: id_hari /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 68
ERROR - 2019-06-16 06:41:05 --> Severity: Notice --> Undefined variable: id_hari /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 69
ERROR - 2019-06-16 06:41:05 --> Severity: Notice --> Undefined variable: id_hari /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 70
ERROR - 2019-06-16 06:41:05 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 112
ERROR - 2019-06-16 06:41:05 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 115
ERROR - 2019-06-16 06:41:05 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 112
ERROR - 2019-06-16 06:41:05 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 115
ERROR - 2019-06-16 06:41:05 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 112
ERROR - 2019-06-16 06:41:05 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 115
ERROR - 2019-06-16 06:41:05 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 112
ERROR - 2019-06-16 06:41:05 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 115
ERROR - 2019-06-16 06:41:26 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 06:41:26 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 06:41:26 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 06:41:26 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 06:41:26 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 06:41:26 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 06:41:26 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 06:41:26 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 06:42:21 --> Query error: Unknown column 'tb_detail_penggunaan_gudang.id_kandang' in 'on clause' - Invalid query: SELECT *
FROM `tb_jadwal_kandang`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_detail_penggunaan_gudang`.`id_kandang`
LEFT JOIN `tb_gudang` ON `tb_gudang`.`id_gudang` = `tb_detail_penggunaan_gudang`.`id_gudang`
WHERE 
            id_jadwal_kandang not in (select id_jadwal_gudang from view_jadwal_penggunaan_gudang where date(tanggal) = date('2019-06-16'))
 LIMIT 5
ERROR - 2019-06-16 06:42:55 --> Query error: Not unique table/alias: 'tb_gudang' - Invalid query: SELECT `tb_detail_penggunaan_gudang`.*, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_gudang`.`nama` as `nama_gudang`, `tb_admin`.`nama` as `nama_admin`, `tanggal`, DATE_FORMAT(tanggal, "%d-%m-%Y") as tanggal_datetime, `admin_update`.`nama` as `update_by_admin_nama`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `tb_jadwal_kandang`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `tb_detail_penggunaan_gudang`.`id_karyawan`
LEFT JOIN `tb_gudang` ON `tb_gudang`.`id_gudang` = `tb_detail_penggunaan_gudang`.`id_gudang`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `tb_detail_penggunaan_gudang`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `tb_detail_penggunaan_gudang`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `tb_detail_penggunaan_gudang`.`update_by_karyawan`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_detail_penggunaan_gudang`.`id_kandang`
LEFT JOIN `tb_gudang` ON `tb_gudang`.`id_gudang` = `tb_detail_penggunaan_gudang`.`id_gudang`
WHERE `id_detail_pengeluaran_gudang` = 'tb_jadwal_kandang.*'
AND 
            `id_jadwal_kandang` not in (select id_jadwal_gudang from view_jadwal_penggunaan_gudang where date(tanggal) = date('2019-06-16'))
 LIMIT 5
ERROR - 2019-06-16 06:59:00 --> Query error: Not unique table/alias: 'tb_gudang' - Invalid query: SELECT `tb_detail_penggunaan_gudang`.*, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_gudang`.`nama` as `nama_gudang`, `tb_admin`.`nama` as `nama_admin`, `tanggal`, DATE_FORMAT(tanggal, "%d-%m-%Y") as tanggal_datetime, `admin_update`.`nama` as `update_by_admin_nama`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `tb_jadwal_kandang`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `tb_detail_penggunaan_gudang`.`id_karyawan`
LEFT JOIN `tb_gudang` ON `tb_gudang`.`id_gudang` = `tb_detail_penggunaan_gudang`.`id_gudang`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `tb_detail_penggunaan_gudang`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `tb_detail_penggunaan_gudang`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `tb_detail_penggunaan_gudang`.`update_by_karyawan`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_detail_penggunaan_gudang`.`id_kandang`
LEFT JOIN `tb_gudang` ON `tb_gudang`.`id_gudang` = `tb_detail_penggunaan_gudang`.`id_gudang`
WHERE `id_detail_pengeluaran_gudang` = 'tb_jadwal_kandang.*'
AND 
            `id_jadwal_kandang` not in (select id_jadwal_gudang from view_jadwal_penggunaan_gudang where date(tanggal) = date('2019-06-16'))
 LIMIT 5
ERROR - 2019-06-16 06:59:10 --> Query error: Not unique table/alias: 'tb_gudang' - Invalid query: SELECT `tb_detail_penggunaan_gudang`.*, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_gudang`.`nama` as `nama_gudang`, `tb_admin`.`nama` as `nama_admin`, `tanggal`, DATE_FORMAT(tanggal, "%d-%m-%Y") as tanggal_datetime, `admin_update`.`nama` as `update_by_admin_nama`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `tb_jadwal_kandang`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `tb_detail_penggunaan_gudang`.`id_karyawan`
LEFT JOIN `tb_gudang` ON `tb_gudang`.`id_gudang` = `tb_detail_penggunaan_gudang`.`id_gudang`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `tb_detail_penggunaan_gudang`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `tb_detail_penggunaan_gudang`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `tb_detail_penggunaan_gudang`.`update_by_karyawan`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_detail_penggunaan_gudang`.`id_kandang`
LEFT JOIN `tb_gudang` ON `tb_gudang`.`id_gudang` = `tb_detail_penggunaan_gudang`.`id_gudang`
WHERE `id_detail_pengeluaran_gudang` = 'tb_jadwal_kandang.id_gudang'
AND 
            `id_jadwal_kandang` not in (select id_jadwal_gudang from view_jadwal_penggunaan_gudang where date(tanggal) = date('2019-06-16'))
 LIMIT 5
ERROR - 2019-06-16 07:06:33 --> Query error: Not unique table/alias: 'tb_gudang' - Invalid query: SELECT `tb_detail_penggunaan_gudang`.*, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_gudang`.`nama` as `nama_gudang`, `tb_admin`.`nama` as `nama_admin`, `tanggal`, DATE_FORMAT(tanggal, "%d-%m-%Y") as tanggal_datetime, `admin_update`.`nama` as `update_by_admin_nama`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `tb_jadwal_kandang`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `tb_detail_penggunaan_gudang`.`id_karyawan`
LEFT JOIN `tb_gudang` ON `tb_gudang`.`id_gudang` = `tb_detail_penggunaan_gudang`.`id_gudang`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `tb_detail_penggunaan_gudang`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `tb_detail_penggunaan_gudang`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `tb_detail_penggunaan_gudang`.`update_by_karyawan`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_detail_penggunaan_gudang`.`id_kandang`
LEFT JOIN `tb_gudang` ON `tb_gudang`.`id_gudang` = `tb_detail_penggunaan_gudang`.`id_gudang`
WHERE `id_detail_pengeluaran_gudang` = 'tb_jadwal_kandang.id_gudang'
AND 
            `id_jadwal_kandang` not in (select id_jadwal_gudang from view_jadwal_penggunaan_gudang where date(tanggal) = date('2019-06-16'))
 LIMIT 5
ERROR - 2019-06-16 07:06:38 --> Query error: Unknown column 'tb_detail_penggunaan_gudang.id_kandang' in 'on clause' - Invalid query: SELECT *
FROM `tb_jadwal_kandang`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_detail_penggunaan_gudang`.`id_kandang`
LEFT JOIN `tb_gudang` ON `tb_gudang`.`id_gudang` = `tb_detail_penggunaan_gudang`.`id_gudang`
WHERE 
            id_jadwal_kandang not in (select id_jadwal_gudang from view_jadwal_penggunaan_gudang where date(tanggal) = date('2019-06-16'))
 LIMIT 5
ERROR - 2019-06-16 07:06:51 --> Query error: Unknown column 'tb_detail_penggunaan_gudang.id_kandang' in 'on clause' - Invalid query: SELECT `tb_jadwal_kandang`.`id_gudang`
FROM `tb_jadwal_kandang`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_detail_penggunaan_gudang`.`id_kandang`
LEFT JOIN `tb_gudang` ON `tb_gudang`.`id_gudang` = `tb_detail_penggunaan_gudang`.`id_gudang`
WHERE 
            id_jadwal_kandang not in (select id_jadwal_gudang from view_jadwal_penggunaan_gudang where date(tanggal) = date('2019-06-16'))
 LIMIT 5
ERROR - 2019-06-16 07:06:59 --> Query error: Unknown column 'tb_detail_penggunaan_gudang.id_kandang' in 'on clause' - Invalid query: SELECT `tb_jadwal_kandang`.*
FROM `tb_jadwal_kandang`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_detail_penggunaan_gudang`.`id_kandang`
LEFT JOIN `tb_gudang` ON `tb_gudang`.`id_gudang` = `tb_detail_penggunaan_gudang`.`id_gudang`
WHERE 
            id_jadwal_kandang not in (select id_jadwal_gudang from view_jadwal_penggunaan_gudang where date(tanggal) = date('2019-06-16'))
 LIMIT 5
ERROR - 2019-06-16 07:07:26 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 07:07:26 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:07:26 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 07:07:26 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:07:26 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 07:07:26 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:07:26 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 07:07:26 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:08:10 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 07:08:10 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:08:10 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 07:08:10 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:08:10 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 07:08:10 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:08:10 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 07:08:10 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:08:29 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 07:08:29 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:08:29 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 07:08:29 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:08:29 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 07:08:29 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:08:29 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 07:08:29 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:08:47 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 07:08:47 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:08:47 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 07:08:47 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:08:47 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 07:08:47 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:08:47 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 07:08:47 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:09:11 --> Query error: Unknown column 'tb_kandang.nama_kandang' in 'field list' - Invalid query: SELECT `tb_jadwal_kandang`.*, `tb_kandang`.`nama_kandang`
FROM `tb_jadwal_kandang`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_jadwal_kandang`.`id_kandang`
LEFT JOIN `tb_gudang` ON `tb_gudang`.`id_gudang` = `tb_jadwal_kandang`.`id_gudang`
WHERE 
            id_jadwal_kandang not in (select id_jadwal_gudang from view_jadwal_penggunaan_gudang where date(tanggal) = date('2019-06-16'))
 LIMIT 5
ERROR - 2019-06-16 07:09:31 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 07:09:31 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:09:31 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 07:09:31 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:09:31 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 07:09:31 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:09:31 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 98
ERROR - 2019-06-16 07:09:31 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:09:41 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:09:41 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:09:41 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:09:41 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 101
ERROR - 2019-06-16 07:19:17 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-06-16 07:24:06 --> Query error: Unknown column 'tb_jadwal_kandang.id_jadwal_kadang' in 'field list' - Invalid query: SELECT `tb_jadwal_kandang`.`id_jadwal_kadang`, `tb_jadwal_kandang`.`hari`, `tb_jadwal_kandang`.`waktu_mulai`, `tb_jadwal_kandang`.`waktu_selesai`, `tb_jadwal_kandang`.`catatan`, `tb_kandang`.`nama` as `nama_kandang`, `tb_gudang`.`nama` as `nama_gudang`
FROM `tb_jadwal_kandang`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_jadwal_kandang`.`id_kandang`
LEFT JOIN `tb_gudang` ON `tb_gudang`.`id_gudang` = `tb_jadwal_kandang`.`id_gudang`
WHERE 
            id_jadwal_kandang not in (select id_jadwal_gudang from view_jadwal_penggunaan_gudang where date(tanggal) = date('2019-06-16 07:24'))
 LIMIT 5
ERROR - 2019-06-16 07:24:24 --> Severity: Notice --> Undefined variable: current_time /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 138
ERROR - 2019-06-16 07:24:24 --> Severity: Notice --> Undefined variable: sunrise /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 139
ERROR - 2019-06-16 07:24:24 --> Severity: Notice --> Undefined variable: sunset /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 140
ERROR - 2019-06-16 07:24:24 --> Severity: Notice --> Undefined variable: current_time /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 138
ERROR - 2019-06-16 07:24:24 --> Severity: Notice --> Undefined variable: sunrise /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 139
ERROR - 2019-06-16 07:24:24 --> Severity: Notice --> Undefined variable: sunset /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 140
ERROR - 2019-06-16 07:24:24 --> Severity: Notice --> Undefined variable: current_time /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 138
ERROR - 2019-06-16 07:24:24 --> Severity: Notice --> Undefined variable: sunrise /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 139
ERROR - 2019-06-16 07:24:24 --> Severity: Notice --> Undefined variable: sunset /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 140
ERROR - 2019-06-16 07:24:24 --> Severity: Notice --> Undefined variable: current_time /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 138
ERROR - 2019-06-16 07:24:24 --> Severity: Notice --> Undefined variable: sunrise /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 139
ERROR - 2019-06-16 07:24:24 --> Severity: Notice --> Undefined variable: sunset /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 140
ERROR - 2019-06-16 07:24:59 --> Severity: Notice --> Undefined variable: current_time /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 138
ERROR - 2019-06-16 07:24:59 --> Severity: Notice --> Undefined variable: current_time /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 138
ERROR - 2019-06-16 07:24:59 --> Severity: Notice --> Undefined variable: current_time /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 138
ERROR - 2019-06-16 07:24:59 --> Severity: Notice --> Undefined variable: current_time /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 138
ERROR - 2019-06-16 07:25:15 --> Severity: 4096 --> Object of class DateTime could not be converted to string /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 140
ERROR - 2019-06-16 07:25:15 --> Severity: 4096 --> Object of class DateTime could not be converted to string /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 140
ERROR - 2019-06-16 07:25:15 --> Severity: 4096 --> Object of class DateTime could not be converted to string /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 140
ERROR - 2019-06-16 07:25:15 --> Severity: 4096 --> Object of class DateTime could not be converted to string /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 140
ERROR - 2019-06-16 07:26:44 --> Severity: Notice --> Undefined property: stdClass::$waktu_mulai /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 131
ERROR - 2019-06-16 07:26:44 --> Severity: Notice --> Undefined property: stdClass::$waktu_mulai /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 131
ERROR - 2019-06-16 07:26:44 --> Severity: Notice --> Undefined property: stdClass::$waktu_mulai /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 131
ERROR - 2019-06-16 07:26:44 --> Severity: Notice --> Undefined property: stdClass::$waktu_mulai /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 131
ERROR - 2019-06-16 07:29:12 --> Severity: Parsing Error --> syntax error, unexpected '}', expecting ',' or ';' /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 144
ERROR - 2019-06-16 11:27:44 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-06-16 11:27:45 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel /usr/share/httpd/www/system/core/Loader.php 344
ERROR - 2019-06-16 11:40:34 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-06-16 12:01:01 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-06-16 12:02:34 --> Severity: Parsing Error --> syntax error, unexpected 'echo' (T_ECHO) /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 157
ERROR - 2019-06-16 12:02:40 --> Severity: Parsing Error --> syntax error, unexpected 'echo' (T_ECHO) /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 157
