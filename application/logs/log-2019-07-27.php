<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-07-27 00:51:30 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-07-27 00:51:30 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel /usr/share/httpd/www/system/core/Loader.php 344
ERROR - 2019-07-27 00:51:41 --> Severity: Notice --> Undefined property: stdClass::$jumlah_transksi_keluar /usr/share/httpd/www/application/cache/views/2ffcdabd32f6a1d39d8efbed2f9fc43d 185
ERROR - 2019-07-27 00:51:41 --> Severity: Notice --> Undefined property: stdClass::$jumlah_transksi_keluar /usr/share/httpd/www/application/cache/views/2ffcdabd32f6a1d39d8efbed2f9fc43d 185
ERROR - 2019-07-27 00:51:41 --> Severity: Notice --> Undefined property: stdClass::$jumlah_transksi_keluar /usr/share/httpd/www/application/cache/views/2ffcdabd32f6a1d39d8efbed2f9fc43d 185
ERROR - 2019-07-27 00:51:41 --> Severity: Notice --> Undefined property: stdClass::$jumlah_transksi_keluar /usr/share/httpd/www/application/cache/views/2ffcdabd32f6a1d39d8efbed2f9fc43d 185
ERROR - 2019-07-27 00:53:06 --> Severity: Error --> Call to undefined method MY_Form_validation::ser_rules() /usr/share/httpd/www/application/controllers/Kandang.php 478
ERROR - 2019-07-27 00:53:45 --> Query error: Unknown column 'tb_detail_penjualan_ayam.id_detail_pembelian_ayam' in 'on clause' - Invalid query: SELECT `tb_detail_penjualan_ayam`.*, `tb_kandang`.`nama` as `nama_kandang`, DATE_FORMAT(tb_detail_penjualan_ayam.tanggal, "%d-%m-%Y") as tanggal, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_admin`.`nama` as `nama_admin`, `harga`, `admin_update`.`nama` as `update_by_admin_nama`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `tb_detail_penjualan_ayam`
LEFT JOIN `tb_detail_pembelian_ayam` ON `tb_detail_pembelian_ayam`.`id_detail_pembelian_ayam` = `tb_detail_penjualan_ayam`.`id_detail_pembelian_ayam`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_detail_penjualan_ayam`.`id_kandang`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `tb_detail_penjualan_ayam`.`id_karyawan`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `tb_detail_penjualan_ayam`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `tb_detail_penjualan_ayam`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `tb_detail_penjualan_ayam`.`update_by_karyawan`
ERROR - 2019-07-27 00:54:11 --> Severity: Notice --> Undefined property: stdClass::$jumlah_transksi_keluar /usr/share/httpd/www/application/cache/views/2ffcdabd32f6a1d39d8efbed2f9fc43d 185
ERROR - 2019-07-27 00:54:11 --> Severity: Notice --> Undefined property: stdClass::$jumlah_transksi_keluar /usr/share/httpd/www/application/cache/views/2ffcdabd32f6a1d39d8efbed2f9fc43d 185
ERROR - 2019-07-27 00:54:11 --> Severity: Notice --> Undefined property: stdClass::$jumlah_transksi_keluar /usr/share/httpd/www/application/cache/views/2ffcdabd32f6a1d39d8efbed2f9fc43d 185
ERROR - 2019-07-27 00:54:11 --> Severity: Notice --> Undefined property: stdClass::$jumlah_transksi_keluar /usr/share/httpd/www/application/cache/views/2ffcdabd32f6a1d39d8efbed2f9fc43d 185
ERROR - 2019-07-27 01:00:22 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/0f81358c94ebd873799c38f999281c3c 18
ERROR - 2019-07-27 01:00:22 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/0f81358c94ebd873799c38f999281c3c 18
ERROR - 2019-07-27 01:00:32 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/c6c37f1304ab8041932e3ccc7c731a0e 22
ERROR - 2019-07-27 01:00:32 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/c6c37f1304ab8041932e3ccc7c731a0e 22
ERROR - 2019-07-27 01:03:35 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel /usr/share/httpd/www/system/core/Loader.php 344
ERROR - 2019-07-27 01:04:02 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/90e8b27e075f77a8902da5e3b135e9de 18
ERROR - 2019-07-27 01:04:02 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/90e8b27e075f77a8902da5e3b135e9de 18
ERROR - 2019-07-27 01:04:38 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/90e8b27e075f77a8902da5e3b135e9de 18
ERROR - 2019-07-27 01:04:38 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/90e8b27e075f77a8902da5e3b135e9de 18
ERROR - 2019-07-27 01:04:42 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 54
ERROR - 2019-07-27 01:04:42 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 54
ERROR - 2019-07-27 01:04:42 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-27 01:04:42 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-27 01:04:42 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-27 01:04:42 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-27 01:04:42 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-27 01:04:42 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-27 01:04:42 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-27 01:04:42 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-27 01:05:26 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel /usr/share/httpd/www/system/core/Loader.php 344
ERROR - 2019-07-27 01:27:04 --> Query error: Unknown column 'tb_detail_penjualan_ayam.id_detail_pemnjualan_ayam' in 'order clause' - Invalid query: SELECT `tb_detail_penjualan_ayam`.*, `tb_kandang`.`nama` as `nama_kandang`, DATE_FORMAT(tb_detail_penjualan_ayam.tanggal, "%d-%m-%Y") as tanggal, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_admin`.`nama` as `nama_admin`, `harga`, `admin_update`.`nama` as `update_by_admin_nama`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `tb_detail_penjualan_ayam`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_detail_penjualan_ayam`.`id_kandang`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `tb_detail_penjualan_ayam`.`id_karyawan`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `tb_detail_penjualan_ayam`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `tb_detail_penjualan_ayam`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `tb_detail_penjualan_ayam`.`update_by_karyawan`
ORDER BY `tb_detail_penjualan_ayam`.`id_detail_pemnjualan_ayam` DESC
ERROR - 2019-07-27 01:36:21 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/cc9a544cd29d279425f54e5b523cf476 142
ERROR - 2019-07-27 01:36:21 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/cc9a544cd29d279425f54e5b523cf476 143
ERROR - 2019-07-27 01:36:21 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/cc9a544cd29d279425f54e5b523cf476 142
ERROR - 2019-07-27 01:36:21 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/cc9a544cd29d279425f54e5b523cf476 143
ERROR - 2019-07-27 01:36:21 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/cc9a544cd29d279425f54e5b523cf476 142
ERROR - 2019-07-27 01:36:21 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/cc9a544cd29d279425f54e5b523cf476 143
ERROR - 2019-07-27 01:36:21 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/cc9a544cd29d279425f54e5b523cf476 142
ERROR - 2019-07-27 01:36:21 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/cc9a544cd29d279425f54e5b523cf476 143
ERROR - 2019-07-27 01:36:21 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/cc9a544cd29d279425f54e5b523cf476 142
ERROR - 2019-07-27 01:36:21 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/cc9a544cd29d279425f54e5b523cf476 143
ERROR - 2019-07-27 01:36:24 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/c31fc436c4dac987ca996cbfd9957e77 79
ERROR - 2019-07-27 01:36:24 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/c31fc436c4dac987ca996cbfd9957e77 80
ERROR - 2019-07-27 01:36:24 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/c31fc436c4dac987ca996cbfd9957e77 79
ERROR - 2019-07-27 01:36:24 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/c31fc436c4dac987ca996cbfd9957e77 80
ERROR - 2019-07-27 01:37:38 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/cc9a544cd29d279425f54e5b523cf476 142
ERROR - 2019-07-27 01:37:38 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/cc9a544cd29d279425f54e5b523cf476 143
ERROR - 2019-07-27 01:37:38 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/cc9a544cd29d279425f54e5b523cf476 142
ERROR - 2019-07-27 01:37:38 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/cc9a544cd29d279425f54e5b523cf476 143
ERROR - 2019-07-27 01:37:38 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/cc9a544cd29d279425f54e5b523cf476 142
ERROR - 2019-07-27 01:37:38 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/cc9a544cd29d279425f54e5b523cf476 143
ERROR - 2019-07-27 01:37:38 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/cc9a544cd29d279425f54e5b523cf476 142
ERROR - 2019-07-27 01:37:38 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/cc9a544cd29d279425f54e5b523cf476 143
ERROR - 2019-07-27 01:37:38 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/cc9a544cd29d279425f54e5b523cf476 142
ERROR - 2019-07-27 01:37:38 --> Severity: Notice --> Undefined property: stdClass::$umur_ayam_sekarang /usr/share/httpd/www/application/cache/views/cc9a544cd29d279425f54e5b523cf476 143
