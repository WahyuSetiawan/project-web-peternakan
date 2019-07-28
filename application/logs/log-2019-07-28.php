<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-07-28 20:22:27 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-07-28 20:22:27 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel /usr/share/httpd/www/system/core/Loader.php 344
ERROR - 2019-07-28 20:22:35 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel /usr/share/httpd/www/system/core/Loader.php 344
ERROR - 2019-07-28 20:25:25 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel /usr/share/httpd/www/system/core/Loader.php 344
ERROR - 2019-07-28 22:20:30 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-07-28 22:34:59 --> Severity: Notice --> Undefined property: stdClass::$harga_ayam /usr/share/httpd/www/application/cache/views/0c9c1ada1d738df40b439e65738fd5bd 91
ERROR - 2019-07-28 22:34:59 --> Severity: Notice --> Undefined property: stdClass::$harga_ayam /usr/share/httpd/www/application/cache/views/0c9c1ada1d738df40b439e65738fd5bd 91
ERROR - 2019-07-28 22:34:59 --> Severity: Notice --> Undefined property: stdClass::$harga_ayam /usr/share/httpd/www/application/cache/views/0c9c1ada1d738df40b439e65738fd5bd 91
ERROR - 2019-07-28 22:34:59 --> Severity: Notice --> Undefined property: stdClass::$harga_ayam /usr/share/httpd/www/application/cache/views/0c9c1ada1d738df40b439e65738fd5bd 91
ERROR - 2019-07-28 22:34:59 --> Severity: Notice --> Undefined property: stdClass::$harga_ayam /usr/share/httpd/www/application/cache/views/0c9c1ada1d738df40b439e65738fd5bd 91
ERROR - 2019-07-28 22:40:02 --> Query error: Unknown column 'tb_detail_pembelian_gudang.id_detail_pembelian_ayam' in 'order clause' - Invalid query: SELECT `tb_detail_pembelian_gudang`.*, `tb_supplier`.`nama` as `nama_supplier`, `tb_gudang`.`nama` as `nama_gudang`, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_gudang`.`satuan`, `tb_detail_pembelian_gudang`.`harga`, `tb_admin`.`nama` as `nama_admin`, DATE_FORMAT(tanggal, "%d-%m-%Y") as tanggal, `admin_update`.`nama` as `update_by_admin_nama`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `tb_detail_pembelian_gudang`
INNER JOIN `tb_supplier` ON `tb_supplier`.`id_supplier` = `tb_detail_pembelian_gudang`.`id_supplier`
INNER JOIN `tb_gudang` ON `tb_gudang`.`id_gudang` = `tb_detail_pembelian_gudang`.`id_gudang`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `tb_detail_pembelian_gudang`.`id_karyawan`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `tb_detail_pembelian_gudang`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `tb_detail_pembelian_gudang`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `tb_detail_pembelian_gudang`.`update_by_karyawan`
ORDER BY `tb_detail_pembelian_gudang`.`id_detail_pembelian_ayam` DESC
ERROR - 2019-07-28 22:40:33 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-07-28 22:40:33 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-07-28 22:52:55 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel /usr/share/httpd/www/system/core/Loader.php 344
ERROR - 2019-07-28 23:59:13 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel /usr/share/httpd/www/system/core/Loader.php 344
ERROR - 2019-07-28 23:59:17 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel /usr/share/httpd/www/system/core/Loader.php 344
ERROR - 2019-07-28 23:59:32 --> Severity: Notice --> Undefined variable: bulan /usr/share/httpd/www/application/cache/views/1eef8e278e4874d1e2f3f3d77731da2b 41
ERROR - 2019-07-28 23:59:32 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/1eef8e278e4874d1e2f3f3d77731da2b 41
