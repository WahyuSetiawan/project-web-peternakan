<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-06-18 08:45:03 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-06-18 08:45:03 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel /usr/share/httpd/www/system/core/Loader.php 344
ERROR - 2019-06-18 09:24:31 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-06-18 09:24:36 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-06-18 09:24:39 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-06-18 09:31:24 --> Severity: Notice --> Undefined property: stdClass::$harga /usr/share/httpd/www/application/cache/views/cc9a544cd29d279425f54e5b523cf476 104
ERROR - 2019-06-18 09:31:40 --> Query error: Unknown column 'harga' in 'field list' - Invalid query: SELECT `tb_detail_penjualan_ayam`.*, `tb_kandang`.`nama` as `nama_kandang`, DATE_FORMAT(tanggal, "%d-%m-%Y") as tanggal, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_admin`.`nama` as `nama_admin`, `harga`, `admin_update`.`nama` as `update_by_admin_nama`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `tb_detail_penjualan_ayam`
INNER JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_detail_penjualan_ayam`.`id_kandang`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `tb_detail_penjualan_ayam`.`id_karyawan`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `tb_detail_penjualan_ayam`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `tb_detail_penjualan_ayam`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `tb_detail_penjualan_ayam`.`update_by_karyawan`
WHERE `tb_detail_penjualan_ayam`.`id_detail_pembelian_ayam` = 'MA_0019'
ERROR - 2019-06-18 09:52:30 --> Query error: Cannot delete or update a parent row: a foreign key constraint fails (`peternakan_app`.`tb_detail_penjualan_ayam`, CONSTRAINT `tb_detail_penjualan_ayam_ibfk_1` FOREIGN KEY (`id_detail_pembelian_ayam`) REFERENCES `tb_detail_pembelian_ayam` (`id_detail_pembelian_a) - Invalid query: DELETE FROM `tb_detail_pembelian_ayam`
WHERE `id_detail_pembelian_ayam` = 'MA_0019'
ERROR - 2019-06-18 10:09:37 --> Query error: Column 'tanggal' in field list is ambiguous - Invalid query: SELECT `tb_detail_pembelian_ayam`.*, `tb_kandang`.`nama` as `nama_kandang`, DATE_FORMAT(tanggal, "%d-%m-%Y") as tanggal, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_supplier`.`nama` as `nama_supplier`, `tb_admin`.`nama` as `nama_admin`, `admin_update`.`nama` as `update_by_admin_nama`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `tb_detail_pembelian_ayam`
INNER JOIN `tb_supplier` ON `tb_supplier`.`id_supplier` = `tb_detail_pembelian_ayam`.`id_supplier`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `tb_detail_pembelian_ayam`.`id_karyawan`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_detail_pembelian_ayam`.`id_kandang`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `tb_detail_pembelian_ayam`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `tb_detail_pembelian_ayam`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `tb_detail_pembelian_ayam`.`id_karyawan`
INNER JOIN `view_sisa_pembelian` ON `view_sisa_pembelian`.`id_detail_pembelian_ayam` = `tb_detail_pembelian_ayam`.`id_detail_pembelian_ayam`
ERROR - 2019-06-18 10:43:06 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-06-18 10:43:06 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel /usr/share/httpd/www/system/core/Loader.php 344
ERROR - 2019-06-18 10:43:19 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/9f3fe66d8cb8a3c6fdcfd756d24ff74f 62
ERROR - 2019-06-18 10:43:19 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/9f3fe66d8cb8a3c6fdcfd756d24ff74f 62
ERROR - 2019-06-18 10:43:23 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-06-18 10:43:23 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-06-18 10:45:27 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-06-18 10:45:27 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-06-18 10:45:37 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-06-18 10:45:37 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-06-18 10:45:54 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-06-18 10:45:54 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-06-18 10:46:04 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-06-18 10:46:04 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-06-18 10:46:06 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-06-18 10:46:06 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-06-18 10:46:07 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/9f3fe66d8cb8a3c6fdcfd756d24ff74f 62
ERROR - 2019-06-18 10:46:07 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/9f3fe66d8cb8a3c6fdcfd756d24ff74f 62
ERROR - 2019-06-18 10:46:36 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/9f3fe66d8cb8a3c6fdcfd756d24ff74f 62
ERROR - 2019-06-18 10:46:36 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/9f3fe66d8cb8a3c6fdcfd756d24ff74f 62
ERROR - 2019-06-18 10:46:37 --> Severity: Error --> Class 'Self' not found /usr/share/httpd/www/application/models/ViewTransaksiAyamModel.php 15
ERROR - 2019-06-18 10:53:57 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/controllers/Riwayat.php 33
ERROR - 2019-06-18 10:53:57 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/controllers/Riwayat.php 41
ERROR - 2019-06-18 10:57:57 --> Severity: Error --> Access to undeclared static property: ViewTransaksiPembelianAyamModel::$table /usr/share/httpd/www/application/models/ViewTransaksiPembelianAyamModel.php 18
ERROR - 2019-06-18 10:58:10 --> Severity: Error --> Call to undefined method stdClass::count() /usr/share/httpd/www/application/models/ViewTransaksiPembelianAyamModel.php 18
ERROR - 2019-06-18 11:05:54 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 17
ERROR - 2019-06-18 11:05:54 --> Severity: Notice --> Undefined variable: kandang /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 18
ERROR - 2019-06-18 11:05:54 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 18
ERROR - 2019-06-18 11:05:54 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 31
ERROR - 2019-06-18 11:05:54 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 31
ERROR - 2019-06-18 11:05:54 --> Severity: Notice --> Undefined variable: kandang /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 49
ERROR - 2019-06-18 11:05:54 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 89
ERROR - 2019-06-18 11:05:54 --> Severity: Notice --> Undefined property: stdClass::$harga_ayam /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 101
ERROR - 2019-06-18 11:05:54 --> Severity: Notice --> Undefined property: stdClass::$nama_supplier /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 104
ERROR - 2019-06-18 11:05:54 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 89
ERROR - 2019-06-18 11:05:54 --> Severity: Notice --> Undefined property: stdClass::$harga_ayam /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 101
ERROR - 2019-06-18 11:05:54 --> Severity: Notice --> Undefined property: stdClass::$nama_supplier /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 104
ERROR - 2019-06-18 11:05:54 --> Severity: Notice --> Undefined variable: kandang /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 170
ERROR - 2019-06-18 11:05:54 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 170
ERROR - 2019-06-18 11:05:54 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 183
ERROR - 2019-06-18 11:05:54 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 183
ERROR - 2019-06-18 11:07:44 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 95
ERROR - 2019-06-18 11:07:44 --> Severity: Notice --> Undefined property: stdClass::$harga_ayam /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 107
ERROR - 2019-06-18 11:07:44 --> Severity: Notice --> Undefined property: stdClass::$nama_supplier /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 110
ERROR - 2019-06-18 11:07:44 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 95
ERROR - 2019-06-18 11:07:44 --> Severity: Notice --> Undefined property: stdClass::$harga_ayam /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 107
ERROR - 2019-06-18 11:07:44 --> Severity: Notice --> Undefined property: stdClass::$nama_supplier /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 110
ERROR - 2019-06-18 11:07:44 --> Severity: Notice --> Undefined variable: kandang /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 176
ERROR - 2019-06-18 11:07:44 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 176
ERROR - 2019-06-18 11:07:44 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 189
ERROR - 2019-06-18 11:07:44 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 189
ERROR - 2019-06-18 11:09:22 --> Severity: Error --> Call to undefined method CI_DB_mysqli_driver::joint() /usr/share/httpd/www/application/models/ViewTransaksiPembelianAyamModel.php 10
ERROR - 2019-06-18 11:09:28 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 95
ERROR - 2019-06-18 11:09:28 --> Severity: Notice --> Undefined property: stdClass::$harga_ayam /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 107
ERROR - 2019-06-18 11:09:28 --> Severity: Notice --> Undefined property: stdClass::$nama_supplier /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 110
ERROR - 2019-06-18 11:09:28 --> Severity: Notice --> Undefined property: stdClass::$nama_kandang /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 95
ERROR - 2019-06-18 11:09:28 --> Severity: Notice --> Undefined property: stdClass::$harga_ayam /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 107
ERROR - 2019-06-18 11:09:28 --> Severity: Notice --> Undefined property: stdClass::$nama_supplier /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 110
ERROR - 2019-06-18 11:09:28 --> Severity: Notice --> Undefined variable: kandang /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 176
ERROR - 2019-06-18 11:09:28 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 176
ERROR - 2019-06-18 11:09:28 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 189
ERROR - 2019-06-18 11:09:28 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 189
ERROR - 2019-06-18 11:10:18 --> Severity: Notice --> Undefined property: Riwayat::$table /usr/share/httpd/www/system/core/Model.php 77
ERROR - 2019-06-18 11:10:18 --> Severity: Notice --> Undefined property: Riwayat::$table /usr/share/httpd/www/system/core/Model.php 77
ERROR - 2019-06-18 11:10:18 --> Severity: Notice --> Undefined property: Riwayat::$table /usr/share/httpd/www/system/core/Model.php 77
ERROR - 2019-06-18 11:10:18 --> Severity: Notice --> Undefined property: Riwayat::$table /usr/share/httpd/www/system/core/Model.php 77
ERROR - 2019-06-18 11:10:18 --> Severity: Notice --> Undefined property: Riwayat::$table /usr/share/httpd/www/system/core/Model.php 77
ERROR - 2019-06-18 11:10:18 --> Severity: Notice --> Undefined property: Riwayat::$table /usr/share/httpd/www/system/core/Model.php 77
ERROR - 2019-06-18 11:10:18 --> Severity: Notice --> Undefined property: Riwayat::$table /usr/share/httpd/www/system/core/Model.php 77
ERROR - 2019-06-18 11:10:18 --> Severity: Notice --> Undefined property: Riwayat::$table /usr/share/httpd/www/system/core/Model.php 77
ERROR - 2019-06-18 11:10:18 --> Severity: Notice --> Undefined property: Riwayat::$table /usr/share/httpd/www/system/core/Model.php 77
ERROR - 2019-06-18 11:10:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '*, `tb_kandang`.`nama` as `nama_kandang`, DATE_FORMAT(.tanggal, "%d-%m-%Y") as t' at line 1 - Invalid query: SELECT .*, `tb_kandang`.`nama` as `nama_kandang`, DATE_FORMAT(.tanggal, "%d-%m-%Y") as tanggal, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_supplier`.`nama` as `nama_supplier`, `tb_admin`.`nama` as `nama_admin`, `admin_update`.`nama` as `update_by_admin_nama`, `jumlah_sisa_ayam`, `jumlah_penjualan`, `umur_ayam_sekarang`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `view_sisa_pembelian`
INNER JOIN `tb_supplier` ON `tb_supplier`.`id_supplier` = .`id_supplier`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = .`id_karyawan`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = .`id_kandang`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = .`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = .`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = .`id_karyawan`
INNER JOIN `view_sisa_pembelian` ON `view_sisa_pembelian`.`id_detail_pembelian_ayam` = .`id_detail_pembelian_ayam`
ERROR - 2019-06-18 11:10:18 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /usr/share/httpd/www/system/core/Exceptions.php:271) /usr/share/httpd/www/system/core/Common.php 570
ERROR - 2019-06-18 11:14:56 --> Query error: Not unique table/alias: 'view_sisa_pembelian' - Invalid query: SELECT `view_sisa_pembelian`.*, `tb_kandang`.`nama` as `nama_kandang`, DATE_FORMAT(view_sisa_pembelian.tanggal, "%d-%m-%Y") as tanggal, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_supplier`.`nama` as `nama_supplier`, `tb_admin`.`nama` as `nama_admin`, `admin_update`.`nama` as `update_by_admin_nama`, `jumlah_sisa_ayam`, `jumlah_penjualan`, `umur_ayam_sekarang`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `view_sisa_pembelian`
INNER JOIN `tb_supplier` ON `tb_supplier`.`id_supplier` = `view_sisa_pembelian`.`id_supplier`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `view_sisa_pembelian`.`id_karyawan`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `view_sisa_pembelian`.`id_kandang`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `view_sisa_pembelian`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `view_sisa_pembelian`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `view_sisa_pembelian`.`id_karyawan`
INNER JOIN `view_sisa_pembelian` ON `view_sisa_pembelian`.`id_detail_pembelian_ayam` = `view_sisa_pembelian`.`id_detail_pembelian_ayam`
ERROR - 2019-06-18 11:15:14 --> Severity: Notice --> Undefined property: stdClass::$harga_ayam /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 107
ERROR - 2019-06-18 11:15:14 --> Severity: Notice --> Undefined property: stdClass::$harga_ayam /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 107
ERROR - 2019-06-18 11:15:14 --> Severity: Notice --> Undefined variable: kandang /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 176
ERROR - 2019-06-18 11:15:14 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 176
ERROR - 2019-06-18 11:15:14 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 189
ERROR - 2019-06-18 11:15:14 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 189
ERROR - 2019-06-18 11:15:38 --> Query error: Unknown column 'harga_ayam' in 'field list' - Invalid query: SELECT `view_sisa_pembelian`.*, `tb_kandang`.`nama` as `nama_kandang`, DATE_FORMAT(view_sisa_pembelian.tanggal, "%d-%m-%Y") as tanggal, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_supplier`.`nama` as `nama_supplier`, `tb_admin`.`nama` as `nama_admin`, `admin_update`.`nama` as `update_by_admin_nama`, `harga_ayam`, `jumlah_sisa_ayam`, `jumlah_penjualan`, `umur_ayam_sekarang`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `view_sisa_pembelian`
INNER JOIN `tb_supplier` ON `tb_supplier`.`id_supplier` = `view_sisa_pembelian`.`id_supplier`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `view_sisa_pembelian`.`id_karyawan`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `view_sisa_pembelian`.`id_kandang`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `view_sisa_pembelian`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `view_sisa_pembelian`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `view_sisa_pembelian`.`id_karyawan`
ERROR - 2019-06-18 11:16:20 --> Severity: Error --> Access to undeclared static property: DetailPembelianAyamModel::$table /usr/share/httpd/www/application/models/ViewTransaksiPembelianAyamModel.php 28
ERROR - 2019-06-18 11:16:47 --> Severity: Parsing Error --> syntax error, unexpected '->' (T_OBJECT_OPERATOR) /usr/share/httpd/www/application/models/ViewTransaksiPembelianAyamModel.php 28
ERROR - 2019-06-18 11:17:14 --> Severity: Notice --> Undefined property: Riwayat::$table /usr/share/httpd/www/system/core/Model.php 77
ERROR - 2019-06-18 11:17:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT `view_sisa_pembelian`.*, `tb_kandang`.`nama` as `nama_kandang`, DATE_FORMAT(view_sisa_pembelian.tanggal, "%d-%m-%Y") as tanggal, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_supplier`.`nama` as `nama_supplier`, `tb_admin`.`nama` as `nama_admin`, `admin_update`.`nama` as `update_by_admin_nama`, `harga_ayam`, `jumlah_sisa_ayam`, `jumlah_penjualan`, `umur_ayam_sekarang`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `view_sisa_pembelian`
INNER JOIN `tb_supplier` ON `tb_supplier`.`id_supplier` = `view_sisa_pembelian`.`id_supplier`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `view_sisa_pembelian`.`id_karyawan`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `view_sisa_pembelian`.`id_kandang`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `view_sisa_pembelian`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `view_sisa_pembelian`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `view_sisa_pembelian`.`id_karyawan`
INNER JOIN `tb_detail_pembelian_ayam` ON `tb_detail_pembelian_ayam`.`id_detail_pembelian_ayam` = .`id_detail_pembelian_ayam`
ERROR - 2019-06-18 11:17:29 --> Query error: Unknown column 'harga_ayam' in 'field list' - Invalid query: SELECT `view_sisa_pembelian`.*, `tb_kandang`.`nama` as `nama_kandang`, DATE_FORMAT(view_sisa_pembelian.tanggal, "%d-%m-%Y") as tanggal, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_supplier`.`nama` as `nama_supplier`, `tb_admin`.`nama` as `nama_admin`, `admin_update`.`nama` as `update_by_admin_nama`, `harga_ayam`, `jumlah_sisa_ayam`, `jumlah_penjualan`, `umur_ayam_sekarang`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `view_sisa_pembelian`
INNER JOIN `tb_supplier` ON `tb_supplier`.`id_supplier` = `view_sisa_pembelian`.`id_supplier`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `view_sisa_pembelian`.`id_karyawan`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `view_sisa_pembelian`.`id_kandang`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `view_sisa_pembelian`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `view_sisa_pembelian`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `view_sisa_pembelian`.`id_karyawan`
ERROR - 2019-06-18 11:17:54 --> Query error: Unknown column 'harga_ayam' in 'field list' - Invalid query: SELECT `view_sisa_pembelian`.*, `tb_kandang`.`nama` as `nama_kandang`, DATE_FORMAT(view_sisa_pembelian.tanggal, "%d-%m-%Y") as tanggal, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_supplier`.`nama` as `nama_supplier`, `tb_admin`.`nama` as `nama_admin`, `admin_update`.`nama` as `update_by_admin_nama`, `harga_ayam`, `jumlah_sisa_ayam`, `jumlah_penjualan`, `umur_ayam_sekarang`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `view_sisa_pembelian`
INNER JOIN `tb_supplier` ON `tb_supplier`.`id_supplier` = `view_sisa_pembelian`.`id_supplier`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `view_sisa_pembelian`.`id_karyawan`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `view_sisa_pembelian`.`id_kandang`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `view_sisa_pembelian`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `view_sisa_pembelian`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `view_sisa_pembelian`.`id_karyawan`
ERROR - 2019-06-18 11:17:55 --> Query error: Unknown column 'harga_ayam' in 'field list' - Invalid query: SELECT `view_sisa_pembelian`.*, `tb_kandang`.`nama` as `nama_kandang`, DATE_FORMAT(view_sisa_pembelian.tanggal, "%d-%m-%Y") as tanggal, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_supplier`.`nama` as `nama_supplier`, `tb_admin`.`nama` as `nama_admin`, `admin_update`.`nama` as `update_by_admin_nama`, `harga_ayam`, `jumlah_sisa_ayam`, `jumlah_penjualan`, `umur_ayam_sekarang`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `view_sisa_pembelian`
INNER JOIN `tb_supplier` ON `tb_supplier`.`id_supplier` = `view_sisa_pembelian`.`id_supplier`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `view_sisa_pembelian`.`id_karyawan`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `view_sisa_pembelian`.`id_kandang`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `view_sisa_pembelian`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `view_sisa_pembelian`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `view_sisa_pembelian`.`id_karyawan`
ERROR - 2019-06-18 11:17:56 --> Query error: Unknown column 'harga_ayam' in 'field list' - Invalid query: SELECT `view_sisa_pembelian`.*, `tb_kandang`.`nama` as `nama_kandang`, DATE_FORMAT(view_sisa_pembelian.tanggal, "%d-%m-%Y") as tanggal, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_supplier`.`nama` as `nama_supplier`, `tb_admin`.`nama` as `nama_admin`, `admin_update`.`nama` as `update_by_admin_nama`, `harga_ayam`, `jumlah_sisa_ayam`, `jumlah_penjualan`, `umur_ayam_sekarang`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `view_sisa_pembelian`
INNER JOIN `tb_supplier` ON `tb_supplier`.`id_supplier` = `view_sisa_pembelian`.`id_supplier`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `view_sisa_pembelian`.`id_karyawan`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `view_sisa_pembelian`.`id_kandang`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `view_sisa_pembelian`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `view_sisa_pembelian`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `view_sisa_pembelian`.`id_karyawan`
ERROR - 2019-06-18 11:17:56 --> Query error: Unknown column 'harga_ayam' in 'field list' - Invalid query: SELECT `view_sisa_pembelian`.*, `tb_kandang`.`nama` as `nama_kandang`, DATE_FORMAT(view_sisa_pembelian.tanggal, "%d-%m-%Y") as tanggal, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_supplier`.`nama` as `nama_supplier`, `tb_admin`.`nama` as `nama_admin`, `admin_update`.`nama` as `update_by_admin_nama`, `harga_ayam`, `jumlah_sisa_ayam`, `jumlah_penjualan`, `umur_ayam_sekarang`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `view_sisa_pembelian`
INNER JOIN `tb_supplier` ON `tb_supplier`.`id_supplier` = `view_sisa_pembelian`.`id_supplier`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `view_sisa_pembelian`.`id_karyawan`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `view_sisa_pembelian`.`id_kandang`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `view_sisa_pembelian`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `view_sisa_pembelian`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `view_sisa_pembelian`.`id_karyawan`
ERROR - 2019-06-18 11:17:59 --> Severity: Notice --> Undefined property: Riwayat::$table /usr/share/httpd/www/system/core/Model.php 77
ERROR - 2019-06-18 11:17:59 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '' at line 9 - Invalid query: SELECT `view_sisa_pembelian`.*, `tb_kandang`.`nama` as `nama_kandang`, DATE_FORMAT(view_sisa_pembelian.tanggal, "%d-%m-%Y") as tanggal, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_supplier`.`nama` as `nama_supplier`, `tb_admin`.`nama` as `nama_admin`, `admin_update`.`nama` as `update_by_admin_nama`, `harga_ayam`, `jumlah_sisa_ayam`, `jumlah_penjualan`, `umur_ayam_sekarang`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `view_sisa_pembelian`
INNER JOIN `tb_supplier` ON `tb_supplier`.`id_supplier` = `view_sisa_pembelian`.`id_supplier`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `view_sisa_pembelian`.`id_karyawan`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `view_sisa_pembelian`.`id_kandang`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `view_sisa_pembelian`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `view_sisa_pembelian`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `view_sisa_pembelian`.`id_karyawan`
INNER JOIN `tb_detail_pembelian_ayam` ON `tb_detail_pembelian_ayam`.`id_detail_pembelian_ayam` = .`id_detail_pembelian_ayam`
ERROR - 2019-06-18 11:18:10 --> Severity: Error --> Undefined class constant 'table' /usr/share/httpd/www/application/models/ViewTransaksiPembelianAyamModel.php 28
ERROR - 2019-06-18 11:18:13 --> Severity: Notice --> Undefined variable: kandang /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 176
ERROR - 2019-06-18 11:18:13 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 176
ERROR - 2019-06-18 11:18:13 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 189
ERROR - 2019-06-18 11:18:13 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 189
ERROR - 2019-06-18 11:18:49 --> Severity: Notice --> Undefined variable: kandang /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 176
ERROR - 2019-06-18 11:18:49 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 176
ERROR - 2019-06-18 11:18:49 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 189
ERROR - 2019-06-18 11:18:49 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 189
ERROR - 2019-06-18 11:19:44 --> 404 Page Not Found: Riwayan/ayam
ERROR - 2019-06-18 11:19:50 --> 404 Page Not Found: Riwayan/ayam
ERROR - 2019-06-18 11:19:58 --> Severity: Notice --> Undefined variable: kandang /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 176
ERROR - 2019-06-18 11:19:58 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 176
ERROR - 2019-06-18 11:19:58 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 189
ERROR - 2019-06-18 11:19:58 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 189
ERROR - 2019-06-18 11:20:24 --> Severity: Notice --> Undefined variable: kandang /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 176
ERROR - 2019-06-18 11:20:24 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 176
ERROR - 2019-06-18 11:20:24 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 189
ERROR - 2019-06-18 11:20:24 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 189
ERROR - 2019-06-18 11:20:41 --> Severity: Notice --> Undefined variable: kandang /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 169
ERROR - 2019-06-18 11:20:41 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 169
ERROR - 2019-06-18 11:20:41 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 182
ERROR - 2019-06-18 11:20:41 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 182
ERROR - 2019-06-18 12:36:20 --> Severity: Notice --> Undefined variable: kandang /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 169
ERROR - 2019-06-18 12:36:20 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 169
ERROR - 2019-06-18 12:36:20 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 182
ERROR - 2019-06-18 12:36:20 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 182
ERROR - 2019-06-18 12:36:21 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-06-18 14:53:11 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-06-18 14:53:11 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel /usr/share/httpd/www/system/core/Loader.php 344
ERROR - 2019-06-18 16:10:59 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-06-18 16:17:10 --> Severity: Notice --> Undefined variable: kandang /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 165
ERROR - 2019-06-18 16:17:10 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 165
ERROR - 2019-06-18 16:17:10 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 178
ERROR - 2019-06-18 16:17:10 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 178
ERROR - 2019-06-18 16:39:26 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-06-18 16:39:40 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-06-18 16:39:43 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-06-18 16:40:07 --> Severity: Notice --> Undefined variable: kandang /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 165
ERROR - 2019-06-18 16:40:07 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 165
ERROR - 2019-06-18 16:40:07 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 178
ERROR - 2019-06-18 16:40:07 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/75ee642ec3dd76cf8caeb17c6b8c499a 178
ERROR - 2019-06-18 16:45:35 --> Severity: Notice --> Undefined variable: id_gudang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 19
ERROR - 2019-06-18 16:45:35 --> Severity: Notice --> Undefined variable: gudang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 20
ERROR - 2019-06-18 16:45:35 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 20
ERROR - 2019-06-18 16:45:35 --> Severity: Notice --> Undefined property: stdClass::$id_detail_penggunaan_gudang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 77
ERROR - 2019-06-18 16:45:35 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 80
ERROR - 2019-06-18 16:45:35 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 86
ERROR - 2019-06-18 16:45:35 --> Severity: Notice --> Undefined property: stdClass::$keterangan /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 89
ERROR - 2019-06-18 16:48:12 --> Severity: Notice --> Undefined variable: id_gudang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 19
ERROR - 2019-06-18 16:48:12 --> Severity: Notice --> Undefined variable: gudang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 20
ERROR - 2019-06-18 16:48:12 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 20
ERROR - 2019-06-18 16:48:12 --> Severity: Notice --> Undefined property: stdClass::$id_detail_penggunaan_gudang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 77
ERROR - 2019-06-18 16:48:12 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 80
ERROR - 2019-06-18 16:48:12 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 86
ERROR - 2019-06-18 16:48:12 --> Severity: Notice --> Undefined property: stdClass::$id_detail_penggunaan_gudang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 77
ERROR - 2019-06-18 16:48:12 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 80
ERROR - 2019-06-18 16:48:12 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 86
ERROR - 2019-06-18 16:48:12 --> Severity: Notice --> Undefined property: stdClass::$id_detail_penggunaan_gudang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 77
ERROR - 2019-06-18 16:48:12 --> Severity: Notice --> Undefined property: stdClass::$nama_gudang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 80
ERROR - 2019-06-18 16:48:12 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 86
ERROR - 2019-06-18 16:49:08 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 18
ERROR - 2019-06-18 16:49:08 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 20
ERROR - 2019-06-18 16:49:08 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 20
ERROR - 2019-06-18 16:49:08 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 20
ERROR - 2019-06-18 16:49:08 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 20
ERROR - 2019-06-18 16:49:08 --> Severity: Notice --> Undefined variable: pembelian /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 31
ERROR - 2019-06-18 16:49:08 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 31
ERROR - 2019-06-18 16:49:26 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 18
ERROR - 2019-06-18 16:49:26 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 20
ERROR - 2019-06-18 16:49:27 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 20
ERROR - 2019-06-18 16:49:27 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 20
ERROR - 2019-06-18 16:49:27 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 20
ERROR - 2019-06-18 16:49:27 --> Severity: Notice --> Undefined variable: pembelian /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 31
ERROR - 2019-06-18 16:49:27 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 31
ERROR - 2019-06-18 16:49:35 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 18
ERROR - 2019-06-18 16:49:35 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 20
ERROR - 2019-06-18 16:49:35 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 20
ERROR - 2019-06-18 16:49:35 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 20
ERROR - 2019-06-18 16:49:35 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 20
ERROR - 2019-06-18 16:49:43 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 18
ERROR - 2019-06-18 16:49:43 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 20
ERROR - 2019-06-18 16:49:43 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 20
ERROR - 2019-06-18 16:49:43 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 20
ERROR - 2019-06-18 16:49:43 --> Severity: Notice --> Undefined variable: id_kandang /usr/share/httpd/www/application/cache/views/e3f9a3403858430808f21e585d6cab77 20
ERROR - 2019-06-18 16:51:55 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-06-18 16:51:55 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-06-18 17:32:52 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-06-18 17:32:55 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-06-18 17:37:47 --> Query error: Unknown column 'tb_jadwal_kandang.tanggal' in 'where clause' - Invalid query: SELECT `tb_jadwal_kandang`.`id_jadwal_kandang`, `tb_jadwal_kandang`.`hari`, date_format(tb_jadwal_kandang.waktu_mulai, '%H:%m') as waktu_mulai, date_format(tb_jadwal_kandang.waktu_selesai, '%H:%m') as waktu_selesai, `tb_jadwal_kandang`.`catatan`, `tb_jadwal_kandang`.`id_kandang`, `tb_jadwal_kandang`.`id_gudang`, `tb_kandang`.`nama` as `nama_kandang`, `tb_gudang`.`nama` as `nama_gudang`
FROM `tb_jadwal_kandang`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_jadwal_kandang`.`id_kandang`
LEFT JOIN `tb_gudang` ON `tb_gudang`.`id_gudang` = `tb_jadwal_kandang`.`id_gudang`
WHERE 
            id_jadwal_kandang not in (select id_jadwal_gudang from view_jadwal_penggunaan_gudang where date(tanggal) = date('2019-06-18'))
AND date(tb_jadwal_kandang.tanggal = date('2019-06-18'))
 LIMIT 5
ERROR - 2019-06-18 17:38:54 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '\'%w\')
 LIMIT 5' at line 7 - Invalid query: SELECT `tb_jadwal_kandang`.`id_jadwal_kandang`, `tb_jadwal_kandang`.`hari`, date_format(tb_jadwal_kandang.waktu_mulai, '%H:%m') as waktu_mulai, date_format(tb_jadwal_kandang.waktu_selesai, '%H:%m') as waktu_selesai, `tb_jadwal_kandang`.`catatan`, `tb_jadwal_kandang`.`id_kandang`, `tb_jadwal_kandang`.`id_gudang`, `tb_kandang`.`nama` as `nama_kandang`, `tb_gudang`.`nama` as `nama_gudang`
FROM `tb_jadwal_kandang`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_jadwal_kandang`.`id_kandang`
LEFT JOIN `tb_gudang` ON `tb_gudang`.`id_gudang` = `tb_jadwal_kandang`.`id_gudang`
WHERE 
            id_jadwal_kandang not in (select id_jadwal_gudang from view_jadwal_penggunaan_gudang where date(tanggal) = date('2019-06-18'))
AND `tb_jadwal_kandang`.`hari` = date_format('2019-06-18',\'%w\')
 LIMIT 5
