<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2019-07-29 00:00:00 --> Severity: Notice --> Undefined variable: bulan /usr/share/httpd/www/application/cache/views/1eef8e278e4874d1e2f3f3d77731da2b 41
ERROR - 2019-07-29 00:00:00 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/1eef8e278e4874d1e2f3f3d77731da2b 41
ERROR - 2019-07-29 00:00:04 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/b4fe1b4379ddaca4eed9e73587db4192 23
ERROR - 2019-07-29 00:00:04 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/b4fe1b4379ddaca4eed9e73587db4192 23
ERROR - 2019-07-29 00:00:10 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/b4fe1b4379ddaca4eed9e73587db4192 23
ERROR - 2019-07-29 00:00:10 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/b4fe1b4379ddaca4eed9e73587db4192 23
ERROR - 2019-07-29 00:00:14 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/90e8b27e075f77a8902da5e3b135e9de 18
ERROR - 2019-07-29 00:00:14 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/90e8b27e075f77a8902da5e3b135e9de 18
ERROR - 2019-07-29 00:03:59 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/90e8b27e075f77a8902da5e3b135e9de 18
ERROR - 2019-07-29 00:03:59 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/90e8b27e075f77a8902da5e3b135e9de 18
ERROR - 2019-07-29 00:14:48 --> Query error: Unknown column 'satuan' in 'field list' - Invalid query: SELECT `tb_detail_penjualan_ayam`.*, `tb_kandang`.`nama` as `nama_kandang`, DATE_FORMAT(tb_detail_penjualan_ayam.tanggal, "%d-%m-%Y") as tanggal, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_admin`.`nama` as `nama_admin`, `harga`, `satuan`, `admin_update`.`nama` as `update_by_admin_nama`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `tb_detail_penjualan_ayam`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_detail_penjualan_ayam`.`id_kandang`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `tb_detail_penjualan_ayam`.`id_karyawan`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `tb_detail_penjualan_ayam`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `tb_detail_penjualan_ayam`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `tb_detail_penjualan_ayam`.`update_by_karyawan`
ORDER BY `tb_detail_penjualan_ayam`.`id_detail_penjualan_ayam` DESC
ERROR - 2019-07-29 00:15:42 --> Query error: Unknown column 'satuan' in 'field list' - Invalid query: SELECT `tb_detail_penjualan_ayam`.*, `tb_kandang`.`nama` as `nama_kandang`, DATE_FORMAT(tb_detail_penjualan_ayam.tanggal, "%d-%m-%Y") as tanggal, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_admin`.`nama` as `nama_admin`, `harga`, `satuan`, `admin_update`.`nama` as `update_by_admin_nama`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `tb_detail_penjualan_ayam`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_detail_penjualan_ayam`.`id_kandang`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `tb_detail_penjualan_ayam`.`id_karyawan`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `tb_detail_penjualan_ayam`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `tb_detail_penjualan_ayam`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `tb_detail_penjualan_ayam`.`update_by_karyawan`
ORDER BY `tb_detail_penjualan_ayam`.`id_detail_penjualan_ayam` DESC
ERROR - 2019-07-29 00:15:49 --> Query error: Unknown column 'satuan' in 'field list' - Invalid query: SELECT `tb_detail_penjualan_ayam`.*, `tb_kandang`.`nama` as `nama_kandang`, DATE_FORMAT(tb_detail_penjualan_ayam.tanggal, "%d-%m-%Y") as tanggal, `tb_karyawan`.`nama` as `nama_karyawan`, `tb_admin`.`nama` as `nama_admin`, `harga`, `satuan`, `admin_update`.`nama` as `update_by_admin_nama`, `karyawan_update`.`nama` as `update_by_karyawan_nama`
FROM `tb_detail_penjualan_ayam`
LEFT JOIN `tb_kandang` ON `tb_kandang`.`id_kandang` = `tb_detail_penjualan_ayam`.`id_kandang`
LEFT JOIN `tb_karyawan` ON `tb_karyawan`.`id_karyawan` = `tb_detail_penjualan_ayam`.`id_karyawan`
LEFT JOIN `tb_admin` ON `tb_admin`.`id` = `tb_detail_penjualan_ayam`.`id_admin`
LEFT JOIN `tb_admin` as `admin_update` ON `admin_update`.`id` = `tb_detail_penjualan_ayam`.`update_by_admin`
LEFT JOIN `tb_karyawan` as `karyawan_update` ON `karyawan_update`.`id_karyawan` = `tb_detail_penjualan_ayam`.`update_by_karyawan`
ORDER BY `tb_detail_penjualan_ayam`.`id_detail_penjualan_ayam` DESC
ERROR - 2019-07-29 00:16:31 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 54
ERROR - 2019-07-29 00:16:31 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 54
ERROR - 2019-07-29 00:16:31 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:16:31 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:16:31 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:16:31 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:16:31 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:16:31 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:16:31 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:16:31 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:16:59 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 54
ERROR - 2019-07-29 00:16:59 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 54
ERROR - 2019-07-29 00:16:59 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:16:59 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:16:59 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:16:59 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:16:59 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:16:59 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:16:59 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:16:59 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:17:06 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 54
ERROR - 2019-07-29 00:17:06 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 54
ERROR - 2019-07-29 00:17:06 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:17:06 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:17:06 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:17:06 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:17:06 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:17:06 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:17:06 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:17:06 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 213
ERROR - 2019-07-29 00:17:12 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/d0d0642193cbdd77a399f8e0e78bb888 17
ERROR - 2019-07-29 00:17:12 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/d0d0642193cbdd77a399f8e0e78bb888 17
ERROR - 2019-07-29 00:18:01 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/d0d0642193cbdd77a399f8e0e78bb888 17
ERROR - 2019-07-29 00:18:01 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/d0d0642193cbdd77a399f8e0e78bb888 17
ERROR - 2019-07-29 00:19:33 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/d0d0642193cbdd77a399f8e0e78bb888 17
ERROR - 2019-07-29 00:19:33 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/d0d0642193cbdd77a399f8e0e78bb888 17
ERROR - 2019-07-29 00:20:29 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/d0d0642193cbdd77a399f8e0e78bb888 17
ERROR - 2019-07-29 00:20:29 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/d0d0642193cbdd77a399f8e0e78bb888 17
ERROR - 2019-07-29 00:21:16 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/d0d0642193cbdd77a399f8e0e78bb888 17
ERROR - 2019-07-29 00:21:16 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/d0d0642193cbdd77a399f8e0e78bb888 17
ERROR - 2019-07-29 00:21:18 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/d0d0642193cbdd77a399f8e0e78bb888 17
ERROR - 2019-07-29 00:21:18 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/d0d0642193cbdd77a399f8e0e78bb888 17
ERROR - 2019-07-29 00:21:27 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/d0d0642193cbdd77a399f8e0e78bb888 17
ERROR - 2019-07-29 00:21:27 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/d0d0642193cbdd77a399f8e0e78bb888 17
ERROR - 2019-07-29 00:22:22 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/d0d0642193cbdd77a399f8e0e78bb888 17
ERROR - 2019-07-29 00:22:22 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/d0d0642193cbdd77a399f8e0e78bb888 17
ERROR - 2019-07-29 00:22:27 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/d0d0642193cbdd77a399f8e0e78bb888 17
ERROR - 2019-07-29 00:22:27 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/d0d0642193cbdd77a399f8e0e78bb888 17
ERROR - 2019-07-29 00:22:30 --> Severity: Notice --> Undefined variable: bulan /usr/share/httpd/www/application/cache/views/1eef8e278e4874d1e2f3f3d77731da2b 41
ERROR - 2019-07-29 00:22:30 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/1eef8e278e4874d1e2f3f3d77731da2b 41
ERROR - 2019-07-29 00:23:29 --> Severity: Notice --> Undefined variable: bulan /usr/share/httpd/www/application/cache/views/1eef8e278e4874d1e2f3f3d77731da2b 41
ERROR - 2019-07-29 00:23:29 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/1eef8e278e4874d1e2f3f3d77731da2b 41
ERROR - 2019-07-29 00:24:26 --> Severity: Error --> Access to undeclared static property: ViewTransaksiAyamModel::$table /usr/share/httpd/www/application/models/ViewTransaksiAyamModel.php 62
ERROR - 2019-07-29 00:24:39 --> Severity: Notice --> Undefined variable: bulan /usr/share/httpd/www/application/cache/views/1eef8e278e4874d1e2f3f3d77731da2b 41
ERROR - 2019-07-29 00:24:39 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/1eef8e278e4874d1e2f3f3d77731da2b 41
ERROR - 2019-07-29 00:25:06 --> Severity: Notice --> Undefined variable: bulan /usr/share/httpd/www/application/cache/views/dc26a12fc0ff2134e9b5eb3af188638b 44
ERROR - 2019-07-29 00:25:06 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/dc26a12fc0ff2134e9b5eb3af188638b 44
ERROR - 2019-07-29 00:25:11 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/90e8b27e075f77a8902da5e3b135e9de 18
ERROR - 2019-07-29 00:25:11 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/90e8b27e075f77a8902da5e3b135e9de 18
ERROR - 2019-07-29 00:25:19 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 40
ERROR - 2019-07-29 00:25:19 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 40
ERROR - 2019-07-29 00:25:19 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 164
ERROR - 2019-07-29 00:25:19 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 164
ERROR - 2019-07-29 00:25:19 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 164
ERROR - 2019-07-29 00:25:19 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 164
ERROR - 2019-07-29 00:25:19 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 164
ERROR - 2019-07-29 00:25:19 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 164
ERROR - 2019-07-29 00:25:19 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 164
ERROR - 2019-07-29 00:25:19 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 164
ERROR - 2019-07-29 00:25:41 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 40
ERROR - 2019-07-29 00:25:41 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 40
ERROR - 2019-07-29 00:25:41 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 165
ERROR - 2019-07-29 00:25:41 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 165
ERROR - 2019-07-29 00:25:41 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 165
ERROR - 2019-07-29 00:25:41 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 165
ERROR - 2019-07-29 00:25:41 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 165
ERROR - 2019-07-29 00:25:41 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 165
ERROR - 2019-07-29 00:25:41 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 165
ERROR - 2019-07-29 00:25:41 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 165
ERROR - 2019-07-29 00:27:16 --> Severity: Error --> Access to undeclared static property: ViewDetailGroupTransaksiAyamModel::$table /usr/share/httpd/www/application/models/ViewDetailGroupTransaksiAyamModel.php 27
ERROR - 2019-07-29 01:19:10 --> Severity: Notice --> Undefined variable: semua_kandang /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 40
ERROR - 2019-07-29 01:19:10 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 40
ERROR - 2019-07-29 01:19:10 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 165
ERROR - 2019-07-29 01:19:10 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 165
ERROR - 2019-07-29 01:19:10 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 165
ERROR - 2019-07-29 01:19:10 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 165
ERROR - 2019-07-29 01:19:10 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 165
ERROR - 2019-07-29 01:19:10 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 165
ERROR - 2019-07-29 01:19:10 --> Severity: Notice --> Undefined property: stdClass::$jumlah /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 165
ERROR - 2019-07-29 01:19:10 --> Severity: Notice --> Undefined property: stdClass::$id_detail_group_transaksi /usr/share/httpd/www/application/cache/views/36c08ca4fed407b827b3e7d9939b4991 165
ERROR - 2019-07-29 01:19:14 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel /usr/share/httpd/www/system/core/Loader.php 344
ERROR - 2019-07-29 01:27:31 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-07-29 01:27:31 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-07-29 01:37:06 --> Severity: Notice --> Undefined property: stdClass::$satuan /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 55
ERROR - 2019-07-29 01:37:06 --> Severity: Notice --> Undefined property: stdClass::$satuan /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 55
ERROR - 2019-07-29 01:37:06 --> Severity: Notice --> Undefined property: stdClass::$satuan /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 55
ERROR - 2019-07-29 01:37:06 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-07-29 01:37:06 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-07-29 01:37:13 --> Severity: Notice --> Undefined property: stdClass::$satuan /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 55
ERROR - 2019-07-29 01:37:13 --> Severity: Notice --> Undefined property: stdClass::$satuan /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 55
ERROR - 2019-07-29 01:37:13 --> Severity: Notice --> Undefined property: stdClass::$satuan /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 55
ERROR - 2019-07-29 01:37:13 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-07-29 01:37:13 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-07-29 01:42:59 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-07-29 01:42:59 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-07-29 01:55:58 --> Severity: Notice --> Undefined property: stdClass::$harga /usr/share/httpd/www/application/cache/views/adc62b671b119056cc6ceabe4ee4d181 128
ERROR - 2019-07-29 01:55:58 --> Severity: Notice --> Undefined property: stdClass::$harga /usr/share/httpd/www/application/cache/views/adc62b671b119056cc6ceabe4ee4d181 128
ERROR - 2019-07-29 01:55:58 --> Severity: Notice --> Undefined property: stdClass::$harga /usr/share/httpd/www/application/cache/views/adc62b671b119056cc6ceabe4ee4d181 128
ERROR - 2019-07-29 02:00:34 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/9f3fe66d8cb8a3c6fdcfd756d24ff74f 62
ERROR - 2019-07-29 02:00:34 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/9f3fe66d8cb8a3c6fdcfd756d24ff74f 62
ERROR - 2019-07-29 02:01:26 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/9f3fe66d8cb8a3c6fdcfd756d24ff74f 62
ERROR - 2019-07-29 02:01:26 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/9f3fe66d8cb8a3c6fdcfd756d24ff74f 62
ERROR - 2019-07-29 02:01:28 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-07-29 02:01:28 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-07-29 02:01:34 --> Severity: Notice --> Undefined variable: supplier /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-07-29 02:01:34 --> Severity: Warning --> Invalid argument supplied for foreach() /usr/share/httpd/www/application/cache/views/53c206d84cb1fcae15dfd75f48baf7ad 90
ERROR - 2019-07-29 21:54:19 --> 404 Page Not Found: Faviconico/index
ERROR - 2019-07-29 21:54:20 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel /usr/share/httpd/www/system/core/Loader.php 344
ERROR - 2019-07-29 21:57:23 --> Severity: error --> Exception: Unable to locate the model you have specified: DetailPersediaanModel /usr/share/httpd/www/system/core/Loader.php 344
