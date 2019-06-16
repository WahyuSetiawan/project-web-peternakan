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
