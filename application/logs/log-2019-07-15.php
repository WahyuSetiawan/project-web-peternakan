<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-07-15 08:53:45 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-07-15 08:53:46 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel /usr/share/httpd/www/system/core/Loader.php 344
ERROR - 2019-07-15 08:53:57 --> 404 Page Not Found: Asset/css
ERROR - 2019-07-15 09:22:55 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-07-15 09:25:05 --> Severity: Notice --> Undefined variable: current_date_target /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 154
ERROR - 2019-07-15 09:25:05 --> Severity: Notice --> Undefined variable: current_date_target /usr/share/httpd/www/application/cache/views/d3baa3a716411bf7a60e958f92a8792f 154
ERROR - 2019-07-15 10:33:58 --> Severity: Warning --> mysqli::real_connect(): (HY000/1045): Access denied for user 'user'@'localhost' (using password: YES) C:\xampp\htdocs\peternakan\system\database\drivers\mysqli\mysqli_driver.php 201
ERROR - 2019-07-15 10:33:58 --> Unable to connect to the database
ERROR - 2019-07-15 10:35:49 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel C:\xampp\htdocs\peternakan\system\core\Loader.php 344
ERROR - 2019-07-15 10:47:17 --> 404 Page Not Found: Asset/vendor
ERROR - 2019-07-15 10:47:17 --> 404 Page Not Found: Asset/vendor
ERROR - 2019-07-15 10:47:24 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel C:\xampp\htdocs\peternakan\system\core\Loader.php 344
ERROR - 2019-07-15 11:20:28 --> 404 Page Not Found: Asset/css
ERROR - 2019-07-15 11:34:24 --> Severity: Error --> Access to undeclared static property: DetailPembelianAyamModel::$table C:\xampp\htdocs\peternakan\application\models\DetailPenjualanAyamModel.php 36
ERROR - 2019-07-15 11:35:52 --> Severity: Parsing Error --> syntax error, unexpected '->' (T_OBJECT_OPERATOR) C:\xampp\htdocs\peternakan\application\models\DetailPenjualanAyamModel.php 36
ERROR - 2019-07-15 11:39:15 --> Query error: Column 'tanggal' in field list is ambiguous - Invalid query: SELECT `tb_detail_penjualan_ayam`.*, `tb_kandang`.`nama` as `nama_kandang`, DATE_FORMAT(tanggal, "%d-%m-%Y") as tanggal, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_admin`.`nama` as `nama_admin`, `harga`, `admin_update`.`nama` as `update_by_admin_nama`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `tb_detail_penjualan_ayam`
LEFT JOIN `tb_detail_pembelian_ayam` ON `tb_detail_pembelian_ayam`.`id_detail_penjualan_ayam` = `tb_detail_penjualan_ayam`.`id_detail_penjualan_ayam`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_detail_pembelian_ayam`.`id_kandang`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `tb_detail_penjualan_ayam`.`id_karyawan`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `tb_detail_penjualan_ayam`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `tb_detail_penjualan_ayam`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `tb_detail_penjualan_ayam`.`update_by_karyawan`
WHERE `tb_detail_penjualan_ayam`.`id_detail_pembelian_ayam` = 'MA_0021'
ERROR - 2019-07-15 11:39:56 --> Query error: Unknown column 'tb_detail_penjualan_ayam' in 'field list' - Invalid query: SELECT `tb_detail_penjualan_ayam`.*, `tb_kandang`.`nama` as `nama_kandang`, DATE_FORMAT(tb_detail_penjualan_ayam, "%d-%m-%Y") as tanggal, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_admin`.`nama` as `nama_admin`, `harga`, `admin_update`.`nama` as `update_by_admin_nama`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `tb_detail_penjualan_ayam`
LEFT JOIN `tb_detail_pembelian_ayam` ON `tb_detail_pembelian_ayam`.`id_detail_penjualan_ayam` = `tb_detail_penjualan_ayam`.`id_detail_penjualan_ayam`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_detail_pembelian_ayam`.`id_kandang`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `tb_detail_penjualan_ayam`.`id_karyawan`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `tb_detail_penjualan_ayam`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `tb_detail_penjualan_ayam`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `tb_detail_penjualan_ayam`.`update_by_karyawan`
WHERE `tb_detail_penjualan_ayam`.`id_detail_pembelian_ayam` = 'MA_0021'
ERROR - 2019-07-15 11:40:17 --> Query error: Unknown column 'tb_detail_pembelian_ayam.id_detail_penjualan_ayam' in 'on clause' - Invalid query: SELECT `tb_detail_penjualan_ayam`.*, `tb_kandang`.`nama` as `nama_kandang`, DATE_FORMAT(tb_detail_penjualan_ayam.tanggal, "%d-%m-%Y") as tanggal, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_admin`.`nama` as `nama_admin`, `harga`, `admin_update`.`nama` as `update_by_admin_nama`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `tb_detail_penjualan_ayam`
LEFT JOIN `tb_detail_pembelian_ayam` ON `tb_detail_pembelian_ayam`.`id_detail_penjualan_ayam` = `tb_detail_penjualan_ayam`.`id_detail_penjualan_ayam`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_detail_pembelian_ayam`.`id_kandang`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `tb_detail_penjualan_ayam`.`id_karyawan`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `tb_detail_penjualan_ayam`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `tb_detail_penjualan_ayam`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `tb_detail_penjualan_ayam`.`update_by_karyawan`
WHERE `tb_detail_penjualan_ayam`.`id_detail_pembelian_ayam` = 'MA_0021'
ERROR - 2019-07-15 11:50:30 --> 404 Page Not Found: Asset/css
ERROR - 2019-07-15 12:10:26 --> Severity: Error --> Undefined class constant 'table' C:\xampp\htdocs\peternakan\application\models\DetailPembelianAyamModel.php 35
ERROR - 2019-07-15 12:10:26 --> Severity: Error --> Undefined class constant 'table' C:\xampp\htdocs\peternakan\application\models\DetailPembelianAyamModel.php 35
ERROR - 2019-07-15 12:10:34 --> Severity: Error --> Undefined class constant 'table' C:\xampp\htdocs\peternakan\application\models\DetailPembelianAyamModel.php 35
ERROR - 2019-07-15 12:11:28 --> Severity: Error --> Undefined class constant 'table' C:\xampp\htdocs\peternakan\application\models\DetailPembelianAyamModel.php 35
ERROR - 2019-07-15 12:14:31 --> Severity: Notice --> Undefined property: stdClass::$jumalh_kerugian_ayam C:\xampp\htdocs\peternakan\application\cache\views\1de27e185551e28649fc9a06c79ac929 110
ERROR - 2019-07-15 12:14:31 --> Severity: Notice --> Undefined property: stdClass::$jumalh_kerugian_ayam C:\xampp\htdocs\peternakan\application\cache\views\1de27e185551e28649fc9a06c79ac929 110
ERROR - 2019-07-15 12:14:43 --> Severity: Notice --> Undefined property: stdClass::$jumlah_kerugian_ayam C:\xampp\htdocs\peternakan\application\cache\views\1de27e185551e28649fc9a06c79ac929 110
ERROR - 2019-07-15 12:14:43 --> Severity: Notice --> Undefined property: stdClass::$jumlah_kerugian_ayam C:\xampp\htdocs\peternakan\application\cache\views\1de27e185551e28649fc9a06c79ac929 110
ERROR - 2019-07-15 12:18:00 --> 404 Page Not Found: Asset/css
ERROR - 2019-07-15 12:18:09 --> 404 Page Not Found: Asset/css
ERROR - 2019-07-15 12:26:38 --> Severity: Notice --> Undefined variable: umur_ayam_sekarang C:\xampp\htdocs\peternakan\application\cache\views\1de27e185551e28649fc9a06c79ac929 108
ERROR - 2019-07-15 12:26:39 --> Severity: Notice --> Undefined variable: umur_ayam_sekarang C:\xampp\htdocs\peternakan\application\cache\views\1de27e185551e28649fc9a06c79ac929 113
ERROR - 2019-07-15 12:26:39 --> Severity: Notice --> Undefined variable: umur_ayam_sekarang C:\xampp\htdocs\peternakan\application\cache\views\1de27e185551e28649fc9a06c79ac929 108
ERROR - 2019-07-15 12:26:39 --> Severity: Notice --> Undefined variable: umur_ayam_sekarang C:\xampp\htdocs\peternakan\application\cache\views\1de27e185551e28649fc9a06c79ac929 113
ERROR - 2019-07-15 12:26:39 --> Severity: Notice --> Undefined variable: umur_ayam_sekarang C:\xampp\htdocs\peternakan\application\cache\views\1de27e185551e28649fc9a06c79ac929 108
ERROR - 2019-07-15 12:26:39 --> Severity: Notice --> Undefined variable: umur_ayam_sekarang C:\xampp\htdocs\peternakan\application\cache\views\1de27e185551e28649fc9a06c79ac929 113
ERROR - 2019-07-15 12:26:57 --> Severity: Notice --> Undefined variable: jumlah_ayam C:\xampp\htdocs\peternakan\application\cache\views\1de27e185551e28649fc9a06c79ac929 108
ERROR - 2019-07-15 12:26:57 --> Severity: Notice --> Undefined variable: jumlah_ayam C:\xampp\htdocs\peternakan\application\cache\views\1de27e185551e28649fc9a06c79ac929 113
ERROR - 2019-07-15 12:26:57 --> Severity: Notice --> Undefined variable: jumlah_ayam C:\xampp\htdocs\peternakan\application\cache\views\1de27e185551e28649fc9a06c79ac929 108
ERROR - 2019-07-15 12:26:57 --> Severity: Notice --> Undefined variable: jumlah_ayam C:\xampp\htdocs\peternakan\application\cache\views\1de27e185551e28649fc9a06c79ac929 113
ERROR - 2019-07-15 12:26:57 --> Severity: Notice --> Undefined variable: jumlah_ayam C:\xampp\htdocs\peternakan\application\cache\views\1de27e185551e28649fc9a06c79ac929 108
ERROR - 2019-07-15 12:26:57 --> Severity: Notice --> Undefined variable: jumlah_ayam C:\xampp\htdocs\peternakan\application\cache\views\1de27e185551e28649fc9a06c79ac929 113
ERROR - 2019-07-15 13:07:58 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\b7247a97b8e1a0d7a903656017eff1b0 60
ERROR - 2019-07-15 13:07:58 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\b7247a97b8e1a0d7a903656017eff1b0 60
ERROR - 2019-07-15 13:08:23 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\70a341362e0e46fe2ac50b8092aa4a95 88
ERROR - 2019-07-15 13:08:23 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\70a341362e0e46fe2ac50b8092aa4a95 88
ERROR - 2019-07-15 13:08:56 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\b7247a97b8e1a0d7a903656017eff1b0 60
ERROR - 2019-07-15 13:08:56 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\b7247a97b8e1a0d7a903656017eff1b0 60
ERROR - 2019-07-15 13:09:21 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\b7247a97b8e1a0d7a903656017eff1b0 60
ERROR - 2019-07-15 13:09:21 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\b7247a97b8e1a0d7a903656017eff1b0 60
ERROR - 2019-07-15 13:09:45 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\70a341362e0e46fe2ac50b8092aa4a95 88
ERROR - 2019-07-15 13:09:45 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\70a341362e0e46fe2ac50b8092aa4a95 88
ERROR - 2019-07-15 13:11:22 --> 404 Page Not Found: Asset/css
ERROR - 2019-07-15 13:11:36 --> 404 Page Not Found: Asset/css
ERROR - 2019-07-15 13:48:16 --> Severity: Notice --> Undefined index: tanggal C:\xampp\htdocs\peternakan\application\models\DetailPenggunaanGudangModel.php 88
ERROR - 2019-07-15 13:48:16 --> Severity: Notice --> Undefined index: tanggal C:\xampp\htdocs\peternakan\application\models\DetailPenggunaanGudangModel.php 90
ERROR - 2019-07-15 13:48:23 --> Severity: Notice --> Undefined index: tanggal C:\xampp\htdocs\peternakan\application\models\DetailPenggunaanGudangModel.php 88
ERROR - 2019-07-15 13:48:23 --> Severity: Notice --> Undefined index: tanggal C:\xampp\htdocs\peternakan\application\models\DetailPenggunaanGudangModel.php 90
ERROR - 2019-07-15 13:49:46 --> Severity: Notice --> Undefined property: stdClass::$waktu_mulai_format C:\xampp\htdocs\peternakan\application\cache\views\41716190449e986eaf24652562deddd1 210
ERROR - 2019-07-15 13:49:46 --> Severity: Notice --> Undefined property: stdClass::$waktu_selesai_format C:\xampp\htdocs\peternakan\application\cache\views\41716190449e986eaf24652562deddd1 210
ERROR - 2019-07-15 13:49:46 --> Severity: Notice --> Undefined property: stdClass::$waktu_mulai_format C:\xampp\htdocs\peternakan\application\cache\views\41716190449e986eaf24652562deddd1 210
ERROR - 2019-07-15 13:49:46 --> Severity: Notice --> Undefined property: stdClass::$waktu_selesai_format C:\xampp\htdocs\peternakan\application\cache\views\41716190449e986eaf24652562deddd1 210
ERROR - 2019-07-15 13:51:20 --> Severity: Notice --> Undefined property: stdClass::$waktu_mulai_format C:\xampp\htdocs\peternakan\application\cache\views\41716190449e986eaf24652562deddd1 210
ERROR - 2019-07-15 13:51:20 --> Severity: Notice --> Undefined property: stdClass::$waktu_selesai_format C:\xampp\htdocs\peternakan\application\cache\views\41716190449e986eaf24652562deddd1 210
ERROR - 2019-07-15 13:51:20 --> Severity: Notice --> Undefined property: stdClass::$waktu_mulai_format C:\xampp\htdocs\peternakan\application\cache\views\41716190449e986eaf24652562deddd1 210
ERROR - 2019-07-15 13:51:20 --> Severity: Notice --> Undefined property: stdClass::$waktu_selesai_format C:\xampp\htdocs\peternakan\application\cache\views\41716190449e986eaf24652562deddd1 210
ERROR - 2019-07-15 13:51:42 --> Severity: Parsing Error --> syntax error, unexpected '.' C:\xampp\htdocs\peternakan\application\models\DetailPenggunaanGudangModel.php 82
ERROR - 2019-07-15 14:04:49 --> 404 Page Not Found: Asset/css
ERROR - 2019-07-15 14:10:32 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\b7247a97b8e1a0d7a903656017eff1b0 60
ERROR - 2019-07-15 14:10:32 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\b7247a97b8e1a0d7a903656017eff1b0 60
ERROR - 2019-07-15 14:10:51 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\b7247a97b8e1a0d7a903656017eff1b0 60
ERROR - 2019-07-15 14:10:51 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\b7247a97b8e1a0d7a903656017eff1b0 60
ERROR - 2019-07-15 14:11:24 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\70a341362e0e46fe2ac50b8092aa4a95 88
ERROR - 2019-07-15 14:11:24 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\70a341362e0e46fe2ac50b8092aa4a95 88
ERROR - 2019-07-15 14:11:35 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\b7247a97b8e1a0d7a903656017eff1b0 60
ERROR - 2019-07-15 14:11:35 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\b7247a97b8e1a0d7a903656017eff1b0 60
ERROR - 2019-07-15 14:16:35 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\70a341362e0e46fe2ac50b8092aa4a95 88
ERROR - 2019-07-15 14:16:35 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\70a341362e0e46fe2ac50b8092aa4a95 88
ERROR - 2019-07-15 14:30:40 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel C:\xampp\htdocs\peternakan\system\core\Loader.php 344
ERROR - 2019-07-15 14:31:14 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel C:\xampp\htdocs\peternakan\system\core\Loader.php 344
ERROR - 2019-07-15 14:34:46 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\e09b11b1253560a460c64056d1e7da60 22
ERROR - 2019-07-15 14:34:46 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\e09b11b1253560a460c64056d1e7da60 22
ERROR - 2019-07-15 14:35:03 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\e09b11b1253560a460c64056d1e7da60 22
ERROR - 2019-07-15 14:35:03 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\e09b11b1253560a460c64056d1e7da60 22
ERROR - 2019-07-15 14:35:06 --> Severity: Notice --> Undefined property: Laporan::$pdfGenerator C:\xampp\htdocs\peternakan\application\controllers\Laporan.php 63
ERROR - 2019-07-15 14:35:06 --> Severity: Error --> Call to a member function generate() on null C:\xampp\htdocs\peternakan\application\controllers\Laporan.php 63
ERROR - 2019-07-15 14:35:09 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\e09b11b1253560a460c64056d1e7da60 22
ERROR - 2019-07-15 14:35:09 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\e09b11b1253560a460c64056d1e7da60 22
ERROR - 2019-07-15 14:35:12 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\21f0f3cf3904d0c46eda7e5e9cede438 23
ERROR - 2019-07-15 14:35:12 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\21f0f3cf3904d0c46eda7e5e9cede438 23
ERROR - 2019-07-15 14:35:22 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\21f0f3cf3904d0c46eda7e5e9cede438 23
ERROR - 2019-07-15 14:35:22 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\21f0f3cf3904d0c46eda7e5e9cede438 23
ERROR - 2019-07-15 14:35:24 --> Severity: Notice --> Undefined property: Laporan::$pdfGenerator C:\xampp\htdocs\peternakan\application\controllers\Laporan.php 112
ERROR - 2019-07-15 14:35:24 --> Severity: Error --> Call to a member function generate() on null C:\xampp\htdocs\peternakan\application\controllers\Laporan.php 112
ERROR - 2019-07-15 14:35:28 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\21f0f3cf3904d0c46eda7e5e9cede438 23
ERROR - 2019-07-15 14:35:28 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\21f0f3cf3904d0c46eda7e5e9cede438 23
ERROR - 2019-07-15 14:35:28 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\e09b11b1253560a460c64056d1e7da60 22
ERROR - 2019-07-15 14:35:28 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\e09b11b1253560a460c64056d1e7da60 22
ERROR - 2019-07-15 14:35:31 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\934f40f159a47072138caff84a8763f7 23
ERROR - 2019-07-15 14:35:31 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\934f40f159a47072138caff84a8763f7 23
ERROR - 2019-07-15 14:35:41 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\934f40f159a47072138caff84a8763f7 23
ERROR - 2019-07-15 14:35:41 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\934f40f159a47072138caff84a8763f7 23
ERROR - 2019-07-15 14:35:45 --> Severity: Notice --> Undefined variable: bulan C:\xampp\htdocs\peternakan\application\cache\views\cd0edbe5d50717d462481672b9239bfb 41
ERROR - 2019-07-15 14:35:45 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\cd0edbe5d50717d462481672b9239bfb 41
ERROR - 2019-07-15 14:35:51 --> Severity: Notice --> Undefined variable: bulan C:\xampp\htdocs\peternakan\application\cache\views\d8d6f5e2d6fbfd417f73a90bf7ce0592 41
ERROR - 2019-07-15 14:35:51 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\d8d6f5e2d6fbfd417f73a90bf7ce0592 41
ERROR - 2019-07-15 14:36:00 --> 404 Page Not Found: Peternakan/laporan
ERROR - 2019-07-15 14:36:04 --> 404 Page Not Found: Peternakan/laporan
ERROR - 2019-07-15 14:36:08 --> 404 Page Not Found: Peternakan/laporan
ERROR - 2019-07-15 14:36:12 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\e09b11b1253560a460c64056d1e7da60 22
ERROR - 2019-07-15 14:36:12 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\e09b11b1253560a460c64056d1e7da60 22
ERROR - 2019-07-15 14:36:15 --> Severity: Notice --> Undefined property: Laporan::$pdfGenerator C:\xampp\htdocs\peternakan\application\controllers\Laporan.php 63
ERROR - 2019-07-15 14:36:15 --> Severity: Error --> Call to a member function generate() on null C:\xampp\htdocs\peternakan\application\controllers\Laporan.php 63
ERROR - 2019-07-15 14:36:20 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\e09b11b1253560a460c64056d1e7da60 22
ERROR - 2019-07-15 14:36:20 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\e09b11b1253560a460c64056d1e7da60 22
ERROR - 2019-07-15 14:36:44 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\e09b11b1253560a460c64056d1e7da60 22
ERROR - 2019-07-15 14:36:44 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\e09b11b1253560a460c64056d1e7da60 22
ERROR - 2019-07-15 14:36:47 --> Severity: Notice --> Undefined property: Laporan::$pdfGenerator C:\xampp\htdocs\peternakan\application\controllers\Laporan.php 63
ERROR - 2019-07-15 14:36:47 --> Severity: Error --> Call to a member function generate() on null C:\xampp\htdocs\peternakan\application\controllers\Laporan.php 63
ERROR - 2019-07-15 14:38:44 --> Severity: Notice --> Undefined property: Laporan::$pdfGenerator C:\xampp\htdocs\peternakan\application\controllers\Laporan.php 63
ERROR - 2019-07-15 14:38:44 --> Severity: Error --> Call to a member function generate() on null C:\xampp\htdocs\peternakan\application\controllers\Laporan.php 63
ERROR - 2019-07-15 14:38:58 --> Severity: Notice --> Undefined property: Laporan::$PdfGenerator C:\xampp\htdocs\peternakan\application\controllers\Laporan.php 63
ERROR - 2019-07-15 14:38:59 --> Severity: Error --> Call to a member function generate() on null C:\xampp\htdocs\peternakan\application\controllers\Laporan.php 63
ERROR - 2019-07-15 14:40:31 --> Severity: Notice --> Undefined property: Laporan::$pdfGenerator C:\xampp\htdocs\peternakan\application\controllers\Laporan.php 63
ERROR - 2019-07-15 14:40:31 --> Severity: Error --> Call to a member function generate() on null C:\xampp\htdocs\peternakan\application\controllers\Laporan.php 63
ERROR - 2019-07-15 14:41:18 --> Severity: Notice --> Undefined property: Laporan::$pdfGenerator C:\xampp\htdocs\peternakan\application\controllers\Laporan.php 61
ERROR - 2019-07-15 14:41:18 --> Severity: Error --> Call to a member function generate() on null C:\xampp\htdocs\peternakan\application\controllers\Laporan.php 61
ERROR - 2019-07-15 14:42:03 --> Severity: Notice --> Undefined property: Laporan::$pdfGenerator C:\xampp\htdocs\peternakan\application\controllers\Laporan.php 63
ERROR - 2019-07-15 14:42:03 --> Severity: Error --> Call to a member function generate() on null C:\xampp\htdocs\peternakan\application\controllers\Laporan.php 63
ERROR - 2019-07-15 14:43:46 --> Severity: Notice --> Undefined property: Laporan::$pdfGenerator C:\xampp\htdocs\peternakan\application\controllers\Laporan.php 61
ERROR - 2019-07-15 14:43:47 --> Severity: Error --> Call to a member function generate() on null C:\xampp\htdocs\peternakan\application\controllers\Laporan.php 61
ERROR - 2019-07-15 14:44:10 --> Severity: Notice --> Undefined variable: laporan C:\xampp\htdocs\peternakan\application\controllers\Laporan.php 61
ERROR - 2019-07-15 14:44:11 --> Severity: error --> Exception: Requested HTML document contains no data. C:\xampp\htdocs\peternakan\application\vendor\dompdf\dompdf\include\frame_tree.cls.php 122
ERROR - 2019-07-15 14:44:58 --> Severity: Error --> Call to a member function get_cellmap() on null C:\xampp\htdocs\peternakan\application\vendor\dompdf\dompdf\include\table_cell_frame_reflower.cls.php 30
ERROR - 2019-07-15 14:49:23 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\e09b11b1253560a460c64056d1e7da60 22
ERROR - 2019-07-15 14:49:23 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\e09b11b1253560a460c64056d1e7da60 22
ERROR - 2019-07-15 14:49:35 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\21f0f3cf3904d0c46eda7e5e9cede438 23
ERROR - 2019-07-15 14:49:35 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\21f0f3cf3904d0c46eda7e5e9cede438 23
ERROR - 2019-07-15 14:49:37 --> Severity: Notice --> Undefined variable: supplier C:\xampp\htdocs\peternakan\application\cache\views\934f40f159a47072138caff84a8763f7 23
ERROR - 2019-07-15 14:49:37 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\934f40f159a47072138caff84a8763f7 23
ERROR - 2019-07-15 14:49:39 --> Severity: Notice --> Undefined variable: bulan C:\xampp\htdocs\peternakan\application\cache\views\cd0edbe5d50717d462481672b9239bfb 41
ERROR - 2019-07-15 14:49:39 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\cd0edbe5d50717d462481672b9239bfb 41
ERROR - 2019-07-15 14:49:42 --> Severity: Notice --> Undefined variable: bulan C:\xampp\htdocs\peternakan\application\cache\views\d8d6f5e2d6fbfd417f73a90bf7ce0592 41
ERROR - 2019-07-15 14:49:42 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\d8d6f5e2d6fbfd417f73a90bf7ce0592 41
ERROR - 2019-07-15 14:49:45 --> Severity: Notice --> Undefined variable: bulan C:\xampp\htdocs\peternakan\application\cache\views\d8d6f5e2d6fbfd417f73a90bf7ce0592 41
ERROR - 2019-07-15 14:49:46 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\d8d6f5e2d6fbfd417f73a90bf7ce0592 41
ERROR - 2019-07-15 14:49:52 --> Severity: Notice --> Undefined variable: bulan C:\xampp\htdocs\peternakan\application\cache\views\d8d6f5e2d6fbfd417f73a90bf7ce0592 41
ERROR - 2019-07-15 14:49:52 --> Severity: Warning --> Invalid argument supplied for foreach() C:\xampp\htdocs\peternakan\application\cache\views\d8d6f5e2d6fbfd417f73a90bf7ce0592 41
